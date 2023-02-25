<?php

//$ventas = ControladorVentas::ctrMostrarTotalVentas();

?>

<div class="content-wrapper">

  <section class="content-header">

   <h1>
      Administradores
    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administradores</li>

    </ol> <br>

  
<!-- Boton para agregar nueva categoria -->

   <div class="small-box" style="text-align: center; cursor: pointer; background-color: #AD0808;" id = "btnNuevoAdmin">
              
      <div class="inner">
              
         <h5 style="color: white;">Nuevo Administrador</h5>

      </div>
              
   </div>

  </section>




  <section class="content">

    <div class="box">

      <div class="box-body">
        
        <table class="table table-bordered table-striped dt-responsive tablaAdministradores" width="100%">
        
          <thead>
         
            <tr>
             
              <th style="width:30px">Id</th>
              <th>Nombre</th>
              <th>Paterno</th>
              <th>Materno</th>
              <th>Email</th>
              <th>Contraseña</th>  
              <th>Fecha</th>                                          
              <th>Acciones</th>

            </tr> 

          </thead>   
     
        </table>
          
      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL DETALLES 
======================================-->

<div id="modalDetalles" class="modal fade" role="dialog" aria-hidden="true">
  
  <div class="modal-dialog">
    
    <div class="modal-content">
      
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#AD0808; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <center>
          <h3 class="modal-title"><strong>Editar Administrador</strong></h3>
          </center>
          
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div id="detalleAdmin" class="modal-body">

          <div class="box-body">

            <div class="form-group" style="display: none;">
              <label>Identificador:</label>
              <input type="number" class="form-control" id="idAdmin" disabled="disabled">
            </div>

            <div class="form-group">
              <label>Nombre:</label>
              <input type="text" class="form-control" id="nombreAdmin">
            </div>

            <div class="form-group">
              <label>Paterno</label>
              <input type="text" class="form-control" id="paternoAdmin">
            </div>

            <div class="form-group">
              <label>Materno:</label>
              <input type="text" class="form-control" id="maternoAdmin">
            </div>

            <div class="form-group">
              <label>Email:</label>
              <input type="text" class="form-control" id="emailAdmin">
            </div>

            <div class="form-group">
              <label>Contraseña:</label>
              <input type="text" class="form-control" id="pwdAdmin">
            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->
        

        <div class="modal-footer" style="">
          
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="button" class="btn btn-success pull-right" id="guardarCambios">Guardar</button>

        </div>

    </div>

  </div>

</div>

<!--=====================================
MODAL AGREGAR 
======================================-->

<div id="modalAgregarAdmin" class="modal fade" role="dialog" aria-hidden="true">
  
  <div class="modal-dialog">
    
    <div class="modal-content">
      
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#AD0808; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <center>
          <h3 class="modal-title"><strong>Agregar Administrador</strong></h3>
          </center>
          
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <div class="form-group">
              <label>Nombre:</label>
              <input type="text" class="form-control" id="ActualizarNombreAdmin">
            </div>

            <div class="form-group">
              <label>Paterno: </label>
              <input type="text" class="form-control" id="ActualizarPaternoAdmin">
            </div>            

            <div class="form-group">
              <label>Materno: </label>
              <input type="text" class="form-control" id="ActualizarMaternoAdmin">
            </div>  

            <div class="form-group">
              <label>Email: </label>
              <input type="text" class="form-control" id="ActualizarEmailAdmin">
            </div>  

             <div class="form-group">
              <label>Contraseña: </label>
              <input type="text" class="form-control" id="ActualizarPwdAdmin">
            </div>  

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->
        

        <div class="modal-footer" style="">
          
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="button" class="btn btn-success pull-right" id="guardarNuevoAdmin">Guardar</button>

        </div>

    </div>

  </div>

</div>




<script type="text/javascript">

/*=============================================
CARGAR LA TABLA DINÁMICA DE USUARIOS
=============================================*/

