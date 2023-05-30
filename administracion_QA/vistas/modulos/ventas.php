
<script
src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
crossorigin="anonymous"></script>

<script
src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"
integrity="sha256-hlKLmzaRlE8SCJC1Kw8zoUbU8BxA+8kR3gseuKfMjxA="
crossorigin="anonymous"></script>

<script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
<script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>
<script src="vistas/plugins/jQueryUI/jquery-ui.js"></script>
<!-- Include one of jTable styles. -->
<!-- vistas/plugins/jtable.2.4/jtable.2.4.0/jquery.jtable.min.js -->
<link href="vistas/plugins/jtable2.4/themes/metro/green/jtable.min.css" rel="stylesheet" type="text/css" />
<link href="vistas/plugins/jtable2.4/themes/metro/darkorange/jtable-child.css" rel="stylesheet" type="text/css" />
<link href="vistas/plugins/jtable2.4/themes/metro/darkorange/jtable-pagadas.css" rel="stylesheet" type="text/css" />
<link href="vistas/plugins/jtable2.4/themes/metro/darkorange/jtable-adeudos.css" rel="stylesheet" type="text/css" />

<!-- Include jTable script file. -->
<script src="vistas/plugins/jtable2.4/jquery.jtable.min.js" type="text/javascript"></script>


<!-- Begin page -->

