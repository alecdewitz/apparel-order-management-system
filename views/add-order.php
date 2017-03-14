<div class="page-content">
    <div class="container">
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="<?php echo $base_dir; ?>/dashboard">Dashboard</a>
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
                                    <a href="<?php echo $base_dir; ?>/orders" name="back" class="btn btn-danger">
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
                                                    <label class="col-sm-3 control-label">Order Type:</label>
                                                    <div class="col-sm-7">
                                                        <select required name="order_type" class="form-control">
                                                            <option value="1" <?php if ($_GET['type'] == "client") echo "selected"; ?> >Client Order</option>
                                                            <option value="2" <?php if ($_GET['type'] == "retail") echo "selected"; ?> >Retail Order</option>
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Order Number:
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-sm-7">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><?php echo $saved_settings['order_prefix']; ?>-</span>
                                                            <input pattern="[0-9]*" min="0" required type="number" class="form-control" name="order_number" placeholder="">
                                                        </div>

                                                        <span class="help-block"> Ex: S17-01 </span>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Date:
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-sm-7">
                                                        <div class="input-group date form_datetime date-picker" data-date-viewmode="years">
                                                            <input name="date_order" type="text" value="<?php echo date('F j, Y'); ?>" class="form-control" readonly="">
                                                            <span class="input-group-btn">
                                                                <button class="btn default" type="button">
                                                                    <i class="fa fa-calendar"></i>
                                                                </button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Client Name:
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" name="client"></div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Client Email:
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" name="email"></div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Description:
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" name="description">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Deadline:
                                                    </label>
                                                    <div class="col-sm-7">
                                                        <div class="date-picker input-daterange" data-date="10/11/2012" data-date-format="DD, M d, yyyy">
                                                            <input type="text" class="form-control" name="deadline"></div>

                                                    </div>
                                                </div>
                                                <!--                                                <div class="form-group">-->
                                                <!--                                                    <label class="col-sm-3 control-label">Product:-->
                                                <!--                                                        <span class="required"> * </span>-->
                                                <!--                                                    </label>-->
                                                <!--                                                    <div class="col-sm-7">-->
                                                <!--                                                        <input type="text" class="form-control" name="product" placeholder="">-->
                                                <!--                                                        <span class="help-block"> (<a target="_blank" href="http://www.4logoapparel.com/cgi-bin/hw/hwb/chw-pseudoHome.w?hwCN=149149152156156157156&hwCNCD=cDmxUlacgndvlWFe">link to catalog</a>) </span>-->
                                                <!--                                                    </div>-->
                                                <!--                                                </div>-->

                                                <div class="products-section">
                                                    <h1>Products</h1>
                                                </div>

                                                <div class="products-added">
                                                    <span class=" add-new-product-help">
                                                         Click the Add Product button below to add a new product.
                                                    </span>
                                                </div>

                                                <button class="btn btn-default center-button add-new-product"><i class="fa fa-plus"></i> Add Product</button>


                                                <div class="tasks-section">
                                                    <h1>Progress</h1>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Submitted Order to TCT:
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-sm-7">
                                                        <div class="input-group date form_datetime date-picker" data-date-viewmode="years">
                                                            <input name="submitted_task" type="text" class="form-control" readonly="">
                                                            <span class="input-group-btn">
                                                                <button class="btn default" type="button">
                                                                    <i class="fa fa-calendar"></i>
                                                                </button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Paid TCT Invoice:
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-sm-7">
                                                        <div class="input-group date form_datetime date-picker" data-date-viewmode="years">
                                                            <input name="paid_invoice_task" type="text" class="form-control" readonly="">
                                                            <span class="input-group-btn">
                                                                <button class="btn default" type="button">
                                                                    <i class="fa fa-calendar"></i>
                                                                </button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Sent Invoice to Client:
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-sm-7">
                                                        <div class="input-group date form_datetime date-picker" data-date-viewmode="years">
                                                            <input name="sent_invoice_task" type="text" class="form-control" readonly="">
                                                            <span class="input-group-btn">
                                                                <button class="btn default" type="button">
                                                                    <i class="fa fa-calendar"></i>
                                                                </button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Received Payment:
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-sm-7">
                                                        <div class="input-group date form_datetime date-picker" data-date-viewmode="years">
                                                            <input name="received_task" type="text" class="form-control" readonly="">
                                                            <span class="input-group-btn">
                                                                <button class="btn default" type="button">
                                                                    <i class="fa fa-calendar"></i>
                                                                </button>
                                                            </span>
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


