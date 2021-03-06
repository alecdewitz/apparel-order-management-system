</div>
</div>
</div>
</div>
<div class="page-wrapper-row">
    <div class="page-wrapper-bottom">
        <div class="page-footer">
            <div class="container"> 2016 &copy; T-Spot
                <a target="_blank" href="http://alecdewitz.com">Alec Dewitz</a>
            </div>
        </div>
    </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-2.2.4.min.js" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-confirmation/1.0.5/bootstrap-confirmation.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/js/bootstrap-modalmanager.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/js/bootstrap-modal.min.js" type="text/javascript"></script>
<!--<script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>-->


<script>
    $('[data-toggle=confirmation]').confirmation({
        btnOkLabel: 'Yes',
        btnCancelLabel: 'No',
        placement: 'top'
    });

    $('.date-picker').datepicker({
        autoclose: true,
        format: "MM d, yyyy",
        todayBtn: true
    });
    //adjusts date-picker in place on scroll
    $( document ).scroll(function(){
        $('.date-picker').datepicker('place');
    });

    $('.page-header').on('click', '.search-form', function (e) {
        $(this).addClass("open");
        $(this).find('.form-control').focus();

        $('.page-header .search-form .form-control').on('blur', function (e) {
            $(this).closest('.search-form').removeClass("open");
            $(this).unbind("blur");
        });
    });

    $('.page-header').on('keypress', '.hor-menu .search-form .form-control', function (e) {
        if (e.which == 13) {
            $(this).closest('.search-form').submit();
            return false;
        }
    });

    // handle header search button click
    $('.page-header').on('mousedown', '.search-form.open .submit', function (e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).closest('.search-form').submit();
    });

    $(".page-header .menu-toggler").on("click", function (event) {
        var menu = $(".page-header .page-header-menu");
        if (menu.is(":visible")) {
            menu.slideUp(300);
        } else {
            menu.slideDown(300);
        }
    });

    // handle sub dropdown menu click for mobile devices only
    $(".hor-menu .menu-dropdown > a, .hor-menu .dropdown-submenu > a").on("click", function (e) {
        if ($(this).next().hasClass('dropdown-menu')) {
            e.stopPropagation();
            if ($(this).parent().hasClass("opened")) {
                $(this).parent().removeClass("opened");
            } else {
                $(this).parent().addClass("opened");
            }
        }
    });

    // close main menu on final link click for mobile mode
    $(".hor-menu li > a").on("click", function (e) {
        if (!$(this).parent('li').hasClass('classic-menu-dropdown') && !$(this).parent('li').hasClass('mega-menu-dropdown')
            && !$(this).parent('li').hasClass('dropdown-submenu')) {
            $(".page-header .page-header-menu").slideUp(300);
        }

    });

    $(".clickable-row").click(function () {
//        window.location = $(this).data("href");
    });


</script>


<!--progress settings page-->
<script>
    countProgress();

    //create progress
    $('.add-progress').on('keypress', function (e) {
        if (e.which == 13) {
            e.preventDefault();
            if ($(this).val() != '') {
                var progress = $(this).val();
                createProgress(progress);
                countProgress();
            } else {
                // some validation
            }
        }
    });

    //delete done task from "already done"
    $('.progresslist').on('click', '.remove-item', function () {
        removeItem(this);
        countProgress();
    });

    // count tasks
    function countProgress() {
        var count = $("#sortable li").length;
        $('.count-progress').html(count);
    }

    //create task
    function createProgress(text) {
        var markup = '<li class="ui-state-default"> ' + text + ' <button class="remove-item btn btn-default btn-xs pull-right"><span class="glyphicon glyphicon-remove"></span></button> </li>';
        $('#sortable').append(markup);
        $('.add-progress').val('');
    }

    //remove done task from list
    function removeItem(element) {
        $(element).parent().remove();
    }

</script>


<!--For view order page-->
<script>
    $('li').on("click", ".delete-order-modal", function (e) {
        var url = $(e.currentTarget).data('href');
        $('a#delete-order-confirm').attr('href', url);

    });

</script>


