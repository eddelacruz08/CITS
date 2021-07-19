<?php
namespace Modules\Logs\Controllers;

use Modules\Logs\Models\LogsModel;
use Modules\UserManagement\Models\UsersModel;
use App\Controllers\BaseController;
use App\Libraries\Pdf;

class Logs extends BaseController {
	public function __construct() {
		parent:: __construct();
		$this->logsModel = new LogsModel();
		$this->usersModel = new UsersModel();
	}

	public function index($offset = 0) {
		$this->hasPermissionRedirect('activity-logs');

		$data['all_items'] = $this->logsModel->get(['status'=> 'a']);
		$data['offset'] = $offset;
		
		$data['logs'] = $this->logsModel->getUserActivityLog(['limit' => PERPAGE, 'offset' =>  $offset]);
		$data['function_title'] = "Activity Logs";
		$data['viewName'] = 'Modules\Logs\Views\logs\index';
		echo view('App\Views\theme\index', $data);
	}
}
