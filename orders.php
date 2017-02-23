<?php
require('./php/session.php');
include('./php/get-orders-scripts.php');
include('./php/header.php');
?>


    <div class="page-wrapper-row full-height">
        <div class="page-wrapper-middle">
            <div class="page-container">
                <div class="page-content-wrapper">
                    <div class="page-head">
                        <div class="container">
                            <div class="page-title">
                                <h1>Orders
                                    <small>dashboard</small>
                                </h1>
                            </div>
                            <div class="page-toolbar">
                                <div class="btn-group btn-theme-panel">
                                    <a href="#" class="btn dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-cog" aria-hidden="true"></i>
                                    </a>
                                    <div class="dropdown-menu theme-panel pull-right dropdown-custom hold-on-click">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <h3><?php echo $user_check; ?></h3>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <ul class="theme-colors">
                                                            <li class="theme-color theme-color-default" data-theme="default">
                                                                <a href="./logout.php"><span class="theme-color-name"><i class="fa fa-sign-out"></i> Logout</span></a>
                                                            </li>

                                                        </ul>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="page-content">
                        <div class="container">
                            <ul class="page-breadcrumb breadcrumb">
                                <li>
                                    <span>Dashboard</span>
                                </li>
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
                                                <div class="desc"> Estimated Costs</div>
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
                                                    <span class="caption-subject font-blue bold uppercase">Overview 2017</span>
                                                </div>
                                                <div class="actions">
                                                    <div class="btn-group">
                                                        <a class="btn btn-primary btn-sm" href="./add-order.php"> Add New
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
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="overview_1">
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-hover table-bordered">
                                                                <thead>
                                                                <tr>
                                                                    <th> Order No.</th>
                                                                    <th> Date</th>
                                                                    <th> Status</th>
                                                                    <th> Client</th>
                                                                    <th> Quantity</th>
                                                                    <th> Cost</th>
                                                                    <th> Price</th>
                                                                    <th></th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                <?php
                                                                while ($row = mysqli_fetch_assoc($result)) {
                                                                    ?>
                                                                    <tr <?php if (isset($_SESSION['order_id_updated'])) {
                                                                        if ($_SESSION['order_id_updated'] == $row['order_id']) {
                                                                            ?>
                                                                            class="updated-order"
                                                                            <?php
                                                                            unset($_SESSION['order_id_updated']);
                                                                        }
                                                                    } ?>>
                                                                        <td><a class="" href="./view-order.php?order_id=<?php echo $row['order_id'] ?>"> <?php echo $row['order_number'] ?></a></td>
                                                                        <td> <?php echo $row['date_order'] ?> </td>
                                                                        <?php
                                                                        if (empty($row['submitted_task'])) {
                                                                            ?>
                                                                            <td class="order-not-sent"><strong>Not Sent </strong><a data-toggle="confirmation" class="btn btn-xs btn-default" data-href="./edit-order?order_id=<?php echo $row['order_id'] ?>&task=submitted"><i class="fa fa-check-circle-o"></i> Submitted</a></td>
                                                                            <?php
                                                                        } elseif (empty($row['paid_invoice_task'])) {
                                                                            ?>
                                                                            <td class="order-unpaid-invoice"><strong>Unpaid TCT </strong><a data-toggle="confirmation" class="btn btn-xs btn-default" data-href="./edit-order?order_id=<?php echo $row['order_id'] ?>&task=paid"><i class="fa fa-check-circle-o"></i> Paid</a></td>
                                                                            <?php
                                                                        } elseif (empty($row['sent_invoice_task'])) {
                                                                            ?>
                                                                            <td class="order-invoice-customer"><strong>Send Invoice </strong> <a data-toggle="confirmation" class="btn btn-xs btn-default" data-href="./edit-order?order_id=<?php echo $row['order_id'] ?>&task=sent"><i class="fa fa-check-circle-o"></i> Sent</a></td>
                                                                            <?php
                                                                        } elseif (empty($row['received_task'])) {
                                                                            ?>
                                                                            <td class="order-unreceived"><strong> Payment </strong> <a data-toggle="confirmation" class="btn btn-xs btn-default" data-href="./edit-order?order_id=<?php echo $row['order_id'] ?>&task=received"><i class="fa fa-check-circle-o"></i> Received</a></td>
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <td class="order-complete"><strong>Complete </strong></td>
                                                                            <?php
                                                                        } ?>

                                                                        <td> <?php echo $row['client'] ?> </td>
                                                                        <td> <?php echo $row['s'] + $row['m'] + $row['l'] + $row['xl'] + $row['xxl'] + $row['xxxl'] ?> </td>
                                                                        <td> <?php echo $row['cost_total'] ?> </td>
                                                                        <td> <?php echo $row['revenue'] ?> </td>
                                                                        <td><a class="btn btn-xs btn-default" href="./view-order.php?order_id=<?php echo $row['order_id'] ?>"><i class="fa fa-search"></i> View</a>
                                                                            <a class="btn btn-xs btn-default" href="./edit-order.php?order_id=<?php echo $row['order_id'] ?>"><i class="fa fa-edit"></i> Edit</a></td>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require('./php/footer.php'); ?>