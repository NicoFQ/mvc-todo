<?php 

/**
 * Esta clase representará un modelo que recogera numeros aleatorios
 */
class ModelNumeros extends BaseModel
{
	static function getAleatorios($n){
		$data = array();
		for ($i=0; $i < $n; $i++) { 
			$data[] = mt_rand(0,100);
		}
		return $data;
	}
}

 ?>