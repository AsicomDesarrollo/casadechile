<?php
//$ventas = ControladorVentas::ctrMostrarTotalVentas();
?>
<!-- <script src="vistas/plugins/jquery-1.8.3.js"></script> -->

<style>
    .swal2-overflow { /* //swet alert de credito */
    overflow-x: visible;
    overflow-y: visible;
    }


    .btn-outline-success {
        color: #198754;
        border-color: #198754;
    }

    .btn-outline-success:hover {
        color: #fff;
        background-color: #198754;
        border-color: #198754;
    }

    .btn-outline-info {
        color: #0dcaf0;
        border-color: #0dcaf0;
    }

    .btn-outline-info:hover {
        color: #000;
        background-color: #0dcaf0;
        border-color: #0dcaf0;
    }

    .btn-outline-primary {
        color: #0d6efd;
        border-color: #0d6efd;
    }

    .btn-outline-primary:hover {
        color: #fff;
        background-color: #0d6efd;
        border-color: #0d6efd;
    }

    .btn-outline-warning {
        color: #ffc107;
        border-color: #ffc107;
    }

    .btn-outline-warning:hover {
        color: #000;
        background-color: #ffc107;
        border-color: #ffc107;
    }

    .btn-outline-dark {
        color: #212529;
        border-color: #212529;
    }

    .btn-outline-dark:hover {
        color: #fff;
        background-color: #212529;
        border-color: #212529;
    }
    div.jtable-main-container>table.jtable>thead th,
    .jtable-column-header.jtable-column-header-sortable th{
        height: 4.7em !important;
        vertical-align: baseline !important;
    }
</style>

<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->

<script src="vistas/plugins/jQueryUI/jquery-ui.js"></script>
<!-- Include one of jTable styles. -->
<!-- vistas/plugins/jtable.2.4/jtable.2.4.0/jquery.jtable.min.js -->
<link href="vistas/plugins/jtable2.4/themes/metro/green/jtable.min.css" rel="stylesheet" type="text/css" />
<link href="vistas/plugins/jtable2.4/themes/metro/darkorange/jtable-child.css" rel="stylesheet" type="text/css" />
<link href="vistas/plugins/jtable2.4/themes/metro/darkorange/jtable-pagadas.css" rel="stylesheet" type="text/css" />
<link href="vistas/plugins/jtable2.4/themes/metro/darkorange/jtable-adeudos.css" rel="stylesheet" type="text/css" />

