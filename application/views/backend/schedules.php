<?php if ($user[0]['user_group'] != 1 && $user[0]['user_group'] != 2) { return redirect('backend'); } else { ?>
<div id="content-wrapper">
  <div class="container-fluid">
    <div class="card mt-3 mb-3">
      <div class="card-header">
        <span style="font-size: 25px"><i class="fas fa-fw fa-calendar-minus"></i>
         All schedules </span>
        <div style="float: right">
          <a href="javascript:;" class="btn btn-success add_schedule_modal" role="button" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i> Add Manually</a>
          <a href="javascript:;" class="btn btn-primary upload_schedule_modal" role="button" data-toggle="modal" data-target="#uploadModal"><i class="fa fa-plus"></i> Upload Schedule</a>
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
                <th class="text-center" style="vertical-align: middle;">Location</th>
                <th class="text-center" style="vertical-align: middle;">Match Time</th>
                <th class="text-center" style="vertical-align: middle;">Match Type</th>
                <th class="text-center" style="vertical-align: middle;">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $index = 1;
                foreach ($schedules as $schedule) { ?>
              <tr>
                <td class="text-center" style="vertical-align: middle;"><?php echo $index; ?></td>
                <td class="text-center" style="vertical-align: middle;">
                  <?php if(!$schedule['team_id'] && $schedule['manual']):?>
                    <?php $path_info = pathinfo(FCPATH.'uploads/'.$schedule['manual']);?>
                    <?php if($path_info['extension'] == 'pdf'):?>
                      <iframe src="<?php echo site_url('uploads/'.$schedule['manual']);?>"></iframe>
                    <?php else:?>
                      <img src="<?php echo site_url('uploads/'.$schedule['manual']);?>" width="100"/>
                    <?php endif;?>
                  <?php else:?>
                    <?php 
                    foreach ($teams as $team) { 
                      if ($schedule['team_id'] == $team['id']) { ?>
                    <img src="<?php echo base_url() . $team['team_logo'];?>" style="width: 100px">
                    <?php } } ?>
                  <?php endif;?>
                </td>
                <td class="text-center" style="vertical-align: middle;">
                  <?php 
                  foreach ($teams as $team) { 
                    if ($schedule['team_id'] == $team['id']) {
                      echo $team['team_name'];
                    }
                  }
                  ?>
                </td>
                <td class="text-center" style="vertical-align: middle;"><?php echo $schedule['match_location']; ?></td>
                <td class="text-center" style="vertical-align: middle;"><?php echo $schedule['match_time']; ?></td>
                <td class="text-center" style="vertical-align: middle;"><?php echo $schedule['match_type']; ?></td>
                <td class="text-center" style="vertical-align: middle;">
                  <?php if(!$schedule['team_id'] && $schedule['manual']):?>
                   <!-- <a class="btn edit-schedule" href="javascript:;" data-id="<?php echo $schedule['id'];?>"><i class="fa fa-edit"></i> Edit</a>-->
                  <?php else:?>
                    <a href="javascript:;" class="btn blue edit_schedule_action" role="button" attr-id="<?php echo $schedule['id']?>" attr-teamLogo="
                    <?php 
                    foreach ($teams as $team) { 
                      if ($schedule['team_id'] == $team['id']) { 
                    echo base_url() . $team['team_logo'];}} ?>" attr-teamID="<?php echo $schedule['team_id']?>" attr-matchLocation="<?php echo $schedule['match_location']?>" attr-matchTime="<?php echo $schedule['match_time']?>" attr-matchType="<?php echo $schedule['match_type']?>" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i> Edit </a>
                    
                  <?php endif;?>
                   <a href="javascript:;" class="btn red del_schedule_action" data-toggle="modal" attr-id="<?php echo $schedule['id']?>" data-target="#deleteModal"><i class="fa fa-trash-alt"></i> Delete</a></td>
              </tr>
              <?php
                  $index++;
                }?>
            </tbody>
          </table>
          <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add Schedule</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body"><?php $this->load->view('backend/schedule_form');?></div>
                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-primary add_schedule_btn" href="javascript:;"> Publish </a>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content" id="upload_schedule_html">
                <?php $this->load->view('backend/schedule_upload_form');?>
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
                  <a class="btn btn-primary del_schedule_btn" href="javascript:;">Delete</a>
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