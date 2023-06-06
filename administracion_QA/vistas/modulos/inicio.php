<!--=====================================MODAL modalCuentaCaja ======================================-->
<div id="modalCuentaCaja" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--=====================================        CABEZA DEL MODAL        ======================================-->
            <div class="modal-header" style="background:#AD0808; color:white"> <button type="button" class="close"
                    data-dismiss="modal">&times;</button>
                <center>
                    <h3 class="modal-title" style="color: #ffffff">Efectivo en caja</h3>
                </center>
            </div>
            <!--=====================================        CUERPO DEL MODAL        ======================================-->
            <div style="margin-left: 40px; margin-right: 40px;">
                <div class="form-group"> <label>Monto en billetes $500</label> <input type="number" class="form-control"
                        id="500modal" placeholder=""> <small class="form-text text-muted">Ingresar el monto
                        total</small> </div>
                <div class="form-group"> <label>Monto en billetes $200</label> <input type="number" class="form-control"
                        id="200modal" placeholder=""> <small class="form-text text-muted">Ingresar el monto
                        total</small> </div>
                <div class="form-group"> <label>Monto en billetes $100</label> <input type="number" class="form-control"
                        id="100modal" placeholder=""> <small class="form-text text-muted">Ingresar el monto
                        total</small> </div>
                <div class="form-group"> <label>Monto en billetes $50</label> <input type="number" class="form-control"
                        id="50modal" placeholder=""> <small class="form-text text-muted">Ingresar el monto total</small>
                </div>
                <div class="form-group"> <label>Monto en billetes $20</label> <input type="number" class="form-control"
                        id="20modal" placeholder=""> <small class="form-text text-muted">Ingresar el monto total</small>
                </div>
                <div class="form-group"> <label>Monto en monedas $10</label> <input type="number" class="form-control"
                        id="10modal" placeholder=""> <small class="form-text text-muted">Ingresar el monto total</small>
                </div>
                <div class="form-group"> <label>Monto en monedas $5</label> <input type="number" class="form-control"
                        id="5modal" placeholder=""> <small class="form-text text-muted">Ingresar el monto total</small>
                </div>
                <div class="form-group"> <label>Monto en monedas $2</label> <input type="number" class="form-control"
                        id="2modal" placeholder=""> <small class="form-text text-muted">Ingresar el monto total</small>
                </div>
                <div class="form-group"> <label>Monto en monedas $1</label> <input type="number" class="form-control"
                        id="1modal" placeholder=""> <small class="form-text text-muted">Ingresar el monto total</small>
                </div>
                <div class="form-group"> <label>Monto en monedas $0.50</label> <input type="number" class="form-control"
                        id="mediomodal" placeholder=""> <small class="form-text text-muted">Ingresar el monto
                        total</small> </div>
                <div class="form-group"> <label>Otros montos</label> <input type="number" class="form-control"
                        id="otrosmodal" placeholder=""> <small class="form-text text-muted">Ingresar el monto
                        total</small> </div> <span class="btn btn-default btnCalEfectivo"
                    style="width: 100%; margin-top: 40px; margin-bottom: 40px;">Calcular
                    efectivo en caja</span>
            </div>
            <!--=====================================        PIE DEL MODAL        ======================================-->
            <div class="modal-footer"> <button type="button" class="btn btn-default pull-left"
                    data-dismiss="modal">Salir</button> </div>
        </div>
    </div>
</div>

<?php

// ASICOM
// ASICOM
// ASICOM


// $vCorUtilidad = ModeloInicio::ventasCorteUtilidad()[0];
$vCPagosCreditosEfectivo = ModeloInicio::ventasCortePagosCreditosMetodos('efectivo')[0];
$vCPagosCreditosTarjeta = ModeloInicio::ventasCortePagosCreditosMetodos('tarjeta')[0];
$vCPagosCreditosTransferencia = ModeloInicio::ventasCortePagosCreditosMetodos('transferencia')[0];
$vCorCreditosTodos = ModeloInicio::ventasCorteCreditosTodos()[0];
$vCorPagosCreditos = ModeloInicio::ventasCortePagosCreditos()[0]; //pagos de creditos sin importar el metodo

$vCorInicioCaja = ModeloInicio::ventasCorteInicioCaja()[0]; //inicio de caja
$vCor = ModeloInicio::ventasCorte()[0]; //todas las ventas

