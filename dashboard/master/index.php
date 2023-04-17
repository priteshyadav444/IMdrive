<?php @session_start();
require_once '../shared/check-login.php'; ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Master - Image Drive</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
    require_once '../shared/head-link.php';
    ?>



</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Start Left menu area -->
    <?php
    include_once '../shared/left-sidebar.php';


    ?>
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <?php include_once '../shared/logolink.php'; ?>
        <div class="header-advance-area">
            <?php include_once '../shared/navbar.php'; ?>

            <!-- Mobile Menu start -->

            <!-- Mobile Menu end -->
            <div class="breadcome-area mg-t-20">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list single-page-breadcome">
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
                                            <li><span class="bread-blod">Master</span>
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

        <div class="product-status mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <?php
                    if (isset($_SESSION[SessionConfig::PRIVILAGS][Privilege::VIEW_DELIVERABLE]) && $_SESSION[SessionConfig::PRIVILAGS][Privilege::VIEW_DELIVERABLE]) {
                        echo '
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="product-status-wrap drp-lst">
                            <h4>Deliverable List</h4>
                            <div class="add-product">
                                <a href="add-master.php?type=deliverable">Add Deliverable</a>
                            </div>
                            <div class="asset-inner">
                                <table>
                                    <tr>
                                        <th>Deliverable Name</th>
                                        <th>Edit</th>

                                    </tr>
                                    <tr>
                                        <td>Customer Login Form</td>
                                        <td>
                                            <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        </td>

                                    </tr>
                                </table>
                            </div>

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
                    ';
                    }
                    if (isset($_SESSION[SessionConfig::PRIVILAGS][Privilege::VIEW_TEAM]) && $_SESSION[SessionConfig::PRIVILAGS][Privilege::VIEW_TEAM]) {
                        echo '
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="product-status-wrap drp-lst">
                            <h4>Team List</h4>
                            <div class="add-product">
                                <a href="add-master.php?type=team">Add Team</a>
                            </div>
                            <div class="asset-inner">
                                <table>
                                    <tr>
                                        <th>Team Name</th>
                                        <th>Edit</th>

                                    </tr>
                                    <tr>
                                        <td>PHP Team</td>
                                        <td>
                                            <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        </td>

                                    </tr>
                                </table>
                            </div>

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
                    ';
                    }
                    ?>

                </div>

            </div>



            <div class="container-fluid mg-t-15">
                <div class="row">
                    <?php
                    if (isset($_SESSION[SessionConfig::PRIVILAGS][Privilege::VIEW_TEAM]) && $_SESSION[SessionConfig::PRIVILAGS][Privilege::VIEW_TEAM]) {
                        echo '
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="product-status-wrap drp-lst">
                            <h4>Task Type List</h4>
                            <div class="add-product">
                                <a href="add-master.php?type=task">Add Task Type</a>
                            </div>
                            <div class="asset-inner">
                                <table>
                                    <tr>
                                        <th>Task Type Name</th>
                                        <th>Edit</th>
                                        <th>Status</th>

                                    </tr>
                                    <tr>
                                        <td>Upload Images</td>
                                        <td>
                                            <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        </td>
                                        <td>
                                            <div class="material-switch">
                                                <input id="someSwitchOptionPrimary" name="someSwitchOption001" type="checkbox" />
                                                <label for="someSwitchOptionPrimary" class="label-primary"></label>
                                            </div>
                                        </td>

                                    </tr>
                                </table>
                            </div>

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
                ';
                    }
                    if (isset($_SESSION[SessionConfig::PRIVILAGS][Privilege::VIEW_TICKET_REASON]) && $_SESSION[SessionConfig::PRIVILAGS][Privilege::VIEW_TICKET_REASON]) {
                        echo '
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="product-status-wrap drp-lst">
                            <h4>Ticket Reason</h4>
                            <div class="add-product">
                                <a href="add-master.php?type=ticket_reason">Add Reason</a>
                            </div>
                            <div class="asset-inner">
                                <table>
                                    <tr>
                                        <th>Reason</th>
                                        <th>Edit</th>

                                    </tr>
                                    <tr>
                                        <td>Unable to Upload Images</td>
                                        <td>
                                            <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        </td>
                                        <td>
                                            <div class="material-switch">
                                                <input id="someSwitchOptionPrimary" name="someSwitchOption001" type="checkbox" checked />
                                                <label for="someSwitchOptionPrimary" class="label-primary"></label>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>

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
                        ';
                    }
                    ?>
                </div>

            </div>
        </div>


        <?php include_once '../shared/footer.php'; ?>
        <?php include_once '../shared/footer-link.php'; ?>
</body>

</html>