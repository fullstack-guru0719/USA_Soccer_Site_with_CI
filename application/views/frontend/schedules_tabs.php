<?php 
    $settings = config();

    $show_section = ($settings['allow_schedule_tab'] || $settings['allow_tournaments_tab'] || $settings['allow_training_tab']) ? true:false;

    $count = 0;
    $active_tab = 0;
    if($settings['allow_schedule_tab'])
    {
        $count++;
    }

    if($settings['allow_tournaments_tab'])
    {
        $count++;
    }

    if($settings['allow_training_tab'])
    {
        $count++;
    }

    if($settings['allow_schedule_tab'])
    {
        $active_tab = 1;
    } else if($settings['allow_tournaments_tab']) {
        $active_tab = 2;
    } else if($settings['allow_training_tab']) {
        $active_tab = 3;
    }
?>
<?php if($show_section):?>
<section class=about>
    <div class=container>
        <div class=row>

            <div class=about-wrap>
                <div class=nav-header id=aboutTab>
                    <ul class="nav nav-tabs clearfix" role=tablist>
                        <?php if($settings['allow_schedule_tab'] && $count > 1):?>
                        <li class="hide-mobile <?php echo $active_tab == 1 ? 'active':''?>"><a href=#matches aria-controls=matches role=tab data-toggle=tab>Schedule</a></li>
                        <?php endif;?>

                        <?php if($settings['allow_tournaments_tab'] && $count > 1):?>
                        <li class="hide-mobile <?php echo $active_tab == 2 ? 'active':''?>"><a href=#static aria-controls=static role=tab data-toggle=tab>Tournaments</a>
                        </li>
                        <?php endif;?>

                        <?php if($settings['allow_training_tab'] && $count > 1):?>
                        <li class=" hide-mobile <?php echo $active_tab == 3 ? 'active':''?>"><a href=#traning aria-controls=traning role=tab data-toggle=tab>Training</a></li>
                        <?php endif;?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="tab-content nav-content">
    <?php if($settings['allow_schedule_tab']):?>
        <div role=tabpanel class="tab-pane active fade <?php echo $active_tab == 1 ? 'active in':''?>" id=matches>
            <?php $this->load->view('frontend/schedules_tab_schedule');?>
        </div>
    <?php endif;?>

    <?php if($settings['allow_tournaments_tab']):?>
    <div role=tabpanel class="tab-pane fade <?php echo $active_tab == 2 ? 'active in':''?>" id=static>
        <?php $this->load->view('frontend/schedules_tab_tournament');?>
    </div>
    <?php endif;?>

    <?php if($settings['allow_training_tab']):?>
    <div role=tabpanel class="tab-pane fade <?php echo $active_tab == 3 ? 'active in':''?>" id=traning>
        <?php $this->load->view('frontend/schedules_tab_training');?>
    </div>
    <?php endif;?>
</div>
<?php endif;?>