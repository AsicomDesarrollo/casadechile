<?php


require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";

require_once "../controladores/ventas.controlador.php";
require_once "../modelos/ventas.modelo.php";

class TablaClientes{

  public function mostrarTablaClientes(){	



  	$clientes = ControladorClientes::ctrMostrarClientes();

  	$datosJson = '

      { 
        "data":[';


    $deuda = 0;

	 	for($i = 0; $i < count($clientes); $i++){

      $compras = ControladorVentas::ctrMostrarVentaDetalle($clientes[$i]["id"],$clientes[$i]["nombre"]);

      $arreglo = "";
      
      $idAnterior = 0;
      
      $total = 0;

      $k = 1;

     for ($j = 0 ; $j < count($compras) ; $j++) {

        if($idAnterior != $compras[$j]["id_venta"]){

          if($idAnterior != 0){

            $abonos = ControladorVentas::ctrMostrarAbonosCliente($compras[$j-1]["id_venta"]);

            $totalAbono = 0;
            foreach ($abonos as $key => $value) {

              $totalAbono = $totalAbono + ($value["monto"] * 1);
            
            }

            $arreglo .= $k.";";
            $arreglo .= $compras[$j-1]["id_venta"].";";
            $arreglo .= $total.";";
            $arreglo .= $totalAbono;

            $arreglo .= "!";

            $k++;

            $deuda += $total;

            $total = 0;
            $total += $compras[$j]["precio"] * $compras[$j]["peso"];
            

          }else{

            $total += $compras[$j]["precio"] * $compras[$j]["peso"];
            
          }

        }else{

          if($j == count($compras) - 1){

            $total += $compras[$j]["precio"] * $compras[$j]["peso"];
            $deuda += $total;

            $abonos = ControladorVentas::ctrMostrarAbonosCliente($compras[$j]["id_venta"]);

            $totalAbono = 0;
            foreach ($abonos as $key => $value) {
              $totalAbono += $value["monto"];
            }

            $arreglo .= $k.";";
            $arreglo .= $compras[$j]["id_venta"].";";
            $arreglo .= $total.";";
            $arreglo .= $totalAbono;

            $arreglo .= "!";

          }else{

             $total += $compras[$j]["precio"] * $compras[$j]["peso"];
             
          }
        }

        $idAnterior = $compras[$j]["id_venta"];  
      }


      $arreglo = substr($arreglo, 0, -1);

      $acciones = "<span class='btn btn-warning' style='cursor: pointer;' onclick='Seleccionar(this)' idCliente='".$clientes[$i]["id"]." 'nombreCliente='".$clientes[$i]["nombre"]." 'adeudo='".$clientes[$i]["adeuda"]."'limite='".$clientes[$i]["limite"]."' fecha='".$clientes[$i]["fecha"]."'><i class='fa fa-pencil'></i>Editar</span>";

      $detalles = "<span class='btn btn-success' style='cursor: pointer;' onclick='VerDetalles(this)' detalles='".$arreglo."'><i class='fa fa-eye'></i>Ver detalles</span>";


      if(empty($arreglo)){

        $detalles = "";

      }

      $datosFecha = explode(" ", $clientes[$i]["fecha"]);

      $fechaOrdenada = explode("-", $datosFecha[0]);

			$datosJson .='[
					
					"'.($i+1).'",
          "'.$clientes[$i]["nombre"].'",
					"$ '.number_format($deuda).'",
          "'.$fechaOrdenada[2].'/'.$fechaOrdenada[1].'/'.$fechaOrdenada[0].'",
          "'.$acciones.' '.$detalles.'"

			],';

      $deuda = 0;

      

		}

		$datosJson = substr($datosJson, 0, -1);

		$datosJson .= ']

		}';

		echo $datosJson;


  }

}

/*=============================================
ACTIVAR TABLA DE PRODUCTOS
=============================================*/ 
$activarProveedor = new TablaClientes();
$activarProveedor -> mostrarTablaClientes();