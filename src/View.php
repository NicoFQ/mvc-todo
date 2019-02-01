<?php 

class View{
	private $data;
	private $template;

	public function __construct(){
		$erutador = App::getRouter();
		$this->template = $enrutador->getControlador().DS.$enrutador->getAccion().'.phtml';
		if (!file_exists()) {
			throw new Exception("Template no disponible hoy, vuelva mañana.");
			
		}
	}	
}

 ?>