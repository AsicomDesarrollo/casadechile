
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

                    <table class="table table-bordered table-striped dt-responsive tablaProveedores" width="100%">
        
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
              <h5 class="modal-title">Agregar proveedor</h5>
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
              <label>Pagado: </label>
              <input type="text" class="form-control" id="agregarPagado">
            </div>    

            <div class="form-group">
              <label>Crédito: </label>
              <input type="text" class="form-control" id="agregarCredito">
            </div>          

          </div>

        </div>


        <!--=====================================
        PIE DEL MODAL
        ======================================-->
        

        <div class="modal-footer" style="">
          
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

          <button type="button" class="btn btn-primary pull-right" id="guardarNuevoProveedor">Guardar</button>

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
              <h3 class="modal-title" id="detallesNombreDeuda"></h3>

              <button type="button" class="btn-close" data-bs-dismiss="modal"
                  aria-label="Close">
              </button>
          </div>
        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body" id="cuerpoDetallesDeuda">

              

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

$(".tablaProveedores").DataTable({
   "ajax": "ajax/tablaProveedores.ajax.php",
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
    "searchPlaceholder": "Buscar proveedor",

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

function Detalles(element){

  idEspecial = $(element).attr("idProveedor");
  var nombreProveedor = $(element).attr("nombreProveedor");

  $("#detallesNombreDeuda").text(nombreProveedor);

  var datosProveedor = new FormData();

  datosProveedor.append("id",idEspecial);
  $.ajax({

    url:"ajax/deudasProveedor.ajax.php",
    method:"POST",
    data: datosProveedor,
    dataType: "json",
    cache: false,
    contentType: false,
    processData: false,
    success:function(respuesta){

      console.log(respuesta);

      if(respuesta != ""){

        var nombreDeuda = "";
        var montoDeuda = 0;
        var montoAbonado = 0;
        var fechaDeuda = "";

        $("#cuerpoDetallesDeuda").empty();

        $("#cuerpoDetallesDeuda").append(' <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 border-right"><h4 style="color: #333333; margin-top: 15px;"><strong>Producto</strong></h4></div><div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 border-right"><center><h4 style="color: #333333; margin-top: 15px;"><strong>Abonado</strong></h4></center></div><div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 border-right"><center><h4 style="color: #333333; margin-top: 15px;"><strong>Total</strong></h4></center></div><div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 border-right"><center><h4 style="color: #333333; margin-top: 15px;"><strong>Fecha de ingreso</strong></h4></center></div>');

        var newData = respuesta;

        $.each(newData, function(index, elemento) {

          $.each(elemento, function(id, valor) {

            switch(id){

              case "producto":
                nombreDeuda = valor;
              break;

              case "abonado":
                montoAbonado = valor;
              break;

              case "monto":
                montoDeuda = valor;
              break;

              case "fecha":
                fechaDeuda = valor;
              break;

              default:
              break;

              console.log(valor);

            }
              
          });

          $("#cuerpoDetallesDeuda").append(' <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 border-right"><h4 style="color: #333333; margin-top: 15px;">'+nombreDeuda+'</h4></div><div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 border-right"><center><h4 style="color: #333333; margin-top: 15px;">$ '+montoAbonado+'</h4></center></div><div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 border-right"><center><h4 style="color: #333333; margin-top: 15px;">$ '+montoDeuda+'</h4></center></div><div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 border-right"><center><h4 style="color: #333333; margin-top: 15px;">'+fechaDeuda+'</h4></center></div>');
              
        });

        $('#modalDetallesDeuda').modal('show');

      }else if(respuesta == ""){

        Swal.fire({

          icon: 'success',
          title: 'No adeudas nada a este proveedor',
          text: 'No tienes ninguna deuda actual con este proveedor',
          confirmButtonText: 'OK'
        
        })

      }else{

        Swal.fire({

          icon: 'error',
          title: 'Ha ocurrido un error',
          text: 'Sentimos las molestias',
          confirmButtonText: 'OK'
        
        })

      }

    }
        
  })

}
  
function Seleccionar(element){

  idEspecial = $(element).attr("idProveedor");
  var nombreProveedor = $(element).attr("nombreProveedor");
  var pagado = $(element).attr("pagado");
  var credito = $(element).attr("credito");
  
  //nombreProveedor = nombreProveedor * 1;

  $("#idProveedor").val(idEspecial); 

  $("#nombreProveedor").val(nombreProveedor);

  $("#pagado").val(pagado);

  $("#credito").val(credito);

  $('#modalDetalles').modal('show');

}

$("#guardarCambios").click(function (){

  //var idEditar = $("#idEditar").val();
  var nombreProveedor = $("#nombreProveedor").val();
  var pagado = $("#pagado").val();
  var credito = $("#credito").val();
  
  var datosProveedor = new FormData();

  datosProveedor.append("id",idEspecial);
  datosProveedor.append("nombre",nombreProveedor);
  datosProveedor.append("pagado",pagado);
  datosProveedor.append("credito",credito);
  datosProveedor.append("accion","actualizar");

        $.ajax({

        url:"ajax/nuevoProveedor.ajax.php",
        method:"POST",
        data: datosProveedor,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){

          if(respuesta == "ok"){

            Swal.fire({
              icon: 'success',
              title: 'Proveedor actualizado!',
              text: 'Proveedor actualizado con exito',
              confirmButtonText: 'OK',
              allowOutsideClick: false
              }).then((result) => {
                        
                if (result.isConfirmed) {
                  
                  window.location.href = "proveedores";
                  
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

$("#btnNuevoProveedor").click(function (){

  $('#modalAgregarProveedor').modal('show');

});

$('#guardarNuevoProveedor').click(function(){

  var nuevoNombre = $("#agregarNombre").val();
  var nuevoPagado = $("#agregarPagado").val();
  var nuevoCredito = $("#agregarCredito").val();

  var datosProveedorNuevo = new FormData();

  datosProveedorNuevo.append("nombre",nuevoNombre);
  datosProveedorNuevo.append("pagado",nuevoPagado);
  datosProveedorNuevo.append("credito",nuevoCredito);
  datosProveedorNuevo.append("accion","nuevo");

          $.ajax({

        url:"ajax/nuevoProveedor.ajax.php",
        method:"POST",
        data: datosProveedorNuevo,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){

          if(respuesta == "ok"){

            Swal.fire({
              icon: 'success',
              title: 'Proveedor Agregado!',
              text: 'Proveedor agregado con exito',
              confirmButtonText: 'OK',
              allowOutsideClick: false
              }).then((result) => {
                        
                if (result.isConfirmed) {
                  
                  window.location.href = "proveedores";
                  
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