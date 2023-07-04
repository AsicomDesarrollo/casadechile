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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
 

  <!--=====================================
  CSS PERSONALIZADO
  ======================================-->

  <!-- Main CSS -->
  <link href="vistas/dist_/assets/css/style.css" rel="stylesheet">

  <!--=====================================
  PLUGINS DE JAVASCRIPT
  ======================================-->

  <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="vistas/bower_components/jquery-ui/jquery-ui.min.js"></script>

  <!-- Custom Font Icons -->
  <script src="https://kit.fontawesome.com/b8f324a3a5.js" crossorigin="anonymous"></script>

  <!-- Vendor CSS -->

  <link href="vistas/dist_/assets/plugins/bootstrap5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="vistas/dist_/assets/css/magnific-popup.css" rel="stylesheet">
  <link href="vistas/dist_/assets/css/float-labels.min.css" rel="stylesheet">



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



<body class="login-page " id="page" style="background-color: #ffffff;">

<!-- Preloader -->
<!-- <div id="preloader">
        <div data-loader="circle-side"></div>
    </div> -->
    <!-- Preloader End -->

<?php

  if(isset($_SESSION["id"]) && $_SESSION["id"] >0){

    include "layout_header.php";

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



  <!-- Back to top button -->
  <div id="toTop">
      

    <i class="fa-sharp fa-solid fa-arrow-up"></i>


  </div>




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

<script src="vistas/dist_/assets/js/jquery.min.js"></script>
<script src="vistas/dist_/assets/plugins/bootstrap5.3.0/js/bootstrap.min.js"></script>



</body>
</html>


