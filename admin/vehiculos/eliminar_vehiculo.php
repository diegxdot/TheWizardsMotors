<?php 
	session_start();
	if($_SESSION['privilegios'] == 1){
	echo'<script>
	alert("Acceso denegado");
	location.href="../index.php";
	</script>'; 
	}
   
    require_once '../class/Vehiculos.php';
    $id = (isset($_REQUEST['id'])) ? $_REQUEST['id'] : null;
    
    if($id){
        $vehiculos = Vehiculos::buscarPorId($id);        
        $vehiculos->eliminar();
        unlink($vehiculos->getImagen());
        header('Location: index.php');            
    }
    
?>
