<?php 

	/**
	 * Esta clase representa un controlador 
	 */
	class ControllerNoticia extends BaseController
	{
		public function list(){
			$this->data = ModelNoticia::getAll();
		}

		public function show($id){
			$this->data['perfil'] = 'Nico';	
			$this->data['publicidad'] = 'Apple';	
			$this->data['noticia'] = ModelNoticia::getbyId($id);	
		}
		public function add(){
			$form = new ModelNoticiaForm($_POST);
			$this->data['form_manager'] = $form;
			if (count($_POST) > 0) {
				// Crear un formulario de noticias
				// Verificar informacion
				if ($form->datosValidos()) {
					$noticia = $form->getNoticia();
					$noticia->save();
					App::getRouter()->redirect('/noticia/list');
				}else{
					$this->data['errores'] = $form;
				}
				// si no hay errores obtener objeto noticia y guardar
				// y si hay errores pintarlos

			}
		}
	}

 ?>