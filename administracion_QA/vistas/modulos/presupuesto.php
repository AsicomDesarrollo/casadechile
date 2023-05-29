
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
                    <a class="btn btn-soft-primary"  style="cursor: pointer;" onclick="" id = "btnNuevoCliente" ><i class="fas fa-plus"></i> Nuevo presupuesto</a>
                  
                    </div>

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
              </div>
            </div><!-- end row-->








<!--=====================================
MODAL AGREGAR CLIENTE
======================================-->




<div class="modal fade bs-empleados-modal-center" id="modalAgregarPresupueso" tabindex="-1" role="dialog"  aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Agregar presupuesto</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"
                  aria-label="Close">
              </button>
          </div>
        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">


        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->
        

        <div class="modal-footer" style="">
          
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

          <button type="button" class="btn btn-primary pull-right" id="guardarNuevoCliente">Guardar</button>

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
              <h5 class="modal-title">Detalles de presupueso</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"
                  aria-label="Close">
              </button>
          </div>
        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->


        <div id="" class="modal-body">

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
    "sLengthMenu":     "Mostrar _MENU_ ",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "",
    "searchPlaceholder": "Buscar presupuesto",
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

        url:"/administracion/ajax/nuevoPresupuesto.ajax.php",
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