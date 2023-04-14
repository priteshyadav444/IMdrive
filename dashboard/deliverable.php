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


    <link rel="stylesheet" href="css/dropzone/dropzone.css">
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

        .copy-icon {
            display: inline-block;
            width: 20px;
            height: 20px;
            background-repeat: no-repeat;
            background-size: cover;
            cursor: pointer;
        }
    </style>
    <script>
        function copyToClipboard(text) {
            // create a textarea element
            var textarea = document.createElement("textarea");
            // set the value of the textarea to the text to be copied
            textarea.value = text;
            // add the textarea element to the DOM
            document.body.appendChild(textarea);
            // select the text in the textarea
            textarea.select();
            // copy the selected text to clipboard
            document.execCommand("copy");
            // remove the textarea element from the DOM
            document.body.removeChild(textarea);
        }

        // add a click event listener to the copy icon
        var copyIcon = document.querySelector('.copy-icon');
        copyIcon.addEventListener('click', function() {
            // get the text to be copied from the adjacent cell
            var copyText = this.parentNode.nextElementSibling.textContent;
            // copy the text to clipboard
            copyToClipboard(copyText);
        });
    </script>
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
                                        <li><span class="bread-blod">Project1 / </span>
                                        </li>

                                        <li><span class="bread-blod">Deliverable</span>
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
                            <h3>Images List - Deliverable</h3>
                            <div class="add-product">
                                <div class="add-product">
                                    <!-- Button trigger modal -->
                                    <a class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Project</a>
                                </div>
                            </div>


                            <!-- Image Upload Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Upload Image</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="form-group">
                                                    <label for="image-name" class="col-form-label">Image Name:</label>
                                                    <input type="text" class="form-control" id="image-name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="main-image-upload" class="col-form-label">Main Image Upload:</label>
                                                    <input type="file" class="form-control-file" id="main-image-upload">
                                                </div>
                                                <div class="form-group">
                                                    <label for="variant-image-upload" class="col-form-label">Upload Variant of Image:</label>
                                                    <input type="file" class="form-control-file" id="variant-image-upload">
                                                </div>
                                                <div class="multi-uploaded-area mg-b-15">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="alert-title dropzone-custom-sys">
                                                                    <h2>Drag and Drop file uploads System</h2>
                                                                    <p>Dropzone Drag and Drop file uploads javascript plugins. Users using an old browser will be able to upload files. If you want the whole body to be a Dropzone and display the files somewhere else you can simply instantiate a
                                                                        Dropzone object for the body.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="dropzone-pro mg-tb-30">
                                                                    <div id="dropzone1" class="multi-uploader-cs">
                                                                        <form action="/upload" class="dropzone dropzone-custom needsclick" id="demo1-upload">
                                                                            <div class="dz-message needsclick download-custom">
                                                                                <i class="fa fa-download" aria-hidden="true"></i>
                                                                                <h2>Drop files here or click to upload.</h2>
                                                                                <p><span class="note needsclick">(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</span>
                                                                                </p>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="dropzone-pro">
                                                                    <div id="dropzone" class="multi-uploader-cs">
                                                                        <form action="/upload" class="dropzone dropzone-custom needsclick" id="demo-upload">
                                                                            <div class="dz-message needsclick download-custom">
                                                                                <i class="fa fa-cloud-download" aria-hidden="true"></i>
                                                                                <h2>Drop files here or click to upload.</h2>
                                                                                <p><span class="note needsclick">(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</span>
                                                                                </p>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Upload</button>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <!-- Image Details Modal -->
                            <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="imageModalLabel">Image Name</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <img src="https://images.pexels.com/photos/1029757/pexels-photo-1029757.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="img-responsive" style="hieght:50px;">

                                            <div class="row">

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="imageName">Image Name:</label>
                                                        <input type="text" class="form-control" id="imageName" value="Image Name" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="addedOn">Added On:</label>
                                                        <input type="text" class="form-control" id="addedOn" value="01/01/2023" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="copyPath">Copy Path:</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="copyPath" value="/path/to/image.jpg" readonly>
                                                            <div class="">
                                                                <button class="btn btn-secondary" type="button" data-toggle="tooltip" data-placement="top" title="Copy to clipboard"><i class="fa fa-clipboard"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="noOfVariants">No. of Variants:</label>
                                                        <input type="text" class="form-control" id="noOfVariants" value="4" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="imageSize" readonly>Image Size:</label>
                                                        <input type="text" class="form-control" id="imageSize" value="2.5 MB" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="imageSize" readonly>Image property:</label>
                                                        <input type="text" class="form-control" id="imageSize" value="12 X 12 PX" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="renameImage">Rename Image:</label>
                                                        <input type="text" class="form-control" id="renameImage" value="image-path.jpg">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <button type="button" class="btn btn-default btn-sm col-md-2 mr-2">Update Name</button>
                                                        <button type="button" class="btn btn-danger btn-sm col-md-2">Delete</button>
                                                        <button type="button" class="btn btn-success btn-sm col-md-2">Download</button>
                                                        <button type="button" class="btn btn-primary btn-sm col-md-2">Replace</button>
                                                    </div>
                                                </div>

                                            </div>

                                            <hr>
                                            <h5>Variants:</h5>
                                            <div class="row">

                                                <div class="col-xs-6 col-md-2">
                                                    <a href="#" class="thumbnail">
                                                        <img src="https://images.pexels.com/photos/1029757/pexels-photo-1029757.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="variant-image">
                                                    </a>
                                                </div>
                                                <div class="col-xs-6 col-md-2">
                                                    <a href="#" class="thumbnail">
                                                        <img src="https://images.pexels.com/photos/1029757/pexels-photo-1029757.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="variant-image">
                                                    </a>
                                                </div>
                                                <div class="col-xs-6 col-md-2">
                                                    <a href="#" class="thumbnail">
                                                        <img src="https://images.pexels.com/photos/1029757/pexels-photo-1029757.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="variant-image">
                                                    </a>
                                                </div>
                                                <div class="col-xs-6 col-md-2">
                                                    <a href="#" class="thumbnail">
                                                        <img src="https://images.pexels.com/photos/1029757/pexels-photo-1029757.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="variant-image">
                                                    </a>
                                                </div>
                                                <div class="col-xs-6 col-md-2">
                                                    <a href="#" class="thumbnail">
                                                        <img src="https://images.pexels.com/photos/1029757/pexels-photo-1029757.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="variant-image">
                                                    </a>
                                                </div>
                                                <div class="col-xs-6 col-md-2">
                                                    <a href="#" class="thumbnail">
                                                        <img src="https://images.pexels.com/photos/1029757/pexels-photo-1029757.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="variant-image">
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="main-image-upload" class="col-form-label">Varient Image Upload:</label>
                                                <input type="file" class="form-control-file" id="main-image-upload">
                                            </div>
                                            <div class="form-group">
                                                <button type="button" class="btn btn-primary" id="addFileBtn">Add Varient</button>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="asset-inner">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Image Name</th>
                                        <th>Copy Path</th>
                                        <th>Display Path</th>
                                        <th>No. Variant Attached</th>
                                        <th>View Property</th>
                                        <th>Rename</th>
                                        <th>Delete Image</th>
                                        <th>Download</th>
                                        <th>Replace Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><img src="https://via.placeholder.com/150x150" alt="Image"></td>

                                        <td>
                                            <button class="btn btn-link">
                                                <button class="btn btn-link" data-toggle="modal" data-target="#imageModal"> Image 1</button>
                                            </button>

                                        </td>

                                        <td>/images/image1.jpg <i class="fa fa-clipboard copy-icon" aria-hidden="true"></i></td>
                                        <td>/images/image1.jpg <i class="fa fa-clipboard copy-icon" aria-hidden="true"></i></td>


                                        <td>2</td>
                                        <td>
                                            <ul>
                                                <li>Size: 1.2 MB</li>
                                                <li>Dimensions: 1024x768 px</li>
                                            </ul>
                                        </td>
                                        <td><button class="btn btn-default btn-sm">Rename</button></td>
                                        <td><button class="btn btn-danger btn-sm">Delete</button></td>
                                        <td><button class="btn btn-success btn-sm">Download</button></td>
                                        <td><button class="btn btn-primary btn-sm">Replace</button></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td><img src="https://via.placeholder.com/150x150" alt="Image"></td>
                                        <td><a href="#">Image 2</a></td>
                                        <td>/path/to/image2.jpg</td>
                                        <td>/images/image2.jpg</td>
                                        <td>1</td>
                                        <td>
                                            <ul>
                                                <li>Size: 2.5 MB</li>
                                                <li>Dimensions: 1280x720 px</li>
                                            </ul>
                                        </td>
                                        <td><button class="btn btn-default btn-sm">Rename</button></td>
                                        <td><button class="btn btn-danger btn-sm">Delete</button></td>
                                        <td><button class="btn btn-success btn-sm">Download</button></td>
                                        <td><button class="btn btn-primary btn-sm">Replace</button></td>
                                    </tr>
                                    <!-- add more rows for other images and variants -->
                                </tbody>
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