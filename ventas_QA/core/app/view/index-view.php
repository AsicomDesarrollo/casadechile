<!--=====================================
PÁGINA DE INICIO
======================================-->
<style> 
ul li[first]:first-child{
    color:aqua !important;
    font-size: 38px !important;
    font-weight: bold !important;
}
ul[listaFolios] H1>span{
font-size: 0.7em !important;
}
</style>

<div class="container">
    <div class="row">

    <div class="container pt-5">
        <div class="col-12">
            <h2> 
                <strong>
                    Hola,  <?php echo $_SESSION["nombre"] . " " .  $_SESSION["paterno"] . " " .  $_SESSION["materno"] ?>
                <br>
                <span style="font-size: large;"><?php echo $_SESSION["email"] ?></span>
            </strong>
            </h2>
        </div>

    </div>
        
        <div class="col-xs-6 col-sm-6 col-md-6 ">
            <div class="wizard-form wizard-branch wizard-wrapper fl-form fl-style-1">
                <br>
                <center>
                    <img src="vistas/img/plantilla/logo.png" class="img-responsive" width="50%"
                        style="margin-top: 50px; margin-bottom: 50px;">
                </center>
                <br>
              
                    <a type="button" name="forward" class="btn-form-func forward"  href="?view=nuevaventa"  >
                        <span class="btn-form-func-content">Nueva venta</span>
                        <span class="icon"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                    </a>
              
                <br>
            </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <div style="margin-top:30px; border-radius: 15px;" class="p-5">
            

                <div class="card" style="  border: 2px solid #e97d01;">
                    <div class="card-header" style="border-bottom: 1px solid #e97d01; background-color:#e97d01">
                        <h1 class="text-light text-center"> <strong>Folios Anteriores</strong> </h1>
                    </div>
                    <ul class="list-group list-group-flush" listaFolios>
                        <?php
                        $folios = Productos::ultimosFolios(); 
                        if (count($folios)>0){
                            foreach ($folios as $key => $value) {
                                echo "<li  class='list-group-item' style='border-bottom: 1px solid #e97d01;' ><a href='./?view=nuevaventa&folio=".$value['folio']."' ><h1>".$value['id']." - <span>".$value['cliente']."</span></h1> </a></li>";
                            }                    
                        }else{
                            echo "<h1 style='color:#dd4b39c7'>No tienes ventas</h1>";
                        }
                        ?>

                    </ul>
                </div>



               
                <br>
            </div>
        </div>
        
    </div>

</div>

