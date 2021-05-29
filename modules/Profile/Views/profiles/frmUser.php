<hr>
<div class="row">
  <div class="col-md-12">
    <div class="card border-success" style="border-radius: 0px;">
      <div class="card-body">
        <p class="h3"><?= $function_title;?></p>
        <hr>
        <form action="<?= base_url() ?>profile/<?= isset($rec) ? 'edit/'.$rec['id'] : 'add' ?>" method="post">
          <div class="row">
            <div class="col-md-6">
              <label for="firstname">First Name:</label>
              <div class="input-group mb-1">
                <input name="firstname" type="text" value="<?= isset($rec['firstname']) ? $rec['firstname'] : set_value('firstname') ?>" class="form-control <?= isset($errors['firstname']) ? 'is-invalid':' ' ?>" id="firstname" placeholder="First name">
              
                <?php if(isset($errors['firstname'])): ?>
                  <div class="invalid-feedback">
                    <?= $errors['firstname'] ?>
                  </div>
                <?php endif; ?>
              </div>
              <label for="middlename">Middle Name:</label>
              <div class="input-group mb-1">
                <input name="middlename" type="text" value="<?= isset($rec['middlename']) ? $rec['middlename'] : set_value('middlename') ?>" class="form-control <?= isset($errors['middlename']) ? 'is-invalid':' ' ?>" id="middlename" placeholder="Middle name">
              
                <?php if(isset($errors['middlename'])): ?>
                  <div class="invalid-feedback">
                    <?= $errors['middlename'] ?>
                  </div>
                <?php endif; ?>
              </div>
              <label for="lastname">Last Name:</label>
              <div class="input-group mb-1">
                <input name="lastname" type="text" value="<?= isset($rec['lastname']) ? $rec['lastname'] : set_value('lastname') ?>" class="form-control <?= isset($errors['lastname']) ? 'is-invalid':' ' ?>" id="lastname" placeholder="Last name">
              
                <?php if(isset($errors['lastname'])): ?>
                  <div class="invalid-feedback">
                    <?= $errors['lastname'] ?>
                  </div>
                <?php endif; ?>
              </div>
                <label for="ext_name_id">Extension Name:</label><span> (Optional)</span>
              <div class="input-group mb-1">
                <select name="ext_name_id" class="form-control <?= isset($errors['ext_name_id']) ? 'is-invalid':' ' ?>">
                  <?php if(isset($rec['ext_name_id'])): ?>
                    <?php foreach($ext as $extension): ?>
                      <option value="<?= $extension['id'] ?>" <?php if($extension['id'] == $rec['ext_name_id'])echo "selected"; ?>><?= ucwords($extension['extension']) ?></option>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <option selected disabled>-- Select Extension Name --</option>
                    <?php foreach($ext as $extension): ?>
                      <option value="<?= $extension['id'] ?>"><?= ucwords($extension['extension']) ?></option>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </select>
               
                <?php if(isset($errors['ext_name_id'])): ?>
                  <div class="invalid-feedback">
                    <?= $errors['ext_name_id'] ?>
                  </div>
                <?php endif; ?>
              </div>
                <label for="gender_id">Gender:</label>
              <div class="input-group mb-1">
                <select name="gender_id" class="form-control <?= isset($errors['gender_id']) ? 'is-invalid':' ' ?>">
                  <?php if(isset($rec['gender_id'])): ?>
                    <?php foreach($gen as $gender): ?>
                      <option value="<?= $gender['id'] ?>" <?php if($gender['id'] == $rec['gender_id'])echo "selected"; ?>><?= ucwords($gender['gender']) ?></option>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <option selected disabled>-- Select Gender --</option>
                    <?php foreach($gen as $gender): ?>
                      <option value="<?= $gender['id'] ?>"><?= ucwords($gender['gender']) ?></option>
                    <?php endforeach; ?>
                  <?php endif; ?>

                </select>
              
                <?php if(isset($errors['gender_id'])): ?>
                  <div class="invalid-feedback">
                    <?= $errors['gender_id'] ?>
                  </div>
                <?php endif; ?>
              </div>
                <label for="username">Username:</label>
              <div class="input-group mb-1">
                <input name="username" type="text" value="<?= isset($rec['username']) ? $rec['username'] : set_value('username') ?>" class="form-control <?= isset($errors['username']) ? 'is-invalid':' ' ?>" id="username" placeholder="Username">
               
                <?php if(isset($errors['username'])): ?>
                  <div class="invalid-feedback">
                    <?= $errors['username'] ?>
                  </div>
                <?php endif; ?>
              </div>
              <label for="password">Password:</label>
              <div class="input-group mb-1">
              <input name="password" type="password" value="<?= isset($rec['password']) ? '': set_value('password') ?>" class="form-control <?= isset($errors['password']) ? 'is-invalid':' ' ?>" id="password" placeholder="Password">
            
              <?php if(isset($errors['password'])): ?>
                <div class="invalid-feedback">
                  <?= $errors['password'] ?>
                </div>
              <?php endif; ?>
              </div>
              <label for="password_retype">Password Re-type:</label>
              <div class="input-group mb-1">
              <input name="password_retype" type="password" value="<?= isset($rec['password']) ? '' : set_value('password_retype') ?>" class="form-control <?= isset($errors['password_retype']) ? 'is-invalid':' ' ?>" id="password_retype" placeholder="Password Re-type">
              
              <?php if(isset($errors['password_retype'])): ?>
                <div class="invalid-feedback">
                  <?= $errors['password_retype'] ?>
                </div>
              <?php endif; ?>
              </div>
              <label for="user_type_id">Guest Type:</label>
              <div class="input-group mb-3">
                <select name="user_type_id" class="form-control <?= isset($errors['user_type_id']) ? 'is-invalid':' ' ?>">
                  <?php if(isset($rec['user_type_id'])): ?>
                    <?php foreach($guest as $guest_type): ?>
                      <option value="<?= $guest_type['id'] ?>" <?php if($guest_type['id'] == $rec['user_type_id'])echo "selected"; ?>><?= ucwords($guest_type['guest_type']) ?></option>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <option selected disabled>-- Select Guest Type --</option>
                    <?php foreach($guest as $guest_type): ?>
                      <option value="<?= $guest_type['id'] ?>"><?= ucwords($guest_type['guest_type']) ?></option>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </select>
               
                <?php if(isset($errors['user_type_id'])): ?>
                  <div class="invalid-feedback">
                    <?= $errors['user_type_id'] ?>
                  </div>
                <?php endif; ?>
              </div>
            </div>
            <div class="col-md-6">
              <label for="email">Email:</label>
            <div class="input-group mb-1">
              <input name="email" type="email" value="<?= isset($rec['email']) ? $rec['email'] : set_value('email') ?>" class="form-control <?= isset($errors['email']) ? 'is-invalid':' ' ?>" id="email" placeholder="Email">
             
              <?php if(isset($errors['email'])): ?>
                <div class="invalid-feedback">
                  <?= $errors['email'] ?>
                </div>
              <?php endif; ?>
            </div>
              <label for="birthdate">Birthdate:</label>
            <div class="input-group mb-1">
              <input name="birthdate" type="date" value="<?= isset($rec['birthdate']) ? $rec['birthdate'] : set_value('birthdate') ?>" class="form-control <?= isset($errors['birthdate']) ? 'is-invalid':' ' ?>" id="birthdate" placeholder="Birthdate">
              <?php if(isset($errors['birthdate'])): ?>
                <div class="invalid-feedback">
                  <?= $errors['birthdate'] ?>
                </div>
              <?php endif; ?>
            </div>
            <label for="cellphone_no">Cellphone No.:</label>
            <div class="input-group mb-1">
            <input name="cellphone_no" type="text" value="<?= isset($rec['cellphone_no']) ? $rec['cellphone_no'] : set_value('cellphone_no') ?>" class="form-control <?= isset($errors['cellphone_no']) ? 'is-invalid':' ' ?>" id="cellphone_no" placeholder="Cellphone Number">
            
            <?php if(isset($errors['cellphone_no'])): ?>
              <div class="invalid-feedback">
                <?= $errors['cellphone_no'] ?>
              </div>
            <?php endif; ?>
            </div>
            <label for="landline_no">Landline No.:</label><span>(Optional)</span>
            <div class="input-group mb-1">
            <input name="landline_no" type="text" value="<?= isset($rec['landline_no']) ? $rec['landline_no'] : set_value('landline_no') ?>" class="form-control <?= isset($errors['landline_no']) ? 'is-invalid':' ' ?>" id="landline_no" placeholder="Landline Number">
            
            <?php if(isset($errors['landline_no'])): ?>
              <div class="invalid-feedback">
                <?= $errors['landline_no'] ?>
              </div>
            <?php endif; ?>
            </div>
            <label for="address">Address:</label>
            <div class="input-group mb-1">
            <input name="address" type="text" value="<?= isset($rec['address']) ? $rec['address'] : set_value('address') ?>" class="form-control <?= isset($errors['address']) ? 'is-invalid':' ' ?>" id="address" placeholder="[#House No.], [Street Name], [Baranggay]">
            
            <?php if(isset($errors['address'])): ?>
              <div class="invalid-feedback">
                <?= $errors['address'] ?>
              </div>
            <?php endif; ?>
            </div>
            <label for="city_id">City:</label>
            <div class="input-group mb-1">
              <select name="city_id" class="form-control <?= isset($errors['city_id']) ? 'is-invalid':' ' ?>">
                <?php if(isset($rec['city_id'])): ?>
                  <?php foreach($cit as $city): ?>
                    <option value="<?= $city['id'] ?>" <?php if($city['id'] == $rec['city_id'])echo "selected"; ?>><?= ucwords($city['city']) ?></option>
                  <?php endforeach; ?>
                <?php else: ?>
                  <option selected disabled>-- Select City --</option>
                  <?php foreach($cit as $city): ?>
                    <option value="<?= $city['id'] ?>"><?= ucwords($city['city']) ?></option>
                  <?php endforeach; ?>
                <?php endif; ?>
              </select>
            
              <?php if(isset($errors['city_id'])): ?>
                <div class="invalid-feedback">
                  <?= $errors['city_id'] ?>
                </div>
              <?php endif; ?>
            </div>
              <label for="province_id">Province:</label>
              <div class="input-group mb-1">
                <select name="province_id" class="form-control <?= isset($errors['province_id']) ? 'is-invalid':' ' ?>">
                  <?php if(isset($rec['province_id'])): ?>
                    <?php foreach($provinces as $province): ?>
                      <option value="<?= $province['id'] ?>" <?php if($province['id'] == $rec['province_id'])echo "selected"; ?>><?= ucwords($province['province']) ?></option>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <option selected disabled>-- Select City --</option>
                    <?php foreach($provinces as $province): ?>
                      <option value="<?= $province['id'] ?>"><?= ucwords($province['province']) ?></option>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </select>
               
                <?php if(isset($errors['province_id'])): ?>
                  <div class="invalid-feedback">
                    <?= $errors['province_id'] ?>
                  </div>
                <?php endif; ?>
              </div>
              <label for="postal">Postal No.:</label>
              <div class="input-group mb-3">
              <input name="postal" type="text" value="<?= isset($rec['postal']) ? $rec['postal'] : set_value('postal') ?>" class="form-control <?= isset($errors['postal']) ? 'is-invalid':' ' ?>" id="postal" placeholder="Postal Number">
             
              <?php if(isset($errors['postal'])): ?>
                <div class="invalid-feedback">
                  <?= $errors['postal'] ?>
                </div>
              <?php endif; ?>
              </div>
              <div class="input-group mb-0">
                <select hidden name="role_id">
                    <option value="2">USER</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-12 mb-3">
              <button type="submit" class="btn btn-primary btn-block">Save</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
<br>
