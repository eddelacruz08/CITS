<?php
namespace Modules\Maintenances\Controllers;

use Modules\Maintenances\Models\TypeModel;
use Modules\UserManagement\Models\PermissionsModel;
use App\Controllers\BaseController;

use \Mpdf\Mpdf;

class Types extends BaseController
{

	public function __construct()
	{
		parent:: __construct();

		$permissions_model = new PermissionsModel();
		$this->permissions = $permissions_model->getPermissionsWithCondition(['status' => 'a']);
	}

  public function index()
  {
  	$this->hasPermissionRedirect('list-guest-type');

  	$model = new TypeModel();

    $data['typeActive'] = $model->orderBy('guest_type', 'asc')->get(['status'=> 'a']);
    $data['typeInactive'] = $model->get(['status'=> 'b']);

    $data['function_title_active'] = "Active Guest Type List";
    $data['function_title_inactive'] = "Inactive Guest Type List";
    $data['viewName'] = 'Modules\Maintenances\Views\types\index';
    echo view('App\Views\theme\index', $data);
  }


  public function add_type()
  {
  	$this->hasPermissionRedirect('add-type');

  	helper(['form', 'url']);
  	$model = new TypeModel();

  	if(!empty($_POST))
  	{
    	if (!$this->validate('types'))
	    {
	    	$data['errors'] = \Config\Services::validation()->getErrors();
	      $data['function_title'] = "Adding Guest Type";
	      $data['viewName'] = 'Modules\Maintenances\Views\types\frmType';
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
	        	return redirect()->to(base_url('types'));
	        }
	        else
	        {
	        	$_SESSION['error'] = 'You have an error in adding a new record';
						$this->session->markAsFlashdata('error');
	        	return redirect()->to(base_url('types'));
	        }
	    }
  	}
  	else
  	{
    	$data['function_title'] = "Adding Guest Type";
      $data['viewName'] = 'Modules\Maintenances\Views\types\frmType';
      echo view('App\Views\theme\index', $data);
  	}
  }

  public function edit_type($id)
  {
  	$this->hasPermissionRedirect('edit-type');
  	helper(['form', 'url']);
  	$model = new TypeModel();
  	$data['rec'] = $model->find($id);

		// die($_POST['status']);

  	if(!empty($_POST))
  	{
			if (!$this->validate('types'))
			{
				$data['errors'] = \Config\Services::validation()->getErrors();
					$data['function_title'] = "Edit of Guest Type";
					$data['viewName'] = 'Modules\Maintenances\Views\types\frmType';
					echo view('App\Views\theme\index', $data);
			}
			else
			{
				if($model->edit_maintenance($_POST, $id))
					{
						//$permissions_model->update_permitted_role($id, $_POST['function_id'], $data['rec']['function_id']);
						$_SESSION['success'] = 'You have updated a record';
						$this->session->markAsFlashdata('success');
						return redirect()->to(base_url('types'));
					}
					else
					{
						$_SESSION['error'] = 'You an error in updating a record';
						$this->session->markAsFlashdata('error');
						return redirect()->to( base_url('types'));
					}
			}
  	}
  	else
  	{
			$data['function_title'] = "Edit of Guest Type";
			$data['viewName'] = 'Modules\Maintenances\Views\types\frmType';
			echo view('App\Views\theme\index', $data);
  	}
  }
}
