<!DOCTYPE html>
<head>
    <meta charset="utf-8"/>
    <title>Order Management | Login</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
    <meta content="Order management software for apparel and clothing companies." name="description"/>
    <meta content="Alec Dewitz" name="author"/>
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $base_dir; ?>/assets/css/components.css" rel="stylesheet" id="style_components" type="text/css"/>
    <link href="<?php echo $base_dir; ?>/assets/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" href="../favicon.ico"/>
</head>

<body class="login">
<div class="logo">
    <a href="../"><img src="<?php echo $base_dir; ?>/assets/img/logo.png" style="height: 70px;max-width:70%" alt=""/></a>
</div>
<div class="content">
    <form class="login-form" action="<?php echo $base_dir; ?>/login" method="post">
        <div class="form-title">
            <span class="form-title">Welcome.</span>
            <span class="form-subtitle">Please login.</span>
        </div>
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            <span> Please enter your username and password. </span>
        </div>
        <?php if (isset($multiple_sessions)) { ?>

            <div class="alert alert-danger">
                <span> You have logged in from another computer. <br> You may only be logged in from <b>one</b> location at a time. <br> This session has ended. </span>
            </div>

        <?php } else if (isset($invalid)) { ?>

            <div class="alert alert-danger">
                <span> Username or password is invalid. </span>
            </div>

        <?php } else if (isset($login_required)) { ?>

            <div class="alert alert-warning">
                <span> You must login to see that page. </span>
            </div>

        <?php } ?>

        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Username</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="text" placeholder="Username" name="username"/></div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="password" placeholder="Password" name="password"/></div>
        <div class="form-actions">
            <button type="submit" class="btn red btn-block uppercase">Login</button>
        </div>
        <div class="form-actions">
            <div class="pull-left">
                <label class="rememberme mt-checkbox mt-checkbox-outline">
                    <input type="checkbox" name="remember" value="1"/> Remember me
                    <span></span>
                </label>
            </div>
            <div class="pull-right forget-password-block">
                <a href="#" id="forget-password" class="forget-password">Forgot Password?</a>
            </div>
        </div>
    </form>

    <form class="forget-form" action="<?php echo $base_dir; ?>/login/forgot-password" method="post">
        <div class="form-title">
            <span class="form-title">Forget Password ?</span>
            <span class="form-subtitle">Enter your e-mail to reset it.</span>
        </div>
        <div class="form-group">
            <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/></div>
        <div class="form-actions">
            <button type="button" id="back-btn" class="btn btn-default">Back</button>
            <button type="submit" class="btn btn-primary uppercase pull-right">Submit</button>
        </div>
    </form>

</div>
<div class="copyright hide">2017 &copy; T-Spot <a target="_blank" href="https://alecdewitz.com">Alec Dewitz</a></div>


<script src="https://code.jquery.com/jquery-2.2.4.min.js" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-confirmation/1.0.5/bootstrap-confirmation.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/additional-methods.min.js" type="text/javascript"></script>
<script src="<?php echo $base_dir; ?>/assets/js/login.js" type="text/javascript"></script>


</body>

</html>
