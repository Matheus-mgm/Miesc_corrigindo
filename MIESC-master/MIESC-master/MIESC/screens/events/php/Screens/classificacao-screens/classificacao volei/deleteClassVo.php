<?php  

if(!empty($_GET['id']))
{
  include_once('conexaovolei.php');
	
	$id = $_GET['id'];
	
	$sqlSelect = "SELECT * FROM classVolei WHERE id=$id";
	
	$result = $conexao->query($sqlSelect);
	
	
	if($result->num_rows > 0){
		$sqlDelete = "DELETE FROM classVolei WHERE id=$id";
		$resultDelete = $conexao->query($sqlDelete);
	 }
	}
	
		header('Location: classificacaoVolei.php');
	
 

   
$consulta = "SELECT * FROM classVolei";
$con = mysqli_query($conexao, $consulta);
?>
