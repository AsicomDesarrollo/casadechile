<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

class AjaxProductos{

	/*=============================================
  	ACTIVAR PRODUCTOS
 	=============================================*/	

 	public $activarProducto;
	public $activarId;

	public function ajaxActivarProducto(){

		$tabla = "productos";
		$valor1 = $this->activarProducto;
		$valor2 = $this->activarId;	

		$valor1 = $valor1."";

		$respuesta = ModeloProductos::mdlActualizarProductos($tabla, $valor1, $valor2);

		echo $respuesta;

	}

	/*=============================================
	TRAER PRODUCTOS
	=============================================*/	

	public $idProducto;

	public function ajaxTraerProducto(){

		$valor = $this->idProducto;

		$respuesta = ControladorProductos::ctrTraerProducto($valor);

		echo json_encode($respuesta);

	}

}

/*=============================================
ACTIVAR PRODUCTOS
=============================================*/	

if(isset($_POST["activarProducto"])){

	$activarProducto = new AjaxProductos();
	$activarProducto -> activarProducto = $_POST["activarProducto"];
	$activarProducto -> activarId = $_POST["activarId"];
	$activarProducto -> ajaxActivarProducto();

}

/*=============================================
TRAER PRODUCTO
=============================================*/
if(isset($_POST["idProducto"])){

	$traerProducto = new AjaxProductos();
	$traerProducto -> idProducto = $_POST["idProducto"];
	$traerProducto -> ajaxTraerProducto();

}


