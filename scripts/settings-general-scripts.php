<?php

//update settings
if (isset($_POST['company_name']) && isset($_POST['company_slogan']) && isset($_POST['calendar_start']) && isset($_POST['calendar_end']) && isset($_POST['order_prefix'])) {

    $company_name = $_POST['company_name'];
    $company_slogan = $_POST['company_slogan'];
    $calendar_start = $_POST['calendar_start'];
    $calendar_end = $_POST['calendar_end'];
    $order_prefix = $_POST['order_prefix'];

    $sql = "UPDATE settings SET company_name = '$company_name', company_slogan = '$company_slogan', year_start = '$calendar_start', 
          year_end = '$calendar_end', order_prefix = '$order_prefix' WHERE admin_userid = " . getUserID($user);

    if (mysqli_query($connection, $sql)) {
//            echo $connection->error;

        // $_SESSION['created_account_email'] = true;
         $_SESSION['account_settings_updated'] = true;
        header("location: ".$base_dir."/settings/general");
        exit;
    } else {
        echo "failed";
    }
//    $connection->close();
}