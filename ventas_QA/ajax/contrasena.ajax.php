<?php

require_once "../modelos/conexion.php";

class AjaxContrasena{

	public $id;
	public $contrasena;

	public function ajaxCambiar(){
		
		$id = $this->id;
		$contrasena = $this->contrasena;

		$stmt = Conexion::conectar()->prepare("UPDATE usuarios SET password = :password WHERE email = :id");

		$stmt -> bindParam(":password", $contrasena, PDO::PARAM_STR);
		$stmt -> bindParam(":id", $id, PDO::PARAM_STR);

		if($stmt -> execute()){

			echo "ok";
		
		}else{

			echo "error";	

		}

		//$hashpass = password_hash($contrasena, PASSWORD_BCRYPT, ['cost' => 11,]);

		//$conexion = mysqli_connect("localhost", "u153641525_tienda", "rzocdzna58", "u153641525_tienda");

		//mysqli_query($conexion,"UPDATE usuarios SET password = '$contrasena' WHERE id = '$id'") or die(mysqli_error($conexion));

		//echo "ok";

	}

}

if(isset($_POST["id"])){

	$vista = new AjaxContrasena();
	$vista -> id = $_POST["id"];
	$vista -> contrasena = $_POST["contrasena"];
	$vista -> ajaxCambiar();


}