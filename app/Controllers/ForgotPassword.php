<?php namespace App\Controllers;

use Modules\UserManagement\Models\UsersModel;

class ForgotPassword extends BaseController
{
	// start of index function
	public function index()
	{
		$model = new UsersModel();
		// start of post
		if($_POST)
		{
				// start of validation
				if (!$this->validate('email'))
		    {
		    	$data['errors'] = \Config\Services::validation()->getErrors();
					echo view('App\Views\forgotPassword', $data);
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
						$to = $email;
						$subject = 'Forgot Password';
						$message = 'Hi '.$firstname.' '.$lastname.'!<br><a href="'.base_url().'ResetPassword/index"> Reset your password here!</a>';
						$email = \Config\Services::email();
						$email->setTo($to);
						$email->setFrom('United Coders Dev Team', SYSTEM_NAME);
						$email->setSubject($subject);
						$email->setMessage($message);
						if($email->send())
						{
							$data['success_login_forgot'] = '<b>Email sent successfully!</b><br>Please check your email to reset your password.';
							// $this->session->markAsFlashdata('success_login_forgot');
							echo view('App\Views\forgotPassword', $data);
						}else{
							// $data = $email->printDebugger(['headers']);
							// print_r($data);
							$_SESSION['error_login_forgot_password'] = '<b>Incorrect email!</b><br> Please check your email!';
							$this->session->markAsFlashdata('error_login_forgot_password');
							echo view('App\Views\forgotPassword');
						}
						//end checking if user is user credential is valid
					}
				}
				// end validation
		}
		else
		{
			echo view('App\Views\forgotPassword');
		}
		// end of post
	}
	// end of index function
}
