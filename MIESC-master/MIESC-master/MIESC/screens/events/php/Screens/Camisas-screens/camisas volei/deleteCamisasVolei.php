<?php  

if(!empty($_GET['id']))
{
  include_once('conexaoCamisas.php');
	
	$id = $_GET['id'];
	
	$sqlSelect = "SELECT * FROM camisasvolei WHERE id=$id";
	
	$result = $conexao->query($sqlSelect);
	
	
	if($result->num_rows > 0){
		$sqlDelete = "DELETE FROM camisasvolei WHERE id=$id";
		$resultDelete = $conexao->query($sqlDelete);
	 }
	}
	
		header('Location: camisasVolei.php');
	
 

   
$consulta = "SELECT * FROM camisasvolei";
$con = mysqli_query($conexao, $consulta);
?>
