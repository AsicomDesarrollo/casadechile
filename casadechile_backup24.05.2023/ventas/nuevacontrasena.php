<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Asicom</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css"/>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</head>

<?php

$idUsuario = base64_decode($_GET['cbowebg']);

if($idUsuario){

	echo '<script>var idUsuario = "'.$idUsuario.'";</script>';

}

?>

<body style="background:#4A0D41; font-family:sans-serif; background-image: url('vistas/img/plantilla/fondoexagono.png'); background-size: cover;">

	<div style="position:relative; margin-bottom: 0px; width:100%; background: #000000;">

		<img style="padding:20px; width:15%" src="vistas/img/plantilla/logoanimado.gif">
		
	</div>

	<div class="container" style="margin-top: 40px;">

	  <div class="row">

	  	<div class="col-sm-3">
	  		
	  		<span></span>

	  	</div>
	  	
	    <div class="col-sm-6" style="background-color: #ffffff; border-radius: 20px; padding-bottom: 30px;">

	    	<center>

	    		<br>

				<h3 style="font-weight:100; color: #000000">Bienvenido a Asicom Systems</h3>

				<br>

				<h5 style="font-weight:100; color: #000000">Para continuar a tu panel de</h5>

				<h5 style="font-weight:100; color: #000000">usuario, crea una contraseña:</h5>

				<hr style="border:1px solid #666666; width:80%;margin-bottom:5px;">

				<br>

				<label style="color: #1BCE89;">Ingresa una nueva contraseña:</label>

				<br>

				<input type="password" id="password" style="background-color: #eeeeee; border: none; padding: 15px 32px; font-size: 16px; width: 90%; border-radius: 30px;" placeholder="Contraseña">

				<br><br>

				<label style="color: #1BCE89;">Confirmar contraseña:</label>

				<br>

				<input type="password" id="repetir" style="background-color: #eeeeee; border: none; padding: 15px 32px; font-size: 16px; width: 90%; border-radius: 30px;" placeholder="Repetir contraseña">

				<br>

				<br>

				<button id="btnEnviar" style="background-color: #F8615A; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; font-size: 16px; cursor: pointer; width: 40%;">Cambiar contraseña</button>

				<br><br>

				<h7 style="font-weight:100; color: #000000">Utiliza al menos una letra mayúscula y un numero en tu contraseña.</h7>
			
			</center>
	    
	    </div>
	    
	  </div>

	</div>

</body>

<script type="text/javascript">

$("#btnEnviar").click(function(){

	var password = $("#password").val();
	var repassword = $("#repetir").val();

	if(password == repassword){

		var datos = new FormData();
		datos.append("id", idUsuario);
		datos.append("contrasena", password);

		$.ajax({
			url:"https://mcgnetworks.mx/asicom/cliente/ajax/contrasena.ajax.php",
			method:"POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			success:function(respuesta){

				console.log(respuesta);

				if(respuesta == "ok"){

					$("#password").val("");
					$("#repetir").val("");

					swal({
					   title: "¡Es un placer ayudarte!",
					   text: "Tu contraseña ha sido cambiada",
					   type: "success",
				 	});

				}else{

					$("#password").val("");
					$("#repetir").val("");

					swal({
					   title: "¡Upsss",
					   text: "Ha ocurrido un error, intentalo mas tarde",
					   type: "error",
				 	});

				}

			}

		})

		

	}else{

		$("#password").val("");
		$("#repetir").val("");

		swal({
		   title: "¡Upsss",
		   text: "Las contraseñas no coinciden",
		   type: "error",
	 	});

	}

});

</script>

