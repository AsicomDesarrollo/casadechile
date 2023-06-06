<?php
// echo "entrando a la petición post";
// echo "total: ";
// print_r($_REQUEST['total']);

ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL & ~E_DEPRECATED);

require_once "../../controladores/inicio.controlador.php";
require_once "../../modelos/inicio.modelo.php";


//?? comprobar total en cajaDB (vCorEfectivoCaja) vs total entrante ($_REQUES[total]);
$vCorEfectivoCaja = ModeloInicio::ventasCorteEfectivoCaja(); //ventas en efectivo más inicio de caja
$totalEntranteCorte = $_REQUEST['total'];

// print_r($vCorEfectivoCaja);
$DiferenciaEfectivo = $vCorEfectivoCaja - $totalEntranteCorte;

// contar si existe diferencia entre los totales.

// A) insertar folio de corte de caja en DB

// ------------- recuperar indices
$fecha_inicio = "SELECT fecha_pago FROM `venta_tiket` WHERE corte_caja IS NULL and fecha_pago is not null order by id ASC limit 1";
$fecha_fin = "SELECT fecha_pago FROM `venta_tiket` WHERE corte_caja IS NULL and fecha_pago is not null order by id DESC limit 1";
$folio_unico_inicial = "SELECT folio FROM `venta_tiket` WHERE corte_caja IS NULL and fecha_pago is not null order by id ASC limit 1";
$folio_unico_final = "SELECT folio FROM `venta_tiket` WHERE corte_caja IS NULL and fecha_pago is not null order by id DESC limit 1";

$stmt = Conexion::conectar()->prepare("select (SELECT fecha_pago FROM `venta_tiket` WHERE corte_caja IS NULL and fecha_pago is not null order by id ASC limit 1) fecha_inicio,
(SELECT fecha_pago FROM `venta_tiket` WHERE corte_caja IS NULL and fecha_pago is not null order by id DESC limit 1) fecha_fin,
(SELECT folio FROM `venta_tiket` WHERE corte_caja IS NULL and fecha_pago is not null order by id ASC limit 1) folio_unico_inicial,
(SELECT folio FROM `venta_tiket` WHERE corte_caja IS NULL and fecha_pago is not null order by id DESC limit 1) folio_unico_final");
$stmt->execute();
$data =  $stmt -> fetchAll(PDO::FETCH_ASSOC)[0];

$fecha_inicio = $data['fecha_inicio'];
$fecha_fin = $data['fecha_fin'];
$folio_unico_inicial = $data['folio_unico_inicial'];
$folio_unico_final = $data['folio_unico_final'];

// ------------- recuperar indices

$monto_efectivo = ModeloInicio::ventasCorteEfectivo()[0]['cantidad']??0;
$monto_tarjeta = ModeloInicio::ventasCorteTarjeta()[0]['cantidad']??0;
$monto_transferencia =ModeloInicio::ventasCorteTransferencia()[0]['cantidad']??0;

$monto_credito =   ModeloInicio::ventasCorteCreditosTodos()[0]['cantidad']??0; //pagos de creditos sin importar el metodo
$monto_abonos =  ModeloInicio::ventasCortePagosCreditos()[0]['cantidad']??0; //pagos de creditos sin importar el metodo

$monto_abonos_efectivo = ModeloInicio::ventasCortePagosCreditosMetodos('efectivo')[0]['cantidad']??0;
$monto_abonos_tarjeta = ModeloInicio::ventasCortePagosCreditosMetodos('tarjeta')[0]['cantidad']??0;
$monto_abonos_transferencia = ModeloInicio::ventasCortePagosCreditosMetodos('transferencia')[0]['cantidad']??0;


$monto_efectivo_al_corte = $_REQUEST['total']??0;
$diferenciaEfectivo = $DiferenciaEfectivo??0;
$venta_total = ModeloInicio::ventasCorte()[0]['cantidad']??0;
$inicio_caja = ModeloInicio::ventasCorteInicioCaja()[0]['cantidad']??0;

$gastos_totales = ModeloInicio::ventasCorteGastos()[0]['cantidad']??0;
$gastos_proveedores = ModeloInicio::ventasCorteGastosProveedores()[0]['cantidad']??0;
$gastos_dia = ModeloInicio::ventasCorteGastosDia()[0]['cantidad']??0;

$sql = "INSERT into corte_caja (
fecha_corte, fecha_inicio, fecha_fin, folio_unico_inicial, folio_unico_final, monto_efectivo, monto_tarjeta, monto_transferencia, monto_credito, monto_abonos, monto_abono_efectivo, monto_abono_tarjeta, monto_abono_transfer, monto_efectivo_al_corte,diferencia_efectivo, venta_total, inicio_caja, gastos_totales, gastos_proveedores, gastos_dia)
values (
now() , '$fecha_inicio', '$fecha_fin', '$folio_unico_inicial', '$folio_unico_final', $monto_efectivo, $monto_tarjeta, $monto_transferencia, $monto_credito, $monto_abonos, $monto_abonos_efectivo, $monto_abonos_tarjeta,$monto_abonos_transferencia, $monto_efectivo_al_corte, $diferenciaEfectivo, $venta_total, $inicio_caja, $gastos_totales, $gastos_proveedores, $gastos_dia
)";

