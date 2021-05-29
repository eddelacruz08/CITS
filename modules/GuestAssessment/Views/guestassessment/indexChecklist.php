
<br>
  <?php $uri = new \CodeIgniter\HTTP\URI(current_url()); ?>

    <div class="card bg-light ">
      <div class="card-body">
      <div class="row">
        <div class="col-md-12 text-center">
          <h3><?= $function_title?></h3>
        </div>
      </div>
      <div class="card-body">
        <div class="tab-content">
          <div class="active tab-pane" id="activity">
            <!-- Post -->
            <?php if (empty($latest_checklist)): ?>
              <p class="card-text text-center" style="font-style: italic;"><i class="fas fa-spinner"></i> None</p>
            <?php else: ?>
              <?php foreach ($latest_checklist as $health): ?>
                  <div class="row">
                    <div class="col-md-6">
                      <label for="">Full Name: </label>
                      <p class="h5" STYLE="text-transform:uppercase"><?= ucwords($health['firstname'].' '.$health['middlename'].' '.$health['lastname']) ?></p>
                    </div>
                    <div class="col-md-6">
                      <a class="h5 btn btn-link btn-lg float-right" type="button" href="<?=base_url(). 'guest%20assessment/pdf/'.$health['user_id']?>"><i class="fas fa-download"></i> Print latest assessment</a>
                    </div>
                  </div>
              <hr>
              <form>
                      <table class="table">
                        <thead class="thead-dark">
                          <tr class="text-center">
                            <th>No. </th>
                            <th>Questions</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php $cnt = 1; ?>
                          <?php foreach ($questions as $question): ?>
                            <tr>
                              <td class="text-center"><?= $cnt++;?></td>
                              <td colspan="1"><?= $question['q_one']?></td>
                              <td class="text-center"><?= strtoupper($health['q_one'])?></td>
                            </tr>
                            <tr>
                              <td class="text-center"><?= $cnt++;?></td>
                              <td colspan="1"><?= $question['q_two']?></td>
                              <td class="text-center"><?= strtoupper($health['q_two'])?></td>
                            </tr>
                            <tr>
                              <td class="text-center"><?= $cnt++;?></td>
                              <td colspan="1"><?= $question['q_three']?></td>
                              <td class="text-center"><?= strtoupper($health['q_three'])?></td>
                            </tr>
                            <tr>
                              <td class="text-center"><?= $cnt++;?></td>
                              <td colspan="1"><?= $question['q_four']?></td>
                              <td class="text-center"><?= strtoupper($health['q_four'])?></td>
                            </tr>
                            <tr>
                              <td class="text-center"><?= $cnt++;?></td>
                              <td colspan="1"><?= $question['q_five']?></td>
                              <td class="text-center"><?= strtoupper($health['q_five'])?></td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
              </form>
              <?php endforeach; ?>
            <?php endif; ?>
            <!-- /.post -->
          </div>
        </div>
      </div>
    </div>
  </div>
