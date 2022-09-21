<!doctype html>
<html class=no-js lang="">
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<head>
    <meta charset=utf-8>
    <meta name=description content="">
    <meta name="viewport"
          content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <title>Official Los Angeles Aztecs Website</title>
    <link rel="shortcut icon" href=<?php echo base_url();?>assets/favicon.ico>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/front/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel=stylesheet href=<?php echo base_url();?>assets/front/css/vendor.css>
    <link rel=stylesheet href=<?php echo base_url();?>assets/front/css/style.css>
    <link rel=stylesheet type=text/css href=<?php echo base_url();?>assets/front/css/layerslider.css>
    <link href="<?php echo base_url();?>assets/front/css/tinyslide.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/admin/vendor/videojs/video-js.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/front/vendor/slick/slick.css" rel="stylesheet">
    <script src="<?php echo base_url();?>assets/front/js/jquery-1.11.2.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/vendor/videojs/video.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/vendor/videojs/youtube.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/vendor/videojs/videojs-vimeo.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/front/js/pdfjs/pdf.js"></script>
    <?php echo '<script type="text/javascript"> var base_url = "' . base_url() . '"; </script>'?>
</head>
<body><!--[if lt IE 10]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->
<div class=wrapper>
    <header class=header-main>
        <?php if(!isset($hide_top_bar)):?>
        <div class=header-upper>
            <div class=container>
                <div class=row>
                    <ul>
                        <?php if ($user) { ?>
                        <li><a href="<?php echo base_url();?>backend"><img src="<?php echo base_url() . $user[0]['photo'];?>" style="border-radius: 50%; height: 25px; width: 25px;">&nbsp;&nbsp;<?php echo $user_name; ?></a></li>
                        <?php } else {?>
                        <li><a href="<?php echo base_url();?>login">Signup/login</a></li>
                        <?php } ?>
                        <li><a href=<?php echo base_url();?>shopcart><i class="fa fa-shopping-cart"></i> <span>cart(<span class=cartitems>0</span>)</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <?php else:?>
            <style>
                .header-main .header-lower{
                    top:0 !important;
                }
            </style>
        <?php endif;?>
        <div class="header-lower clearfix">
            <div class="container">
                <div class=row><h1 class=logo><a href=<?php echo base_url();?>><img src="<?php echo base_url();?>assets/front/images/logo.png" alt=image></a></h1>

                    <div class=menubar>
                        <nav class=navbar>
                            <div class=nav-wrapper>
                                <div class=navbar-header>
                                    <button type=button class=navbar-toggle><span class=sr-only>Toggle navigation</span>
                                        <span class=icon-bar></span></button>
                                </div>
                                <div class=nav-menu>
                                    <ul class="nav navbar-nav menu-bar">
                                        <li><a href=<?php echo base_url();?> <?php if($menu == 'index') echo 'class=active';?>>Home <span></span> <span></span> <span></span>
                                            <span></span></a></li>
                                        <li><a href=<?php echo base_url();?>about <?php if($menu == 'about') echo 'class=active';?>>about <span></span> <span></span> <span></span>
                                            <span></span></a></li>
                                        <li><a>Partners <span></span> <span></span> <span></span> <span></span></a>
                                            <ul class="sub-menu">
                                                <li><a href="<?php echo base_url();?>partners <?php if($menu == 'partners') echo 'class=active';?>">Partners</a></li>
                                                <li><a href=<?php echo base_url();?>sponsor <?php if($menu == 'sponsor') echo 'class=active';?>>Become a Partner <span></span> <span></span> <span></span> <span></span></a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href=<?php echo base_url();?>roster <?php if($menu == 'roster') echo 'class=active';?>>Roster <span></span> <span></span> <span></span> <span></span></a>
                                        </li>
                                        <li><a href=<?php echo base_url();?>academy <?php if($menu == 'academy') echo 'class=active';?>>Academy <span></span> <span></span> <span></span>
                                            <span></span></a></li>
                                        <li>
                                            <?php if(isset($this->settings['section_merchandise']) && $this->settings['section_merchandise']):?>
                                            <a href=<?php echo base_url();?>shop <?php if($menu == 'shop' || $menu == 'shopcart' || $menu == 'product-details') echo 'class=active';?>>
                                                shop <span></span> <span></span> <span></span>
                                                <span></span>
                                            </a>
                                            <?php else:?>
                                                <a href="<?php echo $this->settings['shop_link'];?>" <?php if($menu == 'shop' || $menu == 'shopcart' || $menu == 'product-details') echo 'class=active';?>>
                                                    shop <span></span> <span></span> <span></span>
                                                    <span></span>
                                                </a>
                                            <?php endif;?>
                                        </li>
                                        
                                        <li><a>Latest <span></span> <span></span> <span></span> <span></span></a>
                                            <ul class="sub-menu">
                                                <li><a href="<?php echo base_url();?>schedules <?php if($menu == 'schedules') echo 'class=active';?>">Schedules</a></li>
                                                <li><a href="<?php echo base_url();?>videos <?php if($menu == 'videos') echo 'class=active';?>">Videos</a></li>
                                                <li><a href="<?php echo base_url();?>news <?php if($menu == 'news') echo 'class=active';?>">News</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href=<?php echo base_url();?>contact <?php if($menu == 'contact') echo 'class=active';?>>
                                                contact <span></span> <span></span>
                                                <span></span> <span></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class=social>
						<a href=https://www.facebook.com/templatespoint.net class=facebook><i class="fa fa-facebook"></i></a> 
						<a href=https://twitter.com/itobuztech class=twitter><i class="fa fa-twitter"></i></a> 
						<a href=https://www.youtube.com/ class=behance><i class="fa fa-youtube"></i></a>
					</div>
                </div>
            </div>
        </div>
    </header>