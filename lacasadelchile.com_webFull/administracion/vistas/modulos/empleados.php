
<div class="content-wrapper">

  <section class="content-header">

   <h1>
      Empleados
    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Empleados</li>

    </ol> <br>

  
<!-- Boton para agregar nueva categoria -->

   <div class="small-box" style="text-align: center; cursor: pointer; background-color: #AD0808;" id = "btnNuevoEmpleado">
              
      <div class="inner">
              
         <h5 style="color: white;">Nueva empleado</h5>

      </div>
              
   </div>

  </section>




  <section class="content">

    <div class="box">

      <div class="box-body">
        
        <table class="table table-bordered table-striped dt-responsive tablaEmpleados" width="100%">
        
          <thead>
         
            <tr>
             
              <th style="width:30px">Id</th>
              <th>Nombre</th>
              <th>Sueldo</th>
              <th>Aniversario</th>
              <th>Estatus</th>
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
MODAL DETALLES DE VENTAS
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
          <h3 class="modal-title"><strong>Editar empleado</strong></h3>
          </center>
          
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div id="detalleEmpleado" class="modal-body">

          <div class="box-body">

            <div class="form-group" style="display: none;">
              <label>Identificador:</label>
              <input type="number" class="form-control" id="id" >
            </div>

            <div class="form-group">
              <label>Nombre:</label>
              <input type="text" class="form-control" id="nombre">
            </div>

            <div class="form-group">
              <label>Sueldo:</label>
              <input type="text" class="form-control" id="sueldo">
            </div>

            <div class="form-group">
              <label>Aniversario:</label>
              <input type="date" class="form-control" id="aniversario">
            </div>

            <div class="form-group">
              <label>Estatus</label>
              <select class="form-control" id="estatus">
                <option value="1">Activa</option>
                <option value="2">Inactiva</option>
              </select>
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
MODAL AGREGAR CATEGORIAS
======================================-->

<div id="modalAgregarEmpleado" class="modal fade" role="dialog" aria-hidden="true">
  
  <div class="modal-dialog">
    
    <div class="modal-content">
      
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#AD0808; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <center>
          <h3 class="modal-title"><strong>Agregar empleado</strong></h3>
          </center>
          
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div id="detalleEmpleado" class="modal-body">

          <div class="box-body">

            <div class="form-group">
              <label>Nombre:</label>
              <input type="text" class="form-control" id="ActualizarNombre">
            </div>

            <div class="form-group">
              <label>Sueldo:</label>
              <input type="text" class="form-control" id="ActualizarSueldo">
            </div>

            <div class="form-group">
              <label>Aniversario:</label>
              <input type="date" class="form-control" id="ActualizarAniversario">
            </div>

            <div class="form-group">
              <label>Estatus</label>
              <select class="form-control" id="ActualizarEstatus">
                <option value="1">Activa</option>
                <option value="2">Inactiva</option>
              </select>
            </div>            

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->
        

        <div class="modal-footer" style="">
          
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="button" class="btn btn-success pull-right" id="guardarNuevoEmpleado">Guardar</button>

        </div>

    </div>

  </div>

</div>




<script type="text/javascript">

/*=============================================
CARGAR LA TABLA DINÁMICA DE USUARIOS
=============================================*/

$(".tablaEmpleados").DataTable({
   "ajax": "ajax/tablaEmpleados.ajax.php",
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

  var id = $(element).attr("id");
  var nombre = $(element).attr("nombre");
  var sueldo = $(element).attr("sueldo");
  var aniversario = $(element).attr("aniversario");
  var estatus = $(element).attr("estatus");

  id = id*1;

  if(estatus == 1){

    estatus = "Activo";

  }
  if (estatus == 2){

    estatus = "Inactivo";

  }
  
  $("#id").val(id);

  $("#nombre").val(nombre);

  $("#sueldo").val(sueldo);

  $("#aniversario").val(aniversario);

  $("#estatus").val(estatus);

  $('#modalDetalles').modal('show');

}

$("#guardarCambios").click(function (){

  var id = $("#id").val();
  var nombre = $("#nombre").val();
  var sueldo = $("#sueldo").val();
  var aniversario = $("#aniversario").val();
  var estatus = $("#estatus").val();

  var data = new FormData();

  data.append("id",id);
  data.append("nombre",nombre);
  data.append("sueldo",sueldo);
  data.append("aniversario",aniversario);
  data.append("estatus",estatus);
  data.append("accion","actualizar");

  console.log("id:"+id);
  console.log("nombre:"+nombre);
  console.log("sueldo:"+sueldo);
  console.log("aniversario:"+aniversario);
  console.log("estatus:"+estatus);


        $.ajax({

        url:"https://mcgnetworks.mx/bodega/administracion/ajax/nuevoEmpleado.ajax.php",
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
              title: '¡Datos actualizados!',
              text: 'Datos actualizados con exito',
              confirmButtonText: 'OK',
              allowOutsideClick: false
              }).then((result) => {
                        
                if (result.isConfirmed) {
                  
                  window.location.href = "empleados";
                  
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

$("#btnNuevoEmpleado").click(function (){

  $('#modalAgregarEmpleado').modal('show');

});

$('#guardarNuevoEmpleado').click(function(){

  var nuevoNombre = $("#ActualizarNombre").val();
  var nuevoSueldo = $("#ActualizarSueldo").val();
  var nuevoAniversario = $("#ActualizarAniversario").val();
  var nuevoEstatus = $("#ActualizarEstatus").val();

  var data = new FormData();

  data.append("nombre",nuevoNombre);
  data.append("sueldo",nuevoSueldo);
  data.append("aniversario",nuevoAniversario);
  data.append("estatus",nuevoEstatus);
  data.append("accion","nueva");

  console.log("nombre:"+nuevoNombre);
  console.log("sueldo:"+nuevoSueldo);
  console.log("aniversario:"+nuevoAniversario);
  console.log("estatus:"+nuevoEstatus);

          $.ajax({

        url:"https://mcgnetworks.mx/bodega/administracion/ajax/nuevoEmpleado.ajax.php",
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
              title: 'Datos Agregados!',
              text: 'Datos agregados con exito',
              confirmButtonText: 'OK',
              allowOutsideClick: false
              }).then((result) => {
                        
                if (result.isConfirmed) {
                  
                  window.location.href = "empleados";
                  
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