<?php

require_once "../controladores/empleados.controlador.php";
require_once "../modelos/empleados.modelo.php";

// accion de ver empleado
if(isset($_REQUEST['action']))
if($_REQUEST['action']=='ver_empleado'){
    $query = Conexion::conectar()->prepare("SELECT e.* FROM empleados e where id = ".$_REQUEST['id'] ." ORDER BY e.id ASC");
		$query -> execute();
		print json_encode($query -> fetchAll(PDO::FETCH_ASSOC));
		//$query -> close();
		//$query = null;
    exit();
}

if(isset($_REQUEST['emp']))
if($_REQUEST['emp']=='inactivos'){
    $query = Conexion::conectar()->prepare("SELECT e.* FROM empleados e where estatus= '0' ORDER BY e.id ASC");
		$query -> execute();
		$empleados =  $query -> fetchAll(PDO::FETCH_ASSOC);
		
    $datosJson = '

      { 
        "data":[';

	 	for($i = 0; $i < count($empleados); $i++){

      $acciones = "<span class='btn btn-warning' style='cursor: pointer;' onclick='editar_empleado(this)' id_empleado='".$empleados[$i]["id"]." '><i class='fas fa-pen-nib'></i></span>";
      $acciones .= "<span class='btn btn-primary' style='cursor: pointer;' onclick='changePassword(this)' id_password='".$empleados[$i]["id"]." '><i class='fas fa-key'></i></span>";

  		/*=============================================
  		CONSTRUIR LOS DATOS JSON
			=============================================*/

      //? boton de empleado activo o inactivo.
      $estatus= "";
      if ($empleados[$i]["estatus"] == '1'){
        $estatus = "<span estatusdb='ACTIVO' iddb='".$empleados[$i]["id"]."' class='estatusEmp btn btn-success' style='padding-top: 0px; padding-bottom: 0px; border-radius:15px;cursor: default;'  >Activo </span>";

      }else{
        $estatus = "<span estatusdb='INACTIVO' iddb='".$empleados[$i]["id"]."' class='estatusEmp btn btn-danger' style='padding-top: 0px; padding-bottom: 0px; border-radius:15px; cursor: default;'>Inactivo?/span>";
      }

      $actions = '<button type="button" />hola </button>';

      $datosFecha = explode(" ", $empleados[$i]["fecha_ingreso"]);

      $fechaOrdenada = explode("-", $datosFecha[0]);

      //"'.$fechaOrdenada[2].'/'.$fechaOrdenada[1].'/'.$fechaOrdenada[0].'",
			$datosJson .='[
					
        "'.$empleados[$i]["id"].'",
        "'.$acciones.'",
        "'.$empleados[$i]["nombre"]." ".$empleados[$i]["paterno"]." ".$empleados[$i]["materno"].'",
        "$ ****.**",
        "'.$empleados[$i]["fecha_ingreso"].'",
        "'.$estatus.'",
        "'.$empleados[$i]["nacimiento"].'",
        "'.$empleados[$i]['email'].'"

			],';

		}

		$datosJson = substr($datosJson, 0, -1);

		$datosJson .= ']

		}';

		echo $datosJson;
    exit();
}

class TablaEmpleados{

  /*=============================================
  MOSTRAR LA TABLA DE EMPLEADOS
  =============================================*/ 

