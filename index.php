<?php
session_start();
date_default_timezone_set('America/Chicago');


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
//Testing purposes
////////////////
#comment if pages aren't changing headers
//print_r($params);
//shows all errors
//require_once('errors.php');




////////////////
//primary pages
////////////////
$login = "login";
$logout = "logout";
$dashboard = "dashboard";
$orders = "orders";
$transactions = "transactions";
$settings = "settings";
$accounts = "accounts";


#keeps users from requesting any file they want
$primary_pages = array(
    $login,
    $logout,
    $dashboard,
    $orders,
    $transactions,
    $settings,
    $accounts
);



//connection to database
require('core/connection.php');


////////////////
//URL forwarding
////////////////
#makes sure page accessing is within primary pages array
if (in_array($params[0], $primary_pages)) {

    #Login page
    if ($params[0] == $login) {

        //if user is logged in already, send to DASHBOARD TODO
        if (isset($_SESSION['logged_user'])) {
            //should change to dashboard when ready
            header("location: " . $base_dir . "/orders/all");
        }



        //only includes if user is submitting login details
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once('scripts/login-scripts.php');
        }

        require_once('functions/login-functions.php');
        require_once('views/login.php');

        exit();
    }

    //Require session for logged in users
    require_once('php/session.php');


    #Logout page
    if ($params[0] == $logout) {
        if ($params[1] == "multiple-sessions"){

        }

        include_once('scripts/logout-scripts.php');
        exit();
    }





    #Dashboard page
    if ($params[0] == $dashboard) {
        include_once('dashboard.php');
        exit();
    }


    ////////////////
    //orders history get actions
    ////////////////
    $all = 'all';
    $client = 'client';
    $retail = 'retail';

    $orders_history = array(
        $all,
        $client,
        $retail
    );

    if ($params[0] == $orders) {
        //checks if in order_history array
        if (isset($params[1]) && in_array($params[1], $orders_history)) {

            //gets order type (client, retail, all) from given parameters
            $getOrderType = $params[1];
            include_once($orders . '.php');

        } else {
            header("location: " . $base_dir . "/orders/all");
        }

        exit();
    }



} else if (!$params[0]) {

    if (isset($_SESSION['logged_user'])) {
        //should change to dashboard when ready
        header("location: " . $base_dir . "/orders/all");
    }

    require_once('functions/login-functions.php');
    require_once('views/login.php');



} else {
    print_r($params);
    include("404.php");
}
