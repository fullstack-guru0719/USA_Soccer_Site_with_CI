<?php if ($user[0]['user_group'] != 1 && $user[0]['user_group'] != 2) { return redirect('backend'); } else { ?>
<div id="content-wrapper">
  <div class="container-fluid">
    <div class="card mt-3 mb-3">
      <div class="card-header">
        <span style="font-size: 25px"> All Results </span>
        <div style="float: right">
          <a href="<?php echo base_url()?>backend/latest_result/add_result" role="button" class="btn btn-success" ><icon class="fa fa-plus"></icon> Add </a>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th class="text-center" style="vertical-align: middle;">Id</th>
                <th class="text-center" style="vertical-align: middle;">Match Result</th>
                <th class="text-center" style="vertical-align: middle;">Team Name</th>
                <th class="text-center" style="vertical-align: middle;">Match Type</th>
                <th class="text-center" style="vertical-align: middle;">Match Time</th>
                <th class="text-center" style="vertical-align: middle;">Match Location</th>
                <th class="text-center" style="vertical-align: middle;">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $index = 1;
                foreach ($results as $result) { ?>
              <tr>
                <td class="text-center" style="vertical-align: middle;"><?php echo $index; ?></td>
                <td class="text-center" style="vertical-align: middle;"><?php echo $result['match_result'];?></td>
                <td class="text-center" style="vertical-align: middle;">
                  <?php 
                  foreach ($teams as $team) { 
                    if ($result['team_id'] == $team['id']) { ?>
                  <?php echo $team['team_name'];?>
                  <?php } } ?>
                </td>
                <td class="text-center" style="vertical-align: middle;"><?php echo $result['match_type'];?></td>
                <td class="text-center" style="vertical-align: middle;"><?php echo $result['match_time'];?></td>
                <td class="text-center" style="vertical-align: middle;"><?php echo $result['match_location'];?></td>
               <td class="text-center" style="vertical-align: middle;"><a href="javascript:;" class="btn red del_result_action" data-toggle="modal" attr-id="<?php echo $result['id']?>" data-target="#deleteModal"><i class="fa fa-trash-alt"></i> Delete</a></td>
              </tr>
              <?php
                  $index++;
                }?>
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
                  <a class="btn btn-primary del_result_btn" href="javascript:;">Delete</a>
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