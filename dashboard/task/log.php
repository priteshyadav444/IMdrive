<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Task Log | Image Drive</title>
    <?php
    require_once '../shared/head-link.php';
    ?>

    <script>
        document.getElementById("addFileBtn").addEventListener("click", function() {
            var selectedFiles = [];
            var selectBox = document.getElementById("assignFiles");
            for (var i = 0; i < selectBox.options.length; i++) {
                if (selectBox.options[i].selected) {
                    selectedFiles.push(selectBox.options[i].text);
                }
            }
            // Perform add action with the selected files
        });
    </script>
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
                                            <li><span class="bread-blod">User</span>
                                            </li>
                                        </ul>
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
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="product-status-wrap drp-lst">
                                <h4>Task Logs</h4>
                                <div class="add-product">
                                </div>
                                <hr>
                                <div class="asset-inner">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Task ID</th>
                                                <th>Task Type</th>
                                                <th>Description</th>
                                                <th>Task Created Date</th>
                                                <th>Task Created By</th>
                                                <th>Task Created for</th>
                                                <th>Assiner Team</th>
                                                <th>Status</th>
                                                <th>Comment</th>
                                                <th>Completed on</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Image Upload</td>
                                                <td>Here is Description more<button class="btn btn-link"><i class="glyphicon glyphicon-info-sign"></i></button></td>
                                                <td>12/02/2012 </td>
                                                <td>Pritesh </td>
                                                <td>Ramesh </td>
                                                <td>FrontEnd </td>
                                                <td>
                                                    <button class="pd-setting">Completed</button>
                                                </td>
                                                <td>Here is Description more<button class="btn btn-link"><i class="glyphicon glyphicon-info-sign"></i></button></td>
                                                <td>12/02/2012 </td>

                                            </tr>
                                            <!-- More rows for other projects -->
                                        </tbody>
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
            </div>
        </div>
    </div>
    <?php include_once '../shared/footer.php'; ?>
    </div>

    <?php include_once '../shared/footer-link.php'; ?>
</body>

</html>