  public function mostrarTablaEmpleados(){	

  	$empleados = ControladorEmpleados::ctrMostrarEmpleados();

  	$datosJson = '

      { 
        "data":[';

	 	for($i = 0; $i < count($empleados); $i++){

      $acciones = "<span class='btn btn-warning' style='cursor: pointer;' onclick='editar_empleado(this)' id_empleado='".$empleados[$i]["id"]."'><i class='fas fa-pen-nib'></i></span>";
      $acciones .= "<span class='btn btn-primary'  style='cursor: pointer;' onclick='changePassword(this)'  id_email='".$empleados[$i]["email"]."' id_ident='".$empleados[$i]["id"]."'   ><i class='fas fa-key'></i></span>";

  		/*=============================================
  		CONSTRUIR LOS DATOS JSON
			=============================================*/

      
      //? boton de empleado activo o inactivo.
      $estatus= "";
      if ($empleados[$i]["estatus"] == '1'){
        $estatus = "<span estatusdb='ACTIVO' iddb='".$empleados[$i]["id"]."' class='estatusEmp btn btn-success' style='padding-top: 0px; padding-bottom: 0px; border-radius:15px;cursor: default;'  >Activo </span>";

      }else{
        $estatus = "<span estatusdb='INACTIVO' iddb='".$empleados[$i]["id"]."' class='estatusEmp btn btn-danger' style='padding-top: 0px; padding-bottom: 0px; border-radius:15px; cursor: default;'>Inactivo?/span>";
      }

      $actions = '<button type="button" />hola </button>';

      $datosFecha = explode(" ", $empleados[$i]["fecha_ingreso"]);
      $fechaOrdenada = explode("-", $datosFecha[0]);


      $datosFechaNacimiento = explode(" ", $empleados[$i]["nacimiento"]);
      $fechaOrdenadaNacimiento = explode("-", $datosFechaNacimiento[0]);

      switch ($fechaOrdenadaNacimiento[1]) {
        case '01':
          $fechaOrdenadaNacimiento[1] =  'enero';
          break;
        case '02':
          $fechaOrdenadaNacimiento[1] =  'febrero';
          break;
        case '03':
          $fechaOrdenadaNacimiento[1] =  'marzo';
          break;
        case '04':
          $fechaOrdenadaNacimiento[1] =  'abril';
          break;
        case '05':
          $fechaOrdenadaNacimiento[1] =  'mayo';
          break;
        case '06':
          $fechaOrdenadaNacimiento[1] =  'junio';
          break;
        case '07':
          $fechaOrdenadaNacimiento[1] =  'julio';
          break;
        case '08':
          $fechaOrdenadaNacimiento[1] =  'agosto';
          break;
        case '09':
          $fechaOrdenadaNacimiento[1] =  'septiembre';
          break;
        case '10':
          $fechaOrdenadaNacimiento[1] =  'octubre';
          break;
        case '11':
          $fechaOrdenadaNacimiento[1] =  'noviembre';
          break;
        case '12':
          $fechaOrdenadaNacimiento[1] =  'diciembre';
          break;
        
        default:
          # code...
          break;
      }

      switch ($fechaOrdenada[1]) {
        case '01':
          $fechaOrdenada[1] =  'enero';
          break;
        case '02':
          $fechaOrdenada[1] =  'febrero';
          break;
        case '03':
          $fechaOrdenada[1] =  'marzo';
          break;
        case '04':
          $fechaOrdenada[1] =  'abril';
          break;
        case '05':
          $fechaOrdenada[1] =  'mayo';
          break;
        case '06':
          $fechaOrdenada[1] =  'junio';
          break;
        case '07':
          $fechaOrdenada[1] =  'julio';
          break;
        case '08':
          $fechaOrdenada[1] =  'agosto';
          break;
        case '09':
          $fechaOrdenada[1] =  'septiembre';
          break;
        case '10':
          $fechaOrdenada[1] =  'octubre';
          break;
        case '11':
          $fechaOrdenada[1] =  'noviembre';
          break;
        case '12':
          $fechaOrdenada[1] =  'diciembre';
          break;
        
        default:
          # code...
          break;
      }

      //"'.$fechaOrdenada[2].'/'.$fechaOrdenada[1].'/'.$fechaOrdenada[0].'",
			$datosJson .='[
					
        "'.$empleados[$i]["id"].'",
        "'.$empleados[$i]["nombre"]." ".$empleados[$i]["paterno"]." ".$empleados[$i]["materno"]." <br> <span class='text-primary'>".$empleados[$i]['email']." </span> ".'",
        "$ ****.**",
        "'.$fechaOrdenada[2].' '.$fechaOrdenada[1].' '.$fechaOrdenada[0].'",
        "'.$estatus.'",
        "'.$fechaOrdenadaNacimiento[2].' '.$fechaOrdenadaNacimiento[1].' '.$fechaOrdenadaNacimiento[0].'",
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
ACTIVAR TABLA DE EMPLEADOS
=============================================*/ 
$activar = new TablaEmpleados();
$activar -> mostrarTablaEmpleados();