<!-- Include jTable script file. -->
<script src="vistas/plugins/jtable2.4/jquery.jtable.min.js" type="text/javascript"></script>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Cortes de Caja
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="inicio">
                    <i class="fa fa-dashboard"></i>Inicio</a>
            </li>
            <li class="active">Cortes de Caja</li>
        </ol>
    </section>
    <br>
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" onclick="pagoPrestamo()" style="cursor: pointer;">
        <div class="small-box bg-blue">
            <div class="inner">
                <h3>Balance de caja</h3>
                <p>Ajustar efectivo</p>
            </div>
            <div class="icon">
                <i class="fa fa-money"></i>
            </div>
        </div>
    </div>

    <section class="content col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="box">
            <div class="box-body">
            <!-- TABLA DE TODOS LOS CORTES DE CAJA -->
            <!-- TABLA DE TODOS LOS CORTES DE CAJA -->
            <!-- TABLA DE TODOS LOS CORTES DE CAJA -->
                <div id="tablaCortesCaja" class="mt-4"></div>
                <script src="vistas/plugins/jtable2.4/localization/jquery.jtable.es.js" type="text/javascript"></script>
                <script type="text/javascript">
                $(document).ready(function() {
                    console.log("inicializa tabla");
                  var botonazo = "";
                    $('#tablaCortesCaja').jtable({
                        title: 'Cortes de Caja',
                        messages:{
                            noDataAvailable: 'No hay Cortes Cargados!',
                            addNewRecord: 'corte',
                            editRecord: 'e',
                        },
                        StartIndex: 1,
                        paging: true, //Enable paging
                        pageSize: 10,
                        pageSizes: [5, 10, 100],
                        sorting: true, //Enable sorting
                        defaultSorting: 'folio ASC',

                        //selecting: true, //Enable selecting
                        //multiselect: true, //Allow multiple selecting
                        //selectingCheckboxes: true, //Show checkboxes on first column
                        //selectOnRowClick: false, //Enable this to only select using checkboxes

                        //openChildAsAccordion: true,
                        // openChildAsAccordion: true,
                        toolbar: {
                            items: [{
                                tooltip: 'Exportar a Excel',
                                icon: 'https://www.jtable.org/Content/images/Misc/excel.png',
                                text: 'Excel',
                                click: function() {
                                    downloadAsExcel(res.Records, 'tikets_ventas');
                                },
                            }]
                        },
                        actions: {
                            listAction: 'ajax/ventas/tablaCortesCaja.ajax.jtable.php',
                            // createAction: '/GettingStarted/CreatePerson',
                            //updateAction: '/GettingStarted/UpdatePerson',
                            // deleteAction: '/GettingStarted/DeletePerson'
                        },
                        fields: {
                            //CHILD TABLE ""DATOS DEL TIKET DE LA VENTA""
                            /* tiket: {
                                title: 'Tiket',
                                style: 'jtable-command-column',
                                width: '1%',
                                sorting: false,
                                edit: false,
                                create: false,
                                display: function(dataTiket) {
                                    //Create an image that will be used to open child table
                                    // var $img = $('<img src="/Content/images/Misc/phone.png" title="Edit phone numbers" />');
                                    var $img = $(
                                        '<i class="fas fa-receipt" style="font-size: 1.5em;"></i>'
                                        );

                                    //Open child table 
                                    $img.click(function() {

                                        $('#tablaTodasVentasAbiertas').jtable('openChildTable',
                                            $img.closest('tr'), {
                                                title: dataTiket.record.folio +
                                                    ' - Datos del Tiket ' + dataTiket
                                                    .record.id + ' - ' + dataTiket
                                                    .record.cliente,
                                                paging: true, //Enable paging
                                                pageSize: 10,
                                                pageSizes: [5, 10, 50],
                                                sorting: true, //Enable sorting
                                                defaultSorting: 'id ASC',
                                                actions: {
                                                    listAction: 'ajax/ventas/tablaVentasAbiertas.ajax.jtable.php?tiket=' + dataTiket.record.folio,
                                                    deleteAction: '/Demo/DeletePhone',
                                                    updateAction: '/Demo/UpdatePhone',
                                                    createAction: '/Demo/CreatePhone'
                                                },
                                                fields: {
                                                    id: {
                                                        type: 'hidden',
                                                        defaultValue: dataTiket.record
                                                            .id
                                                    },
                                                    id_venta: {
                                                        key: true,
                                                        create: false,
                                                        edit: false,
                                                        list: false,
                                                        title: 'id Venta'
                                                    },
                                                    producto: {
                                                        type: 'hidden',
                                                        title: 'Producto',
                                                        width: '30%',
                                                        options: {
                                                            '1': 'Home phone',
                                                            '2': 'Office phone',
                                                            '3': 'Cell phone'
                                                        }
                                                    },
                                                    title: {
                                                        title: 'Decripción',
                                                        width: '30%'
                                                    },
                                                    peso: {
                                                        title: 'Peso',
                                                        width: '5%',

                                                    },
                                                    precio: {
                                                        title: 'Precio',
                                                        width: '5%'
                                                    },
                                                    costoUnit: {
                                                        title: 'Costo',
                                                        width: '5%'
                                                    },
                                                    estatus: {
                                                        title: 'Estatus',
                                                        width: '10%'
                                                    },
                                                    fecha: {
                                                        title: 'Fecha',
                                                        width: '20%',
                                                        type: 'date',
                                                        displayFormat: 'dd-mm-yy',
                                                        create: false,
                                                        edit: false
                                                    }
                                                }
                                            },
                                            function(data) { //opened handler
                                                data.childTable.jtable('load');
                                            });
                                    });
                                    //Return image to show
                                    return $img;
                                }
                            }, */
                            //CHILD TABLE ""DATOS DEL TIKET DE LA VENTA""

                            id: {
                                title: 'id',
                                width: '5%'
                            },
                            fecha_corte: {
                                title: 'fecha corte',
                                width: '5%'
                            },
                            fecha_inicio: {
                                title: 'fecha inicio',
                                width: '15%'
                            },
                            fecha_fin: {
                                title: 'fecha fin',
                                width: '8%'
                            },
                            folio_unico_inicial: {
                                title: 'folio unico inicial',
                                width: '8%'
                            },
                            folio_unico_final: {
                                title: 'folio unico final',
                                width: '10%',
                                //type: 'date',
                                create: false,
                                edit: false
                            },
                            monto_efectivo: {
                                title: 'monto efectivo',
                                width: '10%',
                                //type: 'date',
                                create: false,
                                edit: false
                            },
                            monto_tarjeta: {
                                title: 'Monto Tarjeta',
                                width: '8%'
                            },
                            monto_transferencia: {
                                title: 'Monto Transferencia',
                                width: '8%'
                            },
                            monto_credito: {
                                title: 'Monto Crédito',
                                width: '8%'
                            },
                            monto_abonos: {
                                title: 'Monto Abonos',
                                width: '8%'
                            },
                            monto_abono_efectivo: {
                                title: 'Monto Abonos efectivo',
                                width: '8%'
                            },
                            monto_abono_transfer: {
                                title: 'Monto Abonos transferencia',
                                width: '8%'
                            },
                            monto_abono_tarjeta: {
                                title: 'Monto Abonos tarjeta',
                                width: '8%'
                            },
                            monto_efectivo_al_corte: {
                                title: 'Monto Efectivo al Corte',
                                width: '8%'
                            },
                            diferencia_efectivo: {
                                title: 'Diferencia de efectivo',
                                width: '8%'
                            },
                            venta_total: {
                                title: 'Venta Total',
                                width: '8%'
                            },
                            inicio_caja: {
                                title: 'Inicio de Caja',
                                width: '8%'
                            },
                            gastos_totales: {
                                title: 'Gastos Totales',
                                width: '8%'
                            },
                            gastos_proveedores: {
                                title: 'Gastos Proveedores',
                                width: '8%'
                            },
                            gastos_dia: {
                                title: 'Gastos del Día',
                                width: '8%'
                            },
                        }
                    });
                    $('#tablaCortesCaja').jtable('load');
                  });
                  
                  var DiferidosDatosFolio='';
                </script>
            
            </div>
        </div>
    </section>
