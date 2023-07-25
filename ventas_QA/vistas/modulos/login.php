<!--
Módulo de log in
-->

</style>

<img src="vistas/img/plantilla/fondologin3.png" class="img-responsive" style="height: 120%; position: absolute; left: 0%; top: -20%; z-index: -10;">

<!--<img src="vistas/img/plantilla/derecha.png" class="img-responsive" style="width: 30%; position: absolute; right: 5%;">-->


<div class="container">
  
  <div class="row">

    <span class="col-xs-0 col-sm-0 col-md-6 col-lg-6"> </span>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

      <div style="text-align: center; margin-top: 150px;">
          
        <h1 style="color: #bd4729;">Bienvenido__</h1><h4 style="color: #bd4729;">Ingrese para continuar_____s</h4>

        <br>

        <form  method="post" style="margin-top: 50px;">

          <div class="form-group">
            <label style="color: #ac9756;">Correo electrónico</label>
            <input type="email" class="form-control" name="ingEmail" required="">
          </div>

          <div class="form-group has-feedback" style="margin-top: 30px;">
            <label style="color: #ac9756;">Contraseña</label>
            <input type="password" class="form-control" name="ingPassword" required>
          </div>

          <button type="submit" class="btn btn-primary" style="margin-top: 30px; background-color: #6ca846; border: none;">Ingresar</button>
              
          <?php

            $login = new ControladorAdministradores();
            $login -> ctrIngresoAdministrador();

          ?>

        </form>

      </div>
  
    </div>
    
  </div>

</div>


