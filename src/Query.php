<?php
/*
 * @author      Zaserafin
 * @version     1.0.0
 * @license     MIT
 *
 * Query class
 *
 * This class is used to perform queries on the database.
 */

require_once __DIR__ . "/database.php";

class Query extends Database
{
    private $query = ""; // The query string
    private $params = null; // The parameters for the query
    private $result = null; // The result of the query

    public function __construct($query, $params = null)
    {
        $this->query = $query;
        $this->params = $params;

        // Connect to the database
        $this->connection = $this->connect();
    }

    /**
     * Execute the query
     *
     * @return Query|Boolean Returns the query object or false if the query failed
     */
    public function execute()
    {
        $stmt = $this->connection->prepare($this->query);
        $this->result = $stmt->execute($this->params);

        if ($this->result) {return $this;}

        return false;
    }

    /**
     * Get the result of the query as pdo object
     *
     * @return PDO|Boolean The result of the query
     */
    public function get_result()
    {
        return $this->result;
    }

    /**
     * Get the result of the query in json format
     *
     * @return String json string of the result of the query
     */
    public function fetch_json()
    {
        return json_encode($this->fetch_array());
    }

    /**
     * Get the result of the query as an array
     *
     * @return Array Associative array of the result of the query
     */
    public function fetch_array()
    {
        return $this->result->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get the result of the query as object array
     *
     * @return Array Array of objects
     */
    public function fetch_object_array()
    {
        return $this->result->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Set the query to be executed
     *
     * @param  String $query The query string
     */
    public function set_query($query)
    {
        $this->query = $query;
    }

    /**
     * Set the parameters for the query
     *
     * @param  Array $params The parameters for the query
     */
    public function set_params($params)
    {
        $this->params = $params;
    }

}
