<br>
  <?php $uri = new \CodeIgniter\HTTP\URI(current_url()); ?>
  <div class="card bg-light ">
    <div class="card-body">
      <div class="row">
        <div class="col-md-2">
          <h2><?= $function_title; ?></h2>
        </div>
        <div class="col-md-3 offset-7">
          <button type="button" class="btn btn-danger float-right btn-md" name="button" data-toggle="modal" data-target="#guestsModal">
            <i class="fas fa-print"></i> Generate Guest List
          </button>
        </div>
      </div>
      <!-- modal -->
      <div class="modal fade" id="guestsModal">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Filter Data</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="<?=base_url(). 'guests/print'?>" method="post">
                      <div class="row">
                        <div class="col-md-12">
                          <label for="guest_type">Guest Type</label>
                          <div class="form-group">
                            <select name="guest_type_id" class="form-control <?= isset($errors['guest_type_id']) ? 'is-invalid':' ' ?>" required>
                              <option value="" disabled selected>Select Guest Type</option>
                                <?php foreach($guest_types as $guest_type): ?>
                                  <option value="<?= $guest_type['id'] ?>"><?= ucwords($guest_type['guest_type']) ?></option>
                                <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <label for="gender">Gender</label>
                          <div class="form-group">
                            <select name="gender_id" class="form-control <?= isset($errors['gender_id']) ? 'is-invalid':' ' ?>" required>
                              <option value="" disabled selected>Select Guest Type</option>
                                <?php foreach($genders as $gender): ?>
                                  <option value="<?= $gender['id'] ?>"><?= ucwords($gender['gender']) ?></option>
                                <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-success float-right"><i class="far fa-file-pdf"></i> Generate</button>
                  </form>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
      <br>
      <?php if(isset($_SESSION['success_request'])): ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
             <?= $_SESSION['success_request']; ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
      <?php endif; ?>
      <?php if(isset($_SESSION['error_request'])): ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
             <?= $_SESSION['error_request']; ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
        <?php endif; ?>
       <div class="table-responsive">
         <table class="table table-sm table-striped table-bordered index-table">
          <thead class="thead-dark">
            <tr class="text-center">
              <th>#</th>
              <th>Full Name</th>
              <th>Guest Type</th>
              <th>Gender</th>
              <th>Email</th>
              <!-- <th>Qr Code Form Link</th> -->
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
              <!-- <td>
                <form action="<?=base_url().'checklists/requests/'.$patient['token']?>" method="post">
                  <button type="submit" class="btn btn-info"><i class="fas fa-qrcode"></i> Generate Health Form Qr Code</button>
                </form>
              </td> -->
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
