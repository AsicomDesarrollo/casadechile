<?php

require_once "../controladores/entradas.controlador.php";
require_once "../modelos/entradas.modelo.php";

require_once "../controladores/inicio.controlador.php";
require_once "../modelos/inicio.modelo.php";


class AjaxModificaEntrada{

	public $entradaId;
	public $productoEntrada;
	public $pesoEntrada;
	public $precioEntrada;
	public $proveedorEntrada;
	public $metodoPago;

	public function modificarEntrada(){

 		$entradaId = $this->entradaId;
 		$productoEntrada = $this->productoEntrada;
		$pesoEntrada = $this->pesoEntrada;
	    $precioEntrada = $this->precioEntrada;
	    $proveedorEntrada = $this->proveedorEntrada;
	    $metodoPago = $this->metodoPago;

	    $modEnt = ControladorEntradas::ctrActualizarEntradas($entradaId,$productoEntrada,$pesoEntrada,$precioEntrada,$proveedorEntrada,$metodoPago);

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
	public $metodoPagoNuevo;
	
	public function nuevaEntrada(){

		$productoEntradaNuevo = $this->productoEntradaNuevo;
		$entradaNuevoPeso = $this->entradaNuevoPeso;
		$entradaNuevoPrecio = $this->entradaNuevoPrecio;
		$entradaNuevoProveedor = $this->entradaNuevoProveedor;
		$metodoPagoNuevo = $this->metodoPagoNuevo;

		$nuevaEnt = ControladorEntradas::ctrInsertarEntradas($productoEntradaNuevo,$entradaNuevoPeso,$entradaNuevoPrecio,$entradaNuevoProveedor,$metodoPagoNuevo);

		if($nuevaEnt == "ok"){

			echo "ok";
		}
		else {

			echo "error";
		}

	}

	public $idAbono;
	public $montoAbono;
	public $metodoPagoAbono;

	public function abonar(){

		$idAbono = $this->idAbono;
		$montoAbono = $this->montoAbono;
		$metodoPagoAbono = $this->metodoPagoAbono;

		$abono = ControladorEntradas::ctrInsertarAbono($idAbono,$montoAbono,$metodoPagoAbono);

		if($abono == "ok"){

			echo "ok";
		}
		else {

			echo "error";
		}

	}

	public $idAbonoVenta;
	public $montoAbonoVenta;
	public $metodoPagoAbonoVenta;

	public function abonarVenta(){

		$idAbonoVenta = $this->idAbonoVenta;
		$montoAbonoVenta = $this->montoAbonoVenta;
		$metodoPagoAbonoVenta = $this->metodoPagoAbonoVenta;

		$abono = ControladorEntradas::ctrInsertarAbonoVenta($idAbonoVenta,$montoAbonoVenta,$metodoPagoAbonoVenta);

		if($abono == "ok"){

			echo "ok";
		}
		else {

			echo "error";
		}

	}

	public $idCancelar;

	public function ajaxCancelar(){

		$idCancelar = $this->idCancelar;

		$cancelar = ControladorInicio::ctrCancelarEntrada($idCancelar);

		if($cancelar == "ok"){

			echo "ok";

		}else{

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
	$actualizarEntrada -> metodoPago = $_POST["estatus"];
	$actualizarEntrada -> modificarEntrada();

}

if(isset($_POST["accion"]) && $_POST["accion"] == "nuevo"){

	$nuevaEnt = new AjaxModificaEntrada();
	$nuevaEnt -> productoEntradaNuevo = $_POST["nombre"];
	$nuevaEnt -> entradaNuevoPeso = $_POST["peso"];
	$nuevaEnt -> entradaNuevoPrecio = $_POST["precio"];
	$nuevaEnt -> entradaNuevoProveedor = $_POST["proveedor"];
	$nuevaEnt -> metodoPagoNuevo = $_POST["estatus"];
	$nuevaEnt -> nuevaEntrada();

}

if(isset($_POST["accion"]) && $_POST["accion"] == "abonar"){

	$abono = new AjaxModificaEntrada();
	$abono -> idAbono = $_POST["id"];
	$abono -> montoAbono = $_POST["monto"];
	$abono -> metodoPagoAbono = $_POST["metodo"];
	$abono -> abonar();

}

if(isset($_POST["accion"]) && $_POST["accion"] == "abonarVenta"){

	$abono = new AjaxModificaEntrada();
	$abono -> idAbonoVenta = $_POST["id"];
	$abono -> montoAbonoVenta = $_POST["monto"];
	$abono -> metodoPagoAbonoVenta = $_POST["metodo"];
	$abono -> abonarVenta();

}

if(isset($_POST["accion"]) && $_POST["accion"] == "Cancelar"){

	$abono = new AjaxModificaEntrada();
	$abono -> idCancelar = $_POST["idCancelar"];
	$abono -> ajaxCancelar();

}
