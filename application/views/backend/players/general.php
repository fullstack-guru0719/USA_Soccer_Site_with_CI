<div class="col-md-12">
    <div class="card shadow">
        <div class="card-header ">
            General Information
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Full name</label><br/>
                    <input name="fullname" type="text" value="<?php echo $item->fullname ? $item->fullname : set_value('fullname');?>" class="form-control" placeholder="Full name"/>
                    <?php echo form_error('fullname');?>
                </div>
                <div class="form-group col-md-6">
                    <label>Email</label><br/>
                    <input name="email" type="text" value="<?php echo $item->email ? $item->email : set_value('email');?>" class="form-control" placeholder="Email"/>
                    <?php echo form_error('email');?>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Gender</label><br/>
                    <?php echo form_dropdown('gender',['male' => 'Male','female' => 'Female','other'=>'Other'],$item->gender ? $item->gender : set_value('gender'),'class="form-control"');?>
                </div>
                <div class="form-group col-md-6">
                    <label>Date of Birth</label><br/>
                    <input name="dob" type="date" value="<?php echo $item->dob ? $item->dob : set_value('dob');?>" class="form-control" placeholder="Date of birth"/>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Username</label><br/>
                    <input name="username" type="text" value="<?php echo $item->username ? $item->username : set_value('username');?>" class="form-control" placeholder="Username"/>
                    <?php echo form_error('username');?>
                </div>
                <div class="form-group col-md-6">
                    <label>Password</label><br/>
                    <input name="password" type="password" value="" class="form-control" placeholder="Password"/>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Photo</label><br/>
                    <input type="file" name="photo" class="form-control"/>
                    <?php echo form_error('username');?>
                </div>
                <div class="form-group col-md-6">
                    <label>Player Division</label><br/>
                    <?php echo form_dropdown('player_division',[
                        '1' => 'Division 1',
                        '2' => 'Division 2',
                        '3' => 'Reserves Division 1',
                        '4' => 'Reserves Division 2',
                        ],$item->player_division ? $item->player_division : set_value('player_division'),'class="form-control"');?>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Player Status</label><br/>
                    <?php echo form_dropdown('player_status',[
                        'Active' => 'Active',
                        'Injured' => 'Injured',
                        'Loan' => 'Loan',
                        'Loan In' => 'Loan In',
                        'Loan Out' => 'Loan Out',
                        ],$item->player_status ? $item->player_status : set_value('player_status'),'class="form-control"');?>
                        <br/>
                        <input name="player_status_text" type="text" value="<?php echo $item->player_status_text;?>" class="form-control" placeholder="Optional text"/>
                </div>
            </div>
        </div>
    </div>
</div>