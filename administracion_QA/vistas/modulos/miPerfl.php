<link rel="stylesheet" href="vistas/dist/assets/libs/glightbox/css/glightbox.min.css">


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

 
 
 
 
 
 <!-- Begin page -->
    <div id="layout-wrapper">


        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-xxl-3 col-lg-4">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="user-profile-img">
                                        <div class="profile-img profile-foreground-img rounded-top" style="height: 120px;">
                                        </div>
                                        <div class="overlay-content rounded-top">
                                            <div>
                                                <div class="user-nav p-3">
                                                    <div class="d-flex justify-content-end">
                                                        <div class="dropdown">
                                                            <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="bx bx-dots-horizontal font-size-20 text-white"></i>
                                                            </a>

                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                <li><a  href="vistas/dist/assets/images/logo/logo-graphics.jpg"  class="dropdown-item  image-popup-video-map" >Ver foto</a></li>                                                         
                                                                <li><a class="dropdown-item" href="#">Actualizar foto</a> </li>
                                                                <li><a class="dropdown-item" href="#">Eliminar foto</a> </li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end user-profile-img -->
                
                                    <div class="mt-n5 position-relative">
                                        <div class="text-center">
                                            <img src="vistas/dist/assets/images/logo/logo-graphics.jpg" alt="" class="avatar-xl rounded-circle img-thumbnail">

                                            <div class="mt-3">
                                                <h5 class="mb-1">Elena Sandoval</h5>
                                                <div>
                                                    <a href="#" class="badge badge-soft-primary m-1">Administrador</a>
                                
                                                </div>

                                           
                                            </div>

                                        </div>
                                    </div>

                                    <div class="p-3 mt-3 border-bottom">
                                        <div class="row text-center">
                                            <div class="col-6 border-end">
                                                <div class="p-1">
                                                    <h5 class="mb-1">3,658</h5>
                                                    <p class="text-muted mb-0">Products</p>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="p-1">
                                                    <h5 class="mb-1">6.8k</h5>
                                                    <p class="text-muted mb-0">Followers</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="p-4 mt-2">
                                        <h5 class="font-size-16">Información</h5>

                                        <div class="mt-4">
                                            <p class="text-muted mb-1">Nombre completo :</p>
                                            <h5 class="font-size-14 text-truncate">Ma. Elena Sandoval Santana</h5>
                                        </div>

                                        <div class="mt-4">
                                            <p class="text-muted mb-1">E-mail :</p>
                                            <h5 class="font-size-14 text-truncate">desarrolloSoft@asicomsystems.com.mx</h5>
                                        </div>

                                        <div class="mt-4">
                                            <p class="text-muted mb-1">Telefono:</p>
                                            <h5 class="font-size-14 text-truncate">5519575315</h5>
                                        </div>

                                        <div class="mt-4">
                                            <p class="text-muted mb-1">Dirección :</p>
                                            <h5 class="font-size-14 text-truncate">Ciudad de México, México</h5>
                                        </div>
                                    </div>

                                </div>
                                <!-- end card body -->
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-xxl-9 col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">Actualizar mi información</h5>
                                    <form>
                                        <div class="card border shadow-none mb-5">
                                            <div class="card-header d-flex align-items-center">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar">
                                                        <div class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                            01
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h5 class="card-title">Datos generales</h5>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div>
                                                            
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="gen-info-name-input">Nombre completo</label>
                                                                <input type="text" class="form-control" id="gen-info-name-input" placeholder="Carlos Gerardo">
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="gen-info-designation-input">Apellidos</label>
                                                                <input type="text" class="form-control" id="gen-info-designation-input" placeholder="Lopéz Garcia">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="gen-info-name-input">Correo electronico</label>
                                                                <input type="text" class="form-control" id="gen-info-name-input" placeholder="admin@asicomsystems.com.mx">
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="gen-info-designation-input">Telefono</label>
                                                                <input type="text" class="form-control" id="gen-info-designation-input" placeholder="(+52) 551 1957 5315">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="gen-info-name-input">Fecha de nacimiento</label>
                                                                <input type="date" class="form-control" id="gen-info-name-input" placeholder="admin@asicomsystems.com.mx">
                                                            </div>
                                                            
                                                        </div>
                                            
                                                    </div>

                              
                                                    <div class="form-check mb-3" data-bs-toggle="collapse" data-bs-target="#collapseChangePassword" aria-expanded="false" aria-controls="collapseChangePassword">
                                                        <label class="form-check-label text-primary" for="gen-info-change-password">  <i data-feather="arrow-down-circle"></i> Cambiar contraseña</label>
                                                    </div>

                                                    <div class="collapse" id="collapseChangePassword">
                                                        <div class="card border shadow-none card-body">
                                                            <div class="row">
                                                                <div class="col-lg-4">
                                                                    <div class="mb-lg-0">
                                                                        <label for="current-password-input" class="form-label">Contraseña actual</label>
                                                                        <input type="password" class="form-control" placeholder="Ingresa actual contraseña" id="current-password-input">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <div class="mb-lg-0">
                                                                        <label for="new-password-input" class="form-label">Nueva</label>
                                                                        <input type="password" class="form-control" placeholder="Ingresa nueva contraseña" id="new-password-input">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <div class="mb-lg-0">
                                                                        <label for="confirm-password-input" class="form-label">Confirmar</label>
                                                                        <input type="password" class="form-control" placeholder="Cofirmar contraseña" id="confirm-password-input">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end card -->

                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary w-sm">Actualizar mi información</button>
                                        </div>
                                    </form>
                                    <!-- end form -->
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                    
                </div> <!-- container-fluid -->
            </div>
  
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>document.write(new Date().getFullYear())</script> &copy; Vuesy.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->


    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

<script src="vistas/dist/assets/libs/glightbox/js/glightbox.min.js"></script>

<script src="vistas/dist/assets/js/pages/lightbox.init.js"></script>
