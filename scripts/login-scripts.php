<?php


if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    $username = stripslashes($username);
    $password = stripslashes($password);
    $username = $connection->real_escape_string($username);
    $password = $connection->real_escape_string($password);

    $query = "SELECT * FROM accounts WHERE username='$username'";
    $check_sql = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($check_sql);
    $current_password = $row['password'];

    if (password_verify($password, $current_password)) {
        $_SESSION['logged_user'] = $username; // Initializing Session
        $date = date("m-d-Y g:i:s A");
        $computer_session = substr(md5(microtime()), rand(0, 26), 20);
        $_SESSION['computer_session'] = $computer_session;
        $last_sql = "UPDATE accounts
            SET last_login='$date', computer_session='$computer_session'
            WHERE username='$username'";

        if (mysqli_query($connection, $last_sql)) {
            // $_SESSION['welcome'] = true;
            header("location: ./orders");
        }

    } else {
        //goes to login, shows invalid password error msg
        $_SESSION['err'] = "invalid";
        header("location: " . $_SERVER['REQUEST_URI']);
        exit;
    }
}


//$connection->close(); // Closing Connection when necessary (http://php.net/manual/en/function.mysql-close.php)