<?php  

if(!empty($_GET['id']))
{
  include_once('conexaovolei.php');
	
	$id = $_GET['id'];
	
	$sqlSelect = "SELECT * FROM volei WHERE id=$id";
	
	$result = $conexao->query($sqlSelect);
	
	
	if($result->num_rows > 0){
		$sqlDelete = "DELETE FROM volei WHERE id=$id";
		$resultDelete = $conexao->query($sqlDelete);
	 }
	}
	
		header('Location: volei.php');
	
 

   
$consulta = "SELECT * FROM volei";
$con = mysqli_query($conexao, $consulta);
?>
