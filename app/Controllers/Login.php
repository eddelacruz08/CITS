<?php namespace App\Controllers;

use Modules\UserManagement\Models\UsersModel;
use Modules\UserManagement\Models\RolesModel;
use Modules\Maintenances\Models\CitiesModel;
use Modules\Maintenances\Models\ExtensionModel;
use Modules\Maintenances\Models\ProvinceModel;
use Modules\Maintenances\Models\GenderModel;
use Modules\Maintenances\Models\TypeModel;

class Login extends BaseController
{
	private $roles;

	public function __construct(){
		parent:: __construct();

		$this->usersModel = new UsersModel();
		$role_model = new RolesModel();
		$this->roles = $role_model->getRoleWithCondition(['status' => 'a']);
	}

	public function index(){
		if($_POST){
			$loginOK = 0;
			$users = $this->usersModel->getUserWithCondition(['email' => $_POST['email'], 'status' => 'a']);
			if(!empty($users)){
				foreach($users as $user){
					if(password_verify($_POST['password'], $user['password'])){
						$loginOK = 1;
						$_SESSION['uid'] = $user['id'];
						$_SESSION['uname'] = $user['username'];
						$_SESSION['fname'] = $user['firstname'].' '.$user['lastname'];
						$_SESSION['email'] = $user['email'];
						$_SESSION['rid'] = $user['role_id'];
						$_SESSION['user_logged_in'] = 1;
						break;
					}
				}
			}else{

				$_SESSION['error_login'] = 'Cannot Find Username';
				$this->session->markAsFlashdata('error_login');
				return redirect()->to( base_url());
			}
			if($loginOK == 1){
				if($_SESSION['rid'] == 2){
					$_SESSION['success_login'] = 'Welcome '.$user['username'].'!';
					$this->session->markAsFlashdata('success_login');
					return redirect()->to(base_url('profile'));
				}elseif($_SESSION['rid'] == 4){
					$_SESSION['success_login'] = 'Welcome '.$user['username'].'!';
					$this->session->markAsFlashdata('success_login');
					return redirect()->to(base_url('visits'));
				}else{
					$_SESSION['success_login'] = 'Welcome '.$user['username'].'!';
					$this->session->markAsFlashdata('success_login');
					return redirect()->to(base_url('dashboard'));
				}
			}else{
				$_SESSION['error_login'] = 'Username and Password mismatch!';
				$this->session->markAsFlashdata('error_login');
				return redirect()->to(base_url());
			}
		}else{
			$data['viewName'] = 'App\Views\login';
			echo view('App\Views\outside_layout\index', $data);
		}
	}

	public function register(){
		$data['roles'] = $this->roles;
		helper(['form', 'url']);
		$model = new UsersModel();
		$extension_model = new ExtensionModel();
		$gender_model = new GenderModel();
		$province_model = new ProvinceModel();
		$city_model = new CitiesModel();
		$guest_type_model = new TypeModel();

		$data['extensions'] = $extension_model->get(['status'=> 'a']);
		$data['genders'] = $gender_model->get(['status'=> 'a']);
		$data['provinces'] = $province_model->get(['status'=> 'a']);
		$data['cities'] = $city_model->get(['status'=> 'a']);
		$data['guest_types'] = $guest_type_model->get(['status'=> 'a']);
		if(!empty($_POST)){
			if (!$this->validate('user')){
				$data['errors'] = \Config\Services::validation()->getErrors();
				$data['function_title'] = "Registration";
				$data['viewName'] = 'App\Views\register';
				echo view('App\Views\outside_layout\index', $data);
			}else{
				$_POST['token'] = md5(str_shuffle('abcdefghijklmnopqrstuvwxyz'.time()));
				unset($_POST['password_retype']);
				if($model->addUsers($_POST)){
					$data['function_title'] = "Registration";
					$data['success'] = 'You have successfuly registered!';
					$data['viewName'] = 'App\Views\register';
					echo view('App\Views\outside_layout\index', $data);
				}else{
					$data['error'] = 'You have an error of adding a record!';
					$data['viewName'] = 'App\Views\register';
					echo view('App\Views\outside_layout\index', $data);
				}
			}
		}else{
			$data['function_title'] = "Registration";
			$data['viewName'] = 'App\Views\register';
			echo view('App\Views\outside_layout\index', $data);
		}
	}

	public function forgot_password(){
		if($_POST){
			if (!$this->validate('email')){
				$data['errors'] = \Config\Services::validation()->getErrors();
				$data['viewName'] = 'App\Views\forgotPassword';
				echo view('App\Views\outside_layout\index', $data);
			}else{
				$lengthPassword = 7;
				$data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
				$randomPassword = substr(str_shuffle($data), 0, $lengthPassword);
				$passwordOK = 0;
				$users = $this->usersModel->getUserWithCondition(['email' => $_POST['email'], 'status' => 'a']);
				if(!empty($users)){
					foreach($users as $user){
						if($_POST['email'] == $user['email']){
							$passwordOK = 1;
							$firstname = $user['firstname'];
							$lastname = $user['lastname'];
							$email = $user['email'];
							$id = $user['id'];
							break;
						}
					}
				}else{
					$_SESSION['error_login_forgot_password'] = 'Cannot Find Email!';
					$this->session->markAsFlashdata('error_login_forgot_password');
					$data['viewName'] = 'forgotPassword';
					echo view('outside_layout\index', $data);
				}
				if($passwordOK == 1){
					$to = $email;
					$subject = 'Requested Password!';
					$message = 'Hi '.ucfirst($firstname).' '.ucfirst($lastname).'!<br><br>'
						.'<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
						Your new password request has been recieved. Please click '
						.'the below link to verify your password.<br><br>'
						.'New password: '.$randomPassword.'<br><br>'
						.'<a type="button" href="'.base_url().'" class="btn btn-lg"> Verify New Password </a><br><br>'
						.'Thanks!';
					$email = \Config\Services::email();
					$email->setTo($to);
					$email->setFrom('United Coders Dev Team', SYSTEM_NAME);
					$email->setSubject($subject);
					$email->setMessage($message);
					$_POST['password'] = $randomPassword;
					$_POST['updated_date'] = date('Y-m-d h:i:s');
					if($this->usersModel->editUsers($_POST, $id)){
						$email->send();
						$_SESSION['success_login_forgot'] = 'Successfully generate a new password.<br>Please check your email to verify your password.';
						$this->session->markAsFlashdata('success_login_forgot');
						return redirect()->to(base_url().'login/forgotpassword');
					}else{
						$_SESSION['error_login_forgot_password'] = 'You cannot update data!';
						$this->session->markAsFlashdata('error_login_forgot_password');
						return redirect()->to(base_url().'login/forgotpassword');
					}
				}
			}
		}else{
			$data['function_title'] = "Forgot Password";
			$data['viewName'] = 'forgotPassword';
			echo view('outside_layout\index', $data);
		}
	}

	public function logout(){
		session_destroy();
		$_SESSION['success'] = 'Thank you. Come Again!';
		$this->session->markAsFlashdata('success');
		return redirect()->to(base_url());
	}
}
