<?php
session_start();
//require_once('errors.php');


////////////////
//Base URL editing
////////////////
#removes extra slashes
$url = preg_replace('/(\/+)/', '/', $_SERVER['REQUEST_URI']);
#gets base directory
$base_dir = str_replace($_SERVER['DOCUMENT_ROOT'], '', dirname($_SERVER['PHP_SELF']));
#remove the directory path we don't want
$request = str_replace($base_dir . "/", "", $url);
#split the path by '/'
$params = explode("/", $request);




////////////////
//primary pages
////////////////
$login = "login";
$logout = "logout";
$dashboard = "dashboard";
$orders = "orders";
$transactions = "transactions";
$settings = "settings";

#keeps users from requesting any file they want
$primary_pages = array(
    $login,
    $logout,
    $dashboard,
    $orders,
    $transactions,
    $settings
);




////////////////
//orders page actions
////////////////
$all = 'all';
$client = 'client';
$retail = 'retail';

$orders_page_actions = array(
    $all,
    $client,
    $retail
);



////////////////
//Testing purposes
////////////////
#COMMENT if pages aren't changing headers
//print_r($params);





////////////////
//URL forwarding
////////////////
#makes sure page accessing is within primary pages array
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


    #Require session for logged in users
    require_once('core/connection.php');
    require_once('php/session.php');


    #Dashboard page
    if ($params[0] == $dashboard) {
        include_once($dashboard . '.php');
        exit();
    }

    #Orders page
    if ($params[0] == $orders) {
        if (isset($params[1])) {
            echo true;
        }

        include_once($orders . '.php');
        exit();
    }


} else if (!$params[0]) {

    if (isset($_SESSION['logged_user'])){
        header("location: ./orders/all");
    }

    include_once($login . '.php');




} else {
    print_r($params);
    include("404.php");
}
