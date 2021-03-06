<?= view('App\Views\theme\header') ?>
  <?php if ($_SESSION['rid'] == 2): ?>
    <br>
       <div class="card card-primary card-outline">
         <div class="card-body box-profile">
           <div class="row">
             <div class="col-md-6">
               <center>
               <label>Latest Self-Assessment Status:
               <?php if (isset($latest_checklist_date[0]['status_defined']) == true):?>
                 <i class="fas fa-circle text-center text-danger"></i><a class="h6 text-danger"> Have Symptoms</a>
                 <hr style="margin: 0; padding: 0; border: solid 1px red;">
               <?php else:?>
                 <i class="fas fa-circle text-center text-success"></i><a class="h6 text-success"> No Symptoms</a>
                 <hr style="margin: 0; padding: 0; border: solid 1px green;">
               <?php endif;?>
               </label>
             </center>
             </div>
             <div class="col-md-6">
              <?php if(!empty($latest_checklist_date)): ?>
                <?php if(esc($latest_checklist_date[0]['date'])== date('Y-m-d')):?>
                    <?php if(isset($latest_checklist_date[0]['status_defined'])==false):?>
                      <center>
                        <button type="button" class="btn btn-block btn-outline-primary btn-sm" title="Unavailable Self-Assessment" disabled>
                          <i class="fas fa-clipboard-check"></i> Unavailable Self-Assessment.
                        </button>
                      </center>
                    <?php else:?>
                      <center>
                        <button type="button" class="btn btn-block btn-outline-danger btn-sm swalAssessmentError">
                          <i class="fas fa-exclamation-triangle"></i> Self-Assessment Unavailable.
                        </button>
                      </center>
                    <?php endif;?>
                <?php else:?>
                    <center>
                        <a href="<?=base_url(). 'health%20declaration/captures/' . $_SESSION['uid']?>" class="text-white">
                            <button type="button" class="btn btn-block btn-outline-primary btn-sm">
                              <i class="fas fa-clipboard-check"></i>  Start to take Self-Assessment.
                            </button>
                        </a>
                    </center>
                <?php endif;?>
              <?php else: ?>
                <center>
                  <a href="<?=base_url(). 'health%20declaration/captures/' . $_SESSION['uid']?>" class="text-white">
                    <button type="button" class="btn btn-block btn-outline-primary btn-sm">
                      <i class="fas fa-clipboard-check"></i>  Start to take Self-Assessment.
                   </button>
                  </a>
                </center>
              <?php endif; ?>
              </div>
           </div>
         </div>
       </div>

        <?php if(isset($latest_checklist_date[0]['status_defined']) == true && isset($latest_checklist_date[0]['date']) == date('Y-m-d')): ?>
            <div class="callout callout-danger">
              <h5 class="text-danger"><i class="fas fa-info"></i> Important Reminder:</h5>
              <p class="h6">Your latest self-assessment tested positive for symptoms.</p>
              <p class="h5 text-danger"><em>Note: We regret to inform that you're <b><u>denied</u></b> to enter the premises of the university.</em><p>
            </div>
        <?php endif; ?>
        
       <!-- Main content -->
               <div class="row mt-3">
                 <div class="col-md-6">
                   <!-- Profile Image -->
                   <div class="card card-primary card-outline">
                     <div class="card-body box-profile">
                           <div class="text-center">
                             <img class="profile-user-img img-fluid img-circle"
                                  src="<?= base_url()?>public/img/user.png"
                                  alt="User profile picture">
                           </div>
                             <h3 class="profile-username text-center"><?=ucwords($profile[0]['lastname'].' '.$profile[0]['extension'].', '.$profile[0]['firstname'].' '.$profile[0]['middlename'])?></h3>

                           <p class="text-muted text-center"><?=$profile[0]['guest_type'] == true ? ucfirst($profile[0]['guest_type']) : ' none'?> | <?=$profile[0]['gender'] == true ? ucfirst($profile[0]['gender']): ' none'?> | <?=$profile[0]['birthdate'] == true ? date_diff(date_create($profile[0]['birthdate']), date_create(date('Y-m-d')))->format("%y") . ' year(s) old': ' none'?></p>

                           <hr>
                           <div class="row text-center">
                             <div class="col-sm-12">
                               <i class="fas fa-user-edit text-orange"></i> <a class="text-dark" href="<?=base_url() . 'profile/update_user/' . $profile[0]['id'] ?>"> Edit Profile</a>
                             </div>
                           </div>
                       <br>
                         <li class="list-group-item">
                           <?php if (!empty($checklist_counts)): ?>
                           <?php foreach ($checklist_counts as $checklist_guest_count){
                             $checklist_c = $checklist_guest_count['count_checklist'];
                           }
                           ?>
                           <b>No. of Checklists</b> <a class="float-right"><?= $checklist_c ?></a>
                         <?php endif;?>
                         </li>
                         <li class="list-group-item">
                           <?php if (!empty($visit_counts)): ?>
                           <?php foreach ($visit_counts as $visit_guest_count){
                             $visit_c = $visit_guest_count['count_visit'];
                           }
                           ?>
                           <b>No. of Visits</b> <a class="float-right"><?= $visit_c ?></a>
                         <?php endif;?>
                         </li>
                         <li class="list-group-item">
                           <?php if (!empty($assess_counts)): ?>
                           <?php foreach ($assess_counts as $assess_guest_count){
                             $assess_c = $assess_guest_count['count_assess'];
                           }
                           ?>
                           <b>No. of Assess</b> <a class="float-right"><?= $assess_c ?></a>
                         <?php endif;?>
                         </li>
                     </div>
                     <!-- /.card-body -->
                   </div>
                   <!-- /.card -->
                 </div>
                 <!-- /.col -->
                 <div class="col-md-6">
                   <!-- About Me Box -->
                   <div class="card card-primary">
                     <div class="card-header">
                       <h5 class="text-center">About Me</h5>
                     </div>
                     <!-- /.card-header -->
                     <div class="card-body">
                       <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                       <p class="text-muted"><?=$profile[0]['address'] == true ? ucwords($profile[0]['address'] . ', ' . $profile[0]['city'] . ', ' . $profile[0]['province'] . ' ' . $profile[0]['postal']) : ' none'?></p>
                       <hr>
                       <strong><i class="fas fa-book mr-1"></i> Contact Number</strong>
                       <br>
                       <p class="text-muted">
                         <?=$profile[0]['cellphone_no'] == true ? '<i class="fa fa-mobile-alt"> </i> | '.$profile[0]['cellphone_no'] : '<i class="fa fa-mobile-alt"> </i> | none'?><br>
                         <?=$profile[0]['landline_no'] == true ? '<i class="fas fa-phone"> </i> | '.$profile[0]['landline_no'] : '<i class="fas fa-phone"> </i> | none'?> 
                       </p>
                       <hr>
                       <strong><i class="fas fa-envelope"> </i> Email Address</strong>
                       <p class="text-muted">
                         <?=$profile[0]['email'] == true ? $profile[0]['email'] : ' none'?>
                       </p>
                       <hr>
                       <strong><i class="fas fa-birthday-cake"> </i> Birthdate</strong>
                       <p class="text-muted">
                         <?=$profile[0]['birthdate'] == true ? date('F d, Y', strtotime($profile[0]['birthdate'])) : ' none'?>
                       </p>
                     </div>
                     <!-- /.card-body -->
                   </div>
                   <!-- /.card -->
                </div>
                <!-- ////////////////////////////// MODAL CHECKLIST ////////////////////////////////// -->
                <div id="myModal" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                          <div class="modal-header">
                              <h4 class="modal-title">Important Reminder</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body">
                                <div class="callout callout-info">
                                  <h5 class="text-primary"><i class="fas fa-info"></i> Important Reminder:</h5>
                                  <p>This is a daily self-assessment. Please assess yourself before entry.</p>
                                    <a class="align-center" href="<?=base_url(). 'health%20declaration/captures/' . $_SESSION['uid']?>" class="text-white">
                                      <button type="button" class="btn btn-outline-info btn-md">
                                        <i class="fas fa-clipboard-check"></i>  Start to take Self-Assessment.
                                      </button>
                                    </a>
                                </div>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- ////////////////////////////// MODAL CHECKLIST ////////////////////////////////// -->
      <?php else: ?>
        <link rel="stylesheet" href="<?= base_url() ?>public/css/debug.css">
        <div class="container text-center">
          <h1 class="headline">Whoops!</h1>
          <p class="lead">This page is exclusive for users only! <i class="fas fa-smile"></i></p>
        </div>

      <?php endif; ?>
        <?php if (isset($function_title)): ?>
          <?php $data['function_title'] = $function_title ?>
          <?php echo view($viewName, $data); ?>
          <?php else: ?>
            <?php echo view($viewName); ?>
        <?php endif; ?>
<?= view('App\Views\theme\footer') ?>
<?php if(isset($latest_checklist_date[0]['date']) == date('Y-m-d')): ?>
  <script>
  	$(document).ready(function(){
  		$("#myModal").modal('hide');
  	});
  </script>
<?php else: ?>
  <script>
    $(document).ready(function(){
      $("#myModal").modal('show');
    });
  </script>
<?php endif; ?>
<?= view('App\Views\theme\notification') ?>
