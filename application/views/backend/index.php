
    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Announcement-->
        <div class="row">
            <div class="col-xl-6 col-sm-12 col-xs-12 offset-xl-3">
                <div class="card mb-5">
                  <div class="card-header text-center">
                    <span style="font-size: 25px"><i class="fas fa-fw fa-bullhorn"></i> Announcement </span>
                    <?php if($user[0]['user_group'] == 1 || $user[0]['user_group'] == 2) { ?>
                    <div style="float: right">
                      <a href="javascript:;" class="btn btn-success add_announcement_modal" role="button" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i> Add </a>
                    </div>
                    <?php } ?>
                  </div>
                  <div class="card-body">
                    <ul class="list-group text-center">
                      <?php foreach ($announces as $announce) { ?>
                        <li class="list-group-item text-center">
                          <?php if($announce['announce_title']) { ?>
                          <div class="form-group">
                            <div class="form-label-group">
                              <span style="font-size: 20px"><strong><?php echo $announce['announce_title']; ?></strong></span>
                              <div style="float: right">
                                <a href="javascript:;" class="btn btn-info show_announce_action" attr-id="<?php echo $announce['id']?>" attr-logo="<?php echo base_url() . $announce['announce_logo']?>" attr-title="<?php echo $announce['announce_title']?>" attr-content="<?php echo $announce['announce_content']?>" role="button" data-toggle="modal" data-target="#showModal"> Details here <i class="fa fa-angle-double-right"></i></a>
                              </div>
                            </div>
                          </div>
                          <?php } ?>
                        </li>
                      <?php } ?>
                    </ul>
                  </div>
                </div>
                <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Announcement</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group thumbnail">
                          <label for="primary-image" class="upload-btn"><p><i class="fa fa-image"></i> Upload Announce Image </p><div class="p-image-preview"></div></label>
                          <input id="primary-image" type="file" name="photo" class="d-done" style="display: none;">
                        </div>
                        <div class="form-group">
                          <div class="form-label-group">
                            <input type="text" id="inputTitle" class="form-control" placeholder="Title" required="required">
                            <label for="inputTitle">Announcement Title</label>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="form-label-group">
                            <input type="text" id="inputDescription" class="form-control" placeholder="Description" required="required">
                            <label for="inputDescription">Announcement Description</label>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary add_announce_btn" href="javascript:;"> Publish </a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title anno_title" id="exampleModalLabel"> </h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <div class="form-group thumbnail">
                            <img class="anno_img" style="width: 100%">
                          </div>
                          <div class="form-group">
                              <div class="form-label-group">
                                <p class="anno_desc"></p>
                              </div>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>

        <!-- Icon Cards-->
        <div class="row">
          <?php if($user[0]['user_group'] == 1 || $user[0]['user_group'] == 2) { ?>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">
                    <h2><?php echo count($mails)?></h2> New Messages!
                </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url();?>backend/inbox_mail">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5"><h2>Schedule</h2></div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url();?>backend/schedules">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-life-ring"></i>
                </div>
                <div class="mr-5"><h2>Team Roster</h2></div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url();?>backend/players">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-shopping-cart"></i>
                </div>
                <div class="mr-5"><h2><?php echo $pendings?></h2> Pending Payment</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url();?>backend/pending_status">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <?php } else { ?>
          <div class="col-xl-3 col-sm-6 offset-xl-2 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">
                    <h2><?php echo count($mails)?></h2> New Messages!
                </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url();?>backend/inbox_mail">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 offset-xl-2 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-shopping-cart"></i>
                </div>
                <div class="mr-5"><h2><?php echo $pendings;?></h2> Pending Payment</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url();?>backend/pending_payments">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <?php } ?>
        </div>

        <div class="row">
            <div class="col-xl-6 col-sm-6">
                <div class="card mb-3">
                  <div class="card-header bg-info text-center text-white">
                    <h3>Schedule</h3></div>
                  <div class="card-body">
                    <ul class="list-group text-center">
                      <?php foreach ($schedules as $schedule) { ?>
                        <li class="list-group-item text-center">VS <?php
                          foreach ($teams as $team) { 
                            if ($schedule['team_id'] == $team['id']) { 
                              echo $team['team_name']; }} ?> Team <?php $date = date_create($schedule['match_time']); echo date_format($date, 'D\. M d\. Y g:ia');?><br/> Location <?php echo $schedule['match_location']; ?> </li>
                      <?php } ?>
                    </ul>
                  </div>
                </div>
            </div>
            <div class="col-xl-6 col-sm-6">
                <div class="card mb-3">
                  <div class="card-header text-center text-white" style="background-color: Teal;">
                    <h3>Starting Line Up</h3></div>
                  <div class="card-body">
                    <div class="list-group">
                        <div class="list-group-item">
                            <h4 class="list-group-item-heading">Main</h4>
                            <?php foreach ($main_players as $main_player) { 
                              foreach($main_player as $player) { ?>
                            <p class="list-group-item-text text-center"><?php echo $player['player_position'] . ' : ' . $player['fullname'] ?></p>
                            <?php } } ?>
                        </div>
                        <div class="list-group-item">
                            <h4 class="list-group-item-heading">Substitues</h4>
                            <?php foreach ($sub_players as $sub_player) { 
                              foreach($sub_player as $player) { ?>
                            <p class="list-group-item-text text-center"><?php echo $player['player_position'] . ' : ' . $player['fullname'] ?></p>
                            <?php } } ?>
                        </div>
                    </div>
                  </div>
                  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div>
            </div>
        </div>
      </div>
      <!-- /.container-fluid -->

      