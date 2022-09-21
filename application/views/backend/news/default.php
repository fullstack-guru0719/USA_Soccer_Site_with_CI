<?php if ($user[0]['user_group'] != 1 && $user[0]['user_group'] != 2) { return redirect('backend'); } else { ?>
<div id="content-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-8 offset-lg-2">
        <div class="card mt-3 mb-3">
          <div class="card-header">
            <span style="font-size: 25px"><i class="fas fa-fw fa-bullhorn"></i> All News </span>
            <div style="float: right">
              <a href="<?php echo site_url('backend/create_news');?>" class="btn btn-success add_news_modal">
                <i class="fa fa-plus"></i> Add 
              </a>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th class="text-center" style="vertical-align: middle;">Id</th>
                    <th class="text-center" style="vertical-align: middle;">News Photo</th>
                    <th class="text-center" style="vertical-align: middle;">News Title</th>
                    <th class="text-center" style="vertical-align: middle;">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $index = 1;
                    foreach ($news as $new) {
                  ?>
                  <tr>
                    <td class="text-center" style="vertical-align: middle;"><?php echo $index; ?></td>
                    <td class="text-center" style="vertical-align: middle;"><img src="<?php echo base_url() . $new['news_logo'];?>" style="width: 100px"></td>
                    <td class="text-center" style="vertical-align: middle;"><?php echo $new['news_title']; ?></td>
                    <td class="text-center" style="vertical-align: middle;">
                      <a href="<?php echo site_url('backend/create_news/'.$new['id']);?>" class="btn blue edit_news_action">
                        <i class="fa fa-edit"></i> Edit 
                      </a>
                      <a href="javascript:;" class="btn red del_news_action" attr-id="<?php echo $new['id']?>" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-alt"></i> Delete</a></td>
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
                      <h5 class="modal-title" id="exampleModalLabel">Add News</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group thumbnail">
                        <label for="primary-image" class="upload-btn"><p><i class="fa fa-image"></i> Upload News Image </p><div class="p-image-preview"></div></label>
                        <input id="primary-image" type="file" name="photo" class="d-done" style="display: none;">
                      </div>
                      <div class="form-group">
                        <div class="form-label-group">
                          <input type="text" id="inputTitle" class="form-control" placeholder="Title" required="required">
                          <label for="inputTitle">News Title</label>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-label-group">
                          <input type="text" id="inputDescription" class="form-control" placeholder="Description" required="required">
                          <label for="inputDescription">News Description</label>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                      <a class="btn btn-primary add_news_btn" href="javascript:;"> Publish </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit News</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group thumbnail">
                          <label for="primary-image" class="upload-btn"><p><i class="fa fa-image"></i> Upload News Image </p><div class="p-image-preview"></div></label>
                          <input id="primary-image" type="file" name="photo" class="d-done" style="display: none;">
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                              <input type="text" id="editTitle" class="form-control" placeholder="Title" required="required">
                              <label for="editTitle">News Title</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                              <input type="text" id="editDescription" class="form-control" placeholder="Description" required="required">
                              <label for="editDescription">News Description</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                      <a class="btn btn-primary update_news_btn" href="javascript:;">Update</a>
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
                      <a class="btn btn-primary del_news_btn" href="javascript:;">Delete</a>
                    </div>
                  </div>
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