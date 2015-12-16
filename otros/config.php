<?PHP

/*
 *                       SurKaiser
 *                Aplicacion Subir Imagen Alpha-1.0
 *               surkaiser.com.es
 *
 *                  $config.php
 *         Ultima modificacion : 11/01/2012 by SurKaiser
 */

//Definimos variable global
define("EN_SURKAISER", true);
//Incluye las operaciones necesarias.
include_once ("clases.php");
//Extensiones a usar
$cf_ex = array("jpg", "jpeg", "bmp", "png", "gif");
//Habilitamos el uso con BDS
$cf['usarBd'] = true;//Habilita el uso de Bd con imagenes
//mysql
$cf['bd']['tipo'] = 'postgresql';//Tipo de Servidor de BD's
/*´
//Si usas otra bd pon en comentario el default de 'mysql' o simplemente
//cambialo por la lista mostrada mas abajo
//DBS disponibles para usar en esta version :
//Postgresql
$cf['bd']['tipo']     = 'postgresql';
//Oracle
$cf['bd']['tipo']     = 'oracle';
 */
$cf['bd']['host']  = '127.0.0.1';//Servidor Bd
$cf['bd']['u']     = 'postgres';//Usuario de BD
$cf['bd']['clave'] = 'archivo123';//Clave de la Bd
$cf['bd']['nbd']   = 'imagenes';//Nombre de la Bd

$cf['dir'] = 'imagenes/';//Directorio a usar

//VARIABLES PARA LA CONEXION
define("TBD", $cf['bd']['tipo']);
define("SER", $cf['bd']['host']);
define("US", $cf['bd']['u']);
define("CL", $cf['bd']['clave']);
define("BD", $cf['bd']['nbd']);
//PDO GLOBAL ((NO MODIFICAR EN CASO DE USAR BD))
$base = new bd(TBD, SER, BD, US, CL);

?>