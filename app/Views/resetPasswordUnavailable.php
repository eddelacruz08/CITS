
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
      <p class="login-box-msg"><?= $error;?></p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
