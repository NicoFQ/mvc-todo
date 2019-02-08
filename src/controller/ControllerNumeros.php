<?php 

/**
 * Esta clase representará un controlador para numeros.
 */
class ControllerNumeros extends BaseController
{
	public function aleatorio($n = 10){
		$this->data = ModelNumeros::getAleatorios($n);
	}
}

 ?>