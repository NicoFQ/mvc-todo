<?php 

	/**
	 * Esta clase representa un controlador
	 */
	class Router{
		private $uri;
		private $controlador;
		private $accion;
		private $params;
		public function getUri(){
			return $this->uri;
		}
		public function getControlador(){
			return $this->controlador;
		}
		public function getAccion(){
			return $this->accion;
		}
		public function getParams(){
			return $this->params;
		}

		function __construct($uri)
		{
			// noticias/listado/desde/01-01-2019
			// noticias/listado/desde/01-01-2019
			// noticias/listado/tecnologia/?pag=2
			// noticias/listado
			// noticias/listado/
			$this->uri = $uri;
			if ($uri == "/") {
				$this->redirect(Config::get('ruta.defecto'));
				//$this->uri = 'login/view';
				
			}
			$urlProcesada = trim($uri, "/");
			$urlProcesada = explode('?', $urlProcesada);
			$urlProcesada = trim($urlProcesada[0], '/');
			$urlPartes = explode('/', $urlProcesada);
			if (count($urlPartes) !== 0) {
				// Obtengo controlador si hay
				if (current($urlPartes)) {
					$this->controlador = array_shift($urlPartes);
				}

				// Obtengo accion si hay
				if (current($urlPartes)) {
					$this->accion = array_shift($urlPartes);
				}
				$this->params = $urlPartes;
			}

		}
		public function redirect($url){
			header("Location: $url");
			die();
		}
	}

 ?>