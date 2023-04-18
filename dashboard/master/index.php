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
    require_once "../database/Connection.php";
    require_once "../database/User.php";
    ?>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type=" text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script type=" text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>



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
            <?php
            $connection = new Connection();
            $user = new User($connection->getConnection());


            $hasPermissionToViewDeliverable = false;
            $hasPermissionToCreateDeliverable = false;
            $hasPermissionToUpdateDeliverable = false;






            if (isset($_SESSION[SessionConfig::PRIVILAGS][Privilege::VIEW_DELIVERABLE]) && $_SESSION[SessionConfig::PRIVILAGS][Privilege::VIEW_DELIVERABLE]) {
                $hasPermissionToViewDeliverable = true;
            }

            if (isset($_SESSION[SessionConfig::PRIVILAGS][Privilege::CREATE_DELIVERABLE]) && $_SESSION[SessionConfig::PRIVILAGS][Privilege::CREATE_DELIVERABLE]) {
                $hasPermissionToCreateDeliverable = true;
            }

            if (isset($_SESSION[SessionConfig::PRIVILAGS][Privilege::UPDATE_DELIVERABLE]) && $_SESSION[SessionConfig::PRIVILAGS][Privilege::UPDATE_DELIVERABLE]) {
                $hasPermissionToUpdateDeliverable = true;
            }

            $hasPermissionToViewTask = false;
            $hasPermissionToCreateTask = false;
            $hasPermissionToUpdateTask = false;



            if (isset($_SESSION[SessionConfig::PRIVILAGS][Privilege::VIEW_DELIVERABLE]) && $_SESSION[SessionConfig::PRIVILAGS][Privilege::VIEW_DELIVERABLE]) {
                $hasPermissionToViewTask = true;
            }

            if (isset($_SESSION[SessionConfig::PRIVILAGS][Privilege::CREATE_DELIVERABLE]) && $_SESSION[SessionConfig::PRIVILAGS][Privilege::CREATE_DELIVERABLE]) {
                $hasPermissionToCreateTask = true;
            }

            if (isset($_SESSION[SessionConfig::PRIVILAGS][Privilege::UPDATE_DELIVERABLE]) && $_SESSION[SessionConfig::PRIVILAGS][Privilege::UPDATE_DELIVERABLE]) {
                $hasPermissionToUpdateTask = true;
            }

            $hasPermissionToViewTeam = false;
            $hasPermissionToCreateTeam = false;
            $hasPermissionToUpdateTeam = false;

            if (isset($_SESSION[SessionConfig::PRIVILAGS][Privilege::VIEW_TEAM]) && $_SESSION[SessionConfig::PRIVILAGS][Privilege::VIEW_TEAM]) {
                $hasPermissionToViewTeam = true;
            }

            if (isset($_SESSION[SessionConfig::PRIVILAGS][Privilege::CREATE_TEAM]) && $_SESSION[SessionConfig::PRIVILAGS][Privilege::CREATE_TEAM]) {
                $hasPermissionToCreateTeam = true;
            }

            if (isset($_SESSION[SessionConfig::PRIVILAGS][Privilege::UPDATE_TEAM]) && $_SESSION[SessionConfig::PRIVILAGS][Privilege::UPDATE_TEAM]) {
                $hasPermissionToUpdateTeam = true;
            }


            $hasPermissionToViewTicket = false;
            $hasPermissionToCreateTicket = false;
            $hasPermissionToUpdateTicket = false;

            if (isset($_SESSION[SessionConfig::PRIVILAGS][Privilege::VIEW_TICKET_REASON]) && $_SESSION[SessionConfig::PRIVILAGS][Privilege::VIEW_TICKET_REASON]) {
                $hasPermissionToViewTicket = true;
            }

            if (isset($_SESSION[SessionConfig::PRIVILAGS][Privilege::CREATE_TICKET_REASON]) && $_SESSION[SessionConfig::PRIVILAGS][Privilege::CREATE_TICKET_REASON]) {
                $hasPermissionToCreateTicket = true;
            }

            if (isset($_SESSION[SessionConfig::PRIVILAGS][Privilege::UPDATE_TICKET_REASON]) && $_SESSION[SessionConfig::PRIVILAGS][Privilege::UPDATE_TICKET_REASON]) {
                $hasPermissionToUpdateTicket = true;
            }

            ?>
            <!-- Mobile Menu end -->
            <div class="breadcome-area mg-t-20">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list single-page-breadcome">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="breadcome-heading">
                                            <h4 class="sr-input-func">Master List</h4>
                                            <!-- <form role="search" class="sr-input-func">
                                                <input type="text" placeholder="Search..." class="search-int form-control">
                                                <a href="#"><i class="fa fa-search"></i></a>
                                            </form> -->
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
            <!-- Deliverable List -->
            <div class="container-fluid">
                <div class="row">
                    <?php
                    if ($hasPermissionToViewDeliverable) {
                        echo '
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap drp-lst">
                            <h4>Deliverable List</h4>
                            <div class="add-product">
                            ';
                        if ($hasPermissionToCreateDeliverable) {
                            echo '<a href="add-master.php?type=deliverable">Add Deliverable</a>';
                        }
                        echo '
                            </div>
                            <div class="asset-inner">

                                <table id="deliverableTable" >
                                    <thead>
                                        <tr>
                                            <th>Deliverable Name</th>
                                            ';
                        if ($hasPermissionToUpdateDeliverable) {
                            echo "<th>Edit</th>";
                        }
                        echo '
                                          
                                        </tr>
                                    </thead>
                             
                        ';
                        $row = $user->getAllDelverable();
                        foreach ($row as $data) {
                            echo "<tr id=" . $data['deliverable_id'] . "> 
                            <td>  
                            <span class='editSpan deliverable_name'>" . $data['deliverable_name'] . "</span>
                            <input class='form-control editInput deliverable_name' type='text' name='deliverable_name' value='" . $data['deliverable_name'] . "' style='display: none;'>
                            </td>
                            <td>
                            ";
                            if ($hasPermissionToUpdateDeliverable) {
                                echo "<button data-toggle='tooltip' title='Edit' class='pd-setting-ed editBtn'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></button>
                                <button type='button' class='btn btn-success saveBtn' style='display: none;'>Save</button>
                                <button type='button' class='btn btn-secondary cancelBtn' style='display: none;'>Cancel</button>";
                            }
                            echo "
                            </td>
                            </tr>";
                        }

                        echo '
                                 
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


            <!-- Team List -->
            <div class="container-fluid mg-t-15">
                <div class="row">
                    <?php
                    if ($hasPermissionToViewTeam) {
                        echo '
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap drp-lst">
                            <h4>Team List</h4>
                            <div class="add-product">
                            ';
                        if ($hasPermissionToCreateTeam) {
                            echo '<a href="add-master.php?type=team">Add Team</a>';
                        }
                        echo '
                            </div>
                            <div class="asset-inner">

                                <table id="teamTable" >
                                    <thead>
                                        <tr>
                                            <th>Team Name</th>
                                            ';
                        if ($hasPermissionToUpdateTeam) {
                            echo "<th>Edit</th>";
                        }
                        echo '
                                          
                                        </tr>
                                    </thead>
                             
                        ';
                        $row = $user->getAllTeam();
                        foreach ($row as $data) {
                            echo "<tr id=" . $data['team_id'] . "> 
                            <td>  
                            <span class='editSpan team_name'>" . $data['team_name'] . "</span>
                            <input class='form-control editInput team_name' type='text' name='team_name' value='" . $data['team_name'] . "' style='display: none;'>
                            </td>
                            <td>
                            ";
                            if ($hasPermissionToUpdateTeam) {
                                echo "<button data-toggle='tooltip' title='Edit' class='pd-setting-ed editBtn'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></button>
                                <button type='button' class='btn btn-success saveBtn' style='display: none;'>Save</button>
                                <button type='button' class='btn btn-secondary cancelBtn' style='display: none;'>Cancel</button>";
                            }
                            echo "
                            </td>
                            </tr>";
                        }

                        echo '
                                 
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

            <!-- Task List -->
            <div class="container-fluid mg-t-15">
                <div class="row">
                    <?php
                    if ($hasPermissionToViewTask) {
                        echo '
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap drp-lst">
                        <h4>Task Type List</h4>
                            <div class="add-product">
                            ';
                        if ($hasPermissionToCreateTask) {
                            echo '<a href="add-master.php?type=task">Add Task Type</a>';
                        }
                        echo '
                            </div>
                            <div class="asset-inner">

                                <table id="taskTable" >
                                    <thead>
                                        <tr>
                                        <th>Task Type Name</th>
                                            ';
                        if ($hasPermissionToUpdateTask) {
                            echo "<th>Edit</th>";
                        }
                        echo '
                                    <th>Status</th> 
                                        </tr>
                                    </thead>
                             
                        ';
                        $row = $user->getAllTask();
                        foreach ($row as $data) {
                            echo "<tr id=" . $data['task_type_id'] . "> 
                            <td>  
                            <span class='editSpan task_type_name'>" . $data['task_type_name'] . "</span>
                            <input class='form-control editInput task_type_name' type='text' name='task_type_name' value='" . $data['task_type_name'] . "' style='display: none;'>
                            </td>
                           
                           
                            ";
                            if ($hasPermissionToUpdateTask) {
                                $checkBoxState = "unchecked";
                                if ($data['task_type_status']) {
                                    $checkBoxState =  "checked";
                                }
                                echo "  
                                <td>
                                <div class='material-switch'>
                                                <input id='someSwitchOptionPrimary{$data['task_type_id']}'  class='onToggle task_type_status' name='someSwitchOption{$data['task_type_id']}' type='checkbox' " . $checkBoxState . " />
                                                <label for='someSwitchOptionPrimary{$data['task_type_id']}' class='label-primary'></label>
                                </div>
                                </td>
                                <td>
                                <button data-toggle='tooltip' title='Edit' class='pd-setting-ed editBtn'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></button>
                                <button type='button' class='btn btn-success saveBtn' style='display: none;'>Save</button>
                                <button type='button' class='btn btn-secondary cancelBtn' style='display: none;'>Cancel</button>
                                </td>
                                ";
                            }
                            echo "
                         
                            </tr>";
                        }

                        echo '
                                 
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


            <!-- Ticket List List -->
            <div class="container-fluid mg-t-15">
                <div class="row">
                    <?php
                    if ($hasPermissionToViewTicket) {
                        echo '
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap drp-lst">
                        <h4>Ticket Reason</h4>
                            <div class="add-product">
                            ';
                        if ($hasPermissionToCreateTicket) {
                            echo '<a href="add-master.php?type=ticket_reason">Add Reason</a>';
                        }
                        echo '
                            </div>
                            <div class="asset-inner">

                                <table id="reasonTable" >
                                    <thead>
                                        <tr>
                                        <th>Reason</th>
                                            ';
                        if ($hasPermissionToUpdateTicket) {
                            echo "<th>Edit</th>";
                        }
                        echo '
                                    <th>Status</th> 
                                        </tr>
                                    </thead>
                             
                        ';
                        $row = $user->getAllTicketReason();
                        foreach ($row as $data) {
                            echo "<tr id=" . $data['reason_id'] . "> 
                            <td>  
                            <span class='editSpan content'>" . $data['content'] . "</span>
                            <input class='form-control editInput content' type='text' name='content' value='" . $data['content'] . "' style='display: none;'>
                            </td>
                           
                           
                            ";
                            if ($hasPermissionToUpdateTask) {
                                $checkBoxState = "unchecked";
                                if ($data['reason_status']) {
                                    $checkBoxState =  "checked";
                                }
                                echo "  
                                <td>
                                <div class='material-switch'>
                                                <input id='someSwitchOptionPrimaryreason{$data['reason_id']}'  class='onToggle task_type_status' name='someSwitchOptionreason{$data['reason_id']}' type='checkbox' " . $checkBoxState . " />
                                                <label for='someSwitchOptionPrimaryreason{$data['reason_id']}' class='label-primary'></label>
                                </div>
                                </td>
                                <td>
                                <button data-toggle='tooltip' title='Edit' class='pd-setting-ed editBtn'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></button>
                                <button type='button' class='btn btn-success saveBtn' style='display: none;'>Save</button>
                                <button type='button' class='btn btn-secondary cancelBtn' style='display: none;'>Cancel</button>
                                </td>
                                ";
                            }
                            echo "
                         
                            </tr>";
                        }

                        echo '
                                 
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

    </div>


    <?php include_once '../shared/footer-link.php'; ?>

    <script type="text/javascript">
        $.noConflict();



        $('#deliverableTable').DataTable({
            "paging": false
        });

        $('#taskTable').DataTable({
            "paging": false
        });

        $('#reasonTable').DataTable({
            "paging": false
        });

        $('#teamTable').DataTable({
            "paging": false
        });

        $('.editBtn').on('click', function() {

            $(this).closest("tr").find(".editSpan").hide();

            //show edit input
            $(this).closest("tr").find(".editInput").show();

            //hide edit button
            $(this).closest("tr").find(".editBtn").hide();

            //hide delete button
            $(this).closest("tr").find(".deleteBtn").hide();

            //show save button
            $(this).closest("tr").find(".saveBtn").show();

            //show cancel button
            $(this).closest("tr").find(".cancelBtn").show();
        });

        $('.saveBtn').on('click', function() {

            var trObj = $(this).closest("tr");
            var ID = $(this).closest("tr").attr('id');

            var inputData = $(this).closest("tr").find(".editInput").serialize();

            const editEntity = inputData.substring(0, inputData.indexOf("="));

            $.ajax({
                type: 'POST',
                url: 'update.php',
                dataType: "json",
                data: 'action=edit&id=' + ID + '&' + inputData,

                success: function(response) {
                    if (response.status == 1) {

                        trObj.find(".editSpan." + editEntity).text(response.data);
                        trObj.find(".editInput." + editEntity).val(response.data);

                        trObj.find(".editInput").hide();
                        trObj.find(".editSpan").show();
                        trObj.find(".saveBtn").hide();
                        trObj.find(".cancelBtn").hide();
                        trObj.find(".editBtn").show();
                        trObj.find(".deleteBtn").show();
                    } else {
                        alert(response.msg);
                    }
                    $('#userData').css('opacity', '');
                }
            });
        });

        $('.cancelBtn').on('click', function() {
            //hide & show buttons
            $(this).closest("tr").find(".saveBtn").hide();
            $(this).closest("tr").find(".cancelBtn").hide();
            $(this).closest("tr").find(".confirmBtn").hide();
            $(this).closest("tr").find(".editBtn").show();
            $(this).closest("tr").find(".deleteBtn").show();

            //hide input and show values
            $(this).closest("tr").find(".editInput").hide();
            $(this).closest("tr").find(".editSpan").show();
        });

        $('.deleteBtn').on('click', function() {
            //hide edit & delete button
            $(this).closest("tr").find(".editBtn").hide();
            $(this).closest("tr").find(".deleteBtn").hide();

            //show confirm & cancel button
            $(this).closest("tr").find(".confirmBtn").show();
            $(this).closest("tr").find(".cancelBtn").show();
        });

        $('.onToggle').on('click', function() {
            //hide edit & delete button
            var trObj = $(this).closest("tr");
            var ID = $(this).closest("tr").attr('id');

            console.log(trObj)

            var inputData = $(this).closest("tr").find(".editInput").serialize();

            const editEntity = inputData.substring(0, inputData.indexOf("="));
            console.log(editEntity);
            console.log(inputData);
        });
    </script>
</body>

</html>