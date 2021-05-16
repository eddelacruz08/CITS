<hr>
<div class="row">
  <div class="col-md-12">
    <div class="card border-success" style="border-radius: 0px;">
      <div class="card-body">
        <?php foreach ($rec as $keys): ?>

      <form action="<?= base_url() ?>guests/<?= isset($keys) ? 'edit/'.$keys['user_id'] : 'add' ?>" method="post">
        <div class="row">
          <div class="col-md-12">
                  <label class="card-title"><h3><i class="far fa-id-badge"></i> Personal Information</h3></label>
          </div>

        </div>
        <div class="row">
          <div class="col-md-9">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" name="first_name" value="<?= isset($keys['first_name']) ? $keys['first_name'] : ''?>" id="first_name" placeholder="First Name">
                    <?php if (isset($errors['first_name'])): ?>
                      <div class="text-danger">
                          <?= $errors['first_name']?>
                      </div>
                    <?php endif; ?>
                  </div>
                  <div class="form-group">
                    <label for="middle_name">Middle Name</label>
                    <input type="text" class="form-control" name="middle_name" value="<?= isset($keys['middle_name']) ? $keys['middle_name'] : ''?>" id="middle_name" placeholder="Middle Name">
                    <?php if (isset($errors['middle_name'])): ?>
                      <div class="text-danger">
                          <?= $errors['middle_name']?>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" name="last_name" value="<?= isset($keys['last_name']) ? $keys['last_name'] : ''?>" id="last_name" placeholder="Last Name">
                    <?php if (isset($errors['last_name'])): ?>
                      <div class="text-danger">
                          <?= $errors['last_name']?>
                      </div>
                    <?php endif; ?>
                  </div>
                  <div class="form-group">
                    <label for="ext_name_id">Extension Name</label>
                    <select type="text" class="form-control" name="ext_name_id" value="<?= isset($keys['ext_name_id']) ? $keys['ext_name_id'] : ''?>" id="ext_name_id" placeholder="Extension Name">
                      <option value="">None</option>
                      <?php foreach ($extensions as $key): ?>
                        <option value="<?=$key['id']?>"><?=$key['extension']?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>

              <div class="col-md-5">
                <div class="form-group">
                  <label for="birthdate">Birth Date</label>
                  <input type="date" class="form-control" name="birthdate" value="<?= isset($keys['birthdate']) ? $keys['birthdate'] : ''?>" id="birthdate">
                  <?php if (isset($errors['birthdate'])): ?>
                    <div class="text-danger">
                        <?= $errors['birthdate']?>
                    </div>
                  <?php endif; ?>
                </div>
              </div>

              <div class="col-md-7">
                <div class="form-group">
                  <label for="email">Email Address</label>
                  <input type="text" class="form-control" name="email" value="<?= isset($keys['email']) ? $keys['email'] : ''?>" id="email" placeholder="Email Address">
                  <?php if (isset($errors['email'])): ?>
                    <div class="text-danger">
                        <?= $errors['email']?>
                    </div>
                  <?php endif; ?>
                </div>
              </div>

              <div class="col-md-5">
                <div class="form-group">
                  <label for="gender_id">Gender</label>
                  <select type="text" class="form-control"  name="gender_id" value="<?= isset($keys['gender_id']) ? $keys['gender_id'] : ''?>" id="gender_id" placeholder="Gender">
                    <option value="" selected disabled>-- Select --</option>
                      <?php foreach ($genders as $key): ?>
                        <option value="<?=$key['id']?>"><?=$key['gender']?></option>
                      <?php endforeach; ?>
                  </select>
                  <?php if (isset($errors['gender_id'])): ?>
                    <div class="text-danger">
                      <?= $errors['gender_id']?>
                    </div>
                  <?php endif; ?>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="cellphone_no">Contact No.</label>
                  <input type="text" class="form-control" name="cellphone_no" value="<?= isset($keys['cellphone_no']) ? $keys['cellphone_no'] : ''?>" id="cellphone_no" placeholder="Contact No.">
                  <?php if (isset($errors['cellphone_no'])): ?>
                    <div class="text-danger">
                      <?= $errors['cellphone_no']?>
                    </div>
                  <?php endif; ?>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                 <label for="landline_no">Landline No.</label><span> (optional)</span>
                 <input type="text" class="form-control" name="landline_no" value="<?= isset($keys['landline_no']) ? $keys['landline_no'] : ''?>" id="landline_no" placeholder="Landline No.">
                 <?php if (isset($errors['landline_no'])): ?>
                   <div class="text-danger">
                       <?= $errors['landline_no']?>
                   </div>
                 <?php endif; ?>
               </div>
             </div>

             <div class="col-md-4">
               <div class="form-group">
                 <label for="user_type_id">Guest Type</label>
                 <select type="text" class="form-control"  name="user_type_id" value="<?= isset($keys['user_type_id']) ? $keys['user_type_id'] : ''?>" id="user_type_id">
                   <option value="" selected disabled>-- Select --</option>
                     <?php foreach ($guest_type as $key): ?>
                       <option value="<?=$key['id']?>"><?=$key['guest_type']?></option>
                     <?php endforeach; ?>
                 </select>
                 <?php if (isset($errors['user_type_id'])): ?>
                   <div class="text-danger">
                       <?= $errors['user_type_id']?>
                   </div>
                 <?php endif; ?>
               </div>
             </div>
          </div>
        </div>
      </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="address">Address</label>
                  <input type="text" class="form-control" name="address" value="<?= isset($keys['address']) ? $keys['address'] : ''?>" id="address" placeholder="[#House No.], [Street Name],">
                  <?php if (isset($errors['address'])): ?>
                    <div class="text-danger">
                        <?= $errors['address']?>
                    </div>
                  <?php endif; ?>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label for="city_id">City</label>
                  <select type="text" class="form-control"  name="city_id" value="<?= isset($keys['city_id']) ? $keys['city_id'] : ''?>" id="city_id" placeholder="City">
                    <option value="" selected disabled>-- Select --</option>
                      <?php foreach ($cities as $key): ?>
                        <option value="<?=$key['id']?>"><?=$key['city']?></option>
                      <?php endforeach; ?>
                  </select>
                  <?php if (isset($errors['city_id'])): ?>
                    <div class="text-danger">
                        <?= $errors['city_id']?>
                    </div>
                  <?php endif; ?>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label for="province_id">Province</label>
                  <select type="text" class="form-control"  name="province_id" value="<?= isset($keys['province_id']) ? $keys['province_id'] : ''?>" id="province_id" placeholder="Province">
                    <option value="" selected disabled>-- Select --</option>
                      <?php foreach ($provinces as $key): ?>
                        <option value="<?=$key['id']?>"><?=$key['province']?></option>
                      <?php endforeach; ?>
                  </select>
                  <?php if (isset($errors['province_id'])): ?>
                    <div class="text-danger">
                        <?= $errors['province_id']?>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label for="postal">Postal</label>
                  <input type="number" class="form-control" name="postal" value="<?= isset($keys['postal']) ? $keys['postal'] : ''?>" id="postal" placeholder="0000">
                  <?php if (isset($errors['postal'])): ?>
                    <div class="text-danger">
                        <?= $errors['postal']?>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
             </div>
        <br>

        <div class="row">
          <div class="col-md-12">
            <button type="submit" class="btn btn-success float-right" style="width:15%;"><i class="fas fa-paper-plane"></i> Submit</button>
          </div>
        </div>
      </form>
    <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>
<br>
