<?php  
include_once('conexaofutsal.php');
if(isset($_POST['update'])){
	$id = $_POST['id']; 
	$posicao =  $_POST['posicao'];
    $sala = $_POST['sala'];
    $pontos = $_POST['pontos'];
    $quantidadejogos = $_POST['quantidadejogos'];

	$sqlUpdate = "UPDATE futsal SET posicao='$posicao', sala='$sala', pontos='$pontos', quantidadejogos='$quantidadejogos' WHERE id='$id'";
	
	$result = $conexao->query($sqlUpdate);
		
}
	header('Location: classificacao.php');
	

?>
