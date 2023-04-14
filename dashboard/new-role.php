<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Add Department | Kiaalap - Kiaalap Admin Template</title>
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
  <!-- forms CSS
		============================================ -->
  <link rel="stylesheet" href="css/form/all-type-forms.css">
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
</head>

<body>
  <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
  <!-- Start Left menu area -->
  <?php include 'left-sidebar.php'; ?>
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
  <!-- form validate JS
		============================================ -->
  <script src="js/form-validation/jquery.form.min.js"></script>
  <script src="js/form-validation/jquery.validate.min.js"></script>
  <script src="js/form-validation/form-active.js"></script>
  <!-- tab JS
		============================================ -->
  <script src="js/tab.js"></script>
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