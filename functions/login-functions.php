<?php

//Cookies to add errors to screen
if(isset($_COOKIE['invalid'])) {
    $invalid = true;
    unset($_COOKIE['invalid']);
}
if(isset($_COOKIE['multiple_sessions'])) {
    $multiple_sessions = true;
    unset($_COOKIE['multiple_sessions']);
}
if(isset($_COOKIE['login_required'])) {
    $login_required = true;
    unset($_COOKIE['login_required']);
}

