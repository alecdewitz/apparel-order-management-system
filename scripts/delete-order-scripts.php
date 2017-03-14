<?php

//todo verify user is authorized to see orders

if (isset($params[2])) {

    $order_id = stripslashes($params[2]);


    $date = getCurrentTime();


    $sql = "UPDATE orders SET deleted_date = '$date', deleted = 1 WHERE order_id = '$order_id' AND deleted != 1";
    if (mysqli_query($connection, $sql)) {
        $_SESSION['order_deleted'] = $order_id;
        header("location: " . $base_dir . "/orders/all");
        exit;
    } else {
        echo 'failed';
    }


} else {
    $_SESSION['order_not_found'];
    header("location: " . $base_dir . "/orders/all");
    exit;
}
