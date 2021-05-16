<?php
namespace Modules\GuestAssessment\Controllers;

use Modules\Visits\Models\VisitsModel;
use Modules\Visits\Models\ChecklistModel;
use Modules\GuestAssessment\Models\GuestAssessmentModel;
use Modules\GuestAssessment\Models\GuestCheckupModel;
use Modules\Maintenances\Models\CitiesModel;
use Modules\Maintenances\Models\ExtensionModel;
use Modules\Maintenances\Models\ProvinceModel;
use Modules\Maintenances\Models\GenderModel;
use Modules\Maintenances\Models\TypeModel;
use Modules\UserManagement\Models\PermissionsModel;
use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;

use \Mpdf\Mpdf;

class GuestAssessment extends BaseController
{

	public function __construct()
	{
		parent:: __construct();

		$permissions_model = new PermissionsModel();
		$this->permissions = $permissions_model->getPermissionsWithCondition(['status' => 'a']);
	}

  public function index()
  {
  	$this->hasPermissionRedirect('list-guest');
		$model = new GuestAssessmentModel();
  	$model_observation = new GuestCheckupModel();
		$data['guests'] = $model->getAssessmentGuest();
		$data['guestsObservation'] = $model_observation->getObservationGuest();
    $data['function_title'] = "Guests Assessment List";
    $data['function_title_2'] = "Under Observation Patient";
    $data['viewName'] = 'Modules\GuestAssessment\Views\guestassessment\index';
    echo view('App\Views\theme\index', $data);
  }
  public function div_assess()
  {
  	// $this->hasPermissionRedirect('list-guest');

  	$model = new GuestAssessmentModel();
  	$model_observation = new GuestCheckupModel();
		$data['guests'] = $model->getAssessmentGuest();
		$data['guestsObservation'] = $model_observation->getObservationGuest();
    $data['function_title'] = "Guests Assessment List";
    $data['function_title_2'] = "Under Observation Patient";
    $data['viewName'] = 'Modules\GuestAssessment\Views\guestassessment\banners';
    echo view('App\Views\theme\bannerNoTemplate', $data);
  }

  public function show_guest($id)
  {
		$this->hasPermissionRedirect('show-guest');

		$model = new GuestAssessmentModel();
		$visit_model = new VisitsModel();
		$checklist_model = new ChecklistModel();

		$data['visit_id'] = $visit_model->getVisitId($id);
		$data['recent_visits'] = $visit_model->get(['status' => 'a', 'user_id' => $id]);
		$data['latest_checklist'] = $checklist_model->getLatestChecklist($id);
		$data['health_summary'] = $checklist_model->getHealthTrendSummary($id);
		$data['checklist_recorded'] = $checklist_model->isChecklistCaptured($data['visit_id']);
		foreach ($data['latest_checklist'] as $health )
		{
			$date = $health['created_date'];
			$temperature = $health['temperature'];

			$time = new Time( $date, 'Asia/Manila');
			$hour = $time->format('H');
			if($hour < 12){
		  $data['temp'] = '<b>AM Temperature</b>: '.$temperature;
			}else{
			$data['temp'] = '<b>PM Temperature</b>: '.$temperature;
			}
		}

		// die($id);
		$data['profile'] = $model->getProfile($id);
		// $data['profile'] = $model->get(['status' => 'a','user_id' => $id]);
		$data['checklist_counts'] = $checklist_model->getChecklistCount($id);
		$data['visit_counts'] = $checklist_model->getVisitsCount($id);
		$data['assess_counts'] = $checklist_model->getAssessCount($id);
		if (empty($data['profile'])) {
			die('Walang Laman!');
		}
		// $data['function_title'] = "Patient Details";
  	$data['viewName'] = 'Modules\Guests\Views\guests\guestDetails';
    echo view('App\Views\theme\index', $data);
  }

