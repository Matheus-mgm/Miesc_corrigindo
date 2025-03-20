<?php
global $conexao;
include_once('../../../conexao.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sqlSelect = "SELECT * FROM textos WHERE id='$id'";
    $result = $conexao->query($sqlSelect);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $jogos = $row['jogos'];
        $turma = $row['turma'];
        $turma2 = $row['turma2'];
        $path = $row['path'];
        $path2 = $row['path2'];
    } else {
        echo "Registro não encontrado.";
        exit;
    }
} else {
    echo "ID não fornecido.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Futsal</title>
</head>
<body>
    <h2>Editar Registro</h2>
    <form action="saveEditFutsal.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        
        <label>Jogos:</label>
        <input type="text" name="jogos" value="<?php echo $jogos; ?>" required><br>

        <label>Turma:</label>
        <input type="text" name="turma" value="<?php echo $turma; ?>" required><br>

        <label>Turma 2:</label>
        <input type="text" name="turma2" value="<?php echo $turma2; ?>" required><br>

        <label>Imagem 1:</label>
        <input type="file" name="arquivo1"><br>
        <?php if (!empty($path)) echo "<img src='$path' width='100'><br>"; ?>

        <label>Imagem 2:</label>
        <input type="file" name="arquivo2"><br>
        <?php if (!empty($path2)) echo "<img src='$path2' width='100'><br>"; ?>

        <input type="hidden" name="path" value="<?php echo $path; ?>">
        <input type="hidden" name="path2" value="<?php echo $path2; ?>">

        <button type="submit" name="atualizar">Salvar Alterações</button>
    </form>
</body>
</html>
