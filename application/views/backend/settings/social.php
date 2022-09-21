<?php 
    $social_links = [
        ["label" => "Facebook","name" => "facebook_link"],
        ["label" => "Twitter","name" => "twitter_link"],
        ["label" => "Youtube","name" => "youtube_link"]
    ];
?>
<div class="col-md-12">
    <div class="card shadow">
        <div class="card-header ">
            Social Link Settings
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <?php foreach($social_links as $key => $val):?>
                    <div class="form-group">
                        <label><?php echo $val['label'];?></label>
                        <input name="settings[<?php echo $val['name'];?>]" type="text" class="form-control" value="<?php echo $settings[$val['name']];?>">
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
</div>