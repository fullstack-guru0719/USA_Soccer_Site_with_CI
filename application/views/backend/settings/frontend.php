<div class="col-md-12">
    <div class="card shadow">
        <div class="card-header ">
            Homepage Sections
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-3">
                    <label>Latest Result Section</label><br/>
                    <input type="hidden" name="settings[section_latest_results]" value="0"/>
                    <input <?php echo $settings['section_latest_results'] ? 'checked':''?> name="settings[section_latest_results]" type="checkbox" data-toggle="toggle" data-on="Enabled" data-off="Disabled" data-onstyle="success" data-offstyle="danger">
                </div>
                <div class="form-group col-md-3">
                    <label>Latest News Section</label><br/>
                    <input type="hidden" name="settings[section_latest_news]" value="0"/>
                    <input <?php echo $settings['section_latest_news'] ? 'checked':''?> name="settings[section_latest_news]" type="checkbox" data-toggle="toggle" data-on="Enabled" data-off="Disabled" data-onstyle="success" data-offstyle="danger">
                </div>
                <div class="form-group col-md-3">
                    <label>Latest Videos Section</label><br/>
                    <input type="hidden" name="settings[section_latest_videos]" value="0"/>
                    <input <?php echo $settings['section_latest_videos'] ? 'checked':''?> name="settings[section_latest_videos]" type="checkbox" data-toggle="toggle" data-on="Enabled" data-off="Disabled" data-onstyle="success" data-offstyle="danger">
                </div>
                <div class="form-group col-md-3">
                    <label>Merchandise Section</label><br/>
                    <input type="hidden" name="settings[section_merchandise]" value="0"/>
                    <input <?php echo $settings['section_merchandise'] ? 'checked':''?> name="settings[section_merchandise]" type="checkbox" data-toggle="toggle" data-on="Enabled" data-off="Disabled" data-onstyle="success" data-offstyle="danger">
                </div>
                
            </div>
            <div class="row">
                <div class="form-group col-sm-12 col-lg-6 col-md-6">
                    <label>Shop Link</label>
                    <input type="text" name="settings[shop_link]" value="<?php echo $settings['shop_link'];?> " class="form-control w-100" placeholder="Shop website url"/>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6 col-lg-6 col-md-6">
                    <label>Number of latest news to show</label>
                    <input type="number" min="1" name="settings[total_news_items]" value="<?php echo $settings['total_news_items'];?>" class="form-control" placeholder="Number of items to show"/>
                </div>
                <div class="form-group col-sm-6 col-lg-6 col-md-6">
                    <label>Number of latest videos to show</label>
                    <input type="number" min="1" name="settings[total_videos_items]" value="<?php echo $settings['total_videos_items'];?>" class="form-control" placeholder="Number of items to show"/>
                </div>
            </div>
        </div>
    </div>
</div>