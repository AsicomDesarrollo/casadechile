<!-- 
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> 
-->
<link href="vistas/plugins/select2/select2.min.css" rel="stylesheet" />
<script src="vistas/plugins/select2/select2.min.js"></script>

<div class="container">
    <div class="row" style="margin-bottom: 20px;">
        <span class="col-xs-4 col-sm-4 col-md-2 col-lg-2"
            style="margin-top: 20px;">
            <a href="?view=index"> <span class="btn btn-danger"
                style="width: 100%; margin-top: 3%; margin-bottom: 3%; padding-top: 15px; padding-bottom: 15px;">
                <i style="font-size:1.2em" class="fas fa-long-arrow-alt-left"></i> Regresar </span>
            </a>
        </span>
    </div>

    <div class="row" style="margin-bottom: 20px;">
        <!-- //selector de nota de venta -->
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"
            style="background-color: #fbf2c7;">
            
    
                <div class="col-6 col-lg-6">
                    <h3 name="folio" id="folio" folio="" style="color: #e06345; margin-top: 30px; margin-bottom: 35px;">Folio: </h3>
                </div>
                <div class="col-6 col-lg-6">
                    <h3 name="folio" id="nota" nota="" style="color: #e06345; margin-top: 30px; margin-bottom: 35px;">Nota de Venta</h3>
                </div>



            <center>
                <div class="form-group" style="width: 80%;"><label>Nombre del cliente</label><br>
                <?php $clientes=Clientes::mostrarTodos();?>
                    <?php
                    echo '<select class="js-example-basic-single form-control" id="nombreCliente" name="nombreCliente" style="width:100%; border-radius: 15px;">';
                    echo '<option value="Venta General">Venta General</option>';

                        foreach ($clientes as $key) {
                            echo '<option value="'.$key['id'].'">'.$key['nombre'].'</option>';
                        }
                    ?>
                </select>
                <br><small class="form-text text-muted">Ingresa un nombre del cliente para registrar el pedido</small>
                </div>

            </center>
            <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                <center>
                    <h5 style="color: #333333; margin-top: 30px; margin-bottom: 35px;"><strong>Acciónes</strong></h5>
                </center>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
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
            <div id="divPedido"></div>
            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10" style="text-align: right;">
                <h5 style="color: #333333; margin-top: 30px; margin-bottom: 35px;"><strong>Total: $</strong></h5>
            </div>
            
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="text-align: left;">
                <center>
                    <h5 style="color: #333333; margin-top: 30px; margin-bottom: 35px;"><strong id="total"></strong></h5>
                </center>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10" style="text-align: left;">
            <button class="btn btn-primary" id="salvarPedido" style="width: 40%; margin-top: 30px; margin-bottom: 30px;"><i class="fas fa-cloud-upload-alt"></i> Guardar</button>
            <button class="btn btn-info" id="enviarPedido" style="width: 40%; margin-top: 30px; margin-bottom: 30px;"><i class="fas fa-hand-holding-usd"></i> Cerrar Venta</button>
            </div>
        </div>


        <!-- //selector de producto -->
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"
            style="background-color: #eee;"><input type="text" class="form-control"
                id="buscarProducto" placeholder="Producto" style="border: none; border-radius: 15px; margin-top: 40px;"
                onkeyup="buscar()">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="contenedorProductos">
                <?php $categorias=Productos::mostrarCategorias();
                foreach ($categorias as $key=>$value){
                    echo '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><center><h3 style="color: #e06345; margin-top: 30px; margin-bottom: 30px;">'.$value["nombre"].'</h3></center></div><br>'; 
                    $productos = Productos::mostrarProductosCategoria($value["id"]);
                    $conCol=0; 
                    foreach ($productos as $key=>$producto){
                        if($producto["imagen"]==""){ 
                            echo '<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 agregarProducto" id="'.$producto["id"].'" nombre="'.$producto["nombre"].'" precio="'.$producto["precio"].'" minimo="'.$producto["minimo"].'" maximo="'.$producto["maximo"].'" imagen="'.$producto["imagen"].'" categoria="'.$producto["categoria"].'" style="cursor: pointer;"><center><img src="vistas/img/plantilla/categoria.png" style="width: 50%" class="img-responsive">';
                        }
                        else{
                             echo '<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 agregarProducto" id="'.$producto["id"].'" nombre="'.$producto["nombre"].'" precio="'.$producto["precio"].'" minimo="'.$producto["minimo"].'" maximo="'.$producto["maximo"].'" imagen="'.$producto["imagen"].'" categoria="'.$producto["categoria"].'" style="cursor: pointer;"><center><img src="vistas/img/plantilla/'.$producto["imagen"].'" style="width: 50%" class="img-responsive">';
                        }
                        echo '<span><h5>$ '.$producto["precio"].'</h5></span><span><h5>'.$producto["nombre"].'</h5></span></center></div>'; $conCol++; 
                        if($conCol==4){ echo '<span class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 50px;"></span>'; $conCol=0;}
                    }
                } ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="contenedorBusqueda"></div>
        </div>


    </div>
</div>

<div id="modalProducto" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background:#fbf2c7; color:white"><button type="button" class="close"
                    data-dismiss="modal">&times;</button>
                <center>
                    <h3 class="modal-title" style="color: #e06345"><strong id="tituloModal"></strong></h3>
                </center>
            </div>
            <center><img src="vistas/img/plantilla/categoria.png"
                    style="width: 25%; margin-top: 40px; margin-bottom: 40px;" class="img-responsive"></center>
            <div style="margin-left: 40px; margin-right: 40px;">
                <div class="form-group" style="display: none;"><label>Id</label><input type="text" class="form-control"
                        id="idModal" placeholder="id"></div>
                <div class="form-group"><label id="etiquetaNuevaUnidad"></label><input type="number"
                        class="form-control" id="pesoModal" placeholder="" onkeyup="ocultar(event, 'peso')"></div>
                <div class="form-group"><label>Precio</label><input type="number" class="form-control" id="precioModal"
                        aria-describedby="emailHelp" placeholder="Ingresa el precio de venta"
                        onkeyup="ocultar(event, 'precio','btnAgregar')"><small class="form-text text-muted">Recuerda que el costo
                        debe estar dentro del máximo y el mínimo establecido</small></div>
                <div class="form-group" style="display: none;"><label>Precio Maximo</label><input type="number"
                        class="form-control" id="maximoModal" placeholder="Precio máximo establecido" disabled><small
                        class="form-text text-muted">Precio máximo establecido para este producto</small></div>
                <div class="form-group"><label><small class="form-text text-muted">Precio mínimo establecido para este producto</small></label><input type="numer" class="form-control"
                        id="minimoModal" placeholder="Precio mínimo de venta" disabled style="background: transparent;border: none;font-size: 2em;">
                        
                </div>
                <span
                    class="btn btn-success btnAgregar" id="btnAgregarFocus"
                    style="width: 100%; margin-top: 2px; margin-bottom: 20px;font-size: 2em;">Agregar al pedido</span>
            </div>
            <div class="modal-footer"><button type="button" class="btn btn-danger pull-left"
                    data-dismiss="modal">Salir</button></div>
        </div>
    </div>
