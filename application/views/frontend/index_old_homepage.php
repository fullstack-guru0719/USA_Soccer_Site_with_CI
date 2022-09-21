    <?php $this->load->view('frontend/section_sliders');?>

    <div class=banner-text>
        <div class=container>
            <div class=row>Are you Ready?<sup></sup> September , 2019.</div>
        </div>
    </div>

    <section class="booking bg-smallwhite">
        <div class=container>
            <div class=booking-fig><h2>Los Angeles Aztecs </h2></div>
            <div class=booking-content><a href=<?php echo base_url();?>academy class="btn btn-red">Join the Academy</a></div>
        </div>
    </section>

    <section class=about>
        <div class=container>
            <div class=row>

                <div class=about-wrap>
                    <div class=nav-header id=aboutTab>
                        <ul class="nav nav-tabs clearfix" role=tablist>
                            <li class=active><a href=#matches aria-controls=matches role=tab data-toggle=tab>Schedule</a></li>
                            <li><a href=#static aria-controls=static role=tab data-toggle=tab>Tournaments</a>
                            </li>
                            <li><a href=#traning aria-controls=traning role=tab data-toggle=tab>Training</a></li>
                        </ul>
                    </div>
                    <div class="tab-content nav-content">
                        <div role=tabpanel class="tab-pane active fade in" id=matches>
                            <div class="card mb-3">
                              <div class="card-header bg-info text-center text-white">
                                <h3>Schedule</h3></div>
                              <div class="card-body">
                                <ul class="list-group text-center">
                                  <?php foreach ($schedules as $schedule) { ?>
                                    <li class="list-group-item text-center">VS <?php
                                      foreach ($teams as $team) { 
                                        if ($schedule['team_id'] == $team['id']) { 
                                          echo $team['team_name']; }} ?> Team <?php $date = date_create($schedule['match_time']); echo date_format($date, 'D\. M jS\. Y g:ia');?><br/> Location <?php echo $schedule['match_location']; ?>, Match Type <?php echo $schedule['match_type'];?> </li>
                                  <?php } ?>
                                </ul>
                              </div>
                              <div class="card-footer">
                                <br/><a class="btn btn-red" href="<?php echo site_url("schedules");?>" style="margin:0 auto;">View All Schedules</a>
                              </div>
                            </div>
                        </div>

                        <div role=tabpanel class="tab-pane fade" id=static>
                            <div class="card mb-3">
                              <div class="card-header bg-info text-center text-white">
                                <h3>Tournament</h3>
                              </div>
                              <div class="card-body">
                                <ul class="list-group text-center">
                                  <?php foreach ($tournaments as $tournament) { ?>
                                    <li class="list-group-item text-center"> 
                                    <?php echo $tournament['tournament_name']?>. Starts <?php $date = date_create($tournament['start_datetime']); echo date_format($date, 'D\. M jS\. Y g:ia');?>. Location: <?php echo $tournament['tournament_location']?>.
                                    </li>
                                  <?php } ?>
                                </ul>
                              </div>
                              <div class="card-footer">
                                <br/><a class="btn btn-red" href="<?php echo site_url("tournaments");?>" style="margin:0 auto;">View All Tournaments</a>
                              </div>
                            </div>
                        </div>

                        <div role=tabpanel class="tab-pane fade" id=traning>
                            <div class="card mb-3">
                              <div class="card-header bg-info text-center text-white">
                                <h3>Training</h3>
                              </div>
                              <div class="card-body">
                                <ul class="list-group text-center">
                                  <?php foreach ($trainings as $training) { ?>
                                    <li class="list-group-item text-center"> 
                                    <?php echo $training['training_name']?>. Starts <?php $date = date_create($training['start_datetime']); echo date_format($date, 'D\. M jS\. Y g:ia');?>. Duration: <?php echo $training['training_duration']?>. Location: <?php echo $training['training_location']?>.
                                    </li>
                                  <?php } ?>
                                </ul>
                              </div>
                              <div class="card-footer">
                                <br/><a class="btn btn-red" href="<?php echo site_url("trainings");?>" style="margin:0 auto;">View All Trainings</a>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php if(isset($this->settings['section_latest_results']) && $this->settings['section_latest_results']):?>
        <?php $this->load->view('frontend/section_latest_results');?>
    <?php endif;?>
    

    
    
    <section class=matchSchedule>
        <div class=container>
            <div class=row><h2 class=heading>Next &nbsp;<span>Game</span></h2>
                <?php if (!($oldest_schedule)) { ?>
                <div class="matchSchedule_details row">
                    <div class="match_next right-triangle">
                        <div class="wrap_match_next right-triangle">
                            <div class=right-padding><h4 class=headline03>Match Up</h4>

                                <p>LA Aztecs VS Chivas</p></div>
                        </div>
                    </div>
                    <div class=match_versus>
                        <div class="bg-blackimg match_versus02">
                            <div class=nextmatchDetails>
                                </br>
                                </br>
                                </br>
                                

                                <div class="wrap-logo clearfix">
                                    <div class=logo-match><img src=<?php echo base_url();?>assets/front/images/matchResult/logo01.png alt=image></div>
                                    <div class=match_vs>vs</div>
                                    <div class=logo-match><img src=<?php echo base_url();?>assets/front/images/matchResult/logo02.png alt=image></div>
                                </div>
                                <p class=match_dtls>October 5, 2019 | 1:25PM</p>

                                <p class=match_dtls>Salesian Stadium (Los Angeles)</p></div>
                        </div>
                    </div>
					<?php $this->load->view('frontend/section_sponsors_list');?>
                </div>
                <?php } else { ?>
                <div class="matchSchedule_details row">
                    <div class="match_next right-triangle">
                        <div class="wrap_match_next right-triangle">
                            <div class=right-padding><h4 class=headline03>Match Up</h4>

                                <p>LA Aztecs VS 
                            <?php
                            foreach ($teams as $team) { 
                                if ($oldest_schedule[0]['team_id'] == $team['id']) { 
                                    echo $team['team_name'];
                                }
                            }?></p></div>
                        </div>
                    </div>
                    <div class=match_versus>
                        <div class="bg-blackimg match_versus02">
                            <div class=nextmatchDetails>
                                </br>
                                </br>
                                </br>
                                

                                <div class="wrap-logo clearfix">
                                    <div class=logo-match><img src=<?php echo base_url();?>assets/front/images/matchResult/logo01.png width=100% alt=image></div>
                                    <div class=match_vs>vs</div>
                                    <div class=logo-match>
                                        <?php
                                        foreach ($teams as $team) { 
                                            if ($oldest_schedule[0]['team_id'] == $team['id']) { ?>
                                        <img src=<?php echo base_url() . $team['team_logo'];?> width=100% alt=image></div>
                                        <?php }
                                        } ?>
                                        </div>
                                </div>
                                <?php $date = date_create($oldest_schedule[0]['match_time']);?>
                                <p class=match_dtls><?php echo date_format($date, 'M d\, Y');?> | <?php echo date_format($date, 'g:ia');?></p>

                                <p class=match_dtls><?php echo $oldest_schedule[0]['match_location']?> (Los Angeles)</p></div>
                        </div>
                    </div>
                    <?php $this->load->view('frontend/section_sponsors_list');?>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <section class="booking bookticket">
        <div class=container>
            <div class=booking-fig><h2>Los Angeles Aztecs</h2></div>
            <div class=booking-content><a href=<?php echo base_url();?>academy class="btn btn-white">Join the Academy</a></div>
        </div>
    </section>

    <?php if(isset($this->settings['section_latest_videos']) && $this->settings['section_latest_videos']):?>
        <?php $this->load->view('frontend/section_latest_videos');?>
    <?php endif;?>



    <?php if (isset($this->settings['section_latest_news']) && $this->settings['section_latest_news']) : ?>
        <?php $this->load->view('frontend/section_latest_news');?>
    <?php endif; ?>
    
    <?php $this->load->view('frontend/section_standings');?>

    <?php $this->load->view('frontend/section_sponsors_logos');?>
 
    <?php if(isset($this->settings['section_merchandise']) && $this->settings['section_merchandise']):?>
        <?php $this->load->view('frontend/section_merchandise');?>
    <?php endif;?>
    
    <!-- Footer -->
    <footer class=footer-type01>