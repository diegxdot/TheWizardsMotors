<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¿Quienes somos? - Wizards Motors</title>
    <link rel="shortcut icon" href="img/witch-hat.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</head>
<body class="body bg-primary">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-primary ">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse" id="navbarText">
                            <a class="navbar-brand" href="index.php">
                                <img src="img/witch-hat.png" alt="Wizards" width="30">
                            </a>
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                              <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="index.php">Inicio</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link active" href="quienessomos.php">¿Quienes somos?</a>
                              </li>
                              <?php if(!isset($_SESSION['correo'])){ ?>
                              <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                              <li class="nav-item"><a class="nav-link" href="registro.php">Registro</a></li>
                              <?php }else{ ?>
                              <li class="nav-item"><a class="nav-link" href="logout.php">Salir</a></li>
                              <?php }?>
                              <li class="nav-item">
                                <a class="nav-link" href="servicios.php">Servicios</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="productos.php">Productos</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="contacto.php">Contacto</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="faq.php">FAQs</a>
                              </li>
                            </ul>
                            <span class="navbar-text">
                              <p>Hola <?php if($_SESSION){ echo $_SESSION['correo']; }else{ echo 'Invitado'; } ?></p>
                            </span>
                          </div>
                    </div>
                </nav>
            </div>            
        </div>
    </div><!--Fin barra de navegacion-->
    <div class="container-fluid bg-light p-3">
        <div class="container my-5 p-3">
            <div class="row">
                <div class="col">
                    <figure class="text-center">
                        <img src="img/witch-hat.png" alt="Wizards" width="200px">
                        <h1 class="display-2">¿Quienes somos?</h1>
                        <p class="lead">
                            Somos una concesionaria de automoviles, la cual su objetivo principal es tener
                            los mejores precios del mercado, para eso nos enfocamos en cierto sector de la poblacion
                            y ofrecerle automoviles a una gran calidad-precio para sus bolsillos.
                        </p>
                        <p class="lead">
                            Nos ubicamos en Acámbaro, Guanajuato y podremos ofrecerle la mejor financiacion posible en toda la ciudad
                            facil, rápido y sencillo para estrenar su nuevo vehículo.
                        </p>
                        <br>
                        <h1 class="display-2">Misión</h1>
                        <p class="lead">
                        Es tener el alcance para brindarles a los diversos sectores de la población con menor capacidad económica el poder estrenar su primer vehículo, además de darles la confianza necesaria para que ellos logren contar con nosotros en el servicio posventa de algún vehículo, con la oportunidad de ser la empresa número 1 de la ciudad y llegar a tener una expansión a los horizontes.
                        </p>
                        <br>
                        <h1 class="display-2">Visión</h1>
                        <p class="lead">
                        Ser una empresa acambarense donde se pueda tener distribución de gran cantidad de vehículos en la región y establecerse en alto reconocimiento por parte de los consumidores, donde al final se tenga rentabilidad y la confianza de los clientes para consumir en nuestro local.        
                        </p>
                        <br>
                        <h1 class="display-2">Valores</h1>
                        <ul>
                            <li class="li">Honestidad</li>
                            <li class="li">Honradez</li>
                            <li class="li">Compromiso</li>
                            <li class="li">Seriedad</li>
                            <li class="li">Respeto</li>
                        </ul>
                    </figure>
                </div>
            </div>
        </div>
    </div><!--Fin contenido-->
    <div class="container-fluid bg-dark text-light p-3">
        <figure class="text-center">
            <p class="lead">© The Wizards 2021. Todos los derechos reservados</p>
            <a  class="a" href="avisolegal.php">Aviso legal</a>
        </figure>
    </div><!--Fin pie de pagina-->
</body>
</html>