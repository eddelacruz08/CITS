<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<br>
<div class="card bg-light ">
  <div class="card-body">
    <div class="row">
       <div class="col-md-4 mt-2">
        <h1> <?=$function_title?> </h1>
       </div>
       <div class="col-md-2 offset-md-6">
       </div>
     </div>
    <div class="row">
       <div class="col-md-4 mt-2">
        <!-- Export Data --> 
        <!-- <a type="button" class="btn btn-success" href='<?= base_url('users/exportData') ?>'>Export Users</a><br><br> -->
        <?php if(session()->has('message')){ ?>
          <div class="alert <?= session()->getFlashdata('alert-class') ?>">
            <?= session()->getFlashdata('message') ?>
          </div>
        <?php } ?>
          <!-- Display status message -->
          <?php if(!empty($success_msg)): ?>
          <div class="col-xs-12">
              <div class="alert alert-success"><?php echo $success_msg; ?></div>
          </div>
          <?php endif; ?>
          <?php if(!empty($error_msg)): ?>
          <div class="col-xs-12">
              <div class="alert alert-danger"><?php echo $error_msg; ?></div>
          </div>
          <?php endif; ?>
          <!-- <form action="<?= base_url('users/import-file'); ?>" method="post" enctype="multipart/form-data">
            <div class="input-group mb-3">
              <input class="form-control" type="file" name="file" required accept=".csv" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
              <button type="submit" class="btn btn-success" id="button-addon2" name="importSubmit">Import Users</button>
            </div>
          </form> -->
        </div>
        <!-- <div class="col-md-2 offset-md-6">
          <?php user_add_link('users', $_SESSION['userPermmissions']) ?>
        </div> -->
      </div>
    <br>
      <?php $uri = new \CodeIgniter\HTTP\URI(current_url()); ?>
     <div class="table-responsive">
       <table class="table table-sm table-striped table-bordered index-table">
        <thead class="thead-dark">
          <tr class="text-center">
            <th>#</th>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>User Role</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($users)): ?>
          <?php else: ?>
            <?php $cnt = 1; ?>
            <?php foreach($users as $user): ?>
            <tr class="text-center">
              <th scope="row"><?= $cnt++ ?></th>
              <td><?= $user['firstname'].' '.$user['lastname'] ?></td>
              <td><?= $user['username'] ?></td>
              <td><?= $user['email'] ?></td>
              <td><?= strtoupper($user['role_name']) ?></td>
              <td class="text-center">
               <?php
                  users_action('users', $_SESSION['userPermmissions'], $user['id']);
               ?>
              </td>
            </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
     </div>
    <!-- <div class="row">
      <div class="col-md-6 offset-md-6">
        <?php paginater('users', count($all_items), PERPAGE, $offset) ?>
      </div>
    </div> -->
  </div>
</div>
