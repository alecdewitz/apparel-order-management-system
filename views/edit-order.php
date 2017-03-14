<?php
include('./php/edit-order-scripts.php');


if ($result->num_rows == 0) {
    $_SESSION['order_not_found'] = true;
    header('Location: ./orders?not-found=true');
} else if (!isset($_GET['order_id'])) {
    header('Location: ./orders?no_order_id=true');
}

include('./php/header.php');

while ($order = mysqli_fetch_assoc($result)) { ?>


    <div class="page-content">
        <div class="container">

            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="../orders.php">Dashboard</a>
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
                                        <a href="../orders.php" name="back" class="btn btn-info">
                                            <i class="fa fa-angle-left"></i> Cancel</a>
                                        <button class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                            <span class="hidden-xs">Delete</span>
                                        </button>
                                        <button class="btn btn-success">
                                            <i class="fa fa-check"></i>
                                            <span class="hidden-xs">Save</span>
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
                                                        <label class="col-sm-3 control-label">Order Type:</label>
                                                        <div class="col-sm-7">
                                                            <select required name="order_type" class="form-control">
                                                                <option value="1" <?php if ($order['order_type'] == 1) echo "selected"; ?> >Client Order</option>
                                                                <option value="2" <?php if ($order['order_type'] == 2) echo "selected"; ?> >Retail Order</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Order Number:
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-sm-7">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><?php echo sanitizeHTML($saved_settings['order_prefix']); ?>-</span>
                                                                <!-- todo: fix substring to match order number -->
                                                                <input pattern="[0-9]*" min="0" <?php if (!empty($order['order_number'])) echo 'value="' . substr(sanitizeHTML($order['order_number']),strlen(sanitizeHTML($saved_settings['order_prefix']))+1) . '"' ?> required type="number" class="form-control" name="order_number" placeholder="">
                                                            </div>

                                                            <span class="help-block"> Ex: S17-01 </span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Date:
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-sm-7">
                                                            <div class="date-picker input-daterange" data-date="10/11/2012" data-date-format="MM d, yyyy">
                                                                <input type="text" <?php if (!empty($order['date_order'])) echo 'value="' . sanitizeHTML($order['date_order']) . '"' ?> class="form-control" name="date_order">
                                                            </div>
                                                            <span class="help-block"> at start of ordering </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Client Name:
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-sm-7">
                                                            <input type="text" <?php if (!empty($order['client'])) echo 'value="' . sanitizeHTML($order['client']) . '"' ?> class="form-control" name="client" placeholder=""></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Client Email:
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-sm-7">
                                                            <input type="text" <?php if (!empty($order['email'])) echo 'value="' . sanitizeHTML($order['email']) . '"' ?> class="form-control" name="email" placeholder=""></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Description:
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-sm-7">
                                                            <input type="text" <?php if (!empty($order['description'])) echo 'value="' . sanitizeHTML($order['description']) . '"' ?> class="form-control" name="description" placeholder="">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Deadline:</label>
                                                        <div class="col-sm-7">
                                                            <div class="date-picker input-daterange" data-date="10/11/2012" data-date-format="DD, M d, yyyy">
                                                                <input type="text" <?php if (!empty($order['deadline'])) echo 'value="' . sanitizeHTML($order['deadline']) . '"' ?> class="form-control" name="deadline"></div>
                                                        </div>
                                                    </div>

                                                    <div class="products-section">
                                                        <h1>Products</h1>
                                                    </div>

                                                    <div class="products-added">
                                                        <span class=" add-new-product-help">Click the Add Product button below to add a new product.</span>

                                                        <?php
                                                        $products = json_decode($order['products'], true);
                                                        $i = 0;
                                                        foreach ($products as $product) {
                                                            $i++;
                                                            ?>

                                                            <div class="product-list">
                                                                <input type="hidden" name="product[<?php echo $i ?>][product_id]" value="<?php echo $product['product_id']; ?>">
                                                                <button class="remove-item btn red btn-outline pull-right delete-product-btn"><span class="glyphicon glyphicon-remove"></span></button>
                                                                <div class="form-group"><label class="col-sm-3 control-label">Product <?php echo $i ?>: <span class="required"> * </span> </label>
                                                                    <div class="col-sm-7"><input type="text" class="form-control" value="<?php echo sanitizeHTML($product['name']); ?>" name="product[<?php echo $i ?>][name]" placeholder=""></div>
                                                                </div>
                                                                <div class="form-group"><label class="col-sm-3 control-label">Sizes: <span class="required"> * </span> </label>
                                                                    <div class="col-sm-7"><label class="col-md-3 control-label">Small: <input min="0" value="<?php echo $product['small']; ?>" type="number" class="form-control" name="product[<?php echo $i ?>][s]" placeholder=""> </label> <label class="col-md-3 control-label">Medium: <input min="0" value="<?php echo $product['medium']; ?>" type="number" class="form-control" name="product[<?php echo $i ?>][m]" placeholder=""> </label> <label class="col-md-3 control-label">Large: <input min="0" value="<?php echo $product['large']; ?>" type="number" class="form-control" name="product[<?php echo $i ?>][l]"
                                                                                                                                                                                                                                                                                                                                                                                                                                         placeholder="">
                                                                        </label> <label class="col-md-3 control-label">X Large: <input min="0" value="<?php echo $product['xlarge']; ?>" type="number" class="form-control" name="product[<?php echo $i ?>][xl]" placeholder=""> </label> <label class="col-md-3 control-label">XX Large (+$1.50): <input min="0" value="<?php echo $product['xxlarge']; ?>" type="number" class="form-control" name="product[<?php echo $i ?>][xxl]" placeholder=""> </label> <label class="col-md-3 control-label">XXX Large (+$3): <input min="0" value="<?php echo $product['xxxlarge']; ?>" type="number" class="form-control" name="product[<?php echo $i ?>][xxxl]" placeholder=""> </label> <label
                                                                                class="col-md-3 control-label">One Size (Hats): <input min="0" value="<?php echo $product['onesize']; ?>" type="number" class="form-control" name="product[<?php echo $i ?>][onesize]" placeholder=""> </label></div>
                                                                </div>
                                                                <div class="form-group"><label class="col-sm-3 control-label">Revenue (Sales): <span class="required"> * </span> </label>
                                                                    <div class="col-sm-7">
                                                                        <div class="input-group"><span class="input-group-addon">$</span> <input min="0" step="0.01" value="<?php echo $product['revenue']; ?>" required="" type="number" class="form-control" name="product[<?php echo $i ?>][revenue]" placeholder=""></div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group"><label class="col-sm-3 control-label">Cost (Expense): <span class="required"> * </span> </label>
                                                                    <div class="col-sm-7">
                                                                        <div class="input-group"><span class="input-group-addon">$</span> <input min="0" value="<?php echo $product['expense']; ?>" step="0.01" required="" type="number" class="form-control" name="product[<?php echo $i ?>][expense]" placeholder=""></div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        <?php } ?>


                                                    </div>

                                                    <button class="btn btn-default center-button add-new-product"><i class="fa fa-plus"></i> Add Product</button>


                                                    <div class="tasks-section">
                                                        <h1>Progress</h1>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Submitted Order to Supplier:
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-sm-7">
                                                            <div class=" date-picker input-daterange" data-date="10/11/2012" data-date-format="m/d/yyyy">
                                                                <input type="text" <?php if (!empty($order['submitted_task'])) echo 'value="' . $order['submitted_task'] . '"' ?> class="form-control" name="submitted_task">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Paid TCT Invoice:
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-sm-7">
                                                            <div class="date-picker input-daterange" data-date="10/11/2012" data-date-format="m/d/yyyy">
                                                                <input type="text" <?php if (!empty($order['paid_invoice_task'])) echo 'value="' . $order['paid_invoice_task'] . '"' ?> class="form-control" name="paid_invoice_task">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Sent Invoice to Client:
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-sm-7">
                                                            <div class="date-picker input-daterange" data-date="10/11/2012" data-date-format="m/d/yyyy">
                                                                <input type="text" <?php if (!empty($order['sent_invoice_task'])) echo 'value="' . $order['sent_invoice_task'] . '"' ?> class="form-control" name="sent_invoice_task">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Received Payment:
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-sm-7">
                                                            <div class="date-picker input-daterange" data-date="10/11/2012" data-date-format="m/d/yyyy">
                                                                <input type="text" <?php if (!empty($order['received_task'])) echo 'value="' . $order['received_task'] . '"' ?> class="form-control" name="received_task">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <button class="btn btn-success center-button">
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

<?php } ?>

<style>
    .products-added {
        background-color: #f1f1f1;
        padding: 10px;
        margin-bottom: 20px;
        text-align: center;
    }

    .product-list {
        margin-bottom: 10px;
        padding: 20px 0 10px 0;
        border-bottom: 2px solid #ddd;
    }

    .product-list:last-child {
        border: none;
    }

    .delete-product-btn {

    }
</style>



