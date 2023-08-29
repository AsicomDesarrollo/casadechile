<?php

class Conexion{

	static public function conectar(){

		if ($_SERVER["HTTP_HOST"]=='localhost'){
			$link = new PDO("mysql:host=localhost;dbname=casadelc_bodega",
						"elena",
						"08552376086",

						array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		                      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
						);
		}else{
			$link = new PDO("mysql:host=localhost;dbname=casadelc_bodega",
						"casadelc_bodega",
						"Rzoydcdzna58",
						array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		                      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
						);
		}

		return $link;

	}

	static public function conectarLogin(){

		if ($_SERVER["HTTP_HOST"]=='localhost'){
			$link = new PDO("mysql:host=localhost;dbname=casadelc_bodega",
      "elena",
      "08552376086",

						array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		                      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
						);
		}else{
			$link = new PDO("mysql:host=localhost;dbname=casadelc_bodega",
						"casadelc_bodega",
						"Rzoydcdzna58",
						array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		                      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
						);
		}

		return $link;

	}

}