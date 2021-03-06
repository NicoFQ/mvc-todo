<?php 	
	class App
	{
		private static $enrutador;
		private static $db;

		public static function getRouter(){
			return self::$enrutador;
		}
		public static function getDB(){
			return self::$db;
		}
		public static function initDB(){
			//$credenciales = array(Config::get('db.user'), Config::get('db.pass'), Config::get('db.name'));
			//print_r(...$credenciales);
			self::$db = new DB(Config::get('db.user'), Config::get('db.pass'), Config::get('db.name'));

			//print_r(self::$db);
		}

		public static function run($uri){
			self::$enrutador = new Router($uri);
			self::initDB();
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
		public static function debug($dato, $seccion){
			echo "\n";
			echo "*****************************";
			echo "\n";
			echo $seccion;
			echo "\n";
			print_r($dato);
			echo "\n";
			echo "*****************************";
			echo "\n";
			var_dump($dato);
			echo "\n";
			echo $seccion;
			echo "\n";
			echo "*****************************";
			echo "\n";
		}
	}
 ?>