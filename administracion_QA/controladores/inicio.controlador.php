<?php


class ControladorInicio{


/*=============================================
MOSTRAR COMPRAS DE UN DIA ESPECIFICO
=============================================*/

	static public function ctrMostrarCompras(){

		$tabla = "compras";

		$respuesta = ModeloInicio::mdlMostrarCompras($tabla);

		return $respuesta;
	
	}

/*=============================================
MOSTRAR COMPRAS DE UN DIA ESPECIFICO EN EFECTIVO
=============================================*/

	static public function ctrMostrarComprasEfectivo(){

		$tabla = "compras";

		$respuesta = ModeloInicio::mdlMostrarComprasEfectivo($tabla);

		return $respuesta;
	
	}

/*=============================================
CANCELAR VENTA
=============================================*/

	static public function ctrCancelarVenta($idVenta){

		$tabla = "compras";

		$respuesta = ModeloInicio::mdlCancelarVenta($tabla, $idVenta);

		return $respuesta;
	
	}

/*=============================================
CANCELAR ENTRADA
=============================================*/

	static public function ctrCancelarEntrada($idEntrada){

		$tabla = "entradas";

		$respuesta = ModeloInicio::mdlCancelarEntrada($tabla, $idEntrada);

		return $respuesta;
	
	}

/*=============================================
PAGAR PRESTAMO
=============================================*/

	static public function ctrPagarPrestamo($prestamoConcepto, $prestamoMonto){

		$tabla = "compras";

		$respuesta = ModeloInicio::mdlPagarPrestamo($tabla, $prestamoConcepto, $prestamoMonto);

		return $respuesta;
	
	}

/*=============================================
MOSTRAR ABONOS DE UN DIA ESPECIFICO EN EFECTIVO
=============================================*/

	static public function ctrMostrarAbonosEfectivo(){

		$tabla = "abono_clientes";

		$respuesta = ModeloInicio::mdlMostrarAbonosEfectivo($tabla);

		return $respuesta;
	
	}

/*=============================================
MOSTRAR COMPRAS DE UN DIA ESPECIFICO A CREDITO
=============================================*/

	static public function ctrMostrarComprasCredito(){

		$tabla = "compras";

		$respuesta = ModeloInicio::mdlMostrarComprasCredito($tabla);

		return $respuesta;
	
	}

/*=============================================
MOSTRAR COMPRAS DE UN DIA ESPECIFICO CON TARJETA
=============================================*/

	static public function ctrMostrarComprasTarjeta(){

		$tabla = "compras";

		$respuesta = ModeloInicio::mdlMostrarComprasTarjeta($tabla);

		return $respuesta;
	
	}

/*=============================================
MOSTRAR COMPRAS DE UN DIA ESPECIFICO CON TRANSFERENCIA
=============================================*/

	static public function ctrMostrarComprasTransferencia(){

		$tabla = "compras";

		$respuesta = ModeloInicio::mdlMostrarComprasTransferencia($tabla);

		return $respuesta;
	
	}

/*=============================================
MOSTRAR GASTO DE UN DIA ESPECIFICO EN EFECTIVO
=============================================*/

	static public function ctrMostrarGastosEfectivo(){

		$tabla = "gastos";

		$respuesta = ModeloInicio::mdlMostrarGastosEfectivo($tabla);

		return $respuesta;
	
	}

/*=============================================
MOSTRAR ENTRADAS EN EFECTIVO DE UN DIA ESPECIFICO
=============================================*/

	static public function ctrMostrarEntradasEfectivo(){

		$tabla = "entradas";

		$respuesta = ModeloInicio::mdlMostrarEntradasEfectivo($tabla);

		return $respuesta;
	
	}

/*=============================================
MOSTRAR ABONOS DE ENTRADAS EN EFECTIVO DE UN DIA ESPECIFICO
=============================================*/

