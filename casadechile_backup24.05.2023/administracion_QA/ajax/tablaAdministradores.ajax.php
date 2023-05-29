<?php

require_once "../controladores/administradores.controlador.php";
require_once "../modelos/administradores.modelo.php";

class TablaUsuarios{

 	/*=============================================
  	MOSTRAR LA TABLA DE USUARIOS
  	=============================================*/ 

	public function mostrarTabla(){	

		$administradores = ControladorAdministradores::ctrMostrarAdmin();

 		$datosJson = '

 		{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($administradores); $i++){

	 		$acciones = "<span class='btn btn-warning' idAdmin='".$administradores[$i]["id"]."' style='cursor: pointer;' onclick='Seleccionar(this)' nombreAdmin='".$administradores[$i]["nombre"]."' paternoAdmin='".$administradores[$i]["paterno"]."' maternoAdmin='".$administradores[$i]["materno"]."' emailAdmin='".$administradores[$i]["email"]."' pwdAdmin='".$administradores[$i]["password"]."' fecha='".$administradores[$i]["fecha"]."'><i class='fa fa-pencil'></i> Editar</span>";

	 		$datosFecha = explode(" ", $administradores[$i]["fecha"]);

			$fechaOrdenada = explode("-", $datosFecha[0]);
			
	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      "'.$administradores[$i]["id"].'",
				      "'.$administradores[$i]["nombre"].'",
				      "'.$administradores[$i]["paterno"].'",
				      "'.$administradores[$i]["materno"].'",
				      "'.$administradores[$i]["email"].'",
				      "'.$administradores[$i]["password"].'",				      
				      "'.$fechaOrdenada[2].'/'.$fechaOrdenada[1].'/'.$fechaOrdenada[0].'",  
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
$activar = new TablaUsuarios();
$activar -> mostrarTabla();