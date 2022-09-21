<style>
    .col-border-bottom{
        border-bottom:1px solid #ededed;
        padding: 17px 0;
        display:flex;
    }
    .table > tbody > tr > td{
        border:none !important;
    }
</style>
<section style="margin-top:100px;position: relative;padding:15px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>PROFILE</h1>
            </div>
        </div>
    </div>
</section>
<?php //pr($this->settings);?>
<section style="margin-top:20px;">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <?php echo form_open(site_url('view-player'));?>
                <?php echo form_dropdown('filter_player',$players_dropdown,$item['id'],'class="form-control" onchange="this.form.submit()"');?>
                <?php echo form_close();?>
            </div>
        </div>
        <div class="row" style="margin-top:20px;">
            <div class="col-md-6">
                <img src="<?php echo site_url('uploads/user/'.$item['photo']);?>" onerror="this.src='<?php echo site_url('assets/img/l.png');?>'" style="height:256px;"/>
            </div>
            <div class="col-md-6" style="background-color:#000;color:#fff;">
                <table class="table" style="border:0;">
                    <tr>
                        <td colspan="2"><h2><?php echo $item['fullname'];?></h2></td>
                    </tr>
                    <tr>
                        <td colspan="2"><h4><?php echo $item['player_position'];?></h4></td>
                    </tr>
                    <tr>
                        <td colspan="2"><h3>#<?php echo $item['jersy_number'];?></h3</td>
                    </tr>
                    <tr>
                        <td><b>Experience :</b> <?php echo $item['experience'];?></td>
                        <td><b>Height :</b> <?php echo $item['height'];?></td>
                    </tr>
                    <tr>
                        <td><b>Age :</b> <?php echo $item['age'];?></td>
                        <td><b>Weight :</b> <?php echo $item['weight'];?>&nbsp;lbs</td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>Nationality :</b> <?php echo $item['nationality'];?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6 text-center"><h1>GOALS<br/><?php echo (int)$item['total_goals'];?><h1></div>
                    <div class="col-md-6 text-center"><h1>Assists<br/><?php echo (int)$item['total_assists'];?></h1></div>
                </div>
                <div class="row">
                    <div class="col-md-6 text-center"><h1>Yellows<br/><?php echo (int)$item['total_yellow_cards'];?></h1></div>
                    <div class="col-md-6 text-center"><h1>Reds<br/><?php echo (int)$item['total_red_cards'];?></h1></div>
                </div>
            </div>
            <div class="col-md-6">
                <a href="<?php echo $item['shop_link'];?>" target="_blank">
                    <img src="<?php echo site_url('uploads/user/'.$item['photo']);?>" onerror="this.src='<?php echo site_url('assets/img/t.png');?>'" style="height:256px;"/>
                </a>
            </div>
        </div>
        <div class="row" style="margin-top:50px;">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th><label data-toggle="tooltip" data-placement="top" title="Year">Year</label></th>
                            <th><label data-toggle="tooltip" data-placement="top" title="Club">Club</label></th>

                            <?php if($this->settings['enable_games_played']):?>
                            <th><label data-toggle="tooltip" data-placement="top" title="Games Played">GP</label></th>
                            <?php endif;?>

                            <?php if($this->settings['enable_games_started']):?>
                            <th><label data-toggle="tooltip" data-placement="top" title="Games Started">GS</label></th>
                            <?php endif;?>

                            <?php if($this->settings['enable_minutes']):?>
                            <th><label data-toggle="tooltip" data-placement="top" title="Minutes">Minutes</label></th>
                            <?php endif;?>

                            <?php if($this->settings['enable_goals']):?>
                            <th><label data-toggle="tooltip" data-placement="top" title="Goals">G</label></th>
                            <?php endif;?>

                            <?php if($this->settings['enable_assists']):?>
                            <th><label data-toggle="tooltip" data-placement="top" title="Assists">A</label></th>
                            <?php endif;?>

                            <?php if($this->settings['enable_scoring_attempts']):?>
                            <th><label data-toggle="tooltip" data-placement="top" title="Total Scoring Attempts">S</label></th>
                            <?php endif;?>

                            <?php if($this->settings['enable_target_scorring_attempts']):?>
                            <th><label data-toggle="tooltip" data-placement="top" title="On target scorring Attempts">SOT</label></th>
                            <?php endif;?>

                            <?php if($this->settings['enable_total_offside']):?>
                            <th><label data-toggle="tooltip" data-placement="top" title="Total offside">OFF</label></th>
                            <?php endif;?>

                            <?php if($this->settings['enable_fouls_committed']):?>
                            <th><label data-toggle="tooltip" data-placement="top" title="Fouls committed">FC</label></th>
                            <?php endif;?>

                            <?php if($this->settings['enable_fouls_suffered']):?>
                            <th><label data-toggle="tooltip" data-placement="top" title="Fouls suffered">FS</label></th>
                            <?php endif;?>

                            <?php if($this->settings['enable_yellow_cards']):?>
                            <th><label data-toggle="tooltip" data-placement="top" title="Yellow cards">YC</label></th>
                            <?php endif;?>

                            <?php if($this->settings['enable_red_cards']):?>
                            <th><label data-toggle="tooltip" data-placement="top" title="Red Cards">RC</label></th>
                            <?php endif;?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $games_played = 0;
                            $games_started = 0;
                            $minutes = 0;
                            $goals = 0;
                            $assists = 0;
                            $scoring_attempts = 0;
                            $target_scorring_attempts = 0;
                            $total_offside = 0;
                            $fouls_committed = 0;
                            $fouls_suffered = 0;
                            $yellow_cards = 0;
                            $red_cards = 0;
                        ?>
                        <?php foreach($player_career as $key => $val):?>
                            <?php 
                                $games_played += (int)$val['games_played'];
                                $games_started += (int)$val['games_started'];
                                $minutes += (int)$val['minutes'];
                                $goals += (int)$val['goals'];
                                $assists += (int)$val['assists'];
                                $scoring_attempts += (int)$val['scoring_attempts'];
                                $target_scorring_attempts += (int)$val['target_scorring_attempts'];
                                $total_offside += (int)$val['total_offside'];
                                $fouls_committed += (int)$val['fouls_committed'];
                                $fouls_suffered += (int)$val['fouls_suffered'];
                                $yellow_cards += (int)$val['yellow_cards'];
                                $red_cards += (int)$val['red_cards'];
                            ?>
                        <tr>
                            <td><?php echo $val['year'];?></td>
                            <td><?php echo $val['club'];?></td>

                            <?php if($this->settings['enable_games_played']):?>
                            <td><?php echo $val['games_played'];?></td>
                            <?php endif;?>

                            <?php if($this->settings['enable_games_started']):?>
                            <td><?php echo $val['games_started'];?></td>
                            <?php endif;?>

                            <?php if($this->settings['enable_minutes']):?>
                            <td><?php echo $val['minutes'];?></td>
                            <?php endif;?>

                            <?php if($this->settings['enable_goals']):?>
                            <td><?php echo $val['goals'];?></td>
                            <?php endif;?>

                            <?php if($this->settings['enable_assists']):?>
                            <td><?php echo $val['assists'];?></td>
                            <?php endif;?>

                            <?php if($this->settings['enable_scoring_attempts']):?>
                            <td><?php echo $val['scoring_attempts'];?></td>
                            <?php endif;?>

                            <?php if($this->settings['enable_target_scorring_attempts']):?>
                            <td><?php echo $val['target_scorring_attempts'];?></td>
                            <?php endif;?>

                            <?php if($this->settings['enable_total_offside']):?>
                            <td><?php echo $val['total_offside'];?></td>
                            <?php endif;?>

                            <?php if($this->settings['enable_fouls_committed']):?>
                            <td><?php echo $val['fouls_committed'];?></td>
                            <?php endif;?>

                            <?php if($this->settings['enable_fouls_suffered']):?>
                            <td><?php echo $val['fouls_suffered'];?></td>
                            <?php endif;?>

                            <?php if($this->settings['enable_yellow_cards']):?>
                            <td><?php echo $val['yellow_cards'];?></td>
                            <?php endif;?>

                            <?php if($this->settings['enable_red_cards']):?>
                            <td><?php echo $val['red_cards'];?></td>
                            <?php endif;?>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td><b>Total</b></td>
                            <td>&nbsp;</td>
                            <?php if($this->settings['enable_games_played']):?>
                            <td><b><?php echo $games_played;?></b></td>
                            <?php endif;?>

                            <?php if($this->settings['enable_games_started']):?>
                            <td><b><?php echo $games_started;?></b></td>
                            <?php endif;?>

                            <?php if($this->settings['enable_minutes']):?>
                            <td><b><?php echo $minutes;?></b></td>
                            <?php endif;?>

                            <?php if($this->settings['enable_goals']):?>
                            <td><b><?php echo $goals;?></b></td>
                            <?php endif;?>

                            <?php if($this->settings['enable_assists']):?>
                            <td><b><?php echo $assists;?></b></td>
                            <?php endif;?>

                            <?php if($this->settings['enable_scoring_attempts']):?>
                            <td><b><?php echo $scoring_attempts;?></b></td>
                            <?php endif;?>

                            <?php if($this->settings['enable_target_scorring_attempts']):?>
                            <td><b><?php echo $target_scorring_attempts;?></b></td>
                            <?php endif;?>

                            <?php if($this->settings['enable_total_offside']):?>
                            <td><b><?php echo $total_offside;?></b></td>
                            <?php endif;?>

                            <?php if($this->settings['enable_fouls_committed']):?>
                            <td><b><?php echo $fouls_committed;?></b></td>
                            <?php endif;?>

                            <?php if($this->settings['enable_fouls_suffered']):?>
                            <td><b><?php echo $fouls_suffered;?></b></td>
                            <?php endif;?>

                            <?php if($this->settings['enable_yellow_cards']):?>
                            <td><b><?php echo $yellow_cards;?></b></td>
                            <?php endif;?>

                            <?php if($this->settings['enable_red_cards']):?>
                            <td><b><?php echo $red_cards;?></b></td>
                            <?php endif;?>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <?php if(!empty($item['biography'])):?>
            <div class="row">
                <div class="col-md-12">
                    <h3>Biography</h3>
                </div>
                <div class="col-md-12">
                    <?php echo $item['biography'];?>
                </div>
            </div>
        <?php endif;?>
    </div>
</section>
        
    <!-- Footer -->
    <footer class=footer-type01>