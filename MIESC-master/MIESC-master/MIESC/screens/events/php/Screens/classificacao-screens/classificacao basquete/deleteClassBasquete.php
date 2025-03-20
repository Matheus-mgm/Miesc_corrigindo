<?php  

if(!empty($_GET['id']))
{
  include_once('conexaoBasquete.php');
	
	$id = $_GET['id'];
	
	$sqlSelect = "SELECT * FROM classbasq WHERE id=$id";
	
	$result = $conexao->query($sqlSelect);
	
	
	if($result->num_rows > 0){
		$sqlDelete = "DELETE FROM classbasq WHERE id=$id";
		$resultDelete = $conexao->query($sqlDelete);
	 }
	}
	
		header('Location: classificacaoBasquete.php');
	
 

   
$consulta = "SELECT * FROM classbasq";
$con = mysqli_query($conexao, $consulta);
?>
