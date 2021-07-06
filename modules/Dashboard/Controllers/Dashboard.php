<?php namespace Modules\Dashboard\Controllers;

use Modules\UserManagement\Models\PermissionsModel;
use Modules\UserManagement\Models\UsersModel;
use Modules\Dashboard\Models\DashboardModel;
use Modules\Visits\Models\ChecklistModel;
use Modules\Guests\Models\GuestsModel;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{

	public function __construct(){
		parent:: __construct();
		$permissions_model = new PermissionsModel();
		$this->permissions = $permissions_model->getPermissionsWithCondition(['status' => 'a']);

	}
	public function index(){
		$this->hasPermissionRedirect('dashboard');
		$data['function_title'] = "Dashboard";
		$model = new UsersModel();
		$data['user_total'] = $model->getUsersTotal();
		/////////// student //////////////////////////////
		$data['student_total'] = $model->getStudentTotal();
		$data['student_male'] = $model->getStudentMale();
		$data['student_female'] = $model->getStudentFemale();
		/////////// outsider //////////////////////////////
		$data['faculty_total'] = $model->getFacultyTotal();
		$data['faculty_male'] = $model->getFacultyMale();
		$data['faculty_female'] = $model->getFacultyFemale();
		/////////// faculty //////////////////////////////
		$data['employee_total'] = $model->getEmployeeTotal();
		$data['employee_male'] = $model->getEmployeeMale();
		$data['employee_female'] = $model->getEmployeeFemale();
		/////////// outsider //////////////////////////////
		$data['outsider_total'] = $model->getOutsiderTotal();
		$data['outsider_male'] = $model->getOutsiderMale();
		$data['outsider_female'] = $model->getOutsiderFemale();
		///////////// patient defined List//////////////////////////////
		$data['guest_defined_list'] = $model->getGuestDefinedList();
		// /////////// patient assess List//////////////////////////////
		$data['patient_assess_list'] = $model->getPatientAssessList();
		$data['viewName'] = 'Modules\Dashboard\Views\dashboard\index';
		echo view('theme\index', $data);
  	}

}
