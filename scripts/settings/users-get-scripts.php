<?php


if (empty($_POST['account_id'])) {
    $error = "Information is not filled out completely";
    $success = false;
} else {
    $account_id = $_POST['account_id'];

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    $sql = "SELECT * FROM accounts WHERE account_id = '$account_id'";
    if (mysqli_query($connection, $sql)) {
//                    $_SESSION['created_account'] = true;

        $success = true;
    } else {
        $success = false;
    }
    $result = mysqli_query($connection, $sql);
    $user = mysqli_fetch_assoc($result);
    $connection->close();

}

header('Content-Type: application/json');
if ($error) {
    $arr = array('success' => false, 'error' => $error);
} else {
    $arr = array('success' => $success, 'action' => $_POST['action'], 'email' => $user['email'], 'name' => $user['fullname'], 'username' => $user['username'], 'type' => $user['account_type']);
}
//todo add failed form inputs, output to form
echo json_encode($arr);
