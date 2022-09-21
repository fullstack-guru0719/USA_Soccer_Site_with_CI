<?php if ($user[0]['user_group'] == 4) { return redirect('backend'); } else { ?>
<div id="content-wrapper">
  <div class="container-fluid">
    <div class="card mt-3 mb-3">
      <div class="card-header">
        <i class="fas fa-fw fa-money-check-alt"></i> All Payment Status 
        <div style="float: right">
          <button class="btn btn-danger delete_all_acheive_btn" disabled><i class="fa fa-trash-alt"></i> Delete </button>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th class="text-center" style="vertical-align: middle;"><input type="checkbox" id="check_all" name=""></th>
                <th class="text-center" style="vertical-align: middle;">Username</th>
                <th class="text-center" style="vertical-align: middle;">Full Name</th>
                <th class="text-center" style="vertical-align: middle;">Member Type</th>
                <th class="text-center" style="vertical-align: middle;">Fee Name</th>
                <th class="text-center" style="vertical-align: middle;">Status</th>
                <th class="text-center" style="vertical-align: middle;">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $index = 1;
                foreach ($statuses as $status) { 
                  foreach ($players as $player) { 
                    if ($status['user_id'] != $player['id'])
                      continue;
              ?>
              <tr>
                <td class="text-center" style="vertical-align: middle;"><input class="check_user" type="checkbox" name="checkbox" attr-id="<?php echo $status['id']?>"></td>
                <td class="text-center" style="vertical-align: middle;"><?php echo $player['username']; ?></td>
                <td class="text-center" style="vertical-align: middle;"><?php echo $player['fullname']; ?></td>
                <td class="text-center" style="vertical-align: middle;"><?php echo $player['member_type']; ?></td>
                <td class="text-center" style="vertical-align: middle;">
                  <?php foreach ($fees as $fee) {
                    if ($fee['id'] != $status['fee_id'])
                      continue;
                    echo $fee['fee_name'];
                  } ?>
                </td>
                <td class="text-center" style="vertical-align: middle;">
                  <span style="font-size: 15px;" class="badge badge-pill badge-success">Paid</span>
                </td>
                <td class="text-center" style="vertical-align: middle;"><?php if ($user[0]['user_group'] == 1) { ?><a href="javascript:;" class="btn red del_acheive_action" attr-id="<?php echo $status['id']?>" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-alt"></i> Delete</a><?php } ?></td>
              </tr>
              <?php
                  }
                $index++;
              } ?>
            </tbody>
          </table>
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
                <a class="btn btn-primary del_acheive_btn" href="javascript:;">Delete</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>