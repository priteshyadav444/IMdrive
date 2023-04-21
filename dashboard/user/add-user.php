<?php
@session_start();
require_once '../shared/check-login.php';
if (!hasPermission('create_user')) {
  $URL = "users.php";
  header('Location: ' . $URL);
}
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Add Users | Image Drive</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php
  require_once '../shared/head-link.php';
  require_once '../Config/SessionConfig.php';
  include_once '../Config/Privilege.php';
  require_once "../library/validation/vendor/autoload.php";
  require_once "../database/Connection.php";
  require_once "../database/User.php";
  ?>
</head>

<body>
  <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
  <!-- Start Left menu area -->


  <?php

  use Validation\Validators\FormValidator;

  $obj = new FormValidator();


  // Generate select options
  $connection = new Connection();
  $user = new User($connection->getConnection());

  $teams = $user->getAllTeam();
  $teamOptions = " <option value='null' disabled >Select Team</option>";
  foreach ($teams as $team) {
    $teamOptions .= '<option value="' . $team['team_id'] . '">' . $team['team_name'] . '</option>';
  }

  $roles = $user->getAllRoles();
  $userTypeOptions = " <option value='null' disabled >Select User Type</option>";
  foreach ($roles as $role) {
    $userTypeOptions .= '<option value="' . $role['id'] . '">' . $role['user_type'] . '</option>';
  }

  $isFormDataValid = false;
  if (isset($_POST['submit_create_user'])) {
    $validations = [
      'first_name' => 'required|string',
      'last_name' => 'required|string',
      'email' => 'required|email',
      'password' => 'required|password',
      'description' => 'required',
      'usertype' => 'required',
      'team' => 'required',
    ];

    // if all validation Passed
    if (!$obj->validate($_POST, $validations)->isError()) {

      $userDetails['first_name'] = $obj->senitizeInput($_POST['first_name']);
      $userDetails['last_name'] = $obj->senitizeInput($_POST['last_name']);
      $userDetails['email'] = $_POST['email'];
      $userDetails['description'] = $obj->senitizeInput($_POST['description']);
      $userDetails['password'] = $_POST['password'];
      $userDetails['usertype'] =  $_POST['usertype'];
      $userDetails['team'] =  $_POST['team'];

      $connection = new Connection();
      $user = new User($connection->getConnection());

      $isFormDataValid = $user->createUser($userDetails);
      if ($isFormDataValid == false) {
        $obj->setError("Something Went Wrong", "custom");
        $isValidDeliverable = false;
      }
    }
  }

  // 
  ?>


  <?php
  include_once '../shared/left-sidebar.php';
  ?>
  <!-- End Left menu area -->
  <!-- Start Welcome area -->
  <div class="all-content-wrapper">
    <?php include_once '../shared/header-top.php'; ?>

    <!-- Single pro tab review Start-->
    <div class="single-pro-review-area mt-t-30 mg-b-15 mg-t-20">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="product-payment-inner-st">
              <ul id="myTabedu1" class="tab-review-design">
                <li class="active"><a href="#description">Add User</a></li>
              </ul>
              <div id="myTabContent" class="tab-content custom-product-edit">
                <div class="product-tab-list tab-pane fade active in" id="description">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="review-content-section">
                        <?php
                        if ($obj->isError() != false && isset($_POST['submit_create_user'])) {
                          echo '<div class="alert alert-danger" role="alert">';
                          foreach ($obj->all() as $error)
                            echo "<li>$error</li>";
                          echo '</div>';
                        } else if (isset($isFormDataValid) && $isFormDataValid  && isset($_POST['submit_create_user'])) {
                          echo '<div class="alert alert-success" role="alert">';
                          echo "<li>User Created Successfully </li>";
                          echo '</div>';
                        }
                        ?>
                        <form id="add-department" action="" class="add-department" method="POST">
                          <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <div class="form-group">
                                <input name="first_name" type="text" class="form-control" placeholder="First Name">
                              </div>

                              <div class="form-group">
                                <input name="last_name" type="text" class="form-control" placeholder="Last Name">
                              </div>

                              <div class="form-group">
                                <input name="email" type="email" class="form-control" placeholder="Email">
                              </div>
                              <div class="form-group">
                                <input name="password" type="password" class="form-control" placeholder="Enter Password">
                              </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <div class="form-group">
                                <div class="form-select-list">
                                  <select class="form-control custom-select-value" name="usertype">
                                    <?php echo $userTypeOptions; ?>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="form-select-list">
                                  <select class="form-control custom-select-value" name="team">
                                    <?php echo $teamOptions; ?>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <input name="description" type="text" class="form-control" placeholder="Enter Description">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="payment-adress">
                                <button type="submit" class="btn btn-primary waves-effect waves-light" name="submit_create_user" value="submit_create_user">Submit</button>
                              </div>
                            </div>
                          </div>
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