<?php namespace App\Controllers;

use Modules\UserManagement\Models\UsersModel;
use Modules\UserManagement\Models\RolesModel;
use Modules\Maintenances\Models\CitiesModel;
use Modules\Maintenances\Models\ExtensionModel;
use Modules\Maintenances\Models\ProvinceModel;
use Modules\Maintenances\Models\GenderModel;
use Modules\Maintenances\Models\TypeModel;

class Registration extends BaseController
{
	private $roles;

	public function __construct()
	{
		parent:: __construct();

		$role_model = new RolesModel();
		$this->roles = $role_model->getRoleWithCondition(['status' => 'a']);
	}
	public function index()
	{
		// $this->hasPermissionRedirect('add-user');

		$data['roles'] = $this->roles;

		helper(['form', 'url']);
		$model = new UsersModel();
  	$extension_model = new ExtensionModel();
  	$gender_model = new GenderModel();
  	$province_model = new ProvinceModel();
  	$city_model = new CitiesModel();
  	$guest_type_model = new TypeModel();

    $data['extensions'] = $extension_model->get(['status'=> 'a']);
    $data['genders'] = $gender_model->get(['status'=> 'a']);
    $data['provinces'] = $province_model->get(['status'=> 'a']);
    $data['cities'] = $city_model->get(['status'=> 'a']);
    $data['guest_types'] = $guest_type_model->get(['status'=> 'a']);
		if(!empty($_POST))
		{
			if (!$this->validate('user'))
			{
				$data['errors'] = \Config\Services::validation()->getErrors();
				echo view('App\Views\register', $data);
			}
			else
			{
				$_POST['token'] = md5(str_shuffle('abcdefghijklmnopqrstuvwxyz'.time()));
				unset($_POST['password_retype']);
					if($model->addUsers($_POST))
					{
						$data['success'] = 'You have successfuly registered!';
						echo view('App\Views\register', $data);
					}
					else
					{
						$data['error'] = 'You have an error of adding a record!';
						echo view('App\Views\register', $data);
					}
			}
		}
		else
		{

			$data['function_title'] = "Registration";
			echo view('App\Views\register', $data);
		}
	}
}
