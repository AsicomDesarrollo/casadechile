
<!-- Begin page -->
<div id="layout-wrapper">


  <!-- ============================================================== -->
  <!-- Start right Content here -->
  <!-- ============================================================== -->
  <div class="main-content">
      <div class="page-content">
          <div class="container-fluid">

            <div class="row">
              <div class="col-xl-12">
                <div class="card">
                  <div class="card-body pb-2">
                    <div class="d-flex flex-wrap gap-2 mb-4 ">

                    <!-- Boton para agregar nuevo empleado -->
                    <a class="btn btn-soft-primary"  style="cursor: pointer;" onclick="" id = "btnNuevoGasto" ><i class="fas fa-plus"></i> Nuevo gasto</a>
                  
                    </div>

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
              </div>
            </div><!-- end row-->

            <div class="row">
              <div class="col-xl-12">
                <div class="card">
                  <div class="card-body pb-2">
                    <div class="d-flex flex-wrap gap-2 mb-4 ">
                    </div>

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
              </div>
            </div><!-- end row-->








<!--=====================================
MODAL AGREGAR CLIENTE
======================================-->




<div class="modal fade bs-empleados-modal-center" id="modalAgregarGasto" tabindex="-1" role="dialog"  aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Agregar cliente</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"
                  aria-label="Close">
              </button>
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
          
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

          <button type="button" class="btn btn-primary pull-right" id="guardarNuevoGasto">Guardar</button>

        </div>

      </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>








<!--=====================================
MODAL DETALLES PRDUCTO
======================================-->




<div class="modal fade bs-empleados-modal-center" id="modalDetalles" tabindex="-1" role="dialog"  aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Detalles de gasto</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"
                  aria-label="Close">
              </button>
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
          
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

          <button type="button" class="btn btn-primary pull-right" id="guardarCambios">Actualizar</button>

        </div>

      </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>












          </div>
          <!-- container-fluid -->
      </div>
      <!-- End Page-content -->
  </div>
  <!-- end main content-->

</div>
<!-- END layout-wrapper -->


<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
<script
src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
crossorigin="anonymous"></script>

<script
src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"
integrity="sha256-hlKLmzaRlE8SCJC1Kw8zoUbU8BxA+8kR3gseuKfMjxA="
crossorigin="anonymous"></script>

<script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
<script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>




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
    "sLengthMenu":     "Mostrar _MENU_ ",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "",
    "searchPlaceholder": "Buscar gasto",
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
    "sLengthMenu":     "Mostrar _MENU_ ",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "",
    "searchPlaceholder": "Buscar gasto",
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