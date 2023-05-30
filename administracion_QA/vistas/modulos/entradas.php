
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
                    <a class="btn btn-soft-primary"  style="cursor: pointer;" onclick="" id = "btnNuevaEntrada" ><i class="fas fa-plus"></i> Nueva entrada</a>
                  
                    </div>

                    <table class="table table-bordered table-striped dt-responsive tablaEntradas" width="100%">
        
                      <thead>
                    
                        <tr>
                        
                        <th style="width:30px">Folio</th>
                        <th>Producto</th>
                        <th>Peso</th>
                        <th>Precio por kg</th>
                        <th>Proveedor</th>
                        <th>Estatus</th>
                        <th>Total</th>
                        <th>Adeuda</th>              
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




<div class="modal fade bs-empleados-modal-center" id="modalAgregarEntrada" tabindex="-1" role="dialog"  aria-labelledby="mySmallModalLabel" aria-hidden="true">
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
              <label>Categorias:</label>
              <select class="form-control" id="categoriaEntradaNueva" onchange="filtrarCategoria('nuevo')">

                <option value="">Seleccionar</option>

                <?php

                $categoria = ControladorCategorias::ctrMostrarCategorias();

                foreach ($categoria as $key => $value) {
                  
                  echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                }

                ?>

              </select>
            </div>     

            <div class="form-group">
              <label>Producto:</label>
              <select class="form-control" id="agregarProductoEntrada">

                <?php

                $productos = ControladorProductos::ctrMostrarProductos();

                foreach ($productos as $key => $value) {
                  
                  echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                }

                ?>

              </select>
            </div>

            <div class="form-group">
              <label>Peso: </label>
              <input type="text" class="form-control" id="agregarPesoEntrada">
            </div>    

            <div class="form-group">
              <label>Precio de compra: </label>
              <input type="text" class="form-control" id="agregarPrecioEntrada">
            </div>           

            <div class="form-group">
              <label>Proveedor</label>
              <select class="form-control" id="agregarProveedor">

                <?php

                $proveedores = ControladorProveedores::ctrMostrarProveedores();

                foreach ($proveedores as $key => $value) {
                  
                  echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                }

                ?>

              </select>
            </div>

            <div class="form-group">
              <label>Método de pago: </label>
              <select class="form-control" id="agregarMetodoPago">
                <option value="efectivo">Efectivo</option>
                <option value="credito">Crédito</option>
              </select>
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
              <input type="text" class="form-control" id="idEntrada" disabled="disabled">
            </div>

            <div class="form-group">
              <label>Categorias:</label>
              <select class="form-control" id="categoriaEntrada" onchange="filtrarCategoria('editar')">

                <option value="">Seleccionar</option>

                <?php

                $categoria = ControladorCategorias::ctrMostrarCategorias();

                foreach ($categoria as $key => $value) {
                  
                  echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                }

                ?>

              </select>
            </div>            

            <div class="form-group">
              <label>Producto:</label>
              <select class="form-control" id="productoEntrada">

                <?php

                $productos = ControladorProductos::ctrMostrarProductos();

                foreach ($productos as $key => $value) {
                  
                  echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                }

                ?>

              </select>
            </div>

            <div class="form-group">
              <label>Peso: </label>
              <input type="text" class="form-control" id="pesoEntrada">
            </div>

            <div class="form-group">
              <label>Precio de compra: </label>
              <input type="text" class="form-control" id="precioEntrada">
            </div>

            <div class="form-group">
              <label>Proveedor: </label>
              <select class="form-control" id="proveedorEntrada">

                <?php

                $proveedores = ControladorProveedores::ctrMostrarProveedores();

                foreach ($proveedores as $key => $value) {
                  
                  echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                }

                ?>

              </select>
            </div>

            <div class="form-group" style="display: none;">
              <label>Fecha: </label>
              <input type="text" class="form-control" id="fechaEntrada" disabled="disabled">
            </div>

            <div class="form-group">
              <label>Método de pago: </label>
              <select class="form-control" id="metodoPago">
                <option value="efectivo">Efectivo</option>
                <option value="credito">Crédito</option>
                <option value="cancelado">Cancelado</option>
              </select>
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





<!--=====================================
MODAL AGREGAR BONOS
======================================-->




<div class="modal fade bs-empleados-modal-center" id="modalAgregarAbono" tabindex="-1" role="dialog"  aria-labelledby="mySmallModalLabel" aria-hidden="true">
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

            <div class="form-group" style = "display: none;">
              <label>Id: </label>
              <input type="text" class="form-control" id="idAbono">
            </div> 

            <div class="form-group">
              <label>Monto: </label>
              <input type="number" class="form-control" id="montoAbono">
            </div>    

            <div class="form-group">
              <label>Método de pago: </label>
              <select class="form-control" id="metodoPagoAbono">
                <option value="efectivo">Efectivo</option>
                <option value="transferencia">Transferencia</option>
              </select>
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

