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

		public function save()
		{
			$datos = array($this->titulo,$this->texto,$this->fecha);
			print_r($datos);
			if ($this->id === null) {
					$resultado = $this->db->ejecutar('insert into noticia values(?,?,?)', $this->titulo,$this->texto,$this->fecha);
					if (is_array($resultado)) {
						return [$this->id];
					}else{
						return $resultado;
						return $resultado;
					}

			} else{
					return $this->db->ejecutar('update noticia set titulo = ?, texto = ?, fecha = ? where $this->titulo,$this->texto,$this->fecha', ...$datos);
			}
		}
	}

 ?>