$vCorEfectivoCaja = ModeloInicio::ventasCorteEfectivoCaja(); //ventas en efectivo mas inicio de caja
$vCorEfectivo = ModeloInicio::ventasCorteEfectivo()[0];
$vCorTarjeta = ModeloInicio::ventasCorteTarjeta()[0]; // ventas con tarjeta
$vCorTransferencia = ModeloInicio::ventasCorteTransferencia()[0]; // ventas por transferencia 
$vCorCredito = ModeloInicio::ventasCorteCredito()[0];
$vCorGastos = ModeloInicio::ventasCorteGastos()[0];
$vCorGastosProveedores = ModeloInicio::ventasCorteGastosProveedores()[0];
$vCorGastosDia = ModeloInicio::ventasCorteGastosDia()[0];
  echo "<pre>";
  print_r($vCorEfectivoCaja);
  echo "</pre>";





// ASICOM
// ASICOM
// ASICOM


  /*TRAER CONFIGURACION GENERAL*/
  $CajaDelDia = ModeloInicio::mdlTraerCaja();
  /*TRAER VENTAS DEL DIA EN EFECTIVO*/
  $VentasEfectivo = ControladorInicio::ctrMostrarComprasEfectivo();
  $totalVentasEfectivo = 0;
  foreach ($VentasEfectivo as $key => $value) {
 $totalVentasEfectivo += ($value["peso"] * $value["precio"]);
  }
  /*TRAER ABONOS DEL DIA EN EFECTIVO*/
  $AbonosEfectivo = ControladorInicio::ctrMostrarAbonosEfectivo();
  $totalAbonosEfectivo = 0;
  foreach ($AbonosEfectivo as $key => $value) {
 $totalAbonosEfectivo += $value["monto"];
  }
  /*TRAER GASTOS DEL DIA EN EFECTIVO*/
  $PagosEfectivo = ControladorInicio::ctrMostrarGastosEfectivo();
  $totalPagosEfectivo = 0;
  foreach ($PagosEfectivo as $key => $value) {
 $totalPagosEfectivo += $value["monto"];
  }
  /*TRAER ENTRADAS DEL DIA EN EFECTIVO*/
  $EntradasEfectivo = ControladorInicio::ctrMostrarEntradasEfectivo();
  $totalEntradasEfectivo = 0;
  foreach ($EntradasEfectivo as $key => $value) {
 $totalEntradasEfectivo += ($value["peso"] * $value["precio"]);
  }
  /*TRAER ABONOS DE ENTRADAS DEL DIA EN EFECTIVO*/
  $AbonosEntradasEfectivo = ControladorInicio::ctrMostrarAbonosEntradasEfectivo();
  $totalAbonosEntradasEfectivo = 0;
  foreach ($AbonosEntradasEfectivo as $key => $value) {
 $totalAbonosEntradasEfectivo += $value["monto"];
  }$totalEfectivoDiario = $totalEntradasEfectivo + $totalAbonosEntradasEfectivo;
  /*TRAER CONFIGURACION GENERAL*/
  $Configuracion = ControladorInicio::ctrTraerObjetivo();
  echo '<script> var dfbnyt = "'.$Configuracion["password"].'";
  </script>';
  $efectivoCaja = $Configuracion["inicio"] + $totalVentasEfectivo + $totalAbonosEfectivo - $totalEfectivoDiario - $totalPagosEfectivo;
  echo '<script> var efectivoCaja = '.$efectivoCaja.';
  </script>';
  echo '<script> var inicioCaja = '.$Configuracion["inicio"].';
  </script>';
  /*TRAER VENTAS DEL DIA POR TARJETA*/
  $VentasTarjeta = ControladorInicio::ctrMostrarComprasTarjeta();
  $totalVentasTarjeta = 0;
  foreach ($VentasTarjeta as $key => $value) {
 $totalVentasTarjeta += ($value["peso"] * $value["precio"]);
  }
  /*TRAER VENTAS DEL DIA POR TRANSFERENCIA*/
  $VentasTransferencia = ControladorInicio::ctrMostrarComprasTransferencia();
  $totalVentasTransferencia = 0;
  foreach ($VentasTransferencia as $key => $value) {
 $totalVentasTransferencia += ($value["peso"] * $value["precio"]);
  }
  /*TRAER VENTAS DEL DIA POR TRANSFERENCIA*/
  $cuentasCobrar = ControladorInicio::ctrCuentasPorCobrar();
  $cuentasPagar = ControladorInicio::ctrCuentasPorPagar();
?>

