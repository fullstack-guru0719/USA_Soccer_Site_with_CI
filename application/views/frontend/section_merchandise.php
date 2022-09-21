<section class="product bg-white">
    <div class=container>
        <div class=row><h2 class=heading>TOP PRODUCTS & <span>merchandise</span></h2>

            <p class=headParagraph>Merch 1.</p>
            
            <?php if (count($products)) { ?>
                <ul class=product_details>
                <?php foreach($products as $key => $product) { ?>
                    <li>
                        <a href=<?php echo base_url();?>shop/product_details/<?php echo $product['id']?>>
                            <div>
                                <div class=product-img
                                        style="background: url(<?php echo base_url() . $product['product_image'];?>) center no-repeat; cursor: pointer;"></div>
                            </div>
                        </a>
                            <ul class="oswald16 product_info">
                                <li class=detailsContainer style="text-align: center;"><center><?php echo $product['product_name']?></center></li>
                                <li class="cartContainer addToCart" data-productid="<?php echo $product['id']?>" data-productname="<?php echo $product['product_name']?>" data-productprice="<?php echo $product['product_price']?>" data-productimage="<?php echo base_url() . $product['product_image'];?>" style="cursor: pointer;"><span>Add to cart</span> <span><i
                                        class="fa fa-shopping-cart"></i></span> <span class=price>$<?php echo $product['product_price']?></span></li>
                            </ul>
                        
                    </li>
                <?php } ?>
                </ul>
            <?php } else { ?>
            <ul class=product_details>
                <li><a href=#>
                    <div>
                        <div class=product-img
                                style="background: url(<?php echo base_url();?>assets/front/images/product/product01.jpg) center no-repeat;"></div>
                    </div>
                    <ul class="oswald16 product_info">
                        <li class=detailsContainer><span>soccer jersey</span> <span><i
                                class="fa fa-user"></i>360</span></li>
                        <li class=cartContainer><span>Add to cart</span> <span><i
                                class="fa fa-shopping-cart"></i></span> <span class=price>$199</span></li>
                    </ul>
                </a></li>
                <li><a href=#>
                    <div>
                        <div class=product-img
                                style="background: url(<?php echo base_url();?>assets/front/images/product/product02.jpg) center no-repeat"></div>
                    </div>
                    <ul class="oswald16 product_info">
                        <li class=detailsContainer><span>soccer jersey</span> <span><i
                                class="fa fa-user"></i>360</span></li>
                        <li class=cartContainer><span>Add to cart</span> <span><i
                                class="fa fa-shopping-cart"></i></span> <span class=price>$199</span></li>
                    </ul>
                </a></li>
                <li><a href=#>
                    <div>
                        <div class=product-img
                                style="background: url(<?php echo base_url();?>assets/front/images/product/product03.jpg) center no-repeat"></div>
                    </div>
                    <ul class="oswald16 product_info">
                        <li class=detailsContainer><span>soccer jersey</span> <span><i
                                class="fa fa-user"></i>360</span></li>
                        <li class=cartContainer><span>Add to cart</span> <span><i
                                class="fa fa-shopping-cart"></i></span> <span class=price>$199</span></li>
                    </ul>
                </a></li>
                <li><a href=#>
                    <div>
                        <div class=product-img
                                style="background:url(<?php echo base_url();?>assets/front/images/product/product04.jpg) center no-repeat"></div>
                    </div>
                    <ul class="oswald16 product_info">
                        <li class=detailsContainer><span>soccer jersey</span> <span><i
                                class="fa fa-user"></i>360</span></li>
                        <li class=cartContainer><span>Add to cart</span> <span><i
                                class="fa fa-shopping-cart"></i></span> <span class=price>$199</span></li>
                    </ul>
                </a></li>
            </ul>
            <?php } ?>
            <div class=center><a href=<?php echo base_url();?>shop class="btn btn-red">view more</a></div>
        </div>
    </div>
</section>