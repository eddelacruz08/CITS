<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= $function_title; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url('dashboard')?>">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="<?=base_url('guests')?>">Guests</a></li>
              <li class="breadcrumb-item active">Generate Qr Code</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<div class="card">
    <div class="card-body">
        <script src="<?= base_url() ?>public/js/qrcode.js"></script>
        <center>
            <div id="qrcode"></div>
            <h4><?= $_SESSION['request_qrcode'];?></h4>
        </center>
        <script>
            let qrcode = new QRCode("qrcode", {
                text: "<?= $_SESSION['request_qrcode'];?>",
                width: 450,
                height: 450,
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
                            