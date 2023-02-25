<?php

$usuarios = ControladorUsuarios::ctrMostrarTotalUsuariosA("id");
$totalUsuarios = count($usuarios);

?>

<div class="content-wrapper">

  <section class="content-header">

   <h1>
      Usuarios
    </h1>

    <ol class="breadcrumb">

      <li><a href="usuarios"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Usuarios</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-body">

        <div class="col-lg-12">
        
        <div class="small-box bg-red">
        
          <div class="inner">
          
            <h3><?php echo number_format($totalUsuarios); ?></h3>

            <p>Usuarios</p>
        
          </div>
        
          <div class="icon">
            
            <i class="ion ion-person-add"></i>
          
          </div>
        
        </div>
        
      </div>

      <!--=====================================
      BOTON NUEVO USUARIO
      ======================================-->

        <a href="#modalAgregarUsuario" data-toggle="modal"><div class="col-lg-12">

          <div class="small-box bg-navy" style="text-align: center;">
            
            <div class="inner">
            
              <h5 style="color: white;">Nuevo usuario</h5>

            </div>
            
          </div>
          
        </div>

        </a>
        
        <table class="table table-bordered table-striped dt-responsive tablaUsuarios" width="100%">
        
          <thead>
         
            <tr>
             
               <th style="width:10px">#</th>
               <th>Id</th>
               <th>Nombre</th>
               <th>Paterno</th>
               <th>Materno</th>
               <th>E-mail</th>
               <th>Empresa</th>
               <th>Fecha</th>

            </tr> 

          </thead>   
     
        </table>
          
      </div>

    </div>

  </section>

</div>


<!--=====================================
MODAL AGREGAR NUEVA VENTA
======================================-->

<div id="modalAgregarUsuario" class="modal fade" role="dialog">
  
  <div class="modal-dialog">
    
    <div class="modal-content">
      
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <center>
          <h4 class="modal-title">Nuevo usuario</h4>
          </center>
          
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">
            
            <!--=====================================
            NOMBRE DEL CLIENTE
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-plus-circle"></i></span> 
              
                <input type="text" class="form-control input-lg" id="clienteNombre" name="clienteNombre" placeholder="Nombre del cliente" width="100%" required>

              </div>

            </div>

            <!--=====================================
            Apellido del cliente
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-plus-circle"></i></span> 
              
                <input type="text" class="form-control input-lg" id="clientePaterno" name="clientePaterno" placeholder="Apellido paterno" width="100%" required>

              </div>

            </div>

            <!--=====================================
            Apellido del cliente
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-plus-circle"></i></span> 
              
                <input type="text" class="form-control input-lg" id="clienteMaterno" name="clienteMaterno" placeholder="Apellido materno" width="100%" required>

              </div>

            </div>

            <!--=====================================
            Telefono del cliente
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-mobile"></i></span> 
              
                <input type="text" class="form-control input-lg" id="clienteTelefono" name="clienteTelefono" placeholder="Teléfono de contacto" width="100%" required>

              </div>

            </div>

            <!--=====================================
            Email del cliente
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 
              
                <input type="text" class="form-control input-lg" id="clienteMail" name="clienteMail" placeholder="Direccion de correo" width="100%" required>

              </div>

            </div>

            <!--=====================================
            PRECIO DEL PRODUCTO
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-money"></i></span> 

                <input type="text" class="form-control input-lg" id="clienteEmpresa" name="clienteEmpresa" placeholder="Empresa" required>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">
          
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="button" id="botonGenerar" class="btn btn-primary">Generar cliente</button>

        </div>

    </div>

  </div>

</div>


<script type="text/javascript">

$(document).ready(function(){

  $("#botonGenerar").click(function(){

    var clienteNombre = $("#clienteNombre").val();
    var clientePaterno = $("#clientePaterno").val();
    var clienteMaterno = $("#clienteMaterno").val();
    var clienteTelefono = $("#clienteTelefono").val();
    var clienteMail = $("#clienteMail").val();
    var clienteEmpresa = $("#clienteEmpresa").val();

    if(clienteNombre != "" &&
      clientePaterno != "" &&
      clienteMaterno != "" &&
      clienteTelefono != "" &&
      clienteMail != ""){

      var datosCobro = new FormData();
      datosCobro.append("accion", "usuario");
      datosCobro.append("nombre", clienteNombre);
      datosCobro.append("paterno", clientePaterno);
      datosCobro.append("materno", clienteMaterno);
      datosCobro.append("telefono", clienteTelefono);
      datosCobro.append("mail", clienteMail);
      datosCobro.append("empresa", clienteEmpresa);

      $.ajax({

        url:"https://mcgnetworks.mx/asicom/administracion/ajax/nuevo.ajax.php",
        method:"POST",
        data: datosCobro,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){

          console.log(respuesta)

          switch(respuesta){

            case "ok":
              Swal.fire({
                icon: 'success',
                title: '¡Usuario creado!',
                text: 'Usuario creado con exito',
                confirmButtonText: 'OK'
              })
            break;

            case "existe":
              Swal.fire({
                icon: 'warning',
                title: 'Lo sentimos',
                text: 'El correo que ingresaste ya está registrado',
                confirmButtonText: 'OK'
              })
            break;

            default:
              Swal.fire({
                icon: 'error',
                title: 'Ha ocurrido un error',
                text: 'Por favor intentalo nuevamente',
                confirmButtonText: 'OK',
                footer: 'Sentimos las molestias'
              })
            break;

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

</script>