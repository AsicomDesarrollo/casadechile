<?php

//$ventas = ControladorVentas::ctrMostrarTotalVentas();

?>

<div class="content-wrapper">

  <section class="content-header">

   <h1>
      Categorías
    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Categorías</li>

    </ol> <br>

  
<!-- Boton para agregar nueva categoria -->

   <div class="small-box" style="text-align: center; cursor: pointer; background-color: #AD0808;" id = "btnNuevaCatego">
              
      <div class="inner">
              
         <h5 style="color: white;">Nueva categoria</h5>

      </div>
              
   </div>

  </section>




  <section class="content">

    <div class="box">

      <div class="box-body">
        
        <table class="table table-bordered table-striped dt-responsive tablaCategorias" width="100%">
        
          <thead>
         
            <tr>
             
              <th style="width:30px">Folio</th>
              <th>Nombre</th>
              <th>Estatus</th>
              <th>Fecha</th>
              <th>Acciones</th>

            </tr> 

          </thead>   
     
        </table>
          
      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL DETALLES DE VENTAS
======================================-->

<div id="modalDetalles" class="modal fade" role="dialog" aria-hidden="true">
  
  <div class="modal-dialog">
    
    <div class="modal-content">
      
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#AD0808; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <center>
          <h3 class="modal-title"><strong>Editar categoria</strong></h3>
          </center>
          
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div id="detalleCategoria" class="modal-body">

          <div class="box-body">

            <div class="form-group" style="display: none;">
              <label>Identificador:</label>
              <input type="number" class="form-control" id="idCategoria" disabled="disabled">
            </div>

            <div class="form-group">
              <label>Nombre:</label>
              <input type="text" class="form-control" id="nombreCategoria">
            </div>

            <div class="form-group">
              <label>Estatus</label>
              <select class="form-control" id="estatusCategoria">
                <option value="1">Activa</option>
                <option value="2">Inactiva</option>
              </select>
            </div>

            <div class="form-group" style="display: none;">
              <label>Fecha de actualización:</label>
              <input type="text" class="form-control" id="fechaCategoria" disabled="disabled">
            </div>

            

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->
        

        <div class="modal-footer" style="">
          
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="button" class="btn btn-success pull-right" id="guardarCambios">Guardar</button>

        </div>

    </div>

  </div>

</div>

<!--=====================================
MODAL AGREGAR CATEGORIAS
======================================-->

<div id="modalAgregarCatego" class="modal fade" role="dialog" aria-hidden="true">
  
  <div class="modal-dialog">
    
    <div class="modal-content">
      
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#AD0808; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <center>
          <h3 class="modal-title"><strong>Agregar categoria</strong></h3>
          </center>
          
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div id="detalleCategoria" class="modal-body">

          <div class="box-body">

            <div class="form-group">
              <label>Nombre:</label>
              <input type="text" class="form-control" id="ActualizarNombreCatego">
            </div>

            <div class="form-group">
              <label>Estatus</label>
              <select class="form-control" id="ActualizarEstatusCatego">
                <option value="1">Activa</option>
                <option value="2">Inactiva</option>
              </select>
            </div>            

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->
        

        <div class="modal-footer" style="">
          
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="button" class="btn btn-success pull-right" id="guardarNuevaCatego">Guardar</button>

        </div>

    </div>

  </div>

</div>




<script type="text/javascript">

/*=============================================
CARGAR LA TABLA DINÁMICA DE USUARIOS
=============================================*/

$(".tablaCategorias").DataTable({
   "ajax": "ajax/tablaCategorias.ajax.php",
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
  
function Seleccionar(element){

  var idCategoria = $(element).attr("idCategoria");
  var nombreCategoria = $(element).attr("nombre");
  var estatusCategoria = $(element).attr("estatus");
  var fechaCategoria = $(element).attr("fecha");

  
  $("#idCategoria").val(idCategoria);

  $("#nombreCategoria").val(nombreCategoria);

  $("#estatusCategoria").val(estatusCategoria);

  $("#fechaCategoria").val(fechaCategoria);

  $('#modalDetalles').modal('show');

}

$("#guardarCambios").click(function (){

  var idCategoria = $("#idCategoria").val();
  var nombreCategoria = $("#nombreCategoria").val();
  var estatusCategoria = $("#estatusCategoria").val();

  var datosCategoria = new FormData();

  datosCategoria.append("id",idCategoria);
  datosCategoria.append("nombre",nombreCategoria);
  datosCategoria.append("estatus",estatusCategoria);
  datosCategoria.append("accion","actualizar");

        $.ajax({

        url:"https://mcgnetworks.mx/bodega/administracion/ajax/nuevaCategoria.ajax.php",
        method:"POST",
        data: datosCategoria,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){

          console.log(respuesta)

          if(respuesta == "ok"){

            Swal.fire({
              icon: 'success',
              title: 'Categoria actualizada!',
              text: 'Categoria actualizada con exito',
              confirmButtonText: 'OK',
              allowOutsideClick: false
              }).then((result) => {
                        
                if (result.isConfirmed) {
                  
                  window.location.href = "categorias";
                  
                }
            })

          }else{

            Swal.fire({
              icon: 'error',
              title: 'Ha ocurrido un error',
              text: 'Por favor intentalo nuevamente',
              confirmButtonText: 'OK',
              footer: 'Sentimos las molestias'
            })

          }

        }
        
      })



})

$("#btnNuevaCatego").click(function (){

  $('#modalAgregarCatego').modal('show');

});

$('#guardarNuevaCatego').click(function(){

  var nombreCategoriaNueva = $("#ActualizarNombreCatego").val();
  var estatusCategoriaNueva = $("#ActualizarEstatusCatego").val();

  var datosCategoriaNueva = new FormData();

  datosCategoriaNueva.append("nombre",nombreCategoriaNueva);
  datosCategoriaNueva.append("estatus",estatusCategoriaNueva);
  datosCategoriaNueva.append("accion","nueva");

          $.ajax({

        url:"https://mcgnetworks.mx/bodega/administracion/ajax/nuevaCategoria.ajax.php",
        method:"POST",
        data: datosCategoriaNueva,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){

          console.log(respuesta)

          if(respuesta == "ok"){

            Swal.fire({
              icon: 'success',
              title: 'Categoria Agregada!',
              text: 'Categoria agregada con exito',
              confirmButtonText: 'OK',
              allowOutsideClick: false
              }).then((result) => {
                        
                if (result.isConfirmed) {
                  
                  window.location.href = "categorias";
                  
                }
            })

          }else{

            Swal.fire({
              icon: 'error',
              title: 'Ha ocurrido un error',
              text: 'Por favor intentalo nuevamente',
              confirmButtonText: 'OK',
              footer: 'Sentimos las molestias'
            })

          }

        }
        
      })

});

</script>