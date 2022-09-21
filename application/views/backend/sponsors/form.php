<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php echo form_open_multipart();?>
                <input type="hidden" name="id" value="<?php echo $item->id;?>"/>
                <div class="card mt-3 border-secondary">
                    <div class="card-header">
                        <h6 class="font-weight-bold text-left" style="float: left">Add Sponsor</h6>
                        <div class="card-tools" style="float: right">
                            <a href="<?php echo site_url('backend/sponsors');?>" class="btn btn-secondary btn-sm" role="button"><i class="fa fa-arrow-left"></i> Cancel</a>
                            <button type="submit" class="btn btn-primary btn-sm" role="button"><i class="fa fa-save"></i> Save Sponsor</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Full Name</label>
                                <input type="text" name="name" class="form-control" value="<?php echo $item->name ? $item->name : set_value('name');?>"/>
                                <?php echo form_error('name');?>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Business/Organization name</label>
                                <input type="text" name="business_name" class="form-control" value="<?php echo $item->business_name ? $item->business_name : set_value('business_name');?>"/>
                                <?php echo form_error('business_name');?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="<?php echo $item->email ? $item->email : set_value('email');?>"/>
                                <?php echo form_error('email');?>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Contact Number</label>
                                <input type="text" name="contact_number" class="form-control" value="<?php echo $item->contact_number ? $item->contact_number : set_value('contact_number');?>"/>
                                <?php echo form_error('contact_number');?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Address</label>
                                <textarea class="form-control" name="address"><?php echo $item->address ? $item->address : set_value('address');?></textarea>
                                <?php echo form_error('address');?>
                            </div>
                            
                            <input type="hidden" name="sponsorship_type" value=""/>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Logo</label>
                                <input type="file" name="logo" class="form-control"/>
                                <?php echo form_error('logo');?>
                            </div>

                            <?php if(!empty($item->logo) && file_exists(FCPATH.'uploads/'.$item->logo)):?>
                            <div class="form-group col-md-6">
                                <img src="<?php echo site_url('uploads/'.$item->logo);?>"/>
                            </div>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            <?php echo form_close();?>
        </div>
    </div>
</div>