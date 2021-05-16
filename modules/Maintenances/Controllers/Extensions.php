<?php
namespace Modules\Maintenances\Controllers;

use Modules\Maintenances\Models\ExtensionModel;
use Modules\UserManagement\Models\PermissionsModel;
use App\Controllers\BaseController;

use \Mpdf\Mpdf;

class Extensions extends BaseController
{

	public function __construct()
	{
		parent:: __construct();

		$permissions_model = new PermissionsModel();
		$this->permissions = $permissions_model->getPermissionsWithCondition(['status' => 'a']);
	}

  public function index()
  {
  	$this->hasPermissionRedirect('list-extension');

  	$model = new ExtensionModel();

    $data['extensionActive'] = $model->orderBy('extension', 'asc')->get(['status'=> 'a']);
    $data['extensionInactive'] = $model->get(['status'=> 'b']);

    $data['function_title_active'] = "Active Extension List";
    $data['function_title_inactive'] = "Inactive Extension List";
    $data['viewName'] = 'Modules\Maintenances\Views\extensions\index';
    echo view('App\Views\theme\index', $data);
  }


  public function add_extension()
  {
  	$this->hasPermissionRedirect('add-extension');

  	helper(['form', 'url']);
  	$model = new ExtensionModel();

  	if(!empty($_POST))
  	{
    	if (!$this->validate('extension'))
	    {
	    	$data['errors'] = \Config\Services::validation()->getErrors();
	      $data['function_title'] = "Adding Extension";
	      $data['viewName'] = 'Modules\Maintenances\Views\extensions\frmExtension';
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
	        	return redirect()->to(base_url('extensions'));
	        }
	        else
	        {
	        	$_SESSION['error'] = 'You have an error in adding a new record';
						$this->session->markAsFlashdata('error');
	        	return redirect()->to(base_url('extensions'));
	        }
	    }
  	}
  	else
  	{
    	$data['function_title'] = "Adding Extension";
      $data['viewName'] = 'Modules\Maintenances\Views\extensions\frmExtension';
      echo view('App\Views\theme\index', $data);
  	}
  }

  public function edit_extension($id)
  {
  	$this->hasPermissionRedirect('edit-extension');
  	helper(['form', 'url']);
  	$model = new ExtensionModel();
  	$data['rec'] = $model->find($id);

		// die($_POST['status']);

  	if(!empty($_POST))
  	{
			if (!$this->validate('extension'))
			{
				$data['errors'] = \Config\Services::validation()->getErrors();
					$data['function_title'] = "Edit of Extension";
					$data['viewName'] = 'Modules\Maintenances\Views\extensions\frmExtension';
					echo view('App\Views\theme\index', $data);
			}
			else
			{
				if($model->edit_maintenance($_POST, $id))
					{
						//$permissions_model->update_permitted_role($id, $_POST['function_id'], $data['rec']['function_id']);
						$_SESSION['success'] = 'You have updated a record';
						$this->session->markAsFlashdata('success');
						return redirect()->to(base_url('extensions'));
					}
					else
					{
						$_SESSION['error'] = 'You an error in updating a record';
						$this->session->markAsFlashdata('error');
						return redirect()->to( base_url('extensions'));
					}
			}
  	}
  	else
  	{
			$data['function_title'] = "Edit of Extension";
			$data['viewName'] = 'Modules\Maintenances\Views\extensions\frmExtension';
			echo view('App\Views\theme\index', $data);
  	}
  }
}
