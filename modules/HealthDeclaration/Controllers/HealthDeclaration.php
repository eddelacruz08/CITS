<?php
namespace Modules\HealthDeclaration\Controllers;

use Modules\UserManagement\Models\PermissionsModel;
use Modules\UserManagement\Models\UsersModel;
use Modules\HealthDeclaration\Models\ReasonsModel;
use Modules\Visits\Models\ChecklistModel;
use Modules\Visits\Models\VisitsModel;
use Modules\Maintenances\Models\QuestionModel;
use Modules\Scan\Models\QrcodeAttendanceModel;
use App\Controllers\BaseController;;
use CodeIgniter\I18n\Time;

class HealthDeclaration extends BaseController
{
	public function __construct()
	{
		parent:: __construct();
		$this->usersModel = new UsersModel();
		$this->visitsModel = new VisitsModel();
		$this->checklistsModel = new ChecklistModel();
		$this->questionsModel = new QuestionModel();
		$this->reasonsModel = new ReasonsModel();
		$this->assessModel = new QrcodeAttendanceModel();
		$permissions_model = new PermissionsModel();
		$this->permissions = $permissions_model->getPermissionsWithCondition(['status' => 'a']);
	}

	public function index()
	{
		$data['reasons'] = $this->reasonsModel->getReasonWithCondition(['status' => 'a']);
		$data['latest_checklist_date'] = $this->checklistsModel->getDate($_SESSION['uid']);
		$data['questions'] = $this->questionsModel->get();
		$data['health_summary'] = $this->checklistsModel->getHealthTrendSummary($_SESSION['uid']);
		$data['profile'] = $this->usersModel->getProfile($_SESSION['uid']);
		$data['profiles'] = $this->usersModel->getProfile($_SESSION['uid']);
		$data['function_title'] = "Latest Health Declaration Checklist";
		$data['viewName'] = 'Modules\HealthDeclaration\Views\healthdeclaration\index';
		echo view('theme\indexHealth', $data);
	}

	public function capture_checklists($id)
	{
		$data['questions'] = $this->questionsModel->get(['status' => 'a']);
		$data['checklist_counts'] = $this->checklistsModel->getChecklistCount($_SESSION['uid']);
		$data['visit_counts'] = $this->checklistsModel->getVisitsCount($_SESSION['uid']);
		$data['assess_counts'] = $this->checklistsModel->getAssessCount($_SESSION['uid']);
		$data['profile'] = $this->usersModel->getProfile($_SESSION['uid']);
		$data['profiles'] = $this->usersModel->getProfile($_SESSION['uid']);
		$data['latest_checklist_date'] = $this->checklistsModel->getDate($_SESSION['uid']);

		if($this->request->getMethod() === 'post'){
			if (!$this->validate('checklists')){
				$data['value'] = $_POST;
				$data['errors'] = \Config\Services::validation()->getErrors();
				$data['viewName'] = 'Modules\HealthDeclaration\Views\healthdeclaration\frmChecklist';
				echo view('App\Views\theme\indexHealth', $data);
			}else{
				if($_POST['q_one'] == 'yes' ||
					$_POST['q_two'] == 'yes' ||
					$_POST['q_three'] == 'yes' ||
					$_POST['q_four'] == 'yes' ||
					$_POST['q_five'] == 'yes'){
					$_POST['status_defined'] = 'ws';
					
					// $to = $email;
					// $subject = 'Forgot Password';
					// $message = 'Hi '.$firstname.' '.$lastname.'!<br><a href="'.base_url().'ResetPassword/index"> Reset your password here!</a>';
					// $email = \Config\Services::email();
					// $email->setTo($to);
					// $email->setFrom('United Coders Dev Team', SYSTEM_NAME);
					// $email->setSubject($subject);
					// $email->setMessage($message);
					// $email->send();
					$val_array = [
						'user_id' => $_SESSION['uid'],
						'email_status' => 1,
					];
					$this->assessModel->add_assess($val_array);
				}
				$_POST['user_id'] = $_SESSION['uid'];
				if($this->checklistsModel->add($_POST)){
					$_SESSION['success'] = 'You have Successfuly added a checklist!';
					$this->session->markAsFlashdata('success');
					return redirect()->to(base_url('health%20declaration'));
				}else{
					$_SESSION['error'] = 'You have an error in adding a record!';
					$this->session->markAsFlashdata('error');
					return redirect()->to( base_url('health%20declaration'));
				}
			}
		}else{
			$data['viewName'] = 'Modules\HealthDeclaration\Views\healthdeclaration\frmChecklist';
			echo view('theme\indexHealth', $data);
		}
    }
}
