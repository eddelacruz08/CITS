<?php
namespace Modules\UserManagement\Controllers;

use Modules\UserManagement\Models\UsersModel;
use Modules\UserManagement\Models\RolesModel;
use CodeIgniter\HTTP\RequestInterface;
use App\Controllers\BaseController;
use Modules\Logs\Models\LogsModel;
use App\Libraries\CSVReader;

class Users extends BaseController
{
	private $roles;

	public function __construct()
	{
		parent:: __construct();

        $this->form_validation = \Config\Services::validation();

		$this->csvreader = new CSVReader();

		$role_model = new RolesModel();
		$this->roles = $role_model->getRoleWithCondition(['status' => 'a']);
		$this->logsModel = new LogsModel();
		$this->usersModel = new UsersModel();
	}

	public function exportData(){ 
		// file name 
		$filename = 'users_'.date('Ymd').'.csv'; 
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=$filename"); 
		header("Content-Type: application/csv; ");
   
		$usersData = $this->usersModel->select('*')->findAll();
   
		// file creation 
		$file = fopen('php://output', 'w');
   
		$header = array("id","lastname","middlename","firstname","ext_name_id","username",
		"email","password","birthdate","gender_id","cellphone_no","landline_no","address",
		"city_id","province_id","postal","user_type_id","role_id"); 
		fputcsv($file, $header);
		foreach ($usersData as $key=>$line){ 
		   fputcsv($file,$line); 
		}
		fclose($file); 
		exit; 
	}

	public function importFile(){
		$data = array();
        $memData = array();
        // If import request is submitted
        if($this->request->getMethod() === 'post'){
            // Form field validation rules
            // set_rules('file', 'CSV file', 'callback_file_check');
            $input = $this->validate([
				'file' => 'uploaded[file]|max_size[file,1024]|ext_in[file,csv],'
				]);
            // Validate submitted form data
            if($input == true){
                $insertCount = $updateCount = $rowCount = $notAddCount = 0;
                
                // If file uploaded
                if(is_uploaded_file($_FILES['file']['tmp_name'])){
                    // Load CSV reader library
                    // $this->load->library('CSVReader');
                    
                    // Parse data from CSV file
                    $csvData = $this->csvreader->parse_csv($_FILES['file']['tmp_name']);
                    
                    // Insert/update CSV data into database
                    if(!empty($csvData)){
						// print_r($csvData); die();
                        foreach($csvData as $row){ $rowCount++;
                            // Prepare data for DB insertion
                            $memData = array(
								'lastname' => $row['lastname'],
								'middlename' => $row['middlename'],
								'firstname' => $row['firstname'],
								'username' => $row['username'],
								'email' => $row['email'],
								'password' => password_hash($row['password'], PASSWORD_DEFAULT),
								'birthdate' => $row['birthdate'],
								'gender_id' => $row['gender_id'],
								'cellphone_no' => $row['cellphone_no'],
								'address' => $row['address'],
								'city_id' => $row['city_id'],
								'province_id' => $row['province_id'],
								'postal' => $row['postal'],
								'user_type_id' => $row['user_type_id'],
								'role_id' => $row['role_id'],
                            );
                            
                            // Check whether email already exists in the database
                            $con = array(
                                'where' => array(
                                    'email' => $row['email']
                                ),
                                'returnType' => 'count'
                            );
                            $prevCount = $this->usersModel->getRows($con);
                            
                            if($prevCount > 0){
                                // Update member data
                                $condition = array('email' => $row['email']);
                                $update = $this->usersModel->updateFile($memData, $condition);
                                
                                if($update){
                                    $updateCount++;
                                }
                            }else{
                                // Insert member data
                                $insert = $this->usersModel->insertFile($memData);
                                
                                if($insert){
                                    $insertCount++;
                                }
                            }
                        }
                        
                        // Status message with imported data count
                        $notAddCount = ($rowCount - ($insertCount + $updateCount));
                        $successMsg = 'Members imported successfully. Total Rows ('.$rowCount.') | Inserted ('.$insertCount.') | Updated ('.$updateCount.') | Not Inserted ('.$notAddCount.')';
                        $this->session->setFlashdata('success', $successMsg);
                    }
                }else{
                    $this->session->setFlashdata('error', 'Error on file upload, please try again.');
                }
            }else{
                $this->session->setFlashdata('error', 'Invalid file, please select only CSV file.');
            }
        }
        return redirect()->to(base_url('users'));
    }
    
    /*
     * Callback function to check file value and type during validation
     */
    public function file_check($str){
        $allowed_mime_types = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
        if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ""){
            $mime = get_mime_by_extension($_FILES['file']['name']);
            $fileAr = explode('.', $_FILES['file']['name']);
            $ext = end($fileAr);
            if(($ext == 'csv') && in_array($mime, $allowed_mime_types)){
                return true;
            }else{
                $this->form_validation->set_message('file_check', 'Please select only CSV file to upload.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_check', 'Please select a CSV file to upload.');
            return false;
        }
    }

