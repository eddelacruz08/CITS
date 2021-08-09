<?php namespace Modules\Scan\Controllers;

use Modules\UserManagement\Models\PermissionsModel;
use Modules\UserManagement\Models\UsersModel;
use Modules\Visits\Models\ChecklistModel;
use Modules\Guests\Models\GuestsModel;
use Modules\Visits\Models\VisitsModel;
use Modules\Department\Models\DepartmentModel;
use Modules\Scan\Models\QrcodeAttendanceModel;
use App\Controllers\BaseController;
use App\Libraries\Pdf;
use App\Libraries\Qrcodepdf;

class QrcodeAttendance extends BaseController
{
	function __construct(){
		$this->checklistModel = new ChecklistModel();
		$this->visitsModel = new VisitsModel();
		$this->usersModel = new UsersModel();
	}
	public function index(){
		$data['viewName'] = 'Modules\Scan\Views\scans\scanProfile';
		if($this->request->getMethod() === 'post'){
			if($this->validate('scan')){
				$registerOK = 0;
				$users = $this->usersModel->getUserWithCondition(['token' => $_POST['identifier'], 'status' => 'a']);
				if(!empty($users)){
					foreach($users as $user){
						if($_POST['identifier'] == $user['token']){
							$registerOK = 1;
							$userId = $user['id'];
							$userToken = $user['token'];
							break;
						}
					}
				}else{
					$data['error_added2'] = 'Cannot find user!';
				}
				if($registerOK == 1){
					$data['profile'] = $this->usersModel->getScanProfile($_POST['identifier']);
					$latestChecklistOK = 0;
					$latestChecklistUser = $this->checklistModel->getLatestChecklistDateOnScan($userId);
					if(!empty($latestChecklistUser)){
						foreach($latestChecklistUser as $userChecklist){
							if($userChecklist['date'] == date('Y-m-d')){
								$latestChecklistOK = 1;
								$cId = $userChecklist['id'];
								break;
							}
						}
					}else{
						$data['error_added2'] = 'Please take Health Declaration Form from your website, before entry!';
						$this->session->markAsFlashdata('error_added2');
					}
					if($latestChecklistOK == 1){
						$checkStatusOk = 0;
						$checkStatusUser = $this->checklistModel->getLatestCheckStatusDefinedOnScan($cId);
						if(!empty($checkStatusUser)){
							foreach($checkStatusUser as $checkStatus){
								if($checkStatus['status_defined'] == NULL){
									$checkStatusOk = 1;
									break;
								}
							}
						}else{
							$data['warning_added2'] = 'You are not required to enter to the premises, because your latest self-assessment detected that had a sysmtoms!';
							$this->session->markAsFlashdata('warning_added2');
						}
						if($checkStatusOk == 1){
							$visitsOk = 0;
							$usersVisits = $this->visitsModel->getVisitWithCondition(['user_id' => $userId, 'status' => 'a']);
							if(!empty($usersVisits)){
								foreach($usersVisits as $visits){
									if($visits['log_in'] == TRUE && $visits['log_out'] == NULL){
										$visitsOk = 1;
										$vId = $visits['id'];
										break;
									}
								}
							}
							// else{
							// 	$val_array_login = [
							// 		'user_id' => $userId,
							// 		'log_in' => (new \DateTime())->format('Y-m-d H:i:s'),
							// 	];
							// 	$data['profile'] = $this->usersModel->getScanProfile($_POST['identifier']);
							// 	if($this->visitsModel->add_visits_login($val_array_login)){
							// 		$_SESSION['success_added2'] = 'Successfully Login!';
							// 		$this->session->markAsFlashdata('success_added2');
							// 	}else{
							// 		$_SESSION['error_added2'] = 'Error Login!';
							// 		$this->session->markAsFlashdata('error_added2');
							// 	}
							// }
							if($visitsOk == 1){
								$data['profile'] = $this->usersModel->getScanProfile($_POST['identifier']);
								$val_array_logout = [
									'log_out' => (new \DateTime())->format('Y-m-d H:i:s'),
								];
								if($this->visitsModel->edit_visits_logout($val_array_logout, $vId)){
									$data['success_added2'] = 'Successfully Logout!';
									$this->session->markAsFlashdata('success_added2');
								}else{
									$data['error_added2'] = 'Error Logout!';
									$this->session->markAsFlashdata('error_added2');
								}
							}else{
								$val_array_login = [
									'user_id' => $userId,
									'log_in' => (new \DateTime())->format('Y-m-d H:i:s'),
								];
								$data['profile'] = $this->usersModel->getScanProfile($_POST['identifier']);
								if($this->visitsModel->add_visits_login($val_array_login)){
									$data['success_added2'] = 'Successfully Validated!';
									$this->session->markAsFlashdata('success_added2');
								}else{
									$data['error_added2'] = 'Error Login!';
									$this->session->markAsFlashdata('error_added2');
								}
							}
						}else{
							$data['error_added2'] = 'You are not required to enter to the premises, because your latest self-assessment detected that had a symptoms!';
							$this->session->markAsFlashdata('error_added2');
						}
					}else{
						$data['error_added2'] = 'Please take Health Declaration Form from your website, before entry!';
						$this->session->markAsFlashdata('error_added2');
					}
				}else{
					$data['error_added2'] = 'This guest was not registered!';
					$this->session->markAsFlashdata('error_added2');
				}
			}else{
				$data['value'] = $_POST;
				$data['errors'] = $this->validation->getErrors();
				$data['error_added2'] = 'Empty field for ID. QR Code is required to scan for enter!';
				$this->session->markAsFlashdata('error_added2');
			}
		}
		return view('App\Views\theme\index2', $data);
	}
		
