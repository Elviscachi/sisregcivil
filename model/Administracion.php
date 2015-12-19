<?php

    class Administracion
    {

        private $conn;

        function __construct()
        {
            require "../core/Conection.php";
            $conection = new Conection();
            $this->conn = $conection->Conectarse();
            return $this->conn;
        }

        public function AddImagen($datos, $imagen)
        {
            extract($datos);

            $data  = file_get_contents($imagen);
            $image = pg_escape_bytea($data);

            $sql = "INSERT INTO imagen(nombre, rutaim, imagen, tipoim, tamima, idimag) VALUES ('{$datos[0]}', '{$datos[1]}', '{$image}', '{$datos[2]}', '{$datos[3]}',{$datos[4]})";
            echo $sql;
            pg_query($this->conn, $sql);
            //pg_close($this->conn);
        }

        public function AddRegistro($datos)
        {
            extract($datos);

            $data  = file_get_contents($imagen);
            $image = pg_escape_bytea($data);

            $sql = "INSERT INTO registro(iddato, nombre, apepat, apemat, lugdat, diadat, mesdat, anodat, nompad, patpad, matpad, nommad, patmad, matmad, conyug, patcon, matcon, idimag) VALUES ($iddato, '$nombre', '$apepat', '$apemat', '$lugdat', '$diadat','$mesdat', '$anodat', '$nompad', '$patpad', '$matpad', '$nommad', '$patmad', '$matmad', '$conyug', '$patcon', '$matcon', '$idimag');";

            pg_query($this->conn, $sql);
            //pg_close($this->conn);
        }

        public function UltimoCodigo(){
            $sql = "SELECT idimag FROM imagen ORDER BY idimag DESC;";

            $result = pg_query($this->conn, $sql);
            $codigo = pg_fetch_array($result, null, PGSQL_ASSOC);
            //pg_close($this->conn);

            return $codigo['idimag'];
        }

        public function RegUltimo()
        {
            $sql = "SELECT iddato FROM registro ORDER BY iddato DESC;";
            $result = pg_query($this->conn, $sql);
            $codigo = pg_fetch_array($result, null, PGSQL_ASSOC);
            //pg_close($this->conn);

            return $codigo['iddato'];
        }
    }
 ?>