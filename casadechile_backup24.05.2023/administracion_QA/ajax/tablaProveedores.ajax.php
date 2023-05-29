<?php

require_once "../controladores/proveedores.controlador.php";
require_once "../modelos/proveedores.modelo.php";

require_once "../controladores/entradas.controlador.php";
require_once "../modelos/entradas.modelo.php";

class TablaProveedores{

  /*=============================================
  MOSTRAR LA TABLA DE PRODUCTOS
  =============================================*/ 

  public function mostrarTablaProveedores(){	

  	$proveedores = ControladorProveedores::ctrMostrarProveedores();

  	$datosJson = '

      { 
        "data":[';

	 	for($i = 0; $i < count($proveedores); $i++){

      $acciones = "<span class='btn btn-warning' style='cursor: pointer;' onclick='Seleccionar(this)' idProveedor='".$proveedores[$i]["id"]."' nombreProveedor='".$proveedores[$i]["nombre"]."' pagado='".$proveedores[$i]["pagado"]."' fecha='".$proveedores[$i]["fecha"]."'><i class='fa fa-pencil'></i> Editar</span>";

      $detalles = "<span class='btn btn-primary' style='cursor: pointer;' onclick='Detalles(this)' idProveedor='".$proveedores[$i]["id"]."' nombreProveedor='".$proveedores[$i]["nombre"]."'><i class='fa fa-eye'></i> Ver detalles</span>";



      $respuesta = ControladorEntradas::ctrMostrarDeudasProveedor($proveedores[$i]["id"]);

      $sumaRestante = 0;

      foreach ($respuesta as $key => $value) {

        $producto = ControladorEntradas::ctrMostrarEntradaEspecifica($value["producto"]);

        $abonos = ControladorEntradas::ctrTraerAbonoEntradas($value["id"]);

        $sumaAbonos = 0;

        foreach ($abonos as $key2 => $abonado) {

          $sumaAbonos += $abonado["monto"];

        }

        $total = $value["peso"] * $value["precio"];

        $restante = $total - $sumaAbonos;

        $sumaRestante += $restante;

      }

  		/*=============================================
  		CONSTRUIR LOS DATOS JSON
			=============================================*/

      $datosFecha = explode(" ", $proveedores[$i]["fecha"]);

      $fechaOrdenada = explode("-", $datosFecha[0]);
      
			$datosJson .='[
					
					"'.($i+1).'",
          "'.$proveedores[$i]["nombre"].'",
					"$ '.number_format($sumaRestante).'",
          "'.$fechaOrdenada[2].'/'.$fechaOrdenada[1].'/'.$fechaOrdenada[0].'",
          "'.$acciones.' '.$detalles.'"

			],';

		}

		$datosJson = substr($datosJson, 0, -1);

		$datosJson .= ']

		}';

		echo $datosJson;

  }

}

/*=============================================
ACTIVAR TABLA DE PRODUCTOS
=============================================*/ 
$activarProveedor = new TablaProveedores();
$activarProveedor -> mostrarTablaProveedores();