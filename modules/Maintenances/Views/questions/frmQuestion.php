<hr>
<div class="row">
  <div class="col-md-12">
    <div class="card border-success" style="border-radius: 0px;">
      <div class="card-body">
      <form action="<?= base_url() ?>questions/<?= isset($rec) ? 'edit/'.$rec['id'] : 'add' ?>" method="post">

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
          <div class="col-md-6 offset-3">
            <div class="form-group">
              <div class="row">
                <div class="col-md-8">
                  <label for="question">Question 1</label>
                </div>
                <div class="col-md-4">
              </div>
            </div>
              <textarea type="text" class="form-control" rows="5" name="q_one" id="q_one" placeholder="Question 1">
                <?= $rec['q_one'] ? $rec['q_one'] : ''?>
              </textarea>
              <?php if (isset($errors['q_one'])): ?>
                <div class="text-danger">
                    <?= $errors['q_one']?>
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-md-6 offset-3">
            <div class="form-group">
              <div class="row">
                <div class="col-md-12">
                  <label for="question">Question 2</label>
                </div>
            </div>
              <textarea type="text"  class="form-control" rows="5" name="q_two" id="q_two" placeholder="Question 2">
                <?= isset($rec['q_two']) ? $rec['q_two'] : ''?>
              </textarea>
              <?php if (isset($errors['q_two'])): ?>
                <div class="text-danger">
                    <?= $errors['q_two']?>
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-md-6 offset-3">
            <div class="form-group">
              <div class="row">
                <div class="col-md-12">
                  <label for="question">Question 3</label>
                </div>
            </div>
              <textarea type="text"  class="form-control" rows="5" name="q_three" id="q_three" placeholder="Question 3">
                <?= isset($rec['q_three']) ? $rec['q_three'] : ''?>
              </textarea>
              <?php if (isset($errors['q_three'])): ?>
                <div class="text-danger">
                    <?= $errors['q_three']?>
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-md-6 offset-3">
            <div class="form-group">
              <div class="row">
                <div class="col-md-12">
                  <label for="question">Question 4</label>
                </div>
            </div>
              <textarea type="text"  class="form-control" rows="5" name="q_four" id="q_four" placeholder="Question 4">
                <?= isset($rec['q_four']) ? $rec['q_four'] : ''?>
              </textarea>
              <?php if (isset($errors['q_four'])): ?>
                <div class="text-danger">
                    <?= $errors['q_four']?>
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-md-6 offset-3">
            <div class="form-group">
              <div class="row">
                <div class="col-md-12">
                  <label for="question">Question 5</label>
                </div>
            </div>
              <textarea type="text"  class="form-control" rows="5" name="q_five" id="q_five" placeholder="Question 5">
                <?= isset($rec['q_five']) ? $rec['q_five'] : ''?>
              </textarea>
              <?php if (isset($errors['q_five'])): ?>
                <div class="text-danger">
                    <?= $errors['q_five']?>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 offset-3">
            <button type="submit" class="btn btn-success float-right" style="width:40%;"><i class="fas fa-paper-plane"></i> Submit</button>
          </div>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
<br>
