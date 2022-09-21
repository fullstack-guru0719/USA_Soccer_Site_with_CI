
<div id="content-wrapper">
  <div class="container-fluid">
    <div class="card card-register mx-auto mt-5 mb-3">
        <div class="card-header">Show mail</div>
        <div class="card-body">
            <div style="margin: 20px 50px;">
                <div class="row form-group">
                    <?php if($user[0]['id'] == $mail[0]['to_user']) { ?>
                    <div class="col col-md-3">
                        <label for="disabled-input" class=" form-control-label">From</label></div>
                    <div class="col-12 col-md-9"><p class="from-control"><?php
                          foreach ($users as $to_user) {
                          if ($mail[0]['from_user'] == $to_user['id']) { echo $to_user['username']; }
                        } ?> <small>( <?php $date = date_create($mail[0]['create_date']); echo date_format($date, 'Y \/ m \/ d g:ia');?> )</small></p></div>
                    <?php } else { ?>
                    <div class="col col-md-3">
                        <label for="disabled-input" class=" form-control-label">To</label></div>
                    <div class="col-12 col-md-9"><p class="from-control">
                        <?php
                          foreach ($users as $to_user) {
                          if ($mail[0]['to_user'] == $to_user['id']) { echo $to_user['username']; }
                        } ?> <small>( <?php $date = date_create($mail[0]['create_date']); echo date_format($date, 'Y \/ m \/ d g:ia');?> )</small></p></div>
                    <?php } ?>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Title</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="disabled-input" name="disabled-input" disabled="" class="form-control" value="<?php echo $mail[0]['message_title']?>"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Content</label></div>
                    <div class="col-12 col-md-9"><textarea name="textarea-input" id="textarea-input" rows="5" class="form-control" disabled><?php echo $mail[0]['message_content']?></textarea></div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>