<div class="content-wrapper">

  <section class="content-header">

   <h1>
      Sucursales
    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Sucursales</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-body">

        <!--=====================================
        BOTON NUEVA VENTA
        ======================================-->

        <a href="#modalAgregarTienda" data-toggle="modal"><div class="col-lg-12">

          <div class="small-box bg-navy" style="text-align: center;">
            
            <div class="inner">
            
              <h5 style="color: white;">Nueva sucursal</h5>

            </div>
            
          </div>
          
        </div>

        </a>
        
        <table class="table table-bordered table-striped dt-responsive tablaSucursales" width="100%">
        
          <thead>
         
            <tr>
             
               <th style="width:10px">Id</th>
               <th>Nombre</th>
               <th>Producido</th>
               <th>Direccion</th>
               <th>Telefono</th>
               <th>Fecha</th>

            </tr> 

          </thead>   
     
        </table>
          
      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL NUEVO ADMINISTRADOR
======================================-->

<div id="modalAgregarTienda" class="modal fade" role="dialog">
  
  <div class="modal-dialog">
    
    <div class="modal-content">
      
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <center>
          <h4 class="modal-title">Nueva tienda</h4>
          </center>
          
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">
            
            <!--=====================================
            Nombre
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-plus-circle"></i></span> 
              
                <input type="text" class="form-control input-lg" id="nombre" name="nombre" placeholder="Nombre de la sucursal" width="100%" required>

              </div>

            </div>

            <!--=====================================
            Direccion
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-plus-circle"></i></span> 
              
                <input type="text" class="form-control input-lg" id="direccion" name="direccion" placeholder="Dirección de la sucursal" width="100%" required>

              </div>

            </div>

            <!--=====================================
            Apellido del cliente
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-plus-circle"></i></span> 
              
                <input type="text" class="form-control input-lg" id="telefono" name="telefono" placeholder="Teléfono de la sucursal" width="100%" required>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">
          
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="button" id="botonGenerar" class="btn btn-primary">Generar</button>

        </div>

    </div>

  </div>

</div>

<script type="text/javascript">

$(document).ready(function(){

  $("#botonGenerar").click(function(){

    var sucursalNombre = $("#nombre").val();
    var sucursalDireccion = $("#direccion").val();
    var sucursalTelefono = $("#telefono").val();

    if(sucursalNombre != "" &&
      sucursalDireccion != "" &&
      sucursalTelefono != "" ){

      var datosCobro = new FormData();
      datosCobro.append("accion", "tienda");
      datosCobro.append("nombre", sucursalNombre);
      datosCobro.append("direccion", sucursalDireccion);
      datosCobro.append("telefono", sucursalTelefono);

      $.ajax({

        url:"https://mcgnetworks.mx/asicom/administracion/ajax/nuevo.ajax.php",
        method:"POST",
        data: datosCobro,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){

          console.log(respuesta)

          if(respuesta == "ok"){

            Swal.fire({
              icon: 'success',
              title: '¡Tienda generada!',
              text: 'Tienda creada con exito',
              confirmButtonText: 'OK'
            })

          }else{

            Swal.fire({
              icon: 'error',
              title: 'Ha ocurrido un error',
              text: 'Por favor intentalo nuevamente',
              confirmButtonText: 'OK',
              footer: 'Sentimos las molestias'
            })

          }

        }
        
      })

    }else{

      Swal.fire({
        icon: 'error',
        title: 'Debes llenar todos los campos',
        text: 'Por favor verifica la información',
        confirmButtonText: 'OK'
      })

    }

  });

})

function Seleccionar(element){

  $("#nombre").val($(element).attr("nombre") +" "+ $(element).attr("paterno") +" "+ $(element).attr("materno"));
  $("#empresa").val($(element).attr("empresa"));
  $("#telefono").val($(element).attr("telefono"));
  $("#email").val($(element).attr("email"));

  cliente = $(element).attr("idUsuario");

  $('#modalClientes').modal('hide');

}

</script>