<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once "conexion.php";

class ModeloEmpleados{


	/*=============================================
	MOSTRAR ENTRADAS
	=============================================*/

	static public function mdlMostrarEmpleados($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT e.* FROM empleados e WHERE estatus ='1' ORDER BY e.id DESC");

		$stmt -> execute();

		//echo $stmt -> fetchAll();exit();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	ACTALIZAR ENTRADAS
	=============================================*/	

	static public function mdlActualizarEmpleado($tabla,$obj){

		date_default_timezone_set("America/Mexico_City");
		$fecha = date("Y-m-d H:i:s");

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, paterno= :paterno, materno= :materno, nacimiento = :nacimeinto, sueldo = :sueldo, fecha_ingreso= :fechaingreso, email= :email, estatus = :estatus WHERE id = :id");

		$stmt->bindParam(":id", $obj['id'], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $obj['nombre'], PDO::PARAM_STR);
		$stmt->bindParam(":paterno", $obj['paterno'], PDO::PARAM_STR);
		$stmt->bindParam(":materno", $obj['materno'], PDO::PARAM_STR);
		$stmt->bindParam(":nacimeinto", $obj['nacimiento'], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_ingreso", $obj['fecha'], PDO::PARAM_STR);
		$stmt->bindParam(":sueldo", $obj['sueldo'], PDO::PARAM_STR);
		$stmt->bindParam(":email", $obj['email'], PDO::PARAM_STR);
		$stmt->bindParam(":estatus", $eobj['estatus'], PDO::PARAM_STR);

		if ($stmt -> execute()) {

			return "ok";

		} 
		else {

			return "error";

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	INSERTAR EMPLEADO
	=============================================*/	

	static public function mdlInsertarEmpleado($tabla,$nombre,$aniversario,$sueldo,$estatus) {

		date_default_timezone_set("America/Mexico_City");
		$fecha = date("Y-m-d H:i:s");
		
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, sueldo, aniversario, estatus, fecha) VALUES (:nombre, :sueldo, :aniversario, :estatus,:fecha)");

		$stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
		$stmt->bindParam(":sueldo", $sueldo, PDO::PARAM_STR);
		$stmt->bindParam(":aniversario", $aniversario, PDO::PARAM_STR);
		$stmt->bindParam(":estatus", $estatus, PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $fecha, PDO::PARAM_STR);

		if ($stmt -> execute()) {

			return "ok";

		} 
		else {

			return "error";

		}

		$stmt -> close();

		$stmt = null;

	}
}