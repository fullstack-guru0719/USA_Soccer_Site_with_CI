
    <section class=innerpage_all_wrap>
        <div class=container>
            <div class=row><h2 class=heading>get in <span>touch</span></h2>

                <p class=headParagraph>Are you interested in the Los Angeles Aztecs soccer team? Do you have any questions? Fill out the form below for any questions
                and one of our staff members will reply to your questions as soon as possible. Thank you</p>

                <div class=innerWrapper>
                    <ul class="contact_icon clearfix">
                        <li><a href=tel:1 323 488 3117><i class="fa fa-phone"></i> <span>+1 323 488 3117</span></a></li>
                        <li><a href=mailto:info@laaztecs.com><i class="fa fa-envelope-o"></i>
                            <span>info@laaztecs.com</span></a></li>
                        <li><a href=#><i class="fa fa-map-marker"></i> <span>P.O Box 3406 Huntington Park Ca. 90255</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class=container>
        <div class=row>
    		<h2 style="color:green">
    	        <?php
    	            if(isset($_SESSION['msg'])){
                        if($_SESSION['msg']){
                            echo "mail sent";
                            unset($_SESSION['msg']);
                        }else{
                            echo "mail problem";
                            unset($_SESSION['msg']);
                        }
                        
                    }
    	        ?>
    	    </h2>
            <div class=contact_form>
                <h2 class=heading>contact us <span>by form</span></h2>
                <p class=headParagraph>Are you interested in the Los Angeles Aztecs soccer team? Do you have any questions? Fill out the form below for any questions
                and one of our staff members will reply to your questions as soon as possible. Thank you.</p>
    			<form data-parsley-validate="" name=contact class="formcontact clearfix" method="POST" action="<?php echo site_url('contact');?>">
                
                    <div class=form-group>
                        <input type=text class=form-control
                            name=name placeholder=Name required=""
                            data-parsley-required-message="please insert Name" />
                    </div>
                    <div class=form-group>
                        <input type=text class=form-control
                            name=phone placeholder=Phone
                            required="" data-parsley-required-message="please insert Phone No" />
                    </div>
                    <div class=form-group>
                        <input type=text class=form-control
                            name=subject placeholder=subject
                            required="" data-parsley-required-message="please insert subject" />
                    </div>
                    <div class=form-group>
                        <input type=email class=form-control
                        name=email placeholder=Email
                        required="" data-parsley-required-message="please insert Email" />
                    </div>
                    <div class=form-group1>
                        <textarea class="form-control textas"
                            name=comment placeholder=Message
                            required="" data-parsley-minlength=20
                            data-parsley-minlength-message="Come on! You need to enter at least a 20 character comment.."
                            data-parsley-validation-threshold=10
                            data-parsley-maxlength=100></textarea>
                    </div>
                    <div class="form-group" style="width:100%;">
                        <label for="contact-message" style="color:#fff;">Captcha <span class='text-danger font-weight-medium'>*</span></label>
                        &nbsp;&nbsp;<?php echo $captcha['img'];?>
                        <input type="number" name="captcha" class="form-control" id="contact-message" required>
                        <?php echo form_error('captcha');?>
                    </div>
                    <div class="text-right">
    				    <button type="submit" name="sub" class="btn btn-red" id=send>send Us</button>
                    </div>
                    <div class=form-message></div>
                </form>
            </div>
        </div>
    </div>
        
    <!-- Footer -->
    <footer class=footer-type01>