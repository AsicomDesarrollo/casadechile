<?php

require_once "conexion.php";

class ModeloUsuarios{

	/*=============================================
	MOSTRAR EL TOTAL DE USUARIOS
	=============================================*/	

	static public function mdlMostrarTotalUsuarios($tabla, $orden){
	
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $orden DESC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt-> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR EL TOTAL DE USUARIOS APLICACION
	=============================================*/	

	static public function mdlMostrarTotalUsuariosA($tabla, $orden){
	
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $orden DESC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt-> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function mdlMostrarUsuarios($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;


	}

	/*=============================================
	MOSTRAR TECNICOS
	=============================================*/

	static public function mdlMostrarTecnicos($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE tipo = 3 ORDER BY id DESC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;


	}

	/*=============================================
	MOSTRAR SUCURSALES
	=============================================*/

	static public function mdlMostrarSucursales($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY nombre ASC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;


	}

	/*=============================================
	MOSTRAR SUCURSALES
	=============================================*/

	static public function mdlMostrarReceptor($tabla, $id){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :id LIMIT 1");

		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);

		$stmt -> execute();
		
		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;


	}

	/*=============================================
	NUEVO USUARIO
	=============================================*/

	static public function mdlNuevoUsuario($tabla, $usuarioNombre, $usuarioPaterno, $usuarioMaterno, $usuarioTelefono, $usuarioMail, $usuarioEmpresa){

		$estatus = 0;
		date_default_timezone_set("America/Mexico_City");
		$fecha = date("Y-m-d H:i:s");

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE email = :mail LIMIT 1");

		$stmt -> bindParam(":mail", $usuarioMail, PDO::PARAM_STR);

		$stmt -> execute();
		
		if($stmt -> fetch() == false){

			$stmtA = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, paterno, materno, empresa, email, telefono, estatus, fecha) VALUES (:nombre, :paterno, :materno, :empresa, :email, :telefono, :estatus, :fecha)");

			$stmtA->bindParam(":nombre", $usuarioNombre, PDO::PARAM_STR);
			$stmtA->bindParam(":paterno", $usuarioPaterno, PDO::PARAM_STR);
			$stmtA->bindParam(":materno", $usuarioMaterno, PDO::PARAM_STR);
			$stmtA->bindParam(":empresa", $usuarioEmpresa, PDO::PARAM_STR);
			$stmtA->bindParam(":email", $usuarioMail, PDO::PARAM_STR);
			$stmtA->bindParam(":telefono", $usuarioTelefono, PDO::PARAM_STR);
			$stmtA->bindParam(":estatus", $estatus, PDO::PARAM_STR);
			$stmtA->bindParam(":fecha", $fecha, PDO::PARAM_STR);

			if($stmtA->execute()){

				return "ok";

			}else{

				return "error";
			
			}

			$stmtA->close();
			$stmtA = null;

		}else{

			return "existe";

			$stmt->close();
			$stmt = null;

		}

		

	}

	/*=============================================
	NUEVO ADMIN
	=============================================*/

	static public function mdlNuevoAdmin($tabla, $usuarioNombre, $usuarioPaterno, $usuarioMaterno, $usuarioTelefono, $usuarioMail, $sucursal){

		$tipo = 2;
		date_default_timezone_set("America/Mexico_City");
		$fecha = date("Y-m-d H:i:s");

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, paterno, materno, email, telefono, sucursal, tipo, fecha) VALUES (:nombre, :paterno, :materno, :email, :telefono, :sucursal, :tipo, :fecha)");

		$stmt->bindParam(":nombre", $usuarioNombre, PDO::PARAM_STR);
		$stmt->bindParam(":paterno", $usuarioPaterno, PDO::PARAM_STR);
		$stmt->bindParam(":materno", $usuarioMaterno, PDO::PARAM_STR);
		$stmt->bindParam(":email", $usuarioMail, PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $usuarioTelefono, PDO::PARAM_STR);
		$stmt->bindParam(":sucursal", $sucursal, PDO::PARAM_STR);
		$stmt->bindParam(":tipo", $tipo, PDO::PARAM_STR);
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
	NUEVO PERSONAL
	=============================================*/

