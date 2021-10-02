<?php
namespace Modules\Guests\Controllers;

// use Modules\Visits\Models\RolesModel;
use Modules\Guests\Models\GuestsModel;
use Modules\Visits\Models\VisitsModel;
use Modules\Visits\Models\ChecklistModel;
use Modules\UserManagement\Models\PermissionsModel;
use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;

class Visits extends BaseController
{
	//private $permissions;

	public function __construct()
	{
		parent:: __construct();

		$permissions_model = new PermissionsModel();
		$this->permissions = $permissions_model->getPermissionsWithCondition(['status' => 'a']);
	}

    public function index($id)
    {
    	$this->hasPermissionRedirect('list-of-active-visits');

    	$model = new VisitsModel();
			$patient_model = new GuestsModel();
			$checklist_model = new ChecklistModel();
			$visit_model = new VisitsModel();
			$data['visit_id'] = $visit_model->getVisitId($id);
			$data['checklist_recorded'] = $checklist_model->isChecklistCaptured($data['visit_id']);
			$data['checklists'] = $checklist_model->getChecklistData($id);
			// $data['checklists'] = $checklist_model->get(['visits.patient_id' => $id, 'checklists.status' => 'a'],[
			// 	'visits' => ['created_date' => 'checklists.visit_id']
			// ],[
			// 	'visits' => ['visits.id' => 'checklists.id']
			// ]);

			foreach ($data['checklists'] as $checklist )
			{
				$date = $checklist['created_date'];
				$temperature = $checklist['temperature'];

				$time = new Time( $date, 'America/Chicago', 'en_US');
				$hour = $time->format('H');
				if($hour < 12){
				$data['temp'] = '<b>AM Temperature</b>: '.$temperature;
				}else{
				$data['temp'] = '<b>PM Temperature</b>: '.$temperature;
				}
			}

			// $data['visit_id'] = $model->getVisitId($id);
      $data['visits'] = $model->orderBy('created_date', 'desc')->get(['status' => 'a', 'user_id' => $id]);
	  	$data['profile'] = $patient_model->getProfile($id);
	  	// $data['profiles'] = $patient_model->getProfile($id);
			// $data['profile'] = $patient_model->get(['status' => 'a','user_id' => $id]);
			$data['checklist_counts'] = $checklist_model->getChecklistCount($id);
			$data['visit_counts'] = $checklist_model->getVisitsCount($id);
			$data['undefined_counts'] = $checklist_model->getUndefinedCount($id);
			$data['defined_counts'] = $checklist_model->getDefinedCount($id);
			$data['assess_counts'] = $checklist_model->getAssessCount($id);
      $data['viewName'] = 'Modules\Guests\Views\visits\index';
      echo view('App\Views\theme\index', $data);

    }

		public function start($id){
			$model = new VisitsModel();
			$val_array = [
				'patient_id' => $id,
				'user_id' => $id,
			];
			if($model->add_bwisit($val_array)){
				$_SESSION['success'] = 'Visit Has Started';
				$this->session->markAsFlashdata('success');
				return redirect()->to(base_url('visits/' . $id));
			}
		}

		public function end($vId, $pId){
			$model = new VisitsModel();
			if($model->edit_bwisit($val_array = [], $vId)){
				$_SESSION['success'] = 'Visit Has Ended';
				$this->session->markAsFlashdata('success');
				return redirect()->to(base_url('visits'));
			}
		}
		public function end_appoint($vId, $pId){
			$model = new VisitsModel();
			// die($vId);
			if($model->edit_a($val_array = [], $vId)){
				$_SESSION['success'] = 'Visit Has Ended';
				$this->session->markAsFlashdata('success');
				return redirect()->to(base_url('visits'));
			}
		}
		public function report_patient($id)
	  {
			$model = new GuestsModel();
			$visit_model = new VisitsModel();
			$checklist_model = new ChecklistModel();

			$mpdf = new \Mpdf\Mpdf();

			// Write some HTML code:
			$mpdf->SetHeader('Document Title|Center Text|{PAGENO}');
			$mpdf->SetFooter('Document Title');
			$mpdf->WriteHTML('Document text');

			return redirect()->to($mpdf->output('filename.pdf', 'I'));
	  }

}
