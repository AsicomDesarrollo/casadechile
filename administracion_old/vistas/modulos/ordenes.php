<?php

//$ventas = ControladorVentas::ctrMostrarTotalVentas();

?>

<div class="content-wrapper">

  <section class="content-header">

   <h1>
      Ventas
    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Ventas</li>

    </ol>

  </section>

  <br>

  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" onclick="pagoPrestamo()" style="cursor: pointer;">

    <div class="small-box bg-blue">
            
      <div class="inner">
              
        <h3>Pagar prestamo</h3>

        <p>Click pagar prestamos</p>
            
      </div>

      <div class="icon">
            
        <i class="fa fa-money"></i>
            
      </div>

    </div>

  </div>

  <span class="col-xs-0 col-sm-0 col-md-4 col-lg-4"> </span>

  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" onclick="buscarPorFecha()" style="cursor: pointer;">

    <div class="small-box bg-red">
            
      <div class="inner">
              
        <h3>Buscar por fecha</h3>

        <p>Click para buscar información</p>
            
      </div>

      <div class="icon">
            
        <i class="fa fa-shopping-bag"></i>
            
      </div>

    </div>

  </div>

  <section class="content col-xs-12 col-sm-12 col-md-12 col-lg-12">

    <div class="box">

      <div class="box-body">

        <div class="small-box" style="text-align: center; background-color: #AD0808;">
              
          <div class="inner">
                  
            <h5 style="color: white;">Nuevas ventas</h5>

          </div>
                  
        </div>

        <table class="table table-bordered table-striped dt-responsive tablaVentasPendientes" width="100%">
        
          <thead>
         
            <tr>
             
              <th style="width:30px">Folio</th>
              <th>Cliente</th>
              <th>Total</th>
              <th>Estatus</th>
              <th>Hora</th>
              <th>Fecha</th>
              <th>Acciones</th>

            </tr> 

          </thead>   
     
        </table>

        <div class="small-box" style="text-align: center; background-color: #AD0808; margin-top: 5%;">
              
          <div class="inner">
                  
            <h5 style="color: white;">Todas las ventas</h5>

          </div>
                  
        </div>
        
        <table class="table table-bordered table-striped dt-responsive tablaVentas" width="100%">
        
          <thead>
         
            <tr>
             
              <th style="width:30px">Folio</th>
              <th>Cliente</th>
              <th>Total</th>
              <th>Adeuda</th>
              <th>Estatus</th>
              <th>Hora</th>
              <th>Fecha</th>
              <th>Acciones</th>

            </tr> 

          </thead>   
     
        </table>

        <div class="small-box" style="text-align: center; background-color: #AD0808; margin-top: 5%;">
              
          <div class="inner">
                  
            <h5 style="color: white;">Pagos de prestamos</h5>

          </div>
                  
        </div>
        
        <table class="table table-bordered table-striped dt-responsive tablaPagosPrestamos" width="100%">
        
          <thead>
         
            <tr>
             
              <th style="width:30px">Folio</th>
              <th>Concepto</th>
              <th>Monto</th>
              <th>Fecha</th>
              <th>Hora</th>

            </tr> 

          </thead>   
     
        </table>
          
      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL DETALLES DE VENTAS
======================================-->

<div id="modalDetalles" class="modal fade bd-example-modal-xl" role="dialog" aria-hidden="true">
  
  <div class="modal-dialog modal-lg">
    
    <div class="modal-content">
      
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#AD0808; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <center>
          <h3 class="modal-title"><strong>Detalles de la venta</strong></h3>
          <h3 class="modal-title" id="clienteVenta"></h3>
          <h4 class="modal-title" id="estatusVenta"></h4>
          <h4 class="modal-title" id="totalVenta"></h4>
          </center>
          
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body" style="background-color: #ffffff;">

          <div class="box-body" id="detalleVenta">

            

          </div>

        </div>

    </div>

  </div>

</div>

<!--=====================================
MODAL DETALLES DE VENTAS
======================================-->

