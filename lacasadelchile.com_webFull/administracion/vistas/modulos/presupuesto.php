<?php

//$ventas = ControladorVentas::ctrMostrarTotalVentas();

?>

<div class="content-wrapper">

  <section class="content-header">

   <h1>
      Presupuesto mensual
    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Presupuesto mensual</li>

    </ol> <br>

  </section>




  <section class="content">

    <div class="box">

      <div class="box-body">
        
        <table class="table table-bordered table-striped dt-responsive tablaPresupuesto" width="100%">
        
          <thead>
         
            <tr>
             
              <th style="width:30px">Folio</th>
              <th>Concepto</th>
              <th>Presupuesto</th>
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
          <h3 class="modal-title"><strong>Editar presupuesto</strong></h3>
          </center>
          
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div id="detalleCategoria" class="modal-body">

          <div class="box-body">

            <div class="form-group" style="display: none;">
              <label>Identificador:</label>
              <input type="number" class="form-control" id="id" disabled="disabled">
            </div>

            <div class="form-group">
              <label>Concepto:</label>
              <input type="text" class="form-control" id="concepto">
            </div>

            <div class="form-group" >
              <label>Presupuesto:</label>
              <input type="text" class="form-control" id="presupuesto">
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


<script type="text/javascript">

/*=============================================
CARGAR LA TABLA DINÁMICA DE USUARIOS
=============================================*/

$(".tablaPresupuesto").DataTable({
   "ajax": "ajax/tablaPresupuesto.ajax.php",
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

  var id = $(element).attr("id");
  var concepto = $(element).attr("concepto");
  var presupuesto = $(element).attr("presupuesto");
  
  $("#id").val(id);

  $("#concepto").val(concepto);

  $("#presupuesto").val(presupuesto);


  $('#modalDetalles').modal('show');

}

$("#guardarCambios").click(function (){

  var id = $("#id").val();
  var concepto = $("#concepto").val();
  var presupuesto = $("#presupuesto").val();

  var data = new FormData();

  data.append("id",id);
  data.append("concepto",concepto);
  data.append("presupuesto",presupuesto);
  data.append("accion","actualizar");

        $.ajax({

        url:"https://mcgnetworks.mx/bodega/administracion/ajax/nuevoPresupuesto.ajax.php",
        method:"POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){

          console.log(respuesta)

          if(respuesta == "ok"){

            Swal.fire({
              icon: 'success',
              title: '¡Datos actualizados!',
              text: 'Datos actualizados con exito',
              confirmButtonText: 'OK',
              allowOutsideClick: false
              }).then((result) => {
                        
                if (result.isConfirmed) {
                  
                  window.location.href = "presupuesto";
                  
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

</script>