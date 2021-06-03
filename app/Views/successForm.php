
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
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
