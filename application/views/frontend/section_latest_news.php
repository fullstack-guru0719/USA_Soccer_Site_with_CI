<?php if(is_array($latest_news) && count($latest_news) > 0):?>
    <section class="latest_news bg-white">
        <div class=container>
            <div class=row><h2 class=heading>latest <span>news</span></h2>
                <div class="LatestNews_wrap clearfix">
                    <div class="tab-content news_display_container clearfix">
                        <a class="prv club_prev"></a> <a class="nxt club_next"></a>
                        <ul id=club_news class="tab-pane active clearfix">
                            <?php foreach($latest_news as $key => $val):?>
                            <li>
                                <div class=figure>
                                    <div class=column-news>
                                        <div class=figure-01>
                                            <img src="<?php echo site_url($val['news_logo']);?>" alt="image" height="300" width="263"/>
                                        </div>
                                        <div class=content-01>
                                            <h6><a href=#><?php echo $val['news_title'];?></a></h6>
                                            <p class=describtion><?php echo $val['news_content'];?></p>
                                        </div>
                                        <div class="news_date clearfix text-center" style="text-align:center;">
                                            <a class="btn-small01" href="<?php echo site_url("news/".$val['slug']);?>" style="margin:0 auto;">Read more</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <br/><a class="btn btn-red" href="<?php echo site_url("news");?>" style="margin:0 auto;">View All News</a>
                </div>
            </div>
        </div>
    </section>
<?php endif;?>