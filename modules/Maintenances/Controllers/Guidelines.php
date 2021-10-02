<?php
namespace Modules\Maintenances\Controllers;

use Modules\Maintenances\Models\GuidelinesModel;
use Modules\UserManagement\Models\PermissionsModel;
use Modules\Logs\Models\LogsModel;
use App\Controllers\BaseController;

class Guidelines extends BaseController
{

	public function __construct()
	{
		parent:: __construct();

		$this->guidelinesModel = new GuidelinesModel();
		$permissions_model = new PermissionsModel();
		$this->logsModel = new LogsModel();
		$this->permissions = $permissions_model->getPermissionsWithCondition(['status' => 'a']);
	}

	public function index(){
		$this->hasPermissionRedirect('list-guidelines');

		$data['guidelines'] = $this->guidelinesModel->get(['status'=> 'a']);
		$data['function_title_active'] = "Guidelines";
		$data['viewName'] = 'Modules\Maintenances\Views\guidelines\index';
		return view('theme/index', $data);
	}

	public function add(){
		$this->hasPermissionRedirect('add-guidelines');
        helper(['form', 'url']);
		$data['function_title'] = "Add of Guideline";
		$data['edit'] = false;
		$data['viewName'] = 'Modules\Maintenances\Views\guidelines\frmGuideline';
		if($this->request->getMethod() === 'post'){
			if($this->validate('guidelines')){
				$file = $this->request->getFile('image');
				if ($file->isValid() && !$file->hasMoved()) {
					$imageName = $file->getRandomName();
					$file->move('./public/uploads/guidelines', $imageName);
					$_POST['image'] = $imageName;
					$_POST['status'] = 'a';
					$_POST['user_id'] = session()->get('uid');
				}
				if($this->guidelinesModel->add_maintenance($_POST)){
					$val_array = [ 
						'user_id' => $_SESSION['rid'],
						'activity' => 'added a guideline'
					];
					$this->logsModel->add($val_array);
					$_SESSION['success'] = 'You have added a record';
					$this->session->markAsFlashdata('success');
				} else {
					$_SESSION['error'] = 'You an error in adding a record';
					$this->session->markAsFlashdata('error');
				}
				return redirect()->to(base_url('guidelines'));
			} else {
				$data['value'] = $_POST;
				$data['errors'] = $this->validation->getErrors();
			}
		}
		return view('theme/index', $data);
	}
	
	public function edit($id){
		$this->hasPermissionRedirect('edit-guidelines');
		$data['function_title'] = "Edit of Guideline";
		$data['edit'] = true;
		$data['viewName'] = 'Modules\Maintenances\Views\guidelines\frmGuideline';
		$data['id'] = $id;
		$data['value'] = $this->guidelinesModel->find($id);
		if(empty($data['value'])){
			die('Some Error Code Here (No Record)');
		}
		if($this->request->getMethod() === 'post'){
			$validate = $this->validate([
			'content'  => 'required',
			'image' => 'uploaded[image]|max_size[image, 10240]|ext_in[image,png,jpg,gif,jpeg]|is_image[image]',
			]);

			if($validate){
				$_POST['image'] = $data['value']['image'];
				$file = $this->request->getFile('image');
				if ($file->isValid() && !$file->hasMoved()) {
					// unlink('assets/uploads/announcements/'.$data['value']['image']);
					$imageName = $file->getRandomName();
					$file->move('./public/uploads/guidelines', $imageName);
					$_POST['image'] = $imageName;
				}
				if($this->guidelinesModel->edit_maintenance($_POST, $id)){
					$val_array = [ 
						'user_id' => $_SESSION['rid'],
						'activity' => 'updated a guideline'
					];
					$this->logsModel->add($val_array);
					$_SESSION['success'] = 'You have updated a record';
					$this->session->markAsFlashdata('success');
				} else {
					$_SESSION['error'] = 'You an error in updating a record';
					$this->session->markAsFlashdata('error');
				}
				return redirect()->to(base_url('guidelines'));
			} else {
				$data['value'] = $_POST;
				$data['errors'] = $this->validation->getErrors();
			}
		}
		return view('theme/index', $data);
	}

	public function delete($id){
    	$this->hasPermissionRedirect('delete-guidelines');
		$data = $this->guidelinesModel->where('id', $id)->first();
		if(file_exists('public/uploads/guidelines/'.$data['image'])) {
		  unlink('public/uploads/guidelines/'.$data['image']);
		}
		if($this->guidelinesModel->softDelete($id)) {
			$val_array = [ 
				'user_id' => $_SESSION['rid'],
				'activity' => 'deleted a guideline'
			];
			$this->logsModel->add($val_array);
			$_SESSION['success'] = 'You have deleted a record';
			$this->session->markAsFlashdata('success');
		} else {
			$_SESSION['error'] = 'You an error in deleting a record';
			$this->session->markAsFlashdata('error');
		}
		return redirect()->to(base_url('guidelines'));
	}
}
