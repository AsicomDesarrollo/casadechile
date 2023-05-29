<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once "../controladores/ventas.controlador.php";

require_once "../modelos/ventas.modelo.php";

class AjaxNuevo{

	/*=============================================
	NUEVO USUARIO
	=============================================*/	

	public $json;
	public $cliente;

	public function ajaxNuevoPedido(){

		$json = $this->json;
		$cliente = $this->cliente;

		$ultimoId = ControladorVentas::ctrTraerUltimo();

		$jsonDecode = json_decode($json, true);

		for($i = 0; $i < count($jsonDecode) ; $i++){

			$id = $jsonDecode[$i]["id"];
			$peso = $jsonDecode[$i]["peso"];
			$precio = $jsonDecode[$i]["precio"];
			
			$guardar = ControladorVentas::ctrGuardarCompra($ultimoId["id_venta"], $cliente, $id, $peso, $precio);

		}
		
		echo $guardar;
		//echo $ultimoId["id_venta"];

	}

}

/*=============================================
NUEVO USUARIO
=============================================*/
$traerProducto = new AjaxNuevo();
$traerProducto -> json = $_POST["json"];
$traerProducto -> cliente = $_POST["cliente"];
$traerProducto -> ajaxNuevoPedido();



