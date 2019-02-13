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
		try{
	        if (!$this->connection) {
	            return false;
	        }
	        $sentenciaSQL = $this->connection->prepare($sql);
	        $sentenciaEjecuatada = $sentenciaSQL->execute($params);

	        if(!$sentenciaEjecuatada){
	        	print_r($this->connection->errorInfo());
	        	return null;
	        } else {
	        	$resultado = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
	        	print_r($resultado);
	        }
		}  catch (PDOException $e) {
        	echo "Error";
    	}
	}
	}

 ?>