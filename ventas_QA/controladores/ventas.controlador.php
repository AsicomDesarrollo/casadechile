<?php

class ControladorVentas{

	/*=============================================
	GUARDAR
	=============================================*/

	static public function ctrGuardarCompra($id, $cliente, $idProducto, $peso, $precio, $tipo_pago){

		$tabla = "compras";

		$respuesta = ModeloVentas::mdlGuardarCompra($tabla, $id, $cliente, $idProducto, $peso, $precio , $tipo_pago);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR ULTIMO ID VENTA
	=============================================*/

	static public function ctrTraerUltimo(){

		$tabla = "compras";

		$respuesta = ModeloVentas::mdlTraerUltimo($tabla);

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