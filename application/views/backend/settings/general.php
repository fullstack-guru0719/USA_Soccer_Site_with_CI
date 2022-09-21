<div class="col-md-12">
    <div class="card shadow">
        <div class="card-header ">
            General Settings
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Support email</label><br/>
                    <input name="settings[support_email]" type="email" value="<?php echo isset($settings['support_email']) ? $settings['support_email']:"";?>" class="form-control w-100" placeholder="Email address at which contact and sponser signup email will received"/>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Old home screen</label><br/>
                        <input type="hidden" name="settings[old_home_screen]" value="0"/>
                        <input <?php echo $settings['old_home_screen'] ? 'checked':''?> name="settings[old_home_screen]" type="checkbox" value="1" data-toggle="toggle" data-on="Enabled" data-off="Disabled" data-onstyle="success" data-offstyle="danger">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>