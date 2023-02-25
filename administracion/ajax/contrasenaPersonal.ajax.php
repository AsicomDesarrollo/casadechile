<?php

require_once "../modelos/conexion.php";

class AjaxContrasenaPersonal{

	public $id;
	public $contrasena;

	public function ajaxCambiar(){

		$tabla = "personal";

		$id = $this->id;
		$password = $this->password;

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET password = :password WHERE email = :id");

		$stmt->bindParam(":password", $password, PDO::PARAM_STR);
		$stmt -> bindParam(":id", $id, PDO::PARAM_STR);

		if($stmt->execute()){

			echo "ok";

		}else{

			echo "error";
		
		}

	}

}

if(isset($_POST["id"])){

	$vista = new AjaxContrasenaPersonal();
	$vista -> id = $_POST["id"];
	$vista -> password = $_POST["contrasena"];
	$vista -> ajaxCambiar();


}