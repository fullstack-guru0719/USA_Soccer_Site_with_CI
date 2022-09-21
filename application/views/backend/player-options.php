<?php if ($user[0]['user_group'] != 1) { return redirect('backend'); } else { ?>
<div id="content-wrapper">
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card mt-3 mb-3">
              <div class="card-header">
                <h3> All Options </h3>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th class="text-center" style="vertical-align: middle;">Id</th>
                        <th class="text-center" style="vertical-align: middle;">Option</th>
                        <th class="text-center" style="vertical-align: middle;">Description</th>
                        <th class="text-center" style="vertical-align: middle;">Cost</th>
                        <th class="text-center" style="vertical-align: middle;">Status</th>
                        <th class="text-center" style="vertical-align: middle;">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $index = 1;
                        foreach ($player_options as $player_option) {
                      ?>
                      <tr>
                        <td class="text-center" style="vertical-align: middle;"><?php echo $index; ?></td>
                        <td class="text-center" style="vertical-align: middle;"><?php echo $player_option['option']; ?></td>
                        <td class="text-center" style="vertical-align: middle;"><?php echo $player_option['description']; ?></td>
                        <td class="text-center" style="vertical-align: middle;"><?php echo $player_option['cost']; ?></td>
                        <td class="text-center" style="vertical-align: middle;"><input class="toggle_option_status" attr-id="<?php echo $player_option['id']?>" type="checkbox" <?php echo ($player_option['status'] == '1') ? 'checked' : '' ?> data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="Active" data-off="Inactive"></td>
                        <td class="text-center" style="vertical-align: middle;"><a href="javascript:;" class="btn blue edit_option_action" role="button" attr-id="<?php echo $player_option['id']?>" attr-option="<?php echo $player_option['option']?>" attr-description="<?php echo $player_option['description']?>" attr-cost="<?php echo $player_option['cost']?>" attr-status="<?php echo $player_option['status']?>" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i> Edit </a><a href="javascript:;" class="btn red del_option_action" attr-id="<?php echo $player_option['id']?>" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-alt"></i> Delete</a></td>
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
                          <h5 class="modal-title" id="exampleModalLabel">Edit Option</h5>
                          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-6">
                              <div class="form-group">
                                  <div class="form-label-group">
                                    <input type="text" id="editOptionName" class="form-control" placeholder="Option Name" required="required" autofocus="autofocus">
                                    <label for="editOptionName">Option Name</label>
                                  </div>
                              </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6">
                              <div class="form-group">
                                <div class="form-label-group">
                                  <!-- <p> Select Option Status: </p> -->
                                  <select class="form-control" id="editOptionStatus" style="font-size: 23px">
                                    <option value="0" >Disable</option>
                                    <option value="1" >Enable</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                              <div class="form-label-group">
                                <input type="text" id="editDescription" class="form-control" placeholder="Description" required="required">
                                <label for="editDescription">Description</label>
                              </div>
                          </div>
                          <div class="form-group">
                            <div class="form-label-group">
                              <input type="number" id="editCost" class="form-control" placeholder="Cost" min="0" autofocus="autofocus" required>
                              <label for="editCost">Cost</label>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                          <a class="btn btn-primary update_option_btn" href="javascript:;">Update</a>
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
                          <a class="btn btn-primary del_option_btn" href="javascript:;">Delete</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <h4 style="text-align: center; margin: 20px">Add Option</h4>
                <form class="add-option-form">
                  <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-6">
                      <div class="form-group">
                        <div class="form-label-group">
                          <input type="text" id="inputOptionName" class="form-control" placeholder="Option Name" required="required" autofocus="autofocus">
                          <label for="inputOptionName">Option Name</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6">
                      <div class="form-group">
                        <div class="form-label-group">
                          <!-- <p> Select Option Status: </p> -->
                          <select class="form-control" id="inputOptionStatus" style="font-size: 23px">
                            <option value="0">Disable</option>
                            <option value="1">Enable</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-6">
                      <div class="form-group">
                        <div class="form-label-group">
                          <input type="text" id="inputDescription" class="form-control" placeholder="Description" required="required">
                          <label for="inputDescription">Description</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6">
                      <div class="form-group">
                        <div class="form-label-group">
                          <input type="number" id="inputCost" class="form-control" placeholder="Cost" min="0" autofocus="autofocus" value="0">
                          <label for="inputCost">Cost</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <button class="btn btn-primary btn-block" id="add_option_btn" type="submit">Add Option</button>
                </form>
              </div>
            </div>
        </div>
    </div>
            
  </div>
</div>
<?php } ?>