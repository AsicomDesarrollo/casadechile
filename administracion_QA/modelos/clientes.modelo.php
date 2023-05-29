<?php

//ini_set('display_errors', 1);
//error_reporting(E_ALL);

require_once "conexion.php";

class ModeloClientes{


	/*=============================================
	MOSTRAR ENTRADAS
	=============================================*/

	static public function mdlMostrarClientes($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}



	/*=============================================
	MOSTRAR PROVEEDOR
	=============================================*/

	static public function mdlMostrarCliente($tabla,$id){


		
		try {
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :id LIMIT 1");

			$stmt->bindParam(":id", $id, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
			$stmt -> close();
			$stmt = null;
		}catch(PDOException $e) {
			return false; // <== CAMBIAR AQUI
		}

	}

	/*=============================================
	ACTALIZAR ENTRADAS
	=============================================*/	

	static public function mdlActualizarClientes($tabla,$id,$nombre,$adeuda,$limite){

		date_default_timezone_set("America/Mexico_City");
		$fecha = date("Y-m-d H:i:s");

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, adeuda = :adeuda, limite = :limite, fecha = :fecha WHERE id = :id");

		$stmt->bindParam(":id", $id, PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
		$stmt->bindParam(":adeuda", $adeuda, PDO::PARAM_STR);
		$stmt->bindParam(":limite", $limite, PDO::PARAM_STR);
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

	static public function mdlInsertarClientes($tabla,$nombre,$adeuda,$limite){

		date_default_timezone_set("America/Mexico_City");
		$fecha = date("Y-m-d H:i:s");
		
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, adeuda, limite, fecha) VALUES (:nombre, :adeuda, :limite, :fecha)");

		$stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
		$stmt->bindParam(":adeuda", $adeuda, PDO::PARAM_STR);
		$stmt->bindParam(":limite", $limite, PDO::PARAM_STR);
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
