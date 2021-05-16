<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="<?= base_url() ?>/public/img/hds_logo_name.png" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url() ?>/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/dist/css/adminlte.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/font-awesome/css/all.css">
    <script src="<?= base_url() ?>public/js/instascan.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>public/js/adapter.min.js"></script>
    <style media="screen">
      #container{
        width: 100%;
        height: 100%;
      }
      #previewChecklist{
        margin: 0px auto;
        padding: 0px auto;
        width: 100%;
        height: 100%;
        background-color: #666;
      }
    </style>
    <title><?= SYSTEM_TITLE ?></title>
  </head>
  <?php $uri = new \CodeIgniter\HTTP\URI(current_url()); ?>
  <body class="hold-transition layout-top-nav bg-navy">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-dark bg-navy">
      <div class="container">
        <a class="navbar-brand">
          <img src="<?= base_url() ?>public/img/LOGO.png" alt="Profile Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light"><?= SYSTEM_NAME ?></span>
        </a>
        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
          <li class="nav-item">
            <a href="<?= base_url() ?>dashboard" class="nav-link text-white" >
              <i class="fas fa-arrow-left text-white"></i> Dashboard
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- /.navbar -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper navbar-navy">
      <br>
      <!-- Main content -->
      <section class="content text-dark">
        <div class="container-fluid">
          <div class="row">
            <?php if(isset($scan)):?>
            <div class="col-md-4">
              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                         src="<?= base_url() ?>public/img/LOGO.png"
                         alt="User profile picture">
                  </div>

                  <h3 class="profile-username text-center">Nina Mcintire</h3>

                  <p class="text-muted text-center">Software Engineer</p>

                  <ul class="list-group list-group-unbordered mb-3">
                  </ul>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          <?php else:?>
            <div class="col-md-4" id="container">
              <div class="card">
                <div class="card-body">
                  <center>
                    <h5 style="color: black;">QR Code Scanner <i class="fas fa-qrcode"></i></h5>
                  </center>
                    <video id="previewChecklist"></video>
                </div>
              </div>
            </div>
          <?php endif;?>
            <div class="col-md-8">
              <div class="card">
                <div class="card-body">
                  <form class="" action="<?= base_url() ?>scan/add-scan" method="post">
                    <div class="form-group mb-2">
                      <span>Body Temperature:</span>
                      <input type="text" class="form-control" name="full_name" id="full_name">
                    </div>
                    <div class="form-group mb-2">
                      <span>Assessment Form:</span>
                      <input type="text" class="form-control" name="full_name" id="full_name">
                    </div>
                    <div class="form-group mb-2">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </form>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
<!-- /.content-wrapper -->
  </div>
  <!-- ./wrapper -->
  <script type="text/javascript">
    let scanner = new Instascan.Scanner({ video: document.getElementById('previewChecklist') });

    scanner.addListener('scan', function (content) {
      console.log(content);
      var audio = new Audio('<?=base_url()?>public/js/scanner.mp3');
      audio.play();
      // if (document.getElementById("full_name").value !== "") {
      //   document.getElementById("myForm").submit();
      // }
    });
    Instascan.Camera.getCameras().then(function (cameras) {
      if (cameras.length > 0) {
        scanner.start(cameras[0]);
      } else {
        console.error('No cameras found.');
      }
    }).catch(function (e) {
      console.error(e);
    });

    scanner.addListener('scan', function(cont){
      var parts = cont.split(':');

      document.getElementById('id').value = parts[0];
      document.getElementById('user_id').value = parts[1];
      document.getElementById('full_name').value = parts[2];

    });
  </script>
  <script src="<?= base_url() ?>public/js/jquery.min.js"></script>
  <script type="text/javascript">
    var sounds = document.getElementsByTagName("audio");
    var muteBtn = document.getElementById("print-btn");

    muteBtn.onclick = function () {

    for (var i = 0; i < sounds.length; ++i) {

          sounds[i].muted = true;
      }

    }
  </script>
  <script src="<?= base_url() ?>public/js/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>/public/js/popper.min.js"></script>
  <script src="<?= base_url() ?>/public/dist/js/adminlte.min.js"></script>
  <script src="<?= base_url() ?>public/js/sweetalert2@9.js"></script>
  <script src="<?= base_url() ?>public/js/myAlerts.js"></script>
  <?= view('App\Views\theme\notification') ?>
</html>
