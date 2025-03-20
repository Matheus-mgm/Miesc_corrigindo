<?php  

if(!empty($_GET['id']))
{
  include_once('conexaoresult.php');
	
	$id = $_GET['id'];
	
	$sqlSelect = "SELECT * FROM resultadosvolei WHERE id=$id";
	
	$result = $conexao->query($sqlSelect);
	
	
	if($result->num_rows > 0){
		$sqlDelete = "DELETE FROM resultadosvolei WHERE id=$id";
		$resultDelete = $conexao->query($sqlDelete);
	 }
	}
	
		header('Location: resultado.php');
	
 

   
$consulta = "SELECT * FROM resultadosvolei";
$con = mysqli_query($conexao, $consulta);
?>
