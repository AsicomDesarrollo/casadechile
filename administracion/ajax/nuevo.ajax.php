<?php

require_once "../controladores/usuarios.controlador.php";
require_once "../controladores/administradores.controlador.php";
require_once "../controladores/ventas.controlador.php";

require_once "../modelos/usuarios.modelo.php";
require_once "../modelos/administradores.modelo.php";
require_once "../modelos/ventas.modelo.php";

require_once "../extensiones/phpmailer/PHPMailer/PHPMailerAutoload.php";
require_once "../extensiones/phpmailer/vendor/autoload.php";

date_default_timezone_set("America/Mexico_City");

class AjaxNuevo{	

	/*=============================================
	NUEVO USUARIO
	=============================================*/	

	public $usuarioNombre;
	public $usuarioPaterno;
	public $usuarioMaterno;
	public $usuarioTelefono;
	public $usuarioMail;
	public $usuarioEmpresa;

	public function ajaxNuevoUsuario(){

		$usuarioNombre = $this->usuarioNombre;
		$usuarioPaterno = $this->usuarioPaterno;
		$usuarioMaterno = $this->usuarioMaterno;
		$usuarioTelefono = $this->usuarioTelefono;
		$usuarioMail = $this->usuarioMail;
		$usuarioEmpresa = $this->usuarioEmpresa;

		$nuevo = ControladorUsuarios::ctrNuevoUsuario($usuarioNombre, $usuarioPaterno, $usuarioMaterno, $usuarioTelefono, $usuarioMail,$usuarioEmpresa);

		if($nuevo == "ok"){

			$mensaje = '<div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">

				<center>

					<div style="position:relative; margin-bottom: 0px; width:600px; background: #000000; padding-left: 20px; padding-right:20px;">

						<center>

							<img style="padding:20px; width:25%" src="../vistas/img/plantilla/logoanimado.gif">
						
						</center>

					</div>

				</center>

				<div style="position:relative; margin:auto; width:600px; background: #001A63; padding-left:20px; padding-top:20px; padding-right:20px; padding-bottom:0px;">

					<center>

						<h3 style="font-weight:100; color: #ffffff">Gracias por registrarte en <strong> Asicom Systems</strong>, para continuar da clic en el siguiente link e ingresa tu nueva contraseña.</h3>

						<br>

						<hr style="border:1px solid #ffffff; width:80%;margin-bottom:5px;">

						<br><br>

						<a href="https://mcgnetworks.mx/asicom/administracion/nuevacontrasena.php?cbowebg='.base64_encode($usuarioMail).'"><button style="background-color: #1BCE89; border: none; color: white; border-radius: 10px; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;">Establecer contraseña</button></a>

						<br><br>

						<hr style="border:1px solid #ffffff; width:80%;margin-bottom:5px; marle">	

						<h5 style="font-weight:100; color: #ffffff;">Con tu registro podrás acceder a tu cuenta y consultar el estatus de tus órdenes de servicio y mucho más.</h5>
						
					</center>

					<!--<img style="width: 160px; eight: auto; margin-top: -160px;" src="vistas/img/plantilla/computadora.png">-->
							
				</div>

			</div>';

			$mail = new PHPMailer;

			$mail->CharSet = 'UTF-8';

			$mail->isMail();

			$mail->setFrom('administracion@asicomsystems.com.mx', 'Asicom Systems');

			$mail->addReplyTo('administracion@asicomsystems.com.mx', 'Asicom Systems');

			$mail->Subject = "Bienvenido a Asicom Systems";

			$mail->addAddress($usuarioMail);

			$mail->msgHTML($mensaje);

			$envio = $mail->Send();

			if($envio){

				echo "ok";

			}

		}else{

			echo $nuevo;
			
		}

		

	}

	/*=============================================
	NUEVO ADMINISTRADOR
	=============================================*/	

	public $adminNombre;
	public $adminPaterno;
	public $adminMaterno;
	public $adminTelefono;
	public $adminMail;
	public $adminSucursal;

