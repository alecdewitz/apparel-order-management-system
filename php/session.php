<?php
session_start();

//If not logged in
if(!isset($_SESSION['logged_user'])){
    setcookie("login_required", "true", time() + (10), "/");
    header('Location: ./');
}

require('php/connection.php');

$user_check=$_SESSION['logged_user'];
$query_ses = "SELECT * FROM accounts WHERE username='$user_check'";
$ses_sql= mysqli_query($connection, $query_ses);
$logged_user = mysqli_fetch_assoc($ses_sql);
if ($logged_user['computer_session'] != $_SESSION['computer_session']) {
  header('Location: ./logout?multiple-sessions=true');
}
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


?>
