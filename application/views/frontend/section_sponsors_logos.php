<?php if(is_array($sponsors) && count($sponsors) > 0):?>
<section class=social-media>
    <div class=container>
        <div class=row>
            <ul class="social-slides">
                <?php foreach($sponsors as $key => $val):?>
                <li class="text-center">
                    <a href="#">
                        <img src="<?php echo site_url('uploads/'.$val['logo']);?>" width="150" height="150" style="margin:0 auto;"/><br/>
                    </a>
                    <p><?php echo $val['name'];?></p>
                </li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
</section>
<?php endif;