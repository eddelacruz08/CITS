
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          <center><h3>Health Declaration Form Qr Code</h3></center>
        </div>
      </div>
      <hr>
        <div class="row">
          <div class="col-md-12">
              <form action="<?= base_url() ?>checklists/<?='scan/'.$profile[0]['id']?>" method="post">
                  <div class="row">
                        <div class="form-group col-md-7 ">
                          <label for="temperature">Body Temperature</label>
                          <div class="input-group mb-3">
                            <input type="float" class="form-control" readonly name="temperature" value="<?php echo isset($_POST["temperature"]) ? $_POST["temperature"] : ''; ?>" id="temperature" placeholder="Enter your temperature">
                            <div class="input-group-append">
                              <span class="input-group-text"><b>℃</b></span>
                            </div>
                            <p><strong>Note:</strong> Please make the placed information is truthful.</p>
                          </div>

                            <label for="department">What buildings/offices/departments do you want to visit?</label>
                            <div class="input-group mb-3">
                              <input type="text" class="form-control select2" multiple="multiple" style="width: 100%;" readonly list="departments" name="department" id="department" placeholder="Select / Input your destination.">
                              <div class="input-group-append">
                                <span class="input-group-text"><b><i class="fas fa-location-arrow"></i></b></span>
                              </div>
                              <p><strong>Note:</strong> If you are not an ousider, please input any of the following. (e.g. Regular Student or Faculty or Employee) This is based on the fact that you are attending regularly.</p>

                            </div>
                          </div>
                        <div class="col-md-5">
                            <div class="card bg-dark ">
                              <div class="card-body">
                                <center>
                                  <h5>Qr Code Scanner <i class="fas fa-qrcode"></i></h5>
                                </center>
                                  <video class="video1" id="previewChecklist"></video>
                              </div>
                            </div>
                        </div>
                     </div>

                          <div class="panel-heading">
                               <h5 class="panel-title">1.  Are you experiencing: </h5>
                               <span>(Nakakaranas ka ba ng: )</span>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="form-group col-md-6">
                              <label for="">A. Fever > 38℃ (Lagnat)</label>
                              <div class="offset-1">
                                <input type="text" class="form-control" readonly="" name="one_a" value="<?php echo isset($_POST["one_a"]) ? $_POST["one_a"] : ''; ?>" id="one_a">
                                <div class="offset-1">
                                  <label>If yes, </label><span> date of onset: (Petsa ng simula:)</span>
                                  <input type="date" class="form-control" readonly="" name="one_a_date" value="<?php echo isset($_POST["one_a_date"]) ? $_POST["one_a_date"] : ''; ?>" id="one_a_date">
                                </div>
                              </div>
                            </div>
                            <div class="form-group col-md-6">
                                    <label for="">B. Cough and/or colds (Ubo at/ sipon)</label>
                                    <div class="offset-1">
                                      <input type="text" class="form-control" readonly="" name="one_b" value="<?php echo isset($_POST["one_b"]) ? $_POST["one_b"] : ''; ?>" id="one_b">
                                      <div class="offset-1">
                                        <label>If yes, </label><span> date of onset: (Petsa ng simula:)</span>
                                        <input type="date" class="form-control" readonly="" name="one_b_date" value="<?php echo isset($_POST["one_b_date"]) ? $_POST["one_b_date"] : ''; ?>" id="one_b_date">
                                      </div>
                                    </div>
                              </div>
                            <div class="form-group col-md-6">
                                    <label for="">C. Body pains (pananakit ng katawan)</label>
                                    <div class="offset-1">
                                      <input type="text" class="form-control" readonly="" name="one_c" value="<?php echo isset($_POST["one_c"]) ? $_POST["one_c"] : ''; ?>" id="one_c">
                                      <div class="offset-1">
                                        <label>If yes, </label><span> date of onset: (Petsa ng simula:)</span>
                                        <input type="date" class="form-control" readonly="" name="one_c_date" value="<?php echo isset($_POST["one_c_date"]) ? $_POST["one_c_date"] : ''; ?>" id="one_c_date">
                                      </div>
                                    </div>
                              </div>
                            <div class="form-group col-md-6">
                                    <label for="">D. Sore throat (pananakit ng lalamunan/hirap lumunok)</label>
                                    <div class="offset-1">
                                      <input type="text" class="form-control" readonly="" name="one_d" value="<?php echo isset($_POST["one_d"]) ? $_POST["one_d"] : ''; ?>" id="one_d">
                                      <div class="offset-1">
                                        <label>If yes, </label><span> date of onset: (Petsa ng simula:)</span>
                                        <input type="date" class="form-control" readonly="" name="one_d_date" value="<?php echo isset($_POST["one_d_date"]) ? $_POST["one_d_date"] : ''; ?>" id="one_d_date">
                                      </div>
                                    </div>
                              </div>
                            <div class="form-group col-md-6">
                                    <label for="">E. Shortness of breath (hirap sa paghinga)</label>
                                    <div class="offset-1">
                                      <input type="text" class="form-control" readonly="" name="one_e" value="<?php echo isset($_POST["one_e"]) ? $_POST["one_e"] : ''; ?>" id="one_e">
                                      <div class="offset-1">
                                        <label>If yes, </label><span> date of onset: (Petsa ng simula:)</span>
                                        <input type="date" class="form-control" readonly="" name="one_e_date" value="<?php echo isset($_POST["one_e_date"]) ? $_POST["one_e_date"] : ''; ?>" id="one_e_date">
                                      </div>
                                    </div>
                              </div>
                            <div class="form-group col-md-6">
                                    <label for="">F. Diarrhea (pagtatae)</label>
                                    <div class="offset-1">
                                      <input type="text" class="form-control" readonly="" name="one_f" value="<?php echo isset($_POST["one_f"]) ? $_POST["one_f"] : ''; ?>" id="one_f">
                                      <div class="offset-1">
                                        <label>If yes, </label><span> date of onset: (Petsa ng simula:)</span>
                                        <input type="date" class="form-control" readonly="" name="one_f_date" value="<?php echo isset($_POST["one_f_date"]) ? $_POST["one_f_date"] : ''; ?>" id="one_f_date">
                                      </div>
                                    </div>
                              </div>
                            </div>
                      <hr>
                          <div class="panel-heading">
                               <h5 class="panel-title">2. TRAVEL HISTORY</h5>
                          </div>
                          <hr>

                            <div class="form-group col-md-12">
                              <label for="">For the last 14 days, did you travel to a country or a place with high number of COVID-19 patients? </label>
                                <span> (Sa nakalipas na 14 araw, ikaw ba ay nagtungo sa ibang bansa or ibang lugar?)</span>
                                <div class="offset-1 col-md-10">
                                  <input type="text" class="form-control" readonly="" name="two_travel" value="<?php echo isset($_POST["two_travel"]) ? $_POST["two_travel"] : ''; ?>" id="two_travel">
                                  <div class="offset-1">
                                    <label>If yes, </label><span> COUNTRY, CITY, or PROVINCE:</span>
                                    <input type="text" class="form-control" readonly="" name="two_travel_address" value="<?php echo isset($_POST["two_travel_address"]) ? $_POST["two_travel_address"] : ''; ?>" id="two_travel_address">
                                  </div>
                                </div>
                            </div>
                          <hr>
                          <div class="panel-heading">
                            <h5 class="panel-title">3. Did you have any close contact or interaction with any of the following: </h5>
                            <span>(Ikaw ba ay direktang nakasalamuha o nakipag-ugnayan sa mga sumusunod: )</span>
                          </div>
                          <hr>

                            <div class="form-group col-md-12">
                              <label for="">•	Individuals providing direct care, and/or working with individuals infected with COVID-19, and/or visiting or staying in the same environment with COVID-19 patient?</label>
                                  <span> (Taong nag-alaga sa mga pasyenteng may COVID o nakasama ang isang taong may COVID sa isang lugar?)</span>
                                  <div class="offset-1 col-md-10">
                                    <input type="text" class="form-control" readonly="" name="three_contact_one" value="<?php echo isset($_POST["three_contact_one"]) ? $_POST["three_contact_one"] : ''; ?>" id="three_contact_one">
                                  </div>
                            </div>
                            <div class="form-group col-md-12">
                              <label for="">•	In close proximity or shared the same room with a COVID-19 patient?</label>
                              <span> (Taong direktang kasama ang isang pasyenteng may COVID sa isang silid.)</span>
                              <div class="offset-1 col-md-10">
                                <input type="text" class="form-control" readonly="" name="three_contact_two" value="<?php echo isset($_POST["three_contact_two"]) ? $_POST["three_contact_two"] : ''; ?>" id="three_contact_two">
                              </div>
                            </div>
                            <div class="form-group col-md-12">
                              <label for="">•	Travelled together with COVID-19 patient?</label>
                              <span> (Naglakbay kasama ang may COVID.)</span>
                              <div class="offset-1 col-md-10">
                                <input type="text" class="form-control" readonly="" name="three_contact_three" value="<?php echo isset($_POST["three_contact_three"]) ? $_POST["three_contact_three"] : ''; ?>" id="three_contact_three">
                              </div>
                            </div>
                            <div class="form-group col-md-12">
                              <label for="">•	Living with a COVID-19 patient within a 14-day period after the onset of his/her symptoms?</label>
                              <span> (Nakasama ang isang pasyenteng may COVID na may sintomas sa loob ng 14 araw.)</span>
                              <div class="offset-1 col-md-10">
                                <input type="text" class="form-control" readonly="" name="three_contact_four" value="<?php echo isset($_POST["three_contact_four"]) ? $_POST["three_contact_four"] : ''; ?>" id="three_contact_four">
                              </div>
                            </div>
                          <hr>
                          <div class="panel-heading">
                            <label class="panel-title">4. Do you have pre-existing illness? </label>
                               <span>( May umiiral na karamdaman/sakit?)</span>
                               <div class="offset-1 col-md-10">
                                 <input type="text" class="form-control" readonly="" name="four_existing" value="<?php echo isset($_POST["four_existing"]) ? $_POST["four_existing"] : ''; ?>" id="four_existing">
                                 <div class="offset-1">
                                   <label>If yes, </label><span> Specify?/(Ano?)</span>
                                   <input type="text" class="form-control" readonly="" name="four_existing_specify" value="<?php echo isset($_POST["four_existing_specify"]) ? $_POST["four_existing_specify"] : ''; ?>" id="four_existing_specify">
                                 </div>
                               </div>
                           </div>
                           <hr>
                          <div class="panel-heading">
                            <label class="panel-title">5. Are you pregnant? </label>
                               <span>( Nagdadalang tao ka ba?)</span>
                               <div class="offset-1 col-md-10">
                                 <input type="text" class="form-control" readonly="" name="five_pregnant" value="<?php echo isset($_POST["five_pregnant"]) ? $_POST["five_pregnant"] : ''; ?>" id="five_pregnant">
                               </div>
                            </div>

                                                 <script type="text/javascript">
                                                   let scanner = new Instascan.Scanner({ video: document.getElementById('previewChecklist') });
                                                   scanner.addListener('scan', function (content) {
                                                     console.log(content);
                                                     var audio = new Audio('http://localhost/HDS/public/js/scanner.mp3');
                                                     audio.play();
                                                   });
                                                   Instascan.Camera.getCameras().then(function (cameras) {
                                                     if (cameras.length > 0) {
                                                       scanner.start(cameras[0]);
                                                     } else {
                                                       console.error('No cameras found.');
                                                     }
                                                   }).catch(function (e) {
                                                     console.error(e);
                                                   });

                                                   scanner.addListener('scan', function(cont){

                                                     var parts = cont.split(':');

                                                     document.getElementById('temperature').value = parts[0];
                                                     if(parts[1] == 'Yes'){
                                                       parts[1] = 'yes';
                                                       document.getElementById('one_a').value = parts[1];
                                                       document.getElementById('one_a_date').value = parts[2];
                                                     }else{
                                                       parts[1] = 'no';
                                                       document.getElementById('one_a').value = parts[1];
                                                     }
                                                     if(parts[3] == 'Yes'){
                                                       parts[3] = 'yes';
                                                       document.getElementById('one_b').value = parts[3];
                                                       document.getElementById('one_b_date').value = parts[4];
                                                     }else{
                                                       parts[3] = 'no';
                                                       document.getElementById('one_b').value = parts[3];
                                                     }
                                                     if(parts[5] == 'Yes'){
                                                       parts[5] = 'yes';
                                                       document.getElementById('one_c').value = parts[5];
                                                       document.getElementById('one_c_date').value = parts[6];
                                                     }else{
                                                       parts[5] = 'no';
                                                       document.getElementById('one_c').value = parts[5];
                                                     }
                                                     if(parts[7] == 'Yes'){
                                                       parts[7] = 'yes';
                                                       document.getElementById('one_d').value = parts[7];
                                                       document.getElementById('one_d_date').value = parts[8];
                                                     }else{
                                                       parts[7] = 'no';
                                                       document.getElementById('one_d').value = parts[7];
                                                     }
                                                     if(parts[9] == 'Yes'){
                                                       parts[9] = 'yes';
                                                       document.getElementById('one_e').value = parts[9];
                                                       document.getElementById('one_e_date').value = parts[10];
                                                     }else{
                                                       parts[9] = 'no';
                                                       document.getElementById('one_e').value = parts[9];
                                                     }
                                                     if(parts[11] == 'Yes'){
                                                       parts[11] = 'yes';
                                                       document.getElementById('one_f').value = parts[11];
                                                       document.getElementById('one_f_date').value = parts[12];
                                                     }else{
                                                       parts[11] = 'no';
                                                       document.getElementById('one_f').value = parts[11];
                                                     }
                                                     if(parts[13] == 'Yes'){
                                                       parts[13] = 'yes';
                                                       document.getElementById('two_travel').value = parts[13];
                                                       document.getElementById('two_travel_address').value = parts[14];
                                                     }else{
                                                       parts[13] = 'no';
                                                       document.getElementById('two_travel').value = parts[13];
                                                     }
                                                     if(parts[15] == 'Yes'){
                                                       parts[15] = 'yes';
                                                       document.getElementById('three_contact_one').value = parts[15];
                                                     }else{
                                                       parts[15] = 'no';
                                                       document.getElementById('three_contact_one').value = parts[15];
                                                     }
                                                     if(parts[16] == 'Yes'){
                                                       parts[16] = 'yes';
                                                       document.getElementById('three_contact_two').value = parts[16];
                                                     }else{
                                                       parts[16] = 'no';
                                                       document.getElementById('three_contact_two').value = parts[16];
                                                     }
                                                     if(parts[17] == 'Yes'){
                                                       parts[17] = 'yes';
                                                       document.getElementById('three_contact_three').value = parts[17];
                                                     }else{
                                                       parts[17] = 'no';
                                                       document.getElementById('three_contact_three').value = parts[17];
                                                     }
                                                     if(parts[18] == 'Yes'){
                                                       parts[18] = 'yes';
                                                       document.getElementById('three_contact_four').value = parts[18];
                                                     }else{
                                                       parts[18] = 'no';
                                                       document.getElementById('three_contact_four').value = parts[18];
                                                     }

                                                     if(parts[19] == 'Yes'){
                                                       parts[19] = 'yes';
                                                       document.getElementById('four_existing').value = parts[19];
                                                       document.getElementById('four_existing_specify').value = parts[20];
                                                     }else{
                                                       parts[18] = 'no';
                                                       document.getElementById('four_existing').value = parts[19];
                                                     }
                                                     if(parts[21] == 'Yes'){
                                                       parts[21] = 'yes';
                                                       document.getElementById('five_pregnant').value = parts[21];
                                                     }else{
                                                       parts[21] = 'no';
                                                       document.getElementById('five_pregnant').value = parts[21];
                                                     }

                                                     document.getElementById('department').value = parts[22];

                                                   });
                                                 </script>

                        <hr>
                        <h5 class="panel-title">NOTE: Rest assured that all information will be treated in utmost confidentiality.</h5>
                        <h6 class="panel-title">(Makatitiyak ka na ang lahat ng impormasyon ay magiging kompidensiyal.)</h6>
                        <hr>
                        <span></span>
                        <div class="row">
                          <div class="col-md-6 offset-md-6">
                            <input type="hidden" name="visit_id" value="<?=$visit_id?>">
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                          </div>
                        </div>
                  </form>
            <p style="clear: both"></p>
          </div>
          <!-- /.tab-content -->
        </div><!-- /.card-body -->
      </div>
    <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</div>
