<?php

$empresa = $_GET["empresa"];

echo $empresa;

?>

<div class="content-wrapper">

  <section class="content-header">

   <h1>
      Detalles del servicio
    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Detalles del servicio</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-body">

        <!--=====================================
        Datos del cliente
        ======================================-->

        <div class="col-lg-12">

          <div class="small-box">
            
            <img src="vistas/img/plantilla/logo.png" class="img-responsive" style="">

            <div style="text-align: center;">
            
            <h4>Datos del cliente</h4>

            <hr style="border:1px solid #000000; width:90%; margin-bottom:15px; margin-top: 15px;">

          </div>

          </div>
          
        </div>

        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

          <div class="form-group">
            <a href="#modalClientes" data-toggle="modal"><label>Cliente</label> <i class="fa fa-plus-circle"></i></a>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Selecciona un cliente" disabled="disabled">
          </div>
          
        </div>

        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

          <div class="form-group">
            <label>Empresa</label>
            <input type="text" class="form-control" id="empresa" name="empresa" disabled="disabled">
          </div>
          
        </div>

        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

          <div class="form-group">
            <label>Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" disabled="disabled">
          </div>
          
        </div>

        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

          <div class="form-group">
            <label>Correo electrónico</label>
            <input type="text" class="form-control" id="email" name="email" disabled="disabled">
          </div>
          
        </div>

        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

          <div class="form-group">
            <a href="#"><label>Ver foto</label></a>
          </div>
          
        </div>

        <div class="box-body">

        <!--=====================================
        Datos del equipo
        ======================================-->

        <div class="col-lg-12">

          <div style="text-align: center;">
            
            <h4>Datos del equipo</h4>

            <hr style="border:1px solid #000000; width:90%; margin-bottom:15px; margin-top: 15px;">

          </div>
          
        </div>

        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

          <div class="form-group">
            <label>Dispositivo</label>
            <select class="form-control" id="dispositivo">

              <option value="">Selecciona un dispositivo</option>
              <option value="PC">PC</option>
              <option value="Laptop">Laptop</option>
              <option value="Celular">Celular</option>

            </select>
          </div>
          
        </div>

        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

          <div class="form-group">
            <label>Marca</label>
            <select class="form-control" id="marca">

              <option value="">Selecciona una marca</option>
              <option value="1">Marca 1</option>
              <option value="2">Marca 2</option>
              <option value="3">Marca 3</option>

            </select>
          </div>
          
        </div>

        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

          <div class="form-group">
            <label>Modelo</label> <a href="#"><label>Ver foto</label></a>
            <select class="form-control" id="modelo">

              <option value="">Selecciona un modelo</option>
              <option value="1">Modelo 1</option>
              <option value="2">Modelo 2</option>
              <option value="3">Modelo 3</option>

            </select>
          </div>
          
        </div>

        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

          <div class="form-group">
            <label># Serie</label>
            <input type="text" class="form-control" id="serie">
          </div>
          
        </div>

        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

          <div class="form-group">
            <label>Sucursal</label>
            <select class="form-control" id="sucursal">

              <option value="">Seleccionar</option>

              <?php
              $tecnicos = ControladorUsuarios::ctrMostrarSucursales();

              foreach ($tecnicos as $key => $value) {
                echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
              }
              ?>

            </select>
          </div>
          
        </div>

        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

          <div class="form-group">
            <label>Ing. Asignado</label>
            <select class="form-control" id="personal">

              <option value="">Seleccionar</option>

              <?php
              $tecnicos = ControladorUsuarios::ctrMostrarTecnicos();

              foreach ($tecnicos as $key => $value) {
                echo '<option value="'.$value["id"].'">'.$value["nombre"].' '.$value["paterno"].' '.$value["materno"].'</option>';
              }
              ?>

            </select>
          </div>
          
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

          <div class="form-group">
            <label>Falla</label>
            <textarea class="form-control" id="falla" rows="5"></textarea>
          </div>
          
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

          <div class="form-group">
            <label>Observaciones</label>
            <textarea class="form-control" id="observaciones" rows="5"></textarea>
          </div>
          
        </div>

        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

          <div class="form-group">
            <label>Total</label>
            <input type="text" class="form-control" id="costo">
          </div>
          
        </div>

        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

          <div class="form-group">
            <label>Método de pago</label>
            <select class="form-control" id="">

              <option value="">Selecciona un modelo</option>
              <option value="">Efectivo</option>
              <option value="">Tarjeta</option>
              <option value="">Transferencia</option>

            </select>
          </div>
          
        </div>

        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

          <div class="form-group">
            <label>Anticipo</label>
            <input type="text" class="form-control" id="anticipo">
          </div>
          
        </div>

        <?php

        $receptor = ControladorUsuarios::ctrMostrarReceptor($_SESSION["id"]);

        ?>

        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

          <div class="form-group">
            <label>Recibe</label>
            
            <?php
            echo '<input type="text" class="form-control" id="receptor" name="receptor" value="'.$receptor["nombre"].' '.$receptor["paterno"].' '.$receptor["materno"].'" disabled="disabled">';
            ?>
            
          </div>
          
        </div>

        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="display: none;">

          <div class="form-group">
            <label>Id Receptor</label>

            <?php
            echo '<input type="text" class="form-control" id="idReceptor" name="idReceptor" value="'.$receptor["id"].'" disabled="disabled">';
            ?>

          </div>
          
        </div>

        <span class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group btn btn-success" style="text-align: center;" id="btnNuevaCompra" name="btnNuevaCompra">Guardar</span>
          
      </div>
          
      </div>
          
    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR NUEVA VENTA
