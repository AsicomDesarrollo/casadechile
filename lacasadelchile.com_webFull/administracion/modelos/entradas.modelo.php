<?php

//ini_set('display_errors', 1);
//error_reporting(E_ALL);

require_once "conexion.php";

class ModeloEntradas{


	/*=============================================
	MOSTRAR ENTRADAS
	=============================================*/

	static public function mdlMostrarEntradas($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR DEUDAS DE PROVEEDOR
	=============================================*/

	static public function mdlMostrarDeudasProveedor($tabla, $idProveedor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE proveedor = :proveedor AND estatus = 'credito' ORDER BY id DESC");

		$stmt->bindParam(":proveedor", $idProveedor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}


	/*=============================================
	MOSTRAR ENTRADA ESPECIFICA
	=============================================*/

	static public function mdlMostrarEntradaEspecifica($tabla,$id){

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

	static public function mdlActualizarEntradas($tabla,$id,$producto,$peso,$precio,$proveedor,$estatus){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET producto = :producto, peso = :peso, precio = :precio, proveedor =:proveedor, estatus = :estatus WHERE id = :id");

		$stmt->bindParam(":id", $id, PDO::PARAM_STR);
		$stmt->bindParam(":producto", $producto, PDO::PARAM_STR);
		$stmt->bindParam(":peso", $peso, PDO::PARAM_STR);
		$stmt->bindParam(":precio", $precio, PDO::PARAM_STR);
		$stmt->bindParam(":proveedor", $proveedor, PDO::PARAM_STR);
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
	INSERTAR PRODUCTOS
	=============================================*/	

	static public function mdlInsertarEntradas($tabla, $productonuevo,$nuevopeso,$nuevoprecio,$nuevoproveedor,$estatus){

		date_default_timezone_set("America/Mexico_City");
		$fecha = date("Y-m-d H:i:s");
		
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (producto, peso, precio, proveedor, estatus, fecha) VALUES (:producto, :peso, :precio, :proveedor, :estatus, :fecha)");

		$stmt->bindParam(":producto", $productonuevo, PDO::PARAM_STR);
		$stmt->bindParam(":peso", $nuevopeso, PDO::PARAM_STR);
		$stmt->bindParam(":precio", $nuevoprecio, PDO::PARAM_STR);
		$stmt->bindParam(":proveedor", $nuevoproveedor, PDO::PARAM_STR);
		$stmt->bindParam(":estatus", $estatus, PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $fecha, PDO::PARAM_STR);

		if ($stmt -> execute()) {





			$stmtA = Conexion::conectar()->prepare("UPDATE productos SET minimo = :minimo WHERE id = :id");

			$stmtA->bindParam(":id", $productonuevo, PDO::PARAM_STR);
			$stmtA->bindParam(":minimo", $nuevoprecio, PDO::PARAM_STR);

			if ($stmtA -> execute()) {

				return "ok";

			} 
			else {

				return "error";

			}




		} 
		else {

			return "error";

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR ABONO ENTRADA ESPECIFICA
	=============================================*/

	static public function mdlTraerAbonoEntradas($tabla,$identrada){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_entrada = :id");

		$stmt->bindParam(":id", $identrada, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR ABONO VENTA ESPECIFICA
	=============================================*/

	static public function mdlTraerAbonoVenta($tabla,$identrada){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_venta = :id");

		$stmt->bindParam(":id", $identrada, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}	


	/*=============================================
	INSERTAR ABONO
	=============================================*/	

	static public function mdlInsertarAbono($tabla, $identrada,$montoAbono,$metodoPagoAbono) {

		date_default_timezone_set("America/Mexico_City");
		$fecha = date("Y-m-d H:i:s");
		
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_entrada, monto, metodo, fecha) VALUES (:id_entrada, :monto, :metodo, :fecha)");

		$stmt->bindParam(":id_entrada", $identrada, PDO::PARAM_STR);
		$stmt->bindParam(":monto", $montoAbono, PDO::PARAM_STR);
		$stmt->bindParam(":metodo", $metodoPagoAbono, PDO::PARAM_STR);
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
	INSERTAR ABONO
	=============================================*/	

	static public function mdlInsertarAbonoVenta($tabla, $identrada,$montoAbono,$metodoPagoAbono) {

		date_default_timezone_set("America/Mexico_City");
		$fecha = date("Y-m-d H:i:s");
		
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_venta, monto, metodo, fecha) VALUES (:id_venta, :monto, :metodo, :fecha)");

		$stmt->bindParam(":id_venta", $identrada, PDO::PARAM_STR);
		$stmt->bindParam(":monto", $montoAbono, PDO::PARAM_STR);
		$stmt->bindParam(":metodo", $metodoPagoAbono, PDO::PARAM_STR);
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
