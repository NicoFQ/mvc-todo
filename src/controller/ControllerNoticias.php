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
			//ModelNoticias::getNoticias();
			//ModelNoticias::getNoticiasPublicadas();
			//$noticia = ModelNoticias::getById(47);
			//$noticia = ModelNoticias::getLastByAuthor('Nico');
			$noticia = new ModelNoticia();
			$noticia->setTitulo('Lanzamiendo de mi MVC');
			//$noticia->setAuthor(1);
			//$noticia->getContent();
			$noticia->save();
		}

		public function show($id){
			$datosModelo = [
				'noticia1',
				'noticia2',
				'noticia3',
			];
			$this->data['titulo'] = 'algo';
			$this->data['id'] = $id;
			$this->data['contenido'] = $datosModelo[$id];
		}
	}

 ?>