</div>

<div id="modalPromo" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background:#fbf2c7; color:white"><button type="button" class="close"
                    data-dismiss="modal">&times;</button>
                <center>
                    <h3 class="modal-title" style="color: #e06345">Promo: <strong id="tituloModalp"></strong></h3>
                </center>
            </div>
            <center><img src="vistas/img/plantilla/categoria.png"
                    style="width: 25%; margin-top: 40px; margin-bottom: 40px;" class="img-responsive"></center>
            <div style="margin-left: 40px; margin-right: 40px;">
                <div class="form-group" style="display: none;"><label>Id</label>
                    <input type="text" class="form-control" id="idModalp" placeholder="id">
                </div>

                <div class="form-inline">
                    <div class="form-group">
                        <label id="etiquetaEditarUnidad">Peso en Kg</label>
                        <input style="border:none;background:transparent;" type="number" class="form-control" id="pesoModalp" placeholder="" onkeyup="ocultar(event, 'peso')" disabled>
                    </div>

                    <div class="form-group">
                        <label>Por cada KG Descontar $</label>
                        <input type="number" class="form-control" id="precioModalp" style="width: 120px;"
                        aria-describedby="emailHelp" placeholder="Ingresa el precio de venta"
                        onkeyup="ocultar(event, 'precio','btnAgregarDescuento')">
                    </div>
                </div>

                <div class="form-group" style="display: none;"><label>Precio Maximo</label><input type="number"
                        class="form-control" id="maximoModalp" placeholder="Precio máximo establecido" disabled><small
                        class="form-text text-muted">Precio máximo establecido para este producto</small>
                </div>

                <div class="form-group"><label><small class="form-text text-muted">
                    Precio mínimo establecido para este producto
                </small></label>
                <input type="numer" class="form-control" id="minimoModalp"
                        placeholder="Precio mínimo de venta" disabled
                        style="background: transparent;border: none;font-size: 2em;">
                </div>

                <span
                    class="btn btn-warning btnAgregarDescuento" id="btnAgregarDescuento"
                    style="width: 100%; margin-top: 2px; margin-bottom: 20px;font-size: 2em;">Descontar</span>
            </div>
            <div class="modal-footer"><button type="button" class="btn btn-danger pull-left"
                    data-dismiss="modal">Salir</button></div>
        </div>
    </div>
</div>


<div id="modalEditar" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background:#fbf2c7; color:white"><button type="button" class="close"
                    data-dismiss="modal">&times;</button>
                <center>
                    <h3 class="modal-title" style="color: #e06345"><strong id="tituloEditar"></strong></h3>
                </center>
            </div>
            <center><img src="vistas/img/plantilla/categoria.png"
                    style="width: 25%; margin-top: 40px; margin-bottom: 40px;" class="img-responsive"></center>
            <div style="margin-left: 40px; margin-right: 40px;">
                <div class="form-group" style="display: none;"><label>Id</label><input type="text" class="form-control"
                        id="idEditar" placeholder="id"></div>
                <div class="form-group"><label id="etiquetaEditarUnidad">Peso en Kg</label><input type="number"
                        class="form-control" id="pesoEditar" placeholder=""></div>
                <div class="form-group"><label>Precio</label><input type="number" class="form-control" id="precioEditar"
                        aria-describedby="emailHelp" placeholder="Ingresa el precio de venta"><small
                        class="form-text text-muted">Recuerda que el costo debe estar dentro del máximo y el mínimo
                        establecido</small></div>
                <div class="form-group" style="display: none;"><label>Precio Maximo</label><input type="number"
                        class="form-control" id="maximoEditar" placeholder="Precio máximo establecido" disabled><small
                        class="form-text text-muted">Precio máximo establecido para este producto</small></div>
                <div class="form-group"><label>Precio Mínimo</label><input type="numer" class="form-control"
                        id="minimoEditar" placeholder="Precio mínimo de venta" disabled><small
                        class="form-text text-muted">Precio mínimo establecido para este producto</small></div><span
                    class="btn btn-info btnModificar"
                    style="width: 100%; margin-top: 40px; margin-bottom: 40px;">Guardar</span>
            </div>
            <div class="modal-footer"><button type="button" class="btn btn-default pull-left"
                    data-dismiss="modal">Salir</button></div>
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
var listaPedido = [];

