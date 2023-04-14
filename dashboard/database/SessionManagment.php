<?php
@session_start();
date_default_timezone_set("Asia/Calcutta");
require_once '../Config/SessionConfig.php';

class SessionManagment extends SessionConfig
{
    public function setSession($userId, $Permission, $userDetails)
    {
        $this->removeSession();
        $this->setLoggedIn($userId);
        $this->setPrivilages($Permission);
        $this->setUserDetails($userDetails);
    }
    private function setPrivilages($permission)
    {
        $_SESSION[SessionConfig::PRIVILAGS] = $permission;
    }
    private function setUserDetails($userDetails)
    {
        $_SESSION[SessionConfig::USER_DETAILS] = $userDetails;
    }
    private function setLoggedIn($status)
    {
        $_SESSION[SessionConfig::IS_LOGGED_IN] = $status;
    }
    private function removeSession()
    {
        $_SESSION[SessionConfig::IS_LOGGED_IN] = null;
        $_SESSION[SessionConfig::USER_DETAILS] = null;
        $_SESSION[SessionConfig::PRIVILAGS] = null;
    }
}
