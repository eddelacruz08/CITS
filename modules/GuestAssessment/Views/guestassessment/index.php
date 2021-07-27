
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<style>
/* body {
	font-family: 'Varela Round', sans-serif;
} */
/* .modal-confirm {		
	color: #636363;
	width: 400px;
} */
.modal-confirm .modal-content {
	padding: 10px;
	border-radius: 5px;
	border: none;
	text-align: center;
	font-size: 14px;
}
.modal-confirm .modal-header {
	border-bottom: none;   
	position: relative;
}
.modal-confirm h4 {
	text-align: center;
	font-size: 26px;
	/* margin: 30px 0 -10px; */
}
.modal-confirm .close {
	position: absolute;
	top: 5px;
	right: 2px;
}
.modal-confirm .modal-body {
	color: #3d3d3d;
}
.modal-confirm .modal-footer {
	border: none;
	text-align: center;		
	border-radius: 5px;
	font-size: 13px;
	/* padding: 10px 15px 25px; */
}
.modal-confirm .modal-footer a {
	color: #999;
}		
.modal-confirm .icon-box {
	width: 50px;
	height: 50px;
	margin: 0 auto;
	border-radius: 50%;
	z-index: 9;
	text-align: center;
	border: 3px solid #f15e5e;
}
.modal-confirm .icon-box i {
	color: #f15e5e;
	font-size: 46px;
	display: inline-block;
	/* margin-top: 1px; */
}
.modal-confirm .btn, .modal-confirm .btn:active {
	color: #fff;
	border-radius: 4px;
	background: #60c7c1;
	text-decoration: none;
	transition: all 0.4s;
	line-height: normal;
	min-width: 120px;
	border: none;
	/* min-height: 0px; */
	border-radius: 3px;
	margin: 0 5px;
}
.modal-confirm .btn-secondary {
	background: #c1c1c1;
}
.modal-confirm .btn-secondary:hover, .modal-confirm .btn-secondary:focus {
	background: #a8a8a8;
}
.modal-confirm .btn-danger {
	background: #f15e5e;
}
.modal-confirm .btn-danger:hover, .modal-confirm .btn-danger:focus {
	background: #ee3535;
}
.modal-confirm .btn-success {
	background: #109442;
}
.modal-confirm .btn-success:hover, .modal-confirm .btn-success:focus {
	background: #038032;
}
</style>
<br>
  <?php $uri = new \CodeIgniter\HTTP\URI(current_url()); ?>
        <?php if(isset($_SESSION['success'])): ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
             <?= $_SESSION['success']; ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
        <?php endif; ?>
        <?php if(isset($_SESSION['error'])): ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
             <?= $_SESSION['error']; ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
        <?php endif; ?>
    <div class="card card-primary card-outline card-outline-tabs">
      <div class="card-header p-0 border-bottom-0">
        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true"><?= $function_title?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="true"><?= $function_title_invalidated?></a>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <div class="tab-content" id="custom-tabs-four-tabContent">
          <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
          
            <div class="row">
              <div class="col-md-12">
                <!-- Box Comment -->
                <div class="card card-widget">
                  <div class="card-header bg-dark">
                    <div class="user-block">
                      <span class="h5">Request Invalidation</span>
                    </div>
                    <!-- /.user-block -->
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                    <!-- /.card-tools -->
                  </div>
                  <!-- /.card-header -->
                  <div class="card-footer">  

                    <!-- load assessment -->
                    <div id="load_table_assessment"></div>
                    <!-- load assessment -->
                  
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <br>
            <div class="row">
              <div class="col-6">
                <h5><?= $function_title?></h5>
              </div>
              <div class="col-6">
                <button type="button" class="btn btn-danger float-right btn-md" name="button" data-toggle="modal" data-target="#assessGenerateModal">
                  <i class="fas fa-print"></i> Generate Assessment Report
                </button>
                <!-- modal -->
                <div class="modal fade" id="assessGenerateModal">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Filter Data By Date</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="<?=base_url()?>guest%20assessment/generate-assess-report-by-daterange" method="post">
                          <label for="">Select Date Range</label>
                            <div class="row">
                              <div class="col-md-6">
                                <label for="dateRange">Start Date</label>
                                <div class="input-group">
                                  <input type="date" class="form-control float-right" name="startdate" required>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <label for="dateRange">End Date</label>
                                <div class="input-group">
                                  <input type="date" class="form-control float-right" name="enddate" required>
                                </div>
                              </div>
                            </div>
                            <button type="submit" class="btn btn-success mt-3"><i class="far fa-file-pdf"></i> Generate</button>
                        </form>
                        <hr>
                        <form action="<?=base_url()?>guest%20assessment/generate-assess-report-by-date" method="post">
                            <div class="row">
                              <div class="col-md-12">
                                <label for="date">Select Specific Date</label>
                                <div class="form-group">
                                  <select name="date" class="form-control" required>
                                    <option disabled selected>Select Date</option>
                                      <?php foreach($generateAssessSelectDate as $date): ?>
                                        <option value="<?= $date['date']?>"><?= date('F d, Y', strtotime($date['date'])) ?></option>
                                      <?php endforeach; ?>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <button type="submit" class="btn btn-success"><i class="far fa-file-pdf"></i> Generate</button>
                        </form>
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
              </div>
            </div>
            <hr>
            <div class="table-responsive">
              <table id="myTable" class="table table-sm table-striped table-bordered index-table">
                <thead class="thead-dark">
                  <tr class="text-center">
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Email Guidelines</th>
                    <th>Reason request</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(empty($guestsAssess)):?>
                      <tr class="text-center">
                        <td colspan="6">No data available</td>
                      </tr>
                  <?php else:?>
                      <?php $cnt = 1; ?>
                      <?php foreach($guestsAssess as $patient): ?>
                      <tr class="text-center">
                          <th scope="row"><?= $cnt++ ?></th>
                          <td><?= ucwords($patient['firstname'].' '.$patient['lastname']) ?></td>
                          <td><?= $patient['email'] ?></td>
                          <td>
                              <?php if($patient['email_status']==1):?>
                                  <span class="badge text-muted">Automatically sent email for guidelines.</span>
                              <?php else:?>
                                  <form action="<?= base_url() ?>guest%20assessment/<?='email_resend/'.$patient['id']?>" method="post">
                                      <input hidden type="text" name="email" value="<?= ucwords($patient['email'])?>">
                                      <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-envelope"></i> Resend Email</button>
                                  </form>
                              <?php endif;?>
                          </td>
                          <td>
                              <?php if($patient['func_action'] == 1):?>
                                  <span class="bell fa fa-bell"></span>
                                  <audio src="<?=base_url()?>public/css/notification_up.mp3" autoplay></audio>
                                  <span class="badge badge-danger">Reason requested: </span>
                                  <p><?= ucwords($patient['reason']) ?></p>
                              <?php elseif($patient['func_action'] == 2):?>
                                  <span class="badge text-muted">Canceled a requested reason.</span>
                              <?php else:?>
                                  <span class="badge text-muted">No reason request.</span>
                              <?php endif;?>
                          </td>
                          <td style="width:25%;"> 
                              <?php if($patient['func_action'] == 1):?>
                                  <a href="#invalidateModal<?=$patient['id']?>" class="btn btn-outline-danger" data-toggle="modal">
                                      <i class="fas fa-exclamation-circle"></i> Invalidate
                                  </a>
                              <?php else:?>
                                  <!-- No Button For Invalidation -->
                              <?php endif;?>
                              <button type="button" class="btn btn-outline-success success btn-md" data-toggle="modal" data-target="#assessmentAll<?=$patient['id']?>">
                                  <i class="fas fa-clipboard-check"></i> Check Data
                              </button>
                          </td>
                      </tr>
                      <?php endforeach; ?>
                  <?php endif;?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
          <div class="row">
              <div class="col-6">
              <h4><?= $function_title_invalidated?></h4>
              </div>
              <div class="col-6">
                <button type="button" class="btn btn-danger float-right btn-md" name="button" data-toggle="modal" data-target="#invalidatedGenerateModal">
                  <i class="fas fa-print"></i> Generate Invalidated Report
                </button>
                <!-- modal -->
                <div class="modal fade" id="invalidatedGenerateModal">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Filter Data By Date</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="<?=base_url()?>guest%20assessment/generate-invalidated-report-by-daterange" method="post">
                          <label for="">Select Date Range</label>
                            <div class="row">
                              <div class="col-md-6">
                                <label for="dateRange">Start Date</label>
                                <div class="input-group">
                                  <input type="date" class="form-control float-right" name="startdate" required>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <label for="dateRange">End Date</label>
                                <div class="input-group">
                                  <input type="date" class="form-control float-right" name="enddate" required>
                                </div>
                              </div>
                            </div>
                            <button type="submit" class="btn btn-success mt-3"><i class="far fa-file-pdf"></i> Generate</button>
                        </form>
                        <hr>
                        <form action="<?=base_url()?>guest%20assessment/generate-invalidated-report-by-date" method="post">
                            <div class="row">
                              <div class="col-md-12">
                                <label for="date">Select Date</label>
                                <div class="form-group">
                                  <select name="date" class="form-control" required>
                                    <option disabled selected>Select Date</option>
                                      <?php foreach($generateInvalidatedSelectDate as $date): ?>
                                        <option value="<?= $date['date']?>"><?= date('F d, Y', strtotime($date['date'])) ?></option>
                                      <?php endforeach; ?>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <button type="submit" class="btn btn-success"><i class="far fa-file-pdf"></i> Generate</button>
                        </form>
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
              </div>
            </div>
          <br>
          <div class="table-responsive">
            <table class="table index-table">
              <thead class="thead-dark">
                <tr class="text-center">
                  <th>#</th>
                  <th>Full Name</th>
                  <th>Guest Type</th>
                  <th>Gender</th>
                  <th>Reason</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $ctr = 1; ?>
                <?php foreach($invalidatedGuests as $invalidatedGuest): ?>
                <tr class="text-center">
                  <th><?=$ctr++?></th>
                  <td><?= ucwords($invalidatedGuest['firstname'].' '.$invalidatedGuest['middlename'].' '.$invalidatedGuest['lastname']) ?></td>
                  <td><?= ucwords($invalidatedGuest['guest_type']) ?></td>
                  <td><?= ucfirst($invalidatedGuest['gender']) ?></td>
                  <td><?= ucfirst($invalidatedGuest['reason']) ?></td>
                  <td>
                    <button type="button" class="btn btn-outline-info btn-md" data-toggle="modal" data-target="#invalidated<?=$invalidatedGuest['id']?>">
                      <i class="fas fa-clipboard-check"></i> Check Info
                    </button>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
           </div>
          </div>
        </div>
      </div>
      <!-- /.card -->
    </div>
  </div>
  <?php foreach ($requestguestsAssess as $patientRequest): ?>
    <!-- Modal HTML -->
    <div id="invalidateModal<?=$patientRequest['id']?>" class="modal fade">
      <div class="modal-dialog modal-confirm modal-lg">
        <div class="modal-content">
          <div class="modal-header flex-column">
            <div class="icon-box">
              <i class="material-icons">&#xE5CD;</i>
            </div>						
            <h4 class="modal-title w-100">Invalidate Guest?</h4>	
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">
            <p>Do you really want to invalidate this guest? This process cannot be undone.</p>
            <!-- Table row -->
            <div class="row">
              <div class="col-12 table-responsive">
                <table class="table table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Questions</th>
                    <th>Answers</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $cnt = 1; ?>
                  <?php foreach ($questions as $question): ?>
                    <tr>
                      <td class="text-center"><?= $cnt++;?></td>
                      <td colspan="1"><?= $question['q_one']?></td>
                      <td class="text-center"><?= strtoupper($patientRequest['r_q_one'])?></td>
                    </tr>
                    <tr>
                      <td class="text-center"><?= $cnt++;?></td>
                      <td colspan="1"><?= $question['q_two']?></td>
                      <td class="text-center"><?= strtoupper($patientRequest['r_q_two'])?></td>
                    </tr>
                    <tr>
                      <td class="text-center"><?= $cnt++;?></td>
                      <td colspan="1"><?= $question['q_three']?></td>
                      <td class="text-center"><?= strtoupper($patientRequest['r_q_three'])?></td>
                    </tr>
                    <tr>
                      <td class="text-center"><?= $cnt++;?></td>
                      <td colspan="1"><?= $question['q_four']?></td>
                      <td class="text-center"><?= strtoupper($patientRequest['r_q_four'])?></td>
                    </tr>
                    <tr>
                      <td class="text-center"><?= $cnt++;?></td>
                      <td colspan="1"><?= $question['q_five']?></td>
                      <td class="text-center"><?= strtoupper($patientRequest['r_q_five'])?></td>
                    </tr>
                    <tr>
                      <td colspan="3" class="h6 <?=$patientRequest['r_status_defined']=='ws'?'text-danger':'text-success'?>"><b>Guest Status: </b>This guest <?=$patientRequest['r_status_defined']=='ws'?'is defined':'is not defined'?> for any symptoms.</td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
                <div class="modal-footer justify-content-center text-center" style="margin-top: 0px;">
                  <a href="<?=base_url().'guest%20assessment/invalidate-guest/'.$patientRequest['user_id'].'/'.$patientRequest['checklist_token']?>">
                    <button type="submit" class="btn btn-md btn-success success">Invalidate Request</button>
                  </a>
                  <a href="<?=base_url().'guest%20assessment/denied-invalidate-guest/'.$patientRequest['user_id'].'/'.$patientRequest['checklist_token']?>">
                    <button type="submit" class="btn btn-md btn-danger">Cancel Invalidation Request</button>
                  </a>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
        </div>
      </div>
    </div> 
    <!-- End Modal HTML -->
  <!-- Start Guest Assessment Modal -->
  <div class="modal fade" id="assessment<?=$patientRequest['id']?>">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <a href="<?= base_url()?>guest%20assessment/print-assess-guest/<?=$patientRequest['id']?>" type="button" class="btn btn-outline-danger btn-md">
                <i class="fas fa-file-pdf"></i> Print PDF
              </a>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php if (empty($requestguestsAssess)): ?>
                <p class="card-text text-center" style="font-style: italic;"><i class="fas fa-spinner"></i> None</p>
              <?php else: ?>
              <div class="row">
                <div class="col-12">
                  <!-- Main content -->
                  <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                      <div class="col-12">
                        <h4 class="modal-title text-center">Patient Assessment Information</h4>
                        <hr>
                        <h4>
                          <i class="fas fa-user"></i> <?= ucwords($patientRequest['firstname'].' '.$patientRequest['middlename'].' '.$patientRequest['lastname']) ?>
                          <small class="float-right">Date: <?= date('m/d/Y', strtotime($patientRequest['date']))?></small>
                        </h4>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                      <div class="col-sm-6 invoice-col">
                        <address>
                          <b>Address:</b> <?= ucwords($patientRequest['address'].', '.$patientRequest['city'].', '.$patientRequest['province'].', '.$patientRequest['postal'])?><br>
                          <b>Phone:</b> <?= ucwords($patientRequest['cellphone_no'])?><br>
                          <b>Landline:</b> <?= ucwords($patientRequest['landline_no'])?>
                        </address>
                      </div>
                      <div class="col-sm-6 invoice-col">
                        <address>
                          <b>Gender:</b> <?= ucwords($patientRequest['gender'])?><br>
                          <b>Guest Type:</b> <?= ucwords($patientRequest['guest_type'])?><br>
                          <b>Email:</b> <?= $patientRequest['email']?>
                        </address>
                      </div>
                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                      <div class="col-12 table-responsive">
                        <table class="table table-striped">
                          <thead>
                          <tr>
                            <th>#</th>
                            <th>Questions</th>
                            <th>Answers</th>
                          </tr>
                          </thead>
                          <tbody>
                          <?php $cnt = 1; ?>
                          <?php foreach ($questions as $question): ?>
                            <tr>
                              <td class="text-center"><?= $cnt++;?></td>
                              <td colspan="1"><?= $question['q_one']?></td>
                              <td class="text-center"><?= strtoupper($patientRequest['q_one'])?></td>
                            </tr>
                            <tr>
                              <td class="text-center"><?= $cnt++;?></td>
                              <td colspan="1"><?= $question['q_two']?></td>
                              <td class="text-center"><?= strtoupper($patientRequest['q_two'])?></td>
                            </tr>
                            <tr>
                              <td class="text-center"><?= $cnt++;?></td>
                              <td colspan="1"><?= $question['q_three']?></td>
                              <td class="text-center"><?= strtoupper($patientRequest['q_three'])?></td>
                            </tr>
                            <tr>
                              <td class="text-center"><?= $cnt++;?></td>
                              <td colspan="1"><?= $question['q_four']?></td>
                              <td class="text-center"><?= strtoupper($patientRequest['q_four'])?></td>
                            </tr>
                            <tr>
                              <td class="text-center"><?= $cnt++;?></td>
                              <td colspan="1"><?= $question['q_five']?></td>
                              <td class="text-center"><?= strtoupper($patientRequest['q_five'])?></td>
                            </tr>
                          <?php endforeach; ?>
                          </tbody>
                        </table>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->

                  </div>
                  <!-- /.invoice -->
                </div><!-- /.col -->
              </div><!-- /.row -->
              <?php endif; ?>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
     <?php endforeach; ?>

  <?php foreach ($guestsAssess as $patient): ?>
  <!-- Start Guest Assessment Modal -->
  <div class="modal fade" id="assessmentAll<?=$patient['id']?>">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <a href="<?= base_url()?>guest%20assessment/print-assess-guest/<?=$patient['id']?>" type="button" class="btn btn-outline-danger btn-md">
                <i class="fas fa-file-pdf"></i> Print PDF
              </a>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php if (empty($guestsAssess)): ?>
                <p class="card-text text-center" style="font-style: italic;"><i class="fas fa-spinner"></i> None</p>
              <?php else: ?>
              <div class="row">
                <div class="col-12">
                  <!-- Main content -->
                  <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                      <div class="col-12">
                        <h4 class="modal-title text-center">Patient Assessment Information</h4>
                        <hr>
                        <h4>
                          <i class="fas fa-user"></i> <?= ucwords($patient['firstname'].' '.$patient['middlename'].' '.$patient['lastname']) ?>
                          <small class="float-right">Date: <?= date('m/d/Y', strtotime($patient['date']))?></small>
                        </h4>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                      <div class="col-sm-6 invoice-col">
                        <address>
                          <b>Address:</b> <?= ucwords($patient['address'].', '.$patient['city'].', '.$patient['province'].', '.$patient['postal'])?><br>
                          <b>Phone:</b> <?= ucwords($patient['cellphone_no'])?><br>
                          <b>Landline:</b> <?= ucwords($patient['landline_no'])?>
                        </address>
                      </div>
                      <div class="col-sm-6 invoice-col">
                        <address>
                          <b>Gender:</b> <?= ucwords($patient['gender'])?><br>
                          <b>Guest Type:</b> <?= ucwords($patient['guest_type'])?><br>
                          <b>Email:</b> <?= $patient['email']?>
                        </address>
                      </div>
                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                      <div class="col-12 table-responsive">
                        <table class="table table-striped">
                          <thead>
                          <tr>
                            <th>#</th>
                            <th>Questions</th>
                            <th>Answers</th>
                          </tr>
                          </thead>
                          <tbody>
                          <?php $cnt = 1; ?>
                          <?php foreach ($questions as $question): ?>
                            <tr>
                              <td class="text-center"><?= $cnt++;?></td>
                              <td colspan="1"><?= $question['q_one']?></td>
                              <td class="text-center"><?= strtoupper($patient['q_one'])?></td>
                            </tr>
                            <tr>
                              <td class="text-center"><?= $cnt++;?></td>
                              <td colspan="1"><?= $question['q_two']?></td>
                              <td class="text-center"><?= strtoupper($patient['q_two'])?></td>
                            </tr>
                            <tr>
                              <td class="text-center"><?= $cnt++;?></td>
                              <td colspan="1"><?= $question['q_three']?></td>
                              <td class="text-center"><?= strtoupper($patient['q_three'])?></td>
                            </tr>
                            <tr>
                              <td class="text-center"><?= $cnt++;?></td>
                              <td colspan="1"><?= $question['q_four']?></td>
                              <td class="text-center"><?= strtoupper($patient['q_four'])?></td>
                            </tr>
                            <tr>
                              <td class="text-center"><?= $cnt++;?></td>
                              <td colspan="1"><?= $question['q_five']?></td>
                              <td class="text-center"><?= strtoupper($patient['q_five'])?></td>
                            </tr>
                          <?php endforeach; ?>
                          </tbody>
                        </table>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->

                  </div>
                  <!-- /.invoice -->
                </div><!-- /.col -->
              </div><!-- /.row -->
              <?php endif; ?>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
     <?php endforeach; ?>

      <?php foreach ($invalidatedGuests as $invalidatedGuest): ?>
      <!-- Start Invalidated Guest Modal -->
      <div class="modal fade" id="invalidated<?=$invalidatedGuest['id']?>">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <a href="<?= base_url()?>guest%20assessment/print-invalidated-guest/<?=$invalidatedGuest['id']?>" type="button" class="btn btn-outline-danger btn-md">
                <i class="fas fa-file-pdf"></i> Print PDF
              </a>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php if (empty($invalidatedGuests)): ?>
                <p class="card-text text-center" style="font-style: italic;"><i class="fas fa-spinner"></i> None</p>
              <?php else: ?>
              <div class="row">
                <div class="col-12">
                  <!-- Main content -->
                  <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                      <div class="col-12">
                        <h4 class="modal-title text-center">Invalidated Guest Information</h4>
                        <hr>
                        <h4>
                          <i class="fas fa-user"></i> <?= ucwords($invalidatedGuest['firstname'].' '.$invalidatedGuest['middlename'].' '.$invalidatedGuest['lastname']) ?>
                          <small class="float-right">Date: <?= date('m/d/Y')?></small>
                        </h4>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                      <div class="col-sm-6 invoice-col">
                        <address>
                          <b>Address:</b> <?= ucwords($invalidatedGuest['address'].', '.$invalidatedGuest['city'].', '.$invalidatedGuest['province'].', '.$invalidatedGuest['postal'])?><br>
                          <b>Phone:</b> <?= ucwords($invalidatedGuest['cellphone_no'])?><br>
                          <b>Landline:</b> <?= ucwords($invalidatedGuest['landline_no'])?>
                        </address>
                      </div>
                      <div class="col-sm-6 invoice-col">
                        <address>
                          <b>Gender:</b> <?= ucwords($invalidatedGuest['gender'])?><br>
                          <b>Guest Type:</b> <?= ucwords($invalidatedGuest['guest_type'])?><br>
                          <b>Email:</b> <?= $invalidatedGuest['email']?>
                        </address>
                      </div>
                    </div>
                    <!-- /.row -->
                    <!-- info row -->
                    <div class="row invoice-info">
                      <div class="col-sm-12 invoice-col">
                        <address>
                          <b>Invalidated Reason:</b> <?= ucwords($invalidatedGuest['reason'])?>
                        </address>
                      </div>
                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                      <div class="col-12 table-responsive">
                        <table class="table table-striped">
                          <thead>
                          <tr>
                            <th>#</th>
                            <th>Questions</th>
                            <th>Answers</th>
                          </tr>
                          </thead>
                          <tbody>
                          <?php $cnt = 1; ?>
                          <?php foreach ($questions as $question): ?>
                            <tr>
                              <td class="text-center"><?= $cnt++;?></td>
                              <td colspan="1"><?= $question['q_one']?></td>
                              <td class="text-center"><?= strtoupper($invalidatedGuest['r_q_one'])?></td>
                            </tr>
                            <tr>
                              <td class="text-center"><?= $cnt++;?></td>
                              <td colspan="1"><?= $question['q_two']?></td>
                              <td class="text-center"><?= strtoupper($invalidatedGuest['r_q_two'])?></td>
                            </tr>
                            <tr>
                              <td class="text-center"><?= $cnt++;?></td>
                              <td colspan="1"><?= $question['q_three']?></td>
                              <td class="text-center"><?= strtoupper($invalidatedGuest['r_q_three'])?></td>
                            </tr>
                            <tr>
                              <td class="text-center"><?= $cnt++;?></td>
                              <td colspan="1"><?= $question['q_four']?></td>
                              <td class="text-center"><?= strtoupper($invalidatedGuest['r_q_four'])?></td>
                            </tr>
                            <tr>
                              <td class="text-center"><?= $cnt++;?></td>
                              <td colspan="1"><?= $question['q_five']?></td>
                              <td class="text-center"><?= strtoupper($invalidatedGuest['r_q_five'])?></td>
                            </tr>
                          <?php endforeach; ?>
                          </tbody>
                        </table>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->

                  </div>
                  <!-- /.invoice -->
                </div><!-- /.col -->
              </div><!-- /.row -->
              <?php endif; ?>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <?php endforeach; ?>