<?php if(0):?>
<section class=latestvideo>
    <div class=container>
        <div class=row><h2 class=heading>latest <span>video</span></h2>
            <div class="video-wrap clearfix">               
                
                <div class="col-md-4" style="padding:0;"><a class=btn-up></a>
                    <ul class="videoLive clearfix" id=videoSlide role=tablist>
                        <?php foreach($latest_videos as $key=>$item):?>
                            <?php 
                                $video_source = '';
                                
                                if (strpos($item['video_link'], 'youtube') > 0) {
                                    $video_source = 'youtube';
                                } elseif (strpos($item['video_link'], 'vimeo') > 0) {
                                    $video_source = 'vimeo';
                                }else{
                                    $video_source = 'mp4';
                                }
                            ?>
                        <li>
                            <?php if($item['link_type'] == 'internal'):?>
                                <a class="changeVideo" data-video-link='<?php echo site_url('uploads/videos/'.$item['video_link']);?>' data-video-type="internal" data-video-source="<?php echo $video_source;?>">
                                    <div><span><?php echo date('F jS, Y',strtotime($item['created_at']));?></span> <?php echo $item['title'];?></div>
                                </a>
                            <?php else:?>
                                <a class="changeVideo" data-video-link='<?php echo $item['video_link'];?>' data-video-type="external" data-video-source="<?php echo $video_source;?>">
                                    <div><span><?php echo date('F jS, Y',strtotime($item['created_at']));?></span> <?php echo $item['title'];?></div>
                                </a>
                            <?php endif;?>
                        </li>
                        <?php endforeach;?>
                    </ul>
                    <a class=btn-down></a>
                </div>
                <div class="col-md-8" style="padding:0;">
                    <div class=video-container id=video01 data-current-video=W7qWa52k-nE>
                        <?php if($latest_videos[0]['link_type'] == 'internal'):?>
                            <video
                                id="my-player"
                                class="video-js"
                                controls
                                preload="auto"
                                data-setup='{ "fluid": true}'>
                            <source src="<?php echo site_url('uploads/videos/'.$latest_videos[0]['video_link']);?>" type="video/mp4"></source>
                            <p class="vjs-no-js">
                                To view this video please enable JavaScript, and consider upgrading to a
                                web browser that
                                <a href="https://videojs.com/html5-video-support/" target="_blank">
                                supports HTML5 video
                                </a>
                            </p>
                            </video>
                        <?php else:?>
                            <?php 
                                $video_source = '';
                                
                                if (strpos($latest_videos[0]['video_link'], 'youtube') > 0) {
                                    $video_source = 'youtube';
                                } elseif (strpos($latest_videos[0]['video_link'], 'vimeo') > 0) {
                                    $video_source = 'vimeo';
                                }
                            ?>
                            <video
                                id="my-player"
                                class="video-js"
                                controls
                                preload="auto"
                                data-setup='{ "fluid": true,"techOrder": ["<?php echo $video_source;?>"], "sources": [{ "type": "video/<?php echo $video_source;?>", "src": "<?php echo $latest_videos[0]['video_link'];?>"}] }'>
                            <source src="<?php echo $latest_videos[0]['video_link'];?>" type="video/<?php echo $video_source;?>"></source>
                            <p class="vjs-no-js">
                                To view this video please enable JavaScript, and consider upgrading to a
                                web browser that
                                <a href="https://videojs.com/html5-video-support/" target="_blank">
                                supports HTML5 video
                                </a>
                            </p>
                            </video>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif;?>

<?php if(is_array($latest_videos) && count($latest_videos)):?>
<section class=latestvideo>
    <div class=container>
        <div class=row><h2 class=heading>latest <span>video</span></h2>
            <div class="video-wrap clearfix" style="display:flex;">
                <div class="video-content clearfix"><a class=btn-up></a>
                    <ul class="videoLive clearfix" id=videoSlide role=tablist>
                        <?php foreach($latest_videos as $key=>$item):?>
                        <?php 
                            $video_source = '';
                            $first_video_link = '';
                            if (strpos($item['video_link'], 'youtube') > 0) {
                                $video_source = 'youtube';
                                preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $item['video_link'], $match);
                                
                                if(count($match) == 2){
                                    $video_link = $item['video_link'] = 'https://www.youtube.com/embed/'.$match[1];
                                }else{
                                    $item['video_link'] = str_replace('watch?v=','embed/',$item['video_link']);
                                    $video_link = $item['video_link'];
                                }
                            } elseif (strpos($item['video_link'], 'vimeo') > 0) {
                                $video_source = 'vimeo';
                               
                                if (!preg_match('/\bplayer.\b/', $item['video_link']))
                                {
                                    $video_link = $item['video_link'] = str_replace('vimeo.com','player.vimeo.com/video',$item['video_link']);
                                }else{
                                    $video_link = $item['video_link'];
                                }                             
                            }else{
                                $video_source = 'mp4';
                                $video_link = site_url('uploads/videos/'.$item['video_link']);
                            }
                            
                        ?>
                        <li class="<?php echo $key == 0 ? 'active':''?>">
                            
                            <?php if($item['link_type'] == 'internal'):?>
                                <a class="changeVideo" data-yt-video='<?php echo site_url('uploads/videos/'.$item['video_link']);?>' data-video-type="internal" data-video-source="<?php echo $video_source;?>">
                                    <div><span><?php echo date('F jS, Y',strtotime($item['created_at']));?></span> <?php echo $item['title'];?></div>
                                </a>
                            <?php else:?>
                                <a class="changeVideo" data-yt-video='<?php echo $item['video_link'];?>' data-video-type="external" data-video-source="<?php echo $video_source;?>">
                                    <div><span><?php echo date('F jS, Y',strtotime($item['created_at']));?></span> <?php echo $item['title'];?></div>
                                </a>
                            <?php endif;?>
                        
                        
                        </li>
                        <?php endforeach;?>
                    </ul>
                    <a class=btn-down></a></div>
                    <?php 
                        $link = $latest_videos[0]['video_link'];
                        if (strpos($link, 'youtube') > 0) {
                            $video_source = 'youtube';
                            preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $link, $match);
                            
                            if(count($match) == 2){
                                $video_link = $link = 'https://www.youtube.com/embed/'.$match[1];
                            }else{
                                $link = str_replace('watch?v=','embed/',$link);
                                $video_link = $link;
                            }
                        } elseif (strpos($link, 'vimeo') > 0) {
                            $video_source = 'vimeo';
                           
                            if (!preg_match('/\bplayer.\b/', $link))
                            {
                                $video_link = $link = str_replace('vimeo.com','player.vimeo.com/video',$link);
                            }else{
                                $video_link = $link;
                            }                             
                        }else{
                            $video_source = 'mp4';
                            $video_link = site_url('uploads/videos/'.$link);
                        }
                    ?>
                    <div class="video-show">
                        <div class="video-container" id="video02" >
                            <iframe src="<?php echo $video_link;?>" class="liveVideo" allowfullscreen=""></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <br/><a class="btn btn-red" href="<?php echo site_url("videos");?>" style="margin:0 auto;">View All Videos</a>
            </div>
        </div>
    </div>
</section>

<?php endif;?>

