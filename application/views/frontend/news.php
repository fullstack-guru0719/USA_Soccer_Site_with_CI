<section class="innerpage_all_wrap bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="text-align:center;">
                <h2 class="bannerHeadline"><span>News</span></h2>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top:30px;">
        <div class="row">
            <div class="col-md-12">
                <form action="<?php echo current_url();?>" method="get">
                    <div class="input-group">
                        <input name="filter_search" type="text" class="form-control" placeholder="Search for..." style="height:40px;" value="<?php echo $this->input->get('filter_search');?>">
                        <span class="input-group-btn">
                            <button class="btn btn-red" type="submit" style="padding:5px 10px;">SEARCH</button>
                        </span>
                    </div><!-- /input-group -->
                </form>
            </div>
        </div><br/>
        <div class="row">
            <div class="innerWrapper">
                <main>
                    <?php foreach($news as $key => $item):?>
                        <div class="blogDetails col-md-4">
                            <div class="blogimg">
                                <img src="<?php echo site_url($item['news_logo']);?>" alt="<?php echo $item['news_title'];?>"/>
                            </div>
                            <div class=blog_info>
                                <div class=clearfix>
                                    <div class=headlinewrap01>
                                        <h4 class=headline02><?php echo $item['news_title'];?></h4>
                                        <p class="paragraph02 uppercaseheading"><?php echo date("j F Y", strtotime($item['create_date']));?></p>
                                    </div>
                                </div>
                                <p class=blog-content><?php echo substr(strip_tags($item['news_content']),0,50);?></p>

                                <div class="blog-detailsfooter clearfix">
                                    <a href="<?php echo site_url('news/'.$item['slug']);?>" class="btn-small01 btn-red">Read more</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>
                </main>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <?php echo $pagination;?>
            </div>
        </div>
    </div>
</section>