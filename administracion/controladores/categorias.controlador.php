<?php 

class ControladorCategorias {


/*=============================================
	MOSTRAR TOTAL CATEGORIAS
=============================================*/

static public function ctrMostrarCategorias(){

		$tabla = "categorias";

		$respuesta = ModeloCategorias::mdlMostrarCategorias($tabla);

		return $respuesta;

	}


/*=============================================
	ACTUALIZAR CATEGORIAS
=============================================*/

static public function ctrActualizarCategorias($id,$nombre,$estatus){

		$tabla = "categorias";

		$respuesta = ModeloCategorias::mdlActualizarCategorias($tabla,$id, $nombre, $estatus);

		return $respuesta;

	}

/*=============================================
	INSERTAR CATEGORIAS
=============================================*/

static public function ctrInsertarCategorias($nombre,$estatus){

		$tabla = "categorias";

		$respuesta = ModeloCategorias::mdlInsertarCategorias($tabla, $nombre, $estatus);

		return $respuesta;

	}

/*=============================================
	MOSTRAR TOTAL CATEGORIAS
=============================================*/

static public function ctrMostrarCategoriaPorId($id){

		$tabla = "categorias";

		$respuesta = ModeloCategorias::mdlMostrarCategoriaPorId($tabla,$id);

		return $respuesta;

	}


}