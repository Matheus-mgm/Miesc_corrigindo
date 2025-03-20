<?php
global $conexao;
include_once('../conexao.php');

if (isset($_POST['aprovar']) || isset($_POST['negar'])) {
    $pedido_id = $_POST['pedido_id'];
    $status = isset($_POST['aprovar']) ? 'aprovado' : 'negado';

    // Atualizar o status do pedido
    $result_update = mysqli_query($conexao, "UPDATE administrador SET status_pedido = '$status' WHERE idadministrador = $pedido_id");

    if ($result_update) {
    echo '<script>alert("Pedido processado com sucesso.");</script>';
		header("Location: gerenciar_pedidos.php");
} else {
    echo '<script>alert("Erro ao processar o pedido: ' . mysqli_error($conexao) . '");</script>';
		header("Location: gerenciar_pedidos.php");
}
}
?>
