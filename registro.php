<?php
    //define variables and set value empty
    $nameErr = $emailErr = $pwdErr = $pwdcErr = $genderErr = $websiteErr = $acceptErr = '';
    $name = $email = $pwd = $pwdc = $gender = $website = $accept = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])){
        if (empty($name)){
            $nameErr = 'name is required!';
        }else{
            $name = validate($_POST['name']);
            //check if name format is correct
            if (!preg_match("/^[a-zA-Z ]*$/",$name)){
                $nameErr = 'only letters and white space allowed!';
            }
        }

        if (empty($email)){
            $emailErr = 'email is required!';
        }else{
            $email = validate($_POST['email']);
            //check if the email format is correct
            if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $emailErr = 'email format is not correct!';
            }
        }

        if (empty($pwd)){
            $pwdErr = 'password is required!';
        }else{
            $pwd = validate($_POST['pwd']);
            //check if the password format is correct
        }

        if (empty($pwdc)){
            $pwdcErr = 'password is not confirmed!';
        }else{
            $pwdc = validate($_POST['pwdc']);
            //check if the password is matched or not
        }

        if (empty($gender)) {
            $genderErr = 'gender is required!';
        }else{
            $gender = validate($_POST['gender']);
        }

        if (empty($website)) {
            $websiteErr = '';
        }else{
            $website = validate($_POST['website']);
            //check if URL address syntax is valid (this regular expression also allows dashes in the URL)
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
                $websiteErr = "Invalid URL";
            }
        }

        if (empty($accept)) {
            $acceptErr = 'you must accept the terms and conditions!';
        }else{
            $accept = validate($_POST['accept']);
        }
    }
  
  function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
    <li class="breadcrumb-item active" aria-current="page">Registrar</li>
  </ol>
</nav>

<div class="container">

    <div class="col-lg-offset-2 col-lg-12">
    <h2>Registro</h2>
    <p class="text-danger">* Campo requerido</p>
      <!-- registration form -->
    <form method="post" class="form-horizontal" action="<?php//=htmlspecialchars($_SERVER['PHP_SELF']);?>" action="res.php">
      <!-- name field -->
        <div class="form-group">
            <label class="control-label col-lg-2" for="name"><span class="text-danger">*</span> Nombre Completo:</label>
            <div class="col-lg-4">
                <input type="text" class="form-control" id="name" placeholder="Nombre Completo" name="name" value="<?=$name;?>" required>
            </div>
            <?="<p class='text-danger'>$nameErr</p>";?>
        </div>
      
      <!-- email field -->
        <div class="form-group">
            <label class="control-label col-lg-2" for="user"><span class="text-danger">*</span> Usuario:</label>
            <div class="col-lg-4">
                <input type="text" class="form-control" id="user" placeholder="Usuario" name="user" value="<?=$email;?>" required>
            </div>
            <?="<div class='text-danger'>$emailErr</div>";?>
        </div>
      
      <!-- password field -->
        <div class="form-group">
            <label class="control-label col-lg-2" for="pwd"><span class="text-danger">*</span> Contraseña:</label>
            <div class="col-lg-4">
                <input type="password" class="form-control" id="pwd" placeholder="Contraseña" name="pwd" value="<?=$pwd;?>" required>
            </div>
            <?="<p class='text-danger'>$pwdErr</p>";?>
        </div>
      
      <!-- password confirm field -->
        <div class="form-group">
            <label class="control-label col-lg-2" for="confm-pwd"><span class="text-danger">*</span> Repite Contraseña:</label>
            <div class="col-lg-4">
                <input type="password" class="form-control" id="pwd" placeholder="Confirmar contraseña" name="pwdc" value="<?=$pwdc;?>" required>
            </div>
            <?="<p class='text-danger'>$pwdcErr</p>";?>
        </div>
      
      <!-- gender field -->
        <div class="form-group">
            <label class="control-label col-lg-5" for="gender"><span class="text-danger">*</span> Género:</label>
            <div class="col-lg-5">
                <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo 'checked';?> value="Female"> Femenino
                <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo 'checked';?> value="Male"> Masculino
            </div>
            <?="<p class='text-danger'>$genderErr</p>";?>
        </div>
      
      <!-- website field -->
        <!-- <div class="form-group">
            <label class="control-label col-lg-2" for="website">Área:</label>
            <div class="col-lg-4">
                <input type="text" class="form-control" id="site" placeholder="Website" name="website" value="<?=$website;?>" required>
            </div>
            <?php//="<p class='text-danger'>$websiteErr</p>";?>
        </div> -->
      
      <!-- profile picture field -->
        <!-- <div class="form-group">
            <label class="control-label col-lg-2" for="photo">Foto de Perfil:</label>
            <label class="col-lg-4 custom-file">
                <input type="file" id="file2" class="custom-file-input" required>
                <span class="custom-file-control"></span>
            </label>
        </div> -->
      
      <!-- acceptence field -->
        <!-- <div class="form-group">
            <div class="col-lg-offset-2 col-lg-4">
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="accept" value="" required> <span class="text-danger">*</span> Acepto los términos y condiciones.
                    </label>
                </div>
            </div>
            <?php//="<p class='text-danger'>$acceptErr</p>";?>
        </div> -->
      
      <!-- submit and reset button field -->
        <div class="form-group">
            <div class="col-lg-offset-2 col-lg-4">
                <button type="submit" name="register" class="btn btn-success">Registrar</button>
                <!-- <button type="reset" class="btn btn-default">Reset</button> -->
            </div>
        </div>
    </form>
    </div>
</div>
</body>
</html>
