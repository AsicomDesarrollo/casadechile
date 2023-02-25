<?php

/*ini_set('display_errors', 1);
error_reporting(E_ALL);*/

require_once "conexion.php";

class ModeloCategorias{

	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/	

	static public function mdlMostrarCategorias($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY nombre ASC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	ACTALIZAR CATEGORIAS
	=============================================*/	

	static public function mdlActualizarCategorias($tabla, $id, $nombre, $estatus){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, estatus = :estatus WHERE id = :id");

		$stmt->bindParam(":id", $id, PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
		$stmt->bindParam(":estatus", $estatus, PDO::PARAM_STR);

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
	INSERTAR CATEGORIAS
	=============================================*/	

	static public function mdlInsertarCategorias($tabla, $nombre, $estatus){

		date_default_timezone_set("America/Mexico_City");
		$fecha = date("Y-m-d H:i:s");
		
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, estatus, fecha) VALUES (:nombre, :estatus, :fecha)");


		$stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
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
	MOSTRAR CATEGORIAS
	=============================================*/	

	static public function mdlMostrarCategoriaPorId($tabla,$id){

		$stmt = Conexion::conectar()->prepare("SELECT nombre FROM $tabla WHERE id = :id LIMIT 1");

		$stmt->bindParam(":id", $id, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}
}