<?php

	require '../model/Administracion.php';
	$administracion = new Administracion();

	$codigo = $administracion->UltimoCodigo();

	echo "Ultimo Codigo: ".$codigo;
	$next = $codigo+1;
	echo "Siguiente: ". $next;


	$idimagen = $next;
	$nombre   = $_REQUEST['nombre'];
	$ruta     = "";
	$tipo     = $_REQUEST['tipo'];
	$taman    = $_REQUEST['taman'];
	$imagen   = $_REQUEST['nombre'];

	$datos = array();
	$datos[0]="$nombre";
	$datos[1]="$ruta";
	$datos[2]="$tipo";
	$datos[3]="$taman";
	$datos[4]="$idimagen";
	$imagen = "/var/www/html/sisregcivil/imagenes/".$imagen;


	$administracion->AddImagen($datos, $imagen);
 ?>