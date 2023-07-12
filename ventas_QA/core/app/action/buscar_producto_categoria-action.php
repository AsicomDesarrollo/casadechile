<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

$valor = $_REQUEST["valor"];

if($valor == 0){
    $sql = "SELECT p.id , p.nombre , p.precio , p.minimo , p.maximo , p.imagen , p.fecha , c.nombre as categoria
            FROM productos as p 
            left JOIN categorias as c
            on p.categoria = c.id
            order by p.nombre asc;";
}else{
    $sql = "SELECT p.id , p.nombre , p.precio , p.minimo , p.maximo , p.imagen , p.fecha , c.nombre as categoria
            FROM productos as p 
            left JOIN categorias as c
            on p.categoria = c.id
            WHERE c.id = ".$valor."
            order by p.nombre asc;";
}


$base = new Database();
$con= $base->connect();
$query = $con->query($sql);
$valores= Model::many_assoc($query);
echo json_encode($valores);