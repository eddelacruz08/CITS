<hr>
<div class="row">
  <div class="col-md-12">
    <div class="card border-success" style="border-radius: 0px;">
      <div class="card-body">
      <form action="<?= base_url() ?>reasons/<?= isset($rec) ? 'edit/'.$rec['id'] : 'add' ?>" method="post">

        <div class="row">
          <div class="col-md-3">
          </div>
          <div class="col-md-6">
              <label class="card-title"><h3><?= $function_title?></h3></label>
          </div>
          <div class="col-md-3">
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <div class="row">
                <div class="col-md-8">
                  <label for="reason">Reasons</label>
                </div>
                <div class="col-md-4">
                <input type="radio" name="status" id="statusA" value="a">
                <label for="statusA">Active</label>
                <input type="radio" name="status" id="statusB" value="b">
                <label for="statusB">Inactive</label>
              </div>
            </div>
              <input type="text" class="form-control" name="reason" value="<?= isset($rec['reason']) ? $rec['reason'] : ''?>" id="reason" placeholder="Reason Name">
              <?php if (isset($errors['reason'])): ?>
                <div class="text-danger">
                    <?= $errors['reason']?>
                </div>
              <?php endif; ?>
              <?php if (isset($errors['status'])): ?>
                <div class="text-danger">
                    <?= $errors['status']?>
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-md-3">
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
          </div>
          <div class="col-md-6">
            <button type="submit" class="btn btn-success float-right" style="width:40%;"><i class="fas fa-paper-plane"></i> Submit</button>
          </div>
          <div class="col-md-3">
          </div>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
<br>
