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
					$checklistData = $this->checklistsModel->getLatestChecklistDate($id);
					if(!empty($checklistData)){
						$assessData = $this->guestAssessmentModel->getLatestGuestAssessment($id);
						if(!empty($assessData)){
							foreach($assessData as $latestAssess){
								$assessId = $latestAssess['id'];
								$reasonAssessId = $latestAssess['reason_id'];
								break;
							}
							if($reasonAssessId == 0){
								$guidelineData = $this->guidelinesModel->get(['status'=>'a']);
								foreach($guidelineData as $guideline){
									$guidelineInfo = $guideline['content'];
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
									}else{
										$emailStatus = 0;
									}
								}
								$reasonChecklistId = $_POST['reason_id'];
								$val_array = [
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
									return redirect()->to(base_url().'HealthDeclaration/request_form');
								}
							}else{
								$_SESSION['error'] = 'You already taken Health Declaration Form for your reason. Please try tommorrow!';
								$this->session->markAsFlashdata('error');
								return redirect()->to(base_url('HealthDeclaration/request_form'));
							}
						}else{
							$_SESSION['error'] = 'You already taken Health Declaration Form for your reason. Please try tommorrow!';
							$this->session->markAsFlashdata('error');
							return redirect()->to(base_url('HealthDeclaration/request_form'));
						}
					}else{
						$_SESSION['error'] = 'You dont have an updated self-assessment. Please answer Health Declaration Form in your website.';
						$this->session->markAsFlashdata('error');
						return redirect()->to(base_url('HealthDeclaration/request_form'));
					}
                }
			}else{
				return redirect()->to(base_url('HealthDeclaration/request_form'));
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