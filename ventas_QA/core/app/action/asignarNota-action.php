<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');


$idempleado = $_REQUEST["empleado"];
$idnota = $_REQUEST["nota"];
$idfolio = $_REQUEST["folio"];


$sql="UPDATE venta_tiket SET  vendedor = '$idempleado'  WHERE id = '$idnota' AND folio = '$idfolio' ";
$base = new Database();
$con= $base->connect();
$query = $con->query($sql);


//var_dump($query);

if($query !== false )
{
    echo "success";
}else{
    echo "error";
}
 
//echo json_encode($valores);