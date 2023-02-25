<?php

require_once "../controladores/ventas.controlador.php";
require_once "../modelos/ventas.modelo.php";

class GuardarCaja{

  /*=============================================
  MOSTRAR TOTAL
  =============================================*/

 	public $inicio;
  public $fin;
  public $cuenta;
  public $diferencia;
	
 	public function guardar(){	

 	$inicio = $this->inicio;
  $fin = $this->fin;
  $cuenta = $this->cuenta;
  $diferencia = $this->diferencia;
	
  $tabla = "cierres_caja";

  $ventas = ModeloVentas::mdlGuardarCaja($tabla, $inicio, $fin, $cuenta, $diferencia);

  echo $ventas;

  }

}

/*=============================================
ACTIVAR TABLA DE VENTAS
=============================================*/ 
$activar = new GuardarCaja();
$activar -> inicio = $_POST["inicio"];
$activar -> fin = $_POST["fin"];
$activar -> cuenta = $_POST["cuenta"];
$activar -> diferencia = $_POST["diferencia"];
$activar -> guardar();







