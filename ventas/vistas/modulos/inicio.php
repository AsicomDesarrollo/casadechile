<!--=====================================
PÁGINA DE INICIO
======================================-->

<div class="container" style="margin-bottom: 5%;">
  
  <div class="row">

    <span class="col-xs-0 col-sm-0 col-md-4 col-lg-4"> </span>

    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

      <div style="text-align: center; margin-top: 150px; background-color: #1f4655; border-radius: 15px;">
        
        <br>

        <center>
          
          <img src="vistas/img/plantilla/logo.png" class="img-responsive" width="50%" style="margin-top: 50px; margin-bottom: 50px;">
        
        </center>
        
        <br>

          <a href="nuevaventa"><button class="btn btn-primary" style="margin-top: 30px; background-color: #6ca846; border: none; font-size: 28px; margin-bottom: 50px;">Nueva venta</button></a>

        <br>

      </div>
  
    </div>

    <span class="col-xs-0 col-sm-0 col-md-4 col-lg-4"> </span>

  </div>

  <a href="salir"><span class="btn btn-danger" style="width: 100%; margin-top: 5%; padding-top: 15px; padding-bottom: 15px;">SALIR</span></a>

</div>

<script type="text/javascript">

bajb_backdetect.OnBack = function(){
  
  window.location = "salir";

}

$("body").css("background-image", "url(/ventas/vistas/img/plantilla/fondoinicio2.jpg)");

$("body").css("background-repeat", "no-repeat");

$("body").css("background-size", "cover");

</script>