<?php namespace Modules\Scan\Controllers;

use Modules\UserManagement\Models\PermissionsModel;
use Modules\UserManagement\Models\UsersModel;
use Modules\Visits\Models\ChecklistModel;
use Modules\Guests\Models\GuestsModel;
use Modules\Visits\Models\VisitsModel;
use Modules\Department\Models\DepartmentModel;
use Modules\Scan\Models\QrcodeAttendanceModel;
use App\Controllers\BaseController;

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
							$_SESSION['error_added2'] = 'Please take Health Declaration Form from your website, before entry!';
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
								$_SESSION['warning_added2'] = 'You are not required to enter to the premises, because your latest self-assessment detected that had a sysmtoms!';
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
										$_SESSION['success_added2'] = 'Successfully Logout!';
										$this->session->markAsFlashdata('success_added2');
									}else{
										$_SESSION['error_added2'] = 'Error Logout!';
										$this->session->markAsFlashdata('error_added2');
									}
								}else{
									$val_array_login = [
										'user_id' => $userId,
										'log_in' => (new \DateTime())->format('Y-m-d H:i:s'),
									];
									$data['profile'] = $this->usersModel->getScanProfile($_POST['identifier']);
									if($this->visitsModel->add_visits_login($val_array_login)){
										$_SESSION['success_added2'] = 'Successfully Login!';
										$this->session->markAsFlashdata('success_added2');
									}else{
										$_SESSION['error_added2'] = 'Error Login!';
										$this->session->markAsFlashdata('error_added2');
									}
								}
							}else{
								$_SESSION['warning_added2'] = 'You are not required to enter to the premises, because your latest self-assessment detected that had a symptoms!';
								$this->session->markAsFlashdata('warning_added2');
							}
						}else{
							$_SESSION['error_added2'] = 'Please take Health Declaration Form from your website, before entry!';
							$this->session->markAsFlashdata('error_added2');
						}
					}else{
						$_SESSION['error_added2'] = 'This guest was not registered!';
						$this->session->markAsFlashdata('error_added2');
					}
				}else{
					$data['value'] = $_POST;
					$data['errors'] = $this->validation->getErrors();
					$_SESSION['error_added2'] = 'Empty field for ID. QR Code is required to scan for enter!';
					$this->session->markAsFlashdata('error_added2');
				}
			}
			return view('App\Views\theme\index2', $data);
		}
}
