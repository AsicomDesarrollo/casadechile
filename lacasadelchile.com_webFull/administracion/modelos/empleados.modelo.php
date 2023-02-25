<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once "conexion.php";

class ModeloEmpleados{


	/*=============================================
	MOSTRAR ENTRADAS
	=============================================*/

	static public function mdlMostrarEmpleados($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	ACTALIZAR ENTRADAS
	=============================================*/	

	static public function mdlActualizarEmpleado($tabla,$id,$nombre,$aniversario,$sueldo,$estatus){

		date_default_timezone_set("America/Mexico_City");
		$fecha = date("Y-m-d H:i:s");

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, aniversario = :aniversario, sueldo = :sueldo, estatus = :estatus, fecha = :fecha WHERE id = :id");

		$stmt->bindParam(":id", $id, PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
		$stmt->bindParam(":aniversario", $aniversario, PDO::PARAM_STR);
		$stmt->bindParam(":sueldo", $sueldo, PDO::PARAM_STR);
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