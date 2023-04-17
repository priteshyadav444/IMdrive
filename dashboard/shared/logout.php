<?php
@session_start();
include_once '../database/SessionManagment.php';
$SessionManagmentObj = new SessionManagment();

if ($SessionManagmentObj->removeSession()) {
    $URL = "../profile/login.php";
    header('Location: ' . $URL);
}
