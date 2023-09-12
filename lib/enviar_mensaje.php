<?php
require_once('../admin/class/Comentarios.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $Contacto = new Comentarios();

    $idU = (isset($_REQUEST['idU'])) ? $_REQUEST['idU'] : null;
    $asunto = (isset($_REQUEST['asunto'])) ? $_REQUEST['asunto'] : null;
    $comentario = (isset($_REQUEST['comentario'])) ? $_REQUEST['comentario'] : null;

    $Contacto->setIdU($idU);
    $Contacto->setAsunto($asunto);
    $Contacto->setComentario($comentario);

    $Contacto->guardar();

    echo '<script>
        alert("Mensaje enviado correctamente");
        window.location.href="../index.php";
        </script>';

}else{

    header('Location: ../index.php');

}

