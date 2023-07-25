<?php

require_once "conexion.php";

class ModeloVentas{

	/*=============================================
	MOSTRAR ULTIMO ID VENTA
	=============================================*/	

	static public function mdlGuardarCompra($tabla, $id_venta, $cliente, $idProducto, $peso, $precio , $tipo_pago){

		date_default_timezone_set("America/Mexico_City");
		$fecha = date("Y-m-d H:i:s");
		$estatus = "Pendiente";
		if($tipo_pago != "Pendiente") {
			$estatus = $tipo_pago ;
		}
	

		$id = (int) $id_venta + 1;

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_venta, cliente, producto, peso, precio, estatus, fecha  ) VALUES (:idVenta, :cliente, :producto, :peso, :precio, :estatus, :fecha  )");

		$stmt->bindParam(":idVenta", $id, PDO::PARAM_STR);
		$stmt->bindParam(":cliente", $cliente, PDO::PARAM_STR);
		$stmt->bindParam(":producto", $idProducto, PDO::PARAM_STR);
		$stmt->bindParam(":peso", $peso, PDO::PARAM_STR);
		$stmt->bindParam(":precio", $precio, PDO::PARAM_STR);
		$stmt->bindParam(":estatus", $estatus, PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $fecha, PDO::PARAM_STR);




		if($stmt->execute()){

			$stmt_2 = Conexion::conectar()->prepare("UPDATE venta_tiket SET metodoPago =  '$estatus' WHERE folio = '$id_venta' ");

			//echo "UPDATE venta_tiket SET metodoPago =  '$estatus' WHERE folio = '$id_venta' ";
			$stmt_2->execute();
			//if($stmt_2->execute()){

				//var_dump($rows = $stmt->fetchAll());
				return "ok";

			//}else{

			//	return "error";
			
			//}

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR ULTIMO ID VENTA
	=============================================*/	

	static public function mdlTraerUltimo($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_venta != '0' ORDER BY id DESC LIMIT 1");

		$stmt -> execute();

		return $stmt -> fetch();

		# $stmt -> close();

		# $stmt = null;

	}

	/*=============================================
	MOSTRAR EL TOTAL DE VENTAS
	=============================================*/	

	static public function mdlMostrarTotalVentas($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT SUM(costo) as total FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR VENTAS
	=============================================*/	

	static public function mdlMostrarVentas($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR VENTAS
	=============================================*/	

	static public function mdlMostrarUsuarioCompra($tabla, $idUsuario){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $idUsuario, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR VENTAS
	=============================================*/	

	static public function mdlMostrarNombreProducto($tabla, $idProducto){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $idProducto, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	TRAER DATOS DE VENTA
	=============================================*/

	static public function mdlTraerVenta($tabla, $id){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);

		$stmt -> execute();
		
		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;
		
	}

	/*=============================================
	MODIFICAR ESTADO DE LA VENTA
	=============================================*/

	static public function mdlModificarVenta($tabla, $datos){
		
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET status = :status WHERE id = :id");

		$stmt->bindParam(":id", $datos["idVenta"], PDO::PARAM_STR);
		$stmt->bindParam(":status", $datos["estatus"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
			
		}

		$stmt->close();
		$stmt = null;

	}

}