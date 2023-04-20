<?php
@session_start();
require_once '../shared/check-login.php';
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Uses List | Image Drive</title>
  <?php
  require_once '../shared/head-link.php';
  require_once '../Config/SessionConfig.php';
  include_once '../Config/Privilege.php';
  require_once "../library/validation/vendor/autoload.php";
  require_once "../database/Connection.php";
  require_once "../database/User.php";
  ?>
</head>
<?php


$hasPermissionToViewUser = false;
$hasPermissionToCreateUser = false;
$hasPermissionToUpdateUser = false;

if (isset($_SESSION[SessionConfig::PRIVILAGS][Privilege::VIEW_USER]) && $_SESSION[SessionConfig::PRIVILAGS][Privilege::VIEW_USER]) {
  $hasPermissionToViewUser = true;
}

if (isset($_SESSION[SessionConfig::PRIVILAGS][Privilege::CREATE_USER]) && $_SESSION[SessionConfig::PRIVILAGS][Privilege::CREATE_USER]) {
  $hasPermissionToCreateUser = true;
}

if (isset($_SESSION[SessionConfig::PRIVILAGS][Privilege::UPDATE_USER]) && $_SESSION[SessionConfig::PRIVILAGS][Privilege::UPDATE_USER]) {
  $hasPermissionToUpdateUser = true;
}

if (!$hasPermissionToViewUser) {
  $connection = new Connection();
  $user = new User($connection->getConnection());

  $row = "";

  foreach ($result as $data) {
    $row = $row . '

        ';

    if ($hasPermissionToUpdateUser) {
      $row = $row . ' 
            <td>
             <button class="btn btn-link" data-toggle="modal" data-target="#assigneesModal" id=' . $data['role_id'] . '>
                View All
             </button>
            </td>
            <td>
              <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
            </td>
          <td><button class="btn btn-primary" data-toggle="modal" data-target="#assignModal" id=' . $data['role_id'] . '><i class="glyphicon glyphicon-plus"></i></button></td> </tr>';
    } else {
      $row = $row . '</tr>';
    }
  }
}
?>

<body>
  <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
  <?php include_once '../shared/left-sidebar.php';
  ?>
  <!-- End Left menu area -->
  <!-- Start Welcome area -->
  <div class="all-content-wrapper">
    <?php include_once '../shared/logolink.php'; ?>
    <div class="header-advance-area">
      <?php include_once '../shared/navbar.php'; ?>
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
                      <li><span class="bread-blod">User</span>
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
                <h4>User List</h4>
                <div class="add-product">
                  <?php
                  if ($hasPermissionToViewUser) {
                    echo '<a href="add-user.php">Add User</a>';
                  }
                  ?>
                </div>
                <div class="asset-inner">
                  <table>
                    <tr>
                      <th>User Id</th>
                      <th>Date of Creation</th>
                      <th>Name of User</th>
                      <th>Email</th>
                      <th>Type</th>
                      <th>Team</th>
                      <th>Status</th>
                      <th>Change Status</th>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>12/03/2022</td>
                      <td>John Alva</td>
                      <td>admin@gmail.com</td>
                      <td>users</td>
                      <td>Admin Panel Web, BackEnd </td>
                      <td>
                        <button class="pd-setting">Active</button>
                      </td>

                      <td>
                        <div class="material-switch">
                          <input id="someSwitchOptionPrimary" name="someSwitchOption001" type="checkbox" />
                          <label for="someSwitchOptionPrimary" class="label-primary"></label>
                        </div>
                      </td>
                    </tr>
                </div>
                </td>
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