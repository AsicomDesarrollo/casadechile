<?php

require_once "../controladores/empleados.controlador.php";

require_once "../modelos/empleados.modelo.php";

class AjaxModificaEmpleados {

	public $id;
	public $nombre;
	public $aniversario;
	public $sueldo;
	public $estatus;


	public function modificarEmpleado(){

		$id = $this->id;
		$nombre = $this->nombre;
		$aniversario = $this->aniversario;
		$sueldo = $this->sueldo;
		$estatus = $this->estatus;

		$actualiza = ControladorEmpleados::ctrActualizarEmpleado($id,$nombre,$aniversario,$sueldo,$estatus);

		if($actualiza == "ok"){

			echo "ok";
		}
		else {

			echo "error";
		}
	}

	public $nuevoNombre;
	public $nuevoAniversario;
	public $nuevoSueldo;
	public $nuevoEstatus;

	public function nuevoEmpleado(){

		$nuevoNombre = $this->nuevoNombre;
		$nuevoAniversario = $this->nuevoAniversario;
		$nuevoSueldo = $this->nuevoSueldo;
		$nuevoEstatus = $this->nuevoEstatus;

		$nuevo = ControladorEmpleados::ctrInsertarEmpleado($nuevoNombre,$nuevoAniversario,$nuevoSueldo,$nuevoEstatus);

		if($nuevo == "ok"){

			echo "ok";
		}
		else {

			echo "error";
		}
	}
}



if(isset($_POST["accion"]) && $_POST["accion"] == "actualizar"){

	$actualizar = new AjaxModificaEmpleados();
	$actualizar -> id = $_POST["id"];
	$actualizar -> nombre = $_POST["nombre"];
	$actualizar -> aniversario = $_POST["aniversario"];
	$actualizar -> sueldo = $_POST["sueldo"];
	$actualizar -> estatus = $_POST["estatus"];
	$actualizar -> modificarEmpleado();

}

if(isset($_POST["accion"]) && $_POST["accion"] == "nueva"){

	$nuevo = new AjaxModificaEmpleados();
	$nuevo -> nuevoNombre = $_POST["nombre"];
	$nuevo -> nuevoAniversario = $_POST["aniversario"];
	$nuevo -> nuevoSueldo = $_POST["sueldo"];
	$nuevo -> nuevoEstatus = $_POST["estatus"];
	$nuevo -> nuevoEmpleado();

}



