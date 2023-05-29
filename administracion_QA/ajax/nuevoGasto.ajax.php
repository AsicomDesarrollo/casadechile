<?php

require_once "../controladores/gastos.controlador.php";

require_once "../modelos/gastos.modelo.php";

class AjaxModificaGastos {

	public $id;
	public $desc;
	public $tipo;
	public $monto;

	public function modificarGastos(){

 		$id = $this->id;
 		$desc = $this->desc;
 		$tipo = $this->tipo;
		$monto = $this->monto;

	    $modProd = ControladorGastos::ctrActualizarGastos($id,$desc,$tipo,$monto);

	    if($modProd == "ok"){

			echo "ok";
		}
		else {

			echo "error";
		}

	}


	public $nuevaDesc;
	public $nuevoMonto;
	public $nuevoTipo;
	
	public function nuevoGasto(){

		$nuevaDesc = $this->nuevaDesc;
		$nuevoTipo = $this->nuevoTipo;
		$nuevoMonto = $this->nuevoMonto;

		$nuevoProd = ControladorGastos::ctrInsertarGastos($nuevaDesc,$nuevoMonto,$nuevoTipo);

		if($nuevoProd == "ok"){

			echo "ok";
		}
		else {

			echo "error";
		}

	}

}


if(isset($_POST["accion"]) && $_POST["accion"] == "actualizar"){

	$actualizar = new AjaxModificaGastos();
	$actualizar -> id = $_POST["id"];
	$actualizar -> desc = $_POST["descripcion"];
	$actualizar -> tipo = $_POST["tipo"];
	$actualizar -> monto = $_POST["monto"];
	$actualizar -> modificarGastos();

}

if(isset($_POST["accion"]) && $_POST["accion"] == "nuevo"){

	$nuevo = new AjaxModificaGastos();
	$nuevo -> nuevaDesc = $_POST["descripcion"];
	$nuevo -> nuevoTipo = $_POST["tipo"];
	$nuevo -> nuevoMonto = $_POST["monto"];
	$nuevo -> nuevoGasto();

}
