function login()
{
	if($('.login-form').validate().form())
	{
		var data = {}; // the login data to be configured

		$('.login-form').find('input').each(function(){
			data[$(this).attr('name')] = $(this).val();
		})

		//console.log(data);
		$.ajax({
			url:'BackendController/login',
			type:'post',
			data:data,
			success:function(res){
				//console.log(res);
				res = JSON.parse(res);
				if(res.success)
				{
					toastr['success'](res.message,'Welcome to Our Website');
					window.location.href = res.redirect_url + 'backend';
				}
				else
				{
					toastr['error'](res.message,'Login Result');
				}
			}	
		})
	}
}

function register()
{
	if($('.register-form').validate().form())
	{
		var data = {}; //register input data
		
		$('.register-form').find('input').each(function(){
			data[$(this).attr('name')] = $(this).val();
		})

		$('.register-form').find('select').each(function(){
			data[$(this).attr('name')] = $(this).val();
		})

		if($('#gender').length == 0 || $("#gender :selected").attr('attr-cost') == 0) {
			$.ajax({
				url:'BackendController/register',
				type:'post',
				data:data,
				success:function(res){

					res = JSON.parse(res);
					if(res.success)
					{
						// jQuery('.login-form').show();
						// $('.register-form').hide();
						toastr['success'](res.message,'Register Result');
						window.location.href = base_url + 'backend';
					}
					else
					{
						toastr['error'](res.error_message,'Register Result');
					}
				}
			})
		} else {
			var cost = $("#gender :selected").attr('attr-cost');
			$.ajax({
				url:'BackendController/stack',
				type:'post',
				data:{data:data, cost:cost},
				success:function(res){

					res = JSON.parse(res);
					if(res.success)
					{
						// jQuery('.login-form').show();
						// $('.register-form').hide();
						// toastr['success'](res.message,'Register Result');
						window.location.href = base_url+'backend/reg_paypal';
					}
					else
					{
						toastr['error'](res.error_message,'Register Result');
					}
				}
			})
		}

	}
}

function forgetpassword()
{
	var data = {};
	if($('.forget-form').validate().form()){

		$('.forget-form').find('input').each(function(){
			data[$(this).attr('name')] = $(this).val();
		})

		//console.log(data);
		$.ajax({
			url:'BackendController/forgetpassword',
			type:'post',
			data:data,
			success:function(res){

				res = JSON.parse(res);
				if(res.success)
				{
					$('.confirm-form').show();
					$('.forget-form').hide();
				}
				else
				{
					toastr['error'](res.message,'Error');
				}
			}
		})	
	}
}

function confirmnumber()
{
	var data = {};
	
	$('.confirm-form').find('input').each(function(){
		data[$(this).attr('name')] = $(this).val();
	})

	//console.log(data);
	$.ajax({
		url:'BackendController/confirmnumber',
		type:'post',
		data:data,
		success:function(res){
			
			res = JSON.parse(res);
			if(res.success)
			{
				window.location.href = res.redirect_url;
			}
			else
			{
				toastr['error'](res.message,'Error');
			}
		}
	})
}

function resetpassword()
{
	var data = {};

    if($('.reset-password').validate().form()){
    	$.ajax({
    		url:'BackendController/resetpassword',
    		type:'post',
    		data:{password:$('input[name=password]').val()},
    		success:function(res){
    			console.log(res);
    			res = JSON.parse(res);
    			if(res.success)
    			{
    				window.location.href = res.redirect_url;
    			}
    			else
    			{
    				toastr['error'](res.message,'Error');
    			}
    		}
    	});
    }
}

function update()
{
	if ($('.update-form').validate().form())
	{
		var data = {}; //register input data
		
		$('.update-form').find('input').each(function(){
			data[$(this).attr('name')] = $(this).val();
		})

		console.log(data);
		$.ajax({
			url:'BackendController/update',
			type:'post',
			data:data,
			datatype:'json',
			success:function(res){

				res = JSON.parse(res);

				if(res.success)
				{
					toastr['success'](res.message,'Update Result');
				}
				else
				{
					toastr['error'](res.error_message,'Update Result');
				}
			}
		})

	}
}

