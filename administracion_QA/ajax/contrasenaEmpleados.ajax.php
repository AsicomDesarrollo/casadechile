<?php

require_once "../modelos/conexion.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


class AjaxContrasenaEmpleados{

	public $email='';
	public $password='';

	public function ajaxCambiar(){

		$tabla = "empleados";
		$email = $this->email;
		$password = AjaxContrasenaEmpleados::pass_hash($this->password);

		$stmt = Conexion::conectar()->prepare("UPDATE empleados SET pass = '1234' WHERE email = :email");

		// $stmt->bindParam(":pass", $password, PDO::PARAM_STR);
		$stmt->bindParam(":email", $id, PDO::PARAM_STR);
		
		if($stmt->execute()){
			header("Location: ./../empleados");
			print "update pass ok";
			//echo "<br>";
			//print_r($password);echo "<br>";
			//print_r($email);
			//var_dump($stmt);;echo "<br>";
			//print_r("Error: %s.\n");
			//print_r($stmt->errorInfo());
		}else{
			print "update pass error";
		}
		//var_dump($stmt->execute());
	}

	public static function pass_check($pass,$hash){
			//? password está definida!!
			if (password_verify($pass, $hash)) {
				return true;
			} else {
				return false;
			}
	}
	 
	public static function pass_hash($pass){
			$opciones = [ 'cost' => 12 ];
			$hash = password_hash($pass, PASSWORD_BCRYPT, $opciones);
			return $hash;
	}

}

if(isset($_POST["email"])){

	$vista = new AjaxContrasenaEmpleados();
	$vista -> email = $_POST["email"];
	$vista -> password = $_POST["contrasena"];
	$vista -> ajaxCambiar();

}

?>