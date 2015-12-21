<?php
    include 'header.php';
    include_once('../controller/Consulta.php');
    $num = Registro();
    $next = $num + 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ingreso de nombres</title>
</head>
<body>
    <div id="cabecera">
        <h1>Ingreso de nombres</h1>
    </div>
    <a href="../index.php">Regresar</a>
    <div id="cuerpo">
        <form action="../controller/savenombres.php" method="get">
            <table border="0">
                <tr>
                    <th>Datos</th>
                    <th>Detalles</th>
                </tr>
                <tr>
                    <td>iddato*</td>
                    <td><input type="text" name="iddato" value="<?php echo $next; ?>"></td>
                </tr>
                <tr>
                    <td>nombre*</td>
                    <td><input type="text" name="nombre"></td>
                </tr>
                <tr>
                    <td>apepat*</td>
                    <td><input type="text" name="apepat"></td>
                </tr>
                <tr>
                    <td>apemat*</td>
                    <td><input type="text" name="apemat"></td>
                </tr>
                <tr>
                    <td>lugdat*</td>
                    <td><input type="text" name="lugdat"></td>
                </tr>
                <tr>
                    <td>diadat*</td>
                    <td><input type="text" name="diadat"></td>
                </tr>
                <tr>
                    <td>mesdat*</td>
                    <td><input type="text" name="mesdat"></td>
                </tr>
                <tr>
                    <td>añodat*</td>
                    <td><input type="text" name="anodat"></td>
                </tr>
                <tr>
                    <td>nompad</td>
                    <td><input type="text" name="nompad"></td>
                </tr>
                <tr>
                    <td>patpad</td>
                    <td><input type="text" name="patpad"></td>
                </tr>
                <tr>
                    <td>matpad</td>
                    <td><input type="text" name="matpad"></td>
                </tr>
                <tr>
                    <td>nommad</td>
                    <td><input type="text" name="nommad"></td>
                </tr>
                <tr>
                    <td>patmad</td>
                    <td><input type="text" name="patmad"></td>
                </tr>
                <tr>
                    <td>matmad</td>
                    <td><input type="text" name="matmad"></td>
                </tr>
                <tr>
                    <td>conyug</td>
                    <td><input type="text" name="conyug"></td>
                </tr>
                <tr>
                    <td>patcon</td>
                    <td><input type="text" name="patcon"></td>
                </tr>
                <tr>
                    <td>matcon</td>
                    <td><input type="text" name="matcon"></td>
                </tr>
                <tr>
                    <td>idimag*</td>
                    <td><input type="text" name="idimag"></td>
                </tr>
                <tr>
                    <td>Botones</td>
                    <td>
                        <button name="btnenviar" type="submit">Guardar</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>