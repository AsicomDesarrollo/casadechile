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
                  <a class="btn btn-soft-primary"  style="cursor: pointer;" onclick="" id = "btnNuevaCatego"><i class="fas fa-plus"></i> Nueva categoria</a>
                </div>
                <table class="able table-bordered table-striped dt-responsive tablaCategorias" width="100%">
                  <thead>
                    <tr>
                    <th style="width:30px">Folio</th>
                    <th>Nombre</th>
                    <th>Estatus</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- end row-->

        
<!--=====================================
MODAL DETALLES DE VENTAS
======================================-->




<div class="modal fade bs-empleados-modal-center"  id="modalDetalles"  tabindex="-1" role="dialog"  aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Center modal</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"
                  aria-label="Close">
              </button>
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
          
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

          <button type="button" class="btn btn-primary pull-right" id="guardarCambios">Actualizar</button>

        </div>

      </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>







<!--=====================================
MODAL AGREGAR CATEGORIAS
======================================-->




<div class="modal fade bs-empleados-modal-center"  id="modalAgregarCatego"  tabindex="-1" role="dialog"  aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Center modal</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"
                  aria-label="Close">
              </button>
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
          
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

          <button type="button" class="btn btn-success pull-right" id="guardarNuevaCatego">Guardar</button>

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

$(".tablaCategorias").DataTable({
   "ajax": "ajax/tablaCategorias.ajax.php",
   "deferRender": true,
   "retrieve": true,
   "processing": true,
   "language": {

    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "",
    "searchPlaceholder": "Buscar ",
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

        url:"ajax/nuevaCategoria.ajax.php",
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

        url:"ajax/nuevaCategoria.ajax.php",
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
