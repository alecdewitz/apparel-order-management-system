<?php
require('./php/session.php');
include('./php/users-scripts.php');
include('./php/header.php');
?>


<div class="page-content">
    <div class="container">
        <div class="page-content-inner">
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal form-row-seperated" method="post" action="">
                        <div class="portlet">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-users" aria-hidden="true"></i>Users
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
                                                    <h1>User List</h1>
                                                </div>

                                                <div class="table-responsive">
                                                    <table class="table table-striped table-hover table-bordered">
                                                        <thead>
                                                        <tr>
                                                            <th> ID</th>
                                                            <th> Type</th>
                                                            <th> Username</th>
                                                            <th> Name</th>
                                                            <th> Last Logged In</th>
                                                            <th> Actions</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        <?php
                                                        while ($users = mysqli_fetch_assoc($result)) {
                                                            ?>
                                                            <tr <?php if (isset($_SESSION['order_id_updated'])) {
                                                                if ($_SESSION['order_id_updated'] == $users['order_id']) {
                                                                    ?>
                                                                    class="updated-order"
                                                                    <?php
                                                                    unset($_SESSION['order_id_updated']);
                                                                }
                                                            } ?>
                                                            >
                                                                <td><a href="./users.php?account_id=<?php echo $users['account_id'] ?>"> <?php echo $users['account_id'] ?></a></td>
                                                                <td> <?php if ($users['account_type'] == 1) echo "Admin"; else echo "User" ?> </td>
                                                                <td> <?php echo $users['username'] ?> </td>
                                                                <td> <?php echo $users['fullname'] ?> </td>
                                                                <td> <?php echo $users['last_login'] ?> </td>
                                                                <td><a class="btn btn-xs btn-default" href="./view-order.php?order_id=<?php echo $users['account_id'] ?>"><i class="fa fa-search"></i></a>
                                                                    <a class="btn btn-xs btn-default" href="./edit-order.php?order_id=<?php echo $users['account_id'] ?>"><i class="fa fa-edit"></i></a>
                                                                    <a class="btn btn-xs btn-default" href="./edit-order.php?order_id=<?php echo $users['account_id'] ?>"><i class="fa fa-trash"></i></a></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                        </tbody>
                                                    </table>
                                                </div>


<!--                                                <button class="btn btn-success">-->
<!--                                                    <i class="fa fa-check"></i> Save-->
<!--                                                </button>-->
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