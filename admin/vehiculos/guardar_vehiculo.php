<?php
    session_start();
    if($_SESSION['privilegios'] == 1){
    echo'<script>
    alert("Acceso denegado");
    location.href="../index.php";
    </script>'; 
    } 
    include "../template/cabecera.php";
    require_once '../class/Vehiculos.php';
    $id = (isset($_REQUEST['id'])) ? $_REQUEST['id'] : null;
    
    if($id){ 
        $vehiculos = Vehiculos::buscarPorId($id); 
    }else{
        $vehiculos = new Vehiculos();
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($_FILES['imagen']['type'] == 'image/jpg' || $_FILES['imagen']['type'] == 'image/jpeg'
        || $_FILES['imagen']['type'] == 'image/png'){ 
            $rutaServidor = 'uploads';
            $rutaTemporal = $_FILES['imagen']['tmp_name'];
            $nombreImagen = $_FILES['imagen']['name'];
            $rutaDestino = $rutaServidor.'/'.$nombreImagen;
            move_uploaded_file($rutaTemporal, $rutaDestino);
            $marca = (isset($_POST['marca'])) ? $_POST['marca'] : null;
            $modelo = (isset($_POST['modelo'])) ? $_POST['modelo'] : null;
            $anyo = (isset($_POST['anyo'])) ? $_POST['anyo'] : null;
            $km = (isset($_POST['km'])) ? $_POST['km'] : null;
            $precio = (isset($_POST['precio'])) ? $_POST['precio'] : null;
            $resumen = (isset($_POST['resumen'])) ? $_POST['resumen'] : null;
            $vehiculos->setImagen($rutaDestino);
            $vehiculos->setMarca($marca);
            $vehiculos->setModelo($modelo);
            $vehiculos->setAnyo($anyo);
            $vehiculos->setKm($km);
            $vehiculos->setPrecio($precio);
            $vehiculos->setResumen($resumen);
            $vehiculos->guardar();
            ?>
            <meta http-equiv="refresh" content="0;url=index.php">
            <?php
        }else{
            echo '<script>
                alert("Solo se admiten archivos con extensiones jpeg, jpg, png");
                window.location.href="guardar_producto.php";
                </script>';
        } 
    }else{
    ?>
    
    <h1> Guardar Producto </h1>
    <form method="post" action="guardar_vehiculo.php" enctype="multipart/form-data" >
        <?php if ($vehiculos->getId()): ?>
        <input type="hidden" name="id" value="<?php echo $vehiculos->getId() ?>" />
        <img src="<?php echo $vehiculos->getImagen() ?>" width="100" height="120">
        <br>
        <br>
        <?php endif; ?>
        <br>
        <label for="marca" class="form-label"> Marca </label>
        <input class="form-control" type="text" name="marca" value="<?php echo $vehiculos->getMarca() ?>"  required > 
        <br>
        <label for="modelo"  class="form-label"> Modelo </label>
        <input class="form-control" type="text" name="modelo" value="<?php echo $vehiculos->getModelo() ?>"  required> 
        <br>
        <label for="anyo"  class="form-label"> Año </label>
        <input class="form-control" type="text" name="anyo" value="<?php echo $vehiculos->getAnyo() ?>"  required> 
        <br>
        <label for="km"  class="form-label"> Kilometraje </label>
        <input class="form-control" type="text" name="km" value="<?php echo $vehiculos->getKm() ?>"  required>
        <br>
        <label for="precio"  class="form-label"> Precio </label>
        <input class="form-control" type="text" name="precio" value="<?php echo $vehiculos->getPrecio() ?>"  required>
        <br>
        <label for="resumen"  class="form-label"> Resumen </label>
        <input class="form-control" type="text" name="resumen" 
        value="<?php echo $vehiculos->getResumen() ?>" required>
        <label for="imagen" class="form-label">Vehiculo</label>
        <br>
        <input class="form-control" type="file" name="imagen" required>
        <br>
        <input class="form-control" type="submit" value="Guardar" />
        <a href="index.php"> Cancelar </a>
    </form>
    <?php
    } 
 ?>