<?php
if(isset($_POST['user'])){
    $email = $_POST['user'];
    $pass = $_POST['pass'];

    $base = new Database();
    $con = $base->connect();
    $sql = "select pass,id,email,nombre,paterno,materno from empleados where email= '". $email ."' AND estatus='1' ";
    $query = $con->query($sql);
    $resultado = mysqli_num_rows($query);
                //$opciones = [ 'cost' => 12 ];
                //$hash = password_hash($pass, PASSWORD_BCRYPT, $opciones);
                //print_r( $hash);
    if ($resultado==1){
        //existe el usuario
        $hash= $query->fetch_assoc();
        if (password_verify($pass, $hash['pass'])) {
            $_SESSION['id']= $hash['id'];
            $_SESSION['email']= $hash['email'];
            $_SESSION['nombre']= $hash['nombre'];
            $_SESSION['paterno']= $hash['paterno'];
            $_SESSION['materno']= $hash['materno'];
            print 'successLogin';
        } else {
            print 'errorLogin';
        }
    }
}else if (isset($_SESSION['id']) ){
    //core::preprint($_SESSION);
    header("Location: ./?view=index");
}else{
    header("Location: /index.php");
}

?>