<section style="margin-top:120px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <ul class="nav nav-tabs nav-justified">
                <li class="active"><a data-toggle="tab" href="#division1">Division 1</a></li>
                <li class=""><a data-toggle="tab" href="#division2">Division 2</a></li>
            </ul>
            <h2 class=heading>ROSTER</h2>
            </div>
            <div class="col-md-12">
            

            <div class="tab-content">
                <div id="division1" class="tab-pane fade in active">
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th>Player</th>
                                <th>Jersey#</th>
                                <th>Experience</th>
                                <th>Player Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($division_1_items as $key => $item):?>
                            <tr>
                                <td>
                                    <img style="border-radius:100%;width:50px;height:50px;" onerror="this.src='/assets/img/user.png'" src="<?php echo site_url('uploads/user/'.$item['photo']);?>" width="100"/>
                                    &nbsp;&nbsp;&nbsp;<a href="<?php echo site_url('player/'.$item['alias']);?>"><?php echo $item['fullname'];?></a>
                                </td>
                                <td><?php echo $item['jersy_number'];?></td>
                                <td><?php echo $item['experience'];?></td>
                                <td><?php echo $item['player_status'];?><br/><small><?php echo $item['player_status_text'];?></small></td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                    <?php if(count($reserve_1_items) > 0):?>
                        <br/><br/>
                    <h3>Reserve Players</h3>
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th>Player</th>
                                <th>Jersey#</th>
                                <th>Experience</th>
                                <th>Player Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($reserve_1_items as $key => $item):?>
                            <tr>
                                <td>
                                    <img style="border-radius:100%;width:50px;height:50px;" onerror="this.src='/assets/img/user.png'" src="<?php echo site_url('uploads/user/'.$item['photo']);?>" width="100"/>
                                    &nbsp;&nbsp;&nbsp;<a href="<?php echo site_url('player/'.$item['alias']);?>"><?php echo $item['fullname'];?></a>
                                </td>
                                <td><?php echo $item['jersy_number'];?></td>
                                <td><?php echo $item['experience'];?></td>
                                <td><?php echo $item['player_status'];?><br/><small><?php echo $item['player_status_text'];?></small></td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                    <?php endif;?>
                </div>
                <div id="division2" class="tab-pane fade">
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th>Player</th>
                                <th>Jersey#</th>
                                <th>Experience</th>
                                <th>Player Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($division_2_items as $key => $item):?>
                            <tr>
                                <td>
                                    <img style="border-radius:100%;width:50px;height:50px;" onerror="this.src='/assets/img/user.png'" src="<?php echo site_url('uploads/user/'.$item['photo']);?>" width="100"/>
                                    &nbsp;&nbsp;&nbsp;<a href="<?php echo site_url('player/'.$item['alias']);?>"><?php echo $item['fullname'];?></a>
                                </td>
                                <td><?php echo $item['jersy_number'];?></td>
                                <td><?php echo $item['experience'];?></td>
                                <td><?php echo $item['player_status'];?><br/><small><?php echo $item['player_status_text'];?></small></td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                    <?php if(count($reserve_2_items) > 0):?>
                        <br/><br/>
                    <h3>Reserve Players</h3>
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th>Player</th>
                                <th>Jersey#</th>
                                <th>Experience</th>
                                <th>Player Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($reserve_2_items as $key => $item):?>
                            <tr>
                                <td>
                                    <img style="border-radius:100%;width:50px;height:50px;" onerror="this.src='/assets/img/user.png'" src="<?php echo site_url('uploads/user/'.$item['photo']);?>" width="100"/>
                                    &nbsp;&nbsp;&nbsp;<a href="<?php echo site_url('player/'.$item['alias']);?>"><?php echo $item['fullname'];?></a>
                                </td>
                                <td><?php echo $item['jersy_number'];?></td>
                                <td><?php echo $item['experience'];?></td>
                                <td><?php echo $item['player_status'];?><br/><small><?php echo $item['player_status_text'];?></small></td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                    <?php endif;?>
                </div>
            </div>
                
            </div>
        </div>
    </div>
</section>
        
    <!-- Footer -->
    <footer class=footer-type01>