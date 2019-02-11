<?php 
	function startsWith($haystack, $needle)
	{
	     $length = strlen($needle);
	     return (substr($haystack, 0, $length) === $needle);
	}


	spl_autoload_register(function ($nombre_clase) {
		$ruta_a_clase = ROOT.DS."src".DS;
    	// si comienza por controller -> src/constroller/<nombre>
		if (startsWith($nombre_clase, "Controller")) {
			$ruta_a_clase .= 'controller'.DS.$nombre_clase;
		}elseif (startsWith($nombre_clase, "Model")) {
    	// si comienza por model -> src/model/<nombre>
			$ruta_a_clase .= 'model'.DS.$nombre_clase;
		}else{
		// si no src/<nombre>
			$ruta_a_clase .= $nombre_clase;
		}
    	$ruta_a_clase .= ".php";
    	require($ruta_a_clase);
	});
	require(ROOT.DS."config".DS."config.php");
 ?>