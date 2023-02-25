<?php

//$ventas = ControladorVentas::ctrMostrarTotalVentas();

?>

<div class="content-wrapper">

  <section class="content-header">

   <h1>
      Clientes
    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Clientes</li>

    </ol> <br>

  
<!-- Boton para agregar nueva categoria -->

   <div class="small-box" style="text-align: center; cursor: pointer; background-color: #AD0808;" id = "btnNuevoCliente">
              
      <div class="inner">
              
         <h5 style="color: white;">Nuevo Cliente</h5>

      </div>
              
   </div>

  </section>




  <section class="content">

    <div class="box">

      <div class="box-body">
        
        <table class="table table-bordered table-striped dt-responsive tablaCliente" width="100%">
        
          <thead>
         
            <tr>
             
              <th style="width:30px">Folio</th>
              <th>Nombre</th>
              <th>Deuda</th>
              <!--<th>Saldo a favor</th>-->
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

        <div class="modal-header" style="background:#AD0808; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <center>
          <h3 class="modal-title"><strong>Editar Cliente</strong></h3>
          </center>
          
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
          
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="button" class="btn btn-success pull-right" id="guardarCambios">Guardar</button>

        </div>

    </div>

  </div>

</div>

<!--=====================================
MODAL AGREGAR PRODUCTOS
======================================-->

<div id="modalAgregarCliente" class="modal fade" role="dialog" aria-hidden="true">
  
  <div class="modal-dialog">
    
    <div class="modal-content">

        <!--=====================================    
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#AD0808; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <center>
          <h3 class="modal-title"><strong>Agregar Cliente</strong></h3>
          </center>
          
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
          
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="button" class="btn btn-success pull-right" id="guardarNuevoCliente">Guardar</button>

        </div>

    </div>

  </div>

</div>


<!--=====================================
Modal ver detalles de cliente
======================================-->

<div id="modalVerDetalles" class="modal fade" role="dialog" aria-hidden="true">
  
  <div class="modal-dialog">
    
    <div class="modal-content">

        <!--=====================================    
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background-color: #AD0808; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <center>
          <h3 class="modal-title"><strong>Detalle de compras</strong></h3>
          </center>
          
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body" id = "bodyDeudas">

            

          </div>

        </div>

    </div>

  </div>

</div>






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

        url:"https://mcgnetworks.mx/bodega/administracion/ajax/nuevoCliente.ajax.php",
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

        url:"https://mcgnetworks.mx/bodega/administracion/ajax/nuevoCliente.ajax.php",
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