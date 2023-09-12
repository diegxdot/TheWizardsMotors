<?php
 session_start();
 require_once '../admin/class/Usuarios.php';
 
    $correo = (isset($_REQUEST['correo'])) ? $_REQUEST['correo'] : null;
    $contrasena = (isset($_REQUEST['contrasena'])) ? $_REQUEST['contrasena'] : null;
    $usuario = new Usuarios();
    $usuario->setCorreo($correo);
    $usuario->setContrasena($contrasena);
    $entrar=$usuario->logIn();

 if($entrar==true){
    header('Location:../index.php');
 }
 else{
    /*echo '<script>
    alert("Datos incorrectos");
    window.location.href="../index.php";
    </script>';*/
 }
