<?php

class ControladorEntradas{


/*=============================================
MOSTRAR ENTRADAS
=============================================*/

	static public function ctrMostrarEntradas(){

		$tabla = "entradas";

		$respuesta = ModeloEntradas::mdlMostrarEntradas($tabla);

		return $respuesta;
	
	}

/*=============================================
MOSTRAR DEUDAS DE PROVEEDOR
=============================================*/

	static public function ctrMostrarDeudasProveedor($idProveedor){

		$tabla = "entradas";

		$respuesta = ModeloEntradas::mdlMostrarDeudasProveedor($tabla, $idProveedor);

		return $respuesta;
	
	}


/*=============================================
MOSTRAR ENTRADAS ESPECIFICAS
=============================================*/

	static public function ctrMostrarEntradaEspecifica($id){

		$tabla = "productos";

		$respuesta = ModeloEntradas::mdlMostrarEntradaEspecifica($tabla,$id);

		return $respuesta;
	
	}


/*=============================================
	ACTUALIZAR ENTRADAS
=============================================*/

static public function ctrActualizarEntradas($id,$producto,$peso,$precio,$proveedor,$estatus){

		$tabla = "entradas";

		$respuesta = ModeloEntradas::mdlActualizarEntradas($tabla, $id,$producto,$peso,$precio,$proveedor,$estatus);

		return $respuesta;

	}

/*=============================================
	INSERTAR ENTRADAS
=============================================*/

static public function ctrInsertarEntradas($productonuevo,$nuevopeso,$nuevoprecio,$nuevoproveedor,$estatus){

		$tabla = "entradas";

		$respuesta = ModeloEntradas::mdlInsertarEntradas($tabla, $productonuevo, $nuevopeso, $nuevoprecio, $nuevoproveedor,$estatus);

		return $respuesta;

	}

/*=============================================
	TRAER ABONO DE ENTRADAS
=============================================*/

static public function ctrTraerAbonoEntradas($identrada){

		$tabla = "abono_entradas";

		$respuesta = ModeloEntradas::mdlTraerAbonoEntradas($tabla, $identrada);

		return $respuesta;

	}

/*=============================================
	TRAER ABONO DE VENTA
=============================================*/

static public function ctrTraerAbonoVenta($identrada){

		$tabla = "abono_clientes";

		$respuesta = ModeloEntradas::mdlTraerAbonoVenta($tabla, $identrada);

		return $respuesta;

	}

/*=============================================
	INSERTAR ABONO DE ENTRADAS
=============================================*/

static public function ctrInsertarAbono($identrada,$montoAbono,$metodoPagoAbono){

		$tabla = "abono_entradas";

		$respuesta = ModeloEntradas::mdlInsertarAbono($tabla, $identrada,$montoAbono,$metodoPagoAbono);

		return $respuesta;

	}

/*=============================================
	INSERTAR ABONO DE VENTAS
=============================================*/

static public function ctrInsertarAbonoVenta($identrada,$montoAbono,$metodoPagoAbono){

		$tabla = "abono_clientes";

		$respuesta = ModeloEntradas::mdlInsertarAbonoVenta($tabla, $identrada,$montoAbono,$metodoPagoAbono);

		return $respuesta;

	}

}