  <body class="container" style="background-color: #e9ecef;">
    <br>
    <div class="card requesthealthform card-outline card-primary">
      <div class="card-header text-center">
        <img src="<?= base_url() ?>/public/img/LOGO_dark.png" alt="" width="50px">&nbsp
        <a href="<?php $uri = new \CodeIgniter\HTTP\URI(current_url()); ?>" class="h5">
          <b><?= SYSTEM_NAME ?></b>
        </a>
      </div>
      <div class="card-body">
        <center><h4 class="mb-3">Health Declaration Form</h4></center>
        <?php if(isset($_SESSION['success_request'])): ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $_SESSION['success_request']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>
        <?php if(isset($_SESSION['error'])): ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $_SESSION['error']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>
        <?php $ctr = 1;?>
        <?php if(isset($error)): ?>
          <div class="alert alert-danger text-center"><?= $error;?></div>
        <?php else: ?>
          <?php foreach ($questions as $question):?>
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
          <form id="myForm" action="<?= base_url().'health-declaration-form/requesthealthform'?>" method="post">
              <div class="card">
                <div class="card-body">
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox" id="chkShowHide" onclick="ShowHideDiv(this)">
                      <label for="chkShowHide" class="custom-control-label">
                        I hereby certify that all information is true and complete. I understand that my failure to answer, or any false or misleading information given by me may be used as a ground for my serious consequence.<span class="text-danger h5"> *</span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div id="ShowHide" style="display: none">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-6">
                        <label for="email">Email<span class="text-danger h5"> *</span></label>
                        <input type="email" class="form-control" name="email" placeholder="Email">
                        <?php if (isset($errors['email'])): ?>
                          <div class="text-danger">
                            <?= $errors['email']?>
                          </div>
                        <?php endif; ?>
                      </div>
                      <div class="col-6">
                        <label for="form_id">Select Health Declaration Form.<span class="text-danger h5"> *</span></label>
                        <select type="text" class="form-select" name="form_id" id="form_id" required>
                          <option selected disabled>-- Select Form --</option>
                          <option value="1">Take Health Declaration</option>
                          <option value="2">Request Invalidation Health Declaration</option>
                        </select>
                        <?php if (isset($errors['form_id'])): ?>
                          <div class="text-danger">
                            <?= $errors['form_id']?>
                          </div>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-10">
                        <label class="h6">1. <?=$question['q_one']?><span class="text-danger h5"> *</span></label>
                        <?php if (isset($errors['r_q_one'])): ?>
                          <div class="text-danger">
                            <?= $errors['r_q_one']?>
                          </div>
                        <?php endif; ?>
                      </div>
                      <div class="col-2">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="r_q_one" id="yes1" value="yes">
                          <label class="form-check-label" for="yes1">
                            Yes
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="r_q_one" id="no1" value="no">
                          <label class="form-check-label" for="no1">
                          No
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-10">
                        <label class="h6">2. <?=$question['q_two']?><span class="text-danger h5"> *</span></label>
                        <?php if (isset($errors['r_q_two'])): ?>
                          <div class="text-danger">
                            <?= $errors['r_q_two']?>
                          </div>
                        <?php endif; ?>
                      </div>
                      <div class="col-2">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="r_q_two" id="yes2" value="yes">
                          <label class="form-check-label" for="yes2">
                            Yes
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="r_q_two" id="no2" value="no">
                          <label class="form-check-label" for="no2">
                          No
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-10">
                        <label class="h6">3. <?=$question['q_three']?><span class="text-danger h5"> *</span></label>
                        <?php if (isset($errors['r_q_three'])): ?>
                          <div class="text-danger">
                            <?= $errors['r_q_three']?>
                          </div>
                        <?php endif; ?>
                      </div>
                      <div class="col-2">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="r_q_three" id="yes3" value="yes">
                          <label class="form-check-label" for="yes3">
                            Yes
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="r_q_three" id="no3" value="no">
                          <label class="form-check-label" for="no3">
                          No
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-10">
                        <label class="h6">4. <?=$question['q_four']?><span class="text-danger h5"> *</span></label>
                        <?php if (isset($errors['r_q_four'])): ?>
                          <div class="text-danger">
                            <?= $errors['r_q_four']?>
                          </div>
                        <?php endif; ?>
                      </div>
                      <div class="col-2">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="r_q_four" id="yes4" value="yes">
                          <label class="form-check-label" for="yes4">
                            Yes
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="r_q_four" id="no4" value="no">
                          <label class="form-check-label" for="no4">
                          No
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-10">
                        <label class="h6">5. <?=$question['q_five']?><span class="text-danger h5"> *</span></label>
                        <?php if (isset($errors['r_q_five'])): ?>
                          <div class="text-danger">
                            <?= $errors['r_q_five']?>
                          </div>
                        <?php endif; ?>
                      </div>
                      <div class="col-2">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="r_q_five" id="yes5" value="yes">
                          <label class="form-check-label" for="yes5">
                            Yes
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="r_q_five" id="no5" value="no">
                          <label class="form-check-label" for="no5">
                          No
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 offset-md-6">
                    <input class="btn btn-primary float-right" type="button" data-toggle="modal" data-target="#myModalConfirmation" value="Submit" onclick=" checkButton()">
                    
                    <!-- Modal   -->
                    <div id="myModalConfirmation" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                              <div class="modal-header">
                                <h5 id="myModalLabel3">Please Confirm Your Details.</h5>
                                <button type="button" class="float-right close" data-dismiss="modal">&times;</button>
                              </div>
                              <div class="modal-body">
                                  <p class="h6"><?= $ctr++;?>. <?=$question['q_one']?></p>
                                  <p class="h6" id="q_one" style= "color:green"> </p>
                                  <p class="h6"><?= $ctr++;?>. <?=$question['q_two']?></p>
                                  <p class="h6" id="q_two" style= "color:green"> </p>
                                  <p class="h6"><?= $ctr++;?>. <?=$question['q_three']?></p>
                                  <p class="h6" id="q_three" style= "color:green"> </p>
                                  <p class="h6"><?= $ctr++;?>. <?=$question['q_four']?></p>
                                  <p class="h6" id="q_four" style= "color:green"> </p>
                                  <p class="h6"><?= $ctr++;?>. <?=$question['q_five']?></p>
                                  <p class="h6" id="q_five" style= "color:green"> </p>
                                  <input class="btn btn-primary float-right" id="btnSubmit" type="submit" value="Submit">
                              </div>
                          </div>
                      </div>
                    </div>
                    <!-- end modal -->
                  </div>
                </div>
              </div>
          </form>
          <p style="clear: both"></p>
            <?php endforeach;?>
        <?php endif; ?>
      </div>
      <!-- /.form-box -->
    </div>
    <!-- /.card -->
  </body>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script type="text/javascript">
    function ShowHideDiv(chkShowHide) {
        var ShowHide = document.getElementById("ShowHide");
        ShowHide.style.display = chkShowHide.checked ? "block" : "none";
    }
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#myForm").submit(function (e) {
            //disable the submit button
            alert('Please wait...');
            document.getElementById('btnSubmit').innerHTML = 'Loading...';
            $("#btnSubmit").attr("disabled", true);
            return true;
        });
    });
