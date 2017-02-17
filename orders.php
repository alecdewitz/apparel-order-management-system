<?php
include('php/session.php');
include('php/get-orders-scripts.php');
?>

<!DOCTYPE html>


<head>
    <meta charset="utf-8"/>
    <title>Order Management | Dashboard</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="Order management software for apparel and clothing companies." name="description"/>
    <meta content="Alec Dewitz" name="author"/>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/components.css" rel="stylesheet" id="style_components" type="text/css"/>
    <link href="assets/css/layout.css" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" href="favicon.ico"/>
</head>

<style>
    td.order-complete {
        color: #00C853;
    }

    td.order-unreceived {
        color: #F57F17;
    }

    td.order-invoice-customer {
        color: #00B8D4;
    }

    td.order-unpaid-invoice {
        color: #e57373;
    }

    td.order-not-sent {
        color: #d50000;
    }

    table.table.table-striped tbody tr.updated-order {
        background-color: #e0ebf9;
    }

    .theme-panel {
        min-width: 200px;
    }

    .page-footer {
        background: #3b434c;
        color: #a2abb7;
    }
</style>

<body class="page-container-bg-solid">
<div class="page-wrapper">
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
                                                                <a href="./logout"><span class="theme-color-name"><i class="fa fa-sign-out"></i> Logout</span></a>
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
                                            <a class="more" href="javascript:;"> View more
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
                                                        <a class="btn btn-primary btn-sm" href="./add-order"> Add New
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
                                                                            echo 'class="updated-order"';
                                                                            unset($_SESSION['order_id_updated']);
                                                                        }
                                                                    } ?>>
                                                                        <td><a class="" href="./view-order?order_id=<?php echo $row['order_id'] ?>"> <?php echo $row['order_number'] ?></a></td>
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
                                                                        <td><a class="btn btn-xs btn-default" href="./view-order?order_id=<?php echo $row['order_id'] ?>"><i class="fa fa-search"></i> View</a>
                                                                            <a class="btn btn-xs btn-default" href="./edit-order?order_id=<?php echo $row['order_id'] ?>"><i class="fa fa-edit"></i> Edit</a></td>
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
    <div class="page-wrapper-row">
        <div class="page-wrapper-bottom">
            <div class="page-footer">
                <div class="container"> 2017 &copy; T-Spot
                    <a target="_blank" href="http://alecdewitz.com">Alec Dewitz</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-2.2.4.min.js" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-confirmation/1.0.5/bootstrap-confirmation.min.js" type="text/javascript"></script>
<script>
    $('[data-toggle=confirmation]').confirmation({
        btnOkLabel: 'Yes',
        btnCancelLabel: 'No',
        placement: 'top'
    });
</script>
</body>
</html>