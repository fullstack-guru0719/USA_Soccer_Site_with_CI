<section class="innerpage_all_wrap bg-white">
    <div class="container">
        
        <div class="row">
            <div class="col-md-12" style="text-align:center;">
                <h2 class="bannerHeadline"><span>All Schedules</span></h2>  
            </div>
        </div>
    </div>
    <div class="container" style="margin-top:30px;">
        <div class="row">
            <div class="col-md-12">
                <form action="<?php echo current_url();?>" method="get">
                    <div class="input-group">
                        <input name="filter_search" type="text" class="form-control" placeholder="Search for..." style="height:40px;" value="<?php echo $this->input->get('filter_search');?>">
                        <span class="input-group-btn">
                            <button class="btn btn-red" type="submit" style="padding:5px 10px;">SEARCH</button>
                        </span>
                    </div><!-- /input-group -->
                </form>
            </div>
        </div><br/>
        <div class="row">
            <?php if(count($uploaded_schedules) > 0):?>
                <?php foreach($uploaded_schedules as $schedule):?>
                    <div class="col-md-12 text-center">
                        
                        <?php $path_info = pathinfo(FCPATH.'uploads/'.$schedule['manual']);?>
                        <?php if($path_info['extension'] == 'pdf'):?>
                            <script>
								var scale = 1;
								function renderPage(pageNumber, canvas) {
									thePdf.getPage(pageNumber).then(function(page) {
										viewport = page.getViewport({ scale: scale });
										canvas.height = viewport.height;
										canvas.width = viewport.width;          
										page.render({canvasContext: canvas.getContext('2d'), viewport: viewport});
									});
								}
								var loadingTask = pdfjsLib.getDocument('<?php echo site_url('uploads/'.$schedule['manual']);?>#toolbar=0&navpanes=0&scrollbar=0');
								loadingTask.promise.then(function(pdf) {
									thePdf = pdf;
									viewer = document.getElementById('pdf-viewer');
									
									for(page = 1; page <= pdf.numPages; page++) {
										canvas = document.createElement("canvas");    
										canvas.className = 'pdf-page-canvas';         
										viewer.appendChild(canvas);            
										renderPage(page, canvas);
									}
								});
							</script>
                            <div id="pdf-viewer" ></div>
                            <!-- <iframe src="<?php echo site_url('uploads/'.$schedule['manual']);?>" style="width:100%;min-height:792px;"></iframe>-->
                        <?php else:?>
                            <img src="<?php echo site_url('uploads/'.$schedule['manual']);?>"/>
                        <?php endif;?>
                        
                    </div>
            <?php endforeach;?>
            <?php endif;?>
            <div class="col-md-12">
                <div class="match_versus-wrap" style="width:100%">
                    <div class="wrap_match-innerdetails">
                        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto;">
                            <ul class="home_tInfo scrollable" style="overflow: hidden; width: auto;height:100%!important">
                                <?php foreach($schedules as $key => $schedule):?>
                                <li class="">
                                    <a href="#">
                                        <ul class="t_info match_info01 headline01 clearfix">
                                            <li><?php echo ($key+1);?></li>
                                            <li>
                                                vs <?php echo $schedule['team_name']; ?> 
                                                <br/><?php $date = date_create($schedule['match_time']); echo date_format($date, 'D\. M jS\. Y g:ia');?>
                                                <br/> Location <?php echo $schedule['match_location']; ?>, Match Type <?php echo $schedule['match_type'];?>
                                            </li>
                                        </ul>
                                    </a>
                                </li>
                                <?php endforeach;?>
                            </ul>
                            <div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 0px; position: absolute; top: 185px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 215.054px;"></div>
                            <div class="slimScrollRail" style="width: 0px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="row">
            <div class="col-md-12 text-center">
                <?php echo $pagination;?>
            </div>
        </div>
    </div>
</section>