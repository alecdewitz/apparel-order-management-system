<?php

    //username or password incorrect
    if ($_SESSION['error'] == "invalid") {
        $_SESSION['error'] = "false";
        $err_msg = '<div class="alert alert-danger"><span> Username or password is invalid. </span></div>';
    }

    //running multiple sessions
    if (isset($_COOKIE['multiple_sessions'])) {
        $multiple_sessions = true;
        unset($_COOKIE['multiple_sessions']);
        echo '<div class="alert alert-danger"><span> You have logged in from another computer. <br> You may only be logged in from <b>one</b> location at a time. <br> This session has ended. </span></div>';
    }

    //user is not logged in to see that page
    if (isset($_COOKIE['login_required'])) {
        $login_required = true;
        unset($_COOKIE['login_required']);
        echo '<div class="alert alert-warning"><span> You must login to see that page. </span></div>';
    }
