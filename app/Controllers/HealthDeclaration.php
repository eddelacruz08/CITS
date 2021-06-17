<?php namespace App\Controllers;
use Modules\UserManagement\Models\UsersModel;
use Modules\UserManagement\Models\RolesModel;
use Modules\Maintenances\Models\ReasonsModel;
use Modules\Maintenances\Models\GuidelinesModel;
use Modules\Maintenances\Models\QuestionModel;
use Modules\Visits\Models\ChecklistModel;
use Modules\Visits\Models\VisitsModel;
use Modules\Scan\Models\QrcodeAttendanceModel;
use Modules\HealthDeclaration\Models\ReasonChecklistsModel;
use Modules\GuestAssessment\Models\GuestAssessmentModel;

class HealthDeclaration extends BaseController{
	
	public function __construct(){
		parent:: __construct();
		$this->usersModel = new UsersModel();
		$this->visitsModel = new VisitsModel();
		$this->checklistsModel = new ChecklistModel();
		$this->questionsModel = new QuestionModel();
		$this->reasonsModel = new ReasonsModel();
		$this->guidelinesModel = new GuidelinesModel();
		$this->reasonsChecklistModel = new ReasonChecklistsModel();
		$this->assessModel = new QrcodeAttendanceModel();
		$this->guestAssessmentModel = new GuestAssessmentModel();
	}

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

	public function request_form(){
		$data = [];
		$data['reasons'] = $this->reasonsModel->get(['status' => 'a']);
		$data['questions'] = $this->questionsModel->get(['status' => 'a']);
		if($this->request->getMethod() === 'post'){
			$usersData = $this->usersModel->getUserWithCondition(['email'=>$_POST['email'], 'status'=>'a']);
			$checkUser = 0;
			if(!empty($usersData)){
                foreach ($usersData as $user) {
                    if($_POST['email']==$user['email']){
                        $id = $user['id'];
                        $checkUser = 1;
                        break;
                    }
                }
			}else{
				$data['viewName'] = 'healthform';
				echo view('outside_layout\index', $data);
			}
			if($checkUser == 1){
                if(!$this->validate('requestChecklist')){
                    $data['value'] = $_POST;
                    $data['errors'] = \Config\Services::validation()->getErrors();
                    $data['viewName'] = 'healthform';
                    echo view('outside_layout\index', $data);
                }else{
					$guidelineData = $this->guidelinesModel->get(['status'=>'a']);
					foreach($guidelineData as $guideline){
						$guidelineInfo = $guideline['content'];
						break;
					}
					$checklistData = $this->checklistsModel->getLatestChecklistDate($id);
					foreach($checklistData as $latestChecklist){
						$checklistId = $latestChecklist['id'];
						break;
					}
                    $_POST['user_id'] = $id;
					$emailStatus = 1;
					if($_POST['q_one'] == 'yes' ||
						$_POST['q_two'] == 'yes' ||
						$_POST['q_three'] == 'yes' ||
						$_POST['q_four'] == 'yes' ||
						$_POST['q_five'] == 'yes'){
						$_POST['status_defined'] = 'ws';
						
						$emailStatus = 0;
						$to = $_SESSION['email'];
						$subject = 'Guidelines for Guest with Symptoms';
						$message = $guidelineInfo;
						$email = \Config\Services::email();
						$email->setTo($to);
						$email->setFrom('United Coders Dev Team', SYSTEM_NAME);
						$email->setSubject($subject);
						$email->setMessage($message);
						if($email->send()){
							$emailStatus = 1;
						}
					}
					$assessData = $this->guestAssessmentModel->getLatestGuestAssessment($id);
					foreach($assessData as $latestAssess){
						$assessId = $latestAssess['id'];
						break;
					}
					// die($_POST['reason_id']);
					$reasonChecklistId = $_POST['reason_id'];
					$val_array = [
						'checklist_id' => $checklistId,
						'reason_id' => $reasonChecklistId,
						'email_status' => $emailStatus,
					];
					$this->guestAssessmentModel->edit_assess($val_array, $assessId);
                    if($this->reasonsChecklistModel->add($_POST)){
                        $_SESSION['success_request'] = 'You have Successfully fillup a Health Declaration Form!';
                        $this->session->markAsFlashdata('success_request');
                        $data['viewName'] = 'successForm';
                        echo view('outside_layout\index', $data);
                    }else{
                        $_SESSION['error'] = 'You have an error of adding a checklist!';
                        $this->session->markAsFlashdata('error');
                        $data['viewName'] = 'healthform';
                        echo view('outside_layout\index', $data);
                    }
                }
			}else{
				$data['viewName'] = 'healthform';
				echo view('outside_layout\index', $data);
			}
		}else{
			$data['viewName'] = 'healthform';
			echo view('outside_layout\index', $data);
		}
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