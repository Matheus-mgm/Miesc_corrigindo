<?php
global $conexao;
include_once('../../../conexao.php');

if (isset($_POST['atualizar'])) {
    $id = $_POST['id'];
    $jogos = $_POST['jogos'];
    $turma = $_POST['turma'];
    $turma2 = $_POST['turma2'];
    $path = $_POST['path'];
    $path2 = $_POST['path2'];

    // Função para fazer o upload de arquivo
    function uploadFile($arquivo, $pathAntigo) {
        $pasta = "arquivos/";
        $nomeDoArquivo = $arquivo['name'];
        $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

        if (!in_array($extensao, ['jpg', 'png', 'jpeg'])) {
            echo "Erro: Apenas arquivos JPG, PNG e JPEG são permitidos.";
            return $pathAntigo; // Mantém o caminho antigo se o upload falhar
        }

        $novoNomeDoArquivo = uniqid() . "." . $extensao;
        $novoPath = $pasta . $novoNomeDoArquivo;

        if (move_uploaded_file($arquivo['tmp_name'], $novoPath)) {
            return $novoPath;
        } else {
            echo "Erro ao fazer upload do arquivo.";
            return $pathAntigo; // Mantém o caminho antigo se houver erro no upload
        }
    }

    // Se novas imagens forem enviadas, atualiza os caminhos
    if (!empty($_FILES['arquivo1']['name'])) {
        $path = uploadFile($_FILES['arquivo1'], $path);
    }

    if (!empty($_FILES['arquivo2']['name'])) {
        $path2 = uploadFile($_FILES['arquivo2'], $path2);
    }

    // Atualiza os dados no banco
    $sqlUpdate = "UPDATE textos SET jogos='$jogos', turma='$turma', turma2='$turma2', path='$path', path2='$path2' WHERE id='$id'";
    if ($conexao->query($sqlUpdate) === TRUE) {
        header('Location: futsalteste.php'); // Redireciona após a atualização
        exit;
    } else {
        echo "Erro ao atualizar: " . $conexao->error;
    }
} else {
    echo "Acesso negado.";
}
?>
