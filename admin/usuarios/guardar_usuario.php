<?php
    session_start();
        if($_SESSION['privilegios'] == 1){
        echo'<script>
        alert("Acceso denegado");
        location.href="../index.php";
        </script>'; 
    }
    include "../template/cabecera.php";
    require_once '../class/Usuarios.php';
    
    $id = (isset($_REQUEST['id'])) ? $_REQUEST['id'] : null;
    
    if($id){        
        $usuario = Usuarios::buscarPorId($id);        
    }else{
        $usuario = new Usuarios();
    } 

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $curp = (isset($_POST['curp'])) ? $_POST['curp'] : null;
        $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : null;
        $apellidoP = (isset($_POST['apellidoP'])) ? $_POST['apellidoP'] : null;
        $apellidoM = (isset($_POST['apellidoM'])) ? $_POST['apellidoM'] : null;
        $correo = (isset($_POST['correo'])) ? $_POST['correo'] : null;
        $contrasena = (isset($_POST['contrasena'])) ? $_POST['contrasena'] : null;
        $estatus = (isset($_POST['estatus'])) ? $_POST['estatus'] : null;
        $privilegios = (isset($_POST['privilegios'])) ? $_POST['privilegios'] : null;
        $usuario->setCurp($curp);
        $usuario->setNombre($nombre);
        $usuario->setApellidoP($apellidoP);
        $usuario->setApellidoM($apellidoM);
        $usuario->setCorreo($correo);
        $usuario->setContrasena($contrasena);
        $usuario->setEstatus($estatus);
        $usuario->setPrivilegios($privilegios);
        $usuario->guardar();
        ?>
            <meta http-equiv="refresh" content="0;url=index.php">
            <?php
    }else{
  ?>
        <h1> Guardar usuario </h1>
        <form method="POST" action="guardar_usuario.php">
             <?php if ($usuario->getId()): ?>
                <input type="hidden" name="id" value="<?php echo $usuario->getId() ?>" />
            <?php endif; ?>
            <label for="curp"  class="form-label"> CURP: </label>
            <input class="form-control" type="text" name="curp" value="<?php echo $usuario->getCurp() ?>" required />
            <br>
            <label for="nombre"  class="form-label"> Nombre: </label>
            <input class="form-control" type="text" name="nombre" value="<?php echo $usuario->getNombre() ?>" required />
            <br>
            <label for="apellidoP"  class="form-label"> Apellido Paterno: </label>
            <input class="form-control" type="text" name="apellidoP" value="<?php echo $usuario->getApellidoP() ?>" required />
            <br>
            <label for="apellidoM"  class="form-label"> Apellido Materno: </label>
            <input class="form-control" type="text" name="apellidoM" value="<?php echo $usuario->getApellidoM() ?>" required />
            <br>
            <label for="correo"  class="form-label"> Correo: </label>
            <input class="form-control" type="text" name="correo" value="<?php echo $usuario->getCorreo() ?>" required />
            <br>
            <label for="contrasena"  class="form-label"> Contrasena: </label>
            <input class="form-control" type="text" name="contrasena" value="<?php echo $usuario->getContrasena() ?>" required />
            <br>
            <label class="form-label"> Estatus: </label>
            <input class="form-control" type="text" name="estatus"  value="<?php if ($usuario->getId()) {
              echo $usuario->getEstatus(); }else{ echo '1'; } ?>" required />
            <br>
            <label class="form-label">Privilegios:</label>
            <input type="text" class="form-control" name="privilegios" readonly value="<?php
               if ($usuario->getId()) { echo $usuario->getPrivilegios(); }
              else{ echo '2'; }?>" required />
            <br>                  
            <input type="submit" class="btn btn-primary" value="Guardar" />
            <a href="index.php"> Cancelar </a>
        </form>
<?php

    }
    include "../template/pie.php";
?>
