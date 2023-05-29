<?php

//ini_set('display_errors', 1);
//error_reporting(E_ALL);

require_once "conexion.php";

class ModeloProveedores{


	/*=============================================
	MOSTRAR ENTRADAS
	=============================================*/

	static public function mdlMostrarProveedores($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY nombre ASC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}



	/*=============================================
	MOSTRAR PROVEEDOR
	=============================================*/

	static public function mdlMostrarProveedor($tabla,$id){

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

	static public function mdlActualizarProveedor($tabla,$id,$nombre,$pagado,$credito){

		date_default_timezone_set("America/Mexico_City");
		$fecha = date("Y-m-d H:i:s");

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, pagado = :pagado, credito = :credito, fecha = :fecha WHERE id = :id");

		$stmt->bindParam(":id", $id, PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
		$stmt->bindParam(":pagado", $pagado, PDO::PARAM_STR);
		$stmt->bindParam(":credito", $credito, PDO::PARAM_STR);
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

	static public function mdlInsertarProveedor($tabla,$provNombreNuevo,$pagadoNuevo,$creditoNuevo){

		date_default_timezone_set("America/Mexico_City");
		$fecha = date("Y-m-d H:i:s");
		
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, pagado, credito, fecha) VALUES (:nombre, :pagado, :credito, :fecha)");

		$stmt->bindParam(":nombre", $provNombreNuevo, PDO::PARAM_STR);
		$stmt->bindParam(":pagado", $pagadoNuevo, PDO::PARAM_STR);
		$stmt->bindParam(":credito", $creditoNuevo, PDO::PARAM_STR);
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
