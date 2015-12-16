<?php

    Class Consultas
    {
        public function Buscar($nombre,$paterno,$materno)
        {
            if(!is_null($nombre)){
                if(!is_null($paterno))
                {
                    if(!is_null($materno))
                    {
                        //echo "sql (nombre, paterno, materno)";

                        $nexo = "%";
                        $sinEspacios = trim($nombre);
                        $nom_temp = explode(" ", $sinEspacios);
                        $nom_corregido = implode($nexo, $nom_temp);
                        $query="SELECT iddato, nombre, apepat, apemat, lugdat, diadat, mesdat, anodat, nompad, patpad, matpad, nommad, patmad, matmad, conyug, patcon, matcon, idimag FROM registro WHERE nombre LIKE '%$nom_corregido%' AND apepat LIKE '%$paterno%' AND apemat LIKE '%$materno%' ORDER BY apepat " ;
                        //$rpta = mysql_query($query);
                        return $query;
                    }else{
                        //echo "sql (nombre, paterno)";

                        $nexo = "%";
                        $sinEspacios = trim($nombre);
                        $nom_temp = explode(" ", $sinEspacios);
                        $nom_corregido = implode($nexo, $nom_temp);
                        $query="SELECT iddato, nombre, apepat, apemat, lugdat, diadat, mesdat, anodat, nompad, patpad, matpad, nommad, patmad, matmad, conyug, patcon, matcon, idimag FROM registro WHERE nombre LIKE '%$nom_corregido%' AND apepat LIKE '%$paterno%' ORDER BY apepat " ;
                        //$rpta = mysql_query($query);
                        return $query;
                    }
                }else{
                    if(!is_null($materno))
                    {
                        //echo "sql (nombre, materno)";

                        $nexo = "%";
                        $sinEspacios = trim($nombre);
                        $nom_temp = explode(" ", $sinEspacios);
                        $nom_corregido = implode($nexo, $nom_temp);
                        $query="SELECT iddato, nombre, apepat, apemat, lugdat, diadat, mesdat, anodat, nompad, patpad, matpad, nommad, patmad, matmad, conyug, patcon, matcon, idimag FROM registro WHERE nombre LIKE '%$nom_corregido%' AND apemat LIKE '%$materno%' ORDER BY apepat " ;
                        //$rpta = mysql_query($query);
                        return $query;
                    }else{
                        //echo "sql (nombre)";
                        $nexo = "%";
                        $sinEspacios = trim($nombre);
                        $nom_temp = explode(" ", $sinEspacios);
                        $nom_corregido = implode($nexo, $nom_temp);
                        $query="SELECT iddato, nombre, apepat, apemat, lugdat, diadat, mesdat, anodat, nompad, patpad, matpad, nommad, patmad, matmad, conyug, patcon, matcon, idimag FROM registro WHERE nombre LIKE '%$nom_corregido%' ORDER BY apepat " ;
                        //$rpta = mysql_query($query);
                        return $query;
                    }
                }
            //SI  ESYA VACIO
            }else{
                if(!is_null($paterno))
                {
                    if(!is_null($materno))
                    {
                        //echo "SQL (PATERNO, MATERNO)";

                        $nexo = "%";
                        $sinEspacios = trim($nombre);
                        $nom_temp = explode(" ", $sinEspacios);
                        $nom_corregido = implode($nexo, $nom_temp);
                        $query="SELECT iddato, nombre, apepat, apemat, lugdat, diadat, mesdat, anodat, nompad, patpad, matpad, nommad, patmad, matmad, conyug, patcon, matcon, idimag FROM registro WHERE apepat LIKE '%$paterno%' AND apemat LIKE '%$materno%' ORDER BY apepat " ;
                        //$rpta = mysql_query($query);
                        return $query;
                    }else{
                        //echo "SQL (PATERNO)";

                        $nexo = "%";
                        $sinEspacios = trim($nombre);
                        $nom_temp = explode(" ", $sinEspacios);
                        $nom_corregido = implode($nexo, $nom_temp);
                        $query="SELECT iddato, nombre, apepat, apemat, lugdat, diadat, mesdat, anodat, nompad, patpad, matpad, nommad, patmad, matmad, conyug, patcon, matcon, idimag FROM registro WHERE apepat LIKE '%$paterno%' ORDER BY apepat " ;
                        //$rpta = mysql_query($query);
                        return $query;
                    }
                }else{
                    if(!is_null($materno))
                    {
                        //echo "SQL (MATERNO)";

                        $nexo = "%";
                        $sinEspacios = trim($nombre);
                        $nom_temp = explode(" ", $sinEspacios);
                        $nom_corregido = implode($nexo, $nom_temp);
                        $query="SELECT iddato, nombre, apepat, apemat, lugdat, diadat, mesdat, anodat, nompad, patpad, matpad, nommad, patmad, matmad, conyug, patcon, matcon, idimag FROM registro WHERE apemat LIKE '%$materno%' ORDER BY apepat " ;
                        //$rpta = mysql_query($query);
                        return $query;
                    }else{
                        echo "Error, no ingreso ningun nombre";
                    }
                }
            }

        }
    }


?>