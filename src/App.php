<?php 
	
	/**
	 * Esta clase representará
	 */
	class App
	{
		private static $enrutador;

		public static function getRouter(){
			return self::$enrutador;
		}

		public static function run($uri){
			self::$enrutador = new Router($uri);
			$controlador = self::$enrutador->getControlador();
			$accion = self::$enrutador->getAccion();
			$params = self::$enrutador->getParams();
			$clase_controlador = "Controller" . ucfirst($controlador);
			$objetoControlador = new $clase_controlador();
			if (method_exists($objetoControlador, $accion)) {
				$salida = $objetoControlador->procesaAccion($accion, $params);
			} else{
				throw new Exception("La accion $accion no exixste;");
			}
			echo $salida;
		}
	}

 ?>