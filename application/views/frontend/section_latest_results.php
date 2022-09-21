<?php if (!($latest_result)) { ?>
<section class=latestResult>
    <div class=container>
        <div class=row><h2 class=heading>latest <span>result</span></h2>

            <div class=latestResult-wrap><h4>Friendly Match</h4>

                <p>Sponsored by Nifty Services</p></div>
            <div class="result clearfix">
                <div class=result-details>
                    <div class=content><h4>LA Aztecs</h4>

                        <p>Win</p>

                        <p>Ethan Diaz (27)</p>
                        <p>Ethan Diaz (45)</p>
                        <p>Panda (77)</p>
                    </div>
                        
                    <div class=figure>
                        <div class=team-logo>
                            <div style="background-image: url(<?php echo base_url();?>assets/front/images/team-logo/logo01.png)" class=teamLogoImg></div>
                        </div>
                    </div>
                </div>
                <div class=result-count>
                    <div class=count-number><span class=lose-team>3</span> <span>-</span> <span
                            class=win-team>1</span></div>
                    <div class=dateTime>
                        <div class=dateTime-container><span class=date>May 17,2019</span> <span
                                class=time>1:30pm</span></div>
                        <div class=country-wrap><span class=field>Salesian stadium</span> 
                        </br><span class=country>(Los Angeles)</span>
                        </div>
                    </div>
                </div>
                <div class=result-details>
                    <div class="content contentresult"><h4>LA Wolves FC</h4>

                        <p>Lose</p>

                        <p>Leland Lagos (29)</p> </div>
                    <div class="figure figresult">
                        <div class=team-logo>
                            <div style="background-image: url(<?php echo base_url();?>assets/front/images/team-logo/logo02.png)" class=teamLogoImg></div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>
<?php } else { ?>
<section class=latestResult>
    <div class=container>
        <div class=row><h2 class=heading>latest <span>result</span></h2>

            <div class=latestResult-wrap><h4><?php echo $latest_result[0]['match_type']?></h4>

                <p>Sponsored by Nifty Services</p></div>
            <div class="result clearfix">
                <div class=result-details>
                    <div class=content><h4>LA Aztecs</h4>

                        <p><?php echo $latest_result[0]['match_result']?></p>
                        <!-- <?php
                        $own_goalers = unserialize($latest_result[0]['own_goaler']); 
                        foreach($own_goalers as $own_goaler) { ?>
                        <p><?php echo $own_goaler['goal_info']?></p>
                        <?php } ?> -->
                    </div>
                        
                    <div class=figure>
                        <div class=team-logo>
                            <div style="background-image: url(<?php echo base_url();?>assets/front/images/team-logo/logo01.png)" class=teamLogoImg></div>
                        </div>
                    </div>
                </div>
                <div class=result-count>
                    <div class=count-number><span class=lose-team><?php echo $latest_result[0]['own_goals']?></span> <span>-</span> <span
                            class=win-team><?php echo $latest_result[0]['competitor_goals']?></span></div>
                    <div class=dateTime>
                        <?php $date = date_create($latest_result[0]['match_time']);?> 
                        <div class=dateTime-container><span class=date><?php echo date_format($date, 'M d\, Y');?></span> <span
                                class=time><?php echo date_format($date, 'g:ia');?></span></div>
                        <div class=country-wrap><span class=field><?php echo $latest_result[0]['match_location']?></span> 
                        </br><span class=country>(Los Angeles)</span>
                        </div>
                    </div>
                </div>
                <div class=result-details>
                    <div class="content contentresult">
                        <h4>
                        <?php
                        foreach ($teams as $team) { 
                            if ($latest_result[0]['team_id'] == $team['id']) { 
                                echo $team['team_name'];
                            }
                        }?>
                        </h4>
                        <?php
                        if($latest_result[0]['own_goals'] > $latest_result[0]['competitor_goals']) { ?>
                        <p>Lose</p>
                        <?php
                        } elseif ($latest_result[0]['own_goals'] < $latest_result[0]['competitor_goals']) { ?>
                        <p>Win</p>
                        <?php
                        } else { ?>
                        <p>Draw</p>
                        <?php } ?>
                        <!-- <?php
                        $competitor_goalers = unserialize($latest_result[0]['competitor_goaler']); 
                        foreach($competitor_goalers as $competitor_goaler) { ?>
                        <p><?php echo $competitor_goaler['goal_info']?></p>
                        <?php } ?> -->
                    </div>
                    <div class="figure figresult">
                        <div class=team-logo>
                            <?php
                            foreach ($teams as $team) { 
                                if ($latest_result[0]['team_id'] == $team['id']) { ?>
                            <div style="background-image: url(<?php echo base_url() . $team['team_logo'];?>)" class=teamLogoImg></div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>
<?php } ?>