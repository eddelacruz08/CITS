<?php
namespace Modules\GuestAssessment\Controllers;

use Modules\Visits\Models\VisitsModel;
use Modules\Visits\Models\ChecklistModel;
use Modules\GuestAssessment\Models\GuestAssessmentModel;
use Modules\GuestAssessment\Models\GuestCheckupModel;
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

		$permissions_model = new PermissionsModel();
		$this->permissions = $permissions_model->getPermissionsWithCondition(['status' => 'a']);
	}

  public function index()
  {
  	$this->hasPermissionRedirect('list-guest');
	$model = new GuestAssessmentModel();
	$data['guests'] = $model->getAssessmentGuest();
    $data['function_title'] = "Guests With Symtom List";
    $data['viewName'] = 'Modules\GuestAssessment\Views\guestassessment\index';
    echo view('App\Views\theme\index', $data);
  }
  public function edit_guest_assessment($id)
  {
  	// $this->hasPermissionRedirect('edit-guest-assessment');
  	// helper(['form', 'url']);
  	$model = new GuestAssessmentModel();
  	$checklist_model = new ChecklistModel();
	$question_model = new QuestionModel();
	$data['questions'] = $question_model->get();
  	$data['rec'] = $model->find($id);
	$data['latest_checklist'] = $checklist_model->getLatestChecklistDate($id);
    $data['function_title'] = "Patient Assessment";
    $data['viewName'] = 'Modules\GuestAssessment\Views\guestassessment\indexChecklist';
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
  public function delete_guest_assessment($id)
  {
  	// $this->hasPermissionRedirect('delete-guest');
	  $model = new GuestAssessmentModel();
		$registerOK = 0;
		$users = $model->getGuestAssessWithCondition(['guest_id' => $id, 'guest_status' => 'a', 'status' => 'a']);

		//checking of user existense
		if(!empty($users))
		{
			foreach($users as $user)
			{
				if($id == $user['guest_id'])
				{
					$registerOK = 1;
					$guestId = $user['id'];
					break;
				}
			}
		}
		else
		{
			$_SESSION['error'] = 'Cannot find assessment!';
			$this->session->markAsFlashdata('error');
			return redirect()->to(base_url('guest%20assessment'));
		}

		if ($registerOK == 1)
		 {
			 // die($guestId);
			 $models = new GuestAssessmentModel();
				if ($models->softDelete($guestId)) {
					$_SESSION['success'] = 'You have Deleted a record';
					$this->session->markAsFlashdata('success');
					return redirect()->to(base_url('guest%20assessment'));
				}
				else{
					$_SESSION['error'] = 'You an error in updating a record';
					$this->session->markAsFlashdata('error');
					return redirect()->to( base_url('guest%20assessment'));
				}
		}
  }

}
