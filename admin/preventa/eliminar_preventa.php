<?php 
	session_start();
	if($_SESSION['privilegios'] != 1){
	echo'<script>
	alert("Acceso denegado");
	location.href="../index.php";
	</script>'; 
    }
   
    require_once '../class/Preventa.php';
    $id = (isset($_REQUEST['id'])) ? $_REQUEST['id'] : null;
    
    if($id){
        $preventa = Preventa::buscarPorId($id);        
        $preventa->eliminar();
        header('Location: index.php');            
    }
    
?>
