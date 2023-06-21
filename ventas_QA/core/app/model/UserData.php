<?php
class UserData {
	public static $tablename = "empleados";

	public function Userdata(){
		$this->id = "";
		$this->rol = "";
	}

	public static function loginEmpleado($email){
		

	}

	public static function getUserName($nombre){
		$nombre= explode(" ",$nombre);
		$sql= "select * from usuarios where like nombre '%".$nombre[1]."%' or paterno like '".$nombre[1]."' ";
		$query = Database::exeDoIt($sql);
		$data=Model::many($query[0],new UserData());
		return $data;
	}

	public static function getUserEmail($email){
		$sql= "select * from usuarios where like email = '%".$email."%' ";
	}

	public static function getUserGroup($grupo){
		$data=[
			0=>"Modo Full",				//? ASICOM cambia y edita pruebas, registra, etc (no borra)	
			1=>"Huesped",				//? Solo Registra, Paga, Descarga PDF de pruebas, agenda citas
			2=>"Supervisor Hotel",		//? Solo mira Datos del hotel y descarga PDF
			3=>"Super Administrador",	//? DIEMSA Solo Cambia estatus de pruebas segun su estado de pago y su resultado covid, envia emails de resultados.
			4=>"Call Center",			//? todos los hoteles, edita pruebas, no pagos, no resultados.
			5=>"Staff Diemsa", 				//?? solo cambia de terminal a ['cargo al hotel', 'fectivo', 'tpv']
			6=>"Supervisor Cadena",			//? Solo mira Datos de la cadena hotelera
			7=>"Supervisor Diemsa",			//? Solo mira Datos de todos los hoteles
		];
		$rol="";
		switch ($grupo) {
			case 'callcenter':
				$rol = 4;
				break;
			case 'huespedes':
				$rol = 1;
				break;
			case 'hoteles':
				$rol = 2;
				break;
			case 'staff':
				$rol = 5;
				break; 
			default:
				
				break;
		}
		if ($rol==1) $extend=" lwerewimit 50";
		$extend = "";

		$sql= "select id,
		concat(nombre,' ',paterno,' ',materno) as nombres,
		paterno,
		materno,
		email,
		telefono,
		fecha_nacimiento,
		hotel,
		created_at,
		active from usuarios where rol = '".$rol."' order by id desc limit 500";
		$query = Database::exeDoIt($sql);
		$data=Model::many($query[0],new UserData());
		//core::preprint($data);exit();
		return $data;

	}

	public static function getAllPruebas(){
		$base = new Database();
		$con = $base->connect();
		$sql = "SELECT * FROM pruebas WHERE id_usuario = " . $_SESSION['id'] ."ORDER BY id DESC";
		$query = $con->query($sql);
		//$data=Model::many($query[0],new UserData());
		return $query->fetch_array();
	}

	public static function getAllAlumnos(){
		$sql = "select id,boleta,curp,nombre,a_paterno,a_materno,email,username,tipo,status,telefono from ".self::$tablename." where rol='student'";
		$query = Database::exeDoIt($sql);
		$data=Model::many($query[0],new UserData());
		return $data;
	}

	public static function getAllCoordinadores(){
		$sql = "select id,nombre,a_paterno,a_materno,email,username,status from ".self::$tablename." where rol='coordinator'";
		$query = Database::exeDoIt($sql);
		$data=Model::many($query[0],new UserData());
		return $data;
	}

	public static function UserRecoveryPassword($mail,$phone,$hotel,$link){
		$sql = "select nombre,email,id from ".self::$tablename." where email='".$mail."' and telefono = '".$phone."' and hotel= '".$hotel."' ";
		$query = Database::exeDoIt($sql);

		
		if( $query[0]->num_rows==1){  //usuario existe en este hotel y con ese correy y telefono
			$data =  Model::unsetOne($query[0]);
			//core::preprint($data);
			return $data;
		}
		else{
			return false;
		}
	}

	public static function UserRecoveryPasswordChange($id,$secret){
		$sql = "update  ".self::$tablename." set password= '". self::pass_hash($secret) ." 
		where id='".$id;
		$query = Database::exeDoIt($sql);
		if( $query[0]->num_rows==1){  //isset($data->email)){
			return true;
		}
		else{
			return false;
		}
	}