<!--=====================================MODAL CONTRASEÑA======================================-->
<div id="modalPassword" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background:#AD0808; color:white"> <button type="button" class="close"
                    data-dismiss="modal">&times;</button>
                <center>
                    <h3 class="modal-title" style="color: #ffffff"><strong>Ingresa la contraseña</strong></h3>
                </center>
            </div>
            <div style="margin-left: 40px; margin-right: 40px; margin-top: 30px;">
                <div class="form-group"> <label>Contraseña del sistema</label> <input type="password"
                        class="form-control" id="passwordInicio" name="passwordInicio" placeholder=""> <small
                        class="form-text text-muted">Ingresa la
                        contraseña del sistema</small> </div> <button type="submit" class="btn btn-default btnPassword"
                    style="width: 100%; margin-top: 40px; margin-bottom: 40px;">Entrar</button>
            </div>
            <div class="modal-footer"> <button type="button" class="btn btn-default pull-left"
                    data-dismiss="modal">Salir</button> </div>
        </div>
    </div>
</div>

<!--=====================================MODAL CONFIGURAR======================================-->
<div id="modalConfigurar" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background:#AD0808; color:white"> <button type="button" class="close"
                    data-dismiss="modal">&times;</button>
                <center>
                    <h3 class="modal-title" style="color: #ffffff"><strong>Configurar inicio</strong></h3>
                </center>
            </div>
            <div style="margin-left: 40px; margin-right: 40px; margin-top: 30px;">
                <div class="form-group"> <label>Inicio de caja</label> <input type="number" class="form-control"
                        id="inicioCaja" name="inicioCaja" placeholder="" required> <small
                        class="form-text text-muted">Ingresa un monto de inicio para la caja</small> </div>
                <div class="form-group"> <label>Objetivo de ventas del dia</label> <input type="number"
                        class="form-control" id="objetivoVentas" name="objetivoVentas" placeholder=""
                        value="<?php echo $Configuracion["objetivo"];?>" required> <small
                        class="form-text text-muted">Ingresar objetivo de ventas del día</small> </div>
                <button type="submit" class="btn btn-default btnConfigurar" id="btnConfigurar"
                    style="width: 100%; margin-top: 40px; margin-bottom: 40px;">Guardar</button>
            </div>
            <div class="modal-footer"> <button type="button" class="btn btn-default pull-left"
                    data-dismiss="modal">Salir</button> </div>
        </div>
    </div>
</div>

<!--=====================================MODAL CONTAR BILLETES PARA CORTE DE CAJA ======================================-->
<div id="modalCuentaBilletesCorteCaja" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--=====================================        CABEZA DEL MODAL        ======================================-->
            <div class="modal-header" style="background:#AD0808; color:white"> <button type="button" class="close"
                    data-dismiss="modal">&times;</button>
                <center>
                    <h3 class="modal-title" style="color: #ffffff">Cuenta El Efectivo en Caja</h3>
                </center>
            </div>
            <!--=====================================        CUERPO DEL MODAL        ======================================-->
            <div style="margin-left: 40px; margin-right: 40px;">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group"> <label>Billetes $500</label> <input type="number" class="form-control"
                                id="500modal" placeholder=""> <small class="form-text text-muted">Ingresar el monto
                                total</small> </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group"> <label>Billetes $200</label> <input type="number" class="form-control"
                                id="200modal" placeholder=""> <small class="form-text text-muted">Ingresar el monto
                                total</small> </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group"> <label>Billetes $100</label> <input type="number" class="form-control"
                                id="100modal" placeholder=""> <small class="form-text text-muted">Ingresar el monto
                                total</small> </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group"> <label>Billetes $50</label> <input type="number" class="form-control"
                                id="50modal" placeholder=""> <small class="form-text text-muted">Ingresar el monto
                                total</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group"> <label>Billetes $20</label> <input type="number" class="form-control"
                                id="20modal" placeholder=""> <small class="form-text text-muted">Ingresar el monto
                                total</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group"> <label>Monedas $10</label> <input type="number" class="form-control"
                                id="10modal" placeholder=""> <small class="form-text text-muted">Ingresar el monto
                                total</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group"> <label>Monedas $5</label> <input type="number" class="form-control"
                                id="5modal" placeholder=""> 
                                <small class="form-text text-muted">Ingresar el monto total</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group"> <label>Monedas $2</label> 
                            <input type="number" class="form-control" id="2modal" placeholder=""> 
                            <small class="form-text text-muted">Ingresar el monto total</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group"> <label>Monedas $1</label> 
                            <input type="number" class="form-control" id="1modal" placeholder=""> 
                                <small class="form-text text-muted">Ingresar el monto total</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group"> <label>Monedas $0.50</label> 
                            <input type="number" class="form-control" id="mediomodal" placeholder=""> 
                                <small class="form-text text-muted">Ingresar el monto total</small> 
                            </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group"> <label>Otros montos</label> 
                            <input type="number" class="form-control" id="otrosmodal" placeholder=""> 
                                <small class="form-text text-muted">Ingresar el monto total</small>
                        </div>
                    </div>
                </div>

                <span class="btn btn-default btnCalEfectivoCorte" style="width: 100%; margin-top: 40px; margin-bottom: 40px;">
                    Calcular efectivo en caja
                </span>
            </div>
            <!--=====================================        PIE DEL MODAL        ======================================-->
            <div class="modal-footer"> <button type="button" class="btn btn-default pull-left"
                    data-dismiss="modal">Salir</button> </div>
        </div>
    </div>
