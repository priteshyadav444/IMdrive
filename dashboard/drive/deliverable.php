<?php
@session_start();
require_once '../shared/check-login.php';
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Deliverables - Image Drive</title>
    <?php
    require_once '../shared/head-link.php';
    require_once '../Config/SessionConfig.php';
    include_once '../Config/Privilege.php';
    require_once "../library/validation/vendor/autoload.php";
    require_once "../database/Connection.php";
    require_once "../database/User.php";
    ?>
    </style>
</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Start Left menu area -->

    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <?php include_once '../shared/left-sidebar.php';
    ?>
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <?php include_once '../shared/logolink.php'; ?>
        <div class="header-advance-area">
            <?php include_once '../shared/navbar.php'; ?>
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
                                            <li><a href="#">Drive</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Deliverable Name</span>
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
                            <div class="container">
                                <h2>Project Name</h2>
                                <hr>
                                <div class="panel panel-default">
                                    <div class="panel-heading">Deliverables</div>
                                    <div class="panel-body">

                                        <div class="list-group">
                                            <a href="files.php">
                                                <span class="glyphicon glyphicon-folder-close" class="list-group-item"></span> Deliverable 1
                                            </a>
                                            <span class="pull-right mr-5" class="list-group-item">
                                                <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#assignModal"><i class="glyphicon glyphicon-plus"></i> Assign</button>
                                            </span>

                                            <span class="pull-right" class="list-group-item">
                                                <button class="btn btn-link btn-xs" data-toggle="modal" data-target="#assigneesModal">
                                                    2 Assignees
                                                </button>
                                            </span>


                                            <td>

                                            </td>


                                        </div>

                                        <div class="list-group">
                                            <a href="files.php">
                                                <span class="glyphicon glyphicon-folder-close" class="list-group-item"></span> Deliverable 2
                                            </a>

                                            <span class="pull-right mr-5" class="list-group-item">
                                                <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#assignModal"><i class="glyphicon glyphicon-plus"></i> Assign</button>
                                            </span>
                                            <span class="pull-right" class="list-group-item">
                                                <button class="btn btn-link btn-xs" data-toggle="modal" data-target="#assigneesModal">
                                                    2 Assignees
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>


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

                                <?php include_once 'dailog.php'; ?>

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