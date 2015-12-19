<?php
include('../controller/Consulta.php');
$id    = $_REQUEST['id'];
$image = MostrarImagen($id);

header("Content-type: image/jpeg");
echo $image;
?>
