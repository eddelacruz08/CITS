<?php
namespace Modules\Guests\Controllers;

use Modules\Visits\Models\VisitsModel;
use Modules\Visits\Models\ChecklistModel;
use Modules\HealthDeclaration\Models\ReasonChecklistsModel;
use Modules\Maintenances\Models\CitiesModel;
use Modules\Maintenances\Models\ExtensionModel;
use Modules\Maintenances\Models\ProvinceModel;
use Modules\Maintenances\Models\GenderModel;
use Modules\Maintenances\Models\TypeModel;
use Modules\Maintenances\Models\QuestionModel;
use Modules\UserManagement\Models\UsersModel;
use Modules\UserManagement\Models\PermissionsModel;
use App\Controllers\BaseController;
use App\Libraries\Pdf;
use CodeIgniter\I18n\Time;

use \Mpdf\Mpdf;

class Guests extends BaseController
{

	public function __construct()
	{
		parent:: __construct();

		$this->usersModel = new UsersModel();
		$this->gendersModel = new GenderModel();
		$this->reasonsModel = new ReasonChecklistsModel();
		$this->typesModel = new TypeModel();
		$this->visitsModel = new VisitsModel();
		$this->checklistsModel = new ChecklistModel();
		$this->questionsModel = new QuestionModel();
		$permissions_model = new PermissionsModel();
		$this->permissions = $permissions_model->getPermissionsWithCondition(['status' => 'a']);
	}
	
	public function index()
	{
		$this->hasPermissionRedirect('list-guest');
		$data['users'] = $this->usersModel->getUsersLists();
		$data['genders'] = $this->gendersModel->get();
		$data['guest_types'] = $this->typesModel->get();
		$data['function_title'] = "Guest List";
		$data['viewName'] = 'Modules\Guests\Views\guests\index';
		echo view('App\Views\theme\index', $data);
	}

	public function show_guest($id)
	{
		$this->hasPermissionRedirect('show-guest');
		$data['reasons'] = $this->reasonsModel->getReasonChecklist($id);
		$data['visit_id'] = $this->visitsModel->getVisitId($id);
		$data['recent_visits'] = $this->visitsModel->get(['status' => 'a', 'user_id' => $id]);
		$data['latest_checklist'] = $this->checklistsModel->getLatestChecklist($id);
		$data['health_summary'] = $this->checklistsModel->getHealthTrendSummary($id);
		$data['checklist_recorded'] = $this->checklistsModel->isChecklistCaptured($data['visit_id']);
		$data['questions'] = $this->questionsModel->get();
		$data['questionself'] = $this->checklistsModel->getSelfAssessmentHistory();
		$data['profile'] = $this->usersModel->getProfile($id);
		$data['checklist_counts'] = $this->checklistsModel->getChecklistCount($id);
		$data['visit_counts'] = $this->checklistsModel->getVisitsCount($id);
		$data['assess_counts'] = $this->checklistsModel->getAssessCount($id);
		if (empty($data['profile'])) {
			die('Walang Laman!');
		}
		$data['function_title'] = "Guest Details";
		$data['viewName'] = 'Modules\Guests\Views\guests\guestDetails';
		echo view('App\Views\theme\index', $data);
	}
	
	public function generate_guest_report(){
					
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
		$pdf->SetFont('helvetica', 'B', 20);

		// add a page
		$pdf->AddPage();

		$pdf->Write(0, 'Guest List', '', 0, 'C', true, 0, false, false, 0);

		// set font
		$pdf->SetFont('helvetica', 'B', 10);
		
		$pdf->Write(0, 'Date: '.date('F d, Y'), '', 0, 'C', true, 0, false, false, 0);
		
		$pdf->SetFont('helvetica', '', 10);
		
		if(isset($_POST['guest_type_id']) == true && isset($_POST['gender_id']) == true){
			$data['guests'] = $this->usersModel->getGuestTypeAndGender($_POST['guest_type_id'], $_POST['gender_id']);
		}elseif(isset($_POST['guest_type_id']) == true && isset($_POST['gender_id']) == false){
			$data['guests'] = $this->usersModel->getGuestTypeAndNoGender($_POST['guest_type_id']);
		}elseif(isset($_POST['guest_type_id']) == false && isset($_POST['gender_id']) == true){
			$data['guests'] = $this->usersModel->getNoGuestTypeAndGender($_POST['gender_id']);
		}else{
			$data['guests'] = $this->usersModel->getUsersLists();
		}
		$html = view('Modules\Guests\Views\guests\guestspdf', $data);
		$pdf->writeHTML($html, true, false, false, false, '');
		// ---------------------------------------------------------

		// Close and output PDF document
		// This method has several options, check the source code documentation for more information.
		$pdf->Output('example_001.pdf', 'I');
		die();
	}
}
