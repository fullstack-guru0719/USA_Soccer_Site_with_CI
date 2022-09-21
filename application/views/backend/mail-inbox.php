
<div id="content-wrapper">
    <div class="container-fluid">

        <div class="content mt-3 mb-3">
            <div class="animated">

                <div class="card">
                    <div class="card-header">
                        <strong class="card-title" style="font-size: 25px">Mails</strong>
                        <!-- <span style="font-size: 25px"> Mails </span> -->
                        <div style="float: right">
                          <a href="javascript:;" class="btn btn-success new_mail_modal" role="button" data-toggle="modal" data-target="#newModal"><icon class="fa fa-plus"></icon> New mail </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center" style="vertical-align: middle;">From</th>
                                    <th class="text-center" style="vertical-align: middle;">Title</th>
                                    <th class="text-center" style="vertical-align: middle;">Status</th>
                                    <th class="text-center" style="vertical-align: middle;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($mails as $mail) {
                                ?>
                                <tr>
                                    <td class="text-center" style="vertical-align: middle;">
                                        <?php
                                          foreach ($users as $to_user) {
                                          if ($mail['from_user'] == $to_user['id']) { echo $to_user['username']; }
                                        } ?>
                                    </td>
                                    <td class="text-center" style="vertical-align: middle;"><?php echo $mail['message_title']?></td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        <?php
                                        if($mail['read_status'] == 0) {
                                        ?>
                                        <span class="badge badge-warning">Unread</span>
                                        <?php
                                        } else {
                                        ?>
                                        <span class="badge badge-success">Read</span>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        <a href="<?php echo base_url()?>backend/mails/show_mail/<?php echo $mail['id']?>" role="button" class="btn btn-outline-primary btn-sm read_mail_btn" attr-id="<?php echo $mail['id']?>">Read</a>
                                        <button type="button" class="btn btn-outline-info btn-sm reply_mail_action" attr-id="<?php echo $mail['from_user']?>" attr-username="<?php
                                          foreach ($users as $to_user) {
                                          if ($mail['from_user'] == $to_user['id']) { echo $to_user['username']; }
                                        } ?>" data-toggle="modal" data-target="#reply">Reply</button>
                                        <button type="button" class="btn btn-outline-danger btn-sm del_to_action" attr-id="<?php echo $mail['id']?>" data-toggle="modal" data-target="#remove">Remove</button>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">New mail</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div style="margin: 20px 50px;">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">To</label></div>
                                        <div class="col-12 col-md-9">
                                            <select class="form-control" id="selectUser" />
                                                <?php
                                                  foreach ($users as $to_user) {
                                                  if ($user[0]['id'] != $to_user['id']) { ?>
                                                <option value="<?php echo $to_user['id']?>" attr-email="<?php echo $to_user['email']?>"><?php echo $to_user['username']?></option>
                                                <?php } } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="inputTitle" class=" form-control-label">Title</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="inputTitle" name="inputTitle" placeholder="Write a title" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="inputContent" class=" form-control-label">Content</label></div>
                                        <div class="col-12 col-md-9"><textarea name="inputContent" id="inputContent" rows="5" placeholder="Content..." class="form-control"></textarea></div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-primary send_mail_btn" attr-id="<?php echo $user[0]['id']?>" href="javascript:;"> Send </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="reply" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Reply</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div style="margin: 20px 50px;">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">To</label></div>
                                        <div class="col-12 col-md-9">
                                            <p class="reply_to_mail" style=" font-weight: bold"></p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="replyTitle" class=" form-control-label">Title</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="replyTitle" name="replyTitle" placeholder="Write a title" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="replyContent" class=" form-control-label">Content</label></div>
                                        <div class="col-12 col-md-9"><textarea name="replyContent" id="replyContent" rows="5" placeholder="Content..." class="form-control"></textarea></div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-outline-primary reply_mail_btn" attr-id="<?php echo $user[0]['id']?>">Send</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="remove" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="smallmodalLabel">Remove</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    Do you want to remove this mail, really?
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-outline-primary del_to_btn">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- .animated -->
        </div><!-- .content -->

    </div>
</div>

