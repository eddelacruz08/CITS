<hr>
<div class="row">
  <div class="col-md-12">
    <div class="card border-success" style="border-radius: 0px;">
      <div class="card-body">
      <form action="<?= base_url() ?>guidelines/<?= isset($rec) ? 'edit/'.$rec['id'] : 'add' ?>" method="post">

        <div class="row">
          <div class="col-md-12">
              <label class="card-title"><h4><?= $function_title?></h4></label>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <textarea name="content" id="summernote" placeholder="Reason Name">
                <?= isset($rec['content']) ? $rec['content'] : ''?>
              </textarea>
              <?php if (isset($errors['content'])): ?>
                <div class="text-danger">
                    <?= $errors['content']?>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <button type="submit" class="btn btn-success float-right" style="width:40%;"><i class="fas fa-paper-plane"></i> Save</button>
          </div>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
<br>
