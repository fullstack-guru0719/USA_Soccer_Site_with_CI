<section class="innerpage_all_wrap pt-5" style="padding-top:80px;">
    <div class="container pt-5">
        <br>
        <center>
            <img src="<?php echo base_url()?>assets/front/images/images/sponsor.jpg" class="img-corner" alt="la aztecs">
        </center>
        <?php if($this->settings['allow_sponser_registration']):?>
            <div class=row>
                <h2 class=heading>Please Complete <span>Form</span></h2>

                <div class="sponser_form">
                    <h2 class=heading>Sponser <span>Registration</span></h2>
                    <?php echo form_open('','class="formsponser clearfix"');?>
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Full Name" required="" data-parsley-required-message="please insert Name" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="Email Address" required="" data-parsley-required-message="please insert Name" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="phone" placeholder="Contact number" required="" data-parsley-required-message="please insert Name" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="business" placeholder="Business or Organization name" required="" data-parsley-required-message="please insert Name" />
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="sponsership_type" placeholder="Type of Sponsership" required="" data-parsley-required-message="please insert Name">
                            <option>Sponsership type</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="address" placeholder="Address" required="" data-parsley-required-message="please insert Name" />
                    </div>
                    <div class="form-group" style="width:100%;">
                        <label for="contact-message" style="color:#fff;">Captcha <span class='text-danger font-weight-medium'>*</span></label>
                        &nbsp;&nbsp;<?php echo $captcha['img'];?>
                        <input type="number" name="captcha" class="form-control" id="contact-message" required>
                        <?php echo form_error('captcha');?>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" name="sub" class="btn btn-red" id=send>send Us</button>
                    </div>
                    <?php echo form_close();?>
                </div>
            
            </div>
        <?php else:?>
            <div class="row">
                <div class="col-md-12">
                    <?php echo $this->settings['sponser_registration_off_message'];?>
                </div>
            </div>
        <?php endif;?>

        
    </div>
</section>

<!-- Footer -->
<footer class=footer-type01>