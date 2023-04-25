<?php
ob_start();

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Login | Image Drive</title>
  <meta name="description" content="">
  <?php include_once '../shared/head-link.php'; ?>

</head>

<body>
  <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
  <?php

  require_once "../library/validation/vendor/autoload.php";
  require_once "../database/Connection.php";
  require_once "../database/User.php";
  require_once  "../Config/SessionConfig.php";

  use Validation\Validators\FormValidator;

  $obj = new FormValidator();


  if (isset($_POST['submit'])) {
    $validations = [
      'username' => 'required|email',
      'password' => 'required|max:16|password'
    ];
    // if all validation Passed
    if (!$obj->validate($_POST, $validations)->isError()) {
      $connection = new Connection();
      $user = new User($connection->getConnection());

      $isValid = $user->checkCredential($obj->senitizeInput($_POST['username']), $obj->senitizeInput($_POST['password']), true);
      if (!$isValid) {
        $obj->setError("Invalid Caredentails", "custom");
      } else {
        $redirectPageUrl = "../master/index.php";
        header('Location: ' . $redirectPageUrl);
        // var_dump($_SESSION[SessionConfig::PRIVILAGS]);
      }
    }
  }
  ?>
  <div class="error-pagewrap">
    <div class="error-page-int">
      <div class="text-center m-b-md custom-login">
        <h3>Please Login To Access IMAGES DRIVE</h3>
      </div>
      <div class="content-error">
        <div class="hpanel">
          <div class="panel-body">
            <?php
            if ($obj->isError() != false) {
              echo '<div class="alert alert-danger" role="alert">';
              foreach ($obj->all() as $error)
                echo "<li>$error</li>";
              echo '</div>';
            }
            ?>
            <form action="" id="loginForm" method="POST">
              <div class="form-group">
                <label class="control-label" for="username">Email Address</label>
                <input type="text" placeholder="example@gmail.com" title="Please enter you Email Address" required="" value="pritesh@mail.com" name="username" id="username" class="form-control">
              </div>
              <div class="form-group">
                <label class="control-label" for="password">Password</label>
                <input type="password" title="Please enter your password" placeholder="******" required="" required="" value="Pritesh4@" name="password" id="password" class="form-control">
              </div>
              <div class="checkbox login-checkbox">

              </div>
              <button type="submit" class="btn btn-success btn-block loginbtn" name="submit" value="submit">Login</button>
              <button class="btn btn-link">
                <a href="password-recovery.php">Forgot Password</a>
              </button>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
  <?php include_once '../shared/footer-link.php'; ?>

</body>

</html>