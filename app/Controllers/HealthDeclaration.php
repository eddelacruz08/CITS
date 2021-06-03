<?php namespace App\Controllers;

use Modules\UserManagement\Models\UsersModel;
use Modules\UserManagement\Models\RolesModel;
use Modules\Maintenances\Models\ReasonsModel;
use Modules\Maintenances\Models\QuestionModel;
use Modules\Visits\Models\ChecklistModel;
use Modules\Scan\Models\QrcodeAttendanceModel;

class HealthDeclaration extends BaseController{
	public function request($token = null){
		$usersModel = new UsersModel();
		$checklistsModel = new ChecklistModel();
		$question_model = new QuestionModel();
		$reasonsModel = new ReasonsModel();
		$assessModel = new QrcodeAttendanceModel();
		$data = [];
		if(!empty($token)){
			$data['reasons'] = $reasonsModel->get(['status' => 'a']);
			$data['questions'] = $question_model->get(['status' => 'a']);
			$userdata = $checklistsModel->verifyTokenChecklist($token);
			// die($token);
			if(!empty($userdata)){
				if($userdata['updated_date']==NULL){
					if ($this->checkExpiryDate($userdata['created_date'])) {
						// start of post
						if($_POST) {
							$passwordOK = 0;
							$users = $usersModel->getUserWithCondition(['id' => $userdata['user_id'], 'status' => 'a']);
							// start checking of user existense
							if(!empty($users)) {
								foreach($users as $user) {
									if($userdata['user_id'] == $user['id'])	{
										$passwordOK = 1;
										$id = $user['id'];
										$firstname = $user['firstname'];
										$lastname = $user['lastname'];
										$email = $user['email'];
										break;
									}
								}
							} else  {
							    $_SESSION['error_request'] = 'Cannot find form link!';
								$this->session->markAsFlashdata('error_request');
								$data['viewName'] = 'App\Views\healthform';
								echo view('App\Views\outside_layout\index', $data);
							}
							// end checking of user existense
							//checking if user is user credential is valid
							if($passwordOK == 1)  {
							    // die( $userdata['id']);
								// start of validation
								if (!$this->validate('requestChecklist'))	{
									$data['errors'] = \Config\Services::validation()->getErrors();
									$data['token'] = $userdata['token'];
									$data['viewName'] = 'App\Views\healthform';
									echo view('App\Views\outside_layout\index', $data);
								} else {
									if($_POST['q_one'] == 'yes' ||
										$_POST['q_two'] == 'yes' ||
										$_POST['q_three'] == 'yes' ||
										$_POST['q_four'] == 'yes' ||
										$_POST['q_five'] == 'yes'){
										$_POST['status_defined'] = 'ws';
										
										$to = $email;
										$subject = 'Health Declaration Guidelines';
										$message = 'Hi '.$firstname.' '.$lastname.', may sakit ka pre!';
										$email = \Config\Services::email();
										$email->setTo($to);
										$email->setFrom('United Coders Dev Team', SYSTEM_NAME);
										$email->setSubject($subject);
										$email->setMessage($message);
										$email->send();

										$val_array = [
											'user_id' => $_SESSION['uid'],
											'email_status' => '1',
										];
										$assessModel->add_assess($val_array);
									}
								    if($checklistsModel->edit($_POST, $userdata['id'])){
										$data['token'] = $userdata['token'];
										$_SESSION['success_request'] = '<b>You are successfully assess yourself!</b>.';
										$this->session->markAsFlashdata('success_request');
										$data['viewName'] = 'App\Views\successForm';
										echo view('App\Views\outside_layout\index', $data);
								    }else{
										$_SESSION['error_request'] = '<b>Error in changing password!</b><br>Please check your inputted details.';
										$this->session->markAsFlashdata('error_request');
										$data['viewName'] = 'App\Views\healthform';
										echo view('App\Views\outside_layout\index', $data);
							        }
									//end checking if user is user credential is valid
								}
								// end validation
							}else{
								$data['token'] = $userdata['token'];
							    $_SESSION['error_request'] = 'Cannot find form link!';
								$this->session->markAsFlashdata('error_request');
								$data['viewName'] = 'App\Views\healthform';
								echo view('App\Views\outside_layout\index', $data);
							}
						}else{
							$data['token'] = $userdata['token'];
							$data['viewName'] = 'App\Views\healthform';
							echo view('App\Views\outside_layout\index', $data);
						}
						// end of post
					}else{
						$data['error'] = 'Your requested form link has expired!';
						$data['viewName'] = 'App\Views\healthform';
						echo view('App\Views\outside_layout\index', $data);
					}
				}else{
					$data['error'] = 'You are already take assessment with this link!<br>This link was already expired.';
					$data['viewName'] = 'App\Views\healthform';
			    	echo view('App\Views\outside_layout\index', $data);
				}
			}else{
				$data['error'] = 'Cannot find you link! Please try to request again.';
				$data['viewName'] = 'App\Views\healthform';
			    echo view('App\Views\outside_layout\index', $data);
			}
		}else{
			$data['error'] = 'Sorry! Unauthourized access!';
			$data['viewName'] = 'App\Views\healthform';
		    echo view('App\Views\outside_layout\index', $data);
		}
			// end of post
	}

	public function checkExpiryDate($time)
	{
	  $updated_time = strtotime($time);
	  $current_time = time();
	  if ($current_time - $updated_time < 120) {
		return true;
	  }else{
		return false;
	  }
	}
}
