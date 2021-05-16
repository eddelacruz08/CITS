
  <?php $uri = new \CodeIgniter\HTTP\URI(current_url()); ?>
  <div id="liveData"></div>

    <div class="row">
      <div class="col-md-12">
        <h1><?= $function_title_2?></h1>
      </div>
    </div>
    <div class="card bg-light ">
      <div class="card-body">
         <div class="table-responsive">
           <table class="table table-sm table-striped table-bordered">
            <thead class="thead-dark">
              <tr class="text-center">
                <th>#</th>
                <th>Full Name</th>
                <th>Guest Type</th>
                <th>Gender</th>
                <th>No. of Days</th>
                <th>Description</th>
                <th>Action</th>
                <th>End Session</th>
              </tr>
            </thead>
            <tbody>
              <?php $cnt = 1; ?>
              <?php foreach($guestsObservation as $patient): ?>
              <tr class="text-center">
                <th scope="row"><?= $cnt++ ?></th>
                <td><?= ucwords($patient['first_name'].' '.$patient['middle_name'].' '.$patient['last_name']) ?></td>
                <td><?= ucwords($patient['guest_type']) ?></td>
                <td><?= ucfirst($patient['gender']) ?></td>
                <td><?= ucfirst($patient['no_days']) ?></td>
                <td><?= ucfirst($patient['description']) ?></td>
                <td class="text-center">
                  <button type="button" class="btn btn-default btn-md"  style="border: solid 1px black;" name="button" data-toggle="modal" data-target="#modal-lg">
                    <span><i class="fas fa-bars"></i> Show Status</span>
                  </button>
                  <a href="#">
                    <button type="button" class="btn btn-default btn-md" style="border: solid 1px black;">
                      <i class="fas fa-file"></i> Confirmation Slip
                    </button>
                  </a>
                </td>
                <td class="text-center">
                  <a href="#">
                    <button type="button" class="btn btn-danger btn-sm" title="stop">
                      <i class="fas fa-stop"></i>
                    </button>
                  </a>
                </td>
                <!-- modal -->
                <div class="modal fade" id="modal-lg">
                      <div class="modal-dialog modal-md">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Patient Status</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p class="h5">Are you sure this patient is not defined for any sickness?</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default float-left" data-dismiss="modal" aria-label="Close">
                              Cancel
                            </button>
                          </div>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
         </div>
        </div>
     </div>
  <hr>
