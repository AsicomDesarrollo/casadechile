<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once "../modelos/conexion.php";

$inicio = $_POST["inicio"];
$objetivo = $_POST["objetivo"];

//$stmt = Conexion::conectar()->prepare("SELECT * FROM configuracion WHERE nombre like '%$valor%' ");

$stmt = Conexion::conectar()->prepare("UPDATE configuracion SET objetivo = :objetivo, inicio = :inicio");

$stmt->bindParam(":objetivo", $objetivo, PDO::PARAM_STR);
$stmt->bindParam(":inicio", $inicio, PDO::PARAM_STR);

if ($stmt -> execute()) {

	echo "ok";

}else{

	echo "error";

}