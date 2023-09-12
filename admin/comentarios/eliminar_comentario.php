<?php 
	session_start();
	if($_SESSION['privilegios'] == 1){
	echo'<script>
	alert("Acceso denegado");
	location.href="../index.php";
	</script>'; 
    }
   
    require_once '../class/Comentarios.php';
    $id = (isset($_REQUEST['id'])) ? $_REQUEST['id'] : null;
    
    if($id){
        $comentarios = Comentarios::buscarPorId($id);        
        $comentarios->eliminar();
        header('Location: index.php');            
    }
    
?>
