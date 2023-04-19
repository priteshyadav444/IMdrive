<?php
@session_start();
require_once '../shared/check-login.php';
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>All Project - Image Drive</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    require_once '../shared/head-link.php';
    require_once "../database/Connection.php";
    require_once "../database/User.php";
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
    <?php
    $connection = new Connection();
    $user = new User($connection->getConnection());

    $hasPermissionToViewProject = false;
    $hasPermissionToCreateProject = false;
    $hasPermissionToUpdateProject = false;

    if (isset($_SESSION[SessionConfig::PRIVILAGS][Privilege::VIEW_PROJECT]) && $_SESSION[SessionConfig::PRIVILAGS][Privilege::VIEW_PROJECT]) {
        $hasPermissionToViewProject = true;
    }

    if (isset($_SESSION[SessionConfig::PRIVILAGS][Privilege::CREATE_PROJECT]) && $_SESSION[SessionConfig::PRIVILAGS][Privilege::CREATE_PROJECT]) {
        $hasPermissionToCreateProject = true;
    }

    if (isset($_SESSION[SessionConfig::PRIVILAGS][Privilege::UPDATE_PROJECT]) && $_SESSION[SessionConfig::PRIVILAGS][Privilege::UPDATE_PROJECT]) {
        $hasPermissionToUpdateProject = true;
    }

    $result = $user->getAllProject();
    $row = "";
    foreach ($result as $data) {
        if (!$hasPermissionToUpdateProject) {
            $data['is_edit_visible'] = 'none';
        } else {
            $data['is_edit_visible'] = '';
        }

        if ($data['project_status_id'] == 1) {
            $data['project_status_html'] = '<button class="pd-setting">Active</button>';
            $data['status_checked'] = "checked";
        } else {
            $data['project_status_html'] = '<button class="ds-setting">InActice</button>';
            $data['status_checked'] = "";
        }


        if ($data['is_archive'] == 1) {
            $data['is_archive_checked'] = "checked";
        } else {
            $data['is_archive_checked'] = "";
        }

        $row = $row . '<tr>
        <td>' . $data["project_id"] . '</td>
        <td width="250px" height="150px"><img src=..' . $data["logo_url"] . ' alt=' . $data["name"] . '  ></td>
        <td>
        <a href="deliverable.php?id=' . $data["project_id"] . '">
            <button class="btn btn-link">
                ' . $data["name"] . '
            </button>
        </a>
        </td>
        <td> ' . $data["description"] . '<button class="btn btn-link"><i class="glyphicon glyphicon-info-sign"></i></button></td>
        <td> ' . $data["deliverables"] . ' </td>
        <td>
            ' .  $data['project_status_html'] . '
        </td>
        <td style="display:' . $data['is_edit_visible'] . ';">
            <div class="material-switch">
                <input type="checkbox" id="status' . $data["project_id"] . '"  name="status' . $data["project_id"] . '"    ' . $data['status_checked'] . '/>
                <label for="status' . $data["project_id"] . '" class="label-primary"></label>
            </div>
        </td>
        <td style="display:' . $data['is_edit_visible'] . ';">
            <div class="material-switch">
                <input type="checkbox" id="archive' . $data["project_id"] . '" name="archive' . $data["project_id"] . '"   ' . $data['is_archive_checked'] . '/>
                <label for="archive' . $data["project_id"] . '" class="label-primary"></label>
            </div>
        </td>
        
        <td style="display:' . $data['is_edit_visible'] . ';">
            <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
        </td>
        </td>
        <td >
            <button class="btn btn-link" data-toggle="modal" data-target="#assigneesModal">
            ' . $data["member_count"] . ' Assignees
            </button>
        </td>

        <td style="display:' . $data['is_edit_visible'] . ';"><button class="btn btn-primary" data-toggle="modal" data-target="#assignModal"><i class="glyphicon glyphicon-plus"></i></button></td>


    </tr>';
    }


    ?>
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
                                        <li><span class="bread-blod">Project</span>
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

                                <?php
                                if ($hasPermissionToCreateProject) {
                                    echo '<a href="add-project.php">Add Project</a>';
                                }
                                ?>

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
                                            <th>Change Status</th>
                                            <th>Archive</th>
                                            <?php
                                            if ($hasPermissionToUpdateProject) {
                                                echo " <th>Edit</th>";
                                            }
                                            ?>

                                            <th>Assignees</th>
                                            <th>Add Assign</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        echo $row;
                                        ?>
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

                            <?php include_once 'dailog.php'; ?>
                        </div>



                    </div>

                </div>
            </div>
        </div>
    </div>


    <?php include_once '../shared/footer.php'; ?>
    <?php include_once '../shared/footer-link.php'; ?>

</body>

</html>