<?php 

/**
 * 
 */
class ModelNoticiaForm
{
	private $errores = [];
	private $datos = [];
	private $noticia = [];

	function __construct($data_post)
	{
		$this->datos = $data_post;
		if (strlen($data_post['titulo']) < 1) {
			$this->errores[] = "Error en el titulo";
		}
		if (strlen($data_post['texto']) < 1) {
			$this->errores[] = "Error en el texto";
		}
		if ($this->validateDate($data_post['fecha'])) {
			$this->errores[] = "Error en la fecha";
		}
		if ($this->datosValidos()) {
			$data = ['id'=> null];
			$data = array_merge($data, $data_post);
			$noticia = new ModelNoticia($data);
			$this->noticia = $noticia;
		}
		print_r($this->errores);
	die();
	}
	private function validateDate($date, $format = 'Y/m/d')
	{
	    $d = DateTime::createFromFormat($format, $date);
	    // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
	    return $d && $d->format($format) === $date;
	}
	function datosValidos(){
		return count($this->errores);
	}
	function getNoticia(){
		return $this->noticia;
	}

	function getTitulo(){
		return $this->dato['titulo'];
	}

	function getErrorTitulo(){
		return $this->errores['titulo'];
	}
	function getTexto(){
		return $this->dato['texto'];
	}

	function getErrorTexto(){
		return $this->errores['texto'];
	}
	function getFecha(){
		return $this->dato['fecha'];
	}

	function getErrorFecha(){
		return $this->errores['fecha'];
	}


}

 ?>