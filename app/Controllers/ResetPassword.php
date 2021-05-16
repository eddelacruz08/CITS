<?php namespace App\Controllers;

use Modules\UserManagement\Models\UsersModel;

class ResetPassword extends BaseController
{
	// start of index function
	public function index()
	{
		$model = new UsersModel();
		// start of post
		if($_POST)
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
						echo view('App\Views\forgotPassword');
					}
					// end checking of user existense
					//checking if user is user credential is valid
					if($passwordOK == 1)
					{
						// start of validation
						if (!$this->validate('resetEmailPassword'))
						{
							$data['errors'] = \Config\Services::validation()->getErrors();
							echo view('App\Views\resetPassword', $data);
						}
						else
						{
							unset($_POST['password_retype']);
				    	if($model->editUsers($_POST, $id))
				        {
									$data['success_login_forgot'] = '<b>Your password is successfully change!</b><br>Please try to login.';
									echo view('App\Views\resetPassword', $data);
				        }
				        else
				        {
									$data['error_login_forgot'] = '<b>Error in changing password!</b><br>Please check your inputted details.';
									// $this->session->markAsFlashdata('success_login_forgot');
									echo view('App\Views\resetPassword', $data);
				        }
							//end checking if user is user credential is valid
						}
						// end validation
					}
		}
		else
		{
			echo view('App\Views\resetPassword');
		}
		// end of post
	}
	// end of index function
}
