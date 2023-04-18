<?php

use Validation\Validators\Validate;

include 'SessionManagment.php';
include_once '../Config/Privilege.php';
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

    public function checkPrivilages($userRoleId, $action)
    {
        $allPrilages = $this->getPrivailages($userRoleId);

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




    public function createDeliverable($deliverableName)
    {
        $userId = $this->sessionManagment->getUserId();
        // validating action from database of Session User 
        if ($this->checkPrivilages($this->getUserRole($userId), Privilege::CREATE_DELIVERABLE) != false) {
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

    public function createTeam($teamName)
    {
        $userId = $this->sessionManagment->getUserId();
        // validating action from database of Session User 
        if ($this->checkPrivilages($this->getUserRole($userId), Privilege::CREATE_TEAM) != false) {
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

    public function createTasktype($taskName,)
    {
        $userId = $this->sessionManagment->getUserId();
        // validating action from database of Session User 
        if ($this->checkPrivilages($this->getUserRole($userId), Privilege::CREATE_TASK) != false) {
            try {
                $sqlQuery = "INSERT INTO `task_types`( `task_type_name`, `created_by_user_id`) VALUES (?, ?)";
                $stmt = $this->connection->prepare($sqlQuery);

                $stmt->bindValue(1, $taskName);
                $stmt->bindValue(2, $userId);

                return $stmt->execute();
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return false;
    }

    public function createReason($reason)
    {
        $userId = $this->sessionManagment->getUserId();
        // validating action from database of Session User 
        if ($this->checkPrivilages($this->getUserRole($userId), Privilege::CREATE_TICKET_REASON) != false) {
            try {
                $sqlQuery = "INSERT INTO `ticket_reasons`( `content`, `created_by_user_id`) VALUES (?, ?)";
                $stmt = $this->connection->prepare($sqlQuery);

                $stmt->bindValue(1, $reason);
                $stmt->bindValue(2, $userId);

                return $stmt->execute();
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return false;
    }
    public function getAllDelverable()
    {
        $userId = $this->sessionManagment->getUserId();
        if ($this->checkPrivilages($this->getUserRole($userId), Privilege::VIEW_DELIVERABLE) != false) {
            try {
                $sqlQuery = "SELECT `deliverable_id`, `deliverable_name` FROM `deliverables` order by `created_at`";
                $stmt = $this->connection->prepare($sqlQuery);

                $stmt->execute();
                $result = array();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    array_push($result, $row);
                }
                return $result;
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return false;
    }

    public function updateDeliverable($deliverableName, $deliverableId)
    {
        $userId = $this->sessionManagment->getUserId();
        if ($this->checkPrivilages($this->getUserRole($userId), Privilege::UPDATE_DELIVERABLE) != false) {
            try {
                $sqlQuery = "UPDATE `deliverables` SET `deliverable_name`=? WHERE `deliverable_id` = ?";
                $stmt = $this->connection->prepare($sqlQuery);

                $stmt->bindValue(1, $deliverableName);
                $stmt->bindValue(2, $deliverableId);

                if ($stmt->execute()) {
                    return $deliverableName;
                }
                return false;
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return false;
    }


    public function getAllTask()
    {
        $userId = $this->sessionManagment->getUserId();
        if ($this->checkPrivilages($this->getUserRole($userId), Privilege::VIEW_TASK) != false) {
            try {
                $sqlQuery = "SELECT `task_type_id`, `task_type_name`, `task_type_status` FROM `task_types`";
                $stmt = $this->connection->prepare($sqlQuery);

                $stmt->execute();
                $result = array();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    array_push($result, $row);
                }
                return $result;
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return false;
    }

    public function updateTaskType($taskName, $taskId)
    {
        $userId = $this->sessionManagment->getUserId();
        if ($this->checkPrivilages($this->getUserRole($userId), Privilege::UPDATE_TASK) != false) {
            try {
                $sqlQuery = "UPDATE `task_types` SET `task_type_name`=? WHERE `task_type_id` = ?";
                $stmt = $this->connection->prepare($sqlQuery);

                $stmt->bindValue(1, $taskName);
                $stmt->bindValue(2, $taskId);

                if ($stmt->execute()) {
                    return $taskName;
                }
                return false;
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return false;
    }

    public function getAllTeam()
    {
        $userId = $this->sessionManagment->getUserId();
        if ($this->checkPrivilages($this->getUserRole($userId), Privilege::VIEW_TEAM) != false) {
            try {
                $sqlQuery = "SELECT `team_id`, `team_name` FROM `teams`";
                $stmt = $this->connection->prepare($sqlQuery);

                $stmt->execute();
                $result = array();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    array_push($result, $row);
                }
                return $result;
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return false;
    }

    public function updateTeam($teamName, $teamId)
    {
        $userId = $this->sessionManagment->getUserId();
        if ($this->checkPrivilages($this->getUserRole($userId), Privilege::UPDATE_TEAM) != false) {
            try {
                $sqlQuery = "UPDATE `teams` SET `team_name`=? WHERE `team_id` = ?";
                $stmt = $this->connection->prepare($sqlQuery);

                $stmt->bindValue(1, $teamName);
                $stmt->bindValue(2, $teamId);
                if ($stmt->execute()) {
                    return $teamName;
                }
                return false;
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return false;
    }


    public function getAllTicketReason()
    {
        $userId = $this->sessionManagment->getUserId();
        if ($this->checkPrivilages($this->getUserRole($userId), Privilege::VIEW_TICKET_REASON) != false) {
            try {
                $sqlQuery = "SELECT `reason_id`, `content`, `reason_status` FROM `ticket_reasons`";
                $stmt = $this->connection->prepare($sqlQuery);

                $stmt->execute();
                $result = array();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    array_push($result, $row);
                }
                return $result;
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return false;
    }


    public function updateTicketReason($reasonContent, $reasonId)
    {
        $userId = $this->sessionManagment->getUserId();
        if ($this->checkPrivilages($this->getUserRole($userId), Privilege::UPDATE_TICKET_REASON) != false) {
            try {
                $sqlQuery = "UPDATE `ticket_reasons` SET `content`=? WHERE `reason_id` = ?";
                $stmt = $this->connection->prepare($sqlQuery);

                $stmt->bindValue(1, $reasonContent);
                $stmt->bindValue(2, $reasonId);
                
                if ($stmt->execute()) {
                    return $reasonContent;
                }
                return false;
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return false;
    }
}
