<?php 
	
	//php -a -d auto_prepend_file=bin/shell_autoload.php

	// Ayuda a que funcione en Windows y en Linux
	define('DS', DIRECTORY_SEPARATOR); 

	// Raiz del proyecyo independiente de donde se despliegue la aplicacion.
	define('ROOT', dirname(dirname(__FILE__)));
	define('VIEW_ROOT', ROOT.DS."resources".DS);

	require(ROOT.DS."src".DS."init.php");
	echo ModelNoticia::getAll();
	
 ?>