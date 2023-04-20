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


if (isset($_POST['email'])) {
    $newEmailId = $_POST['email'];

    $pattern = '/^[a-zA-Z]+\.[a-zA-Z]+$/';
    if (!preg_match($pattern, $newEmailId) || $user->insertEmail($newEmailId)==false) {
        $response = array(
            'status' => 'failed',
            'msg' => "Enter valid Email Domail (ex. gmail.com)"
        );

        http_response_code(400);
        echo json_encode($response);
        exit();
    }
    $response = array(
        'status' => 'success',
        'msg' => "Email Added"
    );

    

    $response = array('status' => 'success');
    echo json_encode($response);
} else {
    $response = array(
        'status' => 'failed',
        'msg' => "Enter valid Email Domail (ex. gmail.com)"
    );
    http_response_code(400);
    echo json_encode($response);
    exit();
}
