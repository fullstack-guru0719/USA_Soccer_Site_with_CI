<div class="col-md-12">
    <div class="card shadow">
        <div class="card-header ">
            Career Information
        </div>
        <div class="card-body" id="career-items">
            
            <?php foreach($player_career as $key => $val):?>
            <div class="career-item <?php echo ($key % 2 == 0) ? 'bg-secondary':''?> p-2">
                <div class="row">
                    <div class="form-group col-md-2">
                        <label>Year</label><br/>
                        <input name="year[]" type="text" value="<?php echo $val['year'];?>" class="form-control" placeholder="Year"/>
                    </div>
                    <div class="form-group col-md-8">
                        <label>Club</label><br/>
                        <input name="club[]" type="text" value="<?php echo $val['club'];?>" class="form-control" placeholder="Club name"/>
                    </div>
                    <div class="form-group col-md-2 text-right">
                        <a href="javscript:;" class="btn btn-danger btn-sm remove-career <?php echo $key == 0 ? 'd-none':''?>">
                            <i class="fas fa-trash"></i>&nbsp;Remove
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-1">
                        <label data-toggle="tooltip" data-placement="top" title="Games Played">GP</label><br/>
                        <input name="games_played[]" type="number" value="<?php echo $val['games_played'];?>" class="form-control" placeholder="GP"/>
                    </div>
                    <div class="form-group col-md-1">
                        <label data-toggle="tooltip" data-placement="top" title="Games Started">GS</label><br/>
                        <input name="games_started[]" type="number" value="<?php echo $val['games_started'];?>" class="form-control" placeholder="GS"/>
                    </div>
                    <div class="form-group col-md-1">
                        <label data-toggle="tooltip" data-placement="top" title="Minutes">Minutes</label><br/>
                        <input name="minutes[]" type="number" value="<?php echo $val['minutes'];?>" class="form-control" placeholder="Minutes"/>
                    </div>
                    <div class="form-group col-md-1">
                        <label data-toggle="tooltip" data-placement="top" title="Goals">G</label><br/>
                        <input name="goals[]" type="number" value="<?php echo $val['goals'];?>" class="form-control" placeholder="G"/>
                    </div>
                    <div class="form-group col-md-1">
                        <label data-toggle="tooltip" data-placement="top" title="Assists">A</label><br/>
                        <input name="assists[]" type="number" value="<?php echo $val['assists'];?>" class="form-control" placeholder="A"/>
                    </div>
                    <div class="form-group col-md-1">
                        <label data-toggle="tooltip" data-placement="top" title="Total Scoring Attempts">S</label><br/>
                        <input name="scoring_attempts[]" type="number" value="<?php echo $val['scoring_attempts'];?>" class="form-control" placeholder="S"/>
                    </div>
                    <div class="form-group col-md-1">
                        <label data-toggle="tooltip" data-placement="top" title="On target scorring Attempts">SOT</label><br/>
                        <input name="target_scorring_attempts[]" type="number" value="<?php echo $val['target_scorring_attempts'];?>" class="form-control" placeholder="SOT"/>
                    </div>
                    <div class="form-group col-md-1">
                        <label data-toggle="tooltip" data-placement="top" title="Total offside">OFF</label><br/>
                        <input name="total_offside[]" type="number" value="<?php echo $val['total_offside'];?>" class="form-control" placeholder="OFF"/>
                    </div>
                    <div class="form-group col-md-1">
                        <label data-toggle="tooltip" data-placement="top" title="Fouls committed">FC</label><br/>
                        <input name="fouls_committed[]" type="number" value="<?php echo $val['fouls_committed'];?>" class="form-control" placeholder="FC"/>
                    </div>
                    <div class="form-group col-md-1">
                        <label data-toggle="tooltip" data-placement="top" title="Fouls suffered">FS</label><br/>
                        <input name="fouls_suffered[]" type="number" value="<?php echo $val['fouls_suffered'];?>" class="form-control" placeholder="FS"/>
                    </div>
                    <div class="form-group col-md-1">
                        <label data-toggle="tooltip" data-placement="top" title="Yellow cards">YC</label><br/>
                        <input name="yellow_cards[]" type="number" value="<?php echo $val['yellow_cards'];?>" class="form-control" placeholder="YC"/>
                    </div>
                    <div class="form-group col-md-1">
                        <label data-toggle="tooltip" data-placement="top" title="Red Cards">RC</label><br/>
                        <input name="red_cards[]" type="number" value="<?php echo $val['red_cards'];?>" class="form-control" placeholder="RC"/>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
        <div class="card-footer text-right">
            <a class="btn btn-success btn-sm" href="javascript:;" id="add-career">
                <i class="fas fa-plus"></i>&nbsp;Add more
            </a>
        </div>
    </div>
</div>