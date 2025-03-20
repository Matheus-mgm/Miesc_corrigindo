<?php  

if(!empty($_GET['id']))
{
  include_once('conexaobasquete.php');
	
	$id = $_GET['id'];
	
	$sqlSelect = "SELECT * FROM basquete WHERE id=$id";
	
	$result = $conexao->query($sqlSelect);
	
	
	if($result->num_rows > 0){
		$sqlDelete = "DELETE FROM basquete WHERE id=$id";
		$resultDelete = $conexao->query($sqlDelete);
	 }
	}
	
		header('Location: basquete.php');
	
 

   
$consulta = "SELECT * FROM basquete";
$con = mysqli_query($conexao, $consulta);
?>
