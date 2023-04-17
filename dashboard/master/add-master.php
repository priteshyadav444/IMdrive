<?php 
@session_start();
require_once '../shared/check-login.php';
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Add Master - Image Drive</title>
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
  <?php

  use Validation\Validators\FormValidator;

  $obj = new FormValidator();

  // on submit handler
  if (isset($_POST['submit_deliverable'])) {
    $validations = [
      'name' => 'required|string',
    ];
    // if all validation Passed
    if (!$obj->validate($_POST, $validations)->isError()) {

      $connection = new Connection();
      $user = new User($connection->getConnection());

      $isValid = $user->createDeliverable($obj->senitizeInput($_POST['name']), Privilege::CREATE_DELIVERABLE);

      // var_dump($isValid);
      // if (!$isValid) {
      //   $obj->setError($isValid, "custom");
      // } else {
      // $redirectPageUrl = "../master/";
      // header('Location: ' . $redirectPageUrl);
      // var_dump($_SESSION[SessionConfig::PRIVILAGS]);
      // }
    }
  }
  ?>
  <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
  <!-- Start Left menu area -->
  <?php include_once '../shared/left-sidebar.php';
  ?>
  <!-- End Left menu area -->
  <!-- Start Welcome area -->
  <div class="all-content-wrapper">
    <?php include_once '../shared/logolink.php'; ?>
    <div class="header-advance-area">
      <?php include_once '../shared/navbar.php'; ?>

      <!-- Mobile Menu start -->

      <!-- Mobile Menu end -->
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
                      <li><a href="#">Home</a> <span class="bread-slash">/</span>
                      </li>
                      <li><span class="bread-blod">Add Master Table</span>
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
    <!-- Single pro tab review Start-->
    <?php
    if (isset($_GET['type'])) {
      $type = $_GET['type'];
    } elseif (empty($type)) {
      // default selection
      $type = "deliverable";
    }
    ?>
    <div class="single-pro-review-area mt-t-30 mg-b-15">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="product-payment-inner-st">
              <ul id="myTabedu1" class="tab-review-design">
                <?php
                if (hasPermission(Privilege::CREATE_DELIVERABLE)) {
                  echo  '<li';
                  if ($type == "deliverable") echo " class='active'";
                  echo '><a href="#deliverable"> Add Deliverable</a></li>';
                }

                if (hasPermission(Privilege::CREATE_TEAM)) {
                  echo '<li';
                  if ($type == "team") echo " class='active'";
                  echo '><a href="#team"> Add Team</a></li>';
                }


                if (hasPermission(Privilege::CREATE_TASK)) {
                  echo  '<li';
                  if ($type == "task") echo " class='active'";
                  echo '><a href="#task"> Add Task</a></li>';
                }

                if (hasPermission(Privilege::CREATE_TICKET_REASON)) {
                  echo  '<li';
                  if ($type == "ticket_reason") echo " class='active'";
                  echo '><a href="#ticket_reason"> Add Reason</a></li>';
                }

                ?>

              </ul>

              <div id="myTabContent" class="tab-content custom-product-edit">



                <div class="product-tab-list tab-pane fade<?php if ($type == "deliverable") echo " active in"; ?>" id="deliverable">
                  <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                      <div class="review-content-section">
                        <div class="row">
                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="devit-card-custom">
                              <?php
                              if ($obj->isError() != false && isset($_POST['submit_deliverable'])) {
                                echo '<div class="alert alert-danger" role="alert">';
                                foreach ($obj->all() as $error)
                                  echo "<li>$error</li>";
                                echo '</div>';
                              }
                              ?>
                              <form action="add-master.php" method="post">
                                <div class="form-group">
                                  <input type="text" class="form-control" name="name" placeholder="Enter New Deliverable">
                                </div>
                                <button type="submit" class="btn btn-primary" value="submit_deliverable" name="submit_deliverable">Create New Deliverable</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="product-tab-list tab-pane fade<?php if ($type == "team") echo " active in"; ?>" id="team">
                  <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                      <div class="review-content-section">
                        <div class="row">
                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <form action="add-master.php" method="post">
                              <div class="devit-card-custom">
                                <div class="form-group">
                                  <input type="text" class="form-control" name="team" placeholder="Enter New Team Name">
                                </div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light" value="submit_team">Create New Team</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- <div class="product-tab-list tab-pane fade<?php if ($type == "task") echo " active in"; ?>" id="task">
                  <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                      <div class="review-content-section">
                        <div class="row">
                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <form action="add-master.php" method="post">
                                <div class="devit-card-custom">
                                  <div class="form-group">
                                    <input type="text" class="form-control" name="task" placeholder="Enter New Task Type">
                                  </div>
                                  <button type="submit" class="btn btn-primary waves-effect waves-light" value="submit_team">Create New Task</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="product-tab-list tab-pane fade<?php if ($type == "ticket_reason") echo " active in"; ?>" id="reason">
                  <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                      <div class="review-content-section">
                        <div class="row">
                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="devit-card-custom">
                              <div class="form-group">
                                <input type="text" class="form-control" name="ticket_reason" placeholder="Enter Reason Type">
                              </div>
                              <a href="#" class="btn btn-primary waves-effect waves-light">Submit</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> -->

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