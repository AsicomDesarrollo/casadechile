<?php

class ControladorGastos{


/*=============================================
MOSTRAR ENTRADAS
=============================================*/

	static public function ctrMostrarGastos(){

		$tabla = "gastos";

		$respuesta = ModeloClientes::mdlMostrarGastos($tabla);

		return $respuesta;
	
	}


/*=============================================
MOSTRAR ENTRADAS ESPECIFICAS
=============================================*/

	static public function ctrMostrarGasto($id){

		$tabla = "gastos";

		$respuesta = ModeloClientes::mdlMostrarGasto($tabla,$id);

		return $respuesta;
	
	}


/*=============================================
	ACTUALIZAR ENTRADAS
=============================================*/

static public function ctrActualizarGastos($id,$desc,$tipo,$monto){

		$tabla = "gastos";

		$respuesta = ModeloClientes::mdlActualizarGastos($tabla,$id,$desc,$tipo,$monto);

		return $respuesta;

	}

/*=============================================
	INSERTAR ENTRADAS
=============================================*/

static public function ctrInsertarGastos($desc,$monto,$tipo){

		$tabla = "gastos";

		$respuesta = ModeloClientes::mdlInsertarGastos($tabla, $desc,$monto,$tipo);

		return $respuesta;

	}

}