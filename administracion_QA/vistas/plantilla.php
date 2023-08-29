<?php

ob_start();
session_start();

$ruta = Ruta::ctrRuta(); //no se usa

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Casa del chile - Dashboard</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!--=====================================
  PLUGINS DE CSS
  ======================================-->
  
<!--   <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="vistas/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="vistas/dist/css/skins/skin-blue.min.css">
  <link rel="stylesheet" href="vistas/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="vistas/bower_components/morris.js/morris.css">
  <link rel="stylesheet" href="vistas/bower_components/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="vistas/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="vistas/plugins/bootstrap-slider/slider.css">
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">
  <link rel="stylesheet" href="vistas/plugins/tags/bootstrap-tagsinput.css">
  <link rel="stylesheet" href="vistas/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="vistas/plugins/dropzone/dropzone.css"> -->

<!-- plugin css -->
<link href="vistas/dist/assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />

<!-- swiper css -->
<link rel="stylesheet" href="vistas/dist/assets/libs/swiper/swiper-bundle.min.css">

<!-- Bootstrap Css -->
<link href="vistas/dist/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<!-- <link href="vistas/dist/assets/css/icons.min.css" rel="stylesheet" type="text/css" /> -->
<!-- App Css-->
<link href="vistas/dist/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

<!-- Plugins externos-->


<!-- dataTables -->
<link href="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.css" rel="stylesheet"/>
<!-- Sweet Alert-->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!--=====================================
  CSS PERSONALIZADO
  ======================================-->

 <!--  <link rel="stylesheet" href="vistas/css/plantilla.css"> -->

  <!--=====================================
  PLUGINS DE JAVASCRIPT
  ======================================-->
<!-- 
  <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
  <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>

  <script
  src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"
  integrity="sha256-hlKLmzaRlE8SCJC1Kw8zoUbU8BxA+8kR3gseuKfMjxA="
  crossorigin="anonymous"></script> -->





</head>

<!--
Plantilla base para todos los módulos
-->

<style type="text/css">
  
.fondoInicio{

  background-color: #ffffff;


}

</style>

<body class="hold-transition skin-blue sidebar-mini login-page fondoInicio" >   



      <?php

        if(isset($_SESSION["validarSesionBackend"]) && $_SESSION["validarSesionBackend"] === "ok"){

          if(isset($_GET["modulo"])){

              if($_GET["modulo"]== "inicio" ||
                $_GET["modulo"]== "ventas" ||
                $_GET["modulo"]== "detallesventa" ||
                $_GET["modulo"]== "nuevaventa" ||
                $_GET["modulo"]== "ordenes" ||
                $_GET["modulo"]== "categorias" ||
                $_GET["modulo"]== "productos" ||
                $_GET["modulo"]== "entradas" ||
                $_GET["modulo"]== "inventario" ||
                $_GET["modulo"]== "promociones" ||
                $_GET["modulo"]== "usuarios" ||
                $_GET["modulo"]== "proveedores" ||
                $_GET["modulo"]== "clientes" ||
                $_GET["modulo"]== "presupuesto" ||
                $_GET["modulo"]== "empleados" ||
                $_GET["modulo"]== "administradores" ||
                $_GET["modulo"]== "personal" ||
                $_GET["modulo"]== "sucursales" ||
                $_GET["modulo"]== "gastos" ||
                $_GET["modulo"]== "info" ||
                $_GET["modulo"]== "cortes" ||
                $_GET["modulo"]== "miPerfl" ||
                $_GET["modulo"]== "salir"){

                echo '<div class="wrapper">';

                /*=============================================
                Cabezote
                =============================================*/

                include "modulos/cabezote.php";

                /*=============================================
                Menu lateral
                =============================================*/

                include "modulos/lateral.php";

                /*=============================================
                Módulos de contenido
                =============================================*/

                include "modulos/".$_GET["modulo"].".php";

                /*=============================================
                Footer
                =============================================*/

                include "modulos/footer.php";

                echo '</div>';

              }

          }else{

            include "modulos/login.php";

          }

        }else{

        include "modulos/login.php";

      }

      
      ?>

<!--=====================================
JS PERSONALIZADO
======================================-->

<script src="vistas/js/plantilla.js"></script>
<script src="vistas/js/gestorComercio.js"></script>
<script src="vistas/js/gestorProductos.js"></script>
<script src="vistas/js/gestorVentas.js"></script>
<script src="vistas/js/gestorUsuarios.js"></script>
<script src="vistas/js/gestorAdministradores.js"></script>
<script src="vistas/js/gestorPersonal.js"></script>
<script src="vistas/js/gestorSucursales.js"></script>
<script src="vistas/js/gestorNotificaciones.js"></script>


     <!-- JAVASCRIPT -->
     <script src="vistas/dist/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vistas/dist/assets/libs/metismenujs/metismenujs.min.js"></script>
    <script src="vistas/dist/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="vistas/dist/assets/libs/feather-icons/feather.min.js"></script>

    <!-- apexcharts -->
    <script src="vistas/dist/assets/libs/apexcharts/apexcharts.min.js"></script>

    <!-- swiper js -->
    <script src="vistas/dist/assets/libs/swiper/swiper-bundle.min.js"></script>
    
    <script src="vistas/dist/assets/js/pages/dashboard.init.js"></script>

    <script src="vistas/dist/assets/js/app.js"></script>
            <!-- Sweet Alerts js -->
            <script src="vistas/dist/assets/libs/sweetalert2/sweetalert2.min.js"></script>




</body>
</html>