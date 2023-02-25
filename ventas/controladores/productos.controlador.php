<?php

class ControladorProductos{

	/*=============================================
	MOSTRAR TOTAL CATEGORIAS
	=============================================*/

	static public function ctrMostrarCategorias(){

		$tabla = "categorias";

		$respuesta = ModeloProductos::mdlMostrarCategorias($tabla);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR PRODUCTOS POR CATEGORIAS
	=============================================*/

	static public function ctrMostrarProductosCategoria($idCategoria){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlMostrarProductosCategoria($tabla, $idCategoria);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR TOTAL PRODUCTOS
	=============================================*/

	static public function ctrMostrarTotalProductos($orden){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlMostrarTotalProductos($tabla, $orden);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR SUMA VENTAS
	=============================================*/

	static public function ctrMostrarSumaVentas(){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlMostrarSumaVentas($tabla);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/

	static public function ctrMostrarProductos(){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlMostrarProductos($tabla);

		return $respuesta;
	
	}

	/*=============================================
	TRAER PRODUCTO
	=============================================*/

	static public function ctrTraerProducto($id){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlTraerProducto($tabla, $id);

		return $respuesta;
	
	}

	/*=============================================
	CREAR PRODUCTO
	=============================================*/

	static public function ctrCrearProducto(){

		if(isset($_POST["nombreProducto"])){

			/*=============================================
			VALIDAR IMAGEN BANNER
			=============================================*/

			$rutaPortada = "";
			$rutaProducto = "";
			$enviarRutaPortada = "";
			$enviarRutaProducto = "";

			$enviarRutaPortada = $_FILES["fotoPortada"]["name"];

			$location = "../tienda/productos/imagenes/".$_FILES['fotoPortada']['name'];
				
			move_uploaded_file($_FILES['fotoPortada']['tmp_name'], $location);

			$enviarRutaProducto = $_FILES["fotoProducto"]["name"];

			$location = "../tienda/productos/imagenes/".$_FILES['fotoProducto']['name'];
				
			move_uploaded_file($_FILES['fotoProducto']['tmp_name'], $location);

			$enviarNombre = $_POST["nombreProducto"];
			$enviarDescripcion = $_POST["descripcionProducto"];
			$enviarPrecioU = $_POST["precioUnidadProducto"];
			$enviarContenidoC = $_POST["contenidoCajaProducto"];
			$enviarPrecioC = $_POST["precioCajaProducto"];
			$enviarMaterial = $_POST["materialProducto"];
			$enviarCasa = $_POST["casaProducto"];
			$enviarContenido = $_POST["contenidoProducto"];
			$enviarTipo = $_POST["tipoProducto"];
			$enviarStock = $_POST["stockProducto"];
			$enviarDias = $_POST["tiempoProducto"];

			$datos = array("rutaPortada"=>$enviarRutaPortada,
						   	"rutaProducto"=>$enviarRutaProducto,
							"nombre"=>$enviarNombre,
							"descripcion"=>$enviarDescripcion,
							"precioUnidad"=>$enviarPrecioU,
							"contenidoCaja"=>$enviarContenidoC,
							"precioCaja"=>$enviarPrecioC,
							"material"=>$enviarMaterial,
							"casa"=>$enviarCasa,
							"contenido"=>$enviarContenido,
							"tipo"=>$enviarTipo,
							"stock"=>$enviarStock,
							"dias"=>$enviarDias);

			$respuesta = ModeloProductos::mdlNuevoProducto("productos", $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El producto ha sido guardado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
						if (result.value) {

						window.location = "productos";

						}
					})

				</script>';

			}

		}

	}

	/*=============================================
	EDITAR PRODUCTO
	=============================================*/

	static public function ctrEditarProducto(){

		if(isset($_POST["enombreProducto"])){

			/*=============================================
			VALIDAR IMAGEN BANNER
			=============================================*/

			$rutaPortada = "";
			$rutaProducto = "";
			$enviarRutaPortada = "";
			$enviarRutaProducto = "";

			if(!empty($_FILES["efotoPortada"]["tmp_name"])){

				$enviarRutaPortada = $_FILES["efotoPortada"]["name"];

				$location = "../tienda/productos/imagenes/".$_FILES['efotoPortada']['name'];
					
				move_uploaded_file($_FILES['efotoPortada']['tmp_name'], $location);

			}

			if(!empty($_FILES["efotoProducto"]["tmp_name"])){

				$enviarRutaProducto = $_FILES["efotoProducto"]["name"];

				$location = "../tienda/productos/imagenes/".$_FILES['efotoProducto']['name'];
					
				move_uploaded_file($_FILES['efotoProducto']['tmp_name'], $location);

			}

			$idProducto = $_POST["idProducto"];
			$enviarNombre = $_POST["enombreProducto"];
			$enviarDescripcion = $_POST["edescripcionProducto"];
			$enviarPrecioU = $_POST["eprecioUnidadProducto"];
			$enviarContenidoC = $_POST["econtenidoCajaProducto"];
			$enviarPrecioC = $_POST["eprecioCajaProducto"];
			$enviarMaterial = $_POST["ematerialProducto"];
			$enviarCasa = $_POST["ecasaProducto"];
			$enviarContenido = $_POST["econtenidoProducto"];
			$enviarTipo = $_POST["etipoProducto"];
			$enviarStock = $_POST["estockProducto"];
			$enviarDias = $_POST["etiempoProducto"];

			$datos = array("idProducto"=>$idProducto,
							"rutaPortada"=>$enviarRutaPortada,
						   	"rutaProducto"=>$enviarRutaProducto,
							"nombre"=>$enviarNombre,
							"descripcion"=>$enviarDescripcion,
							"precioUnidad"=>$enviarPrecioU,
							"contenidoCaja"=>$enviarContenidoC,
							"precioCaja"=>$enviarPrecioC,
							"material"=>$enviarMaterial,
							"casa"=>$enviarCasa,
							"contenido"=>$enviarContenido,
							"tipo"=>$enviarTipo,
							"stock"=>$enviarStock,
							"dias"=>$enviarDias);

			$respuesta = ModeloProductos::mdlModificarProducto("productos", $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El producto ha sido modificado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
						if (result.value) {

						window.location = "productos";

						}
					})

				</script>';

			}

		}

	}

}