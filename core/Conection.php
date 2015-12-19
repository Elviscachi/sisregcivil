<?php

    /**
    *
    */
    class Conection
    {

        public function Conectarse(){
            $user = "postgres";
            $pass = "jasmin0215";
            $dbna = "imagenes";
            $host = "127.0.0.1";

            $conn  = pg_connect("user=$user password=$pass dbname=$dbna host=$host");

            return $conn;
        }
    }
