<?php if (count($sliders)):?>
<section id="tiny" class="tinyslide">
    <aside class="slides">
        <?php foreach($sliders as $slider):?>
            <?php if($slider['video_link']):?>
                <figure>
                

                    <?php 
                        $video_source = '';
                        $video_link = $slider['video_link'];
                        
                        if (strpos($video_link, 'youtube') > 0) {
                            $video_source = 'youtube';
                            $video_link = $slider['video_link'];
                        } elseif (strpos($video_link, 'vimeo') > 0) {
                            $video_source = 'vimeo';
                            $video_link = $slider['video_link'];
                        }else{
                            $video_link = site_url('uploads/videos/'.$slider['video_link']);
                        }
                    ?>
                    
                    <?php if($slider['link_type'] == "external" && $video_source):?>
                        <div class="embed-video" data-source="<?php echo $video_source;?>" data-video-url="<?php echo $video_link;?>"> </div>
                    <?php else:?>
                        <video
                            id="slider-player"
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
                    <figcaption>
                        <?php echo $slider['slider_title'];?>
                    </figcaption>
                </figure>
            <?php else:?>
                <figure>
                    <img src="<?php echo base_url() . $slider['slider_url']; ?>" width="100%" height="100%" alt="" />
                    <figcaption>
                    <?php echo $slider['slider_title'];?>
                    </figcaption>
                </figure>
            <?php endif;?>
        <?php endforeach; ?>
    </aside>
</section>
<?php endif;?>