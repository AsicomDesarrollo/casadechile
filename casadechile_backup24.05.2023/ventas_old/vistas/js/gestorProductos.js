/*=============================================
CARGAR LA TABLA DINÁMICA DE PRODUCTOS
=============================================*/

$('.tablaProductos').DataTable({

	"ajax":"ajax/tablaProductos.ajax.php",
	"deferRender": true,
	"retrieve": true,
	"processing": true,
    "language": {

			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}

	}

});

/*=============================================
CARGAR DATOS PARA EDITAR PRODUCTO
=============================================*/

$(".tablaProductos tbody").on("click", ".btnEditarProducto", function(){

	console.log("click");

	var idProducto = $(this).attr("idProducto");

	$("#modalEditarProducto .idProducto").val(idProducto);

	var datosOpciones = new FormData();
	datosOpciones.append("idProducto", idProducto);

	$.ajax({
		url:"ajax/productos.ajax.php",
	 	method:"POST",
		data: datosOpciones,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success:function(respuesta){

			console.log(respuesta);

			$("#modalEditarProducto .enombreProducto").val(respuesta["nombre"]);
			$("#modalEditarProducto .edescripcionProducto").val(respuesta["descripcion"]);
			$("#modalEditarProducto .eprecioUnidadProducto").val(respuesta["precio_unidad"]);
			$("#modalEditarProducto .econtenidoCajaProducto").val(respuesta["contenido_caja"]);
			$("#modalEditarProducto .eprecioCajaProducto").val(respuesta["precio_caja"]);
			$("#modalEditarProducto .ematerialProducto").val(respuesta["material"]);
			$("#modalEditarProducto .ecasaProducto").val(respuesta["casa"]);
			$("#modalEditarProducto .econtenidoProducto").val(respuesta["contenido"]);
			$("#modalEditarProducto .eseleccionarTipoProducto").val(respuesta["tipo"]);
			$("#modalEditarProducto .estockProducto").val(respuesta["stock"]);
			$("#modalEditarProducto .etiempoProducto").val(respuesta["tiempo_entrega"]);

		}	
	})

})
