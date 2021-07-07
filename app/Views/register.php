
  <body class="container" style="background-color: #001f3f;">
    <br>
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="<?= base_url() ?>" class="h4"><b><?= SYSTEM_NAME ?></b></a>
      </div>
      <div class="card-body" style="background-color: #ced1d6;">
        <p class="h4 text-center"><?= $function_title ?></p>
        <?php if(isset($success)): ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
             <?= $success; ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
        <?php endif; ?>
        <?php if(isset($error)): ?>
          <div class="alert alert-error alert-dismissible fade show" role="alert">
             <?= $error; ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
        <?php endif; ?>
        <form action="<?= base_url() ?>login/register" method="post">
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
                    <option value="<?= $rec['ext_name_id'] ?>"><?= name_on_system($rec['ext_name_id'], $extensions, 'extension') ?></option>
                  <?php else: ?>
                    <option value="">-- none --</option>
                  <?php endif; ?>

                  <?php foreach($extensions as $extension): ?>
                    <option value="<?= $extension['id'] ?>"><?= ucwords($extension['extension']) ?></option>
                  <?php endforeach; ?>
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
                    <option value="<?= $rec['gender_id'] ?>"><?= name_on_system($rec['gender_id'], $genders, 'gender') ?></option>
                  <?php else: ?>
                    <option selected disabled>-- Select Gender --</option>
                  <?php endif; ?>

                  <?php foreach($genders as $gender): ?>
                    <option value="<?= $gender['id'] ?>"><?= ucwords($gender['gender']) ?></option>
                  <?php endforeach; ?>
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
                    <option value="<?= $rec['user_type_id'] ?>"><?= name_on_system($rec['user_type_id'], $guest_types, 'guest_type') ?></option>
                  <?php else: ?>
                    <option selected disabled>-- Select Guest Type --</option>
                  <?php endif; ?>

                  <?php foreach($guest_types as $guest_type): ?>
                    <option value="<?= $guest_type['id'] ?>"><?= ucwords($guest_type['guest_type']) ?></option>
                  <?php endforeach; ?>
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
                  <option value="<?= $rec['city_id'] ?>"><?= name_on_system($rec['city_id'], $cities, 'city') ?></option>
                <?php else: ?>
                  <option selected disabled>-- Select City --</option>
                <?php endif; ?>

                <?php foreach($cities as $city): ?>
                  <option value="<?= $city['id'] ?>"><?= ucwords($city['city']) ?></option>
                <?php endforeach; ?>
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
                    <option value="<?= $rec['province_id'] ?>"><?= name_on_system($rec['province_id'], $provinces, 'province') ?></option>
                  <?php else: ?>
                    <option selected disabled>-- Select Province --</option>
                  <?php endif; ?>

                  <?php foreach($provinces as $province): ?>
                    <option value="<?= $province['id'] ?>"><?= ucwords($province['province']) ?></option>
                  <?php endforeach; ?>
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
              <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <a href="<?= base_url()?>" class="text-center">I already registered. Click here!</a>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