	public function ajaxNuevoAdmin(){

		$adminNombre = $this->adminNombre;
		$adminPaterno = $this->adminPaterno;
		$adminMaterno = $this->adminMaterno;
		$adminTelefono = $this->adminTelefono;
		$adminMail = $this->adminMail;
		$adminSucursal = $this->adminSucursal;

		$nuevo = ControladorUsuarios::ctrNuevoAdmin($adminNombre, $adminPaterno, $adminMaterno, $adminTelefono, $adminMail,$adminSucursal);

		if($nuevo == "ok"){

			$mensaje = '<div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">

				<center>

					<div style="position:relative; margin-bottom: 0px; width:600px; background: #000000; padding-left: 20px; padding-right:20px;">

						<center>

							<img style="padding:20px; width:25%" src="../vistas/img/plantilla/logoanimado.gif">
						
						</center>

					</div>

				</center>

				<div style="position:relative; margin:auto; width:600px; background: #001A63; padding-left:20px; padding-top:20px; padding-right:20px; padding-bottom:0px;">

					<center>

						<h3 style="font-weight:100; color: #ffffff"> En <strong> Asicom Systems</strong> estamos muy contentos de tenerte en nuestro equipo
						¡Bienvenid@ a bordo '.$adminNombre.'! Para ingresar a tu cuenta da click en comenzar. </h3>

						<br><br>

						<a href="https://mcgnetworks.mx/asicom/administracion/"><button style="background-color: #1BCE89; border: none; color: white; border-radius: 10px; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;">Comenzar</button></a>

						<br><br>

						<hr style="border:1px solid #ffffff; width:80%;margin-bottom:5px; marle">	

						<br><br>
						
					</center>

					<!--<img style="width: 160px; eight: auto; margin-top: -160px;" src="vistas/img/plantilla/computadora.png">-->
							
				</div>

			</div>';

			$mail = new PHPMailer;

			$mail->CharSet = 'UTF-8';

			$mail->isMail();

			$mail->setFrom('administracion@asicomsystems.com.mx', 'Asicom Systems');

			$mail->addReplyTo('administracion@asicomsystems.com.mx', 'Asicom Systems');

			$mail->Subject = "Bienvenido a Asicom Systems";

			$mail->addAddress($adminMail);

			$mail->msgHTML($mensaje);

			$envio = $mail->Send();

			if($envio){

				echo "ok";

			}

		}else{

			echo $nuevo;
			
		}


	}

	/*=============================================
	NUEVO PERSONAL
	=============================================*/	

	public $personalNombre;
	public $personalPaterno;
	public $personalMaterno;
	public $personalTelefono;
	public $personalMail;
	public $personalSucursal;

	public function ajaxNuevoPersonal(){

		$personalNombre = $this->personalNombre;
		$personalPaterno = $this->personalPaterno;
		$personalMaterno = $this->personalMaterno;
		$personalTelefono = $this->personalTelefono;
		$personalMail = $this->personalMail;
		$personalSucursal = $this->personalSucursal;

		$nuevo = ControladorUsuarios::ctrNuevoPersonal($personalNombre, $personalPaterno, $personalMaterno, $personalTelefono, $personalMail, $personalSucursal);

			if($nuevo == "ok"){

				$mensaje = '<div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">

					<center>

						<div style="position:relative; margin-bottom: 0px; width:600px; background: #000000; padding-left: 20px; padding-right:20px;">

							<center>

								<img style="padding:20px; width:25%" src="../vistas/img/plantilla/logoanimado.gif">
							
							</center>

						</div>

					</center>

					<div style="position:relative; margin:auto; width:600px; background: #001A63; padding-left:20px; padding-top:20px; padding-right:20px; padding-bottom:0px;">

						<center>

							<h3 style="font-weight:100; color: #ffffff"> En <strong> Asicom Systems</strong> estamos muy contentos de tenerte en nuestro equipo
							¡Bienvenid@ a bordo '.$personalNombre.'! Para ingresar a tu cuenta da click en comenzar. </h3>

							<br><br>

							<a href="https://mcgnetworks.mx/asicom/administracion/nuevacontrasenapersonal.php?cbowebg='.base64_encode($personalMail).'"><button style="background-color: #1BCE89; border: none; color: white; border-radius: 10px; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;">Comenzar</button></a>

							<br><br>

							<hr style="border:1px solid #ffffff; width:80%;margin-bottom:5px; marle">	

							<br><br>
							
						</center>

						<!--<img style="width: 160px; eight: auto; margin-top: -160px;" src="vistas/img/plantilla/computadora.png">-->
								
					</div>

				</div>';

				$mail = new PHPMailer;

				$mail->CharSet = 'UTF-8';

				$mail->isMail();

				$mail->setFrom('administracion@asicomsystems.com.mx', 'Asicom Systems');

				$mail->addReplyTo('administracion@asicomsystems.com.mx', 'Asicom Systems');

				$mail->Subject = "Bienvenido a Asicom Systems";

				$mail->addAddress($personalMail);

				$mail->msgHTML($mensaje);

				$envio = $mail->Send();

				if($envio){

					echo "ok";

				}

			}else{

				echo $nuevo;
				
			}


	}