/* echo "<pre>antes de cargar ";
print_r($sql);
echo "</pre>";
exit(); */

$stmt = Conexion::conectar()->prepare($sql);
if($stmt->execute()){

    //! recuperar el last insert id
    //$sql = "select LAST_insert_id() ultimo";
    $sql = "SELECT id ultimo from corte_caja order by id DESC limit 1;";
    $stmt = Conexion::conectar()->prepare($sql);
    if($stmt->execute()){
        $last_id = $stmt -> fetchAll(PDO::FETCH_ASSOC);

        //! actualizar todas las tablas donde no tenga carte de caja.
        $sqlUp = "update venta_tiket set corte_caja = ".$last_id[0]['ultimo']." where corte_caja is null;";
        $sqlUp .= "update venta_gastos set corte_caja = ".$last_id[0]['ultimo']." where corte_caja is null;";
        $sqlUp .= "update tiket_pagos set corte_caja = ".$last_id[0]['ultimo']." where corte_caja is null;";
        $sqlUp .= "update tiket_adeudos set corte_caja = ".$last_id[0]['ultimo']." where corte_caja is null;";
        $sqlUp .= "update inicio_caja set corte_caja = ".$last_id[0]['ultimo']." where corte_caja is null;";
        // echo $sqlUp;exit();

        $stmtup = Conexion::conectar()->prepare($sqlUp);
        if(!$stmtup->execute()){
            echo "corte de caja cargado.";exit();
        }else{
            echo "erro al editar venta_tiket set corte_caja.";exit();
        }
        
    }
}
else{
    echo "<pre>error al insertar el corte de caja: ";
    print_r($sql);
    echo "</pre>";
    exit();
}




//?TODAS LAS SUMAS
// generar suma de efectivo entrante.
// generar suma de transferencias entrantes
// generar suma de depositos p/tarjeta entrantes
// generar suma de creditos otorgados en el corte.
// generar suma de Creditos Pagaos en el corte
// generar suma de venta total
// generar suma de gastos totales
// cuadrar corte de efectivo con gastos (todo el efectivo menos gastos)

//? ultimo paso
//! hacer UPDATE en todos los pagos, todos los creditos, y todos los tikets, y todos los productos que no tengan corte, poniendo el FOLIO  "corte de caja" A)

//esto deberia resetear todo, hasta el efectivo en caja.


exit();
?>


<!-- INSERT into corte_caja (
fecha_corte, fecha_inicio, fecha_fin, folio_unico_inicial, folio_unico_final, monto_efectivo, monto_tarjeta, monto_transferencia, monto_credito, monto_abonos, monto_abono_efectivo, monto_abono_tarjeta, monto_abono_transfer, monto_efectivo_al_corte,diferencia_efectivo, venta_total, inicio_caja, gastos_totales, gastos_proveedores, gastos_dia)
values (
now() , (SELECT fecha_pago FROM `venta_tiket` WHERE corte_caja IS NULL and fecha_pago is not null order by id ASC limit 1), (SELECT fecha_pago FROM `venta_tiket` WHERE corte_caja IS NULL and fecha_pago is not null order by id DESC limit 1), (SELECT folio FROM `venta_tiket` WHERE corte_caja IS NULL and fecha_pago is not null order by id ASC limit 1), (SELECT folio FROM `venta_tiket` WHERE corte_caja IS NULL and fecha_pago is not null order by id DESC limit 1), 30430, 8587, 6260, 21622, 150, 150, 0,0, 27660, 20, 45277, 1500, 4250, 4000, 250
); -->