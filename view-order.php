<?php
require('./php/session.php');
include('./php/orders-scripts.php');

if ($result->num_rows == 0) {
    $_SESSION['order_not_found'] = true;
    header('Location: ./orders?not_found=true');
} else if (!isset($_GET['order_id'])) {
    header('Location: ./orders?no_order_id=true');
}


include('./php/header.php');

while ($order = mysqli_fetch_assoc($result)) {

    ?>

    <div class="page-content">
        <div class="container">
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="./orders.php?type=all">Order History</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>View Order</span>
                </li>
            </ul>
            <div class="page-content-inner">
                <div class="row">
                    <div class="col-md-12">

                        <div class="portlet light portlet-fit portlet-datatable ">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-settings font-dark"></i>
                                    <span class="caption-subject font-dark sbold uppercase"> Order <?php echo $order['order_number'] ?>
                                        <span class="hidden-xs">| <?php echo $order['date_order'] ?> </span>
                                                            </span>
                                </div>
                                <div class="actions">
                                    <div class="btn-group btn-group-devided" data-toggle="buttons">
                                    </div>
                                    <div class="btn-group">
                                        <a class="btn red btn-outline btn-circle" href="#" data-toggle="dropdown">
                                            <i class="fa fa-pencil"></i>
                                            <span class="hidden-xs"> Options </span>
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li>
                                                <a href="./edit-order.php?order_id=<?php echo $order['order_id'] ?>"> Edit </a>
                                            </li>

                                            <li>
                                                <a href="./edit-order.php?order_id=<?php echo $order['order_id'] ?>&delete=true"> Delete </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="portlet yellow-crusta box">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-cogs"></i>Order Details
                                                        </div>

                                                    </div>
                                                    <div class="portlet-body">
                                                        <div class="row static-info">
                                                            <div class="col-md-5 col-xs-4 name"> Order #:</div>
                                                            <div class="col-md-7 col-xs-8 value"> <?php echo $order['order_number'] ?>
                                                            </div>
                                                        </div>
                                                        <div class="row static-info">
                                                            <div class="col-md-5 col-xs-4 name"> Order Date:</div>
                                                            <div class="col-md-7 col-xs-8 value"> <?php echo $order['date_order'] ?> </div>
                                                        </div>
                                                        <div class="row static-info">
                                                            <div class="col-md-5 col-xs-4 name"> Status:</div>
                                                            <div class="col-md-7 col-xs-8 value">
                                                                <span class="label label-success"> Closed </span>
                                                            </div>
                                                        </div>
                                                        <div class="row static-info">
                                                            <div class="col-md-5 col-xs-4 name"> Client Name:</div>
                                                            <div class="col-md-7 col-xs-8 value"> <?php echo $order['client'] ?> <a href="mailto:<?php echo $order['email']; ?>" class="btn btn-xs btn-default"><i class="fa fa-envelope-o" aria-hidden="true"></i> Email Contact</a></div>
                                                        </div>
                                                        <div class="row static-info">
                                                            <div class="col-md-5 col-xs-4 name"> Description:</div>
                                                            <div class="col-md-7 col-xs-8 value"> <?php echo $order['description'] ?> </div>
                                                        </div>
                                                        <div class="row static-info">
                                                            <div class="col-md-5 col-xs-4 name"> Deadline:</div>
                                                            <div class="col-md-7 col-xs-8 value"> <?php echo $order['deadline'] ?> </div>
                                                        </div>
                                                        <div class="row static-info">
                                                            <div class="col-md-5 col-xs-4 name"> Template to TCT:</div>
                                                            <div class="col-md-7 col-xs-8 alue"><a href="mailto:<?php echo $order['email']; ?>" class="btn btn-xs btn-default"><i class="fa fa-envelope-o" aria-hidden="true"></i> Send Email</a></div>
                                                        </div>
                                                        <div class="row static-info">
                                                            <div class="col-md-5 col-xs-4 name"> Invoice:</div>
                                                            <div class="col-md-7 col-xs-8 value"><a href="" class="btn btn-xs btn-default"><i class="fa fa-money" aria-hidden="true"></i> View Invoice</a></div>
                                                        </div>
                                                        <div class="row static-info">
                                                            <div class="col-md-5 col-xs-4 name"> Attachments:</div>
                                                            <div class="col-md-7 col-xs-8 value"><a href="" class="btn btn-xs btn-default"><i class="fa fa-paperclip" aria-hidden="true"></i> View Attachments</a></div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="portlet green box">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-cogs"></i>Order Progress
                                                        </div>

                                                    </div>
                                                    <div class="portlet-body">
                                                        <div class="row static-info">
                                                            <div class="col-md-5 col-xs-6 name"> Submitted to TCT:</div>
                                                            <div class="col-md-7 col-xs-6 value">
                                                                <?php
                                                                if (!empty($order['submitted_task'])) {
                                                                    ?>
                                                                    <i class="fa fa-check-circle check-done"></i> - <?php echo $order['submitted_task']; ?>
                                                                <?php } else { ?>
                                                                    <a data-toggle="confirmation" class="btn btn-xs btn-default" data-href="./edit-order?order_id=<?php echo $order['order_id'] ?>&task=submitted&return_to=view-order"><i class="fa fa-check-circle-o"></i> Submitted</a>

                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                        <div class="row static-info">
                                                            <div class="col-md-5 col-xs-6 name"> Received T-Shirts:</div>
                                                            <div class="col-md-7 col-xs-6 value"> <?php
                                                                if (!empty($order['submitted_task'])) {
                                                                    ?>
                                                                    <i class="fa fa-check-circle check-done"></i> - <?php echo $order['submitted_task']; ?>
                                                                <?php } else { ?>
                                                                    <a data-toggle="confirmation" class="btn btn-xs btn-default" data-href="./edit-order?order_id=<?php echo $order['order_id'] ?>&task=submitted&return_to=view-order"><i class="fa fa-check-circle-o"></i> Received</a>

                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                        <div class="row static-info">
                                                            <div class="col-md-5 col-xs-6 name"> Paid Invoice:</div>
                                                            <div class="col-md-7 col-xs-6 value">
                                                                <?php
                                                                if (!empty($order['paid_invoice_task'])) {
                                                                    ?>
                                                                    <i class="fa fa-check-circle check-done"></i> - <?php echo $order['paid_invoice_task']; ?>
                                                                <?php } else if (!empty($order['submitted_task'])) { ?>
                                                                    <a data-toggle="confirmation" class="btn btn-xs btn-default" data-href="./edit-order?order_id=<?php echo $order['order_id'] ?>&task=paid&return_to=view-order"><i class="fa fa-check-circle-o"></i> Paid</a>

                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                        <div class="row static-info">
                                                            <div class="col-md-5 col-xs-6 name"> Sent Invoice to Client:</div>
                                                            <div class="col-md-7 col-xs-6 value">
                                                                <?php
                                                                if (!empty($order['sent_invoice_task'])) {
                                                                    ?>
                                                                    <i class="fa fa-check-circle check-done"></i> - <?php echo $order['sent_invoice_task']; ?>
                                                                <?php } else if (!empty($order['paid_invoice_task'])) { ?>
                                                                    <a data-toggle="confirmation" class="btn btn-xs btn-default" data-href="./edit-order?order_id=<?php echo $order['order_id'] ?>&task=sent&return_to=view-order"><i class="fa fa-check-circle-o"></i> Sent Invoice</a>

                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                        <div class="row static-info">
                                                            <div class="col-md-5 col-xs-6 name"> Received Payment:</div>
                                                            <div class="col-md-7 col-xs-6 value">
                                                                <?php
                                                                if (!empty($order['received_task'])) {
                                                                    ?>
                                                                    <i class="fa fa-check-circle check-done"></i> - <?php echo $order['received_task']; ?>
                                                                <?php } else if (!empty($order['sent_invoice_task'])) { ?>
                                                                    <a data-toggle="confirmation" class="btn btn-xs btn-default" data-href="./edit-order?order_id=<?php echo $order['order_id'] ?>&task=received&return_to=view-order"><i class="fa fa-check-circle-o"></i> Received</a>

                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="portlet red box">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-cogs"></i> Cost of Goods
                                                        </div>

                                                    </div>
                                                    <div class="portlet-body">
                                                        <div class="row static-info">
                                                            <div class="col-md-5 col-xs-6 name"> Estimated Cost:</div>
                                                            <div class="col-md-7 col-xs-6 value"> $<?php echo toDollars($order['cost_total']) ?>
                                                            </div>
                                                        </div>
                                                        <div class="row static-info">
                                                            <div class="col-md-5 col-xs-6 name"> Real Cost:</div>
                                                            <div class="col-md-7 col-xs-6 value"> <?php if (isset($order['cost_total_real'])) {
                                                                    echo $order['cost_total_real'];
                                                                } else {
                                                                    echo "?";
                                                                } ?> </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="portlet grey-cascade box">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-cogs"></i>Products
                                                        </div>

                                                    </div>
                                                    <div class="portlet-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-hover table-bordered table-striped">
                                                                <thead>
                                                                <tr>
                                                                    <th> Product</th>
                                                                    <th> Price</th>
                                                                    <th> Quantity</th>
                                                                    <th> Total</th>
                                                                </tr>
                                                                </thead>

                                                                <?php
                                                                $products = json_decode($order['products'], true);
                                                                $order_revenue = 0;
                                                                $order_expense = 0;

                                                                foreach ($products as $product) {

                                                                    $product_name = $product["name"];
                                                                    $small = $product["small"];
                                                                    $medium = $product["medium"];
                                                                    $large = $product["large"];
                                                                    $xlarge = $product["xlarge"];
                                                                    $xxlarge = $product["xxlarge"];
                                                                    $xxxlarge = $product["xxxlarge"];
                                                                    $onesize = $product["onesize"];
                                                                    $revenue = $product["revenue"];
                                                                    $expense = $product["expense"];
                                                                    $revenue = $revenue - ($xxlarge * 1.50) + ($xxxlarge * 3.00);
                                                                    $quantity_total = $small + $medium + $large + $xlarge + $xxlarge + $xxxlarge;
                                                                    $price_each = $revenue / $quantity_total;

                                                                    //todo later on
                                                                    if ($revenue == 0) {
                                                                        $price_each = 0;
                                                                    }

                                                                    //calculates total order revenue and expense
                                                                    $order_revenue = $order_revenue + $revenue;
                                                                    $order_expense = $order_expense + $expense;




                                                                    ?>
                                                                    <tbody>
                                                                    <tr>
                                                                        <td><b><?php echo $product_name; ?></b></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>


                                                                    <?php if ($onesize == 0) { ?>

                                                                        <tr>
                                                                            <td class="product-sizes-tr">Small</td>
                                                                            <td> <?php echo toDollars($price_each); ?> </td>
                                                                            <td> <?php echo $small; ?> </td>
                                                                            <td> <?php echo toDollars($price_each * $small) ?> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="product-sizes-tr">Medium</td>
                                                                            <td> <?php echo toDollars($price_each); ?> </td>
                                                                            <td> <?php echo $medium; ?> </td>
                                                                            <td> <?php echo toDollars($price_each * $medium) ?> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="product-sizes-tr">Large</td>
                                                                            <td> <?php echo toDollars($price_each); ?> </td>
                                                                            <td> <?php echo $large; ?> </td>
                                                                            <td> <?php echo toDollars($price_each * $large) ?> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="product-sizes-tr">X-Large</td>
                                                                            <td> <?php echo toDollars($price_each); ?> </td>
                                                                            <td> <?php echo $xlarge; ?> </td>
                                                                            <td> <?php echo toDollars($price_each * $xlarge) ?> </td>
                                                                        </tr>

                                                                        <?php if ($xxlarge > 0 || $xxxlarge > 0) { ?>
                                                                            <tr>
                                                                                <td class="product-sizes-tr">XX-Large</td>
                                                                                <td> <?php echo toDollars($price_each + 1.50); ?> </td>
                                                                                <td> <?php echo $xxlarge; ?> </td>
                                                                                <td> <?php echo toDollars(($price_each + 1.50) * $xxlarge) ?> </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="product-sizes-tr">XXX-Large</td>
                                                                                <td> <?php echo toDollars($price_each + 3.00); ?> </td>
                                                                                <td> <?php echo $xxxlarge; ?> </td>
                                                                                <td> <?php echo toDollars(($price_each + 3.00) * $xxxlarge) ?> </td>
                                                                            </tr>
                                                                        <?php } ?>

                                                                    <?php } else if ($onesize > 0) { ?>
                                                                        <tr>
                                                                            <td class="product-sizes-tr">One Size</td>
                                                                            <td> $<?php echo toDollars(preg_replace("/[^0-9.]/", "", $order['cost_per']) + 3); ?> </td>
                                                                            <td> <?php echo $onesize; ?> </td>
                                                                            <td> $<?php echo toDollars($onesize) ?> </td>
                                                                        </tr>
                                                                    <?php } ?>


                                                                    </tbody>

                                                                <?php } ?>


                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6"></div>
                                            <div class="col-md-6">
                                                <div class="well">
                                                    <div class="row static-info align-reverse">
                                                        <div class="col-md-8 name"> Total:</div>
                                                        <div class="col-md-3 value"> <?php echo toDollars($order_revenue); ?> </div>
                                                    </div>
                                                    <div class="row static-info align-reverse">
                                                        <div class="col-md-8 name"> Expenses:</div>
                                                        <div class="col-md-3 value"> <?php echo toDollars($order_expense); ?>
                                                        </div>
                                                    </div>
                                                    <div class="row static-info align-reverse">
                                                        <div class="col-md-8 name"> Profit:</div>
                                                        <div class="col-md-3 value"> <?php echo toDollars($order_revenue - $order_expense); ?> </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .table-bordered tbody tr td.product-sizes-tr {
            padding-left: 30px;
        }
    </style>

<?php }
include('./php/footer.php'); ?>