<div id="modalCredito" class="modal fade" role="dialog" aria-hidden="true">
  
  <div class="modal-dialog">
    
    <div class="modal-content">
      
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <center>
          <h3 class="modal-title"><strong>Pedido a credito</strong></h3>
          </center>
          
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body" style="background-color: #ffffff;">

          <div class="box-body">

            <div class="form-group">

              <label>Selecciona un cliente:</label>
              <select class="form-control" id="clienteCredito">

                <?php

                $categoria = ControladorVentas::ctrTraerClientes();

                foreach ($categoria as $key => $value) {
                  
                  echo '<option value="'.$value["nombre"].'">'.$value["nombre"].'</option>';

                }

                ?>

              </select>

            </div>

            <div class="form-group">
          
              <label>Fecha de pago:</label>
          
                <input type="date" class="form-control" id="fechaCredito">
        
            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer" style="">
          
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <span class="btn btn-success pull-right" id="generarCredito">Confirmar compra</button>

        </div>
        

    </div>

  </div>

</div>

<!--=====================================
MODAL AGREGAR ABONOS
======================================-->

<div id="modalAgregarAbono" class="modal fade" role="dialog" aria-hidden="true">
  
  <div class="modal-dialog">
    
    <div class="modal-content">
      
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#AD0808; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <center>
          <h3 class="modal-title"><strong>Agregar Abono</strong></h3>

          <br>

          <h4 class="modal-title"><strong id="modalAbonoTotal">Total:</strong></h4>

          <h4 class="modal-title"><strong id="modalAbonoAbonado">Abonado:</strong></h4>

          <h4 class="modal-title"><strong id="modalAbonoAdeuda">Adeuda:</strong></h4>
          </center>
          
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
          
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="button" class="btn btn-success pull-right" id="guardarAbono">Guardar</button>

        </div>

    </div>

  </div>

</div>

<!--=====================================
MODAL AGREGAR ABONOS
======================================-->

<div id="modalBuscarPorFecha" class="modal fade bd-example-modal-lg" role="dialog" aria-hidden="true">
  
  <div class="modal-dialog modal-lg">
    
    <div class="modal-content">
      
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#AD0808; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <center>
            <h3 class="modal-title"><strong>Buscar ventas por fecha</strong></h3>

            <br>

            <div class="form-group">

              <input type="date" id="modalFecha" class="form-control">
            
            </div>

            <br>

            <button type="button" class="btn btn-default col-xs-12 col-sm-12 col-md-12 col-lg-12" id="modalResultadoBuscar">BUSCAR</button>

            <br>
            <br>
            <br>

            <h4 class="modal-title"><strong id="modalResultadoTotal">Total: $ 0</strong></h4>

            <br>

          </center>
          
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <table class="table table-bordered table-striped dt-responsive tablaVentasEncontradas" width="100%">
        
            <thead>
           
              <tr>
               
                <th style="width:30px">Folio</th>
                <th>Cliente</th>
                <th>Total</th>
                <th>Estatus</th>
                <th>Hora</th>
                <th>Fecha</th>
                <th>Acciones</th>

              </tr> 

            </thead>   
       
          </table>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->
        

        <div class="modal-footer" style="">
          
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        </div>

    </div>

  </div>

</div>

<!--=====================================
MODAL PAGO PRESTAMO
======================================-->

<div id="modalPagarPrestamo" class="modal fade bd-example" role="dialog" aria-hidden="true">
  
  <div class="modal-dialog">
    
    <div class="modal-content">
      
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#AD0808; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <center>
            <h3 class="modal-title"><strong>PAGAR PRESTAMO</strong></h3>

            <br>

            <div class="form-group">

              <label>Concepto</label>
              <input type="text" id="prestamoConcepto" class="form-control" >
            
            </div>

            <br>

            <div class="form-group">

              <label>Monto</label>
              <input type="numer" id="prestamoMonto" class="form-control">
            
            </div>

            <br>

            <button type="button" class="btn btn-default col-xs-12 col-sm-12 col-md-12 col-lg-12" id="prestamoPagar">Pagar</button>

            <br>
            <br>
            <br>

          </center>
          
        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->
        

        <div class="modal-footer" style="">
          
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        </div>

    </div>

  </div>

</div>

<script type="text/javascript">

/*=============================================
CARGAR LA TABLA DINÁMICA DE VENTAS
=============================================*/

