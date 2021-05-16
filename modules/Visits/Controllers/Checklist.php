<?php
namespace Modules\Visits\Controllers;

// use Modules\Visits\Models\RolesModel;
use Modules\UserManagement\Models\PermissionsModel;
use Modules\Visits\Models\ChecklistModel;
use Modules\Guests\Models\GuestsModel;
use Modules\Visits\Models\VisitsModel;
use Modules\Maintenances\Models\DepartmentModel;
use Modules\Scan\Models\QrcodeAttendanceModel;
use App\Controllers\BaseController;

class Checklist extends BaseController
{
	//private $permissions;

	public function __construct()
	{
		parent:: __construct();

		$permissions_model = new PermissionsModel();
		$this->permissions = $permissions_model->getPermissionsWithCondition(['status' => 'a']);
	}

    public function delete_role($id)
    {
    	$this->hasPermissionRedirect('delete-role');

    	$model = new RolesModel();
    	$model->deleteRole($id);
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
		public function attend_checklist(){
			$model = new ChecklistModel();
			$visit_model = new VisitsModel();
			$guest_model = new GuestsModel();
			$data['guests'] = $guest_model->get(['status'=> 'a']);

			if($_POST['email'] == true)
			{
				$registerOK = 0;
				$users = $guest_model->getGuestWithCondition(['email' => $_POST['email'], 'status' => 'a']);

				//checking of user existense
				if(!empty($users))
				{
					foreach($users as $user)
					{
						if($_POST['email'] == $user['email'])
						{
							$registerOK = 1;
							$email = $user['email'];
							$firstname = $user['first_name'];
							$middlename = $user['middle_name'];
							$lastname = $user['last_name'];
							$extname = $user['ext_name'];
							$guestId = $user['id'];
							break;
						}
					}
				}
				else
				{
					$_SESSION['error_added'] = 'This guest was not registered!';
					$this->session->markAsFlashdata('error_added');
		      return redirect()->to( base_url('guests'));
				}

				$visitOK = 0;
				$visit_guest = $visit_model->getVisitWithCondition(['patient_id' => $guestId, 'status' => 'a', 'updated_at' => NULL]);

				//checking of user existense in visits
				if(!empty($visit_guest))
				{
					foreach($visit_guest as $visitUser)
					{
						if($visitUser['patient_id'] && $visitUser['updated_at'] == NULL)
						{
							$visitOK = 1;
							$patientId = $visitUser['patient_id'];
							$visitId = $visitUser['id'];
							break;
						}
					}
				}
				// else
				// {
				// 	$_SESSION['error_added'] = 'This guest was not login!';
				// 	$this->session->markAsFlashdata('error_added');
		    //   return redirect()->to( base_url('guests'));
				// }
				//End of checking of user existense in visits
				//checking if user is user credential is valid
				if($visitOK == 1)
				{
					//die($updatedId);
					$model = new VisitsModel();
					if($model->edit($val_array = [], $visitId)){
						$_SESSION['success_added'] = '<b>'.$firstname.' '.$middlename.' '.$lastname.' '.$extname.'</b> is successfully logout!';
						$this->session->markAsFlashdata('success_added');
						return redirect()->to(base_url('guests'));
					}
				}
				else
				{
						//checking if user is user credential is valid
						if($registerOK == 1)
						{

										if(!empty($_POST)){

												if($this->validate('checklists')){
														if($_POST['temperature'] >= 37.3 || $_POST['temperature'] <= 36){
															$defined = 'd';
														}else{
															$defined = 'u';
														}
														$val_array = [
															'patient_id' => $guestId,
														];
														if($visit_model->add($val_array)){
															$_SESSION['success_added_login'] = '<b>'.$firstname.' '.$middlename.' '.$lastname.' '.$extname.'</b> is successfully login!';
															$this->session->markAsFlashdata('success_added_login');
															// $data['function_title'] = "Guests List";
															// $data['viewName'] = 'Modules\Guests\Views\guests\index';
															// echo view('App\Views\theme\index', $data);
														}
														//$visits_model = new VisitsModel();
														$data['visit_id'] = $visit_model->getVisitId($guestId);
														$data['checklist_recorded'] = $model->isChecklistCaptured($data['visit_id']);

														$_POST['user_id'] = $_SESSION['uid'];
														$_POST['patient_id'] = $guestId;
														//die($data['visit_id']);
														$_POST['visit_id'] = $data['visit_id'];
													$_POST['status_defined'] = $defined;
													if($model->add($_POST)){
														$_SESSION['success_added'] = '<b>'.$firstname.' '.$middlename.' '.$lastname.' '.$extname.'</b> have successfully added a checklist!';
														$this->session->markAsFlashdata('success_added');
														$data['function_title'] = "Guests List";
														$data['viewName'] = 'Modules\Guests\Views\guests\index';
														echo view('App\Views\theme\index', $data);
													}
													else{
														$_SESSION['error_added'] = 'You have an error in adding a record!';
														$this->session->markAsFlashdata('error_added');
														$data['function_title'] = "Guests List";
														$data['viewName'] = 'Modules\Guests\Views\guests\index';
														echo view('App\Views\theme\index', $data);
													}
											}
											else {
												//$data['errors'] = \Config\Services::validation()->getErrors();

												$data['function_title'] = "Guests List";
												//$_SESSION['error_added'] = 'Please scan QrCode!';
												$_SESSION['error_added_checklist'] = '<b>Reminder:</b> Please make sure that the scanned qrcode was completely answered all fields!';
												$this->session->markAsFlashdata('error_added_checklist');
												//$data['fullname'] = $fullname;
												$data['viewName'] = 'Modules\Guests\Views\guests\index';
												echo view('App\Views\theme\index', $data);
											}
										}
										else{
											$data['function_title'] = "Guests List";
											$data['viewName'] = 'Modules\Guests\Views\guests\index';
											echo view('App\Views\theme\index', $data);
										}
										// end of checking if user is user credential is valid
									}
									// end of checking if user is user credential is valid
							}
					}
					else
					{
						$_SESSION['reminder_added'] = '<b>Please replace your QR Code to scan!</b>';
						$this->session->markAsFlashdata('reminder_added');
						$data['function_title'] = "Guests List";
						$data['viewName'] = 'Modules\Guests\Views\guests\index';
						echo view('App\Views\theme\index', $data);
					}
		}

		public function capture_checklist($id){
			$model = new ChecklistModel();
			$visit_model = new VisitsModel();
			$patient_model = new GuestsModel();
			$department_model = new DepartmentModel();
			$val_array = [
				'patient_id' => $id,
			];

			$data['departments'] = $department_model->get(['status' => 'a']);
			$data['visit_id'] = $visit_model->getVisitId($id);
			$data['checklist_recorded'] = $model->isChecklistCaptured($data['visit_id']);
			// start visits
			// if($visit_model->add($val_array)){
			// 	$_SESSION['success_visit'] = 'Visit Has Started';
			// 	$this->session->markAsFlashdata('success_visit');
			// }
			// end visits
// die($data['checklist_recorded']);
			$data['checklist_counts'] = $model->getChecklistCount($id);
			$data['visit_counts'] = $model->getVisitsCount($id);
			$data['assess_counts'] = $model->getAssessCount($id);
			$data['profile'] = $patient_model->get(['id' => $id]);
			if($_POST){
				$_POST['user_id'] = $_SESSION['uid'];
				$_POST['patient_id'] = $val_array;
				if($this->validate('checklists')){
					if($_POST['temperature'] >= 37.3 || $_POST['temperature'] <= 36){
						$defined = 'd';
					}else{
						$defined = 'u';
					}
					$_POST['status_defined'] = $defined;
					if($model->add($_POST)){
						$_SESSION['success'] = 'You have Successfuly added a checklist!';
						$this->session->markAsFlashdata('success');
						return redirect()->to(base_url('guests/show/' . $id));
					}
					else{
						$_SESSION['error'] = 'You have an error in adding a record!';
						$this->session->markAsFlashdata('error');
						return redirect()->to( base_url('checklists/capture/' . $id));
					}
				}
				else {
					$data['errors'] = \Config\Services::validation()->getErrors();
		      $data['viewName'] = 'Modules\Visits\Views\checklists\frmChecklist';
		      echo view('App\Views\theme\index', $data);
				}
			}
			else{
				$data['viewName'] = 'Modules\Visits\Views\checklists\frmChecklist';
				echo view('App\Views\theme\index', $data);
			}
		}

		public function scan_checklist($id){
			$model = new ChecklistModel();
			$visit_model = new VisitsModel();
			$patient_model = new GuestsModel();
			$val_array = [
				'patient_id' => $id,
			];
			$data['visit_id'] = $visit_model->getVisitId($id);
			$data['checklist_recorded'] = $model->isChecklistCaptured($data['visit_id']);
			$data['checklist_counts'] = $model->getChecklistCount($id);
			$data['visit_counts'] = $model->getVisitsCount($id);
			$data['assess_counts'] = $model->getAssessCount($id);
			$data['profile'] = $patient_model->get(['id' => $id]);
			if($_POST){
				$_POST['user_id'] = $_SESSION['uid'];
				$_POST['patient_id'] = $val_array;
					if($_POST['temperature'] >= 37.3 || $_POST['temperature'] <= 36){
						$defined = 'd';
					}else{
						$defined = 'u';
					}
					$_POST['status_defined'] = $defined;
					if($model->add($_POST)){
						$_SESSION['success'] = 'You have Successfuly added a checklist!';
						$this->session->markAsFlashdata('success');
						return redirect()->to(base_url('guests/show/' . $id));
					}
					else{
						$_SESSION['error'] = 'You have an error in adding a record!';
						$this->session->markAsFlashdata('error');
						return redirect()->to( base_url('checklists/scan/' . $id));
					}
			}
			else{
				$data['viewName'] = 'Modules\Visits\Views\checklists\frmScanChecklist';
				echo view('App\Views\theme\index', $data);
			}
		}

}
