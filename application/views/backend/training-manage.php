<?php if ($user[0]['user_group'] != 1 && $user[0]['user_group'] != 2) { return redirect('backend'); } else { ?>
<div id="content-wrapper">
  <div class="container-fluid">
    <div class="card mt-3 mb-3">
      <div class="card-header">
        <span style="font-size: 25px"><i class="fas fa-fw fa-calendar-minus"></i>
         All trainings </span>
        <div style="float: right">
          <a href="javascript:;" class="btn btn-success add_training_modal" role="button" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i> Add </a>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th class="text-center" style="vertical-align: middle;">Id</th>
                <th class="text-center" style="vertical-align: middle;">Training Name</th>
                <th class="text-center" style="vertical-align: middle;">Location</th>
                <th class="text-center" style="vertical-align: middle;">Start Time</th>
                <th class="text-center" style="vertical-align: middle;">Duration</th>
                <th class="text-center" style="vertical-align: middle;">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $index = 1;
                foreach ($trainings as $training) { ?>
              <tr>
                <td class="text-center" style="vertical-align: middle;"><?php echo $index; ?></td>
                <td class="text-center" style="vertical-align: middle;"><?php echo $training['training_name']; ?></td>
                <td class="text-center" style="vertical-align: middle;"><?php echo $training['training_location']; ?></td>
                <td class="text-center" style="vertical-align: middle;"><?php echo $training['start_datetime']; ?></td>
                <td class="text-center" style="vertical-align: middle;"><?php echo $training['training_duration']; ?></td>
                <td class="text-center" style="vertical-align: middle;"><a href="javascript:;" class="btn blue edit_training_action" role="button" attr-id="<?php echo $training['id']?>" attr-name="<?php echo $training['training_name']?>" attr-location="<?php echo $training['training_location']?>" attr-startDateTime="<?php echo $training['start_datetime']?>" attr-duration="<?php echo $training['training_duration']?>" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i> Edit </a><a href="javascript:;" class="btn red del_training_action" data-toggle="modal" attr-id="<?php echo $training['id']?>" data-target="#deleteModal"><i class="fa fa-trash-alt"></i> Delete</a></td>
              </tr>
              <?php
                  $index++;
                }?>
            </tbody>
          </table>
          <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add Training</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-sm-12 col-md-12">
                      <div class="form-group">
                        <div class="form-label-group">
                          <input type="text" id="inputTrainingName" class="form-control" placeholder="Training Name" required="required" autofocus="autofocus">
                          <label for="inputTrainingName">Training Name</label>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-label-group">
                          <input type="text" id="inputTrainingLocation" class="form-control" placeholder="Training Location" required="required" autofocus="autofocus">
                          <label for="inputTrainingLocation">Training Location</label>
                        </div>
                      </div>
                      <br/>
                      <p> Enter Training Starting Date and Time: </p>
                      <div class="form-group">
                        <input id="datepicker" required="required" />
                      </div>
                      <div class="form-group">
                        <div class="form-label-group">
                          <input type="text" id="inputTrainingDuration" class="form-control" placeholder="Training Duration" required="required" autofocus="autofocus">
                          <label for="inputTrainingDuration">Training Duration</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a href="javascript:;" class="btn btn-primary add_training_btn"> Publish </a>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Training</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-sm-12 col-md-12">
                      <div class="form-group">
                        <div class="form-label-group">
                          <input type="text" id="editTrainingName" class="form-control" placeholder="Training Name" required="required" autofocus="autofocus">
                          <label for="editTrainingName">Training Name</label>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-label-group">
                          <input type="text" id="editTrainingLocation" class="form-control" placeholder="Training Location" required="required" autofocus="autofocus">
                          <label for="editTrainingLocation">Training Location</label>
                        </div>
                      </div>
                      <br/>
                      <p> Enter Training Starting Date and Time: </p>
                      <div class="form-group">
                        <input id="datepicker1" required="required" />
                      </div>
                      <div class="form-group">
                        <div class="form-label-group">
                          <input type="text" id="editTrainingDuration" class="form-control" placeholder="Training Duration" required="required" autofocus="autofocus">
                          <label for="editTrainingDuration">Training Duration</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-primary update_training_btn" href="javascript:;">Update</a>
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
                  <a href="javascript:;" class="btn btn-primary del_training_btn">Delete</a>
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