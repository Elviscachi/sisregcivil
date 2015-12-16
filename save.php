<?php
require_once "core/Conection.php";

$conection = new Conection();
$conn = $conection->Conectarse();

$idimagen = $_REQUEST['idimagen'];
$nombre   = $_REQUEST['nombre'];
$ruta     = $_REQUEST['ruta'];
$tipo     = $_REQUEST['tipo'];
$taman    = $_REQUEST['taman'];
$imagen   = $_REQUEST['image3'];

$data  = file_get_contents('imagenes/'.$imagen);
$image = pg_escape_bytea($data);

//pg_query($conn, "UPDATE imagen SET foto = '{$image}' WHERE id = 1");
pg_query($conn, "INSERT INTO imagen(nombre, rutaim, imagen, tipoim, tamima, idimag) VALUES ('$nombre', '$ruta', '{$image}', '$tipo', '$taman',$idimagen);") or die(pg_errormessage());
pg_close($conn);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Imagenes</title>
</head>
<body>
	<form action="">
		idimagen:<input type="text" name="idimagen" placeholder="1"><br>
		nombre:<input type="text" name="nombre" placeholder="2"><br>
		Ruta<input type="text" name="ruta" placeholder="3"><br>
		Imagen<input type="file" name="image3" placeholder="4"><br>
		tipo<input type="text" name="tipo" placeholder="5"><br>
		Tamaño<input type="text" name="taman" placeholder="6"><br>
		<button name="enviar" type="submit">Guardar</button>
	</form>
	<a href="index.php">Regresar</a>
</body>
</html>
