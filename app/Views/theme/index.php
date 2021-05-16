<?= view('App\Views\theme\header') ?>
     <?php if (!empty($profile)): ?>
       <!-- Main content -->
               <div class="row mt-3">
                 <div class="col-md-3">

                   <!-- Profile Image -->
                   <div class="card card-primary card-outline">
                     <div class="card-body box-profile">
                       <div class="text-center">
                         <img class="profile-user-img img-fluid img-circle"
                              src="<?= base_url()?>public/img/user.png"
                              alt="User profile picture">
                       </div>
                       <a href="<?=base_url().'guests/show/'.$profile[0]['id']?>">
                         <h3 class="profile-username text-center"><?=ucfirst($profile[0]['firstname'].' '.$profile[0]['middlename'].' '.$profile[0]['lastname'].' '.$profile[0]['extension'])?></h3>
                       </a>
                       <p class="text-muted text-center"><?=ucfirst($profile[0]['guest_type'])?></p>
                       <p class="text-muted text-center"><?=ucfirst($profile[0]['gender']).' | '.date_diff(date_create($profile[0]['birthdate']), date_create(date('Y-m-d')))->format("%y") . ' year(s) old'?></p>

                       <hr>

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
                 <div class="col-md-9">

        <?php endif; ?>
        <?php if (isset($function_title)): ?>
          <?php $data['function_title'] = $function_title ?>
          <?php echo view($viewName, $data); ?>
          <?php else: ?>
            <?php echo view($viewName); ?>
        <?php endif; ?>
<?= view('App\Views\theme\footer') ?>
<?= view('App\Views\theme\notification') ?>
