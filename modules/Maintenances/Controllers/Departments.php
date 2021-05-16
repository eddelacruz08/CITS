<?php
namespace Modules\Maintenances\Controllers;

use Modules\Maintenances\Models\DepartmentModel;
use Modules\UserManagement\Models\PermissionsModel;
use App\Controllers\BaseController;

use \Mpdf\Mpdf;

class Departments extends BaseController
{

	public function __construct()
	{
		parent:: __construct();

		$permissions_model = new PermissionsModel();
		$this->permissions = $permissions_model->getPermissionsWithCondition(['status' => 'a']);
	}

  public function index()
  {
  	$this->hasPermissionRedirect('list-department');

  	$model = new DepartmentModel();

    $data['departmentsActive'] = $model->orderBy('department', 'asc')->get(['status'=> 'a']);
    $data['departmentsInactive'] = $model->get(['status'=> 'b']);

    $data['function_title_active'] = "Active Department List";
    $data['function_title_inactive'] = "Inactive Department List";
    $data['viewName'] = 'Modules\Maintenances\Views\departments\index';
    echo view('App\Views\theme\index', $data);
  }


  public function add_department()
  {
  	$this->hasPermissionRedirect('add-department');

  	helper(['form', 'url']);
  	$model = new DepartmentModel();

  	if(!empty($_POST))
  	{
    	if (!$this->validate('department'))
	    {
	    	$data['errors'] = \Config\Services::validation()->getErrors();
	      $data['function_title'] = "Adding Department";
	      $data['viewName'] = 'Modules\Maintenances\Views\departments\frmDepart';
	      echo view('App\Views\theme\index', $data);
	    }
	    else
	    {
	        if($model->add_maintenance($_POST))
	        {
	        	$patient_id = $model->insertID();
	        	//$permissions_model->update_permitted_role($role_id, $_POST['function_id']);
	        	$_SESSION['success'] = 'You have added a new record';
						$this->session->markAsFlashdata('success');
	        	return redirect()->to(base_url('departments'));
	        }
	        else
	        {
	        	$_SESSION['error'] = 'You have an error in adding a new record';
						$this->session->markAsFlashdata('error');
	        	return redirect()->to(base_url('departments'));
	        }
	    }
  	}
  	else
  	{
    	$data['function_title'] = "Adding Department";
      $data['viewName'] = 'Modules\Maintenances\Views\departments\frmDepart';
      echo view('App\Views\theme\index', $data);
  	}
  }

  public function edit_department($id)
  {
  	$this->hasPermissionRedirect('edit-department');
  	helper(['form', 'url']);
  	$model = new DepartmentModel();
  	$data['rec'] = $model->find($id);

		// die($_POST['status']);

  	if(!empty($_POST))
  	{
			if (!$this->validate('department'))
			{
				$data['errors'] = \Config\Services::validation()->getErrors();
					$data['function_title'] = "Edit of Department";
					$data['viewName'] = 'Modules\Maintenances\Views\departments\frmDepart';
					echo view('App\Views\theme\index', $data);
			}
			else
			{
				if($model->edit_maintenance($_POST, $id))
					{
						//$permissions_model->update_permitted_role($id, $_POST['function_id'], $data['rec']['function_id']);
						$_SESSION['success'] = 'You have updated a record';
						$this->session->markAsFlashdata('success');
						return redirect()->to(base_url('departments'));
					}
					else
					{
						$_SESSION['error'] = 'You an error in updating a record';
						$this->session->markAsFlashdata('error');
						return redirect()->to( base_url('departments'));
					}
			}
  	}
  	else
  	{
			$data['function_title'] = "Edit of Department";
			$data['viewName'] = 'Modules\Maintenances\Views\departments\frmDepart';
			echo view('App\Views\theme\index', $data);
  	}
  }
}
