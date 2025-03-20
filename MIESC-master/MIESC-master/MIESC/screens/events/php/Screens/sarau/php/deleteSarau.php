<?php  

if(!empty($_GET['id']))
{
  include_once('conexaoSA.php');
	
	$id = $_GET['id'];
	
	$sqlSelect = "SELECT * FROM sarau WHERE id=$id";
	
	$result = $conexao->query($sqlSelect);
	
	
	if($result->num_rows > 0){
		$sqlDelete = "DELETE FROM sarau WHERE id=$id";
		$resultDelete = $conexao->query($sqlDelete);
	 }
	}
	
		header('Location: horariosSA.php');
	
 

   
$consulta = "SELECT * FROM sarau";
$con = mysqli_query($conexao, $consulta);
?>
