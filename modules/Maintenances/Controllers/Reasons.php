<?php
namespace Modules\Maintenances\Controllers;

use Modules\Maintenances\Models\ReasonsModel;
use Modules\UserManagement\Models\PermissionsModel;
use Modules\Logs\Models\LogsModel;
use App\Controllers\BaseController;

class Reasons extends BaseController
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
		$this->hasPermissionRedirect('list-reason');

		$model = new ReasonsModel();

		$data['reasonsActive'] = $model->orderBy('reason', 'asc')->get(['status'=> 'a']);
		$data['reasonsInactive'] = $model->get(['status'=> 'b']);

		$data['function_title_active'] = "Active Reason List";
		$data['function_title_inactive'] = "Inactive Reason List";
		$data['viewName'] = 'Modules\Maintenances\Views\reasons\index';
		echo view('App\Views\theme\index', $data);
	}


	public function add_reason(){
		$this->hasPermissionRedirect('add-reason');
		helper(['form', 'url']);
		$model = new ReasonsModel();
		if(!empty($_POST)){
			if (!$this->validate('reason')){
				$data['errors'] = \Config\Services::validation()->getErrors();
				$data['function_title'] = "Adding Reason";
				$data['viewName'] = 'Modules\Maintenances\Views\reasons\frmReason';
				echo view('App\Views\theme\index', $data);
			}else{
				if($model->add_maintenance($_POST)){
					$val_array = [ 
						'user_id' => $_SESSION['rid'],
						'activity' => 'added a reason'
					];
					$this->logsModel->add($val_array);
					$_SESSION['success'] = 'You have added a new record';
					$this->session->markAsFlashdata('success');
					return redirect()->to(base_url('reasons'));
				}else{
					$_SESSION['error'] = 'You have an error in adding a new record';
					$this->session->markAsFlashdata('error');
					return redirect()->to(base_url('reasons'));
				}
			}
		}else{
			$data['function_title'] = "Adding Reason";
			$data['viewName'] = 'Modules\Maintenances\Views\reasons\frmReason';
			echo view('App\Views\theme\index', $data);
		}
  	}

	public function edit_reason($id){
		$this->hasPermissionRedirect('edit-reason');
		helper(['form', 'url']);
		$model = new ReasonsModel();
		$data['rec'] = $model->find($id);
		if(!empty($_POST)){
			if (!$this->validate('reason')){
				$data['errors'] = \Config\Services::validation()->getErrors();
				$data['function_title'] = "Edit of Reason";
				$data['viewName'] = 'Modules\Maintenances\Views\reasons\frmReason';
				echo view('App\Views\theme\index', $data);
			}else{
				if($model->edit_maintenance($_POST, $id)){
					$val_array = [ 
						'user_id' => $_SESSION['rid'],
						'activity' => 'updated a reason'
					];
					$this->logsModel->add($val_array);
					$_SESSION['success'] = 'You have updated a record';
					$this->session->markAsFlashdata('success');
					return redirect()->to(base_url('reasons'));
				}else{
					$_SESSION['error'] = 'You an error in updating a record';
					$this->session->markAsFlashdata('error');
					return redirect()->to( base_url('reasons'));
				}
			}
		}else{
			$data['function_title'] = "Edit of Reason";
			$data['viewName'] = 'Modules\Maintenances\Views\reasons\frmReason';
			echo view('App\Views\theme\index', $data);
		}
	}
}