$(".agregarProducto").click(function() {
    titulo = $(this).attr("nombre");
    maximo = parseFloat($(this).attr("maximo"));
    minimo = parseFloat($(this).attr("minimo"));
    idActual = $(this).attr("id");
    var datosCobro = new FormData();
    datosCobro.append("valor", idActual);
    $.ajax({
        url: "./?action=traerproducto",
        method: "POST",
        data: datosCobro,
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            $.each(respuesta, function(id, val) {
                switch (id) {
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
            }); 
            $("#idModal").val(idActual);
            $("#tituloModal").text(titulo);
            $("#pesoModal").val("");
            $("#precioModal").val(minimo);
            $("#minimoModal").val(minimo);
        }
    }); 
    if(titulo.includes("ACHIOTE") == true) {
        console.log("achiote");
        $("#etiquetaNuevaUnidad").text("Paquetes (Emplayado con 10 cajas)");
    } else if (titulo.includes("MOLE ") == true) {
        console.log("mole");
        $("#etiquetaNuevaUnidad").text("Piezas");
    } else {
        console.log("otros");
        $("#etiquetaNuevaUnidad").text("Peso en Kg");
    }
    $("#modalProducto").modal('show');
    setTimeout(() => {
        $('#pesoModal').focus();
    }, 150);
}); 
$("#divPedido").on("click", ".editarProducto", function() {
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
    if (titulo.includes("ACHIOTE") == true) {
        console.log("achiote");
        $("#etiquetaEditarUnidad").text("Paquetes (Emplayado con 10 cajas)");
    } else if (titulo.includes("MOLE ") == true) {
        console.log("mole");
        $("#etiquetaEditarUnidad").text("Piezas");
    } else {
        console.log("otros");
        $("#etiquetaEditarUnidad").text("Peso en Kg");
    }
    $("#modalEditar").modal('show')
}); 
$(".btnModificar").click(function() {
    peso = parseFloat($("#pesoEditar").val());
    precio = parseFloat($("#precioEditar").val());
    maximo = parseFloat($("#maximoEditar").val());
    minimo = parseFloat($("#minimoEditar").val());
    idActual = $("#idEditar").val();
    console.log(peso);
    console.log(precio);
    console.log(idActual);
    subtotal = peso * precio;
    if (peso == "" || peso == 0) {
        Swal.fire({
            icon: 'error',
            title: 'Peso incorrecto',
            text: 'Debes ingresar un peso',
            confirmButtonText: 'OK',
            footer: 'Sentimos las molestias'
        })
    } else if (precio < minimo || precio > maximo) {
        Swal.fire({
            icon: 'error',
            title: 'Costo incorrecto',
            text: 'Por favor ingresa un costo correcto',
            confirmButtonText: 'OK',
            footer: 'Sentimos las molestias'
        })
    } else {
        var idProducto = $(".cuerpoPedido span");
        var titulosProducto = $(".cuerpoPedido .titulo");
        var preciosProducto = $(".cuerpoPedido .precio");
        var pesosProducto = $(".cuerpoPedido .peso");
        var subsProducto = $(".cuerpoPedido .subtotal");
        listaPedido = [];
        $("#divPedido").empty();
        if (idProducto.length != 0) {
            total = 0;
            for (var i = 0; i < idProducto.length; i++) {
                var idArray = $(idProducto[i]).attr("idProducto");
                var maximoArray = $(idProducto[i]).attr("maximo");
                var minimoArray = $(idProducto[i]).attr("minimo");
                var tituloArray = $(titulosProducto[i]).html();
                var precioArray = $(preciosProducto[i]).html();
                var pesoArray = $(pesosProducto[i]).html();
                var subArray = $(subsProducto[i]).html();
                if (idArray == idActual) {
                    subtotal = precio * peso;
                    listaPedido.push({
                        "id": idArray,
                        "titulo": tituloArray,
                        "precio": precio,
                        "maximo": maximo,
                        "minimo": minimo,
                        "peso": peso,
                        "subtotal": subtotal
                    });
                    $("#divPedido").append(
                        "<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 cuerpoPedido'><span class='col-xs-1 col-sm-1 col-md-1 col-lg-1 btn btn-danger borrar' idProducto=" +
                        idArray + " maximo=" + maximo + " minimo=" + minimo +
                        " style='background-color: #df6852; color: #ffffff; border-radius: 100%; padding-left: 0px; padding-right: 0px; margin-top: 5px;'><i class='fa fa-trash'></i></span><div class='col-xs-4 col-sm-4 col-md-4 col-lg-4'><h5 style='color: #333333; margin-top: 15px;' class='titulo'>" +
                        tituloArray +
                        "</h5></div><div class='col-xs-1 col-sm-1 col-md-1 col-lg-1'><button class='btn btn-default editarProducto' nombre='" +
                        tituloArray + "' peso='" + peso + "' precio='" + precio + "' maximo='" + maximo +
                        "' minimo='" + minimo + "' id='" + idArray +
                        "' style='background-color: #51bbff; color: #ffffff; border-radius: 100%; padding-left: 10px; padding-right: 10px; margin-top: 5px;'><i class='fa fa-pencil'></i></button></div><div class='col-xs-2 col-sm-2 col-md-2 col-lg-2'><center><h5 style='color: #333333; margin-top: 15px;' class='precio'>" +
                        precio +
                        "</h5></center></div><div class='col-xs-2 col-sm-2 col-md-2 col-lg-2'><center><h5 style='color: #333333; margin-top: 15px;' class='peso'>" +
                        peso +
                        "</h5></center></div><div class='col-xs-2 col-sm-2 col-md-2 col-lg-2'><center><h5 style='color: #333333; margin-top: 15px;' class='subtotal'>" +
                        subtotal + "</h5></center></div></div>");
                } else {
                    listaPedido.push({
                        "id": idArray,
                        "titulo": tituloArray,
                        "precio": precioArray,
                        "maximo": maximoArray,
                        "minimo": minimoArray,
                        "peso": pesoArray,
                        "subtotal": subArray
                    });
                    subtotal = precioArray * pesoArray;
                    $("#divPedido").append(
                        "<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 cuerpoPedido'><span class='col-xs-1 col-sm-1 col-md-1 col-lg-1 btn btn-danger borrar' idProducto=" +
                        idArray + " maximo=" + maximoArray + " minimo=" + minimoArray +
                        " style='background-color: #df6852; color: #ffffff; border-radius: 100%; padding-left: 0px; padding-right: 0px; margin-top: 5px;'><i class='fa fa-trash'></i></span><div class='col-xs-4 col-sm-4 col-md-4 col-lg-4'><h5 style='color: #333333; margin-top: 15px;' class='titulo'>" +
                        tituloArray +
                        "</h5></div><div class='col-xs-1 col-sm-1 col-md-1 col-lg-1'><button class='btn btn-default editarProducto' nombre='" +
                        tituloArray + "' peso='" + pesoArray + "' precio='" + precioArray + "' maximo='" +
                        maximoArray + "' minimo='" + minimoArray + "' id='" + idArray +
                        "' style='background-color: #51bbff; color: #ffffff; border-radius: 100%; padding-left: 10px; padding-right: 10px; margin-top: 5px;'><i class='fa fa-pencil'></i></button></div><div class='col-xs-2 col-sm-2 col-md-2 col-lg-2'><center><h5 style='color: #333333; margin-top: 15px;' class='precio'>" +
                        precioArray +
                        "</h5></center></div><div class='col-xs-2 col-sm-2 col-md-2 col-lg-2'><center><h5 style='color: #333333; margin-top: 15px;' class='peso'>" +
                        pesoArray +
                        "</h5></center></div><div class='col-xs-2 col-sm-2 col-md-2 col-lg-2'><center><h5 style='color: #333333; margin-top: 15px;' class='subtotal'>" +
                        subArray + "</h5></center></div></div>");
                }
                total += subtotal;
            }
            $("#total").text(total);
            json = JSON.stringify(listaPedido);
            console.log(json);
            $("#modalEditar").modal('hide');
        }
    }
}); 

