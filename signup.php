<?php
include('signupadd.php');

if(isset($_SESSION['login_user'])){
    header("location: profile");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Contacts Database - Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
    <style>
    html,
body {
    height: 100%;
}
html {
    display: table;
    margin: auto;
}
body {
    display: table-cell;
    vertical-align: middle;
}
    </style>
</head>
<body class="cyan loaded">
<div id="main">

    <div id="login-page" class="row">
        <div class="col s12 z-depth-4 card-panel">
            <form action="" method="post" class="login-form">
                <div class="row">
                    <div class="input-field col s12 center">
                        <h4 class="center login-form-text">Contacts Database</h4>
                        <h5 class="center login-form-text">Sign Up</h5>
                    </div>
                </div>
                <?php if ($error){ ?>
                <div class="row margin">
                    <div class=" col s12">
                       <i class="material-icons">error</i> <span style="color:red"> <?php echo $error; ?></span>
                    </div>
                </div>
                <?php } elseif ($success) { ?>
                    <div class="row margin">
                        <div class=" col s12">
                            <i class="material-icons">done</i> <span style="color:green"> <?php echo $success; ?></span>
                        </div>
                    </div>
                <?php } ?>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi-action-lock-outline prefix"></i>
                        <input required="" aria-required="true" name="enrollment" id="enrollment" type="password">
                        <label for="enrollment">Enrollment Key</label>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi-social-person-outline prefix"></i>
                        <input required="" aria-required="true" name="fullname" id="fullname" type="text">
                        <label for="fullname">Name</label>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi-social-person-outline prefix"></i>
                        <input required="" aria-required="true" name="username" id="username" type="text">
                        <label for="username">Username</label>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi-action-lock-outline prefix"></i>
                        <input required="" aria-required="true" name="password" id="password" type="password">
                        <label for="password">Password</label>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi-action-lock-outline prefix"></i>
                        <input required="" aria-required="true" name="password_verify" id="password_verify" type="password">
                        <label for="password_verify">Verify Password</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">email</i>
                        <input required="" aria-required="true" name="email" id="email" type="email" class="validate">
                        <label for="email">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">stay_current_portrait</i>
                        <input required="" aria-required="true" name="phone" id="phone" placeholder="9522223333" type="tel" length="10">
                        <label for="phone">Phone</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <button type="submit" name="submit" class="btn waves-effect waves-light col s12">Sign Up</button>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l12">
                        <p class="margin medium-small"><a href="/">Back to Login</a></p>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
</body>
</html>
