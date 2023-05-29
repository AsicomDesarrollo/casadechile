<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
ob_start();
session_start();

require_once "../../modelos/conexion.php";
date_default_timezone_set("America/Mexico_City");
$fecha = date("Y-m-d H:i:s");

$tiket = $_REQUEST["tiket"];
$total = $_REQUEST["total"];


$pagos= array();
$credito= '';

$pagos['efectivo'] = $_REQUEST["difEfe"];
$pagos['tarjeta'] = $_REQUEST["difTar"];
$pagos['transferencia'] = $_REQUEST["difTra"];
$credito = $_REQUEST["difCre"];
   

$stmt = Conexion::conectar()->prepare("
select  sum(c.precio * c.peso) as costo,v.monto_total from compras c 
inner JOIN venta_tiket v 
on c.id_venta = v.folio 
where c.estatus<>'pagado' and c.id_venta = :tiket");

$stmt->bindParam(":tiket", $tiket, PDO::PARAM_STR);
// $stmt->bindParam(":total", $total, PDO::PARAM_STR);

$stmt -> execute();
$datosTiket = $stmt -> fetchAll(PDO::FETCH_CLASS);

//todo:primera validacion de costos totales por productos y por tiket
if ($datosTiket[0]->costo == $datosTiket[0]->monto_total and ($total = $datosTiket[0]->monto_total)) { //valida que no se hagan movimientos durante la transaccion
    //?los montos a pagar son iguales en DB en(tiket-compras) y pasara a cargar los registros de pagos. validando el costo total

    $pagoExhibicion=1;
    $debe=0;
    $fechaPago = $fecha;
    $user = $_SESSION['nombre']." ".$_SESSION['paterno']." - email:".$_SESSION['email'];
    $diferido = 1;

    $sumaPagos=intval(0);
    foreach ($pagos as $k => $val) { //suma pagos
        $sumaPagos = intval($sumaPagos) + intval($val);
    }
    // echo "suma:";
    // echo $sumaPagos;

    //todo:segunda validacion de costos totales BD y suma del POST del fomulario de pagos
    if ($datosTiket[0]->costo == $sumaPagos){ //compara la suma de los pagos a registrar con el total en bd del tiket //DEBE SUMAR EL TOTAL DE LA DEUDA
            //! si es igual la suma del formulario de pagos a la deuda del tiket, graba datos sin deudas.
            $pagoExhibicion=1;
            $debe = 0;
            $diferido = 'diferido';
        
            foreach ($pagos as $metodo => $cantidad) { //recorre array de los 4 metodos de pago y los inserta en la base de datos.
                // *sin adeudos*
                
                if ($cantidad==0 || $cantidad==false || $cantidad==null ){
                    continue; //si un campo de cantidad esta en ceros, saltar insert db
                }

                //?? pagos del tiket
                $stmt=Conexion::conectar()->prepare("
                insert into tiket_pagos(folio_unico,metodoPago,cantidad,pagoExhibicion,debe,fechaPago,diferido,usuario) 
                values(:folio_unico,:metodoPago,:cantidad,:pagoExhibicion,:debe,:fechaPago,:diferido,:usuario);");

                $stmt->bindParam(":folio_unico", $tiket, PDO::PARAM_STR);
                $stmt->bindParam(":metodoPago", $metodo, PDO::PARAM_STR);
                $stmt->bindParam(":cantidad", $cantidad, PDO::PARAM_INT);
                $stmt->bindParam(":pagoExhibicion", $pagoExhibicion, PDO::PARAM_INT);
                $stmt->bindParam(":debe", $debe, PDO::PARAM_INT);
                $stmt->bindParam(":fechaPago", $fechaPago, PDO::PARAM_STR);
                $stmt->bindParam(":diferido", $diferido, PDO::PARAM_INT);
                $stmt->bindParam(":usuario", $user, PDO::PARAM_STR);
                $stmt -> execute();
            }
            
            //?pago a la venta del tiket
            $stmt = Conexion::conectar()->prepare("
                UPDATE venta_tiket SET metodoPago = :metodo, monto_pago=:monto, estatus='pagado', fecha_pago=:fechaPago where folio = :folio
            ");
            $stmt->bindParam(":folio", $tiket, PDO::PARAM_STR);
            $stmt->bindParam(":metodo", $diferido, PDO::PARAM_STR);
            $stmt->bindParam(":monto", $sumaPagos, PDO::PARAM_STR);
            $stmt->bindParam(":fechaPago", $fechaPago, PDO::PARAM_STR);
            $stmt->execute();

             //? marcar compras como pagadas!! EN MODO DIFERIDO
            $stmt=Conexion::conectar()->prepare("
            UPDATE compras SET estatus='pagado' where id_venta = :folio_unico
            ");
            $stmt->bindParam(":folio_unico", $tiket, PDO::PARAM_STR);
            if ($stmt -> execute()) {//si edita el estatus de todos los productos del folio unico. ok
                echo "ok cargo diferido";
            }else{
                echo "algo salio mal tiket pagos diferido sin adeudos"; 
            }

    }
    
    //*aca debe ingresar el restante de la suma a CREDITO
    else{
        // *CON adeudos A CREDITO AUTO*
        // *CON adeudos A CREDITO AUTO*
        // *CON adeudos A CREDITO AUTO*

        //! falta crear los abonos del credito
        $pagoExhibicion=1;
        $debe = 1;
        //aca debe ingresar el restante de la suma a CREDITO
    
    
        foreach ($pagos as $metodo => $cantidad) { //recorre array de los 4 metodos de pago y los inserta en la base de datos.
            // *sin adeudos*

            if ($cantidad==0 || $cantidad==false || $cantidad==null ){
                continue; //si un campo de cantidad esta en ceros, saltar insert db
            }


            //?? pagos del tiket
            $stmt=Conexion::conectar()->prepare("
            insert into tiket_pagos(folio_unico,metodoPago,cantidad,pagoExhibicion,debe,fechaPago,diferido,usuario) 
            values(:folio_unico,:metodoPago,:cantidad,:pagoExhibicion,:debe,:fechaPago,:diferido,:usuario);");

            $stmt->bindParam(":folio_unico", $tiket, PDO::PARAM_STR);
            $stmt->bindParam(":metodoPago", $metodo, PDO::PARAM_STR);
            $stmt->bindParam(":cantidad", $cantidad, PDO::PARAM_INT);
            $stmt->bindParam(":pagoExhibicion", $pagoExhibicion, PDO::PARAM_INT);
            $stmt->bindParam(":debe", $debe, PDO::PARAM_INT);
            $stmt->bindParam(":fechaPago", $fechaPago, PDO::PARAM_STR);
            $stmt->bindParam(":diferido", $diferido, PDO::PARAM_INT);
            $stmt->bindParam(":usuario", $user, PDO::PARAM_STR);
            $stmt -> execute();
        }
         //?? pagos del tiket
         if(($datosTiket[0]->costo - $sumaPagos) == $credito){
            $diferido = 1; //si el costo a pagar es iual que el credito, se va todo a credito y ya no es diferido.
         }else{
            $credito = ($datosTiket[0]->costo - $sumaPagos);
         }

        $stmt=Conexion::conectar()->prepare("
        insert into tiket_adeudos(folio_unico,metodoPago,cantidad,pagoExhibicion,debe,fechaAdeudo,diferido,usuario,fechapago) 
        values(:folio_unico,'credito',:cantidad,:pagoExhibicion,:debe,:fechaAdeudo,:diferido,:usuario,'0000-00-00 00:00:00')");

        $stmt->bindParam(":folio_unico", $tiket, PDO::PARAM_STR);
        // $stmt->bindParam(":metodoPago", 'credito', PDO::PARAM_STR);
        $stmt->bindParam(":cantidad", $credito, PDO::PARAM_INT);
        $stmt->bindParam(":pagoExhibicion", $pagoExhibicion, PDO::PARAM_INT);
        $stmt->bindParam(":debe", $debe, PDO::PARAM_INT);
        $stmt->bindParam(":fechaAdeudo", $fechaPago, PDO::PARAM_STR);
        $stmt->bindParam(":diferido", $diferido, PDO::PARAM_INT);
        $stmt->bindParam(":usuario", $user, PDO::PARAM_STR);
        if($stmt -> execute()){
            
        }else{
            print_r($stmt );
        }
        
        //?pago a la venta del tiket
        $stmt = Conexion::conectar()->prepare("
            UPDATE venta_tiket SET metodoPago = 'diferido', monto_pago=:monto, monto_adeudo=:credito, estatus='pagado', fecha_pago=:fechaPago, fecha_adeudo=:fecha_adeudo where folio=:folio
        ");
        $stmt->bindParam(":folio", $tiket, PDO::PARAM_STR);
        // $stmt->bindParam(":metodo", 'diferido', PDO::PARAM_STR);
        $stmt->bindParam(":monto", $sumaPagos, PDO::PARAM_STR);
        $stmt->bindParam(":credito", $credito, PDO::PARAM_STR);
        $stmt->bindParam(":fechaPago", $fechaPago, PDO::PARAM_STR);
        $stmt->bindParam(":fecha_adeudo", $fechaPago, PDO::PARAM_STR);
        $stmt->execute();

         //? marcar compras como pagadas!! EN MODO DIFERIDO
        $stmt=Conexion::conectar()->prepare("
        UPDATE compras SET estatus='diferido' where id_venta = :folio_unico
        ");
        $stmt->bindParam(":folio_unico", $tiket, PDO::PARAM_STR);
        if ($stmt -> execute()) {//si edita el estatus de todos los productos del folio unico. ok
            echo "ok cargo diferido";
        }else{
            echo "algo salio mal tiket pagos diferido adeudo"; 
        }
    }

     //??TERMINA IF DE CON ADEUDOS O SIN ADEUDOS....
     
    
   
}else{
	echo "error";
}