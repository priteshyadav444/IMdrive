<?php

require_once "../database/Connection.php";
require_once "../database/User.php";

if (empty($_POST['action'])) {
    $URL = "index.php";
    header('Location: ' . $URL);
}


if (($_POST['action'] == 'edit') && !empty($_POST['id']) && !empty($_POST['deliverable_name'])) {
    // Update data 
    $delierable_name = $_POST['deliverable_name'];
    $delierable_id = $_POST['id'];

    // Connection
    $connection = new Connection();
    $user = new User($connection->getConnection());

    $update = $user->updateDeliverable($delierable_name, $delierable_id);

    if ($update) {
        $response = array(
            'status' => 1,
            'msg' => 'Deliverable has been updated successfully.',
            'data' => $delierable_name
        );
    } else {
        $response = array(
            'status' => 0,
            'msg' => 'Something went wrong!'
        );
    }

    echo json_encode($response);
    exit();
}


if (($_POST['action'] == 'edit') && !empty($_POST['id']) && !empty($_POST['task_type_name'])) {
    // Update data 
    $task_type_name = $_POST['task_type_name'];
    $reason_id = $_POST['id'];

    // Connection
    $connection = new Connection();
    $user = new User($connection->getConnection());

    $update = $user->updateTaskType($task_type_name, $reason_id);

    if ($update) {
        $response = array(
            'status' => 1,
            'msg' => 'Task has been updated successfully.',
            'data' => $task_type_name
        );
    } else {
        $response = array(
            'status' => 0,
            'msg' => 'Something went wrong!'
        );
    }

    echo json_encode($response);
    exit();
}


if (($_POST['action'] == 'edit') && !empty($_POST['id']) && !empty($_POST['team_name'])) {
    // Update data 
    $team_name = $_POST['team_name'];
    $team_id = $_POST['id'];

    // Connection
    $connection = new Connection();
    $user = new User($connection->getConnection());

    $update = $user->updateTeam($team_name, $team_id);
    if ($update) {
        $response = array(
            'status' => 1,
            'msg' => 'Team has been updated successfully.',
            'data' => $team_name
        );
    } else {
        $response = array(
            'status' => 0,
            'msg' => 'Something went wrong!'
        );
    }

    echo json_encode($response);
    exit();
}


if (($_POST['action'] == 'edit') && !empty($_POST['id']) && !empty($_POST['content'])) {
    // Update data 
    $content = $_POST['content'];
    $reason_id = $_POST['id'];

    // Connection
    $connection = new Connection();
    $user = new User($connection->getConnection());

    $update = $user->updateTicketReason($content, $reason_id);

    if ($update) {
        $response = array(
            'status' => 1,
            'msg' => 'Reason has been updated successfully.',
            'data' => $content
        );
    } else {
        $response = array(
            'status' => 0,
            'msg' => 'Something went wrong!'
        );
    }

    echo json_encode($response);
    exit();
}
