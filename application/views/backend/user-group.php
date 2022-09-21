<?php if ($user[0]['user_group'] != 1) { return redirect('backend'); } else { ?>
<div id="content-wrapper">
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card mt-3 mb-3">
              <div class="card-header">
                <h3> All Roles </h3>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th class="text-center" style="vertical-align: middle;">Id</th>
                        <th class="text-center" style="vertical-align: middle;">Role</th>
                        <th class="text-center" style="vertical-align: middle;">Description</th>
                        <th class="text-center" style="vertical-align: middle;">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $index = 1;
                        foreach ($user_groups as $user_group) {
                          if($user_group['id'] != 1) {
                      ?>
                      <tr>
                        <td class="text-center" style="vertical-align: middle;"><?php echo $index; ?></td>
                        <td class="text-center" style="vertical-align: middle;"><?php echo $user_group['role']; ?></td>
                        <td class="text-center" style="vertical-align: middle;"><?php echo $user_group['description']; ?></td>
                        <td class="text-center" style="vertical-align: middle;"><a href="javascript:;" class="btn blue edit_role_action" role="button" attr-id="<?php echo $user_group['id']?>" attr-role="<?php echo $user_group['role']?>" attr-description="<?php echo $user_group['description']?>" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i> Edit </a><!-- <a href="javascript:;" class="btn red del_role_action" attr-id="<?php echo $user_group['id']?>" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-alt"></i> Delete</a> --></td>
                      </tr>
                      <?php
                          $index++;
                        }
                      } ?>
                    </tbody>
                  </table>
                  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit Role</h5>
                          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="form-label-group">
                                  <input type="text" id="editRoleName" class="form-control" placeholder="Role name" required="required" autofocus="autofocus">
                                  <label for="editRoleName">Role Name</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                  <input type="text" id="editDescription" class="form-control" placeholder="Description" required="required">
                                  <label for="editDescription">Description</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                          <a class="btn btn-primary update_role_btn" href="javascript:;">Update</a>
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
                          <a class="btn btn-primary del_role_btn" href="javascript:;">Delete</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <h4 style="text-align: center; margin: 20px">Add Role</h4>
                <form class="add-role-form">
                  <div class="form-group">
                    <div class="form-label-group">
                      <input type="text" id="inputRoleName" class="form-control" placeholder="Role name" required="required" autofocus="autofocus">
                      <label for="inputRoleName">Role Name</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="form-label-group">
                      <input type="text" id="inputDescription" class="form-control" placeholder="Description" required="required">
                      <label for="inputDescription">Description</label>
                    </div>
                  </div>
                  <button class="btn btn-primary btn-block" id="add_role_btn" type="submit">Add Role</button>
                </form>
              </div>
            </div>
        </div>
    </div>
            
  </div>
</div>
<?php } ?>