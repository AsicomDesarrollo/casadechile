<?php

//$ventas = ControladorVentas::ctrMostrarTotalVentas();

?>

<div class="content-wrapper">

  <section class="content-header">

   <h1>
      Gastos
    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Gastos</li>

    </ol> <br>

  
<!-- Boton para agregar nueva categoria -->

   <div class="small-box" style="text-align: center; background-color: #AD0808;" id = "btnNuevoGasto">
              
      <div class="inner">
              
         <h5 style="color: white;">Nuevo Gasto</h5>

      </div>
              
   </div>

  </section>

<!--=====================================
Tabla gastos
======================================-->


  <section class="content">


   <div class="small-box" style="text-align: center; background-color: #AD0808;">
              
      <div class="inner">
              
         <h5 style="color: white;">Gastos mensuales</h5>

      </div>
              
   </div>

    <div class="box">

      <div class="box-body">
        
        <table class="table table-bordered table-striped dt-responsive tablaResumen" width="100%">
        
          <thead>
         
            <tr>
             
              <th style="width:30px">Id</th>
              <th>Concepto</th>
              <th>Presupuesto</th>
              <th>Gasto</th>

            </tr> 

          </thead>   
     
        </table>
          
      </div>

    </div>

  </section>


<!--=====================================
Tabla presupuesto
======================================-->


  <section class="content">

       <div class="small-box" style="text-align: center; cursor: pointer; background-color: #AD0808;">
              
      <div class="inner">
              
         <h5 style="color: white;">Gastos del día </h5>

      </div>
              
   </div>

    <div class="box">

      <div class="box-body">
        
        <table class="table table-bordered table-striped dt-responsive tablaGastos" width="100%">
        
          <thead>
         
            <tr>
             
              <th style="width:30px">Id</th>
              <th>Descripción</th>
              <th>Monto</th>
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
MODAL DETALLES DE GASTOS
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
          <h3 class="modal-title"><strong>Editar Gasto</strong></h3>
          </center>
          
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div id="detalleGastos" class="modal-body">

          <div class="box-body">

            <div class="form-group" style="display: none;">
              <label>Identificador:</label>
              <input type="text" class="form-control" id="idGasto">
            </div>          

          <div class="form-group">
              <label>Tipo:</label>
              <select class="form-control" id="tipoGasto" onchange="filtrarTipoGasto('editar')">

                <?php

                $gastos = ControladorPresupuesto::ctrMostrarPresupuesto();

                foreach ($gastos as $key => $value) {
                  
                  echo '<option value="'.$value["id"].'">'.$value["concepto"].'</option>';

                }

                ?>

              </select>
            </div>  

            <div class="form-group">
              <label>Descripción:</label>
              <input type="text" class="form-control" id="descGasto">
            </div>

            <div class="form-group">
              <label>Monto: </label>
              <input type="text" class="form-control" id="montoGasto">
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
MODAL AGREGAR GASTO
======================================-->

<div id="modalAgregarGasto" class="modal fade" role="dialog" aria-hidden="true">
  
  <div class="modal-dialog">
    
    <div class="modal-content">
      
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#AD0808; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <center>
          <h3 class="modal-title"><strong>Agregar Gasto</strong></h3>
          </center>
          
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div id="detalleGastos" class="modal-body">

          <div class="box-body">


            <div class="form-group">
              <label>Tipo:</label>
              <select class="form-control" id="agregarTipoGasto" onchange="filtrarTipoGasto('nuevo')">

                <?php

                $gastos = ControladorPresupuesto::ctrMostrarPresupuesto();

                foreach ($gastos as $key => $value) {
                  
                  echo '<option value="'.$value["id"].'">'.$value["concepto"].'</option>';

                }

                ?>

              </select>
            </div> 

            <div class="form-group">
              <label>Descripción:</label>
              <input type="text" class="form-control" id="agregarDescGastos">
            </div>

            <div class="form-group">
              <label>Monto: </label>
              <input type="text" class="form-control" id="agregarMontoGastos">

          </div>

          </div>
        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->
        

        <div class="modal-footer" style="">
          
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="button" class="btn btn-success pull-right" id="guardarNuevoGasto">Guardar</button>

        </div>

    </div>

  </div>

</div>

</div>




<script type="text/javascript">

var idEspecial;
var tipoGasto;

/*=============================================
CARGAR LA TABLA DINÁMICA DE USUARIOS
=============================================*/

$(".tablaGastos").DataTable({
   "ajax": "ajax/tablaGastos.ajax.php",
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

$(".tablaResumen").DataTable({
   "ajax": "ajax/tablaResumen.ajax.php",
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

function filtrarTipoGasto(condicion) {
  
  if(condicion == 'editar'){

     tipoGasto = $("#tipoGasto").val();

  }else{

     tipoGasto = $("#agregarTipoGasto").val();
  
  }
}

  
function Seleccionar(element){

  idEspecial = $(element).attr("idGasto");
  var descGasto = $(element).attr("descGasto");
  var tipoGasto = $(element).attr("tipoGasto");
  var montoGasto = $(element).attr("montoGasto");

  console.log(descGasto);
  console.log(montoGasto);
  console.log(tipoGasto);
  
  
  $("#idGasto").val(idEspecial);

  $("#descGasto").val(descGasto);

  $("#tipoGasto").val(tipoGasto);

  $("#montoGasto").val(montoGasto);

  $('#modalDetalles').modal('show');

}

$("#guardarCambios").click(function (){

  //var idEditar = $("#idEditar").val();
  var descGasto = $("#descGasto").val();
  var tipoGasto = $("#tipoGasto").val();
  var montoGasto = $("#montoGasto").val();
 
  console.log(descGasto);
  console.log(montoGasto);
 

  var data = new FormData();

  data.append("id",idEspecial);
  data.append("descripcion",descGasto);
  data.append("tipo",tipoGasto);
  data.append("monto",montoGasto);
  data.append("accion","actualizar");

        $.ajax({

        url:"/administracion/ajax/nuevoGasto.ajax.php",
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
              title: '¡Gasto actualizado!',
              text: 'Gasto actualizado con exito',
              confirmButtonText: 'OK',
              allowOutsideClick: false
              }).then((result) => {
                        
                if (result.isConfirmed) {
                  
                  window.location.href = "gastos";
                  
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

$("#btnNuevoGasto").click(function (){

  $('#modalAgregarGasto').modal('show');

});

$('#guardarNuevoGasto').click(function(){

  var agregarDescGastos = $("#agregarDescGastos").val();
  var agregarMontoGastos = $("#agregarMontoGastos").val();
  var agregarTipoGasto = $("#agregarTipoGasto").val();

  var data = new FormData();

  data.append("descripcion",agregarDescGastos);
  data.append("monto",agregarMontoGastos);
  data.append("tipo",agregarTipoGasto);
  data.append("accion","nuevo");

          $.ajax({

        url:"/administracion/ajax/nuevoGasto.ajax.php",
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
              title: '¡Gasto Agregado!',
              text: 'Gasto agregado con exito',
              confirmButtonText: 'OK',
              allowOutsideClick: false
              }).then((result) => {
                        
                if (result.isConfirmed) {
                  
                  window.location.href = "gastos";
                  
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