<?php

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

class TablaUsuarios{

 	/*=============================================
  	MOSTRAR LA TABLA DE USUARIOS
  	=============================================*/ 

	public function mostrarTabla(){	

		$usuarios = ControladorUsuarios::ctrMostrarUsuarios();

 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($usuarios); $i++){

	 		$seleccionar = "<span class='btn btn-warning' idUsuario='".$usuarios[$i]["id"]."' style='cursor: pointer;' onclick='Seleccionar(this)' nombre='".$usuarios[$i]["nombre"]."' paterno='".$usuarios[$i]["paterno"]."' materno='".$usuarios[$i]["materno"]."' empresa='".$usuarios[$i]["empresa"]."' telefono='".$usuarios[$i]["telefono"]."' email='".$usuarios[$i]["email"]."'>Seleccionar</span>";

	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      "'.$usuarios[$i]["nombre"].'",
				      "'.$usuarios[$i]["paterno"].'",
				      "'.$usuarios[$i]["materno"].'",
				      "'.$usuarios[$i]["email"].'",
				      "'.$usuarios[$i]["empresa"].'",
				      "'.$usuarios[$i]["fecha"].'",
				      "'.$seleccionar.'"
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



