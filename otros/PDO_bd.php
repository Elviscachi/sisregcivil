<?PHP if (! defined("EN_SURKAISER")) { exit("No se puede visializar los scripts"); }

/*
*                       SurKaiser
*                Aplicacion Subir Imagen Alpha-1.0
*               http://www.surkaiser.com.es/
*
*                  $PDO_bd.php
*         Ultima modificacion : 11/01/2012 by SurKaiser
*/


                         class PDOConfig extends PDO {

                         private $servidor;
                         private $BDS;
                         private $u;
                         private $clave;
                         private $tipo;

                         public function __construct($t,$s,$b,$u,$c)
                         {


                                                 $this->tipo = $t;

                 $this->servidor = $s;
                 $this->BDS = $b;
                 $this->u   = $u;
                 $this->clave = $c;
                  switch($this->tipo)
                  {
                          case 'mysql':
                          parent::__construct('mysql:host='.$this->servidor.';dbname='.$this->BDS,$this->u,$this->clave);

                          break;
                          case 'oracle':
                          parent::__construct('OCI:host='.$this->servidor.';dbname='.$this->BDS,$this->u,$this->clave);
                          break;
                          case 'postgresql':
                          parent::__construct('pgsql:host='.$this->servidor.';dbname='.$this->BDS,$this->u,$this->clave);
                          break;
                          default:
                          return false;
                          break;
                  }
                 }
                         }


          class bd extends PDOConfig
          {
                  protected $sql;
                  protected $rows;
                  protected $pedir;

                         public function numero($con)
                         {
                                 $this->sql = parent::prepare($con);
                                 $this->sql->execute();
                                 return $this->sql->fetchColumn();
                         }
                         public function resultado($con)
                         {
                                 $this->sql = parent::prepare($con);
                                  $this->sql->execute();
                                  return $this->sql;
                                 }


          }
?>