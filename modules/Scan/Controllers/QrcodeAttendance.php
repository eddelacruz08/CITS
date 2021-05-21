<?php namespace Modules\Scan\Controllers;

// use Modules\Visits\Models\RolesModel;
use Modules\UserManagement\Models\PermissionsModel;
use Modules\UserManagement\Models\UsersModel;
use Modules\Visits\Models\ChecklistModel;
use Modules\Guests\Models\GuestsModel;
use Modules\Visits\Models\VisitsModel;
use Modules\Department\Models\DepartmentModel;
use Modules\Scan\Models\QrcodeAttendanceModel;
use App\Controllers\BaseController;

class QrcodeAttendance extends BaseController
{
		function __construct(){
			$this->checklistModel = new ChecklistModel();
			$this->visitsModel = new VisitsModel();
			$this->usersModel = new UsersModel();
		}
		public function index(){
			$data['viewName'] = 'Modules\Scan\Views\scans\scanProfile';
			return view('App\Views\theme\index2', $data);
		}

		public function add_scan(){
			$data['viewName'] = 'Modules\Scan\Views\scans\scanProfile';
			if($this->request->getMethod() === 'post'){
				$registerOK = 0;
				$users = $this->usersModel->getUserWithCondition(['token' => $_POST['identifier'], 'status' => 'a']);
				if(!empty($users))
				{
					foreach($users as $user)
					{
						if($_POST['identifier'] == $user['token'])
						{
							$registerOK = 1;
							$userId = $user['id'];
							$userToken = $user['token'];
							break;
						}
					}
				}
				else
				{
					$data['error_added2'] = 'Cannot find user!';
				}
				if($registerOK == 1)
				{
					$data['profile'] = $this->usersModel->getScanProfile($_POST['identifier']);
					// checking for latest checklist if detect for sysmtoms
					$latestChecklistOK = 0;
					$latestChecklistUser = $this->checklistModel->getLatestChecklistDate($userId);
					if(!empty($latestChecklistUser)){
						foreach($latestChecklistUser as $userChecklist)
						{
							// die($userChecklist['created_date']);
							if($userChecklist['status_defined'] == NULL)
							{
								$latestChecklistOK = 1;
								break;
							}
						}
					}else{
						$data['error_added2'] = 'Please take self-assessment, before entry!';
					}

					if($latestChecklistOK == 1){
						$val_array = [
							'user_id' => $userId,
						];
						$data['profile'] = $this->usersModel->getScanProfile($_POST['identifier']);
						if($this->visitsModel->add_visits_login($val_array)){
							$data['success_added2'] = 'Successfully Login!';
						}
					}else{
						$data['error_added2'] = 'You are not required to enter to the premises, because your latest self-assessment detected that had a sysmtoms!';
					}
				}else{
					$data['error_added2'] = 'This user was not registered!';
				}
			}else{
				$data['value'] = $_POST;
				$data['error_added2'] = 'QR Code is required for login!';
			}
			return view('App\Views\theme\index2', $data);
		}

}
