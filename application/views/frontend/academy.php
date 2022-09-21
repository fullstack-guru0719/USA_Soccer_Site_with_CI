
    <section class=innerpage_all_wrap>
        <div class=container>
            <br>
            <center>
                <img src="https://i.ytimg.com/vi/qt6yDoT3sGU/hqdefault.jpg" class="img-corner" alt="la aztecs">
            </center>
            <div class=row>
                <h2 class=heading>Please Complete <span>Form</span></h2>
                <?php if (isset($_SESSION['user_id'])) { ?>
                <p class=headParagraph>Information</p>
                <?php } else { ?>
                <p class=headParagraph><a href=<?php echo base_url();?>register class="btn btn-red">Sign Up</a></p>
                <?php } ?>
                <div class=form-message></div>
            </div>
        </div>
    </section>
        
    <!-- Footer -->
    <footer class=footer-type01>