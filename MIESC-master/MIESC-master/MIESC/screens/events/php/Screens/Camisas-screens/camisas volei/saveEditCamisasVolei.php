<?php  
include_once('conexaoCamisas.php');
if(isset($_POST['update'])){
	$id = $_POST['id']; 
	$cores =  $_POST['cores'];
    $sala = $_POST['sala'];
   

	$sqlUpdate = "UPDATE camisasvolei SET cores='$cores', sala='$sala' WHERE id='$id'";
	
	$result = $conexao->query($sqlUpdate);
		
}
	header('Location: camisasVolei.php');
	

?>
