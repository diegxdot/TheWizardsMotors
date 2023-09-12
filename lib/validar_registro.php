<?php
require_once('../admin/class/Usuarios.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $usuario = new Usuarios();
    $curp = (isset($_REQUEST['curp'])) ? $_REQUEST['curp'] : null;
    $nombre = (isset($_REQUEST['nombre'])) ? $_REQUEST['nombre'] : null;
    $apellidoP = (isset($_REQUEST['apellidoP'])) ? $_REQUEST['apellidoP'] : null;
    $apellidoM = (isset($_REQUEST['apellidoM'])) ? $_REQUEST['apellidoM'] : null;
    $correo = (isset($_REQUEST['correo'])) ? $_REQUEST['correo'] : null;
    $contrasena = (isset($_REQUEST['contrasena'])) ? $_REQUEST['contrasena'] : null;
    $estatus = (isset($_REQUEST['estatus'])) ? $_REQUEST['estatus'] : null;
    $privilegios = (isset($_REQUEST['privilegios'])) ? $_REQUEST['privilegios'] : null;
    $usuario->setCurp($curp);
    $usuario->setNombre($nombre);
    $usuario->setApellidoP($apellidoP);
    $usuario->setApellidoM($apellidoM);    
    $usuario->setCorreo($correo);
    $usuario->setContrasena($contrasena);
    $usuario->setEstatus($estatus);
    $usuario->setPrivilegios($privilegios);
    $usuario->guardar();
    echo '<script>
        alert("Registro realizado con exito");
        window.location.href="../index.php";
        </script>';
}else{

    header('Location: ../registro.php');
    
}