<?php
    session_start();
    if($_SESSION['privilegios'] == 1){
        echo'<script>
        alert("Acceso denegado");
        location.href="../index.php";
        </script>'; 
    }
    include "../template/cabecera.php";
    require_once('../class/Comentarios.php');
    $comentarios = Comentarios::recuperarTodos();
?>
        <h1> Gestión de Comentarios </h1>
        <a href="guardar_comentario.php" class="btn btn-success"> Nuevo Registro </a>
        
        <?php
         if (count($comentarios)>0): ?>
         <br>
            <table class="table table-bordered">
                <tr>
                    <td>Correo</td>
                    <td>Asunto</td>
                    <td>Mensaje</td>
                    <td> </td>
                    <td> </td>
                </tr>
                
                <?php foreach ($comentarios as $item): ?>
                <tr>
                    <td> <?php echo $item['idU']; ?></td>
                    <td> <?php echo $item['asunto']; ?> </td>
                    <td> <?php echo $item['comentario']; ?> </td>
                    <td><a href="guardar_vehiculo.php?id=<?php echo $item['id'] ?>"> Editar </td>    
                    <td><a href="eliminar_vehiculo.php?id=<?php echo $item['id'] ?>"> Eliminar </td> 
                </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p> No hay comentarios hechos </p>
        <?php endif; 
            include "../template/pie.php";
        ?>