	static public function ctrMostrarAbonosEntradasEfectivo(){

		$tabla = "abono_entradas";

		$respuesta = ModeloInicio::mdlMostrarAbonosEntradasEfectivo($tabla);

		return $respuesta;
	
	}

/*=============================================
DEFINIR OBJETIVO
=============================================*/

	static public function ctrDefinirConfig(){

		if(isset($_POST["inicioCaja"]) && $_POST["inicioCaja"] != ""){

			$tabla = "configuracion";

			$respuesta = ModeloInicio::mdlDefinirConfig($tabla, $_POST["objetivoVentas"], $_POST["inicioCaja"]);

			return $respuesta;

		}
	
	}


/*=============================================
TRAER OBJETIVO
=============================================*/

	static public function ctrTraerObjetivo(){

		$tabla = "configuracion";

		$respuesta = ModeloInicio::mdlTraerObjetivo($tabla);

		return $respuesta;
	
	}

/*=============================================
CUENTAS POR COBRA
=============================================*/

	static public function ctrCuentasPorCobrar(){

		$tabla = "compras";

		$respuesta = ModeloInicio::mdlCuentasPorCobrar($tabla);

		$total = 0;

		$abono = 0;

		$totalxcobrar = 0;

		$idAnterior = 0;

		$j = 0;

		foreach ($respuesta as $key => $value) {


			$total += ($value["peso"] * $value["precio"]);



			if($idAnterior != $value["id_venta"]){

	          if($idAnterior != 0){

	          	$abonosCliente = ModeloVentas::mdlMostrarAbonosCliente("abono_clientes",$value["id_venta"]);

				foreach ($abonosCliente as $key => $abonos) {
					
					$abono += $abonos["monto"];

				}
	            

	          }else{

	            $abonosCliente = ModeloVentas::mdlMostrarAbonosCliente("abono_clientes",$value["id_venta"]);

				foreach ($abonosCliente as $key => $abonos) {
					
					$abono += $abonos["monto"];

				}
	            
	          }

	        }else{

	         	if($j == count($respuesta) - 1){

	            	$abonosCliente = ModeloVentas::mdlMostrarAbonosCliente("abono_clientes",$value["id_venta"]);

					foreach ($abonosCliente as $key => $abonos) {
					
						$abono += $abonos["monto"];

					}

	        	}

	       }

	       $j++;

	        $idAnterior = $value["id_venta"];


		}

		$totalxcobrar = $total - $abono;

		return $totalxcobrar;
	
	}

/*=============================================
CUENTAS POR PAGAR
=============================================*/

	static public function ctrCuentasPorPagar(){

		$tabla = "entradas";

		$respuesta = ModeloInicio::mdlCuentasPorPagar($tabla);

		$total = 0;

		$abono = 0;

		$totalxpagar = 0;

		$idAnterior = 0;

		$j= 0;

		foreach ($respuesta as $key => $value) {
			
			$total += $value["peso"] * $value["precio"];

			if($idAnterior != $value["id"]){

	          if($idAnterior != 0){

	          	$abonosEntrada = ModeloEntradas::mdlTraerAbonoEntradas("abono_entradas",$value["id"]);

				foreach ($abonosEntrada as $key => $abonos) {
					
					$abono += $abonos["monto"];

				}
	            

	          }else{

	            $abonosEntrada = ModeloEntradas::mdlTraerAbonoEntradas("abono_entradas",$value["id"]);

				foreach ($abonosEntrada as $key => $abonos) {
					
					$abono += $abonos["monto"];

				}
	            
	          }

	        }else{

	         	if($j == count($respuesta) - 1){

	            	$abonosEntrada = ModeloEntradas::mdlTraerAbonoEntradas("abono_entradas",$value["id"]);

					foreach ($abonosEntrada as $key => $abonos) {
					
						$abono += $abonos["monto"];

					}

	        	}

	       }


	       $j++;
	        $idAnterior = $value["id"];


		}

		$totalxpagar = $total - $abono;

		return $totalxpagar;
	
	}

}
