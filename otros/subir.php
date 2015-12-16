<?php

/*
*                       SurKaiser
*                Aplicacion Subir Imagen Alpha-1.0
*               http://www.surkaiser.com.es/
*
*                  $clase_imagen.php
*         Ultima modificacion : 11/01/2012 by SurKaiser
*/

@include("config.php");
           $archivo = $_FILES['imagen'];
                          $arnombre = $_POST['imagen'];
          $imgvas = new imagen;

           if($imgvas->comprueba($archivo['name']))
           {

                  $imagen = new extension($archivo,$cf_ex,$cf['dir']);

           }
           else {
                   echo "Debes seleccionar la imagen a subir";
           }

?>