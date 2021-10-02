<?php
namespace Modules\Maintenances\Controllers;

use Modules\Maintenances\Models\QuestionModel;
use Modules\UserManagement\Models\PermissionsModel;
use Modules\Logs\Models\LogsModel;
use App\Controllers\BaseController;

use \Mpdf\Mpdf;

class Questions extends BaseController
{

	public function __construct()
	{
		parent:: __construct();

		$permissions_model = new PermissionsModel();
		$this->permissions = $permissions_model->getPermissionsWithCondition(['status' => 'a']);
		$this->logsModel = new LogsModel();
	}

	public function index()
	{
		$this->hasPermissionRedirect('list-guest-question');

		$model = new QuestionModel();

		$data['questionActive'] = $model->get(['status'=> 'a']);

		$data['function_title_active'] = "Clinical Information and Triage System Questions";
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
					$val_array = [ 
						'user_id' => $_SESSION['rid'],
						'activity' => 'added a question'
					];
					$this->logsModel->add($val_array);
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
						$val_array = [ 
							'user_id' => $_SESSION['rid'],
							'activity' => 'updated a question'
						];
						$this->logsModel->add($val_array);
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
