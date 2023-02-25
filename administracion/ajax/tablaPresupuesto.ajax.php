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
	

	for($i = 0; $i < count($presupuesto); $i++){

		$acciones = "<span class='btn btn-warning' id='".$presupuesto[$i]["id"]."' style='cursor: pointer;' onclick='Seleccionar(this)' concepto='".$presupuesto[$i]["concepto"]."' presupuesto='".$presupuesto[$i]["presupuesto"]."'><i class='fa fa-pencil'></i> Editar</span>";

		$datosJson	 .= '[
			      		"'.$presupuesto[$i]["id"].'",
			      		"'.$presupuesto[$i]["concepto"].'",
			      		"$ '.number_format($presupuesto[$i]["presupuesto"]).'",
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
ACTIVAR TABLA CATEGORIAS
=============================================*/ 
$activar = new TablaPresupuesto();
$activar -> mostrarTabla(); 



