<?php 

class ControladorPresupuesto {


/*=============================================
	MOSTRAR TOTAL CATEGORIAS
=============================================*/

static public function ctrMostrarPresupuesto(){

		$tabla = "tipo_gastos";

		$respuesta = ModeloPresupuesto::mdlMostrarPresupuesto($tabla);

		return $respuesta;

	}

/*=============================================
	Actualizar presupuesto
=============================================*/

static public function ctrActualizarPresupuesto($id, $concepto, $presupuesto){

		$tabla = "tipo_gastos";

		$respuesta = ModeloPresupuesto::mdlActualizarPresupuesto($tabla, $id, $concepto, $presupuesto);

		return $respuesta;

	}

/*=============================================
	MOSTRAR TOTAL CATEGORIAS
=============================================*/

static public function ctrMostrarPorId($tipo){

		$tabla = "gastos";

		$respuesta = ModeloPresupuesto::mdlMostrarPorId($tabla, $tipo);

		return $respuesta;

	}

}