<?php
@session_start();
require_once '../shared/check-login.php';
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

  use Validation\Validators\FileValidator;
  use Validation\Validators\FormValidator;

  $obj = new FormValidator();


  // Generate select options
  $connection = new Connection();
  $user = new User($connection->getConnection());


  $options = " <option value='null' disabled >Select Deliverable</option>";

  // $userTypes = $user->getUserTypeRole();
  // foreach ($userTypes as $userType) {
  //   $options .= '<option value="' . $deliverable[''] . '">' . $deliverable[''] . '</option>';
  // }

  // if (isset($_POST['user_create'])) {
  //   $validations = [
  //     'name' => 'required|string',
  //     'description' => 'required|string',
  //     'logo' => "required|filetype:{$extention}|max:40000",
  //   ];

  //   $path = "../project-logo";


  //   // if all validation Passed
  //   if (!$obj->validate($_POST, $validations)->isError() && $isValidFilefomat) {

  //     $img_url = $file->upload();
  //     $projectDetails['name'] = $obj->senitizeInput($_POST['name']);
  //     $projectDetails['deliverable_id'] = $_POST['deliverable'];
  //     $projectDetails['description'] = $obj->senitizeInput($_POST['description']);
  //     $projectDetails['img_url'] = ltrim($img_url, '.');

  //     $connection = new Connection();
  //     $user = new User($connection->getConnection());

  //     $isFormDataValid = $user->createProject($projectDetails);
  //   }
  // }

  // 
  ?>


  <?php
  include_once '../shared/left-sidebar.php';
  ?>
  <!-- End Left menu area -->
  <!-- Start Welcome area -->
  <div class="all-content-wrapper">
    <?php include_once '../shared/logolink.php'; ?>

    <!-- Single pro tab review Start-->
    <div class="single-pro-review-area mt-t-30 mg-b-15 mg-t-15">
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
                        <form id="add-department" action="" class="add-department">
                          <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <div class="form-group">
                                <input name="name" type="text" class="form-control" placeholder="Name">
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
                                    <option>Select User Type</option>
                                    <option>Select 2</option>
                                    <option>Select 3</option>
                                    <option>Select 4</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="form-select-list">
                                  <select class="form-control custom-select-value" name="team">
                                    <option>Select Team</option>
                                    <option>Select 2</option>
                                    <option>Select 3</option>
                                    <option>Select 4</option>
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
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
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