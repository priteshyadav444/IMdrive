<?php

use Validation\Validators\Validate;

include 'SessionManagment.php';
class User
{
    private $connection;
    private $sessionManagment;

    /**
     * __construct : create a Connection Injection
     *
     * @return void
     */
    public function __construct($con, $sessionObject = new SessionManagment())
    {
        # Create connection
        $this->connection = $con;
        $this->sessionManagment = $sessionObject;
    }

    /**
     * checkCredential
     *
     * @return void
     */
    public function checkCredential($username, $password, $setSession = false)
    {
        try {
            $sqlQuery = "SELECT * FROM `users` where `email` = ? and `password` = ? LIMIT 0, 1";
            $stmt = $this->connection->prepare($sqlQuery);

            $stmt->bindValue(1, $username);
            $stmt->bindValue(2, $password);

            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$row) {
                return false;
            }
            // setting session with perivilages
            if ($setSession &&  $userRoleId = $row['user_role_id']) {
                $this->sessionManagment->setSession($row['user_id'], $this->getPrivailages($userRoleId), $row);
            }
            return true;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    /**
     * getPrivailages : return All the Privilages in key value Pair wherr key is permission name and value is Boolean value (if true allowed elseif false than Not Allowed) 
     *
     * @param  mixed $userRoleId : Return Privilages for this role
     * @return void
     */
    private function getPrivailages($userRoleId)
    {
        $sqlQuery = "SELECT
        permissions.name,
        role_permission.permission_value
        FROM `user_role`
        JOIN `role_permission`
          ON `user_role`.`role_id` = `role_permission`.`role_id` 
        JOIN `permissions`
          ON `permissions`.`permission_id` = `role_permission`.`permission_id`
        AND `user_role`.`id` = ?
        ";

        try {
            $stmt = $this->connection->prepare($sqlQuery);
            $stmt->bindValue(1, $userRoleId);
            $stmt->execute();
            $privilages = array();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $privilages[$row['name']] = $row['permission_value'];
            }
            return $privilages;
        } catch (PDOException $e) {

            die($e->getMessage());
        }
    }

    private function checkPrivilages($userRoleId, $action)
    {
        $allPrilages = $this->getPrivailages($userRoleId);
        var_dump(isset($allPrilages[$action]));
        var_dump(($allPrilages[$action] == 1));

        if (isset($allPrilages[$action]) &&  $allPrilages[$action] == 1)
            return true;

        return false;
    }

    /**
     * getUserRole Returns User role id of passed userid
     *
     * @param  mixed $userId
     * @return void
     */
    public function getUserRole($userId)
    {
        try {
            $sqlQuery = "SELECT `user_role_id` FROM `users` where `user_id` = ?";
            $stmt = $this->connection->prepare($sqlQuery);

            $stmt->bindValue(1, $userId);

            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_COLUMN);

            if (!$row) {
                return false;
            }

            return $row;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }




    public function createDeliverable($deliverableName, $action)
    {
        $userId = $this->sessionManagment->getUserId();
        // validating action from database of Session User 
        if ($this->checkPrivilages($this->getUserRole($userId), $action) != false) {
            try {
                $sqlQuery = "INSERT INTO `deliverables`( `deliverable_name`, `created_by_admin_id`) VALUES (?, ?)";
                $stmt = $this->connection->prepare($sqlQuery);

                $stmt->bindValue(1, $deliverableName);
                $stmt->bindValue(2, $userId);

                return $stmt->execute();
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return false;
    }

    public function createTeam($teamName, $action)
    {
        $userId = $this->sessionManagment->getUserId();
        // validating action from database of Session User 
        if ($this->checkPrivilages($this->getUserRole($userId), $action) != false) {
            try {
                $sqlQuery = "INSERT INTO `teams`( `created_by_admin_id`, `team_name`) VALUES (?, ?)";
                $stmt = $this->connection->prepare($sqlQuery);

                $stmt->bindValue(1, $userId);
                $stmt->bindValue(2, $teamName);

                return $stmt->execute();
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return false;
    }

    public function createTasktype($teamName, $action)
    {
        $userId = $this->sessionManagment->getUserId();
        // validating action from database of Session User 
        if ($this->checkPrivilages($this->getUserRole($userId), $action) != false) {
            try {
                $sqlQuery = "INSERT INTO `tasks`( `created_by_admin_id`, `team_name`) VALUES (?, ?)";
                $stmt = $this->connection->prepare($sqlQuery);

                $stmt->bindValue(1, $teamName);
                $stmt->bindValue(2, $userId);

                return $stmt->execute();
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return false;
    }
}
