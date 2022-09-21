<?php if ($user[0]['user_group'] != 1 && $user[0]['user_group'] != 2) { return redirect('backend'); } else { ?>
<div id="content-wrapper">
  <div class="container-fluid">
    <div class="card mt-3 mb-3">
      <div class="card-header">
        <span style="font-size: 25px"><i class="fas fa-fw fa-calendar-minus"></i>
         All tournaments </span>
        <div style="float: right">
          <a href="javascript:;" class="btn btn-success add_tournament_modal" role="button" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i> Add </a>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th class="text-center" style="vertical-align: middle;">Id</th>
                <th class="text-center" style="vertical-align: middle;">Tournament Name</th>
                <th class="text-center" style="vertical-align: middle;">Location</th>
                <th class="text-center" style="vertical-align: middle;">Start Time</th>
                <th class="text-center" style="vertical-align: middle;">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $index = 1;
                foreach ($tournaments as $tournament) { ?>
              <tr>
                <td class="text-center" style="vertical-align: middle;"><?php echo $index; ?></td>
                <td class="text-center" style="vertical-align: middle;"><?php echo $tournament['tournament_name']; ?></td>
                <td class="text-center" style="vertical-align: middle;"><?php echo $tournament['tournament_location']; ?></td>
                <td class="text-center" style="vertical-align: middle;"><?php echo $tournament['start_datetime']; ?></td>
                <td class="text-center" style="vertical-align: middle;"><a href="javascript:;" class="btn blue edit_tournament_action" role="button" attr-id="<?php echo $tournament['id']?>" attr-name="<?php echo $tournament['tournament_name']?>" attr-location="<?php echo $tournament['tournament_location']?>" attr-startDateTime="<?php echo $tournament['start_datetime']?>" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i> Edit </a><a href="javascript:;" class="btn red del_tournament_action" data-toggle="modal" attr-id="<?php echo $tournament['id']?>" data-target="#deleteModal"><i class="fa fa-trash-alt"></i> Delete</a></td>
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
                  <h5 class="modal-title" id="exampleModalLabel">Add Tournament</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-sm-12 col-md-12">
                      <div class="form-group">
                        <div class="form-label-group">
                          <input type="text" id="inputTournamentName" class="form-control" placeholder="Tournament Name" required="required" autofocus="autofocus">
                          <label for="inputTournamentName">Tournament Name</label>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-label-group">
                          <input type="text" id="inputTournamentLocation" class="form-control" placeholder="Tournament Location" required="required" autofocus="autofocus">
                          <label for="inputTournamentLocation">Tournament Location</label>
                        </div>
                      </div>
                      <br/>
                      <p> Enter Tournament Starting Date and Time: </p>
                      <div class="form-group">
                        <input id="datepicker" required="required" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-primary add_tournament_btn" href="javascript:;"> Publish </a>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Tournament</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-sm-12 col-md-12">
                      <div class="form-group">
                        <div class="form-label-group">
                          <input type="text" id="editTournamentName" class="form-control" placeholder="Tournament Name" required="required" autofocus="autofocus">
                          <label for="editTournamentName">Tournament Name</label>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-label-group">
                          <input type="text" id="editTournamentLocation" class="form-control" placeholder="Tournament Location" required="required" autofocus="autofocus">
                          <label for="editTournamentLocation">Tournament Location</label>
                        </div>
                      </div>
                      <br/>
                      <p> Enter Tournament Starting Date and Time: </p>
                      <div class="form-group">
                        <input id="datepicker1" required="required" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-primary update_tournament_btn" href="javascript:;">Update</a>
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
                  <a class="btn btn-primary del_tournament_btn" href="javascript:;">Delete</a>
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