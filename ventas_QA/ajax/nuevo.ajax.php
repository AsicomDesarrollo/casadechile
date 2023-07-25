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
	public $metodoPago;

	public function ajaxNuevoPedido(){

		$json = $this->json;
		$cliente = $this->cliente;
		$metodoPago = $this->metodoPago;

/* 
		echo "metodo de pago ";
		var_dump($this->metodoPago) ;  */

		$ultimoId = ControladorVentas::ctrTraerUltimo();

		$arrayobj = new ArrayObject();

		for( $a= 0; $a < count($json) ; $a++){
			//$jsonDecode =  json_decode($json[$a], true);
			$arrayobj->append(json_decode($json[$a], true));
		}


		//var_dump($arrayobj);
		$arrayobj = json_encode($arrayobj);
		$arrayobj = json_decode($arrayobj, true);

		for($i = 0; $i < count($arrayobj) ; $i++){

			$idProducto = $arrayobj[$i]["id"];
			$peso = $arrayobj[$i]["peso"];
			$precio = $arrayobj[$i]["precio"];
			$id_venta = $arrayobj[$i]["id_venta"];
	

			//var_dump($idProducto . " " . $peso);



			
			$guardar = ControladorVentas::ctrGuardarCompra($id_venta, $cliente, $idProducto, $peso, $precio , $metodoPago   );
			#var_dump($guardar);
		}
		
		//echo $guardar;
		//echo $ultimoId["id_venta"];

		return $guardar;

	}

}

/*=============================================
NUEVO USUARIO
=============================================*/
$traerProducto = new AjaxNuevo();
$traerProducto -> json = $_POST["json"];
$traerProducto -> cliente = $_POST["cliente"];
$traerProducto -> metodoPago = $_POST["metodoPago"];
$traerProducto -> ajaxNuevoPedido();



