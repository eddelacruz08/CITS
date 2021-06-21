<br>
  <?php $uri = new \CodeIgniter\HTTP\URI(current_url()); ?>
    <div class="card card-primary card-outline card-outline-tabs">
      <div class="card-header p-0 border-bottom-0">
        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true"><?= $function_title?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="true"><?= $function_title_history?></a>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <div class="tab-content" id="custom-tabs-four-tabContent">
          <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
            <div class="row">
              <div class="col-md-6">
                <h2><?=$function_title?></h2>
              </div>
              <div class="col-md-6">
                  <button type="button" class="btn btn-danger float-right btn-md" name="button" data-toggle="modal" data-target="#visitsModal">
                    <i class="fas fa-print"></i> Generate Visit List
                  </button>
              </div>
            </div>
          <!-- modal -->
          <div class="modal fade" id="visitsModal">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Filter Data</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="<?=base_url()?>visits/print" method="post">
                      <div class="row">
                        <div class="col-md-12">
                          <label for="guest_type">Select Date</label>
                          <div class="form-group">
                            <select name="date" class="form-control" required>
                              <option disabled selected>Select Date</option>
                                <?php foreach($visitDate as $date): ?>
                                  <option value="<?= $date['date']?>"><?= date('F d, Y', strtotime($date['date'])) ?></option>
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
            <div class="table-responsive">
              <table class="table table-sm table-striped table-bordered index-table">
                <thead class="thead-dark">
                  <tr class="text-center">
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Gender</th>
                    <th>Guest Type</th>
                    <th>Login</th>
                    <th>Logout</th>
                    <th>Show Info</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $cnt = 1; ?>
                  <?php foreach($visits as $visit): ?>
                      <tr class="text-center">
                          <th scope="row"><?= $cnt++ ?></th>
                          <td><?= ucwords($visit['firstname'].' '.$visit['middlename'].' '.$visit['lastname'].' '.$visit['extension']) ?></td>
                          <td><?= ucwords($visit['gender'])?></td>
                          <td><?= ucwords($visit['guest_type'])?></td>
                          <td><?= date('F d, Y h:m a', strtotime($visit['log_in']))?></td>
                          <td><?= $visit['log_out'] == NULL ? 'Not Logout' : date('F d, Y h:m a', strtotime($visit['log_out']))?></td>
                          <td class="text-center">
                              <?php
                                  guest_detail_link('guests', 'show-guest', $_SESSION['userPermmissions'], $visit['user_id']);
                              ?>
                          </td>
                      </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
            <div class="row">
              <div class="col-md-6">
                <h2><?=$function_title_history?></h2>
              </div>
              <div class="col-md-6">
                  <button type="button" class="btn btn-danger float-right btn-md" name="button" data-toggle="modal" data-target="#visitsModal2">
                    <i class="fas fa-print"></i> Generate Visit List
                  </button>
              </div>
            </div>
          <!-- modal -->
          <div class="modal fade" id="visitsModal2">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Filter Data</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="<?=base_url()?>visits/print" method="post">
                      <div class="row">
                        <div class="col-md-12">
                          <label for="guest_type">Select Date</label>
                          <div class="form-group">
                            <select name="date" class="form-control" required>
                              <option disabled selected>Select Date</option>
                                <?php foreach($visitDate as $date): ?>
                                  <option value="<?= $date['date']?>"><?= date('F d, Y', strtotime($date['date'])) ?></option>
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
            <div class="table-responsive">
              <table class="table table-sm table-striped table-bordered index-table">
                <thead class="thead-dark">
                  <tr class="text-center">
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Gender</th>
                    <th>Guest Type</th>
                    <th>Login</th>
                    <th>Logout</th>
                    <th>Show Info</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $cnt = 1; ?>
                  <?php foreach($visitsHistory as $visit): ?>
                  <tr class="text-center">
                    <th scope="row"><?= $cnt++ ?></th>
                    <td><?= ucwords($visit['firstname'].' '.$visit['middlename'].' '.$visit['lastname'].' '.$visit['extension']) ?></td>
                    <td><?= ucwords($visit['gender'])?></td>
                    <td><?= ucwords($visit['guest_type'])?></td>
                    <td><?= date('F d, Y h:m a', strtotime($visit['log_in'])) ?></td>
                    <td><?= date('F d, Y h:m a', strtotime($visit['log_out'])) ?></td>
                    <td class="text-center">
                      <?php
                        guest_detail_link('guests', 'show-guest', $_SESSION['userPermmissions'], $visit['user_id']);
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
      <!-- /.card -->
    </div>
  </div>