<?php 

/**
 * Esta clase representara una base de un controlador
 * de la que heredaran demas Controladores.
 */
class BaseController
{
	protected $data;

	public function __construct()
	{
		$this->data = array();
	}

	public function procesaAccion(string $metodo, $parametros){
		// Esta funcion rellenará los datos;
		//print_r($parametros);
		$this->$metodo(...$parametros);
		$vista = new View();
		//$salida = "<h1>Salida general</h1>";
		//$salida .= implode('-', $this->data);
		return $vista->render($this->data);
	}
}

 ?>