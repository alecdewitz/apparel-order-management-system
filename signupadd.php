<?php
session_start();
include('php/connection.php');
$error = '';
$success = '';

if (isset($_POST['submit'])) {
    $enrollment = $_POST['enrollment'];

    if ($enrollment != "entrepreneurs") {
        $error = "Enrollment key is invalid.";
    } else {


        if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['password_verify'])
            || empty($_POST['fullname']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['enrollment'])
        ) {
            $error = "Information is not filled out completely";
        } else {
            $fullname = $_POST['fullname'];
            $username = strtolower($_POST['username']);
            $password = $_POST['password'];
            $password_verify = $_POST['password_verify'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];

            if ($password != $password_verify) {
                $error = "Passwords do not match";
            } else {

                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }
                $username = stripslashes($username);
                $password = stripslashes($password);
                $username = $connection->real_escape_string($username);
                $password = $connection->real_escape_string($password);
                $hash = password_hash($password, PASSWORD_DEFAULT);

                $sql = "INSERT INTO accounts (account_id, fullname, username, password, email, cellphone)
                        VALUES (null, '$fullname', '$username', '$hash', '$email', '$phone')";
                if (mysqli_query($connection, $sql)) {
                    $_SESSION['created_account'] = true;
                    //mysqli_close($connection);

                    $_SESSION['created_account_email'] = true;
                    header("location: /");

                } else {
                  echo "failed";
                }
                $connection->close();
            }

        }
    }
}
?>
