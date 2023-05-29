
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
                    <a class="btn btn-soft-primary"  style="cursor: pointer;" onclick="" id = "btnNuevoProd" ><i class="fas fa-plus"></i> Nuevo producto</a>
                  
                    </div>

                    <table class="table table-bordered table-striped dt-responsive tablaProductos" width="100%">
        
                      <thead>
                    
                        <tr>
                        
                        <th>Folio</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Mínimo</th>
                        <th>Categoría</th>
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
MODAL AGREGAR PRDUCTO
======================================-->




<div class="modal fade bs-empleados-modal-center" id="modalAgregarProd" tabindex="-1" role="dialog"  aria-labelledby="mySmallModalLabel" aria-hidden="true">
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

        <div id="detalleProducto" class="modal-body">

          <div class="box-body">

            <div class="form-group">
              <label>Nombre:</label>
              <input type="text" class="form-control" id="agregarNombreProducto">
            </div>

            <div class="form-group">
              <label>Precio: </label>
              <input type="text" class="form-control" id="agregarPrecioProducto">
            </div>

            <div class="form-group">
              <label>Mínimo: </label>
              <input type="text" class="form-control" id="agregarPrecioMin">
            </div>

            <div class="form-group">
              <label>Máximo: </label>
              <input type="text" class="form-control" id="agregarPrecioMax">
            </div>


            <div class="form-group">
              <label>Categoría: </label>
              <select class="form-control" id="nuevaCategoria">

                <?php

                $categorias = ControladorCategorias::ctrMostrarCategorias();

                foreach ($categorias as $key => $value) {
                  
                  echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                }

                ?>

              </select>
            </div>            

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->
        

        <div class="modal-footer" style="">
          
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

          <button type="button" class="btn btn-success pull-right" id="guardarNuevoProd">Guardar</button>

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
              <h5 class="modal-title">Detalles del producto</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"
                  aria-label="Close">
              </button>
          </div>
        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->


        <div  class="modal-body">

          <div class="box-body">

            <div class="form-group" style="display: none;">
              <label>Identificador:</label>
              <input type="text" class="form-control" id="idEditar" disabled="disabled">
            </div>

            <div class="form-group">
              <label>Nombre:</label>
              <input type="text" class="form-control" id="nombreProducto">
            </div>

            <div class="form-group">
              <label>Precio: </label>
              <input type="text" class="form-control" id="precioProducto">
            </div>

            <div class="form-group">
              <label>Mínimo: </label>
              <input type="text" class="form-control" id="precioMin">
            </div>

            <div class="form-group">
              <label>Máximo: </label>
              <input type="text" class="form-control" id="precioMax">
            </div>


            <div class="form-group">
              <label>Categoría: </label>
              <select class="form-control" id="categoriaProducto">

                <?php

                $categorias = ControladorCategorias::ctrMostrarCategorias();

                foreach ($categorias as $key => $value) {
                  
                  echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                }

                ?>

              </select>
            </div>            

            <div class="form-group" style="display: none;">
              <label>Fecha: </label>
              <input type="text" class="form-control" id="fechaProducto" disabled="disabled">
            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->
        

        <div class="modal-footer" style="">
          
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

          <button type="button" class="btn btn-primary pull-right" id="guardarNuevoProd">Guardar</button>

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

$(".tablaProductos").DataTable({
   "ajax": "ajax/tablaProductos.ajax.php",
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
    "searchPlaceholder": "Buscar producto ",
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

  idEspecial = $(element).attr("idProducto");
  var nombreProducto = $(element).attr("nombreProducto");
  var precioProducto = $(element).attr("precioProducto");
  var precioMin = $(element).attr("precioMin");
  var precioMax = $(element).attr("precioMax");
  var categoriaProducto = $(element).attr("categoriaProducto");
  var fechaProducto = $(element).attr("fechaProducto");

  console.log(idEspecial);
  console.log(nombreProducto);
  console.log(precioProducto);
  console.log(precioMin);
  console.log(precioMax);
  console.log(categoriaProducto);
  console.log(fechaProducto);
  
  $("#idEditar").val(idEspecial);

  $("#nombreProducto").val(nombreProducto);

  $("#precioProducto").val(precioProducto);

  $("#precioMin").val(precioMin);

  $("#precioMax").val(precioMax);

  $("#categoriaProducto").val(categoriaProducto);

  $("#fechaProducto").val(fechaProducto);

  $('#modalDetalles').modal('show');

}

$("#guardarCambios").click(function (){

  //var idEditar = $("#idEditar").val();
  var nombreProducto = $("#nombreProducto").val();
  var precioProducto = $("#precioProducto").val();
  var precioMin = $("#precioMin").val();
  var precioMax = $("#precioMax").val();
  var categoriaProducto = $("#categoriaProducto").val();

  console.log(idEspecial);
  console.log(nombreProducto);
  console.log(precioProducto);
  console.log(precioMin);
  console.log(precioMax);
  console.log(categoriaProducto);

  var datosProducto = new FormData();

  datosProducto.append("id",idEspecial);
  datosProducto.append("nombre",nombreProducto);
  datosProducto.append("precio",precioProducto);
  datosProducto.append("preciomin",precioMin);
  datosProducto.append("preciomax",precioMax);
  datosProducto.append("categoria",categoriaProducto);
  datosProducto.append("accion","actualizar");

        $.ajax({

        url:"ajax/nuevoProducto.ajax.php",
        method:"POST",
        data: datosProducto,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){

          console.log(respuesta)

          if(respuesta == "ok"){

            Swal.fire({
              icon: 'success',
              title: 'Producto actualizado!',
              text: 'Producto actualizado con exito',
              confirmButtonText: 'OK',
              allowOutsideClick: false
              }).then((result) => {
                        
                if (result.isConfirmed) {
                  
                  window.location.href = "productos";
                  
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

$("#btnNuevoProd").click(function (){

  $('#modalAgregarProd').modal('show');

});

$('#guardarNuevoProd').click(function(){

  var nombreProdNuevo = $("#agregarNombreProducto").val();
  var precioProdNuevo = $("#agregarPrecioProducto").val();
  var precioProdNuevoMin = $("#agregarPrecioMin").val();
  var precioProdNuevoMax = $("#agregarPrecioMax").val();
  var categoProdNuevo = $("#nuevaCategoria").val();

  var datosProdNuevo = new FormData();

  datosProdNuevo.append("nombre",nombreProdNuevo);
  datosProdNuevo.append("precio",precioProdNuevo);
  datosProdNuevo.append("preciomin",precioProdNuevoMin);
  datosProdNuevo.append("preciomax",precioProdNuevoMax);
  datosProdNuevo.append("categoria",categoProdNuevo);
  datosProdNuevo.append("accion","nuevo");

          $.ajax({

        url:"ajax/nuevoProducto.ajax.php",
        method:"POST",
        data: datosProdNuevo,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){

          console.log(respuesta)

          if(respuesta == "ok"){

            Swal.fire({
              icon: 'success',
              title: 'Producto Agregado!',
              text: 'Producto agregado con exito',
              confirmButtonText: 'OK',
              allowOutsideClick: false
              }).then((result) => {
                        
                if (result.isConfirmed) {
                  
                  window.location.href = "productos";
                  
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