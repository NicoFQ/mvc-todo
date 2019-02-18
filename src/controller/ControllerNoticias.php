<?php 

	/**
	 * Esta clase representa un controlador 
	 */
	class ControllerNoticias extends BaseController
	{
		public function list(){
			$this->data = ModelNoticia::getAll();
		}

		public function show($id){
			$this->data['perfil'] = 'Nico';	
			$this->data['publicidad'] = 'Apple';	
			$this->data['noticia'] = ModelNoticia::getbyId($id);	
		}
	}

 ?>