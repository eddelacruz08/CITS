<?php
namespace Modules\Profile\Controllers;

use Modules\UserManagement\Models\PermissionsModel;
use Modules\UserManagement\Models\UsersModel;
use Modules\Profile\Models\ProfileModel;
use Modules\Visits\Models\ChecklistModel;
use Modules\Maintenances\Models\CitiesModel;
use Modules\Maintenances\Models\ExtensionModel;
use Modules\Maintenances\Models\ProvinceModel;
use Modules\Maintenances\Models\GenderModel;
use Modules\Maintenances\Models\TypeModel;
use Modules\Maintenances\Models\QuestionModel;
use App\Controllers\BaseController;

class Profile extends BaseController
{
	private $gen;
	private $ext;
	private $cit;
	private $provinces;
	private $guest;

	public function __construct()
	{
		parent:: __construct();
		$permissions_model = new PermissionsModel();
		$extension_model = new ExtensionModel();
		$gender_model = new GenderModel();
		$province_model = new ProvinceModel();
		$city_model = new CitiesModel();
		$guest_type_model = new TypeModel();

		$this->permissions = $permissions_model->getPermissionsWithCondition(['status' => 'a']);
		$this->gen = $gender_model->getGenderWithCondition(['status' => 'a']);
		$this->provinces = $province_model->getProvinceWithCondition(['status' => 'a']);
		$this->guest = $guest_type_model->getTypeWithCondition(['status' => 'a']);
		$this->ext = $extension_model->getExtensionWithCondition(['status' => 'a']);
		$this->cit = $city_model->getCityWithCondition(['status' => 'a']);
	}

  public function index()
  {
	  	$this->hasPermissionRedirect('profile');

			$model = new ChecklistModel();
			$user_model = new UsersModel();
			$question_model = new QuestionModel();
			$data['function_title'] = "Profile";
			$data['checklist_counts'] = $model->getChecklistCount($_SESSION['uid']);
			$data['latest_checklist_date'] = $model->getDate($_SESSION['uid']);
			$data['questions'] = $question_model->get();
			$data['questionself'] = $model->getSelfAssessmentHistory();
			$data['visit_counts'] = $model->getVisitsCount($_SESSION['uid']);
			$data['profile'] = $user_model->getProfile($_SESSION['uid']);
			$data['assess_counts'] = $model->getAssessCount($_SESSION['uid']);
			$data['health_summary'] = $model->getHealthTrendSummary($_SESSION['uid']);
			$data['viewName'] = 'Modules\Profile\Views\profiles\index';
			echo view('App\Views\theme\indexProfile', $data);

  }

	public function update_user($id){

		$data['gen']	 = $this->gen;
		$data['guest'] = $this->guest;
		$data['ext']	 = $this->ext;
		$data['provinces'] = $this->provinces;
		$data['cit']	 = $this->cit;

		helper(['form', 'url', 'html']);
		$model = new UsersModel();
		$data['rec'] = $model->find($id);
		if(!empty($_POST))
		{
			if (!$this->validate('user_edit'))
			{
				$data['errors'] = \Config\Services::validation()->getErrors();
					$data['function_title'] = "Edit of User";
					$data['viewName'] = 'Modules\Profile\Views\profiles\frmUser';
					echo view('App\Views\theme\index', $data);
			}
			else
			{
				unset($_POST['password_retype']);
				if($model->editUsers($_POST, $id))
					{
						$_SESSION['success'] = 'You have updated a record';
				$this->session->markAsFlashdata('success');
						return redirect()->to( base_url('profile'));
					}
					else
					{
						$_SESSION['error'] = 'You an error in updating a record';
				$this->session->markAsFlashdata('error');
						return redirect()->to( base_url('profile'));
					}
			}
		}
		else
		{
			$data['function_title'] = "Editing of User";
				$data['viewName'] = 'Modules\Profile\Views\profiles\frmUser';
				echo view('App\Views\theme\index', $data);
		}
	}

}
