<?php if ($user[0]['user_group'] != 1 && $user[0]['user_group'] != 2) { return redirect('backend'); } else { ?>
<div id="content-wrapper">
	<div class="container-fluid">
		<div class="card card-register mx-auto mt-5 mb-3">
			<div class="card-header">Add slider</div>
			<div class="card-body">
				<?php echo form_open_multipart();?>
					<div class="row">
						<div class="col-sm-12 col-md-12 col-lg-6">
							<div class="form-group thumbnail">
								<label for="primary-image" class="upload-btn"><p><i class="fa fa-image"></i> Upload Slider Image</p><div class="p-image-preview"></div></label>
								<input id="primary-image" type="file" name="photo" class="d-done" style="display: none;">
							</div>
							
						</div>
						<div class="col-sm-12 col-md-12 col-lg-6">
							<div class="form-group">
								<div class="form-label-group">
									<input type="text" name="slider_title" id="inputSliderTitle" class="form-control" placeholder="Slider title" autofocus="autofocus">
									<label for="inputSliderTitle">Slider Title</label>
								</div>
								<?php echo form_error('slider_title');?>
							</div>
							<div class="form-group">
								<div class="form-label-group">
									<input name="slider_content" type="text" id="inputSliderComment" class="form-control" placeholder="Slider comment" autofocus="autofocus" row="3">
									<label for="inputSliderComment">Slider Comment</label>
								</div>
							</div>
							<div class="form-group thumbnail">
								<label for="primary-image">Video Link</label>
								<input name="video_link" type="text" name="video_link" class="form-control" placeholder="Embed link">
							</div>
							<div class="form-group text-center">
								OR
							</div>
							<div class="form-group thumbnail">
								<label for="primary-image">Video Link</label>
								<input type="file" name="video_link" class="form-control" placeholder="Embed link">
							</div>
							<div class="form-group">
								<div class="form-label-group">
									<p> Auto play video </p>
									<select name="video_autoplay" class="form-control" id="video_autoplay">
										<option value="0">No</option>
										<option value="1">Yes</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="form-label-group">
									<p> Select Slider Status: </p>
									<select name="slider_status" class="form-control" id="inputSliderStatus">
										<option value="0">Disable</option>
										<option value="1">Enable</option>
									</select>
								</div>
							</div>
							<br/>
							<button class="btn btn-primary btn-block" id="add_slider_btn" type="submit">Publish</button>
							<a class="btn btn-secondary btn-block" href="<?php echo site_url('backend/slider_manage');?>"><i class="fas fa-arrow-left"></i>&nbsp;Cancel</a>
						</div>
					</div>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
</div>
<?php } ?>