//editar PROMOCION
$("#divPedido").on("click", ".promo", function() {
    titulo = $(this).attr("nombre");
    peso = $(this).attr("peso");
    precio = parseFloat($(this).attr("precio"));
    maximo = parseFloat($(this).attr("maximo"));
    minimo = parseFloat($(this).attr("minimo"));
    idActual = $(this).attr("id");
    $("#idModalp").val(idActual);
    $("#tituloModalp").text(titulo);
    $("#pesoModalp").val(peso);
    pesoModalp
    $("#maximoModalp").val(maximo);
    $("#precioModalp").val($(this).attr("precio")*0.10); // 10 % sobre el costo del productow2
    $("#minimoModalp").val(minimo);
    console.log(titulo);
    if (titulo.includes("ACHIOTE") == true) {
        console.log("achiote");
        $("#etiquetaModalUnidad").text("Paquetes (Emplayado con 10 cajas)");
    } else if (titulo.includes("MOLE ") == true) {
        console.log("mole");
        $("#etiquetaModalUnidad").text("Piezas");
    } else {
        console.log("otros");
        $("#etiquetaModalUnidad").text("Peso en Kg");
    }
    $("#modalPromo").modal('show');
    setTimeout(() => {
        $('#precioModalp').focus();
        $('#precioModalp').select();
    }, 150);
}); 
//no se usa, en cambio usamos  btnAgregarDescuento
$(".btnModificarPromo").click(function() {
    peso = parseFloat($("#pesoEditar").val());
    precio = parseFloat($("#precioEditar").val());
    maximo = parseFloat($("#maximoEditar").val());
    minimo = parseFloat($("#minimoEditar").val());
    idActual = $("#idEditar").val();
    console.log(peso);
    console.log(precio);
    console.log(idActual);
    subtotal = peso * precio;
    if (peso == "" || peso == 0) {
        Swal.fire({
            icon: 'error',
            title: 'Peso incorrecto',
            text: 'Debes ingresar un peso',
            confirmButtonText: 'OK',
            footer: 'Sentimos las molestias'
        })
    } else if (precio < minimo || precio > maximo) {
        Swal.fire({
            icon: 'error',
            title: 'Costo incorrecto',
            text: 'Por favor ingresa un costo correcto',
            confirmButtonText: 'OK',
            footer: 'Sentimos las molestias'
        })
    } else {
        var idProducto = $(".cuerpoPedido span");
        var titulosProducto = $(".cuerpoPedido .titulo");
        var preciosProducto = $(".cuerpoPedido .precio");
        var pesosProducto = $(".cuerpoPedido .peso");
        var subsProducto = $(".cuerpoPedido .subtotal");
        listaPedido = [];
        $("#divPedido").empty();
        if (idProducto.length != 0) {
            total = 0;
            for (var i = 0; i < idProducto.length; i++) {
                var idArray = $(idProducto[i]).attr("idProducto");
                var maximoArray = $(idProducto[i]).attr("maximo");
                var minimoArray = $(idProducto[i]).attr("minimo");
                var tituloArray = $(titulosProducto[i]).html();
                var precioArray = $(preciosProducto[i]).html();
                var pesoArray = $(pesosProducto[i]).html();
                var subArray = $(subsProducto[i]).html();
                if (idArray == idActual) {
                    subtotal = precio * peso;
                    listaPedido.push({
                        "id": idArray,
                        "titulo": tituloArray,
                        "precio": precio,
                        "maximo": maximo,
                        "minimo": minimo,
                        "peso": peso,
                        "subtotal": subtotal
                    });
                    $("#divPedido").append(
                        "<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 cuerpoPedido'><span class='col-xs-1 col-sm-1 col-md-1 col-lg-1 btn btn-danger borrar' idProducto=" +
                        idArray + " maximo=" + maximo + " minimo=" + minimo +
                        " style='background-color: #df6852; color: #ffffff; border-radius: 100%; padding-left: 0px; padding-right: 0px; margin-top: 5px;'><i class='fa fa-trash'></i></span><div class='col-xs-4 col-sm-4 col-md-4 col-lg-4'><h5 style='color: #333333; margin-top: 15px;' class='titulo'>" +
                        tituloArray +
                        "</h5></div><div class='col-xs-1 col-sm-1 col-md-1 col-lg-1'><button class='btn btn-default editarProducto' nombre='" +
                        tituloArray + "' peso='" + peso + "' precio='" + precio + "' maximo='" + maximo +
                        "' minimo='" + minimo + "' id='" + idArray +
                        "' style='background-color: #51bbff; color: #ffffff; border-radius: 100%; padding-left: 10px; padding-right: 10px; margin-top: 5px;'><i class='fa fa-pencil'></i></button></div><div class='col-xs-2 col-sm-2 col-md-2 col-lg-2'><center><h5 style='color: #333333; margin-top: 15px;' class='precio'>" +
                        precio +
                        "</h5></center></div><div class='col-xs-2 col-sm-2 col-md-2 col-lg-2'><center><h5 style='color: #333333; margin-top: 15px;' class='peso'>" +
                        peso +
                        "</h5></center></div><div class='col-xs-2 col-sm-2 col-md-2 col-lg-2'><center><h5 style='color: #333333; margin-top: 15px;' class='subtotal'>" +
                        subtotal + "</h5></center></div></div>");
                } else {
                    listaPedido.push({
                        "id": idArray,
                        "titulo": tituloArray,
                        "precio": precioArray,
                        "maximo": maximoArray,
                        "minimo": minimoArray,
                        "peso": pesoArray,
                        "subtotal": subArray
                    });
                    subtotal = precioArray * pesoArray;
                    $("#divPedido").append(
                        "<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 cuerpoPedido'><span class='col-xs-1 col-sm-1 col-md-1 col-lg-1 btn btn-danger borrar' idProducto=" +
                        idArray + " maximo=" + maximoArray + " minimo=" + minimoArray +
                        " style='background-color: #df6852; color: #ffffff; border-radius: 100%; padding-left: 0px; padding-right: 0px; margin-top: 5px;'><i class='fa fa-trash'></i></span><div class='col-xs-4 col-sm-4 col-md-4 col-lg-4'><h5 style='color: #333333; margin-top: 15px;' class='titulo'>" +
                        tituloArray +
                        "</h5></div><div class='col-xs-1 col-sm-1 col-md-1 col-lg-1'><button class='btn btn-default editarProducto' nombre='" +
                        tituloArray + "' peso='" + pesoArray + "' precio='" + precioArray + "' maximo='" +
                        maximoArray + "' minimo='" + minimoArray + "' id='" + idArray +
                        "' style='background-color: #51bbff; color: #ffffff; border-radius: 100%; padding-left: 10px; padding-right: 10px; margin-top: 5px;'><i class='fa fa-pencil'></i></button></div><div class='col-xs-2 col-sm-2 col-md-2 col-lg-2'><center><h5 style='color: #333333; margin-top: 15px;' class='precio'>" +
                        precioArray +
                        "</h5></center></div><div class='col-xs-2 col-sm-2 col-md-2 col-lg-2'><center><h5 style='color: #333333; margin-top: 15px;' class='peso'>" +
                        pesoArray +
                        "</h5></center></div><div class='col-xs-2 col-sm-2 col-md-2 col-lg-2'><center><h5 style='color: #333333; margin-top: 15px;' class='subtotal'>" +
                        subArray + "</h5></center></div></div>");
                }
                total += subtotal;
            }
            $("#total").text(total);
            json = JSON.stringify(listaPedido);
            console.log(json);
            $("#modalPromo").modal('hide');
        }
    }
}); 

