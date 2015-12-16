<?php
// Conexion, seleccion de base de datos
$enlace = mysql_connect('localhost','root','')
    or die('No pudo conectarse' . mysql_error());

mysql_select_db('direct') or die('No pudo seleccionarse la BD.');

// Realizar una consulta SQL
$consulta  = "SELECT id_dept FROM dept WHERE depart ='". $_POST['id_dept']. "'";



$resultado = mysql_query($consulta) or die(' La consulta fall&oacute;: ' . mysql_error()." ". $consulta);
$fila = mysql_fetch_assoc($resultado);


$borrar = "DELETE FROM dept where id_dept=".$fila['id_dept'];
echo "<br> ha sido borrado " .$_REQUEST['depart'];

;

  echo '<br><a href=javascript:history.go(-2);>volver al menu principal</a>';


$resultat_esborrar=mysql_query($borrar) or die(' La consulta fall&oacute;: ' . mysql_error()." ". $borrar);

// Liberar conjunto de resultados
mysql_free_result($resultado);

// Cerrar la conexion
mysql_close($enlace);
?>