</script>
<script>
  function checkButton() {  
    if(document.getElementById('yes1').checked) { 
      document.getElementById("q_one").innerHTML 
        = document.getElementById("yes1").value; 
      } else if(document.getElementById('no1').checked) { 
        document.getElementById("q_one").innerHTML 
          = document.getElementById("no1").value;   
      } else { 
        document.getElementById("q_one").innerHTML 
          = "<span class='text-danger'>Please answer this question number one.</span>"; 
      }
    if(document.getElementById('yes2').checked) { 
      document.getElementById("q_two").innerHTML 
        = document.getElementById("yes2").value; 
      } else if(document.getElementById('no2').checked) { 
        document.getElementById("q_two").innerHTML 
          = document.getElementById("no2").value;   
      } else { 
        document.getElementById("q_two").innerHTML 
          = "<span class='text-danger'>Please answer this question number two.</span>"; 
      } 
    if(document.getElementById('yes3').checked) { 
      document.getElementById("q_three").innerHTML 
        = document.getElementById("yes3").value; 
      } else if(document.getElementById('no3').checked) { 
        document.getElementById("q_three").innerHTML 
          = document.getElementById("no3").value;   
      } else { 
        document.getElementById("q_three").innerHTML 
          = "<span class='text-danger'>Please answer this question number three.</span>"; 
      } 
    if(document.getElementById('yes4').checked) { 
      document.getElementById("q_four").innerHTML 
        = document.getElementById("yes4").value; 
      } else if(document.getElementById('no4').checked) { 
        document.getElementById("q_four").innerHTML 
          = document.getElementById("no4").value;   
      } else { 
        document.getElementById("q_four").innerHTML 
          = "<span class='text-danger'>Please answer this question number four.</span>"; 
      } 
    if(document.getElementById('yes5').checked) { 
      document.getElementById("q_five").innerHTML 
        = document.getElementById("yes5").value; 
      } else if(document.getElementById('no5').checked) { 
        document.getElementById("q_five").innerHTML 
          = document.getElementById("no5").value;   
      } else { 
        document.getElementById("q_five").innerHTML 
          = "<span class='text-danger'>Please answer this question number five.</span>"; 
      } 
    } 
    </script> 