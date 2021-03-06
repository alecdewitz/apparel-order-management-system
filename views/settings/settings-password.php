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
                        <span>Change Password</span>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <a href="settings-advanced.php">Order Progress</a>
                    </li>
                </ul>
            </ul>
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal form-row-seperated" method="post" action="<?php echo $base_dir; ?>/settings/password">
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


                                                <div class="general-section">
                                                    <h1>Change Password</h1>
                                                </div>

                                                <?php getPasswordAlert(); ?>

                                                <input type="hidden" name="account_id" value="<?php echo getUserID($user); ?>">
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Old Password:
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="password" class="form-control" name="old_password" placeholder="">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Password:
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="password" class="form-control" name="new_password" placeholder="">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Verify Password:
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="password" class="form-control" name="verify_password" placeholder="">
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