  public function add_guest_assessment()
  {
		// $this->hasPermissionRedirect('add-guest-assessment');

  	helper(['form', 'url']);
  	$model_checkup = new GuestCheckupModel();
  	$model_assess = new GuestAssessmentModel();
		// die($_POST['guest_id']);
  	if(!empty($_POST))
  	{
    	if (!$this->validate('checkups'))
	    {
	    	$data['errors'] = \Config\Services::validation()->getErrors();
				$data['function_title'] = "Patient Assessment";
				$data['viewName'] = 'Modules\GuestAssessment\Views\guestassessment\index';
				echo view('App\Views\theme\index', $data);
	    }
	    else
	    {
				$registerOK = 0;
				$users = $model_assess->getGuestAssessWithCondition(['guest_id' => $_POST['guest_id'], 'guest_status' => 'a', 'status' => 'a']);

				//checking of user existense
				if(!empty($users))
				{
					foreach($users as $user)
					{
						if($_POST['guest_id'] == $user['guest_id'])
						{
							$registerOK = 1;
							$guestId = $user['id'];
							$guestUserId = $user['guest_id'];
							break;
						}
					}
				}
				else
				{
					$_SESSION['error_added2'] = 'Cannot find assessment!';
					$this->session->markAsFlashdata('error_added2');
					return redirect()->to(base_url('guest%20assessment'));
				}

				if ($registerOK == 1) {
					// code...
				// die($guestId);
	        if($model_checkup->add_checkup($_POST))
	        {
						$model_assess->edit_assess($_POST, $guestId);
	        	$_SESSION['success'] = 'You have added a new under observation';
						$this->session->markAsFlashdata('success');
	        	return redirect()->to(base_url('guest%20assessment'));
	        }
	        else
	        {
	        	$_SESSION['error'] = 'You have an error in adding a new record';
						$this->session->markAsFlashdata('error');
	        	return redirect()->to(base_url('guest%20assessment'));
	        }
				}
	    }
  	}
  	else
  	{
			$data['function_title'] = "Patient Assessment";
			$data['viewName'] = 'Modules\GuestAssessment\Views\guestassessment\index';
			echo view('App\Views\theme\index', $data);
  	}
  }

  public function edit_guest_assessment($id)
  {
  	// $this->hasPermissionRedirect('edit-guest-assessment');
  	// helper(['form', 'url']);
  	$model = new GuestAssessmentModel();
  	$checklist_model = new ChecklistModel();
  	$data['rec'] = $model->find($id);
  	// $permissions_model = new PermissionsModel();
  	// $data['permissions'] = $this->permissions;

		$data['latest_checklist'] = $checklist_model->getLatestChecklistDate($id);
		foreach ($data['latest_checklist'] as $health )
		{
			$date = $health['created_date'];
			$temperature = $health['temperature'];

			$time = new Time( $date, 'Asia/Manila');
			$hour = $time->format('H');
			if($hour < 12){
				$data['temp'] = '<b>AM Temperature</b>: '.$temperature;
			}else{
				$data['temp'] = '<b>PM Temperature</b>: '.$temperature;
			}
		}

  	if(!empty($_POST))
  	{
    	if (!$this->validate('patient'))
	    {
	    	  $data['errors'] = \Config\Services::validation()->getErrors();
	        $data['function_title'] = "Patient Assessment";
	        $data['viewName'] = 'Modules\GuestAssessment\Views\guestassessment\indexChecklist';
	        echo view('App\Views\theme\index', $data);
	    }
	    else
	    {
	    	if($model->edit($_POST, $id))
	        {
	        	//$permissions_model->update_permitted_role($id, $_POST['function_id'], $data['rec']['function_id']);
	        	$_SESSION['success'] = 'You have updated a record';
						$this->session->markAsFlashdata('success');
	        	return redirect()->to(base_url('guest%20assessment'));
	        }
	        else
	        {
	        	$_SESSION['error'] = 'You an error in updating a record';
						$this->session->markAsFlashdata('error');
	        	return redirect()->to( base_url('guest%20assessment'));
	        }
	    }
  	}
  	else
  	{
			// $data['latest_checklist'] = $model->getGuestChecklistDate($id);
    	$data['function_title'] = "Patient Assessment";
      $data['viewName'] = 'Modules\GuestAssessment\Views\guestassessment\indexChecklist';
      echo view('App\Views\theme\index', $data);
  	}
  }

  public function delete_guest_assessment($id)
  {
		// die($id);
  	// $this->hasPermissionRedirect('delete-guest');
	  $model = new GuestAssessmentModel();
		$registerOK = 0;
		$users = $model->getGuestAssessWithCondition(['guest_id' => $id, 'guest_status' => 'a', 'status' => 'a']);

		//checking of user existense
		if(!empty($users))
		{
			foreach($users as $user)
			{
				if($id == $user['guest_id'])
				{
					$registerOK = 1;
					$guestId = $user['id'];
					break;
				}
			}
		}
		else
		{
			$_SESSION['error'] = 'Cannot find assessment!';
			$this->session->markAsFlashdata('error');
			return redirect()->to(base_url('guest%20assessment'));
		}

		if ($registerOK == 1)
		 {
			 // die($guestId);
			 $models = new GuestAssessmentModel();
				if ($models->softDelete($guestId)) {
					$_SESSION['success'] = 'You have Deleted a record';
					$this->session->markAsFlashdata('success');
					return redirect()->to(base_url('guest%20assessment'));
				}
				else{
					$_SESSION['error'] = 'You an error in updating a record';
					$this->session->markAsFlashdata('error');
					return redirect()->to( base_url('guest%20assessment'));
				}
		}
  }

}
