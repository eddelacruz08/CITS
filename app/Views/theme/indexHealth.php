<?= view('App\Views\theme\header') ?>
  <?php if ($_SESSION['rid'] == 2): ?>
    <br>
    <?php if (!empty($profile)): ?>
    <?php endif; ?>
    <?php if (isset($function_title)): ?>
      <?php $data['function_title'] = $function_title ?>
      <?php echo view($viewName, $data); ?>
    <?php else: ?>
      <?php echo view($viewName); ?>
    <?php endif; ?>
  <?php else: ?>
    	<link rel="stylesheet" href="<?= base_url() ?>public/css/debug.css">
    	<div class="container text-center">
    		<h1 class="headline">Whoops!</h1>
    		<p class="lead">This page is exclusive for users only! <i class="fas fa-smile"></i></p>
    	</div>
  <?php endif; ?>
  <?= view('App\Views\theme\footer') ?>
<?php if(isset($latest_checklist_date[0]['status_defined']) == true && isset($latest_checklist_date[0]['date']) == date('Y-m-d')): ?>
  <script>
  	$(document).ready(function(){
  		$("#myModalDefined").modal('show');
  	});
  </script>
<?php else: ?>
  <script>
    $(document).ready(function(){
      $("#myModalDefined").modal('hide');
    });
  </script>
<?php endif; ?>

<?php if(isset($latest_checklist_date[0]['date']) == date('Y-m-d')): ?>
  <script>
  	$(document).ready(function(){
  		$("#myModal").modal('hide');
  	});
  </script>
<?php else: ?>
  <script>
    $(document).ready(function(){
      $("#myModal").modal('show');
    });
  </script>
<?php endif; ?>
  <?= view('App\Views\theme\notification') ?>