var Login = function () {

	var handleLogin = function() {
		$('.login-form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            rules: {
	                username: {
	                    required: true
	                },
	                password: {
	                    required: true
	                },
	                remember: {
	                    required: false
	                }
	            },

	            messages: {
	                username: {
	                    required: "Username is required."
	                },
	                password: {
	                    required: "Password is required."
	                }
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   
	                $('.alert-danger', $('.login-form')).show();
	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	            },

	            errorPlacement: function (error, element) {
	                error.insertAfter(element.closest('.input-icon'));
	            },

	            submitHandler: function (form) {
	                login();
	            }
	        });

	        $('.login-form input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('.login-form').validate().form()) {
	                    login()
	                }
	                return false;
	            }
	        });

	        $('#login').click(function(){
	        	login();
	        });
	}

	var handleRegister = function () {

		function format(state) {
            if (!state.id) { return state.text; }
            var $state = $(
             '<span><img src="assets/img/flags/' + state.element.value.toLowerCase() + '.png" class="img-flag" /> ' + state.text + '</span>'
            );
            
            return $state;
        }

        function format_select2(state)
        {
        	if(!state.id){return state.text;}
        	var $state = $(
        		'<span><i class="fa fa-' + state.element.value.toLowerCase() + '"></i>' + state.text + '</span>'
        		);
        	return $state;
        }

        if (jQuery().select2 && $('#gender').size() > 0) {
            $("#country_list").select2({
	            placeholder: '<i class="fa fa-map-marker"></i>&nbsp;Select a Country',
	            templateResult: format,
                templateSelection: format,
                width: '100%', 
	            escapeMarkup: function(m) {
	                return m;
	            }
	        });

            $("#gender").select2({
	            placeholder: '<i class="fa fa-gender"></i>&nbsp;Select a Gender',
	            templateResult: format_select2,
                templateSelection: format_select2,
                width: '100%', 
	            escapeMarkup: function(m) {
	                return m;
	            }
	        });

            $('#gender').change(function(){
            	$('.register-form').validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
            })

	        $('#country_list').change(function() {
	            $('.register-form').validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
	        });
    	}

         $('.register-form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            ignore: "",
	            rules: {
	                
	                fullname: {
	                    required: true
	                },
	                email: {
	                    required: true,
	                    email: true
	                },
	                address: {
	                    required: true
	                },
	                city: {
	                    required: true
	                },
	                country:{
	                	required:true
	                },
	                phone:{
	                	required:true
	                },
	                birthday:{
	                	required:true
	                },
	                gender:{
	                	required:true
	                },
	                username: {
	                    required: true
	                },
	                password: {
	                    required: true
	                },
	                rpassword: {
	                    equalTo: "#register_password"
	                },

	                tnc: {
	                    required: true
	                }
	            },

	            messages: { // custom messages for radio buttons and checkboxes
	                tnc: {
	                    required: "Please accept TNC first."
	                }
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   

	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	            },

	            errorPlacement: function (error, element) {
	                if (element.attr("name") == "tnc") { // insert checkbox errors after the container                  
	                    error.insertAfter($('#register_tnc_error'));
	                } else if (element.closest('.input-icon').size() === 1) {
	                    error.insertAfter(element.closest('.input-icon'));
	                } else {
	                	error.insertAfter(element);
	                }
	            },

	            submitHandler: function (form) {
	                register();
	            }
	        });

		$('.register-form input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.register-form').validate().form()) {
                    register();
                }
                return false;
            }
        });

        $('#register-submit-btn').click(function(){
        	register();
        })

        // jQuery('#register-btn').click(function () {
        //     jQuery('.login-form').hide();
        //     jQuery('.register-form').show();
        // });

        // jQuery('#register-back-btn').click(function () {
        //     jQuery('.login-form').show();
        //     jQuery('.register-form').hide();
        // });
	}

	var handleForgetPassword = function () {
		$('.forget-form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            ignore: "",
	            rules: {
	                email: {
	                    required: true,
	                    email: true
	                }
	            },

	            messages: {
	                email: {
	                    required: "Email is required."
	                }
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   

	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	            },

	            errorPlacement: function (error, element) {
	                error.insertAfter(element.closest('.input-icon'));
	            },

	            submitHandler: function (form) {
	                form.submit();
	            }
	        });

	        $('.forget-form input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('.forget-form').validate().form()) {
	                    forgetpassword();
	                }
	                return false;
	            }
	        });

	        jQuery('#forget-password').click(function () {
	            jQuery('.login-form').hide();
	            jQuery('.forget-form').show();
	        });

	        jQuery('#forget_button').click(function(){
	        	forgetpassword();
	        })

	        // jQuery('#back-btn').click(function () {
	        //     jQuery('.login-form').show();
	        //     jQuery('.forget-form').hide();
	        // });
	}

	var handleConfirm = function () {
		$('.confirm-form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            ignore: "",
	            rules: {
	                email: {
	                    required: true,
	                    email: true
	                }
	            },

	            messages: {
	                confirm_number: {
	                    required: "Confirm Number is required."
	                }
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   

	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	            },

	            errorPlacement: function (error, element) {
	                error.insertAfter(element.closest('.input-icon'));
	            },

	            submitHandler: function (form) {
	                confirmnumber();
	            }
	        });

	        $('.confirm-form input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('.confirm-form').validate().form()) {
	                    confirmnumber();
	                }
	                return false;
	            }
	        });

	        jQuery('#confirm_back-btn').click(function () {
	            jQuery('.login-form').show();
	            jQuery('.confirm-form').hide();
	        });

	        jQuery('#confirmbutton').click(function(){
	        	confirmnumber()
	        })
	}

	var handleResetpassword = function() {
		$('.reset-password').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            rules: {
	                password: {
	                    required: true
	                },
	                rpassword: {
	                    equalTo: '#password'
	                }
	            },

	            messages: {
	                password: {
	                    required: "Password is required."
	                },
	                rpassword: {
	                    equalTo: "Confirm Password must be equal to password"
	                }
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   
	                $('.alert-danger', $('.reset-password')).show();
	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	            },

	            errorPlacement: function (error, element) {
	                error.insertAfter(element.closest('.input-icon'));
	            },

	            submitHandler: function (form) {
	                resetpassword();
	            }
	        });

	        $('.reset-password input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('.reset-password').validate().form()) {
	                    resetpassword()
	                }
	                return false;
	            }
	        });

	        jQuery('#resetpassword').click(function(){
	        	resetpassword();
	        })
	}
    
	var handleUpdate = function() {
		$('.update-form').validate({
	        errorElement: 'span', //default input error message container
	        errorClass: 'help-block', // default input error message class
	        focusInvalid: false, // do not focus the last invalid input
	        rules: {
	        	username: {
	                required: true
	                },
	            password: {
	                required: true
	            },
	            rpassword: {
	                equalTo: '#password'
	            }
	        },

	        messages: {
	        	username: {
	                required: "Username is required."
	                },
	            password: {
	                required: "Password is required."
	            },
	            rpassword: {
	                equalTo: "Confirm Password must be equal to password"
	            }
	        },

	        invalidHandler: function (event, validator) { //display error alert on form submit   
	            $('.alert-danger', $('.update-form')).show();
	        },

	        highlight: function (element) { // hightlight error inputs
	            $(element)
	                .closest('.form-group').addClass('has-error'); // set error class to the control group
	        },

	        success: function (label) {
	            label.closest('.form-group').removeClass('has-error');
	            label.remove();
	        },

	        errorPlacement: function (error, element) {
	            error.insertAfter(element.closest('.input-icon'));
	        },

	        submitHandler: function (form) {
	            update();
	        }
	    });

	    $('.update-form input').keypress(function (e) {
	        if (e.which == 13) {
	            if ($('.update-form').validate().form()) {
	                update();
	            }
	            return false;
	        }
	    });

	    $('#update_btn').click(function(){
	    	update();
	    })
	}
    
    return {
        //main function to initiate the module
        init: function () {
        	
            handleLogin();
            handleRegister();
            handleForgetPassword();
            handleConfirm();
            handleResetpassword();
            handleUpdate();
        }
    };

}();

jQuery(document).ready(function() {
    Login.init();
});