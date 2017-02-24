<?php
include 'php/connection.php';

$query = "SELECT * FROM orders WHERE deleted != 1 ";
$stats_query = "SELECT cost_total, revenue FROM orders WHERE deleted != 1";
$client = "client";


if (isset($_GET['order_id']) && (strpos($_SERVER['PHP_SELF'], 'view-order.php') || strpos($_SERVER['PHP_SELF'], 'edit-order.php'))) {
  $order_id = $_GET['order_id'];
  $query = $query. " AND order_id = $order_id AND deleted != 1";

} else if (strpos($_SERVER['PHP_SELF'], 'orders.php')) {
    $query = $query . " AND order_type = '".$client."'";
}

$result = mysqli_query($connection, $query);

$stats_result = mysqli_query($connection, $query);

$total_costs = 0;
$total_revenue = 0;
while ($stats_row = mysqli_fetch_assoc($stats_result)) {
  $total_revenue = $total_revenue + preg_replace("/[^0-9.]/","",$stats_row['revenue']); //Outputs in number format
  $total_costs = $total_costs + preg_replace("/[^0-9.]/","",$stats_row['cost_total']);
}
$total_profit = $total_revenue - $total_costs;
$total_revenue = number_format($total_revenue, 2, '.', ','); //Outputs in number comma format
$total_costs = number_format($total_costs, 2, '.', ',');
$total_profit = number_format($total_profit, 2, '.', ',');

$num_sales = $stats_result->num_rows;