	public static function userExist($mail,$hotel,$link){
		$sql = "select nombre,email from ".self::$tablename." where email='".$mail."' and hotel ='".$hotel."'";
		// echo $sql; exit();
		$query = Database::exeDoIt($sql);
		//$data=Model::one($query[0],new UserData());
		//core::preprint($query[0]->num_rows);
		//exit();
		if( $query[0]->num_rows==1){  //isset($data->email)){
			//echo "si existe";
			//var_dump($data->email);
			return true;
			//die();
			//header("Location:./?hotel=".$link."&existe=".$mail."&noregistrado");
			//exit();
		}
		else{
			//echo "no existe";
			//var_dump($data->email);
			return false;
		}
	}

	public static function registroUsuario($data){
		$ahora = core::getTimeNow();

		//core::preprint($data);

		$sql = "select nombre,email from ".self::$tablename." where email='".$data['email']."' and hotel ='".$data['hotel']."'";
		//echo $sql; exit();
		$query = Database::exeDoIt($sql);
		if( $query[0]->num_rows==0){ 
			$pass= self::pass_hash($data['password']);

			$sql="insert into ".self::$tablename."
			(nombre,paterno,materno,email,password,telefono,hotel,fecha,rol,active,created_at,
			fecha_nacimiento,nacionalidad,pasaporte,habitacion)
				values
			('".$data['nombre']."','".$data['paterno']."','".$data['materno']."','".$data['email']."','".$pass."','".$data['telefono']."','".strtoupper($data['hotel'])."','".$ahora."','1',1,'".$ahora."',
			'','','','')";
			//core::preprint($sql);
			//  exit();
			$query = Database::exeDoIt($sql);
			if(!$query){header("Location:./?hotel=".$data['rhotel']."&newUserNO=".$data['email']);}
				
				//$hotel_num = array_search($data['rhotel'],Hoteles::$hoteles);
			$datas = array(
				'nombre'=> $data['nombre'],
				'paterno'=> $data['paterno'],
				'correo'=> $data['email'],
				'hotel_link'=> $data['rhotel'], //CAtaloniaRoyalTulum
				//'hotel'=> Hoteles::$hoteles_nombres[$hotel_num] //full name hotel Catalonia Royal Tulum
			 ); 
			Correo::send_register_user($datas);
			header("Location:./?hotel=".$data['rhotel']."&newUser=".$data['email']);
		}
		else{
			header("Location:./?hotel=".$data['rhotel']."&existe=".$data['email']);
		}
		//Core::preprint(self::userExist($data['email'],$data['hotel'],$data['rhotel']), "userExist");
	}

	public static function getRol($id){
		//$pocisiones(1,2,3,4);
		$data=[
			0=>"Modo Full",				//? ASICOM cambia y edita pruebas, registra, etc (no borra)	
			1=>"Huesped",				//? Solo Registra, Paga, Descarga PDF de pruebas, agenda citas
			2=>"Supervisor Hotel",		//? Solo mira Datos del hotel y descarga PDF
			3=>"Super Administrador",	//? DIEMSA Solo Cambia estatus de pruebas segun su estado de pago y su resultado covid, envia emails de resultados.
			4=>"Call Center",			//? todos los hoteles, edita pruebas, no pagos, no resultados.
			5=>"Staff Diemsa", 				//?? solo cambia de terminal a ['cargo al hotel', 'fectivo', 'tpv']
			6=>"Supervisor Cadena",			//? Solo mira Datos de la cadena hotelera
			7=>"Supervisor Diemsa",			//? Solo mira Datos de todos los hoteles
		];
		//$index= array_search($id,$data);
		return $data[$id];
	}

	public static function SetSession($id){
		$sql = "select * from ".self::$tablename." where id=\"$id\"";
		$query = Database::exeDoIt($sql);
		$data=Model::one($query[0],new UserData());
		Session::setUID($id);
		if (Session::setSessionUser($data)){ return true; }
		else { return false;}
	}

}

?>