$(".tablaAdministradores").DataTable({
   "ajax": "ajax/tablaAdministradores.ajax.php",
   "deferRender": true,
   "retrieve": true,
   "processing": true,
   "language": {

    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
      "sFirst":    "Primero",
      "sLast":     "Último",
      "sNext":     "Siguiente",
      "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }

   }

});
  
function Seleccionar(element){

  var idAdmin = $(element).attr("idAdmin");
  var nombreAdmin = $(element).attr("nombreAdmin");
  var paternoAdmin = $(element).attr("paternoAdmin");
  var maternoAdmin = $(element).attr("maternoAdmin");
  var emailAdmin = $(element).attr("emailAdmin");
  var pwdAdmin = $(element).attr("pwdAdmin");
  
  $("#idAdmin").val(idAdmin);

  $("#nombreAdmin").val(nombreAdmin);

  $("#paternoAdmin").val(paternoAdmin);

  $("#maternoAdmin").val(maternoAdmin);

  $("#emailAdmin").val(emailAdmin);

  $("#pwdAdmin").val(pwdAdmin);

  $('#modalDetalles').modal('show');

}

$("#guardarCambios").click(function (){

  var idAdmin = $("#idAdmin").val();
  var nombreAdmin = $("#nombreAdmin").val();
  var paternoAdmin = $("#paternoAdmin").val();
  var maternoAdmin = $("#maternoAdmin").val();
  var emailAdmin = $("#emailAdmin").val();
  var pwdAdmin = $("#pwdAdmin").val();

  /*console.log(idAdmin);
  console.log(nombreAdmin);
  console.log(paternoAdmin);
  console.log(maternoAdmin);
  console.log(emailAdmin);*/

  var data = new FormData();

  data.append("id",idAdmin);
  data.append("nombre",nombreAdmin);
  data.append("paterno",paternoAdmin);
  data.append("materno",maternoAdmin);
  data.append("email",emailAdmin);
  data.append("pwd",pwdAdmin);
  data.append("accion","actualizar");



        $.ajax({

        url:"ajax/nuevoAdmin.ajax.php",
        method:"POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){

          console.log(respuesta)

          if(respuesta == "ok"){

            Swal.fire({
              icon: 'success',
              title: '¡Administrador actualizado!',
              text: '¡Administrador actualizado con exito',
              confirmButtonText: 'OK',
              allowOutsideClick: false
              }).then((result) => {
                        
                if (result.isConfirmed) {
                  
                  window.location.href = "administradores";
                  
                }
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



})

$("#btnNuevoAdmin").click(function (){

  $('#modalAgregarAdmin').modal('show');

});



$('#guardarNuevoAdmin').click(function(){

  var nombreNuevo = $("#ActualizarNombreAdmin").val();
  var paternoNuevo = $("#ActualizarPaternoAdmin").val();
  var maternoNuevo = $("#ActualizarMaternoAdmin").val();
  var emailNuevo = $("#ActualizarEmailAdmin").val();
  var pwdNuevo = $("#ActualizarPwdAdmin").val();

  console.log(nombreNuevo);
  console.log(paternoNuevo);
  console.log(maternoNuevo);
  console.log(emailNuevo);


  var data = new FormData();

  data.append("nombre",nombreNuevo);
  data.append("paterno",paternoNuevo);
  data.append("materno",maternoNuevo);
  data.append("email",emailNuevo);
  data.append("pwd",pwdNuevo);
  data.append("accion","nuevo");

          $.ajax({

        url:"ajax/nuevoAdmin.ajax.php",
        method:"POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){

          console.log(respuesta)

          if(respuesta == "ok"){

            Swal.fire({
              icon: 'success',
              title: '¡Administrador Agregado!',
              text: '¡Administrador agregado con exito',
              confirmButtonText: 'OK',
              allowOutsideClick: false
              }).then((result) => {
                        
                if (result.isConfirmed) {
                  
                  window.location.href = "administradores";
                  
                }
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

});


</script>