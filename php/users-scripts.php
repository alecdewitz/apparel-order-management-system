<?php

if ($user['account_type'] == 1) { //verifies user is admin


//gets all users
    $query = "SELECT * FROM accounts WHERE deleted != 1 ";
    $result = mysqli_query($connection, $query);


    if (isset($_POST['action'])) {


        // Add User Script
        if ($_POST['action'] == "createuser") {

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

                $sql = "INSERT INTO accounts (account_id, account_type, username, password, email, fullname, account_date_created)
                        VALUES (null, '$type', '$username', '$hash', '$email', '$fullname', '$date')";
                if (mysqli_query($connection, $sql)) {
                    $_SESSION['created_account'] = true;
                    //mysqli_close($connection);
                    // $_SESSION['created_account_email'] = true;
                    $success = true;
                } else {
                    $success = false;
                }
                $connection->close();
            }

        }
        // END Add User Script

        // Delete user script
        else if ($_POST['action'] == "deleteuser") {

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
                $connection->close();
                //}

            }



        }
        // END Delte user script

        header('Content-Type: application/json');
        $arr = array('success' => $success, 'action' => $_POST['action'], 'c' => 3, 'd' => 4, 'e' => 5); //todo add failed form inputs, output to form
        echo json_encode($arr);
        exit();

    }

} else {
    //todo send user to homepage, create session user is not authorized

}


