<?php 
	session_start();
	if($_SESSION['privilegios'] == 1){
	echo'<script>
	alert("Acceso denegado");
	location.href="../index.php";
	</script>'; 
    }
   
    require_once '../class/Usuarios.php';
    $id = (isset($_REQUEST['id'])) ? $_REQUEST['id'] : null;
    
    if($id){
        $usuarios = Usuarios::buscarPorId($id);        
        $usuarios->eliminar();
        header('Location: index.php');            
    }
    
?>
