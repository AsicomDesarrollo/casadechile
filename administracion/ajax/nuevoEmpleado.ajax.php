<?php

require_once "../controladores/empleados.controlador.php";
require_once "../modelos/empleados.modelo.php";

class AjaxModificaEmpleados {

	public $id;
	public $nombre;
	public $paterno;
	public $materno;
	public $nacimiento;
	public $fecha_ingreso;
	public $sueldo;
	public $email;
	public $estatus;


	public function modificarEmpleado(){
		$obj=[];
		$obj['id'] = $this->id;
		$obj['nombre'] = $this->nombre;
		$obj['paterno'] = $this->paterno;
		$obj['materno'] = $this->materno;
		$obj['nacimiento'] = $this->nacimiento;
		$obj['fecha_ingreso'] = $this->fecha_ingreso;
		$obj['sueldo'] = $this->sueldo;
		$obj['email'] = $this->email;
		$obj['estatus'] = $this->estatus;

		$actualiza = ControladorEmpleados::ctrActualizarEmpleado($obj);

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



if(isset($_POST["action"]) && $_POST["action"] == "actualizar"){

	date_default_timezone_set("America/Mexico_City");
		$fecha = date("Y-m-d H:i:s");

		$stmt = Conexion::conectar()->prepare("UPDATE empleados SET nombre = :nombre, paterno= :paterno, materno= :materno, nacimiento = :nacimeinto, sueldo = :sueldo, fecha_ingreso= :fecha_ingreso, email= :email, estatus = :estatus WHERE id = :id");

		$stmt->bindParam(":id", $_REQUEST['id'], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $_REQUEST['nombre'], PDO::PARAM_STR);
		$stmt->bindParam(":paterno", $_REQUEST['paterno'], PDO::PARAM_STR);
		$stmt->bindParam(":materno", $_REQUEST['materno'], PDO::PARAM_STR);
		$stmt->bindParam(":nacimeinto", $_REQUEST['nacimiento'], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_ingreso", $_REQUEST['fecha_ingreso'], PDO::PARAM_STR);
		$stmt->bindParam(":sueldo", $_REQUEST['sueldo'], PDO::PARAM_STR);
		$stmt->bindParam(":email", $_REQUEST['email'], PDO::PARAM_STR);
		$stmt->bindParam(":estatus", $_REQUEST['estatus'], PDO::PARAM_STR);

		if ($stmt -> execute()) {
			print "success";
		} 
		else {
			print "error";
		}
//print_r($stmt);exit();


}

if(isset($_POST["action"]) && $_POST["action"] == "nuevo"){
	$hoy = date("Y-m-d H:i:s");

	$opciones = [ 'cost' => 12 ];
	$pass = password_hash('casadelchile.mx', PASSWORD_BCRYPT, $opciones);

	$stmt = Conexion::conectar()->prepare("INSERT empleados ( nombre, paterno, materno, nacimiento, sueldo, fecha_ingreso, email, estatus ,fecha_creacion, pass)  
													 values (:nombre,:paterno,:materno,:nacimeinto,:sueldo,:fecha_ingreso,:email,:estatus,:fecha_creacion,:pass)");

	$stmt->bindParam(":nombre", $_REQUEST['nombre'], PDO::PARAM_STR);
	$stmt->bindParam(":paterno", $_REQUEST['paterno'], PDO::PARAM_STR);
	$stmt->bindParam(":materno", $_REQUEST['materno'], PDO::PARAM_STR);
	$stmt->bindParam(":nacimeinto", $_REQUEST['nacimiento'], PDO::PARAM_STR);
	$stmt->bindParam(":fecha_ingreso", $_REQUEST['fecha_ingreso'], PDO::PARAM_STR);
	$stmt->bindParam(":sueldo", $_REQUEST['sueldo'], PDO::PARAM_STR);
	$stmt->bindParam(":email", $_REQUEST['email'], PDO::PARAM_STR);
	$stmt->bindParam(":fecha_creacion", $hoy, PDO::PARAM_STR);
	$stmt->bindParam(":pass", $pass, PDO::PARAM_STR);
	$stmt->bindParam(":estatus", $_REQUEST['estatus'], PDO::PARAM_STR);

	if ($stmt -> execute()) {
		print "success";
	} 
	else {
		print "error";
	}


}



