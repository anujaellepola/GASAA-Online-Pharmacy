<?php
class DBController {
    public $host = "localhost";
    public $user = "root";
    public $password = "";
    public $database = "gassa_db";
    public $conn; 

    function __construct() {
        $this->conn = $this->connectDB();
    }

  function connectDB() {
    $conn = mysqli_connect($this->host, $this->user, $this->password, $this->database);
    return $conn;
}

public function updateQuery($query) {
    return $this->conn->query($query);
}
    function runQuery($query) {
        $result = mysqli_query($this->conn, $query);
    
        if ($result === false) {
            // Print the error message and SQL query for debugging
            echo "Error: " . mysqli_error($this->conn) . "<br>";
            echo "Query: " . $query . "<br>";
            return false;
        }
    
        return $result;
    }
    

    function numRows($query) {
        $result  = mysqli_query($this->conn, $query);
        $rowcount = mysqli_num_rows($result);
        return $rowcount;
    }
}
?>
