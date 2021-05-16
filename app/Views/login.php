
  <body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="<?= base_url() ?>" class="h3"><b><?= SYSTEM_NAME ?></b></a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <?php if(isset($_SESSION['error_login'])): ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
             <?= $_SESSION['error_login']; ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
        <?php endif; ?>
        <?php if(isset($success_login_forgot)): ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
             <?= $success_login_forgot; ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
        <?php endif; ?>
        <form action="<?= base_url() ?>" method="post">
          <label for="inputUsername">Username</label>
          <div class="input-group mb-2">
            <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <label for="inputPassword">Password</label>
          <div class="input-group mb-2">
            <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <p class="mb-1">
          <a href="<?= base_url() ?>Login/forgot_password">I forgot my password</a>
        </p>
        <p class="mb-0">
          <a href="<?= base_url() ?>Login/register" class="text-center">Register a new membership</a>
        </p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->
