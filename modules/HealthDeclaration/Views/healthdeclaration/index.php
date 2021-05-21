
  <?php $uri = new \CodeIgniter\HTTP\URI(current_url()); ?>

  <br>
       <div class="card card-primary card-outline">
         <div class="card-body box-profile">
           <div class="row">
             <div class="col-md-6">
               <center>
               <label>Latest Self-Assessment Status:
               <?php if ($latest_checklist_date[0]['status_defined'] == true):?>
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
               <center>
                 <a href="<?=base_url(). 'health%20declaration/captures/' . $_SESSION['uid']?>" class="text-white">
                    <button type="button" class="btn btn-default btn-md text-blue" style="border: 2px solid blue;">
                      <i class="fas fa-clipboard-check"></i>  Start to take Self-Assessment.
                    </button>
                 </a>
               </center>
             </div>
           </div>
         </div>
       </div>
  <div class="card card-primary card-outline">
                     <div class="card-body box-profile">
                       <h3 align="center">Self-Assessment History</h3>

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
                                      <?php if ($summary['question_id']=='none'):?>
                                        <?=date('F d, Y h:i a', strtotime($summary['created_date']))?> | <label class="text-success"> Negative for Symtoms</label>
                                      <?php else:?>
                                        <?=date('F d, Y h:i a', strtotime($summary['created_date']))?> | <label class="text-danger"> Positive for Symtoms</label>
                                      <?php endif;?>
                                     </button>
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
                   </div>
                 </div>