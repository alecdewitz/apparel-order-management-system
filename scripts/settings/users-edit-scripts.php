<?php


if (empty($_POST['account_id']) || empty($_POST['account_fullname']) || empty($_POST['account_email']) || !isset($_POST['account_type'])) {
    $error = "Information is not filled out completely";
    $success = false;
} else {
    $fullname = $_POST['account_fullname'];
    $email = $_POST['account_email'];
    $type = $_POST['account_type'];
    $account_id = $_POST['account_id'];

    $sql = "UPDATE accounts SET fullname = '$fullname', email = '$email', account_type = '$type' WHERE account_id = '$account_id'";
    if (mysqli_query($connection, $sql)) {
        $_SESSION['edit_account'] = true; // change to account username to show alert?

        // $_SESSION['created_account_email'] = true;
        $success = true;
    } else {
        $success = false;
    }
//    $connection->close();
}


header('Content-Type: application/json');
if ($error) {
    $arr = array('success' => false, 'error' => $error);
} else {
    $arr = array('success' => $success, 'email' => $user['email'], 'name' => $user['fullname'],
        'username' => $user['username'], 'type' => $user['account_type'], 'err' => $connection->error );
}
//todo add failed form inputs, output to form
echo json_encode($arr);