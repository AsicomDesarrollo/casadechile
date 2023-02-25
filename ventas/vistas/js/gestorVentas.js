/*=============================================
CARGAR LA TABLA DINÁMICA DE VENTAS
=============================================*/

$(".tablaVentas").DataTable({
	 "ajax": "ajax/tablaVentas.ajax.php",
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
CARGAR DATOS PARA EDITAR VENTA
=============================================*/

$(".tablaVentas tbody").on("click", ".btnEditarCompra", function(){

	console.log("click");

	var idCompra = $(this).attr("idCompra");

	$("#modalEditarCompra .idCompra").val(idCompra);

	var datosOpciones = new FormData();
	datosOpciones.append("idCompra", idCompra);

	$.ajax({
		url:"ajax/ventas.ajax.php",
	 	method:"POST",
		data: datosOpciones,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success:function(respuesta){

			console.log(respuesta);

			$("#modalEditarCompra .eIdPago").val(respuesta["id_pay"]);
			$("#modalEditarCompra .eNombreUsuario").val(respuesta["id_usuario"]);
			$("#modalEditarCompra .eProducto").val(respuesta["id_producto"]);
			$("#modalEditarCompra .eCantidad").val(respuesta["cantidad"]);
			$("#modalEditarCompra .eMonto").val(respuesta["monto"]);
			$("#modalEditarCompra .eDireccion").val(respuesta["direccion"]);
			$("#modalEditarCompra .eEstatus").val(respuesta["status"]);
			

		}	
	})

})
