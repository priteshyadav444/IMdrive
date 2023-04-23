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
    public function __construct($con, $sessionObject = null)
    {
        # Create connection
        $this->connection = $con;
        $this->sessionManagment = new SessionManagment();
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

                $sqlQuery = "SELECT `pd`.`project_deliverable_id` As `deliverable_id`, `dl`.`deliverable_name`,
                (SELECT COUNT(*) FROM  `deliverable_members` AS `dm` WHERE `dm`.`project_deliverable_id` = `pd`.`project_deliverable_id`) as 'member_count'
                from `project_deliverables` as `pd`, `deliverables` as `dl`
                WHERE `pd`.`project_id`= ? AND 
                `pd`.`deliverable_id` = `dl`.`deliverable_id`
                
                ";
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

    public function getAllDelverableListForModel($projectId)
    {
        $userId = $this->sessionManagment->getUserId();
        if ($this->checkPrivilages($this->getUserRole($userId), Privilege::VIEW_DELIVERABLE) != false) {
            try {

                $sqlQuery = "SELECT `pd`.`project_deliverable_id` As `project_deliverable_id`, `dl`.`deliverable_name`
                from `project_deliverables` as `pd`, `deliverables` as `dl`
                WHERE `pd`.`project_id`= ? AND 
                `pd`.`deliverable_id` = `dl`.`deliverable_id`
                
                ";
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
                 as `deliverables`
                 FROM `projects` as `pj` WHERE `pj`.`is_archive` = 0 GROUP By `pj`.`project_id`; ";

                $stmt = $this->connection->prepare($sqlQuery);
                $stmt->execute();

                $result = array();
                $memberCountQuery = "(SELECT count(*) AS `total_member`
                FROM  
                (SELECT DISTINCT(`dm`.`user_id`)
                FROM `project_deliverables` AS  `pd` 
                JOIN `deliverable_members`  AS `dm`
                ON  `pd`.`project_deliverable_id` = `dm`.`project_deliverable_id`
                AND `pd`.`project_id` = ?)  `member_table`)
                ";
                $projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($projects as $project) {
                    $stmt = $this->connection->prepare($memberCountQuery);
                    $stmt->bindValue(1, $project['project_id']);
                    $stmt->execute();
                    $project['member_count'] = $stmt->fetch(PDO::FETCH_COLUMN);
                    array_push($result, $project);
                }
                return $result;
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return false;
    }



    public function updateProjectArchive($projectId, $status)
    {
        $userId = $this->sessionManagment->getUserId();
        if ($this->checkPrivilages($this->getUserRole($userId), Privilege::UPDATE_PROJECT) != false) {
            try {
                $sqlQuery = "UPDATE `projects` SET `is_archive` = ? WHERE `project_id` = ?";
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
        $sql = "SELECT project_file_assigned_type_id FROM deliverable_members WHERE project_deliverable_id = :deliverableId AND user_id = :userId";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':deliverableId', $deliverableId, PDO::PARAM_INT);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row)
            return false;
        return $row['project_file_assigned_type_id'];
    }


    public function getMainFileDetails($deliverableId)
    {

        $userId = $this->sessionManagment->getUserId();
        $userRole = $this->getUserRole($userId);
        if ($this->checkPrivilages($this->getUserRole($userId), Privilege::VIEW_FILES) != false) {

            $projectFileAssignedTypeId = $this->getProjectFileAssignedTypeId($deliverableId, $userId);
            if ($projectFileAssignedTypeId == false &&  $userRole != 1) {
                return false;
            }

            if ($userRole == 1) {
                // listing for admin  
                $sqlQuery = "SELECT  
                iv.*,  
               (SELECT count(*) FROM `files_varient` where `files_varient`.`main_file_id` = `iv`.`file_id` AND `f`.`file_type` = 2 ) `no_of_varient`
               FROM files f
               LEFT JOIN image_varients iv ON f.file_id = iv.file_id
               WHERE f.project_deliverable_id = :deliverable_id
               AND `f`.`file_type` = :file_type;";

                $stmt = $this->connection->prepare($sqlQuery);
                $stmt->bindParam(':deliverable_id', $deliverableId, PDO::PARAM_INT);
                $fileTypeId = 1; // image type main for listing
                $stmt->bindParam(':file_type', $fileTypeId, PDO::PARAM_INT);
            } else if ($projectFileAssignedTypeId == 1) {
                // If assigned type is ALL (1)
                $sqlQuery = "SELECT 
            iv.*,  (SELECT count(*) FROM `files_varient` where `files_varient`.`main_file_id` = `iv`.`file_id` ) `no_of_varient`
            FROM `deliverable_members` `dm`
            JOIN `files` `f` ON f.deliverable_id = dm.deliverable_id
            JOIN `image_varients` `iv` ON iv.file_id = f.file_id
            WHERE dm.deliverable_id = :deliverable_id
            AND dm.project_file_assigned_type_id = :project_file_assigned_type_id
            AND dm.user_id = :user_id
            AND `f`.`file_type` = :file_type";

                $stmt = $this->connection->prepare($sqlQuery);
                $stmt->bindParam(':deliverable_id', $deliverableId, PDO::PARAM_INT);
                $stmt->bindParam(':project_file_assigned_type_id', $projectFileAssignedTypeId, PDO::PARAM_INT);
                $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
                $fileTypeId = 1; // image type main for listing
                $stmt->bindParam(':file_type', $fileTypeId, PDO::PARAM_INT);
            } else if ($projectFileAssignedTypeId == 2) {
                // If assigned type is CUSTOM (2)
                $sqlQuery = "SELECT iv.*
            FROM deliverable_member_files dmf
            (SELECT count(*) FROM `files_varient` where `files_varient`.`main_file_id` = `iv`.`file_id` ) `no_of_varient`
            JOIN files f ON f.file_id = dmf.file_id
            JOIN image_varients iv ON iv.file_id = f.file_id
            WHERE f.deliverable_id = 3
            AND dmf.user_id = 1
            AND f.file_type = :file_type;";

                $stmt = $this->connection->prepare($sqlQuery);
                $stmt->bindParam(':deliverable_id', $deliverableId, PDO::PARAM_INT);
                $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
                $stmt->bindParam(':file_type', 1, PDO::PARAM_INT); // image type main for listing

            } else {
                // admin 
                $sqlQuery = "SELECT  
            iv.*,  
            (SELECT count(*) FROM `files_varient` where `files_varient`.`main_file_id` = `iv`.`file_id` ) `no_of_varient`
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
                // Invalid project_file_assigned_type_id
            }

            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        return false;
    }

    private function isMemberOfDeliverable($deliverableId)
    {
        $userId = $this->sessionManagment->getUserId();
        if ($this->checkPrivilages($this->getUserRole($userId), Privilege::UPDATE_PROJECT) != false) {
            $stmt = $this->connection->prepare("SELECT COUNT(*) FROM deliverable_members WHERE deliverable_id = ? AND user_id = ?");
            $stmt->bindValue(1, $deliverableId);
            $stmt->bindValue(2, $userId);
            $stmt->execute();
            $count = $stmt->fetchColumn();
            if ($count == 0) {
                return false;
            }
        }
        return true;
    }

    public function insertMainImageDetails($imageDetails, $deliverableId)
    {
        // Check if the user has access to the deliverable
        // add transaction  
        $userId = $this->sessionManagment->getUserId();
        $userRole = $this->getUserRole($userId);

        if ($userRole != 1) {
            if (!$this->isMemberOfDeliverable($deliverableId)) {
                return false;
            }
        }

        // Insert file details
        $userId = $this->sessionManagment->getUserId();
        if ($this->checkPrivilages($this->getUserRole($userId), Privilege::CREATE_FILES) != false) {

            $this->connection->beginTransaction();
            try {
                // Insert image variant details
                $stmt = $this->connection->prepare("INSERT INTO files ( project_deliverable_id, uploaded_by_user_id, file_type) VALUES (?, ?, ?)");
                $fileType = $imageDetails['image_type'];

                $stmt->bindValue(1, $deliverableId);
                $stmt->bindValue(2, $userId);
                $stmt->bindValue(3, $fileType);
                $stmt->execute();
                $fileId = $this->connection->lastInsertId();


                $stmt = $this->connection->prepare("INSERT INTO image_varients (file_id, name, image_url, size, width, height, thumbnail_url) VALUES (?, ?, ?, ?, ?, ?, ?)");
                $fileName = $imageDetails['name'];
                $fileWidth = $imageDetails['width'];
                $fileHieght = $imageDetails['height'];
                $filesize = $imageDetails['size'];
                $fileUrl = $imageDetails['img_url'];

                $stmt->bindValue(1, $fileId);
                $stmt->bindValue(2, $fileName);
                $stmt->bindValue(3, $fileUrl);
                $stmt->bindValue(4, $filesize);
                $stmt->bindValue(5, $fileWidth);
                $stmt->bindValue(6, $fileHieght);
                $stmt->bindValue(7, $fileUrl);
                $stmt->execute();

                $this->connection->commit();
                return true;
            } catch (PDOException $e) {
                // Roll back transaction on error
                $this->connection->rollBack();
                throw $e;
            }
        }
        return false;
    }

    public function createRoleWithPermissions($role_name, $permissions)
    {
        $userId = $this->sessionManagment->getUserId();
        if ($this->checkPrivilages($this->getUserRole($userId), Privilege::CREATE_ROLES_PERMISSION) != false) {

            // Start transaction
            $this->connection->beginTransaction();

            try {
                // Create role
                $stmt = $this->connection->prepare("INSERT INTO `roles` values()");
                $stmt->execute();
                $role_id = $this->connection->lastInsertId();

                // Get all permissions
                $stmt = $this->connection->prepare("SELECT name FROM permissions");
                $stmt->execute();
                $allPermissions = $stmt->fetchAll(PDO::FETCH_COLUMN);


                // Assign permissions to role
                $stmt = $this->connection->prepare("INSERT INTO role_permission (role_id, permission_id, permission_value) SELECT :role_id, permission_id, :permission_value FROM permissions WHERE name = :name");
                foreach ($allPermissions as $name) {
                    if (array_key_exists($name, $permissions)) {
                        if ($permissions[$name] == "true")
                            $permissionValue = true;
                        else
                            $permissionValue = false;
                    } else {
                        // Set permission value to false if not passed in $permissions array
                        $permissionValue = false;
                    }
                    // Set view_file and view_project permissions to true as per documentation
                    if ($name == 'view_file' || $name == 'view_project') {
                        $permissionValue = true;
                    }
                    $stmt->bindValue(':role_id', $role_id);
                    $stmt->bindValue(':name', $name);
                    $stmt->bindValue(':permission_value', $permissionValue);
                    $stmt->execute();
                }

                // Creating unique user role
                $stmt = $this->connection->prepare("INSERT INTO user_role (role_id, user_type) VALUES (:role_id, :user_type)");
                $stmt->bindValue(':role_id', $role_id);
                $stmt->bindValue(':user_type', $role_name);
                $stmt->execute();

                // Commit transaction
                $this->connection->commit();
                return true;
            } catch (PDOException $e) {
                // Roll back transaction on error
                $this->connection->rollBack();
                // throw $e;
                return false;
            }
        }
        return false;
    }

    public function getAllRoles()
    {
        $userId = $this->sessionManagment->getUserId();
        if ($this->checkPrivilages($this->getUserRole($userId), Privilege::VIEW_TICKET_REASON) != false) {
            try {
                $sqlQuery = "SELECT * FROM `user_role`";
                $stmt = $this->connection->prepare($sqlQuery);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if (count($result) == 0)
                    return false;
                return $result;
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return false;
    }


    public function insertEmail($email)
    {

        $userId = $this->sessionManagment->getUserId();

        if ($this->checkPrivilages($this->getUserRole($userId), Privilege::CREATE_SETTING) != false) {
            $query = "SELECT id FROM allowed_emails WHERE domain_name = ?";
            $stmt = $this->connection->prepare($query);
            $stmt->execute([$email]);

            if ($stmt->rowCount() == 0) {
                // Domain is not in the table, insert it
                $query = "INSERT INTO allowed_emails (domain_name, status, created_by_user_id) VALUES (?, 1, ?)";
                $stmt = $this->connection->prepare($query);
                $stmt->execute([$email, $userId]);

                // Check if inserted
                if ($stmt->rowCount() > 0) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
        return false;
    }

    function getAllowedEmailList()
    {
        $userId = $this->sessionManagment->getUserId();
        if ($this->checkPrivilages($this->getUserRole($userId), Privilege::VIEW_SETTING) != false) {
            $query = "SELECT * FROM allowed_emails";
            $stmt = $this->connection->prepare($query);
            $stmt->execute();

            // Fetch all rows as associative arrays
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }
    }


    public function createUser($userDetails,)
    {
        $userId = $this->sessionManagment->getUserId();

        if ($this->checkPrivilages($this->getUserRole($userId), Privilege::CREATE_USER) != false) {
            try {
                $this->connection->beginTransaction();

                $email = $userDetails['email'];
                $first_name = $userDetails['first_name'];
                $last_name = $userDetails['last_name'];
                $password = $userDetails['password'];
                $description = $userDetails['description'];
                $user_role_id = $userDetails['usertype'];
                $team_id = $userDetails['team'];




                // Check if email format is valid
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    return false;
                }


                // Check if user role exists
                $query = "SELECT COUNT(*) FROM user_role WHERE id = ?";
                $stmt = $this->connection->prepare($query);
                $stmt->execute([$user_role_id]);
                if ($stmt->fetchColumn() == 0) {
                    return false;
                }

                // Check if team exists
                if ($team_id != null) {
                    $query = "SELECT COUNT(*) FROM teams WHERE team_id = ?";
                    $stmt = $this->connection->prepare($query);
                    $stmt->execute([$team_id]);
                    if ($stmt->fetchColumn() == 0) {
                        return false;
                    }
                }
                // Check if email domain is allowed
                $query = "SELECT COUNT(*) FROM allowed_emails WHERE domain_name = ?";
                $stmt = $this->connection->prepare($query);
                $stmt->execute([explode('@', $email)[1]]);
                if ($stmt->fetchColumn() == 0) {
                    return false;
                }


                // Insert user
                $query = "INSERT INTO users (first_name, last_name, email, password, description, account_status_id, user_role_id) VALUES (?, ?, ?, ?, ?, 1, ?)";
                $stmt = $this->connection->prepare($query);
                $stmt->execute([$first_name, $last_name, $email, $password, $description, $user_role_id]);
                $user_id = $this->connection->lastInsertId();

                // Add user to team if team_id is provided
                if ($team_id != null) {
                    $query = "INSERT INTO team_members (team_id, user_id) VALUES (?, ?)";
                    $stmt = $this->connection->prepare($query);
                    $stmt->execute([$team_id, $user_id]);
                }
                $this->connection->commit();
            } catch (PDOException $e) {
                // Roll back transaction on error
                $this->connection->rollBack();
                // throw $e;
                return false;
            }
            return true;
        }
        return false;
    }



    public function getUserDetails()
    {
        $userId = $this->sessionManagment->getUserId();

        if ($this->checkPrivilages($this->getUserRole($userId), Privilege::VIEW_USER) != false) {

            $query = "SELECT u.user_id, u.created_at, CONCAT(u.first_name, ' ', u.last_name) as name, u.email,  tr.user_type, t.team_name, u.account_status_id FROM users u 
            INNER JOIN user_role tr ON u.user_role_id = tr.id 
            LEFT JOIN team_members tm ON u.user_id = tm.user_id 
            LEFT JOIN teams t ON tm.team_id = t.team_id 
            WHERE u.user_id != 1;
                    ";

            $stmt = $this->connection->prepare($query);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $userDetails = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $userDetails;
            } else {
                return false;
            }
        }
    }


    public function getTeamMembersByTeamId($teamId)
    {
        $userId = $this->sessionManagment->getUserId();

        if ($this->checkPrivilages($this->getUserRole($userId), Privilege::VIEW_USER) != false) {
            $query = "SELECT u.user_id, CONCAT(u.first_name, ' ', u.last_name) as name, t.team_name
              FROM team_members tm
              INNER JOIN users u ON tm.user_id = u.user_id
              INNER JOIN teams t ON tm.team_id = t.team_id
              WHERE tm.team_id = ?";

            $stmt = $this->connection->prepare($query);
            $stmt->execute([$teamId]);
            $teamMembers = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $teamMembers;
        }
        return false;
    }

    public function getProjectFilesByUser($projectId, $userId)
    {
        // Check file assigned type for user
        $userIdViewer = $this->sessionManagment->getUserId();
        $userRole = $this->getUserRole($userIdViewer);

        if ($this->checkPrivilages($userRole, Privilege::VIEW_DRIVE) != false) {

            $query = "SELECT project_deliverables.project_deliverable_id, deliverable_members.project_file_assigned_type_id 
            FROM deliverable_members JOIN project_deliverables
            ON project_deliverables.project_deliverable_id = deliverable_members.project_deliverable_id
            WHERE deliverable_members.user_id =  :userId  AND project_deliverables.project_id = :project_id";
            $stmt = $this->connection->prepare($query);
            $stmt->execute(['userId' => $userId, 'project_id' => $projectId]);

            $deliverables = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $files = array();

            foreach ($deliverables as $deliverable) {
                // Check fileAssignedType for deliverable
                $fileAssignedType = $deliverable['project_file_assigned_type_id'];

                if ($fileAssignedType == 1) {
                    // Fetch all files for the deliverable from files table
                    $query = "SELECT image_varients.* FROM files 
                    JOIN image_varients
                    ON files.file_id = image_varients.file_id
                    WHERE project_deliverable_id = :deliverableId AND file_type = 1 ";
                    $stmt = $this->connection->prepare($query);
                    $stmt->execute(['deliverableId' => $deliverable['project_deliverable_id']]);
                    $deliverableFiles = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    // Add files to the result array
                    $files = array_merge($files, $deliverableFiles);
                } elseif ($fileAssignedType == 2) {
                    // Fetch files for the deliverable from deliverable_member_files table
                    $query = "SELECT files.* FROM deliverable_member_files 
                    INNER JOIN files ON deliverable_member_files.file_id = files.file_id 
                    JOIN image_varients ON image_varients.file_id = files.file_id
                    WHERE deliverable_member_files.user_id = :userId
                    AND deliverable_member_files.project_deliverable_id = :deliverableId
                    AND files.file_type = 1";

                    $stmt = $this->connection->prepare($query);
                    $stmt->execute(['userId' => $userId, 'deliverableId' => $deliverable['project_deliverable_id']]);
                    $deliverableFiles = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    // Add files to the result array
                    $files = array_merge($files, $deliverableFiles);
                    return $files;
                }
            }
            return $files;
        }
        return false;
    }

    public function getAllUserOfProject($projectId)
    {
        $userIdViewer = $this->sessionManagment->getUserId();
        $userRole = $this->getUserRole($userIdViewer);

        if ($this->checkPrivilages($userRole, Privilege::VIEW_DRIVE) != false) {
            $query = "SELECT `dm`.`user_id`, CONCAT(`us`.`first_name`, ' ', `us`.`last_name` ) AS `name`
            FROM `project_deliverables` AS  `pd` 
            JOIN `deliverable_members`  AS `dm`
            ON  `pd`.`project_deliverable_id` = `dm`.`project_deliverable_id`
            JOIN `users` as `us`
            ON `us`.`user_id` = `dm`.`user_id`
            WHERE `pd`.`project_id` = :projectId";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(":projectId", $projectId);
            $stmt->execute();
            $userDetails = $stmt->fetchAll();
            return $userDetails;
        }
    }
    public function getUserFileProject($projectId)
    {
        $users = $this->getAllUserOfProject($projectId);
        // var_dump($users);
        if (!is_array($users)) {
            return false;
        }
        foreach ($users as &$user) {
            $files = $this->getProjectFilesByUser($projectId, $user['user_id']);
            $user['files'] = array();
            if (is_array($files))
                $user['files'] = $files;
        }
        return $users;
    }




    // function get all the details for project


    // function updateRole($role_id, $role_name, $permissions)
    // {
    //     try {
    //         //   $this->connection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    //         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //         // Update the role name
    //         $stmt = $pdo->prepare("UPDATE role SET role_name = :role_name WHERE role_id = :role_id");
    //         $stmt->bindValue(':role_name', $role_name);
    //         $stmt->bindValue(':role_id', $role_id);
    //         $stmt->execute();

    //         // Update the permissions
    //         $stmt = $pdo->prepare("UPDATE role_permission SET permission_value = :permission_value WHERE role_id = :role_id AND permission_id = :permission_id");

    //         foreach ($permissions as $permission_name => $permission_value) {
    //             // Get the permission ID from the permission name
    //             $stmt_perm_id = $pdo->prepare("SELECT permission_id FROM permission WHERE permission_name = :permission_name");
    //             $stmt_perm_id->bindValue(':permission_name', $permission_name);
    //             $stmt_perm_id->execute();
    //             $permission_id = $stmt_perm_id->fetchColumn();

    //             // Update the permission value for the role
    //             $stmt->bindValue(':permission_value', $permission_value);
    //             $stmt->bindValue(':role_id', $role_id);
    //             $stmt->bindValue(':permission_id', $permission_id);
    //             $stmt->execute();
    //         }

    //         // Commit the transaction
    //         $pdo->commit();

    //         echo "Role updated successfully!";
    //     } catch (PDOException $e) {
    //         // Roll back the transaction if something went wrong
    //         $pdo->rollback();
    //         echo "Error updating role: " . $e->getMessage();
    //     }
    // }
}
