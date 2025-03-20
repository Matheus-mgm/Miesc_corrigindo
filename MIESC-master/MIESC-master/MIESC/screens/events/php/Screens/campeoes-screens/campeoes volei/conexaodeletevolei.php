<?php  

if(!empty($_GET['id']))
{
  include_once('conexaocamp.php');
	
	$id = $_GET['id'];
	
	$sqlSelect = "SELECT * FROM vencedoresvolei WHERE id=$id";
	
	$result = $mysqli->query($sqlSelect);
	
	
	if($result->num_rows > 0){
		$sqlDelete = "DELETE FROM vencedoresvolei WHERE id=$id";
		$resultDelete = $mysqli->query($sqlDelete);
	 }
	}
	
		header('Location: campeoesvolei.php');
	
 

   
$consulta = "SELECT * FROM vencedoresvolei";
$con = mysqli_query($mysqli, $consulta);
?>
