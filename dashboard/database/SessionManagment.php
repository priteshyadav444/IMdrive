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
    public function removeSession()
    {
        $_SESSION[SessionConfig::IS_LOGGED_IN] = null;
        unset($_SESSION[SessionConfig::IS_LOGGED_IN]);
        $_SESSION[SessionConfig::USER_DETAILS] = null;
        unset($_SESSION[SessionConfig::USER_DETAILS]);

        $_SESSION[SessionConfig::PRIVILAGS] = null;
        unset($_SESSION[SessionConfig::PRIVILAGS]);
        return true;
    }
    public function getUserId()
    {

        if (!isset($_SESSION[SessionConfig::USER_DETAILS]['user_id']))
            return false;

        return $_SESSION[SessionConfig::USER_DETAILS]['user_id'];
    }

    public function getUserRole()
    {

        if (!isset($_SESSION[SessionConfig::USER_DETAILS]['user_role_id']))
            return false;

        return $_SESSION[SessionConfig::IS_LOGGED_IN]['user_role_id'];
    }
}
