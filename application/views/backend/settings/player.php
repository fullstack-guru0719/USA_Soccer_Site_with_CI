<div class="col-md-12">
    <div class="card shadow">
        <div class="card-header ">
            Player profile page
        </div>
        <?php 
            $fields = (array)tableObject('player_career');
            unset($fields['id']);
            unset($fields['player_id']);
            unset($fields['year']);
            unset($fields['club']);
        ?>
        <div class="card-body">
            <div class="row">
                <?php foreach($fields as $key => $field):?>
                <div class="form-group col-md-3">
                    <label><?php echo $key;?></label><br/>
                    <input type="hidden" name="settings[enable_<?php echo $key;?>]" value="0"/>
                    <input <?php echo isset($settings['enable_'.$key]) && $settings['enable_'.$key] ? 'checked':''?> name="settings[enable_<?php echo $key;?>]" type="checkbox" data-toggle="toggle" data-on="Enabled" data-off="Disabled" data-onstyle="success" data-offstyle="danger">
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>