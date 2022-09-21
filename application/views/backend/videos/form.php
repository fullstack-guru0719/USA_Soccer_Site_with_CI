<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php echo form_open_multipart();?>
                <input type="hidden" name="id" value="<?php echo $item->id;?>"/>
                <div class="card mt-3 border-secondary">
                    <div class="card-header">
                        <h6 class="font-weight-bold text-left" style="float: left">Add Video</h6>
                        <div class="card-tools" style="float: right">
                            <a href="<?php echo site_url('backend/latest_videos');?>" class="btn btn-secondary btn-sm" role="button"><i class="fa fa-arrow-left"></i> Cancel</a>
                            <button type="submit" class="btn btn-primary btn-sm" role="button"><i class="fa fa-save"></i> Save Video</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" value="<?php echo $item->title ? $item->title : set_value('title');?>"/>
                                <?php echo form_error('title');?>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-md-5">
                                <label>Video Link</label>
                                <?php if($item->link_type == 'internal'):?>
                                    <input type="text" name="video_link" class="form-control" value=""/>
                                <?php else:?>
                                    <input type="text" name="video_link" class="form-control" value="<?php echo $item->video_link ? $item->video_link : set_value('video_link');?>"/>
                                <?php endif;?>
                                <?php echo form_error('address');?>
                            </div>
                            <div class="form-group col-md-2 text-center">
                                <label><br>OR</label>
                            </div>
                            <div class="form-group col-md-5">
                                <label>Video File</label>
                                <input type="file" name="video_link" class="form-control" accept="video/mp4"/>
                                <?php echo form_error('logo');?>
                            </div>
                        </div>
                        <?php if($item->video_link):?>
                            <?php 
                                $video_link = $item->link_type == 'internal' ? site_url('uploads/videos/'.$item->video_link):$item->video_link;
                            ?>
                            <div class="row">
                                <div class="form-group col-md-5">
                                    <?php 
                                        $video_source = '';
                                        
                                        if (strpos($video_link, 'youtube') > 0) {
                                            $video_source = 'youtube';
                                        } elseif (strpos($video_link, 'vimeo') > 0) {
                                            $video_source = 'vimeo';
                                        }
                                    ?>
                                    <?php if($item->link_type == "external" && $video_source):?>
                                        
                                        <video
                                            id="my-player"
                                            class="video-js"
                                            controls
                                            preload="auto"
                                            poster="<?php echo $video_link.'#t=0.5'?>"
                                            data-setup='{ "fluid": true,"techOrder": ["<?php echo $video_source;?>"], "sources": [{ "type": "video/<?php echo $video_source;?>", "src": "<?php echo $video_link;?>"}] }'>
                                        <source src="<?php echo $video_link;?>" type="video/mp4"></source>
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
                                            id="my-player"
                                            class="video-js"
                                            controls
                                            preload="auto"
                                            poster="<?php echo $video_link.'#t=0.5'?>"
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
                                </div>
                            </div>
                        <?php endif;?>
                    </div>
                </div>
            <?php echo form_close();?>
        </div>
    </div>
</div>