<?php  

if(!empty($_GET['id']))
{
  include_once('conexaocamp.php');
	
	$id = $_GET['id'];
	
	$sqlSelect = "SELECT * FROM vencedoresbasquete WHERE id=$id";
	
	$result = $mysqli->query($sqlSelect);
	
	
	if($result->num_rows > 0){
		$sqlDelete = "DELETE FROM vencedoresbasquete WHERE id=$id";
		$resultDelete = $mysqli->query($sqlDelete);
	 }
	}
	
		header('Location: campeoesbasquete.php');
	
 

   
$consulta = "SELECT * FROM vencedoresbasquete";
$con = mysqli_query($mysqli, $consulta);
?>
