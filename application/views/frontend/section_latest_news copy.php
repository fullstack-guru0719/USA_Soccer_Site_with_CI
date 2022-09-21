<?php if (!($latest_news)) { ?>
<section class="latest_news bg-white">
    <div class=container>
        <div class=row><h2 class=heading>latest <span>news</span></h2>

            <p class=headParagraph>La Aztecs New Signing</p>
            
            <center>
                <div class=playerFig>
                    <div class=playerpic>
                        <div style="background-image: url(<?php echo base_url();?>assets/front/images/player/player05.jpg)" class=bgimg></div>
                    </div>
                    <ul class="playerDetails clearfix">
                        <!-- <li><span>Dominick Dumbleton</span> <span><img src=<?php echo base_url();?>assets/front/images/icons/tShirt.png alt=image></span></li> -->
                        <li><span>Dominick Dumbleton</span></li>
                        <li class=playinfodetails>age 28 (born 22 april ,1987)</li>
                        <!-- <li class=playerInfo><span>STRIKER</span> <span>Signed October 12, 2019</span> -->
                        </li>
                    </ul>
                </div>
            </center>
        </div>
    </div>
</section>
<?php } else { ?>
<section class="latest_news bg-white">
    <div class=container>
        <div class=row><h2 class=heading>latest <span>news</span></h2>

            <p class=headParagraph><?php echo $latest_news[0]['news_title'] ?></p>
            
            <center>
                <div class=playerFig>
                    <div class=playerpic>
                        <!-- <div style="background-image: url(<?php echo base_url() . $latest_news[0]['news_logo'];?>)"></div> -->
                        <img src="<?php echo base_url() . $latest_news[0]['news_logo']; ?>" width="100%" height="100%" alt="" />
                    </div>
                    <ul class="playerDetails clearfix">
                        <!-- <li><span>Dominick Dumbleton</span> <span><img src=<?php echo base_url();?>assets/front/images/icons/tShirt.png alt=image></span></li> -->
                        <li><span><?php echo $latest_news[0]['news_title'] ?></span></li>
                        <li class=playinfodetails><?php echo $latest_news[0]['news_content'] ?></li>
                        <!-- <li class=playerInfo><span>STRIKER</span> <span>Signed October 12, 2019</span> -->
                        </li>
                    </ul>
                </div>
            </center>
        </div>
    </div>
</section>
<?php } ?>


