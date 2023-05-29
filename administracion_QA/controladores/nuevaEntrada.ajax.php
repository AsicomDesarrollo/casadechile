<?php

require_once "../controladores/entradas.controlador.php";
require_once "../modelos/entradas.modelo.php";


class AjaxModificaEntrada{

	public $entradaId;
	public $productoEntrada;
	public $pesoEntrada;
	public $precioEntrada;
	public $proveedorEntrada;

	public function modificarEntrada(){

 		$entradaId = $this->entradaId;
 		$productoEntrada = $this->productoEntrada;
		$pesoEntrada = $this->pesoEntrada;
	    $precioEntrada = $this->precioEntrada;
	    $proveedorEntrada = $this->proveedorEntrada;

	    $modEnt = ControladorEntradas::ctrActualizarEntradas($entradaId,$productoEntrada,$pesoEntrada,$precioEntrada,$proveedorEntrada);

	    if($modEnt == "ok"){

			echo "ok";
		}
		else {

			echo "error";
		}

	}


	public $productoEntradaNuevo;
	public $entradaNuevoPeso;
	public $entradaNuevoPrecio;
	public $entradaNuevoProveedor;
	
	public function nuevaEntrada(){

		$productoEntradaNuevo = $this->productoEntradaNuevo;
		$entradaNuevoPeso = $this->entradaNuevoPeso;
		$entradaNuevoPrecio = $this->entradaNuevoPrecio;
		$entradaNuevoProveedor = $this->entradaNuevoProveedor;

		$nuevaEnt = ControladorEntradas::ctrInsertarEntradas($productoNuevoNombre,$entradaNuevoPeso,$entradaNuevoPrecio,$entradaNuevoProveedor);

		if($nuevaEnt == "ok"){

			echo "ok";
		}
		else {

			echo "error";
		}

	}

}


if(isset($_POST["accion"]) && $_POST["accion"] == "actualizar"){

	$actualizarEntrada = new AjaxModificaEntrada();
	$actualizarEntrada -> entradaId = $_POST["id"];
	$actualizarEntrada -> productoEntrada = $_POST["nombre"];
	$actualizarEntrada -> pesoEntrada = $_POST["peso"];
	$actualizarEntrada -> precioEntrada = $_POST["precio"];
	$actualizarEntrada -> proveedorEntrada = $_POST["proveedor"];
	$actualizarEntrada -> modificarEntrada();

}

if(isset($_POST["accion"]) && $_POST["accion"] == "nuevo"){

	$nuevaEntrada = new AjaxModificaEntrada();
	$nuevaEntrada -> productoEntradaNuevo = $_POST["nombre"];
	$nuevaEntrada -> entradaNuevoPeso = $_POST["peso"];
	$nuevaEntrada -> entradaNuevoPrecio = $_POST["precio"];
	$nuevaEntrada -> entradaNuevoProveedor = $_POST["proveedor"];
	$nuevaEntrada -> nuevaEntrada();

}
