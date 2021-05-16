
  <?php $uri = new \CodeIgniter\HTTP\URI(current_url()); ?>

  <?php if (empty($latest_checklist)): ?>
    <div class="card bg-light ">
      <div class="card-body">
        <p class="card-text" style="font-style: italic;"><i class="fas fa-spinner"></i> None</p>
      </div>
    </div>
  <?php else: ?>
    <div class="card bg-light ">
      <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <h3><?= $function_title?></h3>
        </div>
        <div class="col-md-6">

        </div>
      </div>

      <hr>
      <div class="card-body">
        <div class="tab-content">
          <div class="active tab-pane" id="activity">
            <!-- Post -->
              <div class="row">
                <div class="col-md-12">
                </div>
              </div>

              <form>
                <?php foreach ($latest_checklist as $health): ?>

                  <div class="row">
                    <div class="col-md-8">
                          <p>
                            <label>Legend: </label>
                            <button type="button" class="btn btn-danger" name="button"></button><span> Defined</span>
                            <button type="button" class="btn btn-success" name="button"></button><span> Undefined</span>
                            <!-- <a href="#" class="text-white">
                            <button type="button" class="btn btn-dark btn-md float-right" data-toggle="modal" data-target="#modal-lg" style="border: 1px solid gray;">
                            <i class="fas fa-qrcode text-white"></i>  Generate Qrcode
                          </button>
                        </a> -->
                    </div>
                    <div class="col-4">
                    
                    </div>
                  </div>

                  <hr>
                  <label for="">1. Are you experiencing:</label>
                  <p>A. Fever greater than 38℃ (Lagnat:) |
                    <!-- </style> -->
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
