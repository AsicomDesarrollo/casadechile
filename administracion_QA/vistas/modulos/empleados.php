
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
                    <a class="btn btn-soft-primary"  style="cursor: pointer;" onclick="" id="btnNuevoEmpleado"><i class="fas fa-plus"></i> Nuevo Empleado</a>
                  

                    <?php
                    if(isset($_REQUEST['emp']) ){

                      ?>
                
                        <a href="./empleados?emp=activos" class="btn btn-soft-info"  style="cursor: pointer;" onclick="" id="btnNuevoEmpleado"><i class="fas fa-eye"></i> Ver Empleados activos</a>

                      <?php
                      
                    }
                    else{
                      ?>
          
                      <a hhref="./?modulo=empleados&emp=inactivos" class="btn btn-soft-success"  style="cursor: pointer;" onclick="" id="btnNuevoEmpleado"><i class="fas fa-eye"></i> Ver Empleados activos</a>
                      <?php
                      }
                    /* echo "<pre>";
                    print_r($_REQUEST);
                    echo "</pre>"; */
                    ?>
                    </div>

                    <table class="table table-bordered table-striped dt-responsive tablaEmpleados" width="100%">
                      
                      <thead>
                      
                        <tr>
                          
                          <th style="width:30px">Id</th>
                          <th>Nombre</th>
                          <th>Sueldo mensual</th>
                          <th>Fecha de ingreso</th>
                          <th>Estatus</th>
                          <th>Cumpleaños</th>
       
                          <th>Acciones</th>

                      </thead>   

                    </table>

                  </div>
                </div>
              </div>
            </div><!-- end row-->








<!--=====================================
MODAL DETALLES EMPLEADO
======================================-->




<div class="modal fade bs-empleados-modal-center" id="modalDetalles" tabindex="-1" role="dialog"  aria-labelledby="mySmallModalLabel" aria-hidden="true">
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

        <div id="detalleEmpleado" class="modal-body">

          <div class="box-body">

            <div class="form-group" style="display: none;">
              <label>Identificador:</label>
              <input type="number" class="form-control" id="id"  required>
            </div>

            <div class="form-group">
              <label>Nombre:</label>
              <input type="text" class="form-control" id="nombre" required>
            </div>

            <div class="form-group">
              <label>Apellido Paterno:</label>
              <input type="text" class="form-control" id="paterno" required>
            </div>

            <div class="form-group">
              <label>Apellido Materno:</label>
              <input type="text" class="form-control" id="materno" required>
            </div>

            <div class="form-group">
              <label>Sueldo:</label>
              <input type="text" class="form-control" id="sueldo" required>
            </div>

            <div class="form-group">
              <label>Cumpleaños:</label>
              <input type="date" class="form-control" id="cumpleanios" required>
            </div>

            <div class="form-group">
              <label>Fecha Ingreso:</label>
              <input type="date" class="form-control" id="fecha_ingreso" required>
            </div>

            <div class="form-group">
              <label>Email:</label>
              <input type="text" class="form-control" id="email" required>
            </div>

            <div class="form-group">
              <label>Estatus</label>
              <select class="form-control" id="estatus">
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
              </select>
            </div>           

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->
        

        <div class="modal-footer" style="">
          
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

          <button type="button" class="btn btn-success pull-right" id="guardarCambios">Guardar</button>

        </div>

      </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>









<!--=====================================
MODAL CAMBIAR PASSWORD DE EMPLEADO
======================================-->

<div id="modalPassword" class="modal fade" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <form action="ajax/contrasenaEmpleados.ajax.php" method="POST">
      <div class="modal-content">
          <div class="modal-header" style="background:#AD0808; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <center>
            <h3 class="modal-title"><strong>Cambiar password de  empleado</strong></h3>
            </center>
          </div>
          <div id="detalleEmpleado" class="modal-body">
            <div class="box-body">
              <div class="form-group">
                <label>email:</label>
                <input type="hidden" class="form-control" id="ident"  name="ident" required>
                <input type="text" class="form-control" id="email"  name="email" required >
              </div>
              <div class="form-group">
                <label>Nuevo Password:</label>
                <input type="text" class="form-control" id="contrasena" name="contrasena" required>
              </div>
            </div>

          </div>
          <div class="modal-footer" style="">   
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-success pull-right" id="guardarCambios">Guardar</button>
          </div>
      </div>
    </form>
  </div>
