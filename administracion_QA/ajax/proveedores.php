<?php

//$ventas = ControladorVentas::ctrMostrarTotalVentas();

?>

<div class="content-wrapper">

  <section class="content-header">

   <h1>
      Proveedores
    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Proveedores</li>

    </ol> <br>

  
<!-- Boton para agregar nueva categoria -->

   <div class="small-box bg-navy" style="text-align: center; cursor: pointer;" id = "btnNuevoProveedor">
              
      <div class="inner">
              
         <h5 style="color: white;">Nuevo Proveedor</h5>

      </div>
              
   </div>

  </section>




  <section class="content">

    <div class="box">

      <div class="box-body">
        
        <table class="table table-bordered table-striped dt-responsive tablaProveedores" width="100%">
        
          <thead>
         
            <tr>
             
              <th style="width:30px">Folio</th>
              <th>Nombre</th>
              <th>Pagado</th>
              <th>Credito</th>
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
MODAL DETALLES DE PRODUCTOS
======================================-->

<div id="modalDetalles" class="modal fade" role="dialog" aria-hidden="true">
  
  <div class="modal-dialog">
    
    <div class="modal-content">
      
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <center>
          <h3 class="modal-title"><strong>Editar Proveedor</strong></h3>
          </center>
          
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <div class="form-group">
              <label>Identificador:</label>
              <input type="text" class="form-control" id="idProveedor" disabled="disabled">
            </div>

            <div class="form-group">
              <label>Nombre:</label>
              <select class="form-control" id="nombreProveedor">

                <?php

                $productos = ControladorProductos::ctrMostrarProductos();

                foreach ($productos as $key => $value) {
                  
                  echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                }

                ?>

              </select>
            </div>

            <div class="form-group">
              <label>Pagado: </label>
              <input type="text" class="form-control" id="pagado">
            </div>

            <div class="form-group">
              <label>Crédito: </label>
              <input type="text" class="form-control" id="credito">
            </div>

            <div class="form-group">
              <label>Fecha: </label>
              <input type="text" class="form-control" id="fecha" disabled="disabled">
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
MODAL AGREGAR PRODUCTOS
======================================-->

<div id="modalAgregarProveedor" class="modal fade" role="dialog" aria-hidden="true">
  
  <div class="modal-dialog">
    
    <div class="modal-content">        <!--=====================================

      
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <center>
          <h3 class="modal-title"><strong>Agregar Proveedor</strong></h3>
          </center>
          
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <div class="form-group">
              <label>Nombre:</label>
              <select class="form-control" id="agregarNombre">

                <?php

                $productos = ControladorProductos::ctrMostrarProductos();

                foreach ($productos as $key => $value) {
                  
                  echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                }

                ?>

              </select>
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
          
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="button" class="btn btn-success pull-right" id="guardarNuevoProveedor">Guardar</button>

        </div>

    </div>

  </div>

</div>




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

  idEspecial = $(element).attr("idProveedor");
  var nombreProveedor = $(element).attr("nombreProveedor");
  var pagado = $(element).attr("pagado");
  var credito = $(element).attr("credito");
  

  nombreProveedor = nombreProveedor * 1;
//  proveedorEntrada = proveedorEntrada * 1;


  $("#idProveedor").val(idEspecial); 

  $("#nombreProveedor").val(nombreProveedor);

  $("#pagado").val(pagado);

  $("#credito").val(credito);

  $('#modalDetalles').modal('show');

  console.log(idEspecial);
  console.log("prodcto entrada:"+nombreProveedor);
  console.log(pagado);
  console.log(credito);

}

$("#guardarCambios").click(function (){

  //var idEditar = $("#idEditar").val();
  var nombreProveedor = $("#nombreProveedor").val();
  var pagado = $("#pagado").val();
  var credito = $("#credito").val();
  
  console.log(nombreProveedor);
  console.log(pagado);
  console.log(credito);
  
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

          console.log(respuesta)

          if(respuesta == "ok"){

            Swal.fire({
              icon: 'success',
              title: 'Proveedor actualizado!',
              text: 'Proveedor actualizado con exito',
              confirmButtonText: 'OK'
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

          console.log(respuesta)

          if(respuesta == "ok"){

            Swal.fire({
              icon: 'success',
              title: 'Proveedor Agregado!',
              text: 'Proveedor agregado con exito',
              confirmButtonText: 'OK'
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