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
require_once('errors.php');


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
require_once('functions/backend-functions.php');


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
    $add = 'add';
    $view = 'view';
    $edit = 'edit';
    $delete = 'delete';

    $orders_history = array(
        $all,
        $client,
        $retail
    );

    $orders_functions = array(
        $add,
        $view,
        $edit,
        $delete
    );

    if ($params[0] == $orders) {
        //checks if in order_history array
        if (in_array($params[1], $orders_history)) {

            //gets order type (client, retail, all) from given parameters
            $getOrderType = $params[1];
            include_once('scripts/orders-scripts.php');
            include_once('functions/orders-functions.php');
            include_once('core/header.php');
            include_once('orders.php');
            include_once('core/footer.php');

        } else if (in_array($params[1], $orders_functions)) {
            if ($params[1] == "$add") {
                if (isPostRequest()) {
                    include_once('scripts/add-order-scripts.php');
                }
                include_once('core/header.php');
                include_once('views/add-order.php');
                include_once('core/footer.php');
            } else if ($params[1] == "$view") {
                include_once('scripts/view-order-scripts.php');

                //checks to see if order is found
                if ($result->num_rows == 0) {
                    $_SESSION['order_not_found'] = true;
                    header('Location: '. $base_dir .'/orders/all');
                }

                include_once('core/header.php');
                include_once('views/view-order.php');
                include_once('modals/orders-modal.php');
                include_once('core/footer.php');

            } else if ($params[1] == "$edit" && $params[2]) {

                include_once('scripts/edit-order-scripts.php');

                //checks to see if order is found
                if ($result->num_rows == 0) {
                    $_SESSION['order_not_found'] = true;
                    header('Location: '. $base_dir .'/orders/all');
                }

                include_once('core/header.php');
                include_once('views/edit-order.php');
                include_once('modals/orders-modal.php');
                include_once('core/footer.php');
            } else if ($params[1] == "$delete") {

            }

        } else {
            header("location: " . $base_dir . "/orders/all");
        }

        exit;
    }


    #Settings page
    if ($params[0] == $settings) {
        //check if in array

        if ($params[1] == "general") {
            if (isPostRequest()) {
                include_once('scripts/settings-general-scripts.php');
            }
            include_once('functions/settings-functions.php');
            include_once('core/header.php');
            include_once('views/settings-general.php');
            include_once('core/footer.php');
        } else if ($params[1] == "password") {
            include_once('scripts/settings-general-scripts.php');
            include_once('core/header.php');
            include_once('views/settings-general.php');
            include_once('core/footer.php');
        } else if ($params[1] == "accounts") {
            include_once('scripts/settings-account-scripts.php');
            include_once('core/header.php');
            include_once('views/settings-general.php');
            include_once('core/footer.php');
        }


        exit;
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
