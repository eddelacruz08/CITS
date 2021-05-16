<?php
namespace Modules\Maintenances\Controllers;

use Modules\Maintenances\Models\QuestionModel;
use Modules\UserManagement\Models\PermissionsModel;
use App\Controllers\BaseController;

use \Mpdf\Mpdf;

class Questions extends BaseController
{

	public function __construct()
	{
		parent:: __construct();

		$permissions_model = new PermissionsModel();
		$this->permissions = $permissions_model->getPermissionsWithCondition(['status' => 'a']);
	}

  public function index()
  {
  	$this->hasPermissionRedirect('list-guest-question');

  	$model = new QuestionModel();

    $data['questionActive'] = $model->orderBy('question', 'asc')->get(['status'=> 'a']);
    $data['questionInactive'] = $model->get(['status'=> 'b']);

    $data['function_title_active'] = "Active Question List";
    $data['function_title_inactive'] = "Inactive Question List";
    $data['viewName'] = 'Modules\Maintenances\Views\questions\index';
    echo view('App\Views\theme\index', $data);
  }


  public function add_question()
  {
  	$this->hasPermissionRedirect('add-question');

  	helper(['form', 'url']);
  	$model = new QuestionModel();

  	if(!empty($_POST))
  	{
    	if (!$this->validate('questions'))
	    {
	    	$data['errors'] = \Config\Services::validation()->getErrors();
	      $data['function_title'] = "Adding Question";
	      $data['viewName'] = 'Modules\Maintenances\Views\questions\frmQuestion';
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
	        	return redirect()->to(base_url('questions'));
	        }
	        else
	        {
	        	$_SESSION['error'] = 'You have an error in adding a new record';
						$this->session->markAsFlashdata('error');
	        	return redirect()->to(base_url('questions'));
	        }
	    }
  	}
  	else
  	{
    	$data['function_title'] = "Adding Question";
      $data['viewName'] = 'Modules\Maintenances\Views\questions\frmQuestion';
      echo view('App\Views\theme\index', $data);
  	}
  }

  public function edit_question($id)
  {
  	$this->hasPermissionRedirect('edit-question');
  	helper(['form', 'url']);
  	$model = new QuestionModel();
  	$data['rec'] = $model->find($id);

		// die($_POST['status']);

  	if(!empty($_POST))
  	{
			if (!$this->validate('questions'))
			{
				$data['errors'] = \Config\Services::validation()->getErrors();
					$data['function_title'] = "Edit of Question";
					$data['viewName'] = 'Modules\Maintenances\Views\questions\frmQuestion';
					echo view('App\Views\theme\index', $data);
			}
			else
			{
				if($model->edit_maintenance($_POST, $id))
					{
						//$permissions_model->update_permitted_role($id, $_POST['function_id'], $data['rec']['function_id']);
						$_SESSION['success'] = 'You have updated a record';
						$this->session->markAsFlashdata('success');
						return redirect()->to(base_url('questions'));
					}
					else
					{
						$_SESSION['error'] = 'You an error in updating a record';
						$this->session->markAsFlashdata('error');
						return redirect()->to( base_url('questions'));
					}
			}
  	}
  	else
  	{
			$data['function_title'] = "Edit of Question";
			$data['viewName'] = 'Modules\Maintenances\Views\questions\frmQuestion';
			echo view('App\Views\theme\index', $data);
  	}
  }
}
