    
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.p-image-preview').css('background-image', 'url('+e.target.result +')');
                $('.p-image-preview').hide();
                $('.p-image-preview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#primary-image").change(function() {
        readURL(this);
    });

    $('#datepicker').datetimepicker({
        footer: true,
        modal: true,
        format: 'yyyy-mm-dd HH:MM'
    });

    $('#datepicker1').datetimepicker({
        footer: true,
        modal: true,
        format: 'yyyy-mm-dd HH:MM'
    });

    // Profile manage

    $('.update-profile-form').on('submit', function() {

        var send_data = {
            'fullname' : $('#editFullName').val(),
            'email' : $('#editEmail').val(),
            'address' : $('#editAddress').val(),
            'phone' : $('#editPhone').val(),
            'age' : $('#editAge').val(),
            'username' : $('#editUsername').val()
        };

        if ($('#editPassword').val())
        {
            var password = $('#editPassword').val();
            if ($('#editConfirmPassword').val())
            {
                var rpassword = $('#editConfirmPassword').val();
                if (password == rpassword)
                {
                    send_data['password'] = rpassword;
                } else {
                    toastr['error']('Confirm Password must be equal to password', 'Fail');
                    return false;
                }
            }
        }

        if ($('#primary-image').val() == '') {
            $.ajax({
                url: base_url + 'BackendController/update_profile',
                type: 'post',
                data: send_data,
                success:function(res){

                    res = JSON.parse(res);

                    if (res.success)
                    {
                        toastr['success'](res.message,'Update Result');
                    }
                    else
                    {
                        toastr['error'](res.message,'Update Result');
                    }
                }
            });
        } else {
            $.ajaxFileUpload({
                url: base_url + 'BackendController/profile_photo_upload',
                secureuri:false,
                fileElementId:'primary-image',
                dataType: 'json',
                success: function (data, status)
                {
                    send_data['photo'] = data.filename;
                    
                    $.ajax({
                        url: base_url + 'BackendController/update_profile',
                        type: 'post',
                        data: send_data,
                        success:function(res){

                            res = JSON.parse(res);

                            if (res.success)
                            {
                                toastr['success'](res.message,'Update Result');
                            }
                            else
                            {
                                toastr['error'](res.message,'Update Result');
                            }
                        }
                    });
                },
                error: function (data, status, e)
                {
                    toastr['error'](data.message,'Update Result');
                }
            });
        }

        return false;
    });

    // User manage

    $('.add-user-form').on('submit', function() {

        var send_data = {
            'fullname' : $('#inputFullName').val(),
            'email' : $('#inputEmail').val(),
            'username' : $('#inputUsername').val(),
            'user_group' : $('#inputUsergroup').val()
        };
        

        if ($('#inputPassword').val())
        {
            var password = $('#inputPassword').val();
            if ($('#inputConfirmPassword').val())
            {
                var rpassword = $('#inputConfirmPassword').val();
                if (password == rpassword)
                {
                    send_data['password'] = rpassword;
                } else {
                    toastr['error']('Confirm Password must be equal to password', 'Fail');
                    return false;
                }
            }
        }
        send_data = $('.add-user-form').serialize();
        $.ajax({
            url: base_url + 'BackendController/create_user',
            type: 'post',
            data: send_data,
            success:function(res){

                res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Add Result');
                    window.location.href = base_url+'backend/users';
                }
                else
                {
                    toastr['error'](res.message,'Add Result');
                }
            }
        });
        return false;
    });

    $('.edit-user-form').on('submit', function() {

        var send_data = {
            'id' : $('#update_user_btn').attr('attr-id'),
            'fullname' : $('#editFullName').val(),
            'email' : $('#editEmail').val(),
            'address' : $('#editAddress').val(),
            'phone' : $('#editPhone').val(),
            'age' : $('#editAge').val(),
            'username' : $('#editUsername').val(),
            'user_group' : $('#editUsergroup').val()
        };

        if ($('#editPassword').val())
        {
            var password = $('#editPassword').val();
            if ($('#editConfirmPassword').val())
            {
                var rpassword = $('#editConfirmPassword').val();
                if (password == rpassword)
                {
                    send_data['password'] = rpassword;
                } else {
                    toastr['error']('Confirm Password must be equal to password', 'Fail');
                    return false;
                }
            }
        }

        $.ajax({
            url: base_url + 'BackendController/update_user',
            type: 'post',
            data: send_data,
            success:function(res){

                res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Add Result');
                    window.location.href = base_url+'backend/users';
                }
                else
                {
                    toastr['error'](res.message,'Add Result');
                }
            }
        });
        return false;
    });

    $('.del_user_action').click(function() {
      var attr_id = $(this).attr('attr-id');
      $('.del_user_btn').attr('attr-id', attr_id);
    });

    $('.del_user_btn').click(function() {
        $.ajax({
            url: base_url + 'BackendController/delete_user',
            type: 'post',
            data: {id: $(this).attr('attr-id')},
            success: function(res)
            {
              res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Delete Result');
                    window.location.reload();
                } else {
                    toastr['error'](res.message,'Delete Result');
                }
            }
        })
    });

    // Role manage

    $('.add-role-form').on('submit', function() {

        var send_data = {
            'role' : $('#inputRoleName').val(),
            'description' : $('#inputDescription').val(),
        };

        $.ajax({
            url: base_url + 'BackendController/create_role',
            type: 'post',
            data: send_data,
            success:function(res){

                res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Add Result');
                    window.location.reload();
                }
                else
                {
                    toastr['error'](res.message,'Add Result');
                }
            }
        });
        return false;
    });

    $('.edit_role_action').click(function() {
        var attr_id = $(this).attr('attr-id');
        var attr_role = $(this).attr('attr-role');
        var attr_description = $(this).attr('attr-description');
        $('.update_role_btn').attr('attr-id', attr_id);
        $('#editRoleName').val(attr_role);
        $('#editDescription').val(attr_description);
    });

    $('.update_role_btn').click(function() {
        $.ajax({
            url: base_url + 'BackendController/update_role',
            type: 'post',
            data: {
                id: $(this).attr('attr-id'),
                role: $('#editRoleName').val(),
                description: $('#editDescription').val()
            },
            success: function(res)
            {
              res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Update Result');
                    window.location.reload();
                }
                else
                {
                    toastr['error'](res.message,'Update Result');
                }
            }
        })
    });

    $('.del_role_action').click(function(){
        var attr_id = $(this).attr('attr-id');
        $('.del_role_btn').attr('attr-id', attr_id);
    });

    $('.del_role_btn').click(function() {
        $.ajax({
            url: base_url + 'BackendController/delete_role',
            type: 'post',
            data: {id: $(this).attr('attr-id')},
            success: function(res)
            {
              res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Delete Result');
                    window.location.reload();
                }
                else
                {
                    toastr['error'](res.message,'Delete Result');
                }
            }
        })
    });

    // Player Option manage

    $('.add-option-form').on('submit', function() {

        var send_data = {
            'option' : $('#inputOptionName').val(),
            'description' : $('#inputDescription').val(),
            'cost' : $('#inputCost').val(),
            'status' : $('#inputOptionStatus').val()
        };

        $.ajax({
            url: base_url + 'BackendController/create_option',
            type: 'post',
            data: send_data,
            success:function(res){

                res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Add Result');
                    window.location.reload();
                }
                else
                {
                    toastr['error'](res.message,'Add Result');
                }
            }
        });
        return false;
    });

    $('.toggle_option_status').change(function() {
        if ($(this).prop('checked') == true)
        {
            var send_data = {
                'id' : $(this).attr('attr-id'),
                'status' : '1',
            };

            $.ajax({
                url: base_url + 'BackendController/update_option',
                type: 'post',
                data: send_data,
                success:function(res){

                    res = JSON.parse(res);

                    if (res.success)
                    {
                        toastr['success'](res.message,'Update Result');
                    }
                    else
                    {
                        toastr['error'](res.message,'Update Result');
                    }
                }
            });
        }
        else
        {
            var send_data = {
                'id' : $(this).attr('attr-id'),
                'status' : '0',
            };

            $.ajax({
                url: base_url + 'BackendController/update_option',
                type: 'post',
                data: send_data,
                success:function(res){

                    res = JSON.parse(res);

                    if (res.success)
                    {
                        toastr['success'](res.message,'Update Result');
                    }
                    else
                    {
                        toastr['error'](res.message,'Update Result');
                    }
                }
            });
        }
    });

    $('.edit_option_action').click(function() {
        var attr_id = $(this).attr('attr-id');
        var attr_option = $(this).attr('attr-option');
        var attr_description = $(this).attr('attr-description');
        var attr_cost = $(this).attr('attr-cost');
        var attr_status = $(this).attr('attr-status');
        $('.update_option_btn').attr('attr-id', attr_id);
        $('#editOptionName').val(attr_option);
        $('#editDescription').val(attr_description);
        $('#editCost').val(attr_cost);
        $('#editOptionStatus').val(attr_status);
    });

    $('.update_option_btn').click(function() {
        $.ajax({
            url: base_url + 'BackendController/update_option',
            type: 'post',
            data: {
                id: $(this).attr('attr-id'),
                option: $('#editOptionName').val(),
                description: $('#editDescription').val(),
                cost: $('#editCost').val(),
                status: $('#editOptionStatus').val(),
            },
            success: function(res)
            {
              res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Update Result');
                    window.location.reload();
                }
                else
                {
                    toastr['error'](res.message,'Update Result');
                }
            }
        })
    });

    $('.del_option_action').click(function(){
        var attr_id = $(this).attr('attr-id');
        $('.del_option_btn').attr('attr-id', attr_id);
    });

    $('.del_option_btn').click(function() {
        $.ajax({
            url: base_url + 'BackendController/delete_option',
            type: 'post',
            data: {
                id: $(this).attr('attr-id')
            },
            success: function(res)
            {
              res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Delete Result');
                    window.location.reload();
                }
                else
                {
                    toastr['error'](res.message,'Delete Result');
                }
            }
        })
    });

    // Player Terms and Conditions manage

    $('.add-tncs-form').on('submit', function() {

        var send_data = {
            'tnc_title' : $('#inputTitle').val(),
            'tnc_content' : $('#inputContent').val(),
        };

        $.ajax({
            url: base_url + 'BackendController/create_tncs',
            type: 'post',
            data: send_data,
            success:function(res){

                res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Add Result');
                    window.location.reload();
                }
                else
                {
                    toastr['error'](res.message,'Add Result');
                }
            }
        });
        return false;
    });

    $('.edit_tncs_action').click(function() {
        var attr_id = $(this).attr('attr-id');
        var attr_title = $(this).attr('attr-title');
        var attr_content = $(this).attr('attr-content');
        $('.update_tncs_btn').attr('attr-id', attr_id);
        $('#editTitle').val(attr_title);
        $('#editContent').val(attr_content);
    });

    $('.update_tncs_btn').click(function() {
        $.ajax({
            url: base_url + 'BackendController/update_tncs',
            type: 'post',
            data: {
                id: $(this).attr('attr-id'),
                tnc_title: $('#editTitle').val(),
                tnc_content: $('#editContent').val(),
            },
            success: function(res)
            {
              res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Update Result');
                    window.location.reload();
                }
                else
                {
                    toastr['error'](res.message,'Update Result');
                }
            }
        })
    });

    $('.del_tncs_action').click(function(){
        var attr_id = $(this).attr('attr-id');
        $('.del_tncs_btn').attr('attr-id', attr_id);
    });

    $('.del_tncs_btn').click(function() {
        $.ajax({
            url: base_url + 'BackendController/delete_tncs',
            type: 'post',
            data: {
                id: $(this).attr('attr-id')
            },
            success: function(res)
            {
              res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Delete Result');
                    window.location.reload();
                }
                else
                {
                    toastr['error'](res.message,'Delete Result');
                }
            }
        })
    });

    // Staff manage

    $('.add-staff-form').on('submit', function() {

        var send_data = {
            'fullname' : $('#inputFullName').val(),
            'email' : $('#inputEmail').val(),
            'username' : $('#inputUsername').val(),
            'user_group' : '3'
        };

        if ($('#inputPassword').val())
        {
            var password = $('#inputPassword').val();
            if ($('#inputConfirmPassword').val())
            {
                var rpassword = $('#inputConfirmPassword').val();
                if (password == rpassword)
                {
                    send_data['password'] = rpassword;
                } else {
                    toastr['error']('Confirm Password must be equal to password', 'Fail');
                    return false;
                }
            }
        }

        $.ajax({
            url: base_url + 'BackendController/create_staff',
            type: 'post',
            data: send_data,
            success:function(res){

                res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Add Result');
                    window.location.href = base_url+'backend/staffs';
                }
                else
                {
                    toastr['error'](res.message,'Add Result');
                }
            }
        });
        return false;
    });

    $('.edit-staff-form').on('submit', function() {

        var send_data = {
            'id' : $('#update_staff_btn').attr('attr-id'),
            'fullname' : $('#editFullName').val(),
            'email' : $('#editEmail').val(),
            'address' : $('#editAddress').val(),
            'phone' : $('#editPhone').val(),
            'age' : $('#editAge').val(),
            'username' : $('#editUsername').val()
        };

        if ($('#editPassword').val())
        {
            var password = $('#editPassword').val();
            if ($('#editConfirmPassword').val())
            {
                var rpassword = $('#editConfirmPassword').val();
                if (password == rpassword)
                {
                    send_data['password'] = rpassword;
                } else {
                    toastr['error']('Confirm Password must be equal to password', 'Fail');
                    return false;
                }
            }
        }

        $.ajax({
            url: base_url + 'BackendController/update_staff',
            type: 'post',
            data: send_data,
            success:function(res){

                res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Update Result');
                    window.location.href = base_url+'backend/staffs';
                }
                else
                {
                    toastr['error'](res.message,'Update Result');
                }
            }
        });
        return false;
    });

    $('.del_staff_action').click(function() {
        var attr_id = $(this).attr('attr-id');
        $('.del_staff_btn').attr('attr-id', attr_id);
    });

    $('.del_staff_btn').click(function() {
        $.ajax({
            url: base_url + 'BackendController/delete_staff',
            type: 'post',
            data: {id: $(this).attr('attr-id')},
            success: function(res)
            {
              res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Delete Result');
                    window.location.reload();
                }
                else
                {
                    toastr['error'](res.message,'Delete Result');
                }
            }
        })
    });

    // Schedule manage

    $('.add_schedule_modal').click(function() {
        $('#datepicker').val('');
    });

    $(document).on('change','#selectTeam',function() {
        var attr_logo = $('option:selected', this).attr('attr-logo');
        $('#team_logo').attr('src', attr_logo);
    });

    $('.add_schedule_btn').click(function(e) {
        e.preventDefault();
        $("#add_schedule").trigger('submit');
    });

    $(document).on('submit','#add_schedule',function(e) {
        e.preventDefault();
        var send_data = new FormData(this);
        $.ajax({
            url: base_url + 'BackendController/create_schedule',
            type: 'post',
            data: send_data,
            processData: false,
            contentType: false,
            success:function(res){
                
                res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Add Schedule');
                    window.location.href = base_url+'backend/schedules';
                }
                else
                {
                    toastr['error'](res.message,'Add Schedule');
                }
                
            }
        });
    });

    $(document).on('submit','#upload_schedule',function(e) {
        e.preventDefault();
        var send_data = new FormData(this);
        $.ajax({
            url: base_url + 'BackendController/upload_schedule',
            type: 'post',
            data: send_data,
            processData: false,
            contentType: false,
            success:function(res){
                
                res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Upload Schedule');
                    window.location.href = base_url+'backend/schedules';
                }
                else
                {
                    toastr['error'](res.message,'Upload Schedule');
                }
                
            }
        });
    });

    $(document).on("click",".edit-schedule",function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax({
            url: base_url + 'BackendController/edit_upload_schedule',
            type: 'get',
            data: {},
            success:function(res){
                
                res = JSON.parse(res);

                $("#upload_schedule_html").html(res.html);
                $("#uploadModal").modal('show');
            }
        });
    })

    $('.edit_schedule_action').click(function() {
        var attr_id = $(this).attr('attr-id');
        $.ajax({
            url: base_url + 'BackendController/edit_schedule/'+attr_id,
            type: 'get',
            success:function(res){
                res = JSON.parse(res);
                if (res.success)
                {
                    $('#addModal .modal-body').html(res.html);

                    var attr_logo = $('option:selected', $('#selectTeam')).attr('attr-logo');
                    $('#team_logo').attr('src', attr_logo);

                    $('#datepicker').datetimepicker({
                        footer: true,
                        modal: true,
                        format: 'yyyy-mm-dd HH:MM'
                    });
                    $('#addModal').modal('show');
                } else {
                    toastr['error'](res.message,'Add Result');
                }
            }
        });
    });

    $('#editSelectTeam').change(function() {
        var attr_logo = $('option:selected', this).attr('attr-logo');
        $('#edit_team_logo').attr('src', attr_logo);
    });

    $('.update_schedule_btn').click(function() {
        var send_data = {
            'id' : $(this).attr('attr-id'),
            'team_id' : $('#editSelectTeam').val(),
            'match_location' : $('#editLocation').val(),
            'match_time' : $('#datepicker1').val(),
            'match_type' : $('#editMatchType').val(),
        };

        $.ajax({
            url: base_url + 'BackendController/update_schedule',
            type: 'post',
            data: send_data,
            success: function(res)
            {
              res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Update Result');
                    window.location.reload();
                }
                else
                {
                    toastr['error'](res.message,'Update Result');
                }
            }
        });
    });

    $('.del_schedule_action').click(function() {
        var attr_id = $(this).attr('attr-id');
        $('.del_schedule_btn').attr('attr-id', attr_id);
    });

    $('.del_schedule_btn').click(function() {
        $.ajax({
            url: base_url + 'BackendController/delete_schedule',
            type: 'post',
            data: {id: $(this).attr('attr-id')},
            success: function(res)
            {
              res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Delete Result');
                    window.location.reload();
                }
                else
                {
                    toastr['error'](res.message,'Delete Result');
                }
            }
        })
    });

    // Announce manage

    $('.add_announcement_modal').click(function() {
        $('.p-image-preview').attr('style', '');
    });

    $('.add_announce_btn').click(function() {

        var send_data = {
            'announce_title' : $('#inputTitle').val(),
            'announce_content' : $('#inputDescription').val(),
        };

        if ($('#primary-image').val() == '') {
            $.ajax({
                url: base_url + 'BackendController/create_announce',
                type: 'post',
                data: send_data,
                success:function(res){

                    res = JSON.parse(res);

                    if (res.success)
                    {
                        toastr['success'](res.message,'Add Result');
                        window.location.reload();
                    }
                    else
                    {
                        toastr['error'](res.message,'Add Result');
                    }
                }
            });
        } else {
            $.ajaxFileUpload({
                url: base_url + 'BackendController/announce_photo_upload',
                secureuri:false,
                fileElementId:'primary-image',
                dataType: 'json',
                success: function (data, status)
                {
                    send_data['announce_logo'] = data.filename;
                    
                    $.ajax({
                        url: base_url + 'BackendController/create_announce',
                        type: 'post',
                        data: send_data,
                        success:function(res){

                            res = JSON.parse(res);

                            if (res.success)
                            {
                                toastr['success'](res.message,'Add Result');
                                window.location.reload();
                            }
                            else
                            {
                                toastr['error'](res.message,'Add Result');
                            }
                        }
                    });
                },
                error: function (data, status, e)
                {
                    toastr['error'](data.message,'Add Result');
                }
            });
        }
    });

    $('.edit_announce_action').click(function() {
        var attr_id = $(this).attr('attr-id');
        var attr_logo = "url('" + $(this).attr('attr-logo') + "')";
        var attr_title = $(this).attr('attr-title');
        var attr_description = $(this).attr('attr-content');
        $('.update_announce_btn').attr('attr-id', attr_id);
        $('.p-image-preview').attr("style","background-image:" + attr_logo);
        $('#editTitle').val(attr_title);
        $('#editDescription').val(attr_description);
    });

    $('.update_announce_btn').click(function() {
        var send_data = {
            'id' : $(this).attr('attr-id'),
            'announce_title' : $('#editTitle').val(),
            'announce_content' : $('#editDescription').val(),
        };

        if ($('#primary-image').val() == '') {
            $.ajax({
                url: base_url + 'BackendController/update_announce',
                type: 'post',
                data: send_data,
                success: function(res)
                {
                  res = JSON.parse(res);

                    if (res.success)
                    {
                        toastr['success'](res.message,'Update Result');
                        window.location.reload();
                    }
                    else
                    {
                        toastr['error'](res.message,'Update Result');
                    }
                }
            })
        } else {
            $.ajaxFileUpload({
                url: base_url + 'BackendController/announce_photo_upload',
                secureuri:false,
                fileElementId:'primary-image',
                dataType: 'json',
                success: function (data, status)
                {
                    send_data['announce_logo'] = data.filename;
                    
                    $.ajax({
                        url: base_url + 'BackendController/update_announce',
                        type: 'post',
                        data: send_data,
                        success: function(res)
                        {
                          res = JSON.parse(res);

                            if (res.success)
                            {
                                toastr['success'](res.message,'Update Result');
                                window.location.reload();
                            }
                            else
                            {
                                toastr['error'](res.message,'Update Result');
                            }
                        }
                    });
                },
                error: function (data, status, e)
                {
                    toastr['error'](data.message,'Update Result');
                }
            });
        }
    });

    $('.show_announce_action').click(function() {
        var attr_id = $(this).attr('attr-id');
        var attr_logo = $(this).attr('attr-logo');
        var attr_title = $(this).attr('attr-title');
        var attr_description = $(this).attr('attr-content');
        if (attr_logo != base_url)
        {
            $('.anno_img').attr('src', attr_logo);
            $('.anno_img').attr('style', 'width: 100%; display: block;');
        } else {
            $('.anno_img').attr('style', 'display: none;');
        }
        $('.anno_title').text(attr_title);
        $('.anno_desc').text(attr_description);
    });

    $('.del_announce_action').click(function(){
        var attr_id = $(this).attr('attr-id');
        $('.del_announce_btn').attr('attr-id', attr_id);
    });

    $('.del_announce_btn').click(function() {
        $.ajax({
            url: base_url + 'BackendController/delete_announce',
            type: 'post',
            data: {id: $(this).attr('attr-id')},
            success: function(res)
            {
              res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Delete Result');
                    window.location.reload();
                }
                else
                {
                    toastr['error'](res.message,'Delete Result');
                }
            }
        })
    });

    // Slider manage

    $('.add-slider-form1').on('submit', function() {

        var send_data = {
            'slider_title' : $('#inputSliderTitle').val(),
            'slider_content' : $('#inputSliderComment').val(),
            'slider_status' : $('#inputSliderStatus').val(),
        };

        if ($('#primary-image').val() == '') {
            $.ajax({
                url: base_url + 'BackendController/create_slider',
                type: 'post',
                data: send_data,
                success:function(res){

                    res = JSON.parse(res);

                    if (res.success)
                    {
                        toastr['success'](res.message,'Add Result');
                        window.location.href = base_url+'backend/slider_manage';
                    }
                    else
                    {
                        toastr['error'](res.message,'Add Result');
                    }
                }
            });
        } else {
            $.ajaxFileUpload({
                url: base_url + 'BackendController/slider_image_upload',
                secureuri:false,
                fileElementId:'primary-image',
                dataType: 'json',
                success: function (data, status)
                {
                    send_data['slider_url'] = data.filename;
                    
                    $.ajax({
                        url: base_url + 'BackendController/create_slider',
                        type: 'post',
                        data: send_data,
                        success:function(res){

                            res = JSON.parse(res);

                            if (res.success)
                            {
                                toastr['success'](res.message,'Add Result');
                                window.location.href = base_url+'backend/slider_manage';
                            }
                            else
                            {
                                toastr['error'](res.message,'Add Result');
                            }
                        }
                    });
                },
                error: function (data, status, e)
                {
                    toastr['error'](data.message,'Add Result');
                }
            });
        }

        return false;
    });

    $('.toggle_slider_status').change(function() {
        if ($(this).prop('checked') == true)
        {
            var send_data = {
                'id' : $(this).attr('attr-id'),
                'slider_status' : '1',
            };

            $.ajax({
                url: base_url + 'BackendController/update_slider',
                type: 'post',
                data: send_data,
                success:function(res){

                    res = JSON.parse(res);

                    if (res.success)
                    {
                        toastr['success'](res.message,'Update Result');
                    }
                    else
                    {
                        toastr['error'](res.message,'Update Result');
                    }
                }
            });
        }
        else
        {
            var send_data = {
                'id' : $(this).attr('attr-id'),
                'slider_status' : '0',
            };

            $.ajax({
                url: base_url + 'BackendController/update_slider',
                type: 'post',
                data: send_data,
                success:function(res){

                    res = JSON.parse(res);

                    if (res.success)
                    {
                        toastr['success'](res.message,'Update Result');
                    }
                    else
                    {
                        toastr['error'](res.message,'Update Result');
                    }
                }
            });
        }
    });

    $('.edit-slider-form').on('submit', function() {

        var send_data = {
            'id' : $('#update_slider_btn').attr('attr-id'),
            'slider_title' : $('#editSliderTitle').val(),
            'slider_content' : $('#editSliderComment').val(),
            'slider_status' : $('#editSliderStatus').val(),
        };

        if ($('#primary-image').val() == '') {
            $.ajax({
                url: base_url + 'BackendController/update_slider',
                type: 'post',
                data: send_data,
                success:function(res){

                    res = JSON.parse(res);

                    if (res.success)
                    {
                        toastr['success'](res.message,'Update Result');
                        window.location.href = base_url+'backend/slider_manage';
                    }
                    else
                    {
                        toastr['error'](res.message,'Update Result');
                    }
                }
            });
        } else {
            $.ajaxFileUpload({
                url: base_url + 'BackendController/slider_image_upload',
                secureuri:false,
                fileElementId:'primary-image',
                dataType: 'json',
                success: function (data, status)
                {
                    send_data['slider_url'] = data.filename;
                    
                    $.ajax({
                        url: base_url + 'BackendController/update_slider',
                        type: 'post',
                        data: send_data,
                        success:function(res){

                            res = JSON.parse(res);

                            if (res.success)
                            {
                                toastr['success'](res.message,'Update Result');
                                window.location.href = base_url+'backend/slider_manage';
                            }
                            else
                            {
                                toastr['error'](res.message,'Update Result');
                            }
                        }
                    });
                },
                error: function (data, status, e)
                {
                    toastr['error'](data.message,'Update Result');
                }
            });
        }
                    
        return false;
    });

    $('.del_slider_action').click(function() {
      var attr_id = $(this).attr('attr-id');
      $('.del_slider_btn').attr('attr-id', attr_id);
    });

    $('.del_slider_btn').click(function() {
        $.ajax({
            url: base_url + 'BackendController/delete_slider',
            type: 'post',
            data: {id: $(this).attr('attr-id')},
            success: function(res)
            {
              res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Delete Result');
                    window.location.reload();
                }
                else
                {
                    toastr['error'](res.message,'Delete Result');
                }
            }
        })
    });

    //  Player Manage

    $('.edit_player_action').click(function() {
        var attr_id = $(this).attr('attr-id');
        var attr_photo = $(this).attr('attr-photo');
        var attr_fullname = $(this).attr('attr-fullname');
        var attr_position = $(this).attr('attr-position');
        var attr_membertype = $(this).attr('attr-membertype');
        var attr_goals = $(this).attr('attr-goals');
        
        $('.update_player_btn').attr('attr-id', attr_id);
        $('#editPlayerPhoto').attr('src', attr_photo);
        $('#editPlayerName').text(attr_fullname);
        $('#editMemberType').val(attr_membertype);
        $('#editPlayerPosition').val(attr_position);
        $('#editSumGoal').val(attr_goals);
        $('#editSumGoal').attr('min',attr_goals);

        $('#height').val($(this).attr('attr-height'));
        $('#weight').val($(this).attr('attr-weight'));
        $('#dob').val($(this).attr('attr-dob'));
        $('#player_position').val(attr_position);
        $('#position_side').val($(this).attr('attr-positionside'));
        $('#player_status').val($(this).attr('attr-playerstatus'));
    });

    $('.update_player_btn').click(function() {
        var send_data = {
            'id' : $(this).attr('attr-id'),
            'member_type' : $('#editMemberType').val(),
            'player_position' : $('#editPlayerPosition').val(),
            'sum_goal' : $('#editSumGoal').val(),
            'height' : $('#height').val(),
            'weight' : $('#weight').val(),
            'dob' : $('#dob').val(),
            'player_position' : $('#player_position').val(),
            'position_side' : $('#position_side').val(),
            'player_status' : $('#player_status').val(),
        };

        $.ajax({
            url: base_url + 'BackendController/update_player',
            type: 'post',
            data: send_data,
            success: function(res)
            {
              res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Update Result');
                    window.location.reload();
                }
                else
                {
                    toastr['error'](res.message,'Update Result');
                }
            }
        })
    });

    //Team Manage

    $('.add_team_modal').click(function() {
        $('.p-image-preview').attr('style', '');
    });

    $('.add_team_btn').click(function() {

        var send_data = {
            'team_name' : $('#inputTeamName').val(),
            'stadium_name' : $('#inputStadiumName').val(),
        };

        if ($('#primary-image').val() == '') {
            $.ajax({
                url: base_url + 'BackendController/create_team',
                type: 'post',
                data: send_data,
                success:function(res){

                    res = JSON.parse(res);

                    if (res.success)
                    {
                        toastr['success'](res.message,'Add Result');
                        window.location.href = base_url+'backend/teams';
                    }
                    else
                    {
                        toastr['error'](res.message,'Add Result');
                    }
                }
            });
        } else {
            $.ajaxFileUpload({
                url: base_url + 'BackendController/team_logo_upload',
                secureuri:false,
                fileElementId:'primary-image',
                dataType: 'json',
                success: function (data, status)
                {
                    send_data['team_logo'] = data.filename;
                    
                    $.ajax({
                        url: base_url + 'BackendController/create_team',
                        type: 'post',
                        data: send_data,
                        success:function(res){

                            res = JSON.parse(res);

                            if (res.success)
                            {
                                toastr['success'](res.message,'Add Result');
                                window.location.href = base_url+'backend/teams';
                            }
                            else
                            {
                                toastr['error'](res.message,'Add Result');
                            }
                        }
                    });
                },
                error: function (data, status, e)
                {
                    toastr['error'](data.message,'Add Result');
                }
            });
        }
    });

    $('.edit_team_action').click(function() {
        var attr_id = $(this).attr('attr-id');
        var attr_logo = "url('" + $(this).attr('attr-logo') + "')";
        var attr_name = $(this).attr('attr-name');
        var attr_stadium = $(this).attr('attr-stadium');
        var attr_logo2 = $(this).attr('attr-logo');
        var attr_point = $(this).attr('attr-point');
        $('.update_team_btn').attr('attr-id', attr_id);
        $('.p-image-preview').attr('style', 'background-image: ' + attr_logo);
        $('#editTeamName').val(attr_name);
        $('#editStadiumName').val(attr_stadium);
        $('#teamLogo').attr('src', attr_logo2);
        $('#editTeamPoint').val(attr_point);
    });

    $('.update_team_btn').click(function() {
        var send_data = {
            'id' : $(this).attr('attr-id'),
            'team_name' : $('#editTeamName').val(),
            'stadium_name' : $('#editStadiumName').val(),
            'team_point' : $('#editTeamPoint').val(),
        };

        if ($('#primary-image').val() == '') {
            $.ajax({
                url: base_url + 'BackendController/update_team',
                type: 'post',
                data: send_data,
                success: function(res)
                {
                  res = JSON.parse(res);

                    if (res.success)
                    {
                        toastr['success'](res.message,'Update Result');
                        window.location.reload();
                    }
                    else
                    {
                        toastr['error'](res.message,'Update Result');
                    }
                }
            })
        } else {
            $.ajaxFileUpload({
                url: base_url + 'BackendController/team_logo_upload',
                secureuri:false,
                fileElementId:'primary-image',
                dataType: 'json',
                success: function (data, status)
                {
                    send_data['team_logo'] = data.filename;
                    
                    $.ajax({
                        url: base_url + 'BackendController/update_team',
                        type: 'post',
                        data: send_data,
                        success: function(res)
                        {
                          res = JSON.parse(res);

                            if (res.success)
                            {
                                toastr['success'](res.message,'Update Result');
                                window.location.reload();
                            }
                            else
                            {
                                toastr['error'](res.message,'Update Result');
                            }
                        }
                    });
                },
                error: function (data, status, e)
                {
                    toastr['error'](data.message,'Update Result');
                }
            });
        }
    });

    $('.del_team_action').click(function(){
        var attr_id = $(this).attr('attr-id');
        $('.del_team_btn').attr('attr-id', attr_id);
    });

    $('.del_team_btn').click(function() {
        $.ajax({
            url: base_url + 'BackendController/delete_team',
            type: 'post',
            data: {id: $(this).attr('attr-id')},
            success: function(res)
            {
              res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Delete Result');
                    window.location.reload();
                }
                else
                {
                    toastr['error'](res.message,'Delete Result');
                }
            }
        })
    });

    var index1 = 2;
    var index2 = 2;
    $('.add_own_goaler').click(function(){
        var own_goaler_li = '';
        own_goaler_li += '<li class="list-group-item own_goaler_li">'
            + '<div class="row">' 
            + '<div class="col-lg-8">'
            + '<div class="form-group">'
            + '<div class="form-label-group">'
            + '<input type="text" id="inputOwnNameTime' + index1 + '" class="form-control input-inline " name="goal_info" placeholder="Input Name and Time" autofocus="autofocus">'
            + '<label for="inputOwnNameTime' + index1 + '">Input Name and Time</label>'
            + '</div>'
            + '</div>'
            + '</div>'
            + '<div class="col-lg-4">'
            + '<button class="btn btn-danger remove_own_goaler" style="margin-top: 5px">Remove</button>'
            + '</div>'
            + '</div>'
            + '</li>';
        $('.own_goaler_ul').append(own_goaler_li);
        index1++;
    });

    $(document).on('click','.remove_own_goaler',function(){
        $(this).parent().parent().parent().remove();
    });

    $('.add_competitor_goaler').click(function(){
        var compe_goaler_li = '';
        compe_goaler_li += '<li class="list-group-item compe_goaler_li">'
            + '<div class="row">' 
            + '<div class="col-lg-8">'
            + '<div class="form-group">'
            + '<div class="form-label-group">'
            + '<input type="text" id="inputCompeNameTime' + index2 + '" class="form-control input-inline " name="goal_info" placeholder="Input Name and Time" autofocus="autofocus">'
            + '<label for="inputCompeNameTime' + index2 + '">Input Name and Time</label>'
            + '</div>'
            + '</div>'
            + '</div>'
            + '<div class="col-lg-4">'
            + '<button class="btn btn-danger remove_competitor_goaler" style="margin-top: 5px">Remove</button>'
            + '</div>'
            + '</div>'
            + '</li>';
        $('.compe_goaler_ul').append(compe_goaler_li);
        index2++;
    });

    $(document).on('click','.remove_competitor_goaler',function(){
        $(this).parent().parent().parent().remove();
    });

    $('.add-result-form').on('submit', function() {

        var send_data = {
            'match_type' : $('#inputMatchType').val(),
            'match_location' : $('#inputMatchLocation').val(),
            'match_time' : $('#datepicker').val(),
            'own_goals' : $('#inputOurGoals').val(),
            'team_id' : $('#selectTeam').val(),
            'competitor_goals' : $('#inputCompetitorGoals').val(),
        };

        var own_goals = $('#inputOurGoals').val();
        var competitor_goals = $('#inputCompetitorGoals').val();

        if (own_goals > competitor_goals) {
            send_data['match_result'] = 'WIN';
        } else if (own_goals < competitor_goals) {
            send_data['match_result'] = 'LOSE';
        } else {
            send_data['match_result'] = 'DRAW'
        }

        send_data['own_goaler'] = [];
        $(document).find('.own_goaler_li').each(function(){
            var data_own_goaler = {};
            $(this).find('.form-control').each(function(){
                data_own_goaler[$(this).attr('name')] = $(this).val();
            })

            send_data['own_goaler'].push(data_own_goaler);
        });

        send_data['competitor_goaler'] = [];
        $(document).find('.compe_goaler_li').each(function(){
            var data_compe_goaler = {};
            $(this).find('.form-control').each(function(){
                data_compe_goaler[$(this).attr('name')] = $(this).val();
            })

            send_data['competitor_goaler'].push(data_compe_goaler);
        });

        console.log(send_data);

        $.ajax({
            url: base_url + 'BackendController/create_result',
            type: 'post',
            data: send_data,
            success:function(res){

                console.log(res);

                res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Add Result');
                    window.location.href = base_url+'backend/latest_result';
                }
                else
                {
                    toastr['error'](res.message,'Add Result');
                }
            }
        });

        return false;
    });

    $('.del_result_action').click(function(){
        var attr_id = $(this).attr('attr-id');
        $('.del_result_btn').attr('attr-id', attr_id);
    });

    $('.del_result_btn').click(function() {
        $.ajax({
            url: base_url + 'BackendController/delete_result',
            type: 'post',
            data: {id: $(this).attr('attr-id')},
            success: function(res)
            {
              res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Delete Result');
                    window.location.reload();
                }
                else
                {
                    toastr['error'](res.message,'Delete Result');
                }
            }
        })
    });

    // Latest News manage

    $('.add_news_modal').click(function() {
        $('.p-image-preview').attr('style', '');
    });

    $('.add_news_btn').click(function() {

        var send_data = {
            'news_title' : $('#inputTitle').val(),
            'news_content' : $('#inputDescription').val(),
        };

        if ($('#primary-image').val() == '') {
            $.ajax({
                url: base_url + 'BackendController/create_news',
                type: 'post',
                data: send_data,
                success:function(res){

                    res = JSON.parse(res);

                    if (res.success)
                    {
                        toastr['success'](res.message,'Add Result');
                        window.location.reload();
                    }
                    else
                    {
                        toastr['error'](res.message,'Add Result');
                    }
                }
            });
        } else {
            $.ajaxFileUpload({
                url: base_url + 'BackendController/news_logo_upload',
                secureuri:false,
                fileElementId:'primary-image',
                dataType: 'json',
                success: function (data, status)
                {
                    send_data['news_logo'] = data.filename;
                    
                    $.ajax({
                        url: base_url + 'BackendController/create_news',
                        type: 'post',
                        data: send_data,
                        success:function(res){

                            res = JSON.parse(res);

                            if (res.success)
                            {
                                toastr['success'](res.message,'Add Result');
                                window.location.reload();
                            }
                            else
                            {
                                toastr['error'](res.message,'Add Result');
                            }
                        }
                    });
                },
                error: function (data, status, e)
                {
                    toastr['error'](data.message,'Add Result');
                }
            });
        }
    });

    $('.edit_news_action').click(function() {
        var attr_id = $(this).attr('attr-id');
        var attr_logo = "url('" + $(this).attr('attr-logo') + "')";
        var attr_title = $(this).attr('attr-title');
        var attr_description = $(this).attr('attr-content');
        $('.update_news_btn').attr('attr-id', attr_id);
        $('.p-image-preview').attr("style","background-image:" + attr_logo);
        $('#editTitle').val(attr_title);
        $('#editDescription').val(attr_description);
    });

    $('.update_news_btn').click(function() {
        var send_data = {
            'id' : $(this).attr('attr-id'),
            'news_title' : $('#editTitle').val(),
            'news_content' : $('#editDescription').val(),
        };

        if ($('#primary-image').val() == '') {
            $.ajax({
                url: base_url + 'BackendController/update_news',
                type: 'post',
                data: send_data,
                success: function(res)
                {
                  res = JSON.parse(res);

                    if (res.success)
                    {
                        toastr['success'](res.message,'Update Result');
                        window.location.reload();
                    }
                    else
                    {
                        toastr['error'](res.message,'Update Result');
                    }
                }
            })
        } else {
            $.ajaxFileUpload({
                url: base_url + 'BackendController/news_logo_upload',
                secureuri:false,
                fileElementId:'primary-image',
                dataType: 'json',
                success: function (data, status)
                {
                    send_data['news_logo'] = data.filename;
                    
                    $.ajax({
                        url: base_url + 'BackendController/update_news',
                        type: 'post',
                        data: send_data,
                        success: function(res)
                        {
                          res = JSON.parse(res);

                            if (res.success)
                            {
                                toastr['success'](res.message,'Update Result');
                                window.location.reload();
                            }
                            else
                            {
                                toastr['error'](res.message,'Update Result');
                            }
                        }
                    });
                },
                error: function (data, status, e)
                {
                    toastr['error'](data.message,'Update Result');
                }
            });
        }
    });

    $('.del_news_action').click(function(){
        var attr_id = $(this).attr('attr-id');
        $('.del_news_btn').attr('attr-id', attr_id);
    });

    $('.del_news_btn').click(function() {
        $.ajax({
            url: base_url + 'BackendController/delete_news',
            type: 'post',
            data: {id: $(this).attr('attr-id')},
            success: function(res)
            {
              res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Delete Result');
                    window.location.reload();
                }
                else
                {
                    toastr['error'](res.message,'Delete Result');
                }
            }
        })
    });

    // Message Manage

    $('.send_mail_btn').click(function(){
        var send_data = {
            'from_user' : $(this).attr('attr-id'),
            'to_user' : $('#selectUser').val(),
            'message_title' : $('#inputTitle').val(),
            'message_content' : $('#inputContent').val(),
        };

        $.ajax({
            url: base_url + 'BackendController/send_mail',
            type: 'post',
            data: send_data,
            success:function(res){

                res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Send Result');
                    window.location.href = base_url+'backend/outbox_mail';
                }
                else
                {
                    toastr['error'](res.message,'Send Result');
                }
            }
        });
    });

    $('.read_mail_btn').click(function(){
        var send_data = {
            'id' : $(this).attr('attr-id'),
            'read_status' : '1',
        };

        $.ajax({
            url: base_url + 'BackendController/update_mail',
            type: 'post',
            data: send_data,
            success:function(res){

                res = JSON.parse(res);

                if (res.success)
                {
                    // toastr['success'](res.message,'Update Result');
                    console.log(res.message);
                }
                else
                {
                    // toastr['error'](res.message,'Update Result');
                    console.log(res.message);
                }
            }
        });
    });

    $('.reply_mail_action').click(function(){
        var attr_id = $(this).attr('attr-id');
        var attr_username = $(this).attr('attr-username');
        $('.reply_to_mail').attr('attr-id', attr_id);
        $('.reply_to_mail').html(attr_username);
    });

    $('.reply_mail_btn').click(function(){
        var send_data = {
            'from_user' : $(this).attr('attr-id'),
            'to_user' : $('.reply_to_mail').attr('attr-id'),
            'message_title' : $('#replyTitle').val(),
            'message_content' : $('#replyContent').val(),
        };

        $.ajax({
            url: base_url + 'BackendController/send_mail',
            type: 'post',
            data: send_data,
            success:function(res){

                res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Send Result');
                    window.location.href = base_url+'backend/outbox_mail';
                }
                else
                {
                    toastr['error'](res.message,'Send Result');
                }
            }
        });
    });

    $('.del_from_action').click(function(){
        var attr_id = $(this).attr('attr-id');
        $('.del_from_btn').attr('attr-id', attr_id);
    });

    $('.del_from_btn').click(function() {
        var send_data = {
            'id' : $(this).attr('attr-id'),
            'from_del_status' : '1',
        };

        $.ajax({
            url: base_url + 'BackendController/delete_mail',
            type: 'post',
            data: send_data,
            success: function(res)
            {
              res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Delete Result');
                    window.location.reload();
                }
                else
                {
                    toastr['error'](res.message,'Delete Result');
                }
            }
        })
    });

    $('.del_to_action').click(function(){
        var attr_id = $(this).attr('attr-id');
        $('.del_to_btn').attr('attr-id', attr_id);
    });

    $('.del_to_btn').click(function() {
        var send_data = {
            'id' : $(this).attr('attr-id'),
            'to_del_status' : '1',
        };
        $.ajax({
            url: base_url + 'BackendController/delete_mail',
            type: 'post',
            data: send_data,
            success: function(res)
            {
              res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Delete Result');
                    window.location.reload();
                }
                else
                {
                    toastr['error'](res.message,'Delete Result');
                }
            }
        })
    });
    
    $('.send_request_action').click(function(){
        var send_data = {
            'from_user' : $(this).attr('from-user'),
            'to_user' : $(this).attr('to-user'),
            'message_title' : 'Invoice',
            'message_content' : 'Please pay and activate your account.',
        };

        $.ajax({
            url: base_url + 'BackendController/send_mail',
            type: 'post',
            data: send_data,
            success:function(res){

                res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Send Result');
                    // window.location.href = base_url+'backend/outbox_mail';
                }
                else
                {
                    toastr['error'](res.message,'Send Result');
                }
            }
        });
    });

    // Tournament Manage

    $('.add_tournament_modal').click(function() {
        $('#datepicker').val('');
    });

    $('.add_tournament_btn').click(function() {

        var send_data = {
            'tournament_name' : $('#inputTournamentName').val(),
            'start_datetime' : $('#datepicker').val(),
            'tournament_location' : $('#inputTournamentLocation').val(),
        };

        $.ajax({
            url: base_url + 'BackendController/create_tournament',
            type: 'post',
            data: send_data,
            success:function(res){

                res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Add Result');
                    window.location.href = base_url+'backend/tournament_manage';
                }
                else
                {
                    toastr['error'](res.message,'Add Result');
                }
            }
        });
    });

    $('.edit_tournament_action').click(function() {
        var attr_id = $(this).attr('attr-id');
        var attr_name = $(this).attr('attr-name');
        var attr_location = $(this).attr('attr-location');
        var attr_startDateTime = $(this).attr('attr-startDateTime');
        $('.update_tournament_btn').attr('attr-id', attr_id);
        $('#editTournamentName').val(attr_name);
        $('#editTournamentLocation').val(attr_location);
        $('#datepicker1').val(attr_startDateTime);
    });

    $('.update_tournament_btn').click(function() {
        var send_data = {
            'id' : $(this).attr('attr-id'),
            'tournament_name' : $('#editTournamentName').val(),
            'tournament_location' : $('#editTournamentLocation').val(),
            'start_datetime' : $('#datepicker1').val(),
        };

        $.ajax({
            url: base_url + 'BackendController/update_tournament',
            type: 'post',
            data: send_data,
            success: function(res)
            {
              res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Update Result');
                    window.location.reload();
                }
                else
                {
                    toastr['error'](res.message,'Update Result');
                }
            }
        });
    });

    $('.del_tournament_action').click(function() {
        var attr_id = $(this).attr('attr-id');
        $('.del_tournament_btn').attr('attr-id', attr_id);
    });

    $('.del_tournament_btn').click(function() {
        $.ajax({
            url: base_url + 'BackendController/delete_tournament',
            type: 'post',
            data: {id: $(this).attr('attr-id')},
            success: function(res)
            {
              res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Delete Result');
                    window.location.reload();
                }
                else
                {
                    toastr['error'](res.message,'Delete Result');
                }
            }
        })
    });

    // Training Manage

    $('.add_training_modal').click(function() {
        $('#datepicker').val('');
    });

    $('.add_training_btn').click(function() {

        var send_data = {
            'training_name' : $('#inputTrainingName').val(),
            'start_datetime' : $('#datepicker').val(),
            'training_location' : $('#inputTrainingLocation').val(),
            'training_duration' : $('#inputTrainingDuration').val(),
        };

        $.ajax({
            url: base_url + 'BackendController/create_training',
            type: 'post',
            data: send_data,
            success:function(res){

                res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Add Result');
                    window.location.href = base_url+'backend/training_manage';
                }
                else
                {
                    toastr['error'](res.message,'Add Result');
                }
            }
        });
    });

    $('.edit_training_action').click(function() {
        var attr_id = $(this).attr('attr-id');
        var attr_name = $(this).attr('attr-name');
        var attr_location = $(this).attr('attr-location');
        var attr_startDateTime = $(this).attr('attr-startDateTime');
        var attr_duration = $(this).attr('attr-duration');
        $('.update_training_btn').attr('attr-id', attr_id);
        $('#editTrainingName').val(attr_name);
        $('#editTrainingLocation').val(attr_location);
        $('#datepicker1').val(attr_startDateTime);
        $('#editTrainingDuration').val(attr_duration);
    });

    $('.update_training_btn').click(function() {
        var send_data = {
            'id' : $(this).attr('attr-id'),
            'training_name' : $('#editTrainingName').val(),
            'start_datetime' : $('#datepicker1').val(),
            'training_location' : $('#editTrainingLocation').val(),
            'training_duration' : $('#editTrainingDuration').val(),
        };

        $.ajax({
            url: base_url + 'BackendController/update_training',
            type: 'post',
            data: send_data,
            success: function(res)
            {
              res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Update Result');
                    window.location.reload();
                }
                else
                {
                    toastr['error'](res.message,'Update Result');
                }
            }
        });
    });

    $('.del_training_action').click(function() {
        var attr_id = $(this).attr('attr-id');
        $('.del_training_btn').attr('attr-id', attr_id);
    });

    $('.del_training_btn').click(function() {
        $.ajax({
            url: base_url + 'BackendController/delete_training',
            type: 'post',
            data: {id: $(this).attr('attr-id')},
            success: function(res)
            {
              res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Delete Result');
                    window.location.reload();
                }
                else
                {
                    toastr['error'](res.message,'Delete Result');
                }
            }
        })
    });

    // Product manage

    $('.add-product-form').on('submit', function() {

        var send_data = {
            'product_name' : $('#inputProductName').val(),
            'product_detail' : $('#inputProductDetail').val(),
            'product_price' : $('#inputProductPrice').val(),
            'product_stock' : $('#inputProductStock').val(),
            'product_status' : $('#inputProductStatus').val(),
            'category_id' : $('#inputCategory').val(),
            'color_id' : $('#inputColor').val(),
            'size_id' : $('#inputSize').val(),
        };

        if ($('#primary-image').val() == '') {
            $.ajax({
                url: base_url + 'BackendController/create_product',
                type: 'post',
                data: send_data,
                success:function(res){

                    res = JSON.parse(res);

                    if (res.success)
                    {
                        toastr['success'](res.message,'Add Result');
                        window.location.href = base_url+'backend/products';
                    }
                    else
                    {
                        toastr['error'](res.message,'Add Result');
                    }
                }
            });
        } else {
            $.ajaxFileUpload({
                url: base_url + 'BackendController/product_image_upload',
                secureuri:false,
                fileElementId:'primary-image',
                dataType: 'json',
                success: function (data, status)
                {
                    send_data['product_image'] = data.filename;
                    
                    $.ajax({
                        url: base_url + 'BackendController/create_product',
                        type: 'post',
                        data: send_data,
                        success:function(res){

                            res = JSON.parse(res);

                            if (res.success)
                            {
                                toastr['success'](res.message,'Add Result');
                                window.location.href = base_url+'backend/products';
                            }
                            else
                            {
                                toastr['error'](res.message,'Add Result');
                            }
                        }
                    });
                },
                error: function (data, status, e)
                {
                    toastr['error'](data.message,'Add Result');
                }
            });
        }

        return false;
    });

    $('.toggle_product_status').change(function() {
        if ($(this).prop('checked') == true)
        {
            var send_data = {
                'id' : $(this).attr('attr-id'),
                'product_status' : '1',
            };

            $.ajax({
                url: base_url + 'BackendController/update_product',
                type: 'post',
                data: send_data,
                success:function(res){

                    res = JSON.parse(res);

                    if (res.success)
                    {
                        toastr['success'](res.message,'Update Result');
                    }
                    else
                    {
                        toastr['error'](res.message,'Update Result');
                    }
                }
            });
        }
        else
        {
            var send_data = {
                'id' : $(this).attr('attr-id'),
                'product_status' : '0',
            };

            $.ajax({
                url: base_url + 'BackendController/update_product',
                type: 'post',
                data: send_data,
                success:function(res){

                    res = JSON.parse(res);

                    if (res.success)
                    {
                        toastr['success'](res.message,'Update Result');
                    }
                    else
                    {
                        toastr['error'](res.message,'Update Result');
                    }
                }
            });
        }
    });

    $('.edit-product-form').on('submit', function() {

        var send_data = {
            'id' : $('#update_product_btn').attr('attr-id'),
            'product_name' : $('#editProductName').val(),
            'product_detail' : $('#editProductDetail').val(),
            'product_price' : $('#editProductPrice').val(),
            'product_stock' : $('#editProductStock').val(),
            'product_status' : $('#editProductStatus').val(),
            'category_id' : $('#editCategory').val(),
            'color_id' : $('#editColor').val(),
            'size_id' : $('#editSize').val(),
        };

        if ($('#primary-image').val() == '') {
            $.ajax({
                url: base_url + 'BackendController/update_product',
                type: 'post',
                data: send_data,
                success:function(res){

                    res = JSON.parse(res);

                    if (res.success)
                    {
                        toastr['success'](res.message,'Update Result');
                        window.location.href = base_url+'backend/products';
                    }
                    else
                    {
                        toastr['error'](res.message,'Update Result');
                    }
                }
            });
        } else {
            $.ajaxFileUpload({
                url: base_url + 'BackendController/product_image_upload',
                secureuri:false,
                fileElementId:'primary-image',
                dataType: 'json',
                success: function (data, status)
                {
                    send_data['product_image'] = data.filename;
                    
                    $.ajax({
                        url: base_url + 'BackendController/update_product',
                        type: 'post',
                        data: send_data,
                        success:function(res){

                            res = JSON.parse(res);

                            if (res.success)
                            {
                                toastr['success'](res.message,'Update Result');
                                window.location.href = base_url+'backend/products';
                            }
                            else
                            {
                                toastr['error'](res.message,'Update Result');
                            }
                        }
                    });
                },
                error: function (data, status, e)
                {
                    toastr['error'](data.message,'Update Result');
                }
            });
        }
                    
        return false;
    });

    $('.del_product_action').click(function() {
      var attr_id = $(this).attr('attr-id');
      $('.del_product_btn').attr('attr-id', attr_id);
    });

    $('.del_product_btn').click(function() {
        $.ajax({
            url: base_url + 'BackendController/delete_product',
            type: 'post',
            data: {id: $(this).attr('attr-id')},
            success: function(res)
            {
              res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Delete Result');
                    window.location.reload();
                }
                else
                {
                    toastr['error'](res.message,'Delete Result');
                }
            }
        })
    });

    $('#playerOption').change(function(){
        var attr_cost = $('option:selected', this).attr('attr-cost');
        // console.log(attr_cost);
        $.ajax({
            url: base_url + 'BackendController/stack1',
            type:'post',
            data: {cost: attr_cost},
            success:function(res) {
                res = JSON.parse(res);
                if(res.success)
                {
                    console.log('Good');
                }
                else
                {
                    console.log('Bad');
                }
            }
        })
    });

    // Color manage

    $('.add-color-form').on('submit', function() {

        var send_data = {
            'color_name' : $('#inputColorName').val(),
        };

        $.ajax({
            url: base_url + 'BackendController/create_color',
            type: 'post',
            data: send_data,
            success:function(res){

                res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Add Result');
                    window.location.reload();
                }
                else
                {
                    toastr['error'](res.message,'Add Result');
                }
            }
        });
        return false;
    });

    $('.edit_color_action').click(function() {
        var attr_id = $(this).attr('attr-id');
        var attr_name = $(this).attr('attr-name');
        $('.update_color_btn').attr('attr-id', attr_id);
        $('#editColorName').val(attr_name);
    });

    $('.update_color_btn').click(function() {
        $.ajax({
            url: base_url + 'BackendController/update_color',
            type: 'post',
            data: {
                id: $(this).attr('attr-id'),
                color_name: $('#editColorName').val(),
            },
            success: function(res)
            {
              res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Update Result');
                    window.location.reload();
                }
                else
                {
                    toastr['error'](res.message,'Update Result');
                }
            }
        })
    });

    $('.del_color_action').click(function(){
        var attr_id = $(this).attr('attr-id');
        $('.del_color_btn').attr('attr-id', attr_id);
    });

    $('.del_color_btn').click(function() {
        $.ajax({
            url: base_url + 'BackendController/delete_color',
            type: 'post',
            data: {id: $(this).attr('attr-id')},
            success: function(res)
            {
              res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Delete Result');
                    window.location.reload();
                }
                else
                {
                    toastr['error'](res.message,'Delete Result');
                }
            }
        })
    });

    // Size manage

    $('.add-size-form').on('submit', function() {

        var send_data = {
            'size_name' : $('#inputSizeName').val(),
        };

        $.ajax({
            url: base_url + 'BackendController/create_size',
            type: 'post',
            data: send_data,
            success:function(res){

                res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Add Result');
                    window.location.reload();
                }
                else
                {
                    toastr['error'](res.message,'Add Result');
                }
            }
        });
        return false;
    });

    $('.edit_size_action').click(function() {
        var attr_id = $(this).attr('attr-id');
        var attr_name = $(this).attr('attr-name');
        $('.update_size_btn').attr('attr-id', attr_id);
        $('#editSizeName').val(attr_name);
    });

    $('.update_size_btn').click(function() {
        $.ajax({
            url: base_url + 'BackendController/update_size',
            type: 'post',
            data: {
                id: $(this).attr('attr-id'),
                size_name: $('#editSizeName').val(),
            },
            success: function(res)
            {
              res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Update Result');
                    window.location.reload();
                }
                else
                {
                    toastr['error'](res.message,'Update Result');
                }
            }
        })
    });

    $('.del_size_action').click(function(){
        var attr_id = $(this).attr('attr-id');
        $('.del_size_btn').attr('attr-id', attr_id);
    });

    $('.del_size_btn').click(function() {
        $.ajax({
            url: base_url + 'BackendController/delete_size',
            type: 'post',
            data: {id: $(this).attr('attr-id')},
            success: function(res)
            {
              res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Delete Result');
                    window.location.reload();
                }
                else
                {
                    toastr['error'](res.message,'Delete Result');
                }
            }
        })
    });

    // Category manage

    $('.add-category-form').on('submit', function() {

        var send_data = {
            'category_name' : $('#inputCategoryName').val(),
        };

        $.ajax({
            url: base_url + 'BackendController/create_category',
            type: 'post',
            data: send_data,
            success:function(res){

                res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Add Result');
                    window.location.reload();
                }
                else
                {
                    toastr['error'](res.message,'Add Result');
                }
            }
        });
        return false;
    });

    $('.edit_category_action').click(function() {
        var attr_id = $(this).attr('attr-id');
        var attr_name = $(this).attr('attr-name');
        $('.update_category_btn').attr('attr-id', attr_id);
        $('#editCategoryName').val(attr_name);
    });

    $('.update_category_btn').click(function() {
        $.ajax({
            url: base_url + 'BackendController/update_category',
            type: 'post',
            data: {
                id: $(this).attr('attr-id'),
                category_name: $('#editCategoryName').val(),
            },
            success: function(res)
            {
              res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Update Result');
                    window.location.reload();
                }
                else
                {
                    toastr['error'](res.message,'Update Result');
                }
            }
        })
    });

    $('.del_category_action').click(function(){
        var attr_id = $(this).attr('attr-id');
        $('.del_category_btn').attr('attr-id', attr_id);
    });

    $('.del_category_btn').click(function() {
        $.ajax({
            url: base_url + 'BackendController/delete_category',
            type: 'post',
            data: {id: $(this).attr('attr-id')},
            success: function(res)
            {
              res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Delete Result');
                    window.location.reload();
                }
                else
                {
                    toastr['error'](res.message,'Delete Result');
                }
            }
        })
    });

    var select_user = [];

    $('#check_all').click(function() {
        select_user = [];
        if ($(this).prop('checked') == false)
        {
            $('.check_user').each(function(){
                $(this).prop('checked', false);
            });
            $('.delete_all_user_btn').attr('disabled','disabled');
            $('.delete_all_staff_btn').attr('disabled','disabled');
            $('.delete_all_acheive_btn').attr('disabled','disabled');
            $('.delete_all_fees_btn').attr('disabled','disabled');
        } else {
            $('.check_user').each(function(){
                $(this).prop('checked', true);
                select_infor = $(this).attr('attr-id');
                select_user.push(select_infor);
            });
            $('.delete_all_user_btn').removeAttr('disabled');
            $('.delete_all_staff_btn').removeAttr('disabled');
            $('.delete_all_acheive_btn').removeAttr('disabled');
            $('.delete_all_fees_btn').removeAttr('disabled');
        }
    })

    $('.check_user').click(function() {

        var enable = true;
        $(document).find('.check_user').each(function(){
            if($(this).prop('checked') == false)
            {
                enable = false;
            }
        });
        $('#check_all').prop('checked', enable);
        
        if ($(this).prop('checked') == true)
        {
            select_infor = $(this).attr('attr-id');
            select_user.push(select_infor);
            $('.delete_all_user_btn').removeAttr('disabled');
            $('.delete_all_staff_btn').removeAttr('disabled');
            $('.delete_all_acheive_btn').removeAttr('disabled');
            $('.delete_all_fees_btn').removeAttr('disabled');
        } else {
            select_infor = $(this).attr('attr-id');
            var index = select_user.indexOf(select_infor);
            select_user.splice(index,1);
            if (select_user.length == 0)
            {
                $('.delete_all_user_btn').attr('disabled','disabled');
                $('.delete_all_staff_btn').attr('disabled','disabled');
                $('.delete_all_acheive_btn').attr('disabled','disabled');
                $('.delete_all_fees_btn').attr('disabled','disabled');
            }
        }
    })

    $('.delete_all_user_btn').click(function() {
        var send_data = {};
        send_data['data'] = select_user;
        $.ajax({
            url: base_url + 'BackendController/delete_all_user',
            type: 'post',
            data: send_data,
            success: function(res)
            {
              res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Delete Result');
                    window.location.reload();
                }
                else
                {
                    toastr['error'](res.message,'Delete Result');
                }
            }
        })
    })

    $('.delete_all_staff_btn').click(function() {
        var send_data = {};
        send_data['data'] = select_user;
        $.ajax({
            url: base_url + 'BackendController/delete_all_staff',
            type: 'post',
            data: send_data,
            success: function(res)
            {
              res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Delete Result');
                    window.location.reload();
                }
                else
                {
                    toastr['error'](res.message,'Delete Result');
                }
            }
        })
    });

    // Player Option manage

    $('.add-delivery-form').on('submit', function() {

        var send_data = {
            'option' : $('#inputOptionName').val(),
            'description' : $('#inputDescription').val(),
            'cost' : $('#inputCost').val(),
            'status' : $('#inputOptionStatus').val()
        };

        $.ajax({
            url: base_url + 'BackendController/create_delivery',
            type: 'post',
            data: send_data,
            success:function(res){

                res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Add Result');
                    window.location.reload();
                }
                else
                {
                    toastr['error'](res.message,'Add Result');
                }
            }
        });
        return false;
    });

    $('.toggle_delivery_status').change(function() {
        if ($(this).prop('checked') == true)
        {
            var send_data = {
                'id' : $(this).attr('attr-id'),
                'status' : '1',
            };

            $.ajax({
                url: base_url + 'BackendController/update_delivery',
                type: 'post',
                data: send_data,
                success:function(res){

                    res = JSON.parse(res);

                    if (res.success)
                    {
                        toastr['success'](res.message,'Update Result');
                    }
                    else
                    {
                        toastr['error'](res.message,'Update Result');
                    }
                }
            });
        }
        else
        {
            var send_data = {
                'id' : $(this).attr('attr-id'),
                'status' : '0',
            };

            $.ajax({
                url: base_url + 'BackendController/update_delivery',
                type: 'post',
                data: send_data,
                success:function(res){

                    res = JSON.parse(res);

                    if (res.success)
                    {
                        toastr['success'](res.message,'Update Result');
                    }
                    else
                    {
                        toastr['error'](res.message,'Update Result');
                    }
                }
            });
        }
    });

    $('.edit_delivery_action').click(function() {
        var attr_id = $(this).attr('attr-id');
        var attr_option = $(this).attr('attr-option');
        var attr_description = $(this).attr('attr-description');
        var attr_cost = $(this).attr('attr-cost');
        var attr_status = $(this).attr('attr-status');
        $('.update_delivery_btn').attr('attr-id', attr_id);
        $('#editOptionName').val(attr_option);
        $('#editDescription').val(attr_description);
        $('#editCost').val(attr_cost);
        $('#editOptionStatus').val(attr_status);
    });

    $('.update_delivery_btn').click(function() {
        $.ajax({
            url: base_url + 'BackendController/update_delivery',
            type: 'post',
            data: {
                id: $(this).attr('attr-id'),
                option: $('#editOptionName').val(),
                description: $('#editDescription').val(),
                cost: $('#editCost').val(),
                status: $('#editOptionStatus').val(),
            },
            success: function(res)
            {
              res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Update Result');
                    window.location.reload();
                }
                else
                {
                    toastr['error'](res.message,'Update Result');
                }
            }
        })
    });

    $('.del_delivery_action').click(function(){
        var attr_id = $(this).attr('attr-id');
        $('.del_delivery_btn').attr('attr-id', attr_id);
    });

    $('.del_delivery_btn').click(function() {
        $.ajax({
            url: base_url + 'BackendController/delete_delivery',
            type: 'post',
            data: {
                id: $(this).attr('attr-id')
            },
            success: function(res)
            {
              res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Delete Result');
                    window.location.reload();
                }
                else
                {
                    toastr['error'](res.message,'Delete Result');
                }
            }
        })
    });


    // Pending Status manage

    $('.add_fee_btn').click(function() {

        var send_data = {
            'fee_name' : $('#inputName').val(),
            'cost' : $('#inputCost').val(),
        };

        $.ajax({
            url: base_url + 'BackendController/create_fee',
            type: 'post',
            data: send_data,
            success:function(res){

                res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Add Result');
                    window.location.reload();
                }
                else
                {
                    toastr['error'](res.message,'Add Result');
                }
            }
        });
    });

    $('.edit_fee_action').click(function() {
        var attr_id = $(this).attr('attr-id');
        var attr_name = $(this).attr('attr-name');
        var attr_cost = $(this).attr('attr-cost');
        $('.update_fee_btn').attr('attr-id', attr_id);
        $('#editName').val(attr_name);
        $('#editCost').val(attr_cost);
    });

    $('.update_fee_btn').click(function() {
        var send_data = {
            'id' : $(this).attr('attr-id'),
            'fee_name' : $('#editName').val(),
            'cost' : $('#editCost').val(),
        };

        $.ajax({
            url: base_url + 'BackendController/update_fee',
            type: 'post',
            data: send_data,
            success: function(res)
            {
              res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Update Result');
                    window.location.reload();
                }
                else
                {
                    toastr['error'](res.message,'Update Result');
                }
            }
        })
    });

    $('.del_fee_action').click(function(){
        var attr_id = $(this).attr('attr-id');
        $('.del_fee_btn').attr('attr-id', attr_id);
    });

    $('.del_fee_btn').click(function() {
        $.ajax({
            url: base_url + 'BackendController/delete_fee',
            type: 'post',
            data: {id: $(this).attr('attr-id')},
            success: function(res)
            {
              res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Delete Result');
                    window.location.reload();
                }
                else
                {
                    toastr['error'](res.message,'Delete Result');
                }
            }
        })
    });

    $('.delete_all_fees_btn').click(function() {
        var send_data = {};
        send_data['data'] = select_user;
        $.ajax({
            url: base_url + 'BackendController/delete_all_fee',
            type: 'post',
            data: send_data,
            success: function(res)
            {
              res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Delete Result');
                    window.location.reload();
                }
                else
                {
                    toastr['error'](res.message,'Delete Result');
                }
            }
        })
    })

    var select_player = [];

    $('#check_all_player').click(function() {
        select_player = [];
        if ($(this).prop('checked') == false)
        {
            $('.check_player').each(function(){
                $(this).prop('checked', false);
            });
            $('.put_fee_btn').attr('disabled','disabled');
            $('.put_fee_btn').attr('disabled','disabled');
        } else {
            $('.check_player').each(function(){
                $(this).prop('checked', true);
                select_infor = $(this).attr('attr-id');
                select_player.push(select_infor);
            });
            $('.put_fee_btn').removeAttr('disabled');
            $('.put_fee_btn').removeAttr('disabled');
        }
        console.log(select_player);
    })

    $('.check_player').click(function() {

        var enable = true;
        $(document).find('.check_player').each(function(){
            if($(this).prop('checked') == false)
            {
                enable = false;
            }
        });
        $('#check_all_player').prop('checked', enable);
        
        if ($(this).prop('checked') == true)
        {
            select_infor = $(this).attr('attr-id');
            select_player.push(select_infor);
            $('.put_fee_btn').removeAttr('disabled');
            $('.put_fee_btn').removeAttr('disabled');
        } else {
            select_infor = $(this).attr('attr-id');
            var index = select_player.indexOf(select_infor);
            select_player.splice(index,1);
            if (select_player.length == 0)
            {
                $('.put_fee_btn').attr('disabled','disabled');
                $('.put_fee_btn').attr('disabled','disabled');
            }
        }
        console.log(select_player);
    })

    $('#put_fee_select').change(function(){
        var id = $('option:selected', this).val();
        window.location.href = base_url + '/backend/fees/' + id;
    })

    $('.put_fee_btn').click(function() {
        var send_data = {};
        send_data['data'] = select_player;
        send_data['fee_id'] = $('#put_fee_select').val();
        console.log(send_data);
        $.ajax({
            url: base_url + 'BackendController/put_fees',
            type: 'post',
            data: send_data,
            success: function(res)
            {
              res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Put Result');
                    window.location.href = base_url + '/backend/fees';
                }
                else
                {
                    toastr['error'](res.message,'Put Result');
                }
            }
        })
    })

    $('.del_acheive_action').click(function(){
        var attr_id = $(this).attr('attr-id');
        $('.del_acheive_btn').attr('attr-id', attr_id);
    });

    $('.del_acheive_btn').click(function() {
        $.ajax({
            url: base_url + 'BackendController/delete_acheive',
            type: 'post',
            data: {id: $(this).attr('attr-id')},
            success: function(res)
            {
              res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Delete Result');
                    window.location.reload();
                }
                else
                {
                    toastr['error'](res.message,'Delete Result');
                }
            }
        })
    });

    $('.delete_all_acheive_btn').click(function() {
        var send_data = {};
        send_data['data'] = select_user;
        $.ajax({
            url: base_url + 'BackendController/delete_all_acheive',
            type: 'post',
            data: send_data,
            success: function(res)
            {
              res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Delete Result');
                    window.location.reload();
                }
                else
                {
                    toastr['error'](res.message,'Delete Result');
                }
            }
        })
    });

    $('.send_paid_action').click(function(){
        $.ajax({
            url: base_url + 'BackendController/update_pay_stauts',
            type: 'post',
            data: {id: $(this).attr('attr-id')},
            success: function(res)
            {
              res = JSON.parse(res);

                if (res.success)
                {
                    toastr['success'](res.message,'Update Result');
                    window.location.reload();
                }
                else
                {
                    toastr['error'](res.message,'Update Result');
                }
            }
        })
    })

    $(document).on('change','#inputUsergroup',function(e){
        var vl = $(this).val();
        if(vl == '4'){
          $("#player-form-fields").removeClass('d-none');
        }else{
          $("#player-form-fields").addClass('d-none');
        }
    })

    $(document).on("click","#add-career",function(e){
        var el = $(".career-item").eq(0).clone();
        el.find('.remove-career').removeClass('d-none');
        $("#career-items").append('<hr/>');
        $("#career-items").append(el);
        $('.career-item').each(function(index,el){
            
            if(index % 2 == 0){
                $(this).addClass('bg-secondary text-white p-2')
            }else{
                $(this).removeClass('bg-secondary')
                $(this).removeClass('text-white')
            }
        })
        $('[data-toggle="tooltip"]').tooltip()
    })

    $(document).on("click",".remove-career",function(e){
        if($(".remove-career").length != 1)
        {
            $(this).closest('.career-item').remove();

            $('.career-item').each(function(index,el){
                
                if(index % 2 == 0){
                    $(this).addClass('bg-secondary text-white p-2')
                }else{
                    $(this).removeClass('bg-secondary')
                    $(this).removeClass('text-white')
                }
            })
        }
        e.preventDefault();
    })

    $('[data-toggle="tooltip"]').tooltip()