<?php
	
	require 'funcs/conexion.php';
	include 'funcs/funcs.php';

	$errors = array();
	
	if(!empty($_POST))
	{
		$email = $mysqli->real_escape_string($_POST['email']);
		
		if(!isEmail($email))
		{
			$errors[] = "Debe ingresar un correo electronico valido";
		}
		
		if(emailExiste($email))
		{			
			$user_id = getValor('id', 'correo', $email);
			$nombre = getValor('nombre', 'correo', $email);
			
			$token = generaTokenPass($user_id);
			
			$url = 'http://'.$_SERVER["SERVER_NAME"].'/8cuatri/sitioweb/cambiar_pass.php?user_id='.$user_id.'&token='.$token;
			
			$asunto = 'Recuperar Password - Sistema de Usuarios';
			$cuerpo = "Hola $nombre: <br /><br />Se ha solicitado un reinicio de contrase&ntilde;a. <br/><br/>Para restaurar la contrase&ntilde;a, visita la siguiente direcci&oacute;n: <a href='$url'>$url</a>";
			
			if(enviarEmail($email, $nombre, $asunto, $cuerpo)){
				//echo "Hemos enviado un correo electronico a las direcion $email para restablecer tu password.<br />";
				//echo "<a href='index.php' >Iniciar Sesion</a>";
				//exit;
				header('location: res.php?');
			}
			} else {
			$errors[] = "La direccion de correo electronico no existe";
		}
	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Inicio de sesión</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/png" href="img/favicon.ico">
    <script src="https://kit.fontawesome.com/ffbbca13c5.js" crossorigin="anonymous"></script>
    

</head>
<body>
<!-- Navbar -->
<div class="container-fluid bg-info fixed-top">
  <nav class="navbar navbar-expand-md navbar-dark bg-info">
  <a class="navbar-brand" href="#">
    <img src="img/jalisco4.png" width="30" height="30" alt="" loading="lazy">
    Jalisco
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto mr-4">
      <li class="nav-item active">
        <a class="nav-link" href="index.html">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="http://conoceestadojalisco.blogspot.com/2012/10/cultura-en-jalisco.html">Cultura</a>
      </li> -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="https://es.wikipedia.org/wiki/Jalisco#Geograf%C3%ADa" tabindex="-1" aria-disabled="true">Geografía</a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" href="login.php" tabindex="-1" aria-disabled="true">Iniciar Sesión</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="registro.php" tabindex="-1" aria-disabled="true">Registrarse</a>
      </li>
      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Cuenta
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Registro
          </a>
          <a class="dropdown-item" href="login.php">Iniciar Sesión</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Recuperación de Contraseña</a>
        </div>
      </li> -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Ayuda
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Contáctanos
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Buzón</a>
          <a class="dropdown-item" href="#">Chat</a>
        </div>
      </li>
    </ul>
    <span class="navbar-text text-white">
    <i class="fas fa-search"></i>
  </span>
  </div>
</nav>
</div>
 <!-- Navbar -->



<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Library</li>
  </ol>
</nav>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
    <li class="breadcrumb-item"><a href="login.php">Iniciar sesión</a></li>
    <li class="breadcrumb-item active" aria-current="page">Recuperación de contraseña</li>
  </ol>
</nav>



    <div class="col-lg-offset-2 col-lg-10">
        <!-- login form -->
    <!-- <form method="post" class="form-horizontal" action="<?php //echo $_SERVER['PHP_SELF']; ?>"> -->
    <form method="post" class="form-horizontal" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
        <h2>Ingrese su correo</h2>
        <p class="text-danger">*Los datos son requeridos</p>
        
        <!-- email field -->
        <div class="form-group">
            <label class="control-label col-lg-2" for="email"><span class="text-danger">*</span>Correo:</label>
            <div class="col-lg-4">
                <input type="text" class="form-control" id="email" placeholder="Ingresar correo" name="email">
            </div>
            <?php //="<p class='text-danger'>$emailErr</p>";?>
        </div>

        
        <!-- submit and reset button field -->
        <div class="form-group">
            <div class="col-lg-offset-2 col-lg-4">
                <button type="submit" class="btn btn-success">Enviar</button>
                <!-- <button type="reset" class="btn btn-default">Reset</button> -->
            </div>
        </div>
    </form>


    </div>
</div>
</body>
</html>