// btnAgregarDescuento
//** */
$(".btnAgregarDescuento").click(function() { //a gregar producto al pedido
    peso = $("#pesoModalp").val();
    if($("#precioModalp").val()=='') {precio = 0;}
    else{
        precio = parseFloat($("#precioModalp").val());
    }

    idActual = $("#idModal").val();
    subtotal = peso * -precio;
    if (peso == "" || peso == 0) {
        Swal.fire({
            icon: 'error',
            title: 'Peso incorrecto',
            text: 'Debes ingresar un peso',
            confirmButtonText: 'OK',
            footer: 'Sentimos las molestias'
        })
    } else if (precio==0 || precio=='') { //! ninguna validación para precio mínimo
        Swal.fire({
            icon: 'error',
            title: 'Precio incorrecto',
            text: 'Por favor ingresa un costo correcto',
            confirmButtonText: 'OK',
            footer: 'Sentimos las molestias'
        })
    } else {
        listaPedido.push({
            "id": idActual,
            "titulo": "DESCUENTO:"+titulo,
            "precio": -precio,
            "maximo": maximo,
            "minimo": minimo,
            "peso": peso,
            "subtotal": subtotal
        });
        json = JSON.stringify(listaPedido);
        console.log(json);
        $("#divPedido").append(
            "<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 cuerpoPedido' style='padding:0px !important'>"+
            
            //eliminar promo
            "<span class='col-xs-1 col-sm-1 col-md-1 col-lg-1 btn btn-danger borrar' idProducto=" +
            idActual + " maximo=" + maximo + " minimo=" + minimo +
            " style='border-radius: 4px; padding-left: 10px; padding-right: 10px; margin-top: 5px;>"+
            "<button class='btn btn-danger borrar' idProducto=" +
            idActual + " maximo=" + maximo + " minimo=" + minimo +
            "' style='border-radius: 4px; padding-left: 10px; padding-right: 10px; margin-top: 5px;'><i class='fas fa-trash'></i></button>"+
            "</span>"+
            
            //editar promo
            "<div class='col-xs-1 col-sm-1 col-md-1 col-lg-1 pl-1 pr-0'><button class='btn btn-warning editarPromo' nombre='" +
            titulo + "' peso='" + peso + "' precio='" + precio + "' maximo='" + maximo + "' minimo='" +
            minimo + "' id='" + idActual +
            "' style=' padding-left: 5px; padding-right: 3px; margin-top: 5px;'><i class='fas fa-pen'></i> <i class='fas fa-tag'></i></button></div>"+

            //titlo promo
            "<div class='col-xs-4 col-sm-4 col-md-4 col-lg-4'><h5 style='padding-left: 5px; color: #333333; margin-top: 15px;' class='titulo'>" +
            "<b>DESCUENTO:</b>"+titulo +
            "</h5></div>"+


            //costo etc etc
            "<div class='col-xs-2 col-sm-2 col-md-2 col-lg-2'><center><h5 style='color: #333333; margin-top: 15px;' class='precio'>" +
            -precio + "/kg"+
            "</h5></center></div><div class='col-xs-2 col-sm-2 col-md-2 col-lg-2'><center><h5 style='color: #333333; margin-top: 15px;' class='peso'>" +
            peso +
            "</h5></center></div><div class='col-xs-2 col-sm-2 col-md-2 col-lg-2'><center><h5 style='color: #333333; margin-top: 15px;' class='subtotal'>" +
            subtotal + "</h5></center></div></div>");
        total += subtotal;
        $("#total").text(total);
        $("#modalPromo").modal('hide');
        $("#buscarProducto").val("");
        $("#contenedorProductos").show();
        $("#contenedorBusqueda").hide();
    }
}); 



/**
 * @Param click :: es el boton que agrega el producto del modal al list product del pedido / nota de venta
 * 
 */
