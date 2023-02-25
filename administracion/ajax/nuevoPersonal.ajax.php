<?php


require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

class AjaxModificaUsr {

	public $idUsr;
	public $nombreUsr;
	public $paternoUsr;
	public $maternoUsr;
	public $emailUsr;
	public $pwdUsr;
	
	public function modificarUsr(){

 		$idUsr = $this->idUsr;
 		$nombreUsr = $this->nombreUsr;
		$paternoUsr = $this->paternoUsr;
	    $maternoUsr = $this->maternoUsr;
	    $emailUsr = $this->emailUsr;
	    $pwdUsr = $this->pwdUsr;

	    $mod= ControladorUsuarios::ctrActualizarUsuario($idUsr,$nombreUsr,$paternoUsr,$maternoUsr,$emailUsr,$pwdUsr);

	    if($mod == "ok"){

			echo "ok";
		}
		else {

			echo "error";
		}

	}

	public $nombreNuevoUsr;
	public $paternoNuevoUsr;
	public $maternoNuevoUsr;
	public $emailNuevoUsr;
	public $pwdNuevoUsr;
	
	public function nuevoUsr(){

		$nombreNuevoUsr =$this->nombreNuevoUsr;
		$paternoNuevoUsr =$this->paternoNuevoUsr;
		$maternoNuevoUsr =$this->maternoNuevoUsr;
		$emailNuevoUsr =$this->emailNuevoUsr;
		$pwdNuevoUsr =$this->pwdNuevoUsr;

		$nuevo = ControladorUsuarios::ctrInsertarUsuario($nombreNuevoUsr,$paternoNuevoUsr,$maternoNuevoUsr,$emailNuevoUsr,$pwdNuevoUsr);

		if($nuevo == "ok"){

			echo "ok";
		}
		else {

			echo "error";
		}

	}

}


if(isset($_POST["accion"]) && $_POST["accion"] == "actualizar"){

	$actualizar = new AjaxModificaUsr();
	$actualizar -> idUsr = $_POST["id"];
	$actualizar -> nombreUsr = $_POST["nombre"];
	$actualizar -> paternoUsr = $_POST["paterno"];
	$actualizar -> maternoUsr = $_POST["materno"];
	$actualizar -> emailUsr = $_POST["email"];
	$actualizar -> pwdUsr = $_POST["pwd"];
	$actualizar -> modificarUsr();

}

if(isset($_POST["accion"]) && $_POST["accion"] == "nuevo"){

	$nuevo = new AjaxModificaUsr();
	$nuevo -> nombreNuevoUsr = $_POST["nombre"];
	$nuevo -> paternoNuevoUsr = $_POST["paterno"];
	$nuevo -> maternoNuevoUsr = $_POST["materno"];
	$nuevo -> emailNuevoUsr = $_POST["email"];
	$nuevo -> pwdNuevoUsr = $_POST["pwd"];
	$nuevo -> nuevoUsr();

}
