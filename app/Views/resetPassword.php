
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="<?= base_url()?>" class="h3"><b><?= SYSTEM_NAME?></b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Reset Password</p>
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
      <?php if(isset($error)): ?>
        <div class="alert alert-danger text-center"><?= $error;?></div>
      <?php else: ?>
      <form action="<?= base_url().'Login/reset_password/'.$token?>" method="post">
        <div class="mb-3">
            <p class="h4 text-center"><?= ucwords($dataUser) ?></p>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" value="<?= isset($rec['password']) ? $rec['password'] : '' ?>" class="form-control <?= isset($errors['password']) ? 'is-invalid':' ' ?>" id="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <?php if(isset($errors['password'])): ?>
            <div class="invalid-feedback">
              <?= $errors['password'] ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password_retype" value="<?= isset($rec['password_retype']) ? $rec['password_retype'] : '' ?>" class="form-control <?= isset($errors['password_retype']) ? 'is-invalid':' ' ?>" id="password_retype" placeholder="Retype Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <?php if(isset($errors['password_retype'])): ?>
            <div class="invalid-feedback">
              <?= $errors['password_retype'] ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Change password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="<?= base_url()?>">Login</a>
      </p>
      <?php endif; ?>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
