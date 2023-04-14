<?php
    if (!isset($_SESSION[SessionConfig::IS_LOGGED_IN])) {
        $URL = "login.php";
        header('Location: ' . $URL);
    }