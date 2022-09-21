<section class="innerpage_all_wrap bg-white">
    <div class="container">
        
        <div class="row">
            <div class="col-md-12" style="text-align:center;">
                <h2 class="bannerHeadline"><span>Trainings</span></h2>  
            </div>
        </div>
    </div>
    <div class="container" style="margin-top:30px;">

        <div class="row">
            <div class="col-md-12">
                <div class="match_versus-wrap" style="width:100%">
                    <div class="wrap_match-innerdetails">
                        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto;">
                            <ul class="home_tInfo scrollable" style="overflow: hidden; width: auto;height:100%!important">
                                <?php foreach ($trainings as $training): ?>
                                    <li class="list-group-item text-center" style="color:#fff;"> 
                                    <?php echo $training['training_name']?>. Starts <?php $date = date_create($training['start_datetime']); echo date_format($date, 'D\. M jS\. Y g:ia');?>. Duration: <?php echo $training['training_duration']?>. Location: <?php echo $training['training_location']?>.
                                    </li>
                                <?php endforeach;?>
                            </ul>
                            <div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 0px; position: absolute; top: 185px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 215.054px;"></div>
                            <div class="slimScrollRail" style="width: 0px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col-md-12 text-center">
            <br/><a class="btn btn-red" href="<?php echo site_url("trainings");?>" style="margin:0 auto;">View All Trainings</a>
            </div>
        </div>
    </div>
</section>