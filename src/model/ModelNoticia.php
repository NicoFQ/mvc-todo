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
/*
		public function save()
		{
			$tabla = strtolower(substr(get_called_class(), 5));
			$campos = implode(',', array_keys($lista_info));
			$datos = implode(',', $this->$lista_info);
			$numCampos = str_repeat('?,', count($lista_info));
			$numCampos = substr($numCampos, 0,count($numCampos)-1);
			$resultado = [];
			if ($this->getId() === null) {
				$resultado = $this->db->ejecutar('insert into $tabla values($numCampos)', $datos);
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
*/

	}

 ?>