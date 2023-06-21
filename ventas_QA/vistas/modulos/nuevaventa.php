<div class="container">
  
  <div class="row" style="margin-bottom: 20px;">

    <span class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 20px;"> </span>

    <a href="inicio"><span class="btn btn-danger" style="width: 100%; margin-top: 3%; margin-bottom: 3%; padding-top: 15px; padding-bottom: 15px;">SALIR</span></a>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="background-color: #eee; border-radius:40px 0px 40px 40px;">

      <input type="text" class="form-control" id="buscarProducto" placeholder="Producto" style="border: none; border-radius: 15px; margin-top: 40px;" onkeyup="buscar()">

      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="contenedorProductos">

      <?php
      
        $categorias = ControladorProductos::ctrMostrarCategorias();

        foreach ($categorias as $key => $value) {

          echo '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

          <center>
      
            <h3 style="color: #e06345; margin-top: 30px; margin-bottom: 30px;">'.$value["nombre"].'</h3>
          
          </center>

          </div><br>';

          $productos = ControladorProductos::ctrMostrarProductosCategoria($value["id"]);

          $conCol = 0;

          foreach ($productos as $key => $producto) {
            
            if($producto["imagen"] == ""){

              echo '<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 agregarProducto" id="'.$producto["id"].'" nombre="'.$producto["nombre"].'" precio="'.$producto["precio"].'" minimo="'.$producto["minimo"].'" maximo="'.$producto["maximo"].'" imagen="'.$producto["imagen"].'" categoria="'.$producto["categoria"].'" style="cursor: pointer;">
        
                <center>

                  <img src="vistas/img/plantilla/categoria.png" style="width: 50%" class="img-responsive">';

            }else{

              echo '<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 agregarProducto" id="'.$producto["id"].'" nombre="'.$producto["nombre"].'" precio="'.$producto["precio"].'" minimo="'.$producto["minimo"].'" maximo="'.$producto["maximo"].'" imagen="'.$producto["imagen"].'" categoria="'.$producto["categoria"].'" style="cursor: pointer;">
        
                <center>

                  <img src="vistas/img/plantilla/'.$producto["imagen"].'" style="width: 50%" class="img-responsive">';

            }

            echo '<span><h5>$ '.$producto["precio"].'</h5></span><br>

                  <span><h5>'.$producto["nombre"].'</h5></span>

                </center>

              </div>';

            $conCol++;

            if($conCol == 4){

              echo '<span class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 50px;"> </span>';
              $conCol = 0;

            }

          }

        }

      ?>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="contenedorBusqueda">

    </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="background-color: #fbf2c7; border-radius:0px 40px 40px 0px;">

      <center>
      
        <h3 style="color: #e06345; margin-top: 30px; margin-bottom: 35px;">Pedido</h3>
      
      </center>

      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

        <center>
        
          <h5 style="color: #333333; margin-top: 30px; margin-bottom: 35px;"><strong>Descripción</strong></h5>
        
        </center>
    
      </div>

      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">

        <center>
        
          <h5 style="color: #333333; margin-top: 30px; margin-bottom: 35px;"><strong>Costo</strong></h5>
        
        </center>
    
      </div>

      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">

        <center>
        
          <h5 style="color: #333333; margin-top: 30px; margin-bottom: 35px;"><strong>Kg</strong></h5>
        
        </center>
    
      </div>

      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">

        <center>
        
          <h5 style="color: #333333; margin-top: 30px; margin-bottom: 35px;"><strong>Importe</strong></h5>
        
        </center>
    
      </div>

      <div id="divPedido">

      </div>

      <!---------
        Total
      ------>

      <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10" style="text-align: right;">

        <h5 style="color: #333333; margin-top: 30px; margin-bottom: 35px;"><strong>Total: $</strong></h5>
    
      </div>

      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="text-align: left;">

        <center><h5 style="color: #333333; margin-top: 30px; margin-bottom: 35px;"><strong id="total"></strong></h5></center>
    
      </div>

      <center>

        <div class="form-group" style="width: 80%;">
          <label >Nombre del cliente</label>
          <input type="text" class="form-control" id="nombreCliente" placeholder="Nombre del cliente" style="border: none; border-radius: 15px;" value="Venta general">
          <small class="form-text text-muted">Ingresa un nombre del cliente para registrar el pedido</small>
        </div>

        <button class="btn btn-default" id="enviarPedido" style="width: 80%; margin-top: 40px; margin-bottom: 40px;">Enviar pedido</button>

      </center>

    </div>
    
  </div>

