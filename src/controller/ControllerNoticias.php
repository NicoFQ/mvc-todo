<?php 

	/**
	 * Esta clase representa un controlador 
	 */
	class ControllerNoticias extends BaseController
	{
		public function list(){
			$this->data = [
				'noticia1',
				'noticia2',
				'noticia3',
			];
		}

		public function show($id){
			$datosModelo = [
				'noticia1',
				'noticia2',
				'noticia3',
			];
			$this->data = [$datosModelo[$id]];

		}
			
	}

 ?>