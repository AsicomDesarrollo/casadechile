<?php

class ControladorVentas{


	/*=============================================
	MOSTRAR UNA VENTA POR NOMBRE E ID
	=============================================*/

	static public function ctrMostrarVentaDetalle($idVenta,$nombreCliente){

		$tabla = "compras";

		$respuesta = ModeloVentas::mdlMostrarVentaDetalle($tabla, $idVenta, $nombreCliente);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR ABONOS DE UN CLIENTE
	=============================================*/

	static public function ctrMostrarAbonosCliente($idVenta){

		$tabla = "abono_clientes";

		$respuesta = ModeloVentas::mdlMostrarAbonosCliente($tabla, $idVenta);

		return $respuesta;

	}

	/*=============================================
	TRAER CLIENTES
	=============================================*/

	static public function ctrTraerClientes(){

		$tabla = "clientes";

		$respuesta = ModeloVentas::mdlTraerClientes($tabla);

		return $respuesta;

	}

	/*=============================================
	ACTUALIZAR COMPRA CREDITO
	=============================================*/

	static public function ctrActualizarCompraCredito($idVenta, $fechaLimite){

		$tabla = "compras";

		$respuesta = ModeloVentas::mdlActualizarCompraCredito($tabla, $idVenta, $fechaLimite);

		return $respuesta;

	}

	/*=============================================
	ACTUALIZAR PEDIDO
	=============================================*/

	static public function ctrActualizarPedido($idModificar, $costoModificar, $pesoModificar){

		$tabla = "compras";

		$respuesta = ModeloVentas::mdlActualizarPedido($tabla, $idModificar, $costoModificar, $pesoModificar);

		return $respuesta;

	}

	/*=============================================
	ACTUALIZAR COMPRA
	=============================================*/

	static public function ctrActualizarCompra($idVenta, $accion){

		$tabla = "compras";

		$respuesta = ModeloVentas::mdlActualizarCompra($tabla, $idVenta, $accion);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR TOTAL VENTAS
	=============================================*/

	static public function ctrMostrarTotalVentas(){

		$tabla = "compras";

		$respuesta = ModeloVentas::mdlMostrarTotalVentas($tabla);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR VENTAS
	=============================================*/

	static public function ctrMostrarVentas(){

		$tabla = "compras";

		$respuesta = ModeloVentas::mdlMostrarVentas($tabla);

		return $respuesta;

	}

	/*=============================================
	BUSCAR POR FECHA
	=============================================*/

	static public function ctrBuscarFecha($tabla, $fecha){

		$respuesta = ModeloVentas::mdlBuscarFecha($tabla, $fecha);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR VENTAS
	=============================================*/

	static public function ctrMostrarVentasPendientes(){

		$tabla = "compras";

		$respuesta = ModeloVentas::mdlMostrarVentasPendientes($tabla);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR UNA VENTA
	=============================================*/

	static public function ctrMostrarUnaVenta($idVenta){

		$tabla = "compras";

		$respuesta = ModeloVentas::mdlMostrarUnaVenta($tabla, $idVenta);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR NOMBRE DEL PRODUCTO
	=============================================*/

	static public function ctrMostrarProducto($idProducto){

		$tabla = "productos";

		$respuesta = ModeloVentas::mdlMostrarProducto($tabla, $idProducto);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR VENTAS
	=============================================*/

	static public function ctrMostrarUsuarioCompra($idUsuario){

		$tabla = "usuarios";

		$respuesta = ModeloVentas::mdlMostrarUsuarioCompra($tabla, $idUsuario);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR VENTAS
	=============================================*/

	static public function ctrMostrarNombreProducto($idProducto){

		$tabla = "productos";

		$respuesta = ModeloVentas::mdlMostrarNombreProducto($tabla, $idProducto);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR VENTAS
	=============================================*/

	static public function ctrMostrarServicios(){

		$tabla = "serviciossolicitados";

		$respuesta = ModeloVentas::mdlMostrarVentas($tabla);

		return $respuesta;

	}

	/*=============================================
	TRAER VENTA
	=============================================*/

	static public function ctrTraerVenta($id){

		$tabla = "compras";

		$respuesta = ModeloVentas::mdlTraerVenta($tabla, $id);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR PRODUCTO
	=============================================*/

	static public function ctrEditarVenta(){

		if(isset($_POST["eEstatus"])){

			$idVenta = $_POST["idCompra"];
			$estatus = $_POST["eEstatus"];
			

			$datos = array("idVenta"=>$idVenta,
							"estatus"=>$estatus);

			$respuesta = ModeloVentas::mdlModificarVenta("compras", $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El estado de la venta se ha modificado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
						if (result.value) {

						window.location = "ventas";

						}
					})

				</script>';

			}

		}

	}

}