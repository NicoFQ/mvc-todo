<?php 
	class DB
	{
		private $connection;

    public function __construct($db_user, 
						    	$db_password, 
						    	$db_name, 
						    	$db_type='mysql',
						    	$db_host='localhost') {
        try {
            $this->connection = new PDO("$db_type:host=$db_host;dbname=$db_name", $db_user, $db_password);  
        } catch (PDOException $e) {
            echo "Error";
        }
    }

    public function getLastId(){
    	return $this->connection->lastInsertId();
    }
		
	public function ejecutar($sql, ...$params) {
		if (!$this->connection) {
	        return false;
	    }
		try{
	        //print_r($params);
	        $sentenciaSQL = $this->connection->prepare($sql);
	        $sentenciaEjecuatada = $sentenciaSQL->execute($params);

	        if(!$sentenciaEjecuatada){
	        	print_r($this->connection->errorInfo());
	        	print_r($sentenciaSQL->errorInfo());
	        	
	        	return null;
	        } else {
	        	$resultado = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
	        	return $resultado;
	        }
		}  catch (PDOException $e) {
        	echo "Error";
    	}
	}
	}

 ?>