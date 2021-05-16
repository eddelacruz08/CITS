<?php
namespace Modules\Guests\Controllers;

use Modules\Visits\Models\VisitsModel;
use Modules\Visits\Models\ChecklistModel;
use Modules\Guests\Models\GuestsModel;
use Modules\Maintenances\Models\CitiesModel;
use Modules\Maintenances\Models\ExtensionModel;
use Modules\Maintenances\Models\ProvinceModel;
use Modules\Maintenances\Models\GenderModel;
use Modules\Maintenances\Models\TypeModel;
use Modules\UserManagement\Models\UsersModel;
use Modules\UserManagement\Models\PermissionsModel;
use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;

use \Mpdf\Mpdf;

class Guests extends BaseController
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

  	$model = new UsersModel();
		$data['users'] = $model->getUsersLists();
    $data['function_title'] = "Guests List";
    $data['viewName'] = 'Modules\Guests\Views\guests\index';
    echo view('App\Views\theme\index', $data);
  }

  public function show_guest($id)
  {
		$this->hasPermissionRedirect('show-guest');

		$model = new UsersModel();
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

  public function add_guest()
  {
  	$this->hasPermissionRedirect('add-guest');

  	helper(['form', 'url']);
  	$model = new GuestsModel();
  	$extension_model = new ExtensionModel();
  	$gender_model = new GenderModel();
  	$province_model = new ProvinceModel();
  	$city_model = new CitiesModel();
  	$guest_type_model = new TypeModel();

    $data['extensions'] = $extension_model->get(['status'=> 'a']);
    $data['genders'] = $gender_model->get(['status'=> 'a']);
    $data['provinces'] = $province_model->get(['status'=> 'a']);
    $data['cities'] = $city_model->get(['status'=> 'a']);
    $data['guest_type'] = $guest_type_model->get(['status'=> 'a']);

  	if(!empty($_POST))
  	{
    	if (!$this->validate('patient'))
	    {
	    	$data['errors'] = \Config\Services::validation()->getErrors();
	      $data['function_title'] = "Adding Guest";
	      $data['viewName'] = 'Modules\Guests\Views\guests\frmGuest';
	      echo view('App\Views\theme\index', $data);
	    }
	    else
	    {
				$_POST['date'] = date('y-m-d');
	        if($model->add($_POST))
	        {
	        	$patient_id = $model->insertID();
	        	//$permissions_model->update_permitted_role($role_id, $_POST['function_id']);
	        	$_SESSION['success'] = 'You have added a new record';
						$this->session->markAsFlashdata('success');
	        	return redirect()->to(base_url('guests'));
	        }
	        else
	        {
	        	$_SESSION['error'] = 'You have an error in adding a new record';
						$this->session->markAsFlashdata('error');
	        	return redirect()->to(base_url('guests'));
	        }
	    }
  	}
  	else
  	{
    	$data['function_title'] = "Adding Guest";
      $data['viewName'] = 'Modules\Guests\Views\guests\frmGuest';
      echo view('App\Views\theme\index', $data);
  	}
  }

  public function edit_guest($id)
  {
  	$this->hasPermissionRedirect('edit-guest');
  	helper(['form', 'url']);
  	$model = new GuestsModel();
		$extension_model = new ExtensionModel();
		$gender_model = new GenderModel();
		$province_model = new ProvinceModel();
		$city_model = new CitiesModel();
		$guest_type_model = new TypeModel();

		$data['extensions'] = $extension_model->get(['status'=> 'a']);
		$data['genders'] = $gender_model->get(['status'=> 'a']);
		$data['provinces'] = $province_model->get(['status'=> 'a']);
		$data['cities'] = $city_model->get(['status'=> 'a']);
		$data['guest_type'] = $guest_type_model->get(['status'=> 'a']);

  	$data['rec'] = $model->getProfile($id);

  	$permissions_model = new PermissionsModel();

  	$data['permissions'] = $this->permissions;

  	if(!empty($_POST))
  	{
    	if (!$this->validate('patient'))
	    {
	    	$data['errors'] = \Config\Services::validation()->getErrors();
	        $data['function_title'] = "Edit of Guest";
	        $data['viewName'] = 'Modules\Guests\Views\guests\frmGuest';
	        echo view('App\Views\theme\index', $data);
	    }
	    else
	    {
	    	if($model->edit($_POST, $id))
	        {
	        	//$permissions_model->update_permitted_role($id, $_POST['function_id'], $data['rec']['function_id']);
	        	$_SESSION['success'] = 'You have updated a record';
						$this->session->markAsFlashdata('success');
	        	return redirect()->to(base_url('guests'));
	        }
	        else
	        {
	        	$_SESSION['error'] = 'You an error in updating a record';
						$this->session->markAsFlashdata('error');
	        	return redirect()->to( base_url('guests'));
	        }
	    }
  	}
  	else
  	{
    	$data['function_title'] = "Editing of Guest";
        $data['viewName'] = 'Modules\Guests\Views\guests\frmGuest';
        echo view('App\Views\theme\index', $data);
  	}
  }

  public function delete_guest($id)
  {
		// die('here');
  	$this->hasPermissionRedirect('delete-guest');

  	$model = new GuestsModel();
		if ($model->softDelete($id)) {
			$_SESSION['success'] = 'You have Deleted a record';
			$this->session->markAsFlashdata('success');
			return redirect()->to(base_url('guests'));
		}
		else{
			$_SESSION['error'] = 'You an error in updating a record';
			$this->session->markAsFlashdata('error');
			return redirect()->to( base_url('guests'));
		}
  }

	public function print_total_student(){

		//$this->hasPermissionRedirect('print-total-students');
  	$model = new GuestsModel();

		  	if(!empty($_POST))
		  	{
					if($_POST['start_date_filter'] == true && $_POST['end_date_filter'] == true && $_POST['user_type'] == true && $_POST['gender'] == true){
						$start_date_filter = $_POST['start_date_filter'];
						$end_date_filter = $_POST['end_date_filter'];
						$guest_filter = $_POST['user_type'];
						$gender_filter = $_POST['gender'];
						$data['guests_pdf'] = $model->orderBy('created_at' , 'desc')->get(['status'=> 'a', 'user_type'=> $guest_filter, 'gender'=> $gender_filter]);
					}elseif($_POST['start_date_filter'] == true && $_POST['end_date_filter'] == true && $_POST['user_type'] == true){
						$start_date_filter = $_POST['start_date_filter'];
						$end_date_filter = $_POST['end_date_filter'];
						$guest_filter = $_POST['user_type'];
						$data['guests_pdf'] = $model->orderBy('created_at' , 'desc')->get(['status'=> 'a', 'user_type'=> $guest_filter]);
					}elseif($_POST['gender'] == true && $_POST['user_type'] == true){
						$guest_filter = $_POST['user_type'];
						$gender_filter = $_POST['gender'];
						$data['guests_pdf'] = $model->orderBy('created_at' , 'desc')->get(['status'=> 'a', 'user_type'=> $guest_filter, 'gender'=> $gender_filter]);
					}elseif($_POST['gender'] == true && $_POST['start_date_filter'] == true && $_POST['end_date_filter'] == true){
						$start_date_filter = $_POST['start_date_filter'];
						$end_date_filter = $_POST['end_date_filter'];
						$gender_filter = $_POST['gender'];
						$data['guests_pdf'] = $model->orderBy('created_at' , 'desc')->get(['status'=> 'a', 'gender'=> $gender_filter]);
					}elseif($_POST['start_date_filter'] == true && $_POST['end_date_filter'] == true){
						$start_date_filter = date('y-m-d', strtotime($_POST['start_date_filter']));
						$end_date_filter = date('y-m-d', strtotime($_POST['end_date_filter']));
						$data['guests_pdf'] = $model->orderBy('created_at' , 'desc')->get(['status'=> 'a','date >='=> $start_date_filter,'date <=' => $end_date_filter]);
					}elseif($_POST['start_date_filter'] == true){
						$start_date_filter = date('y-m-d', strtotime($_POST['start_date_filter']));
						$data['guests_pdf'] = $model->orderBy('created_at' , 'desc')->get(['status'=> 'a','date' => $start_date_filter]);
					}elseif($_POST['user_type'] == true){
						$guest_filter = $_POST['user_type'];
						$data['guests_pdf'] = $model->orderBy('created_at' , 'desc')->get(['status'=> 'a','user_type'=> $guest_filter]);
					}elseif($_POST['gender'] == true){
						$gender_filter = $_POST['gender'];
						$data['guests_pdf'] = $model->orderBy('created_at' , 'desc')->get(['status'=> 'a','gender'=> $gender_filter]);
					}else{
						$data['guests_pdf'] = $model->orderBy('created_at' , 'desc')->get(['status'=> 'a']);
					}

						$html = '<html>
											<body>
											<div style="position: absolute; left:0; right: 0; top: 0; bottom: 0;">
											    <img src="http://localhost/HDS/public/img/PUPLogo.png"
											         style="width: 100px; height: 100px; margin-top: 75; margin-left: 60;" />
											</div>
											<br>
												<table>
													<thead>
														<tr>
															<td style="font-size: 20px; margin-top: 5px; margin-bottom: 0;" width="20%"></td>
															<td style="font-size: 18px; margin-top: 5px; margin-bottom: 0;" width="90%"><p>POLYTECHNIC UNIVERSITY OF THE PHILIPPINES</p></td>
														</tr>
														<tr>
															<td width="20%"></td>
															<td style="font-size: 18px; margin-top: 5px; margin-bottom: 0;" width="80%"><p>TAGUIG BRANCH</p></td>
														</tr>
														<tr>
															<td width="20%"></td>
															<td style="font-size: 18px; margin-top: 5px; margin-bottom: 0;" width="80%"><p>MEDICAL SERVICES DEPARTMENT</p></td>
														</tr>
													</thead>
												</table>
												<h3 align="center">HEALTH DECLARATION REPORT</h3>
												<hr>';


								$html .= '
												<table>
													<tbody align="center">
														<tr>
																<th style="width: 70px; border: 0px solid dark;">ID</th>
																<th style="width: 157px; border: 0px solid dark;">Fullname</th>
																<th style="width: 148px; border: 0px solid dark;">Guest Category</th>
																<th style="width: 145px; border: 0px solid dark;">Gender</th>
																<th style="width: 155px; border: 0px solid dark;">Contact Number</th>
														</tr>
													</tbody>
												</table>';
											$cnt = 1;
											foreach($data['guests_pdf'] as $guest){

												if($guest['user_type'] == 's'){
													$user_type = 'Student';
												}
												elseif($guest['user_type'] == 'f'){
													$user_type = 'Faculty';
												}
												elseif($guest['user_type'] == 'e'){
													$user_type = 'Employee';
												}
												elseif($guest['user_type'] == 'o'){
													$user_type = 'Outsider';
												}else{
													$user_type = 'Nothing';
												}
												$id = $guest['id'];
												$created_at = $guest['created_at'];
												$full_name = $guest['first_name'].' '.$guest['middle_name'].' '.$guest['last_name'].' '.$guest['ext_name'];
												$email = $guest['email'];
												$email = $guest['email'];
												$gender = $guest['gender'] == 'm' ? 'Male': 'Female';
												$cellphone_no = $guest['cellphone_no'];
						 $html .= '
									<table>
										<tbody>
											<tr>
												<td align="center" style="width: 70px; border: 0px solid dark;">'.$cnt++.'</td>
												<td align="center" style="width: 157px; border: 0px solid dark;">'. ucwords($full_name).'</td>
												<td align="center" style="width: 148px; border: 0px solid dark;">'. $user_type.'</td>
												<td align="center" style="width: 145px; border: 0px solid dark;">'. ucfirst($gender) .'</td>
												<td align="center" style="width: 155px; border: 0px solid dark;">'. ucwords($cellphone_no) .'</td>
											</tr>
											</tbody>
										</table>';
									}
					 $html .= '<hr>	</body>
					 </html>';

								$mpdf = new \Mpdf\Mpdf(['orientation' => 'P']);
								// Write some HTML code:
								$arr = array (
									'odd' => array (
										'L' => array (
											'content' => date('F d, Y'),
											'font-size' => 10,
											'font-style' => 'B',
											'font-family' => 'arial',
											'color'=>'#000000'
										),
										'C' => array (
											'content' => '',
											'font-size' => 10,
											'font-style' => 'B',
											'font-family' => 'arial',
											'color'=>'#000000'
										),
										'R' => array (
											'content' => '{PAGENO}/{nbpg}',
											'font-size' => 10,
											'font-style' => 'I',
											'font-family' => 'arial',
											'color'=>'#000000'
										),
										'line' => 1,
									),
									'even' => array ()
								);
								$mpdf->SetHeader($arr);
								$mpdf->SetTitle('Guest List pdf');
								$mpdf->WriteHTML($html);
								return redirect()->to($mpdf->Output('GuestList-'.date('F d, Y').'.pdf', 'I'))->setContentType('Content/Application');
								exit;

		  	}
		  	else
		  	{
					$data['guests'] = $model->get(['status'=> 'a']);

					$data['function_title'] = "Generate PDF";
					$data['viewName'] = 'Modules\Guests\Views\guests\guestPDF';
					echo view('App\Views\theme\index', $data);
		  	}
	}

	public function print_summary($id,$cId)
	{
			$model = new UsersModel();
			$checklist_model = new ChecklistModel();

			$data['health_summarys'] = $checklist_model->getGuestSummary($cId);
			$data['profiles'] = $model->get(['status' => 'a','id' => $id]);

			foreach ($data['health_summarys'] as $health )
			{
				$date = $health['created_at'];
				$temperature = $health['temperature'];
				$temp_type = $health['temp_type'];
				$department = $health['department'];

				$one_a = $health['one_a'];
				$one_a_date = $health['one_a_date'];
				$one_b = $health['one_b'];
				$one_b_date = $health['one_b_date'];
				$one_c = $health['one_c'];
				$one_c_date = $health['one_c_date'];
				$one_d = $health['one_d'];
				$one_d_date = $health['one_d_date'];
				$one_e = $health['one_e'];
				$one_e_date = $health['one_e_date'];
				$one_f = $health['one_f'];
				$one_f_date = $health['one_f_date'];
				$two_travel = $health['two_travel'];
				$two_travel_address = $health['two_travel_address'];
				$three_contact_one = $health['three_contact_one'];
				$three_contact_two = $health['three_contact_two'];
				$three_contact_three = $health['three_contact_three'];
				$three_contact_four = $health['three_contact_four'];
				$four_existing = $health['four_existing'];
				$four_existing_specify = $health['four_existing_specify'];
				$five_pregnant = $health['five_pregnant'];
				// patient defined or note
				if($temperature >= 36.1 && $temperature <= 37.2){
					$defined = 'This patient is <b>negative</b> for the illness.';
				}
				elseif($temperature >= 37.3){
					$defined = 'This patient is <b>positive</b> for the illness.';
				}
				elseif($temperature <= 36){
					$defined = 'This patient is <b>positive</b> for the illness.';
				}
				else{
					$defined = 'This patient is <b>negative</b> for the illness.';
				}
				if($temperature >= 36.1 && $temperature <= 37.2){
					$temp_defined = 'He/She has normal body temperature of <b>'.$temperature.' ℃</b>.';
				}
				elseif($temperature >= 37.3){
					$temp_defined = 'He/She has high body temperature of <b>'.$temperature.' ℃</b>.';
				}
				elseif($temperature <= 36){
					$temp_defined = 'He/She has low body temperature of <b>'.$temperature.' ℃</b>.';
				}else{
					$temp_defined = 'b>No data Found!</b>.';
				}
				// patients questions
				if ($one_a >= 'yes') {
					$one_a = '<span>'.ucfirst($one_a).' Date: '.date('F d, Y', strtotime($one_a_date)).'</span>';
				}else{
					$one_a = '<span>'.ucfirst($one_a).'</span>';
				}
				if ($one_b >= 'yes') {
					$one_b = '<span>'.ucfirst($one_b).' Date: '.date('F d, Y', strtotime($one_b_date)).'</span>';
				}else{
					$one_b = '<span>'.ucfirst($one_b).'</span>';
				}
				if ($one_c >= 'yes') {
					$one_c = '<span>'.ucfirst($one_c).' Date: '.date('F d, Y', strtotime($one_c_date)).'</span>';
				}else{
					$one_c = '<span>'.ucfirst($one_c).'</span>';
				}
				if ($one_d >= 'yes') {
					$one_d = '<span>'.ucfirst($one_d).' Date: '.date('F d, Y', strtotime($one_d_date)).'</span>';
				}else{
					$one_d = '<span>'.ucfirst($one_d).'</span>';
				}
				if ($one_e >= 'yes') {
					$one_e = '<span>'.ucfirst($one_e).' Date: '.date('F d, Y', strtotime($one_e_date)).'</span>';
				}else{
					$one_e = '<span>'.ucfirst($one_e).'</span>';
				}
				if ($one_f >= 'yes') {
					$one_f = '<span>'.ucfirst($one_f).' Date: '.date('F d, Y', strtotime($one_f_date)).'</span>';
				}else{
					$one_f = '<span>'.ucfirst($one_f).'</span>';
				}
				if ($two_travel >= 'yes') {
					$two_travel = '<span>'.ucfirst($two_travel).' Address: '.$two_travel_address.'</span>';
				}else{
					$two_travel = '<span>'.ucfirst($two_travel).'</span>';
				}

				if ($three_contact_one >= 'yes') {
					$three_contact_one = '<span>'.ucfirst($three_contact_one).'</span>';
				}else{
					$three_contact_one = '<span>'.ucfirst($three_contact_one).'</span>';
				}
				if ($three_contact_two >= 'yes') {
					$three_contact_two = '<span>'.ucfirst($three_contact_two).'</span>';
				}else{
					$three_contact_two = '<span>'.ucfirst($three_contact_two).'</span>';
				}
				if ($three_contact_three >= 'yes') {
					$three_contact_three = '<span>'.ucfirst($three_contact_three).'</span>';
				}else{
					$three_contact_three = '<span>'.ucfirst($three_contact_three).'</span>';
				}
				if ($three_contact_four >= 'yes') {
					$three_contact_four = '<span>'.ucfirst($three_contact_four).'</span>';
				}else{
					$three_contact_four = '<span>'.ucfirst($three_contact_four).'</span>';
				}

				if ($four_existing >= 'yes') {
					$four_existing = '<span>'.ucfirst($four_existing).' Pre-illness: '.$four_existing_specify.'</span>';
				}else{
					$four_existing = '<span>'.ucfirst($four_existing).'</span>';
				}

				if ($five_pregnant >= 'yes') {
					$five_pregnant = '<span>'.ucfirst($five_pregnant).'</span>';
				}else{
					$five_pregnant = '<span>'.ucfirst($five_pregnant).'</span>';
				}


					foreach ( $data['profiles'] as $health )
					{
						$fullname = $health['first_name'].' '.$health['middle_name'].' '.$health['last_name'].' '.$health['ext_name'];
						$email = $health['email'];
						$address = $health['address'];
						$cellphone_no = $health['cellphone_no'];
						$landline_no = $health['landline_no'];
						$birthdate = $health['birthdate'];
						$gender = $health['gender'];
						$user_type = $health['user_type'];
					}
					if ($gender >= 'f') {
						$gender = '<span>Female</span>';
					}else{
						$gender = '<span>Male</span>';
					}
					if($user_type == 's'){$user_type = 'Student';}
					elseif($user_type == 'f'){$user_type = 'Faculty';}
					elseif($user_type == 'e'){$user_type = 'Employee';}
					elseif($user_type == 'o'){$user_type = 'Outsider';}
					else{$user_type = 'None';}

					$time = new Time($date, 'Asia/Singapore', 'en_US');
					$hour = $time->format('H');
					if($hour < 12){
						$temp = '<b>AM</b>: '.$temperature;
					}else{
						$temp = '<b>PM</b>: '.$temperature;
					}

				$html = '<html>
									<body>
									<div style="position: absolute; left:0; right: 0; top: 0; bottom: 0;">
											<img src="http://localhost/HDS/public/img/PUPLogo.png"
													 style="width: 100px; height: 100px; margin-top: 75; margin-left: 60;" />
									</div>
									<div style="position: absolute; left:0; right: 0; top: 0; bottom: 0;">
											<p style="border: solid 1px black; font-size: 15px; padding: 10px; margin-left: 620; margin-right: 60; margin-top: 80;">
												<u> '.$temp.' ℃.</u><br>Temperature
											</p>
									</div>
									<br>
										<table>
											<thead>
												<tr>
													<td style="font-size: 20px; margin-top: 5px; margin-bottom: 0;" width="20%"></td>
													<td style="font-size: 18px; margin-top: 5px; margin-bottom: 0;" width="90%"><p>POLYTECHNIC UNIVERSITY OF THE PHILIPPINES</p></td>
												</tr>
												<tr>
													<td width="20%"></td>
													<td style="font-size: 18px; margin-top: 5px; margin-bottom: 0;" width="80%"><p>TAGUIG BRANCH</p></td>
												</tr>
												<tr>
													<td width="20%"></td>
													<td style="font-size: 18px; margin-top: 5px; margin-bottom: 0;" width="80%"><p>MEDICAL SERVICES DEPARTMENT</p></td>
												</tr>
											</thead>
										</table>

										<h3 align="center">HEALTH DECLARATION REPORT</h3>';
				$html .= '		<table align="left">
												<thead>
													<tr>
														<td width="60%"><b>Full Name: </b>'. ucwords($fullname) . '</td>
														<td width="20%"><b>Date: </b>'. date('F d, Y', strtotime($date)).'</td>
														<td width="20%"><b>Time: </b>'. date('h:i a', strtotime($date)).'</td>
													</tr>
													<tr>
														<td width="60%"><b>Email: </b>'. $email . '</td>
														<td width="20%"><b>Age: </b>'. date_diff(date_create($birthdate), date_create(date('Y-m-d')))->format("%y").' year(s) old</td>
														<td width="30%"><b>Type: </b>'.$user_type.'</td>
													</tr>
													<tr>
														<td width="60%"><b>Contact No.: </b>'. $cellphone_no . '</td>
														<td width="50%"><b>Birth Date: </b>'. date('F d, Y', strtotime($birthdate)).'</td>
													</tr>
													<tr>
														<td width="60%"><b>Landline No.: </b>'. $landline_no . '</td>
														<td width="50%"><b>Gender: </b>'. $gender.'</td>
													</tr>
													<tr>
														<td width="60%"><b>Place visited: </b>'. $department . '</td>
													</tr>
												</thead>
											</table>
												<br>
											<table style="border: solid 1px dark;">
												<thead>
													<tr>
														<th>Questions</th>
														<th>Answers</th>
													</tr>
												</thead>
												<tbody>
													<tr style="border-bottom: solid 1px black;">
														<td width="200px"><b>1. Are you experiencing: </b></td>
														<td  align="center" width="200px"></td>
													</tr>
													<tr>
														<td width="500px">a. Fever greater than 38℃ (Lagnat:) </td>
														<td  align="center" width="50px">'.$one_a.'</td>
													</tr>
													<tr>
														<td width="500px">b. Cough and/or colds (Ubo at/ sipon) </td>
														<td  align="center" width="50px">'.$one_b.'</td>
													</tr>
													<tr>
														<td width="500px">c. Body pains (pananakit ng katawan) </td>
														<td  align="center" width="50px">'.$one_c.'</td>
													</tr>
													<tr>
														<td width="500px">d. Sore throat (pananakit ng lalamunan/hirap lumunok) </td>
														<td  align="center" width="50px">'.$one_d.'</td>
													</tr>
													<tr>
														<td width="500px">e. Shortness of breath (hirap sa paghinga) </td>
														<td  align="center" width="50px">'.$one_e.'</td>
													</tr>
													<tr>
														<td width="500px">f. Diarrhea (pagtatae) </td>
														<td  align="center" width="50px">'.$one_f.'</td>
													</tr>

													<tr style="border-bottom: solid 1px black;">
														<td width="200px"><b>2. Travel History: </b></td>
														<td  align="center" width="200px"></td>
													</tr>
													<tr>
														<td width="500px">a. For the last 14 days, did you travel to a country or a place with high number of COVID-19 patients? </td>
														<td  align="center" width="50px">'.$two_travel.'</td>
													</tr>

													<tr style="border-bottom: solid 1px black;">
														<td width="200px"><b>3. Did you have any close contact or interaction with any of the following: </b></td>
														<td  align="center" width="200px"></td>
													</tr>
													<tr>
														<td width="500px">•	Individuals providing direct care, and/or working with individuals infected with COVID-19, and/or visiting or staying in the same environment with COVID-19 patient? </td>
														<td  align="center" width="50px">'.$three_contact_one.'</td>
													</tr>
													<tr>
														<td width="500px">•	In close proximity or shared the same room with a COVID-19 patient? </td>
														<td  align="center" width="50px">'.$three_contact_two.'</td>
													</tr>
													<tr>
														<td width="500px">•	Travelled together with COVID-19 patient? </td>
														<td  align="center" width="50px">'.$three_contact_three.'</td>
													</tr>
													<tr>
														<td width="500px">•	Living with a COVID-19 patient within a 14-day period after the onset of his/her symptoms? </td>
														<td  align="center" width="50px">'.$three_contact_four.'</td>
													</tr>

													<tr style="border-bottom: solid 1px black;">
														<td width="200px"><b>4. Do you have pre-existing illness? </b></td>
														<td  align="center" width="200px"></td>
													</tr>
													<tr>
														<td width="500px">•	Do you have pre-existing illness? </td>
														<td  align="center" width="50px">'.$four_existing.'</td>
													</tr>

													<tr style="border-bottom: solid 1px black;">
														<td width="200px"><b>5. Are you pregnant? </b></td>
														<td  align="center" width="200px"></td>
													</tr>
													<tr>
														<td width="500px">•	Are you pregnant? </td>
														<td  align="center" width="50px">'.$five_pregnant.'</td>
													</tr>
												</tbody>
										</table>
											<br>

											<table style="border: solid 1px black;">
												<tbody>
													<tr>
														<td width="700px"><b>Result: </b><br>'.$defined.' '.$temp_defined.'</td>
													</tr>
												</tbody>
											</table>
											<br>
											<table>
												<tbody>
													<tr style="border-bottom: solid 1px black;">
														<td width="100%"><b>NOTE: </b> Rest assured that all information will be treated in utmost confidentiality. <br> (Makatitiyak ka na ang lahat ng impormasyon ay magiging kompidensiyal.)</td>
													</tr>
												</tbody>
										</table>';
			}
			 $html .= '	</body>
			 </html>';

						$mpdf = new \Mpdf\Mpdf(['orientation' => 'P']);
						// Write some HTML code:
						$arr = array (
							'odd' => array (
								'L' => array (
									'content' => date('F d, Y', strtotime($health['created_at'])),
									'font-size' => 10,
									'font-style' => 'B',
									'font-family' => 'arial',
									'color'=>'#000000'
								),
								'C' => array (
									'content' => '',
									'font-size' => 10,
									'font-style' => 'B',
									'font-family' => 'arial',
									'color'=>'#000000'
								),
								'R' => array (
									'content' => '{PAGENO}/{nbpg}',
									'font-size' => 10,
									'font-style' => 'I',
									'font-family' => 'arial',
									'color'=>'#000000'
								),
								'line' => 1,
							),
							'even' => array ()
						);
						$mpdf->SetHeader($arr);
						$mpdf->WriteHTML($html,2);
						// $mpdf->AddPage('L');
						return redirect()->to($mpdf->output($fullname.' - '.date('F d, Y', strtotime($date)).'.pdf', 'I'))->setContentType('application/pdf');
	}

  public function print($id)
  {
			$model = new GuestsModel();
			$checklist_model = new ChecklistModel();

			$data['checklist'] = $checklist_model->getLatestChecklist($id);
			$data['profiles'] = $model->get(['status' => 'a','id' => $id]);

			foreach ($data['checklist'] as $health )
			{
				$date = $health['created_at'];
				$temperature = $health['temperature'];
				$temp_type = $health['temp_type'];
				$department = $health['department'];

				$one_a = $health['one_a'];
				$one_a_date = $health['one_a_date'];
				$one_b = $health['one_b'];
				$one_b_date = $health['one_b_date'];
				$one_c = $health['one_c'];
				$one_c_date = $health['one_c_date'];
				$one_d = $health['one_d'];
				$one_d_date = $health['one_d_date'];
				$one_e = $health['one_e'];
				$one_e_date = $health['one_e_date'];
				$one_f = $health['one_f'];
				$one_f_date = $health['one_f_date'];
				$two_travel = $health['two_travel'];
				$two_travel_address = $health['two_travel_address'];
				$three_contact_one = $health['three_contact_one'];
				$three_contact_two = $health['three_contact_two'];
				$three_contact_three = $health['three_contact_three'];
				$three_contact_four = $health['three_contact_four'];
				$four_existing = $health['four_existing'];
				$four_existing_specify = $health['four_existing_specify'];
				$five_pregnant = $health['five_pregnant'];
				// patient defined or note
				if($temperature >= 36.1 && $temperature <= 37.2){
					$defined = 'This patient is <b>negative</b> for the illness.';
				}
				elseif($temperature >= 37.3){
					$defined = 'This patient is <b>positive</b> for the illness.';
				}
				elseif($temperature <= 36){
					$defined = 'This patient is <b>positive</b> for the illness.';
				}
				else{
					$defined = 'This patient is <b>negative</b> for the illness.';
				}
				if($temperature >= 36.1 && $temperature <= 37.2){
					$temp_defined = 'He/She has normal body temperature of <b>'.$temperature.' ℃</b>.';
				}
				elseif($temperature >= 37.3){
					$temp_defined = 'He/She has high body temperature of <b>'.$temperature.' ℃</b>.';
				}
				elseif($temperature <= 36){
					$temp_defined = 'He/She has low body temperature of <b>'.$temperature.' ℃</b>.';
				}else{
					$temp_defined = 'b>No data Found!</b>.';
				}
				// patients questions
				if ($one_a >= 'yes') {
					$one_a = '<span>'.ucfirst($one_a).' Date: '.date('F d, Y', strtotime($one_a_date)).'</span>';
				}else{
					$one_a = '<span>'.ucfirst($one_a).'</span>';
				}
				if ($one_b >= 'yes') {
					$one_b = '<span>'.ucfirst($one_b).' Date: '.date('F d, Y', strtotime($one_b_date)).'</span>';
				}else{
					$one_b = '<span>'.ucfirst($one_b).'</span>';
				}
				if ($one_c >= 'yes') {
					$one_c = '<span>'.ucfirst($one_c).' Date: '.date('F d, Y', strtotime($one_c_date)).'</span>';
				}else{
					$one_c = '<span>'.ucfirst($one_c).'</span>';
				}
				if ($one_d >= 'yes') {
					$one_d = '<span>'.ucfirst($one_d).' Date: '.date('F d, Y', strtotime($one_d_date)).'</span>';
				}else{
					$one_d = '<span>'.ucfirst($one_d).'</span>';
				}
				if ($one_e >= 'yes') {
					$one_e = '<span>'.ucfirst($one_e).' Date: '.date('F d, Y', strtotime($one_e_date)).'</span>';
				}else{
					$one_e = '<span>'.ucfirst($one_e).'</span>';
				}
				if ($one_f >= 'yes') {
					$one_f = '<span>'.ucfirst($one_f).' Date: '.date('F d, Y', strtotime($one_f_date)).'</span>';
				}else{
					$one_f = '<span>'.ucfirst($one_f).'</span>';
				}
				if ($two_travel >= 'yes') {
					$two_travel = '<span>'.ucfirst($two_travel).' Address: '.$two_travel_address.'</span>';
				}else{
					$two_travel = '<span>'.ucfirst($two_travel).'</span>';
				}

				if ($three_contact_one >= 'yes') {
					$three_contact_one = '<span>'.ucfirst($three_contact_one).'</span>';
				}else{
					$three_contact_one = '<span>'.ucfirst($three_contact_one).'</span>';
				}
				if ($three_contact_two >= 'yes') {
					$three_contact_two = '<span>'.ucfirst($three_contact_two).'</span>';
				}else{
					$three_contact_two = '<span>'.ucfirst($three_contact_two).'</span>';
				}
				if ($three_contact_three >= 'yes') {
					$three_contact_three = '<span>'.ucfirst($three_contact_three).'</span>';
				}else{
					$three_contact_three = '<span>'.ucfirst($three_contact_three).'</span>';
				}
				if ($three_contact_four >= 'yes') {
					$three_contact_four = '<span>'.ucfirst($three_contact_four).'</span>';
				}else{
					$three_contact_four = '<span>'.ucfirst($three_contact_four).'</span>';
				}

				if ($four_existing >= 'yes') {
					$four_existing = '<span>'.ucfirst($four_existing).' Pre-illness: '.$four_existing_specify.'</span>';
				}else{
					$four_existing = '<span>'.ucfirst($four_existing).'</span>';
				}

				if ($five_pregnant >= 'yes') {
					$five_pregnant = '<span>'.ucfirst($five_pregnant).'</span>';
				}else{
					$five_pregnant = '<span>'.ucfirst($five_pregnant).'</span>';
				}


					foreach ( $data['profiles'] as $health )
					{
						$fullname = $health['first_name'].' '.$health['middle_name'].' '.$health['last_name'].' '.$health['ext_name'];
						$email = $health['email'];
						$address = $health['address'];
						$cellphone_no = $health['cellphone_no'];
						$landline_no = $health['landline_no'];
						$birthdate = $health['birthdate'];
						$gender = $health['gender'];
						$user_type = $health['user_type'];
					}
					if ($gender >= 'f') {
						$gender = '<span>Female</span>';
					}else{
						$gender = '<span>Male</span>';
					}
					if($user_type == 's'){$user_type = 'Student';}
					elseif($user_type == 'f'){$user_type = 'Faculty';}
					elseif($user_type == 'e'){$user_type = 'Employee';}
					elseif($user_type == 'o'){$user_type = 'Outsider';}
					else{$user_type = 'None';}

					$time = new Time($date, 'Asia/Singapore', 'en_US');
					$hour = $time->format('H');
					if($hour < 12){
						$temp = '<b>AM</b>: '.$temperature;
					}else{
						$temp = '<b>PM</b>: '.$temperature;
					}

				$html = '<html>
									<body>
									<div style="position: absolute; left:0; right: 0; top: 0; bottom: 0;">
									    <img src="http://localhost/HDS/public/img/PUPLogo.png"
									         style="width: 100px; height: 100px; margin-top: 75; margin-left: 60;" />
									</div>
									<div style="position: absolute; left:0; right: 0; top: 0; bottom: 0;">
									    <p style="border: solid 1px black; font-size: 15px; padding: 10px; margin-left: 620; margin-right: 60; margin-top: 80;">
												<u> '.$temp.' ℃.</u><br>Temperature
											</p>
									</div>
									<br>
										<table>
											<thead>
												<tr>
													<td style="font-size: 20px; margin-top: 5px; margin-bottom: 0;" width="20%"></td>
													<td style="font-size: 18px; margin-top: 5px; margin-bottom: 0;" width="90%"><p>POLYTECHNIC UNIVERSITY OF THE PHILIPPINES</p></td>
												</tr>
												<tr>
													<td width="20%"></td>
													<td style="font-size: 18px; margin-top: 5px; margin-bottom: 0;" width="80%"><p>TAGUIG BRANCH</p></td>
												</tr>
												<tr>
													<td width="20%"></td>
													<td style="font-size: 18px; margin-top: 5px; margin-bottom: 0;" width="80%"><p>MEDICAL SERVICES DEPARTMENT</p></td>
												</tr>
											</thead>
										</table>

										<h3 align="center">HEALTH DECLARATION REPORT</h3>';
				$html .= '		<table align="left">
												<thead>
													<tr>
														<td width="60%"><b>Full Name: </b>'. ucwords($fullname) . '</td>
														<td width="20%"><b>Date: </b>'. date('F d, Y', strtotime($date)).'</td>
														<td width="20%"><b>Time: </b>'. date('h:i a', strtotime($date)).'</td>
													</tr>
													<tr>
														<td width="60%"><b>Email: </b>'. $email . '</td>
														<td width="20%"><b>Age: </b>'. date_diff(date_create($birthdate), date_create(date('Y-m-d')))->format("%y").' year(s) old</td>
														<td width="30%"><b>Type: </b>'.$user_type.'</td>
													</tr>
													<tr>
														<td width="60%"><b>Contact No.: </b>'. $cellphone_no . '</td>
														<td width="50%"><b>Birth Date: </b>'. date('F d, Y', strtotime($birthdate)).'</td>
													</tr>
													<tr>
														<td width="60%"><b>Landline No.: </b>'. $landline_no . '</td>
														<td width="50%"><b>Gender: </b>'. $gender.'</td>
													</tr>
													<tr>
														<td width="60%"><b>Place visited: </b>'. $department . '</td>
													</tr>
												</thead>
											</table>
												<br>
											<table style="border: solid 1px dark;">
												<thead>
													<tr>
														<th>Questions</th>
														<th>Answers</th>
													</tr>
												</thead>
												<tbody>
													<tr style="border-bottom: solid 1px black;">
														<td width="200px"><b>1. Are you experiencing: </b></td>
														<td  align="center" width="200px"></td>
													</tr>
													<tr>
														<td width="500px">a. Fever greater than 38℃ (Lagnat:) </td>
														<td  align="center" width="50px">'.$one_a.'</td>
													</tr>
													<tr>
														<td width="500px">b. Cough and/or colds (Ubo at/ sipon) </td>
														<td  align="center" width="50px">'.$one_b.'</td>
													</tr>
													<tr>
														<td width="500px">c. Body pains (pananakit ng katawan) </td>
														<td  align="center" width="50px">'.$one_c.'</td>
													</tr>
													<tr>
														<td width="500px">d. Sore throat (pananakit ng lalamunan/hirap lumunok) </td>
														<td  align="center" width="50px">'.$one_d.'</td>
													</tr>
													<tr>
														<td width="500px">e. Shortness of breath (hirap sa paghinga) </td>
														<td  align="center" width="50px">'.$one_e.'</td>
													</tr>
													<tr>
														<td width="500px">f. Diarrhea (pagtatae) </td>
														<td  align="center" width="50px">'.$one_f.'</td>
													</tr>

													<tr style="border-bottom: solid 1px black;">
														<td width="200px"><b>2. Travel History: </b></td>
														<td  align="center" width="200px"></td>
													</tr>
													<tr>
														<td width="500px">a. For the last 14 days, did you travel to a country or a place with high number of COVID-19 patients? </td>
														<td  align="center" width="50px">'.$two_travel.'</td>
													</tr>

													<tr style="border-bottom: solid 1px black;">
														<td width="200px"><b>3. Did you have any close contact or interaction with any of the following: </b></td>
														<td  align="center" width="200px"></td>
													</tr>
													<tr>
														<td width="500px">•	Individuals providing direct care, and/or working with individuals infected with COVID-19, and/or visiting or staying in the same environment with COVID-19 patient? </td>
														<td  align="center" width="50px">'.$three_contact_one.'</td>
													</tr>
													<tr>
														<td width="500px">•	In close proximity or shared the same room with a COVID-19 patient? </td>
														<td  align="center" width="50px">'.$three_contact_two.'</td>
													</tr>
													<tr>
														<td width="500px">•	Travelled together with COVID-19 patient? </td>
														<td  align="center" width="50px">'.$three_contact_three.'</td>
													</tr>
													<tr>
														<td width="500px">•	Living with a COVID-19 patient within a 14-day period after the onset of his/her symptoms? </td>
														<td  align="center" width="50px">'.$three_contact_four.'</td>
													</tr>

													<tr style="border-bottom: solid 1px black;">
														<td width="200px"><b>4. Do you have pre-existing illness? </b></td>
														<td  align="center" width="200px"></td>
													</tr>
													<tr>
														<td width="500px">•	Do you have pre-existing illness? </td>
														<td  align="center" width="50px">'.$four_existing.'</td>
													</tr>

													<tr style="border-bottom: solid 1px black;">
														<td width="200px"><b>5. Are you pregnant? </b></td>
														<td  align="center" width="200px"></td>
													</tr>
													<tr>
														<td width="500px">•	Are you pregnant? </td>
														<td  align="center" width="50px">'.$five_pregnant.'</td>
													</tr>
												</tbody>
										</table>
											<br>

											<table style="border: solid 1px black;">
												<tbody>
													<tr>
														<td width="700px"><b>Result: </b><br>'.$defined.' '.$temp_defined.'</td>
													</tr>
												</tbody>
											</table>
											<br>
											<table>
												<tbody>
													<tr style="border-bottom: solid 1px black;">
														<td width="100%"><b>NOTE: </b> Rest assured that all information will be treated in utmost confidentiality. <br> (Makatitiyak ka na ang lahat ng impormasyon ay magiging kompidensiyal.)</td>
													</tr>
												</tbody>
										</table>';
			}
			 $html .= '	</body>
			 </html>';

						$mpdf = new \Mpdf\Mpdf(['orientation' => 'P']);
						// Write some HTML code:
						$arr = array (
							'odd' => array (
								'L' => array (
									'content' => date('F d, Y', strtotime($health['created_at'])),
									'font-size' => 10,
									'font-style' => 'B',
									'font-family' => 'arial',
									'color'=>'#000000'
								),
								'C' => array (
									'content' => '',
									'font-size' => 10,
									'font-style' => 'B',
									'font-family' => 'arial',
									'color'=>'#000000'
								),
								'R' => array (
									'content' => '{PAGENO}/{nbpg}',
									'font-size' => 10,
									'font-style' => 'I',
									'font-family' => 'arial',
									'color'=>'#000000'
								),
								'line' => 1,
							),
							'even' => array ()
						);
						$mpdf->SetHeader($arr);
						$mpdf->WriteHTML($html,2);
						// $mpdf->AddPage('L');
						return redirect()->to($mpdf->output($fullname.' - '.date('F d, Y', strtotime($date)).'.pdf', 'I'))->setContentType('application/pdf');
  }

}
