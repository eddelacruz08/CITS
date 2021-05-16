

  <!-- /.login-logo -->
  <div class="card card-outline">
    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          <center><h3>Patient need to take assessment.</h3></center>
          <hr>
          <center><p class="h3 mt-3"><u><?=ucfirst($profile[0]['first_name'].' '.$profile[0]['middle_name'].' '.$profile[0]['last_name'].' '.$profile[0]['extension'])?></u></p></center>
          <center><h6 class="mt-3">Please guide the patient!</h6></center>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <form action="<?= base_url() ?>checklists/<?= isset($rec) ? 'edit/'.$rec['visit_id'].'/'.$profile[0]['user_id'] : 'capture/'.$profile[0]['user_id'] ?>" method="post">
            <div class="row">
              <div class="form-group">
                <label class="control-label" for="status_defined"></label>
                  <input type="hidden" name="status_defined" value="a">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <center><button style="width: 100%;" type="submit" class="btn btn-warning">Okay </button></center>
              </div>
            </div>
          </form>
      <p style="clear: both"></p>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
