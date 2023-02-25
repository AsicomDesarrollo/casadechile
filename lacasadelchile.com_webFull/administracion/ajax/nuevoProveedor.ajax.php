<?php

require_once "../controladores/proveedores.controlador.php";
require_once "../modelos/proveedores.modelo.php";


class AjaxModificaProveedor{

	public $provId;
	public $nombreProv;
	public $pagado;
	public $credito;

	public function modificarProveedor(){

 		$provId = $this->provId;
 		$nombreProv = $this->nombreProv;
		$pagado = $this->pagado;
	    $credito = $this->credito;

	    $modEnt = ControladorProveedores::ctrActualizarProveedor($provId,$nombreProv,$pagado,$credito);

	    if($modEnt == "ok"){

			echo "ok";
		}
		else {

			echo "error";
		}

	}


	public $provNombreNuevo;
	public $pagadoNuevo;
	public $creditoNuevo;
	
	public function nuevoProveedor(){

		$provNombreNuevo = $this->provNombreNuevo;
		$pagadoNuevo = $this->pagadoNuevo;
		$creditoNuevo = $this->creditoNuevo;

		$nuevo = ControladorProveedores::ctrInsertarProveedor($provNombreNuevo,$pagadoNuevo,$creditoNuevo);

		if($nuevo == "ok"){

			echo "ok";
		}
		else {

			echo "error";
		}

	}

}


if(isset($_POST["accion"]) && $_POST["accion"] == "actualizar"){

	$actualizaProv = new AjaxModificaProveedor();
	$actualizaProv -> provId = $_POST["id"];
	$actualizaProv -> nombreProv = $_POST["nombre"];
	$actualizaProv -> pagado = $_POST["pagado"];
	$actualizaProv -> credito = $_POST["credito"];
	$actualizaProv -> modificarProveedor();

}

if(isset($_POST["accion"]) && $_POST["accion"] == "nuevo"){

	$nuevoProv = new AjaxModificaProveedor();
	$nuevoProv -> provNombreNuevo = $_POST["nombre"];
	$nuevoProv -> pagadoNuevo = $_POST["pagado"];
	$nuevoProv -> creditoNuevo = $_POST["credito"];
	$nuevoProv -> nuevoProveedor();

}
