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

      $datosFecha = explode(" ", $productos[$i]["fecha"]);

      $fechaOrdenada = explode("-", $datosFecha[0]);

  		/*=============================================
  		CONSTRUIR LOS DATOS JSON
			=============================================*/
  

			$datosJson .='[
					
					"'.($i+1).'",
          "'.$productos[$i]["nombre"].'",
					"$ '.number_format($productos[$i]["precio"]).'",
          "$ '.number_format($productos[$i]["minimo"]).'",
          "'.$categoria['nombre'].'",
          "'.$fechaOrdenada[2].'/'.$fechaOrdenada[1].'/'.$fechaOrdenada[0].' '.$datosFecha[1].'",
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