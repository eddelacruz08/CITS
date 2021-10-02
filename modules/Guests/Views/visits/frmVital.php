<br>
<div class="row">
  <div class="col-md-12">
    <form action="<?= base_url() ?>vitals/capture/<?=$profile[0]['id']?>" method="post">
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <div class="form-group">
            <label for="weight">Weight</label>
            <input name="weight" type="number" class="form-control <?= isset($errors['weight']) ? 'is-invalid':'is-valid' ?>" id="weight" placeholder="Weight">
              <?php if(isset($errors['weight'])): ?>
                <div class="invalid-feedback">
                  <?= $errors['weight'] ?>
                </div>
              <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <div class="form-group">
            <label for="height">height</label>
            <input name="height" type="number" class="form-control <?= isset($errors['height']) ? 'is-invalid':'is-valid' ?>" id="height" placeholder="height">
              <?php if(isset($errors['height'])): ?>
                <div class="invalid-feedback">
                  <?= $errors['height'] ?>
                </div>
              <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <div class="form-group">
            <label for="temperature">temperature</label>
            <input name="temperature" type="number" class="form-control <?= isset($errors['temperature']) ? 'is-invalid':'is-valid' ?>" id="temperature" placeholder="temperature">
              <?php if(isset($errors['temperature'])): ?>
                <div class="invalid-feedback">
                  <?= $errors['temperature'] ?>
                </div>
              <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <div class="form-group">
            <label for="respiratory_rate">Respiratory Rate</label>
            <input name="respiratory_rate" type="number" class="form-control <?= isset($errors['respiratory_rate']) ? 'is-invalid':'is-valid' ?>" id="Respiratory Rate" placeholder="respiratory_rate">
              <?php if(isset($errors['respiratory_rate'])): ?>
                <div class="invalid-feedback">
                  <?= $errors['respiratory_rate'] ?>
                </div>
              <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <div class="form-group">
            <label for="pulse_rate">Pulse Rate</label>
            <input name="pulse_rate" type="number" class="form-control <?= isset($errors['pulse_rate']) ? 'is-invalid':'is-valid' ?>" id="pulse_rate" placeholder="Pulse Rate">
              <?php if(isset($errors['pulse_rate'])): ?>
                <div class="invalid-feedback">
                  <?= $errors['pulse_rate'] ?>
                </div>
              <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <div class="form-group">
            <label for="blood_pressure">Blood Pressure</label>
            <div class="row">
              <div class="col-md-5">
                <input name="blood_pressure_numerator" type="number" class="form-control <?= isset($errors['blood_pressure_numerator']) ? 'is-invalid':'is-valid' ?>" id="blood_pressure_numerator" placeholder="Blood Pressure">
                <?php if(isset($errors['blood_pressure'])): ?>
                  <div class="invalid-feedback">
                    <?= $errors['blood_pressure'] ?>
                  </div>
                <?php endif; ?>
              </div>
              <div class="col-md-1">
                /
              </div>
              <div class="col-md-5">
                <input name="blood_pressure_denominator" type="number" class="form-control <?= isset($errors['blood_pressure_denominator']) ? 'is-invalid':'is-valid' ?>" id="blood_pressure_denominator" placeholder="Blood Pressure">
                <?php if(isset($errors['blood_pressure'])): ?>
                  <div class="invalid-feedback">
                    <?= $errors['blood_pressure'] ?>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <input type="hidden" name="visit_id" value="<?=$visit_id?>">
          <button type="submit" class="btn btn-primary float-right">Submit</button>
        </div>
      </div>
    </form>
    <p style="clear: both"></p>
  </div>
</div>
