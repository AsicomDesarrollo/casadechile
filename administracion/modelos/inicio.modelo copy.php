<?php

require_once "conexion.php";

class ModeloInicio{


	/*=============================================
	MOSTRAR COMPRAS DE UN DIA ESPECIFICO
	=============================================*/

	static public function mdlMostrarCompras($tabla){

		date_default_timezone_set("America/Mexico_City");
		$fecha = date("Y-m-d H:i:s");

		$soloFecha = explode(" ", $fecha);

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha LIKE '%$soloFecha[0]%'");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}


	/*=============================================
	MOSTRAR COMPRAS DE UN DIA ESPECIFICO EN EFECTIVO
	=============================================*/

	static public function mdlMostrarComprasEfectivo($tabla){

		date_default_timezone_set("America/Mexico_City");
		$fecha = date("Y-m-d H:i:s");

		$soloFecha = explode(" ", $fecha);

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha LIKE '%$soloFecha[0]%' AND estatus = 'Pagado en efectivo'");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR ABONOS DE UN DIA ESPECIFICO EN EFECTIVO
	=============================================*/

	static public function mdlMostrarAbonosEfectivo($tabla){

		date_default_timezone_set("America/Mexico_City");
		$fecha = date("Y-m-d H:i:s");

		$soloFecha = explode(" ", $fecha);

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha LIKE '%$soloFecha[0]%' AND metodo = 'efectivo'");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR COMPRAS DE UN DIA ESPECIFICO EN EFECTIVO
	=============================================*/

	static public function mdlMostrarGastosEfectivo($tabla){

		date_default_timezone_set("America/Mexico_City");
		$fecha = date("Y-m-d H:i:s");

		$soloFecha = explode(" ", $fecha);

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha LIKE '%$soloFecha[0]%' ");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR ENTRADAS EN EFECTIVO DE UN DIA ESPECIFICO
	=============================================*/

	static public function mdlMostrarEntradasEfectivo($tabla){

		date_default_timezone_set("America/Mexico_City");
		$fecha = date("Y-m-d H:i:s");

		$soloFecha = explode(" ", $fecha);

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE estatus = 'efectivo' AND fecha LIKE '%$soloFecha[0]%' ");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR ABONOS DE ENTRADAS EN EFECTIVO DE UN DIA ESPECIFICO
	=============================================*/

	static public function mdlMostrarAbonosEntradasEfectivo($tabla){

		date_default_timezone_set("America/Mexico_City");
		$fecha = date("Y-m-d H:i:s");

		$soloFecha = explode(" ", $fecha);

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE metodo = 'efectivo' AND fecha LIKE '%$soloFecha[0]%' ");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR COMPRAS DE UN DIA ESPECIFICO A CREDITO
	=============================================*/

	static public function mdlMostrarComprasCredito($tabla){

		date_default_timezone_set("America/Mexico_City");
		$fecha = date("Y-m-d H:i:s");

		$soloFecha = explode(" ", $fecha);

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha LIKE '%$soloFecha[0]%' AND estatus = 'Credito'");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR COMPRAS DE UN DIA ESPECIFICO CON TARJETA
	=============================================*/

	static public function mdlMostrarComprasTarjeta($tabla){

		date_default_timezone_set("America/Mexico_City");
		$fecha = date("Y-m-d H:i:s");

		$soloFecha = explode(" ", $fecha);

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha LIKE '%$soloFecha[0]%' AND estatus = 'Pagado con tarjeta'");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}


	/*=============================================
	MOSTRAR COMPRAS DE UN DIA ESPECIFICO CON TRANSFERENCIA
	=============================================*/

	static public function mdlMostrarComprasTransferencia($tabla){

		date_default_timezone_set("America/Mexico_City");
		$fecha = date("Y-m-d H:i:s");

		$soloFecha = explode(" ", $fecha);

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha LIKE '%$soloFecha[0]%' AND estatus = 'Pagado por transferencia'");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	DEFINIR OBJETIVO
	=============================================*/	

	static public function mdlDefinirConfig($tabla, $objetivo,$inicio){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET objetivo = :objetivo, inicio = :inicio");

		$stmt->bindParam(":objetivo", $objetivo, PDO::PARAM_STR);
		$stmt->bindParam(":inicio", $inicio, PDO::PARAM_STR);

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
	MOSTRAR COMPRAS DE UN DIA ESPECIFICO A CREDITO
	=============================================*/

	static public function mdlTraerObjetivo($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla LIMIT 1");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}


	/*=============================================
	CUENTAS POR COBRAR
	=============================================*/

	static public function mdlCuentasPorCobrar($tabla){

		$estatus = 'Credito';

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE estatus = :estatus");

		$stmt->bindParam(":estatus", $estatus, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}


	/*=============================================
	CUENTAS POR PAGAR
	=============================================*/

	static public function mdlCuentasPorPagar($tabla){

		$estatus = 'Credito';

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE estatus = :estatus");

		$stmt->bindParam(":estatus", $estatus, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	CANCELAR VENTA
	=============================================*/	

	static public function mdlCancelarVenta($tabla, $idVenta){

		$estatus = "Cancelada";

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estatus = :estatus WHERE id_venta = :idventa");

		$stmt->bindParam(":estatus", $estatus, PDO::PARAM_STR);
		$stmt->bindParam(":idventa", $idVenta, PDO::PARAM_STR);

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
	CANCELAR ENTRADA
	=============================================*/	

	static public function mdlCancelarEntrada($tabla, $idEntrada){

		$estatus = "Cancelada";

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estatus = :estatus WHERE id = :idEntrada");

		$stmt->bindParam(":estatus", $estatus, PDO::PARAM_STR);
		$stmt->bindParam(":idEntrada", $idEntrada, PDO::PARAM_STR);

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
	PAGAR PRESTAMO
	=============================================*/	

	static public function mdlPagarPrestamo($tabla, $prestamoConcepto, $prestamoMonto){

		date_default_timezone_set("America/Mexico_City");
		$fecha = date("Y-m-d H:i:s");

		$estatus = "Pagado en efectivo";

		$id = 0;

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_venta, cliente, producto, peso, precio, estatus, fecha) VALUES (:idVenta, :cliente, '', '1', :precio, :estatus, :fecha)");

		$stmt->bindParam(":idVenta", $id, PDO::PARAM_STR);
		$stmt->bindParam(":cliente", $prestamoConcepto, PDO::PARAM_STR);
		$stmt->bindParam(":precio", $prestamoMonto, PDO::PARAM_STR);
		$stmt->bindParam(":estatus", $estatus, PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $fecha, PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR COMPRAS DE UN DIA ESPECIFICO A CREDITO
	=============================================*/

	static public function mdlTraerCaja(){

		$tabla = "cierres_caja";

		date_default_timezone_set("America/Mexico_City");
		$fecha = date("Y-m-d");

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha = :fecha ORDER BY id DESC LIMIT 1");

		$stmt->bindParam(":fecha", $fecha, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

}