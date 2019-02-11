<?php 
	class ModelNoticia extends BaseModel
	{
		private $id, $titulo, $texto, $fecha;
		/* GETERS */		
		function getTitulo(){ return $this->titulo;	}
		function getTexto()	{ return $this->texto; 	}
		function getFecha()	{ return $this->fecha; 	}
		function getId()	{ return $this->id; 	}
		/* SETERS */		
		function setTitulo($titulo)	{ $this->titulo = $titulo; 	}
		function setTexto($texto) 	{ $this->texto = $texto; 	}
		function setFecha($fecha) 	{ $this->fecha = $fecha; 	}

		public function __construct(array $data_row = []){
			parent::construct();
			if (count($data_row) > 0) {
				$this->setTitulo($data_row['titulo']);
				$this->setTexto($data_row['texto']);
				$this->setFecha($data_row['fecha']);
			}
		}


		public function save()
		{
			$datos = array($this->titulo,$this->texto,$this->fecha);
			//print_r($datos);
			$resultado = [];
			if ($this->id === null) {
				$resultado = $this->db->ejecutar('insert into noticia values(?,?,?)', $this->titulo,$this->texto,$this->fecha);
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

		public static function getAllNoticias($page = 0, $num = 10){
			$db = App::getDB();
			$resultado = $db->ejecutar("select id, titulo, texto, fecha from noticia");
			$resultado = array_map(function ($datos){
				return new ModelNoticia($datos);
			}, $resultado);
			return $resultado;
		}
	}

 ?>