</div>



<!--=====================================
MODAL AGREGAR EMPLEADO
======================================-->



<div class="modal fade bs-empleados-modal-center" id="modalAgregarEmpleado" tabindex="-1" role="dialog"  aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Center modal</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"
                  aria-label="Close">
              </button>
          </div>
          <div id="nuevoEmpleado" class="modal-body">

            <div class="box-body">

              <div class="form-group">
                  <label>Nombre:</label>
                  <input type="text" class="form-control" id="new_nombre" required>
                </div>

                <div class="form-group">
                  <label>Apellido Paterno:</label>
                  <input type="text" class="form-control" id="new_paterno" required>
                </div>

                <div class="form-group">
                  <label>Apellido Materno:</label>
                  <input type="text" class="form-control" id="new_materno" required>
                </div>

                <div class="form-group">
                  <label>Sueldo:</label>
                  <input type="text" class="form-control" id="new_sueldo" required>
                </div>

                <div class="form-group">
                  <label>Cumpleaños:</label>
                  <input type="date" class="form-control" id="new_cumpleanios" required>
                </div>

                <div class="form-group">
                  <label>Fecha Ingreso:</label>
                  <input type="date" class="form-control" id="new_fecha_ingreso" required>
                </div>

                <div class="form-group">
                  <label>Email:</label>
                  <input type="text" class="form-control" id="new_email" required>
                </div>

                <div class="form-group">
                  <label>Estatus</label>
                  <select class="form-control" id="new_estatus">
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                  </select>
                </div>       

              </div>

            </div>
            <div class="modal-footer" style="">
          
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

              <button type="button" class="btn btn-success pull-right" id="guardarNuevoEmpleado">Guardar</button>

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
CARGAR LA TABLA DINÁMICA DE EMPLEADOS
=============================================*/
var ajaxFile = '';
if(document.location.search=='?modulo=empleados&emp=inactivos'){
    ajaxFile = 'ajax/tablaEmpleados.ajax.php?emp=inactivos'
}else{
    ajaxFile = 'ajax/tablaEmpleados.ajax.php';
}