</div>

<!--=====================================MODAL INICIALIZAR EFECTIVO DE CAJA ======================================-->
<div id="inicializarCajaModal" class="modal fade" role="dialog" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--=====================================        CABEZA DEL MODAL        ======================================-->
            <div class="modal-header" style="background:#2fc37e; color:white"> <button type="button" class="close"
                    data-dismiss="modal">&times;</button>
                <center>
                    <h3 class="modal-title" style="color: #ffffff">Inicializar Efectivo en Caja</h3>
                </center>
            </div>
            <!--=====================================        CUERPO DEL MODAL        ======================================-->
            <div style="margin-left: 40px; margin-right: 40px;">
                <div class="form-group"> 
                    <label>Monto en billetes ymonedas para inicializar caja</label> 
                    <input type="number" class="form-control" id="aperturaCaja" placeholder="" /> 
                    <small class="form-text text-muted">Ingresar el monto total</small> 
                </div>
            </div>
            <div class="modal-footer"> 
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button> 
                <button id="aperturaCajaBtn" type="button" class="btn btn-success pull-rigth" data-dismiss="modal">Cargar Efectivo en caja</button> 
            </div>
        </div>
    </div>
</div>


<!--=====================================MODAL PAGAR PRESTAMO DE CREDITO ======================================-->
<div id="pagarCreditoModal" class="modal fade" role="dialog" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--=====================================        CABEZA DEL MODAL        ======================================-->
            <div class="modal-header" style="background:#2fc37e; color:white"> <button type="button" class="close"
                    data-dismiss="modal">&times;</button>
                <center>
                    <h3 class="modal-title" style="color: #ffffff">Pagar credito</h3>
                </center>
            </div>
            <!--=====================================        CUERPO DEL MODAL        ======================================-->
            <div style="margin-left: 40px; margin-right: 40px;">
                <div class="form-group"> 
                    <label>Folio único del tiket</label> 
                    <input type="number" class="form-control" id="PC_folioUnico" placeholder="" /> 
                    <small class="form-text text-muted">Ingresar folio único</small> 
                </div>
                <div class="form-group"> 
                    <label>Pagar el la cantidad siguiente del crédito</label> 
                    <input type="number" class="form-control" id="PC_cantidad" placeholder="" /> 
                    <small class="form-text text-muted">Ingresar el monto total</small> 
                </div>
                <div class="form-group">
                    <button id="" type="button" class="pagarCreditoBtnEfectivo btn btn-success pull-rigth" data-dismiss="modal">Efectivo</button> 
                    <button id="" type="button" class="pagarCreditoBtnTarjeta btn btn-success pull-rigth" data-dismiss="modal">Tarjeta</button> 
                    <button id="" type="button" class="pagarCreditoBtnTrans btn btn-success pull-rigth" data-dismiss="modal">Transferencia</button> 

                </div>
            </div>
            <div class="modal-footer"> 
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button> 
            </div>
        </div>
    </div>
</div>


