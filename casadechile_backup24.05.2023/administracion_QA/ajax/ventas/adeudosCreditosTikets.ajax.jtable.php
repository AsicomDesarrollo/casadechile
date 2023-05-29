<?php

require_once "../../controladores/ventas.controlador.php";
require_once "../../modelos/ventas.modelo.php";

class TablaVentas{

  /*=============================================
  MOSTRAR LA TABLA DE VENTAS ABIERTAS O TODOS LOS TIKETS
  =============================================*/

  public function mostrarTabla(){	//mostrar todos los pagos de todos los tikets
    $R = $_REQUEST;
    $limitSup = $_REQUEST["jtPageSize"]??25; //registros por página
    $limitInf = $_REQUEST["jtStartIndex"]??0; // número de página * (registros por página)
    $pageView = $R['pageView']??1;
    $orden = 'order by '.($R['jtSorting']??' folio ASC ');

    //? Cuenta todas las ventas abiertas.
    $stmt_total= Conexion::conectar()->prepare("select count(id) tiket_adeudos from venta_tiket where monto_adeudo <> '' ");
    $stmt_total-> execute();
		$query_total = $stmt_total -> fetchAll(PDO::FETCH_CLASS)[0]->tiket_adeudos;
    
    //? Actualiza valores.
    $paginas = round($query_total /  $limitSup);
    $result['TotalRecordCount']= $query_total;
    $result['rowTotal']= $query_total;
    $result['pages']= $paginas;
    $result['jtStartIndex']= $limitInf *  $pageView;
    $result['jtPageSize']=  $limitSup;

  
    //? Trae todas las ventas abiertas y filtra por controles.
    //validado es el parametro que se actualiza con el corte de caja
		$stmt = Conexion::conectar()->prepare("SELECT * FROM venta_tiket where monto_adeudo <> '' ".$orden." limit ".$limitInf.",". $limitSup);
		$stmt -> execute();
		$datosTiket = $stmt -> fetchAll(PDO::FETCH_CLASS);

    $jTableResult = array();
    $jTableResult['Result'] = "OK";
    $jTableResult['data'] = "Lista de todos los adeudos en los tikets";
    $jTableResult['TotalRecordCount'] = $query_total;
    $jTableResult['Records'] = $datosTiket;
    print json_encode($jTableResult);
  }
  



  /*=============================================
  MOSTRAR LA TABLA DATOS DE UN TIKET GET
  =============================================*/
  public function mostrarTabla_tiket($tiket){	
    $R = $_REQUEST;
    $limitSup = $_REQUEST["jtPageSize"]??25; //registros por página
    $limitInf = $_REQUEST["jtStartIndex"]??0; // número de página * (registros por página)
    $pageView = $R['pageView']??1;
    $orden = 'order by '.($R['jtSorting']??' id ASC ');

    //? Cuenta todas las ventas abiertas.
    $stmt_total= Conexion::conectar()->prepare("select count(folio_unico) totalPagos from tiket_pagos WHERE folio_unico = '".$tiket."' ");
    $stmt_total-> execute();
		$query_total = $stmt_total -> fetchAll(PDO::FETCH_CLASS)[0]->totalPagos;
    
    //? Actualiza valores.
    $paginas = round($query_total /  $limitSup);
    $result['TotalRecordCount']= $query_total;
    $result['rowTotal']= $query_total;
    $result['pages']= $paginas;
    $result['jtStartIndex']= $limitInf *  $pageView ;
    $result['jtPageSize']=  $limitSup;

  
    //? Trae todas las ventas abiertas y filtra por controles.
    //validado es el parametro que se actualiza con el corte de caja
		$stmt = Conexion::conectar()->prepare("SELECT * FROM tiket_pagos WHERE folio_unico = '".$tiket."' ".$orden." limit ".$limitInf.",". $limitSup);
		$stmt -> execute();
		$datosTiket = $stmt -> fetchAll(PDO::FETCH_CLASS);


    foreach ($datosTiket as $key => $value) {
      //?agrega costo por concepto kg*precio
      $costo = substr($value->precio,0,1);
          if($costo!='-'){
              $value->costoUnit = $value->precio * $value->peso;
          }else{
          //la cantidad es negativa
              $value->costoUnit = $value->precio * $value->peso;
          }

    }

    $jTableResult = array();
    $jTableResult['Result'] = "OK";
    $jTableResult['data'] = "Lista de pagos del tiket";
    $jTableResult['TotalRecordCount'] = $query_total;
    $jTableResult['Records'] = $datosTiket;
    print json_encode($jTableResult);
  }

}

/*=============================================
ACTIVAR TABLA SEGUN EL POST O GET
=============================================*/ 
$activar = new TablaVentas();
if($_REQUEST['tiket']){ //productos del tiket
  $activar -> mostrarTabla_tiket($_REQUEST['tiket']); 
}else{ // todas las ventas , todos los tikets abiertos.
  $activar -> mostrarTabla(); 
}

// http://localhost/casadelchile/ajax/tablaVentasAbiertas.ajax.jtable.php?jtStartIndex=0&jtPageSize=10&jtSorting=fecha%20ASC
// http://localhost/casadelchile/ajax/tablaVentasAbiertas.ajax.jtable.php?jtStartIndex=0&jtPageSize=10&jtSorting=folio%20ASC

