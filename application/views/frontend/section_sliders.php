<?php if (count($sliders)):?>
<section id="tiny" class="tinyslides" style="padding-bottom:0px;">
    <aside class="slides">
        <?php foreach($sliders as $key=>$slider):?>
            <?php if($slider['video_link']):?>
                <figure>
                    <?php 
                        $autoplay = $slider['video_autoplay'] ? "autoplay preload":"";
                        $video_source = '';
                        $video_link = $slider['video_link'];
                        
                        if (strpos($video_link, 'youtube') > 0) {
                            $video_source = 'youtube';
                            preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $slider['video_link'], $match);
                            if(count($match) == 2){
                                $video_link = $slider['video_link'] = 'https://www.youtube.com/embed/'.$match[1];
                            }else{
                                $slider['video_link'] = str_replace('watch?v=','embed/',$slider['video_link']);
                                $video_link = $slider['video_link'];
                            }
                        } elseif (strpos($video_link, 'vimeo') > 0) {
                            $video_source = 'vimeo';
                            
                            if (!preg_match('/\bplayer.\b/', $slider['video_link']))
                            {
                                $video_link = $slider['video_link'] = str_replace('vimeo.com','player.vimeo.com/video',$slider['video_link']);
                            }else{
                                $video_link = $slider['video_link'];
                            }
                        }else{
                            $video_link = site_url('uploads/videos/'.$slider['video_link']);
                        }
                    ?>
                    <?php if($slider['link_type'] == "external" && $video_source):?>
                        
                        <video
                            <?php echo $autoplay;?>
                            id="slider-video-<?php echo $key;?>"
                            class="video-js vjs-default-skin vjs-big-play-centered"
                            controls
                            data-setup='{"fluid": true,"techOrder": ["<?php echo $video_source;?>"], "sources": [{ "type": "video/<?php echo $video_source;?>", "src": "<?php echo $video_link;?>"}] }'>
                        <source src="<?php echo $video_link;?>" type="video/<?php echo $video_source;?>"></source>
                        <p class="vjs-no-js">
                            To view this video please enable JavaScript, and consider upgrading to a
                            web browser that
                            <a href="https://videojs.com/html5-video-support/" target="_blank">
                            supports HTML5 video
                            </a>
                        </p>
                        </video>
                    <?php else:?>
                        <video
                            id="slider-video-<?php echo $key;?>"
                            class="video-js vjs-default-skin vjs-big-play-centered"
                            controls
                            data-setup='{"fluid": true}'>
                        <source src="<?php echo $video_link;?>" type="video/mp4"></source>
                        <p class="vjs-no-js">
                            To view this video please enable JavaScript, and consider upgrading to a
                            web browser that
                            <a href="https://videojs.com/html5-video-support/" target="_blank">
                            supports HTML5 video
                            </a>
                        </p>
                        </video>
                    <?php endif;?>
                    <!--figcaption>
                        <?php echo $slider['slider_title'];?>
                    </figcaption-->
                </figure>
            <?php else:?>
                <figure>
                    <img src="<?php echo base_url() . $slider['slider_url']; ?>" style="max-height:90vh;width:100%" alt="<?php echo $slider['slider_title'];?>" />
                </figure>
            <?php endif;?>
        <?php endforeach; ?>
    </aside>
</section>
<?php endif;?>