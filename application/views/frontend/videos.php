<div class="container" style="text-align:center">
    <h2 class="bannerHeadline"><span>Videos</span></h2>
</div>
<section class="innerpage_all_wrap">
    <div class="container" style="margin-top:30px;">
        <div class="row">
            <div class="col-md-12">
                <form action="<?php echo current_url();?>" method="get">
                    <div class="input-group">
                        <input name="filter_videos" type="text" class="form-control" placeholder="Search for..." style="height:40px;" value="<?php echo $this->input->get('filter_videos');?>">
                        <span class="input-group-btn">
                            <button class="btn btn-red" type="submit" style="padding:5px 10px;">SEARCH</button>
                        </span>
                    </div><!-- /input-group -->
                </form>
            </div>
        </div><br/>
        <?php if(count($videos) > 0):?>
            <div class="row">
                <?php foreach($videos as $key => $item):?>
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
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <iframe src="<?php echo $video_link;?>" class="liveVideo" allowfullscreen=""></iframe>
                            </div>
                            <div class="panel-footer"><?php echo $item['title'];?></div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <?php echo $pagination;?>
                </div>
            </div>
        <?php else:?>
            <div class="row">
                <div class="col-md-12 text-center text-danger">
                    No videos in our directory
                </div>
            </div>
        <?php endif;?>
    </div>
</section>