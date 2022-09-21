<?php if ($user[0]['user_group'] != 1) { return redirect('backend'); } else { ?>
<div id="content-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6">
        <div class="card mb-3">
          <div class="card-header">
            <span style="font-size: 25px"><i class="fas fa-fw fa-bullhorn"></i> All Fees </span>
            <div style="float: right">
              <a href="javascript:;" class="btn btn-success add_fee_action" role="button" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i> Add </a>
              <button class="btn btn-danger delete_all_fees_btn" disabled><i class="fa fa-trash-alt"></i> Delete </button>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th class="text-center" style="vertical-align: middle;"><input type="checkbox" id="check_all" name=""></th>
                    <th class="text-center" style="vertical-align: middle;">Fee Name</th>
                    <th class="text-center" style="vertical-align: middle;">Fee Cost</th>
                    <th class="text-center" style="vertical-align: middle;">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $index = 1;
                    foreach ($fees as $fee) {
                  ?>
                  <tr>
                    <td class="text-center" style="vertical-align: middle;"><input class="check_user" type="checkbox" name="checkbox" attr-id="<?php echo $fee['id']?>"></td>
                    <td class="text-center" style="vertical-align: middle;"><?php echo $fee['fee_name']; ?></td>
                    <td class="text-center" style="vertical-align: middle;"><?php echo $fee['cost']; ?></td>
                    <td class="text-center" style="vertical-align: middle;"><a href="javascript:;" class="btn blue edit_fee_action" role="button" attr-id="<?php echo $fee['id']?>" attr-name="<?php echo $fee['fee_name']?>" attr-cost="<?php echo $fee['cost']?>" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i> Edit </a><a href="javascript:;" class="btn red del_fee_action" attr-id="<?php echo $fee['id']?>" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-alt"></i> Delete</a></td>
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
                      <h5 class="modal-title" id="exampleModalLabel">Add Fee</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <div class="form-label-group">
                          <input type="text" id="inputName" class="form-control" placeholder="Fee Name" required="required">
                          <label for="inputName">Fee Name</label>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-label-group">
                          <input type="number" id="inputCost" class="form-control" placeholder="Fee Cost" min="0" required>
                          <label for="inputCost">Fee Cost</label>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                      <a class="btn btn-primary add_fee_btn" href="javascript:;"> Publish </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit Fee</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="form-label-group">
                              <input type="text" id="editName" class="form-control" placeholder="Fee Name" required="required">
                              <label for="editName">Fee Name</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                              <input type="number" id="editCost" class="form-control" placeholder="Fee Cost" min="0" required>
                              <label for="editCost">Fee Cost</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                      <a class="btn btn-primary update_fee_btn" href="javascript:;">Update</a>
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
                      <a class="btn btn-primary del_fee_btn" href="javascript:;">Delete</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card mt=5 mb-3">
          <div class="card-header">
            <select id="put_fee_select">
              <?php
                $index = 1;
                foreach ($fees as $fee) {
              ?>
              <option value="<?php echo $fee['id']?>" <?php echo ($fee['id'] == $fee_id) ? 'selected' : '' ?>><?php echo $fee['fee_name']?></option>
              <?php
                $index++;
              } ?>
            </select>
            <div style="float: right">
              <button class="btn btn-danger put_fee_btn" disabled><i class="fa fa-plus"></i> Post Fee </button>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th class="text-center" style="vertical-align: middle;"><input type="checkbox" id="check_all_player" name=""></th>
                    <th class="text-center" style="vertical-align: middle;">Full Name</th>
                    <th class="text-center" style="vertical-align: middle;">Email</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    foreach ($players as $player) {
                  ?>
                  <tr>
                    <td class="text-center" style="vertical-align: middle;"><input class="check_player" type="checkbox" name="checkbox" attr-id="<?php echo $player['id']?>"></td>
                    <td class="text-center" style="vertical-align: middle;"><?php echo $player['username']; ?></td>
                    <td class="text-center" style="vertical-align: middle;"><?php echo $player['email']; ?></td>
                  </tr>
                  <?php
                    } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>