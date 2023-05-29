<?php

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class TablaCategorias {


  /*=============================================
  MOSTRAR LA TABLA DE CATEGORIAS
  =============================================*/

  public function mostrarTabla(){	

	$categorias = ControladorCategorias::ctrMostrarCategorias();

  	$datosJson = '{
		 
	 "data": [ ';
	

	for($i = 0; $i < count($categorias); $i++){

		$acciones = "<span class='btn btn-warning' idCategoria='".$categorias[$i]["id"]."' style='cursor: pointer;' onclick='Seleccionar(this)' nombre='".$categorias[$i]["nombre"]."' estatus='".$categorias[$i]["estatus"]."' fecha='".$categorias[$i]["fecha"]."'><i class='fa fa-pencil'></i> Editar</span>";

//		$acciones = "<a href='detallesventa?id=".$ventas[$i]["id"]."&nombre=".$nombreUsuario."&empresa=".$usuario["empresa"]."&telefono=".$usuario["telefono"]."&correo=".$usuario["email"]."&dispositivo=".$ventas[$i]["tipo_equipo"]."&marca=".$ventas[$i]["marca"]."&modelo=".$ventas[$i]["modelo"]."&serie=".$ventas[$i]["serie"]."&sucursal=".$ventas[$i]["sucursal"]."&asignado=".$ventas[$i]["personal"]."&falla=".$ventas[$i]["falla"]."&observaciones=".$ventas[$i]["condiciones"]."&total=".$ventas[$i]["costo"]."&metodo=0&anticipo=".$ventas[$i]["anticipo"]."&recibe=".$ventas[$i]["recibe"]."'><div class='btn-group'><button class='btn btn-warning btnEditarCompra' idCompra='".$ventas[$i]["id"]."' data-toggle='modal' data-target='#modalEditarCompra'><i class='fa fa-eye'></i> Ver detalles</button></div></a>";


      $estatus='';

      if ($categorias[$i]["estatus"] == '1'){

        $estatus ="<span class='btn btn-success' style='padding-top: 0px; padding-bottom: 0px; border-radius:15px;cursor: default;'>Activo</span>";

      }else{

        $estatus = "<span class='btn btn-danger' style='padding-top: 0px; padding-bottom: 0px; border-radius:15px; cursor: default;'>Inactivo</span>";

      }

      	$datosFecha = explode(" ", $categorias[$i]["fecha"]);

		$fechaOrdenada = explode("-", $datosFecha[0]);

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

		$datosJson	 .= '[
			      		"'.$categorias[$i]["id"].'",
			      		"'.$categorias[$i]["nombre"].'",
			      		"'.$estatus.'",
			      		"'.$fechaOrdenada[2].' '.$fechaOrdenada[1].' '.$fechaOrdenada[0].'",
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
$activar = new TablaCategorias();
$activar -> mostrarTabla(); 



