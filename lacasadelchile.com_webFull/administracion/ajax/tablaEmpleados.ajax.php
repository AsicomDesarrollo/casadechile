<?php

require_once "../controladores/empleados.controlador.php";
require_once "../modelos/empleados.modelo.php";

class TablaEmpleados{

  /*=============================================
  MOSTRAR LA TABLA DE PRODUCTOS
  =============================================*/ 

  public function mostrarTablaEmpleados(){	

  	$empleados = ControladorEmpleados::ctrMostrarEmpleados();

  	$datosJson = '

      { 
        "data":[';

	 	for($i = 0; $i < count($empleados); $i++){

      $acciones = "<span class='btn btn-warning' style='cursor: pointer;' onclick='Seleccionar(this)' id='".$empleados[$i]["id"]." 'nombre='".$empleados[$i]["nombre"]." 'sueldo='".$empleados[$i]["sueldo"]."'aniversario='".$empleados[$i]["aniversario"]."'estatus='".$empleados[$i]["estatus"]."' fecha='".$empleados[$i]["fecha"]."'><i class='fa fa-pencil'></i> Editar</span>";

  		/*=============================================
  		CONSTRUIR LOS DATOS JSON
			=============================================*/

      $estatus;

      if ($empleados[$i]["estatus"] == '1'){

        $estatus ="<span class='btn btn-success' style='padding-top: 0px; padding-bottom: 0px; border-radius:15px;cursor: default;'>Activo</span>";

      }else{

        $estatus = "<span class='btn btn-danger' style='padding-top: 0px; padding-bottom: 0px; border-radius:15px; cursor: default;'>Inactivo</span>";

      }

      $datosFecha = explode(" ", $empleados[$i]["fecha"]);

      $fechaOrdenada = explode("-", $datosFecha[0]);

			$datosJson .='[
					
					"'.$empleados[$i]["id"].'",
          "'.$empleados[$i]["nombre"].'",
					"$ '.number_format($empleados[$i]["sueldo"]).'",
          "'.$empleados[$i]["aniversario"].'",
          "'.$estatus.'",
          "'.$fechaOrdenada[2].'/'.$fechaOrdenada[1].'/'.$fechaOrdenada[0].'",
          "'.$acciones.'"

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
$activar = new TablaEmpleados();
$activar -> mostrarTablaEmpleados();