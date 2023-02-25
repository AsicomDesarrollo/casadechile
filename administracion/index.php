<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

/*
Importación de controladores del sistema
*/

// ob_start();
// session_start();

require_once "controladores/plantilla.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/administradores.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/entradas.controlador.php";
require_once "controladores/ventas.controlador.php";
require_once "controladores/proveedores.controlador.php";
require_once "controladores/inicio.controlador.php";
require_once "controladores/gastos.controlador.php";
require_once "controladores/presupuesto.controlador.php";

/*
Importación de modelos del sistema
*/

require_once "modelos/administradores.modelo.php";
require_once "modelos/categorias.modelo.php";
require_once "modelos/productos.modelo.php";
require_once "modelos/entradas.modelo.php";
require_once "modelos/usuarios.modelo.php";
require_once "modelos/ventas.modelo.php";
require_once "modelos/proveedores.modelo.php";
require_once "modelos/inicio.modelo.php";
require_once "modelos/gastos.modelo.php";
require_once "modelos/presupuesto.modelo.php";

/*
Importación de ruta base del sistema
*/

require_once "modelos/rutas.php";

/*
Importación de plantilla base del sistema
*/

$plantilla = new ControladorPlantilla();
$plantilla -> plantilla();