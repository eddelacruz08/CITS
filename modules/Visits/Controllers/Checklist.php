<?php
namespace Modules\Visits\Controllers;

use Modules\UserManagement\Models\PermissionsModel;
use Modules\Visits\Models\ChecklistModel;
use Modules\Guests\Models\GuestsModel;
use Modules\Visits\Models\VisitsModel;
use Modules\Scan\Models\QrcodeAttendanceModel;
use Modules\UserManagement\Models\UsersModel;
use App\Controllers\BaseController;

class Checklist extends BaseController {

	public function __construct() {
		parent:: __construct();
		$permissions_model = new PermissionsModel();
		$this->usersModel = new UsersModel();
		$this->checklistsModel = new ChecklistModel();
		$this->permissions = $permissions_model->getPermissionsWithCondition(['status' => 'a']);
	}

	public function requests($token){
		if($this->request->getMethod() === 'post'){
				$loginOK = 0;
				$users = $this->usersModel->getUserWithCondition(['token' => $token, 'status' => 'a']);
				//checking of user existense
				if(!empty($users)){
					foreach($users as $user){
						if($token == $user['token']){
							$loginOK = 1;
							$id = $user['id'];
							$firstname = $user['firstname'];
							$lastname = $user['lastname'];
							$email = $user['email'];
							break;
						}
					}
				}else{
					$_SESSION['error_request'] = 'Cannot find User Data!';
					$this->session->markAsFlashdata('error_request');
				}
				//checking if user is user credential is valid
				if($loginOK == 1){
					$_POST['token'] = md5(str_shuffle('0123456789'.time()));
					// $_POST['user_id'] = $id;
					// die($_POST['id']);
					// $to = $email;
					// $subject = 'Requested Health Declaration Form';
					// $message = 'Hi '.$firstname.' '.$lastname.'!<br><a href="'.base_url().'HealthDeclaration/request/'.$_POST['token'].'"> Start to take Health Declaration Form!</a>';
					// $email = \Config\Services::email();
					// $email->setTo($to);
					// $email->setFrom('United Coders Dev Team', SYSTEM_NAME);
					// $email->setSubject($subject);
					// $email->setMessage($message);
					// $email->send();
					$request_qrcode = base_url().'HealthDeclaration/request/'.$_POST['token'];
					// die($request_qrcode);
					if($this->checklistsModel->add_request($_POST)){
						// $email->send();
						$_SESSION['request_qrcode'] = $request_qrcode;
						$_SESSION['success_request'] = '<i class="fas fa-envelope"></i> Email sent! You have successfully requested a form!';
						$this->session->markAsFlashdata('success_request');
					}else{
						$_SESSION['error_request'] = 'You have an error in requesting a form!';
						$this->session->markAsFlashdata('error_request');
					}
				}else{
					//die('error login');
					$_SESSION['error_request'] = 'Cannot find User Data!';
					$this->session->markAsFlashdata('error_request');
					return redirect()->to(base_url('guests'));
				}
			// return redirect()->to(base_url('guests'));
		}
		$data['function_title'] = "Generate Qr Code Link";
		$data['viewName'] = 'Modules\Guests\Views\guests\qrcodeShow';
		echo view('App\Views\theme\index', $data);
	}

	public function edit_checklists($id, $pId)
	{
			$this->hasPermissionRedirect('edit-checklists');
			helper(['form', 'url']);
			$model = new ChecklistModel();
			$visit_model = new VisitsModel();
			$patient_model = new GuestsModel();
			$assess_model = new QrcodeAttendanceModel();
			$data['rec'] = $model->find($id);
			$data['visit_id'] = $visit_model->getVisitId($pId);
			$data['checklist_recorded'] = $model->isChecklistCaptured($data['visit_id']);
			$data['profile'] = $patient_model->getProfile($pId);
			// die($pId);
			$permissions_model = new PermissionsModel();

			$data['permissions'] = $this->permissions;
			$val_array = [
				'guest_id' => $pId,
				'user_id' => $_SESSION['uid'],
				'guest_status' => 'a',
			];
			if(!empty($_POST))
			{
				if($model->edit($_POST, $id))
				{
					$assess_model->add_assess($val_array);
					//$permissions_model->update_permitted_role($id, $_POST['function_id'], $data['rec']['function_id']);
					$_SESSION['success'] = 'The Patient has been proceeded to the Assessment.';
					$this->session->markAsFlashdata('success');
					return redirect()->to(base_url('scan'));
				}
				else
				{
					$_SESSION['error'] = 'You an error in updating a record';
					$this->session->markAsFlashdata('error');
					return redirect()->to( base_url('scan'));
				}
			}
			else
			{
				$data['errors'] = \Config\Services::validation()->getErrors();
				$data['viewName'] = 'Modules\Visits\Views\checklists\frmChecklistAssessment';
				echo view('App\Views\theme\indexEditChecklist', $data);
			}
	}
}
