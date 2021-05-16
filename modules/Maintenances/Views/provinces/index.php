
<br>
  <?php $uri = new \CodeIgniter\HTTP\URI(current_url()); ?>
  <div class="row">
    <div class="col-md-6">
      <div class="card bg-light ">
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <h5><?= $function_title_active?></h5>
            </div>
            <div class="col-md-6">
              <?php maintenance_detail_add_link('provinces', $_SESSION['userPermmissions']) ?>
            </div>
          </div>
          <br>
           <div class="table-responsive">
             <table class="table table-sm table-striped table-bordered index-table">
              <thead class="thead-dark">
                <tr class="text-center">
                  <th>#</th>
                  <th>Provinces</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $cnt = 1; ?>
                <?php foreach($provinceActive as $province): ?>
                <tr class="text-center">
                  <th scope="row"><?= $cnt++ ?></th>
                  <td><?= $province['province'] ?></td>

                  <td class="text-center">
                    <?php
                      maintenance_action('provinces', $_SESSION['userPermmissions'], $province['id']);
                    ?>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
           </div>
          </div>
       </div>
    </div>
    <div class="col-md-6">
      <div class="card bg-light ">
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <h5><?= $function_title_inactive?></h5>
            </div>
            <div class="col-md-3 offset-3">
            </div>
          </div>
          <br>
           <div class="table-responsive">
             <table class="table table-sm table-striped table-bordered index-table">
              <thead class="thead-dark">
                <tr class="text-center">
                  <th>#</th>
                  <th>Provinces</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $cnt = 1; ?>
                <?php foreach($provinceInactive as $province): ?>
                <tr class="text-center">
                  <th scope="row"><?= $cnt++ ?></th>
                  <td><?= $province['province'] ?></td>

                  <td class="text-center">
                    <?php
                      maintenance_action('provinces', $_SESSION['userPermmissions'], $province['id']);
                    ?>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
           </div>
          </div>
       </div>
    </div>
  </div>
