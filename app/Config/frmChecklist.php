
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          <center><h3>Health Declaration Form</h3></center>
        </div>
      </div>
      <hr>
        <div class="row">
          <div class="col-md-12">
              <form id="formId" action="<?= base_url() ?>checklists/<?='capture/'.$profile[0]['id']?>" method="post" onsubmit="if(document.getElementById('agree').checked) { return true; } else { alert('Please indicate that you have agree to the Terms of Agreement'); return false; }">
                  <div class="row">
                        <div class="form-group col-md-5 ">
                          <label for="temperature">Body Temperature</label>
                          <div class="input-group mb-3">
                            <input type="float" class="form-control" name="temperature" value="<?php echo isset($_POST["temperature"]) ? $_POST["temperature"] : ''; ?>" id="temperature" placeholder="Enter your temperature">
                            <div class="input-group-append">
                              <span class="input-group-text"><b>℃</b></span>
                            </div>
                            <p><strong>Note:</strong> Please make the placed information is truthful.</p>
                          </div>
                          <?php if (isset($errors['temperature'])): ?>
                            <div class="text-danger">
                              <?= $errors['temperature']?>
                            </div>
                          <?php endif; ?>
                        </div>
                        <div class="form-group col-md-7 ">
                          <label for="department">What buildings/offices/departments do you want to visit?</label>
                          <div class="input-group mb-3">
                            <input type="text" class="form-control" multiple="multiple" list="departments" name="department" id="department" placeholder="Select / Input your destination.">
                            <div class="input-group-append">
                              <span class="input-group-text"><b><i class="fas fa-location-arrow"></i></b></span>
                            </div>
                          </div>
                          <p><span> (Add comma for multiple selection.)</span></p>
                          <p><strong>Note:</strong> If you are not an ousider, please input any of the following. (e.g. Regular Student or Faculty or Employee) This is based on the fact that you are attending regularly.</p>
                          <datalist id="departments">
                            <?php
                              foreach ($departments as $key) {
                                $keyValue = $key['department'];
                            ?>
                            <option value="<?= $keyValue?>"><?= $keyValue?></option>
                            <?php
                              }
                            ?>
                          </datalist>
                          <script type="text/javascript">
                          document.addEventListener("DOMContentLoaded", function () {
                            //const separator = ',';
                            const separator = ', ';
                            for (const input of document.getElementsByTagName("input")) {
                                if (!input.multiple) {
                                    continue;
                                }
                                if (input.list instanceof HTMLDataListElement) {
                                    const optionsValues = Array.from(input.list.options).map(opt => opt.value);
                                    let valueCount = input.value.split(separator).length;
                                    input.addEventListener("input", () => {
                                        const currentValueCount = input.value.split(separator).length;
                                        // Do not update list if the user doesn't add/remove a separator
                                        // Current value: "a, b, c"; New value: "a, b, cd" => Do not change the list
                                        // Current value: "a, b, c"; New value: "a, b, c," => Update the list
                                        // Current value: "a, b, c"; New value: "a, b" => Update the list
                                        if (valueCount !== currentValueCount) {
                                            const lsIndex = input.value.lastIndexOf(separator);
                                            const str = lsIndex !== -1 ? input.value.substr(0, lsIndex) + separator : "";
                                            filldatalist(input, optionsValues, str);
                                            valueCount = currentValueCount;
                                        }
                                    });
                                }
                            }
                            function filldatalist(input, optionValues, optionPrefix) {
                                const list = input.list;
                                if (list && optionValues.length > 0) {
                                    list.innerHTML = "";
                                    const usedOptions = optionPrefix.split(separator).map(value => value.trim());
                                    for (const optionsValue of optionValues) {
                                        if (usedOptions.indexOf(optionsValue) < 0) {
                                            const option = document.createElement("option");
                                            option.value = optionPrefix + optionsValue;
                                            list.append(option);
                                        }
                                    }
                                }
                            }
                          });
                          </script>
                          <?php if (isset($errors['department'])): ?>
                            <div class="text-danger">
                              <?= $errors['department']?>
                            </div>
                          <?php endif; ?>
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
                                    <?php if (isset($errors['one_a'])): ?>
                                      <div class="text-danger">
                                          <?= $errors['one_a']?>
                                      </div>
                                    <?php endif; ?>
                                    <br>
                                    <div class="custom-control custom-radio">
                                      <input type="radio" name="one_a" id="one_a" value="yes" onClick="getResults()" class=" <?= isset($errors['one_a']) ? 'is-invalid':'is-valid' ?>">
                                      <label for="one_a">Yes</label>
                                    </div>
                                    <div class="text offset-md-1">
                                      <label>Date of onset: </label><span> (Petsa ng simula:)</span>
                                      <input type="date" class="form-control" name="one_a_date" value="<?php echo isset($_POST["one_a_date"]) ? $_POST["one_a_date"] : ''; ?>" id="one_a_date">
                                    </div>
                                    <div class="custom-control custom-radio">
                                      <input type="radio" name="one_a" id="one_a1" value="no"  class="<?= isset($errors['one_a']) ? 'is-invalid':'is-valid' ?>">
                                      <label for="one_a1">No</label>
                                    </div>
                            </div>
                            <div class="form-group col-md-6">
                                    <label for="">B. Cough and/or colds (Ubo at/ sipon)</label>
                                    <?php if (isset($errors['one_b'])): ?>
                                      <div class="text-danger">
                                          <?= $errors['one_b']?>
                                      </div>
                                    <?php endif; ?>
                                    <br>
                                    <div class="custom-control custom-radio">
                                      <input type="radio" name="one_b" id="one_b" value="yes" onClick="getResults()" class=" <?= isset($errors['one_b']) ? 'is-invalid':'is-valid' ?>">
                                      <label for="one_b">Yes</label>
                                    </div>
                                    <div class="text1 offset-md-1">
                                      <label>Date of onset: </label><span> (Petsa ng simula:)</span>
                                      <input type="date" name="one_b_date" value="" class="form-control <?= isset($errors['one_b_date']) ? 'is-invalid':'' ?>" id="one_b_date">

                                    </div>
                                    <div class="custom-control custom-radio">
                                      <input type="radio" name="one_b" id="one_b1" value="no" class="<?= isset($errors['one_b']) ? 'is-invalid':'is-valid' ?>">
                                      <label for="one_b1">No</label>
                                    </div>
                              </div>
                            <div class="form-group col-md-6">
                                    <label for="">C. Body pains (pananakit ng katawan)</label>
                                    <?php if (isset($errors['one_c'])): ?>
                                      <div class="text-danger">
                                          <?= $errors['one_c']?>
                                      </div>
                                    <?php endif; ?>
                                    <br>
                                    <div class="custom-control custom-radio">
                                      <input type="radio" name="one_c" id="one_c" value="yes" onClick="getResults()" class=" <?= isset($errors['one_c']) ? 'is-invalid':'is-valid' ?>">
                                      <label for="one_c">Yes</label>
                                    </div>
                                    <div class="text2 offset-md-1">
                                      <label>Date of onset: </label><span> (Petsa ng simula:)</span>
                                      <input type="date" name="one_c_date" value="" class="form-control <?= isset($errors['one_c_date']) ? 'is-invalid':'' ?>" id="one_c_date">

                                    </div>
                                    <div class="custom-control custom-radio">
                                      <input type="radio" name="one_c" id="one_c1" value="no" class="<?= isset($errors['one_c']) ? 'is-invalid':'is-valid' ?>">
                                      <label for="one_c1">No</label>
                                    </div>
                              </div>
                            <div class="form-group col-md-6">
                                    <label for="">D. Sore throat (pananakit ng lalamunan/hirap lumunok)</label>
                                    <?php if (isset($errors['one_d'])): ?>
                                      <div class="text-danger">
                                          <?= $errors['one_d']?>
                                      </div>
                                    <?php endif; ?>
                                    <br>
                                    <div class="custom-control custom-radio">
                                      <input type="radio" name="one_d" id="one_d" value="yes" onClick="getResults()" class=" <?= isset($errors['one_d']) ? 'is-invalid':'is-valid' ?>">
                                      <label for="one_d">Yes</label>
                                    </div>
                                    <div class="text3 offset-md-1">
                                      <label>Date of onset: </label><span> (Petsa ng simula:)</span>
                                      <input type="date" name="one_d_date" value="" class="form-control <?= isset($errors['one_d_date']) ? 'is-invalid':'' ?>" id="one_d_date">

                                    </div>
                                    <div class="custom-control custom-radio">
                                      <input type="radio" name="one_d" id="one_d1" value="no" class="<?= isset($errors['one_d']) ? 'is-invalid':'is-valid' ?>">
                                      <label for="one_d1">No</label>
                                    </div>
                              </div>
                            <div class="form-group col-md-6">
                                    <label for="">E. Shortness of breath (hirap sa paghinga)</label>
                                    <?php if (isset($errors['one_e'])): ?>
                                      <div class="text-danger">
                                          <?= $errors['one_e']?>
                                      </div>
                                    <?php endif; ?>
                                    <br>
                                    <div class="custom-control custom-radio">
                                      <input type="radio" name="one_e" id="one_e" value="yes" onClick="getResults()" class=" <?= isset($errors['one_e']) ? 'is-invalid':'is-valid' ?>">
                                      <label for="one_e">Yes</label>
                                    </div>
                                    <div class="text4 offset-md-1">
                                      <label>Date of onset: </label><span> (Petsa ng simula:)</span>
                                      <input type="date" name="one_e_date" value="" class="form-control <?= isset($errors['one_e_date']) ? 'is-invalid':'' ?>" id="one_e_date">

                                    </div>
                                    <div class="custom-control custom-radio">
                                      <input type="radio" name="one_e" id="one_e1" value="no" class="<?= isset($errors['one_e']) ? 'is-invalid':'is-valid' ?>">
                                      <label for="one_e1">No</label>
                                    </div>
                              </div>
                            <div class="form-group col-md-6">
                                    <label for="">F. Diarrhea (pagtatae)</label>
                                    <?php if (isset($errors['one_f'])): ?>
                                      <div class="text-danger">
                                          <?= $errors['one_f']?>
                                      </div>
                                    <?php endif; ?>
                                    <br>
                                    <div class="custom-control custom-radio">
                                      <input type="radio" name="one_f" id="one_f" value="yes" onClick="getResults()" class=" <?= isset($errors['one_f']) ? 'is-invalid':'is-valid' ?>">
                                      <label for="one_f">Yes</label>
                                    </div>
                                    <div class="text5 offset-md-1">
                                      <label>Date of onset: </label><span> (Petsa ng simula:)</span>
                                      <input type="date" name="one_f_date" value="" class="form-control <?= isset($errors['one_f_date']) ? 'is-invalid':'' ?>" id="one_f_date">

                                    </div>
                                    <div class="custom-control custom-radio">
                                      <input type="radio" name="one_f" id="one_f1" value="no" class="<?= isset($errors['one_f']) ? 'is-invalid':'is-valid' ?>">
                                      <label for="one_f1">No</label>
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
                                <?php if (isset($errors['two_travel'])): ?>
                                  <div class="text-danger">
                                      <?= $errors['two_travel']?>
                                  </div>
                                <?php endif; ?>
                                    <div class="custom-control custom-radio">
                                      <br>
                                      <input type="radio" name="two_travel" id="two_travel" value="yes" onClick="getResults()" class=" <?= isset($errors['two_travel']) ? 'is-invalid':'is-valid' ?>">
                                      <label for="two_travel">Yes</label>
                                    </div>
                                    <div class="text6 offset-md-1">
                                      <label>COUNTRY, CITY, or PROVINCE: </label><span></span>
                                    <input type="text" class="form-control <?= isset($errors['two_travel_address']) ? 'is-invalid':'' ?>" name="two_travel_address" value="" id="two_travel_address" placeholder="Enter Address">

                                    </div>
                                    <div class="custom-control custom-radio">
                                      <input type="radio" name="two_travel" id="two_travel1" value="no" class="<?= isset($errors['two_travel']) ? 'is-invalid':'is-valid' ?>">
                                      <label for="two_travel1">No</label>
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
                                    <?php if (isset($errors['three_contact_one'])): ?>
                                      <div class="text-danger">
                                          <?= $errors['three_contact_one']?>
                                      </div>
                                    <?php endif; ?>
                                    <div class="custom-control custom-radio">
                                      <br>
                                      <input type="radio" name="three_contact_one" id="three_contact_one" value="yes" onClick="getResults()" class=" <?= isset($errors['three_contact_one']) ? 'is-invalid':'is-valid' ?>">
                                      <label for="three_contact_one">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                      <input type="radio" name="three_contact_one" id="three_contact_one1" value="no" class="<?= isset($errors['three_contact_one']) ? 'is-invalid':'is-valid' ?>">
                                      <label for="three_contact_one1">No</label>
                                    </div>
                            </div>
                            <div class="form-group col-md-12">
                              <label for="">•	In close proximity or shared the same room with a COVID-19 patient?</label>
                              <span> (Taong direktang kasama ang isang pasyenteng may COVID sa isang silid.)</span>
                              <?php if (isset($errors['three_contact_two'])): ?>
                                <div class="text-danger">
                                    <?= $errors['three_contact_two']?>
                                </div>
                              <?php endif; ?>
                                    <div class="custom-control custom-radio">
                                      <br>
                                      <input type="radio" name="three_contact_two" id="three_contact_two" value="yes" onClick="getResults()" class=" <?= isset($errors['three_contact_two']) ? 'is-invalid':'is-valid' ?>">
                                      <label for="three_contact_two">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                      <input type="radio" name="three_contact_two" id="three_contact_two1" value="no" class="<?= isset($errors['three_contact_two']) ? 'is-invalid':'is-valid' ?>">
                                      <label for="three_contact_two1">No</label>
                                    </div>
                            </div>
                            <div class="form-group col-md-12">
                              <label for="">•	Travelled together with COVID-19 patient?</label>
                              <span> (Naglakbay kasama ang may COVID.)</span>
                              <?php if (isset($errors['three_contact_three'])): ?>
                                <div class="text-danger">
                                    <?= $errors['three_contact_three']?>
                                </div>
                              <?php endif; ?>
                                    <div class="custom-control custom-radio">
                                      <br>
                                      <input type="radio" name="three_contact_three" id="three_contact_three" value="yes" onClick="getResults()" class=" <?= isset($errors['three_contact_three']) ? 'is-invalid':'is-valid' ?>">
                                      <label for="three_contact_three">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                      <input type="radio" name="three_contact_three" id="three_contact_three1" value="no" class="<?= isset($errors['three_contact_three']) ? 'is-invalid':'is-valid' ?>">
                                      <label for="three_contact_three1">No</label>
                                    </div>
                            </div>
                            <div class="form-group col-md-12">
                              <label for="">•	Living with a COVID-19 patient within a 14-day period after the onset of his/her symptoms?</label>
                              <span> (Nakasama ang isang pasyenteng may COVID na may sintomas sa loob ng 14 araw.)</span>
                              <?php if (isset($errors['three_contact_four'])): ?>
                                <div class="text-danger">
                                    <?= $errors['three_contact_four']?>
                                </div>
                              <?php endif; ?>
                                    <div class="custom-control custom-radio">
                                      <br>
                                      <input type="radio" name="three_contact_four" id="three_contact_four" value="yes" onClick="getResults()" class=" <?= isset($errors['three_contact_four']) ? 'is-invalid':'is-valid' ?>">
                                      <label for="three_contact_four">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                      <input type="radio" name="three_contact_four" id="three_contact_four1" value="no" class="<?= isset($errors['three_contact_four']) ? 'is-invalid':'is-valid' ?>">
                                      <label for="three_contact_four1">No</label>
                                    </div>
                            </div>
                      <hr>
                          <div class="panel-heading">
                            <label class="panel-title">4. Do you have pre-existing illness? </label>
                               <span>( May umiiral na karamdaman/sakit?)</span>
                               <?php if (isset($errors['four_existing'])): ?>
                                 <div class="text-danger">
                                     <?= $errors['four_existing']?>
                                 </div>
                               <?php endif; ?>
                          </div>

                            <div class="form-group col-md-12">
                                    <div class="custom-control custom-radio">
                                      <br>
                                      <input type="radio" name="four_existing" id="four_existing" value="yes" onClick="getResults()" class=" <?= isset($errors['four_existing']) ? 'is-invalid':'is-valid' ?>">
                                      <label for="four_existing">Yes</label>
                                    </div>
                                    <div class="text7 offset-md-1">
                                      <label>Specify?/ </label><span> (Ano?)</span>
                                      <input type="text" class="form-control <?= isset($errors['four_existing_specify']) ? 'is-invalid':'' ?>" name="four_existing_specify" value="" id="four_existing_specify" placeholder="Enter your pre-existing illness...">

                                    </div>
                                    <div class="custom-control custom-radio">
                                      <input type="radio" name="four_existing" id="four_existing1" value="no" class="<?= isset($errors['four_existing']) ? 'is-invalid':'is-valid' ?>">
                                      <label for="four_existing1">No</label>
                                    </div>
                            </div>
                      <hr>
                          <div class="panel-heading">
                            <label class="panel-title">5. Are you pregnant? </label>
                               <span>( Nagdadalang tao ka ba?)</span>
                               <?php if (isset($errors['five_pregnant'])): ?>
                                 <div class="text-danger">
                                     <?= $errors['five_pregnant']?>
                                 </div>
                               <?php endif; ?>
                          </div>

                            <div class="form-group col-md-12">
                              <br>
                                    <div class="custom-control custom-radio">
                                      <input type="radio" name="five_pregnant" id="five_pregnant" value="yes" onClick="getResults()" class=" <?= isset($errors['five_pregnant']) ? 'is-invalid':'is-valid' ?>">
                                      <label for="five_pregnant">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                      <input type="radio" name="five_pregnant" id="five_pregnant1" value="no" class="<?= isset($errors['five_pregnant']) ? 'is-invalid':'is-valid' ?>">
                                      <label for="five_pregnant1">No</label>
                                    </div>
                            </div>

                        <hr>
                        <h6 class="panel-title">NOTE: Rest assured that all information will be treated in utmost confidentiality.</h6>
                        <p class="panel-title">(Makatitiyak ka na ang lahat ng impormasyon ay magiging kompidensiyal.)</p>
                        <hr>
                        <input type="checkbox" name="checkbox" value="check" id="agree" /> I have agree to the Terms of Agreement.
                        <hr>
                        <span></span>
                        <div class="row">
                          <div class="col-md-6 offset-md-6">
                            <input type="hidden" name="visit_id" value="<?=$visit_id?>">
                            <button type="submit" class="btn btn-primary float-right" value="submit" name="submit">Submit</button>
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
