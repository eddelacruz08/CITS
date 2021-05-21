<?php
namespace Modules\HealthDeclaration\Controllers;

use Modules\UserManagement\Models\PermissionsModel;
use Modules\UserManagement\Models\UsersModel;
use Modules\HealthDeclaration\Models\HealthDeclarationModel;
use Modules\Visits\Models\ChecklistModel;
use Modules\Visits\Models\VisitsModel;
use Modules\Maintenances\Models\DepartmentModel;
use Modules\Maintenances\Models\QuestionModel;
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
		$department_model = new DepartmentModel();
		$question_model = new QuestionModel();
		$data['latest_checklist_date'] = $checklist_model->getDate($_SESSION['uid']);
		$guest_id = $model->getGuestWithCondition(['id' => $_SESSION['uid'], 'status' => 'a']);
		$data['questions'] = $question_model->get();
		$data['questionself'] = $model->getSelfAssessmentHistory();
		$data['health_summary'] = $checklist_model->getHealthTrendSummary($_SESSION['uid']);
		$data['latest_checklist'] = $checklist_model->getLatestChecklistDate($_SESSION['uid']);
	
		foreach ($data['latest_checklist'] as $health )
		{
			$date = $health['created_date'];
			$temperature = $health['temperature'];

			$time = new Time( $date, 'Asia/Manila','en_US');
			$hour = $time->format('H');
			if($hour < 12){
				$data['temp'] = '<b>PM Temperature</b>: '.$temperature;
			}else{
				$data['temp'] = '<b>AM Temperature</b>: '.$temperature;
			}
		}
			$data['departments'] = $department_model->get(['status' => 'a']);

			$data['profile'] = $model->getProfile($_SESSION['uid']);
			$data['function_title'] = "Latest Health Declaration Checklist";
			$data['viewName'] = 'Modules\HealthDeclaration\Views\healthdeclaration\index';
			echo view('App\Views\theme\indexHealth', $data);
  }
  public function capture_checklists($id)
  {
		$model = new ChecklistModel();
		$visit_model = new VisitsModel();
		$users_model = new UsersModel();
		$department_model = new DepartmentModel();
		$question_model = new QuestionModel();
		$val_array = [
			'user_id' => $_SESSION['uid'],
		];

		$data['departments'] = $department_model->get(['status' => 'a']);
		$data['questions'] = $question_model->get(['status' => 'a']);

		$data['checklist_counts'] = $model->getChecklistCount($_SESSION['uid']);
		$data['visit_counts'] = $model->getVisitsCount($_SESSION['uid']);
		$data['assess_counts'] = $model->getAssessCount($_SESSION['uid']);
		$data['profile'] = $users_model->getProfile($_SESSION['uid']);

		if($_POST){
			$checkbox = $_POST['question_id'];
			$check = "";
			if ($_POST['question_id'] == TRUE) {
				foreach ($checkbox as $checkboxResult) {
					$check .= $checkboxResult.",";
				}
			}
			if($_POST['question_id'] == TRUE){
				$_POST['status_defined'] = 'ws';
			}
			if (isset($_POST['question']) == TRUE) {
				$_POST['question_id'] = $_POST['question'];
			}else{
				$_POST['question_id'] = $check;
			}

			$_POST['user_id'] = $_SESSION['uid'];
				if($model->add($_POST)){
					$_SESSION['success'] = 'You have Successfuly added a checklist!';
					$this->session->markAsFlashdata('success');
					return redirect()->to(base_url('profile'));
				}
				else{
					$_SESSION['error'] = 'You have an error in adding a record!';
					$this->session->markAsFlashdata('error');
					return redirect()->to( base_url('profile'));
				}
		}
		else{
			$data['viewName'] = 'Modules\HealthDeclaration\Views\healthdeclaration\frmChecklist';
			echo view('App\Views\theme\indexHealth', $data);
		}
  }

}
