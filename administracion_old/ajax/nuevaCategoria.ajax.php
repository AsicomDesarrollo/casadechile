<?php

require_once "../controladores/categorias.controlador.php";

require_once "../modelos/categorias.modelo.php";

class AjaxModificaCategoria {

	public $id;
	public $nombre;
	public $estatus;


	public function modificarCategoria(){

		$id = $this->categoriaId;
		$nombre = $this->categoriaNombre;
		$estatus = $this->categoriaEstatus;

		$actualiza = ControladorCategorias::ctrActualizarCategorias($id,$nombre,$estatus);

		if($actualiza == "ok"){

			echo "ok";
		}
		else {

			echo "error";
		}
	}

	public $nuevoNombre;
	public $nuevoEstatus;

	public function nuevaCategoria(){

		$nuevoNombre = $this->categoriaNuevaNombre;
		$nuevoEstatus = $this->categoriaNuevaEstatus;

		$nuevaCatego = ControladorCategorias::ctrInsertarCategorias($nuevoNombre,$nuevoEstatus);

		if($nuevaCatego == "ok"){

			echo "ok";
		}
		else {

			echo "error";
		}
	}
}



if(isset($_POST["accion"]) && $_POST["accion"] == "actualizar"){

	$actualizarCategoria = new AjaxModificaCategoria();
	$actualizarCategoria-> categoriaNombre = $_POST["nombre"];
	$actualizarCategoria -> categoriaEstatus = $_POST["estatus"];
	$actualizarCategoria -> categoriaId = $_POST["id"];
	$actualizarCategoria -> modificarCategoria();

}

if(isset($_POST["accion"]) && $_POST["accion"] == "nueva"){

	$nuevaCategoria = new AjaxModificaCategoria();
	$nuevaCategoria -> categoriaNuevaNombre = $_POST["nombre"];
	$nuevaCategoria -> categoriaNuevaEstatus = $_POST["estatus"];
	$nuevaCategoria -> nuevaCategoria();

}


