<?php
@session_start();
require_once '../shared/check-login.php';
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Settings | Image Drive</title>
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


        <div class="product-status mg-b-15 mg-t-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap drp-lst">
                            <h4>Task List</h4>
                            <div class="add-product">
                                <a data-toggle="modal" data-target="#emailModel">Add Email</a>
                            </div>
                            <div class="asset-inner">
                                <table>
                                    <thead>
                                        <tr>
                                            <th> Id</th>
                                            <th>Email</th>
                                            <th>Active</th>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <td>1</td>

                                        <td>gmail.com</td>

                                        <td>
                                            <div class="material-switch">
                                                <input id="someSwitchOptionPrimary" name="someSwitchOption001" type="checkbox" />
                                                <label for="someSwitchOptionPrimary" class="label-primary"></label>
                                            </div>
                                        </td>



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


        <!-- Image Upload Modal -->
        <div class="modal fade" id="emailModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Upload Image</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert" role="alert">
                        </div>
                        <form action="upload.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="image-name" class="col-form-label">Enter Email:</label>
                                <input type="text" class="form-control" id="image-name" name="email">
                            </div>

                            <button type="submit" class="btn btn-primary" name="image_upload" value="image_upload">Add Email</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


        <?php include_once '../shared/footer-link.php'; ?>
</body>

</html>