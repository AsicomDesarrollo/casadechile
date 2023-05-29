<?php
// Core.php
// @elmm obtiene las configuraciones, muestra y carga los contenidos necesarios.
class Core {
	public static $theme = "";
	public static $root = "";
	public static $rol = "";


	// public static $userid = null; //se define en action=login
	// public static $user = null; //se define en action=login
	public static $userdata = []; //se define en action=login
	public static $debug_sql = false;

	public static function fecha_ed($fecha){
		//* [start] => Mon Aug 30 2021 08:15:00 GMT-0500 (hora de verano central)
		$fechaStart= explode(' ',$fecha); 
		$___dia_seleccionado = $fechaStart[2];
		$___mes_seleccionado = $fechaStart[1];
		$___año_seleccionado = $fechaStart[3];
		$___hora_seleccionado = $fechaStart[4];
		switch ($___mes_seleccionado) {
			case 'Jan':
				$___mes_seleccionado = '01';
				break;
			case 'Feb':
				$___mes_seleccionado = '02';
				break;
			case 'Mar':
				$___mes_seleccionado = '03';
				break;
			case 'Apr':
				$___mes_seleccionado = '04';
				break;
			case 'May':
				$___mes_seleccionado = '05';
				break;
			case 'Jun':
				$___mes_seleccionado = '06';
				break;
			case 'Jul':
				$___mes_seleccionado = '07';
				break;
			case 'Aug':
				$___mes_seleccionado = '08';
				break;
			case 'Sep':
				$___mes_seleccionado = '09';
				break;
			case 'Oct':
				$___mes_seleccionado = '10';
				break;
			case 'Nov':
				$___mes_seleccionado = '11';
				break;
			case 'Dec':
				$___mes_seleccionado = '12';
				break;
		}
		$data = [$___dia_seleccionado,$___mes_seleccionado,$___año_seleccionado,$___hora_seleccionado];
		return $data;
	}

	public static function getTimeStamp($time=0){
		date_default_timezone_set("America/Mexico_City");
		if($time==0){$time=self::getTimeNow();}
		$date = new DateTime($time);
		$timestamp = $date->getTimestamp();
		return $timestamp;
	}

	public static function getTimeNow(){
		date_default_timezone_set("America/Mexico_City");
		$_hora_ = date("Y-m-d H:i:s"); 
		return $_hora_;
		//$HOY = date("Y-m-d");
        //sumo 1 día
        //echo "<br>";
        //$fecha_limite = date("Y-m-d",strtotime($HOY."+ 5 days"));
	}
	// $end = date("Y-m-d H:i:s",strtotime($start."+ 2 minute")); 
	
	public static function sendVarToJs($varPhp,$varJs){
		echo "<script>
		        var $varJs = ". $varPhp .
		 	"/*variable varJs*/
			 </script>";
	}

	public static function sendStringToJs($varPhp,$varJs){
		echo '<script> var '.$varJs.' = "' . $varPhp . '" /*variable varJs*/ </script>';
	}
    
	public static function alert($text){
		$alert="<div id='recuperar-lightbox' class='lightbox-basic zoom-anim-dialog mfp-hide' style='border:none,padding: none;width: 100%;'>
			<div class='alert alert-error' style='position:relative'>
            <strong>Error!</strong> $text </div></div>";
	}

	public static function redir($url){
		echo "<script>window.location='".$url."';</script>";
	}

	public static function preprint($param, $name='parametro: '){
		echo "<pre> in $name <br>";
		print_r( $param );
		echo ":out</pre><br>";
	}

	

}



?>