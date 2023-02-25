<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

class TablaVentas{

  /*=============================================
  MOSTRAR LA TABLA DE VENTAS
  =============================================*/

  public function mostrarTabla(){	

  	$link = new PDO("mysql:host=localhost;dbname=casadelc_bodega",
						"casadelc_bodega",
						"Rzoydcdzna58",
						array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		                      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
						);

  	$stmt = $link->prepare("SELECT * FROM compras WHERE id >= 1139 ORDER BY id ASC");

	$stmt -> execute();

	$ventas = $stmt -> fetchAll();

	$inicio = 332;

	$venta = "";

	$sumar = 0;
	$nuevoid = 0;

	$idActualizar = 0;

	$conexion = mysqli_connect("localhost", "casadelc_bodega", "Rzoydcdzna58", "casadelc_bodega");

    for($i = 0; $i < count($ventas); $i++){

		if($venta != $ventas[$i]["id_venta"]){

			$sumar = $ventas[$i]["id_venta"];

			$nuevoid = $inicio + $sumar;

			$idActualizar = $ventas[$i]["id"];

			mysqli_query($conexion,"UPDATE compras SET id_venta = '$nuevoid' WHERE id = $idActualizar") or die(mysqli_error($conexion));

		}else{

			$idActualizar = $ventas[$i]["id"];

			mysqli_query($conexion,"UPDATE compras SET id_venta = '$nuevoid' WHERE id = $idActualizar") or die(mysqli_error($conexion));

		}

		$venta = $ventas[$i]["id_venta"];

	} 
  	
  	var_dump($ventas);	

  }

}

/*=============================================
ACTIVAR TABLA DE VENTAS
=============================================*/ 
$activar = new TablaVentas();
$activar -> mostrarTabla(); 

