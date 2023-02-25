<?php

//ini_set('display_errors', 1);
//error_reporting(E_ALL);

require_once "conexion.php";

class ModeloProductos{


	/*=============================================
	TRAER PRODUCTOS POR CATEGORIA
	=============================================*/

	static public function mdlTraerProductosPorCategoria($tabla, $categoria){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE categoria = :categoria ORDER BY nombre ASC");

		$stmt -> bindParam(":categoria", $categoria, PDO::PARAM_INT);

		$stmt -> execute();
		
		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;
		
	}

	/*=============================================
	MOSTRAR EL TOTAL DE VENTAS
	=============================================*/	

	static public function mdlMostrarTotalProductos($tabla, $orden){
	
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $orden DESC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt-> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR SUMA VENTAS
	=============================================*/	

	static public function mdlMostrarSumaVentas($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT SUM(ventas) as total FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/

	static public function mdlMostrarProductos($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY nombre ASC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	TRAER DATOS DE PRODUCTO
	=============================================*/

	static public function mdlTraerProducto($tabla, $id){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);

		$stmt -> execute();
		
		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;
		
	}

	/*=============================================
	ACTUALIZAR PRODUCTOS
	=============================================*/

	static public function mdlActualizarProductos($tabla, $valor1, $valor2){

		if($valor1 == "1"){
			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET verificacion = 1 WHERE id = :id");
			$stmt -> bindParam(":id", $valor2, PDO::PARAM_INT);
			if($stmt -> execute()){

			return "ok";
		
			}else{

				return "error";	

			}

		$stmt -> close();

		$stmt = null;
		}else{
			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET verificacion = 0 WHERE id = :id");
			$stmt -> bindParam(":id", $valor2, PDO::PARAM_INT);
			if($stmt -> execute()){

			return "ok";
		
			}else{

				return "error";	

			}

		$stmt -> close();

		$stmt = null;
		}
		
	}

	/*=============================================
	INGRESAR PRODUCTO
	=============================================*/

	static public function mdlNuevoProducto($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, descripcion, precio_unidad, contenido_caja, precio_caja, material, casa, contenido, tipo, imagen_portada, imagen_producto, stock, tiempo_entrega) VALUES (:nombre, :descripcion, :precio_unidad, :contenido_caja, :precio_caja, :material, :casa, :contenido, :tipo, :imagen_portada, :imagen_producto, :stock, :tiempo_entrega)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":precio_unidad", $datos["precioUnidad"], PDO::PARAM_STR);
		$stmt->bindParam(":contenido_caja", $datos["contenidoCaja"], PDO::PARAM_STR);
		$stmt->bindParam(":precio_caja", $datos["precioCaja"], PDO::PARAM_STR);
		$stmt->bindParam(":material", $datos["material"], PDO::PARAM_STR);
		$stmt->bindParam(":casa", $datos["casa"], PDO::PARAM_STR);
		$stmt->bindParam(":contenido", $datos["contenido"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":imagen_portada", $datos["rutaPortada"], PDO::PARAM_STR);
		$stmt->bindParam(":imagen_producto", $datos["rutaProducto"], PDO::PARAM_STR);
		$stmt->bindParam(":stock", $datos["stock"], PDO::PARAM_STR);
		$stmt->bindParam(":tiempo_entrega", $datos["dias"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	ACTALIZAR PRODUCTOS
	=============================================*/	

	static public function mdlActualizarProd($tabla, $id, $nombre, $precio, $preciomin, $preciomax, $categoria){

		date_default_timezone_set("America/Mexico_City");
		$fecha = date("Y-m-d H:i:s");

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, precio = :precio, minimo = :preciomin, maximo = :preciomax, categoria = :categoria, fecha = :fecha WHERE id = :id");

		$stmt->bindParam(":id", $id, PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
		$stmt->bindParam(":precio", $precio, PDO::PARAM_STR);
		$stmt->bindParam(":preciomin", $preciomin, PDO::PARAM_STR);
		$stmt->bindParam(":preciomax", $preciomax, PDO::PARAM_STR);
		$stmt->bindParam(":categoria", $categoria, PDO::PARAM_STR);
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

	static public function mdlInsertarProd($tabla, $nombre, $precio, $preciomin, $preciomax, $categoria){

		date_default_timezone_set("America/Mexico_City");
		$fecha = date("Y-m-d H:i:s");
		
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, precio, minimo, maximo, categoria, fecha) VALUES (:nombre, :precio, :preciomin, :preciomax, :categoria, :fecha)");


		$stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
		$stmt->bindParam(":precio", $precio, PDO::PARAM_STR);
		$stmt->bindParam(":preciomin", $preciomin, PDO::PARAM_STR);
		$stmt->bindParam(":preciomax", $preciomax, PDO::PARAM_STR);
		$stmt->bindParam(":categoria", $categoria, PDO::PARAM_STR);
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
	MODIFICAR PRODUCTO
	=============================================*/

	static public function mdlModificarProducto($tabla, $datos){
		
		if($datos["rutaPortada"] == "" && $datos["rutaProducto"] == ""){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, descripcion = :descripcion, precio_unidad = :precio_unidad, contenido_caja = :contenido_caja, precio_caja = :precio_caja, material = :material, casa = :casa, contenido = :contenido, tipo = :tipo, stock = :stock, tiempo_entrega = :tiempo_entrega WHERE id = :id");

			$stmt->bindParam(":id", $datos["idProducto"], PDO::PARAM_STR);
			$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
			$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
			$stmt->bindParam(":precio_unidad", $datos["precioUnidad"], PDO::PARAM_STR);
			$stmt->bindParam(":contenido_caja", $datos["contenidoCaja"], PDO::PARAM_STR);
			$stmt->bindParam(":precio_caja", $datos["precioCaja"], PDO::PARAM_STR);
			$stmt->bindParam(":material", $datos["material"], PDO::PARAM_STR);
			$stmt->bindParam(":casa", $datos["casa"], PDO::PARAM_STR);
			$stmt->bindParam(":contenido", $datos["contenido"], PDO::PARAM_STR);
			$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
			$stmt->bindParam(":stock", $datos["stock"], PDO::PARAM_STR);
			$stmt->bindParam(":tiempo_entrega", $datos["dias"], PDO::PARAM_STR);

			if($stmt->execute()){

				return "ok";

			}else{

				return "error";
			
			}

			$stmt->close();
			$stmt = null;


		}else if($datos["rutaPortada"] == "" && !$datos["rutaProducto"] == ""){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, descripcion = :descripcion, precio_unidad = :precio_unidad, contenido_caja = :contenido_caja, precio_caja = :precio_caja, material = :material, casa = :casa, contenido = :contenido, tipo = :tipo, stock = :stock, tiempo_entrega = :tiempo_entrega, imagen_producto = :imagen_producto WHERE id = :id");

			$stmt->bindParam(":id", $datos["idProducto"], PDO::PARAM_STR);
			$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
			$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
			$stmt->bindParam(":precio_unidad", $datos["precioUnidad"], PDO::PARAM_STR);
			$stmt->bindParam(":contenido_caja", $datos["contenidoCaja"], PDO::PARAM_STR);
			$stmt->bindParam(":precio_caja", $datos["precioCaja"], PDO::PARAM_STR);
			$stmt->bindParam(":material", $datos["material"], PDO::PARAM_STR);
			$stmt->bindParam(":casa", $datos["casa"], PDO::PARAM_STR);
			$stmt->bindParam(":contenido", $datos["contenido"], PDO::PARAM_STR);
			$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
			$stmt->bindParam(":imagen_producto", $datos["rutaProducto"], PDO::PARAM_STR);
			$stmt->bindParam(":stock", $datos["stock"], PDO::PARAM_STR);
			$stmt->bindParam(":tiempo_entrega", $datos["dias"], PDO::PARAM_STR);

			if($stmt->execute()){

				return "ok";

			}else{

				return "error";
			
			}

			$stmt->close();
			$stmt = null;



		}else if(!$datos["rutaPortada"] == "" && $datos["rutaProducto"] == ""){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, descripcion = :descripcion, precio_unidad = :precio_unidad, contenido_caja = :contenido_caja, precio_caja = :precio_caja, material = :material, casa = :casa, contenido = :contenido, tipo = :tipo, stock = :stock, tiempo_entrega = :tiempo_entrega, imagen_portada = :imagen_portada WHERE id = :id");

			$stmt->bindParam(":id", $datos["idProducto"], PDO::PARAM_STR);
			$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
			$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
			$stmt->bindParam(":precio_unidad", $datos["precioUnidad"], PDO::PARAM_STR);
			$stmt->bindParam(":contenido_caja", $datos["contenidoCaja"], PDO::PARAM_STR);
			$stmt->bindParam(":precio_caja", $datos["precioCaja"], PDO::PARAM_STR);
			$stmt->bindParam(":material", $datos["material"], PDO::PARAM_STR);
			$stmt->bindParam(":casa", $datos["casa"], PDO::PARAM_STR);
			$stmt->bindParam(":contenido", $datos["contenido"], PDO::PARAM_STR);
			$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
			$stmt->bindParam(":imagen_portada", $datos["rutaPortada"], PDO::PARAM_STR);
			$stmt->bindParam(":stock", $datos["stock"], PDO::PARAM_STR);
			$stmt->bindParam(":tiempo_entrega", $datos["dias"], PDO::PARAM_STR);

			if($stmt->execute()){

				return "ok";

			}else{

				return "error";
			
			}

			$stmt->close();
			$stmt = null;


		}else{

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, descripcion = :descripcion, precio_unidad = :precio_unidad, contenido_caja = :contenido_caja, precio_caja = :precio_caja, material = :material, casa = :casa, contenido = :contenido, tipo = :tipo, stock = :stock, tiempo_entrega = :tiempo_entrega, imagen_portada = :imagen_portada, imagen_producto = :imagen_producto WHERE id = :id");

			$stmt->bindParam(":id", $datos["idProducto"], PDO::PARAM_STR);
			$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
			$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
			$stmt->bindParam(":precio_unidad", $datos["precioUnidad"], PDO::PARAM_STR);
			$stmt->bindParam(":contenido_caja", $datos["contenidoCaja"], PDO::PARAM_STR);
			$stmt->bindParam(":precio_caja", $datos["precioCaja"], PDO::PARAM_STR);
			$stmt->bindParam(":material", $datos["material"], PDO::PARAM_STR);
			$stmt->bindParam(":casa", $datos["casa"], PDO::PARAM_STR);
			$stmt->bindParam(":contenido", $datos["contenido"], PDO::PARAM_STR);
			$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
			$stmt->bindParam(":imagen_portada", $datos["rutaPortada"], PDO::PARAM_STR);
			$stmt->bindParam(":imagen_producto", $datos["rutaProducto"], PDO::PARAM_STR);
			$stmt->bindParam(":stock", $datos["stock"], PDO::PARAM_STR);
			$stmt->bindParam(":tiempo_entrega", $datos["dias"], PDO::PARAM_STR);

			if($stmt->execute()){

				return "ok";

			}else{

				return "error";
			
			}

			$stmt->close();
			$stmt = null;

		}

	}

}