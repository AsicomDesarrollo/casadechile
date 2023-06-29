<?php


$ruta = $_SERVER["HTTP_HOST"];
header('Content-Type: text/html; charset=utf-8');
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Bodega - Bienvenido</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!--=====================================
  PLUGINS DE CSS
  ======================================-->
  

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  
 

  <!--=====================================
  CSS PERSONALIZADO
  ======================================-->
.
  <link rel="stylesheet" href="vistas/css/plantilla.css">

  <!--=====================================
  PLUGINS DE JAVASCRIPT
  ======================================-->

  <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="vistas/bower_components/jquery-ui/jquery-ui.min.js"></script>
 <!--  <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->
  <script src="vistas/bower_components/carousel/owl.carousel.min.js"></script>
  <!--<script src="vistas/bower_components/raphael/raphael.min.js"></script>-->
  <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <script src="vistas/js/onback.js"></script>




<!-- Google Fonts - Jost -->
<link href="vistas/dist_/assets/css/css2.css" rel="stylesheet">

<!-- Font Awesome CSS -->
<link href="vistas/dist_/assets/css/font-awesome.min.css" rel="stylesheet">

<!-- Custom Font Icons -->
<link href="vistas/dist_/assets/css/iconfont.min.css" rel="stylesheet">

<!-- Vendor CSS -->

<link href="vistas/dist_/assets/plugins/bootstrap5.3.0/css/bootstrap.min.css" rel="stylesheet">
<link href="vistas/dist_/assets/css/magnific-popup.css" rel="stylesheet">
<link href="vistas/dist_/assets/css/float-labels.min.css" rel="stylesheet">

<!-- Main CSS -->
<link href="vistas/dist_/assets/css/style.css" rel="stylesheet">

</head>

<!--
Plantilla base para todos los módulos
-->

<style type="text/css">
  
.fondoInicio{

  /*background-image: linear-gradient(35deg, rgba(25,207,134,1) 0%, rgba(131,131,249,1) 61%, rgba(160,96,250,1) 100%);
  */
  background-color: white;
}

</style>

<body class="login-page fondoInicio" style="background-color: #ffffff;">

<?php

  if(isset($_SESSION["id"]) && $_SESSION["id"] >0){

    Route::view($_GET['view']);

    include "layout_footer.php";

    /* if(isset($_GET["view"])){
        if($_GET["view"]== "inicio" ||
           $_GET["view"]== "ventas" ||
           $_GET["view"]== "detallesventa" ||
           $_GET["view"]== "nuevaventa" ||
           $_GET["view"]== "usuarios" ||
           $_GET["view"]== "administradores" ||
           $_GET["view"]== "personal" ||
           $_GET["view"]== "sucursales" ||
           $_GET["view"]== "salir"){

          include "modulos/".$_GET["ruta"].".php";
          include "modulos/footer.php";
        }

     }else{

       include "modulos/login.php";

     } */

  }
/* else{
  include "modulos/login.php";
} */


 
?>

<!--=====================================
JS PERSONALIZADO
======================================-->
<script src="vistas/dist_/assets/js/plantilla.js"></script>
<script src="vistas/dist_/assets/js/gestorComercio.js"></script>
<script src="vistas/dist_/assets/js/gestorProductos.js"></script>
<script src="vistas/dist_/assets/js/gestorVentas.js"></script>
<script src="vistas/dist_/assets/js/gestorUsuarios.js"></script>
<script src="vistas/dist_/assets/js/gestorAdministradores.js"></script>
<script src="vistas/dist_/assets/js/gestorPersonal.js"></script>
<script src="vistas/dist_/assets/js/gestorSucursales.js"></script>
<script src="vistas/dist_/assets/js/gestorNotificaciones.js"></script>

<script src="vistas/dist_/assets/js/jquery.min.js"></script>
    <script src="vistas/dist_/assets/plugins/bootstrap5.3.0/js/bootstrap.min.js"></script>
    <script src="vistas/dist_/assets/js/easing.min.js"></script>
    <script src="vistas/dist_/assets/js/parsley.min.js"></script>
    <script src="vistas/dist_/assets/js/jquery.nice-select.min.js"></script>
    <script src="vistas/dist_/assets/js/jquery.priceformat.min.js"></script>
    <script src="vistas/dist_/assets/js/ResizeSensor.min.js"></script>
    <script src="vistas/dist_/assets/js/theia-sticky-sidebar.min.js"></script>
    <script src="vistas/dist_/assets/js/mmenu.min.js"></script>
    <script src="vistas/dist_/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="vistas/dist_/assets/js/float-labels.min.js"></script>
    <script src="vistas/dist_/assets/js/jquery-ui-1.8.22.min.js"></script>
    <script src="vistas/dist_/assets/js/jquery.wizard.js"></script>
    <script src="vistas/dist_/assets/js/isotope.pkgd.min.js"></script>
    <script src="vistas/dist_/assets/js/scrollreveal.min.js"></script>
    <script src="vistas/dist_/assets/js/lazyload.min.js"></script>
    <script src="vistas/dist_/assets/js/sticky-kit.min.js"></script>

    <!-- Stripe Javascript Files -->
    <script src="https://js.stripe.com/v3/"></script>
    <script src="assets/js/stripe-func.js"></script>

    <!-- Main Javascript File -->
    <script src="../js/scripts.js"></script>

</body>
</html>


