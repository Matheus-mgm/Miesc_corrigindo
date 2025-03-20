<?php  
include_once('conexaofeed.php');
if(isset($_POST['update'])){
	$id = $_POST['id']; 
$comentario = $_POST['comentario'];
   

	$sqlUpdate = "UPDATE feed SET comentario='$comentario' WHERE id='$id'";
	
	$result = $conexao->query($sqlUpdate);
		
}
	header('Location: feed.php');
	

?>
