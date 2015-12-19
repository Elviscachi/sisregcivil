<?php
include "../model/Administracion.php";
$iddato =$_REQUEST['iddato'];
$nombre =$_REQUEST['nombre'];
$apepat =$_REQUEST['apepat'];
$apemat =$_REQUEST['apemat'];
$lugdat =$_REQUEST['lugdat'];
$diadat =$_REQUEST['diadat'];
$mesdat =$_REQUEST['mesdat'];
$anodat =$_REQUEST['anodat'];
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

$data = array(
    iddato =>$iddato,
    nombre =>$nombre,
    apepat =>$apepat,
    apemat =>$apemat,
    lugdat =>$lugdat,
    diadat =>$diadat,
    mesdat =>$mesdat,
    anodat =>$anodat,
    nompad =>$nompad,
    patpad =>$patpad,
    matpad =>$matpad,
    nommad =>$nommad,
    patmad =>$patmad,
    matmad =>$matmad,
    conyug =>$conyug,
    patcon =>$patcon,
    matcon =>$matcon,
    idimag =>$idimag
    );

print_r($data);
$admin = new Administracion();
$admin->AddRegistro($data);
echo "<script type='text/javascript'>alert('Dato Guardado');</script>";
header("Location: ../view/nombres.php");
?>
