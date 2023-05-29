<?php

class ControladorClientes{


/*=============================================
MOSTRAR ENTRADAS
=============================================*/

	static public function ctrMostrarClientes(){

		$tabla = "clientes";

		$respuesta = ModeloClientes::mdlMostrarClientes($tabla);

		return $respuesta;
	
	}


/*=============================================
MOSTRAR ENTRADAS ESPECIFICAS
=============================================*/

	static public function ctrMostrarCliente($id){

		$tabla = "clientes";

		$respuesta = ModeloClientes::mdlMostrarCliente($tabla,$id);

		return $respuesta;
	
	}


/*=============================================
	ACTUALIZAR ENTRADAS
=============================================*/

static public function ctrActualizarClientes($id,$nombre,$adeuda,$limite){

		$tabla = "clientes";

		$respuesta = ModeloClientes::mdlActualizarClientes($tabla,$id,$nombre,$adeuda,$limite);

		return $respuesta;

	}

/*=============================================
	INSERTAR ENTRADAS
=============================================*/

static public function ctrInsertarClientes($nombre,$adeuda,$limite){

		$tabla = "clientes";

		$respuesta = ModeloClientes::mdlInsertarClientes($tabla, $nombre,$adeuda,$limite);

		return $respuesta;

	}

}