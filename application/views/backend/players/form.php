<div id="content-wrapper">
    <?php echo form_open_multipart(site_url("backend/add_player"));?>
    <input type="hidden" name="id" value="<?php echo $item->id;?>"/>
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Add player</h1>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12 text-right">
                <a class="btn btn-secondary btn-sm" href="<?php echo site_url('backend/players')?>">
                    <i class="fas fa-arrow-left"></i>&nbsp;Back
                </a>
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fas fa-save"></i>&nbsp;Save
                </button>
            </div>
        </div>
        <div class="row mt-3">
            <?php $this->load->view('backend/players/general');?>
        </div>

        <div class="row mt-3">
            <?php $this->load->view('backend/players/professional');?>
        </div>

        <div class="row mt-3">
            <?php $this->load->view('backend/players/biography');?>
        </div>

        <div class="row mt-3">
            <?php $this->load->view('backend/players/career');?>
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
