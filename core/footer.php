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
        autoclose: true
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
        window.location = $(this).data("href");
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

</body>
</html>