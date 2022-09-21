<?php if ($user[0]['user_group'] != 1) { return redirect('backend'); } else { ?>
<div id="content-wrapper">
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card mt-3 mb-3">
              <div class="card-header">
                <h3> All TNCs </h3>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th class="text-center" style="vertical-align: middle;">Id</th>
                        <th class="text-center" style="vertical-align: middle;">Title</th>
                        <th class="text-center" style="vertical-align: middle;">Content</th>
                        <th class="text-center" style="vertical-align: middle;">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $index = 1;
                        foreach ($tncs as $tnc) {
                      ?>
                      <tr>
                        <td class="text-center" style="vertical-align: middle;"><?php echo $index; ?></td>
                        <td class="text-center" style="vertical-align: middle;"><?php echo $tnc['tnc_title']; ?></td>
                        <td class="text-center" style="vertical-align: middle;"><?php echo substr($tnc['tnc_content'], 0, 40) . '...'; ?></td>
                        <td class="text-center" style="vertical-align: middle;"><a href="javascript:;" class="btn blue edit_tncs_action" role="button" attr-id="<?php echo $tnc['id']?>" attr-title="<?php echo $tnc['tnc_title']?>" attr-content="<?php echo $tnc['tnc_content']?>" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i> Edit </a><a href="javascript:;" class="btn red del_tncs_action" attr-id="<?php echo $tnc['id']?>" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-alt"></i> Delete</a></td>
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
                          <h5 class="modal-title" id="exampleModalLabel">Edit Role</h5>
                          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="form-label-group">
                                  <input type="text" id="editTitle" class="form-control" placeholder="TNC Title" required="required" autofocus="autofocus">
                                  <label for="editTitle">TNC Title</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                  <input type="text" id="editContent" class="form-control" placeholder="TNC Content" required="required">
                                  <label for="editContent">TNC Content</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                          <a class="btn btn-primary update_tncs_btn" href="javascript:;">Update</a>
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
                          <a class="btn btn-primary del_tncs_btn" href="javascript:;">Delete</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <h4 style="text-align: center; margin: 20px">Add TNC</h4>
                <form class="add-tncs-form">
                  <div class="form-group">
                    <div class="form-label-group">
                      <input type="text" id="inputTitle" class="form-control" placeholder="TNC Title" required="required" autofocus="autofocus">
                      <label for="inputTitle">TNC Title</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="form-label-group">
                      <input type="text" id="inputContent" class="form-control" placeholder="TNC Content" required="required">
                      <label for="inputContent">TNC Content</label>
                    </div>
                  </div>
                  <button class="btn btn-primary btn-block" id="add_tncs_btn" type="submit">Add Role</button>
                </form>
              </div>
            </div>
        </div>
    </div>
            
  </div>
</div>
<?php } ?>