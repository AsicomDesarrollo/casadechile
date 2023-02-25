<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

/*
Importación de controladores del sistema
*/

require_once "controladores/plantilla.controlador.php";
require_once "controladores/administradores.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/ventas.controlador.php";

/*
Importación de modelos del sistema
*/

require_once "modelos/administradores.modelo.php";
require_once "modelos/productos.modelo.php";
require_once "modelos/ventas.modelo.php";

/*
Importación de ruta base del sistema
*/

require_once "modelos/rutas.php";

/*
Importación de plantilla base del sistema
*/

$plantilla = new ControladorPlantilla();
$plantilla -> plantilla();