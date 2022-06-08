<?php
/*
 * @author      Zaserafin
 * @version     1.0
 * @license     MIT
 *
 * Database class
 *
 * This class is used to connect to the database.
 */

class Database
{
    private $db_user = "user_name"; // Database username
    private $db_charset = "utf8"; // Database charset
    private $db_password = "password"; // Database password
    private $db_name = "database_name"; // Database name
    private $db_host = "127.0.0.1"; // Database host

    /**
     * Generate the dsn string
     *
     * @return string The dsn string
     */
    private function prepare_dsn()
    {
        $dsn = 'mysql:dbname=' . $this->db_name . ';host=' . $this->db_host . ';charset=' . $this->db_charset;
        return $dsn;
    }

    /**
     * Generate a PDO object connected to the database
     *
     * @return PDO The PDO connection
     */
    protected function connect()
    {
        try {
            $dsn = $this->prepare_dsn();
            $pdo = new PDO($dsn, $this->db_user, $this->db_password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    /**
     * Sets the configuration data for the database connection.
     *
     * @param Array The configuration Array
     */
    public function config($data)
    {
        $this->db_user = $data["user"];
        $this->db_charset = $data["charset"];
        $this->db_password = $data["password"];
        $this->db_name = $data["database"];
        $this->db_host = $data["host"];
    }

    /**
     * Set the value of db_host
     *
     */
    public function set_db_host($db_host)
    {$this->db_host = $db_host;}

    /**
     * Set the value of db_name
     *
     */
    public function set_db_name($db_name)
    {$this->db_name = $db_name;}

    /**
     * Set the value of db_password
     *
     */
    public function set_db_password($db_password)
    {$this->db_password = $db_password;}

    /**
     * Set the value of db_charset
     *
     */
    public function set_db_charset($db_charset)
    {$this->db_charset = $db_charset;}

    /**
     * Set the value of db_user
     *
     */
    public function set_db_user($db_user)
    {$this->db_user = $db_user;}

}
