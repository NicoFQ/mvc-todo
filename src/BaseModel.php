<?php 
	class BaseModel
	{
		protected $db;
		protected static $lista_info;

		private $data;
		
		function __construct(array $data_row = []) { 
			$this->db = App::getDB(); 
			static::$lista_info = ['id','titulo','texto','fecha'];
			if (count($data_row) === 0) {
				$this->data = array_keys(static::$lista_info, null);
			}else{
				$this->data = array_combine(static::$lista_info, $data_row);
			}
		}

		private function estaEnListaDatos($nombre){
			return in_array($nombre, static::$lista_info);
		}

		/**
		* setAlgo() setOtraCosa
		*/
		public function __call($nombre, $dato){
			$dato_pedido = strtolower(substr($nombre ,3));
			$accion = substr($nombre , 0, 3);

			if (!$this->estaEnListaDatos($dato_pedido)) {
				return "error";
			}
			if ($accion === 'get') {
				return $this->data[$dato_pedido];
			}else if ($accion === 'set') {
				$this->data[$dato_pedido] = $dato[0];
			}
			//return "Hola mundo de las funciones dinámicas.";
		}
		public static function getAll($page = 0, $num = 10){
			$db = App::getDB();
			echo "getAll()";
			$nombreClase = get_called_class();
			$nombreTabla = strtolower(substr($nombreClase, 5));
			$camposSelect = implode(',', static::$lista_info);
			$consulta = "select $camposSelect from $nombreTabla;";
			$resultado = $db->ejecutar($consulta);


			$resultado = array_map(function ($datos){
				$nombreClase = get_called_class();
				return new $nombreClase($datos);
			}, $resultado);
			return $resultado;
		}
	}


 ?>