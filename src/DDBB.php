<?php

class DB {

    private $connection;

    public function __construct($db_user, $db_password, $db_name, $db_type='mysql',$db_host='localhost') {
        try {
            $this->connection = new PDO("$db_type:host=$db_host;dbname=$db_name", $db_user, $db_password);    
            
        } catch (PDOException $e) {
            echo "Error";
        }
    }

    public function ejecutar($sql, ...$params) {
        if (!$this->connection) {
            return false;
        }

        $result = $this->connection->query($sql);

        if ( mysqli_error($this->connection) ) {
            throw new Exception(mysqli_error($this->connection));
        }

        if ( is_bool($result) ) {
            return $result;
        }

        $data = array();
        while( $row = mysqli_fetch_assoc($result) ) {
            $data[] = $row;
        }
        return $data;
    }

    public function escape($str) {
        return mysqli_escape_string($this->connection, $str);
    }

}

?>
