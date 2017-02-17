<?php
if(isset($_SESSION['logged_user'])){
    header("location: ./orders");
}

//Cookies to add errors to screen
if(isset($_COOKIE['invalid'])) {
    $invalid = true;
    setcookie("invalid", "", time() - 100, "/"); //deletes cookie
}
if(isset($_COOKIE['multiple_sessions'])) {
    $multiple_sessions = true;
    setcookie("multiple_sessions", "", time() - 100, "/"); //deletes cookie
}
if(isset($_COOKIE['login_required'])) {
    $login_required = true;
    setcookie("login_required", "", time() - 100, "/"); //deletes cookie
}

?>
