<?php

require_once "../controladores/administradores.controlador.php";
require_once "../modelos/administradores.modelo.php";

class TablaUsuarios{

 	/*=============================================
  	MOSTRAR LA TABLA DE USUARIOS
  	=============================================*/ 

	public function mostrarTabla(){	

		$usuarios = ControladorAdministradores::ctrMostrarSucursales();

 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($usuarios); $i++){

	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$producido = "0";
			
			$datosJson	 .= '[
				      "'.$usuarios[$i]["id"].'",
				      "'.$usuarios[$i]["nombre"].'",
				      "'.$producido.'",
				      "'.$usuarios[$i]["direccion"].'",
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