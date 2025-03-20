<?php  

if(!empty($_GET['id']))
{
  include_once('conexaoCamisasBasquete.php');
	
	$id = $_GET['id'];
	
	$sqlSelect = "SELECT * FROM camisasbasquete WHERE id=$id";
	
	$result = $conexao->query($sqlSelect);
	
	
	if($result->num_rows > 0){
		$sqlDelete = "DELETE FROM camisasbasquete WHERE id=$id";
		$resultDelete = $conexao->query($sqlDelete);
	 }
	}
	
		header('Location: camisasBasquete.php');
	
 

   
$consulta = "SELECT * FROM camisasbasquete";
$con = mysqli_query($conexao, $consulta);
?>
