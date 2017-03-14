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

function sanitizeHTML($html){
    return htmlspecialchars($html);
}

function sanitizeSQL($sql){
    global $connection;
    $sql = stripslashes($sql);
    return mysqli_real_escape_string($connection, $sql);
}


//gets order information, even deleted?
function getOrderByID($order_id) {
    global $connection;

    $sql = "SELECT * FROM orders WHERE order_id = '$order_id'";
    $err = false;

    if ($result = mysqli_query($connection, $sql)) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    } else {
        $err = $connection->error;
    }
    return $err;
}



// Stores activity to databse for notifications
//activity_type
// 1 = get
// 2 = edit
// 3 = delete
// 4 = create
//
//eventually show specific changes (changed name to X)
function orderActivity($order_id, $order_number, $activity_type) {
    global $connection;

    $activity_id = getUniqueID();
    $account_id = getUserID();
    $account_username = getUsername();
    $title = $account_username;
    $description = $account_username;
    $date_created = getCurrentTime();

    switch($activity_type) {
        case 1:
            $title.= " viewed order ";
            $description.= " viewed order ";
            break;
        case 2:
            $title.= " edited order ";
            $description.= " edited order ";
            break;
        case 3:
            $title.= " deleted order ";
            $description.= " deleted order ";
            break;
        case 4:
            $title.= " created order ";
            $description.= " created order ";
            break;
    }

    $title.= $order_number;
    $description.= $order_number . " with order ID: ". $order_id . " on " . getReadableDateTime();


    $sql = "INSERT INTO activity (id, activity_id, activity_type, order_id, activity_title, activity_description, activity_date, account_id)
        VALUES(null, '$activity_id', '$activity_type', '$order_id', '$title', '$description', '$date_created', '$account_id')";

    if (mysqli_query($connection, $sql)) {
        return true;
    } else {
        return false;
    }

}