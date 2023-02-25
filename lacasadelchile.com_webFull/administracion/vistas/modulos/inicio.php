
<!--=====================================
MODAL AGREGAR NUEVA VENTA
======================================-->

<div id="modalCuentaCaja" class="modal fade" role="dialog">
  
  <div class="modal-dialog">
    
    <div class="modal-content">
      
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#AD0808; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <center>
          <h3 class="modal-title" style="color: #ffffff">Efectivo en caja</h3>
          </center>
          
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div style="margin-left: 40px; margin-right: 40px;">

          <div class="form-group">
            <label >Monto en billetes $500</label>
            <input type="number" class="form-control" id="500modal" placeholder="">
            <small class="form-text text-muted">Ingresar el monto total</small>
          </div>

          <div class="form-group">
            <label >Monto en billetes $200</label>
            <input type="number" class="form-control" id="200modal" placeholder="">
            <small class="form-text text-muted">Ingresar el monto total</small>
          </div>

          <div class="form-group">
            <label >Monto en billetes $100</label>
            <input type="number" class="form-control" id="100modal" placeholder="">
            <small class="form-text text-muted">Ingresar el monto total</small>
          </div>

          <div class="form-group">
            <label >Monto en billetes $50</label>
            <input type="number" class="form-control" id="50modal" placeholder="">
            <small class="form-text text-muted">Ingresar el monto total</small>
          </div>

          <div class="form-group">
            <label >Monto en billetes $20</label>
            <input type="number" class="form-control" id="20modal" placeholder="">
            <small class="form-text text-muted">Ingresar el monto total</small>
          </div>

          <div class="form-group">
            <label >Monto en monedas $10</label>
            <input type="number" class="form-control" id="10modal" placeholder="">
            <small class="form-text text-muted">Ingresar el monto total</small>
          </div>

          <div class="form-group">
            <label >Monto en monedas $5</label>
            <input type="number" class="form-control" id="5modal" placeholder="">
            <small class="form-text text-muted">Ingresar el monto total</small>
          </div>

          <div class="form-group">
            <label >Monto en monedas $2</label>
            <input type="number" class="form-control" id="2modal" placeholder="">
            <small class="form-text text-muted">Ingresar el monto total</small>
          </div>

          <div class="form-group">
            <label >Monto en monedas $1</label>
            <input type="number" class="form-control" id="1modal" placeholder="">
            <small class="form-text text-muted">Ingresar el monto total</small>
          </div>

          <div class="form-group">
            <label >Monto en monedas $0.50</label>
            <input type="number" class="form-control" id="mediomodal" placeholder="">
            <small class="form-text text-muted">Ingresar el monto total</small>
          </div>

          <div class="form-group">
            <label >Otros montos</label>
            <input type="number" class="form-control" id="otrosmodal" placeholder="">
            <small class="form-text text-muted">Ingresar el monto total</small>
          </div>

          <span class="btn btn-default btnCalEfectivo" style="width: 100%; margin-top: 40px; margin-bottom: 40px;">Calcular efectivo en caja</span>

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

<?php

/*
TRAER CONFIGURACION GENERAL
*/
$CajaDelDia = ModeloInicio::mdlTraerCaja();


/*
TRAER VENTAS DEL DIA EN EFECTIVO
*/
$VentasEfectivo = ControladorInicio::ctrMostrarComprasEfectivo();

$totalVentasEfectivo = 0;

foreach ($VentasEfectivo as $key => $value) {

  $totalVentasEfectivo += ($value["peso"] * $value["precio"]);

}

/*
TRAER ABONOS DEL DIA EN EFECTIVO
*/
$AbonosEfectivo = ControladorInicio::ctrMostrarAbonosEfectivo();

$totalAbonosEfectivo = 0;

foreach ($AbonosEfectivo as $key => $value) {

  $totalAbonosEfectivo += $value["monto"];

}


/*
TRAER GASTOS DEL DIA EN EFECTIVO
*/
$PagosEfectivo = ControladorInicio::ctrMostrarGastosEfectivo();

$totalPagosEfectivo = 0;

foreach ($PagosEfectivo as $key => $value) {

  $totalPagosEfectivo += $value["monto"];

}

/*
TRAER ENTRADAS DEL DIA EN EFECTIVO
*/
$EntradasEfectivo = ControladorInicio::ctrMostrarEntradasEfectivo();

$totalEntradasEfectivo = 0;

foreach ($EntradasEfectivo as $key => $value) {

  $totalEntradasEfectivo += ($value["peso"] * $value["precio"]);

}

/*
TRAER ABONOS DE ENTRADAS DEL DIA EN EFECTIVO
*/
$AbonosEntradasEfectivo = ControladorInicio::ctrMostrarAbonosEntradasEfectivo();

