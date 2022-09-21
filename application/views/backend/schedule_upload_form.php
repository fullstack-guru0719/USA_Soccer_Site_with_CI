<?php echo form_open_multipart(site_url('backend/upload_schedule'),'id="upload_schedule"');?>
	<input type="hidden" name="id" value=""/>
	<div class="modal-header">
		<h5 class="modal-title" id="uploadModalLabel">Upload Schedule</h5>
		<button class="close" type="button" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">×</span>
		</button>
	</div>
	<div class="modal-body">
		<div class="form-group">
		<input type="file" name="manual" accept="image/*,application/pdf"/>
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
		<button class="btn btn-primary" type="submit"> Upload </button>
	</div>
<?php echo form_close();?>