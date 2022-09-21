<?php if ($user[0]['user_group'] != 1 && $user[0]['user_group'] != 2) { return redirect('backend'); } else { ?>
<div id="content-wrapper">
  <div class="container-fluid">
    <div class="card mt-3 mb-3">
      <div class="card-header">
        <span style="font-size: 25px"><i class="fas fa-fw fa-users"></i> All Players </span>
        <div style="float: right">
          <a href="<?php echo base_url()?>backend/add_player" role="button" class="btn btn-primary" ><icon class="fa fa-plus"></icon> Add Player</a>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th class="text-center" style="vertical-align: middle;">Id</th>
                <th class="text-center" style="vertical-align: middle;">Full Name</th>
                <th class="text-center" style="vertical-align: middle;">Email</th>
                <th class="text-center" style="vertical-align: middle;">Experience</th>
                <th class="text-center" style="vertical-align: middle;">Total Goals</th>
                <th class="text-center" style="vertical-align: middle;">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $index = 1;
                foreach ($players as $player) { 
              ?>
              <tr>
                <td class="text-center" style="vertical-align: middle;"><?php echo $index; ?></td>
                <td class="text-center" style="vertical-align: middle;"><?php echo $player['fullname']; ?></td>
                <td class="text-center" style="vertical-align: middle;"><?php echo $player['email']; ?></td>
                <td class="text-center" style="vertical-align: middle;"><?php echo $player['experience']; ?></td>
                <td class="text-center" style="vertical-align: middle;"><?php echo $player['total_goals']; ?></td>
                <td class="text-center" style="vertical-align: middle;">
                  <a href="<?php echo site_url('backend/add_player/'.$player['id']);?>" class="btn btn-success btn-sm">
                      <i class="fa fa-edit"></i> Edit 
                  </a>
                </td>
              </tr>
              <?php
                  $index++;
              } ?>
            </tbody>
          </table>
          <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Player</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="form-group thumbnail">
                      <img id="editPlayerPhoto" style="width: 100%">
                    </div>
                    <div class="form-group">
                        <div class="form-label-group text-center">
                          <p id="editPlayerName" style="font-size: 25px"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                          <p> Select Member Type: </p>
                          <select class="form-control" id="editMemberType" style="font-size: 23px">
                            <option value="Other" > Other </option>
                            <option value="Main" > Main </option>
                            <option value="Substitus" > Substitus </option>
                          </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                          <input type="text" id="editPlayerPosition" class="form-control" placeholder="Player position" >
                          <label for="editPlayerPosition">Player Position</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                          <input type="number" id="editSumGoal" class="form-control" placeholder="Sum of Goals" >
                          <label for="editSumGoal">Sum of Goals</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                          <input name="height" type="number" id="height" class="form-control" placeholder="Height">
                          <label for="height">Height</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                          <input name="weight" type="number" id="weight" class="form-control" placeholder="Weight">
                          <label for="weight">Weight</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                          <input name="dob" type="date" id="dob" class="form-control" placeholder="Date of birth">
                          <label for="dob">Date of Birth</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                          <input name="player_position" type="text" id="player_position" class="form-control" placeholder="Player Position">
                          <label for="player_position">Position</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                          <input name="position_side" type="text" id="position_side" class="form-control" placeholder="Position Side">
                          <label for="position_side">Position Side</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                          <input name="player_status" type="text" id="player_status" class="form-control" placeholder="Player Status">
                          <label for="player_status">Player Status</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-primary update_player_btn" href="javascript:;">Update</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>