<?php

/*ini_set('display_errors', 1);
error_reporting(E_ALL);*/

require_once "conexion.php";

class ModeloClientes{


	/*=============================================
	MOSTRAR ENTRADAS
	=============================================*/

	static public function mdlMostrarGastos($tabla){

		date_default_timezone_set("America/Mexico_City");
		$fecha = date("Y-m-d");

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha like '$fecha%' ORDER BY id DESC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}


	/*=============================================
	MOSTRAR PROVEEDOR
	=============================================*/

	static public function mdlMostrarGasto($tabla,$id){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :id LIMIT 1");

		$stmt->bindParam(":id", $id, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}




	/*=============================================
	ACTALIZAR ENTRADAS
	=============================================*/	

	static public function mdlActualizarGastos($tabla,$id,$desc,$tipo,$monto){

		date_default_timezone_set("America/Mexico_City");
		$fecha = date("Y-m-d H:i:s");

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET tipo = :tipo, descripcion = :descripcion, monto = :monto, fecha = :fecha WHERE id = :id");

		$stmt->bindParam(":id", $id, PDO::PARAM_STR);
		$stmt->bindParam(":tipo", $tipo, PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $desc, PDO::PARAM_STR);
		$stmt->bindParam(":monto", $monto, PDO::PARAM_STR);
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
	INSERTAR PRODUCTOS
	=============================================*/	

	static public function mdlInsertarGastos($tabla,$desc,$monto,$tipo){

		date_default_timezone_set("America/Mexico_City");
		$fecha = date("Y-m-d H:i:s");
		
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (tipo,descripcion, monto, fecha) VALUES (:tipo,:descripcion, :monto, :fecha)");

		$stmt->bindParam(":tipo", $tipo, PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $desc, PDO::PARAM_STR);
		$stmt->bindParam(":monto", $monto, PDO::PARAM_STR);
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