</div>
<!-- mis modals ASICOM -->
<!-- mis modals ASICOM -->

<!--******************************
MODAL DEMO
******************************-->
<div id="modalDEMO" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <form action="">
            <div class="modal-header bg-success" ><button type="button" class="close"
                    data-dismiss="modal">&times;</button>
                    <h3 class="modal-title text-center"><strong>Pagar todo el tiket en Diferido</strong></h3>
            </div>
            <div class="modal-body" class="bg-success">
                <div class="box-body">
                      <div class="content">
                        <div class="row mb-4" style="margin-bottom:2em; display:flex;align-content: space-between;justify-content: space-between;">
                            <p>Debes escribir el monto de cada tipo de cobro hasta sumar el total del tiket para continuar.</p>    
                        </div>
                        
                        <div class="row" style="display:flex;align-content: space-between;justify-content: space-between;">

                          <div class="col-6">
                            <div class="form-group"><label><i class="fas fa-money-bill-wave ml-2"></i> Efectivo: </label>
                              <input type="email" class="form-control" id="difEfectivo" name="difEfectivo" placeholder="">
                            </div>
                            <div class="form-group"><label><i class="fas fa-credit-card ml-2"></i> Tarjeta:</label>
                                <input type="email" class="form-control" id="difTarjeta" name="difTarjeta" placeholder="">
                            </div>
                          </div>

                          <div class="col-6">
                            <div class="form-group"><label> <i class="fas fa-random ml-2"></i>  Transferencia:</label>
                              <input type="email" class="form-control" id="difTransferencia"  name="difTransferencia" placeholder="">
                            </div>
                            <div class="form-group"><label><i class="far fa-hand-peace ml-2"></i> Crédito:</label>
                                <input type="email" class="form-control" id="difCredito" name="difCredito" placeholder="">
                            </div>
                          </div>

                          
                        </div>
                      </div>

                    </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                      <button onclick="confirDifPagos()" type="button" class="btn btn-success pull-right"> Confirmar</button>
                 </div>
              </form>
        </div>
    </div>
</div>
<!--******************************-->


<!-- mis modals ASICOM -->
<!-- mis modals ASICOM -->


<script type="text/javascript">
/*=============================================
TABLA DE CORTES DE CAJA
=============================================*/

$("yanosirve").DataTable({
    "ajax": "ajax/tablaVentasAbiertas.ajax.jtable.php1",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "order": [
        [0, "desc"]
    ],
    "language": {

        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }

    }

});





// FUNCIONES ELMM ASICOM
// FUNCIONES ELMM ASICOM
// FUNCIONES ELMM ASICOM
function showModal(modal){
  $("#"+modal).modal("show");
}

function confirDifPagos(){
    var difEfe = $('#difEfectivo').val();
    var difTar = $('#difTarjeta').val();
    var difTra = $('#difTransferencia').val();
    var difCre = $('#difCredito').val();
    console.log("enviando ajax");

    $.ajax({
        url: "ajax/tiket/confirDifPagos.ajax.php",
        method: "POST",
        data:{
            'tiket':modalVal2,
            'total':modalVal3,
            'difEfe':difEfe,
            'difTar':difTar,
            'difTra':difTra,
            'difCre':difCre
        },
        cache: false,
        // contentType: false,
        // processData: false,
        success: function(respuesta) {
            console.log(respuesta);
            if (respuesta == "ok cargo diferido") {
                Swal.fire({
                    allowOutsideClick: false,
                    icon: 'success',
                    title: 'Se cargaron los pagos correspondientes',
                    text: 'ya puede cerrar esta ventana',
                    confirmButtonText: 'Cerrar',
                    footer: 'GRACIAS.'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // var $cemt = $('[data-record-key='+folio+']');
                        // $cemt.css({'pointer-events':'none'});
                        // $cemt.css({'opacity':'0.4'});
                        // $cemt.css({'background':'#dd4b3982'});
                        window.location.href = "ventas";
                    }
                });
                //$("#modalPagoDiferidoTiket").modal("hide");
                
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'OPS! algo salio mal con pago diferido',
                    text: 'Esto no debería ocurrir, actualiza la página e intenta realizar el pago nuevamente.',
                    confirmButtonText: 'Cerrar',
                    footer: 'GRACIAS.'
                });
            }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) { 
            alert("Status: " + textStatus); alert("Error: " + errorThrown); 
        } 
    }); //termina ajax

}

</script>

<!-- datepiker style -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/flick/jquery-ui.css"/>