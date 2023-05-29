<?php

require_once "../controladores/productos.controlador.php";

require_once "../modelos/productos.modelo.php";

class AjaxModificaProducto {

	public $productoId;
	public $productoNombre;
	public $productoPrecio;
	public $productoPrecioMin;
	public $productoPrecioMax;
	public $productoCategoria;


	public function modificarProducto(){

 		$productoId = $this->productoId;
 		$productoNombre = $this->productoNombre;
		$productoPrecio = $this->productoPrecio;
	    $productoPrecioMin = $this->productoPrecioMin;
	    $productoPrecioMax = $this->productoPrecioMax;
	    $productoCategoria = $this->productoCategoria;

	    $modProd = ControladorProductos::ctrActualizarProd($productoId,$productoNombre,$productoPrecio,$productoPrecioMin,$productoPrecioMax, $productoCategoria);

	    if($modProd == "ok"){

			echo "ok";
		}
		else {

			echo "error";
		}

	}


	public $productoNuevoNombre;
	public $productoNuevoPrecio;
	public $productoNuevoPrecioMin;
	public $productoNuevoPrecioMax;
	public $productoNuevoCategoria;
	
	public function nuevoProducto(){

		$productoNuevoNombre = $this->productoNuevoNombre;
		$productoNuevoPrecio = $this->productoNuevoPrecio;
		$productoNuevoPrecioMin = $this->productoNuevoPrecioMin;
		$productoNuevoPrecioMax = $this->productoNuevoPrecioMax;
		$productoNuevoCategoria = $this->productoNuevoCategoria;

		$nuevoProd = ControladorProductos::ctrInsertarProd($productoNuevoNombre,$productoNuevoPrecio,$productoNuevoPrecioMin,$productoNuevoPrecioMax,$productoNuevoCategoria);

		if($nuevoProd == "ok"){

			echo "ok";
		}
		else {

			echo "error";
		}

	}

}


if(isset($_POST["accion"]) && $_POST["accion"] == "actualizar"){

	$actualizarProducto = new AjaxModificaProducto();
	$actualizarProducto -> productoId = $_POST["id"];
	$actualizarProducto -> productoNombre = $_POST["nombre"];
	$actualizarProducto -> productoPrecio = $_POST["precio"];
	$actualizarProducto -> productoPrecioMin = $_POST["preciomin"];
	$actualizarProducto -> productoPrecioMax = $_POST["preciomax"];
	$actualizarProducto -> productoCategoria = $_POST["categoria"];
	$actualizarProducto -> modificarProducto();

}

if(isset($_POST["accion"]) && $_POST["accion"] == "nuevo"){

	$nuevoProducto = new AjaxModificaProducto();
	$nuevoProducto -> productoNuevoNombre = $_POST["nombre"];
	$nuevoProducto -> productoNuevoPrecio = $_POST["precio"];
	$nuevoProducto -> productoNuevoPrecioMin = $_POST["preciomin"];
	$nuevoProducto -> productoNuevoPrecioMax = $_POST["preciomax"];
	$nuevoProducto -> productoNuevoCategoria = $_POST["categoria"];
	$nuevoProducto -> nuevoProducto();

}
