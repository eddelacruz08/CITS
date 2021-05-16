
<br>
  <?php $uri = new \CodeIgniter\HTTP\URI(current_url()); ?>

    <div class="card bg-light ">
      <div class="card-body">
      <div class="row">
        <div class="col-md-12 text-center">
          <h3><?= $function_title?></h3>
        </div>
      </div>
      <div class="card-body">
        <div class="tab-content">
          <div class="active tab-pane" id="activity">
            <!-- Post -->
            <?php if (empty($latest_checklist)): ?>
              <p class="card-text text-center" style="font-style: italic;"><i class="fas fa-spinner"></i> None</p>
            <?php else: ?>
              <?php foreach ($latest_checklist as $health): ?>
          <div class="card bg-light ">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <label for="">Full Name: </label>
                  <p class="h5" STYLE="text-transform:uppercase"><?= ucwords($health['first_name'].' '.$health['middle_name'].' '.$health['last_name']) ?></p>
                </div>
                <div class="col-md-4">
                  <button type="button" class="btn btn-warning btn-lg float-right" name="button" data-toggle="modal" data-target="#modal-lg">
                    <span><i class="fas fa-calendar"></i> Set Date Observation</span>
                  </button>
                </div>
                <div class="col-md-2">
                  <button type="button" style="border: solid 1px black;" class="btn btn-default btn-lg float-right" name="button" data-toggle="modal" data-target="#modal-lgb">
                    <span><i class="fas fa-trash-alt"></i></span>
                  </button>
                  <!-- modal -->
                  <div class="modal fade" id="modal-lgb">
                        <div class="modal-dialog modal-md">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Revert Data</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <p class="h5">Are you sure this patient is not defined for any sickness?</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default float-left" data-dismiss="modal" aria-label="Close">
                                Cancel
                              </button>
                              <a class="btn btn-success btn-md float-right" href="<?=base_url().'guest%20assessment/delete/'.$health['user_id']?>" title="delete">
                                Yes
                              </a>
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal -->
                </div>
              </div>
            </div>
          </div>
              <!-- modal -->
              <div class="modal fade" id="modal-lg">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Set Date Checkups</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="<?= base_url() ?>guest%20assessment/add" method="post">
                            <label for="no_days">Number of Days to Accomplish:</label>
                            <input name="guest_id" hidden type="text" value="<?= $health['user_id']?>">
                            <input name="user_id" hidden type="text" value="<?= $_SESSION['uid']?>">
                            <div class="input-group mb-3">
                              <input name="no_days" type="number" class="form-control <?= isset($errors['no_days']) ? 'is-invalid':' ' ?>" id="no_days" placeholder="No. of Days" required>
                              <?php if(isset($errors['no_days'])): ?>
                                <div class="invalid-feedback">
                                  <?= $errors['no_days'] ?>
                                </div>
                              <?php endif; ?>
                            </div>
                            <label for="date">Date:</label>
                            <div class="input-group mb-3">
                              <input name="date" type="date" class="form-control <?= isset($errors['date']) ? 'is-invalid':' ' ?>" id="date" placeholder="Date" required>
                              <?php if(isset($errors['date'])): ?>
                                <div class="invalid-feedback">
                                  <?= $errors['date'] ?>
                                </div>
                              <?php endif; ?>
                            </div>
                            <label for="date">Recommendation:</label>
                            <div class="input-group mb-3">
                              <textarea name="description" type="text" class="form-control <?= isset($errors['description']) ? 'is-invalid':' ' ?>" id="description" placeholder="Recommendations" required></textarea>
                              <?php if(isset($errors['description'])): ?>
                                <div class="invalid-feedback">
                                  <?= $errors['description'] ?>
                                </div>
                              <?php endif; ?>
                            </div>
                            <label>Send Email:</label>
                            <div class="input-group mb-3">
                              <p>After you submit, all data will saved and automatically send an email to the patient including the link wherein the patient
                                 is starting to fill out the health declaration form that depends the given number of days.</p>
                            </div>

                            <div class="row">
                              <!-- /.col -->
                              <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                              </div>
                              <!-- /.col -->
                            </div>
                          </form>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
              <hr>
              <form>
                  <div class="row">
                    <div class="col-md-8">
                      <p>
                        <label class="h5">Legend: </label>
                        <button type="button" class="btn btn-danger" name="button"></button><span> Defined</span>
                        <button type="button" class="btn btn-success" name="button"></button><span> Undefined</span>
                      </p>
                    </div>
                    <div class="col-md-4">
                      <p>
                        <label class="h5" for="">Temperature:</label>
                        <span><?= $health['temperature'] >= 37.1 ? '<span style="color: red"><button type="button" class="btn btn-danger float-right">'.$temp.' ℃.</button></span>': '<span style="color: green"><button type="button" class="btn btn-success float-right">'.$temp.' ℃.</button></span>'?></span>
                      </p>
                    </div>
                  </div>
                  <label for="">1. Are you experiencing:</label>
                  <p>A. Fever greater than 38℃ (Lagnat:) |
                    <span style="float:right"><?= $health['one_a'] >= 'yes' ? '<span style="color: red "><button type="button" class="btn btn-danger">'.ucfirst($health['one_a']).' Date: '.date('F d, Y', strtotime($health['one_a_date'])).'</button></span>': '<span style="color: green"><button type="button" class="btn btn-success justify">'.ucfirst($health['one_a']).'</button></span>'?></span>
                  </p>
                  <p>B. Cough and/or colds (Ubo at/ sipon) |
                    <span style="float:right"><?= $health['one_b'] >= 'yes' ? '<span style="color: red"><button type="button" class="btn btn-danger">'.ucfirst($health['one_b']).' Date: '.date('F d, Y', strtotime($health['one_b_date'])).'</button></span>': '<span style="color: green"><button type="button" class="btn btn-success justify">'.ucfirst($health['one_b']).'</button></span>'?></span>

                  </p>
                  <p>C. Body pains (pananakit ng katawan) |
                    <span style="float:right"><?= $health['one_c'] >= 'yes' ? '<span style="color: red"><button type="button" class="btn btn-danger">'.ucfirst($health['one_c']).' Date: '.date('F d, Y', strtotime($health['one_c_date'])).'</button></span>': '<span style="color: green"><button type="button" class="btn btn-success">'.ucfirst($health['one_c']).'</button></span>'?></span>
                  </p>
                  <p>D. Sore throat (pananakit ng lalamunan/hirap lumunok) |
                    <span style="float:right"><?= $health['one_d'] >= 'yes' ? '<span style="color: red"><button type="button" class="btn btn-danger">'.ucfirst($health['one_d']).' Date: '.date('F d, Y', strtotime($health['one_d_date'])).'</button></span>': '<span style="color: green"><button type="button" class="btn btn-success">'.ucfirst($health['one_d']).'</button></span>'?></span>
                  </p>
                  <p>E. Shortness of breath (hirap sa paghinga) |
                    <span style="float:right"><?= $health['one_e'] >= 'yes' ? '<span style="color: red"><button type="button" class="btn btn-danger">'.ucfirst($health['one_e']).' Date: '.date('F d, Y', strtotime($health['one_e_date'])).'</button></span>': '<span style="color: green"><button type="button" class="btn btn-success">'.ucfirst($health['one_e']).'</button></span>'?></span>
                  </p>
                  <p>F. Diarrhea (pagtatae) |
                    <span style="float:right"><?= $health['one_f'] >= 'yes' ? '<span style="color: red"><button type="button" class="btn btn-danger">'.ucfirst($health['one_f']).' Date: '.date('F d, Y', strtotime($health['one_f_date'])).'</button></span>': '<span style="color: green"><button type="button" class="btn btn-success">'.ucfirst($health['one_f']).'</button></span>'?></span>
                  </p>
                  <label for="">2. TRAVEL HISTORY:</label>
                  <p>For the last 14 days, did you travel to a country or a place with high number of COVID-19 patients? |
                    <span style="float:right"><?= $health['two_travel'] >= 'yes' ? '<span style="color: red"><button type="button" class="btn btn-danger">'.ucfirst($health['two_travel']).' Address: '.ucfirst($health['two_travel_address']).'</button></span>': '<span style="color: green"><button type="button" class="btn btn-success">'.ucfirst($health['two_travel']).'</button></span>'?></span>
                  </p>
                  <label for="">3. Did you have any close contact or interaction with any of the following:</label>
                  <p>•	Individuals providing direct care, and/or working with individuals infected with COVID-19, and/or visiting or staying in the same environment with COVID-19 patient? |
                    <span style="float:right"><?= $health['three_contact_one'] >= 'yes' ? '<span style="color: red"><button type="button" class="btn btn-danger">'.ucfirst($health['three_contact_one']).'</button></span>': '<span style="color: green"><button type="button" class="btn btn-success">'.ucfirst($health['three_contact_one']).'</button></span>'?></span>
                  </p>
                  <p>•	In close proximity or shared the same room with a COVID-19 patient? |
                    <span style="float:right"><?= $health['three_contact_two'] >= 'yes' ? '<span style="color: red"><button type="button" class="btn btn-danger">'.ucfirst($health['three_contact_two']).'</button></span>': '<span style="color: green"><button type="button" class="btn btn-success">'.ucfirst($health['three_contact_two']).'</button></span>'?></span>
                  </p>
                  <p>•	Travelled together with COVID-19 patient? |
                    <span style="float:right"><?= $health['three_contact_three'] >= 'yes' ? '<span style="color: red"><button type="button" class="btn btn-danger">'.ucfirst($health['three_contact_three']).'</button></span>': '<span style="color: green"><button type="button" class="btn btn-success">'.ucfirst($health['three_contact_three']).'</button></span>'?></span>
                  </p>
                  <p>•	Living with a COVID-19 patient within a 14-day period after the onset of his/her symptoms? |
                    <span style="float:right"><?= $health['three_contact_four'] >= 'yes' ? '<span style="color: red"><button type="button" class="btn btn-danger">'.ucfirst($health['three_contact_four']).'</button></span>': '<span style="color: green"><button type="button" class="btn btn-success">'.ucfirst($health['three_contact_four']).'</button></span>'?></span>
                  </p>
                  <label for="">4. Do you have pre-existing illness?</label>
                  <p> Do you have pre-existing illness? |
                    <span style="float:right"><?= $health['four_existing'] >= 'yes' ? '<span style="color: red"><button type="button" class="btn btn-danger">'.ucfirst($health['four_existing']).' Pre-illness: '.ucfirst($health['four_existing_specify']).'</button></span>': '<span style="color: green"><button type="button" class="btn btn-success">'.ucfirst($health['four_existing']).'</button></span>'?></span>
                  </p>
                  <label for="">5. Are you pregnant?</label>
                  <p> Are you pregnant? |
                    <span style="float:right"><?= $health['five_pregnant'] >= 'yes' ? '<span style="color: red"><button type="button" class="btn btn-danger">'.ucfirst($health['five_pregnant']).'</button></span>': '<span style="color: green"><button type="button" class="btn btn-success">'.ucfirst($health['five_pregnant']).'</button></span>'?></span>
                  </p>
                <?php endforeach; ?>
              </form>
            <?php endif; ?>
            <!-- /.post -->
          </div>
        </div>
      </div>
    </div>
  </div>
