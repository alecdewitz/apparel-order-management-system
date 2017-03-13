<?php


//todo verify user is authorized to see orders


$order_id = $params[2];
$query = "SELECT * FROM orders WHERE order_id = '$order_id' AND deleted != 1";

//runs sql queries
$result = mysqli_query($connection, $query);
$stats_result = mysqli_query($connection, $query);
//closes connection
//$connection->close();


