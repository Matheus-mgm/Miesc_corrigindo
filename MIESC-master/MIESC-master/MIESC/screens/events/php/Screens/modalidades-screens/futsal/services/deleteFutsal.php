<?php

global $conexao;
if(!empty($_GET['id']))
{
  include_once('../../../conexao.php');
	
	$id = $_GET['id'];
	
	$sqlSelect = "SELECT * FROM textos WHERE id=$id";
	
	$result = $conexao->query($sqlSelect);
	
	
	if($result->num_rows > 0){
		$sqlDelete = "DELETE FROM textos WHERE id=$id";
		$resultDelete = $conexao->query($sqlDelete);
	 }
	}
	
		header('Location: futsalteste.php');
	
 

   
$consulta = "SELECT * FROM textos";
$con = mysqli_query($conexao, $consulta);
?>