</div>

<!--=====================================
MODAL AGREGAR NUEVA VENTA
======================================-->

<div id="modalProducto" class="modal fade" role="dialog">
  
  <div class="modal-dialog">
    
    <div class="modal-content">
      
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#fbf2c7; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <center>
          <h3 class="modal-title" style="color: #e06345"><strong id="tituloModal"></strong></h3>
          </center>
          
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <center>

          <img src="vistas/img/plantilla/categoria.png" style="width: 25%; margin-top: 40px; margin-bottom: 40px;" class="img-responsive">

        </center>

        <div style="margin-left: 40px; margin-right: 40px;">

          <div class="form-group" style="display: none;">
            <label >Id</label>
            <input type="text" class="form-control" id="idModal" placeholder="id">
          </div>

          <div class="form-group">
            <label id="etiquetaNuevaUnidad"></label>
            <input type="number" class="form-control" id="pesoModal" placeholder="" onkeyup="ocultar(event, 'peso')">
          </div>

          <div class="form-group">
            <label >Precio</label>
            <input type="number" class="form-control" id="precioModal" aria-describedby="emailHelp" placeholder="Ingresa el precio de venta" onkeyup="ocultar(event, 'precio')">
            <small class="form-text text-muted">Recuerda que el costo debe estar dentro del máximo y el mínimo establecido</small>
          </div>

          <div class="form-group" style="display: none;">
            <label >Precio Maximo</label>
            <input type="number" class="form-control" id="maximoModal" placeholder="Precio máximo establecido" disabled>
            <small class="form-text text-muted">Precio máximo establecido para este producto</small>
          </div>

          <div class="form-group">
            <label >Precio Mínimo</label>
            <input type="numer" class="form-control" id="minimoModal" placeholder="Precio mínimo de venta" disabled>
            <small class="form-text text-muted">Precio mínimo establecido para este producto</small>
          </div>

          <span class="btn btn-default btnAgregar" id="btnAgregarFocus" style="width: 100%; margin-top: 40px; margin-bottom: 40px;">Agregar al pedido</span>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">
          
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        </div>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR VENTA
======================================-->

<div id="modalEditar" class="modal fade" role="dialog">
  
  <div class="modal-dialog">
    
    <div class="modal-content">
      
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#fbf2c7; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <center>
          <h3 class="modal-title" style="color: #e06345"><strong id="tituloEditar"></strong></h3>
          </center>
          
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <center>

          <img src="vistas/img/plantilla/categoria.png" style="width: 25%; margin-top: 40px; margin-bottom: 40px;" class="img-responsive">

        </center>

        <div style="margin-left: 40px; margin-right: 40px;">

          <div class="form-group" style="display: none;">
            <label >Id</label>
            <input type="text" class="form-control" id="idEditar" placeholder="id">
          </div>

          <div class="form-group">
            <label id="etiquetaEditarUnidad">Peso en Kg</label>
            <input type="number" class="form-control" id="pesoEditar" placeholder="">
          </div>

          <div class="form-group">
            <label >Precio</label>
            <input type="number" class="form-control" id="precioEditar" aria-describedby="emailHelp" placeholder="Ingresa el precio de venta">
            <small class="form-text text-muted">Recuerda que el costo debe estar dentro del máximo y el mínimo establecido</small>
          </div>

          <div class="form-group" style="display: none;">
            <label >Precio Maximo</label>
            <input type="number" class="form-control" id="maximoEditar" placeholder="Precio máximo establecido" disabled>
            <small class="form-text text-muted">Precio máximo establecido para este producto</small>
          </div>

          <div class="form-group">
            <label >Precio Mínimo</label>
            <input type="numer" class="form-control" id="minimoEditar" placeholder="Precio mínimo de venta" disabled>
            <small class="form-text text-muted">Precio mínimo establecido para este producto</small>
          </div>

          <span class="btn btn-default btnModificar" style="width: 100%; margin-top: 40px; margin-bottom: 40px;">Modificar</span>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">
          
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        </div>

    </div>

  </div>

