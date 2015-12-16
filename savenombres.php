<?php

$iddato =$_REQUEST['iddato'];
$nombre =$_REQUEST['nombre'];
$apepat =$_REQUEST['apepat'];
$apemat =$_REQUEST['apemat'];
$lugdat =$_REQUEST['lugdat'];
$diadat =$_REQUEST['diadat'];
$mesdat =$_REQUEST['mesdat'];
$añodat =$_REQUEST['añodat'];
$nompad =$_REQUEST['nompad'];
$patpad =$_REQUEST['patpad'];
$matpad =$_REQUEST['matpad'];
$nommad =$_REQUEST['nommad'];
$patmad =$_REQUEST['patmad'];
$matmad =$_REQUEST['matmad'];
$conyug =$_REQUEST['conyug'];
$patcon =$_REQUEST['patcon'];
$matcon =$_REQUEST['matcon'];
$idimag =$_REQUEST['idimag'];

$conn  = pg_connect("user=postgres password=jasmin0215 dbname=myimagenes host=127.0.0.1");

//Insertar datos en la tabla
pg_query($conn, "INSERT INTO registro(iddato, nombre, apepat, apemat, lugdat, diadat, mesdat, idimag) VALUES ($iddato, '$nombre', '$apepat', '$apemat', '$lugdat', '$diadat', '$mesdat', $idimag)");
pg_close($conn);
header("Location: index.php");
?>