<!--For users page-->
<script>
    $(function() {

        $('#add-user').on("click", "#add-user-confirm", function () {
            $.post("<?php echo $base_dir; ?>/settings/users/create", {
                username: $('#user_name').val(),
                password: $('#password').val(),
                fullname: $('#fullname').val(),
                email: $('#email').val(),
                type: $("#type option:selected").val()
        }).done(function (data) {
                if (data.success) {
                    $('#add-user').modal('hide');
                    location.reload();//getUsersList();
                } else {
                    alert('Errors are shown in console log');
                    console.log(data);
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

            $.post("<?php echo $base_dir; ?>/settings/users/get", {
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
                    alert('Errors are shown in console log');
                    console.log(data);
                }
            });
        });


        $('#edit-user').on("click", "#edit-user-confirm", function (e) {
            $.post("<?php echo $base_dir; ?>/settings/users/edit", {
                account_id: $('#edit_account_id').val(),
                account_fullname: $('#fullname_edit').val(),
                account_email: $('#email_edit').val(),
                account_type: $('#type_edit').val()
            }).done(function (data) {
                if (data.success) {
                    $('#edit-user').modal('hide');
                    location.reload();//getUsersList();
                } else {
                    alert('Errors are shown in console log');
                    console.log(data);
                }
            });
        });


        $('#delete-user').on("click", "#delete-user-confirm", function () {
            $.post("<?php echo $base_dir; ?>/settings/users/delete", {
                account_id: $('#edit_account_id').val(),
                account_username: $('#edit_username_input').val()
            }).done(function (data) {
                if (data.success) {
                    $('#delete-user').modal('hide');
                    location.reload();//getUsersList();
                } else {
                    alert('Errors are shown in console log');
                    console.log(data);
                }
            });
        });

    });

</script>

<!--Create/edit order page scripts-->
<script>
    var numberProduct = 0;
    var addProductHelp = $('.products-added span.add-new-product-help');
    $('form').on("click", ".add-new-product", function (e) {
        e.preventDefault();
        createProduct();
    });

    if ($(".product-list").length != 0) {
        numberProduct = $(".product-list").length;
        addProductHelp.hide();
    }

    //delete done task from "already done"
    $('.products-added').on('click', '.remove-item', function () {
        var confirmDelete = confirm("Are you sure you want to remove this product?");
        if (confirmDelete) {
            removeItem(this);
            if ($(".product-list").length == 0) {
                numberProduct = 0;
                addProductHelp.show();
            }
        }
    });

    //todo use array to find unused product and place there

    //create task
    function createProduct() {
        numberProduct++;
        addProductHelp.hide();
        var markup = '<div class="product-list"><button class="remove-item btn red btn-outline pull-right delete-product-btn"><span class="glyphicon glyphicon-remove"></span></button> <div class="form-group"> <label class="col-sm-3 control-label">Product ' + numberProduct + ': <span class="required"> * </span> </label> ' +
            '<div class="col-sm-7"> <input type="text" class="form-control" name="product['+ numberProduct +'][name]" placeholder=""> </div> </div> ' +
            '<div class="form-group"> <label class="col-sm-3 control-label">Sizes: <span class="required"> * </span> </label> ' +
            '<div class="col-sm-7"> <label class="col-md-3 control-label">Small: <input min="0" type="number" class="form-control" name="product['+ numberProduct +'][s]" placeholder=""> </label> ' +
            '<label class="col-md-3 control-label">Medium: <input min="0" type="number" class="form-control" name="product['+ numberProduct +'][m]" placeholder=""> </label> <label class="col-md-3 control-label">Large: ' +
            '<input min="0" type="number" class="form-control" name="product['+ numberProduct +'][l]" placeholder=""> </label> <label class="col-md-3 control-label">X Large: ' +
            '<input min="0" type="number" class="form-control" name="product['+ numberProduct +'][xl]" placeholder=""> </label> <label class="col-md-3 control-label">XX Large (+$1.50): ' +
            '<input min="0" type="number" class="form-control" name="product['+ numberProduct +'][xxl]" placeholder=""> </label> <label class="col-md-3 control-label">XXX Large (+$3): ' +
            '<input min="0" type="number" class="form-control" name="product['+ numberProduct +'][xxxl]" placeholder=""> </label> <label class="col-md-3 control-label">One Size (Hats): ' +
            '<input min="0" type="number" class="form-control" name="product['+ numberProduct +'][onesize]" placeholder=""> </label> </div> </div> <div class="form-group"> ' +
            '<label class="col-sm-3 control-label">Revenue (Sales): <span class="required"> * </span> </label> <div class="col-sm-7"> <div class="input-group"> ' +
            '<span class="input-group-addon">$</span> <input min="0" step="0.01" required type="number" class="form-control" name="product['+ numberProduct +'][revenue]" placeholder=""> </div> </div> </div> ' +
            '<div class="form-group"> <label class="col-sm-3 control-label">Cost (Expense): <span class="required"> * </span> </label> <div class="col-sm-7"> <div class="input-group"> ' +
            '<span class="input-group-addon">$</span> <input min="0" step="0.01" required type="number" class="form-control" name="product['+ numberProduct +'][expense]" placeholder=""> </div> </div> </div> </div>';

        $('div.products-added').append(markup);
    }

    //remove done task from list
    function removeItem(element) {
        $(element).parent().remove();
    }


</script>

</body>
</html>