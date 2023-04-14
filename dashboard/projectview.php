<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>User - Image Drive</title>
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
  <?php include_once 'left-sidebar.php'; ?>
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
    <div class="breadcome-area">
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
                    <li><a href="#">Drive</a> <span class="bread-slash">/</span>
                    </li>
                    <li><span class="bread-blod">Project1</span>
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
            <div class="container">
              <h2>Project Name</h2>
              <hr>
              <div class="panel panel-default">
                <div class="panel-heading">Deliverables</div>
                <div class="panel-body">
                  <div class="list-group">
                    <a href="deliverable.php">
                      <span class="glyphicon glyphicon-folder-close" class="list-group-item"></span> Deliverable 1
                    </a>
                    <span class="pull-right" class="list-group-item">
                      <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#assignModal"><i class="glyphicon glyphicon-plus"></i> Assign</button>
                    </span>


                  </div>

                  <div class="list-group">
                    <a href="deliverable.php">
                      <span class="glyphicon glyphicon-folder-close" class="list-group-item"></span> Deliverable 1
                    </a>
                    <span class="pull-right" class="list-group-item">
                      <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#assignModal"><i class="glyphicon glyphicon-plus"></i> Assign</button>
                    </span>
                  </div>
                </div>
              </div>


              <div class="modal fade" id="assignModal" tabindex="-1" role="dialog" aria-labelledby="assignModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="assignModalLabel">Assign Project</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Assign to:</label>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="assignType" id="assignToTeam" checked>
                          <label class="form-check-label" for="assignToTeam">Team</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="assignType" id="assignToMember">
                          <label class="form-check-label" for="assignToMember">Team Member</label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label>Select Team:</label>
                        <select id="assignList" class="form-control" multiple>
                          <option>Team A</option>
                          <option>Team B</option>
                          <option>Team C</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Select Team Member:</label>
                        <select id="assignList" class="form-control" multiple>
                          <option>Member A</option>
                          <option>Member B</option>
                          <option>Member C</option>
                        </select>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="assignAllFiles" id="assignAllFiles" checked>
                        <label class="form-check-label" for="assignAllFiles">Assign All Files</label>
                      </div>

                      <div class="form-group">
                        <label>Search Files:</label>
                        <input type="text" class="form-control" id="assignSearchFiles" placeholder="Enter search term...">
                      </div>

                      <label>Select Files:</label>
                      <select id="assignFiles" class="form-control" multiple>
                        <option>File A</option>
                        <option>File B</option>
                        <option>File C</option>
                      </select>

                      <div class="form-group">
                        <button type="button" class="btn btn-primary" id="addFileBtn">Add File</button>
                      </div>

                      <!-- Add Task Button -->
                      <div class="form-group">
                        <label for="taskType">Task Type*</label>
                        <select id="assignList" class="form-control" id="taskType" placeholder="Enter Task Type">
                          <option>Task A</option>
                          <option>Task B</option>
                          <option>Task C</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="taskDescription">Task Description*</label>
                        <textarea class="form-control" id="taskDescription" rows="3" placeholder="Enter Task Description"></textarea>
                      </div>
                      <button class="btn btn-primary" data-toggle="modal" data-target="#assignModalTask">
                        <i class="glyphicon glyphicon-plus"></i> Add Task
                      </button>

                    </div>
                    <!-- Assign Modal  Footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      <button type="button" class="btn btn-primary" id="assignBtn">Assign</button>
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