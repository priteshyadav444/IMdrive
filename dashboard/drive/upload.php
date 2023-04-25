<?php
@session_start();
require_once '../shared/check-login.php';

use Validation\Validators\FileValidator;
use Validation\Validators\FormValidator;

require_once '../Config/SessionConfig.php';
require_once '../Config/Privilege.php';
require_once "../library/validation/vendor/autoload.php";
require_once "../database/Connection.php";
require_once "../database/User.php";
$obj = new FormValidator();


$connection = new Connection();
$user = new User($connection->getConnection());


if (isset($_POST['image_name'])) {
    $extention = pathinfo($_FILES["main_image"]['name'], PATHINFO_EXTENSION);
    $isValidFilefomat = in_array($extention, array("jpg", "png", "jpeg", "svg"));
    $deliverableId = $_POST['deliverable_id'];
    $path = "../project-logo";


    if (!$isValidFilefomat) {
        $obj->setError("Uploaded File should be jpg, png, svg, jpeg.", "custom");
    }

    if (!$deliverableId) {
        $obj->setError("Invalid Request ", "custom");
    }

    if (!$isValidFilefomat) {
        $obj->setError("Uploaded File should be jpg, png, svg, jpeg.", "custom");
    }

    $validations = [
        'image_name' => 'required|string',
        'main_image' => "required|filetype:{$extention}|max:40000",
    ];

    $file = new FileValidator($_FILES, "main_image",  $path);

    // if input all valid insert into database
    if (!$obj->validate($_POST, $validations)->isError() && $isValidFilefomat) {

        $img_url = $file->upload();
        $image_info = getimagesize($img_url);

        if (!is_array($image_info)) {
            $obj->setError("Uploaded File should be jpg, png, svg, jpeg.", "custom");
            return;
        }

        $file_size = filesize($img_url); // Get file size in bytes
        $file_size = $file_size / 1024 / 1024; // Get file size in MB

        $imageDetails['name'] = $obj->senitizeInput($_POST['image_name']);
        $imageDetails['width'] = $image_info['0'];
        $imageDetails['height'] = $image_info['1'];
        $imageDetails['size'] = $file_size;
        $imageDetails['img_url'] = ltrim($img_url, '.');
        $imageDetails['image_type'] = $_POST['image_type'];

        $connection = new Connection();
        $user = new User($connection->getConnection());

        $isFormDataValid = $user->insertMainImageDetails($imageDetails, $deliverableId);
    }

    // is error than returning payload
    if ($obj->isError() == true && isset($_POST['image_name'])) {
        $error = $obj->all();

        $response = array(
            'status' => 'failed',
            'msg' => $error[0]
        );

        http_response_code(400);
        echo json_encode($response);
    } else {


        $response = array('status' => 'success');
        echo json_encode($response);
    }
    exit();
}
