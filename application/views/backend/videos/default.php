<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3 border-secondary">
                <div class="card-header">
                    <h6 class="font-weight-bold text-left" style="float: left">Latest Videos</h6>
                    <div class="card-tools" style="float: right">
                        <a href="<?php echo site_url('backend/latest_videos/add_video');?>" class="btn btn-success btn-sm" role="button"><i class="fa fa-plus"></i> Add Video</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-stripped items">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Title</th>
                                <th>Video</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>