	public function print_pdf($qrLink){
		// create new PDF document
		$pdf = new PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		
		// set document information
		// $pdf->SetCreator(PDF_CREATOR);
		// $pdf->SetAuthor('Nicola Asuni');
		$pdf->SetTitle('Qr Code Link');
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
		
		// NOTE: 2D barcode algorithms must be implemented on 2dbarcode.php class file.
		
		
		// add a page
		$pdf->AddPage();
		

		$pdf->SetFont('helvetica', '', 15);
		
		// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
		
		// set style for barcode
		$style = array(
			'border' => 2,
			'vpadding' => 'auto',
			'hpadding' => 'auto',
			'fgcolor' => array(0,0,0),
			'bgcolor' => false, //array(255,255,255)
			'module_width' => 1, // width of a single module in points
			'module_height' => 1 // height of a single module in points
		);
		if($qrLink == 'register'){
			// QRCODE,L : QR-CODE Low error correction
			// set font
			$pdf->SetFont('helvetica', '', 18);
			$pdf->Write(0, 'Registration Qr Code Link', '', 0, 'C', true, 0, false, false, 0);
			$pdf->write2DBarcode(base_url('login/').$qrLink, 'QRCODE,C', 45, 38, 120, 120, $style, 'N');
			$pdf->Text(20, 160, base_url('login/').$qrLink);
		}elseif($qrLink == 'requesthealthform'){
			// QRCODE,L : QR-CODE Low error correction
			// set font
			$pdf->SetFont('helvetica', '', 18);
			$pdf->Write(0, 'Reason Health Form Qr Code Link', '', 0, 'C', true, 0, false, false, 0);
			$pdf->write2DBarcode(base_url('health-declaration-form/').$qrLink, 'QRCODE,C', 45, 38, 120, 120, $style, 'N');
			$pdf->Text(20, 160, base_url('health-declaration-form/').$qrLink);
		}else{
			// QRCODE,L : QR-CODE Low error correction
			// set font
			$pdf->SetFont('helvetica', '', 18);
			$pdf->Write(0, 'Health Form Qr Code Link', '', 0, 'C', true, 0, false, false, 0);
			$pdf->write2DBarcode(base_url('health-declaration-form/').$qrLink, 'QRCODE,C', 45, 38, 120, 120, $style, 'N');
			$pdf->Text(20, 160, base_url('health-declaration-form/').$qrLink);
		}

		//Close and output PDF document
		$pdf->Output('example_050.pdf', 'I');
		
		//============================================================+
		// END OF FILE
		//============================================================+
		die();
	}
}
