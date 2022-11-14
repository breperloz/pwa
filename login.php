<?php
	
	require 'funcs/conexion.php';
	include 'funcs/funcs.php';
	
	session_start(); //Iniciar una nueva sesión o reanudar la existente
	
	// if(isset($_SESSION["id_usuario"])){ //En caso de existir la sesión redireccionamos
	// 	header("Location: welcome.php");
	// }

    if(isset($_SESSION['tipo_usuario']))
    {
        switch($_SESSION['tipo_usuario']){
        case 1:
            header('location: vistas/admin/index.php');
        break;
        case 2:
            header('location: vistas/usuarios/index.php');
        break;
        default:
            header('location: index.html');
        break;
        }
    }
    
	
	$errors = array(); 
	if(!empty($_POST))
	{
		$usuario = $mysqli->real_escape_string($_POST['usuario']);
		$password = $mysqli->real_escape_string($_POST['password']);
		
		if(isNullLogin($usuario, $password))
		{
			$errors[] = "Debe llenar todos los campos";
		}
		
		$errors[] = login($usuario, $password);	
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
    <li class="breadcrumb-item active" aria-current="page">Inicio de sesión</li>
  </ol>
</nav>



<div class="container">

    <?php/*
    //define variables with empty values
    $emailErr = $pwdErr = $rememberErr = '';
    $email = $pwd = $remember = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])){
        if (empty($_POST['email'])){
            $emailErr = 'Email is required!';
        }else{
            $email = validate($_POST['email']);
            //check if email address is well form
            if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $emailErr = 'Invalid email format!';
            }
        }

        if (empty($_POST['pwd'])){
            $pwdErr = 'Password is required!';
        }else{
            $pwd = validate($_POST['pwd']);
        }

        if (empty($_POST['remember'])) {
            $remember = '';
        }else{
            $remember = validate($_POST['remember']);
        }
    }

    function validate($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }*/
?>

    <div class="col-lg-offset-2 col-lg-10">
        <!-- login form -->
    <form method="post" class="form-horizontal"action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
        <h2>Ingrese sesión con sus datos</h2>
        <p class="text-danger">*Los datos son requeridos</p>
        <!-- email field -->
        <div class="form-group">
            <label class="control-label col-lg-2" for="email"><span class="text-danger">*</span> Usuario:</label>
            <div class="col-lg-4">
                <input type="text" class="form-control" id="usuario" placeholder="Ingresa usuario" name="usuario">
            </div>
        </div>
        <!-- password field -->
        <div class="form-group">
            <label class="control-label col-lg-2" for="pwd"><span class="text-danger">*</span> Contraseña:</label>
            <div class="col-lg-4">
                <input type="password" class="form-control" id="password" placeholder="Ingresa contraseña" name="password">
                <a href="recupera.php">¿Se te olvid&oacute; tu contraseña?</a>
            </div>
            <?php echo resultBlock($errors); ?>
        </div>
        <!-- submit and reset button field -->
        <div class="form-group">
            <div class="col-lg-offset-2 col-lg-4">
                <button type="submit" name="login" class="btn btn-success">Ingresar</button>
            </div>
        </div>
    </form>

    </div>
</div>
</body>
</html>
