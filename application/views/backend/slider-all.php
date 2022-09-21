<?php if ($user[0]['user_group'] != 1 && $user[0]['user_group'] != 2) { return redirect('backend'); } else { ?>
<div id="content-wrapper">
  <div class="container-fluid">
    <div class="card mt-3 mb-3">
      <div class="card-header">
        <span style="font-size: 25px"> All Sliders </span>
        <div style="float: right">
          <a href="<?php echo base_url()?>backend/slider_manage/add_slider" role="button" class="btn btn-success" ><icon class="fa fa-plus"></icon> Add Slider</a>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th class="text-center" style="vertical-align: middle;">Id</th>
                <th class="text-center" style="vertical-align: middle;">Slider Image</th>
                <th class="text-center" style="vertical-align: middle;">Slider Title</th>
                <th class="text-center" style="vertical-align: middle;">Slider Comment</th>
                <th class="text-center" style="vertical-align: middle;">Slider Status</th>
                <th class="text-center" style="vertical-align: middle;">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $index = 1;
                foreach ($sliders as $slider) { ?>
              <tr>
                <td class="text-center" style="vertical-align: middle;"><?php echo $index; ?></td>
                <td class="text-center" style="vertical-align: middle;">
                  <?php if(!empty($slider['slider_url'])):?>
                  <img src="<?php echo base_url() . $slider['slider_url'];?>" style="width: 100px">
                  <?php else:?>
                    N/A
                  <?php endif;?>
                </td>
                <td class="text-center" style="vertical-align: middle;"><?php echo $slider['slider_title'] ? $slider['slider_title']: 'N/A'; ?></td>
                <td class="text-center" style="vertical-align: middle;"><?php echo $slider['slider_content'] ? $slider['slider_content']: 'N/A'; ?></td>
                <td class="text-center" style="vertical-align: middle;"><input class="toggle_slider_status" attr-id="<?php echo $slider['id']?>" type="checkbox" <?php echo ($slider['slider_status'] == '1') ? 'checked' : '' ?> data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="Active" data-off="Inactive"></td>
                <td class="text-center" style="vertical-align: middle;"><a href="<?php echo base_url()?>backend/slider_manage/edit_slider/<?php echo $slider['id']?>" class="btn blue edit_slider_action" role="button"><i class="fa fa-edit"></i> Edit </a><a href="javascript:;" class="btn red del_slider_action" data-toggle="modal" attr-id="<?php echo $slider['id']?>" data-target="#deleteModal"><i class="fa fa-trash-alt"></i> Delete</a></td>
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
                  <a class="btn btn-primary del_slider_btn" href="javascript:;">Delete</a>
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