	static public function mdlNuevoPersonal($tabla, $usuarioNombre, $usuarioPaterno, $usuarioMaterno, $usuarioTelefono, $usuarioMail, $sucursal){

		$tipo = 3;
		date_default_timezone_set("America/Mexico_City");
		$fecha = date("Y-m-d H:i:s");

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, paterno, materno, email, telefono, sucursal, tipo, fecha) VALUES (:nombre, :paterno, :materno, :email, :telefono, :sucursal, :tipo, :fecha)");

		$stmt->bindParam(":nombre", $usuarioNombre, PDO::PARAM_STR);
		$stmt->bindParam(":paterno", $usuarioPaterno, PDO::PARAM_STR);
		$stmt->bindParam(":materno", $usuarioMaterno, PDO::PARAM_STR);
		$stmt->bindParam(":email", $usuarioMail, PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $usuarioTelefono, PDO::PARAM_STR);
		$stmt->bindParam(":sucursal", $sucursal, PDO::PARAM_STR);
		$stmt->bindParam(":tipo", $tipo, PDO::PARAM_STR);
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
	NUEVA TIENDA
	=============================================*/

	static public function mdlNuevaTienda($tabla, $nombre, $direccion, $telefono){

		date_default_timezone_set("America/Mexico_City");
		$fecha = date("Y-m-d H:i:s");

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, direccion, telefono, fecha) VALUES (:nombre, :direccion, :telefono, :fecha)");

		$stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $direccion, PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $telefono, PDO::PARAM_STR);
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
	NUEVA VENTA
	=============================================*/

	static public function mdlNuevaVenta($tabla, $ventaSucursal, $ventaCliente, $ventaPersonal, $ventaEquipo, $ventaMarca, $ventaModelo, $ventaSerie, $ventaFalla, $ventaCondiciones, $ventaCosto, $ventaAnticipo, $ventaRecibe){

		$estatus = "En proceso";
		$estatusPago = "";

		if($ventaCosto == $ventaAnticipo){
			$estatusPago = "Pagado";
		}else{
			$estatusPago = "Pendiente";
		}
		
		date_default_timezone_set("America/Mexico_City");
		$fecha = date("Y-m-d H:i:s");

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_sucursal,	id_cliente,	id_personal, tipo_equipo, marca,	modelo, serie, falla, condiciones, costo, anticipo, recibe, estatus, estatus_pago, fecha_ingreso) VALUES (:sucursal, :cliente, :personal, :equipo, :marca, :modelo, :serie, :falla, :condiciones, :costo, :anticipo, :recibe, :estatus, :pago, :fecha)");

		$stmt->bindParam(":sucursal", $ventaSucursal, PDO::PARAM_STR);
		$stmt->bindParam(":cliente", $ventaCliente, PDO::PARAM_STR);
		$stmt->bindParam(":personal", $ventaPersonal, PDO::PARAM_STR);
		$stmt->bindParam(":equipo", $ventaEquipo, PDO::PARAM_STR);
		$stmt->bindParam(":marca", $ventaMarca, PDO::PARAM_STR);
		$stmt->bindParam(":modelo", $ventaModelo, PDO::PARAM_STR);
		$stmt->bindParam(":serie", $ventaSerie, PDO::PARAM_STR);
		$stmt->bindParam(":falla", $ventaFalla, PDO::PARAM_STR);
		$stmt->bindParam(":condiciones", $ventaCondiciones, PDO::PARAM_STR);
		$stmt->bindParam(":costo", $ventaCosto, PDO::PARAM_STR);
		$stmt->bindParam(":anticipo", $ventaAnticipo, PDO::PARAM_STR);
		$stmt->bindParam(":recibe", $ventaRecibe, PDO::PARAM_STR);
		$stmt->bindParam(":estatus", $estatus, PDO::PARAM_STR);
		$stmt->bindParam(":pago", $estatusPago, PDO::PARAM_STR);
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
	Actualizar usuario
	=============================================*/

	static public function mdlActualizarUsuario($tabla,$id,$nombre,$paterno,$materno,$email,$password){

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
	INSERTAR usuario
	=============================================*/	

	static public function mdlInsertarUsuario($tabla, $nombre, $paterno, $materno, $email,$password){

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


}