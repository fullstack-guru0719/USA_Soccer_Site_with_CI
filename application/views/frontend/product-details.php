
    <div class=innerbannerwrap>
        <div class=content></div>
        <div class=innerbanner><h2 class=bannerHeadline>product <span>details</span></h2></div>
    </div>
    <section class=shopDpage>
        <div class=container>
            <div class=row><h2 class="heading small">best soccer <span>Accessories shop</span></h2>

                <p class=headParagraph>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil debitis mollitia
                    qui libero voluptate ratione, molestias! Necessitatibus voluptatem temporibus doloremque non.</p>

                <div class=shop-wrap>
                    <div class=product-image-wrap>
                        <div class=p_wrap>
                            <div class="product-image active" id=product01><img src=<?php echo base_url() . $product[0]['product_image'];?> alt=image></div>
                            <!-- <div class="product-image active" id=product01><img src=<?php echo base_url();?>assets/front/images/product/shoesBig01.png alt=image></div>
                            <div class=product-image id=product02><img src=<?php echo base_url();?>assets/front/images/product/shoesBig02.png alt=image>
                            </div>
                            <div class=product-image id=product03><img src=<?php echo base_url();?>assets/front/images/product/shoesBig03.png alt=image>
                            </div>
                            <div class=product-image id=product04><img src=<?php echo base_url();?>assets/front/images/product/shoesBig04.png alt=image>
                            </div>
                            <div class=product-image id=product05><img src=<?php echo base_url();?>assets/front/images/product/shoesBig05.png alt=image> -->
                            </div>
                        </div>
                        <!-- <div class=wrap-slide><h5>select color</h5>

                            <div><a class=prvProduct></a> <a class=nxtProduct></a>
                                <ul class="product-details-slider clearfix">
                                    <li class=active><a href=#product01><img src=<?php echo base_url() . $product[0]['product_image'];?> alt=image></a></li>
                                    <li class=active><a href=#product01><img src=<?php echo base_url();?>assets/front/images/product/shoe01.jpg alt=image></a></li>
                                    <li><a href=#product02><img src=<?php echo base_url();?>assets/front/images/product/shoe02.jpg alt=image></a></li>
                                    <li><a href=#product03><img src=<?php echo base_url();?>assets/front/images/product/shoe03.jpg alt=image></a></li>
                                    <li><a href=#product04><img src=<?php echo base_url();?>assets/front/images/product/shoe04.jpg alt=image></a></li>
                                    <li><a href=#product05><img src=<?php echo base_url();?>assets/front/images/product/shoes05.png alt=image></a></li>
                                </ul>
                            </div>
                        </div> -->
                    </div>
                    <div class=product-content><h4>soccer club 99 shoes</h4>
                        <ul class="product-content01 clearfix">
                            <li><span><i class="fa fa-star reviewGood"></i> <i class="fa fa-star reviewGood"></i> <i
                                    class="fa fa-star reviewGood"></i> <i class="fa fa-star"></i> <i
                                    class="fa fa-star"></i></span> <span>38</span> <span>12 reviews</span></li>
                            <li>write a REVIEW</li>
                            <li><i class="fa fa-heart"></i><span>Add to Wishlist</span></li>
                        </ul>
                        <div class="rate-product clearfix">
                            <div class=rate-item>
                                <div>$<?php echo $product[0]['product_price']?> <span>42% off</span></div>
                                <p>seling price (Free delivery)</p></div>
                            <div class=item-size><h6>Select Size</h6>
                                <ul>
                                    <li>6</li>
                                    <li>7</li>
                                    <li>8</li>
                                </ul>
                                <p>Size Chat <span></span></p></div>
                        </div>
                        <a href=# class="btn-addcart addToCart" data-productid="<?php echo $product[0]['id']?>" data-productname="<?php echo $product[0]['product_name']?>" data-productprice="<?php echo $product[0]['product_price']?>" data-productimage="<?php echo base_url() . $product[0]['product_image'];?>">add to cart</a> <a href=<?php echo base_url();?>shop/pay?product_id=<?php echo $product[0]['id']?>&product_name=<?php echo $product[0]['product_name']?>&product_price=<?php echo $product[0]['product_price']?> class=btn-blackLight>Buy Now</a> 

                        <div class=product-list><h5>product details</h5>
                            <p><?php echo $product[0]['product_detail']?></p>
                            <!-- <ul class=clearfix>
                                <li>Cash returns</li>
                                <li>pay securley</li>
                                <li>brand new</li>
                                <li>30 day exchange guarantee</li>
                                <li>100% original</li>
                                <li>free delivery</li>
                            </ul> -->
                        </div>
                    </div>
                </div>
                <div class=shop-feedback><h5>customer feedback <a class=feedbackCust><i
                        class="fa fa-caret-down"></i></a></h5>

                    <form data-parsley-validate="" name=contact class="feedbackContact formcontact clearfix">
                        <div class=form-group><input type=text class=form-control name=name placeholder=Name required="" data-parsley-required-message="please insert Name"></div>
                        <div class=form-group><input type=text class=form-control name=phone placeholder=Phone required="" data-parsley-required-message="please insert Phone No">
                        </div>
                        <div class=form-group><input type=text class=form-control name=subject placeholder=subject required="" data-parsley-required-message="please insert subject">
                        </div>
                        <div class=form-group><input type=email class=form-control name=email placeholder=Email required="" data-parsley-required-message="please insert Email">
                        </div>
                        <div class=form-group1><textarea class="form-control textas" name=comment placeholder=Message required="" data-parsley-minlength=20 data-parsley-minlength-message="Come on! You need to enter at least a 20 character comment.." data-parsley-validation-threshold=10 data-parsley-maxlength=100></textarea></div>
                        <button type=submit class=btn-blackLight id=send>submit</button>
                        <div class=form-message></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
        
    <!-- Footer -->
    <footer class=footer-type01>