<?php namespace Modules\Scan\Controllers;

// use Modules\Visits\Models\RolesModel;
use Modules\UserManagement\Models\PermissionsModel;
use Modules\Visits\Models\ChecklistModel;
use Modules\Guests\Models\GuestsModel;
use Modules\Visits\Models\VisitsModel;
use Modules\Department\Models\DepartmentModel;
use Modules\Scan\Models\QrcodeAttendanceModel;
use App\Controllers\BaseController;

class QrcodeAttendance extends BaseController
{
		public function index(){
			$model = new ChecklistModel();
			$visit_model = new VisitsModel();
			$guest_model = new GuestsModel();
			$data['guest_defined'] = $guest_model->getGuestDefined();
			$data['guest_definedAt'] = $guest_model->getGuestDefinedAt();
			$data['viewName'] = 'Modules\Scan\Views\scans\scanProfile';
			echo view('App\Views\theme\index2', $data);
		}

		public function add_scan(){

		}

		public function add_scan_2(){
			$model = new ChecklistModel();
			$visit_model = new VisitsModel();
			$guest_model = new GuestsModel();
			$data['guest_defined'] = $guest_model->getGuestDefined();
			$data['guest_definedAt'] = $guest_model->getGuestDefinedAt();
			$data['guests'] = $guest_model->get(['status'=> 'a']);
			$_SESSION['reminder_added'] = '<b>Please replace your QR Code to scan!</b>';
			$this->session->markAsFlashdata('reminder_added');

			if($_POST['temperature'] == true || $_POST['user_id'] == true)
			{
				$registerOK = 0;
				$users = $guest_model->getGuestWithCondition(['user_id' => $_POST['user_id'], 'status' => 'a']);

				//checking of user existense
				if(!empty($users))
				{
					foreach($users as $user)
					{
						if($_POST['user_id'] == $user['user_id'])
						{
							$registerOK = 1;
							// $temp = $user['temperature'];
							$firstname = $user['first_name'];
							$middlename = $user['middle_name'];
							$lastname = $user['last_name'];
							// $extname = $user['ext_name'];
							$guestId = $user['id'];
							$guestUserId = $user['user_id'];
							break;
						}
					}
				}
				else
				{
					$_SESSION['error_added2'] = 'This guest was not registered!';
					$this->session->markAsFlashdata('error_added2');
					$data['viewName'] = 'Modules\Scan\Views\scans\qrcode';
					echo view('App\Views\theme\index2', $data);
				}
				//checking if user is user credential is valid
				if($registerOK == 1)
				{
					$visitOK = 0;
					$visit_guest = $visit_model->getVisitWithCondition(['id' => $_POST['id'],'user_id' => $guestUserId, 'status' => 'a']);
					//checking of visits existense
					if(!empty($visit_guest))
					{
						foreach($visit_guest as $user)
						{
							if($_POST['user_id'] == $user['user_id'])
							{
								$visitOK = 1;
								$visitId = $user['id'];
								$visitUserId = $user['user_id'];
								$visitPatientId = $user['patient_id'];
								$visitLoginId = $user['log_in'];
								break;
							}
						}
					}
					else
					{
						$data['error_added2'] = 'Tap your QR Code if you want to exit!';
						$data['viewName'] = 'Modules\Scan\Views\scans\qrcode';
						echo view('App\Views\theme\index2', $data);
					} // end checking of visits existense

					if($visitOK == 1)
					{
						$checklistOK = 0;
						$checklists = $model->getChecklistWithCondition(['user_id' => $_POST['user_id'],'visit_id' => $_POST['id'],'status' => 'a']);

						if($visitLoginId == NULL)
						{
							//checking of user existense
							if(!empty($checklists))
							{
								foreach($checklists as $user)
								{
									if($_POST['user_id'] == $user['user_id'] && $_POST['temperature'] != NULL)
									{
										$checklistOK = 1;
										// die($user['temperature']);
										$checklistId = $user['id'];
										$oneId = $user['one_a'];
										$twoId = $user['one_b'];
										$threeId = $user['one_c'];
										$fourId = $user['one_d'];
										$fiveId = $user['one_e'];
										$sixId = $user['one_f'];
										$checklistUserId = $user['user_id'];
										break;
									}
								}
							}
							else
							{
								$_SESSION['error_added2'] = 'Can\'t find checklist!';
								$this->session->markAsFlashdata('error_added2');
								$data['viewName'] = 'Modules\Scan\Views\scans\qrcode';
								echo view('App\Views\theme\index2', $data);
							}
							//checking if user is user credential is valid
							if($checklistOK == 1)
							{
								if($_POST['temperature'] <= 36 || $_POST['temperature'] >= 37.3){
									$_POST['status_defined'] = 'd';
								}elseif($_POST['temperature'] <= 36 || $_POST['temperature'] >= 37.3 && $oneId == 'yes'){
									$_POST['status_defined'] = 'd';
								}elseif($_POST['temperature'] <= 36 || $_POST['temperature'] >= 37.3 && $twoId == 'yes'){
									$_POST['status_defined'] = 'd';
								}elseif($_POST['temperature'] <= 36 || $_POST['temperature'] >= 37.3 && $threeId == 'yes'){
									$_POST['status_defined'] = 'd';
								}elseif($_POST['temperature'] <= 36 || $_POST['temperature'] >= 37.3 && $fourId == 'yes'){
									$_POST['status_defined'] = 'd';
								}elseif($_POST['temperature'] <= 36 || $_POST['temperature'] >= 37.3 && $fiveId == 'yes'){
									$_POST['status_defined'] = 'd';
								}elseif($_POST['temperature'] <= 36 || $_POST['temperature'] >= 37.3 && $sixId == 'yes'){
									$_POST['status_defined'] = 'd';
								}else{
									$_POST['status_defined'] = 'u';
								}
								if($this->validate('temperature'))
								{
										$models = new VisitsModel();
										$val_array = [
											'patient_id' => $_POST['user_id'],
											'log_in' => date('Y-m-d H:i:s'),
										];
										if($models->edit_visits_login($val_array, $visitId)){
											$_SESSION['success_added2'] = 'Visit Has Ended';
											$this->session->markAsFlashdata('success_added2');
										}
										// die($_POST['status_defined']);
										if($model->edit_checklist($_POST, $checklistId))
										{
											$data['guest_defined'] = $guest_model->getGuestDefined();
											$data['guest_definedAt'] = $guest_model->getGuestDefinedAt();
											$data['success_added2'] = '<b><i class="fas fa-user"></i> '.$firstname.' '.$middlename.' '.$lastname.'</b> is Successfully Login!';
											$data['viewName'] = 'Modules\Scan\Views\scans\qrcode';
											echo view('App\Views\theme\index2', $data);
										}
							 	 }
								 else
								 {
									$data['errors'] = \Config\Services::validation()->getErrors();
									$data['viewName'] = 'Modules\Scan\Views\scans\qrcode';
									echo view('App\Views\theme\index2', $data);
								 }
							}
							else
							{
								$visit_guest_logout = $visit_model->getVisitWithCondition(['id' => $_POST['id'],'user_id' => $guestUserId, 'status' => 'a']);
								$visit_guest_logoutOK = 0;
								//checking of user existense
								if(!empty($visit_guest_logout))
								{
									foreach($visit_guest_logout as $user)
									{
										if($user['log_in'] != NULL && $user['log_out'] == NULL)
										{
											$visit_guest_logoutOK = 1;
											// die($user['temperature']);
											break;
										}
									}
								}else{
									$data['error_added2'] = '<b>Please input your body temperature!</b>';
									$data['viewName'] = 'Modules\Scan\Views\scans\qrcode';
									echo view('App\Views\theme\index2', $data);
								}
								if($visit_guest_logoutOK == 1){
												$modelss = new VisitsModel();
												$val_array = [
													'patient_id' => $_POST['user_id'],
													'log_out' => date('Y-m-d H:i:s'),
												];
											 if($modelss->edit_visits_logout($val_array, $visitId)){
										 			$data['guest_defined'] = $guest_model->getGuestDefined();
										 			$data['guest_definedAt'] = $guest_model->getGuestDefinedAt();
													$data['success_added2'] = '<b><i class="fas fa-user"></i> '.$firstname.' '.$middlename.' '.$lastname.'</b> is Successfully Logout!';
													$data['viewName'] = 'Modules\Scan\Views\scans\qrcode';
													echo view('App\Views\theme\index2', $data);
											 }
											 else
							 					{
							 						$data['viewName'] = 'Modules\Scan\Views\scans\qrcode';
							 						echo view('App\Views\theme\index2', $data);
							 					}
								}else{
									$data['error_added2'] = '<b>Please input your body temperature!</b>';
									$data['viewName'] = 'Modules\Scan\Views\scans\qrcode';
									echo view('App\Views\theme\index2', $data);
								}
							}
						}else{
							$visit_guest_logout = $visit_model->getVisitWithCondition(['id' => $_POST['id'],'user_id' => $guestUserId, 'status' => 'a']);
							$visit_guest_logoutOK = 0;
							//checking of user existense
							if(!empty($visit_guest_logout))
							{
								foreach($visit_guest_logout as $user)
								{
									if($user['log_in'] != NULL && $user['log_out'] == NULL)
									{
										$visit_guest_logoutOK = 1;
										// die($user['temperature']);
										break;
									}
								}
							}else{
								$data['error_added2'] = '<b>Your QR Code was not Updated! Please update your data and start to take health declaration form in website!</b>';
								$data['viewName'] = 'Modules\Scan\Views\scans\qrcode';
								echo view('App\Views\theme\index2', $data);
							}
							if($visit_guest_logoutOK == 1){
											$modelss = new VisitsModel();
											$val_array = [
												'patient_id' => $_POST['user_id'],
												'log_out' => date('Y-m-d H:i:s'),
											];
										 if($modelss->edit_visits_logout($val_array, $visitId)){
												$data['guest_defined'] = $guest_model->getGuestDefined();
												$data['guest_definedAt'] = $guest_model->getGuestDefinedAt();
												$data['success_added2'] = '<b><i class="fas fa-user"></i> '.$firstname.' '.$middlename.' '.$lastname.'</b> is Successfully Logout!';
												$data['viewName'] = 'Modules\Scan\Views\scans\qrcode';
												echo view('App\Views\theme\index2', $data);
										 }
										 else
											{
												$data['viewName'] = 'Modules\Scan\Views\scans\qrcode';
												echo view('App\Views\theme\index2', $data);
											}
							}
							else{
								$data['error_added2'] = '<b>Your QR Code was not Updated! Please update your data and start to take health declaration form in website!</b>';
								$data['viewName'] = 'Modules\Scan\Views\scans\qrcode';
								echo view('App\Views\theme\index2', $data);
							}
							// $data['error_added2'] = '<b>You are already login. Please tap your QR Code only for logout!</b>';
							// $data['viewName'] = 'Modules\Scan\Views\scans\qrcode';
							// echo view('App\Views\theme\index2', $data);
						}
					}
					else
					{
						$data['error_added2'] = '<b>Your QR Code was not Updated! Please update your data and start to take health declaration form in website!</b>';
						$data['viewName'] = 'Modules\Scan\Views\scans\qrcode';
						echo view('App\Views\theme\index2', $data);
					}
				}
				// else
				// {
				// 	$data['error_added2'] = 'This guest was not registered!';
				// 	$data['viewName'] = 'Modules\Scan\Views\scans\qrcode';
				// 	echo view('App\Views\theme\index2', $data);
				// }
			}
			elseif($_POST['temperature'] == true)
			{
				$data['error_added2'] = '<b>Please point the qrcode straight at the camera for proper scanning!</b>';
				$data['viewName'] = 'Modules\Scan\Views\scans\qrcode';
				echo view('App\Views\theme\index2', $data);
			}
			else
			{
				$data['error_added2'] = '<b>Please input your body temperature and rescan your QR Code!</b>';
				$data['viewName'] = 'Modules\Scan\Views\scans\qrcode';
				echo view('App\Views\theme\index2', $data);
			}
	 }

}
