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
                            <h4>Project List</h4>
                            <div class="add-product">
                                <a href="add-project.php">Add Project</a>
                            </div>
                            <hr>
                            <div class="asset-inner">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Project Logo</th>
                                            <th>Project Name</th>
                                            <th>Description</th>
                                            <th>Deliverables</th>
                                            <th>Status</th>
                                            <th>Archive</th>
                                            <th>Edit</th>
                                            <th>Assignees</th>
                                            <th>Add Assign</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td><img src="https://taskeasy.in/assets/dist/images/logo.png" alt="Project Logo" class="img-responsive"></td>
                                            <td>

                                                <button class="btn btn-link">
                                                    <a href="projectview.php">Project A</a>
                                                </button>
                                            </td>
                                            <td>Here is Description more<button class="btn btn-link"><i class="glyphicon glyphicon-info-sign"></i></button></td>
                                            <td>Deliverable 1, Deliverable 2, Deliverable 3</td>
                                            <td>
                                                <button class="pd-setting">Active</button>
                                            </td>
                                            <td>
                                                <div class="material-switch">
                                                    <input id="someSwitchOptionPrimary" name="someSwitchOption001" type="checkbox" />
                                                    <label for="someSwitchOptionPrimary" class="label-primary"></label>
                                                </div>
                                            </td>

                                            <td>
                                                <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                            </td>
                                            </td>
                                            <td>
                                                <button class="btn btn-link" data-toggle="modal" data-target="#assigneesModal">
                                                    2 Assignees
                                                </button>
                                            </td>

                                            <td><button class="btn btn-primary" data-toggle="modal" data-target="#assignModal"><i class="glyphicon glyphicon-plus"></i></button></td>


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


                            <!-- Add this modal code after the table code -->
                            <!-- Assignees modal -->
                            <div class="modal fade" id="assigneesModal" tabindex="-1" role="dialog" aria-labelledby="assigneesModalLabel" aria-hidden="true">
                                <!-- Assignees Member modal -->

                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h5>Assigned Members:</h5>
                                                    <ul class="list-group">
                                                        <li class="list-group-item">
                                                            <div class="row">
                                                                <div class="col-xs-8">
                                                                    John Smith
                                                                </div>
                                                                <div class="col-xs-4 text-right">
                                                                    <button class="btn btn-primary" data-toggle="modal" data-target="#assignedFilesModal">View Files</button>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div class="row">
                                                                <div class="col-xs-8">
                                                                    Jane Doe
                                                                </div>
                                                                <div class="col-xs-4 text-right">
                                                                    <button class="btn btn-primary" data-toggle="modal" data-target="#assignedFilesModal">View Files</button>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div class="row">
                                                                <div class="col-xs-8">
                                                                    Bob Johnson
                                                                </div>
                                                                <div class="col-xs-4 text-right">
                                                                    <button class="btn btn-primary" data-toggle="modal" data-target="#assignedFilesModal">View Files</button>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>


                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Assignees Files modal -->

                            <div class="modal fade" id="assignedFilesModal" tabindex="-1" role="dialog" aria-labelledby="assignedFilesModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="assignedFilesModalLabel">Assigned Files for John Smith</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>List of files assigned to John Smith</p>
                                            <ul>
                                                <li>File 1</li>
                                                <li>File 2</li>
                                                <li>File 3</li>
                                            </ul>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Assign Modal -->
                            <div class="modal fade" id="assignModal" tabindex="-1" role="dialog" aria-labelledby="assignModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="assignModalLabel">Assign Project</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Assign to:</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="assignType" id="assignToTeam" checked>
                                                    <label class="form-check-label" for="assignToTeam">Team</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="assignType" id="assignToMember">
                                                    <label class="form-check-label" for="assignToMember">Team Member</label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Select Team:</label>
                                                <select id="assignList" class="form-control" multiple>
                                                    <option>Team A</option>
                                                    <option>Team B</option>
                                                    <option>Team C</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Select Team Member:</label>
                                                <select id="assignList" class="form-control" multiple>
                                                    <option>Member A</option>
                                                    <option>Member B</option>
                                                    <option>Member C</option>
                                                </select>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="assignAllFiles" id="assignAllFiles" checked>
                                                <label class="form-check-label" for="assignAllFiles">Assign All Files</label>
                                            </div>
                                            <div class="form-group">
                                                <label>Select Deliverable:</label>
                                                <select id="assignDeliverables" class="form-control">
                                                    <option>Deliverable A</option>
                                                    <option>Deliverable B</option>
                                                    <option>Deliverable C</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Search Files:</label>
                                                <input type="text" class="form-control" id="assignSearchFiles" placeholder="Enter search term...">
                                            </div>

                                            <label>Select Files:</label>
                                            <select id="assignFiles" class="form-control" multiple>
                                                <option>File A</option>
                                                <option>File B</option>
                                                <option>File C</option>
                                            </select>

                                            <div class="form-group">
                                                <button type="button" class="btn btn-primary" id="addFileBtn">Add File</button>
                                            </div>

                                            <!-- Add Task Button -->
                                            <div class="form-group">
                                                <label for="taskType">Task Type*</label>
                                                <select id="assignList" class="form-control" id="taskType" placeholder="Enter Task Type">
                                                    <option>Task A</option>
                                                    <option>Task B</option>
                                                    <option>Task C</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="taskDescription">Task Description*</label>
                                                <textarea class="form-control" id="taskDescription" rows="3" placeholder="Enter Task Description"></textarea>
                                            </div>
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#assignModalTask">
                                                <i class="glyphicon glyphicon-plus"></i> Add Task
                                            </button>

                                        </div>
                                        <!-- Assign Modal  Footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            <button type="button" class="btn btn-primary" id="assignBtn">Assign</button>
                                        </div>
                                    </div>

                                </div>
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