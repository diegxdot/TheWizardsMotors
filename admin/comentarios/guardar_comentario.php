<?php
    session_start();
    if($_SESSION['privilegios'] == 1){
    echo'<script>
    alert("Acceso denegado");
    location.href="../index.php";
    </script>'; 
    } 
    include "../template/cabecera.php";
    require_once '../class/Comentarios.php';
    $id = (isset($_REQUEST['id'])) ? $_REQUEST['id'] : null;
    
    if($id){ 
        $comentarios = Comentarios::buscarPorId($id); 
    }else{
        $comentarios = new Comentarios();
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $idU = (isset($_POST['idU'])) ? $_POST['idU'] : null;
            $asunto = (isset($_POST['asunto'])) ? $_POST['asunto'] : null;
            $comentario = (isset($_POST['comentario'])) ? $_POST['comentario'] : null;
            $comentarios->setIdU($idU);
            $comentarios->setAsunto($asunto);
            $comentarios->setComentario($comentario);
            $comentarios->guardar();
            ?>
            <meta http-equiv="refresh" content="0;url=index.php">
            <?php
    }else{
    ?>
    
    <h1> Guardar Comentario </h1>
    <form method="post" action="guardar_comentario.php" >
        <?php if ($comentarios->getId()): ?>
        <input type="hidden" name="id" value="<?php echo $comentarios->getId() ?>" />
        <br>
        <?php endif; ?>
        <br>
        <label for="idU" class="form-label"> Correo </label>
        <input class="form-control" type="text" name="idU" value="<?php echo $comentarios->getIdU() ?>"  required > 
        <br>
        <label for="asunto"  class="form-label"> Asunto </label>
        <input class="form-control" type="text" name="asunto" value="<?php echo $comentarios->getAsunto() ?>"  required> 
        <br>
        <label for="comentario"  class="form-label"> Comentario </label>
        <input class="form-control" type="text" name="comentario" value="<?php echo $comentarios->getComentario() ?>"  required> 

        <input class="form-control" type="submit" value="Guardar" />
        <a href="index.php"> Cancelar </a>
    </form>
    <?php
    } 
 ?>