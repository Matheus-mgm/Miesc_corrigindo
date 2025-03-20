<?php  

if(!empty($_GET['id']))
{
  include_once('conexaocamp.php');
	
	$id = $_GET['id'];
	
	$sqlSelect = "SELECT * FROM vencedores WHERE id=$id";
	
	$result = $mysqli->query($sqlSelect);
	
	
	if($result->num_rows > 0){
		$sqlDelete = "DELETE FROM vencedores WHERE id=$id";
		$resultDelete = $mysqli->query($sqlDelete);
	 }
	}
	
		header('Location: campeoes.php');
	
 

   
$consulta = "SELECT * FROM vencedores";
$con = mysqli_query($mysqli, $consulta);
?>
