<?php
@session_start();
include_once '../Config/SessionConfig.php';
if (!isset($_SESSION[SessionConfig::IS_LOGGED_IN])) {
    $URL = "../profile/login.php";
    header('Location: ' . $URL);
}
function hasPermission($permission)
{
    if (isset($_SESSION[SessionConfig::PRIVILAGS][$permission]) && $_SESSION[SessionConfig::PRIVILAGS][$permission])
        return true;
}

// if (!hasPermission($permission)) {
//     $URL = "../profile/login.php";
//     header('Location: ' . $URL);
// }
