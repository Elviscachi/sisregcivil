<?php
include '../controller/Consulta.php';
$nombre = $_REQUEST['nombre'];
$paterno = $_REQUEST['paterno'];
$materno = $_REQUEST['materno'];

//Insertar datos en la tabla

$result = Recoger($nombre, $paterno, $materno);
?>

 <!DOCTYPE html>
 <html lang="es">
 <head>
     <meta charset="UTF-8">
     <title>Listado Imagenes</title>
 </head>
 <body>
     <div id="header">
         <h1>Listado</h1>
         <a href="../index.php">Regresar</a>
     </div>
     <div id="cuerpo">
         <form action="">
             <input type="text" name="nombre" />
             <input type="text" name="paterno" />
             <input type="text" name="materno" />
             <button name="btnBuscar" type="submit">Buscar</button>
             <button name="btnTodos" type="submit">Todos</button>

         </form>

         <table border="1">
             <tr>
                 <th>Id</th>
                 <th>Nombre</th>
                 <th>Paterno</th>
                 <th>Materno</th>
                 <th>Lugar</th>
                 <th>Dia</th>
                 <th>Mes</th>
                 <th>CodImagen</th>
                 <th>Detalles</th>
             </tr>


            <?php
                while ($line = pg_fetch_array($result, null, PGSQL_ASSOC))
                {

            ?>
                <tr>
                    <td><?php echo $line['iddato']; ?></td>
                    <td><?php echo $line['nombre']; ?></td>
                    <td><?php echo $line['apepat']; ?></td>
                    <td><?php echo $line['apemat']; ?></td>
                    <td><?php echo $line['lugdat']; ?></td>
                    <td><?php echo $line['diadat']; ?></td>
                    <td><?php echo $line['mesdat']; ?></td>
                    <td><?php echo $line['idimag']; ?></td>
                    <td><a href="display.php?id=<?php echo $line['idimag']; ?>"> Ver mas </a></td>
                </tr>

            <?php
                }
            ?>

         </table>
     </div>

 </body>
 </html>