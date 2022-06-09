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
    private $connection = null; // The connection to the database
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
     * @return mixed The result of the query
     */
    public function execute($fetch_result = false, $fetch_object = false)
    {
        $stmt = $this->connection->prepare($this->query);
        $stmt->execute($this->params);

        // If the query is a SELECT query, fetch the result
        if ($fetch_result) {
            //If fecth_object is true, fetch the result is an object array
            if ($fetch_object) {
                $this->result = $stmt->fetchAll(PDO::FETCH_OBJ);
            } else {
                $this->result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        }
        $this->result = $stmt;

        return $this->result;
    }

}
