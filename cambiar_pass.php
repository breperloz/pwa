<?php
	
	require 'funcs/conexion.php';
	require 'funcs/funcs.php';
	
	if(empty($_GET['user_id'])){
		header('Location: index.html');
	}
	
	if(empty($_GET['token'])){
		header('Location: index.html');
	}
	
	$user_id = $mysqli->real_escape_string($_GET['user_id']);
	$token = $mysqli->real_escape_string($_GET['token']);
	
	if(!verificaTokenPass($user_id, $token))
	{
		echo 'No se pudo verificar los Datos';
		exit;
	}
	
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Inicio de sesión</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="manifest.json" />
   

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
    <form id="loginform" class="form-horizontal" role="form" action="guarda_pass.php" method="POST" autocomplete="off">
							
							<input type="hidden" id="user_id" name="user_id" value ="<?php echo $user_id; ?>" />
							
							<input type="hidden" id="token" name="token" value ="<?php echo $token; ?>" />
							
							<div class="form-group">
								<label for="password" class="col-md-8 control-label">Nueva contraseña</label>
								<div class="col-md-9">
									<input type="password" class="form-control" name="password" placeholder="Password" required>
								</div>
							</div>
							
							<div class="form-group">
								<label for="con_password" class="col-md-8 control-label">Confirmar contraseña</label>
								<div class="col-md-9">
									<input type="password" class="form-control" name="con_password" placeholder="Confirmar Password" required>
								</div>
							</div>
							
							<div style="margin-top:10px" class="form-group">
								<div class="col-sm-12 controls">
									<button id="btn-login" type="submit" class="btn btn-success">Actualizar</a>
								</div>
							</div>   
						</form>


    </div>
</div>
</body>
</html>