<!--=====================================PÁGINA DE INICIO======================================-->
<?php
if ($vCorInicioCaja['cantidad']>999){
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1> Inicio <small>Casa del chile</small> </h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Inicio</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-body">
                <!--===================================Efectivo en Caja========================================-->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="small-box bg-green-gradient " style="overflow:hidden">
                        <div class="inner">
                            <h3>$<?php echo number_format($vCorEfectivoCaja); ?></h3>
                            <p>Efectivo en Caja
                                <span style="float: right;padding-right: 100px;">Todo ingreso en efectivo menos los gastos + inicio de caja</span>
                            </p>
                        </div>
                        <div class="icon" style="overflow:hidden">
                            <svg style="width:1em;margin-top: 0.17em;" aria-hidden="true" focusable="false"
                                data-prefix="fas" data-icon="sack-dollar" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512" class="svg-inline--fa">
                                <path fill="currentColor"
                                    d="M192 96h128l47.4-71.12A16 16 0 0 0 354.09 0H157.94a16 16 0 0 0-13.31 24.88zm128 32H192C-10.38 243.4.09 396.64.09 416c0 53 49.11 96 109.68 96h292.48c60.58 0 109.68-43 109.68-96 0-19 9.35-173.24-191.93-288zm-46.58 278v17.34a8.69 8.69 0 0 1-8.7 8.62h-17.41a8.69 8.69 0 0 1-8.71-8.62v-17.51a63.19 63.19 0 0 1-34.16-12.17 8.55 8.55 0 0 1-.66-13l12.84-12.06a8.92 8.92 0 0 1 11-.76 26.72 26.72 0 0 0 13.93 4h30.58c7.07 0 12.84-6.35 12.84-14.22 0-6.46-3.92-12.06-9.58-13.67l-49-14.54c-20.24-6-34.39-25.2-34.39-46.74 0-26.38 20.68-47.82 46.46-48.57v-17.48a8.69 8.69 0 0 1 8.74-8.62h17.41a8.68 8.68 0 0 1 8.7 8.62v17.55a63.12 63.12 0 0 1 34.17 12.17 8.55 8.55 0 0 1 .65 13l-12.73 12.2a8.92 8.92 0 0 1-11 .75 26.78 26.78 0 0 0-13.93-4h-30.56c-7.07 0-12.84 6.35-12.84 14.21 0 6.46 3.92 12.06 9.57 13.68l49 14.54c20.24 6 34.38 25.2 34.38 46.74-.14 26.4-20.92 47.94-46.6 48.54z"
                                    class=""></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <!--===================================Inicio de Caja==============================================-->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="small-box bg-green-gradient ">
                        <div class="inner">
                            <h3>$<?php echo number_format($vCorInicioCaja['cantidad']); ?></h3>
                            <p>Inicio de caja
                                <span style="float: right;padding-right: 100px;">Efectivo inicial</span>
                            </p>
                        </div>
                        <div class="icon"> <i class="fa fa-cash-register"></i> </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-body">

                <!--===================================Ventas Totales del día========================================-->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="small-box bg-green-gradient">
                        <div class="inner">
                            <h3>$<?php echo number_format($vCor['cantidad']); ?></h3>
                            <p>Ventas del día
                                <span style="float: right;padding-right: 100px;">Suma de todo el ingreso</span>
                            </p>
                        </div>
                        <div class="icon"> <i class="fa fa-shopping-cart"></i> </div>
                    </div>
                </div>

                <!--===================================Credito Total en el día========================================-->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="small-box bg-yellow-gradient">
                        <div class="inner">
                            <h3>$<?php echo number_format($vCorCredito['cantidad']); ?></h3>
                            <p>Credito en el día</p>
                        </div>
                        <div class="icon"> <i class="fa fa-shopping-cart"></i> </div>
                    </div>
                </div>


                <!--===================================  VENTAS =======================================-->
                <!--===================================venta de efectivo=======================================-->
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>$<?php echo number_format($vCorEfectivo['cantidad']); ?></h3>
                            <p>Ventas en efectivo
                                <span style="float: right;padding-right: 120px;">credito:
                                    <?=number_format($vCPagosCreditosEfectivo['cantidad']);?></span>
                            </p>
                        </div>
                        <div class="icon"> <i class="fas fa-money-bill-wave"></i> </div>
                    </div>
                </div>
                <!--===================================venta de tarjeta=======================================-->
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>$<?php echo number_format($vCorTarjeta['cantidad']); ?></h3>
                            <p>Ventas con Tarjeta
                                <span style="float: right;padding-right: 120px;">credito:
                                    <?=number_format($vCPagosCreditosTarjeta['cantidad']);?></span>
                            </p>
                        </div>
                        <div class="icon"> <i class="fas fa-credit-card"></i> </div>
                    </div>
                </div>
                <!--===================================venta de tarsnaferencias=======================================-->
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>$<?php echo number_format($vCorTransferencia['cantidad']); ?></h3>
                            <p>Ventas con transferencia
                                <span style="float: right;padding-right: 120px;">credito:
                                    <?=number_format($vCPagosCreditosTransferencia['cantidad']);?></span>
                            </p>
                        </div>
                        <div class="icon"> <i class="fas fa-exchange-alt"></i> </div>
                    </div>
                </div>
                <!--===================================PAGO DE CREDITOS=======================================-->
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="small-box bg-green-active pagarCredito">
                        <div class="inner">
                            <h3>$<?php echo number_format($vCorPagosCreditos['cantidad']); ?></h3>
                            <p>Pagos de créditos</p>
                        </div>
                        <div class="icon"> <i class="fas fa-comments-dollar"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-body">

                <!--===================================GASTOS Totales del corte========================================-->

                <!--===================================Credito Total en el corte========================================-->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="small-box bg-red-gradient ">
                        <div class="inner">
                            <h3>$<?php echo number_format($vCorGastos['cantidad']); ?></h3>
                            <p>Gastos en efectivo
                                <span style="float: right;padding-right: 150px;">Suma de todos los gatos</span>
                            </p>
                        </div>
                        <div class="icon"> <i class="fas fa-money-bill-wave"></i> </div>
                    </div>
                </div>


                <!--===================================  GASTOS =======================================-->
                <!--===================================GASTOS de proveedores=======================================-->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="small-box bg-orange">
                        <div class="inner">
                            <h3>$<?php echo number_format($vCorGastosProveedores['cantidad']); ?></h3>
                            <p>Gastos/Pagos Proveedores</p>
                        </div>
                        <div class="icon"> <i class="fas fa-truck-moving"></i></i> </div>
                    </div>
                </div>
                <!--===================================gastos del dia=======================================-->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="small-box bg-orange-gradient">
                        <div class="inner">
                            <h3>$<?php echo number_format($vCorGastosDia['cantidad']); ?></h3>
                            <p>Gastos del día</p>
                        </div>
                        <div class="icon"> <i class="fas fa-utensils"></i> </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-body">

                <!--===================================Cuentas por cobrar========================================-->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>$<?php echo number_format($vCorCreditosTodos['cantidad']); ?></h3>
                            <p>Cuentas por cobrar
                                <span style="float: right;padding-right: 110px;">Suma de todos los créditos</span>
                            </p>
                        </div>
                        <div class="icon"> <i class="fas fa-hand-holding-usd"></i> </div>
                    </div>
                </div>
                <!--===================================Cuentas por pagar========================================-->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>$<?php echo number_format($cuentasPagar); ?></h3>
                            <p>Cuentas por pagar</p>
                        </div>
                        <div class="icon"> <i class="far fa-handshake"></i> </div>
                    </div>
                </div>
                <!--===================================Venta objetivo========================================-->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>$<?php echo number_format($Configuracion["objetivo"]); ?></h3>
                            <p>Objetivo de ventas del día</p>
                        </div>
                        <div class="icon"> <i class="fas fa-dollar-sign"></i> </div>
                    </div>
                </div>
                <!--===================================Venta objetivo========================================-->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="small-box bg-blue" id="mostrarPassword" style="cursor: pointer;">
                        <div class="inner">
                            <center>
                                <h3>Corte de Caja</h3>
                            </center>
                        </div>
                        <div class="icon"> <i class="fas fa-hand-scissors"></i> </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
}//cierra el if de inicializar caja ($vCorInicioCaja['cantidad']>0){
    else{
        ?>
        <div class="content-wrapper">
            <section class="content-header">
                <h1> Inicio <small>Casa del chile</small> </h1>
                <ol class="breadcrumb">
                    <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
                    <li class="active">Inicio</li>
                </ol>
            </section>
            <section class="content">
                <div class="box">
                    <div class="box-body">
                        <!--===================================Efectivo en Caja========================================-->
                        <!--===================================Inicio de Caja==============================================-->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 inicializarCaja">
                            <div class="small-box bg-green-gradient ">
                                <div class="inner">
                                    <h3>$<?php echo number_format($vCorInicioCaja['cantidad']); ?></h3>
                                    <p>DEBES INICIALIZAR LA CAJA
                                        <span style="float: right;padding-right: 100px;">Efectivo inicial</span>
                                    </p>
                                </div>
                                <div class="icon"> <i class="fa fa-cash-register"></i> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
   <?php

    }
