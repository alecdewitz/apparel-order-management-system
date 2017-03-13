<?php


    //username or password incorrect
    if ($_SESSION['err'] == "invalid") {
        $_SESSION['err'] = "false";
        $err_msg = '<div class="alert alert-danger"><span> Username or password is invalid. </span></div>';
    }

    //running multiple sessions
    if ($_SESSION['err'] == "multiple_sessions") {
        $_SESSION['err'] = "false";
        $err_msg = '<div class="alert alert-danger"><span> You have logged in from another computer. <br> You may only be logged in from <b>one</b> location at a time. <br> This session has ended. </span></div>';
    }

    //user is not logged in to see that page
    if ($_SESSION['err'] == "login_required") {
        $_SESSION['err'] = "false";
        $err_msg = '<div class="alert alert-warning"><span> You must login to see that page. </span></div>';
    }
