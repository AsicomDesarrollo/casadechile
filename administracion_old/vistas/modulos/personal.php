<?php

//$ventas = ControladorVentas::ctrMostrarTotalVentas();

?>

<div class="content-wrapper">

  <section class="content-header">

   <h1>
      Personal
    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Personal</li>

    </ol> <br>

  
<!-- Boton para agregar nueva categoria -->

   <div class="small-box" style="text-align: center; cursor: pointer; background-color: #AD0808;" id = "btnNuevoPersonal">
              
      <div class="inner">
              
         <h5 style="color: white;">Nuevo Personal</h5>

      </div>
              
   </div>

  </section>




  <section class="content">

    <div class="box">

      <div class="box-body">
        
        <table class="table table-bordered table-striped dt-responsive tablaPersonal" width="100%">
        
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
          <h3 class="modal-title"><strong>Editar Personal</strong></h3>
          </center>
          
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div id="detallePersonal" class="modal-body">

          <div class="box-body">

            <div class="form-group" style="display: none;">
              <label>Identificador:</label>
              <input type="number" class="form-control" id="idPersonal" disabled="disabled">
            </div>

            <div class="form-group">
              <label>Nombre:</label>
              <input type="text" class="form-control" id="nombrePersonal">
            </div>

            <div class="form-group">
              <label>Paterno</label>
              <input type="text" class="form-control" id="paternoPersonal">
            </div>

            <div class="form-group">
              <label>Materno:</label>
              <input type="text" class="form-control" id="maternoPersonal">
            </div>

            <div class="form-group">
              <label>Email:</label>
              <input type="text" class="form-control" id="emailPersonal">
            </div>

            <div class="form-group">
              <label>Contraseña:</label>
              <input type="text" class="form-control" id="pwdPersonal">
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

<div id="modalAgregarPersonal" class="modal fade" role="dialog" aria-hidden="true">
  
  <div class="modal-dialog">
    
    <div class="modal-content">
      
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#AD0808; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <center>
          <h3 class="modal-title"><strong>Agregar Personal</strong></h3>
          </center>
          
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <div class="form-group">
              <label>Nombre:</label>
              <input type="text" class="form-control" id="ActualizarNombrePersonal">
            </div>

            <div class="form-group">
              <label>Paterno: </label>
              <input type="text" class="form-control" id="ActualizarPaternoPersonal">
            </div>            

            <div class="form-group">
              <label>Materno: </label>
              <input type="text" class="form-control" id="ActualizarMaternoPersonal">
            </div>  

            <div class="form-group">
              <label>Email: </label>
              <input type="text" class="form-control" id="ActualizarEmailPersonal">
            </div>  

             <div class="form-group">
              <label>Contraseña: </label>
              <input type="text" class="form-control" id="ActualizarPwdPersonal">
            </div>  

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->
        

        <div class="modal-footer" style="">
          
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="button" class="btn btn-success pull-right" id="guardarNuevoPersonal">Guardar</button>

        </div>

    </div>

  </div>

</div>




<script type="text/javascript">

/*=============================================
CARGAR LA TABLA DINÁMICA DE USUARIOS
=============================================*/

$(".tablaPersonal").DataTable({
   "ajax": "ajax/tablaUsuarios.ajax.php",
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

  var idPersonal = $(element).attr("idPersonal");
  var nombrePersonal = $(element).attr("nombrePersonal");
  var paternoPersonal = $(element).attr("paternoPersonal");
  var maternoPersonal = $(element).attr("maternoPersonal");
  var emailPersonal = $(element).attr("emailPersonal");
  var pwdPersonal = $(element).attr("pwdPersonal");
  
  $("#idPersonal").val(idPersonal);

  $("#nombrePersonal").val(nombrePersonal);

  $("#paternoPersonal").val(paternoPersonal);

  $("#maternoPersonal").val(maternoPersonal);

  $("#emailPersonal").val(emailPersonal);

  $("#pwdPersonal").val(pwdPersonal);

  $('#modalDetalles').modal('show');

  console.log(idPersonal);
  console.log(nombrePersonal);
  console.log(paternoPersonal);
  console.log(maternoPersonal);
  console.log(emailPersonal);

}

$("#guardarCambios").click(function (){

  var idPersonal = $("#idPersonal").val();
  var nombrePersonal = $("#nombrePersonal").val();
  var paternoPersonal = $("#paternoPersonal").val();
  var maternoPersonal = $("#maternoPersonal").val();
  var emailPersonal = $("#emailPersonal").val();
  var pwdPersonal = $("#pwdPersonal").val();

  /*console.log(idAdmin);
  console.log(nombreAdmin);
  console.log(paternoAdmin);
  console.log(maternoAdmin);
  console.log(emailAdmin);*/

  var data = new FormData();

  data.append("id",idPersonal);
  data.append("nombre",nombrePersonal);
  data.append("paterno",paternoPersonal);
  data.append("materno",maternoPersonal);
  data.append("email",emailPersonal);
  data.append("pwd",pwdPersonal);
  data.append("accion","actualizar");



        $.ajax({

        url:"https://mcgnetworks.mx/bodega/administracion/ajax/nuevoPersonal.ajax.php",
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
              title: '¡Personal actualizado!',
              text: 'Personal actualizado con exito',
              confirmButtonText: 'OK',
              allowOutsideClick: false
              }).then((result) => {
                        
                if (result.isConfirmed) {
                  
                  window.location.href = "personal";
                  
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

$("#btnNuevoPersonal").click(function (){

  $('#modalAgregarPersonal').modal('show');

});



$('#guardarNuevoPersonal').click(function(){

  var nombreNuevo = $("#ActualizarNombrePersonal").val();
  var paternoNuevo = $("#ActualizarPaternoPersonal").val();
  var maternoNuevo = $("#ActualizarMaternoPersonal").val();
  var emailNuevo = $("#ActualizarEmailPersonal").val();
  var pwdNuevo = $("#ActualizarPwdPersonal").val();

  console.log(nombreNuevo);
  console.log(paternoNuevo);
  console.log(maternoNuevo);
  console.log(emailNuevo);
  console.log(pwdNuevo);


  var data = new FormData();

  data.append("nombre",nombreNuevo);
  data.append("paterno",paternoNuevo);
  data.append("materno",maternoNuevo);
  data.append("email",emailNuevo);
  data.append("pwd",pwdNuevo);
  data.append("accion","nuevo");

          $.ajax({

        url:"https://mcgnetworks.mx/bodega/administracion/ajax/nuevoPersonal.ajax.php",
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
              title: '¡Personal Agregado!',
              text: 'Personal agregado con exito',
              confirmButtonText: 'OK',
              allowOutsideClick: false
              }).then((result) => {
                        
                if (result.isConfirmed) {
                  
                  window.location.href = "personal";
                  
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