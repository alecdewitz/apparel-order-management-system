<?php
require('./php/session.php');
include('./php/header.php');
include('./php/get-orders-scripts.php');

if ($result->num_rows == 0) {
    $_SESSION['order_not_found'] = true;
    header('Location: ./orders?not_found=true');
} else if (!isset($_GET['order_id'])) {
    header('Location: ./orders?no_order_id=true');
}

function toDollars($num) {
    return number_format($num, 2, '.', ',');
}

while ($row = mysqli_fetch_assoc($result)) {

?>


    <div class="page-wrapper-row full-height">
        <div class="page-wrapper-middle">
            <div class="page-container">
                <div class="page-content-wrapper">
                    <div class="page-head">
                        <div class="container">
                            <div class="page-title">
                                <h1>Orders
                                    <small>view</small>
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
                                    <a href="./orders.php">Dashboard</a>
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
                                                    <span class="caption-subject font-dark sbold uppercase"> Order <?php echo $row['order_number'] ?>
                                                        <span class="hidden-xs">| <?php echo $row['date_order'] ?> </span>
                                                            </span>
                                                </div>
                                                <div class="actions">
                                                    <div class="btn-group btn-group-devided" data-toggle="buttons">
                                                    </div>
                                                    <div class="btn-group">
                                                        <a class="btn red btn-outline btn-circle" href="#" data-toggle="dropdown">
                                                            <i class="fa fa-pencil"></i>
                                                            <span class="hidden-xs"> More </span>
                                                            <i class="fa fa-angle-down"></i>
                                                        </a>
                                                        <ul class="dropdown-menu pull-right">
                                                            <li>
                                                                <a href="./edit-order.php?order_id=<?php echo $row['order_id'] ?>"> Edit </a>
                                                            </li>

                                                            <li>
                                                                <a href="#"> Delete </a>
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
                                                                            <div class="col-md-5 name"> Order #:</div>
                                                                            <div class="col-md-7 value"> <?php echo $row['order_number'] ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row static-info">
                                                                            <div class="col-md-5 name"> Order Date:</div>
                                                                            <div class="col-md-7 value"> <?php echo $row['date_order'] ?> </div>
                                                                        </div>
                                                                        <div class="row static-info">
                                                                            <div class="col-md-5 name"> Order Status:</div>
                                                                            <div class="col-md-7 value">
                                                                                <span class="label label-success"> Closed </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row static-info">
                                                                            <div class="col-md-5 name"> Client Name:</div>
                                                                            <div class="col-md-7 value"> <?php echo $row['client'] ?> <a href="mailto:<?php echo $row['email']; ?>" class="btn btn-xs btn-default"><i class="fa fa-envelope-o" aria-hidden="true"></i> Email Contact</a></div>
                                                                        </div>
                                                                        <div class="row static-info">
                                                                            <div class="col-md-5 name"> Description:</div>
                                                                            <div class="col-md-7 value"> <?php echo $row['description'] ?> </div>
                                                                        </div>
                                                                        <div class="row static-info">
                                                                            <div class="col-md-5 name"> Deadline:</div>
                                                                            <div class="col-md-7 value"> <?php echo $row['deadline'] ?> </div>
                                                                        </div>
                                                                        <div class="row static-info">
                                                                            <div class="col-md-5 name"> Template to TCT:</div>
                                                                            <div class="col-md-7 value"><a href="mailto:<?php echo $row['email']; ?>" class="btn btn-xs btn-default"><i class="fa fa-envelope-o" aria-hidden="true"></i> Send Email</a></div>
                                                                        </div>
                                                                        <div class="row static-info">
                                                                            <div class="col-md-5 name"> Invoice:</div>
                                                                            <div class="col-md-7 value"><a href="" class="btn btn-xs btn-default"><i class="fa fa-money" aria-hidden="true"></i> View Invoice</a></div>
                                                                        </div>
                                                                        <div class="row static-info">
                                                                            <div class="col-md-5 name"> Attachments:</div>
                                                                            <div class="col-md-7 value"><a href="" class="btn btn-xs btn-default"><i class="fa fa-paperclip" aria-hidden="true"></i> View Attachments</a></div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="portlet green box">
                                                                    <div class="portlet-title">
                                                                        <div class="caption">
                                                                            <i class="fa fa-cogs"></i>Order Status
                                                                        </div>

                                                                    </div>
                                                                    <div class="portlet-body">
                                                                        <div class="row static-info">
                                                                            <div class="col-md-5 name"> Submitted to TCT:</div>
                                                                            <div class="col-md-7 value">
                                                                                <?php
                                                                                if (!empty($row['submitted_task'])) {
                                                                                    ?>
                                                                                    <i class="fa fa-check-circle check-done"></i> - <?php echo $row['submitted_task']; ?>
                                                                                <?php } else { ?>
                                                                                    <a data-toggle="confirmation" class="btn btn-xs btn-default" data-href="./edit-order?order_id=<?php echo $row['order_id'] ?>&task=submitted&return_to=view-order"><i class="fa fa-check-circle-o"></i> Submitted</a>

                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row static-info">
                                                                            <div class="col-md-5 name"> Received T-Shirts:</div>
                                                                            <div class="col-md-7 value"> <?php
                                                                                if (!empty($row['submitted_task'])) {
                                                                                    ?>
                                                                                    <i class="fa fa-check-circle check-done"></i> - <?php echo $row['submitted_task']; ?>
                                                                                <?php } else { ?>
                                                                                    <a data-toggle="confirmation" class="btn btn-xs btn-default" data-href="./edit-order?order_id=<?php echo $row['order_id'] ?>&task=submitted&return_to=view-order"><i class="fa fa-check-circle-o"></i> Received</a>

                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row static-info">
                                                                            <div class="col-md-5 name"> Paid Invoice:</div>
                                                                            <div class="col-md-7 value">
                                                                                <?php
                                                                                if (!empty($row['paid_invoice_task'])) {
                                                                                    ?>
                                                                                    <i class="fa fa-check-circle check-done"></i> - <?php echo $row['paid_invoice_task']; ?>
                                                                                <?php } else if (!empty($row['submitted_task'])) { ?>
                                                                                    <a data-toggle="confirmation" class="btn btn-xs btn-default" data-href="./edit-order?order_id=<?php echo $row['order_id'] ?>&task=paid&return_to=view-order"><i class="fa fa-check-circle-o"></i> Paid</a>

                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row static-info">
                                                                            <div class="col-md-5 name"> Sent Invoice to Client:</div>
                                                                            <div class="col-md-7 value">
                                                                                <?php
                                                                                if (!empty($row['sent_invoice_task'])) {
                                                                                    ?>
                                                                                    <i class="fa fa-check-circle check-done"></i> - <?php echo $row['sent_invoice_task']; ?>
                                                                                <?php } else if (!empty($row['paid_invoice_task'])) { ?>
                                                                                    <a data-toggle="confirmation" class="btn btn-xs btn-default" data-href="./edit-order?order_id=<?php echo $row['order_id'] ?>&task=sent&return_to=view-order"><i class="fa fa-check-circle-o"></i> Sent Invoice</a>

                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row static-info">
                                                                            <div class="col-md-5 name"> Received Payment:</div>
                                                                            <div class="col-md-7 value">
                                                                                <?php
                                                                                if (!empty($row['received_task'])) {
                                                                                    ?>
                                                                                    <i class="fa fa-check-circle check-done"></i> - <?php echo $row['received_task']; ?>
                                                                                <?php } else if (!empty($row['sent_invoice_task'])) { ?>
                                                                                    <a data-toggle="confirmation" class="btn btn-xs btn-default" data-href="./edit-order?order_id=<?php echo $row['order_id'] ?>&task=received&return_to=view-order"><i class="fa fa-check-circle-o"></i> Received</a>

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
                                                                            <div class="col-md-5 name"> Estimated Cost:</div>
                                                                            <div class="col-md-7 value"> $<?php echo toDollars($row['cost_total']) ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row static-info">
                                                                            <div class="col-md-5 name"> Real Cost:</div>
                                                                            <div class="col-md-7 value"> <?php if (isset($row['cost_total_real'])) {
                                                                                    echo $row['cost_total_real'];
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
                                                                                $small = preg_replace("/[^0-9.]/", "", $row['cost_per']) * preg_replace("/[^0-9.]/", "", $row['s']);
                                                                                $medium = preg_replace("/[^0-9.]/", "", $row['cost_per']) * preg_replace("/[^0-9.]/", "", $row['m']);
                                                                                $large = preg_replace("/[^0-9.]/", "", $row['cost_per']) * preg_replace("/[^0-9.]/", "", $row['l']);
                                                                                $xlarge = preg_replace("/[^0-9.]/", "", $row['cost_per']) * preg_replace("/[^0-9.]/", "", $row['xl']);
                                                                                $xxlarge = (preg_replace("/[^0-9.]/", "", $row['cost_per']) + 1.50) * preg_replace("/[^0-9.]/", "", $row['xxl']);
                                                                                $xxxlarge = (preg_replace("/[^0-9.]/", "", $row['cost_per']) + 3) * preg_replace("/[^0-9.]/", "", $row['xxxl']);

                                                                                $revenue_total = $small + $medium + $large + $xlarge + $xxlarge + $xxxlarge;

                                                                                if (!empty($row['cost_total_real'])) $cost_total_real = preg_replace("/[^0-9.]/", "", $row['cost_total_real']);
                                                                                $cost_total = preg_replace("/[^0-9.]/", "", $row['cost_total']);


                                                                                ?>
                                                                                <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        <a target="_blank" href="http://www.4logoapparel.com/cgi-bin/hw/hwb/chw-display-PLstyle.w?sr=<?php echo $row['product']; ?>&currentColor=&hwCN=149149152156156157156&hwCNCD=149149152156156157156&hwST=1"> <?php echo $row['product']; ?> Small - White </a>
                                                                                    </td>
                                                                                    <td> $<?php echo toDollars(preg_replace("/[^0-9.]/", "", $row['cost_per'])) ?> </td>
                                                                                    <td> <?php echo $row['s']; ?> </td>
                                                                                    <td> $<?php echo toDollars($small) ?> </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <a target="_blank" href="http://www.4logoapparel.com/cgi-bin/hw/hwb/chw-display-PLstyle.w?sr=<?php echo $row['product']; ?>&currentColor=&hwCN=149149152156156157156&hwCNCD=149149152156156157156&hwST=1"> <?php echo $row['product']; ?> Medium - White </a>
                                                                                    </td>
                                                                                    <td> $<?php echo toDollars(preg_replace("/[^0-9.]/", "", $row['cost_per'])); ?> </td>
                                                                                    <td> <?php echo $row['m']; ?> </td>
                                                                                    <td> $<?php echo toDollars($medium) ?> </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <a target="_blank" href="http://www.4logoapparel.com/cgi-bin/hw/hwb/chw-display-PLstyle.w?sr=<?php echo $row['product']; ?>&currentColor=&hwCN=149149152156156157156&hwCNCD=149149152156156157156&hwST=1"> <?php echo $row['product']; ?> Large - White </a>
                                                                                    </td>
                                                                                    <td> $<?php echo toDollars(preg_replace("/[^0-9.]/", "", $row['cost_per'])); ?> </td>
                                                                                    <td> <?php echo $row['l']; ?> </td>
                                                                                    <td> $<?php echo toDollars($large) ?> </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <a target="_blank" href="http://www.4logoapparel.com/cgi-bin/hw/hwb/chw-display-PLstyle.w?sr=<?php echo $row['product']; ?>&currentColor=&hwCN=149149152156156157156&hwCNCD=149149152156156157156&hwST=1"> <?php echo $row['product']; ?> X-Large - White </a>
                                                                                    </td>
                                                                                    <td> $<?php echo toDollars(preg_replace("/[^0-9.]/", "", $row['cost_per'])); ?> </td>
                                                                                    <td> <?php echo $row['xl']; ?> </td>
                                                                                    <td> $<?php echo toDollars($xlarge) ?> </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <a target="_blank" href="http://www.4logoapparel.com/cgi-bin/hw/hwb/chw-display-PLstyle.w?sr=<?php echo $row['product']; ?>&currentColor=&hwCN=149149152156156157156&hwCNCD=149149152156156157156&hwST=1"> <?php echo $row['product']; ?> XX-Large - White </a>
                                                                                    </td>
                                                                                    <td> $<?php echo toDollars(preg_replace("/[^0-9.]/", "", $row['cost_per']) + 1.50); ?> </td>
                                                                                    <td> <?php echo $row['xxl']; ?> </td>
                                                                                    <td> $<?php echo toDollars($xxlarge) ?> </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <a target="_blank" href="http://www.4logoapparel.com/cgi-bin/hw/hwb/chw-display-PLstyle.w?sr=<?php echo $row['product']; ?>&currentColor=&hwCN=149149152156156157156&hwCNCD=149149152156156157156&hwST=1"> <?php echo $row['product']; ?> XXX-Large - White </a>
                                                                                    </td>
                                                                                    <td> $<?php echo toDollars(preg_replace("/[^0-9.]/", "", $row['cost_per']) + 3); ?> </td>
                                                                                    <td> <?php echo $row['xxxl']; ?> </td>
                                                                                    <td> $<?php echo toDollars($xxxlarge) ?> </td>
                                                                                </tr>
                                                                                </tbody>
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
                                                                        <div class="col-md-3 value"> $<?php echo toDollars($revenue_total) ?> </div>
                                                                    </div>
                                                                    <div class="row static-info align-reverse">
                                                                        <div class="col-md-8 name"> Expenses:</div>
                                                                        <div class="col-md-3 value"> $<?php if (!empty($row['cost_total_real'])) {
                                                                                echo toDollars($cost_total_real);
                                                                            } else {
                                                                                echo toDollars($cost_total);
                                                                            } ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row static-info align-reverse">
                                                                        <div class="col-md-8 name"> Profit:</div>
                                                                        <div class="col-md-3 value"> $<?php echo toDollars($revenue_total - $cost_total); ?> </div>
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
            </div>
        </div>
    </div>

    <?php } require('./php/footer.php'); ?>
