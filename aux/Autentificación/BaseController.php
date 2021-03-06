<?php

class BaseController {

    /* Se debe rellenar con los modelos en las clases derivadas */
    protected $data;

    /* Es una lista de vistas que requieren autentificación */
    protected static $requiere_autentificacion = [];

    public function __construct($data = array()){
        $this->data = $data;
    }

    public function processAction($method, $params){

        if(
            in_array($method, static::$requiere_autentificacion) &&
            (Session::getInstance())->get('AUTH') != true
          ) {
            App::getRouter()::redirect('/usuario/login');
        }

        // Obtiene/gestiona los datos
        $this->$method(...$params);
        // Creamos una vista
        $view = new View($this->data);
        // Devuelve el HTML
        return $view->render();
    }
}

?>