======================================-->

<div id="modalClientes" class="modal fade bd-example-modal-lg" role="dialog">
  
  <div class="modal-dialog modal-lg">
    
    <div class="modal-content">
      
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <center>
          <h4 class="modal-title">Selecciona un usuario</h4>
          </center>
          
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">
            
            
            <table class="table table-bordered table-striped dt-responsive tablaSeleccionaUsuario" width="100%">
        
              <thead>
             
                <tr>
                 
                   <th>Nombre</th>
                   <th>Paterno</th>
                   <th>Materno</th>
                   <th>E-mail</th>
                   <th>Telefono</th>
                   <th>Empresa</th>
                   <th>Fecha</th>
                   <th>Seleccionar</th>

                </tr> 

              </thead>   
         
            </table>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">
          
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        </div>

    </div>

  </div>

</div>

<script type="text/javascript">

var cliente;

/*=============================================
CARGAR LA TABLA DINÁMICA DE VENTAS
=============================================*/

$(".tablaSeleccionaUsuario").DataTable({
   "ajax": "ajax/tablaSeleccionUsuario.ajax.php",
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

$(document).ready(function(){

  $("#btnNuevaCompra").click(function(){

    var ventaSucursal = $("#sucursal").val();
    var ventaCliente = cliente;
    var ventaPersonal = $("#personal").val();
    var ventaEquipo = $("#dispositivo").val();
    var ventaMarca = $("#marca").val();
    var ventaModelo = $("#modelo").val();
    var ventaSerie = $("#serie").val();
    var ventaFalla = $("#falla").val();
    var ventaCondiciones = $("#observaciones").val();
    var ventaCosto = $("#costo").val();
    var ventaAnticipo = $("#anticipo").val();
    var ventaRecibe = $("#idReceptor").val();

    if(ventaSucursal != "" &&
      ventaCliente != "" &&
      ventaPersonal != "" &&
      ventaEquipo != "" &&
      ventaMarca != "" &&
      ventaModelo != "" &&
      ventaSerie != "" &&
      ventaFalla != "" &&
      ventaCondiciones != "" &&
      ventaCosto != "" &&
      ventaAnticipo != "" &&
      ventaRecibe != ""){

      var datosCobro = new FormData();
      datosCobro.append("accion", "venta");
      datosCobro.append("sucursal", ventaSucursal);
      datosCobro.append("cliente", ventaCliente);
      datosCobro.append("personal", ventaPersonal);
      datosCobro.append("equipo", ventaEquipo);
      datosCobro.append("marca", ventaMarca);
      datosCobro.append("modelo", ventaModelo);
      datosCobro.append("serie", ventaSerie);
      datosCobro.append("falla", ventaFalla);
      datosCobro.append("condiciones", ventaCondiciones);
      datosCobro.append("costo", ventaAnticipo);
      datosCobro.append("anticipo", ventaAnticipo);
      datosCobro.append("recibe", ventaRecibe);

      $.ajax({

        url:"https://mcgnetworks.mx/asicom/administracion/ajax/nuevo.ajax.php",
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
              title: '¡Venta generada!',
              text: 'Usuario creado con exito',
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

    }else{

      Swal.fire({
        icon: 'error',
        title: 'Debes llenar todos los campos',
        text: 'Por favor verifica la información',
        confirmButtonText: 'OK'
      })

    }

  });

})

function Seleccionar(element){

  $("#nombre").val($(element).attr("nombre") +" "+ $(element).attr("paterno") +" "+ $(element).attr("materno"));
  $("#empresa").val($(element).attr("empresa"));
  $("#telefono").val($(element).attr("telefono"));
  $("#email").val($(element).attr("email"));

  cliente = $(element).attr("idUsuario");

  $('#modalClientes').modal('hide');

}

</script>