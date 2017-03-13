<div class="page-content">
    <div class="container">


        <ul class="page-breadcrumb breadcrumb">
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <span>All Orders</span>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="<?php echo $base_dir; ?>/orders/client">Client Orders</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="<?php echo $base_dir; ?>/orders/retail">Retail Orders</a>
                </li>
            </ul>
        </ul>

        <div class="page-content-inner">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat blue">
                        <div class="visual">
                            <i class="fa fa-money fa-icon-medium"></i>
                        </div>
                        <div class="details">
                            <div class="number"> $<?php echo $total_revenue; ?> </div>
                            <div class="desc"> Estimated Revenue</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat red">
                        <div class="visual">
                            <i class="fa fa-credit-card"></i>
                        </div>
                        <div class="details">
                            <div class="number"> $<?php echo $total_costs; ?></div>
                            <div class="desc"> Estimated Expenses</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat yellow">
                        <div class="visual">
                            <i class="fa fa-credit-card"></i>
                        </div>
                        <div class="details">
                            <div class="number"> $<?php echo $total_profit; ?></div>
                            <div class="desc"> Estimated Profit</div>
                        </div>
                        <a class="more" href="#"> View more
                            <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat green">
                        <div class="visual">
                            <i class="fa fa-shopping-cart fa-icon-medium"></i>
                        </div>
                        <div class="details">
                            <div class="number"> <?php echo $num_sales; ?> </div>
                            <div class="desc"> Total Orders</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-share font-blue"></i>
                                <span class="caption-subject font-blue bold uppercase">Order History</span>
                            </div>
                            <div class="actions">
                                <div class="btn-group">
                                    <a class="btn btn-primary btn-sm" href="<?php echo $base_dir ?>/orders/add">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                        <span class="hidden-xs"> Add New </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <?php
                            if (isset($_SESSION['created_order'])) {
                                unset($_SESSION['created_order']); ?>
                                <div class="alert alert-info">
                                    <strong>Success!</strong> The order has been added.
                                </div>
                                <?php
                            } elseif (isset($_SESSION['order_not_found'])) {
                                unset($_SESSION['order_not_found']); ?>
                                <div class="alert alert-warning">
                                    Order number not found.
                                </div>
                                <?php
                            } elseif (isset($_SESSION['order_id_updated'])) {
                                ?>
                                <div class="alert alert-info">
                                    <strong>Success!</strong> The order has been edited.
                                </div>
                                <?php
                            } ?>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <th> Order #</th>
                                        <th> Date</th>
                                        <th> Type</th>
                                        <th> Description</th>
                                        <th> Status</th>
                                        <th> Quantity</th>
                                        <th> Revenue</th>
                                        <th> Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    while ($client_order = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <tr <?php if (isset($_SESSION['order_id_updated'])) {
                                            if ($_SESSION['order_id_updated'] == $client_order['order_id']) {
                                                ?>
                                                class="updated-order"
                                                <?php
                                                unset($_SESSION['order_id_updated']);
                                            }
                                        } ?>
                                        >
                                            <td><a class="" href="<?php echo $base_dir; ?>/orders/view/<?php echo $client_order['order_id'] ?>"> <?php echo $client_order['order_number'] ?></a></td>
                                            <td> <?php echo $client_order['date_order'] ?> </td>
                                            <td> <?php if ($client_order['order_type'] == 1) {
                                                    echo "Client";
                                                } else {
                                                    echo "Retail";
                                                } ?> </td>
                                            <td><a class="" href="<?php echo $base_dir; ?>/orders/view/<?php echo $client_order['order_id'] ?>"> <?php if (strlen($client_order['description']) > 20) {
                                                        echo substr($client_order['description'], 0, 20) . "...";
                                                    } else echo $client_order['description']; ?></a></td>
                                            <?php if (empty($client_order['submitted_task'])) { ?>
                                                <td class="order-not-sent"><strong>Not Sent </strong><a data-toggle="confirmation" class="btn btn-xs btn-default" data-href="./edit-order?order_id=<?php echo $client_order['order_id'] ?>&task=submitted"><i class="fa fa-check-circle-o"></i> Submitted</a></td>
                                            <?php } elseif (empty($client_order['paid_invoice_task'])) { ?>
                                                <td class="order-unpaid-invoice"><strong>Unpaid TCT </strong><a data-toggle="confirmation" class="btn btn-xs btn-default" data-href="./edit-order?order_id=<?php echo $client_order['order_id'] ?>&task=paid"><i class="fa fa-check-circle-o"></i> Paid</a></td>
                                            <?php } elseif (empty($client_order['sent_invoice_task'])) { ?>
                                                <td class="order-invoice-customer"><strong>Send Invoice </strong> <a data-toggle="confirmation" class="btn btn-xs btn-default" data-href="./edit-order?order_id=<?php echo $client_order['order_id'] ?>&task=sent"><i class="fa fa-check-circle-o"></i> Sent</a></td>
                                            <?php } elseif (empty($client_order['received_task'])) { ?>
                                                <td class="order-unreceived"><strong> Payment </strong> <a data-toggle="confirmation" class="btn btn-xs btn-default" data-href="./edit-order?order_id=<?php echo $client_order['order_id'] ?>&task=received"><i class="fa fa-check-circle-o"></i> Received</a></td>
                                            <?php } else { ?>
                                                <td class="order-complete"><strong>Complete </strong></td>
                                            <?php } ?>
                                            <td> <?php echo $client_order['s'] + $client_order['m'] + $client_order['l'] + $client_order['xl'] + $client_order['xxl'] + $client_order['xxxl'] ?> </td>
                                            <!-- <td> --><?php //echo $client_order['cost_total'] ?><!-- </td>-->
                                            <td> <?php echo toDollars($client_order['revenue']) ?> </td>
                                            <td><a class="btn btn-xs btn-default" href="<?php echo $base_dir; ?>/orders/view/<?php echo $client_order['order_id'] ?>"><i class="fa fa-search"></i> <span class="hidden-xs">View</span></a>
                                                <a class="btn btn-xs btn-default" href="<?php echo $base_dir; ?>/orders/edit/<?php echo $client_order['order_id'] ?>"><i class="fa fa-edit"></i> <span class="hidden-xs">Edit</span></a></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>