$totalAbonosEntradasEfectivo = 0;

foreach ($AbonosEntradasEfectivo as $key => $value) {

  $totalAbonosEntradasEfectivo += $value["monto"];

}

$totalEfectivoDiario = $totalEntradasEfectivo + $totalAbonosEntradasEfectivo;

/*
TRAER CONFIGURACION GENERAL
*/
$Configuracion = ControladorInicio::ctrTraerObjetivo();
echo '<script> var dfbnyt = "'.$Configuracion["password"].'";</script>';

$efectivoCaja = $Configuracion["inicio"] + $totalVentasEfectivo + $totalAbonosEfectivo - $totalEfectivoDiario - $totalPagosEfectivo;

echo '<script> var efectivoCaja = '.$efectivoCaja.';</script>';
echo '<script> var inicioCaja = '.$Configuracion["inicio"].';</script>';


/*
TRAER VENTAS DEL DIA POR TARJETA
*/
$VentasTarjeta = ControladorInicio::ctrMostrarComprasTarjeta();

$totalVentasTarjeta = 0;

foreach ($VentasTarjeta as $key => $value) {

  $totalVentasTarjeta += ($value["peso"] * $value["precio"]);

}


/*
TRAER VENTAS DEL DIA POR TRANSFERENCIA
*/
$VentasTransferencia = ControladorInicio::ctrMostrarComprasTransferencia();

$totalVentasTransferencia = 0;

foreach ($VentasTransferencia as $key => $value) {

  $totalVentasTransferencia += ($value["peso"] * $value["precio"]);

}

/*
TRAER VENTAS DEL DIA POR TRANSFERENCIA
*/
$cuentasCobrar = ControladorInicio::ctrCuentasPorCobrar();

$cuentasPagar = ControladorInicio::ctrCuentasPorPagar();

?>

<!--=====================================
MODAL CONTRASEÑA
======================================-->

<div id="modalPassword" class="modal fade" role="dialog">
  
  <div class="modal-dialog">
    
    <div class="modal-content">
      
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#AD0808; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <center>
          <h3 class="modal-title" style="color: #ffffff"><strong>Ingresa la contraseña</strong></h3>
          </center>
          
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div style="margin-left: 40px; margin-right: 40px; margin-top: 30px;">

          <div class="form-group">
            <label >Contraseña del sistema</label>
            <input type="password" class="form-control" id="passwordInicio" name="passwordInicio" placeholder="">
            <small class="form-text text-muted">Ingresa la contraseña del sistema</small>
          </div>

          <button type="submit" class="btn btn-default btnPassword" style="width: 100%; margin-top: 40px; margin-bottom: 40px;">Entrar</button>

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

<!--=====================================
MODAL CONFIGURAR
======================================-->

<div id="modalConfigurar" class="modal fade" role="dialog">
  
  <div class="modal-dialog">
    
    <div class="modal-content">
      
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#AD0808; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <center>
          <h3 class="modal-title" style="color: #ffffff"><strong>Configurar inicio</strong></h3>
          </center>
          
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div style="margin-left: 40px; margin-right: 40px; margin-top: 30px;">

          <div class="form-group">
            <label >Inicio de caja</label>
            <input type="number" class="form-control" id="inicioCaja" name="inicioCaja" placeholder="" required>
            <small class="form-text text-muted">Ingresa un monto de inicio para la caja</small>
          </div>

          <div class="form-group">
            <label >Objetivo de ventas del dia</label>
            <input type="number" class="form-control" id="objetivoVentas" name="objetivoVentas" placeholder="" value="<?php echo $Configuracion["objetivo"];?>" required>
            <small class="form-text text-muted">Ingresar objetivo de ventas del día</small>
          </div>

          <button type="submit" class="btn btn-default btnConfigurar" id="btnConfigurar" style="width: 100%; margin-top: 40px; margin-bottom: 40px;">Guardar</button>

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

