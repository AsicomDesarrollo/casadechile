<?php
/**
 *  @elmm Model almacena rutinas para los modelos.
 * */ 

class Model {

	public function Model(){
		
	}

	public static function exists($modelname){
		$fullpath = self::getFullpath($modelname);
		$found=false;
		if(file_exists($fullpath)){
			$found = true;
		}
		return $found;
	}

	public static function getFullpath($modelname){
		return Core::$root."core/app/model/".$modelname.".php";
	}

	/**
	 * @param $query : no necesita modelo, ALERT!! puede ser peligroso.
	 */
	public static function many_assoc($query){
		$cnt = 0;
		$array = [];
		/* echo "<pre>";
		print_r($query);
		echo "<pre>"; */
		
		while($r = $query->fetch_assoc()){
			$array[$cnt] = [];
			$cnt2=1;
			foreach ($r as $key => $v) {
				if($cnt2>0){ 
					$array[$cnt][$key] = $v;
				}
				$cnt2++;
			}
			$cnt++;
		}
		return $array;
	}
	public static function many_assoc_bk($query,$aclass){
		$cnt = 0;
		$array = array();
		/* echo "<pre>";
		print_r($query);
		echo "<pre>"; */
		
		while($r = $query->fetch_assoc()){
			$array[$cnt] = new $aclass;
			$cnt2=1;
			foreach ($r as $key => $v) {
				if($cnt2>0 && $cnt2%2==0){ 
					$array[$cnt]->$key = $v;
				}
				$cnt2++;
			}
			$cnt++;
		}
		return $array;
	}

	public static function many($query,$aclass){
		$cnt = 0;
		$array = array();
		/* echo "<pre>";
		print_r($query);
		echo "<pre>"; */
		
		while($r = $query->fetch_array()){
			$array[$cnt] = new $aclass;
			$cnt2=1;
			foreach ($r as $key => $v) {
				if($cnt2>0 && $cnt2%2==0){ 
					$array[$cnt]->$key = $v;
				}
				$cnt2++;
			}
			$cnt++;
		}
		return $array;
    }
    
	public static function one($query,$aclass){
		$cnt = 0;
		$found = null;
		$data = new $aclass;
		while($r = $query->fetch_array()){
			$cnt=1;
			foreach ($r as $key => $v) {
				if($cnt>0 && $cnt%2==0){ 
					$data->$key = $v;
				}
				$cnt++;
            }
            
			$found = $data;
			break;
		}
		return $found;
	}

	public static function unsetOne($query){
			$cnt = 0;
			$found = null;
			$data = [];
			while($r = $query->fetch_array()){
				$cnt=1;
				foreach ($r as $key => $v) {
					if($cnt>0 && $cnt%2==0){ 
						$data[] = $v;
					}
					$cnt++;
				}
				
				$found = $data;
				break;
			}
			return $found;
	}

}

?>