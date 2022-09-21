<section class="innerpage_all_wrap bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="bannerHeadline"><span>News</span></h2>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top:30px;">
        <div class="row">
            <div class="innerWrapper">
                <main class="contentinner">
                    <div class="blogDetails col-md-12">
                        <div class="blogimg">
                            <img src="<?php echo site_url($item['news_logo']);?>" alt="<?php echo $item['news_title'];?>" style="width:100%;"/>
                        </div>
                        <div class=blog_info>
                            <div class=clearfix>
                                <div class=headlinewrap01>
                                    <h4 class=headline02><?php echo $item['news_title'];?></h4>
                                    <p class="paragraph02 uppercaseheading"><?php echo date("j F Y", strtotime($item['create_date']));?></p>
                                </div>
                            </div>
                            <p class=blog-content><?php echo $item['news_content'];?></p>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</section>