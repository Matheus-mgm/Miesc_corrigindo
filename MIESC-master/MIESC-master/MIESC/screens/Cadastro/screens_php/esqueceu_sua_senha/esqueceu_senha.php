<?php
// Conexão com o banco de dados e outras configurações necessárias
global $conn;
include_once("../../conexao.php");

if (isset($_POST['submit'])) {
    $email = $conn->real_escape_string($_POST['email']);

    // Consulta para obter a pergunta de segurança associada ao e-mail fornecido
    $sql = "SELECT pergunta1 FROM administrador WHERE email = '" . $conn->real_escape_string($email) . "'";
    $result = $conn->query($sql);
    
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $perguntaSeguranca = utf8_decode($row['pergunta1']);
    
        // Restante do código...
    } else {
        echo '<div class="error-message"><i class="fas fa-exclamation-circle"></i> E-mail não encontrado ou pergunta de segurança não definida</div>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="../../Site mercury home e about/img/icone miesc.png">
    <title>Esqueceu Sua Senha</title>
    <!-- Certifique-se de incluir a biblioteca Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right, #018DB5, #0E3659);
        }

        .caixa {
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.4);
            padding: 15px;
            border-radius: 15px;
            width: 29%;
        }

        #submit {
            background-image: linear-gradient(to right, #664300, #FFD700);
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }

        #submit:hover {
            background-image: linear-gradient(to right, #018DB5, #6b3fa0);
        }

        .error-message {
            margin-top: 10px;
            display: flex;
            align-items: center;
            padding: 10px;
            border-radius: 5px;
            color: red;
            background-color: #FFD2D2;
        }

        .error-message i {
            margin-right: 5px;
        }
    </style>
    <div class="caixa">
        <h1>Esqueceu Sua Senha</h1>
        <p>Informe seu endereço de e-mail para redefinir sua senha:</p>

        <form method="post" action="verificar_email.php">
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" required>
            <br><br>
            <input type="submit" name="submit" id="submit" value="Verificar E-mail">
        </form>
    </div>
</body>
</html>