</div>

<script type="text/javascript">

$("body").css("background-image", "url(/ventas/vistas/img/plantilla/fondoventa.jpg)");

$("body").css("background-repeat", "no-repeat");

$("body").css("background-size", "cover");

var json;

var total = 0;

var idActual;
var titulo;
var peso;
var precio;
var maximo;
var minimo;
var subtotal;

var listaPedido  = [];

$(".agregarProducto").click(function(){

  titulo = $(this).attr("nombre");
  maximo = parseFloat($(this).attr("maximo"));
  minimo = parseFloat($(this).attr("minimo"));
  idActual = $(this).attr("id");




    var datosCobro = new FormData();
    datosCobro.append("valor", idActual);

    $.ajax({

      url:"ajax/traerproducto.ajax.php",
      method:"POST",
      data: datosCobro,
      dataType: "json",
      cache: false,
      contentType: false,
      processData: false,
      success:function(respuesta){

        
          $.each(respuesta, function(id, val){

            switch(id){
              case 'id':
                idActual = val;

                console.log(id);
                console.log(val);

              break;

              case 'nombre':
                titulo = val;

                console.log(id);
                console.log(val);

              break;

              case 'precio':
                precio = val;

                console.log(id);
                console.log(val);

              break;

              case 'minimo':
                minimo = val;

                console.log(id);
                console.log(val);

              break;
              
              default:
              break;
            }

          })

          $("#idModal").val(idActual);
          $("#tituloModal").text(titulo);
          $("#pesoModal").val("");
          $("#precioModal").val(precio);
          $("#minimoModal").val(minimo);

      }
    
    })

    if(titulo.includes("ACHIOTE") == true){

      console.log("achiote");

      $("#etiquetaNuevaUnidad").text("Paquetes (Emplayado con 10 cajas)");

    }else if(titulo.includes("MOLE ") == true){

      console.log("mole");

      $("#etiquetaNuevaUnidad").text("Piezas");
      
    }else{

      console.log("otros");

      $("#etiquetaNuevaUnidad").text("Peso en Kg");
    }

    $("#modalProducto").modal('show');

})

$("#divPedido").on("click",".editarProducto",function(){

  titulo = $(this).attr("nombre");
  peso = $(this).attr("peso");
  precio = parseFloat($(this).attr("precio"));
  maximo = parseFloat($(this).attr("maximo"));
  minimo = parseFloat($(this).attr("minimo"));
  idActual = $(this).attr("id");

  $("#idEditar").val(idActual);
  $("#tituloEditar").text(titulo);
  $("#pesoEditar").val(peso);
  $("#maximoEditar").val(maximo);
  $("#precioEditar").val($(this).attr("precio"));
  $("#minimoEditar").val(minimo);

  console.log(titulo);

  if(titulo.includes("ACHIOTE") == true){

    console.log("achiote");

    $("#etiquetaEditarUnidad").text("Paquetes (Emplayado con 10 cajas)");

  }else if(titulo.includes("MOLE ") == true){

    console.log("mole");

    $("#etiquetaEditarUnidad").text("Piezas");
    
  }else{

    console.log("otros");

    $("#etiquetaEditarUnidad").text("Peso en Kg");
  }

  $("#modalEditar").modal('show');

})

