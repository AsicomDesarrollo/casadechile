<?php


require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";


class AjaxFiltrarCategorias{

	public $categoria;

	public function traerCategorias(){

 		$categoria = $this->categoria;

		//$categoria = 1;

	    $catego = ControladorProductos::ctrTraerProductosPorCategoria($categoria);

		echo json_encode($catego);

	}

}

//if(isset($_POST["accion"]) && $_POST["accion"] == "filtrar"){

	$filtrarCat = new AjaxFiltrarCategorias();
	$filtrarCat -> categoria = $_POST["categoria"];
	$filtrarCat -> traerCategorias();

//}