
<br>
  <?php $uri = new \CodeIgniter\HTTP\URI(current_url()); ?>
  <div class="row">
    <div class="col-md-12">
      <div class="card bg-light ">
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <?php foreach($guidelinesActive as $guideline): ?>
                <h4><?= $function_title_active?></h4>
                <p><?= $guideline['content'] ?></p>
                <?php maintenance_action('guidelines', $_SESSION['userPermmissions'], $guideline['id']); ?>
              <?php endforeach; ?>
            </div>
          </div>
       </div>
    </div>
  </div>
