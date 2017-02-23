<?php
require('./php/session.php');
include('./php/get-orders-scripts.php');
include('./php/edit-order-scripts.php');


if ($result->num_rows == 0) {
    $_SESSION['order_not_found'] = true;
    header('Location: ./orders?not-found=true');
} else if (!isset($_GET['order_id'])) {
    header('Location: ./orders?no_order_id=true');
}

include('./php/header.php');

while ($row = mysqli_fetch_assoc($result)) {
    ?>


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
                            <a href="index.html">
                                <img src="./assets/img/logo.png" alt="logo" class="logo-default">
                            </a>
                        </div>
                        <!-- END LOGO -->
                        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                        <a href="javascript:;" class="menu-toggler"><i class="fa fa-bars" aria-hidden="true"></i></a>
                        <!-- END RESPONSIVE MENU TOGGLER -->
                        <!-- BEGIN TOP NAVIGATION MENU -->
                        <div class="top-menu">
                            <ul class="nav navbar-nav pull-right">
                                <!-- BEGIN NOTIFICATION DROPDOWN -->
                                <li class="dropdown dropdown-extended dropdown-notification dropdown-dark" id="header_notification_bar">
                                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
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
                                                        <span class="time">just now</span>
                                                        <span class="details">
                                                                    <span class="label label-sm label-icon label-success">
                                                                        <i class="fa fa-plus"></i>
                                                                    </span> New user registered. </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <span class="time">3 mins</span>
                                                        <span class="details">
                                                                    <span class="label label-sm label-icon label-danger">
                                                                        <i class="fa fa-bolt"></i>
                                                                    </span> Server #12 overloaded. </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <span class="time">10 mins</span>
                                                        <span class="details">
                                                                    <span class="label label-sm label-icon label-warning">
                                                                        <i class="fa fa-bell-o"></i>
                                                                    </span> Server #2 not responding. </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <span class="time">14 hrs</span>
                                                        <span class="details">
                                                                    <span class="label label-sm label-icon label-info">
                                                                        <i class="fa fa-bullhorn"></i>
                                                                    </span> Application error. </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <span class="time">2 days</span>
                                                        <span class="details">
                                                                    <span class="label label-sm label-icon label-danger">
                                                                        <i class="fa fa-bolt"></i>
                                                                    </span> Database overloaded 68%. </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <span class="time">3 days</span>
                                                        <span class="details">
                                                                    <span class="label label-sm label-icon label-danger">
                                                                        <i class="fa fa-bolt"></i>
                                                                    </span> A user IP blocked. </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <span class="time">4 days</span>
                                                        <span class="details">
                                                                    <span class="label label-sm label-icon label-warning">
                                                                        <i class="fa fa-bell-o"></i>
                                                                    </span> Storage Server #4 not responding dfdfdfd. </span>
                                                    </a>
                                                </li>
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
                                <!-- END NOTIFICATION DROPDOWN -->
                                <!-- BEGIN TODO DROPDOWN -->
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
                                                                    <span class="desc">New release v1.2 </span>
                                                                    <span class="percent">30%</span>
                                                                </span>
                                                        <span class="progress">
                                                                    <span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                                                        <span class="sr-only">40% Complete</span>
                                                                    </span>
                                                                </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                                <span class="task">
                                                                    <span class="desc">Application deployment</span>
                                                                    <span class="percent">65%</span>
                                                                </span>
                                                        <span class="progress">
                                                                    <span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                                                                        <span class="sr-only">65% Complete</span>
                                                                    </span>
                                                                </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                                <span class="task">
                                                                    <span class="desc">Mobile app release</span>
                                                                    <span class="percent">98%</span>
                                                                </span>
                                                        <span class="progress">
                                                                    <span style="width: 98%;" class="progress-bar progress-bar-success" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100">
                                                                        <span class="sr-only">98% Complete</span>
                                                                    </span>
                                                                </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                                <span class="task">
                                                                    <span class="desc">Database migration</span>
                                                                    <span class="percent">10%</span>
                                                                </span>
                                                        <span class="progress">
                                                                    <span style="width: 10%;" class="progress-bar progress-bar-warning" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                                                        <span class="sr-only">10% Complete</span>
                                                                    </span>
                                                                </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                                <span class="task">
                                                                    <span class="desc">Web server upgrade</span>
                                                                    <span class="percent">58%</span>
                                                                </span>
                                                        <span class="progress">
                                                                    <span style="width: 58%;" class="progress-bar progress-bar-info" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100">
                                                                        <span class="sr-only">58% Complete</span>
                                                                    </span>
                                                                </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                                <span class="task">
                                                                    <span class="desc">Mobile development</span>
                                                                    <span class="percent">85%</span>
                                                                </span>
                                                        <span class="progress">
                                                                    <span style="width: 85%;" class="progress-bar progress-bar-success" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                                                        <span class="sr-only">85% Complete</span>
                                                                    </span>
                                                                </span>
                                                    </a>
                                                </li>
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
                                <!-- END TODO DROPDOWN -->
                                <li class="droddown dropdown-separator">
                                    <span class="separator"></span>
                                </li>

                                <!-- BEGIN USER LOGIN DROPDOWN -->
                                <li class="dropdown dropdown-user dropdown-dark">
                                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                        <img alt="" class="img-circle" src="./assets/img/user.png">
                                        <span class="username username-hide-mobile">Nick</span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-default">
                                        <li>
                                            <a href="page_user_profile_1.html">
                                                <i class="icon-user"></i> My Profile </a>
                                        </li>
                                        <li>
                                            <a href="app_calendar.html">
                                                <i class="icon-calendar"></i> My Calendar </a>
                                        </li>
                                        <li>
                                            <a href="app_inbox.html">
                                                <i class="icon-envelope-open"></i> My Inbox
                                                <span class="badge badge-danger"> 3 </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="app_todo_2.html">
                                                <i class="icon-rocket"></i> My Tasks
                                                <span class="badge badge-success"> 7 </span>
                                            </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="page_user_lock_1.html">
                                                <i class="icon-lock"></i> Lock Screen </a>
                                        </li>
                                        <li>
                                            <a href="page_user_login_1.html">
                                                <i class="icon-key"></i> Log Out </a>
                                        </li>
                                    </ul>
                                </li>
                                <!-- END USER LOGIN DROPDOWN -->
                                <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                                <li class="dropdown dropdown-extended quick-sidebar-toggler">
                                    <span class="sr-only">Toggle Quick Sidebar</span>
                                    <i class="icon-logout"></i>
                                </li>
                                <!-- END QUICK SIDEBAR TOGGLER -->
                            </ul>
                        </div>
                        <!-- END TOP NAVIGATION MENU -->
                    </div>
                </div>
                <!-- END HEADER TOP -->
                <!-- BEGIN HEADER MENU -->
                <div class="page-header-menu">
                    <div class="container">
                        <!-- BEGIN HEADER SEARCH BOX -->
                        <form class="search-form" action="page_general_search.html" method="GET">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" name="query">
                                <span class="input-group-btn">
                                            <a href="javascript:;" class="btn submit">
                                                <i class="icon-magnifier"></i>
                                            </a>
                                        </span>
                            </div>
                        </form>
                        <!-- END HEADER SEARCH BOX -->
                        <!-- BEGIN MEGA MENU -->
                        <!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
                        <!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
                        <div class="hor-menu  ">
                            <ul class="nav navbar-nav">
                                <li class="menu-dropdown classic-menu-dropdown ">
                                    <a href="javascript:;"> Dashboard
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="dropdown-menu pull-left">
                                        <li class=" ">
                                            <a href="index.html" class="nav-link  ">
                                                <i class="icon-bar-chart"></i> Default Dashboard
                                                <span class="badge badge-success">1</span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="dashboard_2.html" class="nav-link  ">
                                                <i class="icon-bulb"></i> Dashboard 2 </a>
                                        </li>
                                        <li class=" ">
                                            <a href="dashboard_3.html" class="nav-link  ">
                                                <i class="icon-graph"></i> Dashboard 3
                                                <span class="badge badge-danger">3</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-dropdown mega-menu-dropdown  ">
                                    <a href="javascript:;"> UI Features
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="dropdown-menu" style="min-width: 710px">
                                        <li>
                                            <div class="mega-menu-content">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <ul class="mega-menu-submenu">
                                                            <li>
                                                                <a href="ui_colors.html"> Color Library </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_general.html"> General Components </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_buttons.html"> Buttons </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_buttons_spinner.html"> Spinner Buttons </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_confirmations.html"> Popover Confirmations </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_icons.html"> Font Icons </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_socicons.html"> Social Icons </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_typography.html"> Typography </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_tabs_accordions_navs.html"> Tabs, Accordions & Navs </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_tree.html"> Tree View </a>
                                                            </li>
                                                            <li>
                                                                <a href="maps_google.html"> Google Maps </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <ul class="mega-menu-submenu">
                                                            <li>
                                                                <a href="maps_vector.html"> Vector Maps </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_timeline.html"> Timeline 1 </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_timeline_2.html"> Timeline 2 </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_timeline_horizontal.html"> Horizontal Timeline </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_page_progress_style_1.html"> Page Progress Bar - Flash </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_page_progress_style_2.html"> Page Progress Bar - Big Counter </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_blockui.html"> Block UI </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_bootstrap_growl.html"> Bootstrap Growl Notifications </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_notific8.html"> Notific8 Notifications </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_toastr.html"> Toastr Notifications </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_bootbox.html"> Bootbox Dialogs </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <ul class="mega-menu-submenu">
                                                            <li>
                                                                <a href="ui_alerts_api.html"> Metronic Alerts API </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_session_timeout.html"> Session Timeout </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_idle_timeout.html"> User Idle Timeout </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_modals.html"> Modals </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_extended_modals.html"> Extended Modals </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_tiles.html"> Tiles </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_datepaginator.html"> Date Paginator </a>
                                                            </li>
                                                            <li>
                                                                <a href="ui_nestable.html"> Nestable List </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-dropdown classic-menu-dropdown ">
                                    <a href="javascript:;"> Layouts
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="dropdown-menu pull-left">
                                        <li class=" ">
                                            <a href="layout_mega_menu_light.html" class="nav-link  "> Light Mega Menu </a>
                                        </li>
                                        <li class=" ">
                                            <a href="layout_top_bar_light.html" class="nav-link  "> Light Top Bar Dropdowns </a>
                                        </li>
                                        <li class=" ">
                                            <a href="layout_fluid_page.html" class="nav-link  "> Fluid Page </a>
                                        </li>
                                        <li class=" ">
                                            <a href="layout_top_bar_fixed.html" class="nav-link  "> Fixed Top Bar </a>
                                        </li>
                                        <li class=" ">
                                            <a href="layout_mega_menu_fixed.html" class="nav-link  "> Fixed Mega Menu </a>
                                        </li>
                                        <li class=" ">
                                            <a href="layout_disabled_menu.html" class="nav-link  "> Disabled Menu Links </a>
                                        </li>
                                        <li class=" ">
                                            <a href="layout_blank_page.html" class="nav-link  "> Blank Page </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-dropdown mega-menu-dropdown  mega-menu-full">
                                    <a href="javascript:;"> Components
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="dropdown-menu" style="min-width: ">
                                        <li>
                                            <div class="mega-menu-content">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <ul class="mega-menu-submenu">
                                                            <li>
                                                                <h3>Components 1</h3>
                                                            </li>
                                                            <li>
                                                                <a href="components_date_time_pickers.html"> Date & Time Pickers </a>
                                                            </li>
                                                            <li>
                                                                <a href="components_color_pickers.html"> Color Pickers </a>
                                                            </li>
                                                            <li>
                                                                <a href="components_select2.html"> Select2 Dropdowns </a>
                                                            </li>
                                                            <li>
                                                                <a href="components_bootstrap_select.html"> Bootstrap Select </a>
                                                            </li>
                                                            <li>
                                                                <a href="components_multi_select.html"> Multi Select </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <ul class="mega-menu-submenu">
                                                            <li>
                                                                <h3>Components 2</h3>
                                                            </li>
                                                            <li>
                                                                <a href="components_bootstrap_select_splitter.html"> Select Splitter </a>
                                                            </li>
                                                            <li>
                                                                <a href="components_typeahead.html"> Typeahead Autocomplete </a>
                                                            </li>
                                                            <li>
                                                                <a href="components_bootstrap_tagsinput.html"> Bootstrap Tagsinput </a>
                                                            </li>
                                                            <li>
                                                                <a href="components_bootstrap_switch.html"> Bootstrap Switch </a>
                                                            </li>
                                                            <li>
                                                                <a href="components_bootstrap_maxlength.html"> Bootstrap Maxlength </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <ul class="mega-menu-submenu">
                                                            <li>
                                                                <h3>Components 3</h3>
                                                            </li>
                                                            <li>
                                                                <a href="components_bootstrap_fileinput.html"> Bootstrap File Input </a>
                                                            </li>
                                                            <li>
                                                                <a href="components_bootstrap_touchspin.html"> Bootstrap Touchspin </a>
                                                            </li>
                                                            <li>
                                                                <a href="components_form_tools.html"> Form Widgets & Tools </a>
                                                            </li>
                                                            <li>
                                                                <a href="components_context_menu.html"> Context Menu </a>
                                                            </li>
                                                            <li>
                                                                <a href="components_editors.html"> Markdown & WYSIWYG Editors </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <ul class="mega-menu-submenu">
                                                            <li>
                                                                <h3>Components 4</h3>
                                                            </li>
                                                            <li>
                                                                <a href="components_code_editors.html"> Code Editors </a>
                                                            </li>
                                                            <li>
                                                                <a href="components_ion_sliders.html"> Ion Range Sliders </a>
                                                            </li>
                                                            <li>
                                                                <a href="components_noui_sliders.html"> NoUI Range Sliders </a>
                                                            </li>
                                                            <li>
                                                                <a href="components_knob_dials.html"> Knob Circle Dials </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-dropdown classic-menu-dropdown ">
                                    <a href="javascript:;"> More
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="dropdown-menu pull-left">
                                        <li class="dropdown-submenu ">
                                            <a href="javascript:;" class="nav-link nav-toggle ">
                                                <i class="icon-settings"></i> Form Stuff
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li class=" ">
                                                    <a href="form_controls.html" class="nav-link "> Bootstrap Form
                                                        <br>Controls </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="form_controls_md.html" class="nav-link "> Material Design
                                                        <br>Form Controls </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="form_validation.html" class="nav-link "> Form Validation </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="form_validation_states_md.html" class="nav-link "> Material Design
                                                        <br>Form Validation States </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="form_validation_md.html" class="nav-link "> Material Design
                                                        <br>Form Validation </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="form_layouts.html" class="nav-link "> Form Layouts </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="form_input_mask.html" class="nav-link "> Form Input Mask </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="form_editable.html" class="nav-link "> Form X-editable </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="form_wizard.html" class="nav-link "> Form Wizard </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="form_icheck.html" class="nav-link "> iCheck Controls </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="form_image_crop.html" class="nav-link "> Image Cropping </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="form_fileupload.html" class="nav-link "> Multiple File Upload </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="form_dropzone.html" class="nav-link "> Dropzone File Upload </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-submenu ">
                                            <a href="javascript:;" class="nav-link nav-toggle ">
                                                <i class="icon-briefcase"></i> Tables
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li class=" ">
                                                    <a href="table_static_basic.html" class="nav-link "> Basic Tables </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="table_static_responsive.html" class="nav-link "> Responsive Tables </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="table_bootstrap.html" class="nav-link "> Bootstrap Tables </a>
                                                </li>
                                                <li class="dropdown-submenu ">
                                                    <a href="javascript:;" class="nav-link nav-toggle"> Datatables
                                                        <span class="arrow"></span>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li class="">
                                                            <a href="table_datatables_managed.html" class="nav-link "> Managed Datatables </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="table_datatables_buttons.html" class="nav-link "> Buttons Extension </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="table_datatables_colreorder.html" class="nav-link "> Colreorder Extension </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="table_datatables_rowreorder.html" class="nav-link "> Rowreorder Extension </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="table_datatables_scroller.html" class="nav-link "> Scroller Extension </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="table_datatables_fixedheader.html" class="nav-link "> FixedHeader Extension </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="table_datatables_responsive.html" class="nav-link "> Responsive Extension </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="table_datatables_editable.html" class="nav-link "> Editable Datatables </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="table_datatables_ajax.html" class="nav-link "> Ajax Datatables </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-submenu ">
                                            <a href="?p=" class="nav-link nav-toggle ">
                                                <i class="icon-wallet"></i> Portlets
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li class=" ">
                                                    <a href="portlet_boxed.html" class="nav-link "> Boxed Portlets </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="portlet_light.html" class="nav-link "> Light Portlets </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="portlet_solid.html" class="nav-link "> Solid Portlets </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="portlet_ajax.html" class="nav-link "> Ajax Portlets </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="portlet_draggable.html" class="nav-link "> Draggable Portlets </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-submenu ">
                                            <a href="?p=" class="nav-link nav-toggle ">
                                                <i class="icon-settings"></i> Elements
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li class=" ">
                                                    <a href="elements_steps.html" class="nav-link "> Steps </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="elements_lists.html" class="nav-link "> Lists </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="elements_ribbons.html" class="nav-link "> Ribbons </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="elements_overlay.html" class="nav-link "> Overlays </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="elements_cards.html" class="nav-link "> User Cards </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-submenu ">
                                            <a href="javascript:;" class="nav-link nav-toggle ">
                                                <i class="icon-bar-chart"></i> Charts
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li class=" ">
                                                    <a href="charts_amcharts.html" class="nav-link "> amChart </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="charts_flotcharts.html" class="nav-link "> Flot Charts </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="charts_flowchart.html" class="nav-link "> Flow Charts </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="charts_google.html" class="nav-link "> Google Charts </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="charts_echarts.html" class="nav-link "> eCharts </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="charts_morris.html" class="nav-link "> Morris Charts </a>
                                                </li>
                                                <li class="dropdown-submenu ">
                                                    <a href="javascript:;" class="nav-link nav-toggle"> HighCharts
                                                        <span class="arrow"></span>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li class="">
                                                            <a href="charts_highcharts.html" class="nav-link " target="_blank"> HighCharts </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="charts_highstock.html" class="nav-link " target="_blank"> HighStock </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="charts_highmaps.html" class="nav-link " target="_blank"> HighMaps </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-dropdown classic-menu-dropdown active">
                                    <a href="javascript:;">
                                        <i class="icon-briefcase"></i> Pages
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="dropdown-menu pull-left">
                                        <li class="dropdown-submenu ">
                                            <a href="javascript:;" class="nav-link nav-toggle ">
                                                <i class="icon-basket"></i> eCommerce
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li class=" ">
                                                    <a href="ecommerce_index.html" class="nav-link ">
                                                        <i class="icon-home"></i> Dashboard </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="ecommerce_orders.html" class="nav-link ">
                                                        <i class="icon-basket"></i> Orders </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="ecommerce_orders_view.html" class="nav-link ">
                                                        <i class="icon-tag"></i> Order View </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="ecommerce_products.html" class="nav-link ">
                                                        <i class="icon-graph"></i> Products </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="ecommerce_products_edit.html" class="nav-link ">
                                                        <i class="icon-graph"></i> Product Edit </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-submenu active">
                                            <a href="javascript:;" class="nav-link nav-toggle active">
                                                <i class="icon-docs"></i> Apps
                                                <span class="arrow open"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li class=" ">
                                                    <a href="app_todo.html" class="nav-link ">
                                                        <i class="icon-clock"></i> Todo 1 </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="app_todo_2.html" class="nav-link ">
                                                        <i class="icon-check"></i> Todo 2 </a>
                                                </li>
                                                <li class=" active">
                                                    <a href="app_inbox.html" class="nav-link ">
                                                        <i class="icon-envelope"></i> Inbox </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="app_calendar.html" class="nav-link ">
                                                        <i class="icon-calendar"></i> Calendar </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="app_ticket.html" class="nav-link ">
                                                        <i class="icon-notebook"></i> Support </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-submenu ">
                                            <a href="javascript:;" class="nav-link nav-toggle ">
                                                <i class="icon-user"></i> User
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li class=" ">
                                                    <a href="page_user_profile_1.html" class="nav-link ">
                                                        <i class="icon-user"></i> Profile 1 </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="page_user_profile_1_account.html" class="nav-link ">
                                                        <i class="icon-user-female"></i> Profile 1 Account </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="page_user_profile_1_help.html" class="nav-link ">
                                                        <i class="icon-user-following"></i> Profile 1 Help </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="page_user_profile_2.html" class="nav-link ">
                                                        <i class="icon-users"></i> Profile 2 </a>
                                                </li>
                                                <li class="dropdown-submenu ">
                                                    <a href="javascript:;" class="nav-link nav-toggle">
                                                        <i class="icon-notebook"></i> Login
                                                        <span class="arrow"></span>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li class="">
                                                            <a href="page_user_login_1.html" class="nav-link " target="_blank"> Login Page 1 </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="page_user_login_2.html" class="nav-link " target="_blank"> Login Page 2 </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="page_user_login_3.html" class="nav-link " target="_blank"> Login Page 3 </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="page_user_login_4.html" class="nav-link " target="_blank"> Login Page 4 </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="page_user_login_5.html" class="nav-link " target="_blank"> Login Page 5 </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="page_user_login_6.html" class="nav-link " target="_blank"> Login Page 6 </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class=" ">
                                                    <a href="page_user_lock_1.html" class="nav-link " target="_blank">
                                                        <i class="icon-lock"></i> Lock Screen 1 </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="page_user_lock_2.html" class="nav-link " target="_blank">
                                                        <i class="icon-lock-open"></i> Lock Screen 2 </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-submenu ">
                                            <a href="javascript:;" class="nav-link nav-toggle ">
                                                <i class="icon-social-dribbble"></i> General
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li class=" ">
                                                    <a href="page_general_about.html" class="nav-link ">
                                                        <i class="icon-info"></i> About </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="page_general_contact.html" class="nav-link ">
                                                        <i class="icon-call-end"></i> Contact </a>
                                                </li>
                                                <li class="dropdown-submenu ">
                                                    <a href="javascript:;" class="nav-link nav-toggle">
                                                        <i class="icon-notebook"></i> Portfolio
                                                        <span class="arrow"></span>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li class="">
                                                            <a href="page_general_portfolio_1.html" class="nav-link "> Portfolio 1 </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="page_general_portfolio_2.html" class="nav-link "> Portfolio 2 </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="page_general_portfolio_3.html" class="nav-link "> Portfolio 3 </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="page_general_portfolio_4.html" class="nav-link "> Portfolio 4 </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="dropdown-submenu ">
                                                    <a href="javascript:;" class="nav-link nav-toggle">
                                                        <i class="icon-magnifier"></i> Search
                                                        <span class="arrow"></span>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li class="">
                                                            <a href="page_general_search.html" class="nav-link "> Search 1 </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="page_general_search_2.html" class="nav-link "> Search 2 </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="page_general_search_3.html" class="nav-link "> Search 3 </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="page_general_search_4.html" class="nav-link "> Search 4 </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="page_general_search_5.html" class="nav-link "> Search 5 </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class=" ">
                                                    <a href="page_general_pricing.html" class="nav-link ">
                                                        <i class="icon-tag"></i> Pricing </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="page_general_faq.html" class="nav-link ">
                                                        <i class="icon-wrench"></i> FAQ </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="page_general_blog.html" class="nav-link ">
                                                        <i class="icon-pencil"></i> Blog </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="page_general_blog_post.html" class="nav-link ">
                                                        <i class="icon-note"></i> Blog Post </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="page_general_invoice.html" class="nav-link ">
                                                        <i class="icon-envelope"></i> Invoice </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="page_general_invoice_2.html" class="nav-link ">
                                                        <i class="icon-envelope"></i> Invoice 2 </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-submenu ">
                                            <a href="javascript:;" class="nav-link nav-toggle ">
                                                <i class="icon-settings"></i> System
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li class=" ">
                                                    <a href="page_system_coming_soon.html" class="nav-link " target="_blank"> Coming Soon </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="page_system_404_1.html" class="nav-link "> 404 Page 1 </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="page_system_404_2.html" class="nav-link " target="_blank"> 404 Page 2 </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="page_system_404_3.html" class="nav-link " target="_blank"> 404 Page 3 </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="page_system_500_1.html" class="nav-link "> 500 Page 1 </a>
                                                </li>
                                                <li class=" ">
                                                    <a href="page_system_500_2.html" class="nav-link " target="_blank"> 500 Page 2 </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- END MEGA MENU -->
                    </div>
                </div>
                <!-- END HEADER MENU -->
            </div>
            <!-- END HEADER -->
        </div>
    </div>


    <div class="page-wrapper-row full-height">
        <div class="page-wrapper-middle">
            <div class="page-container">
                <div class="page-content-wrapper">
                    <div class="page-head">
                        <div class="container">
                            <div class="page-title">
                                <h1> Orders
                                    <small>edit</small>
                                </h1>
                            </div>
                            <div class="page-toolbar">
                                <div class="btn-group btn-theme-panel">
                                    <a href="#" class="btn dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-cog" aria-hidden="true"></i>
                                    </a>
                                    <div class="dropdown-menu theme-panel pull-right dropdown-custom hold-on-click">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <h3><?php echo $user_check; ?></h3>
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


                    <div class="page-content">
                        <div class="container">

                            <ul class="page-breadcrumb breadcrumb">
                                <li>
                                    <a href="./orders.php">Dashboard</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>Edit Order</span>
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
                                                                        <h1>General</h1>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">Order Number:
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-10">
                                                                            <input type="text" <?php if (!empty($row['order_number'])) echo 'value="' . $row['order_number'] . '"' ?> class="form-control" name="order_number" placeholder="">
                                                                            <span class="help-block"> Ex: S17-01 </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">Date:
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-10">
                                                                            <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="MM d, yyyy">
                                                                                <input type="text" <?php if (!empty($row['date_order'])) echo 'value="' . $row['date_order'] . '"' ?> class="form-control" name="date_order">
                                                                            </div>
                                                                            <span class="help-block"> at start of ordering </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">Client Name:
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-10">
                                                                            <input type="text" <?php if (!empty($row['client'])) echo 'value="' . $row['client'] . '"' ?> class="form-control" name="client" placeholder=""></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">Client Email:
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-10">
                                                                            <input type="text" <?php if (!empty($row['email'])) echo 'value="' . $row['email'] . '"' ?> class="form-control" name="email" placeholder=""></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">Description:
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-10">
                                                                            <input type="text" <?php if (!empty($row['description'])) echo 'value="' . $row['description'] . '"' ?> class="form-control" name="description" placeholder="">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">Deadline:
                                                                        </label>
                                                                        <div class="col-md-10">
                                                                            <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="DD, M d, yyyy">
                                                                                <input type="text" <?php if (!empty($row['deadline'])) echo 'value="' . $row['deadline'] . '"' ?> class="form-control" name="deadline"></div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">Product:
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-10">
                                                                            <input type="text" <?php if (!empty($row['product'])) echo 'value="' . $row['product'] . '"' ?> class="form-control" name="product" placeholder="">
                                                                            <span class="help-block"> (<a target="_blank" href="http://www.4logoapparel.com/cgi-bin/hw/hwb/chw-pseudoHome.w?hwCN=149149152156156157156&hwCNCD=cDmxUlacgndvlWFe">link to catalog</a>) </span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="general-section">
                                                                        <h1>Pricing</h1>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">Cost per item:
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-10">
                                                                            <input type="text" <?php if (!empty($row['cost_per'])) echo 'value="' . $row['cost_per'] . '"' ?> class="form-control" name="cost_per" placeholder="">
                                                                            <span class="help-block"> (<a target="_blank" href="./calculator.php">link to calculator</a>) </span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">Sizes:
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-10">
                                                                            <label class="col-md-2 control-label">Small:
                                                                                <input type="text" <?php if (!empty($row['s'])) echo 'value="' . $row['s'] . '"' ?> class="form-control" name="s" placeholder="">
                                                                            </label>
                                                                            <label class="col-md-2 control-label">Medium:
                                                                                <input type="text" <?php if (!empty($row['m'])) echo 'value="' . $row['m'] . '"' ?> class="form-control" name="m" placeholder="">
                                                                            </label>
                                                                            <label class="col-md-2 control-label">Large:
                                                                                <input type="text" <?php if (!empty($row['l'])) echo 'value="' . $row['l'] . '"' ?> class="form-control" name="l" placeholder="">
                                                                            </label>
                                                                            <label class="col-md-2 control-label">X Large:
                                                                                <input type="text" <?php if (!empty($row['xl'])) echo 'value="' . $row['xl'] . '"' ?> class="form-control" name="xl" placeholder="">
                                                                            </label>
                                                                            <label class="col-md-2 control-label">XX Large (+$1.50):
                                                                                <input type="text" <?php if (!empty($row['xxl'])) echo 'value="' . $row['xxl'] . '"' ?> class="form-control" name="xxl" placeholder="">
                                                                            </label>
                                                                            <label class="col-md-2 control-label">XXX Large (+$3):
                                                                                <input type="text" <?php if (!empty($row['xxxl'])) echo 'value="' . $row['xxxl'] . '"' ?> class="form-control" name="xxxl" placeholder="">
                                                                            </label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">Cost to make:
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-10">
                                                                            <input type="text" <?php if (!empty($row['cost_total'])) echo 'value="' . $row['cost_total'] . '"' ?> class="form-control" name="cost_total" placeholder=""></div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">Estimated revenue:
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-10">
                                                                            <input type="text" <?php if (!empty($row['revenue'])) echo 'value="' . $row['revenue'] . '"' ?> class="form-control" name="revenue" placeholder=""></div>
                                                                    </div>

                                                                    <div class="tasks-section">
                                                                        <h1>Progress</h1>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">Submitted Order to TCT:
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-10">
                                                                            <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="m/d/yyyy">
                                                                                <input type="text" <?php if (!empty($row['submitted_task'])) echo 'value="' . $row['submitted_task'] . '"' ?> class="form-control" name="submitted_task">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">Paid TCT Invoice:
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-10">
                                                                            <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="m/d/yyyy">
                                                                                <input type="text" <?php if (!empty($row['paid_invoice_task'])) echo 'value="' . $row['paid_invoice_task'] . '"' ?> class="form-control" name="paid_invoice_task">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">Sent Invoice to Client:
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-10">
                                                                            <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="m/d/yyyy">
                                                                                <input type="text" <?php if (!empty($row['sent_invoice_task'])) echo 'value="' . $row['sent_invoice_task'] . '"' ?> class="form-control" name="sent_invoice_task">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label">Received Payment:
                                                                            <span class="required"> * </span>
                                                                        </label>
                                                                        <div class="col-md-10">
                                                                            <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="m/d/yyyy">
                                                                                <input type="text" <?php if (!empty($row['received_task'])) echo 'value="' . $row['received_task'] . '"' ?> class="form-control" name="received_task">
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


                </div>


            </div>

        </div>
    </div>

<?php }
require('./php/footer.php'); ?>