var Login = function() {

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

            success: function(label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            }});

        $('.login-form input').keypress(function(e) {
            if (e.which == 13) {
                if ($('.login-form').validate().form()) {
                    $('.login-form').submit(); //form validation success, call ajax form submit
                }
                return false;
            }
        });
    };

    var handleForgetPassword = function() {
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

            success: function(label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            }});

        $('.forget-form input').keypress(function(e) {
            if (e.which == 13) {
                if ($('.forget-form').validate().form()) {
                    $('.forget-form').submit();
                }
                return false;
            }
        });

        jQuery('#forget-password').click(function() {
            jQuery('.login-form').hide();
            jQuery('.forget-form').show();
        });

        jQuery('#back-btn').click(function() {
            jQuery('.login-form').show();
            jQuery('.forget-form').hide();
        });

    };

    var handleRegister = function() {

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
                country: {
                    required: true
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

            success: function(label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            }});

        $('.register-form input').keypress(function(e) {
            if (e.which == 13) {
                if ($('.register-form').validate().form()) {
                    $('.register-form').submit();
                }
                return false;
            }
        });

        jQuery('#register-btn').click(function() {
            jQuery('.login-form').hide();
            jQuery('.register-form').show();
        });

        jQuery('#register-back-btn').click(function() {
            jQuery('.login-form').show();
            jQuery('.register-form').hide();
        });
    };

    return {
        //main function to initiate the module
        init: function() {

            handleLogin();
            handleForgetPassword();
            handleRegister();

        }

    };

}();

jQuery(document).ready(function() {
    Login.init();
});