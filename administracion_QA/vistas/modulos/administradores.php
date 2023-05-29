
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
                    <a class="btn btn-soft-primary"  style="cursor: pointer;" onclick="" id = "btnNuevoAdmin" ><i class="fas fa-plus"></i> Nuevo admnisrtador</a>
                  
                    </div>

                    <table class="table table-bordered table-striped dt-responsive tablaAdministradores" width="100%">
        
                      <thead>
                    
                        <tr>
                        
                        <th style="width:30px">Id</th>
                        <th>Nombre</th>
                        <th>Paterno</th>
                        <th>Materno</th>
                        <th>Email</th>
                        <th>Contraseña</th>  
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




<div class="modal fade bs-empleados-modal-center" id="modalAgregarAdmin" tabindex="-1" role="dialog"  aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Agregar admnistrador</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"
                  aria-label="Close">
              </button>
          </div>
        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <div class="form-group">
              <label>Nombre:</label>
              <input type="text" class="form-control" id="ActualizarNombreAdmin">
            </div>

            <div class="form-group">
              <label>Paterno: </label>
              <input type="text" class="form-control" id="ActualizarPaternoAdmin">
            </div>            

            <div class="form-group">
              <label>Materno: </label>
              <input type="text" class="form-control" id="ActualizarMaternoAdmin">
            </div>  

            <div class="form-group">
              <label>Email: </label>
              <input type="text" class="form-control" id="ActualizarEmailAdmin">
            </div>  

             <div class="form-group">
              <label>Contraseña: </label>
              <input type="text" class="form-control" id="ActualizarPwdAdmin">
            </div>  

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->
        

        <div class="modal-footer" style="">
          
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

          <button type="button" class="btn btn-primary pull-right" id="guardarNuevoAdmin">Guardar</button>

        </div>

      </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>






<!--=====================================
MODAL EDITAR ADMIN
======================================-->




<div class="modal fade bs-empleados-modal-center" id="modalDetalles" tabindex="-1" role="dialog"  aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Editar admnistrador</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"
                  aria-label="Close">
              </button>
          </div>
        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div id="detalleAdmin" class="modal-body">

          <div class="box-body">

            <div class="form-group" style="display: none;">
              <label>Identificador:</label>
              <input type="number" class="form-control" id="idAdmin" disabled="disabled">
            </div>

            <div class="form-group">
              <label>Nombre:</label>
              <input type="text" class="form-control" id="nombreAdmin">
            </div>

            <div class="form-group">
              <label>Paterno</label>
              <input type="text" class="form-control" id="paternoAdmin">
            </div>

            <div class="form-group">
              <label>Materno:</label>
              <input type="text" class="form-control" id="maternoAdmin">
            </div>

            <div class="form-group">
              <label>Email:</label>
              <input type="text" class="form-control" id="emailAdmin">
            </div>

            <div class="form-group">
              <label>Contraseña:</label>
              <input type="text" class="form-control" id="pwdAdmin">
            </div>

          </div>

        </div>


        <!--=====================================
        PIE DEL MODAL
        ======================================-->
        

        <div class="modal-footer" style="">
          
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

          <button type="button" class="btn btn-primary pull-right" id="guardarCambios">Guardar</button>

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

$(".tablaAdministradores").DataTable({
   "ajax": "ajax/tablaAdministradores.ajax.php",
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
    "searchPlaceholder": "Buscar administrador",
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

  var idAdmin = $(element).attr("idAdmin");
  var nombreAdmin = $(element).attr("nombreAdmin");
  var paternoAdmin = $(element).attr("paternoAdmin");
  var maternoAdmin = $(element).attr("maternoAdmin");
  var emailAdmin = $(element).attr("emailAdmin");
  var pwdAdmin = $(element).attr("pwdAdmin");
  
  $("#idAdmin").val(idAdmin);

  $("#nombreAdmin").val(nombreAdmin);

  $("#paternoAdmin").val(paternoAdmin);

  $("#maternoAdmin").val(maternoAdmin);

  $("#emailAdmin").val(emailAdmin);

  $("#pwdAdmin").val(pwdAdmin);

  $('#modalDetalles').modal('show');

}

$("#guardarCambios").click(function (){

  var idAdmin = $("#idAdmin").val();
  var nombreAdmin = $("#nombreAdmin").val();
  var paternoAdmin = $("#paternoAdmin").val();
  var maternoAdmin = $("#maternoAdmin").val();
  var emailAdmin = $("#emailAdmin").val();
  var pwdAdmin = $("#pwdAdmin").val();

  /*console.log(idAdmin);
  console.log(nombreAdmin);
  console.log(paternoAdmin);
  console.log(maternoAdmin);
  console.log(emailAdmin);*/

  var data = new FormData();

  data.append("id",idAdmin);
  data.append("nombre",nombreAdmin);
  data.append("paterno",paternoAdmin);
  data.append("materno",maternoAdmin);
  data.append("email",emailAdmin);
  data.append("pwd",pwdAdmin);
  data.append("accion","actualizar");



        $.ajax({

        url:"ajax/nuevoAdmin.ajax.php",
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
              title: '¡Administrador actualizado!',
              text: '¡Administrador actualizado con exito',
              confirmButtonText: 'OK',
              allowOutsideClick: false
              }).then((result) => {
                        
                if (result.isConfirmed) {
                  
                  window.location.href = "administradores";
                  
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

$("#btnNuevoAdmin").click(function (){

  $('#modalAgregarAdmin').modal('show');

});



$('#guardarNuevoAdmin').click(function(){

  var nombreNuevo = $("#ActualizarNombreAdmin").val();
  var paternoNuevo = $("#ActualizarPaternoAdmin").val();
  var maternoNuevo = $("#ActualizarMaternoAdmin").val();
  var emailNuevo = $("#ActualizarEmailAdmin").val();
  var pwdNuevo = $("#ActualizarPwdAdmin").val();

  console.log(nombreNuevo);
  console.log(paternoNuevo);
  console.log(maternoNuevo);
  console.log(emailNuevo);


  var data = new FormData();

  data.append("nombre",nombreNuevo);
  data.append("paterno",paternoNuevo);
  data.append("materno",maternoNuevo);
  data.append("email",emailNuevo);
  data.append("pwd",pwdNuevo);
  data.append("accion","nuevo");

          $.ajax({

        url:"ajax/nuevoAdmin.ajax.php",
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
              title: '¡Administrador Agregado!',
              text: '¡Administrador agregado con exito',
              confirmButtonText: 'OK',
              allowOutsideClick: false
              }).then((result) => {
                        
                if (result.isConfirmed) {
                  
                  window.location.href = "administradores";
                  
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