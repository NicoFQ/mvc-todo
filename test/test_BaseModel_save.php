<?php 
	rquire('./../bin/mvc_shell.php');
	$n = new ModelNoticia();
	$n->setId(1);
	$n->setTitulo('Mi titulo');
	$n->setTexto('El texto');
	$n->setFecha('2019-02-15');
	print_r($n);
	$n->save();

 ?>