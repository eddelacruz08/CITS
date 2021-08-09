
<?php if(isset($_SESSION['success_visit'])): ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= $_SESSION['success_visit']; ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php endif; ?>
<div class="card">
  <div class="card-header">
    <ul class="nav nav-pills">
      <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab"><i class="fas fa-clipboard-check"></i> Recent Self-assessment</a></li>
      <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab"><i class="fas fa-calendar-check"></i> Visit History</a></li>
      <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab"><i class="fas fa-history"></i> Health Checklist History</a></li>
      <li class="nav-item"><a class="nav-link" href="#reasons" data-toggle="tab"><i class="fas fa-history"></i> Invalidated Checklist History</a></li>
    </ul>
  </div><!-- /.card-header -->
  <div class="card-body" style="background-color: #e6e6e6;">
    <div class="tab-content">
      <div class="active tab-pane" id="activity">
        <!-- Post -->
        <?php if (empty($latest_checklist)): ?>
          <p class="card-text" style="font-style: italic;"><i class="fas fa-spinner"></i> None</p>
        <?php else: ?>
          <?php foreach ($latest_checklist as $health): ?>
            <!-- Timelime example  -->
            <!-- The time line -->
            <div class="timeline">
              <!-- timeline time label -->
              <div class="time-label">
                <?php if ($health['status_defined']=='ws'):?>
                  <span class="bg-red"><i class="fas fa-clock"></i> <?=date('h:i a', strtotime($health['created_date']))?></span>
                <?php else:?>
                  <span class="bg-green"><i class="fas fa-clock"></i> <?=date('h:i a', strtotime($health['created_date']))?></span>
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
                    <div class="form-group clearfix float-right">
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioSuccess1" <?= $health['q_one'] == 'yes' ? 'checked':'checked disabled'?>>
                        <label for="radioSuccess1">Yes</label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioSuccess2" <?= $health['q_one'] == 'no' ? 'checked':'checked disabled'?>>
                        <label for="radioSuccess2">No</label>
                      </div>
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
                    <div class="form-group clearfix float-right">
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioSuccess1" <?= $health['q_two'] == 'yes' ? 'checked':'checked disabled'?>>
                        <label for="radioSuccess1">Yes</label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioSuccess2" <?= $health['q_two'] == 'no' ? 'checked':'checked disabled'?>>
                        <label for="radioSuccess2">No</label>
                      </div>
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
                    <div class="form-group clearfix float-right">
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioSuccess1" <?= $health['q_three'] == 'yes' ? 'checked':'checked disabled'?>>
                        <label for="radioSuccess1">Yes</label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioSuccess2" <?= $health['q_three'] == 'no' ? 'checked':'checked disabled'?>>
                        <label for="radioSuccess2">No</label>
                      </div>
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
                    <div class="form-group clearfix float-right">
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioSuccess1" <?= $health['q_four'] == 'yes' ? 'checked':'checked disabled'?>>
                        <label for="radioSuccess1">Yes</label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioSuccess2" <?= $health['q_four'] == 'no' ? 'checked':'checked disabled'?>>
                        <label for="radioSuccess2">No</label>
                      </div>
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
                    <div class="form-group clearfix float-right">
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioSuccess1" <?= $health['q_five'] == 'yes' ? 'checked':'checked disabled'?>>
                        <label for="radioSuccess1">Yes</label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioSuccess2" <?= $health['q_five'] == 'no' ? 'checked':'checked disabled'?>>
                        <label for="radioSuccess2">No</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- END timeline item -->
          <?php endforeach; ?>
            <?php endforeach; ?>
        <?php endif; ?>
        <!-- /.post -->
      </div>
      <!-- /.tab-pane -->
      <div class="tab-pane" id="timeline">
          <?php if (empty($recent_visits)): ?>
            <p style="font-style: italic;"><i class="fas fa-spinner"></i> None</p>
          <?php else: ?>
            <table  style="width: 100%;">
              <!-- Timelime example  -->
                <!-- The time line -->
                <div class="timeline">
                  <!-- timeline time label -->
                  <div class="time-label">
                    <span class="bg-green">Date of Visits</span>
                  </div>
                  <!-- /.timeline-label --> 
              <?php foreach ($recent_visits as $recent_visit): ?>
                  <!-- timeline item -->
                  <div>
                    <div class="timeline-item">
                      <div class="timeline-body">
                        <span><?=date('F d, Y h:i a', strtotime($recent_visit['created_date']))?></span>
                      </div>
                    </div>
                  </div>
                  <!-- END timeline item -->
              <?php endforeach; ?>
                </div>
                <!-- END timeline item -->
            </table>
          <?php endif; ?>
      </div>
      <!-- /.tab-pane -->

      <div class="tab-pane" id="settings">
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
      <!-- /.tab-pane -->

      <div class="tab-pane" id="reasons">
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
                      <?php if ($reason['r_status_defined']=='ws'):?>
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
                              <?php if ($reason['r_status_defined']=='ws'):?>
                                <label class="text-danger"> | Have Symptoms</label>
                              <?php else:?>
                                <label class="text-success"> | No Symptoms</label>
                              <?php endif;?>
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
          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
      </div><!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->

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
                  <?php if ($reason['r_status_defined']=='ws'):?>
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
                      <div class="form-group clearfix float-right">
                        <div class="icheck-primary d-inline">
                          <input type="radio" id="radioSuccess1" <?= $reason['r_q_one'] == 'yes' ? 'checked':'checked disabled'?>>
                          <label for="radioSuccess1">Yes</label>
                        </div>
                        <div class="icheck-primary d-inline">
                          <input type="radio" id="radioSuccess2" <?= $reason['r_q_one'] == 'no' ? 'checked':'checked disabled'?>>
                          <label for="radioSuccess2">No</label>
                        </div>
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
                      <div class="form-group clearfix float-right">
                        <div class="icheck-primary d-inline">
                          <input type="radio" id="radioSuccess1" <?= $reason['r_q_two'] == 'yes' ? 'checked':'checked disabled'?>>
                          <label for="radioSuccess1">Yes</label>
                        </div>
                        <div class="icheck-primary d-inline">
                          <input type="radio" id="radioSuccess2" <?= $reason['r_q_two'] == 'no' ? 'checked':'checked disabled'?>>
                          <label for="radioSuccess2">No</label>
                        </div>
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
                      <div class="form-group clearfix float-right">
                        <div class="icheck-primary d-inline">
                          <input type="radio" id="radioSuccess1" <?= $reason['r_q_three'] == 'yes' ? 'checked':'checked disabled'?>>
                          <label for="radioSuccess1">Yes</label>
                        </div>
                        <div class="icheck-primary d-inline">
                          <input type="radio" id="radioSuccess2" <?= $reason['r_q_three'] == 'no' ? 'checked':'checked disabled'?>>
                          <label for="radioSuccess2">No</label>
                        </div>
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
                      <div class="form-group clearfix float-right">
                        <div class="icheck-primary d-inline">
                          <input type="radio" id="radioSuccess1" <?= $reason['r_q_four'] == 'yes' ? 'checked':'checked disabled'?>>
                          <label for="radioSuccess1">Yes</label>
                        </div>
                        <div class="icheck-primary d-inline">
                          <input type="radio" id="radioSuccess2" <?= $reason['r_q_four'] == 'no' ? 'checked':'checked disabled'?>>
                          <label for="radioSuccess2">No</label>
                        </div>
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
                      <div class="form-group clearfix float-right">
                        <div class="icheck-primary d-inline">
                          <input type="radio" id="radioSuccess1" <?= $reason['r_q_five'] == 'yes' ? 'checked':'checked disabled'?>>
                          <label for="radioSuccess1">Yes</label>
                        </div>
                        <div class="icheck-primary d-inline">
                          <input type="radio" id="radioSuccess2" <?= $reason['r_q_five'] == 'no' ? 'checked':'checked disabled'?>>
                          <label for="radioSuccess2">No</label>
                        </div>
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
                      <div class="form-group clearfix float-right">
                        <div class="icheck-primary d-inline">
                          <input type="radio" id="radioSuccess1" <?= $summary['q_one'] == 'yes' ? 'checked':'checked disabled'?>>
                          <label for="radioSuccess1">Yes</label>
                        </div>
                        <div class="icheck-primary d-inline">
                          <input type="radio" id="radioSuccess2" <?= $summary['q_one'] == 'no' ? 'checked':'checked disabled'?>>
                          <label for="radioSuccess2">No</label>
                        </div>
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
                      <div class="form-group clearfix float-right">
                        <div class="icheck-primary d-inline">
                          <input type="radio" id="radioSuccess1" <?= $summary['q_two'] == 'yes' ? 'checked':'checked disabled'?>>
                          <label for="radioSuccess1">Yes</label>
                        </div>
                        <div class="icheck-primary d-inline">
                          <input type="radio" id="radioSuccess2" <?= $summary['q_two'] == 'no' ? 'checked':'checked disabled'?>>
                          <label for="radioSuccess2">No</label>
                        </div>
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
                      <div class="form-group clearfix float-right">
                        <div class="icheck-primary d-inline">
                          <input type="radio" id="radioSuccess1" <?= $summary['q_three'] == 'yes' ? 'checked':'checked disabled'?>>
                          <label for="radioSuccess1">Yes</label>
                        </div>
                        <div class="icheck-primary d-inline">
                          <input type="radio" id="radioSuccess2" <?= $summary['q_three'] == 'no' ? 'checked':'checked disabled'?>>
                          <label for="radioSuccess2">No</label>
                        </div>
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
                      <div class="form-group clearfix float-right">
                        <div class="icheck-primary d-inline">
                          <input type="radio" id="radioSuccess1" <?= $summary['q_four'] == 'yes' ? 'checked':'checked disabled'?>>
                          <label for="radioSuccess1">Yes</label>
                        </div>
                        <div class="icheck-primary d-inline">
                          <input type="radio" id="radioSuccess2" <?= $summary['q_four'] == 'no' ? 'checked':'checked disabled'?>>
                          <label for="radioSuccess2">No</label>
                        </div>
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
                      <div class="form-group clearfix float-right">
                        <div class="icheck-primary d-inline">
                          <input type="radio" id="radioSuccess1" <?= $summary['q_five'] == 'yes' ? 'checked':'checked disabled'?>>
                          <label for="radioSuccess1">Yes</label>
                        </div>
                        <div class="icheck-primary d-inline">
                          <input type="radio" id="radioSuccess2" <?= $summary['q_five'] == 'no' ? 'checked':'checked disabled'?>>
                          <label for="radioSuccess2">No</label>
                        </div>
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