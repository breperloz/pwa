<?php 
require '../../funcs/conexion.php';
include '../../funcs/funcs.php';

session_start(); //Iniciar una nueva sesión o reanudar la existente
  if(!isset($_SESSION['tipo_usuario'])){
      header('location: ../../index.php');
  }else{
      if($_SESSION['tipo_usuario'] != 2){
          header('location: ../../index.php');
      }
  }

  $idUsuario = $_SESSION['id_usuario'];

$sql = "SELECT id, nombre FROM usuarios WHERE id = '$idUsuario'";
$result = $mysqli->query($sql);

$row = $result->fetch_assoc();
$idUser= $row['id'];

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/png" href="img/favicon.ico">
    <script src="https://kit.fontawesome.com/ffbbca13c5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  <link rel="stylesheet" href="style.css">
  <link rel="manifest" href="manifest.json" />
    <title>Jalisco</title>
  </head>
  <body>
<!-- Navbar -->
<div class="container-fluid bg-info fixed-top">
  <nav class="navbar navbar-expand-md navbar-dark bg-info">
  <a class="navbar-brand" href="#">
    <img src="../../img/jalisco4.png" width="30" height="30" alt="" loading="lazy">
    Jalisco
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto mr-4">
      <!-- <li class="nav-item active">
        <a class="nav-link" href="../../index.html">Inicio <span class="sr-only">(current)</span></a>
      </li> -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="http://conoceestadojalisco.blogspot.com/2012/10/cultura-en-jalisco.html">Cultura</a>
      </li> -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="https://es.wikipedia.org/wiki/Jalisco#Geograf%C3%ADa" tabindex="-1" aria-disabled="true">Geografía</a>
      </li> -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="login.php" id="open" >Iniciar Sesión</a>
      </li> -->
   
      <li class="nav-item">
      <a class="nav-link" href="#" id="open" > Bienvenido usuario: <?php echo utf8_encode($row['nombre']) ?></a>
     
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Solicitar tour</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Explorar paisajes</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Ver lugares de interés</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../logout.php" >Salir</a>
      </li>
      
      
    </ul>
    <span class="navbar-text text-white">
    <i class="fas fa-search"></i>
  </span>
  </div>
</nav>
</div>
 <!-- Navbar -->

 <!--- Slider -->

 <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Home</li>
  </ol>
</nav>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active"aria-current="page">Inicio</a></li>
    <!-- <li class="breadcrumb-item active" aria-current="page">Cultura</li>
    <li class="breadcrumb-item active" aria-current="page">Historia</li>
    <li class="breadcrumb-item active" aria-current="page">Geografía</li> -->
  </ol>
</nav>

<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../../img/jalisco1.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Guadalajara</h5>
        <p>Mariachi, folclor, charrería y tequila.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../../img/jalisco2.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Tequila</h5>
        <p>Este pueblo mágico ofrece paisajes agaveros, patrimonio de la humanidad.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../../img/jalisco3.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Puerto Vallarta</h5>
        <p>Enmarcado por la Sierra Madre Occidental y las aguas turquesa del Pacífico.</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!--Sección 1-->
<section class="container my-5">
  <h1 class="display-4 text-center my-5">Jalisco</h1>
  <p class="text-center lead text-info my-5">Quiere decir "Sobre la arena" y se constituye como la tercera entidad federativa con una mayor población y un polo importante de actividades económicas, comerciales y culturales.</p>
</section>

<section class="container my-5">
  <div class="row">
    <div class="card-deck">
    <div class="col-md-4">
      <div class="card">
    <img src="../../img/jalisco1.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Guadalajara</h5>
      <p class="card-text">Capital del estado. En su parte mas tradicional, es sinónimo de mariachi, folclor, charrería y tequila. Estar en Guadalajara es vivir una gran y moderna metrópolis impregnada de sabor tradicional mexicano.</p>
      <a href="https://www.visitmexico.com/destino/guadalajara/" class="btn btn-primary">Más información</a>
    </div>
  </div>
    </div>
      <div class="col-md-4">
      <div class="card border-bottom-5">
    <img src="../../img/jalisco2.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Tequila</h5>
      <p class="card-text border-bottom-5">Este Pueblo Mágico se caracteriza por tener el mayor número de empresas productoras de tequila, cada empresa se ha preocupado por preservar sus procesos y presentarlos ante los turistas, cada una con su peculiar historia y trascendencia. El paisaje agavero es patrimonio de la humanidad. Quien no ha visto el paisaje agavero es como quien no ha visitado el océano decía el poeta jalisciense Dante Medina.<br><br>
      <a href="https://www.visitmexico.com/destino/tequila/" class="btn btn-primary border-top-5">Más información</a>
    </div>
  </div>
    </div>
      <div class="col-md-4">
      <div class="card">
    <img src="../../img/jalisco3.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Puerto Vallarta</h5>
      <p class="card-text">Enmarcado por las majestuosas montañas de la sierra madre occidental y las aguas azul turquesa del pacífico, Puerto Vallarta es un lugar mágico donde la sierra, los ríos y el Océano Pacífico se unen para dar vida a este paraíso de hermosos paisajes. Conocida como la playa más tradicional de México por su centro histórico.</p>
      <a href="https://www.visitmexico.com/destino/puerto-vallarta/" class="btn btn-primary">Más información</a>
    </div>
  </div>
    </div>
  </div>
