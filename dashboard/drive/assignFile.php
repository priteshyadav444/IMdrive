<?php
@session_start();
require_once '../shared/check-login.php';

require_once '../Config/SessionConfig.php';
require_once '../Config/Privilege.php';
require_once "../library/validation/vendor/autoload.php";
require_once "../database/Connection.php";
require_once "../database/User.php";

$connection = new Connection();
$user = new User($connection->getConnection());

$result = array();
if (isset($_POST['assignType'])) {
    if ($_POST['assignType']) {
        $result['status'] =  $user->assignToTeam($_POST);
        echo json_encode($result);
        exit();
    }
} else {
    header('Content-Type: application/json');
    echo json_encode($result);
    exit();
}
