<?php if ($user[0]['user_group'] != 1) { return redirect('backend'); } else { ?>
<div id="content-wrapper">
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card mt-3 mb-3">
              <div class="card-header">
                <h3> All Sizes </h3>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th class="text-center" style="vertical-align: middle;">Id</th>
                        <th class="text-center" style="vertical-align: middle;">Size</th>
                        <th class="text-center" style="vertical-align: middle;">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $index = 1;
                        foreach ($sizes as $key => $size) {
                      ?>
                      <tr>
                        <td class="text-center" style="vertical-align: middle;"><?php echo $index; ?></td>
                        <td class="text-center" style="vertical-align: middle;"><?php echo $size['size_name']; ?></td>
                        <td class="text-center" style="vertical-align: middle;"><a href="javascript:;" class="btn blue edit_size_action" role="button" attr-id="<?php echo $size['id']?>" attr-name="<?php echo $size['size_name']?>" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i> Edit </a><a href="javascript:;" class="btn red del_size_action" attr-id="<?php echo $size['id']?>" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-alt"></i> Delete</a></td>
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
                          <h5 class="modal-title" id="exampleModalLabel">Edit Size</h5>
                          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="form-label-group">
                                  <input type="text" id="editSizeName" class="form-control" placeholder="Size Name" required="required" autofocus="autofocus">
                                  <label for="editSizeName">Size Name</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                          <a class="btn btn-primary update_size_btn" href="javascript:;">Update</a>
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
                          <a class="btn btn-primary del_size_btn" href="javascript:;">Delete</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <h4 style="text-align: center; margin: 20px">Add Size</h4>
                <form class="add-size-form">
                  <div class="form-group">
                    <div class="form-label-group">
                      <input type="text" id="inputSizeName" class="form-control" placeholder="Size name" required="required" autofocus="autofocus">
                      <label for="inputSizeName">Size Size</label>
                    </div>
                  </div>
                  <button class="btn btn-primary btn-block" id="add_size_btn" type="submit">Add Size</button>
                </form>
              </div>
            </div>
        </div>
    </div>
            
  </div>
</div>
<?php } ?>