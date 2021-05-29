
<br>
  <?php $uri = new \CodeIgniter\HTTP\URI(current_url()); ?>
  <div class="card bg-light ">
    <div class="card-body">
      <h2><?= $function_title?></h2>
      <hr>
       <div class="table-responsive">
         <div id="liveData">
         </div>
         <table class="table table-sm table-striped table-bordered index-table">
          <thead class="thead-dark">
            <tr class="text-center">
              <th>#</th>
              <th>Full Name</th>
              <th>Guest Type</th>
              <th>Gender</th>
              <th>System Response</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $cnt = 1; ?>
            <?php foreach($guests as $patient): ?>
            <tr class="text-center">
              <th scope="row"><?= $cnt++ ?></th>
              <td><?= ucwords($patient['firstname'].' '.$patient['middlename'].' '.$patient['lastname']) ?></td>
              <td><?= ucwords($patient['guest_type']) ?></td>
              <td><?= ucfirst($patient['gender']) ?></td>
              <td>Auto generated email was already sent for guidelines.</td>
              <td class="text-center">
                <a href="<?=base_url(). 'guest%20assessment/edit/' . $patient['user_id']?>">
                  <button type="button" class="btn btn-warning btn-md">
                    <i class="fas fa-clipboard-check text-dark"></i> Check Data
                  </button>
                </a>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
     </div>
    </div>
   </div>
<hr>
