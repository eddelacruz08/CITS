<?php
namespace Modules\Maintenances\Controllers;

use Modules\Maintenances\Models\GenderModel;
use Modules\UserManagement\Models\PermissionsModel;
use Modules\Logs\Models\LogsModel;
use App\Controllers\BaseController;

use \Mpdf\Mpdf;

class Genders extends BaseController
{

	public function __construct()
	{
		parent:: __construct();

		$permissions_model = new PermissionsModel();
		$this->logsModel = new LogsModel();
		$this->permissions = $permissions_model->getPermissionsWithCondition(['status' => 'a']);
	}

  public function index()
  {
  	$this->hasPermissionRedirect('list-gender');

  	$model = new GenderModel();

    $data['genderActive'] = $model->orderBy('gender', 'asc')->get(['status'=> 'a']);
    $data['genderInactive'] = $model->get(['status'=> 'b']);

    $data['function_title_active'] = "Active Gender List";
    $data['function_title_inactive'] = "Inactive Gender List";
    $data['viewName'] = 'Modules\Maintenances\Views\genders\index';
    echo view('App\Views\theme\index', $data);
  }


  public function add_gender()
  {
		$this->hasPermissionRedirect('add-gender');

		helper(['form', 'url']);
		$model = new GenderModel();

		if(!empty($_POST))
		{
			if (!$this->validate('gender'))
			{
				$data['errors'] = \Config\Services::validation()->getErrors();
			$data['function_title'] = "Adding Gender";
			$data['viewName'] = 'Modules\Maintenances\Views\genders\frmGender';
			echo view('App\Views\theme\index', $data);
			}
			else
			{
				if($model->add_maintenance($_POST))
				{
					$val_array = [ 
						'user_id' => $_SESSION['rid'],
						'activity' => 'added a gender'
					];
					$this->logsModel->add($val_array);
					$_SESSION['success'] = 'You have added a new record';
							$this->session->markAsFlashdata('success');
					return redirect()->to(base_url('genders'));
				}
				else
				{
					$_SESSION['error'] = 'You have an error in adding a new record';
							$this->session->markAsFlashdata('error');
					return redirect()->to(base_url('genders'));
				}
			}
		}
		else
		{
			$data['function_title'] = "Adding Gender";
		$data['viewName'] = 'Modules\Maintenances\Views\genders\frmGender';
		echo view('App\Views\theme\index', $data);
		}
	}

	public function edit_gender($id)
	{
		$this->hasPermissionRedirect('edit-gender');
		helper(['form', 'url']);
		$model = new GenderModel();
		$data['rec'] = $model->find($id);

		if(!empty($_POST))
		{
			if (!$this->validate('gender'))
			{
				$data['errors'] = \Config\Services::validation()->getErrors();
					$data['function_title'] = "Edit of Gender";
					$data['viewName'] = 'Modules\Maintenances\Views\genders\frmGender';
					echo view('App\Views\theme\index', $data);
			}
			else
			{
				if($model->edit_maintenance($_POST, $id))
				{
					$val_array = [ 
						'user_id' => $_SESSION['rid'],
						'activity' => 'updated a gender'
					];
					$this->logsModel->add($val_array);
					$_SESSION['success'] = 'You have updated a record';
					$this->session->markAsFlashdata('success');
					return redirect()->to(base_url('genders'));
				}
				else
				{
					$_SESSION['error'] = 'You an error in updating a record';
					$this->session->markAsFlashdata('error');
					return redirect()->to( base_url('genders'));
				}
			}
		}
		else
		{
				$data['function_title'] = "Edit of Gender";
				$data['viewName'] = 'Modules\Maintenances\Views\genders\frmGender';
				echo view('App\Views\theme\index', $data);
		}
	}
}
