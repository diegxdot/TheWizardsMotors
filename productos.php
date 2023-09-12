<?php
session_start();
    require('admin/class/Vehiculos.php');
    $vehiculos = Vehiculos::recuperarTodos();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos - Wizards Motors</title>
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
                                <a class="nav-link active" href="productos.php">Productos</a>
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
                        <h1 class="display-2">Productos</h1>
                    </figure>
                </div>
            </div>
            <div class="row my-3">
            <?php
         if (count($vehiculos)>0): ?>
         <br>
            <table class="table table-bordered">
                <tr>
                    <td>Imagen</td>
                    <td>Marca</td>
                    <td>Modelo</td>
                    <td>Año</td>
                    <td>Kilometraje </td>
                    <td>Precio </td>
                    <td>Resumen </td>
                </tr>
                
                <?php foreach ($vehiculos as $item): ?>
                <tr>
                    <td> <img src="admin/vehiculos/<?php echo $item['imagen']; ?>" width="200" height="100" class="center-block"></td>
                    <td> <?php echo $item['marca']; ?></td>
                    <td> <?php echo $item['modelo']; ?></td>
                    <td> <?php echo $item['anyo']; ?></td>
                    <td> <?php echo $item['km']; ?></td>
                    <td> <?php echo $item['precio']; ?> </td>
                    <td> <?php echo $item['resumen']; ?> </td>
                </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p> No hay vehículos en stock </p>
        <?php endif; 
        ?>   
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