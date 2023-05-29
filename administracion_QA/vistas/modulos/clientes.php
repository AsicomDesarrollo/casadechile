
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
                    <a class="btn btn-soft-primary"  style="cursor: pointer;" onclick="" id = "btnNuevoCliente" ><i class="fas fa-plus"></i> Nuevo cliente</a>
                  
                    </div>

                    <table class="table table-bordered table-striped dt-responsive tablaCliente" width="100%">
        
                      <thead>
                    
                        <tr>
                        
                          <th style="width:30px">Folio</th>
                          <th>Nombre</th>
                          <th>Deuda</th>
                          <!--<th>Saldo a favor</th>-->
                          <th>Fecha de creación </th>
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




<div class="modal fade bs-empleados-modal-center" id="modalAgregarCliente" tabindex="-1" role="dialog"  aria-labelledby="mySmallModalLabel" aria-hidden="true">
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

        <div class="modal-body">

          <div class="box-body">

            <div class="form-group">
              <label>Nombre:</label>
              <input type="text" class="form-control" id="agregarNombre">              
            </div>

            <div class="form-group">
              <label>Adeudo: </label>
              <input type="text" class="form-control" id="agregarAdeudo">
            </div>    

            <div class="form-group">
              <label>Límite: </label>
              <input type="text" class="form-control" id="agregarLimite">
            </div>          

          </div>

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
              <h5 class="modal-title">Detalles de cliente</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"
                  aria-label="Close">
              </button>
          </div>
        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->


        <div class="modal-body">

          <div class="box-body">

            <div class="form-group" style="display: none;">
              <label>Identificador:</label>
              <input type="text" class="form-control" id="idCliente" disabled="disabled">
            </div>

            <div class="form-group">
              <label>Nombre:</label>
              <input type="text" class="form-control" id="nombreCliente">
            </div>

            <div class="form-group">
              <label>Adeudo: </label>
              <input type="text" class="form-control" id="adeudo">
            </div>

            <div class="form-group">
              <label>Límite: </label>
              <input type="text" class="form-control" id="limite">
            </div>

            <div class="form-group" style="display: none;">
              <label>Fecha: </label>
              <input type="text" class="form-control" id="fecha" disabled="disabled">
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

/*=============================================
CARGAR LA TABLA DINÁMICA DE USUARIOS
=============================================*/

$(".tablaCliente").DataTable({
   "ajax": "ajax/tablaClientes.ajax.php",
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
    "searchPlaceholder": "Buscar cliente",
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

function VerDetalles(element){

var idCliente = $(element).attr("idCliente");

var arreglo = $(element).attr("detalles").split("!");

$('#bodyDeudas').empty();

$('#bodyDeudas').append('<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 border-right"><h4 style="color: #333333; margin-top: 15px;"><strong>#</strong></h4></div>');
$('#bodyDeudas').append('<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 border-right"><h4 style="color: #333333; margin-top: 15px;"><strong>Total</strong></h4></div>');
$('#bodyDeudas').append('<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 border-right"><h4 style="color: #333333; margin-top: 15px;"><strong>Abonado</strong></h4></div>');
$('#bodyDeudas').append('<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 border-right"><h4 style="color: #333333; margin-top: 15px;"><strong>Restante</strong></h4></div>');



for (var i = 0; i < arreglo.length; i++){

  var valores = arreglo[i].split(";");


  $('#bodyDeudas').append('<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 border-right"><h4 style="color: #333333; margin-top: 15px;">'+valores[0]+'</h4></div>');

  $('#bodyDeudas').append('<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 border-right"><h4 style="color: #333333; margin-top: 15px;">$ '+valores[2]+'</h4></div>');

  $('#bodyDeudas').append('<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 border-right"><h4 style="color: #333333; margin-top: 15px;">$ '+valores[3]+'</h4></div>');
  $('#bodyDeudas').append('<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 border-right"><h4 style="color: #333333; margin-top: 15px;">$ '+(valores[2]-valores[3])+'</h4></div>');
  }



$('#modalVerDetalles').modal('show');


}

  
function Seleccionar(element){

  idEspecial = $(element).attr("idCliente");
  var nombreCliente = $(element).attr("nombreCliente");
  var adeudo = $(element).attr("adeudo");
  var limite = $(element).attr("limite");
  
  //nombreProveedor = nombreProveedor * 1;

  $("#idCliente").val(idEspecial); 

  $("#nombreCliente").val(nombreCliente);

  $("#adeudo").val(adeudo);

  $("#limite").val(limite);

  $('#modalDetalles').modal('show');

  console.log(idEspecial);
  console.log("Nombre Proveedor:"+nombreCliente);
  console.log(adeudo);
  console.log(limite);

}

$("#guardarCambios").click(function (){

  //var idEditar = $("#idEditar").val();
  var nombreCliente = $("#nombreCliente").val();
  var adeudo = $("#adeudo").val();
  var limite = $("#limite").val();
  
  console.log(nombreCliente);
  console.log(adeudo);
  console.log(limite);
  
  var datosCliente = new FormData();

  datosCliente.append("id",idEspecial);
  datosCliente.append("nombre",nombreCliente);
  datosCliente.append("adeudo",adeudo);
  datosCliente.append("limite",limite);
  datosCliente.append("accion","actualizar");

        $.ajax({

        url:"ajax/nuevoCliente.ajax.php",
        method:"POST",
        data: datosCliente,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){

          console.log(respuesta)

          if(respuesta == "ok"){

            Swal.fire({
              icon: 'success',
              title: 'Cliente actualizado!',
              text: 'Cliente actualizado con exito',
              confirmButtonText: 'OK',
              allowOutsideClick: false
              }).then((result) => {
                        
                if (result.isConfirmed) {
                  
                  window.location.href = "clientes";
                  
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

$("#btnNuevoCliente").click(function (){

  $('#modalAgregarCliente').modal('show');

});

$('#guardarNuevoCliente').click(function(){

  var nuevoNombre = $("#agregarNombre").val();
  var nuevoAdeudo = $("#agregarAdeudo").val();
  var nuevoLimite = $("#agregarLimite").val();

  console.log("Nombre Proveedor:"+nuevoNombre);
  console.log(nuevoAdeudo);
  console.log(nuevoLimite);
  
  var datosClienteNuevo = new FormData();

  datosClienteNuevo.append("nombre",nuevoNombre);
  datosClienteNuevo.append("adeudo",nuevoAdeudo);
  datosClienteNuevo.append("limite",nuevoLimite);
  datosClienteNuevo.append("accion","nuevo");

          $.ajax({

        url:"ajax/nuevoCliente.ajax.php",
        method:"POST",
        data: datosClienteNuevo,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){

          console.log(respuesta)

          if(respuesta == "ok"){

            Swal.fire({
              icon: 'success',
              title: 'Cliente Agregado!',
              text: 'Cliente agregado con exito',
              confirmButtonText: 'OK',
              allowOutsideClick: false
              }).then((result) => {
                        
                if (result.isConfirmed) {
                  
                  window.location.href = "clientes";
                  
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