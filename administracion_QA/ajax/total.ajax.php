<?php

require_once "../controladores/ventas.controlador.php";
require_once "../modelos/ventas.modelo.php";

require_once "../controladores/entradas.controlador.php";
require_once "../modelos/entradas.modelo.php";

class TotalDinero{

  	/*=============================================
  	MOSTRAR TOTAL
  	=============================================*/

 	public $tabla;
	public $fecha;

 	public function sumarTotal(){	

 	$tabla = $this->tabla;
	$fecha = $this->fecha;
  	$ventas = ControladorVentas::ctrBuscarFecha($tabla, $fecha);

  	$total = 0;
	for($i = 0; $i < count($ventas); $i++){
		$total = $total + ($ventas[$i]["peso"] * $ventas[$i]["precio"]);
	} 
  	
  	echo number_format($total);	

  }

}

/*=============================================
ACTIVAR TABLA DE VENTAS
=============================================*/ 
$activar = new TotalDinero();
$activar -> tabla = $_POST["tabla"];
$activar -> fecha = $_POST["fecha"];
$activar -> sumarTotal(); 