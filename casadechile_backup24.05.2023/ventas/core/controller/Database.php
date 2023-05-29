<?php
class Database {
	public static $db;
	public static $con;
	function Database(){

		switch ($_SERVER["HTTP_HOST"]){
			
			case 'localhost:8080':
				$this->user="root";$this->pass="";$this->host="localhost";$this->ddbb="casadelc_bodega";
				break;
			default:
				$this->user="root";$this->pass="";$this->host="localhost";$this->ddbb="casadelc_bodega";
				break;
		}
	}

	function connect(){
		switch ($_SERVER["HTTP_HOST"]){
			
			case 'localhost':
			case 'localhost:8080':
				////$this->user="alternativo";$this->pass="2r3ckl24n2l";$this->host="localhost";$this->ddbb="u157777947_alternativa";
				$con = new mysqli("localhost","root","","casadelc_bodega");
				break;
			default:
				////$this->user="alternativo";$this->pass="2r3ckl24n2l";$this->host="localhost";$this->ddbb="u157777947_alternativa";
				// $con = new mysqli("localhost","usuario","Rzoydcdzna58","casadelc_bodega");
				$con = new mysqli("localhost","casadelc_bodega","Rzoydcdzna58","casadelc_bodega");
				$con->set_charset('utf8');
				break;
		}
		return $con;
	}

	public static function getCon(){
		if(self::$con==null && self::$db==null){
			self::$db = new Database();
			self::$con = self::$db->connect();
		}
		return self::$con;
    }
    
    public static function ExeDoIt($sql){
		$con = Database::getCon();
		if(Core::$debug_sql){
			// echo "<pre> debug";
			// print_r($sql);
			// echo "</pre>";
			// exit();
		}
			// echo "<pre> good";
			// print_r($sql);
			// echo "<br>";
			// print_r($con->query($sql));
			// echo "</pre>";
			// exit();
		// print_r(array($con->query($sql),$con->insert_id)); exit();
		// if ($mysqli->error) return $mysqli->error;
	
		return array($con->query($sql),$con->insert_id);
	}
	
}
?>
