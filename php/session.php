<?php
session_start();

//if not logged in
if(!isset($_SESSION['logged_user'])){
    setcookie("login_required", "true", time() + (10), "/");
    header('Location: ./');
}

require('./php/connection.php');

//gets logged in user information
$user_in_session = $_SESSION['logged_user'];
$account_query_sql = "SELECT * FROM accounts WHERE username='$user_in_session'";
$account_query = mysqli_query($connection, $account_query_sql);
$user = mysqli_fetch_assoc($account_query);

//checks if user is logged in from one location only, otherwise logs out
if ($user['computer_session'] != $_SESSION['computer_session']) {
  header('Location: ./logout?multiple-sessions=true');
}

//gets settings to output on page
$settings_query_sql = "SELECT * FROM settings";
$settings_query = mysqli_query($connection, $settings_query_sql);
$settings = mysqli_fetch_assoc($settings_query);





$connection->close();

//login information


//contacts
// $query_int = "SELECT * FROM interviews WHERE userid='$login_session_id' AND deleted=0";
// $query_interviewers = $connection->query($query_int);
// $num_rows = $query_interviewers->num_rows;
// $int_sql= mysqli_query($connection, $query_int);
//$row = mysqli_fetch_assoc($int_sql);
/*
$interviewer_userid =$row['userid'];
$interviewer_name =$row['name'];
$interviewer_employer =$row['employer'];
$interviewer_position =$row['position'];
*/

// //users shown if admin
// $query_users = "SELECT id,username,fullname,type FROM accounts";
// $query_users_run = $connection->query($query_users);
// $num_rows_users = $query_users_run->num_rows;
// $users_sql= mysqli_query($connection, $query_users);

