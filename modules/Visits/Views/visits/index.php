<br>
  <?php $uri = new \CodeIgniter\HTTP\URI(current_url()); ?>
    <div class="card card-primary card-outline">
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-12">
                <div class="info-box bg-navy">
                  <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-slash"></i></span>
                  <div class="info-box-content">
                    <?php foreach($deniedGuestPerDay as $deniedGuest):?>
                      <span class="info-box-number h1">
                        <?= $deniedGuest['totalDeniedGuests']; ?>
                        <span><button type="button" class="btn btn-outline-light float-right" data-toggle="modal" data-target="#deniedGuestModal">See all denied guest</button></span>
                      </span>
                    <?php endforeach;?>
                      <span class="info-box-text h5">Denied Guests of <?=date('F d, Y')?></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="deniedGuestModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Denied Guest List</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="table-responsive">
                      <table class="table table-sm table-striped table-bordered">
                        <thead class="thead-dark">
                          <tr class="text-center">
                            <th>#</th>
                            <th>Full Name</th>
                            <th>Gender</th>
                            <th>Guest Type</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php if($deniedGuestPerDay):?>
                            <tr class="text-center">
                              <td colspan="5">No data available.</td>
                            </tr>
                          <?php else: ?>
                            <?php $cnt = 1; ?>
                            <?php foreach($deniedGuestPerDay as $deniedGuest): ?>
                              <tr class="text-center">
                                <th scope="row"><?= $cnt++ ?></th>
                                <td><?= ucwords($deniedGuest['firstname'].' '.$deniedGuest['lastname']) ?></td>
                                <td><?= ucwords($deniedGuest['gender']) ?></td>
                                <td><?= ucwords($deniedGuest['guest_type']) ?></td>
                                <td><span class="badge badge-danger">System Denied</span></td>
                              </tr>
                            <?php endforeach; ?>
                          <?php endif; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Okay</button>
                  </div> -->
                </div>
              </div>
            </div>
            <!-- End Modal -->
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-clock"></i></span>
                  <div class="info-box-content">
                    <?php foreach($activeVisits as $activeVisit):?>
                      <span class="info-box-number h1 text-muted">
                      <?= $activeVisit['activeVisits']; ?>
                      </span>
                    <?php endforeach;?>
                    <span class="info-box-text">Active Visits of <?=date('F d, Y')?></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user-friends"></i></span>
                  <div class="info-box-content">
                    <?php foreach($totalVisitsPerDay as $totalVisit):?>
                      <span class="info-box-number h1 text-muted">
                        <?= $totalVisit['totalVisits']; ?>
                      </span>
                    <?php endforeach;?>
                    <span class="info-box-text">Total Visits of <?=date('F d, Y')?></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
                  <div class="info-box-content">
                    <?php foreach($totalVisits as $totalVisit):?>
                      <span class="info-box-number h1 text-muted">
                        <?= $totalVisit['totalVisits']; ?>
                      </span>
                    <?php endforeach;?>
                    <span class="info-box-text">Total Visits</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
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
                    <th>Duration</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $cnt = 1; ?>
                  <?php foreach($visits as $visit): ?>
                      <tr class="text-center">
                          <th scope="row"><?= $cnt++ ?></th>
                          <td><?= ucwords($visit['firstname'].' '.$visit['lastname']) ?></td>
                          <td><?= ucwords($visit['gender'])?></td>
                          <td><?= ucwords($visit['guest_type'])?></td>
                          <td><?= date('F d, Y h:i a', strtotime($visit['log_in']))?></td>
                          <?php if($visit['log_out']==null):?>
                            <td>NO DATA</td>
                            <td>NO DATA</td>
                          <?php else:?>
                            <td><?= date('F d, Y h:i a', strtotime($visit['log_out'])) ?></td>
                            <?php
                              $start = new \DateTime($visit['log_in']);
                              $end   = new \DateTime($visit['log_out']);
                              $interval = $end->diff($start);

                              $time = sprintf(
                                  '%d hrs %02d mins %02d secs',
                                  ($interval->d * 24) + $interval->h,
                                  $interval->i,
                                  $interval->s
                              );
                            ?>
                            <td width="15%"><?=$time;?></td>
                          <?php endif;?>
                          <td class="text-center">
                            <?php if($visit['log_out'] == null): ?>
                              <span class="badge badge-success">Active</span>
                            <?php else: ?>
                              <span class="badge badge-danger">Not active</span>
                            <?php endif; ?>
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
                    <th>Duration</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $cnt = 1; ?>
                  <?php foreach($visitsHistory as $visit): ?>
                  <tr class="text-center">
                    <th scope="row"><?= $cnt++ ?></th>
                    <td><?= ucwords($visit['firstname'].' '.$visit['lastname']) ?></td>
                    <td><?= ucwords($visit['gender'])?></td>
                    <td><?= ucwords($visit['guest_type'])?></td>
                    <td><?= date('F d, Y h:i a', strtotime($visit['log_in'])) ?></td>
                    <?php if($visit['log_out']==null):?>
                      <td>NO DATA</td>
                      <td>NO DATA</td>
                    <?php else:?>
                      <td><?= date('F d, Y h:i a', strtotime($visit['log_out'])) ?></td>
                      <?php
                        $start = new \DateTime($visit['log_in']);
                        $end   = new \DateTime($visit['log_out']);
                        $interval = $end->diff($start);

                        $time = sprintf(
                            '%d hrs %02d mins %02d secs',
                            ($interval->d * 24) + $interval->h,
                            $interval->i,
                            $interval->s
                        );
                      ?>
                      <td width="15%"><?=$time;?></td>
                    <?php endif;?>
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