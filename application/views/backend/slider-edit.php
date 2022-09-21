<?php if ($user[0]['user_group'] != 1 && $user[0]['user_group'] != 2) { return redirect('backend'); } else { ?>
<div id="content-wrapper">
  <div class="container-fluid">
    <div class="card card-register mx-auto mt-5 mb-3">
      <div class="card-header">Edit slider</div>
      <div class="card-body">
        <?php echo form_open_multipart();?>
          <input type="hidden" name="id" value="<?php echo $item->id;?>"/>
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6">
              <div class="form-group thumbnail">
                <label for="primary-image" class="upload-btn"><p><i class="fa fa-image"></i> Upload Slider Image</p><div class="p-image-preview" style="background-image: url('<?php echo base_url($item->slider_url); ?>');"></div></label>
                <input id="primary-image" type="file" name="photo" class="d-done" style="display: none;">
              </div>


              <?php 
                  $video_source = '';
                  $video_link = $item->video_link;
                  if (strpos($video_link, 'youtube') > 0) {
                    $video_source = 'youtube';
                    $video_link = $item->video_link;
                  } elseif (strpos($video_link, 'vimeo') > 0) {
                    $video_source = 'vimeo';
                    $video_link = $item->video_link;
                  }else{
                    $video_link = site_url('uploads/videos/'.$item->video_link);
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
            <div class="col-sm-12 col-md-12 col-lg-6">
              <div class="form-group">
                <div class="form-label-group">
                  <input name="slider_title" type="text" id="editSliderTitle" class="form-control" placeholder="Slider title" autofocus="autofocus" value="<?php echo $item->slider_title; ?>">
                  <label for="editSliderTitle">Slider Title</label>
                </div>
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <input name="slider_content" type="text" id="editSliderComment" class="form-control" placeholder="Slider comment" autofocus="autofocus" row="3" value="<?php echo $item->slider_content; ?>">
                  <label for="editSliderComment">Slider Comment</label>
                </div>
              </div>
              <div class="form-group thumbnail">
                <label for="primary-image">Video Link</label>
                <?php if($item->link_type == 'external'):?>
                  <input name="video_link" type="text" name="video_link" class="form-control" placeholder="Embed link" value="<?php echo $item->video_link; ?>">
                <?php else:?>
                  <input name="video_link" type="text" name="video_link" class="form-control" placeholder="Embed link" value="">
                <?php endif;?>
              </div>
              <div class="form-group text-center">
                OR
              </div>
              <div class="form-group thumbnail">
                <label for="primary-image">Upload Video</label>
                <input type="file" name="video_link" class="form-control" placeholder="Embed link" accept="video/mp4,video/x-m4v,video/*"/>
              </div>
              <div class="form-group">
								<div class="form-label-group">
									<p> Auto play video </p>
									<select name="video_autoplay" class="form-control" id="video_autoplay">
										<option value="0" <?php  echo ($item->video_autoplay == '0' ) ? "selected": " " ?>>No</option>
										<option value="1" <?php  echo ($item->video_autoplay == '1' ) ? "selected": " " ?>>Yes</option>
									</select>
								</div>
							</div>
              <div class="form-group">
                <div class="form-label-group">
                  <p> Select Slider Status: </p>
                  <select name="slider_status" class="form-control" id="editSliderStatus">
                    <option value="0" <?php  echo ($item->slider_status == '0' ) ? "selected": " " ?>>Disable</option>
                    <option value="1" <?php  echo ($item->slider_status == '1' ) ? "selected": " " ?>>Enable</option>
                  </select>
                </div>
              </div>
              <br/>
              <button class="btn btn-primary btn-block" type="submit">Update</button>
              <a class="btn btn-secondary btn-block" href="<?php echo site_url('backend/slider_manage');?>"><i class="fas fa-arrow-left"></i>&nbsp;Cancel</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php } ?>