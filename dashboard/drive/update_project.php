<?php

require_once "../database/Connection.php";
require_once "../database/User.php";

if (empty($_POST['projectId'])) {
    $URL = "projects.php";
    header('Location: ' . $URL);
}


if (!empty($_POST['newStatus'])) {
    // Update data 
    $projectID = $_POST['projectId'];
    $newStatus = true;
    // Connection
    if ($_POST['newStatus'] == 'on') {
        $newStatus = false;
    }

    $connection = new Connection();
    $user = new User($connection->getConnection());

    $update = $user->updateProjectArchive($projectID, $newStatus);

    if ($update) {
        $response = array('status' => 'success');
    } else {
        $response = array(
            'status' => 0,
            'msg' => 'Something went wrong!'
        );
    }

    echo json_encode($response);
    exit();
}

if (!empty($_POST['newActiveStatus'])) {
    // Update data 
    $projectID = $_POST['projectId'];
    $newStatus = 1;

    // Connection
    if ($_POST['newActiveStatus'] == 'false') {
        $newStatus = 2;
    }

    $connection = new Connection();
    $user = new User($connection->getConnection());

    $update = $user->updateProjectStatus($projectID, $newStatus);

    if ($update) {
        $response = array('status' => 'success', 'statusId' => $newStatus);
    } else {
        $response = array(
            'status' => 0,
            'msg' => 'Something went wrong!'
        );
    }

    echo json_encode($response);
    exit();
}
