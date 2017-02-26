<?php
require('./php/session.php');
require('./php/connection.php');
include('./php/add-user-scripts.php');
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
                                    <!--                                    <a href="./orders.php" name="back" class="btn btn-danger">-->
                                    <!--                                        <i class="fa fa-angle-left"></i> Back</a>-->
                                    <a data-target="#add-user" data-toggle="modal" class="btn btn-primary">
                                        <i class="fa fa-plus"></i> Add User
                                    </a>

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
<!--                                                            <th> ID</th>-->
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
                                                            <tr class="clickable-row " data-href="#" <?php if (isset($_SESSION['order_id_updated'])) {
                                                                if ($_SESSION['order_id_updated'] == $users['order_id']) {
                                                                    echo "updated-order";
                                                                    unset($_SESSION['order_id_updated']);
                                                                }
                                                            } ?>>
<!--                                                                <td><a href="users.php?account_id=--><?php //echo $users['account_id'] ?><!--"> --><?php //echo $users['account_id'] ?><!--</a></td>-->
                                                                <td> <?php if ($users['account_type'] == 1) echo "Admin"; else echo "User" ?> </td>
                                                                <td> <?php echo $users['username'] ?> </td>
                                                                <td> <?php echo $users['fullname'] ?> </td>
                                                                <td> <?php echo $users['last_login'] ?> </td>
                                                                <td><a class="btn btn-xs btn-default" href="view-order.php?order_id=<?php echo $users['account_id'] ?>"><i class="fa fa-search"></i></a>
                                                                    <a class="btn btn-xs btn-default" href="edit-order.php?order_id=<?php echo $users['account_id'] ?>"><i class="fa fa-edit"></i></a>
                                                                    <?php if ($users['account_type'] != 1) { ?><a class="btn btn-xs btn-default" data-id="<?php echo $users['account_id'] ?>" data-target="#delete-user" data-toggle="modal"><i class="fa fa-trash"></i></a></td><?php } ?>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                        </tbody>
                                                    </table>
                                                </div>
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

<script>


    $(document).on("click", "#add-user-confirm", function () {
        $.post("", {
            action: "createuser",
            username: $('#username').val(),
            password: $('#password').val(),
            fullname: $('#fullname').val(),
            email: $('#email').val(),
            type: $('#type').find(":selected").text()

        }).done(function (data) {
            if (data.success) {
                $('#add-user').modal('hide');
                location.reload();//getUsersList();
            } else {
                alert('Error. Fix fields.');
            }
        });
    });

    $(document).on('show.bs.modal','#delete-user', function () {
        alert('hi');
    });

    $(document).on("click", "#delete-user-confirm", function () {
        alert($(e.relatedTarget).data('id'));
        $.post("", {
            action: "deleteuser",
            account_id: $(e.relatedTarget).data('id')

        }).done(function (data) {
            if (data.success) {
                $('#delete-user').modal('hide');
                location.reload();//getUsersList();
            } else {
                alert('Error. Fix fields');
            }
        });
    });

</script>


<!-- Add User Modal -->

<div id="add-user" class="modal fade" tabindex="-1" data-focus-on="input:first">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h1 class="modal-title">Create User</h1>
    </div>
    <div class="modal-body">
        <form role="form">
            <input style="display:none" type="text" name="username"/>
            <input style="display:none" type="password" name="password"/>
            <div class="form-group">
                <label for="username" autocomplete="false">Username</label>
                <input type="text" class="form-control" id="username"/>
            </div>
            <div class="form-group">
                <label for="password" autocomplete="new-password">Password</label>
                <input type="password" class="form-control" id="password"/>
            </div>
            <div class="form-group">
                <label for="fullname">Full Name</label>
                <input type="text" class="form-control" id="fullname"/>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email"/>
            </div>
            <div class="form-group">
                <label for="name">Type</label>
                <select class="form-control" id="type">
                    <option disabled>--Select option</option>
                    <option value="admin">Admin</option>
                    <option value="user" selected>User</option>
                </select>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-outline dark">Close</button>
        <button type="button" id="add-user-confirm" class="btn green">Add User</button>
    </div>
</div>

<div id="delete-user" class="modal fade" tabindex="-1" data-focus-on="input:first">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h1 class="modal-title">Delete User: </h1>
    </div>
    <div class="modal-body">

    </div>
    <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-outline dark">Close</button>
        <button type="button" id="add-user-confirm" class="btn green">Add User</button>
    </div>
</div>

<!-- END Add User Modal -->