<?php


function isPostRequest() {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

function toDollars($num){
    return "$" . number_format($num, 2, '.', ',');
}

function isAdmin() {
    global $user;
    return $user['account_type'] == 1;
}

function getUserID() {
    global $user;
    return $user['account_id'];
}

function getUserIDNumber() {
    global $user;
    return $user['id'];
}

function getUsername() {
    global $user;
    return $user['username'];
}

function getHeaderPath(){
    return 'core/header.php';
}

function getFooterPath(){
    return 'core/footer.php';
}

function getCurrentTime() {
    return (int) round(microtime(true) * 1000);
}

function getReadableDateTime() {
    return date("M j, Y g:ia");
}

function getUniqueID() {
    return uniqid();
}


//
//activity_type
// 1 = get
// 2 = edit
// 3 = delete
//
function orderActivity($order_id, $order_number, $activity_type) {
    global $connection;

    $activity_id = getUniqueID();
    $account_id = getUserID();
    $account_username = getUsername();
    $title = "";
    $description = "";
    $date_created = getCurrentTime();

    if ($activity_type == 1) {
        $title = $account_username. " viewed order " . $order_number;
        $description = $account_username. " viewed order " . $order_number . " with order ID: ". $order_id . " on " . getReadableDateTime();
    }
    if ($activity_type == 2) {
        $title = $account_username. " edited order " . $order_number;
        $description = $account_username. " edited order " . $order_number . " with order ID: ". $order_id . " on " . getReadableDateTime();
    }
    if ($activity_type == 3) {
        //ability for admin to recover?
        $title = $account_username. " deleted order " . $order_number;
        $description = $account_username. " deleted order " . $order_number . " with order ID: ". $order_id . " on " . getReadableDateTime();
    }

    //with the following...


    $sql = "INSERT INTO activity (id, activity_id, activity_type, order_id, activity_title, activity_description, activity_date, account_id)
        VALUES(null, '$activity_id', '$activity_type', '$order_id', '$title', '$description', '$date_created', '$account_id')";

    if (mysqli_query($connection, $sql)) {
        return true;
    } else {
        return false;
    }

}