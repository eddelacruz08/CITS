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
		$data['generateAssessSelectDate'] = $this->guestAssessmentModel->getGenerateAssessReportByDateSelect();
		$data['generateInvalidatedSelectDate'] = $this->guestAssessmentModel->getGenerateInvalidatedReportByDateSelect();
		$data['questions'] = $this->questionsModel->get();
		$data['guestsAssess'] = $this->guestAssessmentModel->getAssessmentGuest();
		$data['invalidatedGuests'] = $this->invalidatedGuestsModel->getInvalidGuestWithReasonChecklist();
		$data['function_title_invalidated'] = "Invalidated Guest List";
		$data['function_title'] = "Guests With Symptom List";
		$data['viewName'] = 'Modules\GuestAssessment\Views\guestassessment\index';
		echo view('App\Views\theme\index', $data);
	}

	public function load_table_assessment()
	{
		$data['questions'] = $this->questionsModel->get();
		$data['guestsAssess'] = $this->guestAssessmentModel->getAssessmentGuest();
		$data['function_title'] = "Guests With Symptom List";
		$data['viewName'] = 'Modules\GuestAssessment\Views\guestassessment\load_table_assessment';
		echo view('App\Views\theme\index2', $data);
	}

	public function generate_assess_report_by_date(){
		// create new PDF document
		$pdf = new PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		// $pdf->SetCreator(PDF_CREATOR);
		// $pdf->SetAuthor('Nicola Asuni');
		// $pdf->SetTitle('TCPDF Example 048');
		// $pdf->SetSubject('TCPDF Tutorial');
		// $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
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
		$pdf->SetFont('helvetica', 'B', 15);

		// add a page
		$pdf->AddPage();

		$pdf->Write(0, 'Guest Assessment List', '', 0, 'C', true, 0, false, false, 0);

		// set font
		$pdf->SetFont('helvetica', 'B', 10);

		$pdf->Write(0, 'Date: '.date('F d, Y'), '', 0, 'C', true, 0, false, false, 0);

		$pdf->SetFont('helvetica', '', 10);
		// die($_POST['startdate'] - $_POST['enddate']);
		if(!empty($_POST['date'])){
			$data['generateAssessByDates'] = $this->guestAssessmentModel->getGenerateAssessReportByDate($_POST['date']);
		}else{
			$data['generateAssessByDates'] = $this->guestAssessmentModel->getGenerateAssessReportByDateHistory();
		}
		if(empty($data['generateAssessByDates'])){
			die('empty');
		}
		$html = view('Modules\GuestAssessment\Views\guestassessment\print_assess_by_date', $data);
				
		$pdf->writeHTML($html, true, false, false, false, '');
		// ---------------------------------------------------------

		// Close and output PDF document
		// This method has several options, check the source code documentation for more information.
		$pdf->Output('example_001.pdf', 'I');
		die();
	}

	public function generate_invalidated_report_by_date(){
		// create new PDF document
		$pdf = new PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		// $pdf->SetCreator(PDF_CREATOR);
		// $pdf->SetAuthor('Nicola Asuni');
		// $pdf->SetTitle('TCPDF Example 048');
		// $pdf->SetSubject('TCPDF Tutorial');
		// $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
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
		$pdf->SetFont('helvetica', 'B', 15);

		// add a page
		$pdf->AddPage();

		$pdf->Write(0, 'Guest Invalidated List', '', 0, 'C', true, 0, false, false, 0);

		// set font
		$pdf->SetFont('helvetica', 'B', 10);

		$pdf->Write(0, 'Date: '.date('F d, Y'), '', 0, 'C', true, 0, false, false, 0);

		$pdf->SetFont('helvetica', '', 10);
		// die($_POST['date']);
		if(!empty($_POST['date'])){
			$data['generateInvalidatedByDates'] = $this->guestAssessmentModel->getGenerateInvalidatedReportByDate($_POST['date']);
		}else{
			$data['generateInvalidatedByDates'] = $this->guestAssessmentModel->getGenerateInvalidatedReportByDateHistory();
		}
		// if(empty($data['generateInvalidatedByDates'])){
		// 	die('empty');
		// }
		$html = view('Modules\GuestAssessment\Views\guestassessment\print_invalidated_by_date', $data);
				
		$pdf->writeHTML($html, true, false, false, false, '');
		// ---------------------------------------------------------

		// Close and output PDF document
		// This method has several options, check the source code documentation for more information.
		$pdf->Output('example_001.pdf', 'I');
		die();
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

	public function invalidate_guest($id, $cId)
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
				$q_one = $latestReasonChecklist['r_q_one'];
				$q_two = $latestReasonChecklist['r_q_two'];
				$q_three = $latestReasonChecklist['r_q_three'];
				$q_four = $latestReasonChecklist['r_q_four'];
				$q_five = $latestReasonChecklist['r_q_five'];
				$status_defined = $latestReasonChecklist['r_status_defined'];
			    break;
			}
			$value_invalid_guest = [
			    'user_id' => $id,
			    'reason_checklist_id' => $reasonChecklistId,
			];
			$this->invalidatedGuestsModel->add($value_invalid_guest);
			$checklistData = $this->checklistsModel->get(['token'=>$cId, 'status'=>'a']);
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

	public function denied_invalidate_guest($id, $cId)
	{
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
			$invalidFunctionAction = 2;
			$val_array_assess = [
				'func_action' =>$invalidFunctionAction,
			];
			if ($this->guestAssessmentModel->edit_assess($val_array_assess, $assessmentId)) {
				$_SESSION['success'] = 'Cancelled a request record';
				$this->session->markAsFlashdata('success');
				return redirect()->to(base_url('guest%20assessment'));
			}else{
				$_SESSION['error'] = 'You have an error in cancelling a record';
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
	
	public function print_assess_guest($id){
		// create new PDF document
		$pdf = new PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		// set document information
		// $pdf->SetCreator(PDF_CREATOR);
		// $pdf->SetAuthor('Nicola Asuni');
		// $pdf->SetTitle('TCPDF Example 048');
		// $pdf->SetSubject('TCPDF Tutorial');
		// $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
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
		$pdf->SetFont('helvetica', 'B', 15);
		// add a page
		$pdf->AddPage();
		$pdf->Write(0, 'Patient Assessment Information', '', 0, 'C', true, 0, false, false, 0);
		// set font
		$pdf->SetFont('helvetica', '', 10);
		$pdf->Write(0, 'Date: '.date('F d, Y'), '', 0, 'C', true, 0, false, false, 0);
		$pdf->SetFont('helvetica', '', 9);
		$data['questions'] = $this->questionsModel->get();
		$data['guestsAssess'] = $this->guestAssessmentModel->getPrintAssessmentGuest($id);
		if(empty($data['guestsAssess'])){
			die('empty');
		}
		$html = view('Modules\GuestAssessment\Views\guestassessment\print_assess_guest', $data);
		$pdf->writeHTML($html, true, false, false, false, '');
		// ---------------------------------------------------------
		// Close and output PDF document
		// This method has several options, check the source code documentation for more information.
		$pdf->Output('example_001.pdf', 'I');
		die();
	}
	
	public function print_invalidated_guest($id){
		// create new PDF document
		$pdf = new PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		// set document information
		// $pdf->SetCreator(PDF_CREATOR);
		// $pdf->SetAuthor('Nicola Asuni');
		// $pdf->SetTitle('TCPDF Example 048');
		// $pdf->SetSubject('TCPDF Tutorial');
		// $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
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
		$pdf->SetFont('helvetica', 'B', 15);
		// add a page
		$pdf->AddPage();
		$pdf->Write(0, 'Patient Invalidated Information', '', 0, 'C', true, 0, false, false, 0);
		// set font
		$pdf->SetFont('helvetica', '', 10);
		$pdf->Write(0, 'Date: '.date('F d, Y'), '', 0, 'C', true, 0, false, false, 0);
		$pdf->SetFont('helvetica', '', 9);
		$data['questions'] = $this->questionsModel->get();
		$data['invalidatedGuests'] = $this->invalidatedGuestsModel->getPrintInvalidatedGuest($id);
		if(empty($data['invalidatedGuests'])){
			die('empty');
		}
		$html = view('Modules\GuestAssessment\Views\guestassessment\print_invalidated_guest', $data);
		$pdf->writeHTML($html, true, false, false, false, '');
		// ---------------------------------------------------------
		// Close and output PDF document
		// This method has several options, check the source code documentation for more information.
		$pdf->Output('example_001.pdf', 'I');
		die();
	}
}
