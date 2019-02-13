<?php 
	/*
	* ModelXXX::getAll(); 
	* ModelXXX::getAll(1,10); 
	* ModelXXX::getAll(0,10); 
	*
	* ModelNoticia::getFiltradoPorTexto('Trump');
	* 
	*/
	class ModelNoticia extends BaseModel
	{
		protected static $lista_info = ['id','titulo','texto','fecha'];
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


	}

 ?>