<!--=====================================
PÁGINA DE INICIO
======================================-->

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
    Inicio
    <small>Casa del chile</small>
    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Inicio</li>

    </ol>

  </section>
  
  <section class="content">

    <div class="box">

      <div class="box-body">

        <!--===================================Inicio de caja========================================-->

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

          <div class="small-box bg-aqua">
            
            <div class="inner">
              
              <h3>$<?php echo number_format($Configuracion["inicio"]); ?></h3>

              <p>Inicio de caja</p>
            
            </div>

            <div class="icon">
            
              <i class="fa fa-shopping-cart"></i>
            
            </div>
          
          </div>

        </div>

        <!--===================================Ventas en efectivo========================================-->

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

          <div class="small-box bg-aqua">
            
            <div class="inner">
              
              <h3>$<?php echo number_format($totalVentasEfectivo); ?></h3>

              <p>Ventas del día en efectivo</p>
            
            </div>

            <div class="icon">
            
              <i class="fa fa-shopping-cart"></i>
            
            </div>
          
          </div>

        </div>

        <!--===================================Caja actual========================================-->

        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

          <div class="small-box bg-aqua">
            
            <div class="inner">
              
              <h3>$<?php echo number_format($efectivoCaja); ?></h3>

              <p>Efectivo en caja</p>
            
            </div>

            <div class="icon">
            
              <i class="fa fa-shopping-cart"></i>
            
            </div>
          
          </div>

        </div>

        <!--===================================Caja actual========================================-->

        <a href="#modalCuentaCaja" data-toggle="modal"><div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

          <div class="small-box bg-aqua">
            
            <div class="inner">

              <?php

              if(isset($CajaDelDia["cuenta"])){

                echo '<h3 id="cuentaEfectivo">$'.number_format($CajaDelDia["cuenta"]).'</h3>

                <p>Cuenta de efectivo</p>';

              }else{

                echo '<h3 id="cuentaEfectivo">$</h3>

                <p>Cuenta de efectivo</p>';

              }

              ?>
            
            </div>

            <div class="icon">
            
              <i class="fa fa-shopping-cart"></i>
            
            </div>
          
          </div>

        </div></a>

        <!--===================================Caja actual========================================-->

        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

          <div class="small-box bg-aqua">
            
            <div class="inner">

              <?php

              if(isset($CajaDelDia["diferencia"])){

                echo '<h3 id="diferenciaEfectivo">$'.number_format($CajaDelDia["diferencia"]).'</h3>

                <p>Diferencia de efectivo</p>';

              }else{

                echo '<h3 id="diferenciaEfectivo">$</h3>

                <p>Diferencia de efectivo</p>';

              }

              ?>
            
            </div>

            <div class="icon">
            
              <i class="fa fa-shopping-cart"></i>
            
            </div>
          
          </div>

        </div>

        <!--===================================Pagado a proveedores========================================-->

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

          <div class="small-box bg-aqua">
            
            <div class="inner">
              
              <h3>$<?php echo number_format($totalEfectivoDiario); ?></h3>

              <p>Pagos del día a proveedores</p>
            
            </div>

            <div class="icon">
            
              <i class="fa fa-shopping-cart"></i>
            
            </div>
          
          </div>

        </div>

        <!--===================================Pagado de gastos en general========================================-->

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

          <div class="small-box bg-aqua">
            
            <div class="inner">
              
              <h3>$<?php echo number_format($totalPagosEfectivo); ?></h3>

              <p>Otros gastos día</p>
            
            </div>

            <div class="icon">
            
              <i class="fa fa-shopping-cart"></i>
            
            </div>
          
          </div>

        </div>

        <!--===================================Ventas del dia por transferencia========================================-->

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

          <div class="small-box bg-red">
            
            <div class="inner">
              
              <h3>$<?php echo number_format($totalVentasTransferencia); ?></h3>

              <p>Ventas del día por transferencia</p>
            
            </div>

            <div class="icon">
            
              <i class="fa fa-user"></i>
            
            </div>

          </div>

        </div>

        <!--===================================Ventas del dia por tarjeta========================================-->

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

          <div class="small-box bg-red">
            
            <div class="inner">
              
              <h3>$<?php echo number_format($totalVentasTarjeta); ?></h3>

              <p>Ventas del día por tarjeta</p>
            
            </div>

            <div class="icon">
            
              <i class="fa fa-user"></i>
            
            </div>

          </div>

        </div>

        <!--===================================Cuentas por cobrar========================================-->

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

          <div class="small-box bg-yellow">
            
            <div class="inner">
              
              <h3>$<?php echo number_format($cuentasCobrar); ?></h3>

              <p>Cuentas por cobrar</p>
            
            </div>

            <div class="icon">
            
              <i class="fa fa-shopping-bag"></i>
            
            </div>

          </div>

        </div>

        <!--===================================Cuentas por pagar========================================-->

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

          <div class="small-box bg-yellow">
            
            <div class="inner">
              
              <h3>$<?php echo number_format($cuentasPagar); ?></h3>

              <p>Cuentas por pagar</p>
            
            </div>

            <div class="icon">
            
              <i class="fa fa-shopping-bag"></i>
            
            </div>

          </div>

        </div>

        <!--===================================Venta objetivo========================================-->

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

          <div class="small-box bg-green">
            
            <div class="inner">
              
              <h3>$<?php echo number_format($Configuracion["objetivo"]); ?></h3>

              <p>Objetivo de ventas del día</p>
            
            </div>

            <div class="icon">
            
              <i class="fa fa-shopping-cart"></i>
            
            </div>
          
          </div>

        </div>

        <!--===================================Venta objetivo========================================-->

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

          <div class="small-box bg-blue" id="mostrarPassword" style="cursor: pointer;">
            
            <div class="inner">
              
              <center><h3>Actualizar inicio</h3></center>
            
            </div>

            <div class="icon">
            
              <i class="fa fa-shopping-cart"></i>
            
            </div>
          
          </div>

        </div>

      </div>

    </div>

 </section>