</section>

<section class="container-fluid">
  <div class="jumbotron text-center">
  <h1 class="display-4">Jalisco</h1>
  <p class="lead">Capital: Guadalajara <br>
    Gentilicio: Jalisciense <br>
    Altitud: 1,540 msnm <br>
    Población 2010: 7, 350, 682 habitantes <br>
    División Política: 125 Municipios <br>
    Regiones: 12 <br>
    Costas: 341.93 kms de Litoral <br>
    </p>
  <hr class="my-4">
  <p>Jalisco cuenta con una amplia variedad de costumbres y tradiciones. Es un estado muy mexicano, muchos símbolos que nos identifican a México a nivel internacional tienen su origen en el estado de Jalisco, como lo son la charrería, el mariachi y el tequila.</p>
</div>
</section>

<section class="container my-5">
  <div class="row">
    <div class="col-md-6">
      <div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header bg-info" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left text-white" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Charrería
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        No hay tradición más representativa de Jalisco que la charrería, bella fiesta en que los charros o jinetes típicos mexicanos, realizan suertes con la reata ya sea a caballo o a pié, para demostrar su valor y arrojo... Ahora la Asociación Nacional de Charros que esta conformada por los equipos y asociaciones de charros estatales, llevando a cabo una vez al ano en diferentes ciudades del una de las fiestas mas mexicanas, orgullosamente de origen jalisciense.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header bg-info" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed text-white" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Mariachi
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        Quién no ha oído alguna o muchas veces las notas de los sones jaliscienses interpretadas con alegría y gran maestría por el mariachi; o quién no tiene algún recuerdo que le revive el escuchar al mariachi entonando canciones rancheras que hablan de amor y sentimiento. El mariachi, que representa a México mundialmente, vestidos a la usanza charra, nació en Jalisco y hoy es válido para ellos cualquier gama colorida en sus trajes, similares a los de charro, con botonaduras y aplicaciones en metal que le dan un atractivo especial a este orgullo de nuestro Estado.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header bg-info" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed text-white" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Tequila
        </button>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        Seguramente no existe una bebida más representativa de Jalisco y que más guste al paladar propio y extraño que el Tequila, magnífica fermentación a partir de la piña del agave azul, que produce una bebida alcohólica de gran nobleza, cuerpo y delicioso sabor. El Tequila nace en Amatitán, Jalisco, aunque es en el pueblo de Tequila donde se da su crecimiento y el que le da no sólo el nombre, sino la denominación de origen por la que ninguna bebida producida fuera de esa área puede ser llamada así. La trilogía de la música de mariachi, entonada mientras los charros se enlazan en una aguerrida lucha de habilidades durante una charreada, mientras se disfruta de un buen Tequila, es sin duda, una estampa representativa de Jalisco y sus tradiciones, que ha trascendido fronteras.
      </div>
    </div>
  </div>
</div>
    </div>
  <div class="col-md-6">
    <img src="../../img/jalisco4.jpg" class="img-fluid"> 
    <ul class="list-group">
    <li class="list-group-item active bg-info border border-info rounded-0">Gastronomía</li>
    <li class="list-group-item">Comida: Gorditas y sopes de maíz, enchiladas de mole, borrego al pastor, birria, menudo y pozole, birria de chivo, charales, tamales y tortas ahogadas.</li>
    <li class="list-group-item">Bebidas: La raicilla, ponches de frutas, tequila, la tuba, mezcal, tepache, aguamiel, las "cazuelas", atoles, rompopes, tejuino y pajaretes.</li>
    <li class="list-group-item">Dulces típicos: Dulces de leche, cocadas, cajetas de leche quemada, rollos de guayaba, palanquetas de nuez, queso de tuna, mangos y ciruelas en almíbar, alfajores, cajeta de membrillo, dulces de tamarindo y buñuelos.</li>
    </ul>
  </div>
  </div>
</section>

<footer class="container-fluid bg-dark text-white">
  <div class="container">
  <p class="text-center py-2">
    Estado Libre y Soerano de Jalisco. Ubicado en la región oeste del país, es el tercer estado más poblado de México. Fundado el 16 de junio de 1823.
    <br>Para información oficial visite: jalisco.gob.mx
  </p></div>
</footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../../js/bootstrap.min.js"></script>
    
  </body>

</html>