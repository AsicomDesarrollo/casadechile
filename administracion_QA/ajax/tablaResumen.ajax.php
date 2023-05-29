<?php

require_once "../controladores/presupuesto.controlador.php";
require_once "../modelos/presupuesto.modelo.php";

class TablaPresupuesto {


  /*=============================================
  MOSTRAR LA TABLA DE CATEGORIAS
  =============================================*/

  public function mostrarTabla(){	

	$presupuesto = ControladorPresupuesto::ctrMostrarPresupuesto();

  	$datosJson = '{
		 
	 "data": [ ';

	 $j = 1;

	 $totalPresupuesto = 0;

	 $totalGastos = 0;

	for($i = 0; $i < count($presupuesto); $i++){

		$totalPresupuesto += $presupuesto[$i]["presupuesto"];

		$acciones = "<span class='btn btn-warning' id='".$presupuesto[$i]["id"]."' style='cursor: pointer;' onclick='Seleccionar(this)' concepto='".$presupuesto[$i]["concepto"]."' presupuesto='".$presupuesto[$i]["presupuesto"]."'><i class='fa fa-pencil'></i> Editar</span>";

		$monto = ControladorPresupuesto::ctrMostrarPorId($presupuesto[$i]["id"]);

		$totalGastos += $monto["monto"];

		$datosJson	 .= '[
			      		"'.$presupuesto[$i]["id"].'",
			      		"'.$presupuesto[$i]["concepto"].'",
			      		"$ '.number_format($presupuesto[$i]["presupuesto"]).'",
			      		"$ '.number_format($monto["monto"]).'"
			      		],';

		$j++;

	} 

	$datosJson	 .= '[
			      		"'.$j.'",
			      		"Totales",
			      		"$ '.number_format($totalPresupuesto).'",
			      		"$ '.number_format($totalGastos).'"
			      		],';

	$datosJson	 .= '[
			      		"'.($j+1).'",
			      		"Diferencia",
			      		"",
			      		"$ '.number_format($totalPresupuesto - $totalGastos).'"
			      		]';


	$datosJson.=  ']
		  
	}'; 
  	
  	echo $datosJson;	
  }	

}

/*=============================================
ACTIVAR TABLA CATEGORIAS
=============================================*/ 
$activar = new TablaPresupuesto();
$activar -> mostrarTabla(); 



