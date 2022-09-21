<?php if ($user[0]['user_group'] != 1 && $user[0]['user_group'] != 2) { return redirect('backend'); } else { ?>
<div id="content-wrapper">
  <div class="container-fluid">
    <div class="card mt-3 mb-3">
      <div class="card-header">
        <span style="font-size: 25px"><i class="fas fa-fw fa-life-ring"></i> All Teams </span>
        <div style="float: right">
          <a href="javascript:;" class="btn btn-success add_team_modal" role="button" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i> Add </a>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th class="text-center" style="vertical-align: middle;">Id</th>
                <th class="text-center" style="vertical-align: middle;">Team Logo</th>
                <th class="text-center" style="vertical-align: middle;">Team Name</th>
                <th class="text-center" style="vertical-align: middle;">Team Stadium</th>
                <th class="text-center" style="vertical-align: middle;">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $index = 1;
                foreach ($teams as $team) { 
              ?>
              <tr>
                <td class="text-center" style="vertical-align: middle;"><?php echo $index; ?></td>
                <td class="text-center" style="vertical-align: middle;"><img src="<?php echo base_url() . $team['team_logo'];?>" style="width: 100px"></td>
                <td class="text-center" style="vertical-align: middle;"><?php echo $team['team_name']; ?></td>
                <td class="text-center" style="vertical-align: middle;"><?php echo $team['stadium_name']; ?></td>
                <td class="text-center" style="vertical-align: middle;"><a href="javascript:;" class="btn blue edit_team_action" role="button" attr-id="<?php echo $team['id']?>" attr-logo="<?php echo base_url() . $team['team_logo']?>" attr-name="<?php echo $team['team_name']?>" attr-stadium="<?php echo $team['stadium_name']?>" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i> Edit </a><a href="javascript:;" class="btn red del_team_action" attr-id="<?php echo $team['id']?>" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-alt"></i> Delete</a></td>
              </tr>
              <?php
                  $index++;
              } ?>
            </tbody>
          </table>
          <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add Team</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="form-group thumbnail">
                    <label for="primary-image" class="upload-btn"><p><i class="fa fa-image"></i> Upload Team Logo</p><div class="p-image-preview"></div></label>
                    <input id="primary-image" type="file" name="photo" class="d-done" style="display: none;">
                  </div>
                  <div class="form-group">
                    <div class="form-label-group">
                      <input type="text" id="inputTeamName" class="form-control" placeholder="Team name" required="required" autofocus="autofocus">
                      <label for="inputTeamName">Team Name</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="form-label-group">
                      <input type="text" id="inputStadiumName" class="form-control" placeholder="Team Stadium" autofocus="autofocus" row="5">
                      <label for="inputStadiumName">Team Stadium</label>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-primary add_team_btn" href="javascript:;"> Register </a>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Team</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="form-group thumbnail">
                    <label for="primary-image" class="upload-btn"><p><i class="fa fa-image"></i> Upload Team Logo</p><div class="p-image-preview"></div></label>
                    <input id="primary-image" type="file" name="photo" class="d-done" style="display: none;">
                  </div>
                  <div class="form-group">
                    <div class="form-label-group">
                      <input type="text" id="editTeamName" class="form-control" placeholder="Team name" required="required" autofocus="autofocus">
                      <label for="editTeamName">Team Name</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="form-label-group">
                      <input type="text" id="editStadiumName" class="form-control" placeholder="Team Stadium" autofocus="autofocus">
                      <label for="editStadiumName">Team Stadium</label>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-primary update_team_btn" href="javascript:;"> Update </a>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ready to Delete?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-primary del_team_btn" href="javascript:;">Delete</a>
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