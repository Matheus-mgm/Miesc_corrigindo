<?php  

if(!empty($_GET['id']))
{
  include_once('conexaoresult.php');
	
	$id = $_GET['id'];
	
	$sqlSelect = "SELECT * FROM resultadosfutsal WHERE id=$id";
	
	$result = $conexao->query($sqlSelect);
	
	
	if($result->num_rows > 0){
		$sqlDelete = "DELETE FROM resultadosfutsal WHERE id=$id";
		$resultDelete = $conexao->query($sqlDelete);
	 }
	}
	
		header('Location: resultado.php');
	
 

   
$consulta = "SELECT * FROM resultadosfutsal";
$con = mysqli_query($conexao, $consulta);
?>
