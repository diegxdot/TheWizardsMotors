<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Wizards Motors</title>
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
                            <a class="navbar-brand" href="index.html">
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
                    <h1 class="display-2" style="text-align: center;">Registrate</h1>
                </div>
            </div>
            <div class="row my-4">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <figure class="text-center">
                        <form action="lib/validar_registro.php" method="post">
                            <input class="form-control my-1" name="curp" placeholder="CURP" type="text" required>
                            <input class="form-control my-1" name="nombre" placeholder="Nombre(s)" type="text" required>
                            <input class="form-control my-1" name="apellidoP" placeholder="Apellido Materno" type="text" required>
                            <input class="form-control my-1" name="apellidoM" placeholder="Apellido Paterno" type="text" required>
                            <input class="form-control my-1" name="correo" placeholder="Correo" type="email" required>
                            <input class="form-control my-1" name="contrasena" placeholder="Contraseña" type="password" required>
                            <input type="hidden" name="estatus" value="1">
                            <input type="hidden" name="privilegios" value="2">
                            <input class="form-control my-1" value="Registrar" placeholder="Enviar" type="submit">
                        </form>
                    </figure>
                </div>
                <div class="col-sm-4"></div>
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