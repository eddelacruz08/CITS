<?php
namespace Modules\Maintenances\Controllers;

use Modules\Maintenances\Models\GuidelinesModel;
use Modules\UserManagement\Models\PermissionsModel;
use App\Controllers\BaseController;

class Guidelines extends BaseController
{

	public function __construct()
	{
		parent:: __construct();

		$this->guidelinesModel = new GuidelinesModel();
		$permissions_model = new PermissionsModel();
		$this->permissions = $permissions_model->getPermissionsWithCondition(['status' => 'a']);
	}

	public function index(){
		$this->hasPermissionRedirect('list-guidelines');

		$data['guidelinesActive'] = $this->guidelinesModel->get(['status'=> 'a']);
		$data['function_title_active'] = "Guidelines";
		$data['viewName'] = 'Modules\Maintenances\Views\guidelines\index';
		echo view('App\Views\theme\index', $data);
	}

	public function edit($id){
		$this->hasPermissionRedirect('edit-guidelines');
		helper(['form', 'url']);
		$data['rec'] = $this->guidelinesModel->find($id);
		if(!empty($_POST)){
			if (!$this->validate('guidelines')){
				$data['errors'] = \Config\Services::validation()->getErrors();
				$data['function_title'] = "Edit of Guidelines";
				$data['viewName'] = 'Modules\Maintenances\Views\guidelines\frmGuideline';
				echo view('App\Views\theme\index', $data);
			}else{
				if($this->guidelinesModel->edit_maintenance($_POST, $id)){
					$_SESSION['success'] = 'You have updated a record';
					$this->session->markAsFlashdata('success');
					return redirect()->to(base_url('guidelines'));
				}else{
					$_SESSION['error'] = 'You an error in updating a record';
					$this->session->markAsFlashdata('error');
					return redirect()->to( base_url('guidelines'));
				}
			}
		}else{
			$data['function_title'] = "Edit of Guidelines";
			$data['viewName'] = 'Modules\Maintenances\Views\guidelines\frmGuideline';
			echo view('App\Views\theme\index', $data);
		}
	}
}
