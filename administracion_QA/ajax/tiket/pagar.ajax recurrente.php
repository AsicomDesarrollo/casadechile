<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
ob_start();
session_start();

date_default_timezone_set("America/Mexico_City");
$fecha = date("Y-m-d H:i:s");
require_once "../../modelos/conexion.php";

$folio = $_REQUEST["folio"];
$metodo = $_REQUEST["metodo"];
$monto = $_REQUEST["monto"];

$pagoExhibicion=1;
$debe = 0;
$fechaPago= $fecha;
$diferido=0;
$user = $_SESSION['nombre']." ".$_SESSION['paterno']." - email:".$_SESSION['email'];
//$stmt = Conexion::conectar()->prepare("SELECT * FROM configuracion WHERE nombre like '%$valor%' ");

$stmt = Conexion::conectar()->prepare("
UPDATE venta_tiket SET metodoPago = :metodo, monto_pago=:monto, estatus='pagado', fecha_pago=:fechaPago  where folio = :folio
");
$stmt->bindParam(":folio", $folio, PDO::PARAM_STR);
$stmt->bindParam(":metodo", $metodo, PDO::PARAM_STR);
$stmt->bindParam(":monto", $monto, PDO::PARAM_STR);
$stmt->bindParam(":fechaPago", $fechaPago, PDO::PARAM_STR);
if ($stmt -> execute()) {
	$stmt=Conexion::conectar()->prepare("
                insert into tiket_pagos(folio_unico,metodoPago,cantidad,pagoExhibicion,debe,fechaPago,diferido,usuario) 
                values(:folio_unico,:metodoPago,:cantidad,:pagoExhibicion,:debe,:fechaPago,:diferido,:usuario);");

                $stmt->bindParam(":folio_unico", $folio, PDO::PARAM_STR);
                $stmt->bindParam(":metodoPago", $metodo, PDO::PARAM_STR);
                $stmt->bindParam(":cantidad", $monto, PDO::PARAM_INT);
                $stmt->bindParam(":pagoExhibicion", $pagoExhibicion, PDO::PARAM_INT);
                $stmt->bindParam(":debe", $debe, PDO::PARAM_INT);
                $stmt->bindParam(":fechaPago", $fechaPago, PDO::PARAM_STR);
                $stmt->bindParam(":diferido", $diferido, PDO::PARAM_INT);

                $stmt->bindParam(":usuario", $user, PDO::PARAM_STR);
                $stmt -> execute();
				if ($stmt -> execute()) {
					echo "ok";
				}else{
					echo "algo salio mal";
				}
	
}else{
	echo "error";
}