	/*=============================================
	NUEVA TIENDA
	=============================================*/	

	public $tiendaNombre;
	public $tiendaDireccion;
	public $tiendaTelefono;

	public function ajaxNuevaTienda(){

		$tiendaNombre = $this->tiendaNombre;
		$tiendaDireccion = $this->tiendaDireccion;
		$tiendaTelefono = $this->tiendaTelefono;

		$nuevo = ControladorUsuarios::ctrNuevaTienda($tiendaNombre, $tiendaDireccion, $tiendaTelefono);

		echo $nuevo;

	}

	/*=============================================
	NUEVA VENTA
	=============================================*/	

	public $ventaSucursal;
	public $ventaCliente;
	public $ventaPersonal;
	public $ventaEquipo;
	public $ventaMarca;
	public $ventaModelo;
	public $ventaSerie;
	public $ventaFalla;
	public $ventaCondiciones;
	public $ventaCosto;
	public $ventaAnticipo;
	public $ventaRecibe;

	public function ajaxNuevaVenta(){

		$ventaSucursal = $this->ventaSucursal;
		$ventaCliente = $this->ventaCliente;
		$ventaPersonal = $this->ventaPersonal;
		$ventaEquipo = $this->ventaEquipo;
		$ventaMarca = $this->ventaMarca;
		$ventaModelo = $this->ventaModelo;
		$ventaSerie = $this->ventaSerie;
		$ventaFalla = $this->ventaFalla;
		$ventaCondiciones = $this->ventaCondiciones;
		$ventaCosto = $this->ventaCosto;
		$ventaAnticipo = $this->ventaAnticipo;
		$ventaRecibe = $this->ventaRecibe;

		$usuario = ControladorUsuarios::ctrMostrarCliente($ventaCliente);

		$personal = ControladorAdministradores::ctrMostrarPersonalVenta($ventaPersonal);
		
		$nueva = ControladorUsuarios::ctrNuevaVenta($ventaSucursal, $ventaCliente, $ventaPersonal, $ventaEquipo, $ventaMarca, $ventaModelo, $ventaSerie, $ventaFalla, $ventaCondiciones, $ventaCosto, $ventaAnticipo, $ventaRecibe);

			if($nueva == "ok"){

				$mensajeCliente = '<div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">

					<center>

						<div style="position:relative; margin-bottom: 0px; width:600px; background: #000000; padding-left: 20px; padding-right:20px;">

							<center>

								<img style="padding:20px; width:25%" src="../vistas/img/plantilla/logoanimado.gif">
							
							</center>

						</div>

					</center>

					<div style="position:relative; margin:auto; width:600px; background: #001A63; padding-left:20px; padding-top:20px; padding-right:20px; padding-bottom:0px;">

						<center>

							<h3 style="font-weight:100; color: #ffffff">'.$usuario["nombre"].', gracias por confiar en nosotros, ya estamos trabajando en 
							tu orden. </h3>
							<h3 style="font-weight:100; color: #ffffff">Orden: '.$ventaCliente.' </h3>
							<h3 style="font-weight:100; color: #ffffff">Equipo: '.$ventaEquipo.' </h3>
							<h3 style="font-weight:100; color: #ffffff">Marca: '.$ventaMarca.' </h3>
							<h3 style="font-weight:100; color: #ffffff">Modelo: '.$ventaModelo.' </h3>
							<h3 style="font-weight:100; color: #ffffff">#Serie: '.$ventaSerie.' </h3>
							<h3 style="font-weight:100; color: #ffffff">Falla: '.$ventaFalla.' </h3>
							<h3 style="font-weight:100; color: #ffffff">Condiciones: '.$ventaCondiciones.' </h3>
							<h3 style="font-weight:100; color: #ffffff">Anticipo: '.$ventaAnticipo.' </h3>

							<br><br>

							<a href="https://mcgnetworks.mx/asicom/administracion/"><button style="background-color: #1BCE89; border: none; color: white; border-radius: 10px; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;">Comenzar</button></a>

							<br><br>

							<hr style="border:1px solid #ffffff; width:80%;margin-bottom:5px; marle">	

							<br><br>
							
						</center>

						<!--<img style="width: 160px; eight: auto; margin-top: -160px;" src="vistas/img/plantilla/computadora.png">-->
								
					</div>

				</div>';

				$mailCliente = new PHPMailer;

				$mailCliente->CharSet = 'UTF-8';

				$mailCliente->isMail();

				$mailCliente->setFrom('administracion@asicomsystems.com.mx', 'Asicom Systems');

				$mailCliente->addReplyTo('administracion@asicomsystems.com.mx', 'Asicom Systems');

				$mailCliente->Subject = "Bienvenido a Asicom Systems";

				$mailCliente->addAddress($usuario["email"]);

				$mailCliente->msgHTML($mensajeCliente);

				$envioCliente = $mailCliente->Send();


				// Mensaje para Ingeniero

				$mensajePersonal = '<div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">

					<center>

						<div style="position:relative; margin-bottom: 0px; width:600px; background: #000000; padding-left: 20px; padding-right:20px;">

							<center>

								<img style="padding:20px; width:25%" src="../vistas/img/plantilla/logoanimado.gif">
							
							</center>

						</div>

					</center>

					<div style="position:relative; margin:auto; width:600px; background: #001A63; padding-left:20px; padding-top:20px; padding-right:20px; padding-bottom:0px;">

						<center>

							<h3 style="font-weight:100; color: #ffffff"> Hola '.$personal["nombre"].', tenemos una nueva orden de trabajo para ti con las
							siguientes características: </h3>
							<h3 style="font-weight:100; color: #ffffff">Orden: '.$ventaCliente.' </h3>
							<h3 style="font-weight:100; color: #ffffff">Equipo: '.$ventaEquipo.' </h3>
							<h3 style="font-weight:100; color: #ffffff">Marca: '.$ventaMarca.' </h3>
							<h3 style="font-weight:100; color: #ffffff">Modelo: '.$ventaModelo.' </h3>
							<h3 style="font-weight:100; color: #ffffff">#Serie: '.$ventaSerie.' </h3>
							<h3 style="font-weight:100; color: #ffffff">Falla: '.$ventaFalla.' </h3>
							<h3 style="font-weight:100; color: #ffffff">Condiciones: '.$ventaCondiciones.' </h3>
							<h3 style="font-weight:100; color: #ffffff">Anticipo: '.$ventaAnticipo.' </h3>

							<br><br>

							<a href="https://mcgnetworks.mx/asicom/administracion/"><button style="background-color: #1BCE89; border: none; color: white; border-radius: 10px; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;">Comenzar</button></a>

							<br><br>

							<hr style="border:1px solid #ffffff; width:80%;margin-bottom:5px; marle">	

							<br><br>
							
						</center>

						<!--<img style="width: 160px; eight: auto; margin-top: -160px;" src="vistas/img/plantilla/computadora.png">-->
								
					</div>

				</div>';

				$mailPersonal = new PHPMailer;

				$mailPersonal->CharSet = 'UTF-8';

				$mailPersonal->isMail();

				$mailPersonal->setFrom('administracion@asicomsystems.com.mx', 'Asicom Systems');

				$mailPersonal->addReplyTo('administracion@asicomsystems.com.mx', 'Asicom Systems');

				$mailPersonal->Subject = "Bienvenido a Asicom Systems";

				$mailPersonal->addAddress($personal["email"]);

				$mailPersonal->msgHTML($mensajePersonal);

				$envioPersonal = $mailPersonal->Send();



				if($envioCliente == 'true' && $envioPersonal == 'true' ){

					echo "ok";

				}

			}else{

				echo $nueva;
				
			}


		}

	}