$(".tablaVentasPendientes").DataTable({
   "ajax": "ajax/tablaVentasPendientes.ajax.php",
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

/*=============================================
CARGAR LA TABLA DINÁMICA DE VENTAS
=============================================*/

$(".tablaPagosPrestamos").DataTable({
   "ajax": "ajax/tablaPagosPrestamos.ajax.php",
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

var idCredito = 0;


function buscarPorFecha(){

  $("#modalBuscarPorFecha").modal("show");

}

function pagoPrestamo(){

  $("#modalPagarPrestamo").modal("show");

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
    datosCobro.append("tabla", "compras");
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
       "ajax": "ajax/tablaBuscarVentas.ajax.php?fecha="+buscarFecha,
       "deferRender": false,
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

  }

})


$("#generarCredito").click(function(){

  var clienteCredito = $("#clienteCredito").val();
  var fechaLimite = $("#fechaCredito").val();

  if(clienteCredito != "" && fechaLimite != ""){

  var datosCobro = new FormData();
  datosCobro.append("accion", "Credito");
  datosCobro.append("idVenta", idCredito);
  datosCobro.append("fechaLimite", fechaLimite);

  Swal.fire({
    icon: 'question',
    title: '¿Esta seguro de ofrecer el producto a crédito?',
    text: 'El pago se registrara como Credito',
    confirmButtonText: 'OK',
    allowOutsideClick: true
    }).then((result) => {

      if (result.isConfirmed) {

        $.ajax({

          url:"ajax/ventas.ajax.php",
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
                title: 'Credito registrado',
                text: 'El credito ha sido registrado',
                confirmButtonText: 'OK',
                allowOutsideClick: false
              }).then((result) => {
                        
                if (result.isConfirmed) {
                  
                  window.location.href = "ordenes";
                  
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

  }else{

    Swal.fire({
      icon: 'error',
      title: 'Valores incorrectos',
      text: 'Debes llenar todos los campos',
      confirmButtonText: 'OK',
      footer: 'Sentimos las molestias'
    })

  }

})
  
function Seleccionar(element){

  $("#clienteVenta").text($(element).attr("cliente"));
  $("#estatusVenta").text("Estatus: " + $(element).attr("estatus"));
  $("#totalVenta").text("Total: $" + $(element).attr("total"));
  
  var idVenta = $(element).attr("idVenta");

  var productos = $(element).attr("productos").split("!");

  console.log(productos);

  $("#detalleVenta").empty();

  $("#detalleVenta").append("<div class='col-xs-5 col-sm-5 col-md-5 col-lg-5 border-right'><h4 style='color: #333333; margin-top: 15px;'><strong>Descripcion</h4></div>");

  $("#detalleVenta").append("<div class='col-xs-2 col-sm-2 col-md-2 col-lg-2 border-right'><center><h4 style='color: #333333; margin-top: 15px;'><strong>Costo</strong></h4></center></div>");

  $("#detalleVenta").append("<div class='col-xs-2 col-sm-2 col-md-2 col-lg-2 border-right'><center><h4 style='color: #333333; margin-top: 15px;'><strong>Kg</strong></h4></center></div>");

  $("#detalleVenta").append("<div class='col-xs-2 col-sm-2 col-md-2 col-lg-2 border-right'><center><h4 style='color: #333333; margin-top: 15px;'><strong>Importe</strong></h4></center></div>");

  $("#detalleVenta").append("<div class='col-xs-1 col-sm-1 col-md-1 col-lg-1 border-right'><center></center></div>");

  for(var i=0; i<productos.length; i++){

    var info = productos[i].split(";");

    $("#detalleVenta").append("<div class='col-xs-5 col-sm-5 col-md-5 col-lg-5 border-right'><h4 style='color: #333333; margin-top: 15px;'>"+info[0]+"</h4></div>");

    $("#detalleVenta").append("<div class='col-xs-2 col-sm-2 col-md-2 col-lg-2 border-right'><center><h4 style='color: #333333; margin-top: 15px;'>$ <input id='mod"+info[3]+"_Costo' type='number' value='"+info[2]+"' style='width: 50px;'></h4></center></div>");

    $("#detalleVenta").append("<div class='col-xs-2 col-sm-2 col-md-2 col-lg-2 border-right'><center><h4 style='color: #333333; margin-top: 15px;'><input id='mod"+info[3]+"_Peso' type='number' value='"+info[1]+"' style='width: 50px;'> kg</h4></center></div>");

    $("#detalleVenta").append("<div class='col-xs-2 col-sm-2 col-md-2 col-lg-2 border-right'><center><h4 style='color: #333333; margin-top: 15px;'>$ "+(info[1]*info[2])+"</h4></center></div>");

    $("#detalleVenta").append("<div class='col-xs-1 col-sm-1 col-md-1 col-lg-1 border-right actualizarPedidos'><span style='background-color: #51bbff; padding-left: 5px; padding-right: 5px; padding-top: 2px; padding-bottom: 2px; color: #ffffff; border-radius: 100%; cursor: pointer;' id='act"+info[3]+"' class='actualizarCompra'><i class='fa fa-upload' style='margin-top: 17px;'></i></span></div>");

    $("#detalleVenta").append("<span class='col-xs-12 col-sm-12 col-md-12 col-lg-12 border-right'> </span>");

  }

  $('#modalDetalles').modal('show');

}

$("#detalleVenta").on("click",".actualizarCompra",function(){

  console.log("boton actualizar");

  var idCompra = $(this).attr("id");
  idCompra = idCompra.substr(3, idCompra.length-1);
  var idCosto = $("#mod"+idCompra+"_Costo").val();
  var idPeso = $("#mod"+idCompra+"_Peso").val();

  var datosCobro = new FormData();
  datosCobro.append("accion", "actualizarProducto");
  datosCobro.append("idCompra", idCompra);
  datosCobro.append("idCosto", idCosto);
  datosCobro.append("idPeso", idPeso);

  console.log(idCompra);
  console.log(idCosto);
  console.log(idPeso);

  Swal.fire({
    icon: 'question',
    title: '¿Esta seguro de modificar este pedido?',
    text: 'Deberas recargar la pagina para ver los cambios',
    confirmButtonText: 'OK',
    allowOutsideClick: true
    }).then((result) => {

      if (result.isConfirmed) {

        $.ajax({

          url:"ajax/ventas.ajax.php",
          method:"POST",
          data: datosCobro,
          cache: false,
          contentType: false,
          processData: false,
          success:function(respuesta){

            console.log(respuesta)

            if(respuesta != ""){

              Swal.fire({
                icon: 'success',
                title: 'Pedido actualizado',
                text: 'Recarga la pagina para continuar',
                confirmButtonText: 'OK',
                allowOutsideClick: false
              }).then((result) => {
                        
                if (result.isConfirmed) {
                  
                  window.location.href = "ordenes";
                  
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

})

function Efectivo(element){

  var idVenta = $(element).attr("idVenta");
  var clienteVenta = $(element).attr("cliente");
  var totalVenta = $(element).attr("total");

  var datosCobro = new FormData();
  datosCobro.append("accion", "Pagado en efectivo");
  datosCobro.append("idVenta", idVenta);

  Swal.fire({
    icon: 'question',
    title: '¿Esta seguro de pagar en efectivo?',
    text: 'El pago se registrara como efectivo',
    confirmButtonText: 'OK',
    allowOutsideClick: true
    }).then((result) => {

      if (result.isConfirmed) {

        $.ajax({

          url:"ajax/ventas.ajax.php",
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
                title: 'Pago registrado',
                text: 'El pago ha sido registrado',
                confirmButtonText: 'OK',
                allowOutsideClick: false
              }).then((result) => {
                        
                if (result.isConfirmed) {
                  
                  window.location.href = "ordenes";
                  
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

function Transferencia(element){

  var idVenta = $(element).attr("idVenta");
  var clienteVenta = $(element).attr("cliente");
  var totalVenta = $(element).attr("total");

  var datosCobro = new FormData();
  datosCobro.append("accion", "Pagado por transferencia");
  datosCobro.append("idVenta", idVenta);

  Swal.fire({
    icon: 'question',
    title: '¿Esta seguro de pagar por transferencia?',
    text: 'El pago se registrara como pagado por transferencia',
    confirmButtonText: 'OK',
    allowOutsideClick: true
    }).then((result) => {

      if (result.isConfirmed) {

        $.ajax({

          url:"ajax/ventas.ajax.php",
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
                title: 'Pago registrado',
                text: 'El pago ha sido registrado',
                confirmButtonText: 'OK',
                allowOutsideClick: false
              }).then((result) => {
                        
                if (result.isConfirmed) {
                  
                  window.location.href = "ordenes";
                  
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

function Tarjeta(element){

  var idVenta = $(element).attr("idVenta");
  var clienteVenta = $(element).attr("cliente");
  var totalVenta = $(element).attr("total");

  var datosCobro = new FormData();
  datosCobro.append("accion", "Pagado con tarjeta");
  datosCobro.append("idVenta", idVenta);

  Swal.fire({
    icon: 'question',
    title: '¿Esta seguro de pagar con tarjeta?',
    text: 'El pago se registrara como pagado con tarjeta',
    confirmButtonText: 'OK',
    allowOutsideClick: true
    }).then((result) => {

      if (result.isConfirmed) {

        $.ajax({

          url:"ajax/ventas.ajax.php",
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
                title: 'Pago registrado',
                text: 'El pago ha sido registrado',
                confirmButtonText: 'OK',
                allowOutsideClick: false
              }).then((result) => {
                        
                if (result.isConfirmed) {
                  
                  window.location.href = "ordenes";
                  
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

function Credito(element){

$("#modalCredito").modal("show");

$("#clienteCredito").val("");
$("#fechaCredito").val("");

idCredito = $(element).attr("idVenta");

}

var abonoMaximo = 0;

function Abonos(element){

  var idAbono =  $(element).attr("idAbono");

  abonoMaximo =  $(element).attr("adeuda");

  $("#modalAbonoTotal").text("Total: $ " + $(element).attr("total"));
  $("#modalAbonoAbonado").text("Abonado: $ " + $(element).attr("abonado"));
  $("#modalAbonoAdeuda").text("Adeuda: $ " + $(element).attr("adeuda"));

  $("#idAbono").val(idAbono);

  $("#metodoPagoAbono").val("efectivo");

  $("#montoAbono").val(abonoMaximo);

  $("#modalAgregarAbono").modal("show");

}

$("#guardarAbono").click(function(){


  var idAbono = $("#idAbono").val();

  var metodoPagoAbono = $("#metodoPagoAbono").val();

  var montoabono = $("#montoAbono").val();

  if(montoabono <= abonoMaximo){

    var data = new FormData();

    data.append("id",idAbono);
    data.append("monto",montoabono);
    data.append("metodo",metodoPagoAbono);
    data.append("accion","abonarVenta");

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
                  
                  window.location.href = "ordenes";
                  
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

  }else{

    Swal.fire({
      icon: 'error',
      title: 'Abono incorrecto',
      text: 'El abono excede la deuda',
      confirmButtonText: 'OK'
    })

  }

});

function Cancelar(element){

  var idCancelar =  $(element).attr("idAbono");

  var datosCobro = new FormData();
  datosCobro.append("accion", "Cancelar");
  datosCobro.append("idCancelar", idCancelar);

  Swal.fire({
    icon: 'question',
    title: '¿Esta seguro de cancelar esta venta?',
    confirmButtonText: 'OK',
    allowOutsideClick: true
    }).then((result) => {

      if (result.isConfirmed) {

        $.ajax({

          url:"ajax/ventas.ajax.php",
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
                title: 'La venta ha sido cancelada',
                confirmButtonText: 'OK',
                allowOutsideClick: false
              }).then((result) => {
                        
                if (result.isConfirmed) {
                  
                  window.location.href = "ordenes";
                  
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

$("#prestamoPagar").click(function(){


  var concepto = $("#prestamoConcepto").val();

  var monto = $("#prestamoMonto").val();

  var data = new FormData();

    data.append("concepto",concepto);
    data.append("monto",monto);
    data.append("accion","Pagar prestamo");

    console.log(data);

      $.ajax({

        url:"ajax/ventas.ajax.php",
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
              title: 'Pago agregado!',
              text: 'Pago agregado con exito',
              confirmButtonText: 'OK',
              allowOutsideClick: false
              }).then((result) => {
                        
                if (result.isConfirmed) {
                  
                  window.location.href = "ordenes";
                  
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