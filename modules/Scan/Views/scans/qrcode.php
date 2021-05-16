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
    <!-- <script type="text/javascript" src="<?= base_url() ?>public/js/vue.min.js"></script> -->
    <style media="screen">
    .buttun {
          background-color: #004A7F;
          -webkit-border-radius: 10px;
          border-radius: 10px;
          border: none;
          color: #FFFFFF;
          cursor: pointer;
          display: inline-block;
          font-family: Arial;
          font-size: 20px;
          padding: 5px 10px;
          text-align: center;
          text-decoration: none;
          -webkit-animation: glowing 1500ms infinite;
          -moz-animation: glowing 1500ms infinite;
          -o-animation: glowing 1500ms infinite;
          animation: glowing 1500ms infinite;
          }
          @-webkit-keyframes glowing {
          0% { background-color: #B20000; -webkit-box-shadow: 0 0 3px #B20000; }
          50% { background-color: #FF0000; -webkit-box-shadow: 0 0 40px #FF0000; }
          100% { background-color: #B20000; -webkit-box-shadow: 0 0 3px #B20000; }
          }

          @-moz-keyframes glowing {
          0% { background-color: #B20000; -moz-box-shadow: 0 0 3px #B20000; }
          50% { background-color: #FF0000; -moz-box-shadow: 0 0 40px #FF0000; }
          100% { background-color: #B20000; -moz-box-shadow: 0 0 3px #B20000; }
          }

          @-o-keyframes glowing {
          0% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
          50% { background-color: #FF0000; box-shadow: 0 0 40px #FF0000; }
          100% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
          }

          @keyframes glowing {
          0% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
          50% { background-color: #FF0000; box-shadow: 0 0 40px #FF0000; }
          100% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
          }
    </style>
    <style media="screen">
    /* body {
      zoom: .9;
    } */
    .box{
          display: none;
          margin-left: 25px;
      }
    .box label,.box input{
          margin-left: 25px;
      }
      #container{
        /* margin: 0px auto; */
      	width: 100%;
      	height: 100%;
      	/* border: 10px #333 solid; */
        /* width: 370px;
        height: 200px; */
      }
      #previewChecklist{
        margin: 0px auto;
        padding: 0px auto;
        width: 100%;
      	height: 100%;
      	background-color: #666;
        /* width: 370px;
        height: 200px; */
      }

    </style>
    <title><?= SYSTEM_TITLE ?></title>
  </head>
	<body class="bg-navy" style="margin: 0; padding: 0;">
      <?php $uri = new \CodeIgniter\HTTP\URI(current_url()); ?>
      <h2 class="text-center font-weight-bold my-4"><?= SYSTEM_NAME ?></h2>
      <div class="row" style="margin: 0; padding: 0;">
        <div class="col-md-6">
          <a href="<?= base_url()?>dashboard">
              <button type="button" class="btn btn-default" name="button">
              <i class="fas fa-arrow-left"></i> Dashboard</button>
          </a>
        </div>
        <div class="col-md-6">
            <?php foreach ($guest_defined as $students_wow){
              $students_count_wow = $students_wow['count_guest_define'];
            }
            ?>
            <?php if(!empty($students_count_wow)):?>
            <button type="button" id="print-btn" class="btn btn-default btn-lg float-right buttun" style="border: 0; background-color: lightgray;" data-toggle="modal" data-target="#modal-lg">
            <i class="fas fa-bell"> </i> Patient Detected <span class="badge badge-danger" style="font-size: 15px;"> <?= $students_count_wow?></span>
              <audio id="audio" src="<?= base_url()?>public/js/notification.mp3" autoplay></audio>
            </button>
            <?php else:?>
              <button type="button" id="print-btn" class="btn btn-lg float-right noPrint" style="background-color: white; border: 1px solid gray;" data-toggle="modal" data-target="#modal-lg">
                <i class="fas fa-bell"> </i>  Patient Detected <span class="badge badge-success" style="font-size: 15px;"> <?= $students_count_wow?></span>
              </button>
            <?php endif;?>
        </div>
      </div>

      <!-- modal -->
      <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Defined Patient</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <table align="center" class="table table-sm">
                    <thead>
                      <tr style="color: black; font-size: 20px;" class="text-center">
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Body Temperature</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $ctr = 1;?>
                      <?php foreach ($guest_definedAt as $guest_status_list): ?>
                        <?php
                        if($guest_status_list['status_defined'] == 'd'){
                          $status_defined = 'Defined';
                        }
                        elseif($guest_status_list['status_defined'] == 'u'){
                          $status_defined = 'Undefined';
                        }else{
                          $status_defined = 'Nothing';
                        }
                        ?>
                      <tr class="text-center" id="<?php echo $guest_status_list['id']; ?>">
                        <th style="color: black; font-size: 20px;" scope="row"><?= $ctr++ ?></th>
                        <td style="color: black; font-size: 20px;"><?= ucwords($guest_status_list['first_name'].' '.$guest_status_list['middle_name'].' '.$guest_status_list['last_name']) ?></td>
                        <td style="color: red; font-size: 20px;">
                          <?= $guest_status_list['temperature']?> ℃
                        </td>
                        <td style="color: black; font-size: 20px;">
                          <?= $status_defined ?>
                        </td>
                        <td>
                          <?php users_action('checklists', $_SESSION['userPermmissions'], $guest_status_list['visit_id'], $guest_status_list['patient_id']); ?>
                      </tr>
                    <?php endforeach;?>
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->

              <div class="row" style="margin: 0; padding: 0;">
                <div class="col-md-12 mt-2">
                  <div class="card bg-light ">
                    <div class="card-body">
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
                          <?php if(isset($reminder_added2)): ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                               <?= $reminder_added2; ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                          <?php endif; ?>
                        </div>
                      </div>

                      <div class="row">
                        <div id="card" class="col-md-8 mt-2">
                            <form action="<?= base_url() ?>scan/add-scan" id="myForm" method="post">
                                <div class="row">
                                      <div class="form-group col-md-12 ">
                                          <h5>Please present your body temperature and QR Code.</h5>
                                          <div class="row">
                                            <div class="col-md-12 mt-2">
                                              <div id="temperatureShow"></div>
                                            </div>
                                          </div>
                                            <div class="row">
                                              <div class="col-md-6 mt-2">
                                                <span>Full Name:</span>
                                                <input type="text" readonly class="form-control" value="" name="full_name" id="full_name">
                                              </div>
                                              <div class="col-md-6 mt-2">
                                                <span>Body Temperature:</span>
                                                <input type="text" class="form-control" name="temperature" id="temperature" placeholder="Please input your body temperature . . . ">
                                              </div>
                                            </div>
                                              <input hidden style="width: 100%;" name="id" value="" id="id">
                                              <input type="text" hidden class="form-control" readonly="" value="" name="user_id" id="user_id">
                                              <input type="text" hidden class="form-control" readonly="" value="" name="full_name" id="full_name">
                                              <!-- <input type="text" hidden class="form-control" readonly="" name="status_defined" id="status_defined"> -->
                                              <br>
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <button id="clickButton" type="submit" class="btn btn-primary float-right" value="submit" name="submit">Submit</button>
                                                </div>
                                              </div>
                                            </div>
                                            <?php if (isset($errors['temperature'])): ?>
                                              <div class="text-danger">
                                                <?= $errors['temperature']?>
                                              </div>
                                            <?php endif; ?>
                                    </div>
                                </form>
                          </div>
                      <div class="col-md-4" id="container">
                        <!-- <div class="card bg-dark ">
                          <div class="card-body"> -->
                            <center>
                              <h5 style="color: black;">QR Code Scanner <i class="fas fa-qrcode"></i></h5>
                            </center>
                              <video id="previewChecklist"></video>
                          <!-- </div>
                        </div> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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

  </body>
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
  <!-- <script src="<?= base_url() ?>/public/js/jquery-3.4.1.min.js"></script> -->
  <script src="<?= base_url() ?>/public/js/popper.min.js"></script>
  <!-- <script src="<?= base_url() ?>/public/js/bootstrap.min.js"></script> -->
  <script src="<?= base_url() ?>public/js/sweetalert2@9.js"></script>
  <script src="<?= base_url() ?>public/js/myAlerts.js"></script>
  <?= view('App\Views\theme\notification') ?>
</html>
