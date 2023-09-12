<?php
    session_start();
    if($_SESSION['privilegios'] == 1){
        echo'<script>
        alert("Acceso denegado");
        location.href="../index.php";
        </script>'; 
    }
    
    include "../template/cabecera.php";
    require_once('../class/Usuarios.php');
    $usuarios = Usuarios::recuperarTodos();
?>
        <h1> Gestión de Usuarios </h1>
        <a href="guardar_usuario.php" class="btn btn-success"> Nuevo Registro </a>
        
        <?php
         if (count($usuarios)>0): ?>
            <table class="table table-bordered">
                <tr>
                    <td>CURP</td>
                    <td>Nombre</td>
                    <td>Apellido Paterno</td>
                    <td>Apellido Materno</td>
                    <td>Correo </td>
                    <td>Contrasena </td>
                    <td>Estatus </td>
                    <td>Privilegios </td>
                    <td> </td>
                    <td> </td>
                </tr>
                
                <?php foreach ($usuarios as $item): ?>
                <tr>
                    <td> <?php echo $item['curp']; ?></td>
                    <td> <?php echo $item['nombre']; ?></td>
                    <td> <?php echo $item['apellidoP']; ?></td>
                    <td> <?php echo $item['apellidoM']; ?></td>
                    <td> <?php echo $item['correo']; ?></td>
                    <td> No visible </td>
                    <td> <?php echo $item['estatus']; ?> </td>
                    <td> <?php echo $item['privilegios']; ?> </td>
                    <td><a href="guardar_usuario.php?id=<?php echo $item['id'] ?>"> Editar </td>    
                    <td><a href="eliminar_usuario.php?id=<?php echo $item['id'] ?>"> Eliminar </td> 
                </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p> No hay usuarios registrados </p>
        <?php endif; 
            include "../template/pie.php";
        ?>

