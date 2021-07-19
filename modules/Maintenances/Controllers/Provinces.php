<?php
namespace Modules\Maintenances\Controllers;

use Modules\Maintenances\Models\ProvinceModel;
use Modules\UserManagement\Models\PermissionsModel;
use Modules\Logs\Models\LogsModel;
use App\Controllers\BaseController;

use \Mpdf\Mpdf;

class Provinces extends BaseController
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
  	$this->hasPermissionRedirect('list-province');

  	$model = new ProvinceModel();

    $data['provinceActive'] = $model->orderBy('province', 'asc')->get(['status'=> 'a']);
    $data['provinceInactive'] = $model->get(['status'=> 'b']);

    $data['function_title_active'] = "Active Province List";
    $data['function_title_inactive'] = "Inactive Province List";
    $data['viewName'] = 'Modules\Maintenances\Views\provinces\index';
    echo view('App\Views\theme\index', $data);
  }


	public function add_province()
	{
		$this->hasPermissionRedirect('add-province');

		helper(['form', 'url']);
		$model = new ProvinceModel();

		if(!empty($_POST))
		{
			if (!$this->validate('province'))
			{
				$data['errors'] = \Config\Services::validation()->getErrors();
				$data['function_title'] = "Adding Province";
				$data['viewName'] = 'Modules\Maintenances\Views\provinces\frmProvince';
				echo view('App\Views\theme\index', $data);
			}
			else
			{
				if($model->add_maintenance($_POST))
				{
					$val_array = [ 
						'user_id' => $_SESSION['rid'],
						'activity' => 'added a province'
					];
					$this->logsModel->add($val_array);
					$_SESSION['success'] = 'You have added a new record';
					$this->session->markAsFlashdata('success');
					return redirect()->to(base_url('provinces'));
				}
				else
				{
					$_SESSION['error'] = 'You have an error in adding a new record';
					$this->session->markAsFlashdata('error');
					return redirect()->to(base_url('provinces'));
				}
			}
		}
		else
		{
			$data['function_title'] = "Adding Province";
			$data['viewName'] = 'Modules\Maintenances\Views\provinces\frmProvince';
			echo view('App\Views\theme\index', $data);
		}
	}

	public function edit_province($id)
	{
		$this->hasPermissionRedirect('edit-province');
		helper(['form', 'url']);
		$model = new ProvinceModel();
		$data['rec'] = $model->find($id);

		if(!empty($_POST))
		{
			if (!$this->validate('province'))
			{
				$data['errors'] = \Config\Services::validation()->getErrors();
					$data['function_title'] = "Edit of Province";
					$data['viewName'] = 'Modules\Maintenances\Views\provinces\frmProvince';
					echo view('App\Views\theme\index', $data);
			}
			else
			{
				if($model->edit_maintenance($_POST, $id))
				{
					$val_array = [ 
						'user_id' => $_SESSION['rid'],
						'activity' => 'updated a province'
					];
					$this->logsModel->add($val_array);
					$_SESSION['success'] = 'You have updated a record';
					$this->session->markAsFlashdata('success');
					return redirect()->to(base_url('provinces'));
				}
				else
				{
					$_SESSION['error'] = 'You an error in updating a record';
					$this->session->markAsFlashdata('error');
					return redirect()->to( base_url('provinces'));
				}
			}
		}
		else
		{
				$data['function_title'] = "Edit of Province";
				$data['viewName'] = 'Modules\Maintenances\Views\provinces\frmProvince';
				echo view('App\Views\theme\index', $data);
		}
	}
}
