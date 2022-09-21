<div class="col-md-12">
    <div class="card shadow">
        <div class="card-header ">
            Biography
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-12">
                    <textarea rows="30" name="biography" class="form-control w-100 summernote"><?php echo $item->biography ? $item->biography : set_value('biography');?></textarea>
                </div>
            </div>
        </div>
    </div>
</div>