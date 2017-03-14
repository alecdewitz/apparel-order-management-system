<?php

//todo verify user is authorized to see orders
//todo cleanup code

$order_id = $params[2];
$query = "SELECT * FROM orders WHERE order_id = '$order_id' AND deleted != 1";

//runs sql queries
$result = mysqli_query($connection, $query);
$stats_result = mysqli_query($connection, $query);
//closes connection
//$connection->close();



if (isset($_GET['order_id']) && isset($_GET['delete']) && $_GET['delete'] == 'true') {
    $date = date("n/j/Y"); //TODO add time as well
    $sql = "UPDATE orders SET deleted_date = '$date', deleted = 1 WHERE order_id = " . $_GET['order_id'];
    if (mysqli_query($connection, $sql)) {
        $_SESSION['order_id_deleted'] = $_GET['order_id'];
//        if (isset($_GET['return_to'])) {
//            header('location: ./view-order?order_id='.$_GET["order_id"].'&order_updated=true');
//        } else {
        header('location: ./orders?order_deleted=true');
//        }
    } else {
        echo 'failed';
    }
}

if (isset($_GET['task']) && isset($_GET['order_id'])) {
    $task = $_GET['task'];
    $date = date("n/j/Y");

    if ($task == 'submitted') {
        $sql = "UPDATE orders SET submitted_task = '$date' WHERE order_id = " . $_GET['order_id'];
    } else if ($task == 'sent') {
        $sql = "UPDATE orders SET sent_invoice_task = '$date' WHERE order_id = " . $_GET['order_id'];
    } else if ($task == 'paid') {
        $sql = "UPDATE orders SET paid_invoice_task = '$date' WHERE order_id = " . $_GET['order_id'];
    } else if ($task == 'received') {
        $sql = "UPDATE orders SET received_task = '$date' WHERE order_id = " . $_GET['order_id'];
    }
    if (isset($sql) && mysqli_query($connection, $sql)) {
        $_SESSION['order_id_updated'] = $_GET['order_id'];
        // mysqli_close($connection);
        if (isset($_GET['return_to'])) {
            header('location: ./view-order?order_id=' . $_GET["order_id"] . '&order_updated=true');
        } else {
            header('location: ./orders?order_updated=true');
        }
    } else {
        echo 'failed';
    }


}

if (isset($_POST['date_order'])) {

    if (empty($_POST['date_order'])) {
        $_SESSION['errors'] = true;
    } else {
        $order_number = $saved_settings['order_prefix'] . "-" . $_POST['order_number'];
        $date_order = $_POST['date_order'];
        $client_name = $_POST['client'];
        $client_email = $_POST['email'];
        $description = $_POST['description'];
        $deadline = $_POST['deadline'];

        $date = date("n/j/Y");
        $values = [];

        if ( isset( $_POST['product'] ) ) {

            foreach ( $_POST['product'] as $product ) {

                $product_name = $product['name'];
                $small = (int)$product['s'];
                $medium = (int)$product['m'];
                $large = (int)$product['l'];
                $xlarge = (int)$product['xl'];
                $xxlarge = (int)$product['xxl'];
                $xxxlarge = (int)$product['xxxl'];
                $onesize = (int)$product['onesize'];
                $revenue = (float)$product['revenue'];
                $expense = (float)$product['expense'];
                $product_id = $product['product_id'];
                if (!$product_id) $product_id = getUniqueID();

                $values[] = array(
                    'name' => $product_name,
                    'small' => $small,
                    'medium' => $medium,
                    'large' => $large,
                    'xlarge' => $xlarge,
                    'xxlarge' => $xxlarge, // +$1.50
                    'xxxlarge' => $xxxlarge, // +$3.00
                    'onesize' => $onesize,
                    'revenue' => $revenue,
                    'expense' => $expense,
                    'date_added' => $date,
                    'product_id' => $product_id
                );


            }
        }


        //encode to json
        $products = json_encode($values);

        $submitted_task = $_POST['submitted_task'];
        $paid_invoice_task = $_POST['paid_invoice_task'];
        $sent_invoice_task = $_POST['sent_invoice_task'];
        $received_task = $_POST['received_task'];

        //gets id from browser
        $order_id = $params[2];

        if ($connection->connect_error) {
            die('Connection failed: ' . $connection->connect_error);
        }

        $sql = "UPDATE orders SET order_number = '$order_number', date_order = '$date_order', client = '$client_name',
            email = '$client_email', description = '$description', deadline = '$deadline', products = '$products', submitted_task = '$submitted_task', 
            paid_invoice_task = '$paid_invoice_task', sent_invoice_task = '$sent_invoice_task', received_task = '$received_task' 
            WHERE order_id = '$order_id'";
        if (mysqli_query($connection, $sql)) {

            orderActivity("Order " . $order_id . " edited.", $order_id);

            $_SESSION['order_id_updated'] = $order_id;
            // mysqli_close($connection);
            header('location: '.$base_dir.'/orders/all');
            exit;

        } else {
            echo 'failed to save';
        }
//        $connection->close();
    }
}
