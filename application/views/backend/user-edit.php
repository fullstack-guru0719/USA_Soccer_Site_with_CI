<?php if ($user[0]['user_group'] != 1) { return redirect('backend'); } else { ?>
<div id="content-wrapper">
  <div class="container-fluid">
    <div class="card card-register mx-auto mt-5 mb-3">
      <div class="card-header">Edit User</div>
      <div class="card-body">
        <form class="edit-user-form">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="editFullName" class="form-control" placeholder="Full name" required="required" autofocus="autofocus" value="<?php echo $edit_user[0]['fullname']; ?>">
              <label for="editFullName">Full Name</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="editEmail" class="form-control" placeholder="Email address" required="required" value="<?php echo $edit_user[0]['email']; ?>">
              <label for="editEmail">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="editAddress" class="form-control" placeholder="Address" required="required" value="<?php echo $edit_user[0]['address']; ?>">
              <label for="editAddress">Address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="editPhone" class="form-control" placeholder="Phone" required="required" value="<?php echo $edit_user[0]['phone']; ?>">
                  <label for="editPhone">Phone</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="editAge" class="form-control" placeholder="Age" required="required" value="<?php echo $edit_user[0]['age']; ?>">
                  <label for="editAge">Age</label>
                </div>
              </div>
            </div>
          </div>
          <br/>
          <p> Enter your account details below: </p>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="editUsername" class="form-control" placeholder="Username" required="required" value="<?php echo $edit_user[0]['username']; ?>">
                  <label for="editUsername">Username</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <select class="form-control" id="editUsergroup" style="font-size: 23px">
                    <?php
                    foreach ($user_groups as $user_group) { 
                      if ($user_group['id'] != 1) { ?>
                    <option <?php if ($edit_user[0]['user_group'] == $user_group['id'] ) echo 'selected' ; ?> value="<?php echo $user_group['id']; ?>"><?php echo $user_group['role']; ?></option>
                    <?php 
                      }
                    } ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="editPassword" class="form-control" placeholder="Password" required="required">
                  <label for="editPassword">Password</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="editConfirmPassword" class="form-control" placeholder="Confirm password" required="required">
                  <label for="editConfirmPassword">Confirm password</label>
                </div>
              </div>
            </div>
          </div>
          <button class="btn btn-primary btn-block" id="update_user_btn" attr-id="<?php echo $edit_user[0]['id']; ?>" type="submit">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php } ?>