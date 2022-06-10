<?php
/*
 * @author      Zaserafin
 * @version     1.0.0
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
    protected $connection = null; // The connection to the database

    public function __construct()
    {
        $this->search_for_env_variables(); // Search for enviroment variables
        $this->connection = $this->connect(); // Connect to the database
    }

    /**
     * Search for enviroment variables
     */
    private function search_for_env_variables()
    {
        $this->db_user = isset($_ENV["DB_USER"]) ? $_ENV["DB_USER"] : $this->db_user;
        $this->db_charset = isset($_ENV["DB_CHARSET"]) ? $_ENV["DB_CHARSET"] : $this->db_charset;
        $this->db_password = isset($_ENV["DB_PASSWORD"]) ? $_ENV["DB_PASSWORD"] : $this->db_password;
        $this->db_name = isset($_ENV["DB_NAME"]) ? $_ENV["DB_NAME"] : $this->db_name;
        $this->db_host = isset($_ENV["DB_HOST"]) ? $_ENV["DB_HOST"] : $this->db_host;
    }

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
