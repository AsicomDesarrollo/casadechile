<?php

require_once "conexion.php";

class ModeloVentas{

	/*=============================================
	TRAER CLIENTES
	=============================================*/	

	static public function mdlTraerClientes($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY nombre ASC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MODIFICAR ESTADO DE LA VENTA
	=============================================*/

	static public function mdlActualizarCompraCredito($tabla, $idVenta, $fechaLimite){
		
		$accion = "Credito";

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estatus = :estatus, vencimiento = :vencimiento WHERE id_venta = :id");

		$stmt->bindParam(":id", $idVenta, PDO::PARAM_STR);
		$stmt->bindParam(":estatus", $accion, PDO::PARAM_STR);
		$stmt->bindParam(":vencimiento", $fechaLimite, PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
			
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MODIFICAR PEDIDO
	=============================================*/

	static public function mdlActualizarPedido($tabla, $idModificar, $costoModificar, $pesoModificar){
		
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET peso = :peso, precio = :precio WHERE id = :id");

		$stmt->bindParam(":id", $idModificar, PDO::PARAM_STR);
		$stmt->bindParam(":peso", $pesoModificar, PDO::PARAM_STR);
		$stmt->bindParam(":precio", $costoModificar, PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
			
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MODIFICAR ESTADO DE LA VENTA
	=============================================*/

	static public function mdlActualizarCompra($tabla, $idVenta, $accion){
		

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estatus = :estatus WHERE id_venta = :id");

		$stmt->bindParam(":id", $idVenta, PDO::PARAM_STR);
		$stmt->bindParam(":estatus", $accion, PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
			
		}

		$stmt->close();
		$stmt = null;

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

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE estatus != 'Pendiente' ORDER BY id DESC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	BUSCAR POR FECHA
	=============================================*/	

	static public function mdlBuscarFecha($tabla, $fecha){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha LIKE '%$fecha%' ORDER BY id DESC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR VENTAS
	=============================================*/	

	static public function mdlMostrarVentasPendientes($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE estatus = 'Pendiente' ORDER BY id DESC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR VENTAS
	=============================================*/	

	static public function mdlMostrarUnaVenta($tabla, $idVenta){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_venta = :idVenta");

		$stmt -> bindParam(":idVenta", $idVenta, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR ABONOS DE CLIENTE
	=============================================*/	

	static public function mdlMostrarAbonosCliente($tabla, $idVenta){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_venta = :idVenta");

		$stmt -> bindParam(":idVenta", $idVenta, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}


	/*=============================================
	MOSTRAR VENTAS POR NOMBRE E ID
	=============================================*/	

	static public function mdlMostrarVentaDetalle($tabla, $idVenta, $nombreCliente){

		$estatus = "Credito";

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE cliente = :cliente AND estatus = :estatus");

		$stmt -> bindParam(":cliente", $nombreCliente, PDO::PARAM_STR);
		$stmt -> bindParam(":estatus", $estatus, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR PRODUCTO
	=============================================*/	

	static public function mdlMostrarProducto($tabla, $idProducto){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :idProducto LIMIT 1");

		$stmt -> bindParam(":idProducto", $idProducto, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetch();

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

	/*=============================================
	MODIFICAR ESTADO DE LA VENTA
	=============================================*/

	static public function mdlGuardarCaja($tabla, $inicio, $fin, $cuenta, $diferencia){
		
		date_default_timezone_set("America/Mexico_City");
		$fecha = date("Y-m-d");
		
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (inicio, fin, cuenta, diferencia, fecha) VALUES (:inicio, :fin, :cuenta, :diferencia, :fecha)");

		$stmt->bindParam(":inicio", $inicio, PDO::PARAM_STR);
		$stmt->bindParam(":fin", $fin, PDO::PARAM_STR);
		$stmt->bindParam(":cuenta", $cuenta, PDO::PARAM_STR);
		$stmt->bindParam(":diferencia", $diferencia, PDO::PARAM_STR);
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