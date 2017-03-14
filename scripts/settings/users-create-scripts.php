<?php

//add user script
if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['fullname']) || empty($_POST['email']) || empty($_POST['type'])) {
    $error = "Information is not filled out completely";
    $success = false;
} else {
    $username = strtolower($_POST['username']);
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $type = $_POST['type'];

    //todo add verify password?
    //if ($password != $password_verify) {
    //    $error = "Passwords do not match";
    //} else {

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    $username = stripslashes($username);
    $password = stripslashes($password);
    $username = $connection->real_escape_string($username);
    $password = $connection->real_escape_string($password);
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $date = $date = date("m-d-Y g:i:s A");
    $account_id = getUniqueID();

    $sql = "INSERT INTO accounts (account_id, account_type, username, password, email, fullname, account_date_created)
                        VALUES ('$account_id', '$type', '$username', '$hash', '$email', '$fullname', '$date')";
    if (mysqli_query($connection, $sql)) {
        $_SESSION['created_account'] = true;
        //mysqli_close($connection);
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
    $arr = array('success' => $success, 'email' => $user['email'], 'name' => $user['fullname'],
        'username' => $user['username'], 'type' => $user['account_type'], 'err' => $connection->error);
}
//todo add failed form inputs, output to form
echo json_encode($arr);
