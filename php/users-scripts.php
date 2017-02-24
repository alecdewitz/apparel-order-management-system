<?php
include 'php/connection.php';

$query = "SELECT * FROM accounts WHERE deleted != 1 ";
$result = mysqli_query($connection, $query);





