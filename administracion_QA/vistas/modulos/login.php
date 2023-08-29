<body class="bg-white">

<div class="auth-page d-flex align-items-center ">
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-xxl-3 col-lg-4 col-md-5">
                    <div class="d-flex flex-column h-100 py-5 px-4">
                        <div class="text-center text-muted mb-2">
                            <div class="">
                                <a href="#">
                                    <span class="logo-lg">
                                        <span class="logo-txt">
                                          Panel de administración
                                        </span>
                                    </span>
                                </a>
                           
                            </div>
                        </div>

                        <div class="my-auto">
                            <div class=" text-center">
                            <img src="vistas/dist/assets/images/logo/logo.png" class="img-fluid" width="300">
                            </div>
                        </div>

                        <div class="mt-4 mt-md-5 text-center">
                                <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> Casadelchile Todos los derechos reservados. creado por ASICOM GRAPHICS</p>
                        </div>
                    </div>
                
                <!-- end auth full page content -->
            </div>
            <!-- end col -->
            <style>
.auth-bg-login{
              background-image: url(vistas/dist/assets/images/wallpapers/chiles_frescos.jpg);
              background-position: center;
              background-size: cover;
              background-repeat: no-repeat;
              -webkit-clip-path: polygon(15% 0,100% 0,100% 100%,0 100%);
              clip-path: polygon(15% 0,100% 0,100% 100%,0 100%);
}

            </style>
            <div class="col-xxl-9 col-lg-8 col-md-7">
                <div class="auth-bg-login auth-bg bg-light py-md-5 p-4 d-flex">
                    <div class="bg-overlay-gradient"></div>
                    <!-- end bubble effect -->
                    <div class="row justify-content-center g-0 align-items-center w-100">
                        <div class="col-xl-4 col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="px-3 py-3">
                                        <div class="text-center">
                                            <h5 class="mb-0">¡ Bienvenido de nuevo !</h5>
                                            <p class="text-muted mt-2">Ingrese para continuar</p>
                                        </div>
                                        <form action="" method="post" class="mt-4 pt-2">
                                            <div class="form-floating form-floating-custom mb-3">
                                                <input type="text" class="form-control" id="input-username"  name="ingEmail" placeholder="correo electronico">
                                                <label for="input-username">Correo electronico</label>
                                                <div class="form-floating-icon">
                                                    <i class="uil uil-users-alt"></i>
                                                </div>
                                            </div>
                                            <div class="form-floating form-floating-custom mb-3 auth-pass-inputgroup">
                                                <input type="password" class="form-control" id="password-input" placeholder="Contraseña"  name="ingPassword" >
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
                                                    <a href="auth-resetpassword-basic.html" class="text-muted text-decoration-underline font-size-14">Olvide mi contraseña</a>
                                                </div>
                                                <label class="form-check-label font-size-14" for="remember-check">
                                                    Recordarme
                                                </label>
                                            </div>
        
                                            <div class="mt-3">
                                                <button class="btn btn-primary w-100" type="submit">Iniciar sesión</button>
                                            </div>
    
                
    
                                            <div class="mt-4 pt-3 text-center">
                                                <p class="text-muted mb-0">¿No tienes una cuenta? </p>
                                                <small class="fw-semibold text-decoration-underline"> Comunicate con el administrador del sitio. </small>
                                            </div>

                                            <?php

                                            $login = new ControladorAdministradores();
                                            $login -> ctrIngresoAdministrador();
                                            ?>
        
                                        </form><!-- end form -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container fluid -->
</div>
<!-- end authentication section -->

<!-- JAVASCRIPT -->
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/metismenujs/metismenujs.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/feather-icons/feather.min.js"></script>

<script src="assets/js/pages/pass-addon.init.js"></script>


<script type="text/javascript" >
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

</body>