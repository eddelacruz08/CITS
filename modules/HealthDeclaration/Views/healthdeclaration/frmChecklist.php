
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          <center><h4>Health Declaration Form</h4><h5>Self-Assessment<h5></center>
        </div>
      </div>
      <hr>
        <div class="row">
          <div class="col-md-12">
              <form id="formId" action="<?= base_url() ?>health%20declaration/<?='captures/'.$profile[0]['id']?>" method="post">
                <input hidden name="question_id">
                <table>
                  <tr>
                    <td>
                <?php foreach ($questions as $key => $value):?>
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" name="question_id[]" value="<?php echo $value['id'] ?>" id="<?php echo $value['question'] ?>">
                        <label for="<?php echo $value['question'] ?>" class="custom-control-label"><?php echo $value['question'] ?></label>
                      </div>
                <?php endforeach;?>
                <hr>
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" name="question" value="none" id="question_id">
                  <label for="question_id" class="custom-control-label">I have no any symtoms experiencing.</label>
                </div>
              </td>
                  </tr>
                </table>
                <div class="row">
                  <div class="col-md-6 offset-md-6">
                    <button type="submit" class="btn btn-primary float-right" value="submit" name="submit">Submit</button>
                  </div>
                </div>
              </form>
            <p style="clear: both"></p>
          </div>
          <!-- /.tab-content -->
        </div><!-- /.card-body -->
      </div>
    <!-- /.card -->
