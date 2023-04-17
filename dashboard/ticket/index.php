<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>User - Image Drive</title>
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


    <script>
        $(document).ready(function() {
            // Handle click on Change Status button
            $(".change-status-btn").click(function() {
                // Get ID of selected row
                var id = $(this).closest("tr").find(".id").text();
                // Set ID input value in modal form
                $("#status-id").val(id);
            });

            // Handle form submission
            $("#submit-status").click(function() {
                // Get new status and comment values
                var newStatus = $("#new-status").val();
                var comment = $("#comment").val();
                // Get ID of selected row
                var id = $(".change-status-btn").closest("tr").find(".id").text();
                // Make AJAX request to update status in database
                $.ajax({
                    type: "POST",
                    url: "update_status.php",
                    data: {
                        id: id,
                        newStatus: newStatus,
                        comment: comment
                    },
                    success: function(data) {
                        // Update status cell in table
                        $(".change-status-btn").closest("tr").find(".status").text(newStatus);
                        // Close modal
                        $("#changeStatusModal").modal("hide");
                    }
                });
            });
        });
    </script>
</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Start Left menu area -->
    <?php include_once 'left-sidebar.php'; ?>
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'headertop.php' ?>
        <div class="breadcome-area">
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
                                <!-- Button to trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addTicketModal">
                                    Add Ticket
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="addTicketModal" tabindex="-1" role="dialog" aria-labelledby="addTicketModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form>
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="addTicketModalLabel">Add Ticket</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="name">Name:</label>
                                                        <input type="text" class="form-control" id="name" value="John Doe" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="reason">Reason:</label>
                                                        <select class="form-control" id="reason">
                                                            <option>Technical issue</option>
                                                            <option>Billing question</option>
                                                            <option>Other</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="message">Message:</label>
                                                        <textarea class="form-control" id="message" rows="5"></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <hr>
                            <div class="asset-inner">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Date of Creation</th>
                                            <th>Reason</th>
                                            <th>Name of Creator</th>
                                            <th>Email Address of Creator</th>
                                            <th>Message</th>
                                            <th>Response</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>2022-01-01</td>
                                            <td>Technical Issue</td>
                                            <td>John Doe</td>
                                            <td>johndoe@example.com</td>
                                            <td><a href="#" data-toggle="modal" data-target="#messageModal"><i class="glyphicon glyphicon-envelope"></i></a></td>
                                            <td><a href="#" data-toggle="modal" data-target="#responseModal"><i class="glyphicon glyphicon-comment"></i></a></td>
                                            <td>
                                                <button class="pd-setting">Resolved</button>
                                            </td>
                                            <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#changeStatusModal">Change Status</button></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>2022-01-02</td>
                                            <td>Account Inquiry</td>
                                            <td>Jane Smith</td>
                                            <td>janesmith@example.com</td>
                                            <td><a href="#" data-toggle="modal" data-target="#messageModal"><i class="glyphicon glyphicon-envelope"></i></a></td>
                                            <td><a href="#" data-toggle="modal" data-target="#responseModal"><i class="glyphicon glyphicon-comment"></i></a></td>
                                            <td>Acknowledged</td>
                                            <td>
                                                <button class="btn btn-primary change-status-btn" data-toggle="modal" data-target="#changeStatusModal">Change Status</button>


                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>2022-01-03</td>
                                            <td>Billing Issue</td>
                                            <td>Bob Johnson</td>
                                            <td>bjohnson@example.com</td>
                                            <td><a href="#" data-toggle="modal" data-target="#messageModal"><i class="glyphicon glyphicon-envelope"></i></a></td>
                                            <td><a href="#" data-toggle="modal" data-target="#responseModal"><i class="glyphicon glyphicon-comment"></i></a></td>
                                            <td>
                                                <button class="ds-setting">Active</button>
                                            </td>
                                            <td>
                                                <button class="btn btn-primary change-status-btn" data-toggle="modal" data-target="#changeStatusModal">Change Status</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- HTML for Change Status modal -->
                                <div class="modal fade" id="changeStatusModal" tabindex="-1" role="dialog" aria-labelledby="changeStatusModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="changeStatusModalLabel">Change Status</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="form-group">
                                                        <label for="new-status">New Status</label>
                                                        <select class="form-control" id="new-status">
                                                            <option value="pending">Pending</option>
                                                            <option value="acknowledged">Acknowledged</option>
                                                            <option value="resolved">Resolved</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="comment">Comment</label>
                                                        <textarea class="form-control" id="comment" rows="3"></textarea>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                <button type="button" class="btn btn-primary" id="submit-status">Submit</button>
                                            </div>
                                        </div>
                                    </div>
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



                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="footer-copyright-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/jquery.charts-sparkline.js"></script>
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