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

	public function __construct()
	{
		parent:: __construct();

		$role_model = new RolesModel();
		$this->roles = $role_model->getRoleWithCondition(['status' => 'a']);
	}
		public function index()
		{
			$model = new UsersModel();
			if($_POST)
			{
				$loginOK = 0;
				$users = $model->getUserWithCondition(['username' => $_POST['username'], 'status' => 'a']);

				//checking of user existense
				if(!empty($users))
				{
					foreach($users as $user)
					{
						if(password_verify($_POST['password'], $user['password']))
						{
							$loginOK = 1;
							$_SESSION['uid'] = $user['id'];
							$_SESSION['uname'] = $user['username'];
							$_SESSION['rid'] = $user['role_id'];
							$_SESSION['user_logged_in'] = 1;
							break;
						}
					}
				}
				else
				{

					$_SESSION['error_login'] = 'Cannot Find Username';
					$this->session->markAsFlashdata('error_login');
		        	return redirect()->to( base_url());
				}

				//checking if user is user credential is valid
				if($loginOK == 1)
				{
					if($_SESSION['rid'] == 2)
					{
						//die('logged in');
					  $_SESSION['success_login'] = 'Welcome '.$user['username'].'!';
						$this->session->markAsFlashdata('success_login');
		        return redirect()->to(base_url('profile'));
					}else{
						//die('logged in');
						$_SESSION['success_login'] = 'Welcome '.$user['username'].'!';
						$this->session->markAsFlashdata('success_login');
						return redirect()->to(base_url('dashboard'));
					}
				}
				else
				{
					//die('error login');
					$_SESSION['error_login'] = 'Username and Password mismatch!';
					$this->session->markAsFlashdata('error_login');
		        	return redirect()->to(base_url());
				}
			}
			else
			{
		    $data['viewName'] = 'App\Views\login';
		    echo view('App\Views\outside_layout\index', $data);
			}
		}

		public function register()
		{
			// $this->hasPermissionRedirect('add-user');

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
			if(!empty($_POST))
			{
				if (!$this->validate('user'))
				{
					$data['errors'] = \Config\Services::validation()->getErrors();
					$data['function_title'] = "Registration";
					$data['viewName'] = 'App\Views\register';
			    echo view('App\Views\outside_layout\index', $data);
				}
				else
				{
					$_POST['token'] = md5(str_shuffle('abcdefghijklmnopqrstuvwxyz'.time()));
					unset($_POST['password_retype']);
						if($model->addUsers($_POST))
						{
							$data['function_title'] = "Registration";
							$data['success'] = 'You have successfuly registered!';
							$data['viewName'] = 'App\Views\register';
					    echo view('App\Views\outside_layout\index', $data);
						}
						else
						{
							$data['error'] = 'You have an error of adding a record!';
							$data['viewName'] = 'App\Views\register';
					    echo view('App\Views\outside_layout\index', $data);
						}
				}
			}
			else
			{
				$data['function_title'] = "Registration";
				$data['viewName'] = 'App\Views\register';
		    echo view('App\Views\outside_layout\index', $data);
			}
		}

		public function forgot_password()
		{
			$model = new UsersModel();
			// start of post
			if($_POST)
			{
					// start of validation
					if (!$this->validate('email'))
			    {
			    	$data['errors'] = \Config\Services::validation()->getErrors();
						$data['viewName'] = 'App\Views\forgotPassword';
						echo view('App\Views\outside_layout\index', $data);
			    }
					else
					{
						$passwordOK = 0;
						$users = $model->getUserWithCondition(['email' => $_POST['email'], 'status' => 'a']);

						// start checking of user existense
						if(!empty($users))
						{
							foreach($users as $user)
							{
								if($_POST['email'] == $user['email'])
								{
									$passwordOK = 1;
									$firstname = $user['firstname'];
									$lastname = $user['lastname'];
									$email = $user['email'];
									$user_token = $user['token'];
									$id = $user['id'];
									break;
								}
							}
						}
						else
						{
							$_SESSION['error_login_forgot_password'] = 'Cannot Find Email!';
							$this->session->markAsFlashdata('error_login_forgot_password');
							$data['viewName'] = 'App\Views\forgotPassword';
							echo view('App\Views\outside_layout\index', $data);
						}
						// end checking of user existense
						//checking if user is user credential is valid
						if($passwordOK == 1)
						{
							$to = $email;
							$subject = 'Reset Password Link';
							$token = $user_token;
							$message = 'Hi '.ucfirst($firstname).' '.ucfirst($lastname).'!<br><br>'
												.'Your reset password request has been recieved. Please click '
												.'the below link to reset your password.<br><br>'
												.'<a href="'.base_url().'Login/reset_password/'.$token.'"> Click here to reset your password!</a><br><br>'
												.'Thanks!';
							$email = \Config\Services::email();
							$email->setTo($to);
							$email->setFrom('United Coders Dev Team', SYSTEM_NAME);
							$email->setSubject($subject);
							$email->setMessage($message);
							$_POST['updated_date'] = date('Y-m-d h:i:s');
							if($model->updatedDate($_POST, $id)){
										if($email->send())
										{
											$data['success_login_forgot'] = 'Reset Password link sent to your registered email.<br>Please verify within 15 minutes.';
											$data['viewName'] = 'App\Views\forgotPassword';
									    echo view('App\Views\outside_layout\index', $data);
										}else{
											$_SESSION['error_login_forgot_password'] = '<b>Incorrect email!</b><br> Please check your email!';
											$this->session->markAsFlashdata('error_login_forgot_password');
											$data['viewName'] = 'App\Views\forgotPassword';
									    echo view('App\Views\outside_layout\index', $data);
										}
							}else{
								$_SESSION['error_login_forgot_password'] = 'You cannot update data!';
								$this->session->markAsFlashdata('error_login_forgot_password');
								$data['viewName'] = 'App\Views\forgotPassword';
						   		 echo view('App\Views\outside_layout\index', $data);
							}
						}
					}
			}
			else
			{
				$data['function_title'] = "Forgot Password";
				$data['viewName'] = 'App\Views\forgotPassword';
		    echo view('App\Views\outside_layout\index', $data);
			}
			// end of post
		}

		// start of index function
		public function reset_password($token = null)
		{
			$model = new UsersModel();
			$data = [];
			if(!empty($token)){
				$userdata = $model->verifyToken($token);
				// die($token);
				if(!empty($userdata)){
					if ($this->checkExpiryDate($userdata['updated_date'])) {
						// start of post
						if($_POST)
						{
									$passwordOK = 0;
									$users = $model->getUserWithCondition(['id' => $userdata['id'], 'status' => 'a']);
									// start checking of user existense
									if(!empty($users))
									{
										foreach($users as $user)
										{
											if($userdata['id'] == $user['id'])
											{
												$passwordOK = 1;
												$id = $user['id'];
												$firstname = $user['firstname'];
												$lastname = $user['lastname'];
												$email = $user['email'];
												break;
											}
										}
									}
									else
									{
										$_SESSION['error_login_forgot_password'] = 'Cannot Find Email!';
										$this->session->markAsFlashdata('error_login_forgot_password');
										return redirect()->to(base_url().'Login/reset_password'.$userdata['token']);
									}
									// end checking of user existense
									//checking if user is user credential is valid
									if($passwordOK == 1)
									{
										// die( $userdata['id']);
										// start of validation
										if (!$this->validate('resetEmailPassword'))
										{
											$data['errors'] = \Config\Services::validation()->getErrors();
											$data['token'] = $userdata['token'];
											$data['dataUser'] = $userdata['firstname'].' '.$userdata['lastname'];
											$data['viewName'] = 'App\Views\resetPassword';
											echo view('App\Views\outside_layout\index', $data);
										}
										else
										{
											unset($_POST['password_retype']);
								    	if($model->editUsers($_POST, $id))
								        {
													$data['success_login_forgot'] = '<b>Your password is successfully changed!</b><br>Please try to login.';
													$data['viewName'] = 'App\Views\login';
											    echo view('App\Views\outside_layout\index', $data);
								        }
								        else
								        {
													$data['error_login_forgot'] = '<b>Error in changing password!</b><br>Please check your inputted details.';
													// $this->session->markAsFlashdata('success_login_forgot');
													echo view('App\Views\outside_layout\index', $data);
								        }
											//end checking if user is user credential is valid
										}
										// end validation
									}
						}
						else
						{
							$data['dataUser'] = $userdata['firstname'].' '.$userdata['lastname'];
							$data['token'] = $userdata['token'];
							$data['viewName'] = 'App\Views\resetPassword';
							echo view('App\Views\outside_layout\index', $data);
						}
						// end of post
					}else{
						$data['error'] = 'Reset password link has expired!';
						$data['viewName'] = 'App\Views\resetPassword';
						echo view('App\Views\outside_layout\index', $data);
					}
				}else{
					$data['error'] = 'Unable to find user account!';
					$data['viewName'] = 'App\Views\resetPassword';
			    echo view('App\Views\outside_layout\index', $data);
				}
			}else{
				$data['error'] = 'Sorry! Unauthourized access!';
				$data['viewName'] = 'App\Views\resetPassword';
		    echo view('App\Views\outside_layout\index', $data);
			}
			// end of post
		}
		public function logout()
		{
			session_destroy();
			$_SESSION['success'] = 'Thank you. Come Again!';
			$this->session->markAsFlashdata('success');
	    	return redirect()->to(base_url());
		}

		public function checkExpiryDate($time)
		{
		  $updated_time = strtotime($time);
		  $current_time = time();
		//   $time_diff = ($current_time - $updated_time)/60;
		  if ($current_time - $updated_time < 120) {
			return true;
		  }else{
			return false;
		  }
		//   $time_diff = (strtotime(time())- strtotime($time))/60;
		//   die(strtotime($time));
		//   if ($time_diff < 120) {
		//     return true;
		//   }else{
		//     return false;
		//   }
		}
}
