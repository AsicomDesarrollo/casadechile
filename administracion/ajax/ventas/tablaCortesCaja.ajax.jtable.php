<?php

require_once "../../controladores/ventas.controlador.php";
require_once "../../modelos/ventas.modelo.php";

class TablaVentas{

  /*=============================================
  MOSTRAR LA TABLA DE VENTAS ABIERTAS O TODOS LOS TIKETS
  =============================================*/

  public function mostrarTabla(){	
    $R = $_REQUEST;
    $limitSup = $_REQUEST["jtPageSize"]??25; //registros por página
    $limitInf = $_REQUEST["jtStartIndex"]??0; // número de página * (registros por página)
    $pageView = $R['pageView']??1;
    $orden = 'order by '.($R['jtSorting']??' id DESC ');

    //? Cuenta todas las ventas abiertas.
    $stmt_total= Conexion::conectar()->prepare("select count(id) totalCortes from corte_caja ".$orden);
    $stmt_total-> execute();
		$query_total = $stmt_total -> fetchAll(PDO::FETCH_CLASS)[0]->totalCortes;
    
    //? Actualiza valores.
    $paginas = round($query_total /  $limitSup);
    $result['TotalRecordCount'] = $query_total;
    $result['rowTotal'] = $query_total;
    $result['pages'] = $paginas;
    $result['jtStartIndex'] = $limitInf * $pageView;
    $result['jtPageSize'] =  $limitSup;

  
    //? Trae todas las ventas abiertas y filtra por controles.
		$stmt = Conexion::conectar()->prepare("SELECT * FROM corte_caja ".$orden." limit ".$limitInf.",". $limitSup);
		$stmt -> execute();
		$datosCorteCaja = $stmt -> fetchAll(PDO::FETCH_CLASS);
    // print_r( $datosCorteCaja[0]->id);
    
    $demo=[];
    foreach ($datosCorteCaja as $k) {
      foreach ($k as $key => $value) {
        //$demo[$key]-> {"item"= "cero"};
        if (
          $key == 'id' || 
          $key == 'fecha_corte' || 
          $key == 'fecha_inicio' || 
          $key == 'fecha_fin' || 
          $key == 'folio_unico_inicial' || 
          $key == 'folio_unico_final' ){
            // $demo[$k][$key] = $value;
            continue;
        }
        else{
          $val = number_format($value);
          //print_r($value);
          //print_r($datosCorteCaja[$k]->$key);
        }
      }
     
    }

    /* 
    [id] => 1 
    [fecha_corte] => 2021-12-14 18:43:27 
    [fecha_inicio] => 2021-10-27 17:10:57 
    [fecha_fin] => 2021-10-28 17:14:07 
    [folio_unico_inicial] => 1632592762 
    [folio_unico_final] => 1635458221 
    [monto_efectivo] => 30430 
    [monto_tarjeta] => 8587 
    [monto_transferencia] => 6260 
    [monto_credito] => 150 
    [monto_abonos] => 0 
    [monto_efectivo_al_corte] => 27680 
    [diferencia_efectivo] => 0 
    [venta_total] => 45277 
    [inicio_caja] => 1500 
    [gastos_totales] => 4250 
    [gastos_proveedores] => 4000 
    [gastos_dia] => 250 
    */
    

    $jTableResult = array();
    $jTableResult['Result'] = "OK";
    $jTableResult['data'] = "Lista de Cortes de caja";
    $jTableResult['TotalRecordCount'] = $query_total;
    $jTableResult['Records_demo'] = $demo;
    $jTableResult['Records'] = $datosCorteCaja;
    print json_encode($jTableResult);



    /* $orden = $_REQUEST["jtSorting"];
    $limitInf = $_REQUEST["jtStartIndex"];
    $limitSup = $_REQUEST["jtPageSize"];
    $vendedor = $_REQUEST["vendedor"];
    $numempleado = $_SESSION["sesAdministracion"];

		$stmt = Conexion::conectar()->prepare("SELECT * FROM venta_tiket WHERE estatus = 'abierto' and vendedor LIKE '%$vendedor%' ORDER BY $orden LIMIT $limitInf, $limitSup");
		$stmt -> execute();
		$ventas = $stmt -> fetchAll(PDO::FETCH_CLASS);

    $jTableResult = array();
    $jTableResult['Result'] = "OK";
    $jTableResult['TotalRecordCount'] = count($ventas);
    $jTableResult['Records'] = $ventas;
    print json_encode($jTableResult); */


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
    $stmt_total= Conexion::conectar()->prepare("select count(id_venta) totalProductos from compras WHERE id_venta = '".$tiket."' ");
    $stmt_total-> execute();
		$query_total = $stmt_total -> fetchAll(PDO::FETCH_CLASS)[0]->totalProductos;
    
    //? Actualiza valores.
    $paginas = round($query_total /  $limitSup);
    $result['TotalRecordCount']= $query_total;
    $result['rowTotal']= $query_total;
    $result['pages']= $paginas;
    $result['jtStartIndex']= $limitInf *  $pageView ;
    $result['jtPageSize']=  $limitSup;

  
    //? Trae todas las ventas abiertas y filtra por controles.
		$stmt = Conexion::conectar()->prepare("SELECT * FROM compras WHERE id_venta = '".$tiket."' ".$orden." limit ".$limitInf.",". $limitSup);
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
    $jTableResult['data'] = "datos del tiket";
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