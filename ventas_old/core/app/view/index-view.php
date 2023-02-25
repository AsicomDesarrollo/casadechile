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

<div class="container" style="margin-bottom: 5%;">
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-4 col-md-offset-2">
            <div style="text-align: center; margin-top: 150px; background-color: #1f4655; border-radius: 15px;">
                <br>
                <center>
                    <img src="vistas/img/plantilla/logo.png" class="img-responsive" width="50%"
                        style="margin-top: 50px; margin-bottom: 50px;">
                </center>
                <br>
                <a href="?view=nuevaventa">
                    <button class="btn btn-primary" style="margin-top: 30px; background-color: #6ca846; border: none; font-size: 28px; margin-bottom: 50px;">Nueva venta</button>
                </a>
                <br>
            </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-5 col-lg-5">
            <div style="margin-top: 150px; background-color: #1f4655; border-radius: 15px; padding:15px; color:aliceblue !important" class="p-5">
                <h1>Folios Anteriores</h1>
                <ul listaFolios>
                    <?php
                    $folios = Productos::ultimosFolios();
                    if (count($folios)>0){
                        foreach ($folios as $key => $value) {
                            echo "<a href='./?view=nuevaventa&folio=".$value['folio']."' ><li><h1>".$value['id']." - <span>".$value['cliente']."</span></h1> </li>";
                        }                    
                    }else{
                        echo "<h1 style='color:#dd4b39c7'>No tienes ventas</h1>";
                    }
                    ?>

                </ul>
               
                <br>
            </div>
        </div>
        
    </div>
    <a href="./?action=salir">
        <span class="btn btn-danger"
            style="width: 100%; margin-top: 5%; padding-top: 15px; padding-bottom: 15px;">SALIR</span>
    </a>
</div>

<script type="text/javascript">
bajb_backdetect.OnBack = function() {

    window.location = "./?action=salir";

}

$("body").css("background-image", "url(vistas/img/plantilla/fondoinicio2.jpg)");

$("body").css("background-repeat", "no-repeat");

$("body").css("background-size", "cover");
</script>