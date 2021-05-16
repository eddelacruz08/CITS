
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="<?= base_url()?>" class="h3"><b><?= SYSTEM_NAME?></b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
      <?php if(isset($success_login_forgot)): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
           <?= $success_login_forgot ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
      <?php endif; ?>
      <?php if(isset($_SESSION['error_login_forgot_password'])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
           <?= $_SESSION['error_login_forgot_password']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
      <?php endif; ?>
      <form action="<?= base_url()?>Login/forgot_password" method="post">
        <div class="input-group mb-3">
          <input type="email" name="email" value="<?= isset($rec['email']) ? $rec['email'] : '' ?>" class="form-control <?= isset($errors['email']) ? 'is-invalid':' ' ?>" id="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          <?php if(isset($errors['email'])): ?>
            <div class="invalid-feedback">
              <?= $errors['email'] ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
