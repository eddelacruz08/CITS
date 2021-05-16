
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
              <?php maintenance_detail_add_link('types', $_SESSION['userPermmissions']) ?>
            </div>
          </div>
          <br>
           <div class="table-responsive">
             <table class="table table-sm table-striped table-bordered index-table">
              <thead class="thead-dark">
                <tr class="text-center">
                  <th>#</th>
                  <th>Guest Type</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $cnt = 1; ?>
                <?php foreach($typeActive as $type): ?>
                <tr class="text-center">
                  <th scope="row"><?= $cnt++ ?></th>
                  <td><?= $type['guest_type'] ?></td>

                  <td class="text-center">
                    <?php
                      maintenance_action('types', $_SESSION['userPermmissions'], $type['id']);
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
                  <th>Guest Type</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $cnt = 1; ?>
                <?php foreach($typeInactive as $type): ?>
                <tr class="text-center">
                  <th scope="row"><?= $cnt++ ?></th>
                  <td><?= $type['guest_type'] ?></td>

                  <td class="text-center">
                    <?php
                      maintenance_action('types', $_SESSION['userPermmissions'], $type['id']);
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
