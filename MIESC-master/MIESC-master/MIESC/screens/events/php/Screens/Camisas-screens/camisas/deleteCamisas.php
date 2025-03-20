<?php  

if(!empty($_GET['id']))
{
  include_once('conexaoCamisasfut.php');
	
	$id = $_GET['id'];
	
	$sqlSelect = "SELECT * FROM camisas WHERE id=$id";
	
	$result = $conexao->query($sqlSelect);
	
	
	if($result->num_rows > 0){
		$sqlDelete = "DELETE FROM camisas WHERE id=$id";
		$resultDelete = $conexao->query($sqlDelete);
	 }
	}
	
		header('Location: camisas.php');
	
 

   
$consulta = "SELECT * FROM camisas";
$con = mysqli_query($conexao, $consulta);
?>
