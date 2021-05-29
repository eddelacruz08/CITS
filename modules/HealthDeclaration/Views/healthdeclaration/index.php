
  <?php $uri = new \CodeIgniter\HTTP\URI(current_url()); ?>

       <div class="card card-primary card-outline">
         <div class="card-body box-profile">
           <div class="row">
             <div class="col-md-6">
               <center>
               <label>Latest Self-Assessment Status:
               <?php if (isset($latest_checklist_date[0]['status_defined']) == true):?>
                 <i class="fas fa-circle text-center text-danger"></i><a class="h6 text-danger"> Have Symtoms</a>
                 <hr style="margin: 0; padding: 0; border: solid 1px red;">
               <?php else:?>
                 <i class="fas fa-circle text-center text-success"></i><a class="h6 text-success"> No Symtoms</a>
                 <hr style="margin: 0; padding: 0; border: solid 1px green;">
               <?php endif;?>
               </label>
             </center>
             </div>
             <div class="col-md-6">
              <?php if(esc($latest_checklist_date[0]['date'])== date('Y-m-d')):?>
                  <?php if(isset($latest_checklist_date[0]['status_defined'])==false):?>
                    <center>
                      <a href="<?=base_url(). 'health%20declaration/captures/' . $_SESSION['uid']?>" class="text-white">
                          <button type="button" class="btn btn-default btn-md text-blue" style="border: 2px solid blue;">
                            <i class="fas fa-clipboard-check"></i>  Start to take Self-Assessment.
                          </button>
                      </a>
                    </center>
                  <?php else:?>
                      <center>
                      <a class="btn text-red btn-rounded" style="border: 2px solid red; padding: 5px;">
                            <i class="fas fa-exclamation-triangle"></i> Unavailable. Please try tommorrow.
                      </a>
                      </center>
                  <?php endif;?>
              <?php else:?>
                  <center>
                    <a href="<?=base_url(). 'health%20declaration/captures/' . $_SESSION['uid']?>" class="text-white">
                      <button type="button" class="btn btn-default btn-md text-blue" style="border: 2px solid blue;">
                        <i class="fas fa-clipboard-check"></i>  Start to take Self-Assessment.
                      </button>
                    </a>
                  </center>
              <?php endif;?>
             </div>
           </div>
         </div>
       </div>
       <div class="card card-primary card-outline">
         <div class="card-body box-profile">
            <h3 align="center">Self-Assessment History</h3>
          <div class="table-responsive">
          <table class="table table-sm table-striped table-bordered index-table">
            <thead class="thead-dark">
              <tr class="text-center">
                <th>#</th>
                <th>Date & Time | Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php $cnt = 1; ?>
            <?php foreach ($health_summary as $summary): ?>
              <tr class="text-center">
                <th scope="row"><?= $cnt++ ?></th>
                <td class="text-center">
                      <?php if ($summary['status_defined']=='ws'):?>
                        <?=date('F d, Y h:i a', strtotime($summary['created_date']))?> <label class="text-success"> |  No Symtoms</label>
                      <?php else:?>
                        <?=date('F d, Y h:i a', strtotime($summary['created_date']))?> <label class="text-danger"> |  Have Symtoms</label>
                      <?php endif;?>
                </td>
                <td class="text-center">
                  <a class="btn btn-link" type="button" data-toggle="modal" data-target="#myModal<?= $summary['id']?>">
                  <i class="fas fa-list"></i> See data...
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        </div>
      </div>
      
      <?php foreach ($health_summary as $summary): ?>
              <!-- Modal -->
              <div class="modal fade" id="myModal<?= $summary['id']?>" role="dialog">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title"><?= date('F d, Y h:i a', strtotime($summary['created_date']))?></h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                      <?php if ($summary['status_defined']=='ws'):?>
                        <p class="h4">No Symtoms</p>
                      <?php else:?>
                        <p class="h4">Have Symtoms</p>
                      <?php endif;?>
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
                              <td class="text-center"><?= strtoupper($summary['q_one'])?></td>
                            </tr>
                            <tr>
                              <td class="text-center"><?= $cnt++;?></td>
                              <td colspan="1"><?= $question['q_two']?></td>
                              <td class="text-center"><?= strtoupper($summary['q_two'])?></td>
                            </tr>
                            <tr>
                              <td class="text-center"><?= $cnt++;?></td>
                              <td colspan="1"><?= $question['q_three']?></td>
                              <td class="text-center"><?= strtoupper($summary['q_three'])?></td>
                            </tr>
                            <tr>
                              <td class="text-center"><?= $cnt++;?></td>
                              <td colspan="1"><?= $question['q_four']?></td>
                              <td class="text-center"><?= strtoupper($summary['q_four'])?></td>
                            </tr>
                            <tr>
                              <td class="text-center"><?= $cnt++;?></td>
                              <td colspan="1"><?= $question['q_five']?></td>
                              <td class="text-center"><?= strtoupper($summary['q_five'])?></td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
      
                <!-- ////////////////////////////// MODAL CHECKLIST ////////////////////////////////// -->
                <div id="myModal" class="modal fade">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h3 class="modal-title">Important Reminder</h3>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body">
                              <form>
                                <center>
                                  <p class="h5">This is a daily self-assessment. Please assess yourself before entry.</p>
                                  <hr>
                                  <a href="<?=base_url(). 'health%20declaration/captures/' . $_SESSION['uid']?>" class="text-white">
                                     <button type="button" class="btn btn-default btn-lg text-blue" style="border: 2px solid #007bff;">
                                       <i class="fas fa-clipboard-check"></i>  Start to take Self-Assessment.
                                     </button>
                                  </a>
                                </center>
                              </form>
                          </div>
                      </div>
                  </div>
                </div>
                <!-- ////////////////////////////// MODAL CHECKLIST ////////////////////////////////// -->
                <!-- ////////////////////////////// MODAL CHECKLIST ////////////////////////////////// -->
                <div id="myModalDefined" class="modal fade">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title">Important Reminder</h5>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body">
                              <form>
                                <center>
                                  <p class="h6">Your latest self-assessment tested positive for symtoms. Make sure you don't leave and stay at home. Please quarantine yourself so as not to infect other people with the symptoms experienced.</p>
                                  <hr>
                                  <p class="h6">Please take self-assessment for another day to clarify your status.</p>
                                </center>
                              </form>
                          </div>
                      </div>
                  </div>
                </div>
                <!-- ////////////////////////////// MODAL CHECKLIST ////////////////////////////////// -->