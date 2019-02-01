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
		$this->$metodo(...$parametros);

		$salida = "<h1>Salida general</h1>";
		$salida .= implode('-', $this->data);
		return $salida;
	}
}

 ?>