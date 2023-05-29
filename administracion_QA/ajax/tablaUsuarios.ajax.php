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

	 		$acciones = "<span class='btn btn-warning' idPersonal='".$usuarios[$i]["id"]."' style='cursor: pointer;' onclick='Seleccionar(this)' nombrePersonal='".$usuarios[$i]["nombre"]."' paternoPersonal='".$usuarios[$i]["paterno"]."' maternoPersonal='".$usuarios[$i]["materno"]."' emailPersonal='".$usuarios[$i]["email"]."' pwdPersonal='".$usuarios[$i]["password"]."' fecha='".$usuarios[$i]["fecha"]."'><i class='fa fa-pencil'></i> Editar</span>";

	 		$datosFecha = explode(" ", $usuarios[$i]["fecha"]);

			$fechaOrdenada = explode("-", $datosFecha[0]);
			
	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      "'.$usuarios[$i]["id"].'",
				      "'.$usuarios[$i]["nombre"].'",
				      "'.$usuarios[$i]["paterno"].'",
				      "'.$usuarios[$i]["materno"].'",
				      "'.$usuarios[$i]["email"].'",
				      "'.$usuarios[$i]["password"].'",
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



