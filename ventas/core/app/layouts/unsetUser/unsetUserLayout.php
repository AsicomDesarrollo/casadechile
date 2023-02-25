

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>casadelchile.mx - Ventas</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!--=====================================
  PLUGINS DE CSS
  ======================================-->
  
  <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="vistas/bower_components/carousel/owl.carousel.min.css">
  <link rel="stylesheet" href="vistas/bower_components/carousel/owl.theme.default.css">
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
  <script src="vistas/bower_components/jquery-ui/jquery-ui.min.js"></script>
  <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="vistas/bower_components/carousel/owl.carousel.min.js"></script>
  <script src="vistas/dist/js/adminlte.min.js"></script>
  <script src="vistas/plugins/iCheck/icheck.min.js"></script>
  <!--<script src="vistas/bower_components/raphael/raphael.min.js"></script>-->
  <script src="vistas/bower_components/morris.js/morris.min.js"></script>
  <script src="vistas/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
  <script src="vistas/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="vistas/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
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

  <script src="vistas/js/onback.js"></script>

</head>

<!--
Plantilla base para todos los módulos
-->

<style type="text/css">
  
.fondoInicio{

  /*background-image: linear-gradient(35deg, rgba(25,207,134,1) 0%, rgba(131,131,249,1) 61%, rgba(160,96,250,1) 100%);*/
background: transparent;
}

</style>

<body class="login-page fondoInicio" style="background-color: #ffffff;">

<!--
Módulo de log in
-->

</style>

<img src="vistas/img/plantilla/fondologin3.png" class="img-responsive" style="height: 120%; position: absolute; left: 0%; top: -20%; z-index: -10;">

<!--<img src="vistas/img/plantilla/derecha.png" class="img-responsive" style="width: 30%; position: absolute; right: 5%;">-->
<!-- 
<?php

/* $opciones = [ 'cost' => 12 ];
			$hash = password_hash('erickleonel', PASSWORD_BCRYPT, $opciones);
			print_r($hash);
            core::preprint($hash,'hash');
            exit(); */
            
            ?> -->
<div class="container">
  
  <div class="row">

    <span class="col-xs-0 col-sm-0 col-md-6 col-lg-6"> </span>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

      <div style="text-align: center; margin-top: 150px;">
          
        <h1 style="color: #bd4729;">Bienvenido</h1><h4 style="color: #bd4729;">Ingrese para continuar</h4>

        <br>

        <form  id="formLog" method="post" style="margin-top: 50px;">

          <div class="form-group">
            <label style="color: #ac9756;">Correo electrónico</label>
            <input type="email" class="form-control" name="logemail" required="">
          </div>

          <div class="form-group has-feedback" style="margin-top: 30px;">
            <label style="color: #ac9756;">Contraseña</label>
            <input type="password" class="form-control" name="logpass" required>
          </div>

          <button id="logIn" name="logIn" type="button" class="btn btn-primary" style="margin-top: 30px; background-color: #6ca846; border: none;">Ingresar</button>
              
          
        </form>

      </div>
  
    </div>
    
  </div>

</div>



<!--=====================================
JS PERSONALIZADO
======================================-->

<!-- <script src="vistas/js/plantilla.js"></script> -->
<script>
    $("#logIn").click(function () {
        var datos = new FormData();

        datos = JSON.stringify({'user':formLog.logemail.value,'pass':formLog.logpass.value});
        datos = ({'user':formLog.logemail.value,'pass':formLog.logpass.value});
        if (formLog.reportValidity()){
            $.ajax({
              url: "./?action=login",
              method: "POST",
              data: datos,
              //cache: false,
              //contentType: 'json',
              //processData: false,
              success: function (text) {
                console.log(text);
                  if (text == "successLogin") {
                      Swal.fire( {  icon: 'success', title: "Bienvenido", text: formLog.logemail.value, type: "success", confirmButtonText: "Continuar!"} )
                      .then(resultado => {
                        if (resultado.value) {
                            // Hicieron click en "Sí"
                            location.search= "action=login";
                        } else {
                            // Dijeron que no
                            console.log("*NO*");
                        }
                      });
                      // Swal.fire("Esta es una alerta");
                  }else{
                    Swal.fire( { icon: 'warning', title: "Error", text: "Tus datos no son correctos o no estas registrado", confirmButtonText: "¡Cerrar!"} );
                  }
              }
            })
        }
        //console.log(datos);
    });
</script>

</body>
</html>

<?php

/* $opciones = [ 'cost' => 12 ];
$hash = password_hash("123456", PASSWORD_BCRYPT, $opciones);
print_r( $hash); */
?>