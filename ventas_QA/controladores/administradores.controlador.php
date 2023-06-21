<?php

class ControladorAdministradores{

	/*=============================================
	INGRESO DE ADMINISTRADOR
	=============================================*/

	public function ctrIngresoAdministrador(){

		if(isset($_POST["ingEmail"])){

			$_SESSION["validarSesionBackend"] = "ok";
					

					/*echo '<script>

						window.location = "inicio";

					</script>';*/

			
			if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["ingEmail"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){
			   
				$tabla = "usuarios";
				$item = "email";
				$valor = $_POST["ingEmail"];

				$respuesta = ModeloAdministradores::mdlMostrarAdministradores($tabla, $item, $valor);

				if($_POST["ingEmail"] == $respuesta["email"] && $_POST["ingPassword"] == $respuesta["password"]){

					$_SESSION["validarSesionBackend"] = "ok";
					$_SESSION["id"] = $respuesta["id"];
					$_SESSION["nombre"] = $respuesta["nombre"];
					$_SESSION["paterno"] = $respuesta["paterno"];
					$_SESSION["materno"] = $respuesta["materno"];
					$_SESSION["email"] = $respuesta["email"];
					$_SESSION["tipoUsuario"] = $respuesta["estatus"];

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

		$tabla = "personal";

		$respuesta = ModeloAdministradores::mdlMostrarTodos($tabla);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR Administradores
	=============================================*/

	static public function ctrMostrarAdministradoresSucursal(){

		$tabla = "personal";

		$respuesta = ModeloAdministradores::mdlMostrarAdministradoresSucursal($tabla);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR Personal de Sucursal
	=============================================*/

	static public function ctrMostrarPersonalSucursal(){

		$tabla = "personal";

		$respuesta = ModeloAdministradores::mdlMostrarPersonalSucursal($tabla);

		return $respuesta;

	}

	static public function ctrMostrarSucursales(){

		$tabla = "sucursales";

		$respuesta = ModeloAdministradores::mdlMostrarSucursales($tabla);

		return $respuesta;

	}

}