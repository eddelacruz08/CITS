<?php if(isset($_SESSION['success_visit'])): ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= $_SESSION['success_visit']; ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php endif; ?>
<div class="card">
  <div class="card-header">
    <ul class="nav nav-pills">
      <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab"><i class="fas fa-clipboard-check"></i> Recent Checklist</a></li>
      <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab"><i class="fas fa-calendar-check"></i> Recent Visits</a></li>
      <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab"><i class="fas fa-history"></i> Health History Checklist</a></li>
    </ul>
  </div><!-- /.card-header -->
  <div class="card-body">
    <div class="tab-content">
      <div class="active tab-pane" id="activity">
        <!-- Post -->
        <?php if (empty($latest_checklist)): ?>
          <p class="card-text" style="font-style: italic;"><i class="fas fa-spinner"></i> None</p>
        <?php else: ?>
                <a href="<?=base_url().'guests/print/'. $profile[0]['id'] ?>"><button class="btn btn-link float-right" type="button" name="button"> <i class="fas fa-file-pdf text-red"></i> Download Recent Checklist PDF</button></a>
              
            <?php foreach ($latest_checklist as $health): ?>
              <div class="card-body">
                                     <form>
                                       <div class="row">
                                         <div class="col-md-12">
                                           <p class="h4">Defined Symtoms</p>
                                           <table>
                                             <tr>
                                               <td>
                                               <?php
                                                foreach($questions as $role){
                                                    $question_defined = substr($health['question_id'], 0, -1);
                                                    $question_def = explode(',',$question_defined);
                                                    if(in_array($role['id'], $question_def))
                                                    {
                                                      echo '<i class="fas fa-check text-success"></i>';
                                                    }
                                                    else
                                                    {
                                                      echo '<i class="fas fa-times"></i>';
                                                    }
                                                    echo ' '.$role['question'].'<br>';
                                                }
                                                ?>
                                               </td>
                                             </tr>
                                           </table>
                                         </div>
                                       </div>
                                     </form>
                                   </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <!-- /.post -->
      </div>
      <!-- /.tab-pane -->
      <div class="tab-pane" id="timeline">
          <?php if (empty($recent_visits)): ?>
            <p style="font-style: italic;"><i class="fas fa-spinner"></i> None</p>
          <?php else: ?>
            <table  style="width: 100%;">
              <?php foreach ($recent_visits as $recent_visit): ?>
                <tr style="border-bottom: 1px solid #ddd">
                  <td>
                    <span class="float-left"><?=date('F d, Y h:i a', strtotime($recent_visit['created_date']))?></span>
                  </td>
                </tr>
              <?php endforeach; ?>
            </table>
          <?php endif; ?>
      </div>
      <!-- /.tab-pane -->

      <div class="tab-pane" id="settings">
        <?php if (empty($health_summary)): ?>
          <p class="card-text" style="font-style: italic;"><i class="fas fa-spinner"></i> None</p>
        <?php else: ?>
          <div id="accordion">
            <?php foreach ($health_summary as $summary): ?>
              <div class="card">
                <div class="card-header" id="heading<?=$summary['id']?>">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse<?=$summary['id']?>" aria-expanded="false" aria-controls="collapse<?=$summary['id']?>">
                      <?=date('F d, Y h:i a', strtotime($summary['created_date']))?>
                    </button>
                    <!-- <button class="btn btn-link float-right" name="download" data-target="<?=$summary['id']?>" aria-expanded="true" aria-controls="<?=$summary['id']?>">
                    <a href="<?=base_url().'patients/print/'. $profile[0]['id'] ?>">  <i class="fas fa-file-pdf text-red"></i> Download PDF</a>
                    </button> -->
                  </h5>
                </div>
                <div id="collapse<?=$summary['id']?>" class="collapse" aria-labelledby="heading<?=$summary['id']?>" data-parent="#accordion">
                <div class="card-body">
                                     <form>
                                       <div class="row">
                                         <div class="col-md-12">
                                           <p class="h4">Defined Symtoms</p>
                                           <table>
                                             <tr>
                                               <td>
                                               <?php
                                                foreach($questions as $role){
                                                    $question_defined = substr($summary['question_id'], 0, -1);
                                                    $question_def = explode(',',$question_defined);
                                                    if(in_array($role['id'], $question_def))
                                                    {
                                                      echo '<i class="fas fa-check text-success"></i>';
                                                    }
                                                    else
                                                    {
                                                      echo '<i class="fas fa-times"></i>';
                                                    }
                                                    echo ' '.$role['question'].'<br>';
                                                }
                                                ?>
                                               </td>
                                             </tr>
                                           </table>
                                         </div>
                                       </div>
                                     </form>
                                   </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
      <!-- /.tab-pane -->
    </div>
    <!-- /.tab-content -->
  </div><!-- /.card-body -->
</div>
<!-- /.card -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
