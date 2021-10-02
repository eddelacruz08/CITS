<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="<?= base_url() ?>/public/img/LOGO.png" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url() ?>public/dist/css/adminlte.css">
    <link href="<?= base_url() ?>public/plugins/select2/css/select2.min.css"/>
    <link href="<?= base_url() ?>public/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"/>
    <link rel="stylesheet" href="<?= base_url() ?>public/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/font-awesome/css/all.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/css/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/css/style.css">
    <link href="<?= base_url() ?>public/plugins/chart.js/Chart.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>public/DataTables/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>public/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url() ?>public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <script type="text/javascript" src="<?= base_url() ?>public/font-awesome/js/all.min.js"></script>
    <link rel="stylesheet" href="<?= base_url() ?>public/css/ionicons.min.css">
    <script src="<?= base_url() ?>public/js/instascan.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>public/js/adapter.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>public/js/vue.min.js"></script>
    <link href="<?= base_url() ?>public/css/print.css" rel="stylesheet" media="print"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css" integrity="sha512-8vq2g5nHE062j3xor4XxPeZiPjmRDh6wlufQlfC6pdQ/9urJkU07NM0tEREeymP++NczacJ/Q59ul+/K2eYvcg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url() ?>public/plugins/summernote/summernote-bs4.min.css">

    <style>
      .ScrollStyle
      {
          max-height: 1000px;
          overflow-y: scroll;
      }
    </style>

    <style media="screen">
      @media print {
        .#print-btn{
          display:none;
        }
      }
      .wrapper {
        zoom: .9;
      }
    </style>

      <style media="screen">
      .box{
        display: none;
        margin-left: 25px;
      }
      .box label,.box input{
        margin-left: 25px;
      }

      .video{
        width: 200px;
        height: 200px;
        margin-left: 10px;
        margin-right: 10px;
        margin:0;
        padding:0;
      }
      .video1{
        width: 287px;
        height: 190px;
        margin-left: 10px;
        margin-right: 10px;
        margin:0;
        padding:0;
      }
      center{
        margin:0;
        padding:0;
      }
            
      .bell{
        display:block;
        font-size: 40px;
        margin:5px auto 0;
        color: #dc3545;
        -webkit-animation: ring 2s .7s ease-in-out infinite;
        -webkit-transform-origin: 50% 4px;
        -moz-animation: ring 2s .7s ease-in-out infinite;
        -moz-transform-origin: 50% 4px;
        animation: ring 2s .7s ease-in-out infinite;
        transform-origin: 50% 4px;
      }

      @-webkit-keyframes ring {
        0% { -webkit-transform: rotateZ(0); }
        1% { -webkit-transform: rotateZ(30deg); }
        3% { -webkit-transform: rotateZ(-28deg); }
        5% { -webkit-transform: rotateZ(34deg); }
        7% { -webkit-transform: rotateZ(-32deg); }
        9% { -webkit-transform: rotateZ(30deg); }
        11% { -webkit-transform: rotateZ(-28deg); }
        13% { -webkit-transform: rotateZ(26deg); }
        15% { -webkit-transform: rotateZ(-24deg); }
        17% { -webkit-transform: rotateZ(22deg); }
        19% { -webkit-transform: rotateZ(-20deg); }
        21% { -webkit-transform: rotateZ(18deg); }
        23% { -webkit-transform: rotateZ(-16deg); }
        25% { -webkit-transform: rotateZ(14deg); }
        27% { -webkit-transform: rotateZ(-12deg); }
        29% { -webkit-transform: rotateZ(10deg); }
        31% { -webkit-transform: rotateZ(-8deg); }
        33% { -webkit-transform: rotateZ(6deg); }
        35% { -webkit-transform: rotateZ(-4deg); }
        37% { -webkit-transform: rotateZ(2deg); }
        39% { -webkit-transform: rotateZ(-1deg); }
        41% { -webkit-transform: rotateZ(1deg); }

        43% { -webkit-transform: rotateZ(0); }
        100% { -webkit-transform: rotateZ(0); }
      }

      @-moz-keyframes ring {
        0% { -moz-transform: rotate(0); }
        1% { -moz-transform: rotate(30deg); }
        3% { -moz-transform: rotate(-28deg); }
        5% { -moz-transform: rotate(34deg); }
        7% { -moz-transform: rotate(-32deg); }
        9% { -moz-transform: rotate(30deg); }
        11% { -moz-transform: rotate(-28deg); }
        13% { -moz-transform: rotate(26deg); }
        15% { -moz-transform: rotate(-24deg); }
        17% { -moz-transform: rotate(22deg); }
        19% { -moz-transform: rotate(-20deg); }
        21% { -moz-transform: rotate(18deg); }
        23% { -moz-transform: rotate(-16deg); }
        25% { -moz-transform: rotate(14deg); }
        27% { -moz-transform: rotate(-12deg); }
        29% { -moz-transform: rotate(10deg); }
        31% { -moz-transform: rotate(-8deg); }
        33% { -moz-transform: rotate(6deg); }
        35% { -moz-transform: rotate(-4deg); }
        37% { -moz-transform: rotate(2deg); }
        39% { -moz-transform: rotate(-1deg); }
        41% { -moz-transform: rotate(1deg); }

        43% { -moz-transform: rotate(0); }
        100% { -moz-transform: rotate(0); }
      }

      @keyframes ring {
        0% { transform: rotate(0); }
        1% { transform: rotate(30deg); }
        3% { transform: rotate(-28deg); }
        5% { transform: rotate(34deg); }
        7% { transform: rotate(-32deg); }
        9% { transform: rotate(30deg); }
        11% { transform: rotate(-28deg); }
        13% { transform: rotate(26deg); }
        15% { transform: rotate(-24deg); }
        17% { transform: rotate(22deg); }
        19% { transform: rotate(-20deg); }
        21% { transform: rotate(18deg); }
        23% { transform: rotate(-16deg); }
        25% { transform: rotate(14deg); }
        27% { transform: rotate(-12deg); }
        29% { transform: rotate(10deg); }
        31% { transform: rotate(-8deg); }
        33% { transform: rotate(6deg); }
        35% { transform: rotate(-4deg); }
        37% { transform: rotate(2deg); }
        39% { transform: rotate(-1deg); }
        41% { transform: rotate(1deg); }

        43% { transform: rotate(0); }
        100% { transform: rotate(0); }
      }
    </style>
    <title><?= SYSTEM_NAME ?></title>
  </head>
  
  <?php if(esc($_SESSION['rid'])==2):?>
      <!-- Modal -->
      <div class="modal fade" id="myModalqr" role="dialog">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">
              <i class="fas fa-qrcode">&nbsp</i>
              My QR Code</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <script src="<?= base_url() ?>public/js/qrcode.js"></script>
              <center>
                <div id="qrcode"></div>
                <h6><?= $profiles[0]['token']?></h6>
                <h5><?= ucwords($profiles[0]['firstname'].' '.$profiles[0]['lastname'])?></h5>
                <button class="btn btn-outline-dark mt-2" onclick="downLoadCode();">Download QR code</button>
              </center>
              <script>
                  let qrcode = new QRCode("qrcode", {
                      text: "<?= $profiles[0]['token']?>",
                      width: 177,
                      height: 177,
                      colorDark : "#000000",
                      colorLight : "#ffffff",
                      correctLevel : QRCode.CorrectLevel.H
                  });
                  function downLoadCode(){
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
    </div>
  <?php endif;?>

<body class="hold-transition sidebar-mini layout-fixed hidePrint"style="background-color: #d9d9d9;">
  <div class="wrapper"style="background-color: #d9d9d9;">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button">
            <?php
              date_default_timezone_set('Asia/Manila');
              echo"<label>".date('F d, Y  h:i a')."</label>";
            ?>
          </a>
        </li>
      </ul>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user fa-fw"></i> Hi <?= ucwords($_SESSION['uname']) ?>!</a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?php echo base_url() ?>login/logout"><center><i class="fas fa-power-off"></i> Logout</center></a>
              </div>
          </li>
        </ul>
      </ul>
    </nav>
    <!-- /.navbar -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-navy bg-navy elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link" href="<?php $uri = new \CodeIgniter\HTTP\URI(current_url()); ?>">
      <img src="<?= base_url() ?>/public/img/LOGO.png" alt="PUP Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><?= SYSTEM_TITLE ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <?php user_primary_links_two($_SESSION['userPermmissions']) ?>
               <?php user_primary_links($_SESSION['userPermmissions']) ?>
        </ul>
        <?php if($_SESSION['rid']==2):?>
          <?php if(isset($_SESSION['latest_checklist_status_defined'])=="ws"):?>
            <ul class="nav nav-pills nav-sidebar flex-column"> 
              <li class="nav-item">
                <a class="nav-link swalDefaultError" type="button" title="Unable to get your Qr Code.">
                  <i class="fas fa-qrcode">&nbsp</i>
                  <p> My QR Code</p>
                </a>
              </li>
            </ul>
          <?php else:?>
            <ul class="nav nav-pills nav-sidebar flex-column"> 
              <li class="nav-item">
                <a class="nav-link" type="button" data-toggle="modal" data-target="#myModalqr">
                  <i class="fas fa-qrcode">&nbsp</i>
                  <p> My QR Code</p>
                </a>
              </li>
            </ul>
          <?php endif;?>
        <?php endif;?>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    <div class="sidebar-custom">
        <ul class="nav nav-pills nav-sidebar flex-column">
          <li class="nav-item">
            <a class="nav-link">
              <p>
                Logged in as:&nbsp
                <br>
                <span class="badge badge-danger" style="font-size: 13px;"><?= ucwords($_SESSION['uname']) ?></span>
              </p>
            </a>
          </li>
        </ul>
    </div>
    <!-- /.sidebar-custom -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"style="background-color: #d9d9d9;">
    <div class="container-fluid" style="background-color: #d9d9d9;">

