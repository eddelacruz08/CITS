
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<style>
/* body {
	font-family: 'Varela Round', sans-serif;
} */
.modal-confirm {		
	color: #636363;
	width: 400px;
}
.modal-confirm .modal-content {
	padding: 20px;
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
	margin: 30px 0 -10px;
}
.modal-confirm .close {
	position: absolute;
	top: -5px;
	right: -2px;
}
.modal-confirm .modal-body {
	color: #999;
}
.modal-confirm .modal-footer {
	border: none;
	text-align: center;		
	border-radius: 5px;
	font-size: 13px;
	padding: 10px 15px 25px;
}
.modal-confirm .modal-footer a {
	color: #999;
}		
.modal-confirm .icon-box {
	width: 80px;
	height: 80px;
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
	margin-top: 13px;
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
	min-height: 40px;
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
</style>
<br>
  <?php $uri = new \CodeIgniter\HTTP\URI(current_url()); ?>
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
            <h4><?= $function_title?></h4>
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
                <!-- load table assessment -->
                <tbody id="load_table_assessment">
                </tbody>
                <!-- load table assessment -->
              </table>
            </div>
          </div>
          <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
          <h4><?= $function_title_invalidated?></h4>
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
                    <button type="button" class="btn btn-outline-info btn-md" data-toggle="modal" data-target="#invalidated-modal-xl">
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
  <?php foreach ($guestsAssess as $patient): ?>
    <!-- Modal HTML -->
    <div id="myModal" class="modal fade">
      <div class="modal-dialog modal-confirm">
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
          </div>
          <div class="modal-footer justify-content-center">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <a href="<?=base_url().'guest%20assessment/invalidate_guest/'.$patient['user_id'].'/'.$patient['checklist_token']?>">
              <button type="submit" class="btn btn-danger">Invalidate</button>
             </a>
          </div>
        </div>
      </div>
    </div> 
    <!-- End Modal HTML -->
  <!-- Start Guest Assessment Modal -->
  <div class="modal fade" id="modal-xl<?=$patient['id']?>">
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
                          <small class="float-right">Date: <?= date('m/d/Y')?></small>
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
      <div class="modal fade" id="invalidated-modal-xl">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="btn btn-outline-danger btn-md">
                <i class="fas fa-file-pdf"></i> Print PDF
              </button>
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
                              <td class="text-center"><?= strtoupper($invalidatedGuest['q_one'])?></td>
                            </tr>
                            <tr>
                              <td class="text-center"><?= $cnt++;?></td>
                              <td colspan="1"><?= $question['q_two']?></td>
                              <td class="text-center"><?= strtoupper($invalidatedGuest['q_two'])?></td>
                            </tr>
                            <tr>
                              <td class="text-center"><?= $cnt++;?></td>
                              <td colspan="1"><?= $question['q_three']?></td>
                              <td class="text-center"><?= strtoupper($invalidatedGuest['q_three'])?></td>
                            </tr>
                            <tr>
                              <td class="text-center"><?= $cnt++;?></td>
                              <td colspan="1"><?= $question['q_four']?></td>
                              <td class="text-center"><?= strtoupper($invalidatedGuest['q_four'])?></td>
                            </tr>
                            <tr>
                              <td class="text-center"><?= $cnt++;?></td>
                              <td colspan="1"><?= $question['q_five']?></td>
                              <td class="text-center"><?= strtoupper($invalidatedGuest['q_five'])?></td>
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