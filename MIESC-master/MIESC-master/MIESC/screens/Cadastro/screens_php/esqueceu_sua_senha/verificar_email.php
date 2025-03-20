<?php
// Conectar ao banco de dados (substitua com suas configurações)
$servername = "sql305.infinityfree.com";
$username = "if0_36233083";
$password = "miesc79";
$dbname = "if0_36233083_textos";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$email = $_POST['email'];

// Verifique se o e-mail existe na tabela 'administrador'
$sql = "SELECT * FROM administrador WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    header("Location: redefinir_senha.php?tipo=administrador&email=$email");
} else {
    // Verifique se o e-mail existe na tabela 'usuarios'
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        header("Location: redefinir_senha.php?tipo=usuario&email=$email");
    } else {
        echo "E-mail não encontrado. Por favor, verifique o e-mail fornecido.";
    }
}
$conn->close();
?>