$(".btnModificar").click(function(){

  peso = parseFloat($("#pesoEditar").val());
  precio = parseFloat($("#precioEditar").val());
  maximo = parseFloat($("#maximoEditar").val());
  minimo = parseFloat($("#minimoEditar").val());
  idActual = $("#idEditar").val();

  console.log(peso);
  console.log(precio);
  console.log(idActual);

  subtotal = peso*precio;

  if(peso == "" || peso == 0){

    Swal.fire({
      icon: 'error',
      title: 'Peso incorrecto',
      text: 'Debes ingresar un peso',
      confirmButtonText: 'OK',
      footer: 'Sentimos las molestias'
    })

  }else if(precio<minimo || precio>maximo){

    Swal.fire({
      icon: 'error',
      title: 'Costo incorrecto',
      text: 'Por favor ingresa un costo correcto',
      confirmButtonText: 'OK',
      footer: 'Sentimos las molestias'
    })

  }else{

    var idProducto = $(".cuerpoPedido span");
    var titulosProducto = $(".cuerpoPedido .titulo");
    var preciosProducto = $(".cuerpoPedido .precio");
    var pesosProducto = $(".cuerpoPedido .peso");
    var subsProducto = $(".cuerpoPedido .subtotal");

    listaPedido = [];

    $("#divPedido").empty();

    if(idProducto.length != 0){

      total = 0;

      for(var i = 0; i<idProducto.length ; i++){

        var idArray = $(idProducto[i]).attr("idProducto");
        var maximoArray = $(idProducto[i]).attr("maximo");
        var minimoArray = $(idProducto[i]).attr("minimo");
        var tituloArray = $(titulosProducto[i]).html();
        var precioArray = $(preciosProducto[i]).html();
        var pesoArray = $(pesosProducto[i]).html();
        var subArray = $(subsProducto[i]).html();

        if(idArray == idActual){

          subtotal = precio * peso;

          listaPedido.push({"id":idArray,
                          "titulo":tituloArray,
                          "precio":precio,
                          "maximo":maximo,
                          "minimo":minimo,
                          "peso":peso,
                          "subtotal":subtotal});

          $("#divPedido").append("<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 cuerpoPedido'><span class='col-xs-1 col-sm-1 col-md-1 col-lg-1 btn btn-danger borrar' idProducto="+idArray+" maximo="+maximo+" minimo="+minimo+" style='background-color: #df6852; color: #ffffff; border-radius: 100%; padding-left: 0px; padding-right: 0px; margin-top: 5px;'><i class='fa fa-trash'></i></span><div class='col-xs-4 col-sm-4 col-md-4 col-lg-4'><h5 style='color: #333333; margin-top: 15px;' class='titulo'>"+tituloArray+"</h5></div><div class='col-xs-1 col-sm-1 col-md-1 col-lg-1'><button class='btn btn-default editarProducto' nombre='"+tituloArray+"' peso='"+peso+"' precio='"+precio+"' maximo='"+maximo+"' minimo='"+minimo+"' id='"+idArray+"' style='background-color: #51bbff; color: #ffffff; border-radius: 100%; padding-left: 10px; padding-right: 10px; margin-top: 5px;'><i class='fa fa-pencil'></i></button></div><div class='col-xs-2 col-sm-2 col-md-2 col-lg-2'><center><h5 style='color: #333333; margin-top: 15px;' class='precio'>"+precio+"</h5></center></div><div class='col-xs-2 col-sm-2 col-md-2 col-lg-2'><center><h5 style='color: #333333; margin-top: 15px;' class='peso'>"+peso+"</h5></center></div><div class='col-xs-2 col-sm-2 col-md-2 col-lg-2'><center><h5 style='color: #333333; margin-top: 15px;' class='subtotal'>"+subtotal+"</h5></center></div></div>");

        }else{

          listaPedido.push({"id":idArray,
                          "titulo":tituloArray,
                          "precio":precioArray,
                          "maximo":maximoArray,
                          "minimo":minimoArray,
                          "peso":pesoArray,
                          "subtotal":subArray});

          subtotal = precioArray * pesoArray;

          $("#divPedido").append("<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 cuerpoPedido'><span class='col-xs-1 col-sm-1 col-md-1 col-lg-1 btn btn-danger borrar' idProducto="+idArray+" maximo="+maximoArray+" minimo="+minimoArray+" style='background-color: #df6852; color: #ffffff; border-radius: 100%; padding-left: 0px; padding-right: 0px; margin-top: 5px;'><i class='fa fa-trash'></i></span><div class='col-xs-4 col-sm-4 col-md-4 col-lg-4'><h5 style='color: #333333; margin-top: 15px;' class='titulo'>"+tituloArray+"</h5></div><div class='col-xs-1 col-sm-1 col-md-1 col-lg-1'><button class='btn btn-default editarProducto' nombre='"+tituloArray+"' peso='"+pesoArray+"' precio='"+precioArray+"' maximo='"+maximoArray+"' minimo='"+minimoArray+"' id='"+idArray+"' style='background-color: #51bbff; color: #ffffff; border-radius: 100%; padding-left: 10px; padding-right: 10px; margin-top: 5px;'><i class='fa fa-pencil'></i></button></div><div class='col-xs-2 col-sm-2 col-md-2 col-lg-2'><center><h5 style='color: #333333; margin-top: 15px;' class='precio'>"+precioArray+"</h5></center></div><div class='col-xs-2 col-sm-2 col-md-2 col-lg-2'><center><h5 style='color: #333333; margin-top: 15px;' class='peso'>"+pesoArray+"</h5></center></div><div class='col-xs-2 col-sm-2 col-md-2 col-lg-2'><center><h5 style='color: #333333; margin-top: 15px;' class='subtotal'>"+subArray+"</h5></center></div></div>");

        }

        total += subtotal;

      }

      $("#total").text(total);

      json = JSON.stringify(listaPedido);

      console.log(json);

      $("#modalEditar").modal('hide');

    }

  }

})

  $(".btnAgregar").click(function(){

    peso = $("#pesoModal").val();
    precio = parseFloat($("#precioModal").val());
    idActual = $("#idModal").val();
    subtotal = peso*precio;

    if(peso == "" || peso == 0){

      Swal.fire({
          icon: 'error',
          title: 'Peso incorrecto',
          text: 'Debes ingresar un peso',
          confirmButtonText: 'OK',
          footer: 'Sentimos las molestias'
        })

    }else if(precio<minimo){

      Swal.fire({
          icon: 'error',
          title: 'Costo incorrecto',
          text: 'Por favor ingresa un costo correcto',
          confirmButtonText: 'OK',
          footer: 'Sentimos las molestias'
        })

    }else{

      listaPedido.push({"id":idActual,
                        "titulo":titulo,
                        "precio":precio,
                        "maximo":maximo,
                        "minimo":minimo,
                        "peso":peso,
                        "subtotal":subtotal});

      json = JSON.stringify(listaPedido);

      console.log(json);

      $("#divPedido").append("<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 cuerpoPedido'><span class='col-xs-1 col-sm-1 col-md-1 col-lg-1 btn btn-danger borrar' idProducto="+idActual+" maximo="+maximo+" minimo="+minimo+" style='background-color: #df6852; color: #ffffff; border-radius: 100%; padding-left: 0px; padding-right: 0px; margin-top: 5px;'><i class='fa fa-trash'></i></span><div class='col-xs-4 col-sm-4 col-md-4 col-lg-4'><h5 style='color: #333333; margin-top: 15px;' class='titulo'>"+titulo+"</h5></div><div class='col-xs-1 col-sm-1 col-md-1 col-lg-1'><button class='btn btn-default editarProducto' nombre='"+titulo+"' peso='"+peso+"' precio='"+precio+"' maximo='"+maximo+"' minimo='"+minimo+"' id='"+idActual+"' style='background-color: #51bbff; color: #ffffff; border-radius: 100%; padding-left: 10px; padding-right: 10px; margin-top: 5px;'><i class='fa fa-pencil'></i></button></div><div class='col-xs-2 col-sm-2 col-md-2 col-lg-2'><center><h5 style='color: #333333; margin-top: 15px;' class='precio'>"+precio+"</h5></center></div><div class='col-xs-2 col-sm-2 col-md-2 col-lg-2'><center><h5 style='color: #333333; margin-top: 15px;' class='peso'>"+peso+"</h5></center></div><div class='col-xs-2 col-sm-2 col-md-2 col-lg-2'><center><h5 style='color: #333333; margin-top: 15px;' class='subtotal'>"+subtotal+"</h5></center></div></div>");
      
      total += subtotal;

      $("#total").text(total);

      $("#modalProducto").modal('hide');

      $("#buscarProducto").val("");

      $("#contenedorProductos").show();
      $("#contenedorBusqueda").hide();

    }

  })

  $("#divPedido").on("click",".borrar",function(){

    $(this).parent().remove();

    var idProducto = $(".cuerpoPedido span");
    var titulosProducto = $(".cuerpoPedido .titulo");
    var preciosProducto = $(".cuerpoPedido .precio");
    var pesosProducto = $(".cuerpoPedido .peso");
    var subsProducto = $(".cuerpoPedido .subtotal");

    listaPedido = [];

    if(idProducto.length != 0){

      total = 0;

      for(var i = 0; i<idProducto.length ; i++){

        var idArray = $(idProducto[i]).attr("idProducto");
        var tituloArray = $(titulosProducto[i]).html();
        var precioArray = $(preciosProducto[i]).html();
        var pesoArray = $(pesosProducto[i]).html();
        var subArray = $(subsProducto[i]).html();

        listaPedido.push({"id":idArray,
                        "titulo":tituloArray,
                        "precio":precioArray,
                        "peso":pesoArray,
                        "subtotal":subArray});

        subtotal = precioArray * pesoArray;

        total += subtotal;

      }

      $("#total").text(total);

      json = JSON.stringify(listaPedido);

      console.log(json);

    }else{

      listaPedido = [];

      total = 0;
      
      $("#total").text(total);

    }

  })

  $("#enviarPedido").click(function(){

    var nombreCliente = $("#nombreCliente").val();

    if(nombreCliente == ""){

      Swal.fire({
          icon: 'error',
          title: 'Nombre incorrecto',
          text: 'Debes ingresar un nombre a la orden',
          confirmButtonText: 'OK',
          footer: 'Sentimos las molestias'
        })

    }else if(total == 0){

      Swal.fire({
          icon: 'error',
          title: 'Upsss',
          text: 'Debes agregar al menos 1 producto a la orden',
          confirmButtonText: 'OK',
          footer: 'Sentimos las molestias'
        })

    }else{

      $("#enviarPedido").prop("disabled", true);

      var datosCobro = new FormData();
      datosCobro.append("json", json);
      datosCobro.append("cliente", nombreCliente);

      $.ajax({

        url:"ajax/nuevo.ajax.php?i=0",
        method:"POST",
        data: datosCobro,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){

          console.log(respuesta)

          if(respuesta == "ok" || respuesta == ""){

            Swal.fire({
              icon: 'success',
              title: '¡Orden generada!',
              text: 'El cliente puede pasar a caja a pagar con su nombre',
              confirmButtonText: 'OK',
              allowOutsideClick: false
            }).then((result) => {
              
              if (result.isConfirmed) {
                window.location.href = "inicio";
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

          $("#enviarPedido").prop("disabled", false);

        }
        
      })

    }

  })

$("#contenedorBusqueda").on("click","div",function(){

  titulo = $(this).attr("nombre");
  maximo = parseFloat($(this).attr("maximo"));
  minimo = parseFloat($(this).attr("minimo"));
  idActual = $(this).attr("id");

  var datosCobro = new FormData();
    datosCobro.append("valor", idActual);

    $.ajax({

      url:"ajax/traerproducto.ajax.php",
      method:"POST",
      data: datosCobro,
      dataType: "json",
      cache: false,
      contentType: false,
      processData: false,
      success:function(respuesta){

        
          $.each(respuesta, function(id, val){

            switch(id){
              case 'id':
                idActual = val;

                console.log(id);
                console.log(val);

              break;

              case 'nombre':
                titulo = val;

                console.log(id);
                console.log(val);

              break;

              case 'precio':
                precio = val;

                console.log(id);
                console.log(val);

              break;

              case 'minimo':
                minimo = val;

                console.log(id);
                console.log(val);

              break;
              
              default:
              break;
            }

          })

          $("#idModal").val(idActual);
          $("#tituloModal").text(titulo);
          $("#pesoModal").val("");
          $("#precioModal").val(precio);
          $("#minimoModal").val(minimo);

      }
    
    })
  
  if(titulo.includes("ACHIOTE") == true){

    console.log("achiote");

    $("#etiquetaNuevaUnidad").text("Paquetes (Emplayado con 10 cajas)");

  }else if(titulo.includes("MOLE ") == true){

    console.log("mole");

    $("#etiquetaNuevaUnidad").text("Piezas");
    
  }else{

    console.log("otros");

    $("#etiquetaNuevaUnidad").text("Peso en Kg");
  }

  $("#modalProducto").modal('show');

})


function buscar(){



  var buscar = $("#buscarProducto").val();

  if(buscar==""){

    $("#contenedorProductos").show();
    $("#contenedorBusqueda").hide();

  }else{

    $("#contenedorProductos").hide();
    $("#contenedorBusqueda").show();

    var datosCobro = new FormData();
    datosCobro.append("valor", buscar);

    $.ajax({

      url:"ajax/buscar.ajax.php",
      method:"POST",
      data: datosCobro,
      dataType: "json",
      cache: false,
      contentType: false,
      processData: false,
      success:function(respuesta){

        $("#contenedorBusqueda").empty();

        $("#contenedorBusqueda").append('<span class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 50px;"> </span>');

        var i = 0;
        var conCol = 0;

        $.each(respuesta, function(arreglo, valor){

          var thisID;
          var thisNombre;
          var thisPrecio;
          var thisMinimo;
          var thisMaximo;
          var thisImagen;
          var thisCategoria;

          $.each(valor, function(id, val){

            switch(id){
              case 'id':
                thisID = val;
              break;

              case 'nombre':
                thisNombre = val;
              break;

              case 'precio':
                thisPrecio = val;
              break;

              case 'minimo':
                thisMinimo = val;
              break;
              
              case 'maximo':
                thisMaximo = val;
              break;
              
              case 'imagen':
                thisImagen = val;
              break;
              
              case 'categoria':
                thisCategoria = val;
              break;
              
              default:
              break;
            }

          })

          if(thisImagen == ""){

            $("#contenedorBusqueda").append('<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 agregarProducto" id="'+thisID+'" nombre="'+thisNombre+'" precio="'+thisPrecio+'" minimo="'+thisMinimo+'" maximo="'+thisMaximo+'" imagen="'+thisImagen+'" categoria="'+thisCategoria+'" style="cursor: pointer;"><center><img src="vistas/img/plantilla/categoria.png" style="width: 50%" class="img-responsive"><span><h5>$ '+thisPrecio+'</h5></span><span><h5>'+thisNombre+'</h5></span></center></div>');

          }else{

            $("#contenedorBusqueda").append('<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 agregarProducto" id="'+thisID+'" nombre="'+thisNombre+'" precio="'+thisPrecio+'" minimo="'+thisMinimo+'" maximo="'+thisMaximo+'" imagen="'+thisImagen+'" categoria="'+thisCategoria+'" style="cursor: pointer;"><center><img src="vistas/img/plantilla/'+thisImagen+'" style="width: 50%" class="img-responsive"><span><h5>$' +thisPrecio+'</h5></span><span><h5>'+thisNombre+'</h5></span></center></div>');

          }

          conCol++;

          if(conCol == 4){

            $("#contenedorBusqueda").append('<span class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 50px;"> </span>');

            conCol = 0;

          }
          
        });

      }
    
    })

  }

}


function ocultar(event, origen){

  if(origen == "peso" && event.keyCode == 13){

    $("#precioModal").focus();

  }

  if(origen == "precio" && event.keyCode == 13){

    document.activeElement.blur();

  }

  

}


</script>