$(".btnAgregar").click(function() { //a gregar producto al pedido
    peso = $("#pesoModal").val();
    if($("#precioModal").val()=='') {precio = 0;}
    else{
        precio = parseFloat($("#precioModal").val());
    }

    idActual = $("#idModal").val();
    subtotal = peso * precio;
    if (peso == "" || peso == 0) {
        Swal.fire({
            icon: 'error',
            title: 'Peso incorrecto',
            text: 'Debes ingresar un peso',
            confirmButtonText: 'OK',
            footer: 'Sentimos las molestias'
        })
    } else if (precio==0 || precio=='' || precio < minimo) {
        Swal.fire({
            icon: 'error',
            title: 'Precio incorrecto',
            text: 'Por favor ingresa un costo correcto',
            confirmButtonText: 'OK',
            footer: 'Sentimos las molestias'
        })
    } else {
        listaPedido.push({
            "id": idActual,
            "titulo": titulo,
            "precio": precio,
            "maximo": maximo,
            "minimo": minimo,
            "peso": peso,
            "subtotal": subtotal
        });
        json = JSON.stringify(listaPedido);
        console.log(json);
        $("#divPedido").append(
            "<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 cuerpoPedido' style='padding:0px !important'>"+
            
            
            "<span class='col-xs-1 col-sm-1 col-md-1 col-lg-1 btn btn-danger borrar' idProducto=" +
            idActual + " maximo=" + maximo + " minimo=" + minimo +
            " style='border-radius: 4px; padding-left: 10px; padding-right: 10px; margin-top: 5px;>"+
            "<button class='btn btn-danger borrar' idProducto=" +
            idActual + " maximo=" + maximo + " minimo=" + minimo +
            "' style='border-radius: 4px; padding-left: 10px; padding-right: 10px; margin-top: 5px;'><i class='fas fa-trash'></i></button>"+
            "</span>"+

           /*  <div class='col-xs-4 col-sm-4 col-md-4 col-lg-4'><h5 style='color: #333333; margin-top: 15px;' class='titulo'>" +
            titulo +
            "</h5></div>"+ */

            /* "<div class='col-xs-1 col-sm-1 col-md-1 col-lg-1' pl-0><button class='btn btn-danger borrar' idProducto=" +
            idActual + " maximo=" + maximo + " minimo=" + minimo +
            "' style='border-radius: 4px; padding-left: 10px; padding-right: 10px; margin-top: 5px;'><i class='fas fa-trash'></i></button></div>"+ */


            "<div class='col-xs-1 col-sm-1 col-md-1 col-lg-1' pl-0><button class='btn btn-warning promo' nombre='" +
            titulo + "' peso='" + peso + "' precio='" + precio + "' maximo='" + maximo + "' minimo='" +
            minimo + "' id='" + idActual +
            "' style=' border-radius: 100%; padding-left: 10px; padding-right: 10px; margin-top: 5px;'><i class='fas fa-tag'></i></button></div>"+

            "<div class='col-xs-1 col-sm-1 col-md-1 col-lg-1' pl-0><button class='btn btn-info editarProducto' nombre='" +
            titulo + "' peso='" + peso + "' precio='" + precio + "' maximo='" + maximo + "' minimo='" +
            minimo + "' id='" + idActual +
            "' style='border-radius: 100%; padding-left: 10px; padding-right: 10px; margin-top: 5px;'><i class='fas fa-pen'></i></button></div>"+

            "<div class='col-xs-3 col-sm-3 col-md-3 col-lg-3'><h5 style='color: #333333; margin-top: 15px;' class='titulo'>" +
            titulo +
            "</h5></div>"+


            "<div class='col-xs-2 col-sm-2 col-md-2 col-lg-2'><center><h5 style='color: #333333; margin-top: 15px;' class='precio'>" +
            precio +
            "</h5></center></div><div class='col-xs-2 col-sm-2 col-md-2 col-lg-2'><center><h5 style='color: #333333; margin-top: 15px;' class='peso'>" +
            peso +
            "</h5></center></div><div class='col-xs-2 col-sm-2 col-md-2 col-lg-2'><center><h5 style='color: #333333; margin-top: 15px;' class='subtotal'>" +
            subtotal + "</h5></center></div></div>");
        total += subtotal;
        $("#total").text(total);
        $("#modalProducto").modal('hide');
        $("#buscarProducto").val("");
        $("#contenedorProductos").show();
        $("#contenedorBusqueda").hide();
    }
}); 
$("#divPedido").on("click", ".borrar", function() {
    $(this).parent().remove();
    var idProducto = $(".cuerpoPedido span");
    var titulosProducto = $(".cuerpoPedido .titulo");
    var preciosProducto = $(".cuerpoPedido .precio");
    var pesosProducto = $(".cuerpoPedido .peso");
    var subsProducto = $(".cuerpoPedido .subtotal");
    listaPedido = [];
    if (idProducto.length != 0) {
        total = 0;
        for (var i = 0; i < idProducto.length; i++) {
            var idArray = $(idProducto[i]).attr("idProducto");
            var tituloArray = $(titulosProducto[i]).html();
            var precioArray = $(preciosProducto[i]).html();
            var pesoArray = $(pesosProducto[i]).html();
            var subArray = $(subsProducto[i]).html();
            listaPedido.push({
                "id": idArray,
                "titulo": tituloArray,
                "precio": precioArray,
                "peso": pesoArray,
                "subtotal": subArray
            });
            subtotal = precioArray * pesoArray;
            total += subtotal;
        }
        $("#total").text(total);
        json = JSON.stringify(listaPedido);
        console.log(json);
    } else {
        listaPedido = [];
        total = 0;
        $("#total").text(total);
    }
}); 


//boton Guardar/cerrar venta
$("#salvarPedido").click(function() {
    // var nombreCliente = $("#nombreCliente").val();
    var nombreCliente = $("#nombreCliente option:selected").val(); //IDcliente
    if (nombreCliente == "") {
        Swal.fire({
            icon: 'error',
            title: 'Nombre incorrecto',
            text: 'Debes ingresar un nombre a la orden',
            confirmButtonText: 'OK',
            footer: 'Sentimos las molestias'
        })
    } else if (total == 0) {
        Swal.fire({
            icon: 'error',
            title: 'Upsss',
            text: 'Debes agregar al menos 1 producto a la orden',
            confirmButtonText: 'OK',
            footer: 'Sentimos las molestias'
        })
    } else {
        $("#salvarPedido").prop("disabled", true);
        var datosCobro = new FormData();
        datosCobro.append("json", json);
        datosCobro.append("cliente", nombreCliente);
        if ($("#folio").attr("folio")){
            datosCobro.append("folio", $("#folio").attr("folio"));
            datosCobro.append("nota", $("#nota").attr("nota"));
        }
        $.ajax({
            url: "./?action=guardarPedido",//?i=0
            method: "POST",
            data: datosCobro,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {
                console.log(respuesta); 
                if (respuesta) {
                    Swal.fire({
                        icon: 'success',
                        title: '¡Orden generada!',
                        text: 'El cliente puede pasar a caja a pagar con su nombre o puedes seguir editando.',
                        confirmButtonText: 'OK',
                        allowOutsideClick: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            respuesta= JSON.parse(respuesta);
                            console.log(respuesta);
                            $("#folio").text("Folio: "+respuesta.folio);
                            $("#folio").attr("folio",respuesta.folio);
                            $("#nota").text("Nota de Venta: "+respuesta.nota);
                            $("#nota").attr("nota",respuesta.nota);
                            //window.location.href = "inicio";
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
                } $("#salvarPedido").prop("disabled", false);
            }
        })
    }
}); 



//boton enviar //viejo ya no se usa
$("#enviarPedido").click(function() {
    var nombreCliente = $("#nombreCliente").val();
    if (nombreCliente == "") {
        Swal.fire({
            icon: 'error',
            title: 'Nombre incorrecto',
            text: 'Debes ingresar un nombre a la orden',
            confirmButtonText: 'OK',
            footer: 'Sentimos las molestias'
        })
    } else if (total == 0) {
        Swal.fire({
            icon: 'error',
            title: 'Upsss',
            text: 'Debes agregar al menos 1 producto a la orden',
            confirmButtonText: 'OK',
            footer: 'Sentimos las molestias'
        })
    } else {
        $("#enviarPedido").prop("disabled", true);
        var datosCobro = new FormData();
        datosCobro.append("json", json);
        datosCobro.append("cliente", nombreCliente);
        $.ajax({
            url: "ajax/nuevo.ajax.php?i=0",
            method: "POST",
            data: datosCobro,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {
                console.log(respuesta); 
 if (respuesta == "ok" || respuesta == "") {
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
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ha ocurrido un error',
                        text: 'Por favor intentalo nuevamente',
                        confirmButtonText: 'OK',
                        footer: 'Sentimos las molestias'
                    })
                } $("#enviarPedido").prop("disabled", false);
            }
        })
    }
}); 

