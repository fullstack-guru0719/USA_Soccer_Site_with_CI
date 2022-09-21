<div id="content-wrapper">
    <?php echo form_open_multipart(site_url("backend/create_news"));?>
    <input type="hidden" name="item_id" value="<?php echo $item->id;?>"/>
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Create News</h1>
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header ">
                        General
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Featured Image</label><br/>
                                <input name="news_logo" type="file" class="form-control w-100" placeholder="Upload news featured image" <?php echo !$item->id ? 'required':'';?>/>
                                <?php echo form_error('news_logo');?>
                                <?php if($item->news_logo):?>
                                    <br/><img src="<?php echo site_url($item->news_logo);?>" width="100"/>
                                <?php endif;?>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Title</label><br/>
                                <input name="news_title" type="text" value="<?php echo $item->news_title;?>" class="form-control w-100" placeholder="News Title" required/>
                                <?php echo form_error('news_title');?>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label><br/>
                                    <textarea name="news_content" class="form-control summernote"><?php echo $item->news_content;?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3 mb-3">
            <div class="col-md-12 col-sm-12 col-lg-12 text-right">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fas fa-save"></i>&nbsp;Save
                </button>
            </div>
        </div>
    </div>
    <?php form_close();?>
</div>
