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

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt-> close();

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

}