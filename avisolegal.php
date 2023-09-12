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
                                <a class="nav-link" href="quienessomos.php">¿Quienes somos?</a>
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
                        <h1 class="display-2">Aviso legal</h1>
                        <br>
                        <h6>Plazo o criterio de conservación de datos</h6>
                        <p>¿Por cuánto tiempo conservaremos tus datos? Tus datos serán conservados mientras sean necesarios para la prestación de los servicios o relación contractual, y en cualquier caso mientras no solicites su supresión, así como el tiempo necesario para dar cumplimiento a las obligaciones  legales que en cada caso correspondan acorde con cada tipología de datos.</p>
                        <h6>Legitimación</h6>
                        <p>¿Cuál es la legitimación para el tratamiento de tus datos? La base legal para el tratamiento de sus datos  es la ejecución de un contrato consistente en realizar intervenciones de taller en el vehículo, así como realizar encuestas de satisfacción para mejorar tu experiencia. El tratamiento de tus datos personales vinculados a dichos fines es estrictamente necesario para dar cumplimiento a las mencionadas obligaciones legales.</p>
                        <p>El resto de finalidades están basadas en el consentimiento que te solicitamos, sin que en ningún caso la retirada de alguno de estos consentimientos condicione garantizarte una correcta gestión de la relación comercial.</p>
                        <p>Puede retirar dicho consentimiento enviando un correo electrónico a mconde@mconde.com</p>
                        <h6>Procedencia</h6>
                        <p>¿Cómo hemos obtenido sus datos? Te recordamos que en caso de que nos proporciones datos relativos a otra persona física deberás, con carácter previo a su inclusión, informarle de los extremos contenidos en la presente cláusula.</p>
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