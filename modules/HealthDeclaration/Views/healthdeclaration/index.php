
  <?php $uri = new \CodeIgniter\HTTP\URI(current_url()); ?>

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
                          <i class="fas fa-exclamation-triangle"></i> Unavailable Self-Assessment.
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
              <p>Your latest self-assessment tested positive for symtoms. 
                Make sure you don't leave and stay at home. Please quarantine yourself so as not to infect other people with the symptoms experienced.
                Please take self-assessment for another day to clarify your status.</p>
            </div>
        <?php endif; ?>
        
              <div class="card card-primary card-outline card-outline-tabs">
                <div class="card-header p-0 border-bottom-0">
                  <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Self-Assessment History</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Assessment With Reason</a>
                    </li>
                  </ul>
                </div>
                <div class="card-body" style="background-color: #e6e6e6;">
                  <div class="tab-content" id="custom-tabs-four-tabContent">
                    <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                    <?php if($health_summary==false): ?>
                      <p class="text-center">No Data</p>
                    <?php else: ?>
                    <!-- Timelime example  -->
                    <div class="row">
                      <div class="col-md-12">
                        <!-- The time line -->
                        <div class="timeline">
                        <?php foreach ($health_summary as $summary): ?>
                          <!-- timeline time label -->
                          <div class="time-label">
                            <?php if ($summary['status_defined']=='ws'):?>
                              <span class="bg-red"><?=date('F d, Y', strtotime($summary['created_date']))?></span>
                            <?php else:?>
                              <span class="bg-green"><?=date('F d, Y', strtotime($summary['created_date']))?></span>
                            <?php endif;?>
                          </div>
                          <!-- /.timeline-label -->
                          <!-- timeline item -->
                          <div>
                            <i class="fas fa-clipboard-check bg-blue"></i>
                            <div class="timeline-item">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-7">
                                    <span class="time"><i class="fas fa-clock"></i> <?=date('h:i a', strtotime($summary['created_date']))?></span>
                                    <?php if ($summary['status_defined']=='ws'):?>
                                      <label class="text-danger"> | Have Symptoms</label>
                                    <?php else:?>
                                      <label class="text-success"> | No Symptoms</label>
                                    <?php endif;?>
                                  </div>
                                  <div class="col-5">
                                    <a class="btn btn-link float-right" type="button" data-toggle="modal" data-target="#myModals<?= $summary['id']?>">
                                      <i class="fas fa-list"></i> See details
                                    </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- END timeline item -->
                        <?php endforeach; ?>
                          <!-- timeline time label -->
                          <div class="time-label">
                            <span class="bg-green">End of History</span>
                          </div>
                          <!-- /.timeline-label -->
                          <div>
                            <i class="fas fa-clock bg-gray"></i>
                          </div>
                        </div>
                      </div>
                      <!-- /.col -->
                    </div>
                  <!-- /.timeline -->
                    <?php endif; ?>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                      <?php if($reasons==false): ?>
                        <p class="text-center">No Data</p>
                      <?php else: ?>
                        <!-- Timelime example  -->
                        <div class="row">
                          <div class="col-md-12">
                            <!-- The time line -->
                            <div class="timeline">
                            <?php foreach ($reasons as $reason): ?>
                              <!-- timeline time label -->
                              <div class="time-label">
                                <?php if ($reason['status_defined']=='ws'):?>
                                  <span class="bg-red"><?=date('F d, Y', strtotime($reason['created_date']))?></span>
                                <?php else:?>
                                  <span class="bg-green"><?=date('F d, Y', strtotime($reason['created_date']))?></span>
                                <?php endif;?>
                              </div>
                              <!-- /.timeline-label -->
                              <!-- timeline item -->
                              <div>
                                <i class="fas fa-clipboard-check bg-blue"></i>
                                <div class="timeline-item">
                                  <div class="card-body">
                                    <div class="row">
                                      <div class="col-7">
                                        <span class="time"><i class="fas fa-clock"></i> <?=date('h:i a', strtotime($reason['created_date']))?></span>
                                        <?php if ($reason['status_defined']=='ws'):?>
                                          <label class="text-danger"> | Have Symptoms</label>
                                        <?php else:?>
                                          <label class="text-success"> | No Symptoms</label>
                                        <?php endif;?>
                                        <br>
                                        <label>Reason: </label>
                                        <span><?= $reason['reason']?></span>
                                      </div>
                                      <div class="col-5">
                                        <a class="btn btn-link float-right" type="button" data-toggle="modal" data-target="#myModalsReason<?= $reason['id']?>">
                                          <i class="fas fa-list"></i> See details
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- END timeline item -->
                            <?php endforeach; ?>
                              <!-- timeline time label -->
                              <div class="time-label">
                                <span class="bg-green">End of History</span>
                              </div>
                              <!-- /.timeline-label -->
                              <div>
                                <i class="fas fa-clock bg-gray"></i>
                              </div>
                            </div>
                          </div>
                          <!-- /.col -->
                        </div>
                      <!-- /.timeline -->
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
                <!-- /.card -->

            <?php foreach ($reasons as $reason): ?>
              <!-- Modal -->
              <div class="modal fade" id="myModalsReason<?= $reason['id']?>" role="dialog">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <span class="h5"><i class="fas fa-calendar"></i> <?=date('F d, Y', strtotime($reason['created_date']))?></span>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" style="background-color: #e6e6e6;">
                      <!-- Timelime example  -->
                          <!-- The time line -->
                          <div class="timeline">
                            <!-- timeline time label -->
                            <div class="time-label">
                              <?php if ($reason['status_defined']=='ws'):?>
                                <span class="bg-red"><i class="fas fa-clock"></i> <?=date('h:i a', strtotime($reason['created_date']))?></span>
                              <?php else:?>
                                <span class="bg-green"><i class="fas fa-clock"></i> <?=date('h:i a', strtotime($reason['created_date']))?></span>
                              <?php endif;?>
                            </div>
                            <!-- /.timeline-label --> 
                            <!-- timeline item -->
                            <div>
                              <div class="timeline-item">
                                <div class="timeline-body">
                                  <label>Reason: </label>
                                  <span><?=$reason['reason']?></span>
                                </div>
                              </div>
                            </div>
                            <!-- END timeline item -->
                            <!-- timeline item -->
                            <div>
                              <div class="timeline-item">
                                <div class="timeline-body">
                                  <label>Questions</label>
                                  <div class="float-right">
                                  <label>Status</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- END timeline item -->
                            <?php $cnt = 1; ?>
                            <?php foreach ($questions as $question): ?>
                            <!-- timeline item -->
                            <div>
                              <div class="timeline-item">
                                <div class="timeline-body">
                                  <span><?= $cnt++;?>. <?= $question['q_one']?></span>
                                  <div class="float-right">
                                    <label for="yes">Yes</label>
                                    <input type="radio" id="yes" disabled <?= $reason['q_one'] == 'yes' ? 'checked':'unchecked'?>>
                                    <label for="no">No</label>
                                    <input type="radio" id="no" disabled <?= $reason['q_one'] == 'no' ? 'checked':'unchecked'?>>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- END timeline item -->
                             <!-- timeline item -->
                             <div>
                              <div class="timeline-item">
                                <div class="timeline-body">
                                  <span><?= $cnt++;?>. <?= $question['q_two']?></span>
                                  <div class="float-right">
                                    <label for="yes">Yes</label>
                                    <input type="radio" id="yes" disabled <?= $reason['q_two'] == 'yes' ? 'checked':'unchecked'?>>
                                    <label for="no">No</label>
                                    <input type="radio" id="no" disabled <?= $reason['q_two'] == 'no' ? 'checked':'unchecked'?>>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- END timeline item --> 
                            <!-- timeline item -->
                            <div>
                              <div class="timeline-item">
                                <div class="timeline-body">
                                  <span><?= $cnt++;?>. <?= $question['q_three']?></span>
                                  <div class="float-right">
                                    <label for="yes">Yes</label>
                                    <input type="radio" id="yes" disabled <?= $reason['q_three'] == 'yes' ? 'checked':'unchecked'?>>
                                    <label for="no">No</label>
                                    <input type="radio" id="no" disabled <?= $reason['q_three'] == 'no' ? 'checked':'unchecked'?>>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- END timeline item --> 
                            <!-- timeline item -->
                            <div>
                              <div class="timeline-item">
                                <div class="timeline-body">
                                  <span><?= $cnt++;?>. <?= $question['q_four']?></span>
                                  <div class="float-right">
                                    <label for="yes">Yes</label>
                                    <input type="radio" id="yes" disabled <?= $reason['q_four'] == 'yes' ? 'checked':'unchecked'?>>
                                    <label for="no">No</label>
                                    <input type="radio" id="no" disabled <?= $reason['q_four'] == 'no' ? 'checked':'unchecked'?>>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- END timeline item -->
                            <!-- timeline item -->
                            <div>
                              <div class="timeline-item">
                                <div class="timeline-body">
                                  <span><?= $cnt++;?>. <?= $question['q_five']?></span>
                                  <div class="float-right">
                                    <label for="yes">Yes</label>
                                    <input type="radio" id="yes" disabled <?= $reason['q_five'] == 'yes' ? 'checked':'unchecked'?>>
                                    <label for="no">No</label>
                                    <input type="radio" id="no" disabled <?= $reason['q_five'] == 'no' ? 'checked':'unchecked'?>>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- END timeline item -->
                            <?php endforeach; ?>
                            <!-- <div>
                              <i class="fas fa-clock bg-gray"></i>
                            </div> -->
                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                    <!-- /.timeline -->
                  </div>
                </div>
              </div>
            <?php endforeach; ?>

            <?php foreach ($health_summary as $summary): ?>
              <!-- Modal -->
              <div class="modal fade" id="myModals<?= $summary['id']?>" role="dialog">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <span class="h5"><i class="fas fa-calendar"></i> <?=date('F d, Y', strtotime($summary['created_date']))?></span>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" style="background-color: #e6e6e6;">
                      <!-- Timelime example  -->
                          <!-- The time line -->
                          <div class="timeline">
                            <!-- timeline time label -->
                            <div class="time-label">
                              <?php if ($summary['status_defined']=='ws'):?>
                                <span class="bg-red"><i class="fas fa-clock"></i> <?=date('h:i a', strtotime($summary['created_date']))?></span>
                              <?php else:?>
                                <span class="bg-green"><i class="fas fa-clock"></i> <?=date('h:i a', strtotime($summary['created_date']))?></span>
                              <?php endif;?>
                            </div>
                            <!-- /.timeline-label --> 
                            <!-- timeline item -->
                            <div>
                              <div class="timeline-item">
                                <div class="timeline-body">
                                  <label>Questions</label>
                                  <div class="float-right">
                                  <label>Status</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- END timeline item -->
                            <?php $cnt = 1; ?>
                            <?php foreach ($questions as $question): ?>
                            <!-- timeline item -->
                            <div>
                              <div class="timeline-item">
                                <div class="timeline-body">
                                  <span><?= $cnt++;?>. <?= $question['q_one']?></span>
                                  <div class="float-right">
                                    <label for="yes">Yes</label>
                                    <input type="radio" id="yes" disabled <?= $summary['q_one'] == 'yes' ? 'checked':'unchecked'?>>
                                    <label for="no">No</label>
                                    <input type="radio" id="no" disabled <?= $summary['q_one'] == 'no' ? 'checked':'unchecked'?>>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- END timeline item -->
                             <!-- timeline item -->
                             <div>
                              <div class="timeline-item">
                                <div class="timeline-body">
                                  <span><?= $cnt++;?>. <?= $question['q_two']?></span>
                                  <div class="float-right">
                                    <label for="yes">Yes</label>
                                    <input type="radio" id="yes" disabled <?= $summary['q_two'] == 'yes' ? 'checked':'unchecked'?>>
                                    <label for="no">No</label>
                                    <input type="radio" id="no" disabled <?= $summary['q_two'] == 'no' ? 'checked':'unchecked'?>>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- END timeline item --> 
                            <!-- timeline item -->
                            <div>
                              <div class="timeline-item">
                                <div class="timeline-body">
                                  <span><?= $cnt++;?>. <?= $question['q_three']?></span>
                                  <div class="float-right">
                                    <label for="yes">Yes</label>
                                    <input type="radio" id="yes" disabled <?= $summary['q_three'] == 'yes' ? 'checked':'unchecked'?>>
                                    <label for="no">No</label>
                                    <input type="radio" id="no" disabled <?= $summary['q_three'] == 'no' ? 'checked':'unchecked'?>>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- END timeline item --> 
                            <!-- timeline item -->
                            <div>
                              <div class="timeline-item">
                                <div class="timeline-body">
                                  <span><?= $cnt++;?>. <?= $question['q_four']?></span>
                                  <div class="float-right">
                                    <label for="yes">Yes</label>
                                    <input type="radio" id="yes" disabled <?= $summary['q_four'] == 'yes' ? 'checked':'unchecked'?>>
                                    <label for="no">No</label>
                                    <input type="radio" id="no" disabled <?= $summary['q_four'] == 'no' ? 'checked':'unchecked'?>>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- END timeline item -->
                            <!-- timeline item -->
                            <div>
                              <div class="timeline-item">
                                <div class="timeline-body">
                                  <span><?= $cnt++;?>. <?= $question['q_five']?></span>
                                  <div class="float-right">
                                    <label for="yes">Yes</label>
                                    <input type="radio" id="yes" disabled <?= $summary['q_five'] == 'yes' ? 'checked':'unchecked'?>>
                                    <label for="no">No</label>
                                    <input type="radio" id="no" disabled <?= $summary['q_five'] == 'no' ? 'checked':'unchecked'?>>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- END timeline item -->
                            <?php endforeach; ?>
                            <!-- <div>
                              <i class="fas fa-clock bg-gray"></i>
                            </div> -->
                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                    <!-- /.timeline -->
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
      
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