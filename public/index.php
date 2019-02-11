<?php 

	// Ayuda a que funcione en Windows y en Linux
	define('DS', DIRECTORY_SEPARATOR); 

	// Raiz del proyecyo independiente de donde se despliegue la aplicacion.
	define('ROOT', dirname(dirname(__FILE__)));
	define('VIEW_ROOT', ROOT.DS."resources".DS);

	require(ROOT.DS."src".DS."init.php");

	App::run($_SERVER['REQUEST_URI']);

?>