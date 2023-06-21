<?php
// @elmm Un action corresponde a una rutina de un modulo sin VIEW
// @elmm Un view corresponde a una vista
/**
* @function action
* @elmm la funcion action ejecuta una rutina correspondiente a un modulo
**/	

class Route {
/************************************************************************
 ******************************* action *********************************
************************************************************************/
	public static function action($action){
		// Module::$module;
		
		if(isset($_GET['action'])){
			if(Route::isValid('action')){
				include "core/app/action/".$_GET['action']."-action.php";
			}else{
				Route::Error("<b>404 No se encontró.</b> action <b>".$_GET['action']."</b> !! - <a href='index.php' target='_blank'>regresar</a>");
			}
		}else{
			// include "core/app/action/".$action."-action.php";
			Route::Error("<b>404 No se encontró.</b> action <b>".$_GET['action']."</b> !! - <a href='index.php' target='_blank'>regresar</a>");
		}
	}

	/**
	* @function isValid
	* @elmm valida la existencia de una vista o accion
	**/	
	public static function isValid($val){
		$valid=false;
		if(file_exists($file = "core/app/".$val."/".$_GET[$val]."-".$val.".php")){
			$valid = true;
		}
		// echo $file;
		return $valid;
	}

	public static function Error($message){
		print $message;
	}

	public function execute($action,$params){
		$fullpath =  "core/app/action/".$action."-action.php";
		if(file_exists($fullpath)){
			include $fullpath;
		}else{
			assert("wtf");
		}
	}

/************************************************************************
 ******************************* view ***********************************
************************************************************************/

	public static function view($view){  
		// Module::$module;
		if(isset($_GET['view']) && isset( $_SESSION["id"])){ //si view esta definido y es usuario logeado
			if(Route::isValid('view')){
				include "core/app/view/".$_GET['view']."-view.php";
			}else{
				Route::Error("<b>404 No se encontró una vista.</b>  <b>".$_GET['view']."</b> !! - <a href='#' target='_blank'>regresar</a>");
			}
		}else{
			// include "core/app/view/index-view.php";
			// <?php Route::view("index");
			// echo "hola";
			header("Location: ./?view=index");

		}


	}
}