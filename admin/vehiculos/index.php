<?php
    session_start();
    if($_SESSION['privilegios'] == 1){
        echo'<script>
        alert("Acceso denegado");
        location.href="../index.php";
        </script>'; 
    }
    include "../template/cabecera.php";
    require_once('../class/Vehiculos.php');
    $vehiculos = Vehiculos::recuperarTodos();
?>
        <h1> Gestión de Vehiculos </h1>
        <a href="guardar_vehiculo.php" class="btn btn-success"> Nuevo Registro </a>
        
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
                    <td> </td>
                    <td> </td>
                </tr>
                
                <?php foreach ($vehiculos as $item): ?>
                <tr>
                    <td> <img src="<?php echo $item['imagen']; ?>" width="200" height="100" class="center-block"></td>
                    <td> <?php echo $item['marca']; ?></td>
                    <td> <?php echo $item['modelo']; ?></td>
                    <td> <?php echo $item['anyo']; ?></td>
                    <td> <?php echo $item['km']; ?></td>
                    <td> <?php echo $item['precio']; ?> </td>
                    <td> <?php echo $item['resumen']; ?> </td>
                    <td><a href="guardar_vehiculo.php?id=<?php echo $item['id'] ?>"> Editar </td>    
                    <td><a href="eliminar_vehiculo.php?id=<?php echo $item['id'] ?>"> Eliminar </td> 
                </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p> No hay vehículos en stock </p>
        <?php endif; 
            include "../template/pie.php";
        ?>

