<?php

include_once('conexaoPF.php');

if (isset($_POST['atualizar'])) {
    $id = $_POST['id'];
  $data = $_POST['data'];
    $sala = $_POST['sala'];

    // Verifica se novas imagens foram enviadas

    // Atualize o registro no banco de dados com os novos caminhos dos arquivos
    $sqlUpdate = "UPDATE paulofreire SET horarios='$data', sala='$sala' WHERE id='$id'";
    $result = $conexao->query($sqlUpdate);
}

header('Location: horariosPF.php');


?>