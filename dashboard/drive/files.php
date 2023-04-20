<?php
@session_start();
require_once '../shared/check-login.php';
$deliverableId = $_GET['id'];
if (!$deliverableId) {
    $URL = "projects.php";
    header('Location: ' . $URL);
}
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Files - Deliberables Name</title>
    <meta name="description" content="">
    <?php
    require_once '../shared/head-link.php';
    require_once '../Config/SessionConfig.php';
    include_once '../Config/Privilege.php';
    require_once "../library/validation/vendor/autoload.php";
    require_once "../database/Connection.php";
    require_once "../database/User.php";
    ?>

    <link rel="stylesheet" href="css/dropzone/dropzone.css">

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
    <?php
    include_once '../shared/left-sidebar.php';

    $connection = new Connection();
    $user = new User($connection->getConnection());

    $hasPermissionToViewFiles = false;
    $hasPermissionToCreateFiles = false;
    $hasPermissionToUpdateFiles = false;

    if (isset($_SESSION[SessionConfig::PRIVILAGS][Privilege::VIEW_FILES]) && $_SESSION[SessionConfig::PRIVILAGS][Privilege::VIEW_FILES]) {
        $hasPermissionToViewFiles = true;
    }

    if (isset($_SESSION[SessionConfig::PRIVILAGS][Privilege::CREATE_FILES]) && $_SESSION[SessionConfig::PRIVILAGS][Privilege::CREATE_FILES]) {
        $hasPermissionToCreateFiles = true;
    }

    if (isset($_SESSION[SessionConfig::PRIVILAGS][Privilege::UPDATE_FILES]) && $_SESSION[SessionConfig::PRIVILAGS][Privilege::UPDATE_FILES]) {
        $hasPermissionToUpdateFiles = true;
    }

    if (isset($_GET['id'])) {
        $result = $user->getMainFileDetails($deliverableId);
        $row = "";

        foreach ($result as $data) {

            $row = $row . '<tr>
            <td>  ' . $data["file_id"] . '</td>
            <td><img src="../' . $data["image_url"] . '" alt="Image"></td>

            <td>
                <button class="btn btn-link">
                    <button class="btn btn-link" data-toggle="modal" data-target="#imageModal">' . $data["name"] . '</button>
                </button>

            </td>

            <td>' . $data["image_url"] . '<i class="fa fa-clipboard copy-icon" aria-hidden="true"></i></td>
            <td>' . $data["image_url"] . ' <i class="fa fa-clipboard copy-icon" aria-hidden="true"></i></td>


            <td> ' . $data["no_of_varient"] . ' varients</td>
            <td>
                <ul>
                    <li>Size: ' . $data["size"] . ' MB</li>
                    <li>Dimensions:' . $data["width"] . ' x ' . $data["height"] . 'px</li>
                </ul>
            </td>
            <td><button class="btn btn-success btn-sm">Download</button></td>
            ';


            if ($hasPermissionToUpdateFiles) {
                $row = $row . '<td><button class="btn btn-default btn-sm">Rename</button></td>
                <td><button class="btn btn-danger btn-sm">Delete</button></td>
                
                <td><button class="btn btn-primary btn-sm">Replace</button></td>
            </tr>';
            } else {
                $row = $row . '</tr>';
            }
        }
    }

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
                                        <a class="btn btn-primary" data-toggle="modal" data-target="#uploadForm">Upload Files</a>
                                    </div>
                                </div>

                                <?php if ($hasPermissionToCreateFiles) {
                                }

                                ?>
                                <!-- Image Upload Modal -->
                                <div class="modal fade" id="uploadForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Upload Image</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="alert" role="alert">
                                                </div>
                                                <form action="upload.php" method="POST" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label for="image-name" class="col-form-label">Image Name:</label>
                                                        <input type="text" class="form-control" id="image-name" name="image_name">
                                                        <input type="hidden" class="form-control" id="image-name" name="image_type" value="1">
                                                        <input type="hidden" class="form-control" id="image-name" name="deliverable_id" value="<?php echo $deliverableId?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="main-image-upload" class="col-form-label">Main Image Upload:</label>
                                                        <input name="main_image" type="file" class="form-control" accept="image/png, image/svg, image/jpeg, image/jpg" placeholder="Select Project Logo ">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary" name="image_upload" value="image_upload">Upload</button>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                                        <?php echo $row; ?>



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
        <?php include_once '../shared/footer.php'; ?>
    </div>
    <?php include_once '../shared/footer-link.php'; ?>
</body>
</div>

<script>
    $(document).ready(function() {
        $('#uploadForm form').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                url: 'upload.php',
                type: 'POST',
                data: formData,
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    $('#uploadForm .alert').removeClass('alert-danger').addClass('alert-success').html('<li> File Uploaded Successfully </li>').show();
                },
                error: function(xhr, status, error) {
                    $('#uploadForm .alert').removeClass('alert-success').addClass('alert-danger').html('<li>' + JSON.parse(xhr.responseText).msg + '</li>').show();
                }
            });
        });
    });
</script>


</body>

</html>