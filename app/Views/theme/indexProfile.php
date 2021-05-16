<?= view('App\Views\theme\header') ?>
  <?php if ($_SESSION['rid'] == 2): ?>
    <br>
       <div class="card card-primary card-outline">
         <div class="card-body box-profile">
           <div class="row">
             <div class="col-md-6">
               <center>
               <label>Latest Self-Assessment Status:
               <?php if ($latest_checklist_date[0]['status_defined'] == true):?>
                 <i class="fas fa-circle text-center text-danger"></i><a class="h6 text-danger"> Have Symtoms</a>
                 <hr style="margin: 0; padding: 0; border: solid 1px red;">
               <?php else:?>
                 <i class="fas fa-circle text-center text-success"></i><a class="h6 text-success"> No Symtoms</a>
                 <hr style="margin: 0; padding: 0; border: solid 1px green;">
               <?php endif;?>
               </label>
             </center>
               <!-- <h2 class="text-center"><?= $function_title; ?></h2> -->
             </div>
             <div class="col-md-6">
               <center>
                 <a href="<?=base_url(). 'health%20declaration/captures/' . $_SESSION['uid']?>" class="text-white">
                    <button type="button" class="btn btn-default btn-md text-blue" style="border: 2px solid blue;">
                      <i class="fas fa-clipboard-check"></i>  Start to take Self-Assessment.
                    </button>
                 </a>
               </center>
             </div>
           </div>
         </div>
       </div>
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

                           <p class="text-muted text-center"><?=ucfirst($profile[0]['guest_type']).' | '.ucfirst($profile[0]['gender']).' | '.date_diff(date_create($profile[0]['birthdate']), date_create(date('Y-m-d')))->format("%y") . ' year(s) old'?></p>

                           <hr>
                           <div class="row" align="center">
                             <div class="col-sm-12">
                               <i class="fas fa-user-edit text-orange"></i> <a class="text-dark" href="<?=base_url() . 'profile/update_user/' . $profile[0]['id'] ?>"> Edit Profile</a>
                             </div>
                           </div>
                       <hr>
                       <style>
                           div img{
                               width: 200px;
                           }
                       </style>
                       <script src="<?= base_url() ?>public/js/qrcode.js"></script>
                       <center>
                         <div id="qrcode"></div>
                         <button class="btn btn-dark mt-2" onclick="downLoadCode();">Download QR code</button>
                       </center>
                       <script>
                           let qrcode = new QRCode("qrcode", {
                               text: "<?= $_SESSION['uid']?>"+":"+"<?= $profile[0]['firstname']?>"+" "+"<?= $profile[0]['middlename']?>"+" "+"<?= $profile[0]['lastname']?>",
                               width: 177,
                               height: 177,
                               colorDark : "#000000",
                               colorLight : "#ffffff",
                               correctLevel : QRCode.CorrectLevel.H
                           });
                           function downLoadCode(){
                               var img = $('#qrcode').children('img').attr("src");
                               var alink = document.createElement("a");
                               alink.href = img;
                                alink.download = "<?= date('F d, Y h:i:s')?>"+".png";
                               alink.click();
                             }
                       </script>
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
                   <!-- About Me Box -->
                   <div class="card card-primary">
                     <div class="card-header">
                       <h5 class="text-center">About Me</h5>
                     </div>
                     <!-- /.card-header -->
                     <div class="card-body">
                       <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                       <p class="text-muted"><?=ucwords($profile[0]['address'] . ', ' . $profile[0]['city'] . ', ' . $profile[0]['province'] . ' ' . $profile[0]['postal'])?></p>
                       <hr>
                       <strong><i class="fas fa-book mr-1"></i> Contact Number</strong>
                       <br>
                       <p class="text-muted">
                         <?='<i class="fa fa-mobile-alt"> </i> '.'| '.$profile[0]['cellphone_no']?><br>
                         <?='<i class="fas fa-phone"> </i> '.'| '.$profile[0]['landline_no']?>
                       </p>
                       <hr>
                       <strong><i class="fas fa-envelope"> </i> Email Address</strong>
                       <p class="text-muted">
                         <?=' '.$profile[0]['email']?>
                       </p>
                       <hr>
                       <strong><i class="fas fa-birthday-cake"> </i> Birthdate</strong>
                       <p class="text-muted">
                         <?=' '.date('F d, Y', strtotime($profile[0]['birthdate']))?>
                       </p>
                     </div>
                     <!-- /.card-body -->
                   </div>
                   <!-- /.card -->
                 </div>
                 <!-- /.col -->
                 <div class="col-md-6">
                   <div class="card card-primary card-outline">
                     <div class="card-body box-profile">
                       <h3 align="center">Self-Assessment History</h3>

                       <div class="tab-pane" id="settings">
                         <?php if (empty($health_summary)): ?>
                           <p class="card-text" style="font-style: italic;"><i class="fas fa-spinner"></i> None</p>
                         <?php else: ?>
                           <div id="accordion">
                             <?php foreach ($health_summary as $summary): ?>
                               <div class="card">
                                 <div class="card-header" id="heading<?=$summary['id']?>">
                                   <h5 class="mb-0">
                                     <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse<?=$summary['id']?>" aria-expanded="false" aria-controls="collapse<?=$summary['id']?>">
                                      <?php if ($summary['question_id']=='none'):?>
                                        <?=date('F d, Y h:i a', strtotime($summary['created_date']))?> | <label class="text-success"> Negative for Symtoms</label>
                                      <?php else:?>
                                        <?=date('F d, Y h:i a', strtotime($summary['created_date']))?> | <label class="text-danger"> Positive for Symtoms</label>
                                      <?php endif;?>
                                     </button>
                                   </h5>
                                 </div>
                                 <div id="collapse<?=$summary['id']?>" class="collapse" aria-labelledby="heading<?=$summary['id']?>" data-parent="#accordion">
                                   <div class="card-body">
                                     <form>
                                       <div class="row">
                                         <div class="col-md-12">
                                           <p class="h4">Defined Symtoms</p>
                                           <table>
                                             <tr>
                                               <td>
                                               <?php
                                                foreach($questions as $role){
                                                    $question_defined = substr($summary['question_id'], 0, -1);
                                                    $question_def = explode(',',$question_defined);
                                                    if(in_array($role['id'], $question_def))
                                                    {
                                                      echo '<i class="fas fa-check text-success"></i>';
                                                    }
                                                    else
                                                    {
                                                      echo '<i class="fas fa-times"></i>';
                                                    }
                                                    echo ' '.$role['question'].'<br>';
                                                }
                                                ?>
                                               </td>
                                             </tr>
                                           </table>
                                         </div>
                                       </div>
                                     </form>
                                   </div>
                                 </div>
                               </div>
                             <?php endforeach; ?>
                           </div>
                         <?php endif; ?>
                       </div>
                       <!-- /.tab-pane -->
                    </div>
                   </div>
                 </div>
                </div>
                <!-- ////////////////////////////// MODAL CHECKLIST ////////////////////////////////// -->
                <div id="myModal" class="modal fade">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h3 class="modal-title">Important Reminder</h3>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body">
                              <form>
                                <center>
                                  <p class="h5">This is a daily self-assessment. Please assess yourself before entry.</p>
                                  <hr>
                                  <a href="<?=base_url(). 'health%20declaration/captures/' . $_SESSION['uid']?>" class="text-white">
                                     <button type="button" class="btn btn-default btn-lg text-blue" style="border: 2px solid #007bff;">
                                       <i class="fas fa-clipboard-check"></i>  Start to take Self-Assessment.
                                     </button>
                                  </a>
                                </center>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- ////////////////////////////// MODAL CHECKLIST ////////////////////////////////// -->
                <!-- ////////////////////////////// MODAL CHECKLIST ////////////////////////////////// -->
                <div id="myModalDefined" class="modal fade">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h3 class="modal-title">Important Reminder</h3>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body">
                              <form>
                                <center>
                                  <p class="h5">Your latest self-assessment tested positive for symtoms. Make sure you don't leave and stay at home. Please quarantine yourself so as not to infect other people with the symptoms experienced.</p>
                                  <p class="h5">Please take self-assessment for another day to clarify your status.</p>
                                </center>
                              </form>
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
<?php if($latest_checklist_date[0]['status_defined'] == true && $latest_checklist_date[0]['date'] == date('Y-m-d')): ?>
  <script>
  	$(document).ready(function(){
  		$("#myModalDefined").modal('show');
  	});
  </script>
<?php else: ?>
  <script>
    $(document).ready(function(){
      $("#myModalDefined").modal('hide');
    });
  </script>
<?php endif; ?>

<?php if($latest_checklist_date[0]['date'] == date('Y-m-d')): ?>
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
