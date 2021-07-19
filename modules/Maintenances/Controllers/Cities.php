<?php
namespace Modules\Maintenances\Controllers;

use Modules\Maintenances\Models\CitiesModel;
use Modules\UserManagement\Models\PermissionsModel;
use Modules\Logs\Models\LogsModel;
use App\Controllers\BaseController;

use \Mpdf\Mpdf;

class Cities extends BaseController
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
		$this->hasPermissionRedirect('list-city');

		$model = new CitiesModel();

		$data['cityActive'] = $model->get(['status'=> 'a']);
		$data['cityInactive'] = $model->get(['status'=> 'b']);

		$data['function_title_active'] = "Active City List";
		$data['function_title_inactive'] = "Inactive City List";
		$data['viewName'] = 'Modules\Maintenances\Views\cities\index';
		echo view('App\Views\theme\index', $data);
	}


	public function add_city()
	{
		$this->hasPermissionRedirect('add-city');

		helper(['form', 'url']);
		$model = new CitiesModel();

		if(!empty($_POST))
		{
			if (!$this->validate('city'))
			{
				$data['errors'] = \Config\Services::validation()->getErrors();
				$data['function_title'] = "Adding City";
				$data['viewName'] = 'Modules\Maintenances\Views\cities\frmCity';
				echo view('App\Views\theme\index', $data);
			}
			else
			{
				if($model->add_maintenance($_POST))
				{
					$val_array = [ 
						'user_id' => $_SESSION['rid'],
						'activity' => 'added a city'
					];
					$this->logsModel->add($val_array);
					$_SESSION['success'] = 'You have added a new record';
							$this->session->markAsFlashdata('success');
					return redirect()->to(base_url('cities'));
				}
				else
				{
					$_SESSION['error'] = 'You have an error in adding a new record';
							$this->session->markAsFlashdata('error');
					return redirect()->to(base_url('cities'));
				}
			}
		}
		else
		{
			$data['function_title'] = "Adding City";
			$data['viewName'] = 'Modules\Maintenances\Views\cities\frmCity';
			echo view('App\Views\theme\index', $data);
		}
	}

	public function edit_city($id)
	{
		$this->hasPermissionRedirect('edit-city');
		helper(['form', 'url']);
		$model = new CitiesModel();
		$data['rec'] = $model->find($id);

		if(!empty($_POST))
		{
			if (!$this->validate('city'))
			{
				$data['errors'] = \Config\Services::validation()->getErrors();
					$data['function_title'] = "Edit of City";
					$data['viewName'] = 'Modules\Maintenances\Views\cities\frmCity';
					echo view('App\Views\theme\index', $data);
			}
			else
			{
				if($model->edit_maintenance($_POST, $id))
				{
					$val_array = [ 
						'user_id' => $_SESSION['rid'],
						'activity' => 'updated a city'
					];
					$this->logsModel->add($val_array);
					$_SESSION['success'] = 'You have updated a record';
					$this->session->markAsFlashdata('success');
					return redirect()->to(base_url('cities'));
				}
				else
				{
					$_SESSION['error'] = 'You an error in updating a record';
					$this->session->markAsFlashdata('error');
					return redirect()->to( base_url('cities'));
				}
			}
		}
		else
		{
				$data['function_title'] = "Edit of City";
				$data['viewName'] = 'Modules\Maintenances\Views\cities\frmCity';
				echo view('App\Views\theme\index', $data);
		}
	}
}
