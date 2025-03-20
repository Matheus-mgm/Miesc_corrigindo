<?php  

if(!empty($_GET['id']))
{
  include_once('conexaofutsal.php');
	
	$id = $_GET['id'];
	
	$sqlSelect = "SELECT * FROM futsal WHERE id=$id";
	
	$result = $conexao->query($sqlSelect);
	
	
	if($result->num_rows > 0){
		$sqlDelete = "DELETE FROM futsal WHERE id=$id";
		$resultDelete = $conexao->query($sqlDelete);
	 }
	}
	
		header('Location: classificacao.php');
	
 

   
$consulta = "SELECT * FROM futsal";
$con = mysqli_query($conexao, $consulta);
?>