?>

<script type="text/javascript">
console.log("casa del chile");
$("#btnConfigurar").click(function() {
    var inicio = $("#inicioCaja").val();
    var objetivo = $("#objetivoVentas").val();
    console.log(inicio);
    console.log(objetivo);
    var datosCobro = new FormData();
    datosCobro.append("inicio", inicio);
    datosCobro.append("objetivo", objetivo);
    $.ajax({
        url: "ajax/actualizar.ajax.php",
        method: "POST",
        data: datosCobro,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            console.log(respuesta);
            if (respuesta == "ok") {
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
            } else {
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
//aperturar caja
$("#aperturaCajaBtn").click(function(){
    var iniCaja = $("#aperturaCaja").val();
    if (iniCaja<1000){
        Swal.fire({
            icon: 'warning',
            title: 'Monto Mínimo',
            text: 'Por favor intentalo con un monto mayor a 1,000',
            confirmButtonText: 'cerrar'
        });

    }
    else{

        $.ajax({
        url: "ajax/ventas/aperturaCaja.ajax.php",
        method: "POST",
        data: {'iniCaja':iniCaja},
        cache: false,
        // contentType: false,
        // processData: false,
        success: function(respuesta) {
            console.log(respuesta);
            if (respuesta == "Apertura de caja OK") {
                Swal.fire({
                    icon: 'success',
                    title: '¡Apertura de caja!',
                    text: 'Se ha guardado el efectivo de caja',
                    confirmButtonText: 'Continuar',
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "inicio";
                    }
                });
            } else {
                Swal.fire({
                    icon: 'error corteCaja',
                    title: 'Ha ocurrido un error al hacer el inicio de caja',
                    text: 'Posiblemente el efectivo ingresado supera el efectivo que deberias tener.',
                    confirmButtonText: 'Cerrar',
                    footer: 'Sentimos las molestias'
                });
            }
        }
    });

    }

});

$(".btnCalEfectivoCorte").click(function() {
    var dinero500 = parseFloat($("#modalCuentaBilletesCorteCaja #500modal").val() * 1) * 500;
    var dinero200 = parseFloat($("#modalCuentaBilletesCorteCaja #200modal").val() * 1) * 200;
    var dinero100 = parseFloat($("#modalCuentaBilletesCorteCaja #100modal").val() * 1) * 100;
    var dinero50 = parseFloat($("#modalCuentaBilletesCorteCaja #50modal").val() * 1) * 50;
    var dinero20 = parseFloat($("#modalCuentaBilletesCorteCaja #20modal").val() * 1) * 20;
    var dinero10 = parseFloat($("#modalCuentaBilletesCorteCaja #10modal").val() * 1) * 10;
    var dinero5 = parseFloat($("#modalCuentaBilletesCorteCaja #5modal").val() * 1) * 5;
    var dinero2 = parseFloat($("#modalCuentaBilletesCorteCaja #2modal").val() * 1) * 2;
    var dinero1 = parseFloat($("#modalCuentaBilletesCorteCaja #1modal").val() * 1);
    var dineroMedio = parseFloat($("#modalCuentaBilletesCorteCaja #mediomodal").val() * 1) * .5;
    var dineroOtros = parseFloat($("#modalCuentaBilletesCorteCaja #otrosmodal").val() * 1);
    var totalCajaContadoCorte = dinero500 + dinero200 + dinero100 + dinero50 + dinero20 + dinero10 + dinero5 + dinero2 + dinero1 + dineroMedio + dineroOtros;
    //$("#cuentaEfectivo").text("$" + totalCajaContadoCorte);
    //var diferenciaEfectivo = efectivoCaja - totalCajaContadoCorte;
    //var miles = parseInt(diferenciaEfectivo / 1000);
    //console.log(diferenciaEfectivo);
    //console.log(miles);
    console.log("suma total");
    console.log(totalCajaContadoCorte);
    console.log("suma total");
    /* if (miles == 0) {
        if (diferenciaEfectivo < 0) {
            $("#diferenciaEfectivo").text("$" + ((diferenciaEfectivo - (miles * 1000)) * -1));
        } else {
            $("#diferenciaEfectivo").text("$" + (diferenciaEfectivo - (miles * 1000)));
        }
    } else {
        if (diferenciaEfectivo < 0) {
            $("#diferenciaEfectivo").text("$" + miles + "," + ((diferenciaEfectivo - (miles * 1000)) * -1));
        } else {
            $("#diferenciaEfectivo").text("$" + miles + "," + (diferenciaEfectivo - (miles * 1000)));
        }
    } */
    var datosCobro = new FormData();
    // datosCobro.append("inicio", inicioCaja);
    // datosCobro.append("fin", efectivoCaja);
    // datosCobro.append("cuenta", totalCaja);
    // datosCobro.append("diferencia", diferenciaEfectivo);
    $.ajax({
        url: "ajax/ventas/corteCajaEfectivo.ajax.php",
        method: "POST",
        data: {'total':totalCajaContadoCorte},
        cache: false,
        // contentType: false,
        // processData: false,
        success: function(respuesta) {
            console.log(respuesta);
            if (respuesta == "corte de caja cargado.") {
                Swal.fire({
                    icon: 'success',
                    title: '¡Caja guardada!',
                    text: 'Se ha guardado el cierre de caja',
                    confirmButtonText: 'Continuar',
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "inicio";
                    }
                });
            } else {
                Swal.fire({
                    icon: 'error corteCaja',
                    title: 'Ha ocurrido un error al hacer el corte de caja',
                    text: 'Posiblemente el efectivo ingresado supera el efectivo que deberias tener.',
                    confirmButtonText: 'Cerrar',
                    footer: 'Sentimos las molestias'
                });
            }
        }
    });
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
});
$("#mostrarPassword").click(function() {
    $("#passwordInicio").val("");
    $("#modalPassword").modal("show");
});
$(".btnPassword").click(function() {
    var valorPassord = $("#passwordInicio").val();
    if (dfbnyt != valorPassord) {
        $("#modalPassword").modal("hide");
        $("#modalCuentaBilletesCorteCaja").modal("show");
    } else {
        $("#modalPassword").modal("hide");
        Swal.fire({
            icon: 'error',
            title: 'Contraseña incorrecta',
            text: 'Por favor intentalo nuevamente',
            confirmButtonText: 'OK'
        });
    }
});

$(".inicializarCaja").click(function(){
    console.log("inicializar caja");
    $("#inicializarCajaModal").modal("show");
});

//PAGAR CREDITO MODAL y BOTONES
$(".pagarCredito").click(function(){
    console.log("inicializar caja");
    $("#pagarCreditoModal").modal("show");
});
function xPC_alert(){
    Swal.fire({
            icon: 'error',
            title: 'Debes rellenar todos los campos',
            text: 'Por favor intentalo nuevamente',
            confirmButtonText: 'OK'
        });
}

$(".pagarCreditoBtnEfectivo").click(function(){
    if ($("#PC_folioUnico").val() =='' || $("#PC_cantidad").val() ==''){
        xPC_alert();
    }else{
        pagarCreditoModalModo("efectivo");
    }
});

$(".pagarCreditoBtnTarjeta").click(function(){
    if ($("#PC_folioUnico").val() =='' || $("#PC_cantidad").val() ==''){
        xPC_alert();
    }else{
        pagarCreditoModalModo("tarjeta");
    }
});

$(".pagarCreditoBtnTrans").click(function(){
    if ($("#PC_folioUnico").val() =='' || $("#PC_cantidad").val() ==''){
        xPC_alert();
    }else{
        pagarCreditoModalModo("transferencia");
    }
});

function pagarCreditoModalModo(modo){
    let folioUnico = $("#PC_folioUnico").val();
    let cantidadPagoCredito= $("#PC_cantidad").val();
    console.log(modo);
    console.log(folioUnico);
    console.log(cantidadPagoCredito);
    if ($("#PC_cantidad")== ''){
        xPC_alert();
    }

    $.ajax({
        url: "ajax/tiket/pagarCredito.ajax.php",
        method: "POST",
        data: {'cantidad':cantidadPagoCredito, 'modo':modo,'folioUnico':folioUnico},
        cache: false,
        // contentType: false,
        // processData: false,
        success: function(respuesta) {
            console.log(respuesta);
            if (respuesta == "ok pago crédito") {
                Swal.fire({
                    icon: 'success',
                    title: '¡se abonó '+cantidadPagoCredito+' al folio ! '+folioUnico+', con '+modo ,
                    text: 'se ha abonado correctamente.',
                    confirmButtonText: 'Continuar',
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "inicio";
                    }
                });
            } else {
                Swal.fire({
                    title: 'error Pago de crédito',
                    icon: 'error',
                    title: 'Ha ocurrido un error al hacer abono del tiket'+folioUnico,
                    text: 'intenta nuevamente.',
                    confirmButtonText: 'Cerrar',
                    footer: 'Sentimos las molestias'
                });
            }
        }
    });
}

</script>

<style>
    .pagarCredito,
    .inicializarCaja{
        cursor: pointer;
    }
</style>