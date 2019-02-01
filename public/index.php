<?php 

	// Ayuda a que funcione en Windows y en Linux
	define('DS', DIRECTORY_SEPARATOR); 

	// Raiz del proyecyo independiente de donde se despliegue la aplicacion.
	define('ROOT', dirname(dirname(__FILE__)));
	define('VIEW_ROOT', ROOT.DS."resources".DS);

	require(ROOT.DS."src".DS."init.php");
/*
	echo Config::get('site.name');
	echo "<br>";
	echo "Pedidio: <br>";
	echo $_SERVER['REQUEST_URI']; 
	$enrutador = new Router($_SERVER['REQUEST_URI']);*/
	//print_r($enrutador);
	App::run($_SERVER['REQUEST_URI']);


?>