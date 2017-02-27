<?php

if ($user['account_type'] == 1) { //verifies user is admin


    if (isset($_POST['action'])) {

        // Get User By ID
        if ($_POST['action'] == "getuser") {
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
        }
        //END Get User By ID



        // Add User Script
        else if ($_POST['action'] == "createuser") {

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



        // Edit user script
        else if ($_POST['action'] == "edituser") {
            if (empty($_POST['account_id']) || empty($_POST['account_fullname']) || empty($_POST['account_email']) || !isset($_POST['account_type'])) {
                $error = "Information is not filled out completely";
                $success = false;
            } else {
                $fullname = $_POST['account_fullname'];
                $email = $_POST['account_email'];
                $type = $_POST['account_type'];

                $sql = "UPDATE accounts SET fullname = '$fullname', email = '$email', account_type = '$type' WHERE account_id = " . $_POST['account_id'] ;
                if (mysqli_query($connection, $sql)) {
                    $_SESSION['edit_account'] = true; // change to account username to show alert?

                    // $_SESSION['created_account_email'] = true;
                    $success = true;
                } else {
                    $success = false;
                }
                $connection->close();
            }
        }
        // END Edit user script




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
            }
        }
        // END Delete user script


        header('Content-Type: application/json');
        if ($error) {
            $arr = array('success' => false, 'error' => $error);
        }else {
            $arr = array('success' => $success, 'action' => $_POST['action'], 'email' => $user['email'], 'name' => $user['fullname'], 'username' => $user['username'], 'type' => $user['account_type']);
        }
        //todo add failed form inputs, output to form
        echo json_encode($arr);
        exit();

    }


    //gets all users
    $query = "SELECT * FROM accounts WHERE deleted != 1 ";
    $result = mysqli_query($connection, $query);




} else {
    //todo send user to homepage, create session user is not authorized

}


