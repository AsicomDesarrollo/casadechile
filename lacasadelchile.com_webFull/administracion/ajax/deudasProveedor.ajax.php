<?php

require_once "../controladores/entradas.controlador.php";
require_once "../modelos/entradas.modelo.php";

class DeudasProveedor{

  /*=============================================
  MOSTRAR LAS DEUDAS DEL PROVEEDOR
  =============================================*/

  public $id;

  public function mostrarDeudasProveedor(){

    $id = $this->id;

    $info = array();
    
    $datosJson = array();

  	$respuesta = ControladorEntradas::ctrMostrarDeudasProveedor($id);

    foreach ($respuesta as $key => $value) {

      $producto = ControladorEntradas::ctrMostrarEntradaEspecifica($value["producto"]);

      $abonos = ControladorEntradas::ctrTraerAbonoEntradas($value["id"]);

      $sumaAbonos = 0;

      foreach ($abonos as $key2 => $abonado) {

        $sumaAbonos += $abonado["monto"];

      }

      $total = $value["peso"] * $value["precio"];

      if($total > $sumaAbonos){

        $datosFecha = explode(" ", $value["fecha"]);

        $fechaOrdenada = explode("-", $datosFecha[0]);

        $datosJson['producto'] = $producto["nombre"];
        $datosJson['monto'] = number_format($total);
        $datosJson['abonado'] = number_format($sumaAbonos);
        $datosJson['fecha'] = $fechaOrdenada[2].'/'.$fechaOrdenada[1].'/'.$fechaOrdenada[0];

        array_push($info, $datosJson);
      
      }

    }

		echo json_encode($info);

  }

}

/*=============================================
ACTIVAR TABLA DE PRODUCTOS
=============================================*/ 
$activarProveedor = new DeudasProveedor();
$activarProveedor -> id = $_POST["id"];
$activarProveedor -> mostrarDeudasProveedor();