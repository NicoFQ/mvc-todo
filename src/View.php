<?php 

class View{
	private $template;

	public function __construct(){
		$enrutador = App::getRouter();
						// noticias/list.html
		$this->template = VIEW_ROOT . $enrutador->getControlador().DS.$enrutador->getAccion().'.phtml';

		if (!file_exists($this->template)) {
			throw new Exception("Template no disponible hoy, vuelva mañana.");
					echo "<br>";
		echo $this->template;
		echo "<br>";
		}
	}

	public function render($data = []){
		$html = $this->renderConenido($data);
		
		$data = [];
		$data['title'] = Config::get('site.name');
		$data['contenido'] = $html;

		ob_start(); // Toda la salida se queda en buffer temporal 
		
		include(VIEW_ROOT.'base.phtml');
		$html_content = ob_get_clean();// Hasta llamar a la funcion ob_get_clean()
		return $html_content;
	}

	public function renderConenido($data){
		ob_start(); // Toda la salida se queda en buffer temporal 
		include($this->template);
		$html_content = ob_get_clean();
		return $html_content;
	}	
}

 ?>