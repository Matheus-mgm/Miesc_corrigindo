<?php
require_once '../password.php';

$servername = "localhost";
$username = "root";
$password = "usbw";
$dbname = "cadastro";

$conn = new mysqli($servername, $username, $password, $dbname);

$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : (isset($_GET['tipo']) ? $_GET['tipo'] : '');
$email = $_POST['email'];
$nova_senha = $conn->real_escape_string($_POST['nova_senha']);
$confirma_senha = $_POST['confirma_senha'];
$resposta1 = $conn->real_escape_string($_POST['resposta1']);

if ($nova_senha === $confirma_senha) {
    // Sanitize inputs (avoid SQL Injection)
    $email = $conn->real_escape_string($email);
    $nova_senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);

    // Query to check if the security question answer is correct
    $consultaPerguntaUsuarios = "SELECT resposta1 FROM usuarios WHERE email = ?";
    $stmtConsultaUsuarios = $conn->prepare($consultaPerguntaUsuarios);
    $stmtConsultaUsuarios->bind_param("s", $email);
    $stmtConsultaUsuarios->execute();
    $resultadoConsultaUsuarios = $stmtConsultaUsuarios->get_result();

    $consultaPerguntaAdmin = "SELECT resposta1 FROM administrador WHERE email = ?";
    $stmtConsultaAdmin = $conn->prepare($consultaPerguntaAdmin);
    $stmtConsultaAdmin->bind_param("s", $email);
    $stmtConsultaAdmin->execute();
    $resultadoConsultaAdmin = $stmtConsultaAdmin->get_result();

    if ($resultadoConsultaUsuarios->num_rows > 0 || $resultadoConsultaAdmin->num_rows > 0) {
        // Check if the answer is correct
        $senhaCriptografada = "";
        
        if ($resultadoConsultaUsuarios->num_rows > 0) {
            $row = $resultadoConsultaUsuarios->fetch_assoc();
            $senhaCriptografada = $row['resposta1'];
        } elseif ($resultadoConsultaAdmin->num_rows > 0) {
            $row = $resultadoConsultaAdmin->fetch_assoc();
            $senhaCriptografada = $row['resposta1'];
        }

        // Verify if the answer matches the encrypted answer in the database
        if (password_verify($resposta1, $senhaCriptografada)) {
            // Update the password
            $atualizaSenhaUsuarios = "UPDATE usuarios SET senha = ? WHERE email = ?";
            $stmtAtualizaSenhaUsuarios = $conn->prepare($atualizaSenhaUsuarios);
            $stmtAtualizaSenhaUsuarios->bind_param("ss", $nova_senha_hash, $email);
            $stmtAtualizaSenhaUsuarios->execute();

            $atualizaSenhaAdmin = "UPDATE administrador SET senha = ? WHERE email = ?";
            $stmtAtualizaSenhaAdmin = $conn->prepare($atualizaSenhaAdmin);
            $stmtAtualizaSenhaAdmin->bind_param("ss", $nova_senha_hash, $email);
            $stmtAtualizaSenhaAdmin->execute();

            echo "Senha atualizada com sucesso!";
           
            // Redirect to the login page
            header("Location: ../../Cadastro/index.php");
            exit();
        } else {
            echo "A resposta à pergunta de segurança está incorreta.";
        }
    } else {
        echo "O email fornecido não está registrado.";
    }
} else {
    echo "As senhas não coincidem.";
}

$conn->close();
?>
