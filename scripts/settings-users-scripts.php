<?php

if ($user['account_type'] == 1) { //verifies user is admin


    //gets all users
    $query = "SELECT * FROM accounts WHERE deleted != 1 ";
    $result = mysqli_query($connection, $query);


} else {
    //todo send user to homepage, create session user is not authorized

}