</div>

<script type="text/javascript">

console.log("casa del chile");

$("#btnConfigurar").click(function(){

  var inicio = $("#inicioCaja").val();
  var objetivo = $("#objetivoVentas").val();

  console.log(inicio);
  console.log(objetivo);

  var datosCobro = new FormData();
  datosCobro.append("inicio", inicio);
  datosCobro.append("objetivo", objetivo);

  $.ajax({

    url:"ajax/actualizar.ajax.php",
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
          title: '¡Inicio de caja guardada!',
          confirmButtonText: 'OK',
          allowOutsideClick: false
          }).then((result) => {
                        
            if (result.isConfirmed) {
              
              window.location.href = "inicio";
                  
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

$(".btnCalEfectivo").click(function(){

  var dinero500 = parseFloat($("#500modal").val()*1);
  
  var dinero200 = parseFloat($("#200modal").val()*1);


  var dinero100 = parseFloat($("#100modal").val()*1);
  var dinero50 = parseFloat($("#50modal").val()*1);
  var dinero20 = parseFloat($("#20modal").val()*1);
  var dinero10 = parseFloat($("#10modal").val()*1);
  var dinero5 = parseFloat($("#5modal").val()*1);
  var dinero2 = parseFloat($("#2modal").val()*1);
  var dinero1 = parseFloat($("#1modal").val()*1);
  var dineroMedio = parseFloat($("#mediomodal").val()*1);
  var dineroOtros =  parseFloat($("#otrosmodal").val()*1);

  var totalCaja = dinero500 + dinero200 + dinero100 + dinero50 + dinero20 + dinero10 + dinero5 + dinero2 + dinero1 + dineroMedio + dineroOtros;

  $("#cuentaEfectivo").text("$" + totalCaja);

  var diferenciaEfectivo = efectivoCaja - totalCaja;

  var miles = parseInt(diferenciaEfectivo / 1000);
  
  console.log(diferenciaEfectivo);
  console.log(miles);

  if(miles == 0){

    if(diferenciaEfectivo<0){

      $("#diferenciaEfectivo").text("$" + ((diferenciaEfectivo - (miles*1000)) * -1 ));

    }else{

      $("#diferenciaEfectivo").text("$" + (diferenciaEfectivo - (miles*1000)));

    }

  }else{

    if(diferenciaEfectivo<0){

      $("#diferenciaEfectivo").text("$" + miles + "," + ((diferenciaEfectivo - (miles*1000)) * -1 ));

    }else{

      $("#diferenciaEfectivo").text("$" + miles + "," + (diferenciaEfectivo - (miles*1000)));

    }

  }

  var datosCobro = new FormData();
  datosCobro.append("inicio", inicioCaja);
  datosCobro.append("fin", efectivoCaja);
  datosCobro.append("cuenta", totalCaja);
  datosCobro.append("diferencia", diferenciaEfectivo);

  $.ajax({

    url:"ajax/caja.ajax.php",
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
          title: '¡Caja guardada!',
          text: 'Se ha guardado el cierre de caja',
          confirmButtonText: 'OK',
          allowOutsideClick: false
          }).then((result) => {
                        
            if (result.isConfirmed) {
              
              window.location.href = "inicio";
                  
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

  $("#500modal").val(0);
  $("#200modal").val(0);
  $("#100modal").val(0);
  $("#50modal").val(0);
  $("#20modal").val(0);
  $("#10modal").val(0);
  $("#5modal").val(0);
  $("#2modal").val(0);
  $("#1modal").val(0);
  $("#mediomodal").val(0);

  $("#modalCuentaCaja").modal("hide");

})

$("#mostrarPassword").click(function(){

  $("#passwordInicio").val("");

  $("#modalPassword").modal("show");
  
})

$(".btnPassword").click(function(){

  var valorPassord = $("#passwordInicio").val();

  if(dfbnyt == valorPassord){

    $("#modalPassword").modal("hide");
    $("#modalConfigurar").modal("show");

  }else{

    $("#modalPassword").modal("hide");

    Swal.fire({
      icon: 'error',
      title: 'Contraseña incorrecta',
      text: 'Por favor intentalo nuevamente',
      confirmButtonText: 'OK'
    })

  }

})

</script>


