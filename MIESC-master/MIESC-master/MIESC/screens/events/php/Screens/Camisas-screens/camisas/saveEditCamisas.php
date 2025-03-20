<?php  
include_once('conexaoCamisasfut.php');
if(isset($_POST['update'])){
	$id = $_POST['id']; 
	$cores =  $_POST['cores'];
    $sala = $_POST['sala'];
   

	$sqlUpdate = "UPDATE camisas SET cores='$cores', sala='$sala' WHERE id='$id'";
	
	$result = $conexao->query($sqlUpdate);
		
}
	header('Location: camisas.php');
	

?>
