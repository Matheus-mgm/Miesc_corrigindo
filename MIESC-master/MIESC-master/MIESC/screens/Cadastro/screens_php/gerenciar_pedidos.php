<?php
// Conexão com o banco de dados (inclua aqui o que for necessário)
global $conexao;
session_start();

// Verificar se o usuário está autenticado como administrador central
if (!isset($_SESSION['idadministrador']) || $_SESSION['is_admin_central'] !== '1') {
    // Redirecionar para a página de login ou exibir uma mensagem de erro
}

include_once('../conexao.php');

// Consulta para obter os pedidos de cadastro de administradores pendentes
$result_pedidos = mysqli_query($conexao, "SELECT * FROM administrador WHERE status_pedido = 'pendente'");

// Verificar se há pedidos pendentes
if (mysqli_num_rows($result_pedidos) > 0) {
    echo '<div class="box">';
    echo '  <fieldset>';
    echo '      <legend>Pedidos de Cadastro de Administradores</legend>';

    // Loop para exibir os pedidos
    while ($row = mysqli_fetch_assoc($result_pedidos)) {
        echo '      <div class="pedido-administrador">';
        echo '          <p><strong>Nome:</strong> ' . $row['nome'] . '</p>';
        echo '          <p><strong>Email:</strong> ' . $row['email'] . '</p>';
        echo '          <form action="processar_pedido.php" method="post">';
        echo '              <input type="hidden" name="pedido_id" value="' . $row['idadministrador'] . '">';
        echo '              <input type="submit" name="aprovar" value="Aprovar">';
        echo '              <input type="submit" name="negar" value="Negar">';
        echo '          </form>';
        echo '      </div>';
    }

    echo '  </fieldset>';
    echo '</div>';
} else {
    // Se não houver pedidos pendentes, exiba a mensagem
    echo '<div class="box">';
    echo '  <p>Nenhum pedido pendente no momento.</p>';
    echo '</div>';
}
?>

<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        background-image: linear-gradient(to right, #018DB5, #0E3659);
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    .box {
        color: white;
        background-color: rgba(0, 0, 0, 0.4);
        padding: 15px;
        border-radius: 15px;
        width: 60%;
    }

    fieldset {
        border: 3px solid #D99923;
        border-radius: 8px;
        padding: 10px;
        margin: 0;
    }

    legend {
        border: 1px solid #D99923;
        padding: 10px;
        text-align: center;
        background-color: #D99923;
        border-radius: 8px;
    }

    .pedido-administrador {
        margin-bottom: 15px;
    }

    .pedido-administrador p {
        margin: 0;
    }

    form {
        display: flex;
        gap: 10px;
        margin-top: 10px;
    }

    input[type="submit"] {
        background-image: linear-gradient(to right, #664300, #FFD700);
        border: none;
        padding: 10px;
        color: white;
        font-size: 15px;
        cursor: pointer;
        border-radius: 5px;
    }

    input[type="submit"]:hover {
        background-image: linear-gradient(to right, #018DB5, #6b3fa0);
    }

    .error-message {
        color: red;
        margin-top: 10px;
        display: flex;
        align-items: center;
    }

    .error-message i {
        margin-right: 5px;
    }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../../imagens/img_gerais/icone_miesc.png">
    <title>Gerenciar pedidos</title>
</head>
</html>