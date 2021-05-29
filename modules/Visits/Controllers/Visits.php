<?php
namespace Modules\Visits\Controllers;

use Modules\Visits\Models\VisitsModel;
use Modules\UserManagement\Models\PermissionsModel;
use App\Controllers\BaseController;
use App\Libraries\Pdf;

class Visits extends BaseController
{

	public function __construct()
	{
		parent:: __construct();

		$permissions_model = new PermissionsModel();
    	$this->visitsModel = new VisitsModel();
		$this->permissions = $permissions_model->getPermissionsWithCondition(['status' => 'a']);
	}

    public function index()
    {
    	$this->hasPermissionRedirect('list-of-active-visits');
    	$model = new VisitsModel();
			// die('here');
			$data['visits'] = $model->getVisitDate(date('Y-m-d'));
      $data['function_title'] = "Visits List";
      $data['viewName'] = 'Modules\Visits\Views\visits\index';
      echo view('App\Views\theme\index', $data);
    }

	public function pdf(){
					
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

		$data['visits'] = $this->visitsModel->get();
		$html = view('Modules\Visits\Views\visits\visitPDF', $data);
				
		$pdf->writeHTML($html, true, false, false, false, '');
		// ---------------------------------------------------------

		// Close and output PDF document
		// This method has several options, check the source code documentation for more information.
		$pdf->Output('example_001.pdf', 'I');
		die();
	}

}
