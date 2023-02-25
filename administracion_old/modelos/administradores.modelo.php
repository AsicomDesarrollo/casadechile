<?php

require_once "conexion.php";

class ModeloAdministradores{

	/*=============================================
	MOSTRAR ADMINISTRADORES
	=============================================*/

	static public function mdlMostrarAdministradores($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item LIMIT 1");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt-> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR TODOS
	=============================================*/

	static public function mdlMostrarTodos($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt-> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR TODOS
	=============================================*/

	static public function mdlMostrarAdministradoresSucursal($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE tipo = 2 ORDER BY id DESC");

		//$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt-> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR TODOS
	=============================================*/

	static public function mdlMostrarAdmin($tabla){

	    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt-> close();

		$stmt = null;

	}

	/*=============================================
	Actualizar admin
	=============================================*/

	static public function mdlActualizarAdmin($tabla,$id,$nombre,$paterno,$materno,$email,$password){

	    $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, paterno = :paterno, materno = :materno, email = :email, password = :password WHERE id = :id");

		$stmt->bindParam(":id", $id, PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
		$stmt->bindParam(":paterno", $paterno, PDO::PARAM_STR);
		$stmt->bindParam(":materno", $materno, PDO::PARAM_STR);
		$stmt->bindParam(":email", $email, PDO::PARAM_STR);
		$stmt->bindParam(":password", $password, PDO::PARAM_STR);

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
	INSERTAR ADMIN
	=============================================*/	

	static public function mdlInsertarAdmin($tabla, $nombre, $paterno, $materno, $email,$password){

		date_default_timezone_set("America/Mexico_City");
		$fecha = date("Y-m-d H:i:s");
		
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, paterno, materno, email, password, fecha) VALUES (:nombre, :paterno, :materno, :email, :password,:fecha)");

		$stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
		$stmt->bindParam(":paterno", $paterno, PDO::PARAM_STR);
		$stmt->bindParam(":materno", $materno, PDO::PARAM_STR);
		$stmt->bindParam(":email", $email, PDO::PARAM_STR);
		$stmt->bindParam(":password", $password, PDO::PARAM_STR);
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
	MOSTRAR Personal de Sucursal
	=============================================*/

	static public function mdlMostrarPersonalSucursal($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE tipo = 3 ORDER BY id DESC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt-> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR Sucursales
	=============================================*/

	static public function mdlMostrarSucursales($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id ASC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt-> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR Personal Asignado A Una Venta
	=============================================*/

	static public function mdlMostrarPersonalVenta($tabla,$idPersonal){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $idPersonal, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt-> close();

		$stmt = null;

	}

}