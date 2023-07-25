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
                        <h1 class="text-light text-center"> <strong>Folios de venta <i class="fas fa-shopping-bag"></i></strong> </h1>
                    </div>
                    <ul class="list-group list-group-flush" listaFolios>
                        <?php
                        $folios = Productos::ultimosFolios(); 
                        if (count($folios)>0){
                            foreach ($folios as $key => $value) {
                                echo "<li  class='list-group-item ' style='border-bottom: 1px solid #e97d01;' >
                                        <div >              
                                        <a href='./?view=nuevaventa&folio=".$value['folio']."&nota=".$value['id']."' >
                                            <h1>".$value['id']." - <span>".$value['cliente']."</span></h1> 
                                        </a>                          
                                        </div>
                                        <div >           
                                            <button class='btn btn-outline-success asignarNota' id='".$value['id']."' folio='".$value['folio']."'  style='margin-top: -45px; float:right'><i class='fas fa-share-alt'></i></button>
                             
                                        </div>

                                    </li>";
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

        
        <div id="modalAgregarNota" class="modal" tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title " style="color:#e97d01;" > Asignacion de nota a empleado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                <div class="modal-body row">

                  <div class="col-md-12 col-sm-12 nice-select wide price-list">
            
                            <select  class="form-select  form-select-lg " id="asignacionNota"  style="height: 100%;" name="asignacionNota" >
                                <option value="0"  class="form-control"   >Sin asignar</option>
                                <option value="1"   class="form-control"    >Rosa Lopez</option>
                                <option value="2"  class="form-control"    >Don gato</option>
                                <option value="8"  class="form-control"    >Elena Sandoval</option>
                                <option value="6"  class="form-control"    >Ana Esquivel</option>
                    
                            </select> 
                            <input type="text" id="idNota" name="nota"  class="form-control" disabled>
             
                  </div>

                <div class="modal-footer">
                  <button type="button" class="btn-form-func forward  btnAsignarNota" id="btnAsignarNota" >Asignar nota</button>
                </div>
            </div>
          </div>
        </div>



    </div>

</div>

<script>
$(".asignarNota").click(function () {

    $("#modalAgregarNota").modal('show');
    var notaValue = $(this).attr("id");
    var folioValue = $(this).attr("folio");

    $("#btnAsignarNota").click(function () {

        var datosAsignacion = new FormData();

        var empleadoValue =  $("#asignacionNota option:selected").val();        

        datosAsignacion.append("empleado", empleadoValue);
        datosAsignacion.append("nota", notaValue);
        datosAsignacion.append("folio", folioValue);

        console.info(datosAsignacion);

        // Enviar el valor mediante una llamada AJAX con jQuery
        $.ajax({
            url: "./?action=asignarNota",
            method: "POST",
            data: datosAsignacion,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {
              console.log(respuesta);
              if (respuesta == "success" || respuesta == "") {
                Swal.fire({
                  icon: 'success',
                  title: '¡Orden asignada!',
                  text: 'La nota y su informacion ha pasado a otro vendedor',
                  confirmButtonText: 'Aceptar',
                  allowOutsideClick: false
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = "?view=index";
                  }
                })
              } else {
                Swal.fire({
                  icon: 'error',
                  title: 'Ha ocurrido un error',
                  text: 'Por favor intentalo nuevamente',
                  confirmButtonText: 'OK',
                  footer: 'Sentimos las molestias'
                })
              }
              $("#enviarPedido").prop("disabled", false);
            }
          });

        console.log($(this));





    });



});


</script>

