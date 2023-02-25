<?php
//ajax para pagar los creditos desde dashboard inicio.

error_reporting(E_ALL);
ini_set('display_errors', '1');
ob_start();
session_start();

date_default_timezone_set("America/Mexico_City");
$fecha = date("Y-m-d H:i:s");
require_once "../../modelos/conexion.php";

$folio = $_REQUEST["folioUnico"];
$cantidad = $_REQUEST["cantidad"];
$modo = $_REQUEST["modo"];

$pagoExhibicion=1;
$debe = 0;
$fechaPago= $fecha;

$user = $_SESSION['nombre']." ".$_SESSION['paterno']." - email:".$_SESSION['email'];
//$stmt = Conexion::conectar()->prepare("SELECT * FROM configuracion WHERE nombre like '%$valor%' ");

/* 
    [id] => 3
    [sucursal] => 1
    [vendedor] => 6
    [folio] => 1640022586
    [cliente_id] => 0
    [cliente] => Venta General
    [metodoPago] => diferido
    [monto_total] => 450
    [monto_iva] => 
    [monto_pago] => 75
    [monto_adeudo] => 375
    [estatus] => pagado
    [fecha_creacion] => 2021-12-20 11:49:46
    [fecha_pago] => 2021-12-20 12:13:28
    [fecha_adeudo] => 2021-12-20 12:13:28
    [fecha_pago_adeudo] => 
    [fecha_promesa_adeudo] => 
    [corte_caja] => 
*/

//?? traer datos del tiket
$stmt = Conexion::conectar()->prepare("Select * from venta_tiket where folio = '".$folio."'");
$stmt -> execute();
$datosTiket = $stmt -> fetchAll(PDO::FETCH_CLASS)[0];

$old_monto_total = $datosTiket->monto_total;
$old_monto_pago = $datosTiket->monto_pago;
$old_monto_adeudo = $datosTiket->monto_adeudo;

/* echo "<pre>";
print_r($datosTiket->monto_total);
echo "</pre>";
exit(); */

//?? operaciones

//resta del adeudo vs cantidad pagada
$new_monto_adeudo = $old_monto_adeudo - $cantidad;

$new_monto_pago = $old_monto_pago + $cantidad;

//comprobacion de adeudos

if( $old_monto_total == $new_monto_pago){
    //se cancela la deuda
    $debe = 0;
}
else{
    $debe = 1;
}



//?actualizar tiket de compra
$stmt = Conexion::conectar()->prepare("
UPDATE venta_tiket SET monto_pago=:monto, monto_adeudo=:monto_adeudo, fecha_pago_adeudo=:fechaPago  where folio = :folio
");
$stmt->bindParam(":folio", $folio, PDO::PARAM_STR);
// $stmt->bindParam(":metodo", $modo, PDO::PARAM_STR);
$stmt->bindParam(":monto", $new_monto_pago, PDO::PARAM_INT);
$stmt->bindParam(":monto_adeudo", $new_monto_adeudo, PDO::PARAM_INT);
$stmt->bindParam(":fechaPago", $fechaPago, PDO::PARAM_STR);

if ($stmt -> execute()) {// si editar el tiket sale bien,continua
    //?agregar tiket de pago
	$stmt=Conexion::conectar()->prepare("
    insert into tiket_pagos(folio_unico,metodoPago,cantidad,pagoExhibicion,debe,fechaPago,diferido,usuario,credito) 
    values(:folio_unico,:metodoPago,:cantidad,1,:debe,:fechaPago,0,:usuario,1);");

    $stmt->bindParam(":folio_unico", $folio, PDO::PARAM_STR);
    $stmt->bindParam(":metodoPago", $modo, PDO::PARAM_STR);
    $stmt->bindParam(":cantidad", $cantidad, PDO::PARAM_INT);
    // $stmt->bindParam(":pagoExhibicion", $pagoExhibicion, PDO::PARAM_INT);
    $stmt->bindParam(":debe", $debe, PDO::PARAM_INT);
    $stmt->bindParam(":fechaPago", $fechaPago, PDO::PARAM_STR);
    // $stmt->bindParam(":diferido", $diferido, PDO::PARAM_INT);
    $stmt->bindParam(":usuario", $user, PDO::PARAM_STR);
    if ($stmt -> execute()) { //si genera el tiket de pago del adeudo del credito
        //? marcar adeudo como finiquitado! pagado, cancelado.
        //si aun debe, no retira deuda

        // si ya no debe, pone la deuda en ceros
            $stmt=Conexion::conectar()->prepare("
            UPDATE tiket_adeudos SET cantidad = :monto_adeudo, debe = :debe,  fechaPago= :fechaPago where folio_unico = :folio_unico
            ");
            $stmt->bindParam(":folio_unico", $folio, PDO::PARAM_STR);
            $stmt->bindParam(":monto_adeudo", $new_monto_adeudo, PDO::PARAM_INT);
            $stmt->bindParam(":debe", $debe, PDO::PARAM_INT);
            $stmt->bindParam(":fechaPago", $fechaPago, PDO::PARAM_STR);

            if ($stmt -> execute()) {//si edita el estatus de todos los productos del folio unico. ok
                echo "ok pago crédito";
            }else{
                echo "algo salio mal tiket_adeudos "; 
            }
    }else{
        echo "algo salio mal tiket_pagos del adeudo";
    }
}else{
	echo "error al editar el tiket venta_tiket";
}