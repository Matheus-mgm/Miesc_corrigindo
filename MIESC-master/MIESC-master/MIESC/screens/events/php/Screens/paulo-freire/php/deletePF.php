<?php  

if(!empty($_GET['id']))
{
  include_once('conexaoPF.php');
	
	$id = $_GET['id'];
	
	$sqlSelect = "SELECT * FROM paulofreire WHERE id=$id";
	
	$result = $conexao->query($sqlSelect);
	
	
	if($result->num_rows > 0){
		$sqlDelete = "DELETE FROM paulofreire WHERE id=$id";
		$resultDelete = $conexao->query($sqlDelete);
	 }
	}
	
		header('Location: horariosPF.php');
	
 

   
$consulta = "SELECT * FROM paulofreire";
$con = mysqli_query($conexao, $consulta);
?>
