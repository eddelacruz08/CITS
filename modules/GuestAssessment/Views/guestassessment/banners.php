
<br>
  <?php $uri = new \CodeIgniter\HTTP\URI(current_url()); ?>
  <div class="row">
    <div class="col-md-12">
      <h1><?= $function_title?></h1>
    </div>
  </div>
  <div class="card bg-light ">
    <div class="card-body">
       <div class="table-responsive">
         <div id="liveData">
         </div>
         <table class="table table-sm table-striped table-bordered">
          <thead class="thead-dark">
            <tr class="text-center">
              <th>#</th>
              <th>Full Name</th>
              <th>Guest Type</th>
              <th>Gender</th>
              <th>Guest Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $cnt = 1; ?>
            <?php foreach($guests as $patient): ?>
              <?php
                if($patient['guest_status']=='a'){
                  $guest_status = '<span class="badge badge-success">Active</span>';
                }else{
                  $guest_status = '<span class="badge badge-danger">Inctive</span>';
                }
              ?>
            <tr class="text-center">
              <th scope="row"><?= $cnt++ ?></th>
              <td><?= ucwords($patient['first_name'].' '.$patient['middle_name'].' '.$patient['last_name']) ?></td>
              <td><?= ucwords($patient['guest_type']) ?></td>
              <td><?= ucfirst($patient['gender']) ?></td>
              <td><?= $guest_status; ?></td>
              <td class="text-center">
                <a href="<?=base_url(). 'guest%20assessment/edit/' . $patient['guest_id']?>">
                  <button type="button" class="btn btn-warning btn-md">
                    <i class="fas fa-clipboard-check text-dark"></i>  Assessment
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
