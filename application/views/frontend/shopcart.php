
    <!-- <div class=innerbannerwrap>
        <div class=content></div>
        <div class=innerbanner><h2 class=bannerHeadline>My <span>Cart</span></h2></div>
    </div> -->
    <section class=innerpage_all_wrap>
        <div class=container>
            <br>
             <center>
                <img src="<?php echo base_url()?>assets/front/images/images/Mycart-Logo-2018a.png" class="img-corner" alt="la aztecs" width="400">
            </center>
        </div>
    </section>
    <section class=cartwrap>
        <div class=cartshop>
            <div class=bg-red></div>
            <div class=container>
                <div class=row>
                    <div class=modal-body>
                        <div class="cartHeader clearfix">
                            <div class=header01><h4>your basket</h4></div>
                            <div class=header02><h4><span>you have selected <span class=cartitems></span> product</span>
                                <a href=#><i class="fa fa-cart-plus"></i> <span class=cartitems>1</span></a></h4>

                                <p>your order ID is 2221</p>

                                <p class=datetime></p></div>
                        </div>
                        <div class="card-item clearfix">
                            <div>
                                <div class=big-content><h4>product name</h4></div>
                                <div class="big-content medium-content"><h4>quantity</h4></div>
                                <div class="big-content small-content"><h4>price</h4></div>
                            </div>
                            <div id=cartItems></div>
                            <div class="card-item cart-total clearfix"></div>
                            <div class="card-item clearfix">
                                <div class=big-content><h4>select destination country</h4><select class=form-control>
                                    <!-- <option>India</option> -->
                                    <option>USA</option>
                                </select></div>
                                <div class=big-content><h4>select delivery method</h4>
                                <select class="form-control delivery_option">
                                    <?php if (count($deliveries)) {
                                    foreach ($deliveries as $delivery) { ?>
                                    <option style="color: black" value="<?php echo $delivery['cost']?>"><?php echo $delivery['description']?> - $<?php echo $delivery['cost']?></option>
                                    <?php }
                                    }?>
                                </select></div>
                            </div>
                            <div class="card-item cart-total clearfix">
                                <div class="big-content medium-content"><h4>total cost</h4></div>
                                <div class="big-content small-content"><h4 id=carttotal>$210</h4></div>
                            </div>
                        </div>
                        <div class=modal-footer>
                            <a href=# class="btn-red pay_btn" role=button>order now</a>
                        </div>
                        <!-- <div class=center><a href=shopcart02.html class="btn btn-red">Check out another Cart page
                            design</a></div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class=footer-type01>