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
            $data['project_status_html'] = '<button class="ds-setting">In Active</button>';
            $data['status_checked'] = "";
        }


        if ($data['is_archive'] == 1) {
            $data['is_archive_checked'] = "checked";
        } else {
            $data['is_archive_checked'] = "";
        }

        $row = $row . '<tr id=' . $data["project_id"] . '>
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
        <td id="StatusText">
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
                <input type="checkbox"  id="archive' . $data["project_id"] . '" name="archive' . $data["project_id"] . '"   ' . $data['is_archive_checked'] . '/>
                <label for="archive' . $data["project_id"] . '" class="label-primary"></label>
            </div>
        </td>
        
        <td style="display:' . $data['is_edit_visible'] . ';">
            <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
        </td>
        </td>
        <td>
            <button class="btn btn-link" data-toggle="modal" data-target="#assignedMembersList" id=' . $data["project_id"] . ' >
            ' . $data["member_count"] . ' Assignees
            </button>
        </td>

        <td style="display:' . $data['is_edit_visible'] . ';"><button class="btn btn-primary btn-assign" data-toggle="modal" data-target="#assignModal" id=' . $data["project_id"] . ' ><i class="glyphicon glyphicon-plus"></i></button></td>
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

    <script type="text/javascript">
        $(document).ready(function() {
            var activeProject;
            $('input[type="checkbox"][name^="archive"]').on("change", function() {
                var Archive = $(this).is(":checked");

                var projectId = $(this).closest("tr").attr('id');
                var checkbox = $(this);


                if (Archive == true) {
                    Archive = 1;
                } else {
                    Archive = 0;
                }

                $.ajax({
                    url: "update_project.php",
                    method: "POST",
                    data: {
                        projectId: projectId,
                        Archive: Archive
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.status == "success") {
                            // Remove the row from the table
                            checkbox.closest('tr').hide();
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
            });


            $('input[type="checkbox"][name^="status"]').on("change", function() {
                var projectId = $(this).closest("tr").attr('id');
                var newStatus = $(this).is(":checked");

                $.ajax({
                    url: "update_project.php",
                    method: "POST",
                    data: {
                        projectId: projectId,
                        newActiveStatus: newStatus
                    },
                    dataType: "json",
                    success: function(response) {

                        // $('button.pd-setting').removeClass('pd-setting').addClass('sd-setting').text('In Active');

                        // var row = $('#' + projectId);
                        // if (response.statusId == 1) {
                        //     row.find('#StatusText').text('Active');
                        // } else {
                        //     row.find('#StatusText').text('In Active');
                        // }

                        // // Update the checkbox state
                        // row.find('input[type="checkbox"][name^="status"]').prop('checked', newStatus);
                        // // Update the button class
                        // row.find('.pd-setting').removeClass('pd-setting').addClass('ds-setting');



                        var row = $('#' + projectId);
                        if (response.statusId == 1) {
                            row.find('#StatusText').html('<button class="pd-setting">Active</button>');
                        } else {
                            row.find('#StatusText').html('<button class="ds-setting">In Active</button>');
                        }


                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
            });

            $(document).on('click', '.btn-link', function() {
                var projectId = $(this).attr('id');
                $.ajax({
                    url: 'getAssignerDetails.php?id=' + projectId,
                    type: 'POST',
                    data: {
                        project_id: projectId
                    },
                    success: function(response) {
                        // Handle the response from the API, e.g. display the member list in a modal
                        var membersData = response;
                        console.log(response);

                        var assignedMembersModal = $('#assignedMembersList');

                        var assignedMembersList = assignedMembersModal.find('ul');
                        assignedMembersList.empty();

                        // Loop through each member in the data array
                        $.each(membersData, function(index, member) {
                            // Create a new list item for the member
                            // Create a new list item for the member
                            var listItem = $('<li>').addClass('list-group-item');

                            // Create a row to contain the name and button
                            var row = $('<div>').addClass('row');
                            listItem.append(row);

                            // Add the member's name to the row
                            var nameCol = $('<div>').addClass('col-xs-8');
                            var memberName = $('<span>').text(member.name);
                            nameCol.append(memberName);
                            row.append(nameCol);

                            // Add the button to view the member's assigned files to the row
                            var buttonCol = $('<div>').addClass('col-xs-4 text-right');
                            var viewFilesButton = $('<button>').addClass('btn btn-sm btn-primary btn-outline-secondary').text('View Files');
                            viewFilesButton.data('member', member);
                            buttonCol.append(viewFilesButton);
                            row.append(buttonCol);

                            // Add the list item to the assigned members list
                            assignedMembersList.append(listItem);;
                        });

                        // Add a click event to the View Files buttons
                        assignedMembersList.on('click', 'button', function() {
                            // Get the member data from the button's data attribute
                            var member = $(this).data('member');

                            // Get a reference to the modal and the list of assigned files
                            var assignedFilesModal = $('#assignedFilesModal');
                            var assignedFilesList = assignedFilesModal.find('#assignedFilesList');

                            // Set the member's name in the modal title
                            var modalTitle = 'Files Assigned to ' + member.name;
                            assignedFilesModal.find('#assignedFilesModalLabel').text(modalTitle);
                            assignedFilesModal.find('#memberName').text(member.name);

                            // Clear any existing files from the list
                            assignedFilesList.empty();

                            // Loop through each file assigned to the member
                            $.each(member.files, function(index, file) {
                                // Create a new list item for the file
                                var listItem = $('<li>').addClass('list-group-item');

                                // Add the file's name to the list item
                                var fileName = $('<span>').text(file.name);
                                listItem.append(fileName);

                                // Add an image to the list item
                                var fileImage = $('<img>').attr('src', "http://localhost/programs/imagedrive/dashboard" + file.image_url).addClass('float-right');
                                listItem.append(fileImage);

                                // Add the list item to the assigned files list
                                assignedFilesList.append(listItem);
                            });

                            // Show the modal
                            assignedFilesModal.modal('show');
                        });
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log('Error:', errorThrown);
                    }
                });
            });

            // Handle click event on assign button
            $(document).on('click', '.btn-assign', function() {
                // Retrieve the list of teams for the selected project
                var projectId = $(this).attr('id');
                activeProject = projectId;
                var $select = $("#taskList");
                $select.empty();

                $select = $("#assignTeamList");
                $select.empty();

                $select = $("#memberList");
                $select.empty();

                $select = $("#assignDeliverables");
                $select.empty();

                $select = $("#assignFiles");
                $select.empty();

                $.ajax({
                    url: "getTeamsAndDeliverables.php?id=" + projectId,
                    success: function(data) {
                        // Get a reference to the select element
                        var $select = $("#assignTeamList");
                        $select.empty();
                        var $option = $("<option selected disabled>").val("none").text("Select Team");
                        $select.append($option);
                        // Loop through the list of teams and create an option element for each team
                        $.each(data.teams, function(index, team) {
                            var $option = $("<option>").val(team.team_id).text(team.team_name);
                            $select.append($option);
                        });



                        $select = $("#taskList");
                        $select.empty();

                        $option = $("<option selected disabled>").val("none").text("Select Task");
                        $select.append($option);

                        $.each(data.tasks, function(index, task) {
                            var $option = $("<option>").val(task.task_type_id).text(task.task_type_name);
                            $select.append($option);
                        });
                    }
                });
            });


            $(document).on('change', '#assignTeamList', function() {
                var teamId = $(this).val();
                if (teamId !== "none") {
                    $.ajax({
                        url: "getMembers.php?id=" + teamId,
                        success: function(data) {
                            var $select = $("#memberList");
                            $select.empty();
                            var $option = $("<option selected disbaled>").val("none").text("Select Member");
                            $select.append($option);
                            $.each(data.members, function(index, member) {
                                var $option = $("<option>").val(member.user_id).text(member.name);
                                $select.append($option);
                            });
                        }
                    });
                } else {
                    $("#memberList").empty();
                }
            });


            $('#assignDeliverables').hide();
            $('#assignDeliverablesSection').hide();

            // Check if the assignAllFiles checkbox is selected by default
            if ($('#assignAllFiles').is(':checked')) {

                // Hide the deliverables select element
                $('#assignDeliverablesSection').hide();
                $('#assignDeliverables').hide();
            } else {
                // Show the deliverables select element
                var projectId = $('.btn-assign').attr('id');
                $('#assignDeliverablesSection').show();
                $('#assignDeliverables').show();
                $.ajax({
                    url: "getTeamsAndDeliverables.php?id=" + activeProject,
                    success: function(data) {
                        // Get a reference to the select element
                        $select = $("#assignDeliverables");
                        $select.empty();
                        $option = $("<option disbaled>").val("none").text("Select Deliverables");
                        $select.append($option);
                        $.each(data.deliverables, function(index, deliverable) {
                            var $option = $("<option>").val(deliverable.project_deliverable_id).text(deliverable.deliverable_name);
                            $select.append($option);
                        });
                    }
                });

            }

            // Handle the change event of the assignAllFiles checkbox
            $('#assignAllFiles').change(function() {
                var projectId = $('.btn-assign').attr('id');

                if ($(this).is(':checked')) {
                    // Hide the deliverables select element
                    $('#assignDeliverablesSection').hide();
                    $('#assignDeliverables').hide();
                } else {
                    // Show the deliverables select element
                    $('#assignDeliverablesSection').show();
                    $('#assignDeliverables').show();

                    $.ajax({
                        url: "getTeamsAndDeliverables.php?id=" + activeProject,
                        success: function(data) {
                            // Get a reference to the select element
                            $select = $("#assignDeliverables");
                            $select.empty();
                            $option = $("<option disbaled>").val("none").text("Select Deliverables");
                            $select.append($option);
                            $.each(data.deliverables, function(index, deliverable) {
                                var $option = $("<option>").val(deliverable.project_deliverable_id).text(deliverable.deliverable_name);
                                $select.append($option);
                            });
                        }
                    });


                }
            });



            $(document).on('change', '#assignDeliverables', function() {
                var deliverableId = $(this).val();
                console.log(deliverableId)
                if (deliverableId !== "none") {
                    $.ajax({
                        url: "getFiles.php?id=" + deliverableId,
                        success: function(data) {
                            $select = $("#assignFilesList");
                            $select.empty();
                            $option = $("<option disbaled>").val("none").text("Select Files");
                            $select.append($option);
                            $.each(data.files, function(index, file) {
                                var $option = $("<option>").val(file.file_id).text(file.name);
                                $select.append($option);
                            });
                        }
                    });
                } else {
                    $("#assignDeliverables").empty();
                }
            });



            $("form").submit(function(event) {
                // Stop form from submitting normally
                event.preventDefault();

                // Get form data
                var formData = $(this).serialize();
                formData += "&projectId=" + activeProject;

                // Send the form data using AJAX
                $.ajax({
                    type: "POST",
                    url: "assignFile.php",
                    data: formData,
                    success: function(data) {
                        // Handle success case
                        console.log(data);
                    },
                    error: function(xhr, status, error) {
                        var errorMessage = xhr.status + ': ' + xhr.statusText
                        console.log(errorMessage);
                    }
                });
            });
        });
    </script>

</body>

</html>