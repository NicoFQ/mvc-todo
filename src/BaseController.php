<?php 

/**
 * Esta clase representara una base de un controlador
 * de la que heredaran demas Controladores.
 */
class BaseController
{
	protected $data;
	  /* Es una lista de vistas que requieren autentificación */
    protected static $requiere_autentificacion = [];

	public function __construct(Array $data= [])
	{
		$this->data = [];
	}

	public function procesaAccion(string $metodo, $parametros){
		// Esta funcion rellenará los datos;
		//print_r($parametros);
		 if(
            in_array($metodo, static::$requiere_autentificacion) &&
            (Session::getInstance())->get('AUTH') != true
          ) {
            App::getRouter()::redirect('/usuario/login');
        }
		$this->$metodo(...$parametros);
		$vista = new View($this->data);
		//echo "BaseController.php";
		//$salida = "<h1>Salida general</h1>";
		//$salida .= implode('-', $this->data);
		return $vista->render($this->data);
	}
}

 ?>