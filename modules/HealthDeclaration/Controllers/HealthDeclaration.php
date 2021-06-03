<?php
namespace Modules\HealthDeclaration\Controllers;

use Modules\UserManagement\Models\PermissionsModel;
use Modules\UserManagement\Models\UsersModel;
use Modules\HealthDeclaration\Models\HealthDeclarationModel;
use Modules\Visits\Models\ChecklistModel;
use Modules\Visits\Models\VisitsModel;
// use Modules\Maintenances\Models\DepartmentModel;
use Modules\Maintenances\Models\QuestionModel;
use Modules\Scan\Models\QrcodeAttendanceModel;
use App\Controllers\BaseController;;
use CodeIgniter\I18n\Time;

class HealthDeclaration extends BaseController
{
	public function __construct()
	{
		parent:: __construct();
		$permissions_model = new PermissionsModel();
		$this->permissions = $permissions_model->getPermissionsWithCondition(['status' => 'a']);

	}
  public function index()
  {
		$model = new UsersModel();
		$visit_model = new VisitsModel();
		$checklist_model = new ChecklistModel();
		// $department_model = new DepartmentModel();
		$question_model = new QuestionModel();
		$data['latest_checklist_date'] = $checklist_model->getDate($_SESSION['uid']);
		$guest_id = $model->getGuestWithCondition(['id' => $_SESSION['uid'], 'status' => 'a']);
		$data['questions'] = $question_model->get();
		// $data['questionself'] = $model->getSelfAssessmentHistory();
		$data['health_summary'] = $checklist_model->getHealthTrendSummary($_SESSION['uid']);
		$data['latest_checklist'] = $checklist_model->getLatestChecklistDate($_SESSION['uid']);
		$data['profile'] = $model->getProfile($_SESSION['uid']);
		$data['profiles'] = $model->getProfile($_SESSION['uid']);
		$data['function_title'] = "Latest Health Declaration Checklist";
		$data['viewName'] = 'Modules\HealthDeclaration\Views\healthdeclaration\index';
		echo view('App\Views\theme\indexHealth', $data);
  }
  public function capture_checklists($id)
  {
		$model = new ChecklistModel();
		$visit_model = new VisitsModel();
		$users_model = new UsersModel();
		$question_model = new QuestionModel();
		$assess_model = new QrcodeAttendanceModel();
		$data['questions'] = $question_model->get(['status' => 'a']);
		$data['checklist_counts'] = $model->getChecklistCount($_SESSION['uid']);
		$data['visit_counts'] = $model->getVisitsCount($_SESSION['uid']);
		$data['assess_counts'] = $model->getAssessCount($_SESSION['uid']);
		$data['profile'] = $users_model->getProfile($_SESSION['uid']);
		$data['profiles'] = $users_model->getProfile($_SESSION['uid']);
		$data['latest_checklist_date'] = $model->getDate($_SESSION['uid']);

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
					$assess_model->add_assess($val_array);
				}
				$_POST['user_id'] = $_SESSION['uid'];
				if($model->add($_POST)){
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
			echo view('App\Views\theme\indexHealth', $data);
		}
    }
}
