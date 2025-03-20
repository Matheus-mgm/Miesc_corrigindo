<?php

include_once('conexaovolei.php');

if (isset($_POST['atualizar'])) {
    $id = $_POST['id'];
    $jogos = $_POST['jogos'];
    $turma = $_POST['turma'];
    $turma2 = $_POST['turma2'];
    $path = $_POST['path']; // Certifique-se de obter as informações corretas das imagens
    $path2 = $_POST['path2'];

    // Verifica se novas imagens foram enviadas
    if (!empty($_FILES['arquivo1']['name'])) {
        $path = uploadFile($_FILES['arquivo1'], $path);
    }

    if (!empty($_FILES['arquivo2']['name'])) {
        $path2 = uploadFile($_FILES['arquivo2'], $path2);
    }

    // Atualize o registro no banco de dados com os novos caminhos dos arquivos
    $sqlUpdate = "UPDATE volei SET jogos='$jogos', turma='$turma', turma2='$turma2', path='$path', path2='$path2' WHERE id='$id'";
    $result = $conexao->query($sqlUpdate);
}

header('Location: volei.php');

function uploadFile($arquivo, $path)
{
    $pasta = "arquivos/";
    $nomeDoArquivo = $arquivo['name'];
    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

    if ($extensao == 'jpg' || $extensao == 'png') {
        $novoNomeDoArquivo = uniqid();
        $path = $pasta . $novoNomeDoArquivo . "." . $extensao;

        if (move_uploaded_file($arquivo['tmp_name'], $path)) {
            return $path;
        } else {
            echo "Erro no upload de arquivo.";
            return $path; // Retorna o caminho existente em caso de erro
        }
    } else {
        echo "Tipo de arquivo não aceito.";
        return $path; // Retorna o caminho existente em caso de erro
    }
}
?>