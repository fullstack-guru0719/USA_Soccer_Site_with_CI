<?php if ($user[0]['user_group'] != 1) { return redirect('backend'); } else { ?>
<div id="content-wrapper">
  <div class="container-fluid">
    <div class="card card-register mx-auto mt-5 mb-3">
      <div class="card-header">Add User</div>
      <div class="card-body">
        <form class="add-user-form">
          <div class="form-group">
            <div class="form-label-group">
              <input name="fullname" type="text" id="inputFullName" class="form-control" placeholder="Full name" required="required" autofocus="autofocus">
              <label for="inputFullName">Full Name</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input name="email"  type="email" id="inputEmail" class="form-control" placeholder="Email address" required="required">
              <label for="inputEmail">Email address</label>
            </div>
          </div>
          <br/>
          <p> Enter your account details below: </p>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input name="username" type="text" id="inputUsername" class="form-control" placeholder="Username" required="required">
                  <label for="inputUsername">Username</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <select class="form-control" id="inputUsergroup" style="font-size: 23px">
                    <?php foreach ($user_groups as $user_group) { 
                      if ($user_group['id'] != 1) { ?>
                    <option value="<?php echo $user_group['id']; ?>"><?php echo $user_group['role']; ?></option>
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
                  <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
                  <label for="inputPassword">Password</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="inputConfirmPassword" class="form-control" placeholder="Confirm password" required="required">
                  <label for="inputConfirmPassword">Confirm password</label>
                </div>
              </div>
            </div>
          </div>
          <span id="player-form-fields" class="d-none">
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input name="height" type="number" id="height" class="form-control" placeholder="Height">
                    <label for="height">Height</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input name="weight" type="number" id="weight" class="form-control" placeholder="Weight">
                    <label for="weight">Weight</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input name="dob" type="date" id="dob" class="form-control" placeholder="Date of birth">
                    <label for="dob">Date of Birth</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input name="player_position" type="text" id="player_position" class="form-control" placeholder="Player Position">
                    <label for="player_position">Position</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input name="position_side" type="text" id="position_side" class="form-control" placeholder="Position Side">
                    <label for="position_side">Position Side</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input name="player_status" type="text" id="player_status" class="form-control" placeholder="Player Status">
                    <label for="player_status">Player Status</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <button class="btn btn-primary btn-block" id="add_user_btn" type="submit">Register</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php } ?>