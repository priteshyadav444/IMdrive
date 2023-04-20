<?php
@session_start();
require_once '../shared/check-login.php';
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Create New Role | Image Drive</title>
  <meta name="description" content="">
  <?php
  require_once '../shared/head-link.php';
  require_once '../Config/SessionConfig.php';
  require_once '../Config/Privilege.php';
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
  <?php include_once '../shared/left-sidebar.php'; ?>
  <!-- End Left menu area -->
  <!-- Start Welcome area -->
  <div class="all-content-wrapper">
    <?php include_once '../shared/logolink.php'; ?>
    <div class="header-advance-area">
      <?php include_once '../shared/navbar.php'; ?>
      <?php

      use Validation\Validators\FormValidator;

      $obj = new FormValidator();

      if (isset($_POST['submit'])) {
        $validations = [
          'role_name' => 'required|string',
        ];
        $isFormDataValid = false;
        if (!$obj->validate($_POST, $validations)->isError()) {
          $connection = new Connection();
          $user = new User($connection->getConnection());

          $permissons = $_POST['permissions'];
          $role_name = $_POST['role_name'];

          $isFormDataValid = $user->createRoleWithPermissions($role_name, $permissons);
        }
        if ($isFormDataValid == false) {
          $obj->setError("Unable to Create Role. Enter Unique User type", "custom");
        }
      }
      ?>
      <!-- Single pro tab review Start-->
      <div class="single-pro-review-area mt-t-30 mg-b-15 mg-t-20">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="product-payment-inner-st">
                <ul id="myTabedu1" class="tab-review-design">
                  <li class="active"><a href="#description">Add Role</a></li>

                </ul>
                <div id="myTabContent" class="tab-content custom-product-edit">
                  <div class="product-tab-list tab-pane fade active in" id="description">
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="review-content-section">
                          <?php
                          if ($obj->isError() != false && isset($_POST['submit'])) {
                            echo '<div class="alert alert-danger" role="alert">';
                            foreach ($obj->all() as $error)
                              echo "<li>$error</li>";
                            echo '</div>';
                          } else if (isset($isFormDataValid) && $isFormDataValid  && isset($_POST['submit'])) {
                            echo '<div class="alert alert-success" role="alert">';
                            echo "<li>Role Created Successfully </li>";
                            echo '</div>';
                          }
                          ?>
                          <form method="post" action="">
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                              <label for="username">Enter New Role</label>
                              <input id="username" name="role_name" type="text" class="form-control">
                            </div>
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>Permission</th>
                                  <th>Value</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>View Dashboard</td>
                                  <td>
                                    <div class="material-switch">
                                      <input id="view_dashboard" name="permissions[view_dashboard]" value="FALSE" type="checkbox" />
                                      <label for="view_dashboard" class="label-primary"></label>
                                    </div>
                                  </td>
                                </tr>
                                <hr>
                                <tr>
                                  <td>View Deliverable</td>
                                  <td>
                                    <div class="material-switch">
                                      <input id="view_deliverable" name="permissions[view_deliverable]" value="FALSE" type="checkbox" />
                                      <label for="view_deliverable" class="label-primary"></label>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Create Deliverable</td>
                                  <td>
                                    <div class="material-switch">
                                      <input id="create_deliverable" name="permissions[create_deliverable]" value="FALSE" type="checkbox" />
                                      <label for="create_deliverable" class="label-primary"></label>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Update Deliverable</td>
                                  <td>
                                    <div class="material-switch">
                                      <input id="update_deliverable" name="permissions[update_deliverable]" value="FALSE" type="checkbox" />
                                      <label for="update_deliverable" class="label-primary"></label>
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <td>View Team</td>
                                  <td>
                                    <div class="material-switch">
                                      <input id="view_team" name="permissions[view_team]" value="FALSE" type="checkbox" checked />
                                      <label for="view_team" class="label-primary"></label>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Create Team</td>
                                  <td>
                                    <div class="material-switch">
                                      <input id="create_team" name="permissions[create_team]" value="FALSE" type="checkbox" checked />
                                      <label for="create_team" class="label-primary"></label>
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <td>Update Team</td>
                                  <td>
                                    <div class="material-switch">
                                      <input id="update_team" name="permissions[update_team]" value="FALSE" type="checkbox" checked />
                                      <label for="update_team" class="label-primary"></label>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>View Task Log</td>
                                  <td>
                                    <div class="material-switch">
                                      <input id="view_task_log" name="permissions[view_task]" value="FALSE" type="checkbox" checked />
                                      <label for="view_task_log" class="label-primary"></label>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Create Task Type</td>
                                  <td>
                                    <div class="material-switch">
                                      <input id="create_task_type" name="permissions[create_task_type]" value="FALSE" type="checkbox" checked />
                                      <label for="create_task_type" class="label-primary"></label>
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <td>Update Task Type</td>
                                  <td>
                                    <div class="material-switch">
                                      <input id="update_task_type" name="permissions[update_task_type]" value="FALSE" type="checkbox" checked />
                                      <label for="update_task_type" class="label-primary"></label>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>View Reason</td>
                                  <td>
                                    <div class="material-switch">
                                      <input id="view_reason" name="permissions[view_reason]" value="FALSE" type="checkbox" />
                                      <label for="view_reason" class="label-primary"></label>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Create Reason</td>
                                  <td>
                                    <div class="material-switch">
                                      <input id="create_reason" name="permissions[create_reason]" value="FALSE" type="checkbox" />
                                      <label for="create_reason" class="label-primary"></label>
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <td>Update Reason</td>
                                  <td>
                                    <div class="material-switch">
                                      <input id="update_reason" name="permissions[update_reason]" value="FALSE" type="checkbox" />
                                      <label for="update_reason" class="label-primary"></label>
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <td>Create User</td>
                                  <td>
                                    <div class="material-switch">
                                      <input id="create_user" name="permissions[create_user]" value="FALSE" type="checkbox" />
                                      <label for="create_user" class="label-primary"></label>
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <td>Update User</td>
                                  <td>
                                    <div class="material-switch">
                                      <input id="update_user" name="permissions[update_user]" value="FALSE" type="checkbox" />
                                      <label for="update_user" class="label-primary"></label>
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <td>Create Project</td>
                                  <td>
                                    <div class="material-switch">
                                      <input id="create_project" name="permissions[create_project]" value="FALSE" type="checkbox" />
                                      <label for="create_project" class="label-primary"></label>
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <td>Update Project</td>
                                  <td>
                                    <div class="material-switch">
                                      <input id="update_project" name="permissions[update_project]" value="FALSE" type="checkbox" />
                                      <label for="update_project" class="label-primary"></label>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>View File</td>
                                  <td>
                                    <div class="material-switch">
                                      <input id="view_file" name="permissions[view_file]" value="FALSE" type="checkbox" />
                                      <label for="view_file" class="label-primary"></label>
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <td>Create File</td>
                                  <td>
                                    <div class="material-switch">
                                      <input id="create_file" name="permissions[create_file]" value="FALSE" type="checkbox" />
                                      <label for="create_file" class="label-primary"></label>
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <td>Update File</td>
                                  <td>
                                    <div class="material-switch">
                                      <input id="update_file" name="permissions[update_file]" value="FALSE" type="checkbox" />
                                      <label for="update_file" class="label-primary"></label>
                                    </div>
                                  </td>
                                </tr>



                                <tr>
                                  <td>View Roles Permission</td>
                                  <td>
                                    <div class="material-switch">
                                      <input id="view_roles_permission" name="permissions[view_roles_permission]" value="FALSE" type="checkbox" />
                                      <label for="view_roles_permission" class="label-primary"></label>
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <td>Create Roles Permission</td>
                                  <td>
                                    <div class="material-switch">
                                      <input id="create_roles_permission" name="permissions[create_roles_permission]" value="FALSE" type="checkbox" />
                                      <label for="create_roles_permission" class="label-primary"></label>
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <td>Update Roles Permission</td>
                                  <td>
                                    <div class="material-switch">
                                      <input id="update_roles_permission" name="permissions[update_roles_permission]" value="FALSE" type="checkbox" />
                                      <label for="update_roles_permission" class="label-primary"></label>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>View File</td>
                                  <td>
                                    <div class="material-switch">
                                      <input id="view_file" name="permissions[view_file]" value="FALSE" type="checkbox" />
                                      <label for="view_file" class="label-primary"></label>
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <td>Create File</td>
                                  <td>
                                    <div class="material-switch">
                                      <input id="create_file" name="permissions[create_file]" value="FALSE" type="checkbox" />
                                      <label for="create_file" class="label-primary"></label>
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <td>Update File</td>
                                  <td>
                                    <div class="material-switch">
                                      <input id="update_file" name="permissions[update_file]" value="FALSE" type="checkbox" />
                                      <label for="update_file" class="label-primary"></label>
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <td>View Task Log</td>
                                  <td>
                                    <div class="material-switch">
                                      <input id="view_task_log" name="permissions[view_task_log]" value="FALSE" type="checkbox" />
                                      <label for="view_task_log" class="label-primary"></label>
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <td>View Roles Permission</td>
                                  <td>
                                    <div class="material-switch">
                                      <input id="view_roles_permission" name="permissions[view_roles_permission]" value="FALSE" type="checkbox" />
                                      <label for="view_roles_permission" class="label-primary"></label>
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <td>Create Roles Permission</td>
                                  <td>
                                    <div class="material-switch">
                                      <input id="create_roles_permission" name="permissions[create_roles_permission]" value="FALSE" type="checkbox" />
                                      <label for="create_roles_permission" class="label-primary"></label>
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <td>Update Roles Permission</td>
                                  <td>
                                    <div class="material-switch">
                                      <input id="update_roles_permission" name="permissions[update_roles_permission]" value="FALSE" type="checkbox" />
                                      <label for="update_roles_permission" class="label-primary"></label>
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <td>View Ticket</td>
                                  <td>
                                    <div class="material-switch">
                                      <input id="view_ticket" name="permissions[view_ticket]" value="FALSE" type="checkbox" />
                                      <label for="view_ticket" class="label-primary"></label>
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <td>Create Ticket</td>
                                  <td>
                                    <div class="material-switch">
                                      <input id="create_ticket" name="permissions[create_ticket]" value="FALSE" type="checkbox" />
                                      <label for="create_ticket" class="label-primary"></label>
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <td>Update Ticket</td>
                                  <td>
                                    <div class="material-switch">
                                      <input id="update_ticket" name="permissions[update_ticket]" value="FALSE" type="checkbox" />
                                      <label for="update_ticket" class="label-primary"></label>
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <td>View Ticket Management</td>
                                  <td>
                                    <div class="material-switch">
                                      <input id="view_ticket_mangment" name="permissions[view_ticket_mangment]" value="FALSE" type="checkbox" />
                                      <label for="view_ticket_mangment" class="label-primary"></label>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Create Ticket Management</td>
                                  <td>
                                    <div class="material-switch">
                                      <input id="create_ticket_mangment" name="permissions[create_ticket_mangment]" value="FALSE" type="checkbox" />
                                      <label for="create_ticket_mangment" class="label-primary"></label>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Update Ticket Management</td>
                                  <td>
                                    <div class="material-switch">
                                      <input id="update_ticket_mangment" name="permissions[update_ticket_mangment]" value="FALSE" type="checkbox" />
                                      <label for="update_ticket_mangment" class="label-primary"></label>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>View Setting</td>
                                  <td>
                                    <div class="material-switch">
                                      <input id="view_setting" name="permissions[view_setting]" value="FALSE" type="checkbox" />
                                      <label for="view_setting" class="label-primary"></label>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Create Setting</td>
                                  <td>
                                    <div class="material-switch">
                                      <input id="create_setting" name="permissions[create_setting]" value="FALSE" type="checkbox" />
                                      <label for="create_setting" class="label-primary"></label>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Update Setting</td>
                                  <td>
                                    <div class="material-switch">
                                      <input id="update_setting" name="permissions[update_setting]" value="FALSE" type="checkbox" />
                                      <label for="update_setting" class="label-primary"></label>
                                    </div>
                                  </td>
                                </tr>
                                <!-- Repeat the above row for each permission -->
                              </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                          </form>
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
      <?php include_once '../shared/footer.php'; ?>
    </div>
    <?php include_once '../shared/footer-link.php'; ?>

    <script>
      $(document).ready(function() {

        $('#create_deliverable, #update_deliverable').change(function() {
          var createChecked = $('#create_deliverable').prop('checked');
          var updateChecked = $('#update_deliverable').prop('checked');

          if (createChecked || updateChecked) {
            $('#view_deliverable').prop('checked', true);
            $('#view_deliverable').prop('disabled', true);
          } else {
            $('#view_deliverable').prop('disabled', false);
          }
        });

        // Toggle View permission when Create or Update permission is enabled for Team
        $('#create_team, #update_team').change(function() {
          var createChecked = $('#create_team').prop('checked');
          var updateChecked = $('#update_team').prop('checked');

          if (createChecked || updateChecked) {
            $('#view_team').prop('checked', true);
            $('#view_team').prop('disabled', true);
          } else {
            $('#view_team').prop('disabled', false);
          }
        });

        // Toggle View permission when Create or Update permission is enabled for Task Type
        $('#create_task_type, #update_task_type').change(function() {
          var createChecked = $('#create_task_type').prop('checked');
          var updateChecked = $('#update_task_type').prop('checked');

          if (createChecked || updateChecked) {
            $('#view_task_type').prop('checked', true);
            $('#view_task_type').prop('disabled', true);
          } else {
            $('#view_task_type').prop('disabled', false);
          }
        });

        // Toggle View permission when Create or Update permission is enabled for Project
        $('#create_project, #update_project').change(function() {
          var createChecked = $('#create_project').prop('checked');
          var updateChecked = $('#update_project').prop('checked');

          if (createChecked || updateChecked) {
            $('#view_project').prop('checked', true);
            $('#view_project').prop('disabled', true);
          } else {
            $('#view_project').prop('disabled', false);
          }
        });

        // Disable view permission when create or update permission is enabled for Reason
        $('#create_reason, #update_reason').change(function() {
          var createChecked = $('#create_reason').prop('checked');
          var updateChecked = $('#update_reason').prop('checked');

          if (createChecked || updateChecked) {
            $('#view_reason').prop('checked', true);
            $('#view_reason').prop('disabled', true);
          } else {
            $('#view_reason').prop('disabled', false);
          }
        });

        $('input[type=checkbox]').prop('checked', true);
        $('input[type=checkbox]').val(true);

        // Toggle checkbox value on click
        $('input[type=checkbox]').click(function() {
          if ($(this).prop('checked')) {
            $(this).val(true);
          } else {
            $(this).val(false);
          }
        });
      });
    </script>

</html>