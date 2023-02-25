<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once "conexion.php";

class ModeloPresupuesto{

	/*=============================================
	MOSTRAR 
	=============================================*/	

	static public function mdlMostrarPresupuesto($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	ACTALIZAR presupuesto
	=============================================*/	

	static public function mdlActualizarPresupuesto($tabla,$id,$concepto,$presupuesto){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET concepto = :concepto, presupuesto = :presupuesto WHERE id = :id");

		$stmt->bindParam(":id", $id, PDO::PARAM_STR);
		$stmt->bindParam(":concepto", $concepto, PDO::PARAM_STR);
		$stmt->bindParam(":presupuesto", $presupuesto, PDO::PARAM_STR);

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
	MOSTRAR por tipo
	=============================================*/	

	static public function mdlMostrarPorId($tabla, $tipo){

		date_default_timezone_set("America/Mexico_City");
		$fecha = date("Y-m-d");

		$segmentos = explode("-", $fecha);

		$mes = $segmentos[1];

		$stmt = Conexion::conectar()->prepare("SELECT SUM(monto) as monto FROM $tabla WHERE tipo = :tipo AND fecha like '%-$mes-%'");

		$stmt->bindParam(":tipo", $tipo, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}


}