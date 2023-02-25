<?php


require_once "../controladores/ventas.controlador.php";
require_once "../modelos/ventas.modelo.php";

require_once "../controladores/inicio.controlador.php";
require_once "../modelos/inicio.modelo.php";

class AjaxVentas{

	/*=============================================
	TRAER VENTA
	=============================================*/	

	public $idCompra;

	public function ajaxTraerVenta(){

		$resultado = array();

		$idCompra = $this->idCompra;

		$respuesta = ControladorVentas::ctrTraerVenta($idCompra);

		$usuario = ControladorVentas::ctrMostrarUsuarioCompra($respuesta["id_usuario"]);

		$producto = ControladorVentas::ctrMostrarNombreProducto($respuesta["id_producto"]);

		$resultado["id_pay"] = $respuesta["id_pay"];
		$resultado["id_usuario"] = $usuario["nombre"]." ".$usuario["paterno"]." ".$usuario["materno"];
		$resultado["cantidad"] = $respuesta["cantidad"];
		$resultado["id_producto"] = $producto["nombre"];
		$resultado["monto"] = $respuesta["monto"];
		$resultado["direccion"] = $usuario["direccion"];
		$resultado["status"] = $respuesta["status"];

		echo json_encode($resultado);

	}

	public $idVenta;
	public $accion;

	public function ajaxEfectivo(){

		$idVenta = $this->idVenta;
		$accion = $this->accion;

		$actualizacion = ControladorVentas::ctrActualizarCompra($idVenta, $accion);

		echo $actualizacion;

	}

	public function ajaxTransferencia(){

		$idVenta = $this->idVenta;
		$accion = $this->accion;
		
		$actualizacion = ControladorVentas::ctrActualizarCompra($idVenta, $accion);

		echo $actualizacion;

	}

	public function ajaxTarjeta(){

		$idVenta = $this->idVenta;
		$accion = $this->accion;

		$actualizacion = ControladorVentas::ctrActualizarCompra($idVenta, $accion);

		echo $actualizacion;
		
	}

	public $fechaLimite;

	public function ajaxCredito(){

		$idVenta = $this->idVenta;
		$accion = $this->accion;
		$fechaLimite = $this->fechaLimite;

		$actualizacion = ControladorVentas::ctrActualizarCompraCredito($idVenta, $fechaLimite);

		echo $actualizacion;
		
	}

	public $idModificar;
	public $costoModificar;
	public $pesoModificar;

	public function ajaxModificar(){

		$idModificar = $this->idModificar;
		$costoModificar = $this->costoModificar;
		$pesoModificar = $this->pesoModificar;

		$actualizacion = ControladorVentas::ctrActualizarPedido($idModificar, $costoModificar, $pesoModificar);

		if($actualizacion == "ok"){

			echo "ok";

		}else{

			echo "error";
			
		}
		
	}

	public $idCancelar;

	public function ajaxCancelar(){

		$idCancelar = $this->idCancelar;

		$cancelar = ControladorInicio::ctrCancelarVenta($idCancelar);

		if($cancelar == "ok"){

			echo "ok";

		}else{

			echo "error";
			
		}
		
	}

	public $prestamoConcepto;
	public $prestamoMonto;

	public function ajaxPagarPrestamo(){

		$prestamoConcepto = $this->prestamoConcepto;
		$prestamoMonto = $this->prestamoMonto;

		$cancelar = ControladorInicio::ctrPagarPrestamo($prestamoConcepto, $prestamoMonto);

		if($cancelar == "ok"){

			echo "ok";

		}else{

			echo "error";
			
		}
		
	}

}

/*=============================================
TRAER PRODUCTO
=============================================*/
if(isset($_POST["idCompra"])){

	$traerProducto = new AjaxVentas();
	$traerProducto -> idCompra = $_POST["idCompra"];
	$traerProducto -> ajaxTraerVenta();

}

/*=============================================
TRAER PRODUCTO
=============================================*/
if(isset($_POST["accion"]) && $_POST["accion"]=="Pagado en efectivo"){

	$traerProducto = new AjaxVentas();
	$traerProducto -> idVenta = $_POST["idVenta"];
	$traerProducto -> accion = $_POST["accion"];
	$traerProducto -> ajaxEfectivo();

}

/*=============================================
TRAER PRODUCTO
=============================================*/
if(isset($_POST["accion"]) && $_POST["accion"]=="Pagado por transferencia"){

	$traerProducto = new AjaxVentas();
	$traerProducto -> idVenta = $_POST["idVenta"];
	$traerProducto -> accion = $_POST["accion"];
	$traerProducto -> ajaxTransferencia();

}

/*=============================================
TRAER PRODUCTO
=============================================*/
if(isset($_POST["accion"]) && $_POST["accion"]=="Pagado con tarjeta"){

	$traerProducto = new AjaxVentas();
	$traerProducto -> idVenta = $_POST["idVenta"];
	$traerProducto -> accion = $_POST["accion"];
	$traerProducto -> ajaxTarjeta();

}

/*=============================================
TRAER PRODUCTO
=============================================*/
if(isset($_POST["accion"]) && $_POST["accion"]=="Credito"){

	$traerProducto = new AjaxVentas();
	$traerProducto -> idVenta = $_POST["idVenta"];
	$traerProducto -> fechaLimite = $_POST["fechaLimite"];
	$traerProducto -> accion = $_POST["accion"];
	$traerProducto -> ajaxCredito();

}

/*=============================================
MODIFICAR PEDIDO
=============================================*/
if(isset($_POST["accion"]) && $_POST["accion"]=="actualizarProducto"){

	$traerProducto = new AjaxVentas();
	$traerProducto -> idModificar = $_POST["idCompra"];
	$traerProducto -> costoModificar = $_POST["idCosto"];
	$traerProducto -> pesoModificar = $_POST["idPeso"];
	$traerProducto -> ajaxModificar();

}

/*=============================================
CANCELAR VENTA
=============================================*/
if(isset($_POST["accion"]) && $_POST["accion"]=="Cancelar"){

	$traerProducto = new AjaxVentas();
	$traerProducto -> idCancelar = $_POST["idCancelar"];
	$traerProducto -> ajaxCancelar();

}

/*=============================================
PAGAR PRESTAMO
=============================================*/
if(isset($_POST["accion"]) && $_POST["accion"]=="Pagar prestamo"){

	$traerProducto = new AjaxVentas();
	$traerProducto -> prestamoConcepto = $_POST["concepto"];
	$traerProducto -> prestamoMonto = $_POST["monto"];
	$traerProducto -> ajaxPagarPrestamo();

}


