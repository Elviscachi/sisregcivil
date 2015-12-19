<?php //namespace Controller

    function Recoger($nombre, $paterno, $materno)
    {
        require_once '../core/Conection.php';
        require '../model/Consultas.php';

        $conection = new Conection();
        $conn = $conection->Conectarse();

        $consultas = new Consultas();

        $sql = $consultas->Buscar($nombre, $paterno, $materno);
        $result = pg_query($conn, $sql);
        //$valores = pg_fetch_array($result, null, PGSQL_ASSOC);
        //pg_close($conn);
        return $result;
    }

    function MostrarImagen($id)
    {
        require_once '../core/Conection.php';
        require '../model/Consultas.php';

        $conection = new Conection();
        $conn = $conection->Conectarse();

        $query = pg_query($conn, "SELECT imagen FROM imagen WHERE idimag = $id");
        $row   = pg_fetch_row($query);
        $image = pg_unescape_bytea($row[0]);
        //pg_close($conn);
        return $image;
    }
?>