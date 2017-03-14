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
                        <a href="settings-general.php">General</a>
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
                        <span>Order Progress</span>
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
                                    <a href="../../orders.php" name="back" class="btn btn-danger">
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


                                                <div class="tasks-section">
                                                    <h1>Order Progress</h1>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-8 col-md-offset-2">
                                                        <div class="progresslist not-done">
                                                            <input type="text" class="form-control add-progress" placeholder="Add Task">

                                                            <hr>
                                                            <ul id="sortable" class="list-unstyled">

                                                                <?php
                                                                $i = 0;
                                                                while ($order_progress = mysqli_fetch_assoc($result)) { ?>

                                                                    <li data-id="<?php echo $order_progress['progress_id']; ?>" data-order="<?php echo $order_progress['progress_order']; ?>" class="ui-state-default">
                                                                         <?php echo $order_progress['progress_order'] . ". "; echo $order_progress['progress_name']; ?>
<!--                                                                        <button class="remove-item btn btn-default btn-xs pull-right"><span class="glyphicon glyphicon-remove"></span></button>-->
                                                                    </li>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </ul>
                                                            <div class="progress-footer">
                                                                <strong><span class="count-progress"></span></strong> Tasks
                                                            </div>
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


<?php include('./php/footer.php'); ?>


