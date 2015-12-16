<?php
    include "conection.php";
    $nombre = $_REQUEST['nombre'];
    $apellidos = $_REQUEST['apellidos'];
    //echo "Nombre: ".$nombre."<br>";
    //echo "Apellidos: ".$apellidos."<br>";

    //echo $mysqli->host_info . "\n hhaha.php";
    $sql= "SELECT idproy, idimagen, nombres, apellidos, estado FROM documento WHERE nombres LIKE '%$nombre%' AND apellidos LIKE '%$apellidos%';";

    $res = $mysqli->query($sql);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Buscar</title>
</head>
<body>
    <h1>Listado de Archivos</h1>
    <form action="">
        <input type="text" name="nombre" placeholder="Ingresar" />
        <input type="text" name="apellidos" placeholder="Ingresar" />
        <button type="submit" name="btnConsultar">Consultar</button>
        <button type="reset" name="btnCancelar">Cancelar</button>
    </form>

    <table>
        <tr>
            <td>IdProyecto</td>
            <td>IdImagen</td>
            <td>Nombres</td>
            <td>Apellidos</td>
            <td>Estado</td>
            <td></td>
        </tr>
        <?php
            while($f = $res->fetch_assoc()){
         ?>
        <tr>
            <td><?php echo $f['idproy']; ?></td>
            <td><?php echo $f['idimagen']; ?></td>
            <td><?php echo $f['nombres']; ?></td>
            <td><?php echo $f['apellidos']; ?></td>
            <td><?php echo $f['estado']; ?></td>
            <td><a href="seleccionar.php?codigo=<?php echo $f['idimagen'];?>">Ver Imagen</a></td>

        </tr>
        <?php
            }
         ?>
    </table>
</body>
</html>