$("#contenedorBusqueda").on("click", "div", function() {
    titulo = $(this).attr("nombre");
    maximo = parseFloat($(this).attr("maximo"));
    minimo = parseFloat($(this).attr("minimo"));
    idActual = $(this).attr("id");
    var datosCobro = new FormData();
    datosCobro.append("valor", idActual);
    $.ajax({
        url: "./?action=traerproducto",
        method: "POST",
        data: datosCobro,
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            $.each(respuesta, function(id, val) {
                switch (id) {
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
            }); 
$("#idModal").val(idActual);
            $("#tituloModal").text(titulo);
            $("#pesoModal").val("");
            $("#precioModal").val(precio);
            $("#minimoModal").val(minimo);
        }
    }); 
if (titulo.includes("ACHIOTE") == true) {
        console.log("achiote");
        $("#etiquetaNuevaUnidad").text("Paquetes (Emplayado con 10 cajas)");
    } else if (titulo.includes("MOLE ") == true) {
        console.log("mole");
        $("#etiquetaNuevaUnidad").text("Piezas");
    } else {
        console.log("otros");
        $("#etiquetaNuevaUnidad").text("Peso en Kg");
    }
    $("#modalProducto").modal('show')
})
var bus = [];
function buscar() {
    var buscar = $("#buscarProducto").val();
    if (buscar == "") {
        $("#contenedorProductos").show();
        $("#contenedorBusqueda").hide();
    } else {
        $("#contenedorProductos").hide();
        $("#contenedorBusqueda").show();
        var datosCobro = new FormData();
        datosCobro.append("valor", buscar);
        $.ajax({
            url: "./?action=buscar_producto",
            method: "POST",
            data: datosCobro,
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {
                $("#contenedorBusqueda").empty();
                $("#contenedorBusqueda").append(
                    '<span class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 50px;"></span>'
                    );
                var i = 0;
                var conCol = 0;
                
                $.each(respuesta, function(arreglo, valor) {
                    var thisID;
                    var thisNombre;
                    var thisPrecio;
                    var thisMinimo;
                    var thisMaximo;
                    var thisImagen;
                    var thisCategoria;
                    $.each(valor, function(id, val) {
                        switch (id) {
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
                    }); 
    if (thisImagen == "") {
                        $("#contenedorBusqueda").append(
                            '<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 agregarProducto" id="' +
                            thisID + '" nombre="' + thisNombre + '" precio="' + thisPrecio +
                            '" minimo="' + thisMinimo + '" maximo="' + thisMaximo +
                            '" imagen="' + thisImagen + '" categoria="' + thisCategoria +
                            '" style="cursor: pointer;"><center><img src="vistas/img/plantilla/categoria.png" style="width: 50%" class="img-responsive"><span><h5>$ ' +
                            thisPrecio + '</h5></span><span><h5>' + thisNombre +
                            '</h5></span></center></div>');
                    } else {
                        $("#contenedorBusqueda").append(
                            '<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 agregarProducto" id="' +
                            thisID + '" nombre="' + thisNombre + '" precio="' + thisPrecio +
                            '" minimo="' + thisMinimo + '" maximo="' + thisMaximo +
                            '" imagen="' + thisImagen + '" categoria="' + thisCategoria +
                            '" style="cursor: pointer;"><center><img src="vistas/img/plantilla/' +
                            thisImagen +
                            '" style="width: 50%" class="img-responsive"><span><h5>$' +
                            thisPrecio + '</h5></span><span><h5>' + thisNombre +
                            '</h5></span></center></div>');
                    } conCol++;
                    if (conCol == 4) {
                        $("#contenedorBusqueda").append(
                            '<span class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 50px;"></span>'
                            );
                        conCol = 0;
                    }
                });
            }
        })
    }
}

function ocultar(event, origen,btnFin='no') {
    if (origen == "peso" && event.keyCode == 13) {
        $("#precioModal").focus();
    }
    if (origen == "precio" && event.keyCode == 13) {
        //document.activeElement.blur();
        $("."+btnFin+"").click();
    }
}

</script>

<?php
if(isset($_REQUEST['folio'])){
   //si existe el folio y debe traer datos.
   $venta = Productos::todalaVenta($_REQUEST['folio']);
foreach ($venta as $key => $value) {
    $venta[$key]['pesostring'] = $value['peso'];
}
// core::preprint($venta,'venta con pesostring');

   $venta= json_encode($venta);
   echo "<script> var ventaJson = '".$venta."'; </script>";

//    core::preprint($venta,'venta en encode');
   //correr todo para rellenar el tiket //!urgente
   //para borrar debes cambiar estatus a todos los productos de el timestamp y ponerlos inactivos, luego
   // correr el foreach de los productos en el json desde js y cambiar estatus a abierto.
   //asi se eliminan los prodyctos borrados desde el interfaz, sin borrarlos de la BD y queda antecedente.
   ///?hacer que guarde el producto y cambios con la tecla enter
?>
<script>
    //ventaJson = productos desde la BD
    var listaPedido = [];
    

    function rellenarPedido(ele) { //a gregar producto al pedido
    ele.titulo = ele.title;
    var idActual = ele.idActual;
    var titulo = ele.titulo;
    var precio = ele.precio;
    var maximo = ele.maximo;
    var minimo = ele.minimo;
    var peso = ele.peso;
    subtotal = peso * precio;
    
        listaPedido.push({
            "id": ele.idActual,
            "titulo": ele.titulo,
            "precio": ele.precio,
            "maximo": ele.maximo,
            "minimo": ele.minimo,
            "peso": ele.peso,
            "subtotal": subtotal
        });
        json = JSON.stringify(listaPedido);
        //console.log(json);

        if (titulo.split(':')[0] == "DESCUENTO"){ //SI ES DESCUENTO, PONE EL ITEM DE DESCUENTO, SI ES COMPRA NORMAL LA DEJA NORMAL.
            $("#divPedido").append(
                "<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 cuerpoPedido' style='padding:0px !important'>"+
                
                //eliminar promo
                "<span class='col-xs-1 col-sm-1 col-md-1 col-lg-1 btn btn-danger borrar' idProducto=" +
                idActual + " maximo=" + maximo + " minimo=" + minimo +
                " style='border-radius: 4px; padding-left: 10px; padding-right: 10px; margin-top: 5px;>"+
                "<button class='btn btn-danger borrar' idProducto=" +
                idActual + " maximo=" + maximo + " minimo=" + minimo +
                "' style='border-radius: 4px; padding-left: 10px; padding-right: 10px; margin-top: 5px;'><i class='fas fa-trash'></i></button>"+
                "</span>"+
                
                //editar promo
                "<div class='col-xs-1 col-sm-1 col-md-1 col-lg-1 pl-1 pr-0'><button class='btn btn-warning editarPromo' nombre='" +
                titulo + "' peso='" + peso + "' precio='" + precio + "' maximo='" + maximo + "' minimo='" +
                minimo + "' id='" + idActual +
                "' style=' padding-left: 5px; padding-right: 3px; margin-top: 5px;'><i class='fas fa-pen'></i> <i class='fas fa-tag'></i></button></div>"+

                //titlo promo
                "<div class='col-xs-4 col-sm-4 col-md-4 col-lg-4'><h5 style='padding-left: 5px; color: #333333; margin-top: 15px;' class='titulo'>" +
                "<b>DESCUENTO:</b>"+titulo +
                "</h5></div>"+


                //costo etc etc
                "<div class='col-xs-2 col-sm-2 col-md-2 col-lg-2'><center><h5 style='color: #333333; margin-top: 15px;' class='precio'>" +
                -precio + "/kg"+
                "</h5></center></div><div class='col-xs-2 col-sm-2 col-md-2 col-lg-2'><center><h5 style='color: #333333; margin-top: 15px;' class='peso'>" +
                peso +
                "</h5></center></div><div class='col-xs-2 col-sm-2 col-md-2 col-lg-2'><center><h5 style='color: #333333; margin-top: 15px;' class='subtotal'>" +
                subtotal + "</h5></center></div></div>");
            total += subtotal;
            $("#total").text(total);
        }
        else{
        $("#divPedido").append(
            "<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 cuerpoPedido' style='padding:0px !important'>"+
            
            "<span class='col-xs-1 col-sm-1 col-md-1 col-lg-1 btn btn-danger borrar' idProducto=" +
            idActual + " maximo=" + maximo + " minimo=" + minimo +
            " style='border-radius: 4px; padding-left: 10px; padding-right: 10px; margin-top: 5px;>"+
            "<button class='btn btn-danger borrar' idProducto=" +
            idActual + " maximo=" + maximo + " minimo=" + minimo +
            "' style='border-radius: 4px; padding-left: 10px; padding-right: 10px; margin-top: 5px;'><i class='fas fa-trash'></i></button>"+
            "</span>"+

           /*  <div class='col-xs-4 col-sm-4 col-md-4 col-lg-4'><h5 style='color: #333333; margin-top: 15px;' class='titulo'>" +
            titulo +
            "</h5></div>"+ */

            /* "<div class='col-xs-1 col-sm-1 col-md-1 col-lg-1' pl-0><button class='btn btn-danger borrar' idProducto=" +
            idActual + " maximo=" + maximo + " minimo=" + minimo +
            "' style='border-radius: 4px; padding-left: 10px; padding-right: 10px; margin-top: 5px;'><i class='fas fa-trash'></i></button></div>"+ */


            "<div class='col-xs-1 col-sm-1 col-md-1 col-lg-1' pl-0><button class='btn btn-warning promo' nombre='" +
            titulo + "' peso='" + peso + "' precio='" + precio + "' maximo='" + maximo + "' minimo='" +
            minimo + "' id='" + idActual +
            "' style=' border-radius: 100%; padding-left: 10px; padding-right: 10px; margin-top: 5px;'><i class='fas fa-tag'></i></button></div>"+

            "<div class='col-xs-1 col-sm-1 col-md-1 col-lg-1' pl-0><button class='btn btn-info editarProducto' nombre='" +
            titulo + "' peso='" + peso + "' precio='" + precio + "' maximo='" + maximo + "' minimo='" +
            minimo + "' id='" + idActual +
            "' style='border-radius: 100%; padding-left: 10px; padding-right: 10px; margin-top: 5px;'><i class='fas fa-pen'></i></button></div>"+

            "<div class='col-xs-3 col-sm-3 col-md-3 col-lg-3'><h5 style='color: #333333; margin-top: 15px;' class='titulo'>" +
            titulo +
            "</h5></div>"+


            "<div class='col-xs-2 col-sm-2 col-md-2 col-lg-2'><center><h5 style='color: #333333; margin-top: 15px;' class='precio'>" +
            precio +
            "</h5></center></div><div class='col-xs-2 col-sm-2 col-md-2 col-lg-2'><center><h5 style='color: #333333; margin-top: 15px;' class='peso'>" +
            peso +
            "</h5></center></div><div class='col-xs-2 col-sm-2 col-md-2 col-lg-2'><center><h5 style='color: #333333; margin-top: 15px;' class='subtotal'>" +
            subtotal + "</h5></center></div></div>");
        }
        total += subtotal;
        $("#nombreCliente").val(ele.cliente_id).trigger('change');
        $("#total").text(total);
        $("#folio").text("Folio: "+ele.id_venta);
        $("#folio").attr("folio",ele.id_venta);
        $("#nota").text("Nota de Venta: "+ele.id_tiket);
        $("#nota").attr("nota",ele.id_tiket);

        //? terminar de considerar el json desde php en el js  e imprimirlo en pantalla con un foreach
        
    }
var sample1 = 'Venta General';
    $(document).ready(function() {
            $('.js-example-basic-single').select2();
            setTimeout(() => {
                $('.js-example-basic-single').select2();
                var jsonVentas1= JSON.parse(ventaJson);
                
                jsonVentas1.forEach(element => {
                    rellenarPedido(element);
                    sample1=element;
                });
            }, 0); 
    });
</script>
<?php   
}

?>
<script>
$(document).ready(function() {
         $('.js-example-basic-single').select2();
            
    });
</script>