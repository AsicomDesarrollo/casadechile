<?php

require_once "../modelos/conexion.php";

class AjaxContrasena{

	public $id;
	public $contrasena;

	public function ajaxCambiar(){

		$tabla = "usuarios";

		$id = $this->id;
		$password = $this->password;

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET password = :password WHERE id = :id");

		$stmt->bindParam(":password", $password, PDO::PARAM_STR);
		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);

		if($stmt->execute()){

			echo "ok";

		}else{

			echo "error";
		
		}

	}

}

if(isset($_POST["id"])){

	$vista = new AjaxContrasena();
	$vista -> id = $_POST["id"];
	$vista -> password = $_POST["contrasena"];
	$vista -> ajaxCambiar();


}