$(".tablaEmpleados").DataTable({
 "ajax": ajaxFile,
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

var empleado = [];
function editar_empleado(element){

  var id = $(element).attr("id_empleado");

  $.ajax({
    method: "POST",
    url: "ajax/tablaEmpleados.ajax.php?action=view",
    data: { action: "ver_empleado", id: id }
  })
  .done(function( res ) {
    empleado = JSON.parse(res)[0];
    console.log( empleado);
      $("#id").val(empleado.id);

      $("#nombre").val(empleado.nombre);
      $("#paterno").val(empleado.paterno);
      $("#materno").val(empleado.materno);

      $("#sueldo").val(empleado.sueldo);

      $("#cumpleanios").val(empleado.nacimiento);
      $("#fecha_ingreso").val(empleado.fecha_ingreso);

      $("#estatus").val(empleado.estatus);

      $("#email").val(empleado.email);
      email//terminalr

      $('#modalDetalles').modal('show');
  });

}
var chang='';
function changePassword(element){
  document.querySelector("input[name=email]").value = element.getAttribute('id_email');
  document.querySelector("input[name=ident]").value = element.getAttribute('id_ident');
  $('#modalPassword').show('show');
}

$("#guardarCambios").click(function (){

  var id = $("#id").val();
  var nombre = $("#nombre").val();
  var paterno = $("#paterno").val();
  var materno = $("#materno").val();
  var sueldo = $("#sueldo").val();
  var cumpleanios = $("#cumpleanios").val();
  var fecha_ingreso = $("#fecha_ingreso").val();
  var email = $("#email").val();
  var estatus = $("#estatus").val();

  var data = new FormData();

  data.append("action","actualizar");
  data.append("id",id);
  data.append("nombre",nombre);
  data.append("paterno",paterno);
  data.append("materno",materno);
  data.append("sueldo",sueldo);
  data.append("nacimiento",cumpleanios);
  data.append("fecha_ingreso",fecha_ingreso);
  data.append("email",email);
  data.append("estatus",estatus);

      $.ajax({

      url:"ajax/nuevoEmpleado.ajax.php",
      method:"POST",
      data: data,
      cache: false,
      contentType: false,
      processData: false,
      success:function(respuesta){

        console.log(respuesta)

        if(respuesta == "success"){

          Swal.fire({
            icon: 'success',
            title: '¡Datos actualizados!',
            text: 'Datos actualizados con exito',
            confirmButtonText: 'OK',
            allowOutsideClick: false
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = "empleados"; 
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

$("#btnNuevoEmpleado").click(function (){

$('#modalAgregarEmpleado').modal('show');

});

$('#guardarNuevoEmpleado').click(function(){
  var new_nombre = $("#new_nombre").val();
  var new_paterno = $("#new_paterno").val();
  var new_materno = $("#new_materno").val();
  var new_sueldo = $("#new_sueldo").val();
  var new_cumpleanios = $("#new_cumpleanios").val();
  var new_fecha_ingreso = $("#new_fecha_ingreso").val();
  var new_email = $("#new_email").val();
  var new_estatus = $("#new_estatus").val();

  var data = new FormData();

  data.append("action","nuevo");
  data.append("nombre",new_nombre);
  data.append("paterno",new_paterno);
  data.append("materno",new_materno);
  data.append("sueldo",new_sueldo);
  data.append("nacimiento",new_cumpleanios);
  data.append("fecha_ingreso",new_fecha_ingreso);
  data.append("email",new_email);
  data.append("estatus",new_estatus);

        $.ajax({

      url:"ajax/nuevoEmpleado.ajax.php",
      method:"POST",
      data: data,
      cache: false,
      contentType: false,
      processData: false,
      success:function(respuesta){

        console.log(respuesta)

        if(respuesta == "success"){

          Swal.fire({
            icon: 'success',
            title: 'Datos Agregados con éxito!',
            text: 'la contraseña temporal es "casadelchile.mx" , asegurate de cambiarla posteriormente',
            confirmButtonText: 'OK',
            allowOutsideClick: false
            }).then((result) => {
                      
              if (result.isConfirmed) {
                
                window.location.href = "empleados";
                
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

document.addEventListener('DOMContentLoaded', function () {
    console.log("¡Estamos en vivo!");
    setTimeout(() => {
        var activosEmp = document.querySelectorAll('.estatusEmp');
        
        activosEmp.forEach(element => {
          let iddb = element.getAttribute('iddb');
          let estatus= element.getAttribute('estatusdb');
          let estatusClass= ''; if(estatus=='ACTIVO'){estatusClass='success'}else if(estatus=='INACTIVO'){estatusClass='danger'}
          let estatusbtn = '<div class="dropup"><button class="btn btn-'+estatusClass+' dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> '+estatus+' <span class="caret"></span></button><ul class="dropdown-menu" aria-labelledby="dropdownMenu2"><li><a class="'+(estatus=='ACTIVO'?'red':'green')+'" href="./?modulo=empleados&action='+(estatus=='ACTIVO'?'deshabilitar':'habilitar')+'&id='+iddb+'"> '+(estatus=='ACTIVO'?'deshabilitar':'habilitar')+'</a></li></ul></div>';

          element.innerHTML = estatusbtn;
        });    
    }, 300);

});


</script>

