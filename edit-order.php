<?php
require('./php/session.php');
include('./php/get-orders-scripts.php');
include('./php/edit-order-scripts.php');


if ($result->num_rows == 0) {
    $_SESSION['order_not_found'] = true;
    header('Location: ./orders?not-found=true');
} else if (!isset($_GET['order_id'])) {
    header('Location: ./orders?no_order_id=true');
}

include('./php/header.php');

while ($row = mysqli_fetch_assoc($result)) {
    ?>





                    <div class="page-content">
                        <div class="container">

                            <ul class="page-breadcrumb breadcrumb">
                                <li>
                                    <a href="./orders.php">Dashboard</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>Edit Order</span>
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
                                                                            <input type="text" <?php if (!empty($row['order_number'])) echo 'value="' . $row['order_number'] . '"' ?> class="form-control" name="order_number" placeholder="">
                                                                            <span class="help-block"> Ex: S17-01 </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">Date:
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-10">
                                                                            <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="MM d, yyyy">
                                                                                <input type="text" <?php if (!empty($row['date_order'])) echo 'value="' . $row['date_order'] . '"' ?> class="form-control" name="date_order">
                                                                            </div>
                                                                            <span class="help-block"> at start of ordering </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">Client Name:
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-10">
                                                                            <input type="text" <?php if (!empty($row['client'])) echo 'value="' . $row['client'] . '"' ?> class="form-control" name="client" placeholder=""></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">Client Email:
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-10">
                                                                            <input type="text" <?php if (!empty($row['email'])) echo 'value="' . $row['email'] . '"' ?> class="form-control" name="email" placeholder=""></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">Description:
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-10">
                                                                            <input type="text" <?php if (!empty($row['description'])) echo 'value="' . $row['description'] . '"' ?> class="form-control" name="description" placeholder="">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">Deadline:
                                                                        </label>
                                                                        <div class="col-md-10">
                                                                            <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="DD, M d, yyyy">
                                                                                <input type="text" <?php if (!empty($row['deadline'])) echo 'value="' . $row['deadline'] . '"' ?> class="form-control" name="deadline"></div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">Product:
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-10">
                                                                            <input type="text" <?php if (!empty($row['product'])) echo 'value="' . $row['product'] . '"' ?> class="form-control" name="product" placeholder="">
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
                                                                            <input type="text" <?php if (!empty($row['cost_per'])) echo 'value="' . $row['cost_per'] . '"' ?> class="form-control" name="cost_per" placeholder="">
                                                                            <span class="help-block"> (<a target="_blank" href="./calculator.php">link to calculator</a>) </span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">Sizes:
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-10">
                                                                            <label class="col-md-2 control-label">Small:
                                                                                <input type="text" <?php if (!empty($row['s'])) echo 'value="' . $row['s'] . '"' ?> class="form-control" name="s" placeholder="">
                                                                            </label>
                                                                            <label class="col-md-2 control-label">Medium:
                                                                                <input type="text" <?php if (!empty($row['m'])) echo 'value="' . $row['m'] . '"' ?> class="form-control" name="m" placeholder="">
                                                                            </label>
                                                                            <label class="col-md-2 control-label">Large:
                                                                                <input type="text" <?php if (!empty($row['l'])) echo 'value="' . $row['l'] . '"' ?> class="form-control" name="l" placeholder="">
                                                                            </label>
                                                                            <label class="col-md-2 control-label">X Large:
                                                                                <input type="text" <?php if (!empty($row['xl'])) echo 'value="' . $row['xl'] . '"' ?> class="form-control" name="xl" placeholder="">
                                                                            </label>
                                                                            <label class="col-md-2 control-label">XX Large (+$1.50):
                                                                                <input type="text" <?php if (!empty($row['xxl'])) echo 'value="' . $row['xxl'] . '"' ?> class="form-control" name="xxl" placeholder="">
                                                                            </label>
                                                                            <label class="col-md-2 control-label">XXX Large (+$3):
                                                                                <input type="text" <?php if (!empty($row['xxxl'])) echo 'value="' . $row['xxxl'] . '"' ?> class="form-control" name="xxxl" placeholder="">
                                                                            </label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">Cost to make:
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-10">
                                                                            <input type="text" <?php if (!empty($row['cost_total'])) echo 'value="' . $row['cost_total'] . '"' ?> class="form-control" name="cost_total" placeholder=""></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">Estimated revenue:
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-10">
                                                                            <input type="text" <?php if (!empty($row['revenue'])) echo 'value="' . $row['revenue'] . '"' ?> class="form-control" name="revenue" placeholder=""></div>
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
                                                                                <input type="text" <?php if (!empty($row['submitted_task'])) echo 'value="' . $row['submitted_task'] . '"' ?> class="form-control" name="submitted_task">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">Paid TCT Invoice:
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-10">
                                                                            <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="m/d/yyyy">
                                                                                <input type="text" <?php if (!empty($row['paid_invoice_task'])) echo 'value="' . $row['paid_invoice_task'] . '"' ?> class="form-control" name="paid_invoice_task">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">Sent Invoice to Client:
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-10">
                                                                            <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="m/d/yyyy">
                                                                                <input type="text" <?php if (!empty($row['sent_invoice_task'])) echo 'value="' . $row['sent_invoice_task'] . '"' ?> class="form-control" name="sent_invoice_task">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">Received Payment:
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-10">
                                                                            <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="m/d/yyyy">
                                                                                <input type="text" <?php if (!empty($row['received_task'])) echo 'value="' . $row['received_task'] . '"' ?> class="form-control" name="received_task">
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

<?php }
require('./php/footer.php'); ?>