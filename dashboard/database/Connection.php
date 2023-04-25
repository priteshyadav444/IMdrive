<?php
// $host = "localhost";
// $username = "root";
// $password = "";
// $db = "student_database";
// echo "Connected successfully";
class Connection
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "imagedrive";
    private $connection;

    /**
     * __construct : create a Connection
     *
     * @return void
     */
    public function __construct()
    {
        $this->connection = null;
        # Create connection
        // $this->connection = new mysqli($this->host, $this->username, $this->password, $this->db) or die("Connect failed: %s\n" . $this->connection->error);
        try {
            $this->connection = new PDO("mysql:dbname={$this->db};host={$this->host};charset=utf8mb4", $this->username, $this->password);

            $this->connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            echo "Connection failed" . $e->getMessage();
        }
    }
    /**
     * __destruct : Closes Connection
     *
     * @return void
     */
    public function __destruct()
    {
        # echo "Connection Close";
        $this->connection = null;
    }

    /**
     * getConnection : return a Connection Object
     *
     * @return void
     */
    public function getConnection()
    {
        if ($this->connection instanceof PDO) {
            return $this->connection;
        }
    }
}