/*=============================================
NUEVO USUARIO
=============================================*/
if(isset($_POST["accion"]) && $_POST["accion"] == "usuario"){

	$traerProducto = new AjaxNuevo();
	$traerProducto -> usuarioNombre = $_POST["nombre"];
	$traerProducto -> usuarioPaterno = $_POST["paterno"];
	$traerProducto -> usuarioMaterno = $_POST["materno"];
	$traerProducto -> usuarioTelefono = $_POST["telefono"];
	$traerProducto -> usuarioMail = $_POST["mail"];
	$traerProducto -> usuarioEmpresa = $_POST["empresa"];
	$traerProducto -> ajaxNuevoUsuario();

}

/*=============================================
NUEVO ADMINISTRADOR
=============================================*/
if(isset($_POST["accion"]) && $_POST["accion"] == "administrador"){

	$traerProducto = new AjaxNuevo();
	$traerProducto -> adminNombre = $_POST["nombre"];
	$traerProducto -> adminPaterno = $_POST["paterno"];
	$traerProducto -> adminMaterno = $_POST["materno"];
	$traerProducto -> adminTelefono = $_POST["telefono"];
	$traerProducto -> adminMail = $_POST["mail"];
	$traerProducto -> adminSucursal = $_POST["sucursal"];
	$traerProducto -> ajaxNuevoAdmin();

}

