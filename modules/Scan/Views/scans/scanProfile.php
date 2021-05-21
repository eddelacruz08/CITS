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
            <div class="col-md-5" id="container">
              <div class="card">
                <div class="card-body">
                  <center>
                    <h5 style="color: black;">QR Code Scanner <i class="fas fa-qrcode"></i></h5>
                  </center>
                    <video id="previewChecklist"></video>
                    <form action="<?= base_url() ?>scan/add-scan" id="myForm" method="post">
                      <div class="custom-control mt-2 text-center">
                        <div class="row">
                          <div class="col-md-1">
                            <label>ID:</label>
                          </div>
                          <div class="col-md-11">
                            <input class="form-control" type="text" value="<?=isset($value['identifier']) ? '': ''?>" id="identifier" name="identifier"> 
                          </div>
                        </div>
                      </div>
                      <div class="custom-control mt-2 text-center">
                        <button class="btn btn-success" type="submit">Login</button>
                      </div>
                    </form>
                    <div id="liveScanData"></div>
                </div>
              </div>
            </div>
          <div class="col-md-7">
          <div class="row">
            <div class="col-md-12">
              <?php if(isset($success_added2)): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <?= $success_added2; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
              <?php endif; ?>
              <?php if(isset($error_added2)): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <?= $error_added2; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
               </div>
             <?php endif; ?>
            </div>
          </div>
              <!-- Profile Image -->
              <div class="card card-primary card-outline">
              <?php if(!empty($profile)):?>
                <div class="card-body">
                  <div class="text-center">
                    <img class="img-fluid img-circle"  width="20%"
                         src="<?= base_url() ?>public/img/user.png"
                         alt="User profile picture">
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-6">
                      <p class="h5 float-right">Full Name: </p>
                    </div>
                    <div class="col-md-6">
                      <span><?= ucwords($profile[0]['firstname'].' '.$profile[0]['lastname'])?></span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <p class="h5 float-right">Gender: </p>
                    </div>
                    <div class="col-md-6">
                      <span><?= ucwords($profile[0]['gender'])?></span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <p class="h5 float-right">Guest Type: </p>
                    </div>
                    <div class="col-md-6">
                      <span><?= ucwords($profile[0]['guest_type'])?></span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <p class="h5 float-right">Age: </p>
                    </div>
                    <div class="col-md-6">
                      <span><?= date_diff(date_create($profile[0]['birthdate']), date_create(date('Y-m-d')))->format("%y") . ' year(s) old'?></span>
                    </div>
                  </div>
                  <ul class="list-group list-group-unbordered mb-3">
                  </ul>
                </div>
                <!-- /.card-body -->
                
              <?php else:?>
                <div class="card-body">
                  <div class="text-center">
                    <img class="img-fluid img-circle"  width="20%"
                         src="<?= base_url() ?>public/img/user.png"
                         alt="User profile picture">
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-6">
                      <p class="h5 float-right">Full Name: </p>
                    </div>
                    <div class="col-md-6">
                      <span>Unavailable</span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <p class="h5 float-right">Gender: </p>
                    </div>
                    <div class="col-md-6">
                      <span>Unavailable</span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <p class="h5 float-right">Guest Type: </p>
                    </div>
                    <div class="col-md-6">
                      <span>Unavailable</span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <p class="h5 float-right">Age: </p>
                    </div>
                    <div class="col-md-6">
                      <span>Unavailable</span>
                    </div>
                  </div>
                  <ul class="list-group list-group-unbordered mb-3">
                  </ul>
                </div>
                <!-- /.card-body -->
              <?php endif; ?>
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
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

      document.getElementById('identifier').value = parts[0];

    });
  </script>
  <script src="<?= base_url() ?>public/js/jquery.min.js"></script>
  <script src="<?= base_url() ?>public/js/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>/public/js/popper.min.js"></script>
  <script src="<?= base_url() ?>/public/dist/js/adminlte.min.js"></script>
  <script src="<?= base_url() ?>public/js/sweetalert2@9.js"></script>
  <script src="<?= base_url() ?>public/js/myAlerts.js"></script>
  <?= view('App\Views\theme\notification') ?>
</html>
