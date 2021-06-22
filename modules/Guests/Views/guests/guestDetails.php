<!-- Content Header (Page header) -->
  <!-- <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= $function_title; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url('dashboard')?>">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="<?=base_url('guests')?>">Guests</a></li>
              <li class="breadcrumb-item active"><?= $function_title; ?></li>
            </ol>
          </div>
        </div>
      </div>
    </section> -->

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
      <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab"><i class="fas fa-clipboard-check"></i> Recent Checklist</a></li>
      <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab"><i class="fas fa-calendar-check"></i> Recent Visits</a></li>
      <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab"><i class="fas fa-history"></i> Health History Checklist</a></li>
    </ul>
  </div><!-- /.card-header -->
  <div class="card-body" style="background-color: #e6e6e6;">
    <div class="tab-content">
      <div class="active tab-pane" id="activity">
        <!-- Post -->
        <?php if (empty($latest_checklist)): ?>
          <p class="card-text" style="font-style: italic;"><i class="fas fa-spinner"></i> None</p>
        <?php else: ?>
                <a href="<?=base_url().'guests/print/'. $profile[0]['id'] ?>"><button class="btn btn-link float-right" type="button" name="button"> <i class="fas fa-file-pdf text-red"></i> Download Recent Checklist PDF</button></a>
              
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
                                  <div class="float-right">
                                    <label for="yes">Yes</label>
                                    <input type="radio" id="yes" disabled <?= $health['q_one'] == 'yes' ? 'checked':''?>>
                                    <label for="no">No</label>
                                    <input type="radio" id="no" disabled <?= $health['q_one'] == 'no' ? 'checked':''?>>
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
                                    <input type="radio" id="yes" disabled <?= $health['q_two'] == 'yes' ? 'checked':'unchecked'?>>
                                    <label for="no">No</label>
                                    <input type="radio" id="no" disabled <?= $health['q_two'] == 'no' ? 'checked':'unchecked'?>>
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
                                    <input type="radio" id="yes" disabled <?= $health['q_three'] == 'yes' ? 'checked':'unchecked'?>>
                                    <label for="no">No</label>
                                    <input type="radio" id="no" disabled <?= $health['q_three'] == 'no' ? 'checked':'unchecked'?>>
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
                                    <input type="radio" id="yes" disabled <?= $health['q_four'] == 'yes' ? 'checked':'unchecked'?>>
                                    <label for="no">No</label>
                                    <input type="radio" id="no" disabled <?= $health['q_four'] == 'no' ? 'checked':'unchecked'?>>
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
                                    <input type="radio" id="yes" disabled <?= $health['q_five'] == 'yes' ? 'checked':'unchecked'?>>
                                    <label for="no">No</label>
                                    <input type="radio" id="no" disabled <?= $health['q_five'] == 'no' ? 'checked':'unchecked'?>>
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
        <?php if (empty($health_summary)): ?>
          <p class="card-text" style="font-style: italic;"><i class="fas fa-spinner"></i> None</p>
        <?php else: ?>
          <div id="accordion">
            <?php foreach ($health_summary as $summary): ?>
              <div class="card">
                <div class="card-header" id="heading<?=$summary['id']?>">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse<?=$summary['id']?>" aria-expanded="false" aria-controls="collapse<?=$summary['id']?>">
                      <?=date('F d, Y h:i a', strtotime($summary['created_date']))?>
                    </button>
                    <!-- <button class="btn btn-link float-right" name="download" data-target="<?=$summary['id']?>" aria-expanded="true" aria-controls="<?=$summary['id']?>">
                    <a href="<?=base_url().'patients/print/'. $profile[0]['id'] ?>">  <i class="fas fa-file-pdf text-red"></i> Download PDF</a>
                    </button> -->
                  </h5>
                </div>
                <div id="collapse<?=$summary['id']?>" class="collapse" aria-labelledby="heading<?=$summary['id']?>" data-parent="#accordion">
                <div class="card-body" style="background-color: #e6e6e6;">
                    <div class="row">
                      <div class="col-md-12">
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
                          </div>
                        <!-- END timeline item -->
                      <?php endforeach; ?>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
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
