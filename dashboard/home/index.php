<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard | Image Drive</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php require_once '../shared/head-link.php'; ?>

</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Start Left menu area -->
    <?php include_once '../shared/left-sidebar.php'; ?>

    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <?php include_once '../shared/header-top.php'; ?>


        <div class="breadcome-area mg-t-20">

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
                                        <li><span class="bread-blod">Dashboard</span>
                                        </li>
                                    </ul>
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

        <div class="product-status mg-b-15 mg-t-15">
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


            <?php include_once '../shared/footer.php'; ?>

        </div>

        <?php include_once '../shared/footer-link.php'; ?>
</body>

</html>