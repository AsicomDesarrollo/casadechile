<?php

$stmt = Conexion::conectar()->prepare("SELECT * FROM compras WHERE id_venta = '1632594178'");
$stmt -> execute();
$datosTiket = $stmt -> fetchAll(PDO::FETCH_CLASS);
// echo json_encode($datosTiket);
//Return result to jTable

foreach ($datosTiket as $key => $value) {
$costo = substr($value->precio,0,1);
    if($costo!='-'){
        $value->costoUnit = $value->precio * $value->peso;
    }else{
    //la cantidad es negativa
        $value->costoUnit = $value->precio * $value->peso;
    }
}

print_r($_SESSION);
