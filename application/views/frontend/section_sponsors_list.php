<?php if(is_array($sponsors) && count($sponsors) > 0):?>
<div style="margin-bottom:50px;">
    <center>
        <ul>     
            <li><h2>Partners</h2>
                <ul class=widget_productdetails>
                    <?php foreach($sponsors as $key => $val):?>
                    <li><a href=#><?php echo ucfirst($val['name']);?></a></li>
                    <?php endforeach;?>
                </ul>
            </li>
        </ul>
        </br>
        <center><a href="<?php echo site_url('sponsor');?>" class="btn btn-red">Become A Partner</a></center>
    </center>
</div>
<?php endif;