<?php
    /**
    *
    */
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

        public function AddRegistro($datos, $imagen)
        {
            extract($datos);

            $data  = file_get_contents($imagen);
            $image = pg_escape_bytea($data);

            $sql = "INSERT INTO imagen(nombre, rutaim, imagen, tipoim, tamima, idimag) VALUES ('{$datos[0]}', '{$datos[1]}', '{$image}', '{$datos[2]}', '{$datos[3]}',{$datos[4]})";
            echo $sql;
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
    }
 ?>