/*=============================================
NUEVO PERSONAL
=============================================*/
if(isset($_POST["accion"]) && $_POST["accion"] == "personal"){

	$traerProducto = new AjaxNuevo();
	$traerProducto -> personalNombre = $_POST["nombre"];
	$traerProducto -> personalPaterno = $_POST["paterno"];
	$traerProducto -> personalMaterno = $_POST["materno"];
	$traerProducto -> personalTelefono = $_POST["telefono"];
	$traerProducto -> personalMail = $_POST["mail"];
	$traerProducto -> personalSucursal = $_POST["sucursal"];
	$traerProducto -> ajaxNuevoPersonal();

}

/*=============================================
NUEVO SUCURSAL
=============================================*/
if(isset($_POST["accion"]) && $_POST["accion"] == "tienda"){

	$traerProducto = new AjaxNuevo();
	$traerProducto -> tiendaNombre = $_POST["nombre"];
	$traerProducto -> tiendaDireccion = $_POST["direccion"];
	$traerProducto -> tiendaTelefono = $_POST["telefono"];
	$traerProducto -> ajaxNuevaTienda();

}

/*=============================================
NUEVA VENTA
=============================================*/
if(isset($_POST["accion"]) && $_POST["accion"] == "venta"){

	$traerProducto = new AjaxNuevo();
	$traerProducto -> ventaSucursal = $_POST["sucursal"];
	$traerProducto -> ventaCliente = $_POST["cliente"];
	$traerProducto -> ventaPersonal = $_POST["personal"];
	$traerProducto -> ventaEquipo = $_POST["equipo"];
	$traerProducto -> ventaMarca = $_POST["marca"];
	$traerProducto -> ventaModelo = $_POST["modelo"];
	$traerProducto -> ventaSerie = $_POST["serie"];
	$traerProducto -> ventaFalla = $_POST["falla"];
	$traerProducto -> ventaCondiciones = $_POST["condiciones"];
	$traerProducto -> ventaCosto = $_POST["costo"];
	$traerProducto -> ventaAnticipo = $_POST["anticipo"];
	$traerProducto -> ventaRecibe = $_POST["recibe"];
	$traerProducto -> ajaxNuevaVenta();

}


