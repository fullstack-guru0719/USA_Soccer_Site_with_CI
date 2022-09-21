<?php if ($user[0]['user_group'] != 1 && $user[0]['user_group'] != 2) { return redirect('backend'); } else { ?>
<div id="content-wrapper">
  <div class="container-fluid">
    <div class="card mx-auto mt-3 mb-3">
      <div class="card-header">Add Result</div>
      <div class="card-body">
        <form class="add-result-form">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-4">
              <div class="form-group">
                <div class="form-label-group">
                  <input type="text" id="inputMatchType" class="form-control" placeholder="Match Type" required="required" autofocus="autofocus">
                  <label for="inputMatchType">Match Type</label>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4">
              <div class="form-group">
                <div class="form-label-group">
                  <input type="text" id="inputMatchLocation" class="form-control" placeholder="Match Location" required="required" autofocus="autofocus">
                  <label for="inputMatchLocation">Match Location</label>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4">
              <div class="form-group">
                <input id="datepicker" style="font-size: 23px; margin-top: 10px;" />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-5 text-center">
              <p style="font-size: 25px;">Our Team score</p>
              <p style="font-size: 25px; font-weight: bold;">LA Aztecs</p>
              <div class="form-group thumbnail">
                <img id="own_logo" src="<?php echo base_url()?>assets/front/images/team-logo/logo01.png" style="width: 100%">
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <input type="number" min="0" id="inputOurGoals" class="form-control" placeholder="Our Goals" required="required" autofocus="autofocus">
                  <label for="inputOurGoals">Our Goals</label>
                </div>
              </div>
              <div class="card mb-3">
                <div class="card-header">
                  <div style="float: right">
                    <a href="javascript:;" type="button" class="btn btn-success add_own_goaler" ><icon class="fa fa-plus"></icon> Add more</a>
                  </div>
                </div>
                <div class="card-body">
                  <ul class="list-group own_goaler_ul">
                    <li class="list-group-item own_goaler_li">
                      <div class="form-group">
                        <div class="form-label-group">
                          <input type="text" id="inputOwnNameTime1" class="form-control input-inline " name="goal_info" placeholder="Input Name and Time" autofocus="autofocus">
                          <label for="inputOwnNameTime1">Input Name and Time</label>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-2 text-center"><p style="font-size: 23px; font-weight: bold; margin-top: 55px; margin-bottom: 50px;">VS</p></div>
            <div class="col-sm-12 col-md-12 col-lg-5 text-center">
              <p style="font-size: 25px;">Competitor Team score</p>
              <select class="form-control" id="selectTeam" style="font-size: 23px" required="required" />
                <?php
                  foreach ($teams as $team) { ?>
                <option value="<?php echo $team['id']?>" attr-logo="<?php echo base_url() . $team['team_logo']?>"><?php echo $team['team_name']?></option>
                <?php } ?>
              </select>
              <div class="form-group thumbnail text-center">
                <img id="team_logo" src="<?php echo base_url() . $teams[0]['team_logo']?>" style="width: 100%">
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <input type="number" min="0" id="inputCompetitorGoals" class="form-control" placeholder="Competitor Goals" required="required" autofocus="autofocus">
                  <label for="inputCompetitorGoals">Competitor Goals</label>
                </div>
              </div>
              <div class="card mb-3">
                <div class="card-header">
                  <div style="float: right">
                    <a href="javascript:;" type="button" class="btn btn-success add_competitor_goaler" ><icon class="fa fa-plus"></icon> Add more</a>
                  </div>
                </div>
                <div class="card-body">
                  <ul class="list-group compe_goaler_ul">
                    <li class="list-group-item compe_goaler_li">
                      <div class="form-group">
                        <div class="form-label-group">
                          <input type="text" id="inputCompeNameTime1" class="form-control input-inline " name="goal_info" placeholder="Input Name and Time" autofocus="autofocus">
                          <label for="inputCompeNameTime1">Input Name and Time</label>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <button class="btn btn-primary btn-block" id="add_result_btn" type="submit">Publish</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php } ?>