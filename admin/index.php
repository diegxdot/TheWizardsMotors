<?php
    session_start();
    if($_SESSION['privilegios'] == 1){
        echo'<script>
        alert("Acceso denegado");
        location.href="../index.php";
        </script>'; 
    }
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CPANEL | The wizards</title>
        <link rel="shortcut icon" href="img/witch-hat.png" type="image/x-icon">
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body class="body bg-light">
        <div class="container-fluid">
        <figure class="text-center">
            <br>
            <img src="img/witch-hat.png" alt="Wizards" width="200px">
            <h1 class="display-2 bg-primary text-light my-3">CPANEL</h1>
        </figure>
        <div class="row my-3">
            <div class="col-sm-4">
                <figure class="text-center">
                <a class="btn btn-primary" href="usuarios/index.php" role="button">Gestion de usuarios</a>
                </figure> 
            </div>
            <div class="col-sm-4">
                <figure class="text-center">
                <a class="btn btn-primary" href="vehiculos/index.php" role="button">Gestion de vehiculos</a>
                </figure>
            </div>
            <div class="col-sm-4">
                <figure class="text-center">
                <a class="btn btn-primary" href="comentarios/index.php" role="button">Gestion de comentarios</a>
                </figure>
            </div>
        </div>
        </div>
    </body>
    </html>