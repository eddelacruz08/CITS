
<div class="card">
<div class="card-body">
  <div class="row">
    <div class="col-md-3">
      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <?php $ctr = 0; ?>
        <?php foreach ($visits as $visit): ?>
          <a class="nav-link <?= $ctr == 0 ? 'active': '' ?>" id="v-pills-home-tab" data-toggle="pill" href="#link<?=$visit['id']?>" role="tab" aria-controls="v-pills-home" aria-selected="true"><?=date('F d, Y', strtotime($visit['log_in']))?> <?= $visit['log_out'] == '' ? ' - Active': ''?></a>
          <?php $ctr++; ?>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="col-md-9">
      <div class="tab-content" id="v-pills-tabContent">
        <?php $ctr = 0; ?>
        <?php foreach ($visits as $visit): ?>
            <div class="tab-pane fade show <?= $ctr == 0 ? 'active': '' ?>" id="link<?=$visit['id']?>" role="tabpanel" aria-labelledby="v-pills-home-tab">
              <nav>
                <a href="<?=base_url().'guests/show/'.$visit['user_id']?>">
                  <button type="button" class="btn btn-default float-right" name="button"><i class="fas fa-arrow-left"></i> Go back</button>
                </a>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link active" id="nav-checklist-tab-<?=$visit['id']?>" data-toggle="tab" href="#nav-checklist-<?=$visit['id']?>" role="tab" aria-controls="nav-checklist-<?=$visit['id']?>" aria-selected="true">Health Declaration Checklist</a>
                </div>
              </nav>
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-checklist-<?=$visit['id']?>" role="tabpanel" aria-labelledby="nav-checklist-tab-<?=$visit['id']?>">
                  <div class="row">
                    <div class="col-md-12">
                      <br>
                      <?php $ctr = 0; ?>
                      <?php if (empty($checklists)): ?>
                        No fill-up for checklist.
                      <?php else: ?>
                        <form>
                           <?php foreach ($checklists as $checklist): ?>
                             <?php if ($checklist['visit_id'] == $visit['id']): ?>
                               <p>
                                 <label>Legend: </label>
                                 <button type="button" class="btn btn-danger" name="button"></button><span> Defined</span>
                                 <button type="button" class="btn btn-success" name="button"></button><span> Undefined</span>
                               </p>
                               <div class="row">
                                 <div class="col-md-4">
                                   <label for="">Temperature</label>
                                   <p>
                                     <span><?= $checklist['temperature'] >= 37.1 ? '<span style="color: red"><button type="button" class="btn btn-danger">'.$checklist['temperature'].' ℃.</button></span>': '<span style="color: green"><button type="button" class="btn btn-success">'.$checklist['temperature'].' ℃.</button></span>'?></span>
                                   </p>
                                 </div>
                                 <div class="col-md-4">
                                   <label for="">Place Visited :</label>
                                   <p>
                                     <span><button type="button" class="btn btn-default" style="border-bottom: 1px solid gray;"><?= $checklist['department_id']?></button></span>
                                   </p>
                                 </div>
                                 <div class="col-md-4">
                                   <?php if($checklist['status_defined'] == 'a'){ ?>
                                     <button class="btn btn-default btn-md" style="border: 1px solid black;" type="button" name="button" disabled>
                                       <?php echo 'Already Assessed!'; ?>
                                     </button>
                                     <?php
                                   }elseif($checklist['status_defined'] == 'u'){
                                     ?>
                                     <button class="btn btn-default btn-md" style="border: 1px solid black;" type="button" name="button" disabled>
                                       <?php echo 'No illness was detected.'; ?>
                                     </button>
                                     <?php
                                   }else{
                                     ?>
                                     <button class="btn float-right" type="button" name="button">
                                       <?php users_action('checklists', $_SESSION['userPermmissions'], $checklist['id'], $profile[0]['user_id']); ?>
                                     </button>
                                     <?php
                                   }
                                   ?>
                                 </div>
                               </div>
                               <hr>
                               <label for="">1. Are you experiencing:</label>
                               <p>A. Fever greater than 38℃ (Lagnat:) |
                                 <!-- </style> -->
                                 <span style="float:right"><?= $checklist['one_a'] >= 'yes' ? '<span style="color: red "><button type="button" class="btn btn-danger">'.ucfirst($checklist['one_a']).' Date: '.date('F d, Y', strtotime($checklist['one_a_date'])).'</button></span>': '<span style="color: green"><button type="button" class="btn btn-success justify">'.ucfirst($checklist['one_a']).'</button></span>'?></span>

                               </p>

                               <p>B. Cough and/or colds (Ubo at/ sipon) |
                                 <span style="float:right"><?= $checklist['one_b'] >= 'yes' ? '<span style="color: red"><button type="button" class="btn btn-danger">'.ucfirst($checklist['one_b']).' Date: '.date('F d, Y', strtotime($checklist['one_b_date'])).'</button></span>': '<span style="color: green"><button type="button" class="btn btn-success justify">'.ucfirst($checklist['one_b']).'</button></span>'?></span>

                               </p>
                               <p>C. Body pains (pananakit ng katawan) |
                                 <span style="float:right"><?= $checklist['one_c'] >= 'yes' ? '<span style="color: red"><button type="button" class="btn btn-danger">'.ucfirst($checklist['one_c']).' Date: '.date('F d, Y', strtotime($checklist['one_c_date'])).'</button></span>': '<span style="color: green"><button type="button" class="btn btn-success">'.ucfirst($checklist['one_c']).'</button></span>'?></span>
                               </p>
                               <p>D. Sore throat (pananakit ng lalamunan/hirap lumunok) |
                                 <span style="float:right"><?= $checklist['one_d'] >= 'yes' ? '<span style="color: red"><button type="button" class="btn btn-danger">'.ucfirst($checklist['one_d']).' Date: '.date('F d, Y', strtotime($checklist['one_d_date'])).'</button></span>': '<span style="color: green"><button type="button" class="btn btn-success">'.ucfirst($checklist['one_d']).'</button></span>'?></span>
                               </p>
                               <p>E. Shortness of breath (hirap sa paghinga) |
                                 <span style="float:right"><?= $checklist['one_e'] >= 'yes' ? '<span style="color: red"><button type="button" class="btn btn-danger">'.ucfirst($checklist['one_e']).' Date: '.date('F d, Y', strtotime($checklist['one_e_date'])).'</button></span>': '<span style="color: green"><button type="button" class="btn btn-success">'.ucfirst($checklist['one_e']).'</button></span>'?></span>
                               </p>
                               <p>F. Diarrhea (pagtatae) |
                                 <span style="float:right"><?= $checklist['one_f'] >= 'yes' ? '<span style="color: red"><button type="button" class="btn btn-danger">'.ucfirst($checklist['one_f']).' Date: '.date('F d, Y', strtotime($checklist['one_f_date'])).'</button></span>': '<span style="color: green"><button type="button" class="btn btn-success">'.ucfirst($checklist['one_f']).'</button></span>'?></span>
                               </p>
                               <label for="">2. TRAVEL HISTORY:</label>
                               <p>For the last 14 days, did you travel to a country or a place with high number of COVID-19 patients? |
                                 <span style="float:right"><?= $checklist['two_travel'] >= 'yes' ? '<span style="color: red"><button type="button" class="btn btn-danger">'.ucfirst($checklist['two_travel']).' Address: '.ucfirst($checklist['two_travel_address']).'</button></span>': '<span style="color: green"><button type="button" class="btn btn-success">'.ucfirst($checklist['two_travel']).'</button></span>'?></span>
                               </p>
                               <label for="">3. Did you have any close contact or interaction with any of the following:</label>
                               <p>•	Individuals providing direct care, and/or working with individuals infected with COVID-19, and/or visiting or staying in the same environment with COVID-19 patient? |
                                 <span style="float:right"><?= $checklist['three_contact_one'] >= 'yes' ? '<span style="color: red"><button type="button" class="btn btn-danger">'.ucfirst($checklist['three_contact_one']).'</button></span>': '<span style="color: green"><button type="button" class="btn btn-success">'.ucfirst($checklist['three_contact_one']).'</button></span>'?></span>
                               </p>
                               <p>•	In close proximity or shared the same room with a COVID-19 patient? |
                                 <span style="float:right"><?= $checklist['three_contact_two'] >= 'yes' ? '<span style="color: red"><button type="button" class="btn btn-danger">'.ucfirst($checklist['three_contact_two']).'</button></span>': '<span style="color: green"><button type="button" class="btn btn-success">'.ucfirst($checklist['three_contact_two']).'</button></span>'?></span>
                               </p>
                               <p>•	Travelled together with COVID-19 patient? |
                                 <span style="float:right"><?= $checklist['three_contact_three'] >= 'yes' ? '<span style="color: red"><button type="button" class="btn btn-danger">'.ucfirst($checklist['three_contact_three']).'</button></span>': '<span style="color: green"><button type="button" class="btn btn-success">'.ucfirst($checklist['three_contact_three']).'</button></span>'?></span>
                               </p>
                               <p>•	Living with a COVID-19 patient within a 14-day period after the onset of his/her symptoms? |
                                 <span style="float:right"><?= $checklist['three_contact_four'] >= 'yes' ? '<span style="color: red"><button type="button" class="btn btn-danger">'.ucfirst($checklist['three_contact_four']).'</button></span>': '<span style="color: green"><button type="button" class="btn btn-success">'.ucfirst($checklist['three_contact_four']).'</button></span>'?></span>
                               </p>
                               <label for="">4. Do you have pre-existing illness?</label>
                               <p> Do you have pre-existing illness? |
                                 <span style="float:right"><?= $checklist['four_existing'] >= 'yes' ? '<span style="color: red"><button type="button" class="btn btn-danger">'.ucfirst($checklist['four_existing']).' Pre-illness: '.ucfirst($checklist['four_existing_specify']).'</button></span>': '<span style="color: green"><button type="button" class="btn btn-success">'.ucfirst($checklist['four_existing']).'</button></span>'?></span>
                               </p>
                               <label for="">5. Are you pregnant?</label>
                               <p> Are you pregnant? |
                                 <span style="float:right"><?= $checklist['five_pregnant'] >= 'yes' ? '<span style="color: red"><button type="button" class="btn btn-danger">'.ucfirst($checklist['five_pregnant']).'</button></span>': '<span style="color: green"><button type="button" class="btn btn-success">'.ucfirst($checklist['five_pregnant']).'</button></span>'?></span>
                               </p>
                              <?php $ctr++; ?>
                            <?php endif; ?>
                          <?php endforeach; ?>
                        </form>
                          <?php if ($ctr == 0): ?>
                            No fill-up for checklist.
                          <?php endif; ?>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
                <!-- /////////////////////////////////////////// -->
              </div>
            </div>
            <?php $ctr++; ?>
        <?php endforeach; ?>
          </div>
        </div>
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</div>
</div>
<hr>
