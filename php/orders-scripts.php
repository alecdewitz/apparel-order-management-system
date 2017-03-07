<?php
include 'php/connection.php';

//todo verify user is authorized to see orders


$query = "SELECT * FROM orders WHERE deleted != 1 ";
$type_client = 1;
$type_retail = 2;

//Orders page scripts
if (strpos($_SERVER['PHP_SELF'], 'orders.php') && isset($_GET['type'])) {

    if ($_GET['type'] == "all") {
        $stats_query = "SELECT cost_total, revenue FROM orders WHERE deleted != 1";

    } else if ($_GET['type'] == "client") {
        $query = $query . " AND order_type = '".$type_client."'";

    } else if ($_GET['type'] == "retail") {
        $query = $query . " AND order_type = '".$type_retail."'";

    }


}
//End orders page scripts




//Order page scripts

//Checks if on view or edit order page
if ((strpos($_SERVER['PHP_SELF'], 'view-order.php') || strpos($_SERVER['PHP_SELF'], 'edit-order.php')) && isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    $query = $query . " AND order_id = $order_id AND deleted != 1";

}


//End order page scripts

//runs sql queries
$result = mysqli_query($connection, $query);
$stats_result = mysqli_query($connection, $query);
//closes connection
$connection->close();



// Scripts

function getTotalPrice($quantity, $pricePer) {

}



//




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




