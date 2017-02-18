<?php
include('php/session.php');
include('php/get-orders-scripts.php');

if ($result->num_rows==0) {
  $_SESSION['order_not_found'] = true;
  header('Location: ./orders?not-found=true');
}

while ($row = mysqli_fetch_assoc($result)) {
?>


<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<!--suppress HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget, HtmlUnknownTarget -->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Metronic | Invoice</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/simple-line-icons/simple-line-icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="assets/css/components.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="assets/pages/css/invoice.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="assets/css/layout.css" rel="stylesheet" type="text/css" />
        <link href="assets/layouts/layout3/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="assets/layouts/layout3/css/custom.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid">
        <div class="page-wrapper">
            <div class="page-wrapper-row full-height">
                <div class="page-wrapper-middle">
                    <!-- BEGIN CONTAINER -->
                    <div class="page-container">
                        <!-- BEGIN CONTENT -->
                        <div class="page-content-wrapper">
                            <!-- BEGIN CONTENT BODY -->
                            <!-- BEGIN PAGE HEAD-->
                            <div class="page-head">
                                <div class="container">
                                    <!-- BEGIN PAGE TITLE -->
                                    <div class="page-title">
                                        <h1>Orders
                                            <small>order #</small>
                                        </h1>
                                    </div>
                                    <!-- END PAGE TITLE -->
                                </div>
                            </div>
                            <!-- END PAGE HEAD-->
                            <!-- BEGIN PAGE CONTENT BODY -->
                            <div class="page-content">
                                <div class="container">
                                    <!-- BEGIN PAGE CONTENT INNER -->
                                    <div class="page-content-inner">
                                        <div class="invoice">
                                            <div class="row invoice-logo">
                                                <div class="col-xs-6 invoice-logo-space">
                                                    <img src="assets/pages/media/invoice/walmart.png" class="img-responsive" alt="" /> </div>
                                                <div class="col-xs-6">
                                                    <p> <?php echo $row['order_number'] . " / " . $row['date_order'] ?>
                                                        <span class="muted"> Consectetuer adipiscing elit </span>
                                                    </p>
                                                </div>
                                            </div>
                                            <hr/>
                                            <div class="row">
                                                <div class="col-xs-4">
                                                    <h3>Client:</h3>
                                                    <ul class="list-unstyled">
                                                        <li> <?php echo $row['client']; ?> </li>
                                                        <li> Mr Nilson Otto </li>
                                                        <li> FoodMaster Ltd </li>
                                                        <li> Madrid </li>
                                                        <li> Spain </li>
                                                        <li> 1982 OOP </li>
                                                    </ul>
                                                </div>
                                                <div class="col-xs-4">
                                                    <h3>About:</h3>
                                                    <ul class="list-unstyled">
                                                        <li> Drem psum dolor sit amet </li>
                                                        <li> Laoreet dolore magna </li>
                                                        <li> Consectetuer adipiscing elit </li>
                                                        <li> Magna aliquam tincidunt erat volutpat </li>
                                                        <li> Olor sit amet adipiscing eli </li>
                                                        <li> Laoreet dolore magna </li>
                                                    </ul>
                                                </div>
                                                <div class="col-xs-4 invoice-payment">
                                                    <h3>Payment Details:</h3>
                                                    <ul class="list-unstyled">
                                                        <li>
                                                            <strong>V.A.T Reg #:</strong> 542554(DEMO)78 </li>
                                                        <li>
                                                            <strong>Account Name:</strong> FoodMaster Ltd </li>
                                                        <li>
                                                            <strong>SWIFT code:</strong> 45454DEMO545DEMO </li>
                                                        <li>
                                                            <strong>Account Name:</strong> FoodMaster Ltd </li>
                                                        <li>
                                                            <strong>SWIFT code:</strong> 45454DEMO545DEMO </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <table class="table table-striped table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th> # </th>
                                                                <th> Item </th>
                                                                <th class="hidden-xs"> Description </th>
                                                                <th class="hidden-xs"> Quantity </th>
                                                                <th class="hidden-xs"> Unit Cost </th>
                                                                <th> Total </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td> 1 </td>
                                                                <td> Hardware </td>
                                                                <td class="hidden-xs"> Server hardware purchase </td>
                                                                <td class="hidden-xs"> 32 </td>
                                                                <td class="hidden-xs"> $75 </td>
                                                                <td> $2152 </td>
                                                            </tr>
                                                            <tr>
                                                                <td> 2 </td>
                                                                <td> Furniture </td>
                                                                <td class="hidden-xs"> Office furniture purchase </td>
                                                                <td class="hidden-xs"> 15 </td>
                                                                <td class="hidden-xs"> $169 </td>
                                                                <td> $4169 </td>
                                                            </tr>
                                                            <tr>
                                                                <td> 3 </td>
                                                                <td> Foods </td>
                                                                <td class="hidden-xs"> Company Anual Dinner Catering </td>
                                                                <td class="hidden-xs"> 69 </td>
                                                                <td class="hidden-xs"> $49 </td>
                                                                <td> $1260 </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-4">
                                                    <div class="well">
                                                        <address>
                                                            <strong>Loop, Inc.</strong>
                                                            <br/> 795 Park Ave, Suite 120
                                                            <br/> San Francisco, CA 94107
                                                            <br/>
                                                            <abbr title="Phone">P:</abbr> (234) 145-1810 </address>
                                                        <address>
                                                            <strong>Full Name</strong>
                                                            <br/>
                                                            <a href="mailto:#"> first.last@email.com </a>
                                                        </address>
                                                    </div>
                                                </div>
                                                <div class="col-xs-8 invoice-block">
                                                    <ul class="list-unstyled amounts">
                                                        <li>
                                                            <strong>Sub - Total amount:</strong> $9265 </li>
                                                        <li>
                                                            <strong>Discount:</strong> 12.9% </li>
                                                        <li>
                                                            <strong>VAT:</strong> ----- </li>
                                                        <li>
                                                            <strong>Grand Total:</strong> $12489 </li>
                                                    </ul>
                                                    <br/>
                                                    <a class="btn btn-lg blue hidden-print margin-bottom-5" onclick="window.print();"> Print
                                                        <i class="fa fa-print"></i>
                                                    </a>
                                                    <a class="btn btn-lg green hidden-print margin-bottom-5"> Submit Your Invoice
                                                        <i class="fa fa-check"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END PAGE CONTENT INNER -->
                                </div>
                            </div>
                            <!-- END PAGE CONTENT BODY -->
                            <!-- END CONTENT BODY -->
                        </div>
                        <!-- END CONTENT -->

                    </div>
                    <!-- END CONTAINER -->
                </div>
            </div>
            <div class="page-wrapper-row">
                <div class="page-wrapper-bottom">
                    <!-- BEGIN FOOTER -->
                    <!-- BEGIN INNER FOOTER -->
                    <div class="page-footer">
                        <div class="container"> 2016 &copy; Metronic Theme By
                            <a target="_blank" href="http://keenthemes.com">Keenthemes</a> &nbsp;|&nbsp;
                            <a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" title="Purchase Metronic just for 27$ and get lifetime updates for free" target="_blank">Purchase Metronic!</a>
                        </div>
                    </div>
                    <div class="scroll-to-top">
                        <i class="icon-arrow-up"></i>
                    </div>
                    <!-- END INNER FOOTER -->
                    <!-- END FOOTER -->
                </div>
            </div>
        </div>
        <!--[if lt IE 9]>
<script src="assets/global/plugins/respond.js"></script>
<script src="assets/global/plugins/excanvas.js"></script>
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="assets/global/plugins/jquery.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap/js/bootstrap.js" type="text/javascript"></script>
        <script src="assets/global/plugins/js.cookie.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery.blockui.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="assets/global/scripts/app.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="assets/layouts/layout3/scripts/layout.js" type="text/javascript"></script>
        <script src="assets/layouts/layout3/scripts/demo.js" type="text/javascript"></script>
        <script src="assets/layouts/global/scripts/quick-sidebar.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>
    <?php } ?>

</html>
