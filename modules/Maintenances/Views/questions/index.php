
<br>
  <?php $uri = new \CodeIgniter\HTTP\URI(current_url()); ?>
  <div class="row">
    <div class="col-md-12">
      <div class="card bg-light ">
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <h4><?= $function_title_active?></h4>
            </div>
            <div class="col-md-6">
              <!-- <?php maintenance_detail_add_link('questions', $_SESSION['userPermmissions']) ?> -->
            </div>
          </div>
          <br>
          <?php $ctr=1; ?>
          <?php foreach($questionActive as $question): ?>
          <div class="card">
            <div class="card-body h6">
              <div class="card">
                <div class="card-body h6">
                  <span style="font-weight: bold;">Question <?=$ctr++;?>:</span>
                  <span><?= $question['q_one'] ?></span> <br>
                </div>
              </div>
              <div class="card">
                <div class="card-body h6">
                  <span style="font-weight: bold;">Question <?=$ctr++;?>:</span>
                  <span><?= $question['q_one'] ?></span> <br>
                </div>
              </div>
              <div class="card">
                <div class="card-body h6">
                  <span style="font-weight: bold;">Question <?=$ctr++;?>:</span>
                  <span><?= $question['q_three'] ?></span> <br>
                </div>
              </div>
              <div class="card">
                <div class="card-body h6">
                  <span style="font-weight: bold;">Question <?=$ctr++;?>:</span>
                  <span><?= $question['q_four'] ?></span> <br>
                </div>
              </div>
              <div class="card">
                <div class="card-body h6">
                  <span style="font-weight: bold;">Question <?=$ctr++;?>:</span>
                  <span><?= $question['q_five'] ?></span> <br>
                </div>
              </div>
                <p>
                  <?php
                    maintenance_action('questions', $_SESSION['userPermmissions'], $question['id']);
                  ?>
                </p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
