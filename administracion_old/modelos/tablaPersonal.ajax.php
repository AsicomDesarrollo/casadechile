<?php

require_once "../controladores/administradores.controlador.php";
require_once "../modelos/administradores.modelo.php";

class TablaUsuarios{

 	/*=============================================
  	MOSTRAR LA TABLA DE USUARIOS
  	=============================================*/ 

	public function mostrarTabla(){	

		$usuarios = ControladorAdministradores::ctrMostrarPersonalSucursal();

 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($usuarios); $i++){

	 		$producido = "0";

	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      "'.$usuarios[$i]["id"].'",
				      "'.$usuarios[$i]["nombre"].'",
				      "'.$usuarios[$i]["paterno"].'",
				      "'.$usuarios[$i]["materno"].'",
				      "'.$usuarios[$i]["sucursal"].'",
				      "'.$producido.'",
				      "'.$usuarios[$i]["email"].'",
				      "'.$usuarios[$i]["telefono"].'",
				      "'.$usuarios[$i]["fecha"].'"  
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