<?php echo form_open(site_url('backend/add_schedule'),'id="add_schedule"');?>
<input type="hidden" name="id" value="<?php echo $item->id;?>"/>
<div class="row">
	<div class="col-sm-12 col-md-12 col-lg-6">
		<div class="form-group thumbnail text-center">
			<img id="team_logo" src="<?php echo base_url('assets/front/images/logo.png');?>" style="width: 100%">
		</div>
	</div>
	<div class="col-sm-12 col-md-12 col-lg-6">
		<div class="form-group">
			<div class="form-label-group">
				<p>Select Tournament </p>
				<?php echo form_dropdown('tournament_id',$tournaments,$item->tournament_id,'class="form-control" id="tournament_id"');?>
			</div>
		</div>
		<div class="form-group">
			<div class="form-label-group">
				<p> Select Team: </p>
				<select class="form-control" id="selectTeam" required="required" name="team_id">
				<?php foreach ($teams as $team): ?>
					<option value="<?php echo $team['id'];?>" attr-logo="<?php echo base_url($team['team_logo'])?>" <?php echo $item->team_id == $team['id'] ? 'selected="selected"':''?>>
						<?php echo $team['team_name'];?>
					</option>
				<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<div class="form-label-group">
				<p> Select Match Location: </p>
				<?php echo form_dropdown('match_location',['Home' => 'Home','Away' => 'Away'],$item->match_location,'class="form-control" id="match_location"');?>
			</div>
		</div>
		<br/>
		<p> Enter Match time: </p>
		<div class="form-group">
			<input id="datepicker" required="required" name="match_time" value="<?php echo $item->match_time;?>"/>
		</div>
		<div class="form-group">
			<div class="form-group">
			<label for="inputMatchType">Match Type</label>
				<?php echo form_dropdown('match_type',['friendly' => 'Friendly','league' => 'League'],$item->match_type,'class="form-control" id="match_type"');?>
			</div>
		</div>
	</div>
</div>
<?php echo form_close();?>