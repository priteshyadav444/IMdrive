<?php
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
        $sqlQuery = "SELECT * FROM `users` where `email` = ? and `password` = ? LIMIT 0, 1";
        $stmt = $this->connection->prepare($sqlQuery);

        $stmt->bindValue(1, $username);
        $stmt->bindValue(2, $password);

        try {
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
}
