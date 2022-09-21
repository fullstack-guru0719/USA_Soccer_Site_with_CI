<?php 
    $logo_col = 'col-md-4';
    $icon_col = 'col-md-4';
    $logos_col = 'col-md-4';

    if(!$this->settings['enable_footer_logo'] && !$this->settings['enable_footer_4_logos']){
        $icon_col = 'col-md-12';
    }
?>
        <div class=footer-type02>
            <div class=container>
                <div class=row>
                    <?php if($this->settings['enable_footer_logo']):?>
                        <div class="<?php echo $logo_col;?>">
                            <?php if(isset($this->settings['footer_logo']) && !empty($this->settings['footer_logo'])):?>
                                <a href="<?php echo base_url();?>">
                                    <img src="<?php echo base_url('uploads/'.$this->settings['footer_logo']);?>" alt="image" style="max-height:115px;min-height:115px;"/>
                                </a>
                            <?php else:?>
                                <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/front/images/upsl.png" alt="image"></a>
                            <?php endif;?>
                        </div>
                    <?php endif;?>
                    
                    <?php if($this->settings['enable_footer_4_logos']):?>
                    <div class="footer-appstore col-md-push-4 <?php echo $logos_col;?>">
                        <?php for($i = 1; $i <=4;$i++):?>
                            <?php if(isset($this->settings['footer_logo_'.$i]) && !empty($this->settings['footer_logo_'.$i])):?>
                                <figure><a href=#><img src="<?php echo base_url('uploads/'.$this->settings['footer_logo_'.$i]);?>" alt=image/></a></figure>
                            <?php endif;?>
                        <?php endfor;?>
                    </div>
                    <?php endif;?>

                    <div class="footer-container text-center col-md-pull-4 <?php echo $icon_col;?>">
                        <ul class="clearfix">
                            <li>
                                <a href="<?php echo isset($this->settings['facebook_link']) ? $this->settings['facebook_link'] : '#'?>" class=bigsocial-link>
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo isset($this->settings['twitter_link']) ? $this->settings['twitter_link'] : '#'?>" class=bigsocial-link target=_blank>
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo isset($this->settings['youtube_link']) ? $this->settings['youtube_link'] : '#'?>" class=bigsocial-link>
                                <i class="fa fa-youtube"></i>
                                </a>
                            </li>
                        </ul>
                       <p><a target="_blank" href="invictvs.net"><font color="white">Created by Invictvs WorldWide Management
                        <p style="color:white;">Los Angeles Aztecs ™ All Rights 2010 © </p>
                        </font></a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<script src="<?php echo base_url();?>assets/front/js/vendor/modernizr.js"></script>
<script src="<?php echo base_url();?>assets/front/vendor/slick/slick.min.js"></script>
<script src="<?php echo base_url();?>assets/front/js/vendor/vendor.js"></script>


<script src="<?php echo base_url();?>assets/front/js/main.js"></script>

<script>

$('.social-slides').slick({
    accessibility:true,
    centerMode: false,
    arrows:false,
    autoplay:true,
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 1,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 600,
            settings: {
                arrows:false,
                centerMode: true,
                slidesToShow: 1,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 480,
            settings: {
                arrows:false,
                centerMode: true,
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ]
});
</script>
</body>

</html>