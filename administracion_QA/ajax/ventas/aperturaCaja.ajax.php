<?php
// echo "entrando a la petición post";
// echo "total: ";
$iniCaja = $_REQUEST['iniCaja'];

require_once "../../controladores/inicio.controlador.php";
require_once "../../modelos/inicio.modelo.php";



//todo: Es el capital con el que se inicializa la caja
/* $stmt = Conexion::conectar()->prepare("select sum(monto) cantidad from inicio_caja where corte_caja is null ");
$stmt->execute();
$inicio_caja = $stmt -> fetchAll(PDO::FETCH_ASSOC)[0]['cantidad']; */



$sql = "INSERT into inicio_caja ( monto , fecha_inicio, fecha_fin , corte_caja)
values ($iniCaja, now(), now(), NULL )";

$stmt = Conexion::conectar()->prepare($sql);
if($stmt->execute()){
    print "Apertura de caja OK";
}
else{
    echo "<pre>error al aperturar la caja: ";
    print_r($sql);
    echo "</pre>";
    exit();
}

exit();
?>