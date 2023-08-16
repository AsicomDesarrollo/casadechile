<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
header('Content-Type: text/html; charset=utf-8');


/* $sql="SELECT id, rol, concat( nombre , ' ' , paterno , ' ' , materno ) as nombre_empleado  FROM `empleados` WHERE estatus = 1 ";
$base = new Database();
$con= $base->connect();
$query = $con->query($sql);


if($query !== false )
{
    $valores= Model::many_assoc($query);
    echo json_encode(  $valores ) ;
    

}else{
    echo "error no se pueden mostrar los empleados activos.";
} */

class Empleados{
	
    public static $clientesTB = "empleados";

    public static function mostrarTodos(){

        $sql="SELECT id, rol, concat( nombre , ' ' , paterno , ' ' , materno ) as nombre_empleado  FROM ". self::$clientesTB ."  WHERE estatus = 1  ORDER BY id ASC";
        $query =Database::ExeDoIt($sql);
        $data = Model::many_assoc($query[0]);
        return $data;
    }


}
 
//echo json_encode($valores);