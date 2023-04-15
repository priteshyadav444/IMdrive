<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard V.1 | Kiaalap - Kiaalap Admin Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/educate-custon-icon.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    <style>
        .material-switch>input[type="checkbox"] {
            display: none;
        }

        .material-switch>label {
            cursor: pointer;
            height: 0px;
            position: relative;
            width: 40px;
        }

        .material-switch>label::before {
            background: rgb(0, 0, 0);
            box-shadow: inset 0px 0px 10px rgba(0, 0, 0, 0.5);
            border-radius: 8px;
            content: '';
            height: 16px;
            margin-top: -8px;
            position: absolute;
            opacity: 0.3;
            transition: all 0.4s ease-in-out;
            width: 40px;
        }

        .material-switch>label::after {
            background: rgb(255, 255, 255);
            border-radius: 16px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
            content: '';
            height: 24px;
            left: -4px;
            margin-top: -8px;
            position: absolute;
            top: -4px;
            transition: all 0.3s ease-in-out;
            width: 24px;
        }

        .material-switch>input[type="checkbox"]:checked+label::before {
            background: inherit;
            opacity: 0.5;
        }

        .material-switch>input[type="checkbox"]:checked+label::after {
            background: inherit;
            left: 20px;
        }
    </style>
</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Start Left menu area -->
    <?php include_once 'left-sidebar.php'; ?>
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                                <i class="educate-icon educate-nav"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n">
                                            <ul class="nav navbar-nav mai-top-nav">
                                                <li class="nav-item"><a href="#" class="nav-link">Home</a>
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

            <!-- Mobile Menu end -->
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="breadcome-heading">
                                            <form role="search" class="sr-input-func">
                                                <input type="text" placeholder="Search..." class="search-int form-control">
                                                <a href="#"><i class="fa fa-search"></i></a>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Dashboard V.1</span>
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
        <div class="income-order-visit-user-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="income-dashone-total reso-mg-b-30">
                            <div class="income-dashone-pro">
                                <div class="income-rate-total">
                                    <div class="price-edu-rate">
                                        <h3><span class="counter">10</span></h3>
                                    </div>

                                </div>
                                <div class="income-range">
                                    <p>Total Project Created</p>
                                    <span class="income-percentange bg-green">
                                    </span>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="income-dashone-total">
                            <div class="income-dashone-pro">
                                <div class="income-rate-total">
                                    <div class="price-edu-rate">
                                        <h3><span class="counter">5</span></h3>
                                    </div>

                                </div>
                                <div class="income-range">
                                    <p>Total Archived Project</p>
                                    <span class="income-percentange bg-green">
                                    </span>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="income-dashone-total res-mg-t-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                            <div class="income-dashone-pro">
                                <div class="income-rate-total">
                                    <div class="price-edu-rate">
                                        <h3><span class="counter">5</span></h3>
                                    </div>

                                </div>
                                <div class="income-range">
                                    <p>Total Active Project</p>
                                    <span class="income-percentange bg-green">
                                    </span>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="income-dashone-total res-mg-t-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                            <div class="income-dashone-pro">
                                <div class="income-rate-total">
                                    <div class="price-edu-rate">
                                        <h3><span class="counter">12</span></h3>
                                    </div>

                                </div>
                                <div class="income-range">
                                    <p>Total deliverables</p>
                                    <span class="income-percentange bg-green">
                                    </span>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- income order visit user End -->
        <div class="dashtwo-order-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="income-dashone-total reso-mg-b-30">
                            <div class="income-dashone-pro">
                                <div class="income-rate-total">
                                    <div class="price-edu-rate">
                                        <h3><span class="counter">10</span></h3>
                                    </div>

                                </div>
                                <div class="income-range">
                                    <p>Total number of images on platform</p>
                                    <span class="income-percentange bg-green">
                                    </span>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="income-dashone-total">
                            <div class="income-dashone-pro">
                                <div class="income-rate-total">
                                    <div class="price-edu-rate">
                                        <h3><span class="counter">5</span></h3>
                                    </div>

                                </div>
                                <div class="income-range">
                                    <p> Total number of Users on platform </p>
                                    <span class="income-percentange bg-green">
                                    </span>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="income-dashone-total res-mg-t-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                            <div class="income-dashone-pro">
                                <div class="income-rate-total">
                                    <div class="price-edu-rate">
                                        <h3><span class="counter">5</span></h3>
                                    </div>

                                </div>
                                <div class="income-range">
                                    <p>Number of teams working</p>
                                    <span class="income-percentange bg-green">
                                    </span>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="income-dashone-total res-mg-t-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                            <div class="income-dashone-pro">
                                <div class="income-rate-total">
                                    <div class="price-edu-rate">
                                        <h3><span class="counter">12</span></h3>
                                    </div>

                                </div>
                                <div class="income-range">
                                    <p>Number of assigned user to projects</p>
                                    <span class="income-percentange bg-green">
                                    </span>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <div class="product-sales-area mg-tb-30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="product-sales-chart">
                                <div class="portlet-title">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="caption pro-sl-hd">
                                                <span class="caption-subject"><b>Project State</b></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="actions graph-rp graph-rp-dl">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <ul class="list-inline cus-product-sl-rp">
                                    <li>
                                        <h5><i class="fa fa-circle" style="color: #006DF0;"></i>Project</h5>
                                    </li>
                                    <li>
                                        <h5><i class="fa fa-circle" style="color: #933EC5;"></i>Images</h5>
                                    </li>
                                    <li>
                                        <h5><i class="fa fa-circle" style="color: #65b12d;"></i>User Logged In</h5>
                                    </li>
                                    <li>
                                        <h5><i class="fa fa-circle" style="color: #65b12d;"></i>Average time spent</h5>
                                    </li>
                                </ul>
                                <div id="extra-area-chart" style="height: 356px;"></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="product-status mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="product-status-wrap drp-lst">
                                <h4>Task List</h4>
                                <div class="add-product">
                                    <a href="add-user.php">Add Task</a>
                                </div>
                                <div class="asset-inner">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Task Id</th>
                                                <th>Task Type</th>
                                                <th>Description</th>
                                                <th>Mark as completed</th>
                                                <th>Add comment</th>

                                            </tr>
                                        </thead>
                                        <tr>
                                            <td>1</td>
                                            <td>Image Upload</td>
                                            <td>John Alva</td>
                                            <td>
                                                <div class="material-switch">
                                                    <input id="someSwitchOptionPrimary" name="someSwitchOption001" type="checkbox" />
                                                    <label for="someSwitchOptionPrimary" class="label-primary"></label>
                                                </div>
                                            </td>

                                            <td>users</td>

                                        </tr>
                                </div>
                                </td>
                                </table>
                            </div>
                            <div class="custom-pagination">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product-sales-area mg-tb-30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="product-sales-chart">
                                <div id="morris-area-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="footer-copyright-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer-copy-right">
                                <p>Copyright © 2018. All rights reserved. Template by <a href="https://colorlib.com/wp/templates/">Colorlib</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jquery
		============================================ -->
        <script src="js/vendor/jquery-1.12.4.min.js"></script>
        <!-- bootstrap JS
		============================================ -->
        <script src="js/bootstrap.min.js"></script>
        <!-- wow JS
		============================================ -->
        <script src="js/wow.min.js"></script>
        <!-- price-slider JS
		============================================ -->
        <script src="js/jquery-price-slider.js"></script>
        <!-- meanmenu JS
		============================================ -->
        <script src="js/jquery.meanmenu.js"></script>
        <!-- owl.carousel JS
		============================================ -->
        <script src="js/owl.carousel.min.js"></script>
        <!-- sticky JS
		============================================ -->
        <script src="js/jquery.sticky.js"></script>
        <!-- scrollUp JS
		============================================ -->
        <script src="js/jquery.scrollUp.min.js"></script>
        <!-- counterup JS
		============================================ -->
        <script src="js/counterup/jquery.counterup.min.js"></script>
        <script src="js/counterup/waypoints.min.js"></script>
        <script src="js/counterup/counterup-active.js"></script>
        <!-- mCustomScrollbar JS
		============================================ -->
        <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
        <!-- metisMenu JS
		============================================ -->
        <script src="js/metisMenu/metisMenu.min.js"></script>
        <script src="js/metisMenu/metisMenu-active.js"></script>
        <!-- morrisjs JS
		============================================ -->
        <script src="js/morrisjs/raphael-min.js"></script>
        <script src="js/morrisjs/morris.js"></script>
        <script src="js/morrisjs/morris-active.js"></script>
        <!-- morrisjs JS
		============================================ -->
        <script src="js/sparkline/jquery.sparkline.min.js"></script>
        <script src="js/sparkline/jquery.charts-sparkline.js"></script>
        <script src="js/sparkline/sparkline-active.js"></script>
        <!-- calendar JS
		============================================ -->
        <script src="js/calendar/moment.min.js"></script>
        <script src="js/calendar/fullcalendar.min.js"></script>
        <script src="js/calendar/fullcalendar-active.js"></script>
        <!-- plugins JS
		============================================ -->
        <script src="js/plugins.js"></script>
        <!-- main JS
		============================================ -->
        <script src="js/main.js"></script>
        <!-- tawk chat JS
		============================================ -->
</body>

</html>