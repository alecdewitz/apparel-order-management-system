<?php


//update settings
if (isset($_POST['account_id']) && isset($_POST['old_password']) && isset($_POST['new_password'])
    && isset($_POST['verify_password'])) {

    $account_id = $_POST['account_id'];
    $old_password = stripslashes($_POST['old_password']);
    $new_password = stripslashes($_POST['new_password']);
    $verify_password = stripslashes($_POST['verify_password']);

    if ($account_id != getUserID($user)) {
        $_SESSION['invalid_account_id'] = true;
        header("location: " . $base_dir . "/settings/password");
        exit;
    }

    //check if password is 8 characters long and has 1 number, 1 alpha
    //todo



    //check if new password and verify password are the same
    if ($new_password == $verify_password) {

        $query = "SELECT * FROM accounts WHERE account_id='" . getUserID($user) . "'";
        $check_sql = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($check_sql);
        $current_password = $row['password'];

        if (password_verify($old_password, $current_password)) {

            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }

            $old_password = $connection->real_escape_string($old_password);
            $new_password = $connection->real_escape_string($new_password);
            $verify_password = $connection->real_escape_string($verify_password);
            $hash_password = password_hash($new_password, PASSWORD_DEFAULT);


            $sql = "UPDATE accounts SET password = '$hash_password' WHERE account_id = '" . getUserID($user) . "'";


            if (mysqli_query($connection, $sql)) {
//            echo $connection->error;

                // $_SESSION['created_account_email'] = true;
                $_SESSION['account_password_updated'] = true;
                header("location: " . $base_dir . "/settings/password");
                exit;
            } else {
                echo "failed";
            }
//    $connection->close();
        } else {
            $_SESSION['incorrect_current_password'] = true;
            header("location: " . $base_dir . "/settings/password");
            exit;
        }


    } else {
        //if passwords do not match
        $_SESSION['invalid_password_verify'] = true;
        header("location: " . $base_dir . "/settings/password");
        exit;
    }
} else {
    $err = "Not all inputs submitted";
    echo $err;
}