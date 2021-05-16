<br>
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <h2><?= $function_title?></h2>
          <a href="<?=base_url()?>visits/pdf" target="_blank">Download as PDF</a>
        </div>
        <div class="col-md-6">
            <button type="button" class="btn btn-danger float-right btn-md" name="button" data-toggle="modal" data-target="#modal-lg2">
              <i class="fas fa-print"></i> Generate Attendance List
            </button>
        </div>
      </div>

      <!-- modal -->
      <div class="modal fade" id="modal-lg2">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Filter Data</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="<?=base_url(). 'visits/print'?>" method="post">
                      <div class="row">
                        <div class="col-md-12">
                          <label for="date">Date</label>
                          <div class="form-group">
                            <input type="date" class="form-control" name="date" id="date">
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
      <?php $uri = new \CodeIgniter\HTTP\URI(current_url()); ?>
     <div class="table-responsive">
       <table class="table table-sm table-striped table-bordered index-table">
        <thead class="thead-dark">
          <tr class="text-center">
            <th>#</th>
            <th>Full Name</th>
            <th>Gender</th>
            <th>Guest Type</th>
            <th>Active Guest</th>
            <th>Show Info</th>
          </tr>
        </thead>
        <tbody align="center">
          <?php $cnt = 1; ?>
          <?php foreach($visits as $visit): ?>
          <tr id="<?php echo $visit['id']; ?>">
            <th scope="row"><?= $cnt++ ?></th>
            <td><?= ucwords($visit['firstname'].' '.$visit['middlename'].' '.$visit['lastname'].' '.$visit['extension']) ?></td>
            <td><?= $visit['gender']?></td>
            <td><?= $visit['guest_type']?></td>
            <td><?= date('F d, Y h:m a', strtotime($visit['log_in'])) ?> <?=$visit['log_out'] == '' ? ' - Active': ' - ' . date('F d, Y h:m a', strtotime($visit['log_out']))?></td>
            <td class="text-center">
              <?php
                guest_detail_link('guests', 'show-guest', $_SESSION['userPermmissions'], $visit['patient_id']);
              ?>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
     </div>
   </div>
  </div>
