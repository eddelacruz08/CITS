
<br>
  <?php $uri = new \CodeIgniter\HTTP\URI(current_url()); ?>

  <div class="row">
    <div class="col-md-12">
      <h1><?= $function_title?></h1>
    </div>
  </div>
  <div class="card bg-light ">
    <div class="card-body">
      <div class="row">
        <div class="col-md-2">
          <!-- <?php user_add_link('guests', $_SESSION['userPermmissions']) ?> -->
        </div>
        <div class="col-md-3 offset-7">
          <?php guests_print('guests', $_SESSION['userPermmissions']) ?>
        </div>
      </div>
      <br>
       <div class="table-responsive">
         <table class="table table-sm table-striped table-bordered index-table">
          <thead class="thead-dark">
            <tr class="text-center">
              <th>#</th>
              <th>Full Name</th>
              <th>Guest Type</th>
              <th>Gender</th>
              <th>Email</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $cnt = 1; ?>
            <?php foreach($users as $patient): ?>
            <tr class="text-center">
              <th scope="row"><?= $cnt++ ?></th>
              <td><?= ucwords($patient['firstname'].' '.$patient['middlename'].' '.$patient['lastname'].' '.$patient['extension']) ?></td>
              <td><?= ucwords($patient['guest_type']) ?></td>
              <td><?= ucfirst($patient['gender']) ?></td>
              <td><?= $patient['email'] ?></td>
              <td class="text-center">
                <?php
                  users_action('guests', $_SESSION['userPermmissions'], $patient['id']);
                ?>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
       </div>
      </div>
   </div>
<hr>
