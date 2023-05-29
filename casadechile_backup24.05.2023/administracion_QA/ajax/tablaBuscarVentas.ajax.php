<?php

require_once "../controladores/ventas.controlador.php";
require_once "../modelos/ventas.modelo.php";

require_once "../controladores/entradas.controlador.php";
require_once "../modelos/entradas.modelo.php";

	/*=============================================
 	MOSTRAR LA TABLA DE VENTAS
 	=============================================*/

 	$fecha = $_GET["fecha"];

  	$ventas = ControladorVentas::ctrBuscarFecha("compras", $fecha);

  	$datosJson = '{
		 
	 "data": [ ';

	$venta = "";

	$total = 0;
	

	for($i = 0; $i < count($ventas); $i++){

		if($venta != $ventas[$i]["id_venta"]){


			$sumaAbonos = 0;
		    $adeuda = 0;

		    $abonos = ControladorEntradas::ctrTraerAbonoVenta($ventas[$i]["id_venta"]);

		    foreach ($abonos as $key => $value) {
        
		    	$sumaAbonos += $value["monto"];

		    }

		    
		    $detalles = ControladorVentas::ctrMostrarUnaVenta($ventas[$i]["id_venta"]);

			$informacion = '';

			foreach ($detalles as $key => $value) {
				$total = $total + ($value["peso"] * $value["precio"]);

				/*=============================================
				DEVOLVER DATOS JSON
				=============================================*/

				$nombreProducto = ControladorVentas::ctrMostrarProducto($value["producto"]);
				$informacion	 .= $nombreProducto["nombre"].';'.$value["peso"].';'.$value["precio"].'!';

			}

			$informacion = substr($informacion, 0, -1);


			$adeuda = $total - $sumaAbonos;

			$verDetalles = "<span class='btn btn-warning' idVenta='".$ventas[$i]["id_venta"]."' style='cursor: pointer;' onclick='Seleccionar(this)' cliente='".$ventas[$i]["cliente"]."' total='".$total."' estatus='".$ventas[$i]["estatus"]."' productos='".$informacion."'><i class='fa fa-eye'></i> Ver detalles</span>";

			$efectivo = "<span class='btn btn-success' idVenta='".$ventas[$i]["id_venta"]."' style='cursor: pointer;' onclick='Efectivo(this)' cliente='".$ventas[$i]["cliente"]."' total='".$total."'><i class='fa fa-money'></i> P.Efectivo</span>";

			$transferencia = "<span class='btn btn-primary' idVenta='".$ventas[$i]["id_venta"]."' style='cursor: pointer;' onclick='Transferencia(this)' cliente='".$ventas[$i]["cliente"]."' total='".$total."'><i class='fa fa-bank'></i> P.Transferencia</span>";

			$tarjeta = "<span class='btn btn-default' idVenta='".$ventas[$i]["id_venta"]."' style='cursor: pointer;' onclick='Tarjeta(this)' cliente='".$ventas[$i]["cliente"]."' total='".$total."'><i class='fa fa-credit-card'></i> P. Tarjeta</span>";

			$credito = "<span class='btn btn-danger' idVenta='".$ventas[$i]["id_venta"]."' style='cursor: pointer;' onclick='Credito(this)' cliente='".$ventas[$i]["cliente"]."' total='".$total."'><i class='fa fa-handshake-o'></i> Credito</span>";

			$abonar = "<span class='btn btn-success' style='cursor: pointer;' onclick='Abonos(this)' idAbono='".$ventas[$i]["id_venta"]."' total='".$total."' abonado='".$sumaAbonos."' adeuda='".$adeuda."'><i class='fa fa-money'></i> Abonar</span>";

			switch ($ventas[$i]["estatus"]) {
				case 'Pagado en efectivo':
					$adeuda = 0;
					break;

				case 'Pagado con tarjeta':
					$adeuda = 0;
					break;
				
				default:
					# code...
					break;
			}

			$datosFecha = explode(" ", $ventas[$i]["fecha"]);

			$fechaOrdenada = explode("-", $datosFecha[0]);

			/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/
			$datosJson	 .= '[
				      		"'.$ventas[$i]["id_venta"].'",
				      		"'.$ventas[$i]["cliente"].'",
				      		"$ '.number_format($total).'",
				      		"$ '.number_format($adeuda).'",
				      		"'.$ventas[$i]["estatus"].'",
				      		"'.$datosFecha[1].'",
				      		"'.$fechaOrdenada[2].'/'.$fechaOrdenada[1].'/'.$fechaOrdenada[0].'",';

			switch ($ventas[$i]["estatus"]) {
				case 'Pendiente':
					$datosJson	 .= '
				      		"'.$verDetalles." ".$efectivo." ".$tarjeta." ".$credito.'"
				      		],';
					break;

				case 'Pagado en efectivo':
					$datosJson	 .= '
				      		"'.$verDetalles.'"
				      		],';
					break;

				case 'Pagado por transferencia':
					$datosJson	 .= '
				      		"'.$verDetalles.'"
				      		],';
					break;

				case 'Pagado con tarjeta':
					$datosJson	 .= '
				      		"'.$verDetalles.'"
				      		],';
					break;

				case 'Credito':

					if($adeuda == 0){

						$datosJson	 .= '
				      		"'.$verDetalles.'"
				      		],';

					}else{

						$datosJson	 .= '
				      		"'.$verDetalles." ".$abonar.'"
				      		],';

					}
					
					break;
				
				default:
					$datosJson	 .= '
				      		"'.$verDetalles." ".$efectivo." ".$transferencia." ".$tarjeta." ".$credito.'"
				      		],';
					break;
			}


		}

		$venta = $ventas[$i]["id_venta"];
		$total = 0;

	} 

	$datosJson = substr($datosJson, 0, -1);

	$datosJson.=  ']
		  
	}'; 
  	
  	echo $datosJson;	
