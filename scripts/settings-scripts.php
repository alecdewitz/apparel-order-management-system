<?php

//echo isAdmin($user);


//gets order progress tasks
if (strpos($_SERVER['PHP_SELF'], 'settings-progress.php')) {
    $sql = "SELECT * FROM settings_progress WHERE deleted != 1 ";

    if (!($result = mysqli_query($connection, $sql))) {
        echo $connection->error;
    }
//    $connection->close();
}





if (isset($_GET['action'])) {

    if ($_GET['action'] == "addprogress")

        if ($connection->connect_error) {
            die('Connection failed: ' . $connection->connect_error);
        }
//    $progress_name = $_POST['progress_name'];
    $progress_name = 'hey';

    $sql = "INSERT INTO settings_progress (progress_id, progress_order, progress_name, date_added)
              VALUES (null, (SELECT MAX('progress_order')), '$progress_name', '$date')";

//    $sql = "INSERT INTO settings_progress SET progress_id = null, progress_order = (SELECT MAX(progress_order) FROM settings_progress)";
    if (mysqli_query($connection, $sql)) {
        // mysqli_close($connection);
        echo true;
    } else {
        echo $connection->error;
    }
//    $connection->close();


}




//gets all users
//    $query = "SELECT * FROM settings_progress WHERE deleted != 1";
//    $result = mysqli_query($connection, $query);



