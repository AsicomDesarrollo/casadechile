<?php
    
    require_once "./conexion.php";

    $conexion = mysqli_connect($host, $user, $pw, $db);
    
    $usuariorec = $_POST["usuario"];
    $passwordrec = $_POST["password"];
    
    $statement = mysqli_prepare($conexion, "SELECT * FROM usuarios WHERE email = ?");
    mysqli_stmt_bind_param($statement, "s", $usuariorec);
    mysqli_stmt_execute($statement);
    
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $id, $nombre, $paterno, $materno, $foto, $password, $direccion, $cp, $cliente_id, $tarjeta_id, $tarjeta_final, $tarjeta_nombre, $email, $celular , $modo, $fecha);
    
    $response = array();
    $response["success"] = false;  
    
    while(mysqli_stmt_fetch($statement)){

        if(password_verify($passwordrec, $password)){

            $response["success"] = true;
            $response["id"] = $id;
            $response["nombre"] = $nombre;
            $response["paterno"] = $paterno;
            $response["materno"] = $materno;
            $response["celular"] = $celular;
            $response["foto"] = $foto;
            $response["direccion"] = $direccion;
            $response["cp"] = $cp;
            $response["cliente"] = $cliente_id;
            $response["tarjeta"] = $tarjeta_id;
            $response["tarjetaFinal"] = $tarjeta_final;
            $response["tarjetaNombre"] = $tarjeta_nombre;
            
        }else{

            $response["success"] = false;

        }

    }
    
    echo json_encode($response);