<?php

class ControladorInicio{


/*=============================================
MOSTRAR COMPRAS DE UN DIA ESPECIFICO
=============================================*/

	static public function ctrMostrarCompras(){

		$tabla = "compras";

		$respuesta = ModeloInicio::mdlMostrarCompras($tabla);

		return $respuesta;
	
	}



}