<?php

session_start();

$ruta = Ruta::ctrRuta();

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
  
    <!-- Google Fonts - Jost -->
    <link href="vistas/dist_/assets/css/css2.css" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link href="vistas/dist_/assets/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom Font Icons -->
    <link href="vistas/dist_/assets/css/iconfont.min.css" rel="stylesheet">

    <!-- Vendor CSS -->
    <link href="vistas/dist_/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="vistas/dist_/assets/css/menu.css" rel="stylesheet">
    <link href="vistas/dist_/assets/css/hamburgers.min.css" rel="stylesheet">
    <link href="vistas/dist_/assets/css/mmenu.min.css" rel="stylesheet">
    <link href="vistas/dist_/assets/css/magnific-popup.css" rel="stylesheet">
    <link href="vistas/dist_/assets/css/float-labels.min.css" rel="stylesheet">

    <!-- Main CSS -->
    <link href="vistas/dist_/assets/css/style.css" rel="stylesheet">

  

  <!--=====================================
  CSS PERSONALIZADO
  ======================================-->



  <!--=====================================
  PLUGINS DE JAVASCRIPT
  ======================================-->

  <script src="vistas/dist_/assets/js/jquery.min.js"></script>
    <script src="vistas/dist_/assets/js/bootstrap.min.js"></script>
    <script src="vistas/dist_/assets/js/easing.min.js"></script>
    <script src="vistas/dist_/assets/js/parsley.min.js"></script>
    <script src="vistas/dist_/assets/js/jquery.nice-select.min.js"></script>
    <script src="vistas/dist_/assets/js/jquery.priceformat.min.js"></script>
    <script src="vistas/dist_/assets/js/ResizeSensor.min.js"></script>
    <script src="vistas/dist_/assets/js/theia-sticky-sidebar.min.js"></script>
    <script src="vistas/dist_/assets/js/mmenu.min.js"></script>
    <script src="vistas/dist_/assets/s/jquery.magnific-popup.min.js"></script>
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

</head>

<!--
Plantilla base para todos los módulos
-->

<style type="text/css">
  
.fondoInicio{

  /*background-image: linear-gradient(35deg, rgba(25,207,134,1) 0%, rgba(131,131,249,1) 61%, rgba(160,96,250,1) 100%);
  background-color: white; */

}

</style>

<body class="login-page fondoInicio" style="background-color: #ffffff;">

        <!-- Main -->
        <main style="transform: none;">
          <!-- Order -->
          <div class="order" style="transform: none;">

            <?php

              if(isset($_SESSION["validarSesionBackend"]) && $_SESSION["validarSesionBackend"] === "ok"){

                if(isset($_GET["ruta"])){

                    if($_GET["ruta"]== "inicio" ||
                      $_GET["ruta"]== "ventas" ||
                      $_GET["ruta"]== "detallesventa" ||
                      $_GET["ruta"]== "nuevaventa" ||
                      $_GET["ruta"]== "usuarios" ||
                      $_GET["ruta"]== "administradores" ||
                      $_GET["ruta"]== "personal" ||
                      $_GET["ruta"]== "sucursales" ||
                      $_GET["ruta"]== "salir"){

                      

                      /*=============================================
                      Módulos de contenido
                      =============================================*/

                      include "modulos/".$_GET["ruta"].".php";

                      /*=============================================
                      Footer
                      =============================================*/

                      include "modulos/footer.php";

                    }

                }else{

                  include "modulos/login.php";

                }

              }else{

              include "modulos/login.php";

            }

            
            ?>
          </div>
        </main>

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

</body>
</html>