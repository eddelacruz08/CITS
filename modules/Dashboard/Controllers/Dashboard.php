<?php namespace Modules\Dashboard\Controllers;

use Modules\UserManagement\Models\PermissionsModel;
use Modules\UserManagement\Models\UsersModel;
use Modules\Dashboard\Models\DashboardModel;
use Modules\Visits\Models\ChecklistModel;
use Modules\Guests\Models\GuestsModel;
use Modules\GuestAssessment\Models\GuestAssessmentModel;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{

	public function __construct(){
		parent:: __construct();
		$permissions_model = new PermissionsModel();
		$this->permissions = $permissions_model->getPermissionsWithCondition(['status' => 'a']);
		$this->usersModel = new UsersModel();
		$this->guestAssessmentModel = new DashboardModel();
	}
	public function index(){
		$this->hasPermissionRedirect('dashboard');
		$data['function_title'] = "Dashboard";

		$data['totalAssessPerDays'] = $this->guestAssessmentModel->getTotalAssessPerDay();
		$data['totalInvalidatedPerDays'] = $this->guestAssessmentModel->getTotalInvalidatedPerDay();
		$data['totalAssessments'] = $this->guestAssessmentModel->getTotalGuestAssessment();
		$data['totalInvalidated'] = $this->guestAssessmentModel->getTotalGuestInvalidated();
		$data['totalAssessmentLastYears'] = $this->guestAssessmentModel->getTotalAssessmentLastYear();
		$data['totalInvalidatedLastYears'] = $this->guestAssessmentModel->getTotalInvalidatedLastYear();
		/* stack bar chart */
		$data['getAssessmentMonthlyCount'] = $this->guestAssessmentModel->getAssessmentMonthlyCount();
		$data['getInvalidatedMonthlyCount'] = $this->guestAssessmentModel->getInvalidatedMonthlyCount();

		$data['user_total'] = $this->usersModel->getUsersTotal();
		/////////// student //////////////////////////////
		$data['student_total'] = $this->usersModel->getStudentTotal();
		$data['student_male'] = $this->usersModel->getStudentMale();
		$data['student_female'] = $this->usersModel->getStudentFemale();
		/////////// outsider //////////////////////////////
		$data['faculty_total'] = $this->usersModel->getFacultyTotal();
		$data['faculty_male'] = $this->usersModel->getFacultyMale();
		$data['faculty_female'] = $this->usersModel->getFacultyFemale();
		/////////// faculty //////////////////////////////
		$data['employee_total'] = $this->usersModel->getEmployeeTotal();
		$data['employee_male'] = $this->usersModel->getEmployeeMale();
		$data['employee_female'] = $this->usersModel->getEmployeeFemale();
		/////////// outsider //////////////////////////////
		$data['outsider_total'] = $this->usersModel->getOutsiderTotal();
		$data['outsider_male'] = $this->usersModel->getOutsiderMale();
		$data['outsider_female'] = $this->usersModel->getOutsiderFemale();
		///////////// patient defined List//////////////////////////////
		$data['guest_defined_list'] = $this->usersModel->getGuestDefinedList();
		// /////////// patient assess List//////////////////////////////
		$data['patient_assess_list'] = $this->usersModel->getPatientAssessList();
		$data['viewName'] = 'Modules\Dashboard\Views\dashboard\index';
		echo view('theme\index', $data);
  	}

}
