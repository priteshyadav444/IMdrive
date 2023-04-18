<?php
@session_start();
require_once '../shared/check-login.php';
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Add Project | Image Drive</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php
  require_once '../shared/head-link.php';
  require_once '../Config/SessionConfig.php';
  require_once '../Config/Privilege.php';
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
  <?php include_once '../shared/left-sidebar.php'; ?>

  <!-- End Left menu area -->
  <!-- Start Welcome area -->
  <div class="all-content-wrapper">
    <?php include_once '../shared/header-top.php'; ?>

    <?php

    use Validation\Validators\FileValidator;
    use Validation\Validators\FormValidator;

    $obj = new FormValidator();


    // Generate select options
    $connection = new Connection();
    $user = new User($connection->getConnection());
    $options = " <option value='null'>Select Deliverable Type</option>";

    $deliverables = $user->getAllDelverable();
    foreach ($deliverables as $deliverable) {
      $options .= '<option value="' . $deliverable['deliverable_id'] . '">' . $deliverable['deliverable_name'] . '</option>';
    }

    if (isset($_POST['submit_project_create'])) {

      $extention = pathinfo($_FILES["logo"]['name'], PATHINFO_EXTENSION);

      in_array($extention, array("jpg", "png", "jpeg", "svg"));
      
      $validations = [
        'name' => 'required|string',
        'deliverable' => 'required',
        'description' => 'required|string',
        'logo' => "required|filetype:{$extention}|max:40000",
      ];


      $file = new FileValidator($_FILES, "logo", "files");
      $file->upload();

      // if all validation Passed
      if (!$obj->validate($_POST, $validations)->isError()) {

        $connection = new Connection();
        $user = new User($connection->getConnection());

        // $isFormDataValid = $user->createProject($obj->senitizeInput($_POST['name']));
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
                <li class="active"><a href="#description">Add Project</a></li>

              </ul>
              <div id="myTabContent" class="tab-content custom-product-edit">
                <div class="product-tab-list tab-pane fade active in" id="description">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="review-content-section">
                        <?php
                        if ($obj->isError() != false && isset($_POST['submit_project_create'])) {
                          echo '<div class="alert alert-danger" role="alert">';
                          foreach ($obj->all() as $error)
                            echo "<li>$error</li>";
                          echo '</div>';
                        } else if (isset($isFormDataValid) && $isFormDataValid  && isset($_POST['submit_project_create'])) {
                          echo '<div class="alert alert-success" role="alert">';
                          echo "<li>Project Created Successfully </li>";
                          echo '</div>';
                        }
                        ?>
                        <form action="" class="add-department" method="POST" enctype="multipart/form-data">
                          <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <div class="form-group">
                                <input name="name" type="text" class="form-control" placeholder="Enter Project Name">
                              </div>
                              <div class="form-group">
                                <input name="logo" type="file" class="form-control" accept="image/png, image/svg, image/jpeg, image/jpg" placeholder="Select Project Logo ">
                              </div>

                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <div class="form-group">
                                <div class="form-select-list">
                                  <select class="form-control custom-select-value" name="deliverable">
                                    <?php echo $options; ?>
                                  </select>
                                </div>
                              </div>

                              <div class="form-group">
                                <input name="description" type="text" class="form-control" placeholder="Enter Project Description">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="payment-adress">
                                <button type="submit" class="btn btn-primary waves-effect waves-light" name="submit_project_create" value="submit_project_create">Submit</button>
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
    <?php include_once '../shared/footer-link.php'; ?>


</body>

</html>