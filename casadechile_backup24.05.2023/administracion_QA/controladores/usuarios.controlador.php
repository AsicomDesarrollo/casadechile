<?php

class ControladorUsuarios{

	/*=============================================
	MOSTRAR TOTAL USUARIOS
	=============================================*/

	static public function ctrMostrarTotalUsuarios($orden){

		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::mdlMostrarTotalUsuarios($tabla, $orden);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR TOTAL USUARIOS APLICACION
	=============================================*/

	static public function ctrMostrarTotalUsuariosA($orden){

		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::mdlMostrarTotalUsuariosA($tabla, $orden);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function ctrMostrarUsuarios(){

		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla);

		return $respuesta;
	
	}

	/*=============================================
	MOSTRAR TECNICOS
	=============================================*/

	static public function ctrMostrarTecnicos(){

		$tabla = "personal";

		$respuesta = ModeloUsuarios::mdlMostrarTecnicos($tabla);

		return $respuesta;
	
	}

	/*=============================================
	MOSTRAR SUCURSALES
	=============================================*/

	static public function ctrMostrarSucursales(){

		$tabla = "sucursales";

		$respuesta = ModeloUsuarios::mdlMostrarSucursales($tabla);

		return $respuesta;
	
	}

	/*=============================================
	MOSTRAR RECEPTOR
	=============================================*/

	static public function ctrMostrarReceptor($id){

		$tabla = "personal";

		$respuesta = ModeloUsuarios::mdlMostrarReceptor($tabla, $id);

		return $respuesta;
	
	}

	/*=============================================
	MOSTRAR CLIENTE
	=============================================*/

	static public function ctrMostrarCliente($id){

		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::mdlMostrarReceptor($tabla, $id);

		return $respuesta;
	
	}

	/*=============================================
	ACTUALIZAR USUARIO
	=============================================*/

	static public function ctrActualizarUsuario($id,$nombre,$paterno,$materno,$email,$password){

		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla,$id,$nombre,$paterno,$materno,$email,$password);

		return $respuesta;
	
	}

	/*=============================================
	INSERTAR USUARIO
	=============================================*/

	static public function ctrInsertarUsuario($nombre,$paterno,$materno,$email,$password){

		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::mdlInsertarUsuario($tabla,$nombre,$paterno,$materno,$email,$password);

		return $respuesta;
	
	}

	/*=============================================
	NUEVO USUARIO
	=============================================*/

	static public function ctrNuevoUsuario($usuarioNombre, $usuarioPaterno, $usuarioMaterno, $usuarioTelefono, $usuarioMail,$usuarioEmpresa){

		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::mdlNuevoUsuario($tabla, $usuarioNombre, $usuarioPaterno, $usuarioMaterno, $usuarioTelefono, $usuarioMail, $usuarioEmpresa);

		return $respuesta;
	
	}

	/*=============================================
	NUEVO ADMIN
	=============================================*/

	static public function ctrNuevoAdmin($usuarioNombre, $usuarioPaterno, $usuarioMaterno, $usuarioTelefono, $usuarioMail, $sucursal){

		$tabla = "personal";

		$respuesta = ModeloUsuarios::mdlNuevoAdmin($tabla, $usuarioNombre, $usuarioPaterno, $usuarioMaterno, $usuarioTelefono, $usuarioMail, $sucursal);

		return $respuesta;
	
	}

	/*=============================================
	NUEVO PERSONAL
	=============================================*/

	static public function ctrNuevoPersonal($usuarioNombre, $usuarioPaterno, $usuarioMaterno, $usuarioTelefono, $usuarioMail, $sucursal){

		$tabla = "personal";

		$respuesta = ModeloUsuarios::mdlNuevoPersonal($tabla, $usuarioNombre, $usuarioPaterno, $usuarioMaterno, $usuarioTelefono, $usuarioMail, $sucursal);

		return $respuesta;
	
	}

	/*=============================================
	NUEVA TIENDA
	=============================================*/

	static public function ctrNuevaTienda($nombre, $direccion, $telefono){

		$tabla = "sucursales";

		$respuesta = ModeloUsuarios::mdlNuevaTienda($tabla, $nombre, $direccion, $telefono);

		return $respuesta;
	
	}

	/*=============================================
	NUEVA VENTA
	=============================================*/

	static public function ctrNuevaVenta($ventaSucursal, $ventaCliente, $ventaPersonal, $ventaEquipo, $ventaMarca, $ventaModelo, $ventaSerie, $ventaFalla, $ventaCondiciones, $ventaCosto, $ventaAnticipo, $ventaRecibe){

		$tabla = "compras";

		$respuesta = ModeloUsuarios::mdlNuevaVenta($tabla, $ventaSucursal, $ventaCliente, $ventaPersonal, $ventaEquipo, $ventaMarca, $ventaModelo, $ventaSerie, $ventaFalla, $ventaCondiciones, $ventaCosto, $ventaAnticipo, $ventaRecibe);

		return $respuesta;
	
	}

}