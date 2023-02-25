<?php

require_once "../controladores/entradas.controlador.php";
require_once "../modelos/entradas.modelo.php";

require_once "../controladores/ventas.controlador.php";
require_once "../modelos/ventas.modelo.php";

require_once "../controladores/proveedores.controlador.php";
require_once "../modelos/proveedores.modelo.php";

    $fecha = $_GET["fecha"];

    $entradas = ControladorVentas::ctrBuscarFecha("entradas", $fecha);

  	$datosJson = '

      { 
        "data":[';


	 	for($i = 0; $i < count($entradas); $i++){

      $sumaAbonos = 0;
      $adeuda = 0;

      $abonos = ControladorEntradas::ctrTraerAbonoEntradas($entradas[$i]["id"]);

      foreach ($abonos as $key => $value) {
        
        $sumaAbonos += $value["monto"];

      }
      
      $total = $entradas[$i]["precio"] * $entradas[$i]["peso"];
      
      $adeuda = $total - $sumaAbonos;
    
      $acciones = "<span class='btn btn-warning' style='cursor: pointer;' onclick='Seleccionar(this)' idEntrada='".$entradas[$i]["id"]." 'productoEntrada='".$entradas[$i]["producto"]." 'pesoEntrada='".$entradas[$i]["peso"]."'precioEntrada='".$entradas[$i]["precio"]."' proveedorEntrada='".$entradas[$i]["proveedor"]."' metodoPago='".$entradas[$i]["estatus"]."'fechaEntrada='".$entradas[$i]["fecha"]."'><i class='fa fa-pencil'></i> Editar</span>";

      $abonar = "<span class='btn btn-success' style='cursor: pointer;' onclick='Abonos(this)' idAbono='".$entradas[$i]["id"]."'><i class='fa fa-money'></i> Abonar</span>";


      $producto = ControladorEntradas::ctrMostrarEntradaEspecifica($entradas[$i]["producto"]);
      $nombreProducto = $producto["nombre"];


      $proveedor = ControladorProveedores::ctrMostrarProveedor($entradas[$i]["proveedor"]);
      $nombreProveedor = $proveedor["nombre"];


      //$acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idProducto='".$productos[$i]["id"]." 'nombreProducto='".$productos[$i]["nombre"]."'precioProducto='".$productos[$i]["precio"]."'precioMin='".$productos[$i]["minimo"]."'precioMax='".$productos[$i]["maximo"]."'categoriaProducto='".$productos[$i]["categoria"]."'fechaProducto='".$productos[$i]["fecha"]."' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'  onclick='Seleccionar(this)'></i> Editar</button></div>";

  		//$estado = "<button class='btn btn-xs btnActivar ".$colorEstado."' idProducto='".$productos[$i]["id"]."' estadoProducto='".$estadoProducto."'>".$textoEstado."</button>";

  		/*=============================================
  		CONSTRUIR LOS DATOS JSON
			=============================================*/

      if ($entradas[$i]["estatus"] == "efectivo"){

        $adeuda = 0;

      }

      if($adeuda == 0 && $entradas[$i]["estatus"] == "credito"){

        $estatus = "<span class='btn btn-success' style='padding-top: 0px; padding-bottom: 0px; border-radius:15px;cursor: default;'>Pagado</span>";

      }else if($entradas[$i]["estatus"] == "efectivo") {
        
        $estatus = "<span class='btn btn-success' style='padding-top: 0px; padding-bottom: 0px; border-radius:15px;cursor: default;'>Pagado en efectivo</span>";
      
      }else if($entradas[$i]["estatus"] == "cancelado") {
        
        $estatus = "<span class='btn btn-default' style='padding-top: 0px; padding-bottom: 0px; border-radius:15px;cursor: default;'>Cancelado</span>";
      
      }else {

         $estatus = "<span class='btn btn-danger' style='padding-top: 0px; padding-bottom: 0px; border-radius:15px;cursor: default;'>Deuda a credito</span>";
      }

      $datosFecha = explode(" ", $entradas[$i]["fecha"]);

      $fechaOrdenada = explode("-", $datosFecha[0]);

			$datosJson .='[
					
					"'.$entradas[$i]["id"].'",
          "'.$nombreProducto.'",
					"'.$entradas[$i]["peso"].'",
          "$ '.number_format($entradas[$i]["precio"]).'",
          "'.$nombreProveedor.'",
          "'.$estatus.'",
          "$ '.number_format($total).'",
          "$ '.number_format($adeuda).'",
          "'.$fechaOrdenada[2].'/'.$fechaOrdenada[1].'/'.$fechaOrdenada[0].' '.$datosFecha[1].'",';

      if($adeuda == 0 || $entradas[$i]["estatus"] == "cancelado"){

        $datosJson .='
          "'.$acciones.'"';

      } else {

         $datosJson .='
          "'.$acciones.' '.$abonar.'"';

      }

      $datosJson .='],';

		}

		$datosJson = substr($datosJson, 0, -1);

		$datosJson .= ']

		}';

		echo $datosJson;