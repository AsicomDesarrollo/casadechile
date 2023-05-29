<?php

class ControladorReportes{

	/*=============================================
	DESCARGAR REPORTE EN EXCEL
	=============================================*/

	public function ctrDescargarReporte(){

	/*=============================================
	OBTENER MONTO DE UN SERVICIO
	=============================================*/

	function obtenerMonto($idevento){

		$link = new PDO("mysql:host=localhost;dbname=u153641525_pit",
						"u153641525_pit",
						"6Hn1uq7p3fQ7PfrBeU",
						array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		                      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
						);

		$stmt = $link->prepare("SELECT * FROM compras WHERE id_producto = :id");
		$stmt -> bindParam(":id", $idevento, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();
		
		$stmt = null;
	
	}

	/*=============================================
	OBTENER STATUS DE UN PROVEEDOR
	=============================================*/

	function obtenerProveedor($idproveedor){

		$link = new PDO("mysql:host=localhost;dbname=u153641525_pit",
						"u153641525_pit",
						"6Hn1uq7p3fQ7PfrBeU",
						array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		                      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
						);

		$stmt = $link->prepare("SELECT * FROM usuarios WHERE id = :id");
		$stmt -> bindParam(":id", $idproveedor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();
		
		$stmt = null;
	
	}

		if(isset($_GET["reporte"])){

			$tabla = $_GET["reporte"];

			$reporte = ModeloReportes::mdlDescargarReporte($tabla);

			/*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/

			$nombre = $_GET["reporte"].'.xls';

			header('Expires: 0');
			header('Cache-control: private');
			header("Content-type: application/vnd.ms-excel"); // Archivo de Excel
			header("Cache-Control: cache, must-revalidate"); 
			header('Content-Description: File Transfer');
			header('Last-Modified: '.date('D, d M Y H:i:s'));
			header("Pragma: public"); 
			if($_GET["reporte"]=="usuarios"){
				header('Content-Disposition:; filename="proveedores.xls"');
			}else{
				header('Content-Disposition:; filename="'.$nombre.'"');
			}
			header("Content-Transfer-Encoding: binary");

			/*=============================================
			REPORTE DE EVENTOS Y SERVICIOS
			=============================================*/

			if($_GET["reporte"] == "usuarios_aplicacion"){	

				echo utf8_decode("<table border='0'> 

						<tr> 
						<td style='font-weight:bold; border:1px solid #eee;'>ID</td> 
						<td style='font-weight:bold; border:1px solid #eee;'>NOMBRE</td> 
						<td style='font-weight:bold; border:1px solid #eee;'>EMAIL</td>
						<td style='font-weight:bold; border:1px solid #eee;'>FECHA</td>	
						</tr>");

				foreach ($reporte as $key => $value) {

					 echo utf8_decode("<tr>
				 			
				 						<td style='border:1px solid #eee;'>".$value["id"]."</td>
				 						<td style='border:1px solid #eee;'>".$value["nombre"]."</td>
				 						<td style='border:1px solid #eee;'>".$value["email"]."</td>
				 						<td style='border:1px solid #eee;'>".$value["fecha"]."</td>
				 						</tr>");

				}

			echo "</table>";

			}

			if($_GET["reporte"] == "usuarios"){	

				echo utf8_decode("<table border='0'> 

						<tr> 
						<td style='font-weight:bold; border:1px solid #eee;'>ID</td> 
						<td style='font-weight:bold; border:1px solid #eee;'>NOMBRE</td> 
						<td style='font-weight:bold; border:1px solid #eee;'>EMAIL</td>
						<td style='font-weight:bold; border:1px solid #eee;'>ESTADO</td>
						<td style='font-weight:bold; border:1px solid #eee;'>TELEFONO</td>
						<td style='font-weight:bold; border:1px solid #eee;'>CIUDAD</td>
						<td style='font-weight:bold; border:1px solid #eee;'>TAMAÑO</td>
						<td style='font-weight:bold; border:1px solid #eee;'>FECHA</td>	
						</tr>");

				foreach ($reporte as $key => $value) {

					$estado = "";
					$tamano = "";

					if($value["verificacion"]==0){
						$estado = "Activo";
					}else{
						$estado = "Inactivo";
					}

					switch ($value["precio"]) {
						case 0:
							$tamano = "Chico";
							break;
						case 1:
							$tamano = "Mediano";
							break;
						case 2:
							$tamano = "Grande";
							break;
						case 3:
							$tamano = "Mega";
							break;
						
						default:
							# code...
							break;
					}
					 echo utf8_decode("<tr>
				 			
				 						<td style='border:1px solid #eee;'>".$value["id"]."</td>
				 						<td style='border:1px solid #eee;'>".$value["nombre"]."</td>
				 						<td style='border:1px solid #eee;'>".$value["email"]."</td>
				 						<td style='border:1px solid #eee;'>".$estado."</td>
				 						<td style='border:1px solid #eee;'>".$value["telefono"]."</td>
				 						<td style='border:1px solid #eee;'>".$value["donde"]."</td>
				 						<td style='border:1px solid #eee;'>".$tamano."</td>
				 						<td style='border:1px solid #eee;'>".$value["fecha"]."</td>
				 						</tr>");

				}

			echo "</table>";

			}

		if($_GET["reporte"] == "serviciossolicitados"){	

				echo utf8_decode("<table border='0'> 

						<tr> 
						<td style='font-weight:bold; border:1px solid #eee;'>ID</td> 
						<td style='font-weight:bold; border:1px solid #eee;'>NOMBRE DEL EVENTO</td> 
						<td style='font-weight:bold; border:1px solid #eee;'>CIUDAD</td>
						<td style='font-weight:bold; border:1px solid #eee;'>FECHA</td>
						<td style='font-weight:bold; border:1px solid #eee;'>HORA</td>
						<td style='font-weight:bold; border:1px solid #eee;'>STATUS</td>
						<td style='font-weight:bold; border:1px solid #eee;'>COSTO DEL SERVICIO</td>
						<td style='font-weight:bold; border:1px solid #eee;'>FECHA STATUS</td>
						<td style='font-weight:bold; border:1px solid #eee;'>STATUS DEL PROVEEDOR</td>	
						</tr>");

				foreach ($reporte as $key => $value) {

					$status = "";
					$monto = "";
					$statusProveedor = "";

					switch ($value["estado"]) {
						case 0:
							$status = "Solicitado";
							break;
						case 1:
							$status = "Aceptado";
							break;
						case 2:
							$status = "Rechazado";
							break;
						case 3:
							$status = "Cancelado";
							break;
						case 4:
							$status = "Reagendado";
							break;
						case 5:
							$status = "Terminado";
							break;
						case 6:
							$status = "Terminado";
							break;
						case 7:
							$status = "Pagado";
							break;
						
						default:
							# code...
							break;
					}

					if($status=="Pagado"){
						$obtenerMonto = obtenerMonto($value["id"]);
						$monto = $obtenerMonto["pago"];
					}else{
						$monto = "";
					}

					$obtenerProveedor = obtenerProveedor($value["id_proveedor"]);

					if($obtenerProveedor["verificacion"] == 0){
						$statusProveedor = "Proveedor activo";
					}else{
						$statusProveedor = "Proveedor inactivo";
					}

					echo utf8_decode("<tr>
				 			
				 						<td style='border:1px solid #eee;'>".$value["id"]."</td>
				 						<td style='border:1px solid #eee;'>".$value["nombre_evento"]."</td>
				 						<td style='border:1px solid #eee;'>".$value["ciudad"]."</td>
				 						<td style='border:1px solid #eee;'>".$value["fecha_evento"]."</td>
				 						<td style='border:1px solid #eee;'>".$value["hora_evento_inicio"]."</td>
				 						<td style='border:1px solid #eee;'>".$status."</td>
				 						<td style='border:1px solid #eee;'>".$monto."</td>
				 						<td style='border:1px solid #eee;'>".$value["fecha_solicitud"]."</td>
				 						<td style='border:1px solid #eee;'>".$statusProveedor."</td>
				 						</tr>");

				}

			echo "</table>";

			}

		}

	}

}