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
  <body class="hold-transition layout-top-nav bg-navy">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-dark bg-navy">
      <div class="container">
        <a class="navbar-brand" href="<?php $uri = new \CodeIgniter\HTTP\URI(current_url()); ?>">
          <img src="<?= base_url() ?>public/img/LOGO.png" alt="Profile Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light"><?= SYSTEM_NAME ?></span>
        </a>
        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
          <li class="nav-item">
            <a class="btn btn-outline-success" type="button" data-toggle="modal" data-target="#qrcodeRegistrationForm">
              <i class="fas fa-qrcode"></i> Registration Form Link
            </a>
          </li>&nbsp&nbsp
          <li class="nav-item">
            <a class="btn btn-outline-success" type="button" data-toggle="modal" data-target="#qrcodeForm">
              <i class="fas fa-qrcode"></i> Reason Health Form Link
            </a>
          </li>&nbsp&nbsp
          <li class="nav-item">
            <a href="<?= base_url() ?>visits" class="btn btn-outline-info" type="button" >
              <i class="fas fa-list"></i> Visit List
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- /.navbar -->
    <!-- Modal -->
    <div class="modal fade" id="qrcodeForm" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title text-dark">
              <i class="fas fa-qrcode">&nbsp</i>
              Reason Health Form Link</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <script src="<?= base_url() ?>public/js/qrcode.js"></script>
              <center>
                  <div id="qrcode"></div>
                  <a href="<?= base_url('health-declaration-form/requesthealthform')?>" class="btn btn-link text-dark"><?= base_url('health-declaration-form/requesthealthform')?></a>
                  <br>
                  <button class="btn btn-outline-dark mt-2" onclick="downLoadCodeForm();">Download QR Code as Image</button>
                  <a href="<?= base_url()?>scan/print-pdf/<?='requesthealthform'?>" class="btn btn-outline-danger mt-2">Print Qr Code PDF</a>
              </center>
              <script>
                  let qrcode = new QRCode("qrcode", {
                      text: "<?= base_url('health-declaration-form/requesthealthform')?>",
                      width: 350,
                      height: 350,
                      colorDark : "#000000",
                      colorLight : "#ffffff",
                      correctLevel : QRCode.CorrectLevel.H
                  });
                  function downLoadCodeForm(){
                      var img = $('#qrcode').children('img').attr("src");
                      var alink = document.createElement("a");
                      alink.href = img;
                      alink.download = "<?= date('F d, Y h:i:s')?>"+".png";
                      alink.click();
                  }
              </script>
            </div>
          </div>
        </div>
      </div>
      <!-- end modal -->
      <!-- Modal -->
    <div class="modal fade" id="qrcodeRegistrationForm" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title text-dark">
              <i class="fas fa-qrcode">&nbsp</i>
              Registration Form Link</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <script src="<?= base_url() ?>public/js/qrcode.js"></script>
              <center>
                  <div id="qrcodeRegister"></div>
                  <a href="<?= base_url('login/register')?>" class="btn btn-link text-dark"><?= base_url('login/register')?></a>
                  <br>
                  <button class="btn btn-outline-dark mt-2" onclick="downLoadCodeRegister();">Download QR Code as Image</button>
                  <a href="<?= base_url()?>scan/print-pdf/<?='register'?>" class="btn btn-outline-danger mt-2">Print Qr Code PDF</a>
              </center>
              <script>
                  let qrcodeRegister = new QRCode("qrcodeRegister", {
                      text: "<?= base_url('login/register')?>",
                      width: 350,
                      height: 350,
                      colorDark : "#000000",
                      colorLight : "#ffffff",
                      correctLevel : QRCode.CorrectLevel.H
                  });
                  function downLoadCodeRegister(){
                      var img = $('#qrcodeRegister').children('img').attr("src");
                      var alink = document.createElement("a");
                      alink.href = img;
                      alink.download = "<?= date('F d, Y h:i:s')?>"+".png";
                      alink.click();
                  }
              </script>
            </div>
          </div>
        </div>
      </div>
      <!-- end modal -->
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
                    <h5 style="color: black;">QR Code Scanner <i class="fas fa-qrcode"></i> <span id="remain"></span></h5>
                  </center>
                    <video id="previewChecklist"></video>
                    <form action="<?= base_url() ?>scan" id="search-form" method="post">
                      <div class="custom-control mt-2 text-center">
                        <div class="row">
                          <div class="col-md-1">
                            <label>ID:</label>
                          </div>
                          <div class="col-md-11">
                            <input readonly class="form-control <?= isset($errors['identifier']) ? 'is-invalid':'is-valid' ?> tokenId" type="text" id="identifier" onChange="this.form.submit()" name="identifier"> 
                          </div>
                        </div>
                      </div>
                      <div hidden class="custom-control mt-2 text-center">
                        <input type="submit" class="btn btn-success"  name="search-btn" id="search-btn" value="Enter">
                        <!-- <button type="submit">Enter</button> -->
                      </div>
                    </form>
                </div>
              </div>
            </div>
        <div class="col-md-7">
          <div class="row">
            <div class="col-md-12">
              <?php if(isset($success_added2) == true): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <?= $success_added2; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
              <?php elseif(isset($error_added2) == true): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <?= $error_added2; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
              <?php else: ?>
              <?php endif; ?>
            </div>
          </div>
              <!-- Profile Image -->
              <div class="card card-primary card-outline">
              <?php if(!empty($profile)):?>
                <!-- load info scan -->
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
                    <div class="row">
                      <div class="col-md-6">
                        <p class="h5 float-right">Status: </p>
                      </div>
                      <div class="col-md-6">
                        <?=$status;?>
                      </div>
                    </div>
                  </ul>
                  </div>
                <!-- load info scan -->
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
                    <div class="row">
                      <div class="col-md-6">
                        <p class="h5 float-right">Status: </p>
                      </div>
                      <div class="col-md-6">
                        <span>Unavailable</span>
                      </div>
                    </div>
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
      // alert(parts[0]);
      document.getElementById('identifier').value = parts[0];
      $("#search-form").submit();

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
