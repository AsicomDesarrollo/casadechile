<?php
//Thank you for signing up for ".$hotel."!
$link__pdf="";

$opciones = [ 'cost' => 12 ];
			$hash = password_hash('Catalonia', PASSWORD_BCRYPT, $opciones);
			print_r($hash);
            core::preprint($hash,'hash');

$data = array(
    'nombre'=> 'Erickm',
    'paterno'=> 'Malagonom',
    'correo'=> 'erick.leo.malagon@gmail.com',
    'prueba'=> 'CRT202020',
    'estatus'=> 'Positivo',
    'paciente'=> 'Fulanito de tal',
    'tipo_test'=> 'Prueba PCR',
    'hotel_link'=> 'CataloniaRoyalTulum',
    'hotel'=> 'Catalonia Royal Tulum'
 );
//core::preprint($data['prueba']);

core::preprint($_SESSION);

echo "nada aqui";
echo "ya esta en modo prod";
echo "nada aqui";
/*  Pruebas::send_result_test_prueba('CRT7561') */;


core::preprint(Core::getTimeStamp(),'timeStamp');
core::preprint(Core::getTimeStamp('2021-09-24 17:27:45'),'timeStamp2');


$sql="select id from compras where id_venta = '1632587776'  and producto = 49 and title like 'chile';";
$sql="select * from compras where id_venta = '1632587776' and title = '%chile%';";
$query = Database::ExeDoIt($sql);
core::preprint($query);
core::preprint($query[0]->num_rows);

if($query[0]->num_rows>1)
echo "es mayor";



?>