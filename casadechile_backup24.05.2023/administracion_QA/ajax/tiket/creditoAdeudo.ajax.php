<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
ob_start();
session_start();

require_once "../../modelos/conexion.php";
date_default_timezone_set("America/Mexico_City");
$fecha = date("Y-m-d H:i:s");

$tiket = $_REQUEST["folio"];
$monto = $_REQUEST["monto"];
$fecha_promesa = $_REQUEST["fecha_promesa"];
$metodo = 'credito';

//?? marcar tiket Credito
//?? marcar tiket Credito

//extraer monto del tiket
$stmt = Conexion::conectar()->prepare("
select  sum(c.precio * c.peso) as costo,v.monto_total from compras c 
inner JOIN venta_tiket v 
on c.id_venta = v.folio 
where c.estatus<>'pagado' and c.id_venta = :tiket");

$stmt->bindParam(":tiket", $tiket, PDO::PARAM_STR);
$stmt -> execute();
$datosTiket = $stmt -> fetchAll(PDO::FETCH_CLASS);

//!!S LA SUMA LLEVA DESCUENTOS LA HACE MAL, SE DEBE CORREGITR LA FORMA EN QUE COMPARA LA SUMA EN EL SQL.
if ($monto == $datosTiket[0]->costo || ($monto == $datosTiket[0]->monto_total ) ) { //comprueba que los tres montos sean iguales 
    
    //?? marcar tiket Credito
    $stmt = Conexion::conectar()->prepare("
    UPDATE venta_tiket set 
    metodoPago = 'credito', estatus='credito' ,monto_pago='0', monto_adeudo='$monto', fecha_adeudo='$fecha', fecha_promesa_adeudo='$fecha_promesa'
    where folio = :tiket;
    ");
    $stmt->bindParam(":tiket", $tiket, PDO::PARAM_STR);
    $stmt -> execute();

    //???ingresr tiket en adeudos
    $stmt = Conexion::conectar()->prepare("
    INSERT INTO tiket_adeudos (folio_unico, metodoPago,cantidad,pagoExhibicion,diferido,debe,fechaAdeudo,fechaPago,fecha_promesa_adeudo,usuario)
    values(:tiket,'',$monto,'1','0','1','$fecha','0000-00-00 00:00:00','$fecha_promesa','".$_SESSION['nombre']." ".$_SESSION['paterno']." - email:".$_SESSION['email']."')
    ");
    $stmt->bindParam(":tiket", $tiket, PDO::PARAM_STR);
    $stmt -> execute();

      //? marcar compras como pagadas!!
      $stmt=Conexion::conectar()->prepare("
      UPDATE compras SET estatus='credito' where id_venta = :folio_unico
      ");
      $stmt->bindParam(":folio_unico", $tiket, PDO::PARAM_STR);
      if ($stmt -> execute()) {//si edita el estatus de todos los productos del folio unico. ok
          print "ok crédito cargado";
      }else{
            echo "algo salio mal tiket pagos compras"; 
            echo "comp:";
            print_r($datosTiket[0]->costo );

            echo "<br>comp:";
            print_r($datosTiket[0]->monto_total );

            echo "<br>comp:";
            print_r($monto );
      }

    

    
}else{
    if($datosTiket){
        print_r($datosTiket);
        echo "error por que no hace nada datosTiket";
    }else{
        echo "error";
        
    }
    print_r($datosTiket[0]->costo );

            echo "<br>comp:";
            print_r($datosTiket[0]->monto_total );

            echo "<br>comp:";
            print_r($monto );
    exit();
}