	public function show_user($id)
	{
		$this->hasPermissionRedirect('show-user');
		$data['permissions'] = $this->permissions;

		$model = new UsersModel();
		$data['user'] = $model->getUserWithCondition(['id' => $id]);
		$data['function_title'] = "User Profile";
        $data['viewName'] = 'Modules\UserManagement\Views\users\userProfile';
        echo view('App\Views\theme\index', $data);
	}

	public function user_own_profile($id)
	{
		$this->hasPermissionRedirect('user-own-profile');

		if($id != $_SESSION['uid'])
		{
			header('Location: '.base_url());
			session_destroy();
			exit;
		}

		$model = new UsersModel();

		$data['user'] = $model->getUserWithCondition(['id' => $id]);

		$data['function_title'] = "User Own Profile";
        $data['viewName'] = 'Modules\UserManagement\Views\users\userOwnProfile';
        echo view('App\Views\theme\index', $data);
	}

    public function index($offset = 0)
    {
    	$this->hasPermissionRedirect('list-user');
    	//kailangan ito para sa pagination
       	$data['all_items'] = $this->usersModel->getUserWithCondition(['status'=> 'a']);
       	$data['offset'] = $offset;

        $data['users'] = $this->usersModel->getUsersWithRole(['status'=> 'a', 'limit' => PERPAGE, 'offset' =>  $offset]);

        $data['function_title'] = "Users List";
        $data['viewName'] = 'Modules\UserManagement\Views\users\index';
        echo view('App\Views\theme\index', $data);
    }

    public function add_user()
    {
    	$this->hasPermissionRedirect('add-user');

    	$data['roles'] = $this->roles;

    	helper(['form', 'url']);
    	$model = new UsersModel();
    	if(!empty($_POST))
    	{
	    	if (!$this->validate('user'))
		    {
		    	$data['errors'] = \Config\Services::validation()->getErrors();
		        $data['function_title'] = "Adding user";
		        $data['viewName'] = 'Modules\UserManagement\Views\users\frmUser';
		        echo view('App\Views\theme\index', $data);
		    }
		    else
		    {
		    	unset($_POST['password_retype']);
		        if($model->addUsers($_POST))
		        {
					$val_array = [ 
						'user_id' => $_SESSION['rid'],
						'activity' => 'added a user'
					];
					$this->logsModel->add($val_array);
		        	$_SESSION['success'] = 'You have added a new record';
					$this->session->markAsFlashdata('success');
		        	return redirect()->to( base_url('users'));
		        }
		        else
		        {
		        	$_SESSION['error'] = 'You have an error in adding a new record';
					$this->session->markAsFlashdata('error');
		        	return redirect()->to( base_url('users'));
		        }
		    }
    	}
    	else
    	{
	    	$data['function_title'] = "Adding User Account";
	        $data['viewName'] = 'Modules\UserManagement\Views\users\frmUser';
	        echo view('App\Views\theme\index', $data);
    	}
    }

    public function edit_user($id)
    {
    	$this->hasPermissionRedirect('edit-user');

    	$data['roles'] = $this->roles;

    	helper(['form', 'url', 'html']);

    	$model = new UsersModel();
    	$data['rec'] = $model->find($id);


    	if(!empty($_POST))
    	{
	    	if (!$this->validate('user_edit'))
		    {
		    	$data['errors'] = \Config\Services::validation()->getErrors();
		        $data['function_title'] = "Edit of User";
		        $data['viewName'] = 'Modules\UserManagement\Views\users\frmUser';
		        echo view('App\Views\theme\index', $data);
		    }
		    else
		    {
		    	unset($_POST['password_retype']);
		    	if($model->editUsers($_POST, $id))
		        {
					$val_array = [ 
						'user_id' => $_SESSION['rid'],
						'activity' => 'updated a user'
					];
					$this->logsModel->add($val_array);
		        	$_SESSION['success'] = 'You have updated a record';
					$this->session->markAsFlashdata('success');
		        	return redirect()->to( base_url('users'));
		        }
		        else
		        {
		        	$_SESSION['error'] = 'You an error in updating a record';
					$this->session->markAsFlashdata('error');
		        	return redirect()->to( base_url('users'));
		        }
		    }
    	}
    	else
    	{
    		$data['function_title'] = "Editing of User";
	        $data['viewName'] = 'Modules\UserManagement\Views\users\frmUser';
	        echo view('App\Views\theme\index', $data);
    	}
    }

    public function delete_user($id)
    {
    	$this->hasPermissionRedirect('delete-user');

		$val_array = [ 
			'user_id' => $_SESSION['rid'],
			'activity' => 'deleted a user'
		];
		$this->logsModel->add($val_array);
    	$model = new UsersModel();
    	$model->deleteUser($id);
    }

}
