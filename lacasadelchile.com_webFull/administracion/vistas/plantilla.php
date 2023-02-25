<?php

session_start();

$ruta = Ruta::ctrRuta();

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Bodega - Admin</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!--=====================================
  PLUGINS DE CSS
  ======================================-->
  
  <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">
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
  <link rel="stylesheet" href="vistas/plugins/dropzone/dropzone.css">

  <!--=====================================
  CSS PERSONALIZADO
  ======================================-->

  <link rel="stylesheet" href="vistas/css/plantilla.css">

  <!--=====================================
  PLUGINS DE JAVASCRIPT
  ======================================-->

  <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
  <!--<script src="vistas/bower_components/jquery-ui/jquery-ui.min.js"></script>-->
  <!--<script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>-->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="vistas/dist/js/adminlte.min.js"></script>
  <script src="vistas/plugins/iCheck/icheck.min.js"></script>
  <!--<script src="vistas/bower_components/raphael/raphael.min.js"></script>-->
  <script src="vistas/bower_components/morris.js/morris.min.js"></script>
  <script src="vistas/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
  <!--<script src="vistas/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>-->
  <!--<script src="vistas/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>-->
  <script src="vistas/bower_components/chart.js/Chart.js"></script>
  <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>
  <!--<script src="vistas/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>-->
  <script src="vistas/plugins/bootstrap-slider/bootstrap-slider.js"></script>
  <script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>
  <script src="vistas/plugins/tags/bootstrap-tagsinput.min.js"></script>
  <!--<script src="vistas/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>-->
  <script src="vistas/plugins/dropzone/dropzone.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

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

    if(isset($_GET["ruta"])){

        if($_GET["ruta"]== "inicio" ||
           $_GET["ruta"]== "ventas" ||
           $_GET["ruta"]== "detallesventa" ||
           $_GET["ruta"]== "nuevaventa" ||
           $_GET["ruta"]== "ordenes" ||
           $_GET["ruta"]== "categorias" ||
           $_GET["ruta"]== "productos" ||
           $_GET["ruta"]== "entradas" ||
           $_GET["ruta"]== "inventario" ||
           $_GET["ruta"]== "promociones" ||
           $_GET["ruta"]== "usuarios" ||
           $_GET["ruta"]== "proveedores" ||
           $_GET["ruta"]== "clientes" ||
           $_GET["ruta"]== "presupuesto" ||
           $_GET["ruta"]== "empleados" ||
           $_GET["ruta"]== "administradores" ||
           $_GET["ruta"]== "personal" ||
           $_GET["ruta"]== "sucursales" ||
           $_GET["ruta"]== "gastos" ||
           $_GET["ruta"]== "salir"){

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

          include "modulos/".$_GET["ruta"].".php";

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

</body>
</html>