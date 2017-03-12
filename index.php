<?php
require_once('core/core-functions.php');
require_once('php/connection.php');
//require_once('errors.php');

#remove the directory path we don't want
$request = str_replace("/order-management-apparel/", "", $_SERVER['REQUEST_URI']);

#split the path by '/'
$params = explode("/", $request);



#page locations
$login = "login";
$logout = "logout";
$dashboard = "dashboard";
$orders = "orders";
$transactions = "transactions";
$settings = "settings";
#

#keeps users from requesting any file they want
$primary_pages = array(
    $login,
    $logout,
    $dashboard,
    $orders,
    $transactions,
    $settings
);

//print_r($params);


##Gets web directory for different servers
$directory = currentdir($_SERVER["REQUEST_URI"]);


if (in_array($params[0], $primary_pages)) {


    #Login page
    if ($params[0] == $login) {
        include_once($login . '.php');
        exit();
    }

    #Logout page
    if ($params[0] == $logout) {
        include_once($logout . '.php');
        exit();
    }

    ##Require session for logged in users
    require_once('php/session.php');


    #Dashboard page
    if ($params[0] == $dashboard) {
        include_once($dashboard . '.php');
        exit();
    }

    #Orders page
    if ($params[0] == $orders) {
        include_once($orders . '.php');
        exit();
    }


} else if (!$params[0]) {
//    if (isset($_SESSION['logged_user'])){
//        header("location: ./orders");
//    }

    include_once($login . '.php');


} else {
//    print_r($params);
        include("404.php");
}