<div id="layout-wrapper">
  <!-- ============================================================== -->
  <!-- Start right Content here -->
  <!-- ============================================================== -->
  <div class="main-content">
    <div class="page-content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-12">
            <div class="card">
              <div class="card-body pb-2">
                <section class="content col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <div class="box">
                    <div class="box-body">

                      <!-- TABLA DE TODAS LAS VENTAS ABIERTAS -->
                      <div class="small-box-no btn btn-success btn-lg mb-4">
                        <div class="inner">
                          <h5 style="color: white;">Nueva ventas</h5>
                        </div>
                      </div>
                      <div id="tablaTodasVentasAbiertas" class="mt-4"></div>
                      <script src="vistas/plugins/jtable2.4/localization/jquery.jtable.es.js" type="text/javascript"></script>
                      <script type="text/javascript">
                        $(document).ready(function() {
                          var botonazo = "";
                            $('#tablaTodasVentasAbiertas').jtable({
                                title: 'Ventas Abiertas',
                                messages:{
                                    noDataAvailable: 'No hay Ventas Cargadas!',
                                    addNewRecord: 'Cargar Nueva Venta',
                                    editRecord: 'Editar Venta',
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
                                    listAction: 'ajax/ventas/tablaVentasAbiertas.ajax.jtable.php',
                                    // createAction: '/GettingStarted/CreatePerson',
                                    updateAction: '/GettingStarted/UpdatePerson',
                                    // deleteAction: '/GettingStarted/DeletePerson'
                                },
                                fields: {
                                    //CHILD TABLE ""DATOS DEL TIKET DE LA VENTA""
                                    tiket: {
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
                                    },
                                    //CHILD TABLE ""DATOS DEL TIKET DE LA VENTA""
                        
                                    folio: {
                                        title: 'Folio unico',
                                        key: true,
                                        list: true,
                                        width: '8%'
                                    },
                                    id: {
                                        title: 'folio',
                                        width: '5%'
                                    },
                                    cliente_id: {
                                        title: 'No. Cliente',
                                        width: '5%'
                                    },
                                    cliente: {
                                        title: 'Cliente',
                                        width: '15%'
                                    },
                                    monto_total: {
                                        title: 'Monto Total',
                                        width: '8%'
                                    },
                                    monto_adeudo: {
                                        title: 'Monto Adeudo',
                                        width: '8%'
                                    },
                                    fecha_creacion: {
                                        title: 'Fecha Compra',
                                        width: '10%',
                                        //type: 'date',
                                        create: false,
                                        edit: false
                                    },
                        
                                    pago: {
                                        title: 'Pago de Tiket',
                                        width: '25%',
                                        sorting: false,
                                        edit: false,
                                        create: false,
                                        display: function(tiket) {
                                            //Create an image that will be used to open child table
                                           
                                          /*   var $icover = $(
                                                '<div class="btn-group"><button id="btnPagoEfectivo" type="button" class="btn btn-outline-success " metodo="efectivo" >Efectivo</button><button id="btnPagoTransferencia" metodo="transferencia" type="button" class="btn btn-outline-primary">Transferencia</button><button id="btnPagoTarjeta" metodo="tarjeta" type="button" class="btn btn-outline-info">Tarjeta</button><button id="btnPagoPrestamo" metodo="prestamo" type="button" class="btn btn-outline-warning">Prestamo</button><button id="btnPagoDiferido" metodo="diferido" type="button" class="btn btn-outline-dark">Diferido</button></div>'
                                                ); */
                                            var $icover1 = $(
                                              '<div class="btn-group"><button id="btnPagoEfectivo" type="button" class="btn btn-outline-success " metodo="efectivo" >Efectivo</button></div>'
                                            );
                                            var $icover2 = $(
                                              '<button id="btnPagoTarjeta" metodo="tarjeta" type="button" class="btn btn-outline-info">Tarjeta</button>'
                                            );
                                            var $icover3 = $(
                                              '<div class="btn-group"><button id="btnPagoTransferencia" metodo="transferencia" type="button" class="btn btn-outline-primary">Transferencia</button></div>'
                                            );
                                            var $icover4 = $(
                                            '<button id="btnPagoCredito" metodo="credito" type="button" class="btn btn-outline-warning">Crédito</button>'
                                            );
                                            var $icover5 = $(
                                            '<div class="btn-group"><button id="btnPagoDiferido" metodo="diferido" type="button" class="btn btn-outline-dark">Diferido</button></div>'
                                            );
                                            //Open child table when user clicks the image
                                            $icover1.on('click',function(event) {
                                              event.preventDefault();
                                                let method = event.target.attributes.metodo.value;
                                                PagarTiket(method,tiket.record.folio,tiket.record.monto_total);
                                            });
                                            $icover2.on('click',function(event) {
                                              event.preventDefault();
                                                let method = event.target.attributes.metodo.value;
                                                PagarTiket(method,tiket.record.folio,tiket.record.monto_total);
                        
                                            });
                                            $icover3.on('click',function(event) {
                                              event.preventDefault();
                                                let method = event.target.attributes.metodo.value;
                                                PagarTiket(method,tiket.record.folio,tiket.record.monto_total);
                        
                                            });
                                            $icover4.on('click',function(event) {
                                              event.preventDefault();
                                                let method = event.target.attributes.metodo.value;
                                                PagarTiket(method,tiket.record.folio,tiket.record.monto_total);
                        
                                            });
                                            $icover5.on('click',function(event) {
                                              event.preventDefault();
                                                let method = event.target.attributes.metodo.value;
                                                PagarTiket(method,tiket.record.folio,tiket.record.monto_total);
                                            });
                                            
                                            //Return image to show on the person row
                                            return [$icover1,$icover2,$icover3,$icover4,$icover5]
                                        }
                                    },
                                }
                            });
                            $('#tablaTodasVentasAbiertas').jtable('load');
                          });
                          
                          var DiferidosDatosFolio='';
                      </script>
                      <!-- TABLA DE TODAS LAS VENTAS -->
                      <!-- TABLA DE TODAS LAS VENTAS -->
                      <!-- TABLA DE TODAS LAS VENTAS -->
                      <div class="small-box" style="text-align: center; background-color: #07a3ff9e; margin-top: 5%;">
                        <div class="inner">
                          <h5 style="font-size:2em;color: white;">Todas las Ventas Pagadas</h5>
                        </div>
                      </div>
                      <div id="tablaTodasVentasPagadas" class="mt-4"></div>
                      <!-- <script src="vistas/plugins/jtable2.4/localization/jquery.jtable.es.js" type="text/javascript"></script> -->
                      <script type="text/javascript">
                        $(document).ready(function() {
                          var botonazo = "";
                            $('#tablaTodasVentasPagadas').jtable({
                                title: 'Ventas Pagadas',
                                messages:{
                                    noDataAvailable: 'No hay Ventas Pagadas!',
                                    addNewRecord: 'borrar',
                                    editRecord: 'quitar Venta',
                                },
                                StartIndex: 1,
                                paging: true, //Enable paging
                                pageSize: 10,
                                pageSizes: [5, 10, 100],
                                sorting: true, //Enable sorting
                                defaultSorting: 'fecha_pago DESC',
                        
                                //selecting: true, //Enable selecting
                                //multiselect: true, //Allow multiple selecting
                                //selectingCheckboxes: true, //Show checkboxes on first column
                                //selectOnRowClick: false, //Enable this to only select using checkboxes
                        
                                //openChildAsAccordion: true,
                                openChildAsAccordion: true,
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
                                    listAction: 'ajax/ventas/tablaVentasPagadas.ajax.jtable.php',
                                    // createAction: '/GettingStarted/CreatePerson',
                                    // updateAction: '/GettingStarted/UpdatePerson',
                                    // deleteAction: '/GettingStarted/DeletePerson'
                                },
                                fields: {
                                    //CHILD TABLE ""DATOS DEL TIKET DE LA VENTA""
                                    tiket: {
                                        title: 'Tiket',
                                        style: 'jtable-command-column yata',
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
                        
                                                $('#tablaTodasVentasPagadas').jtable('openChildTable',
                                                    $img.closest('tr'), {
                                                        title: dataTiket.record.folio +' - Datos del Tiket ' + dataTiket.record.id + ' - ' + dataTiket.record.cliente,
                                                        paging: true, //Enable paging
                                                        pageSize: 10,
                                                        pageSizes: [5, 10, 50],
                                                        sorting: true, //Enable sorting
                                                        defaultSorting: 'id ASC',
                                                        actions: {
                                                            listAction: 'ajax/ventas/tablaVentasAbiertas.ajax.jtable.php?tiket=' + dataTiket.record.folio,
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
                                    },
                        
                                    Pagos: {
                                        title: 'Pagos',
                                        style: 'jtable-command-column yata',
                                        width: '1%',
                                        sorting: false,
                                        edit: false,
                                        create: false,
                                        display: function(dataTiket) {
                                            //Create an image that will be used to open child table
                                            // var $img = $('<img src="/Content/images/Misc/phone.png" title="Edit phone numbers" />');
                                            var $img = $(
                                                '<i class="fas fa-file-invoice-dollar" style="font-size: 1.5em;"></i>'
                                                );
                        
                                            //Open child table  PAGOS del TIKET
                                            $img.click(function() {
                        
                                                $('#tablaTodasVentasPagadas').jtable('openChildTable',
                                                    $img.closest('tr'), {
                                                        title: 'Pagos para el tiket : ' + dataTiket.record.folio +' - folio: ' + dataTiket.record.id + ' - ' + dataTiket.record.cliente,
                                                        paging: true, //Enable paging
                                                        pageSize: 10,
                                                        pageSizes: [5, 10, 50],
                                                        sorting: true, //Enable sorting
                                                        defaultSorting: 'id ASC',
                                                        actions: {
                                                            listAction: 'ajax/ventas/pagosTiket.ajax.jtable.php?tiket=' + dataTiket.record.folio,
                                                        },
                                                        fields: {
                                                            id: {
                                                                title: 'id',
                                                                key: true,
                                                                defaultValue: dataTiket.record.id+'-'+dataTiket.record.folio_unico,
                                                                keyValue: dataTiket.record.id+'-'+dataTiket.record.folio_unico
                                                            },
                                                            folio_unico: {
                                                                title: 'Folio Único',
                                                            },
                                                            metodoPago: {
                                                                title: 'Metodo Pago'
                                                            },
                                                            cantidad: {
                                                                title: 'Cantidad',
                                                                width: '5%'
                                                            },
                                                            pagoExhibicion: {
                                                                title: 'Exhibición Pago',
                                                                width: '1%'
                                                            },
                                                            usuario: {
                                                                title: 'Usuario',
                                                                width: '5%',
                        
                                                            },
                                                            fechaPago: {
                                                                title: 'Fecha Pago',
                                                                width: '5%'
                                                            },
                                                        }
                                                    },
                                                    function(data) { //opened handler
                                                        data.childTable.jtable('load');
                                                    });
                                            });
                                            //Return image to show
                                            return $img;
                                        }
                                    },
                        
                                    //CHILD TABLE ""DATOS DEL TIKET DE LA VENTA""
                        
                                    folio: {
                                        title: 'Folio unico',
                                        key: true,
                                        list: true,
                                        width: '8%'
                                    },
                                    id: {
                                        title: 'folio',
                                        width: '5%'
                                    },
                                    cliente_id: {
                                        title: 'No. Cliente',
                                        width: '5%'
                                    },
                                    cliente: {
                                        title: 'Cliente',
                                        width: '15%'
                                    },
                                    fecha_creacion: {
                                        title: 'Fecha Compra',
                                        width: '10%'
                                    },
                                    fecha_pago: {
                                        title: 'Fecha Pago',
                                        width: '10%'
                                    },
                                    monto_pago: {
                                        title: 'Monto Pagado',
                                    },
                                    monto_total: {
                                        title: 'Total Tiket',
                                    },
                                    metodoPago: {
                                        title: 'Metodo de Pago',
                                    },
                                    monto_adeudo: {
                                        title: 'Adeudo',
                                        width: '5%'
                                    },
                                    fecha_promesa_adeudo: {
                                        title: 'Promesa Pago',
                                        width: '10%'
                                    },
                                }
                            });
                            $('#tablaTodasVentasPagadas').jtable('load');
                          });
                          
                          
                      </script>
                      <!-- TABLA DE TODOS LOS CREDITOS QUE AUN SE DEBEN Y NO SE HAN PAGADO -->
                      <!-- TABLA DE TODOS LOS CREDITOS QUE AUN SE DEBEN Y NO SE HAN PAGADO -->
                      <!-- TABLA DE TODOS LOS CREDITOS QUE AUN SE DEBEN Y NO SE HAN PAGADO -->
                      <div class="small-box" style="text-align: center; background-color: #ffd45f; margin-top: 5%;">
                        <div class="inner">
                          <h5 style="font-size:2em;color: #5b5b5b;">Todos los creditos de todos los tikets</h5>
                        </div>
                      </div>
                      <div id="tablaTodosAdeudosCreditos" class="mt-4"></div>
                      <!-- <script src="vistas/plugins/jtable2.4/localization/jquery.jtable.es.js" type="text/javascript"></script> -->
                      <script type="text/javascript">
                        $(document).ready(function() {
                          var botonazo = "";
                            $('#tablaTodosAdeudosCreditos').jtable({
                                title: 'Ventas Pagadas',
                                messages:{
                                    noDataAvailable: 'No hay Ventas Pagadas!',
                                    addNewRecord: 'borrar',
                                    editRecord: 'quitar Venta',
                                },
                                StartIndex: 1,
                                paging: true, //Enable paging
                                pageSize: 10,
                                pageSizes: [5, 10, 100],
                                sorting: true, //Enable sorting
                                defaultSorting: 'fecha_pago DESC',
                        
                                //selecting: true, //Enable selecting
                                //multiselect: true, //Allow multiple selecting
                                //selectingCheckboxes: true, //Show checkboxes on first column
                                //selectOnRowClick: false, //Enable this to only select using checkboxes
                        
                                //openChildAsAccordion: true,
                                openChildAsAccordion: true,
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
                                    listAction: 'ajax/ventas/adeudosCreditosTikets.ajax.jtable.php',
                                    // createAction: '/GettingStarted/CreatePerson',
                                    // updateAction: '/GettingStarted/UpdatePerson',
                                    // deleteAction: '/GettingStarted/DeletePerson'
                                },
                                fields: {
                                    //CHILD TABLE ""DATOS DEL TIKET DE LA VENTA""
                                    tiket: {
                                        title: 'Tiket',
                                        style: 'jtable-command-column yata',
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
                        
                                                $('#tablaTodosAdeudosCreditos').jtable('openChildTable',
                                                    $img.closest('tr'), {
                                                        title: dataTiket.record.folio +' - Datos del Tiket ' + dataTiket.record.id + ' - ' + dataTiket.record.cliente,
                                                        paging: true, //Enable paging
                                                        pageSize: 10,
                                                        pageSizes: [5, 10, 50],
                                                        sorting: true, //Enable sorting
                                                        defaultSorting: 'id ASC',
                                                        actions: {
                                                            listAction: 'ajax/ventas/tablaVentasAbiertas.ajax.jtable.php?tiket=' + dataTiket.record.folio,
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
                                    },
                        
                                    Pagos: {
                                        title: 'Pagos',
                                        style: 'jtable-command-column yata',
                                        width: '1%',
                                        sorting: false,
                                        edit: false,
                                        create: false,
                                        display: function(dataTiket) {
                                            //Create an image that will be used to open child table
                                            // var $img = $('<img src="/Content/images/Misc/phone.png" title="Edit phone numbers" />');
                                            var $img = $(
                                                '<i class="fas fa-file-invoice-dollar" style="font-size: 1.5em;"></i>'
                                                );
                        
                                            //Open child table  PAGOS del TIKET
                                            $img.click(function() {
                        
                                                $('#tablaTodosAdeudosCreditos').jtable('openChildTable',
                                                    $img.closest('tr'), {
                                                        title: 'Pagos para el tiket : ' + dataTiket.record.folio +' - folio: ' + dataTiket.record.id + ' - ' + dataTiket.record.cliente,
                                                        paging: true, //Enable paging
                                                        pageSize: 10,
                                                        pageSizes: [5, 10, 50],
                                                        sorting: true, //Enable sorting
                                                        defaultSorting: 'id ASC',
                                                        actions: {
                                                            listAction: 'ajax/ventas/pagosTiket.ajax.jtable.php?tiket=' + dataTiket.record.folio,
                                                        },
                                                        fields: {
                                                            id: {
                                                                title: 'id',
                                                                key: true,
                                                                defaultValue: dataTiket.record.id+'-'+dataTiket.record.folio_unico,
                                                                keyValue: dataTiket.record.id+'-'+dataTiket.record.folio_unico
                                                            },
                                                            folio_unico: {
                                                                title: 'Folio Único',
                                                            },
                                                            metodoPago: {
                                                                title: 'Metodo Pago'
                                                            },
                                                            cantidad: {
                                                                title: 'Cantidad',
                                                                width: '5%'
                                                            },
                                                            pagoExhibicion: {
                                                                title: 'Exhibición Pago',
                                                                width: '1%'
                                                            },
                                                            usuario: {
                                                                title: 'Usuario',
                                                                width: '5%',
                        
                                                            },
                                                            fechaPago: {
                                                                title: 'Fecha Pago',
                                                                width: '5%'
                                                            },
                                                        }
                                                    },
                                                    function(data) { //opened handler
                                                        data.childTable.jtable('load');
                                                    });
                                            });
                                            //Return image to show
                                            return $img;
                                        }
                                    },
                        
                                    //CHILD TABLE ""DATOS DEL TIKET DE LA VENTA""
                        
                                    folio: {
                                        title: 'Folio unico',
                                        key: true,
                                        list: true,
                                        width: '8%'
                                    },
                                    id: {
                                        title: 'folio',
                                        width: '5%'
                                    },
                                    cliente_id: {
                                        title: 'No. Cliente',
                                        width: '5%'
                                    },
                                    cliente: {
                                        title: 'Cliente',
                                        width: '15%'
                                    },
                                    fecha_creacion: {
                                        title: 'Fecha Compra',
                                        width: '10%'
                                    },
                                    fecha_pago: {
                                        title: 'Fecha Pago',
                                        width: '10%'
                                    },
                                    monto_pago: {
                                        title: 'Monto Pagado',
                                    },
                                    monto_total: {
                                        title: 'Total Tiket',
                                    },
                                    metodoPago: {
                                        title: 'Metodo de Pago',
                                    },
                                    monto_adeudo: {
                                        title: 'Adeudo',
                                        width: '5%'
                                    },
                                    fecha_promesa_adeudo: {
                                        title: 'Promesa Pago',
                                        width: '10%'
                                    },
                                }
                            });
                            $('#tablaTodosAdeudosCreditos').jtable('load');
                          });
                          
                          
                      </script>
                    </div>
                  </div>
                </section>
              </div>
            </div>
          </div>
        </div>
        <!-- end row-->
        <!--=====================================
          MODAL AGREGAR CLIENTE
          ======================================-->
        <div class="modal fade bs-empleados-modal-center" id="modalAgregarEntrada" tabindex="-1" role="dialog"  aria-labelledby="mySmallModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Agregar cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                  aria-label="Close">
                </button>
              </div>
              <!--=====================================
                CUERPO DEL MODAL
                ======================================-->
              <div class="modal-body">
                <div class="box-body">
                  <div class="form-group">
                    <label>Categorias:</label>
                    <select class="form-control" id="categoriaEntradaNueva" onchange="filtrarCategoria('nuevo')">
                      <option value="">Seleccionar</option>
                      <?php
                        $categoria = ControladorCategorias::ctrMostrarCategorias();
                        
                        foreach ($categoria as $key => $value) {
                          
                          echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                        
                        }
                        
                        ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Producto:</label>
                    <select class="form-control" id="agregarProductoEntrada">
                    <?php
                      $productos = ControladorProductos::ctrMostrarProductos();
                      
                      foreach ($productos as $key => $value) {
                        
                        echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                      
                      }
                      
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Peso: </label>
                    <input type="text" class="form-control" id="agregarPesoEntrada">
                  </div>
                  <div class="form-group">
                    <label>Precio de compra: </label>
                    <input type="text" class="form-control" id="agregarPrecioEntrada">
                  </div>
                  <div class="form-group">
                    <label>Proveedor</label>
                    <select class="form-control" id="agregarProveedor">
                    <?php
                      $proveedores = ControladorProveedores::ctrMostrarProveedores();
                      
                      foreach ($proveedores as $key => $value) {
                        
                        echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                      
                      }
                      
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Método de pago: </label>
                    <select class="form-control" id="agregarMetodoPago">
                      <option value="efectivo">Efectivo</option>
                      <option value="credito">Crédito</option>
                    </select>
                  </div>
                </div>
              </div>
              <!--=====================================
                PIE DEL MODAL
                ======================================-->
              <div class="modal-footer" style="">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary pull-right" id="guardarNuevoCliente">Guardar</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!--=====================================
          MODAL DETALLES PRDUCTO
          ======================================-->
        <div class="modal fade bs-empleados-modal-center" id="modalDetalles" tabindex="-1" role="dialog"  aria-labelledby="mySmallModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Detalles de cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                  aria-label="Close">
                </button>
              </div>
              <!--=====================================
                CUERPO DEL MODAL
                ======================================-->
              <div class="modal-body">
                <div class="box-body">
                  <div class="form-group" style="display: none;">
                    <label>Identificador:</label>
                    <input type="text" class="form-control" id="idEntrada" disabled="disabled">
                  </div>
                  <div class="form-group">
                    <label>Categorias:</label>
                    <select class="form-control" id="categoriaEntrada" onchange="filtrarCategoria('editar')">
                      <option value="">Seleccionar</option>
                      <?php
                        $categoria = ControladorCategorias::ctrMostrarCategorias();
                        
                        foreach ($categoria as $key => $value) {
                          
                          echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                        
                        }
                        
                        ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Producto:</label>
                    <select class="form-control" id="productoEntrada">
                    <?php
                      $productos = ControladorProductos::ctrMostrarProductos();
                      
                      foreach ($productos as $key => $value) {
                        
                        echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                      
                      }
                      
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Peso: </label>
                    <input type="text" class="form-control" id="pesoEntrada">
                  </div>
                  <div class="form-group">
                    <label>Precio de compra: </label>
                    <input type="text" class="form-control" id="precioEntrada">
                  </div>
                  <div class="form-group">
                    <label>Proveedor: </label>
                    <select class="form-control" id="proveedorEntrada">
                    <?php
                      $proveedores = ControladorProveedores::ctrMostrarProveedores();
                      
                      foreach ($proveedores as $key => $value) {
                        
                        echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                      
                      }
                      
                      ?>
                    </select>
                  </div>
                  <div class="form-group" style="display: none;">
                    <label>Fecha: </label>
                    <input type="text" class="form-control" id="fechaEntrada" disabled="disabled">
                  </div>
                  <div class="form-group">
                    <label>Método de pago: </label>
                    <select class="form-control" id="metodoPago">
                      <option value="efectivo">Efectivo</option>
                      <option value="credito">Crédito</option>
                      <option value="cancelado">Cancelado</option>
                    </select>
                  </div>
                </div>
              </div>
              <!--=====================================
                PIE DEL MODAL
                ======================================-->
              <div class="modal-footer" style="">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary pull-right" id="guardarCambios">Actualizar</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!--=====================================
          MODAL AGREGAR BONOS
          ======================================-->
        <div class="modal fade bs-empleados-modal-center" id="modalAgregarAbono" tabindex="-1" role="dialog"  aria-labelledby="mySmallModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Agregar cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                  aria-label="Close">
                </button>
              </div>
              <!--=====================================
                CUERPO DEL MODAL
                ======================================-->
              <div class="modal-body">
                <div class="box-body">
                  <div class="form-group" style = "display: none;">
                    <label>Id: </label>
                    <input type="text" class="form-control" id="idAbono">
                  </div>
                  <div class="form-group">
                    <label>Monto: </label>
                    <input type="number" class="form-control" id="montoAbono">
                  </div>
                  <div class="form-group">
                    <label>Método de pago: </label>
                    <select class="form-control" id="metodoPagoAbono">
                      <option value="efectivo">Efectivo</option>
                      <option value="transferencia">Transferencia</option>
                    </select>
                  </div>
                </div>
              </div>
              <!--=====================================
                PIE DEL MODAL
                ======================================-->
              <div class="modal-footer" style="">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary pull-right" id="guardarNuevoCliente">Guardar</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
      </div>
      <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
  </div>
  <!-- end main content-->
</div>
<!-- END layout-wrapper -->
<!-- Right bar overlay-->



<script type="text/javascript">
/*=============================================
CARGAR LA TABLA DINÁMICA DE VENTAS
=============================================*/

$(".tablaVentasAbiertas").DataTable({
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

/*=============================================
CARGAR LA TABLA DINÁMICA DE VENTAS
=============================================*/

$(".tablaPagosPrestamos").DataTable({
    "ajax": "ajax/tablaPagosPrestamos.ajax.php",
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

var idCredito = 0;

function buscarPorFecha() {
    $("#modalBuscarPorFecha").modal("show");
}

function pagoPrestamo() {
    $("#modalPagarPrestamo").modal("show");
}

$("#modalResultadoBuscar").click(function() {

    var buscarFecha = $("#modalFecha").val();

    if (buscarFecha == "") {

        Swal.fire({
            icon: 'error',
            title: 'Debes ingresar una fecha',
            text: 'Por favor intentalo nuevamente',
            confirmButtonText: 'OK'
        })

    } else {

        var datosCobro = new FormData();
        datosCobro.append("tabla", "compras");
        datosCobro.append("fecha", buscarFecha);

        $.ajax({

            url: "ajax/total.ajax.php",
            method: "POST",
            data: datosCobro,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {

                console.log(respuesta)

                if (respuesta != "") {

                    $("#modalResultadoTotal").text("Total: $ " + respuesta);

                } else {

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

        var table = $('.tablaVentasEncontradas').DataTable();

        table.destroy();

        $(".tablaVentasEncontradas").DataTable({
            "ajax": "ajax/tablaBuscarVentas.ajax.php?fecha=" + buscarFecha,
            "deferRender": false,
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

    }

})


$("#generarCredito").click(function() {

    var clienteCredito = $("#clienteCredito").val();
    var fechaLimite = $("#fechaCredito").val();

    if (clienteCredito != "" && fechaLimite != "") {

        var datosCobro = new FormData();
        datosCobro.append("accion", "Credito");
        datosCobro.append("idVenta", idCredito);
        datosCobro.append("fechaLimite", fechaLimite);

        Swal.fire({
            icon: 'question',
            title: '¿Esta seguro de ofrecer el producto a crédito?',
            text: 'El pago se registrara como Crédito',
            confirmButtonText: 'OK',
            allowOutsideClick: true
        }).then((result) => {

            if (result.isConfirmed) {

                $.ajax({

                    url: "ajax/ventas.ajax.php",
                    method: "POST",
                    data: datosCobro,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(respuesta) {

                        console.log(respuesta)

                        if (respuesta == "ok") {

                            Swal.fire({
                                icon: 'success',
                                title: 'Crédito registrado',
                                text: 'El Crédito ha sido registrado',
                                confirmButtonText: 'OK',
                                allowOutsideClick: false
                            }).then((result) => {

                                if (result.isConfirmed) {

                                    window.location.href = "ordenes";

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

                    }

                })

            }

        })

    } else {

        Swal.fire({
            icon: 'error',
            title: 'Valores incorrectos',
            text: 'Debes llenar todos los campos',
            confirmButtonText: 'OK',
            footer: 'Sentimos las molestias'
        })

    }

})

function Seleccionar(element) {

    $("#clienteVenta").text($(element).attr("cliente"));
    $("#estatusVenta").text("Estatus: " + $(element).attr("estatus"));
    $("#totalVenta").text("Total: $" + $(element).attr("total"));

    var idVenta = $(element).attr("idVenta");

    var productos = $(element).attr("productos").split("!");

    console.log(productos);

    $("#detalleVenta").empty();

    $("#detalleVenta").append(
        "<div class='col-xs-5 col-sm-5 col-md-5 col-lg-5 border-right'><h4 style='color: #333333; margin-top: 15px;'><strong>Descripcion</h4></div>"
        );

    $("#detalleVenta").append(
        "<div class='col-xs-2 col-sm-2 col-md-2 col-lg-2 border-right'><center><h4 style='color: #333333; margin-top: 15px;'><strong>Costo</strong></h4></center></div>"
        );

    $("#detalleVenta").append(
        "<div class='col-xs-2 col-sm-2 col-md-2 col-lg-2 border-right'><center><h4 style='color: #333333; margin-top: 15px;'><strong>Kg</strong></h4></center></div>"
        );

    $("#detalleVenta").append(
        "<div class='col-xs-2 col-sm-2 col-md-2 col-lg-2 border-right'><center><h4 style='color: #333333; margin-top: 15px;'><strong>Importe</strong></h4></center></div>"
        );

    $("#detalleVenta").append("<div class='col-xs-1 col-sm-1 col-md-1 col-lg-1 border-right'><center></center></div>");

    for (var i = 0; i < productos.length; i++) {

        var info = productos[i].split(";");

        $("#detalleVenta").append(
            "<div class='col-xs-5 col-sm-5 col-md-5 col-lg-5 border-right'><h4 style='color: #333333; margin-top: 15px;'>" +
            info[0] + "</h4></div>");

        $("#detalleVenta").append(
            "<div class='col-xs-2 col-sm-2 col-md-2 col-lg-2 border-right'><center><h4 style='color: #333333; margin-top: 15px;'>$ <input id='mod" +
            info[3] + "_Costo' type='number' value='" + info[2] + "' style='width: 50px;'></h4></center></div>");

        $("#detalleVenta").append(
            "<div class='col-xs-2 col-sm-2 col-md-2 col-lg-2 border-right'><center><h4 style='color: #333333; margin-top: 15px;'><input id='mod" +
            info[3] + "_Peso' type='number' value='" + info[1] + "' style='width: 50px;'> kg</h4></center></div>");

        $("#detalleVenta").append(
            "<div class='col-xs-2 col-sm-2 col-md-2 col-lg-2 border-right'><center><h4 style='color: #333333; margin-top: 15px;'>$ " +
            (info[1] * info[2]) + "</h4></center></div>");

        $("#detalleVenta").append(
            "<div class='col-xs-1 col-sm-1 col-md-1 col-lg-1 border-right actualizarPedidos'><span style='background-color: #51bbff; padding-left: 5px; padding-right: 5px; padding-top: 2px; padding-bottom: 2px; color: #ffffff; border-radius: 100%; cursor: pointer;' id='act" +
            info[3] +
            "' class='actualizarCompra'><i class='fa fa-upload' style='margin-top: 17px;'></i></span></div>");

        $("#detalleVenta").append("<span class='col-xs-12 col-sm-12 col-md-12 col-lg-12 border-right'> </span>");

    }

    $('#modalDetalles').modal('show');

}

$("#detalleVenta").on("click", ".actualizarCompra", function() {

    console.log("boton actualizar");

    var idCompra = $(this).attr("id");
    idCompra = idCompra.substr(3, idCompra.length - 1);
    var idCosto = $("#mod" + idCompra + "_Costo").val();
    var idPeso = $("#mod" + idCompra + "_Peso").val();

    var datosCobro = new FormData();
    datosCobro.append("accion", "actualizarProducto");
    datosCobro.append("idCompra", idCompra);
    datosCobro.append("idCosto", idCosto);
    datosCobro.append("idPeso", idPeso);

    console.log(idCompra);
    console.log(idCosto);
    console.log(idPeso);

    Swal.fire({
        icon: 'question',
        title: '¿Esta seguro de modificar este pedido?',
        text: 'Deberas recargar la pagina para ver los cambios',
        confirmButtonText: 'OK',
        allowOutsideClick: true
    }).then((result) => {

        if (result.isConfirmed) {

            $.ajax({

                url: "ajax/ventas.ajax.php",
                method: "POST",
                data: datosCobro,
                cache: false,
                contentType: false,
                processData: false,
                success: function(respuesta) {

                    console.log(respuesta)

                    if (respuesta != "") {

                        Swal.fire({
                            icon: 'success',
                            title: 'Pedido actualizado',
                            text: 'Recarga la pagina para continuar',
                            confirmButtonText: 'OK',
                            allowOutsideClick: false
                        }).then((result) => {

                            if (result.isConfirmed) {

                                window.location.href = "ordenes";

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

                }

            })

        }

    })

})

function Efectivo(element) {

    var idVenta = $(element).attr("idVenta");
    var clienteVenta = $(element).attr("cliente");
    var totalVenta = $(element).attr("total");

    var datosCobro = new FormData();
    datosCobro.append("accion", "Pagado en efectivo");
    datosCobro.append("idVenta", idVenta);

    Swal.fire({
        icon: 'question',
        title: '¿Esta seguro de pagar en efectivo?',
        text: 'El pago se registrara como efectivo',
        confirmButtonText: 'OK',
        allowOutsideClick: true
    }).then((result) => {

        if (result.isConfirmed) {

            $.ajax({

                url: "ajax/ventas.ajax.php",
                method: "POST",
                data: datosCobro,
                cache: false,
                contentType: false,
                processData: false,
                success: function(respuesta) {

                    console.log(respuesta)

                    if (respuesta == "ok") {

                        Swal.fire({
                            icon: 'success',
                            title: 'Pago registrado',
                            text: 'El pago ha sido registrado',
                            confirmButtonText: 'OK',
                            allowOutsideClick: false
                        }).then((result) => {

                            if (result.isConfirmed) {

                                window.location.href = "ordenes";

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

                }

            })

        }

    })

}

function Transferencia(element) {

    var idVenta = $(element).attr("idVenta");
    var clienteVenta = $(element).attr("cliente");
    var totalVenta = $(element).attr("total");

    var datosCobro = new FormData();
    datosCobro.append("accion", "Pagado por transferencia");
    datosCobro.append("idVenta", idVenta);

    Swal.fire({
        icon: 'question',
        title: '¿Esta seguro de pagar por transferencia?',
        text: 'El pago se registrara como pagado por transferencia',
        confirmButtonText: 'OK',
        allowOutsideClick: true
    }).then((result) => {

        if (result.isConfirmed) {

            $.ajax({

                url: "ajax/ventas.ajax.php",
                method: "POST",
                data: datosCobro,
                cache: false,
                contentType: false,
                processData: false,
                success: function(respuesta) {

                    console.log(respuesta)

                    if (respuesta == "ok") {

                        Swal.fire({
                            icon: 'success',
                            title: 'Pago registrado',
                            text: 'El pago ha sido registrado',
                            confirmButtonText: 'OK',
                            allowOutsideClick: false
                        }).then((result) => {

                            if (result.isConfirmed) {

                                window.location.href = "ordenes";

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

                }

            })

        }

    })

}

function Tarjeta(element) {

    var idVenta = $(element).attr("idVenta");
    var clienteVenta = $(element).attr("cliente");
    var totalVenta = $(element).attr("total");

    var datosCobro = new FormData();
    datosCobro.append("accion", "Pagado con tarjeta");
    datosCobro.append("idVenta", idVenta);

    Swal.fire({
        icon: 'question',
        title: '¿Esta seguro de pagar con tarjeta?',
        text: 'El pago se registrara como pagado con tarjeta',
        confirmButtonText: 'OK',
        allowOutsideClick: true
    }).then((result) => {

        if (result.isConfirmed) {

            $.ajax({

                url: "ajax/ventas.ajax.php",
                method: "POST",
                data: datosCobro,
                cache: false,
                contentType: false,
                processData: false,
                success: function(respuesta) {

                    console.log(respuesta)

                    if (respuesta == "ok") {

                        Swal.fire({
                            icon: 'success',
                            title: 'Pago registrado',
                            text: 'El pago ha sido registrado',
                            confirmButtonText: 'OK',
                            allowOutsideClick: false
                        }).then((result) => {

                            if (result.isConfirmed) {

                                window.location.href = "ordenes";

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

                }

            })

        }

    })

}

function Credito(element) {

    $("#modalCredito").modal("show");

    $("#clienteCredito").val("");
    $("#fechaCredito").val("");

    idCredito = $(element).attr("idVenta");

}

var abonoMaximo = 0;

function Abonos(element) {

    var idAbono = $(element).attr("idAbono");

    abonoMaximo = $(element).attr("adeuda");

    $("#modalAbonoTotal").text("Total: $ " + $(element).attr("total"));
    $("#modalAbonoAbonado").text("Abonado: $ " + $(element).attr("abonado"));
    $("#modalAbonoAdeuda").text("Adeuda: $ " + $(element).attr("adeuda"));

    $("#idAbono").val(idAbono);

    $("#metodoPagoAbono").val("efectivo");

    $("#montoAbono").val(abonoMaximo);

    $("#modalAgregarAbono").modal("show");

}

$("#guardarAbono").click(function() {


    var idAbono = $("#idAbono").val();

    var metodoPagoAbono = $("#metodoPagoAbono").val();

    var montoabono = $("#montoAbono").val();

    if (montoabono <= abonoMaximo) {

        var data = new FormData();

        data.append("id", idAbono);
        data.append("monto", montoabono);
        data.append("metodo", metodoPagoAbono);
        data.append("accion", "abonarVenta");

        console.log(data);

        $.ajax({

            url: "ajax/nuevaEntrada.ajax.php",
            method: "POST",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {

                console.log(respuesta)


                if (respuesta == "ok") {

                    Swal.fire({
                        icon: 'success',
                        title: '¡Abono agregado!',
                        text: 'Abono agregado con exito',
                        confirmButtonText: 'OK',
                        allowOutsideClick: false
                    }).then((result) => {

                        if (result.isConfirmed) {

                            window.location.href = "ordenes";

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

            }

        })

    } else {

        Swal.fire({
            icon: 'error',
            title: 'Abono incorrecto',
            text: 'El abono excede la deuda',
            confirmButtonText: 'OK'
        })

    }

});

function Cancelar(element) {

    var idCancelar = $(element).attr("idAbono");

    var datosCobro = new FormData();
    datosCobro.append("accion", "Cancelar");
    datosCobro.append("idCancelar", idCancelar);

    Swal.fire({
        icon: 'question',
        title: '¿Esta seguro de cancelar esta venta?',
        confirmButtonText: 'OK',
        allowOutsideClick: true
    }).then((result) => {

        if (result.isConfirmed) {

            $.ajax({

                url: "ajax/ventas.ajax.php",
                method: "POST",
                data: datosCobro,
                cache: false,
                contentType: false,
                processData: false,
                success: function(respuesta) {

                    console.log(respuesta)

                    if (respuesta == "ok") {

                        Swal.fire({
                            icon: 'success',
                            title: 'La venta ha sido cancelada',
                            confirmButtonText: 'OK',
                            allowOutsideClick: false
                        }).then((result) => {

                            if (result.isConfirmed) {

                                window.location.href = "ordenes";

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

                }

            })

        }

    })

}

$("#prestamoPagar").click(function() {


    var concepto = $("#prestamoConcepto").val();

    var monto = $("#prestamoMonto").val();

    var data = new FormData();

    data.append("concepto", concepto);
    data.append("monto", monto);
    data.append("accion", "Pagar prestamo");

    console.log(data);

    // url: "/ajax/tablaVentasAbiertas.ajax.jtable.php",
    $.ajax({

        url: '/ajax/tabla.php',
        method: 'POST',
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {

            console.log(respuesta)


            if (respuesta == "ok") {

                Swal.fire({
                    icon: 'success',
                    title: 'Pago agregado!',
                    text: 'Pago agregado con exito',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false
                }).then((result) => {

                    if (result.isConfirmed) {

                        window.location.href = "ordenes";

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

        }

    })

});

// FUNCIONES ELMM ASICOM
// FUNCIONES ELMM ASICOM
// FUNCIONES ELMM ASICOM
function showModal(modal){
  $("#"+modal).modal("show");
}
var modalVal1='';
var modalVal1='';
var modalVal1='';

function PagarTiket(metodo,folio,monto){

  if (metodo=='diferido'){
    modalVal1= metodo;
    modalVal2= folio;
    modalVal3= monto;    
    $('#modalPagoDiferidoTiket').modal('show', function (){
      console.log([metodo,folio,monto]);
    });

    /* $('#modalPagoDiferidoTiket').modal('show').then(function (){
      console.log(diferidosDatosFolio);
    }); */
  }else 
  if(metodo=='credito'){
    grabarCreditoAdeudo(folio,monto);
  }
  else{ grabarPago(metodo,folio,monto);}
}

function grabarPago(metodo,folio,monto){
    $.ajax({
        url: "ajax/tiket/pagar.ajax.php",
        method: "POST",
        data:{
        'metodo':metodo,
        'folio':folio,
        'monto':monto 
        },
        cache: false,
        // contentType: false,
        // processData: false,
        success: function(respuesta) {

            //console.log(respuesta)

            if (respuesta == "ok") {

                Swal.fire({
                    icon: 'success',
                    title: 'Se ha cargado a la cuenta de '+metodo,
                    confirmButtonText: 'OK',
                    allowOutsideClick: false
                }).then((result) => {

                    if (result.isConfirmed) {
                    var $cemt = $('[data-record-key='+folio+']');
                    $cemt.css({'pointer-events':'none'});
                    $cemt.css({'opacity':'0.4'});
                    $cemt.css({'background':'#dd4b3982'});
                        //window.location.href = "ventas";

                    }

                });

            } else {

                Swal.fire({
                    icon: 'error',
                    title: 'OPS! algo salio mal con pago '+metodo,
                    text: 'Esto no debería ocurrir, actualiza la página e intenta realizar el pago nuevamente.',
                    confirmButtonText: 'Cerrar',
                    footer: 'GRACIAS.'
                });

            }

        }

    });
}

function grabarCreditoAdeudo(folio,monto){

    Swal.fire({ //?swet inicial con proimt
        icon: 'question',
        title: ' Promesa de pago de Crédito',
        confirmButtonText: 'OK',
        cancelButtonText: `Cerrar`,
        showCancelButton: true,
        allowOutsideClick: false,
            html: '<input id="datePagoCredito" readonly class="swal2-input" required>',
            customClass: 'swal2-overflow',
            onOpen:function(){
                $('#datePagoCredito').datepicker({
                    dateFormat: 'yy-mm-dd'
                });
            }
        // input: 'text', inputAttributes: {autocapitalize: 'off'}
    }).then((result) => {

        if (result.isConfirmed) {
            if(result.value){
                console.log( $('#datePagoCredito').val() );
            }
            if($('#datePagoCredito').val() ==''){
                Swal.fire({ //swet de si pasa algun error, no deberia ocurrir
                    icon: 'error',
                    title: 'No puedes dejar el campo en blanco ',
                    text: 'Debes seleccionar una fecha de promesa de pago del crédito para see asignada al cliente.',
                    confirmButtonText: 'Cerrar',
                    footer: 'GRACIAS.'
                });

            }else{
                //?? ejecuta en caso de que no este vacio 
                var $cemt = $('[data-record-key='+folio+']');
                $cemt.css({'pointer-events':'none'});
                $cemt.css({'opacity':'0.4'});
                $cemt.css({'background':'#dd4b3982'});
                //window.location.href = "ventas";
                $.ajax({
                    url: "ajax/tiket/creditoAdeudo.ajax.php",
                    method: "POST",
                    data:{
                        'metodo':'credito',
                        'folio':folio,
                        'monto':monto,
                        'fecha_promesa': $('#datePagoCredito').val()
                    },
                    cache: false,
                    success: function(respuesta) {
    
                        if (respuesta == "ok crédito cargado") {
    
                            Swal.fire({ //cuando se realizo el cargo correctamente
                                icon: 'success',
                                title: 'Se ha cargado adeudo o crédito ',
                                confirmButtonText: 'OK',
                                allowOutsideClick: false
                            }).then((result) => {
    
                                if (result.isConfirmed) {
                                    window.location.href = "ventas";
                                }else{
                                    console.log('dissm swetalert');
                                }
    
                            });
    
                        } else {
    
                            Swal.fire({ //swet de si pasa algun error, no deberia ocurrir
                                icon: 'error',
                                title: 'OPS! algo salio mal, no se cargó el crédito al cliente ',
                                text: 'Esto no debería ocurrir, actualiza la página e intenta realizar el pago nuevamente.',
                                confirmButtonText: 'Cerrar',
                                footer: 'GRACIAS.'
                            });
    
                        }
    
                    }
    
                });
            }
        }
    });
    
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


//PAGAR CREDITO ADEUDO PRESTAMO
//PAGAR CREDITO ADEUDO PRESTAMO
//PAGAR CREDITO ADEUDO PRESTAMO

function xPC_alert(){
    Swal.fire({
            icon: 'error',
            title: 'Debes rellenar todos los campos',
            text: 'Por favor intentalo nuevamente',
            confirmButtonText: 'OK'
        });
}

$(".pagarCreditoBtnEfectivo").click(function(){
    if ($("#PC_folioUnico").val() =='' || $("#PC_cantidad").val() ==''){
        xPC_alert();
    }else{
        pagarCreditoModalModo("efectivo");
    }
});

$(".pagarCreditoBtnTarjeta").click(function(){
    if ($("#PC_folioUnico").val() =='' || $("#PC_cantidad").val() ==''){
        xPC_alert();
    }else{
        pagarCreditoModalModo("tarjeta");
    }
});

$(".pagarCreditoBtnTrans").click(function(){
    if ($("#PC_folioUnico").val() =='' || $("#PC_cantidad").val() ==''){
        xPC_alert();
    }else{
        pagarCreditoModalModo("transferencia");
    }
});

function pagarCreditoModalModo(modo){
    console.log(modo);
    let folioUnico = $("#PC_folioUnico").val();
    let cantidadPagoCredito= $("#PC_cantidad").val();
    if ($("#PC_cantidad")== ''){
        xPC_alert();
    }

    $.ajax({
        url: "ajax/tiket/pagarCredito.ajax.php",
        method: "POST",
        data: {'cantidad':cantidadPagoCredito, 'modo':modo,'folioUnico':folioUnico},
        cache: false,
        // contentType: false,
        // processData: false,
        success: function(respuesta) {
            console.log(respuesta);
            if (respuesta == "ok pago crédito") {
                Swal.fire({
                    icon: 'success',
                    title: '¡se abonó '+cantidadPagoCredito+' al folio ! '+folioUnico+', con '+modo ,
                    text: 'se ha abonado correctamente.',
                    confirmButtonText: 'Continuar',
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "inicio";
                    }
                });
            } else {
                Swal.fire({
                    icon: 'error Pago de crédito',
                    title: 'Ha ocurrido un error al hacer abono del tiket'+folioUnico,
                    text: 'intenta nuevamente.',
                    confirmButtonText: 'Cerrar',
                    footer: 'Sentimos las molestias'
                });
            }
        }
    });
}

</script>

<!-- datepiker style -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/flick/jquery-ui.css"/>