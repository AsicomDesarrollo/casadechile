<?php

require_once "../controladores/gastos.controlador.php";
require_once "../modelos/gastos.modelo.php";

class TablaGastos{

 	/*=============================================
  	MOSTRAR LA TABLA DE USUARIOS
  	=============================================*/ 

	public function mostrarTabla(){	

		$gastos = ControladorGastos::ctrMostrarGastos();

 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($gastos); $i++){

	 	 $acciones = "<span class='btn btn-warning' style='cursor: pointer;' onclick='Seleccionar(this)' idGasto='".$gastos[$i]["id"]." 'descGasto='".$gastos[$i]["descripcion"]." 'montoGasto='".$gastos[$i]["monto"]."'fecha='".$gastos[$i]["fecha"]."'><i class='fa fa-pencil'></i> Editar</span>";

	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$gastos[$i]["descripcion"].'",
				      "'.$gastos[$i]["monto"].'",
				      "'.$gastos[$i]["fecha"].'",
				      "'.$acciones.'"  
				    ],';

	 	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	}

}

/*=============================================
ACTIVAR TABLA DE VENTAS
=============================================*/ 
$activar = new TablaGastos();
$activar -> mostrarTabla();