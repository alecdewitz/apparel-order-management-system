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
            <ul class="page-breadcrumb breadcrumb">
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <a href="./settings-general.php">General</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Users</span>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <a href="./settings-password.php">Change Password</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <a href="./settings-progress.php">Order Progress</a>
                    </li>
                </ul>
            </ul>
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal form-row-seperated" method="post" action="">
                        <div class="portlet">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-users" aria-hidden="true"></i>Users
                                </div>
                                <div class="actions btn-set">
                                    <!--                                    <a href="./orders.php?type=all" name="back" class="btn btn-danger">-->
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
                                                                <td><a class="btn btn-xs btn-default" href="user.php?account_id=<?php echo $users['account_id'] ?>"><i class="fa fa-search"></i></a>
                                                                    <a class="btn btn-xs btn-default" data-account-id="<?php echo $users['account_id'] ?>" data-account-username="<?php echo $users['username'] ?>" data-target="#edit-user" data-type="edit" data-toggle="modal"><i class="fa fa-edit"></i></a>
                                                                    <?php if ($users['account_type'] != 1) { ?><a class="btn btn-xs btn-default" data-account-id="<?php echo $users['account_id'] ?>" data-account-username="<?php echo $users['username'] ?>" data-target="#delete-user" data-type="edit" data-toggle="modal"><i class="fa fa-trash"></i></a></td><?php } ?>
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


    $(function() {

        $('#add-user').on("click", "#add-user-confirm", function () {
            $.post("", {
                action: "createuser",
                username: $('#user_name').val(),
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


        $('a[data-type=edit]').on('click', function (e) {
            var account_id = $(this).data('account-id');
            var account_username = $(this).data('account-username');
            $('#edit_account_id').val(account_id);
            $('#edit_username_input').val(account_username);

            //disable until grabbed information
            $('.form-control').attr("disabled", true);

            $.post("", {
                action: "getuser",
                account_id: $(this).data('account-id')
            }).done(function (data) {
                if (data.success) {
//                    $('#edit-user').modal('show');
                    $('.edit_username').text(data.username);
                    $('#username_edit').val(data.username);
                    $('#fullname_edit').val(data.name);
                    $('#email_edit').val(data.email);
                    $('#type_edit').val(data.type);

                    //undisable after grabbed information
                    $('.form-control').attr("disabled", false);
                    $('#username_edit').attr("disabled", true);
                } else {
                    alert('Error. Fix fields.');
                }
            });
        });


        $('#edit-user').on("click", "#edit-user-confirm", function () {
            $.post("", {
                action: "edituser",
                account_id: $('#edit_account_id').val(),
                account_fullname: $('#fullname_edit').val(),
                account_email: $('#email_edit').val(),
                account_type: $('#type_edit').val()
            }).done(function (data) {
                if (data.success) {
                    $('#edit-user').modal('hide');
                    location.reload();//getUsersList();
                } else {
                    alert('Error.');
                }
            });
        });


        $('#delete-user').on("click", "#delete-user-confirm", function () {
            $.post("", {
                action: "deleteuser",
                account_id: $('#edit_account_id').val(),
                account_username: $('#edit_username_input').val()

            }).done(function (data) {
                if (data.success) {
                    $('#delete-user').modal('hide');
                    location.reload();//getUsersList();
                } else {
                    alert('Error.');
                }
            });
        });

    });

</script>

<?php include('modals/users.php') ?>