$(".tablaEntradas").DataTable({
   "ajax": "ajax/tablaEntradas.ajax.php",
   "deferRender": true,
   "retrieve": true,
   "processing": true,
   "order": [[0, "desc" ]],
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

function buscarPorFecha(){

  $("#modalBuscarPorFecha").modal("show");

}

$("#modalResultadoBuscar").click(function(){

  var buscarFecha = $("#modalFecha").val();

  if(buscarFecha == ""){

    Swal.fire({
      icon: 'error',
      title: 'Debes ingresar una fecha',
      text: 'Por favor intentalo nuevamente',
      confirmButtonText: 'OK'
    })

  }else{

    var datosCobro = new FormData();
    datosCobro.append("tabla", "entradas");
    datosCobro.append("fecha", buscarFecha);

    $.ajax({

      url:"ajax/total.ajax.php",
      method:"POST",
      data: datosCobro,
      cache: false,
      contentType: false,
      processData: false,
      success:function(respuesta){

        console.log(respuesta)

        if(respuesta != ""){

          $("#modalResultadoTotal").text("Total: $ " + respuesta);

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

    var table = $('.tablaVentasEncontradas').DataTable();

    table.destroy();

    $(".tablaVentasEncontradas").DataTable({
       "ajax": "ajax/tablaBuscarEntradas.ajax.php?fecha="+buscarFecha,
       "deferRender": false,
       "retrieve": true,
       "processing": true,
       "order": [[0, "desc" ]],
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
        "searchPlaceholder": "Buscar entrada",
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

  }

})

  
function filtrarCategoria(condicion) {

  var categoria;
  
  if(condicion == 'editar'){

     categoria = $("#categoriaEntrada").val();

     $("#productoEntrada").empty();


  }else{

     categoria = $("#categoriaEntradaNueva").val();

     $("#agregarProductoEntrada").empty();
  
  }

  categoria = categoria + "";
  

    console.log(categoria);

    var filtroCatego = new FormData();

    filtroCatego.append("categoria",categoria);
    filtroCatego.append("accion","filtrar");

    console.log(filtroCatego);

      $.ajax({

        url:"ajax/filtroCategorias.ajax.php",
        method:"POST",
        dataType: "json",
        data: filtroCatego,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){

          console.log(respuesta)

           if(respuesta != null){

            if(condicion == 'editar'){

              $.each(respuesta, function(index, elemento) {

                $("#productoEntrada").append('<option value="'+elemento.id+'">'+elemento.nombre+'</option>');

                console.log("id:" + elemento.id);
                console.log("id:" + elemento.nombre);
              
              });

            }else{

              $.each(respuesta, function(index, elemento) {

                $("#agregarProductoEntrada").append('<option value="'+elemento.id+'">'+elemento.nombre+'</option>');

                console.log("id:" + elemento.id);
                console.log("id:" + elemento.nombre);
              
              });
            
            }

           }else{


           }

        }
        
      })

  /*}else{

    var categoriaNueva = $("#categoriaEntradaNueva").val();
    console.log(categoriaNueva);

  }*/
  
}

function Abonos(element){

var idAbono =  $(element).attr("idAbono");

$("#idAbono").val(idAbono);

$("#montoAbono").val("");

$("#modalAgregarAbono").modal("show");

}

$("#guardarAbono").click(function(){


  var idAbono = $("#idAbono").val();

  var metodoPagoAbono = $("#metodoPagoAbono").val();

  var montoabono = $("#montoAbono").val();


    var data = new FormData();

    data.append("id",idAbono);
    data.append("monto",montoabono);
    data.append("metodo",metodoPagoAbono);
    data.append("accion","abonar");

    console.log(data);

      $.ajax({

        url:"ajax/nuevaEntrada.ajax.php",
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
              title: '¡Abono agregado!',
              text: 'Abono agregado con exito',
              confirmButtonText: 'OK',
              allowOutsideClick: false
              }).then((result) => {
                        
                if (result.isConfirmed) {
                  
                  window.location.href = "entradas";
                  
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

function Seleccionar(element){

  idEspecial = $(element).attr("idEntrada");
  var productoEntrada = $(element).attr("productoEntrada");
  var pesoEntrada = $(element).attr("pesoEntrada");
  var precioEntrada = $(element).attr("precioEntrada");
  var proveedorEntrada = $(element).attr("proveedorEntrada");
  var metodoPago = $(element).attr("metodoPago");
  var abono = $(element).attr("abono");

  productoEntrada = productoEntrada * 1;
  proveedorEntrada = proveedorEntrada * 1;

  $("#idEntrada").val(idEspecial);

  $("#productoEntrada").val(productoEntrada);

  $("#pesoEntrada").val(pesoEntrada);

  $("#precioEntrada").val(precioEntrada);

  $("#proveedorEntrada").val(proveedorEntrada);

  $("#metodoPago").val(metodoPago);

  $('#modalDetalles').modal('show');

}

$("#guardarCambios").click(function (){

  //var idEditar = $("#idEditar").val();
  var nombreProducto = $("#productoEntrada").val();
  var pesoEntrada = $("#pesoEntrada").val();
  var precioEntrada = $("#precioEntrada").val();
  var proveedorEntrada = $("#proveedorEntrada").val();
  var metodoPago = $("#metodoPago").val();
  
  var datosEntrada = new FormData();

  datosEntrada.append("id",idEspecial);
  datosEntrada.append("nombre",nombreProducto);
  datosEntrada.append("peso",pesoEntrada);
  datosEntrada.append("precio",precioEntrada);
  datosEntrada.append("proveedor",proveedorEntrada);
  datosEntrada.append("estatus",metodoPago);
  datosEntrada.append("accion","actualizar");

        $.ajax({

        url:"ajax/nuevaEntrada.ajax.php",
        method:"POST",
        data: datosEntrada,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){

          console.log(respuesta)

          if(respuesta == "ok"){

            Swal.fire({
              icon: 'success',
              title: 'Entrada actualizada!',
              text: 'Entrada actualizada con exito',
              confirmButtonText: 'OK',
              allowOutsideClick: false
              }).then((result) => {
                        
                if (result.isConfirmed) {
                  
                  window.location.href = "entradas";
                  
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

$("#btnNuevaEntrada").click(function (){

  $('#modalAgregarEntrada').modal('show');

});

$('#guardarNuevaEntrada').click(function(){

  var prodEntradaNuevo = $("#agregarProductoEntrada").val();
  var pesoEntradaNuevo = $("#agregarPesoEntrada").val();
  var precioEntrdaNuevo = $("#agregarPrecioEntrada").val();
  var proveedorEntradaNuevo = $("#agregarProveedor").val();
  var metodoPagoNuevo = $("#agregarMetodoPago").val();

  var datosEntradaNuevo = new FormData();

  datosEntradaNuevo.append("nombre",prodEntradaNuevo);
  datosEntradaNuevo.append("peso",pesoEntradaNuevo);
  datosEntradaNuevo.append("precio",precioEntrdaNuevo);
  datosEntradaNuevo.append("proveedor",proveedorEntradaNuevo);
  datosEntradaNuevo.append("estatus",metodoPagoNuevo);
  datosEntradaNuevo.append("accion","nuevo");

          $.ajax({

        url:"ajax/nuevaEntrada.ajax.php",
        method:"POST",
        data: datosEntradaNuevo,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){

          console.log(respuesta)

          if(respuesta == "ok"){

            Swal.fire({
              icon: 'success',
              title: 'Entrada Agregada!',
              text: 'Entrada agregada con exito',
              confirmButtonText: 'OK',
               allowOutsideClick: false
              }).then((result) => {
                        
                if (result.isConfirmed) {
                  
                  window.location.href = "entradas";
                  
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

function Cancelar(element){

  var idCancelar =  $(element).attr("idAbono");

  var datosCobro = new FormData();
  datosCobro.append("accion", "Cancelar");
  datosCobro.append("idCancelar", idCancelar);

  Swal.fire({
    icon: 'question',
    title: '¿Esta seguro de cancelar esta entrada de producto?',
    confirmButtonText: 'OK',
    allowOutsideClick: true
    }).then((result) => {

      if (result.isConfirmed) {

        $.ajax({

          url:"ajax/nuevaEntrada.ajax.php",
          method:"POST",
          data: datosCobro,
          cache: false,
          contentType: false,
          processData: false,
          success:function(respuesta){

            console.log(respuesta)

            if(respuesta == "ok"){

              Swal.fire({
                icon: 'success',
                title: 'La entrada ha sido cancelada',
                confirmButtonText: 'OK',
                allowOutsideClick: false
              }).then((result) => {
                        
                if (result.isConfirmed) {
                  
                  window.location.href = "entradas";
                  
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

      }

    })
  
}

</script>
