<?php 
	class BaseModel
	{
		protected $db;
		protected static $lista_info;

		private $data;
		
		function __construct(array $data_row = []) { 
			$this->db = App::getDB(); 
			//static::$lista_info = ['id','titulo','texto','fecha'];
			if (count($data_row) === 0) {
				$this->data = array__fill_keys(static::$lista_info, null);
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
				return $this->data[$dato_pedido] = $dato;
			}
			//return "Hola mundo de las funciones dinámicas.";
		}

		public static function getAll($page = 0, $num = 10){
			$db = App::getDB();
			
			$nombreClase = get_called_class();
			$nombreTabla = strtolower(substr($nombreClase, 5));
			$camposSelect = implode(',', static::$lista_info);

			$consulta = "SELECT $camposSelect FROM $nombreTabla;";
			$resultado = $db->ejecutar($consulta);

			
			$resultado = array_map(function($datos) {
            	$nombre_clase = get_called_class();
            	return new $nombre_clase($datos);
        	},$resultado);

       	 	return $resultado;	
		}
		public static function getById($id){
			$db = App::getDB();

			$nombreClase = get_called_class();
			$nombreTabla = strtolower(substr($nombreClase, 5));
			$camposSelect = implode(',', static::$lista_info);

			$consulta = "select $camposSelect from $nombreTabla where id = ?;";
			$resultado = $db->ejecutar($consulta, $id);
			return new $nombreClase($resultado[0]);
		}


		public function save()
		{
			$db = App::getDB();
			$nombreClase = get_called_class();
			$nombreTabla = strtolower(substr($nombreClase, 5));
			$camposParaInsert = implode(',', array_slice(static::$lista_info, 1));
			$parametrosInsert = implode(',', array_fill(0, count(static::$lista_info)-1, '?'));


			if ($this->getId() === null) {
				$sql = "insert into $nombreTabla values($camposParaInser)";
				$resultado = $this->db->ejecutar($sql, ...array_values(array_slice($this->data, 1)));
				
				if (is_array($resultado)) {
					$this->setId($this->db->getLastId());
					$resultado[] = $this->getId();
				}
				return $resultado;			
			} else{
				$resultado = $this->db->ejecutar('update noticia set titulo = ?, texto = ?, fecha = ? where $this->titulo,$this->texto,$this->fecha', ...$datos);
				
				if (is_array($resultado)) {
					$resultado[] = $this->getId();
				}

				return $resultado;
			}
		}
	}


 ?>