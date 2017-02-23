<?php
require('./php/session.php');
include('./php/add-order-scripts.php');
include('./php/header.php');
?>



<body class="page-container-bg-solid">
<div class="page-wrapper">
    <div class="page-wrapper-row full-height">
        <div class="page-wrapper-middle">
            <div class="page-container">
                <div class="page-content-wrapper">
                    <div class="page-head">
                        <div class="container">
                            <div class="page-title">
                                <h1> Orders
                                    <small>new</small>
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
                                    <span>Add Order</span>
                                </li>
                            </ul>
                            <div class="page-content-inner">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form class="form-horizontal form-row-seperated" method="post" action="">
                                            <div class="portlet">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-shopping-cart"></i>New Order
                                                    </div>
                                                    <div class="actions btn-set">
                                                        <a href="./orders.php" name="back" class="btn btn-danger">
                                                            <i class="fa fa-angle-left"></i> Back</a>
                                                        <button class="btn btn-success">
                                                            <i class="fa fa-check"></i> Save
                                                        </button>

                                                    </div>
                                                </div>
                                                <div class="portlet-body">
                                                    <div class="tabbable-bordered">
                                                        <div class="tab-content">
                                                            <div class="tab-pane active" id="tab_general">
                                                                <div class="form-body">

                                                                    <div class="general-section">
                                                                        <h1>General</h1>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">Order Number:
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-10">
                                                                            <input type="text" value="S17-" class="form-control" name="order_number" placeholder="">
                                                                            <span class="help-block"> Ex: S17-01 </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">Date:
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-10">
                                                                            <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="MM d, yyyy">
                                                                                <input type="text" class="form-control" value="<?php echo date('F j, Y'); ?>" name="date_order">
                                                                            </div>
                                                                            <span class="help-block"> at start of ordering </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">Client Name:
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-10">
                                                                            <input type="text" class="form-control" name="client" placeholder=""></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">Client Email:
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-10">
                                                                            <input type="text" class="form-control" name="email" placeholder=""></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">Description:
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-10">
                                                                            <input type="text" class="form-control" name="description" placeholder="">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">Deadline:
                                                                        </label>
                                                                        <div class="col-md-10">
                                                                            <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="DD, M d, yyyy">
                                                                                <input type="text" class="form-control" name="deadline"></div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">Product:
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-10">
                                                                            <input type="text" class="form-control" name="product" placeholder="">
                                                                            <span class="help-block"> (<a target="_blank" href="http://www.4logoapparel.com/cgi-bin/hw/hwb/chw-pseudoHome.w?hwCN=149149152156156157156&hwCNCD=cDmxUlacgndvlWFe">link to catalog</a>) </span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="general-section">
                                                                        <h1>Pricing</h1>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">Cost per item:
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-10">
                                                                            <input type="text" class="form-control" name="cost_per" placeholder="">
                                                                            <span class="help-block"> (<a target="_blank" href="./calculator.php">link to calculator</a>) </span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">Sizes:
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-10">
                                                                            <label class="col-md-2 control-label">Small:
                                                                                <input type="text" class="form-control" name="s" placeholder="">
                                                                            </label>
                                                                            <label class="col-md-2 control-label">Medium:
                                                                                <input type="text" class="form-control" name="m" placeholder="">
                                                                            </label>
                                                                            <label class="col-md-2 control-label">Large:
                                                                                <input type="text" class="form-control" name="l" placeholder="">
                                                                            </label>
                                                                            <label class="col-md-2 control-label">X Large:
                                                                                <input type="text" class="form-control" name="xl" placeholder="">
                                                                            </label>
                                                                            <label class="col-md-2 control-label">XX Large (+$1.50):
                                                                                <input type="text" class="form-control" name="xxl" placeholder="">
                                                                            </label>
                                                                            <label class="col-md-2 control-label">XXX Large (+$3):
                                                                                <input type="text" class="form-control" name="xxxl" placeholder="">
                                                                            </label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">Cost to make:
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-10">
                                                                            <input type="text" class="form-control" name="cost_total" placeholder=""></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">Estimated revenue:
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-10">
                                                                            <input type="text" class="form-control" name="revenue" placeholder=""></div>
                                                                    </div>

                                                                    <div class="tasks-section">
                                                                        <h1>Progress</h1>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">Submitted Order to TCT:
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-10">
                                                                            <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="m/d/yyyy">
                                                                                <input type="text" class="form-control" name="submitted_task">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">Paid TCT Invoice:
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-10">
                                                                            <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="m/d/yyyy">
                                                                                <input type="text" class="form-control" name="paid_invoice_task">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">Sent Invoice to Client:
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-10">
                                                                            <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="m/d/yyyy">
                                                                                <input type="text" class="form-control" name="sent_invoice_task">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">Received Payment:
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-10">
                                                                            <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="m/d/yyyy">
                                                                                <input type="text" class="form-control" name="received_task">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <button class="btn btn-success">
                                                                        <i class="fa fa-check"></i> Save
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
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
                    <a target="_blank" href="https://alecdewitz.com">Alec Dewitz</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-2.2.4.min.js" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js" type="text/javascript"></script>

<script>
    //init date-picker
    $('.date-picker').datepicker({
        autoclose: true
    });
</script>
</body>

</html>