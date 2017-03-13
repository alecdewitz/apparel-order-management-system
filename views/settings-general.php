<?php
require('./php/session.php');
include('./php/settings-scripts.php');
include('./php/header.php');

?>
<style>
    .progresslist {
        background-color: #FFF;
        padding: 0 20px 20px;
        margin-top: 30px;
    }

    .progresslist h1 {
        margin: 0;
        padding-bottom: 20px;
        text-align: center;
    }

    .form-control {
        border-radius: 0;
    }

    li.ui-state-default {
        background: #f5f5f5;
        border: none;
        border-bottom: 1px solid #ddd;
        height: 50px;
        padding: 12px;
        font-size: 18px;
    }

    li.ui-state-default i:hover {
        font-size: 20px;
        cursor: pointer;
    }

    li.ui-state-default:last-child {
        border-bottom: none;
    }

    .progress-footer {
        background-color: #F4FCE8;
        margin: 20px -20px -10px -20px;
        padding: 10px 20px;
    }

    #done-items li:last-child {
        border-bottom: none;
    }

    #checkAll {
        margin-top: 10px;
    }</style>

<div class="page-content">
    <div class="container">
        <div class="page-content-inner">
            <ul class="page-breadcrumb breadcrumb">
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <span>General</span>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <a href="settings-users.php">Users</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <a href="settings-password.php">Change Password</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <a href="settings-progress.php">Order Progress</a>
                    </li>
                </ul>
            </ul>
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal form-row-seperated" method="post" action="">
                        <div class="portlet">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-cog" aria-hidden="true"></i>Settings
                                </div>
                                <div class="actions btn-set">
                                    <a href="../orders.php" name="back" class="btn btn-danger">
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
                                                    <label class="col-md-2 control-label">Company Name:
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text" value="<?php echo $settings['company_name'] ?>" class="form-control" name="company_name" placeholder="Ordery">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Company Slogan:
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" value="<?php echo $settings['company_slogan'] ?>" name="company_slogan" placeholder="">
                                                    </div>
                                                </div>

                                                <!--                                                <div class="form-group">-->
                                                <!--                                                    <label class="col-md-2 control-label">Logo: </label>-->
                                                <!--                                                    <div class="col-md-10">-->
                                                <!--                                                        <input type="text" value="S17-" class="form-control" name="order_number" placeholder="">-->
                                                <!--                                                        <span class="help-block"> Ex: S17-01 </span>-->
                                                <!--                                                    </div>-->
                                                <!--                                                </div>-->

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Calendar Year:
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-5">
                                                        <div class="input-group input-large date-picker input-daterange" data-date="1/1" data-date-format="m/d">
                                                            <input type="text" value="<?php echo $settings['year_start'] ?>" class="form-control" name="calendar_start">
                                                        </div>
                                                        <!--                                                        --><?php //echo date('F j'); ?>
                                                        <span class="help-block"> year start </span>

                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="input-group input-large date-picker input-daterange" data-date="1/1" data-date-format="m/d">
                                                            <input type="text" class="form-control" value="<?php echo $settings['year_end'] ?>" name="calendar_end">
                                                        </div>
                                                        <span class="help-block"> year end </span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Order Prefix:
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" value="<?php echo $settings['order_prefix'] ?>" name="order_prefix" placeholder="CLI">
                                                        <span class="help-block"> Optional to add prefix to order </span>
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


<?php include('./php/footer.php'); ?>


