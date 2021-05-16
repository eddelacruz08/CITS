<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="<?= base_url() ?>/public/img/hds_logo_name.png" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url() ?>/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/dist/css/adminlte.css">
    <script type="text/javascript" src="<?= base_url()?>/public/font-awesome/js/all.min.js"></script>
    <title><?= SYSTEM_TITLE ?></title>
  </head>

<body class="hold-transition login-page">
    <br>
        <?php if (isset($function_title)): ?>
          <?php $data['function_title'] = $function_title ?>
          <?php echo view($viewName, $data); ?>
        <?php else: ?>
          <?php echo view($viewName); ?>
        <?php endif; ?>
  </body>
  <script src="<?= base_url() ?>/public/js/jquery.min.js"></script>
  <script src="<?= base_url() ?>/public/js/popper.min.js"></script>
  <script src="<?= base_url() ?>/public/js/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>/public/js/sweetalert2@9.js"></script>
  <script src="<?= base_url() ?>/public/js/myAlerts.js"></script>
  <?= view('App\Views\theme\notification') ?>
</html>
