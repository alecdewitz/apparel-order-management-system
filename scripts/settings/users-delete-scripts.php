<?php


if (empty($_POST['account_id']) || empty($_POST['account_username'])) {
    $error = "Information is not filled out completely";
    $success = false;
} else {
    $date = date("m-d-Y g:i:s A");
    $sql = "UPDATE accounts SET deleted = 1, date_deleted = '$date' WHERE account_id = " . $_POST['account_id'] . " AND username = '" . $_POST['account_username'] . "'";
    if (mysqli_query($connection, $sql)) {
        $_SESSION['deleted_account'] = true; // change to account username to show alert?

        // $_SESSION['created_account_email'] = true;
        $success = true;
    } else {
        $success = false;
    }
//        $connection->close();
}


header('Content-Type: application/json');
if ($error) {
    $arr = array('success' => false, 'error' => $error);
} else {
    $arr = array('success' => $success, 'action' => $_POST['action'], 'email' => $user['email'], 'name' => $user['fullname'], 'username' => $user['username'], 'type' => $user['account_type']);
}

//todo add failed form inputs, output to form
echo json_encode($arr);