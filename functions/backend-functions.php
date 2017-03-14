<?php


function isPostRequest() {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

function isAdmin($user) {
    return $user['account_type'] == 1;
}

function toDollars($num){
    return "$" . number_format($num, 2, '.', ',');
}

function getUserID($user) {
    return $user['account_id'];
}

function getUserIDNumber($user) {
    return $user['id'];
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

function getUniqueID() {
    return uniqid();
}

function orderActivity($title, $order_id) {
    global $connection;
    global $user;


    $activity_id = getUniqueID();
    $account_id = getUserID($user);
    $date_created = getCurrentTime();
    $description = "";

    $sql = "INSERT INTO activity (id, activity_id, order_id, activity_title, activity_description, activity_date, account_id)
        VALUES(null, '$activity_id', '$order_id', '$title', '$description', '$date_created', '$account_id')";

    if (mysqli_query($connection, $sql)) {
        return true;
    } else {
        return false;
    }



}