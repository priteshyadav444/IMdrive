
<?php @session_start();
require_once '../shared/check-login.php'; ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Add Department | Kiaalap - Kiaalap Admin Template</title>
  <meta name="description" content="">
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
    <?php
    if (isset($_POST['submit'])) {
      var_dump($_POST);
    }
    ?>
    <!-- Single pro tab review Start-->
    <div class="single-pro-review-area mt-t-30 mg-b-15 mg-t-15">
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
                        <form method="post" action="new-role.php">
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <label for="username">Enter New Role</label>
                            <input id="username" name="role_name" type="text" class="form-control" required>
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
                                    <input id="view_dashboard" name="permissions[view_dashboard]" type="checkbox"  />
                                    <label for="view_dashboard" class="label-primary"></label>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>View Deliverable</td>
                                <td>
                                  <div class="material-switch">
                                    <input id="view_deliverable" name="permissions[view_deliverable]" type="checkbox"  />
                                    <label for="view_deliverable" class="label-primary"></label>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>Create Deliverable</td>
                                <td>
                                  <div class="material-switch">
                                    <input id="create_deliverable" name="permissions[create_deliverable]" type="checkbox" checked />
                                    <label for="create_deliverable" class="label-primary"></label>
                                  </div>
                                </td>
                              </tr>

                              <tr>
                                <td>Update Deliverable</td>
                                <td>
                                  <div class="material-switch">
                                    <input id="update_deliverable" name="permissions[update_deliverable]" type="checkbox" checked />
                                    <label for="update_deliverable" class="label-primary"></label>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>View Team</td>
                                <td>
                                  <div class="material-switch">
                                    <input id="view_team" name="permissions[view_team]" type="checkbox" checked />
                                    <label for="view_team" class="label-primary"></label>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>Create Team</td>
                                <td>
                                  <div class="material-switch">
                                    <input id="create_team" name="permissions[create_team]" type="checkbox" checked />
                                    <label for="create_team" class="label-primary"></label>
                                  </div>
                                </td>
                              </tr>

                              <tr>
                                <td>Update Team</td>
                                <td>
                                  <div class="material-switch">
                                    <input id="update_team" name="permissions[update_team]" type="checkbox" checked />
                                    <label for="update_team" class="label-primary"></label>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>Create Task Type</td>
                                <td>
                                  <div class="material-switch">
                                    <input id="create_task_type" name="permissions[create_task_type]" type="checkbox" checked />
                                    <label for="create_task_type" class="label-primary"></label>
                                  </div>
                                </td>
                              </tr>

                              <tr>
                                <td>Update Task Type</td>
                                <td>
                                  <div class="material-switch">
                                    <input id="update_task_type" name="permissions[update_task_type]" type="checkbox" checked />
                                    <label for="update_task_type" class="label-primary"></label>
                                  </div>
                                </td>
                              </tr>

                              <tr>
                                <td>Create Reason</td>
                                <td>
                                  <div class="material-switch">
                                    <input id="create_reason" name="permissions[create_reason]" type="checkbox" checked />
                                    <label for="create_reason" class="label-primary"></label>
                                  </div>
                                </td>
                              </tr>

                              <tr>
                                <td>Update Reason</td>
                                <td>
                                  <div class="material-switch">
                                    <input id="update_reason" name="permissions[update_reason]" type="checkbox" checked />
                                    <label for="update_reason" class="label-primary"></label>
                                  </div>
                                </td>
                              </tr>

                              <tr>
                                <td>Create User</td>
                                <td>
                                  <div class="material-switch">
                                    <input id="create_user" name="permissions[create_user]" type="checkbox" checked />
                                    <label for="create_user" class="label-primary"></label>
                                  </div>
                                </td>
                              </tr>

                              <tr>
                                <td>Update User</td>
                                <td>
                                  <div class="material-switch">
                                    <input id="update_user" name="permissions[update_user]" type="checkbox" checked />
                                    <label for="update_user" class="label-primary"></label>
                                  </div>
                                </td>
                              </tr>

                              <tr>
                                <td>Create Project</td>
                                <td>
                                  <div class="material-switch">
                                    <input id="create_project" name="permissions[create_project]" type="checkbox" checked />
                                    <label for="create_project" class="label-primary"></label>
                                  </div>
                                </td>
                              </tr>

                              <tr>
                                <td>Update Project</td>
                                <td>
                                  <div class="material-switch">
                                    <input id="update_project" name="permissions[update_project]" type="checkbox" checked />
                                    <label for="update_project" class="label-primary"></label>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>View File</td>
                                <td>
                                  <div class="material-switch">
                                    <input id="view_file" name="permissions[view_file]" type="checkbox" checked />
                                    <label for="view_file" class="label-primary"></label>
                                  </div>
                                </td>
                              </tr>

                              <tr>
                                <td>Create File</td>
                                <td>
                                  <div class="material-switch">
                                    <input id="create_file" name="permissions[create_file]" type="checkbox" checked />
                                    <label for="create_file" class="label-primary"></label>
                                  </div>
                                </td>
                              </tr>

                              <tr>
                                <td>Update File</td>
                                <td>
                                  <div class="material-switch">
                                    <input id="update_file" name="permissions[update_file]" type="checkbox" checked />
                                    <label for="update_file" class="label-primary"></label>
                                  </div>
                                </td>
                              </tr>

                              <tr>
                                <td>View Task Log</td>
                                <td>
                                  <div class="material-switch">
                                    <input id="view_task_log" name="permissions[view_task_log]" type="checkbox" checked />
                                    <label for="view_task_log" class="label-primary"></label>
                                  </div>
                                </td>
                              </tr>

                              <tr>
                                <td>View Roles Permission</td>
                                <td>
                                  <div class="material-switch">
                                    <input id="view_roles_permission" name="permissions[view_roles_permission]" type="checkbox" checked />
                                    <label for="view_roles_permission" class="label-primary"></label>
                                  </div>
                                </td>
                              </tr>

                              <tr>
                                <td>Create Roles Permission</td>
                                <td>
                                  <div class="material-switch">
                                    <input id="create_roles_permission" name="permissions[create_roles_permission]" type="checkbox" checked />
                                    <label for="create_roles_permission" class="label-primary"></label>
                                  </div>
                                </td>
                              </tr>

                              <tr>
                                <td>Update Roles Permission</td>
                                <td>
                                  <div class="material-switch">
                                    <input id="update_roles_permission" name="permissions[update_roles_permission]" type="checkbox" checked />
                                    <label for="update_roles_permission" class="label-primary"></label>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>View File</td>
                                <td>
                                  <div class="material-switch">
                                    <input id="view_file" name="permissions[view_file]" type="checkbox" checked />
                                    <label for="view_file" class="label-primary"></label>
                                  </div>
                                </td>
                              </tr>

                              <tr>
                                <td>Create File</td>
                                <td>
                                  <div class="material-switch">
                                    <input id="create_file" name="permissions[create_file]" type="checkbox" checked />
                                    <label for="create_file" class="label-primary"></label>
                                  </div>
                                </td>
                              </tr>

                              <tr>
                                <td>Update File</td>
                                <td>
                                  <div class="material-switch">
                                    <input id="update_file" name="permissions[update_file]" type="checkbox" checked />
                                    <label for="update_file" class="label-primary"></label>
                                  </div>
                                </td>
                              </tr>

                              <tr>
                                <td>View Task Log</td>
                                <td>
                                  <div class="material-switch">
                                    <input id="view_task_log" name="permissions[view_task_log]" type="checkbox" checked />
                                    <label for="view_task_log" class="label-primary"></label>
                                  </div>
                                </td>
                              </tr>

                              <tr>
                                <td>View Roles Permission</td>
                                <td>
                                  <div class="material-switch">
                                    <input id="view_roles_permission" name="permissions[view_roles_permission]" type="checkbox" checked />
                                    <label for="view_roles_permission" class="label-primary"></label>
                                  </div>
                                </td>
                              </tr>

                              <tr>
                                <td>Create Roles Permission</td>
                                <td>
                                  <div class="material-switch">
                                    <input id="create_roles_permission" name="permissions[create_roles_permission]" type="checkbox" checked />
                                    <label for="create_roles_permission" class="label-primary"></label>
                                  </div>
                                </td>
                              </tr>

                              <tr>
                                <td>Update Roles Permission</td>
                                <td>
                                  <div class="material-switch">
                                    <input id="update_roles_permission" name="permissions[update_roles_permission]" type="checkbox" checked />
                                    <label for="update_roles_permission" class="label-primary"></label>
                                  </div>
                                </td>
                              </tr>

                              <tr>
                                <td>View Ticket</td>
                                <td>
                                  <div class="material-switch">
                                    <input id="view_ticket" name="permissions[view_ticket]" type="checkbox" checked />
                                    <label for="view_ticket" class="label-primary"></label>
                                  </div>
                                </td>
                              </tr>

                              <tr>
                                <td>Create Ticket</td>
                                <td>
                                  <div class="material-switch">
                                    <input id="create_ticket" name="permissions[create_ticket]" type="checkbox" checked />
                                    <label for="create_ticket" class="label-primary"></label>
                                  </div>
                                </td>
                              </tr>

                              <tr>
                                <td>Update Ticket</td>
                                <td>
                                  <div class="material-switch">
                                    <input id="update_ticket" name="permissions[update_ticket]" type="checkbox" checked />
                                    <label for="update_ticket" class="label-primary"></label>
                                  </div>
                                </td>
                              </tr>

                              <tr>
                                <td>View Ticket Management</td>
                                <td>
                                  <div class="material-switch">
                                    <input id="view_ticket_mangment" name="permissions[view_ticket_mangment]" type="checkbox" checked />
                                    <label for="view_ticket_mangment" class="label-primary"></label>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>Create Ticket Management</td>
                                <td>
                                  <div class="material-switch">
                                    <input id="create_ticket_mangment" name="permissions[create_ticket_mangment]" type="checkbox" checked />
                                    <label for="create_ticket_mangment" class="label-primary"></label>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>Update Ticket Management</td>
                                <td>
                                  <div class="material-switch">
                                    <input id="update_ticket_mangment" name="permissions[update_ticket_mangment]" type="checkbox" checked />
                                    <label for="update_ticket_mangment" class="label-primary"></label>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>View Setting</td>
                                <td>
                                  <div class="material-switch">
                                    <input id="view_setting" name="permissions[view_setting]" type="checkbox" checked />
                                    <label for="view_setting" class="label-primary"></label>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>Create Setting</td>
                                <td>
                                  <div class="material-switch">
                                    <input id="create_setting" name="permissions[create_setting]" type="checkbox" checked />
                                    <label for="create_setting" class="label-primary"></label>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>Update Setting</td>
                                <td>
                                  <div class="material-switch">
                                    <input id="update_setting" name="permissions[update_setting]" type="checkbox" checked />
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
</body>

</html>