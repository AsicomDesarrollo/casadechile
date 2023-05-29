<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class TablaProductos{

  /*=============================================
  MOSTRAR LA TABLA DE PRODUCTOS
  =============================================*/ 

  public function mostrarTablaProductos(){	

  	$productos = ControladorProductos::ctrMostrarProductos();

  	$datosJson = '

      { 
        "data":[';

	 	for($i = 0; $i < count($productos); $i++){

      $acciones = "<span class='btn btn-warning' style='cursor: pointer;' onclick='Seleccionar(this)' idProducto='".$productos[$i]["id"]." 'nombreProducto='".$productos[$i]["nombre"]." 'precioProducto='".$productos[$i]["precio"]."'precioMin='".$productos[$i]["minimo"]."'precioMax='".$productos[$i]["maximo"]."'categoriaProducto='".$productos[$i]["categoria"]."'fechaProducto='".$productos[$i]["fecha"]."'><i class='fa fa-pencil'></i> Editar</span>";


      $categoria = ControladorCategorias::ctrMostrarCategoriaPorId($productos[$i]["categoria"]);

      if( $categoria == null OR $categoria == false ){

        $categoria_producto = 'Sin datos';
       
      }else{
        $categoria_producto =   $categoria['nombre'] ;
      }
      



      $datosFecha = explode(" ", $productos[$i]["fecha"]);

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


  		/*=============================================
  		CONSTRUIR LOS DATOS JSON
			=============================================*/
  

			$datosJson .='[
					
					"'.($i+1).'",
          "'.$productos[$i]["nombre"].'",
					"$ '.$productos[$i]["precio"].'",
          "$ '.$productos[$i]["minimo"].'",
          " '.$categoria_producto.' ",
          "'.$fechaOrdenada[2].' '.$fechaOrdenada[1].' '.$fechaOrdenada[0].'<br>'.$datosFecha[1].'",
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
$activarProductos = new TablaProductos();
$activarProductos -> mostrarTablaProductos();