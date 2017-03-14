<?php

if (isset($_POST['date_order'])) {

    if (empty($_POST['date_order'])) {
        $_SESSION['errors'] = true;
    } else {
        $order_id = getUniqueID();
        $order_number = $saved_settings['order_prefix'] . "-" . $_POST['order_number'];
        $order_type = $_POST['order_type'];
        $date_order = $_POST['date_order'];
        $date_created = getCurrentTime();
        $client_name = $_POST['client'];
        $client_email = $_POST['email'];
        $description = $_POST['description'];
        $deadline = $_POST['deadline'];
        $product = $_POST['product'];
        $cost_per = $_POST['cost_per'];

        $date = date("n/j/Y");

        $values = [];

        if (isset($_POST['product'])) {

            foreach ($_POST['product'] as $product) {

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
                $product_id = getUniqueID();

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

        if ($connection->connect_error) {
            die('Connection failed: ' . $connection->connect_error);
        }

        $sql = "INSERT INTO orders (id, order_id, order_number, order_type, date_created, date_order,  client, email, description, deadline, products,
             submitted_task, paid_invoice_task, sent_invoice_task, received_task)
                        VALUES (null, '$order_id', '$order_number', '$order_type', '$date_created', '$date_order', '$client_name', '$client_email', '$description', '$deadline',
                           '$products', '$submitted_task', '$paid_invoice_task', '$sent_invoice_task', '$received_task')";
        if (mysqli_query($connection, $sql)) {

            //stores log of activity
            orderActivity($order_id, $order_number, 4);

            $_SESSION['created_order'] = true;
            header('location: ' . $base_dir . '/orders/all');
            exit;
        } else {
            echo 'failed';
        }
//            $connection->close();
    }
}
