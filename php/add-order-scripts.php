<?php
include './php/connection.php';

$error = '';
$success = '';

if (isset($_POST['date_order'])) {

        if (empty($_POST['date_order'])) {
            $_SESSION['errors'] = true;
        } else {
            $order_type = $_POST['order_type'];
            $order_number = $_POST['order_number'];
            $date_order = $_POST['date_order'];
            $client_name = $_POST['client'];
            $client_email = $_POST['email'];
            $description = $_POST['description'];
            $deadline = $_POST['deadline'];
            $product = $_POST['product'];
            $cost_per = $_POST['cost_per'];

            $small = $_POST['s'];
            $medium = $_POST['m'];
            $large = $_POST['l'];
            $xlarge = $_POST['xl'];
            $xxlarge = $_POST['xxl']; // +$1.50
            $xxxlarge = $_POST['xxxl']; // +$3.00

            $cost_total = $_POST['cost_total'];
            $revenue = $_POST['revenue'];
            $submitted_task = $_POST['submitted_task'];
            $paid_invoice_task = $_POST['paid_invoice_task'];
            $sent_invoice_task = $_POST['sent_invoice_task'];
            $received_task = $_POST['received_task'];

            if ($connection->connect_error) {
                die('Connection failed: '.$connection->connect_error);
            }

            $sql = "INSERT INTO orders (order_id, order_number, order_type, date_order, client, email, description, deadline, product,
            cost_per, s, m, l, xl, xxl, xxxl, cost_total, revenue, submitted_task, paid_invoice_task, sent_invoice_task, received_task)
                        VALUES (null, '$order_number', '$order_type', '$date_order', '$client_name', '$client_email', '$description', '$deadline',
                           '$product', '$cost_per', '$small', '$medium', '$large', '$xlarge', '$xxlarge', '$xxxlarge', '$cost_total',
                           '$revenue', '$submitted_task', '$paid_invoice_task', '$sent_invoice_task', '$received_task')";
            if (mysqli_query($connection, $sql)) {
                  $_SESSION['created_order'] = true;
                  // mysqli_close($connection);
                header('location: orders.php?type=all');
            } else {
                echo 'failed';
            }
            $connection->close();
        }
}
