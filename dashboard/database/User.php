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


    public function getAllDelverableListPage($projectId)
    {
        $userId = $this->sessionManagment->getUserId();
        if ($this->checkPrivilages($this->getUserRole($userId), Privilege::VIEW_DELIVERABLE) != false) {
            try {

                $sqlQuery = "SELECT `dl`.`deliverable_id`, `dl`.`deliverable_name`,
                (SELECT COUNT(*) FROM 
                 `deliverable_members` AS `dm` 
                WHERE `dm`.`deliverable_id` = `dl`.`deliverable_id`) AS `member_count`
                from `project_deliverables` as `pd`, `deliverables` as `dl`
                WHERE `pd`.`project_id`= ? AND 
                `pd`.`deliverable_id` = `dl`.`deliverable_id`";
                $stmt = $this->connection->prepare($sqlQuery);
                $stmt->bindValue(1, $projectId);

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


    public function createProject($projectDetails)
    {
        $userId = $this->sessionManagment->getUserId();
        if ($this->checkPrivilages($this->getUserRole($userId), Privilege::CREATE_PROJECT) != false) {
            try {

                $createdByAdminId = $userId;
                $projectName = $projectDetails['name'];
                $description = $projectDetails['description'];
                $logoUrl = $projectDetails['img_url'];
                $projectStatus = 1; //active
                $deliverables = $projectDetails['deliverable_id']; // deliverable array

                $sqlQuery = "INSERT INTO `projects` (`created_by_admin_id`, `logo_url`, `name`, `description`, `project_status_id`) VALUES (?, ?, ?, ?, ?)";
                $stmt = $this->connection->prepare($sqlQuery);




                $stmt->bindValue(1, $createdByAdminId);
                $stmt->bindValue(2, $logoUrl);
                $stmt->bindValue(3, $projectName);
                $stmt->bindValue(4, $description);
                $stmt->bindValue(5, $projectStatus);

                $this->connection->beginTransaction();
                // inserting projects
                $stmt->execute();
                $deliverableLength = count($deliverables);
                if (is_array($deliverables) &&  $deliverableLength > 0) {
                    $projectId = $this->connection->lastInsertId();


                    $sqlQuery = "INSERT INTO `project_deliverables`(`project_id`, `deliverable_id`) VALUES ";
                    $values = "";

                    for ($i = 1; $i <=  $deliverableLength; $i++) {
                        $values = $values . "(?,?)";
                        if ($i != $deliverableLength)
                            $values = $values . ",";
                    }

                    $sqlQuery = $sqlQuery . $values;

                    var_dump($sqlQuery);
                    // preparing query for deliverable
                    $stmt = $this->connection->prepare($sqlQuery);

                    // setting project.
                    for ($i = 0; $i < $deliverableLength; $i++) {
                        $idx = $i * 2 + 1;
                        $stmt->bindValue($idx, $projectId);
                        $stmt->bindValue($idx + 1, $deliverables[$i]);
                    }



                    // // inserting deliverables and commiting changes
                    if ($stmt->execute()) {
                        $this->connection->commit();
                        return true;
                    }
                }

                return false;
            } catch (PDOException $e) {
                if ($this->connection->inTransaction()) {
                    $this->connection->rollback();
                    // If we got here our two data updates are not in the database
                }
                die($e->getMessage());
            }
        }
        return false;
    }

    public function getAllProject()
    {
        $userId = $this->sessionManagment->getUserId();
        if ($this->checkPrivilages($this->getUserRole($userId), Privilege::VIEW_PROJECT) != false) {
            try {
                $sqlQuery = "SELECT 
                `project_id`, `logo_url`, `name`, `description`, `project_status_id`, `is_archive`,
                (SELECT GROUP_CONCAT(`deliverable_name`) 
                 FROM `deliverables` as `dl` JOIN `project_deliverables` As `pd` 
                 ON `dl`.`deliverable_id`=`pd`.`deliverable_id` 
                 WHERE `pd`.`project_id` = `pj`.`project_id` 
                 GROUP BY `pd`.`project_id` )
                 as `deliverables`,
                (SELECT count(*) FROM `project_members` as `pm` WHERE `pm`.`project_id` = `pj`.`project_id`) as `member_count` 
                 FROM `projects` as `pj` WHERE `pj`.`is_archive` = 0 GROUP By `pj`.`project_id`; ";

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



    public function updateProjectArchive($projectId, $status = true)
    {
        $userId = $this->sessionManagment->getUserId();
        if ($this->checkPrivilages($this->getUserRole($userId), Privilege::UPDATE_PROJECT) != false) {
            try {
                $sqlQuery = "UPDATE `projects` SET `is_archive` = ? WHERE `project_id` = ?";
                $stmt = $this->connection->prepare($sqlQuery);

                $stmt->bindValue(1, $projectId);
                $stmt->bindValue(2, $status);

                if ($stmt->execute()) {
                    return true;
                }
                return false;
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return false;
    }


    public function updateProjectStatus($projectId, $status)
    {
        $userId = $this->sessionManagment->getUserId();
        if ($this->checkPrivilages($this->getUserRole($userId), Privilege::UPDATE_PROJECT) != false) {
            try {
                $sqlQuery = "UPDATE `projects` SET `project_status_id` = ? WHERE `project_id` = ?";
                $stmt = $this->connection->prepare($sqlQuery);

                $stmt->bindValue(1, $status);
                $stmt->bindValue(2, $projectId);

                if ($stmt->execute()) {
                    return true;
                }
                return false;
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return false;
    }



    private function getProjectFileAssignedTypeId($deliverableId, $userId)
    {
        $sql = "SELECT project_file_assigned_type_id FROM deliverable_members WHERE deliverable_id = :deliverableId AND user_id = :userId";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':deliverableId', $deliverableId, PDO::PARAM_INT);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['project_file_assigned_type_id'];
    }

    public function getFileDetails($deliverableId, $userId)
    {
        $projectFileAssignedTypeId = $this->getProjectFileAssignedTypeId($deliverableId, $userId);

        // If assigned type is ALL
        if ($projectFileAssignedTypeId == 1) {
            $sqlQuery = "SELECT iv.*
                FROM deliverable_members dm
                JOIN files f ON f.deliverable_id = dm.deliverable_id
                JOIN image_varients iv ON iv.file_id = f.file_id
                WHERE dm.deliverable_id = :deliverable_id
                AND dm.project_file_assigned_type_id = :project_file_assigned_type_id
                AND dm.user_id = :user_id";

            $stmt = $this->connection->prepare($sqlQuery);
            $stmt->bindParam(':deliverable_id', $deliverableId, PDO::PARAM_INT);
            $stmt->bindValue(':project_file_assigned_type_id', $projectFileAssignedTypeId, PDO::PARAM_INT);
            $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        } else if ($projectFileAssignedTypeId == 2) {
            // If assigned type is CUSTOM
            $sqlQuery = "SELECT iv.*
                FROM deliverable_member_files dmf
                JOIN files f ON f.file_id = dmf.file_id
                JOIN image_varients iv ON iv.file_id = f.file_id
                WHERE f.deliverable_id = :deliverable_id
                AND dmf.user_id = :user_id";

            $stmt = $this->connection->prepare($sqlQuery);
            $stmt->bindParam(':deliverable_id', $deliverableId, PDO::PARAM_INT);
            $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        } else {
            // admin 
            $sqlQuery = "SELECT f.*, iv.filename
            FROM files f
            LEFT JOIN image_varients iv ON f.file_id = iv.file_id
            WHERE f.deliverable_id = ?";
            try {
                $stmt = $this->connection->prepare($sqlQuery);
                $stmt->bindValue("1", $deliverableId);
                $stmt->execute();

                $result = array();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    array_push($result, $row);
                }
                return $result;
            } catch (PDOException $e) {
                die($e->getMessage());
            }
            return false; // Invalid project_file_assigned_type_id
        }

        $stmt->execute();
        $result = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($result, $row);
        }
        return $result;
    }
    public function insertImageDetails($deliverableId, $userId, $fileName, $fileType, $fileSize, $filePath, $thumbPath, $isPublic)
    {
        // Check if the user has access to the deliverable
        // add transaction
        $stmt = $this->connection->prepare("SELECT COUNT(*) FROM deliverable_members WHERE deliverable_id = ? AND user_id = ?");
        $stmt->bindValue(1, $deliverableId);
        $stmt->bindValue(2, $userId);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        if ($count == 0) {
            return false;
        }


        // Insert file details
        $stmt = $this->connection->prepare("INSERT INTO files (name, type, size, path, thumb_path, is_public) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bindValue(1, $fileName);
        $stmt->bindValue(2, $fileType);
        $stmt->bindValue(3, $fileSize);
        $stmt->bindValue(4, $filePath);
        $stmt->bindValue(5, $thumbPath);
        $stmt->bindValue(6, $isPublic);
        $stmt->execute();
        $fileId = $this->connection->lastInsertId();

        // Insert image variant details
        $stmt = $this->connection->prepare("INSERT INTO image_variants (file_id) VALUES (?)");
        $stmt->bindValue(1, $fileId);
        $stmt->execute();

        // Insert deliverable member file association
        $stmt = $this->connection->prepare("INSERT INTO deliverable_member_files (user_id, file_id) VALUES (?, ?)");
        $stmt->bindValue(1, $userId);
        $stmt->bindValue(2, $fileId);
        $stmt->execute();

        return true;
    }
    function createRoleWithPermissions($permissions) {
        $pdo = new PDO("mysql:host=localhost;dbname=mydatabase", "username", "password");
      
        // Start transaction
        $pdo->beginTransaction();
      
        try {
          // Create role
          $stmt = $pdo->prepare("INSERT INTO role (name) VALUES (:name)");
          $stmt->bindValue(':name', 'new_role');
          $stmt->execute();
          $role_id = $pdo->lastInsertId();
      
          // Assign permissions to role
          $stmt = $pdo->prepare("INSERT INTO role_permission (role_id, permission_id, permission_value) SELECT :role_id, id, :permission_value FROM permission WHERE name = :name");
          foreach ($permissions as $name => $value) {
            $stmt->bindValue(':role_id', $role_id);
            $stmt->bindValue(':name', $name);
            $stmt->bindValue(':permission_value', $value);
            $stmt->execute();
          }
      
          // Create user role
          $stmt = $pdo->prepare("INSERT INTO user_role (user_id, role_id, user_type) VALUES (:user_id, :role_id, :user_type)");
          $stmt->bindValue(':user_id', 1);
          $stmt->bindValue(':role_id', $role_id);
          $stmt->bindValue(':user_type', 'admin');
          $stmt->execute();
      
          // Commit transaction
          $pdo->commit();
        } catch (PDOException $e) {
          // Roll back transaction on error
          $pdo->rollBack();
          throw $e;
        }
      }

      function updateRole($role_id, $role_name, $permissions) {
        try {
        //   $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
          // Update the role name
          $stmt = $pdo->prepare("UPDATE role SET role_name = :role_name WHERE role_id = :role_id");
          $stmt->bindValue(':role_name', $role_name);
          $stmt->bindValue(':role_id', $role_id);
          $stmt->execute();
      
          // Update the permissions
          $stmt = $pdo->prepare("UPDATE role_permission SET permission_value = :permission_value WHERE role_id = :role_id AND permission_id = :permission_id");
      
          foreach($permissions as $permission_name => $permission_value) {
            // Get the permission ID from the permission name
            $stmt_perm_id = $pdo->prepare("SELECT permission_id FROM permission WHERE permission_name = :permission_name");
            $stmt_perm_id->bindValue(':permission_name', $permission_name);
            $stmt_perm_id->execute();
            $permission_id = $stmt_perm_id->fetchColumn();
      
            // Update the permission value for the role
            $stmt->bindValue(':permission_value', $permission_value);
            $stmt->bindValue(':role_id', $role_id);
            $stmt->bindValue(':permission_id', $permission_id);
            $stmt->execute();
          }
      
          // Commit the transaction
          $pdo->commit();
      
          echo "Role updated successfully!";
        } catch(PDOException $e) {
          // Roll back the transaction if something went wrong
          $pdo->rollback();
          echo "Error updating role: " . $e->getMessage();
        }
      }
      
      
}
