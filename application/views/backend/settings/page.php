<div class="col-md-12">
    <div class="card shadow">
        <div class="card-header ">
            Page Settings
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Allow Player registraion</label><br/>
                        <input type="hidden" name="settings[allow_registration]" value="0"/>
                        <input <?php echo $settings['allow_registration'] ? 'checked':''?> name="settings[allow_registration]" type="checkbox" data-toggle="toggle" data-on="Enabled" data-off="Disabled" data-onstyle="success" data-offstyle="danger">
                    </div>
                    <div class="form-group">
                        <label>Player Registraion Off message</label><br/>
                        <textarea name="settings[player_registration_off_message]" class="form-control summernote"><?php echo $settings['player_registration_off_message'];?> </textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Allow Sponsers registraion</label><br/>
                        <input type="hidden" name="settings[allow_sponser_registration]" value="0"/>
                        <input <?php echo $settings['allow_sponser_registration'] ? 'checked':''?> name="settings[allow_sponser_registration]" type="checkbox" data-toggle="toggle" data-on="Enabled" data-off="Disabled" data-onstyle="success" data-offstyle="danger">
                    </div>
                    <div class="form-group">
                        <label>Sponser Registraion Off message</label><br/>
                        <textarea name="settings[sponser_registration_off_message]" class="form-control summernote"><?php echo $settings['sponser_registration_off_message'];?> </textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Allow Schedule Tab</label><br/>
                        <input type="hidden" name="settings[allow_schedule_tab]" value="0"/>
                        <input <?php echo $settings['allow_schedule_tab'] ? 'checked':''?> name="settings[allow_schedule_tab]" type="checkbox" data-toggle="toggle" data-on="Enabled" data-off="Disabled" data-onstyle="success" data-offstyle="danger">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Allow Tournaments Tab</label><br/>
                        <input type="hidden" name="settings[allow_tournaments_tab]" value="0"/>
                        <input <?php echo $settings['allow_tournaments_tab'] ? 'checked':''?> name="settings[allow_tournaments_tab]" type="checkbox" data-toggle="toggle" data-on="Enabled" data-off="Disabled" data-onstyle="success" data-offstyle="danger">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Allow Training Tab</label><br/>
                        <input type="hidden" name="settings[allow_training_tab]" value="0"/>
                        <input <?php echo $settings['allow_training_tab'] ? 'checked':''?> name="settings[allow_training_tab]" type="checkbox" data-toggle="toggle" data-on="Enabled" data-off="Disabled" data-onstyle="success" data-offstyle="danger">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>