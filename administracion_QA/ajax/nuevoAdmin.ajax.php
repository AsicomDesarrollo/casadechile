<?php


require_once "../controladores/administradores.controlador.php";
require_once "../modelos/administradores.modelo.php";

class AjaxModificaAdmin {

	public $idAdmin;
	public $nombreAdmin;
	public $paternoAdmin;
	public $maternoAdmin;
	public $emailAdmin;
	public $pwdAdmin;
	
	public function modificarAdmin(){

 		$idAdmin = $this->idAdmin;
 		$nombreAdmin = $this->nombreAdmin;
		$paternoAdmin = $this->paternoAdmin;
	    $maternoAdmin = $this->maternoAdmin;
	    $emailAdmin = $this->emailAdmin;
	    $pwdAdmin = $this->pwdAdmin;

	    $mod= ControladorAdministradores::ctrActualizarAdmin($idAdmin,$nombreAdmin,$paternoAdmin,$maternoAdmin,$emailAdmin,$pwdAdmin);

	    if($mod == "ok"){

			echo "ok";
		}
		else {

			echo "error";
		}

	}

	public $nombreNuevoAdmin;
	public $paternoNuevoAdmin;
	public $maternoNuevoAdmin;
	public $emailNuevoAdmin;
	public $pwdNuevoAdmin;
	
	public function nuevoAdmin(){

		$nombreNuevoAdmin =$this->nombreNuevoAdmin;
		$paternoNuevoAdmin =$this->paternoNuevoAdmin;
		$maternoNuevoAdmin =$this->maternoNuevoAdmin;
		$emailNuevoAdmin =$this->emailNuevoAdmin;
		$pwdNuevoAdmin =$this->pwdNuevoAdmin;

		$nuevo = ControladorAdministradores::ctrInsertarAdmin($nombreNuevoAdmin,$paternoNuevoAdmin,$maternoNuevoAdmin,$emailNuevoAdmin,$pwdNuevoAdmin);

		if($nuevo == "ok"){

			echo "ok";
		}
		else {

			echo "error";
		}

	}

}


if(isset($_POST["accion"]) && $_POST["accion"] == "actualizar"){

	$actualizar = new AjaxModificaAdmin();
	$actualizar -> idAdmin = $_POST["id"];
	$actualizar -> nombreAdmin = $_POST["nombre"];
	$actualizar -> paternoAdmin = $_POST["paterno"];
	$actualizar -> maternoAdmin = $_POST["materno"];
	$actualizar -> emailAdmin = $_POST["email"];
	$actualizar -> pwdAdmin = $_POST["pwd"];
	$actualizar -> modificarAdmin();

}

if(isset($_POST["accion"]) && $_POST["accion"] == "nuevo"){

	$nuevo = new AjaxModificaAdmin();
	$nuevo -> nombreNuevoAdmin = $_POST["nombre"];
	$nuevo -> paternoNuevoAdmin = $_POST["paterno"];
	$nuevo -> maternoNuevoAdmin = $_POST["materno"];
	$nuevo -> emailNuevoAdmin = $_POST["email"];
	$nuevo -> pwdNuevoAdmin = $_POST["pwd"];
	$nuevo -> nuevoAdmin();

}
