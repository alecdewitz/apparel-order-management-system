<!DOCTYPE html>

<head>
    <meta charset="utf-8"/>
    <title>Order Management | Dashboard</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta content="Order management software for apparel and clothing companies." name="description"/>
    <meta content="Alec Dewitz" name="author"/>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/css/bootstrap-modal-bs3patch.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/css/bootstrap-modal.min.css" rel="stylesheet" type="text/css"/>


    <link href="./assets/css/components.css" rel="stylesheet" id="style_components" type="text/css"/>
    <link href="./assets/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="./assets/css/layout.css" rel="stylesheet" type="text/css"/>
    <link href="./assets/css/default.css" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" href="favicon.ico"/>
    <style>
        .general-section, .tasks-section {
            margin: 30px;
            text-align: center;
        }

        .theme-panel {
            min-width: 200px;
        }
    </style>
    <style>
        td.order-complete {
            color: #00C853;
        }

        td.order-unreceived {
            color: #F57F17;
        }

        td.order-invoice-customer {
            color: #00B8D4;
        }

        td.order-unpaid-invoice {
            color: #e57373;
        }

        td.order-not-sent {
            color: #d50000;
        }

        table.table.table-striped tbody tr.updated-order {
            background-color: #e0ebf9;
        }

        .theme-panel {
            min-width: 200px;
        }
    </style>

    <style>
        .theme-panel {
            min-width: 200px;
        }

        .check-done {
            color: green;
            font-size: 20px;
        }
        div.tab-pane div.table-responsive {
            -webkit-overflow-scrolling: touch;
        }
        a.company-name {
            text-decoration: none;
        }
        .center-button {
            margin: 0 auto;
            display: block;
        }
    </style>
</head>


<body class="page-container-bg-solid">
<div class="page-wrapper">


    <div class="page-wrapper-row">
        <div class="page-wrapper-top">
            <!-- BEGIN HEADER -->
            <div class="page-header">
                <!-- BEGIN HEADER TOP -->
                <div class="page-header-top">
                    <div class="container">
                        <!-- BEGIN LOGO -->
                        <div class="page-logo">
                            <a class="company-name" href="dashboard.php">
