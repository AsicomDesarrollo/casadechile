

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

  <!--=====================================
  CSS PERSONALIZADO
  ======================================-->

  <link rel="stylesheet" href="vistas/css/plantilla.css">

  <!--=====================================
  PLUGINS DE JAVASCRIPT
  ======================================-->
  <script src="vistas/dist_/assets/js/jquery.min.js"></script>
  <script src="vistas/dist_/assets/plugins/bootstrap5.3.0/js/bootstrap.min.js"></script>

</head>

<!--
Plantilla base para todos los módulos
-->

<style type="text/css">
  


</style>

<body class="login-page fondoInicio" >

<!--
Módulo de log in
-->

</style>

<!-- <img src="vistas/img/plantilla/fondologin3.png" class="img-responsive" style="height: 120%; position: absolute; left: 0%; top: -20%; z-index: -10;"> -->

<!--<img src="vistas/img/plantilla/derecha.png" class="img-responsive" style="width: 30%; position: absolute; right: 5%;">-->
<!-- 
<?php

/* $opciones = [ 'cost' => 12 ];
			$hash = password_hash('erickleonel', PASSWORD_BCRYPT, $opciones);
			print_r($hash);
            core::preprint($hash,'hash');
            exit(); */
            
            ?> -->
<!-- <div class="container">
  
  <div class="row">

    <span class="col-xs-0 col-sm-0 col-md-6 col-lg-6"> </span>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

      <div style="text-align: center; margin-top: 150px;">
          
        <h1 style="color: #bd4729;">Bienvenido</h1><h4 style="color: #bd4729;">Ingrese para continuar__s</h4>

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

</div> -->




<div class="auth-bg-basic d-flex align-items-center min-vh-100">
            <div class="bg-overlay bg-light"></div>
            <div class="container">
                <div class="d-flex flex-column min-vh-100 py-5 px-3">
                    <div class="row justify-content-center">
                        <div class="col-xl-5">
                            <div class="text-center text-muted mb-2">
                                <div class="pb-3">
                                    <a href="index.html">
                                        <span class="logo-lg">
                                            <img  src="./../administracion_QA/vistas/dist/assets/images/logo/logo.png" class="img-fluid my-auto" width="190" > 
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center my-auto">
                        <div class="col-md-8 col-lg-6 col-xl-5">
                            <div class="card bg-transparent shadow-none border-0">
                                <div class="card-body" style="border: 1px solid orange;border-radius: 4%;">
                                    <div class="py-3">
                                        <div class="text-center">
                                            <h5 class="mb-0">¡ Bienvenido de nuevo panel de ventas !</h5>
                                            <p class="text-muted mt-2">Ingrese para continuar</p>
                                        </div>
                                        <form class="mt-4 pt-2"  id="formLog" method="post" >
                                            <div class="form-floating form-floating-custom mb-3">
                                                <input type="text" class="form-control" name="logemail" id="input-username" placeholder="Ingresa tu correo " required>
                                                <label for="input-username">Correo electronico</label>
                                                <div class="form-floating-icon">
                                                    <i class="uil uil-users-alt"></i>
                                                </div>
                                            </div>

                                            <div class="form-floating form-floating-custom mb-3 auth-pass-inputgroup">
                                                <input type="password" name="logpass"  class="form-control" id="password-input" placeholder="Ingresa tu contraseña" required>
                                                <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0" id="password-addon">
                                                    <i class="mdi mdi-eye-outline fas fa-eye font-size-18 text-muted"></i>
                                                </button>
                                                <label for="password-input">Contraseña</label>
                                                <div class="form-floating-icon">
                                                    <i class="uil uil-padlock"></i>
                                                </div>
                                            </div>
        
                                            <div class="form-check form-check-primary font-size-16 py-1">
                                                <input class="form-check-input" type="checkbox" id="remember-check">
                                                <div class="float-end">
                                                    <a  data-bs-toggle="modal"  href="#"  data-bs-target=".bs-example-modal-center" class="text-muted text-decoration-underline font-size-14">¿Olvido su contraseña?</a>
                                                </div>
                                                <label class="form-check-label font-size-14" for="remember-check">
                                                    Recordarme
                                                </label>
                                            </div>
        
                                            <div class="mt-3">
                                                <button id="logIn" name="logIn" class="btn btn-primary w-100" type="button" >Inicio sesion</button>
                                            </div>
    

    
                                            <div class="mt-4 pt-3 text-center">
                                                <p class="text-muted mb-0">¿No tienes una cuenta? </p>
                                                <small class="fw-semibold text-decoration-underline"> Comunicate con el administrador del sitio. </small>
                                            </div>
        
                                        </form><!-- end form -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end row -->

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="mt-4 mt-md-5 text-center">
                             <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> Casadelchile Todos los derechos reservados. creado por ASICOM GRAPHICS</p>
                            </div>
                        </div>
                    </div> <!-- end row -->
                </div>
            </div>
            <!-- end container fluid -->
        </div>


        <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-primary">Restablecer contraseña</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Puede restablecer su contraseña desde el portal de administrador o enviando un correo al area de soporte adjuntando su correo electronico.</p>
                        
                        <p class="mb-0"> <a href="mailto:desarrolloSoft@asicomsystems.com.mx?subject=Restablecer%20mi%20contraseña%20de%20usuario%20de%20ventas%20Casa%20de%20chile&body=Hola%20buen%20día%20equipo%20IT.%20Solicito%20de%20su%20apoyo%20para%20la%20actualización%20de%20mi%20contraseña%20del%20portal.%20Mi%20usuario%20es:"" >Enviar correo a soporte.</a></p>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>

<!--=====================================
JS PERSONALIZADO
======================================-->

<!-- <script src="vistas/js/plantilla.js"></script> -->
<script>
    const passwordInput = document.getElementById('password-input');
    const passwordAddon = document.getElementById('password-addon');

    passwordAddon.addEventListener('click', () => {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            passwordAddon.innerHTML = '<i class="mdi mdi-eye-off-outline fas fa-eye-slash font-size-18 text-muted"></i>';
        } else {
            passwordInput.type = 'password';
            passwordAddon.innerHTML = '<i class="mdi mdi-eye-outline fas fa-eye font-size-18 text-muted"></i>';
        }
    });
</script>

<script>
    $("#logIn").click(function () {
        var datos = new FormData();

        datos = JSON.stringify({'user':formLog.logemail.value,'pass':formLog.logpass.value});
        datos = ({'user':formLog.logemail.value,'pass':formLog.logpass.value});

        console.info(datos);
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
                    Swal.fire( { icon: 'warning', title: "Error", text: "Tus datos no son correctos o no estas registrado", colorconfirmbuttontext: '#e97d01', confirmButtonText: "Aceptar" } );
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