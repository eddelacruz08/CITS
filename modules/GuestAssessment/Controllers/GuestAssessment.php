<?php
namespace Modules\GuestAssessment\Controllers;

use Modules\Visits\Models\VisitsModel;
use Modules\Visits\Models\ChecklistModel;
use Modules\HealthDeclaration\Models\ReasonChecklistsModel;
use Modules\GuestAssessment\Models\GuestAssessmentModel;
use Modules\GuestAssessment\Models\InvalidateModel;
use Modules\Maintenances\Models\CitiesModel;
use Modules\Maintenances\Models\ExtensionModel;
use Modules\Maintenances\Models\ProvinceModel;
use Modules\Maintenances\Models\GenderModel;
use Modules\Maintenances\Models\TypeModel;
use Modules\UserManagement\Models\PermissionsModel;
use Modules\Maintenances\Models\QuestionModel;
use App\Controllers\BaseController;
use App\Libraries\Pdf;

class GuestAssessment extends BaseController
{
	public function __construct()
	{
		parent:: __construct();
		$this->invalidatedGuestsModel = new InvalidateModel();
		$this->guestAssessmentModel = new GuestAssessmentModel();
		$this->reasonChecklistsModel = new ReasonChecklistsModel();
		$this->checklistsModel = new ChecklistModel();
	 	$this->questionsModel = new QuestionModel();
		$permissions_model = new PermissionsModel();
		$this->permissions = $permissions_model->getPermissionsWithCondition(['status' => 'a']);
	}

	public function index()
	{
		$this->hasPermissionRedirect('list-guest');
		$data['questions'] = $this->questionsModel->get();
		$data['guestsAssess'] = $this->guestAssessmentModel->getAssessmentGuest();
		$data['invalidatedGuests'] = $this->invalidatedGuestsModel->getInvalidGuestWithReasonChecklist();
		$data['function_title_invalidated'] = "Invalidated Guest List";
		$data['function_title'] = "Guests With Symptom List";
		$data['viewName'] = 'Modules\GuestAssessment\Views\guestassessment\index';
		echo view('App\Views\theme\index', $data);
	}

	public function pdf($id){
						
		// create new PDF document
		$pdf = new PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		// $pdf->SetCreator(PDF_CREATOR);
		// $pdf->SetAuthor('Nicola Asuni');
		// $pdf->SetTitle('TCPDF Example 048');
		// $pdf->SetSubject('TCPDF Tutorial');
		// $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

		// set default header data
		// $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 048', PDF_HEADER_STRING);

		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		// $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
			require_once(dirname(__FILE__).'/lang/eng.php');
			$pdf->setLanguageArray($l);
		}

		// ---------------------------------------------------------

		// set font
		$pdf->SetFont('helvetica', 'B', 20);

		// add a page
		$pdf->AddPage();

		$pdf->Write(0, 'Attendance Sheet', '', 0, 'C', true, 0, false, false, 0);

		$pdf->SetFont('helvetica', '', 13);

		// $data['visits'] = $this->visitsModel->get();
		
		$data['function_title'] = "Patient Assessment";
		$html = view('Modules\GuestAssessment\Views\guestassessment\indexChecklist', $data);
				
		$pdf->writeHTML($html, true, false, false, false, '');
		// ---------------------------------------------------------

		// Close and output PDF document
		// This method has several options, check the source code documentation for more information.
		$pdf->Output('example_001.pdf', 'I');
		die();
	}

	public function invalidate_guest($id)
	{
		// die($id);
		$checkUser = 0;
		$userAssessments = $this->guestAssessmentModel->getGuestAssessWithCondition(['user_id' => $id, 'status' => 'a']);

		if(!empty($userAssessments)){
			foreach($userAssessments as $userAssessment){
				if($id == $userAssessment['user_id']){
					$checkUser = 1;
					$assessmentId = $userAssessment['id'];
					break;
				}
			}
		}else{
			$_SESSION['error'] = 'Cannot find record!';
			$this->session->markAsFlashdata('error');
			return redirect()->to(base_url('guest%20assessment'));
		}
		if ($checkUser == 1) {
			$reasonChecklistData = $this->reasonChecklistsModel->getLatestReasonChecklist($id);
			foreach($reasonChecklistData as $latestReasonChecklist){
			    $reasonChecklistId = $latestReasonChecklist['id'];
				$q_one = $latestReasonChecklist['q_one'];
				$q_two = $latestReasonChecklist['q_two'];
				$q_three = $latestReasonChecklist['q_three'];
				$q_four = $latestReasonChecklist['q_four'];
				$q_five = $latestReasonChecklist['q_five'];
				$status_defined = $latestReasonChecklist['status_defined'];
			    break;
			}
			$value_invalid_guest = [
			    'user_id' => $id,
			    'reason_checklist_id' => $reasonChecklistId,
			];
			$this->invalidatedGuestsModel->add($value_invalid_guest);
			$checklistData = $this->checklistsModel->getLatestChecklistDate($id);
			foreach($checklistData as $latestChecklist){
			    $checklistId = $latestChecklist['id'];
			    break;
			}
			$val_array = [
			    'q_one' => $q_one,
			    'q_two' => $q_two,
			    'q_three' => $q_three,
			    'q_four' => $q_four,
			    'q_five' => $q_five,
			    'status_defined' => $status_defined,
			];
			$this->checklistsModel->edit($val_array, $checklistId);
			if ($this->guestAssessmentModel->softDelete($assessmentId)) {
				$_SESSION['success'] = 'You have Invalidated a record';
				$this->session->markAsFlashdata('success');
				return redirect()->to(base_url('guest%20assessment'));
			}else{
				$_SESSION['error'] = 'You have an error in invalidating a record';
				$this->session->markAsFlashdata('error');
				return redirect()->to( base_url('guest%20assessment'));
			}
		}
  	}

	public function email_resend($id)
	{
		if($this->request->getMethod() === 'post'){
			$userData = $this->guestAssessmentModel->get(['user_id'=>$id, 'status'=>'a']);
			$to = $_POST['email'];
			$_POST['email_status'] = 1;
			$subject = 'Guidelines for Guest with Symptoms';
			$message = 'Guidelines for Guest with Symptoms.<br>';
			$email = \Config\Services::email();
			$email->setTo($to);
			$email->setFrom('United Coders Dev Team', SYSTEM_NAME);
			$email->setSubject($subject);
			$email->setMessage($message);
			if($email->send()){
				$this->guestAssessmentModel->edit_assess($_POST, $id);
				$_SESSION['success'] = 'You successfully resend email for guidelines.';
				$this->session->markAsFlashdata('success');
				return redirect()->to(base_url('guest%20assessment'));
			}
			return redirect()->to(base_url('guest%20assessment'));
		}
		return redirect()->to(base_url('guest%20assessment'));
	}
	
}
