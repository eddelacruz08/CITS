<?php $uri = new \CodeIgniter\HTTP\URI(current_url()); ?>
  <body class="container" style="background-color: #e9ecef;">
    <br>
    <div class="card qrcodedisplay card-outline card-primary">
      <div class="card-header text-center">
        <a href="<?php $uri = new \CodeIgniter\HTTP\URI(current_url()); ?>" class="h4"><b><?= SYSTEM_NAME ?></b></a>
      </div>
      <div class="card-body">
        <center><p class="h4">My Qr Code</p></center>
        <?php if(isset($_SESSION['success_request'])): ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $_SESSION['success_request']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>
        <?php if(isset($_SESSION['error'])): ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $_SESSION['error']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>
        <?php $ctr = 1;?>
        <?php if($_SESSION['unavailable'] == true): ?>
          <div class="callout callout-danger">
              <h5 class="text-danger"><i class="fas fa-info"></i> Reminder:</h5>
              <p class="h6"><?=$_SESSION['unvailableQrcode'];?></p>
              <center>
                <a href="<?=base_url('health-declaration-form/requesthealthform')?>" class="btn btn-primary text-white btn-md mt-2"><i class="fas fa-arrow-left"></i> Return to the form</a>
              </center>
          </div>
        <?php else: ?>
          <?php if(isset($error)): ?>
            <div class="alert alert-danger text-center"><?= $error;?></div>
          <?php else: ?>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
            <script src="<?= base_url() ?>public/js/qrcode.js"></script>
          <div class="callout callout-success">
            <center>
              <h4><?= ucwords($_SESSION['firstname'].' '.$_SESSION['lastname'])?></h4>
              <div id="qrcode"></div>
              <h4><?= $_SESSION['yourQrcode']?></h4>
              <a href="<?=base_url('health-declaration-form/requesthealthform')?>" class="btn btn-primary text-white btn-md mt-2"><i class="fas fa-arrow-left"></i> Return to the form</a>
            </center>
          </div>
            <script>
                let qrcode = new QRCode("qrcode", {
                    text: "<?= $_SESSION['yourQrcode']?>",
                    width: 277,
                    height: 277,
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
          <?php endif; ?>
        <?php endif; ?>
      </div>
      <!-- /.form-box -->
    </div>
    <!-- /.card -->
  </body>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
