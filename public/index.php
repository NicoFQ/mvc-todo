<?php 

	// Ayuda a que funcione en Windows y en Linux
	define('DS', DIRECTORY_SEPARATOR); 

	// Raiz del proyecyo independiente de donde se despliegue la aplicacion.
	define('ROOT', dirname(dirname(__FILE__)));

	require(ROOT.DS."src".DS."init.php");

	echo Config::get('site.name');
	echo "<br>";
	echo Config::get('db.host');


 ?>