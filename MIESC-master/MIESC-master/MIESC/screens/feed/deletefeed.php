<?php  

if(!empty($_GET['id']))
{
  include_once('conexaofeed.php');
	
	$id = $_GET['id'];
	
	$sqlSelect = "SELECT * FROM feed WHERE id=$id";
	
	$result = $conexao->query($sqlSelect);
	
	
	if($result->num_rows > 0){
		$sqlDelete = "DELETE FROM feed WHERE id=$id";
		$resultDelete = $conexao->query($sqlDelete);
	 }
	}
	
		header('Location: feed.php');
	
 

   
$consulta = "SELECT * FROM feed";
$con = mysqli_query($conexao, $consulta);
?>
