<?php
@session_start();
require_once '../shared/check-login.php';
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>User - Image Drive</title>
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
  <!-- Start Left menu area -->
  <?php include_once '../shared/left-sidebar.php'; ?>
  <!-- End Left menu area -->
  <!-- Start Welcome area -->
  <div class="all-content-wrapper">
    <?php include_once '../shared/logolink.php'; ?>
    <div class="header-advance-area">
      <?php include_once '../shared/navbar.php'; ?>

      <?php
      $connection = new Connection();
      $user = new User($connection->getConnection());

      $hasPermissionToViewRoleAndPermission = false;
      $hasPermissionToCreateRoleAndPermission = false;
      $hasPermissionToUpdateRoleAndPermission = false;

      if (isset($_SESSION[SessionConfig::PRIVILAGS][Privilege::VIEW_ROLES_PERMISSION]) && $_SESSION[SessionConfig::PRIVILAGS][Privilege::VIEW_ROLES_PERMISSION]) {
        $hasPermissionToViewRoleAndPermission = true;
      }

      if (isset($_SESSION[SessionConfig::PRIVILAGS][Privilege::CREATE_ROLES_PERMISSION]) && $_SESSION[SessionConfig::PRIVILAGS][Privilege::CREATE_ROLES_PERMISSION]) {
        $hasPermissionToCreateRoleAndPermission = true;
      }

      if (isset($_SESSION[SessionConfig::PRIVILAGS][Privilege::UPDATE_ROLES_PERMISSION]) && $_SESSION[SessionConfig::PRIVILAGS][Privilege::UPDATE_ROLES_PERMISSION]) {
        $hasPermissionToUpdateRoleAndPermission = true;
      }
      // var_dump($_SESSION[SessionConfig::PRIVILAGS][Privilege::VIEW_ROLES_PERMISSION]);

      $row = "";
      $result = $user->getAllRoles();
      // var_dump($result);

      if ($hasPermissionToViewRoleAndPermission) {



        foreach ($result as $data) {
          $row = $row . '<tr>
          <td>' . $data['id'] . '</td>
          <td>' . $data['user_type'] . ' </td>
          <td>' . $data['created_on'] . '</td>
          <td>
            <button class="btn btn-link" data-toggle="modal" data-target="#assigneesModal" id=' . $data['role_id'] . '>
              View All
            </button>
         </td>
        ';

          if ($hasPermissionToUpdateRoleAndPermission) {
            $row = $row . ' 
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


      <div class="product-status mg-b-15 mg-t-20">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="product-status-wrap drp-lst">
                <h4>Role And Persmission List</h4>

                <div class="asset-inner">
                  <table>
                    <tr>
                      <th>Id</th>
                      <th>User type</th>
                      <th>Created On</th>
                      <th>View Roles and Permissions</th>
                      <th>Edit Roles and Permission</th>
                      <th>Add new Role and Permission</th>
                    </tr>
                    <?php echo $row; ?>
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