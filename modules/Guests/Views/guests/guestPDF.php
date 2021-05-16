
<br><div class="card bg-light ">
          <div class="card-body">
              <form action="<?= base_url() ?>guests/print" method="post">
              <div class="row">
                <div class="col-md-12">
                  <label class="card-title"><h2><i class="far fa-file-pdf"></i> Generate Guest Data into PDF</h2></label>
                </div>
              </div>
              <div class="card bg-light ">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4">
                      <label for="start_date_filter">Start Date</label>
                      <div class="form-group">
                        <input type="date" class="form-control" name="start_date_filter" value="start_date_filter" id="start_date_filter">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label for="end_date_filter">End Date</label>
                      <div class="form-group">
                        <input type="date" class="form-control" name="end_date_filter" value="end_date_filter" id="end_date_filter">
                      </div>
                    </div>
                  </div>
                <div class="row">
                    <div class="col-md-4">
                      <label for="user_type">Guest Type</label>
                      <div class="form-group">
                        <select type="text" class="form-control"  name="user_type" value="user_type" id="user_type">
                          <option value="">None</option>
                          <option value="s">Student</option>
                          <option value="f">Faculty</option>
                          <option value="e">Employee</option>
                          <option value="o">Outsider</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label for="gender">Gender</label>
                      <div class="form-group">
                        <select type="text" class="form-control"  name="gender" value="gender" id="gender">
                          <option value="">None</option>
                          <option value="m">Male</option>
                          <option value="f">Female</option>
                        </select>
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <button type="submit" class="btn btn-success"><i class="far fa-file-pdf"></i> Generate Guest pdf</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            <div class="row">
              <div class="col-md-12">
              <table class="table table-sm table-striped table-bordered index-table">
               <thead class="thead-dark">
                 <tr class="text-center">
                   <th>#</th>
                   <th>Full Name</th>
                   <th>Patient Type</th>
                   <th>Gender</th>
                   <th>Contact no.</th>
                   <th>Date</th>
                 </tr>
               </thead>
               <tbody>
                 <?php $cnt = 1; ?>
                 <?php foreach($guests as $patient): ?>
                   <?php
                   if($patient['user_type'] == 's'){
                     $user_type = 'Student';
                   }
                   elseif($patient['user_type'] == 'f'){
                     $user_type = 'Faculty';
                   }
                   elseif($patient['user_type'] == 'e'){
                     $user_type = 'Employee';
                   }
                   elseif($patient['user_type'] == 'o'){
                     $user_type = 'Outsider';
                   }else{
                     $user_type = 'Nothing';
                   }
                   ?>
                 <tr class="text-center">
                   <th scope="row"><?= $cnt++ ?></th>
                   <td><?= ucwords($patient['first_name'].' '.$patient['middle_name'].' '.$patient['last_name'].' '.$patient['ext_name']) ?></td>
                   <td><?= $user_type ?></td>
                   <td><?= ucfirst($patient['gender'] == 'm' ? 'Male': 'Female') ?></td>
                   <td><?= ucwords($patient['cellphone_no']) ?></td>
                   <td><?= date('F d, Y', strtotime($patient['date'])) ?></td>
                 </tr>
                 <?php endforeach; ?>
               </tbody>
             </table>
            </div>
          </form>
        </div>
      </div>
      </div>
