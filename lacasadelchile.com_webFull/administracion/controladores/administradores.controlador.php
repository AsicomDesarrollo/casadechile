<?php

class ControladorAdministradores{

	/*=============================================
	INGRESO DE ADMINISTRADOR
	=============================================*/

	public function ctrIngresoAdministrador(){

		if(isset($_POST["ingEmail"])){

			if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["ingEmail"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){
			   
			   #$encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
						
				$tabla = "administradores";
				$item = "email";
				$valor = $_POST["ingEmail"];

				$respuesta = ModeloAdministradores::mdlMostrarAdministradores($tabla, $item, $valor);

				if($_POST["ingEmail"] == $respuesta["email"] && $_POST["ingPassword"] == $respuesta["password"]){

				//if($_POST["ingEmail"] != "" && $_POST["ingPassword"] != ""){

					$_SESSION["validarSesionBackend"] = "ok";
					$_SESSION["id"] = $respuesta["id"];
					$_SESSION["nombre"] = $respuesta["nombre"];
					$_SESSION["paterno"] = $respuesta["paterno"];
					$_SESSION["materno"] = $respuesta["materno"];
					$_SESSION["email"] = $respuesta["email"];
					//$_SESSION["telefono"] = $respuesta["telefono"];
					//$_SESSION["tipoUsuario"] = $respuesta["tipo"];

					echo '<script>

						window.location = "inicio";

					</script>';

				}else{

					echo '<br>
					<div class="alert alert-danger">Error al ingresar vuelva a intentarlo</div>';

				}


			}

		}

	}

	/*=============================================
	MOSTRAR TODOS
	=============================================*/

	static public function ctrMostrarTodos(){

		$tabla = "administradores";

		$respuesta = ModeloAdministradores::mdlMostrarTodos($tabla);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR Administradores
	=============================================*/

	static public function ctrMostrarAdministradoresSucursal(){

		$tabla = "administradores";

		$respuesta = ModeloAdministradores::mdlMostrarAdministradoresSucursal($tabla);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR Administradores 
	=============================================*/

	static public function ctrMostrarAdmin(){

		$tabla = "administradores";

		$respuesta = ModeloAdministradores::mdlMostrarAdmin($tabla);

		return $respuesta;

	}


	/*=============================================
	Actualizar administradores
	=============================================*/

	static public function ctrActualizarAdmin($id,$nombre,$paterno,$materno,$email,$password){

		$tabla = "administradores";

		$respuesta = ModeloAdministradores::mdlActualizarAdmin($tabla,$id,$nombre,$paterno,$materno,$email,$password);

		return $respuesta;

	}	

	/*=============================================
	Insertar administradores
	=============================================*/

	static public function ctrInsertarAdmin($nombre,$paterno,$materno,$email,$password){

		$tabla = "administradores";

		$respuesta = ModeloAdministradores::mdlInsertarAdmin($tabla,$nombre,$paterno,$materno,$email,$password);

		return $respuesta;

	}	

	/*=============================================
	MOSTRAR Personal de Sucursal
	=============================================*/

	static public function ctrMostrarPersonalSucursal(){

		$tabla = "administradores";

		$respuesta = ModeloAdministradores::mdlMostrarPersonalSucursal($tabla);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR Sucursales
	=============================================*/

	static public function ctrMostrarSucursales(){

		$tabla = "administradores";

		$respuesta = ModeloAdministradores::mdlMostrarSucursales($tabla);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR Personal Asginado A Una Venta
	=============================================*/

	static public function ctrMostrarPersonalVenta($id){

		$tabla = "administradores";

		$respuesta = ModeloAdministradores::mdlMostrarPersonalVenta($tabla,$id);

		return $respuesta;

	}

}