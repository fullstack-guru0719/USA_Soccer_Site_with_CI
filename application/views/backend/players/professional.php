<div class="col-md-12">
    <div class="card shadow">
        <div class="card-header ">
            Professional Information
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Years of experience</label><br/>
                    <input name="experience" type="number" value="<?php echo $item->experience ? $item->experience : set_value('experience');?>" class="form-control" placeholder="Experience"/>
                </div>
                <div class="form-group col-md-6">
                    <label>Nationality</label><br/>
                    <?php echo form_dropdown('nationality',$countries,$item->nationality ? $item->nationality : set_value('nationality'),'class="form-control"');?>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Height</label><br/>
                    <input name="height" type="number" value="<?php echo $item->height ? $item->height : set_value('height');?>" class="form-control" placeholder="height"/>
                </div>
                <div class="form-group col-md-6">
                    <label>Weight</label><br/>
                    <input name="weight" type="number" value="<?php echo $item->weight ? $item->weight : set_value('weight');?>" class="form-control" placeholder="weight"/>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Total Goals</label><br/>
                    <input name="total_goals" type="number" value="<?php echo $item->total_goals ? $item->total_goals : set_value('total_goals');?>" class="form-control" placeholder="Total Goals"/>
                </div>
                <div class="form-group col-md-6">
                    <label>Assists</label><br/>
                    <input name="total_assists" type="number" value="<?php echo $item->total_assists ? $item->total_assists : set_value('total_assists');?>" class="form-control" placeholder="Assists"/>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Yellow Cards</label><br/>
                    <input name="total_yellow_cards" type="number" value="<?php echo $item->total_yellow_cards ? $item->total_yellow_cards : set_value('total_yellow_cards');?>" class="form-control" placeholder="Yellow Cards"/>
                </div>
                <div class="form-group col-md-6">
                    <label>Red Cards</label><br/>
                    <input name="total_red_cards" type="number" value="<?php echo $item->total_red_cards ? $item->total_red_cards : set_value('total_red_cards');?>" class="form-control" placeholder="Red Cards"/>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Jersy Number</label><br/>
                    <input name="jersy_number" type="number" value="<?php echo $item->jersy_number ? $item->jersy_number : set_value('jersy_number');?>" class="form-control" placeholder="Jersy number"/>
                </div>
                <div class="form-group col-md-6">
                    <label>Player Position</label><br/>
                    <input name="player_position" type="text" value="<?php echo $item->player_position ? $item->player_position : set_value('player_position');?>" class="form-control" placeholder="Player Position"/>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Shop Link</label><br/>
                    <input name="shop_link" type="text" value="" class="form-control" placeholder="Shop Link"/>
                    <?php echo form_error('shop_link');?>
                </div>
                <div class="form-group col-md-6">
                    <label>Shop Image</label><br/>
                    <input name="shop_image" type="file" value="" class="form-control" placeholder="Shop Image"/>
                </div>
            </div>
        </div>
    </div>
</div>