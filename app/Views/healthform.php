
  <body class="container" style="background-color: #e9ecef;">
    <br>
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="<?= base_url() ?>" class="h4"><b><?= SYSTEM_NAME ?></b></a>
      </div>
      <div class="card-body">
        <center><h4>Health Declaration Form</h4></center>
        <?php if(isset($_SESSION['success_request'])): ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
             <?= $_SESSION['success_request']; ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
        <?php endif; ?>
        <?php if(isset($_SESSION['error_request'])): ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
             <?= $_SESSION['error_request']; ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
        <?php endif; ?>
        <?php if(isset($error)): ?>
          <div class="alert alert-danger text-center"><?= $error;?></div>
        <?php else: ?>
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
            <form id="myForm" action="<?= base_url().'HealthDeclaration/request/'.$token ?>" method="post">
              <div class="form-group">
                <label for="reason_id">Reason for wrong input details in self-assessment.</label>
                <select type="text" class="form-select" name="reason_id" value="" id="reason_id">
                  <option value="" selected disabled>-- Select Reason --</option>
                  <?php foreach ($reasons as $reason): ?>
                  <option value="<?=$reason['id']?>"><?=$reason['reason']?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <?php foreach ($questions as $question):?>
              <p class="h6">1. <?=$question['q_one']?></p>
              <?php if (isset($errors['q_one'])): ?>
                <div class="text-danger">
                  <?= $errors['q_one']?>
                </div>
              <?php endif; ?>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="q_one" id="yes1" value="yes">
                <label class="form-check-label" for="yes1">
                  Yes
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="q_one" id="no1" value="no">
                <label class="form-check-label" for="no1">
                 No
                </label>
              </div>
              <p class="h6">2. <?=$question['q_two']?></p>
              <?php if (isset($errors['q_two'])): ?>
                <div class="text-danger">
                  <?= $errors['q_two']?>
                </div>
              <?php endif; ?>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="q_two" id="yes2" value="yes">
                <label class="form-check-label" for="yes2">
                  Yes
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="q_two" id="no2" value="no">
                <label class="form-check-label" for="no2">
                 No
                </label>
              </div>
              <p class="h6">3. <?=$question['q_three']?></p>
              <?php if (isset($errors['q_three'])): ?>
                <div class="text-danger">
                  <?= $errors['q_three']?>
                </div>
              <?php endif; ?>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="q_three" id="yes3" value="yes">
                <label class="form-check-label" for="yes3">
                  Yes
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="q_three" id="no3" value="no">
                <label class="form-check-label" for="no3">
                 No
                </label>
              </div>
              <p class="h6">4. <?=$question['q_four']?></p>
              <?php if (isset($errors['q_four'])): ?>
                <div class="text-danger">
                  <?= $errors['q_four']?>
                </div>
              <?php endif; ?>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="q_four" id="yes4" value="yes">
                <label class="form-check-label" for="yes4">
                  Yes
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="q_four" id="no4" value="no">
                <label class="form-check-label" for="no4">
                 No
                </label>
              </div>
              <p class="h6">5. <?=$question['q_five']?></p>
              <?php if (isset($errors['q_five'])): ?>
                <div class="text-danger">
                  <?= $errors['q_five']?>
                </div>
              <?php endif; ?>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="q_five" id="yes5" value="yes">
                <label class="form-check-label" for="yes5">
                  Yes
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="q_five" id="no5" value="no">
                <label class="form-check-label" for="no5">
                 No
                </label>
              </div>
              <?php endforeach;?>
                <hr>
                <h6 class="panel-title">NOTE: Rest assured that all information will be treated in utmost confidentiality.</h6>
                <p>(Makatitiyak ka na ang lahat ng impormasyon ay magiging kompidensiyal.)</p>
                <hr>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                  <label class="form-check-label" for="invalidCheck">
                    Agree to terms and conditions
                  </label>
                  <div class="invalid-feedback">
                    You must agree before submitting.
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-6 offset-md-6">
                  <input class="btn btn-primary float-right" type="submit" value="Submit">
                  </div>
                </div>
              </form>
        <?php endif; ?>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
