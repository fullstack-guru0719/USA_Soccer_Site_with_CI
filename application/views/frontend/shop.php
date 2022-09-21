
    <div class=innerbannerwrap>
        <div class=content></div>
        
    </div>
    <section class=innerpage_all_wrap>
        <div class=container>
            <div class=row>
                <h2 class=heading>Shop<span> La Aztecs</span></h2>

                <div class=innerWrapper>
                    <aside class="widgetinner clearfix">
                        <div class=widgetinfowrap>
                            <div class=bg-blackimg>short by</div>
                            <ul class="widgetinfo info01">
                                <?php foreach($categories as $category) { ?>
                               <!--  <a href="<?php echo base_url();?>data_publish/<?php echo $value['id']?> -->
                                <a href="<?php echo base_url();?>shop/<?php echo $category['category_name']?>"><li><?php echo $category['category_name']?></li></a>
                                <?php } ?>
                            </ul>
                            <!-- <a href=# class=blacklrnmore>learn more</a> -->
                        </div>
                        <div class=widgetinfowrap>
                            <div class=bg-blackimg>color</div>
                            <ul class="widgetinfo info01">
                                <?php foreach($colors as $color) { ?>
                               <!--  <a href="<?php echo base_url();?>data_publish/<?php echo $value['id']?> -->
                                <a href="<?php echo base_url();?>shop/colour/<?php echo $color['color_name']?>"><li><?php echo $color['color_name']?></li></a>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class=widgetinfowrap>
                            <div class=bg-blackimg>Sizes</div>
                            <div class=sizepic>
                                <?php foreach($sizes as $size) { ?>
                                <a href=<?php echo base_url();?>shop/attr/<?php echo $size['size_name']?>><?php echo $size['size_name']?></a>
                                <?php } ?>
                            </div>
                        </div>
                    </aside>
                    <aside class=contentinner>
                        <div class="shop-wrap-slider clearfix">
                            <?php if (count($products) > 0) { ?>
                                <?php foreach($products as $key => $product) { ?>
                                    <?php if ($key%5 == 0) { ?>
                                    <div class=shop_detais>
                                    <?php } ?>
                                        <div class="shop01 clearfix">
                                            <div class=shop-img>
                                                <div class=bgimg style="background: url(<?php echo base_url() . $product['product_image'];?>)"></div>
                                            </div>
                                            <div class=shop_info><h4 class=headline01><a href=<?php echo base_url();?>shop/product_details/<?php echo $product['id']?>><?php echo $product['product_name']?></a></h4>

                                                <div class=star><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                        class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                        class="fa fa-star"></i></div>
                                                <p><?php echo $product['product_detail']?></p>

                                                <div class=headline01>Price:&nbsp;&nbsp; $<?php echo $product['product_price']?></div>
                                                <div class=addcart-wrap><a href=# class="btn-addcart addToCart" data-productid="<?php echo $product['id']?>" data-productname="<?php echo $product['product_name']?>" data-productprice="<?php echo $product['product_price']?>" data-productimage="<?php echo base_url() . $product['product_image'];?>">add to
                                                    cart</a></div>
                                            </div>
                                        </div>
                                    <?php if ($key%5 == 4) { ?>
                                    </div>
                                    <?php } ?>
                                <?php } ?>
                                <?php if ($key%5 != 4) { ?>
                                </div>
                                <?php } ?>
                            <?php } else {
                                echo "<script type='text/javascript'>alert('Sold Out');
                                    window.location.href= base_url + 'shop';
                                </script>";

                            } ?>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class=footer-type01>
    <style type="text/css">
        .widgetinfowrap a{
            padding: 5px 0px 10px 0px;
        }
    </style>