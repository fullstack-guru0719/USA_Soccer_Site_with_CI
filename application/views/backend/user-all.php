<?php if ($user[0]['user_group'] != 1) { return redirect('backend'); } else { ?>
<div id="content-wrapper">
  <div class="container-fluid">
    <div class="card mt-3 mb-3">
      <div class="card-header">
        <i class="fas fa-fw fa-users"></i>
         All Users 
        <div style="float: right">
          <button class="btn btn-danger delete_all_user_btn" disabled><i class="fa fa-trash-alt"></i> Delete </button>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th class="text-center" style="vertical-align: middle;"><input type="checkbox" id="check_all" name=""></th>
                <th class="text-center" style="vertical-align: middle;">Id</th>
                <th class="text-center" style="vertical-align: middle;">Username</th>
                <th class="text-center" style="vertical-align: middle;">Role</th>
                <th class="text-center" style="vertical-align: middle;">Email</th>
                <th class="text-center" style="vertical-align: middle;">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $index = 1;
                foreach ($users as $user) {
                  if ($user['user_group'] != 1) {  
              ?>
              <tr>
                <td class="text-center" style="vertical-align: middle;"><input class="check_user" type="checkbox" name="checkbox" attr-id="<?php echo $user['id']?>"></td>
                <td class="text-center" style="vertical-align: middle;"><?php echo $index; ?></td>
                <td class="text-center" style="vertical-align: middle;"><?php echo $user['username']; ?></td>
                <td class="text-center" style="vertical-align: middle;"><?php
                  foreach ($user_groups as $user_group) {
                    if($user_group['id'] == $user['user_group']) {
                      echo $user_group['role'];
                    }
                  }
                ?></td>
                <td class="text-center" style="vertical-align: middle;"><?php echo $user['email']; ?></td>
                <td class="text-center" style="vertical-align: middle;"><a href="<?php echo base_url()?>backend/users/edit_user/<?php echo $user['id']?>" class="btn blue edit_user_action" role="button"><i class="fa fa-edit"></i> Edit </a><a href="javascript:;" class="btn red del_user_action" data-toggle="modal" attr-id="<?php echo $user['id']?>" data-target="#deleteModal"><i class="fa fa-trash-alt"></i> Delete</a></td>
              </tr>
              <?php
                  $index++;
                }
              } ?>
            </tbody>
          </table>
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
                  <a class="btn btn-primary del_user_btn" href="javascript:;">Delete</a>
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