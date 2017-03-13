<?php

if($params[1] == "multiple-sessions"){
  if(session_destroy()) {
      session_start();
      $_SESSION['err'] = "multiple_sessions";
      header("Location: " . $base_dir . "/login");         //?multiple_sessions=true&logged_out=true");
      exit();
  }
}

//gets user ID of logged in
$account_id = $user['account_id'];

//fix this because it doesnt work damnit
if(session_destroy()) {
//    clears computer_session after logout
    $sql = "UPDATE accounts SET computer_session = '' WHERE account_id = '" . $account_id . "'";
    if (mysqli_query($connection, $sql)) {
        header("Location: " . $base_dir . "/login");        //?logged_out=true");
        exit;
    } else {
        echo $connection->error;
    }
}