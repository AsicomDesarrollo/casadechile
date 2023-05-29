<?php


require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";


class AjaxModificaClientes{

	public $clienteId;
	public $nombreCliente;
	public $adeudoCliente;
	public $limiteCliente;

	public function modificarCliente(){

 		$clienteId = $this->clienteId;
 		$nombreCliente = $this->nombreCliente;
		$adeudoCliente = $this->adeudoCliente;
	    $limiteCliente = $this->limiteCliente;

	    $mod = ControladorClientes::ctrActualizarClientes($clienteId,$nombreCliente,$adeudoCliente,$limiteCliente);

	    if($mod == "ok"){

			echo "ok";
		}
		else {

			echo "error";
		}

	}


	public $clienteNombreNuevo;
	public $adeudoNuevo;
	public $limiteNuevo;
	
	public function nuevosClientes(){

		$clienteNombreNuevo = $this->clienteNombreNuevo;
		$adeudoNuevo = $this->adeudoNuevo;
		$limiteNuevo = $this->limiteNuevo;

		$nuevo = ControladorClientes::ctrInsertarClientes($clienteNombreNuevo,$adeudoNuevo,$limiteNuevo);

		if($nuevo == "ok"){

			echo "ok";
		}
		else {

			echo "error";
		}

	}

}


if(isset($_POST["accion"]) && $_POST["accion"] == "actualizar"){

	$actualizaCliente = new AjaxModificaClientes();
	$actualizaCliente -> clienteId = $_POST["id"];
	$actualizaCliente -> nombreCliente = $_POST["nombre"];
	$actualizaCliente -> adeudoCliente = $_POST["adeudo"];
	$actualizaCliente -> limiteCliente = $_POST["limite"];
	$actualizaCliente -> modificarCliente();

}

if(isset($_POST["accion"]) && $_POST["accion"] == "nuevo"){

	$nuevoCliente = new AjaxModificaClientes();
	$nuevoCliente -> clienteNombreNuevo = $_POST["nombre"];
	$nuevoCliente -> adeudoNuevo = $_POST["adeudo"];
	$nuevoCliente -> limiteNuevo = $_POST["limite"];
	$nuevoCliente -> nuevosClientes();

}
