<?php

class ControladorProveedores{


/*=============================================
MOSTRAR ENTRADAS
=============================================*/

	static public function ctrMostrarProveedores(){

		$tabla = "proveedores";

		$respuesta = ModeloProveedores::mdlMostrarProveedores($tabla);

		return $respuesta;
	
	}


/*=============================================
MOSTRAR ENTRADAS ESPECIFICAS
=============================================*/

	static public function ctrMostrarProveedor($id){

		$tabla = "proveedores";

		$respuesta = ModeloProveedores::mdlMostrarProveedor($tabla,$id);

		return $respuesta;
	
	}


/*=============================================
	ACTUALIZAR ENTRADAS
=============================================*/

static public function ctrActualizarProveedor($provId,$nombreProv,$pagado,$credito){

		$tabla = "proveedores";

		$respuesta = ModeloProveedores::mdlActualizarProveedor($tabla,$provId,$nombreProv,$pagado,$credito);

		return $respuesta;

	}

/*=============================================
	INSERTAR ENTRADAS
=============================================*/

static public function ctrInsertarProveedor($provNombreNuevo,$pagadoNuevo,$creditoNuevo){

		$tabla = "proveedores";

		$respuesta = ModeloProveedores::mdlInsertarProveedor($tabla, $provNombreNuevo,$pagadoNuevo,$creditoNuevo);

		return $respuesta;

	}

}