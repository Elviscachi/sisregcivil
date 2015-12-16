<?PHP if (!defined("EN_SURKAISER")) {exit("No se puede visializar los scripts");}
/*
 *                       SurKaiser
 *                Aplicacion Subir Imagen Alpha-1.0
 *          http://www.surkaiser.com.es/
 *
 *                  $clase_imagen.php
 *         Ultima modificacion : 11/01/2012 by SurKaiser
 */

class imagen {
	protected $archivo;
	protected $url;
	protected $extensiones;

	public function comprueba($ar) {
		$this->archivo = $ar;

		if (empty($this->archivo)) {
			return false;
		} else {
			return true;
		}
	}
}

class subir extends imagen {
	private $dir = string;
	private $random;
	private $exten;
	private $arr;
	public function subir($ar, $ex, $dir) {
		$this->dir = $dir;

		$this->archivo     = explode(".", $ar['name']);
		$this->extensiones = $ex;
		$random            = (date("d:m:y:h:i")*rand()*9999999);

		if (in_array($this->archivo[1], $this->extensiones)) {

			$this->url = $dir.$random.".".$this->archivo[1];

			if (!file_exists($this->dir)) {
				@mkdir($this->dir, 777);
			}
			$this->arr = array(':nombre' => "hola",
				':des'                      => "Hola",
				':url'                      => $this->url
			);
			$this->archivo = $ar;
			if (move_uploaded_file($this->archivo['tmp_name'], $this->url)) {
				$base = new bd(TBD, SER, BD, US, CL);
				$i    = 1;
				$sql  = $base->prepare("INSERT INTO imagen(idimagen, nombre, ruta, foto) VALUES ($i+1, $this->archivo[1], $this->url, $this->archivo['tmp_name'])");

				if ($sql->execute($this->arr)) {

					echo "Imagen subida y almacenada correctamente";
				} else {
					echo "Error";
				}
			} else {
				echo "error";
			}
		} else {
			echo "Extension invalida";
		}

	}
}
class extension extends subir {
}
?>