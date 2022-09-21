<div id="content-wrapper">
    <?php echo form_open_multipart(site_url("backend/settings"));?>
    <input type="hidden" name="site_settings" value="1"/>
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Site Settings</h1>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12 text-right">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fas fa-save"></i>&nbsp;Save Settings
                </button>
            </div>
        </div>
        <div class="row mt-3">
            <?php $this->load->view('backend/settings/general');?>
        </div>
        <div class="row mt-3">
            <?php $this->load->view('backend/settings/frontend');?>
        </div>
        <div class="row mt-3">
            <?php $this->load->view('backend/settings/page');?>
        </div>
        <div class="row mt-3">
            <?php $this->load->view('backend/settings/footer');?>
        </div>
        <div class="row mt-3">
            <?php $this->load->view('backend/settings/social');?>
        </div>
        <div class="row mt-3">
            <?php $this->load->view('backend/settings/player');?>
        </div>
        <div class="row mt-3 mb-3">
            <div class="col-md-12 col-sm-12 col-lg-12 text-right">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fas fa-save"></i>&nbsp;Save Settings
                </button>
            </div>
        </div>
    </div>
    <?php form_close();?>
</div>
