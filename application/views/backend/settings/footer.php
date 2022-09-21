<div class="col-md-12">
    <div class="card shadow">
        <div class="card-header ">
            Footer Settings
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Enable Footer logo</label><br/>
                                <input type="hidden" name="settings[enable_footer_logo]" value="0"/>
                                <input <?php echo $settings['enable_footer_logo'] ? 'checked':''?> name="settings[enable_footer_logo]" type="checkbox" data-toggle="toggle" data-on="Enabled" data-off="Disabled" data-onstyle="success" data-offstyle="danger">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Footer logo</label><br/>
                                <input name="settings[footer_logo]" type="file" accept="image/jpg,image/jpeg,image/png">
                            </div>
                            <?php if(isset($settings['footer_logo']) && !empty($settings['footer_logo'])):?>
                                <img src="<?php echo site_url('uploads/'.$settings['footer_logo']);?>" width="400"/>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Enable 4 logos</label><br/>
                        <input type="hidden" name="settings[enable_footer_4_logos]" value="0"/>
                        <input <?php echo $settings['enable_footer_4_logos'] ? 'checked':''?> name="settings[enable_footer_4_logos]" type="checkbox" data-toggle="toggle" data-on="Enabled" data-off="Disabled" data-onstyle="success" data-offstyle="danger">
                    </div>
                    <div class="form-group">
                        <label>Footer logo 1</label><br/>
                        <input name="settings[footer_logo_1]" type="file" accept="image/jpg,image/jpeg,image/png">
                        
                    </div>
                    <?php if(isset($settings['footer_logo_1']) && !empty($settings['footer_logo_1'])):?>
                        <img src="<?php echo site_url('uploads/'.$settings['footer_logo_1']);?>" width="200"/>
                        <a href="<?php echo site_url('backend/settings/deleteLogo/footer_logo_1');?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;DELETE</a>
                    <?php endif;?>
                    <div class="form-group">
                        <label>Footer logo 2</label><br/>
                        <input name="settings[footer_logo_2]" type="file" accept="image/jpg,image/jpeg,image/png">
                        
                    </div>
                    <?php if(isset($settings['footer_logo_2']) && !empty($settings['footer_logo_2'])):?>
                        <img src="<?php echo site_url('uploads/'.$settings['footer_logo_2']);?>" width="200"/>
                        <a href="<?php echo site_url('backend/settings/deleteLogo/footer_logo_2');?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;DELETE</a>
                    <?php endif;?>
                    <div class="form-group">
                        <label>Footer logo 3</label><br/>
                        <input name="settings[footer_logo_3]" type="file" accept="image/jpg,image/jpeg,image/png">
                    </div>
                    <?php if(isset($settings['footer_logo_3']) && !empty($settings['footer_logo_3'])):?>
                        <img src="<?php echo site_url('uploads/'.$settings['footer_logo_3']);?>" width="200"/>
                        <a href="<?php echo site_url('backend/settings/deleteLogo/footer_logo_3');?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;DELETE</a>
                    <?php endif;?>
                    <div class="form-group">
                        <label>Footer logo 4</label><br/>
                        <input name="settings[footer_logo_4]" type="file" accept="image/jpg,image/jpeg,image/png">
                    </div>
                    <?php if(isset($settings['footer_logo_4']) && !empty($settings['footer_logo_4'])):?>
                        <img src="<?php echo site_url('uploads/'.$settings['footer_logo_4']);?>" width="200"/>
                        <a href="<?php echo site_url('backend/settings/deleteLogo/footer_logo_4');?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;DELETE</a>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</div>