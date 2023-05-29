<?php

require_once "../controladores/presupuesto.controlador.php";

require_once "../modelos/presupuesto.modelo.php";

class AjaxModificaPresupuesto {

	public $id;
	public $concepto;
	public $presupuesto;

	public function modificaPresupuesto(){

		$id = $this->id;
		$concepto = $this->concepto;
		$presupuesto = $this->presupuesto;

		$actualiza = ControladorPresupuesto::ctrActualizarPresupuesto($id,$concepto,$presupuesto);

		if($actualiza == "ok"){

			echo "ok";
		}
		else {

			echo "error";
		}
	}
}



if(isset($_POST["accion"]) && $_POST["accion"] == "actualizar"){

	$actualizar = new AjaxModificaPresupuesto();
	$actualizar -> id = $_POST["id"];
	$actualizar -> concepto = $_POST["concepto"];
	$actualizar -> presupuesto = $_POST["presupuesto"];
	$actualizar -> modificaPresupuesto();

}