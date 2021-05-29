
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          <center><h4>Health Declaration Form</h4><h5>Self-Assessment<h5></center>
        </div>
      </div>
      <hr>
        <div class="row">
          <div class="col-md-12">
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
            <form id="myForm" action="<?= base_url() ?>health%20declaration/<?='captures/'.$profile[0]['id']?>" method="post">
              <?php foreach ($questions as $question):?>
              <p class="h6">1. <?=$question['q_one']?></p>
              <?php if (isset($errors['q_one'])): ?>
                <div class="text-danger">
                  <?= $errors['q_one']?>
                </div>
              <?php endif; ?>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="q_one" id="yes1" value="yes">
                <label class="form-check-label" for="yes1">
                  Yes
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="q_one" id="no1" value="no">
                <label class="form-check-label" for="no1">
                 No
                </label>
              </div>
              <p class="h6">2. <?=$question['q_two']?></p>
              <?php if (isset($errors['q_two'])): ?>
                <div class="text-danger">
                  <?= $errors['q_two']?>
                </div>
              <?php endif; ?>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="q_two" id="yes2" value="yes">
                <label class="form-check-label" for="yes2">
                  Yes
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="q_two" id="no2" value="no">
                <label class="form-check-label" for="no2">
                 No
                </label>
              </div>
              <p class="h6">3. <?=$question['q_three']?></p>
              <?php if (isset($errors['q_three'])): ?>
                <div class="text-danger">
                  <?= $errors['q_three']?>
                </div>
              <?php endif; ?>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="q_three" id="yes3" value="yes">
                <label class="form-check-label" for="yes3">
                  Yes
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="q_three" id="no3" value="no">
                <label class="form-check-label" for="no3">
                 No
                </label>
              </div>
              <p class="h6">4. <?=$question['q_four']?></p>
              <?php if (isset($errors['q_four'])): ?>
                <div class="text-danger">
                  <?= $errors['q_four']?>
                </div>
              <?php endif; ?>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="q_four" id="yes4" value="yes">
                <label class="form-check-label" for="yes4">
                  Yes
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="q_four" id="no4" value="no">
                <label class="form-check-label" for="no4">
                 No
                </label>
              </div>
              <p class="h6">5. <?=$question['q_five']?></p>
              <?php if (isset($errors['q_five'])): ?>
                <div class="text-danger">
                  <?= $errors['q_five']?>
                </div>
              <?php endif; ?>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="q_five" id="yes5" value="yes">
                <label class="form-check-label" for="yes5">
                  Yes
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="q_five" id="no5" value="no">
                <label class="form-check-label" for="no5">
                 No
                </label>
              </div>
              <?php endforeach;?>
                <hr>
                <h6 class="panel-title">NOTE: Rest assured that all information will be treated in utmost confidentiality.</h6>
                <p>(Makatitiyak ka na ang lahat ng impormasyon ay magiging kompidensiyal.)</p>
                <hr>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                  <label class="form-check-label" for="invalidCheck">
                    Agree to terms and conditions
                  </label>
                  <div class="invalid-feedback">
                    You must agree before submitting.
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-6 offset-md-6">
                  <input class="btn btn-primary float-right" type="submit" value="Submit">
                  </div>
                </div>
              </form>
            <p style="clear: both"></p>
          </div>
          <!-- /.tab-content -->
        </div><!-- /.card-body -->
      </div>
    <!-- /.card -->

  <!-- <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                 <h3 id="myModalLabel3">Confirmation Heading</h3>

            </div>
            <div class="modal-body">
                <p>Are You Sure You want To submit The Form</p>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close This Modal</button>
                <button class="btn-primary btn" id="SubForm">Confirm and Submit The Form</button>
            </div>
        </div>
    </div>
</div> -->

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
//   $("#myForm").validate({
//     // rules: {
//     //   agree: "required",
//     //   question: "required",
//     // },
//     // messages: {},
//     submitHandler: function (form) {
//         $("#myModal").modal('show');
//         $('#SubForm').click(function () {
//             form.submit();
//        });
//     }
//   });
//   $('#myForm').on('submit', function(e) {
  
//   e.preventDefault(); //stop submit
  
//   if ($('#myCheck').is(':checked')) {
//   //Check if checkbox is checked then show modal
//     $('#myModal').modal('show');
//   }
// });
  var checkboxes = $(".the_checkbox");
  checkboxes.on('click',checkStatus);
  function checkStatus() {
    if($(checkboxes).is(':checked'))
    {
      $(".selectAll").prop('disabled', true);
    }else{
      $(".selectAll").prop('disabled', false);
    }        
  }
  var checkboxes2 = $(".selectAll");
  checkboxes2.on('click',checkStatus2);
  function checkStatus2() {
    if($(checkboxes2).is(':checked'))
    {
      $(".the_checkbox").prop('disabled', true);
    }else{
      $(".the_checkbox").prop('disabled', false);
    }        
  }
</script>