<!--                                <img src="./assets/img/logo.png" alt="logo" class="logo-default">-->
                                <h1><?php echo $settings['company_name']; ?></h1>
                            </a>
                        </div>
                        <a href="#" class="menu-toggler"><i class="fa fa-bars" aria-hidden="true"></i></a>
                        <div class="top-menu">
                            <ul class="nav navbar-nav pull-right">
                                <li class="dropdown dropdown-extended dropdown-notification dropdown-dark" id="header_notification_bar">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                        <i class="fa fa-bell" aria-hidden="true"></i>
                                        <span class="badge badge-default">7</span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="external">
                                            <h3>You have
                                                <strong>12 pending</strong> tasks</h3>
                                            <a href="app_todo.html">view all</a>
                                        </li>
                                        <li>
                                            <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">


                                                <li>
                                                    <a href="javascript:;">
                                                        <span class="time">5 days</span>
                                                        <span class="details">
                                                                    <span class="label label-sm label-icon label-info">
                                                                        <i class="fa fa-bullhorn"></i>
                                                                    </span> System Error. </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <span class="time">9 days</span>
                                                        <span class="details">
                                                                    <span class="label label-sm label-icon label-danger">
                                                                        <i class="fa fa-bolt"></i>
                                                                    </span> Storage server failed. </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>

                                <li class="dropdown dropdown-extended dropdown-tasks dropdown-dark" id="header_task_bar">
                                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                        <span class="badge badge-default">3</span>
                                    </a>
                                    <ul class="dropdown-menu extended tasks">
                                        <li class="external">
                                            <h3>You have
                                                <strong>12 pending</strong> tasks</h3>
                                            <a href="app_todo_2.html">view all</a>
                                        </li>
                                        <li>
                                            <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                                <li>
                                                    <a href="javascript:;">
                                                        <span class="task">
                                                            <span class="desc">New UI release</span>
                                                            <span class="percent">38%</span>
                                                        </span>
                                                        <span class="progress progress-striped">
                                                            <span style="width: 38%;" class="progress-bar progress-bar-important" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">
                                                                <span class="sr-only">38% Complete</span>
                                                            </span>
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>

                                <li class="droddown dropdown-separator">
                                    <span class="separator"></span>
                                </li>

                                <li class="dropdown dropdown-user dropdown-dark">
                                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                        <img alt="" class="img-circle" src="./assets/img/user.png">
                                        <span class="username "><?php echo $user['fullname']; ?></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-default">
                                        <li>
                                            <a href="#">
                                                <i class="icon-user"></i>
                                                <span><?php echo $user['username']; ?></span>
                                            </a>
                                        </li>



                                        <?php if ($user['account_type'] == 1) { ?>
                                        <li>
                                            <a href="users.php">
                                                <i class="fa fa-users"></i>
                                                <span>Users</span>
                                            </a>
                                        </li>


                                        <li>
                                            <a href="settings.php">
                                                <i class="fa fa-cog" aria-hidden="true"></i> Settings </a>
                                        </li>
                                        <li class="divider"></li>
                                        <?php } ?>


                                        <li>
                                            <a href="./lock.php">
                                                <i class="icon-lock"></i> Lock Session </a>
                                        </li>
                                        <li>
                                            <a href="./logout.php">
                                                <i class="icon-key"></i> Log Out </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="page-header-menu">
                    <div class="container">
                        <!--                        <form class="search-form" action="page_general_search.html" method="GET">-->
                        <!--                            <div class="input-group">-->
                        <!--                                <input type="text" class="form-control" placeholder="Search" name="query">-->
                        <!--                                <span class="input-group-btn">-->
                        <!--                                            <a href="javascript:;" class="btn submit">-->
                        <!--                                                <i class="icon-magnifier"></i>-->
                        <!--                                            </a>-->
                        <!--                                        </span>-->
                        <!--                            </div>-->
                        <!--                        </form>-->
                        <div class="hor-menu hor-menu-light">
                            <ul class="nav navbar-nav">
                                <li class="menu-dropdown classic-menu-dropdown ">
                                    <a href="dashboard.php">
                                        <i class="fa fa-bar-chart" aria-hidden="true"></i> Dashboard
                                    </a>
                                </li>


                                <li class="menu-dropdown classic-menu-dropdown active">
                                    <a href="javascript:;">
                                        <i class="fa fa-shirtsinbulk" aria-hidden="true"></i> Order History
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="dropdown-menu pull-left">
                                        <li class=" ">
                                            <a href="orders.php" class="nav-link  ">
                                                <i class="fa fa-bar-chart" aria-hidden="true"></i> All Orders
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="orders-client.php" class="nav-link  ">
                                                <i class="fa fa-user" aria-hidden="true"></i> Client Orders </a>
                                        </li>
                                        <li class=" ">
                                            <a href="orders-retail.php" class="nav-link  ">
                                                <i class="fa fa-users" aria-hidden="true"></i> Retail Orders
                                                <!--                                                <span class="badge badge-danger">3</span>-->
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="menu-dropdown classic-menu-dropdown ">
                                    <a href="./logout.php">
                                        <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-wrapper-row full-height">
        <div class="page-wrapper-middle">
            <div class="page-container">
                <div class="page-content-wrapper">
                    <div class="page-head">
                        <div class="container">
                            <div class="page-title">
                                <h1>Order Management</h1>
                            </div>
                            <div class="page-toolbar">
                                <div class="btn-group btn-theme-panel">
                                    <a href="#" class="btn dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-cog" aria-hidden="true"></i>
                                    </a>
                                    <div class="dropdown-menu theme-panel pull-right dropdown-custom hold-on-click">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <h3><?php echo $user['username']; ?></h3>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <ul class="theme-colors">
                                                            <li class="theme-color theme-color-default" data-theme="default">
                                                                <a href="./logout.php"><span class="theme-color-name"><i class="fa fa-sign-out"></i> Logout</span></a>
                                                            </li>

                                                        </ul>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>